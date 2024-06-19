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

if(isset($_POST['action']) && $_POST['action'] == 'BALANCE'){ 
  //print_r($_POST); die();
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];

    $query = "SELECT BALANCES
    FROM VIEW_BANK_BAL_DASHBORAD
    WHERE BANK_ID = '$id'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c); 
  }else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required" 
    );
  } 


}elseif(isset($_POST['action']) && $_POST['action'] == 'To_Bank'){ 
  //print_r($_POST); die();
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];

    $query = "SELECT *
    FROM BANKS_SETUP
    WHERE PROJECT_ID = '$project_id'  
    AND COMPANY_ID = '$company_id'  
    AND DELETE_FLG = '0'   
    AND BANK_ID != '$id' 
    ORDER BY BANK_ID";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c); 
  }else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required" 
    );
  } 


}elseif(isset($_POST['action']) && $_POST['action'] == 'Transaction_date'){ 
 
    $query = "SELECT * FROM COD_DATE_LOCK WHERE ACTIVE = 'Y'";
    //print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c); 

    //print_r($_POST); 
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert_update'){  
  if(isset($_POST['from_acc']) && isset($_POST['to_acc']) && isset($_POST['tran_date']) && isset($_POST['ref_check_no']) && isset($_POST['amount']) && isset($_POST['bank_charge']) && isset($_POST['memo']) && !empty($_POST['from_acc']) ||  !empty($_POST['to_acc']) ||  !empty($_POST['tran_date']) ||  !empty($_POST['ref_check_no']) ||  !empty($_POST['amount']) ||  !empty($_POST['bank_charge']) ||  !empty($_POST['memo'])){
    
    $from_acc = $_POST['from_acc'];
    $to_acc = $_POST['to_acc'];
    $tran_date = $_POST['tran_date'];
    // $tran_date = moment($tran_date).format("YYYY-MM-DD");
    // print_r($tran_date); 
    // print_r($current_date); die();
    $ref_check_no = $_POST['ref_check_no'];
    $amount = $_POST['amount'];
    $amount = substr($amount, 0, -3);
    $bank_charge = $_POST['bank_charge'];
    $bank_charge = substr($bank_charge, 0, -3);
    $bank_bal = $_POST['bank_bal'];
    $bank_bal = substr($bank_bal, 0, -3);
    $tran_date = new DateTime($tran_date);
    $tran_date = $tran_date->format('d:M:y'); // 27:Sep:21
    $total_amount = $amount + $bank_charge;
    
    $memo = preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['memo']);

    if($total_amount > $bank_bal){
      
      $return_data = array(
        "status" => 0,
        "message" => "Sum of Amount and Bank Charges must be less than from Bank Balance!"
      );

    }else{

      $query_fiscal_year = "SELECT td.FISCAL_YEAR 
                            FROM COD_DATE_LOCK td 
                            INNER JOIN COD_FISCAL_YEAR fy 
                            ON fy.SNO = td.FISCAL_YEAR 
                            WHERE fy.ACTIVE = 'Y' 
                            AND td.ACTIVE = 'Y' 
                            AND td.COMPANY_ID = '2'";
      $run_fiscal_year = oci_parse($c, $query_fiscal_year);
      oci_execute($run_fiscal_year);
      $fiscal_year_row = oci_fetch_assoc($run_fiscal_year);

      $query_from_acc = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,ACC_HEAD_CODE,ACC_CHARTACC_CODE FROM BANKS_SETUP WHERE BANK_ID = '$from_acc'";
      $run_from_acc = oci_parse($c, $query_from_acc);
      oci_execute($run_from_acc);
      $from_acc_row = oci_fetch_assoc($run_from_acc);

      $query_to_acc = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,ACC_HEAD_CODE,ACC_CHARTACC_CODE FROM BANKS_SETUP WHERE BANK_ID = '$to_acc'";
      $run_to_acc = oci_parse($c, $query_to_acc);
      oci_execute($run_to_acc);
      $to_acc_row = oci_fetch_assoc($run_to_acc);

      $query_voucher = "SELECT * FROM COD_VOUCHER_TYPE WHERE TYPE = 'TR'";
      $run_voucher = oci_parse($c, $query_voucher);
      oci_execute($run_voucher);
      $run_voucher_row = oci_fetch_assoc($run_voucher);

      $query_charges = "SELECT ID,NAME,ACC_TYPE,ACC_DETAIL,ACC_HEAD,ACC_CHART FROM COD_SYSTEM_GL_SETUP WHERE NAME = 'charges_account'";
      $run_charges = oci_parse($c, $query_charges);
      oci_execute($run_charges);
      $run_charges_row = oci_fetch_assoc($run_charges);

      if($from_acc_row > 0 && $to_acc_row > 0 && $fiscal_year_row > 0 && $run_voucher_row > 0 && $run_charges_row > 0){

        $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

        $charges_id = $run_charges_row['ID'];
        $charges_acc_chart = $run_charges_row['ACC_CHART'];
        $charges_acc_head = $run_charges_row['ACC_HEAD'];
        $charges_acc_type = $run_charges_row['ACC_DETAIL'];
        $charges_acc_group = $run_charges_row['ACC_TYPE'];

        $voucher_id = $run_voucher_row['ID'];
        $voucher_name = $run_voucher_row['TYPE'];
        $voucher_des = $run_voucher_row['DESCRIPTION'];

        $from_acc_chart = $from_acc_row['ACC_CHARTACC_CODE'];
        $from_acc_head = $from_acc_row['ACC_HEAD_CODE'];
        $from_acc_type = $from_acc_row['ACC_DETAIL_TYPE'];
        $from_acc_group = $from_acc_row['ACC_TYPE'];

        $to_acc_chart = $to_acc_row['ACC_CHARTACC_CODE'];
        $to_acc_head = $to_acc_row['ACC_HEAD_CODE'];
        $to_acc_type = $to_acc_row['ACC_DETAIL_TYPE'];
        $to_acc_group = $to_acc_row['ACC_TYPE'];
    
        $check_query = "SELECT MAX(VNO) AS VNO FROM V_DETAIL WHERE VTYPE = 'TR' AND FISCAL_YEAR = '$fiscal_year'";
        $check_run = oci_parse($c, $check_query);
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);

        $check_query_B = "SELECT MAX(VNO) AS VNO FROM V_MASTER WHERE VTYPE = 'TR' AND FISCAL_YEAR = '$fiscal_year'";
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
        // print_r($_POST); 
        // print_r($fiscal_year); die();
        $query_v_detail_from = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQNO,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHARGES_TYPE_ID) VALUES ('$from_acc','$v_no_DETAIL','$voucher_name','$total_amount','0','$from_acc_head','$from_acc_chart','$from_acc_type','$from_acc_group','$memo','$ref_check_no','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$charges_id')";
        $query_v_detail_to = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQNO,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHARGES_TYPE_ID) VALUES ('$to_acc','$v_no_DETAIL','$voucher_name','0','$amount','$to_acc_head','$to_acc_chart','$to_acc_type','$to_acc_group','$memo','$ref_check_no','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$charges_id')";
        $query_bank_charge = "INSERT INTO V_DETAIL (VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQNO,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHARGES_TYPE_ID) VALUES ('$v_no_DETAIL','$voucher_name','0','$bank_charge','$charges_acc_head','$charges_acc_chart','$charges_acc_type','$charges_acc_group','$memo','$ref_check_no','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$charges_id')";
        $query_master = "INSERT INTO V_MASTER (VNO,VTYPE,VTYPE_ID,VDATE,CHQDT,REMARKS,POSTED,AUTO_POSTED,CHQNO,PC_IP,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,FISCAL_YEAR) VALUES ('$V_no_MASTER','$voucher_name','$voucher_id','$tran_date','$tran_date','$memo','N','N','$ref_check_no','$ip_address','$project_id','insert','$user_id','$current_date','$company_id','$fiscal_year')";
        
        // print_r($query_master); die();
        $run_v_detail_from = oci_parse($c, $query_v_detail_from);
        $run_v_detail_to = oci_parse($c, $query_v_detail_to);
        $run_bank_charge = oci_parse($c, $query_bank_charge);
        $run_master = oci_parse($c, $query_master);



          if(oci_execute($run_v_detail_from) && oci_execute($run_v_detail_to) && oci_execute($run_bank_charge) && oci_execute($run_master) ){
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
      
          oci_free_statement($run_from_acc);
          oci_free_statement($run_to_acc);
          oci_free_statement($run_bank_charge);
          oci_free_statement($run_master);
          oci_close($c); 
      }else{
          $return_data = array(
            "status" => 0,
            "message" => "error found"
          );
      }
    }

  }else{
      $return_data = array(
        "status" => 0,
        "message" => "All Fields Are Required"
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