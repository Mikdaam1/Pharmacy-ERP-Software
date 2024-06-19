<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$return_data = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'all_chart_list_w_head'){
    $query = "SELECT AC.ID AS CHART_ID,HEAD_DESC,CHART_ACC_CODE,CHART_ACC_DESC 
    FROM CHART_HEAD AH 
    LEFT JOIN CHART_DETAIL AC 
    ON AH.HEAD_CODE = AC.CHART_HEAD_CODE 
    WHERE AH.COMPANY_ID = '$company_id' AND AC.ACTIVE = 'Y' ORDER BY CHART_ID ASC";
    //print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
	$return_data = '<option value="">Select Account</option>';
	//$return_data .= '<option value="0" style="font-family:Arial, FontAwesome">Add &#xf067;</option>';
	while($row=oci_fetch_assoc($run))
	{
		$HEAD_NAME[] = $row['HEAD_DESC'];
		$CHART_NAME[] = $row['CHART_ACC_DESC'];
		$CHART_CODE[] = $row['CHART_ACC_CODE'];
		$CHART_ID[] = $row['CHART_ID'];
		// $HEAD_ID[] = $row['HEAD_ID'];
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'data_selected_reg_acc_receivable'){
    $query = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '1'"; 
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row=oci_fetch_assoc($run);
    //print_r($row); die();
    $return_data = $row;  
}elseif(isset($_POST['action']) && $_POST['action'] == 'data_selected_charges_account'){
  $query = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '2'"; 
  $run = oci_parse($c, $query);
  oci_execute($run);
  $row=oci_fetch_assoc($run);
  //print_r($row); die();
  $return_data = $row;  
}elseif(isset($_POST['action']) && $_POST['action'] == 'data_selected_allottees_account'){
  $query = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '3'"; 
  $run = oci_parse($c, $query);
  oci_execute($run);
  $row=oci_fetch_assoc($run);
  //print_r($row); die();
  $return_data = $row;  
}elseif(isset($_POST['action']) && $_POST['action'] == 'data_selected_employee_account'){
  $query = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '4'"; 
  $run = oci_parse($c, $query);
  oci_execute($run);
  $row=oci_fetch_assoc($run);
  //print_r($row); die();
  $return_data = $row;  
}elseif(isset($_POST['action']) && $_POST['action'] == 'data_selected_salary_account'){
  $query = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '5'"; 
  $run = oci_parse($c, $query);
  oci_execute($run);
  $row=oci_fetch_assoc($run);
  //print_r($row); die();
  $return_data = $row;  
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert_update'){
    // print_r($_POST);
    if(isset($_POST['reg_acc_receivable']) && !(empty($_POST['charges_account'])) && !(empty($_POST['allottees_account'])) ){
        
        $reg_acc_receivable = $_POST['reg_acc_receivable'];
        $charges_account = $_POST['charges_account'];
        $allottees_account = $_POST['allottees_account'];
        $employee_account = $_POST['employee_account'];
        $salary_account = $_POST['salary_account'];

        $query_1 = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,ID FROM CHART_DETAIL WHERE ID = '$reg_acc_receivable'";
        // print_r($query_1);
        $run_1 = oci_parse($c, $query_1);
        oci_execute($run_1);
        $row_1 = oci_fetch_assoc($run_1);

        $query_2 = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,ID FROM CHART_DETAIL WHERE ID = '$charges_account'";
        // print_r($query_2);
        $run_2 = oci_parse($c, $query_2);
        oci_execute($run_2);
        $row_2 = oci_fetch_assoc($run_2);

        $query_3 = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,ID FROM CHART_DETAIL WHERE ID = '$allottees_account'";
        // print_r($query_3); die();
        $run_3 = oci_parse($c, $query_3);
        oci_execute($run_3);
        $row_3 = oci_fetch_assoc($run_3);

        $query_4 = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,ID FROM CHART_DETAIL WHERE ID = '$employee_account'";
        // print_r($query_3); die();
        $run_4 = oci_parse($c, $query_4);
        oci_execute($run_4);
        $row_4 = oci_fetch_assoc($run_4);

        $query_5 = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,ID FROM CHART_DETAIL WHERE ID = '$salary_account'";
        // print_r($query_3); die();
        $run_5 = oci_parse($c, $query_5);
        oci_execute($run_5);
        $row_5 = oci_fetch_assoc($run_5);

      if($row_1 > 0 && $row_2 > 0 && $row_3 > 0 && $row_4 > 0 && $row_5 > 0){  

        $acc_receivable_type = $row_1['ACC_TYPE'];
        $acc_receivable_detail = $row_1['ACC_DETAIL_TYPE'];
        $acc_receivable_head = $row_1['CHART_HEAD_CODE'];
        $acc_receivable_chart = $row_1['CHART_ACC_CODE'];
        $acc_receivable_chart_ID = $row_1['ID'];

        $acc_charges_type = $row_2['ACC_TYPE'];
        $acc_charges_detail = $row_2['ACC_DETAIL_TYPE'];
        $acc_charges_head = $row_2['CHART_HEAD_CODE'];
        $acc_charges_chart = $row_2['CHART_ACC_CODE'];
        $acc_charges_chart_ID = $row_2['ID'];

        $acc_allottees_type = $row_3['ACC_TYPE'];
        $acc_allottees_detail = $row_3['ACC_DETAIL_TYPE'];
        $acc_allottees_head = $row_3['CHART_HEAD_CODE'];
        $acc_allottees_chart = $row_3['CHART_ACC_CODE'];
        $acc_allottees_chart_ID = $row_3['ID'];

        $acc_employee_type = $row_4['ACC_TYPE'];
        $acc_employee_detail = $row_4['ACC_DETAIL_TYPE'];
        $acc_employee_head = $row_4['CHART_HEAD_CODE'];
        $acc_employee_chart = $row_4['CHART_ACC_CODE'];
        $acc_employee_chart_ID = $row_4['ID'];

        $acc_salary_type = $row_5['ACC_TYPE'];
        $acc_salary_detail = $row_5['ACC_DETAIL_TYPE'];
        $acc_salary_head = $row_5['CHART_HEAD_CODE'];
        $acc_salary_chart = $row_5['CHART_ACC_CODE'];
        $acc_salary_chart_ID = $row_5['ID'];
        
        // $query_aac_2 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('charges_account','4','$acc_employee_type','$acc_employee_detail','$acc_employee_head','$acc_employee_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_employee_chart_ID')";
        // PRINT_R($query_aac_2);
        // $query_aac_3 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('salary_account','5','$acc_salary_type','$acc_salary_detail','$acc_salary_head','$acc_salary_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_salary_chart_ID')";
        // PRINT_R($query_aac_3); DIE();
        $check_query = "SELECT * FROM COD_SYSTEM_GL_SETUP";
        $check_run = oci_parse($c, $check_query);   
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        if (empty($check_row)) {
            $id=1;
            $query_aac_1 = "INSERT INTO COD_SYSTEM_GL_SETUP (ID,NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('$id','registration_account','1','$acc_receivable_type','$acc_receivable_detail','$acc_receivable_head','$acc_receivable_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_receivable_chart_ID')";
            $id++;
            $query_aac_2 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('$id','charges_account','2','$acc_charges_type','$acc_charges_detail','$acc_charges_head','$acc_charges_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_charges_chart_ID')";
            $id++;
            $query_aac_3 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('$id','allottees_payments','3','$acc_allottees_type','$acc_allottees_detail','$acc_allottees_head','$acc_allottees_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_allottees_chart_ID')";
            $id++;
            $query_aac_4 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('$id','employee_account','4','$acc_employee_type','$acc_employee_detail','$acc_employee_head','$acc_employee_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_employee_chart_ID')";
            $id++;
            $query_aac_5 = "INSERT INTO COD_SYSTEM_GL_SETUP (NAME,SUB_ID,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,CHART_ID) VALUES ('$id','salary_account','5','$acc_salary_type','$acc_salary_detail','$acc_salary_head','$acc_salary_chart','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$acc_salary_chart_ID')";
            // print_r($query_aac_1);
            // print_r($query_aac_2);
            // print_r($query_aac_3);

            $run_aac_1 = oci_parse($c, $query_aac_1);
            $run_aac_2 = oci_parse($c, $query_aac_2);
            $run_aac_3 = oci_parse($c, $query_aac_3);
            $run_aac_3 = oci_parse($c, $query_aac_4);
            $run_aac_3 = oci_parse($c, $query_aac_5);

            if(oci_execute($run_aac_1) && oci_execute($run_aac_2) && oci_execute($run_aac_3) && oci_execute($run_aac_4) && oci_execute($run_aac_5)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Added Successfully!"
                );
            }
        
            oci_free_statement($run_aac_1);
            oci_free_statement($run_aac_2);
            oci_free_statement($run_aac_3);
            oci_close($c); 
            
        }
        else{
            $query_A = "UPDATE COD_SYSTEM_GL_SETUP SET NAME = 'registration_account',ACC_TYPE = '$acc_receivable_type',ACC_DETAIL = '$acc_receivable_detail',ACC_HEAD = '$acc_receivable_head',ACC_CHART = '$acc_receivable_chart',ACTION_TYPE = 'update',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address',COMPANY_ID = '$company_id',PROJECT_ID = '$project_id',CHART_ID = '$acc_receivable_chart_ID' WHERE SUB_ID = '1'";
            $query_B = "UPDATE COD_SYSTEM_GL_SETUP SET NAME = 'charges_account',ACC_TYPE = '$acc_charges_type',ACC_DETAIL = '$acc_charges_detail',ACC_HEAD = '$acc_charges_head',ACC_CHART = '$acc_charges_chart',ACTION_TYPE = 'update',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address',COMPANY_ID = '$company_id',PROJECT_ID = '$project_id',CHART_ID = '$acc_charges_chart_ID' WHERE SUB_ID = '2'";
            $query_C = "UPDATE COD_SYSTEM_GL_SETUP SET NAME = 'allottees_payments',ACC_TYPE = '$acc_allottees_type',ACC_DETAIL = '$acc_allottees_detail',ACC_HEAD = '$acc_allottees_head',ACC_CHART = '$acc_allottees_chart',ACTION_TYPE = 'update',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address',COMPANY_ID = '$company_id',PROJECT_ID = '$project_id',CHART_ID = '$acc_allottees_chart_ID' WHERE SUB_ID = '3'";
            $query_D = "UPDATE COD_SYSTEM_GL_SETUP SET NAME = 'employee_account',ACC_TYPE = '$acc_employee_type',ACC_DETAIL = '$acc_employee_detail',ACC_HEAD = '$acc_employee_head',ACC_CHART = '$acc_employee_chart',ACTION_TYPE = 'update',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address',COMPANY_ID = '$company_id',PROJECT_ID = '$project_id',CHART_ID = '$acc_employee_chart_ID' WHERE SUB_ID = '4'";
            $query_E = "UPDATE COD_SYSTEM_GL_SETUP SET NAME = 'salary_account',ACC_TYPE = '$acc_salary_type',ACC_DETAIL = '$acc_salary_detail',ACC_HEAD = '$acc_salary_head',ACC_CHART = '$acc_salary_chart',ACTION_TYPE = 'update',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address',COMPANY_ID = '$company_id',PROJECT_ID = '$project_id',CHART_ID = '$acc_salary_chart_ID' WHERE SUB_ID = '5'";

            // print_r($query_A);
            // print_r($query_B);
            // print_r($query_C);
            // print_r($query_D);
            // print_r($query_E);
            $run_A = oci_parse($c, $query_A);
            $run_B = oci_parse($c, $query_B);
            $run_C = oci_parse($c, $query_C);
            $run_D = oci_parse($c, $query_D);
            $run_E = oci_parse($c, $query_E);

            if(oci_execute($run_A) && oci_execute($run_B) && oci_execute($run_C) && oci_execute($run_D) && oci_execute($run_E)){
              $return_data = array(
                "status" => 1,
                "message" => "Updated successfully!"
              );
            }
            oci_free_statement($run_A);
            oci_free_statement($run_B);
            oci_free_statement($run_C);
            oci_free_statement($run_D);
            oci_free_statement($run_E);
            oci_close($c);
        }
          
      }
      else{
        $return_data = array(
          "status" => 0,
          "message" => "Code did not run!"
        );
    }
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All Fields Are Required!"
        );
    }
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>