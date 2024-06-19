<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
//$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.ID,A.ACC_TYPE,A.ACC_DETAIL_TYPE,A.CHART_HEAD_CODE,A.CHART_ACC_CODE,
    B.DESCRIPTION AS DIS_GROUP,C.DESCRIPTION AS DIS_TYPE,
    D.HEAD_DESC AS DIS_HEAD,A.CHART_ACC_DESC 
    FROM CHART_DETAIL A
    LEFT JOIN ACCOUNT_TYPES B
    ON A.ACC_TYPE = B.ACCOUNT_TYPE
    LEFT JOIN ACCOUNT_TYPES_DETAIL C
    ON A.ACC_DETAIL_TYPE = C.ACC_DETAIL_TYPE
    INNER JOIN CHART_HEAD D
    ON A.CHART_HEAD_CODE = D.HEAD_CODE
    AND A.COMPANY_ID = '$company_id'
    AND A.PROJECT_ID = '$project_id' 
    AND A.DELETE_FLG = '0'";  
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run); 
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){ 
    if(isset($_POST['group_code']) && isset($_POST['type_code']) && isset($_POST['head_code']) && isset($_POST['status']) && isset($_POST['chart_name']) && !(empty($_POST['group_code']) || empty($_POST['type_code']) || empty($_POST['head_code']) || empty($_POST['status']) || empty($_POST['chart_name']))){
        $group_code = $_POST['group_code'];
        $type_code = $_POST['type_code'];
        $head_code = $_POST['head_code'];
        $status = $_POST['status'];
        $chart_name = $_POST['chart_name'];
        
        $check_query = "SELECT MAX(CHART_ACC_CODE) AS MAX_CHART_ACC_CODE FROM CHART_DETAIL WHERE CHART_HEAD_CODE = '$head_code'";
        // print_r($check_query); die();
        $check_run = oci_parse($c, $check_query);    
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        if (empty($check_row['MAX_CHART_ACC_CODE'])) {
            $chart_code = 1;
        }else{
            $chart_code = $check_row['MAX_CHART_ACC_CODE']; 
            $chart_code++;
        }

        $check_query_ai = "SELECT MAX(ID) AS ID FROM CHART_DETAIL WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $check_run_ai = oci_parse($c, $check_query_ai);    
        oci_execute($check_run_ai);
        $check_row_ai = oci_fetch_assoc($check_run_ai);
        // print_r($check_query_ai); die();
        if (empty($check_row_ai['ID'])) {
            $id = '1';
        }else{
            $id = $check_row_ai['ID']+'1'; 
        }

        $query = "INSERT INTO CHART_DETAIL (ID,ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,CHART_ACC_DESC,ACTIVE,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID) 
        VALUES ('$id','$group_code','$type_code','$head_code','$chart_code','$chart_name','$status','Insert','$user_id','$current_date','$ip_address','$company_id','$project_id')";
        //print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account head has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account head has not been inserted"
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
        // $acc_type = $_POST['acc_type'];
        // $acc_detail_type = $_POST['acc_detail_type'];
        // $chart_head_code = $_POST['chart_head_code'];
        $query = "SELECT * FROM CHART_DETAIL
        WHERE ID = '$id'";
        // print_r($query); die();
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
    if(isset($_POST['id']) && isset($_POST['chart_name'])  && isset($_POST['status']) && !(empty($_POST['id']) || empty($_POST['chart_name']) || empty($_POST['status']))){
        
        $id = $_POST['id'];
        $chart_name = $_POST['chart_name'];
        $status = $_POST['status'];
        // $e_account_type = $_POST['e_account_type'];
        // $e_account_detail_type = $_POST['e_account_detail_type'];
        // $e_chart_head_code = $_POST['e_chart_head_code'];
        
        // $check_query = "SELECT MAX(CHART_ACC_CODE) AS MAX_CHART_ACC_CODE FROM CHART_DETAIL WHERE CHART_HEAD_CODE = '$e_head_code'";
        // // print_r($check_query); die();
        // $check_run = oci_parse($c, $check_query);    
        // oci_execute($check_run);
        // $check_row = oci_fetch_assoc($check_run);
        // if (empty($check_row['MAX_CHART_ACC_CODE'])) {
        //     $chart_code = 1;
        // }else{
        //     $chart_code = $check_row['MAX_CHART_ACC_CODE']; 
        //     $chart_code++;
        // }
        
        $query = "UPDATE CHART_DETAIL 
        SET CHART_ACC_DESC = '$chart_name',
        ACTION_TYPE = 'Update',
        ACTION_BY = '$user_id',
        ACTION_ON = '$current_date',
        PC_IP = '$ip_address',
        ACTIVE = '$status' 
        WHERE ID = '$id' ";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account has not been updated"
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
    // $acc_type = $_POST['acc_type'];
    // $acc_detail_type = $_POST['acc_detail_type'];
    // $chart_head_code = $_POST['chart_head_code'];
    $query = "UPDATE CHART_DETAIL 
    SET DELETE_FLG='1',
    PC_IP = '$ip_address', 
    ACTION_TYPE = 'Delete',
    ACTION_BY = '$user_id',
    ACTION_ON = '$current_date'
    WHERE ID = '$id'";
    // print_r($query); die();
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
    // $query = "SELECT AC.HEAD_DESC,A.CHART_ACC_DESC,A.ACC_TYPE,A.ACC_DETAIL_TYPE,A.CHART_HEAD_CODE,A.CHART_ACC_CODE
    // FROM CHART_DETAIL A
    // LEFT JOIN CHART_HEAD AC 
    // ON AC.HEAD_CODE = A.CHART_HEAD_CODE 
    // WHERE CONCAT(A.CHART_HEAD_CODE,A.CHART_ACC_CODE) 
    // NOT IN (SELECT CONCAT(B.ACC_HEAD_CODE,B.ACC_CHARTACC_CODE) FROM BANKS_SETUP B WHERE B.COMPANY_ID = '$company_id' AND B.PROJECT_ID = '$project_id')
    // AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'
    // AND A.DELETE_FLG = '0' ORDER BY CHART_HEAD_CODE ASC";

    $query = "SELECT A.ID,AC.HEAD_DESC,A.CHART_ACC_DESC,A.ACC_TYPE,A.ACC_DETAIL_TYPE,A.CHART_HEAD_CODE,A.CHART_ACC_CODE
    FROM CHART_DETAIL A
    LEFT JOIN CHART_HEAD AC 
    ON AC.HEAD_CODE = A.CHART_HEAD_CODE 
    WHERE A.ID NOT IN (SELECT CHART_PROJECT_ID FROM BANKS_SETUP WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id') 
    AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'
    AND A.DELETE_FLG = '0' ORDER BY A.CHART_HEAD_CODE ASC";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data = '<option value="">E.g. Example Acc..</option>';
    $return_data .= '<option value="0" style="font-family:Arial, FontAwesome">Add &#xf067;</option>';
        
    while($row=oci_fetch_assoc($run))
    {
        $ID[] = $row['ID'];
        $HEAD_NAME[] = $row['HEAD_DESC'];
		$CHART_NAME[] = $row['CHART_ACC_DESC'];
		$GROUP_CODE[] = $row['ACC_TYPE'];
		$TYPE_CODE[] = $row['ACC_DETAIL_TYPE'];
		$HEAD_CODE[] = $row['CHART_HEAD_CODE'];
		$CHART_CODE[] = $row['CHART_ACC_CODE'];
    }
    $x = "";
    $sel = "";
    for($i=0;$i<count($HEAD_NAME);$i++){
        if($x != $HEAD_NAME[$i]){
			$return_data .= '<option style="font-weight: bold;" disabled>'.$HEAD_NAME[$i].'</option>';
			if($CHART_NAME[$i] == ""){
				$return_data .= '<option disabled>-</option>';
			}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
			}
		}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
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

}elseif(isset($_POST['action']) && $_POST['action'] == 'chart_list_w_head_edit'){
    $query = "SELECT A.ID,AC.HEAD_DESC,A.CHART_ACC_DESC,A.ACC_TYPE,A.ACC_DETAIL_TYPE,A.CHART_HEAD_CODE,A.CHART_ACC_CODE
    FROM CHART_DETAIL A
    LEFT JOIN CHART_HEAD AC 
    ON AC.HEAD_CODE = A.CHART_HEAD_CODE
    WHERE A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'
    AND A.DELETE_FLG = '0' ORDER BY A.CHART_HEAD_CODE ASC ";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data = '<option value="">E.g. Example Acc..</option>';
    $return_data .= '<option value="0" style="font-family:Arial, FontAwesome">Add &#xf067;</option>';
        
    while($row=oci_fetch_assoc($run))
    {
        $ID[] = $row['ID'];
        $HEAD_NAME[] = $row['HEAD_DESC'];
		$CHART_NAME[] = $row['CHART_ACC_DESC'];
		$GROUP_CODE[] = $row['ACC_TYPE'];
		$TYPE_CODE[] = $row['ACC_DETAIL_TYPE'];
		$HEAD_CODE[] = $row['CHART_HEAD_CODE'];
		$CHART_CODE[] = $row['CHART_ACC_CODE'];
    }
    $x = "";
    $sel = "";
    for($i=0;$i<count($HEAD_NAME);$i++){
        if($x != $HEAD_NAME[$i]){
			$return_data .= '<option style="font-weight: bold;" disabled>'.$HEAD_NAME[$i].'</option>';
			if($CHART_NAME[$i] == ""){
				$return_data .= '<option disabled>-</option>';
			}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
			}
		}else{
				$return_data .= '<option data-code="'.$CHART_CODE[$i].'" value="'.$ID[$i].'">('.$CHART_CODE[$i].') '.$CHART_NAME[$i].'</option>';
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