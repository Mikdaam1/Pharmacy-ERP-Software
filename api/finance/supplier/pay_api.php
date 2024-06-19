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

if(isset($_POST['action']) && $_POST['action'] == 'sup_head_chart_list'){
  $query = "SELECT A.AG_ID,A.AG_NAME,A.ACC_HEAD_CODE,A.ACC_CHARTACC_CODE,B.CHART_ACC_DESC,C.HEAD_DESC,B.ID AS CHART_ID
  FROM SET_SUPPLIER_MASTER A
  INNER JOIN CHART_DETAIL B ON (B.CHART_ACC_CODE = A.ACC_CHARTACC_CODE AND B.CHART_HEAD_CODE = A.ACC_HEAD_CODE)
  INNER JOIN CHART_HEAD C ON (C.HEAD_CODE = A.ACC_HEAD_CODE AND C.ACC_DETAIL_TYPE = A.ACC_DETAIL_TYPE AND C.ACC_TYPE = A.ACC_TYPE)";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data = '<option value="">Select Account</option>';
      
  while($row=oci_fetch_assoc($run))
  {
    $sup_id[] = $row['AG_ID'];
    $sup_name[] = $row['AG_NAME'];
    $sup_head[] = $row['HEAD_DESC'];
    $sup_chart[] = $row['CHART_ACC_DESC'];
    $chart_id[] = $row['CHART_ID'];
  }
  $x = "";
  $sel = "";
  for($i=0;$i<count($sup_head);$i++){
    if($x != $sup_head[$i])
    {
      $return_data .= '<option style="font-weight: bold;" disabled>'.$sup_head[$i].'</option>';
      if($sup_name[$i] == "")
      {
        $return_data .= '<option disabled>-</option>';
      }
      else
      {
        $return_data .= '<option data-code="'.$sup_id[$i].'" value="'.$chart_id[$i].'">('.$sup_chart[$i].') '.$sup_name[$i].'</option>';
      }
    }
    else
    {
      $return_data .= '<option data-code="'.$sup_id[$i].'" value="'.$chart_id[$i].'">('.$sup_chart[$i].') '.$sup_name[$i].'</option>';
    }
    $x = $sup_head[$i];
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'TAX'){
  $id = $_POST['id'];
  $query = "SELECT TAX_ID FROM COD_TAX_GROUP B INNER JOIN SET_SUPPLIER_MASTER C ON B.ID = C.GST WHERE C.AG_ID = '$id'";
  $run = oci_parse($c, $query);
  if(oci_execute($run)){
    $row = oci_fetch_assoc($run);
    $tax_id = $row['TAX_ID'];
    
    $query1 = "SELECT ID,TAX_NAME,DEFAULT_RATE,IMPACT FROM COD_TAX WHERE ID IN ($tax_id)";
    // print_r($query1); die();
    $run1 = oci_parse($c, $query1);
    oci_execute($run1);
    $return_data = [];
    while ($row1 = oci_fetch_assoc($run1)){
        $return_data[] = $row1;
    }
  }

  oci_free_statement($run);
  oci_close($c); 
}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_insert'){
  if(isset($_POST['tran_date']) && !(empty($_POST['tran_date']) )){
  // print_r($_POST); die();  
      $tran_date = $_POST['tran_date'];
      $acc_desc = $_POST['acc_desc'];
      $tran_date = new DateTime($tran_date);
      $tran_date = $tran_date->format('d:M:y'); // 27:Sep:21
      $customer_reference = $_POST['reference'];
      $memo = preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['memo_upper']);
      $from_acc = $_POST['from_acc']; 
      $bank_bal = $_POST['bank_bal'];
      $bank_bal = intval(preg_replace('/[^\d.]/', '', $bank_bal));
      $amount = $_POST['amount'];
      $amount = intval(preg_replace('/[^\d.]/', '', $amount));
      $total = $_POST['total'];
      $total = intval(preg_replace('/[^\d.]/', '', $total));
      
      if($bank_bal >= $amount){

          $query_fiscal_year = "SELECT td.FISCAL_YEAR 
                        FROM COD_DATE_LOCK td 
                        INNER JOIN COD_FISCAL_YEAR fy 
                        ON fy.SNO = td.FISCAL_YEAR 
                        WHERE fy.ACTIVE = 'Y' 
                        AND td.ACTIVE = 'Y' 
                        AND td.COMPANY_ID = '$company_id'";
          $run_fiscal_year = oci_parse($c, $query_fiscal_year);
          oci_execute($run_fiscal_year);
          $fiscal_year_row = oci_fetch_assoc($run_fiscal_year);

          $query_from_bank = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,ACC_HEAD_CODE,ACC_CHARTACC_CODE,BANK_ACC_NAME FROM BANKS_SETUP WHERE BANK_ID = '$from_acc'";
          $run_from_bank = oci_parse($c, $query_from_bank);
          oci_execute($run_from_bank);
          $from_bank_row = oci_fetch_assoc($run_from_bank);

          $query_voucher = "SELECT * FROM COD_VOUCHER_TYPE WHERE type = 'PV'";
          $run_voucher = oci_parse($c, $query_voucher);
          oci_execute($run_voucher);
          $run_voucher_row = oci_fetch_assoc($run_voucher);

          $query_supplier = "SELECT * FROM SET_SUPPLIER_MASTER WHERE AG_ID = '$acc_desc'";
          $run_supplier = oci_parse($c, $query_supplier);
          oci_execute($run_supplier);
          $run_supplier_row = oci_fetch_assoc($run_supplier);
          // print_r($query_supplier);die();

          if($fiscal_year_row > 0 && $from_bank_row > 0 && $run_voucher_row > 0 && $run_supplier_row > 0){

              $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

              $from_acc_name = $from_bank_row['BANK_ACC_NAME'];
              $from_acc_chart = $from_bank_row['ACC_CHARTACC_CODE'];
              $from_acc_head = $from_bank_row['ACC_HEAD_CODE'];
              $from_acc_type = $from_bank_row['ACC_DETAIL_TYPE'];
              $from_acc_group = $from_bank_row['ACC_TYPE'];

              $voucher_id = $run_voucher_row['ID'];
              $voucher_name = $run_voucher_row['TYPE'];
              $voucher_des = $run_voucher_row['DESCRIPTION'];

              $ag_id = $run_supplier_row['AG_ID'];
              $ag_name = $run_supplier_row['AG_NAME'];
              $to_acc_group = $run_supplier_row['ACC_TYPE'];
              $to_acc_type = $run_supplier_row['ACC_DETAIL_TYPE'];
              $to_acc_head = $run_supplier_row['ACC_HEAD_CODE'];
              $to_acc_chart = $run_supplier_row['ACC_CHARTACC_CODE'];
          
              $check_query = "SELECT MAX(VNO) AS VNO FROM V_DETAIL WHERE VTYPE = 'PV' AND FISCAL_YEAR = '$fiscal_year'";
              $check_run = oci_parse($c, $check_query);
              oci_execute($check_run);
              $check_row = oci_fetch_assoc($check_run);

              $check_query_B = "SELECT MAX(VNO) AS VNO FROM V_MASTER WHERE VTYPE = 'PV' AND FISCAL_YEAR = '$fiscal_year'";
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

              // TAX transaction
              for($i=0; $i< count($_POST['tax']); $i++){
                  $tax = $_POST['tax'][$i];
                  $tax = substr($tax, 0, -3);
                  $tax = preg_replace("/[,._-]+/", "", $tax);
                  $sup_acc = $_POST['sup_acc'][$i];

                  //GET
                  $query_tax_acc = "SELECT A.ID,A.TAX_NAME,B.CHART_ACC_CODE, B.CHART_ACC_DESC, C.HEAD_DESC, C.ACC_TYPE, C.ACC_DETAIL_TYPE, C.HEAD_CODE, A.IMPACT
                  FROM COD_TAX A
                  INNER JOIN CHART_DETAIL B
                  On A.SALES_GL_ACCOUNT = B.ID
                  INNER JOIN CHART_HEAD C
                  On C.HEAD_CODE = B.CHART_HEAD_CODE
                  WHERE A.TAX_NAME = '$sup_acc'";
                  $run_tax_acc = oci_parse($c, $query_tax_acc);
                  oci_execute($run_tax_acc);
                  $tax_acc_row = oci_fetch_assoc($run_tax_acc);

                  $tax_impact = $tax_acc_row['IMPACT'];
                  if($tax_impact == 1){
                    $tax_debit = $tax;
                    $tax_credit = '0';
                  }else{
                    $tax_debit = '0';
                    $tax_credit = $tax;
                  }

                  $tax_ID = $tax_acc_row['ID'];
                  $tax_name = $tax_acc_row['TAX_NAME'];
                  $tax_acc_chart = $tax_acc_row['CHART_ACC_CODE'];
                  $tax_acc_head = $tax_acc_row['HEAD_CODE'];
                  $tax_acc_type = $tax_acc_row['ACC_DETAIL_TYPE'];
                  $tax_acc_group = $tax_acc_row['ACC_TYPE'];
                  // print_r("hdhd");
                  
              }

              $query_master = "INSERT INTO V_MASTER (VNO,VTYPE,VTYPE_ID,VDATE,CHQDT,CHQNO,REMARKS,POSTED,AUTO_POSTED,PC_IP,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,FISCAL_YEAR) VALUES ('$V_no_MASTER','$voucher_name','$voucher_id','$tran_date','$tran_date','$customer_reference','$memo','N','N','$ip_address','$project_id','insert','$user_id','$current_date','$company_id','$fiscal_year')";
              $run_master = oci_parse($c, $query_master);
              print_r($query_master); DIE();
              if(oci_execute($run_master)){
                $query_v_detail_to = "INSERT INTO V_DETAIL (VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,CHQNO,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,SUPNO,SUPTYPE,ACCOUNT_ID,ACCOUNT_TITLE) VALUES ('$v_no_DETAIL','$voucher_name','$amount','0','$to_acc_head','$to_acc_chart','$to_acc_type','$to_acc_group','$memo','$tran_date','$customer_reference','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$ag_id','S','$ag_id','$ag_name')";
                $query_v_detail_from = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHQNO,SUPNO,SUPTYPE,ACCOUNT_ID,ACCOUNT_TITLE) VALUES ('$from_acc','$v_no_DETAIL','$voucher_name','0','$total','$from_acc_head','$from_acc_chart','$from_acc_type','$from_acc_group','$memo','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$customer_reference','$ag_id','S','$from_acc','$from_acc_name')";
                  //INSERT
                $query_v_detail_tax = "INSERT INTO V_DETAIL (VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,
                CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,CHQNO,ACTION_TYPE,ACTION_BY,
                ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,SUPNO,SUPTYPE,ACCOUNT_ID,ACCOUNT_TITLE) 
                VALUES ('$v_no_DETAIL','$voucher_name','$tax_debit','$tax_credit','$tax_acc_head',
                '$tax_acc_chart','$tax_acc_type','$tax_acc_group','$memo','$tran_date',
                '$customer_reference','insert','$user_id','$current_date','$ip_address','$company_id',
                '$project_id','$fiscal_year','$ag_id','S','$tax_ID','$tax_name')";
                // print_r($query_v_detail_tax);die();
                $run_v_detail_tax = oci_parse($c, $query_v_detail_tax);
                $run_v_detail_to = oci_parse($c, $query_v_detail_to);
                $run_v_detail_from = oci_parse($c, $query_v_detail_from);
                if( oci_execute($run_v_detail_from) && oci_execute($run_v_detail_to) && oci_execute($run_v_detail_tax) ){
                    $return_data = array(
                        "status" => 1,
                        "message" => "Supplier Payment has been added!"
                    );
                }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Supplier Payment has not been added!"
                    );
                }
                  oci_free_statement($run_v_detail_to);
                  oci_free_statement($run_v_detail_from);
                  oci_free_statement($run_master);
              }
          // print_r($query_v_detail_from); die();
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
              "message" => "total amount must be equal or less then from bank balance!"
          );
      }
      
      
  }else{
      $return_data = array(
          "status" => 0,
          "message" => "all fields are required!"
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