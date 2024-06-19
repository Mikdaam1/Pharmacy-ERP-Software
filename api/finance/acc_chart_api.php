<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$return_data = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM COD_ACCOUNT_CHART_PROJECT ACP INNER JOIN COD_ACCOUNT_HEAD AH ON AH.HEAD_CODE = ACP.HEAD_CODE INNER JOIN COD_ACCOUNT_CHART AC ON AC.CHART_CODE = ACP.CHART_CODE  WHERE ACP.GROUP_CODE = AC.GROUP_CODE AND ACP.GROUP_CODE = AH.ACCOUNT_GROUP AND ACP.PROJECT_ID = '$project_id' AND ACP.COMPANY_ID = '$company_id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
 
    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['head_id']) && isset($_POST['chart_name']) && isset($_POST['status']) && !(empty($_POST['head_id']) || empty($_POST['chart_name']) || empty($_POST['status']))){
        $head_id = $_POST['head_id'];
        $chart_name = $_POST['chart_name'];
        $status = $_POST['status'];
        //get group and head code
        $check_query = "SELECT ACCOUNT_GROUP,HEAD_CODE FROM COD_ACCOUNT_HEAD WHERE ID = '$head_id'";
        $check_run = oci_parse($c, $check_query);    
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        $group_code = $check_row['ACCOUNT_GROUP'];
        $head_code = $check_row['HEAD_CODE'];
        //end
        $check_query = "SELECT MAX(CHART_CODE) AS MAX_CHART_CODE FROM COD_ACCOUNT_CHART WHERE HEAD_ACCOUNT = '$head_code'";
        $check_run = oci_parse($c, $check_query);    
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        if (empty($check_row['MAX_CHART_CODE'])) {
            $chart_code = "1";
        }else{
            $chart_code = $check_row['MAX_CHART_CODE'];
            $chart_code++;
        }
        $query = "INSERT INTO COD_ACCOUNT_CHART (GROUP_CODE,HEAD_ACCOUNT,CHART_CODE,CHART_NAME,ACTIVE,COMPANY_ID) VALUES ('$group_code','$head_code','$chart_code','$chart_name','$status','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $get_id_query = "SELECT MAX(ID) AS MAX_ID FROM COD_ACCOUNT_CHART";
            $get_id_run = oci_parse($c, $get_id_query);    
            oci_execute($get_id_run);
            $get_id_row = oci_fetch_assoc($get_id_run);
            $chart_last_id = $get_id_row['MAX_ID'];
            $query = "INSERT INTO COD_ACCOUNT_CHART_PROJECT (GROUP_CODE,HEAD_CODE,CHART_CODE,PROJECT_ID,COMPANY_ID,ACTIVE,CHART_ID) VALUES ('$group_code','$head_code','$chart_code','$project_id','$company_id','$status','$chart_last_id')";
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Account chart has been inserted"
                );
            }else{
                $return_data = array(
                "status" => 0,
                "message" => "Account chart has not been inserted"
                );
            }
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account chart has not been inserted"
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
        $query = "SELECT * FROM COD_ACCOUNT_CHART WHERE ID = '$id'";
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
    if(isset($_POST['chart_name']) && isset($_POST['status']) && isset($_POST['id']) && !(empty($_POST['chart_name']) || empty($_POST['status']) || empty($_POST['id']))){
        $chart_name = $_POST['chart_name'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        
        $query = "UPDATE COD_ACCOUNT_CHART SET CHART_NAME = '$chart_name', ACTIVE = '$status' WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account chart has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account chart has not been updated"
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'chart_list_w_head'){
    
    $query = "SELECT AH.ID AS HEAD_ID,AC.ID AS CHART_ID,HEAD_DESC,CHART_ACC_CODE,CHART_ACC_DESC 
    FROM CHART_HEAD AH 
    LEFT JOIN CHART_DETAIL AC 
    ON AH.HEAD_CODE = AC.CHART_HEAD_CODE 
    WHERE AH.COMPANY_ID = '$company_id' AND AC.ACTIVE = 'Y' ORDER BY HEAD_ID ASC";
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
    WHERE AH.COMPANY_ID = '2' AND AC.ACTIVE = 'Y' ORDER BY HEAD_ID ASC";
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