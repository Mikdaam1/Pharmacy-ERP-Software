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

if(isset($_POST['action']) && $_POST['action'] == 'To_Bank'){ 
  //print_r($_POST); die();
  if(isset($_POST['id']) && !(empty($_POST['id']))){
    $id = $_POST['id'];

    $query = "SELECT A.*,B.NAME,C.CHART_ACC_DESC AS GL_ACC,D.CHART_ACC_DESC AS CHARGE_AC
    FROM BANKS_SETUP A
    LEFT JOIN COD_BANK_TYPE B
    ON A.BANK_TYPE = B.ID
    LEFT JOIN CHART_DETAIL C
    ON A.CHART_PROJECT_ID = C.ID
    LEFT JOIN CHART_DETAIL D
    ON A.CHARGES_CHART_ID = D.ID
    WHERE A.COMPANY_ID = '$company_id'  
    AND A.DELETE_FLG = '0'
    AND A.BANK_ID != '$id'";
    //print_r($query); die();
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
    // print_r($_POST); die();
    $from_acc = $_POST['from_acc'];
    $to_acc = $_POST['to_acc'];
    $tran_date = $_POST['tran_date'];
    $ref_check_no = $_POST['ref_check_no'];
    $amount = $_POST['amount'];
    $bank_charge = $_POST['bank_charge'];
    $memo = $_POST['memo'];
    print_r($from_acc); 
    print_r($to_acc); 
    print_r($tran_date); 
    print_r($ref_check_no); 
    print_r($amount); 
    print_r($bank_charge); 
    print_r($memo); 
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
    WHERE AC.ID NOT IN (SELECT CHART_PROJECT_ID FROM BANKS_SETUP WHERE COMPANY_ID = '2' AND PROJECT_ID = '4') 
    AND AH.COMPANY_ID = '2' AND AC.PROJECT_ID = '4' AND AC.ACTIVE = 'Y' ORDER BY HEAD_ID ASC";
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

}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_insert_old'){
//   print_r($_POST); die();
  if(isset($_POST['transfer_date']) && isset($_POST['bank_acc']) && isset($_POST['gl_acc_id']) && isset($_POST['memo']) && isset($_POST['amount']) && !(empty($_POST['transfer_date']) || empty($_POST['bank_acc']) || empty($_POST['gl_acc_id']) || empty($_POST['memo']) || empty($_POST['amount']))){

      $transfer_date = $_POST['transfer_date'];
      $bank_acc = $_POST['bank_acc']; 
      $customer_reference = $_POST['reference'];
      $description = preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['description']);
      
      //print_r($_POST);
      //open fiscal year id
      $fy_q = "SELECT td.FISCAL_YEAR 
      FROM COD_DATE_LOCK td 
      INNER JOIN COD_FISCAL_YEAR fy 
      ON fy.SNO = td.FISCAL_YEAR 
      WHERE fy.ACTIVE = 'Y' 
      AND td.ACTIVE = 'Y' 
      AND td.COMPANY_ID = '2'";
      $fy_compiled = oci_parse($c, $fy_q);
      oci_execute($fy_compiled);
      $fy_row = oci_fetch_assoc($fy_compiled);
      $fy_id = $fy_row['FISCAL_YEAR'];
      //open fiscal year id
      
      // to bank acc name
      $to_bank_acc_name_q = "SELECT CHART_HEAD_CODE,CHART_ACC_CODE,ACC_HEAD_CODE,ACC_CHARTACC_CODE,BANK_NAME,BANK_ID 
      FROM BANKS_SETUP B 
      INNER JOIN CHART_DETAIL A 
      ON A.CHART_ACC_CODE = B.ACC_CHARTACC_CODE AND A.CHART_HEAD_CODE = B.ACC_HEAD_CODE
      WHERE B.BANK_ID = '$bank_acc' 
      AND B.DELETE_FLG = '0'
      AND B.COMPANY_ID = '$company_id'";
      
      $tban_compiled = oci_parse($c, $to_bank_acc_name_q);
      if(oci_execute($tban_compiled)){
          $tban_row =oci_fetch_assoc($tban_compiled);
          $to_bank_acc_name = $tban_row['BANK_NAME'];
          $to_gl_acc_code = $tban_row['ACC_HEAD_CODE']."-".$tban_row['ACC_CHARTACC_CODE'];
          print_r($to_gl_acc_code); die();
          
      }else{
          $return_data = array(
              "status" => 0,
              "message" => "an error occured!"
          );
      }
      // to bank acc name
      
      $memo = "Deposit To ".$to_bank_acc_name;
      
      // get DTB ID
      $deposit_trans_query = "SELECT * FROM SEC_TRANS_TYPE WHERE CODE_NAME = 'DTB'";
      $deposit_trans_compiled = oci_parse($c, $deposit_trans_query);
      if(oci_execute($deposit_trans_compiled)){
          $dtb_row =oci_fetch_assoc($deposit_trans_compiled);
          $dtb_id = $dtb_row['ID'];

          // get last Trans No of DTB ID
          $get_trans_no_query = "SELECT MAX(TRANS_NO) as TRANS_NO FROM SEC_BANK_ACCOUNT_TRANSFER WHERE TRANS_TYPE_ID = '$dtb_id' AND COMPANYID = '$companyid'";
          $get_trans_no_compiled = oci_parse($c, $get_trans_no_query);
          if(oci_execute($get_trans_no_compiled)){
              $gtn_row =oci_fetch_assoc($get_trans_no_compiled);
              $last_trans_no = $gtn_row['TRANS_NO'];

              if($last_trans_no == ""){
                  $trans_no = "1";
              }else{
                  $trans_no = $last_trans_no+1;
              }
              $reference = $trans_no."/".$current_year;
              
              
              // gl transaction
              $total_amount = 0;
              for($i=0;$i< count($_POST['gl_acc_id']); $i++){
                  $gl_acc_id = $_POST['gl_acc_id'][$i];
                  $amount = "-".((int)$_POST['amount'][$i]);
                  $memo_desc = $_POST['memo'][$i];
                  $total_amount += (int)$_POST['amount'][$i];

                  //get gl acc code
                  $gc_select = "SELECT ACC_CODE FROM SEC_ACCOUNTS WHERE ID = '$gl_acc_id' AND COMPANYID = '$companyid' AND FLG_DELETE = '$flg'";
                  $gc_compiled = oci_parse($c, $gc_select);
                  if(oci_execute($gc_compiled)){
                      $gc_row = oci_fetch_assoc($gc_compiled);
                      $from_gl_acc_code = $gc_row['ACC_CODE'];

                      $from_gl_insert_query="INSERT INTO SEC_GL_TRANSACTION (TRANS_TYPE_ID, TRANS_NO,FISCAL_YEAR_ID, TRANS_DATE, GL_ACC_CODE,MEMO,AMOUNT,COMPANYID,CITY_RIGHT,CREATEDAT,CREATEDBY,REFERENCE, CUSTOMER_REFERENCE) VALUES ('$dtb_id','$trans_no','$fy_id',TO_DATE('".$transfer_date."','YYYY-MM-DD'),'$from_gl_acc_code','$memo_desc','$amount','$companyid','$city_rights','$created_at','$userid','$reference','$customer_reference')";
                      $fgi_compiled = oci_parse($c, $from_gl_insert_query);
                      $fgi_run = oci_execute($fgi_compiled);
                  }else{
                      $return_data = array(
                          "status" => 0,
                          "message" => "an error occured!"
                      );
                  }
              }

              if($fgi_run){
                  // to bank query
                  $to_insert_query="INSERT INTO SEC_BANK_ACCOUNT_TRANSFER (BANK_ACC_ID, AMOUNT,REFERENCE, CUSTOMER_REFERENCE, DESCRIPTION,TRANSFER_DATE,COMPANYID,CITY_RIGHT,CREATEDAT,CREATEDBY,TRANS_TYPE_ID,TRANS_NO,FISCAL_YEAR_ID,MEMO) VALUES ('$bank_acc','$total_amount','$reference','$customer_reference','$description',TO_DATE('".$transfer_date."','YYYY-MM-DD'),'$companyid','$city_rights','$created_at','$userid','$dtb_id','$trans_no','$fy_id','$memo')";
                  $tiq_compiled = oci_parse($c, $to_insert_query);
                  if(oci_execute($tiq_compiled)){

                      // to bank in gl transaction query
                      $from_gl_insert_query="INSERT INTO SEC_GL_TRANSACTION (TRANS_TYPE_ID, TRANS_NO,FISCAL_YEAR_ID, TRANS_DATE, GL_ACC_CODE,MEMO,AMOUNT,COMPANYID,CITY_RIGHT,CREATEDAT,CREATEDBY,REFERENCE, CUSTOMER_REFERENCE) VALUES ('$dtb_id','$trans_no','$fy_id',TO_DATE('".$transfer_date."','YYYY-MM-DD'),'$to_gl_acc_code','$memo','$total_amount','$companyid','$city_rights','$created_at','$userid','$reference','$customer_reference')";
                      $fgi_compiled = oci_parse($c, $from_gl_insert_query);
                      $fgi_run = oci_execute($fgi_compiled);

                      $return_data = array(
                          "status" => 1,
                          "message" => "Bank Account Deposit Has Been Inserted!"
                      );
                  }else{
                      $return_data = array(
                          "status" => 0,
                          "message" => "Bank Account Deposit Has Not Been Inserted!"
                      );
                  }
              }else{
                  $return_data = array(
                      "status" => 0,
                      "message" => "Bank Account Deposit Has Not Been Inserted!"
                  );
              }
          }else{
              $return_data = array(
                  "status" => 0,
                  "message" => "an error occured!"
              );
          }
      }else{
          $return_data = array(
              "status" => 0,
              "message" => "an error occured!"
          );
      }
      // oci_free_statement($compiled);
      // oci_free_statement($getcompiled);
      // oci_free_statement($Podetaildata);
      
      // oci_close($c);
  }else{
      $return_data = array(
          "status" => 0,
          "message" => "all fields are required!"
      );
  }

}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_insert'){
    // print_r($_POST); die();
    if(isset($_POST['gl_acc_id']) && !(empty($_POST['gl_acc_id']) )){
        //   print_r($_POST); die();
        $tran_date = $_POST['tran_date'];
        $tran_date = new DateTime($tran_date);
        $tran_date = $tran_date->format('d:M:y'); // 27:Sep:21
        $from_acc = $_POST['from_acc']; 
        $customer_reference = $_POST['reference'];
        $bank_bal = substr($_POST['bank_bal'], 0, -3);
        $total = substr($_POST['total'], 0, -3);
        $bank_balance = preg_replace("/[^0-9]+/", "", $bank_bal);
        $grand_total = preg_replace("/[^0-9]+/", "", $total);
        $memo_upper = preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['memo_upper']);
        if($bank_balance >= $grand_total){

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

            $query_from_bank = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,ACC_HEAD_CODE,ACC_CHARTACC_CODE FROM BANKS_SETUP WHERE BANK_ID = '$from_acc'";
            // print_r($query_from_bank); die();
            $run_from_bank = oci_parse($c, $query_from_bank);
            oci_execute($run_from_bank);
            $from_bank_row = oci_fetch_assoc($run_from_bank);

            $query_voucher = "SELECT * FROM COD_VOUCHER_TYPE WHERE type = 'PV'";
            $run_voucher = oci_parse($c, $query_voucher);
            oci_execute($run_voucher);
            $run_voucher_row = oci_fetch_assoc($run_voucher);

            if($fiscal_year_row > 0 && $from_bank_row > 0 && $run_voucher_row > 0){

                $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

                $from_acc_chart = $from_bank_row['ACC_CHARTACC_CODE'];
                $from_acc_head = $from_bank_row['ACC_HEAD_CODE'];
                $from_acc_type = $from_bank_row['ACC_DETAIL_TYPE'];
                $from_acc_group = $from_bank_row['ACC_TYPE'];

                $voucher_id = $run_voucher_row['ID'];
                $voucher_name = $run_voucher_row['TYPE'];
                $voucher_des = $run_voucher_row['DESCRIPTION'];
            
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

                // gl transaction
                $total_amount = 0;
                for($i=0; $i< count($_POST['gl_acc_id']); $i++){
                    $gl_acc_id = $_POST['gl_acc_id'][$i];
                    $amount = $_POST['amount'][$i];
                    $amount = substr($amount, 0, -3);
                    $amount = preg_replace("/[,._-]+/", "", $amount);
                    // $amount = "-".((int)$_POST['amount'][$i]);
                    $memo = $_POST['memo'][$i];
                    $total_amount += (int)$amount;

                    //GET
                    $query_to_acc = "SELECT AH.ACC_TYPE,AH.ACC_DETAIL_TYPE,AH.HEAD_CODE,CHART_ACC_CODE
                                    FROM CHART_HEAD AH 
                                    LEFT JOIN CHART_DETAIL AC 
                                    ON AH.HEAD_CODE = AC.CHART_HEAD_CODE 
                                    WHERE AC.ID = '$gl_acc_id'";
                    $run_to_acc = oci_parse($c, $query_to_acc);
                    oci_execute($run_to_acc);
                    $to_acc_row = oci_fetch_assoc($run_to_acc);

                    $to_acc_chart = $to_acc_row['CHART_ACC_CODE'];
                    $to_acc_head = $to_acc_row['HEAD_CODE'];
                    $to_acc_type = $to_acc_row['ACC_DETAIL_TYPE'];
                    $to_acc_group = $to_acc_row['ACC_TYPE'];
                    
                    //INSERT
                    $query_v_detail_to = "INSERT INTO V_DETAIL (VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR) 
                                            VALUES ('$v_no_DETAIL','$voucher_name','0','$amount','$to_acc_head','$to_acc_chart','$to_acc_type','$to_acc_group','$memo','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year')";
                    $run_v_detail_to = oci_parse($c, $query_v_detail_to);
                    // print_r($query_v_detail_to);die();
                    oci_execute($run_v_detail_to);
                    
                }
            
                $query_v_detail_from = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHQNO) 
                                        VALUES ('$from_acc','$v_no_DETAIL','$voucher_name','$total_amount','0','$from_acc_head','$from_acc_chart','$from_acc_type','$from_acc_group','$memo_upper','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$customer_reference')";
                $query_master = "INSERT INTO V_MASTER (VNO,VTYPE,VTYPE_ID,VDATE,CHQDT,CHQNO,REMARKS,POSTED,AUTO_POSTED,PC_IP,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,FISCAL_YEAR) 
                                VALUES ('$V_no_MASTER','$voucher_name','$voucher_id','$tran_date','$tran_date','$customer_reference','$memo_upper','N','N','$ip_address','$project_id','insert','$user_id','$current_date','$company_id','$fiscal_year')";
                
                // print_r($query_v_detail_from); die();
                $run_v_detail_from = oci_parse($c, $query_v_detail_from);
                $run_master = oci_parse($c, $query_master);



                if(oci_execute($run_v_detail_from) && oci_execute($run_master) ){
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
                "message" => "error found"
                );
            }

            oci_free_statement($run_v_detail_to);
            oci_free_statement($run_v_detail_from);
            oci_free_statement($run_master);
            oci_close($c); 
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Total amount must be equal or less then from bank balance!"
            );
        }
        
        
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Add atleast one payment voucher row!"
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