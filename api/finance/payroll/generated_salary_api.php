<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j-M-y');
$ip_address = getHostByName(getHostName());
$ex_query = "";
$dep_query = "";
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $view_q = "SELECT ID,MONTH,REMARKS,TRANSFER FROM COD_HRM_ADVICED_MONTH 
    WHERE GENERATE_SALARY='1' AND APPROVED_SALARY='0'";
    // PRINT_R($view_q);
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }
    oci_free_statement($view_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'generated_salary_detail_view'){
    $month_id = $_POST['month_id'];
    $view_q = "SELECT A.ID,A.TOTAL_PRESENT,A.TOTAL_ABSENT,A.TOTAL_LEAVE,B.MONTH,C.FIRST_NAME,A.TRANSFER FROM COD_HRM_ADVICED_MONTH_DETAIL A
    JOIN COD_HRM_ADVICED_MONTH B ON A.MONTH_ID=B.ID JOIN  COD_EMPLOYEES C ON A.EMPLOYEE_ID=C.ID 
    WHERE A.MONTH_ID='$month_id' ";
    // PRINT_R($view_q);
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }
    oci_free_statement($view_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'store'){
    print_r($_POST);die(); 
    // print_r($_FILES);die(); 
    $month_id=$_POST['month_id'];
    $imgname=$_FILES['approved_file']['name'];
    $attendancesheet_month = date('M');
    $randname = $attendancesheet_month."_".$imgname;
    $location = '../../../uploads/Approved_Salary_Uploads/'.$randname;
    $sql="UPDATE COD_HRM_ADVICED_MONTH SET UPLOAD_APPROVED_SALARY='$randname',APPROVED_SALARY='1' WHERE ID='$month_id'";
    $run = oci_parse($c, $sql);
    if(oci_execute($run)){
        move_uploaded_file($_FILES['approved_file']['tmp_name'], $location);
        
            $return_data = array(
                "status" => 1,
                "message" => "File has been approved and uploaded"
            );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "File has not been approved and uploaded"
        ); 
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'store_1'){

    $remarks=$_POST['remarks'];
    $month_id=$_POST['month_id'];
    $imgname=$_FILES['approved_file']['name'];    
    $attendancesheet_month = date('M');
    $attendancesheet_time = date("h:i:sa");
    $randname = "Salary_Approval_".$current_date."_".$attendancesheet_time;
    $location = '../../../uploads/Approved_Salary_Uploads/'.$randname;

    $query_fiscal_year = "SELECT td.FISCAL_YEAR FROM COD_DATE_LOCK td 
                          INNER JOIN COD_FISCAL_YEAR fy ON fy.SNO = td.FISCAL_YEAR 
                          WHERE fy.ACTIVE = 'Y' AND td.ACTIVE = 'Y' 
                          AND td.COMPANY_ID = '2'";
    $run_fiscal_year = oci_parse($c, $query_fiscal_year);
    oci_execute($run_fiscal_year);
    $fiscal_year_row = oci_fetch_assoc($run_fiscal_year);

    $query_voucher = "SELECT * FROM COD_VOUCHER_TYPE WHERE TYPE = 'JV'";
    $run_voucher = oci_parse($c, $query_voucher);
    oci_execute($run_voucher);
    $run_voucher_row = oci_fetch_assoc($run_voucher);

    $query_employee = "SELECT ID,NAME,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART FROM COD_SYSTEM_GL_SETUP WHERE NAME = 'employee_account'";
    $run_employee = oci_parse($c, $query_employee);
    oci_execute($run_employee);
    $run_employee_row = oci_fetch_assoc($run_employee);

    $query_salary = "SELECT ID,NAME,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART FROM COD_SYSTEM_GL_SETUP WHERE NAME = 'salary_account'";
    $run_salary = oci_parse($c, $query_salary);
    oci_execute($run_salary);
    $run_salary_row = oci_fetch_assoc($run_salary);

    if($fiscal_year_row > 0 && $run_voucher_row > 0 && $run_employee_row > 0 && $run_salary_row > 0){

      $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

      $voucher_id = $run_voucher_row['ID'];
      $voucher_name = $run_voucher_row['TYPE'];
      $voucher_des = $run_voucher_row['DESCRIPTION'];

      $employee_id = $run_employee_row['ID'];
      $employee_acc_chart = $run_employee_row['ACC_CHART'];
      $employee_acc_head = $run_employee_row['ACC_HEAD'];
      $employee_acc_type = $run_employee_row['ACC_DETAIL'];
      $employee_acc_group = $run_employee_row['ACC_TYPE'];

      $salary_id = $run_salary_row['ID'];
      $salary_acc_chart = $run_salary_row['ACC_CHART'];
      $salary_acc_head = $run_salary_row['ACC_HEAD'];
      $salary_acc_type = $run_salary_row['ACC_DETAIL'];
      $salary_acc_group = $run_salary_row['ACC_TYPE'];
  
      $check_query = "SELECT MAX(VNO) AS VNO FROM V_DETAIL WHERE VTYPE = 'JV' AND FISCAL_YEAR = '$fiscal_year'";
      $check_run = oci_parse($c, $check_query);
      oci_execute($check_run);
      $check_row = oci_fetch_assoc($check_run);

      $check_query_B = "SELECT MAX(VNO) AS VNO FROM V_MASTER WHERE VTYPE = 'JV' AND FISCAL_YEAR = '$fiscal_year'";
      $check_run_B = oci_parse($c, $check_query_B);
      oci_execute($check_run_B);
      $check_row_B = oci_fetch_assoc($check_run_B);

      if (empty($check_row['VNO']) && empty($check_row_B['VNO'])) {
        $v_no_DETAIL = '1';
        $V_no_MASTER = '1';
      }else if($check_row['VNO'] == $check_row_B['VNO']){
        $v_no_DETAIL = $check_row['VNO']+'1';
        $V_no_MASTER = $check_row_B['VNO']+'1';
      }else{
        $return_data = array(
          "status" => 0,
          "message" => "V_MASTER And V_DETAIL VNO Does Not Match!"
        );
      }
      
      $query_v_detail_salary = "INSERT INTO V_DETAIL (VNO,VTYPE,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR) VALUES ('$v_no_DETAIL','$voucher_name','$salary_acc_head','$salary_acc_chart','$salary_acc_type','$salary_acc_group','$remarks','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year')";
      $query_v_detail_employee = "INSERT INTO V_DETAIL (VNO,VTYPE,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR) VALUES ('$v_no_DETAIL','$voucher_name','$employee_acc_head','$employee_acc_chart','$employee_acc_type','$employee_acc_group','$remarks','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year')";
      $query_master = "INSERT INTO V_MASTER (VNO,VTYPE,VTYPE_ID,REMARKS,POSTED,PC_IP,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,FISCAL_YEAR) VALUES ('$V_no_MASTER','$voucher_name','$voucher_id','$remarks','Y','$ip_address','$project_id','insert','$user_id','$current_date','$company_id','$fiscal_year')";
      
      // print_r($query_master); die();
      $run_v_detail_from = oci_parse($c, $query_v_detail_salary);
      $run_v_detail_to = oci_parse($c, $query_v_detail_employee);
      $run_master = oci_parse($c, $query_master);



        if(oci_execute($run_v_detail_from) && oci_execute($run_v_detail_to) && oci_execute($run_master) ){
            $sql="UPDATE COD_HRM_ADVICED_MONTH SET UPLOAD_APPROVED_SALARY='$randname',APPROVED_SALARY='1' WHERE ID='$month_id'";
            $run = oci_parse($c, $sql);
            if(oci_execute($run)){
                move_uploaded_file($_FILES['approved_file']['tmp_name'], $location);
                
                    $return_data = array(
                        "status" => 1,
                        "message" => "Bank Account Transfers has been added!"
                    );
            }else{
                $return_data = array(
                  "status" => 0,
                  "message" => "Bank Account Transfers has not been added!"
                );
            }
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account Transfers has not been added!"
            );
        }
    
        oci_free_statement($run_salary);
        oci_free_statement($run_employee);
        oci_free_statement($run_master);
        oci_close($c); 
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "error found"
        );
    }

}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action not Matched"
    ); 
}
print(json_encode($return_data, JSON_PRETTY_PRINT));


?>