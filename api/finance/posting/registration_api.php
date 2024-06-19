<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
// $json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());;
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $bank_id=$_POST['bank_id'];
    $query = "SELECT A.INVOICE_NO,
    A.RECEIPT_NO,
    A.SALE_TRNO,
    B.AMOUNT,
    A.TRANS_DATE,
    B.TRNO,
    B.FORM_NO
    FROM  AVAILABLE_VOUCHER_NO B
    INNER JOIN COD_PAYMENT_RECEIPT A
    ON A.FORM_NO = B.FORM_NO
    WHERE B.VOIDE = 'N'
    AND B.PROJECT_ID = '4'
    AND B.CHARGES_TYPE = '68'
    AND A.REG_TYPE = 'R' AND A.DEPOSITE IS NULL AND A.BANK_ID='$bank_id'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'get_bank_acc'){
    
    $query = "SELECT DISTINCT C.BANK_NAME,C.BANK_ID 
    FROM BANKS_SETUP C
    INNER JOIN COD_PAYMENT_RECEIPT A
    ON C.BANK_ID = A.BANK_ID
    INNER JOIN AVAILABLE_VOUCHER_NO B
    ON A.FORM_NO = B.FORM_NO
    WHERE B.CHARGES_TYPE = '68'
    AND A.REG_TYPE = 'R'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'registration_post'){
    // print_r((is_array($_POST['bulkchecked'])? 'Array' : 'not an Array'));
    // $bulkchecked =  explode(",", $_POST['bulkchecked']);
    // print_r($_POST); die();
    // $bulkchecked = $_POST['bulkchecked'];
    $bulkchecked = json_decode($_POST['bulkchecked']);
    // $bulkchecked =  $_POST['bulk_checked'];
    // print_r($bulkchecked); die();
    // print_r(is_array($bulkchecked)? 'Array' : 'not an Array');
    // print_r($bulkchecked);die();
    // $current_date = date('j:M:y');

    //fiscal year
    $query_fiscal_year = "SELECT td.FISCAL_YEAR 
                    FROM COD_DATE_LOCK td 
                    INNER JOIN COD_FISCAL_YEAR fy 
                    ON fy.SNO = td.FISCAL_YEAR 
                    WHERE fy.ACTIVE = 'Y' 
                    AND td.ACTIVE = 'Y' 
                    AND td.COMPANY_ID = '$company_id'";
// print_r($query_fiscal_year); die();
    $run_fiscal_year = oci_parse($c, $query_fiscal_year);
    oci_execute($run_fiscal_year);
    $fiscal_year_row = oci_fetch_assoc($run_fiscal_year);
    //fiscal year


    //receivable account

        
    $query_reg_receive_gl_account = "SELECT * FROM COD_SYSTEM_GL_SETUP WHERE SUB_ID = '1'";

    $run_reg_receive_gl_account = oci_parse($c, $query_reg_receive_gl_account);
    oci_execute($run_reg_receive_gl_account);
    $reg_receive_gl_account_row = oci_fetch_assoc($run_reg_receive_gl_account);


    //voucher type
    $query_voucher = "SELECT * FROM VOUCHER_TYPES WHERE DESCRIPTION = 'RV'";
    $run_voucher = oci_parse($c, $query_voucher);
    oci_execute($run_voucher);
    $run_voucher_row = oci_fetch_assoc($run_voucher);
    //voucher type

    if($fiscal_year_row > 0 && $run_voucher_row > 0  && $reg_receive_gl_account_row > 0){

        

        $gl_rec_acc_type = $reg_receive_gl_account_row['ACC_TYPE'];
        $gl_rec_acc_detail = $reg_receive_gl_account_row['ACC_DETAIL'];
        $gl_rec_acc_head = $reg_receive_gl_account_row['ACC_HEAD'];
        $gl_rec_acc_chart = $reg_receive_gl_account_row['ACC_CHART'];

        $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

        $voucher_id = $run_voucher_row['TYPE_ID'];
        $voucher_name = $run_voucher_row['DESCRIPTION'];
        // $voucher_des = $run_voucher_row['DESCRIPTION'];
    
        // $check_query = "SELECT MAX(VNO) AS VNO FROM V_DETAIL WHERE VTYPE = 'RV' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND FISCAL_YEAR = '$fiscal_year'";
        // $check_run = oci_parse($c, $check_query);
        // oci_execute($check_run);
        // $check_row = oci_fetch_assoc($check_run);
    

        foreach ($bulkchecked as $receipt_number) {

            $check_query_B = "SELECT (case when MAX(VNO) is null then 0 else MAX(VNO) end) VNO FROM V_MASTER WHERE VTYPE = 'RV' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND FISCAL_YEAR = '$fiscal_year'";
            // print_r($check_query_B);die();
            $check_run_B = oci_parse($c, $check_query_B);
            oci_execute($check_run_B);
            $check_row_B = oci_fetch_assoc($check_run_B);
    
            $v_no_DETAIL = $check_row_B['VNO']+'1';
            $V_no_MASTER = $check_row_B['VNO']+'1';

            $receipt_no = $receipt_number;
    
            $get_data = "SELECT A.BANK_ID,A.INVOICE_NO,A.AMOUNT,A.REC_DATE,F.NAMENAME,A.TRANS_DATE,C.CUS_ID,A.CHEAQUE_DATE,A.CHEAQUE_NO,E.TYPE_DESC AS UNIT_TYPE_NAME,D.CUS_NAME
                        FROM COD_PAYMENT_RECEIPT A
                        LEFT JOIN AVAILABLE_VOUCHER_NO B
                        ON A.RECEIPT_NO = B.AVAILABLE_VOUCHER
                        LEFT JOIN COD_FORM_REG C
                        ON B.FORM_NO = C.FORM_NO
                        LEFT JOIN COD_CUSTOMER_MASTER D
                        ON C.CUS_ID = D.CUS_ID
                        LEFT JOIN B_UNIT_TYPES E
                        ON C.UNIT_CATEGORY_ID = E.TYPE_ID
                        LEFT JOIN COD_USER_LOGIN F 
                        ON F.ID=C.ACTION_BY
                        WHERE A.INVOICE_NO='$receipt_no'";
            // print_r($get_data); DIE();
            $get_data = oci_parse($c, $get_data);    
            oci_execute($get_data);
            $row = oci_fetch_assoc($get_data);
            $bank_id = $row['BANK_ID'];
            $receipt_no = $row['INVOICE_NO'];
            $amount = $row['AMOUNT'];
            $allotte = $row['CUS_ID'];
            $rec_date = $row['REC_DATE'];
            $user_id_sales = $row['NAMENAME'];
            $trans_date = $row['TRANS_DATE'];
            $receipt_no_for_detail = $row['INVOICE_NO'];
            $receipt_no_for_master = 'RCV-'.$row['INVOICE_NO'];
            $cheaque_date = $row['CHEAQUE_DATE'];
            $cheaque_no = $row['CHEAQUE_NO'];
            $unit_type = $row['UNIT_TYPE_NAME'];
            $cus_name = $row['CUS_NAME'];
            //credit amount from customer gl

            $memo="Receiving against Sale of ".$unit_type." from ".$cus_name." Receipt #" .$receipt_no;

            //customer gl account
            $query_allottee_gl_account = "SELECT a.chart_head_code,a.chart_acc_code,a.acc_type,a.acc_detail_type,a.chart_acc_desc,b.bank_name
            from chart_detail a, banks_setup b where a.chart_head_code=b.acc_head_code 
            and a.chart_acc_code=b.acc_chartacc_code  and a.acc_type=b.acc_type and a.acc_detail_type=b.acc_detail_type 
            and b.bank_id='$bank_id' and a.project_id='$project_id' and a.company_id='$company_id'";

            $run_allottee_gl_account = oci_parse($c, $query_allottee_gl_account);
            oci_execute($run_allottee_gl_account);
            $allottee_gl_account_row = oci_fetch_assoc($run_allottee_gl_account);
            //customer gl account

            $gl_acc_type = $allottee_gl_account_row['ACC_TYPE'];
            $gl_acc_detail = $allottee_gl_account_row['ACC_DETAIL_TYPE'];
            $gl_acc_head = $allottee_gl_account_row['CHART_HEAD_CODE'];
            $gl_acc_chart = $allottee_gl_account_row['CHART_ACC_CODE'];

            //v_master_query
            $v_master_query = "INSERT INTO V_MASTER (VNO,VTYPE,VDATE,REMARKS,CHQDT,CHQNO,POSTED,SYSDT,USR,SOURCE,VTYPE_ID,PROJECT_ID,POSTED_BY,POSTED_ON,PC_IP,COMPANY_ID,FISCAL_YEAR) 
                                                        VALUES ('$V_no_MASTER','$voucher_name','$rec_date','$memo','$cheaque_date','$cheaque_no','Y','$trans_date','$user_id_sales','$receipt_no_for_master','$voucher_id','$project_id','$user_id','$current_date','$ip_address','$company_id','$fiscal_year')	";
            // print_r($v_master_query);
            //v_master_query
            $credit_amount_from_cus_gl = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,INVNO,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,SUPNO,SUPTYPE,ACC_TYPE,ACC_DETAIL_TYPE,HEAD_CODE,CHART_ACC_CODE) 
                                                        VALUES ('$bank_id','$v_no_DETAIL','$voucher_name','$amount','0','$receipt_no_for_detail','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$allotte','C','$gl_rec_acc_type','$gl_rec_acc_detail','$gl_rec_acc_head','$gl_rec_acc_chart')";
            // print_r($credit_amount_from_cus_gl);
            //debit amount to bank
            $debit_amount_to_bank = "INSERT INTO V_DETAIL (BANK_ID,VNO,VTYPE,DEBIT,CREDIT,INVNO,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,SUPNO,SUPTYPE,ACC_TYPE,ACC_DETAIL_TYPE,HEAD_CODE,CHART_ACC_CODE) 
                                                        VALUES ('$bank_id','$v_no_DETAIL','$voucher_name','0','$amount','$receipt_no_for_detail','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$allotte','C','$gl_acc_type','$gl_acc_detail','$gl_acc_head','$gl_acc_chart')";
            // print_r($debit_amount_to_bank);
            $payment_receipt_update_query = "UPDATE COD_PAYMENT_RECEIPT 
            SET VNO = '$V_no_MASTER',
                VTYPE = '$voucher_id',
                DEPOSITE = 'Y',
                POSTED_BY = '$user_id',
                POSTED_ON = '$current_date',
                COMPANY_ID = '$company_id',
                FISCAL_YEAR = '$fiscal_year'
             WHERE INVOICE_NO = '$receipt_no'";
            //   print_r($payment_receipt_update_query);    DIE();

            $v_master_query_r = oci_parse($c, $v_master_query);
            $credit_amount_from_cus_gl_r = oci_parse($c, $credit_amount_from_cus_gl);
            $debit_amount_to_bank_r = oci_parse($c, $debit_amount_to_bank);
            $payment_receipt_update_query_r = oci_parse($c, $payment_receipt_update_query);

            $v_master_query_run = oci_execute($v_master_query_r);
            $credit_amount_from_cus_gl_run = oci_execute($credit_amount_from_cus_gl_r);
            $debit_amount_to_bank_run = oci_execute($debit_amount_to_bank_r);
            $payment_receipt_update_query_run = oci_execute($payment_receipt_update_query_r);

        } 
        if($credit_amount_from_cus_gl_run && $debit_amount_to_bank_run && $v_master_query_run && $payment_receipt_update_query_run){
            $return_data = array(
                "status" => 1,
                "message" => "Invoices has been posted successfully!"
            );
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Invoices has not been posted!"
            );
        }
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "error found"
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