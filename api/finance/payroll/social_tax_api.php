<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
//$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.* 
    FROM COD_SOCIAL_TAX_PAYROLL A
    WHERE A.COMPANY_ID = '$company_id' AND A.PROJECT_ID='$project_id' 
    AND A.DEL_FLG = '0'";
                
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){

       

    $return_data[] = $row;

    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){ 
    // print_r($_POST); die();
    if(isset($_POST['tax_name']) && !empty($_POST['tax_name'])){
        $tax_name=ucfirst(preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['tax_name']));
        // print_r($tax_name); die();
        $amount=$_POST['amount'];
        $sales_gl_account=$_POST['sales_gl_account'];
        $des=ucfirst(preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['des']));

        $query = "INSERT INTO COD_SOCIAL_TAX_PAYROLL (TAX_NAME,TAX_AMOUNT,REMARKS,COMPANY_ID,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,SALES_GL_ACCOUNT) 
        VALUES ('$tax_name','$amount','$des','$company_id','$project_id','Insert','$user_id','$current_date','$sales_gl_account')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Social Tax Has Been Inserted!"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Social Tax Has Not Been Inserted!"
            );
        }
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All Fields Are Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT ID,TAX_NAME,TAX_AMOUNT,REMARKS,SALES_GL_ACCOUNT FROM COD_SOCIAL_TAX_PAYROLL WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $row = oci_fetch_assoc($run);
            $return_data = $row;
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Data not found"
            );
        }
        oci_free_statement($run);
        oci_close($c);
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All Fields Are Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        
      // print_r($_POST); die();
        $id = $_POST['id'];
        $tax_name_e=ucfirst(preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['tax_name_e']));
        $amount_e=$_POST['amount_e'];
        $e_sales_gl_account=$_POST['e_sales_gl_account'];
        $des_e=ucfirst(preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['des_e']));
        
        $query = "UPDATE COD_SOCIAL_TAX_PAYROLL 
                  SET TAX_NAME = '$tax_name_e', 
                  TAX_AMOUNT = '$amount_e',
                  REMARKS = '$des_e',
                  ACTION_TYPE = 'Update',
                  ACTION_ON = '$current_date',
                  ACTION_BY = '$user_id',
                  SALES_GL_ACCOUNT = '$e_sales_gl_account'
                  WHERE ID = '$id' AND COMPANY_ID = '$company_id'";
        //print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Social Tax Has Been Updated!"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Social Tax Has Not Been Updated!"
            );
        }
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All Fields Are Required"
        );
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id=$_POST['id'];
    $query = "UPDATE COD_SOCIAL_TAX_PAYROLL 
              SET DEL_FLG='1', 
              ACTION_TYPE = 'Delete',
              ACTION_BY = '$user_id',
              ACTION_ON = '$current_date'
              WHERE ID = '$id'";
    $run = oci_parse($c, $query);
    if(oci_execute($run)){
        $return_data = array(
            "status" => 1,
            "message" => "Account has been deleted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Account has not been deleted"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'chart_list_w_head'){
    $query = "SELECT AH.ID AS HEAD_ID,AC.ID AS CHART_ID,HEAD_DESC,CHART_ACC_CODE,CHART_ACC_DESC 
    FROM CHART_HEAD AH 
    LEFT JOIN CHART_DETAIL AC 
    ON AH.HEAD_CODE = AC.CHART_HEAD_CODE 
    WHERE AC.ID NOT IN (SELECT CHART_PROJECT_ID FROM BANKS_SETUP WHERE COMPANY_ID = '2' AND PROJECT_ID = '4') 
    AND AH.COMPANY_ID = '2' AND AC.PROJECT_ID = '4' AND AC.ACTIVE = 'Y' ORDER BY HEAD_ID ASC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data = '<option value="">Select Account</option>';
    $return_data .= '<option value="0" style="font-family:Arial, FontAwesome">Add &#xf067;</option>';
        
    while($row=oci_fetch_assoc($run))
    {
        $HEAD_NAME[] = $row['HEAD_DESC'];
		$CHART_NAME[] = $row['CHART_ACC_DESC'];
		$CHART_CODE[] = $row['CHART_ACC_CODE'];
		$CHART_ID[] = $row['CHART_ID'];
		$HEAD_ID[] = $row['HEAD_ID'];
    }
    $x = "";
    $sel = "";
    for($i=0;$i<count($HEAD_NAME);$i++){
        if($x != $HEAD_NAME[$i]){
			$return_data .= '<option style="font-weight: bold;" disabled>'.$HEAD_NAME[$i].'</option>';
			if($CHART_NAME[$i] == ""){
				$return_data .= '<option disabled>-</option>';
			}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$CHART_ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
			}
		}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$CHART_ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
		}
		$x = $HEAD_NAME[$i];
	}

}elseif(isset($_POST['action']) && $_POST['action'] == 'all_chart_list_w_head'){ 
    $query = "SELECT AH.ID AS HEAD_ID,AC.ID AS CHART_ID,HEAD_DESC,CHART_ACC_CODE,CHART_ACC_DESC 
    FROM CHART_HEAD AH 
    LEFT JOIN CHART_DETAIL AC 
    ON AH.HEAD_CODE = AC.CHART_HEAD_CODE 
    WHERE AH.COMPANY_ID = '$company_id' AND AC.ACTIVE = 'Y' ORDER BY HEAD_ID ASC";
    //print_r($query); die():
    $run = oci_parse($c, $query);
    oci_execute($run);
	$return_data = '<option value="">Select Account</option>';
	$return_data .= '<option value="0" style="font-family:Arial, FontAwesome">Add &#xf067;</option>';
	while($row=oci_fetch_assoc($run))
	{
		$HEAD_NAME[] = $row['HEAD_DESC'];
		$CHART_NAME[] = $row['CHART_ACC_DESC'];
		$CHART_CODE[] = $row['CHART_ACC_CODE'];
		$CHART_ID[] = $row['CHART_ID'];
		$HEAD_ID[] = $row['HEAD_ID'];
	}
	$x = "";
    $sel = "";
	for($i=0;$i<count($HEAD_NAME);$i++){
        if($x != $HEAD_NAME[$i]){
			$return_data .= '<option style="font-weight: bold;" disabled>'.$HEAD_NAME[$i].'</option>';
			if($CHART_NAME[$i] == ""){
				$return_data .= '<option disabled>-</option>';
			}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$CHART_ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
			}
		}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$CHART_ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
		}
		$x = $HEAD_NAME[$i];
	}

}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT)); 

?>