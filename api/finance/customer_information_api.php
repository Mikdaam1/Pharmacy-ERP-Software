<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
if(isset($_POST['action']) && $_POST['action'] == 'spec_cust_view'){
    if(isset($_POST['search_type']) && isset($_POST['search_number']) && !(empty($_POST['search_type']) || empty($_POST['search_number']))){
        $query = "SELECT BM.REGISTRATION_FORM_NO,CM.*,CS.CITY_NAME,PS.DESCRIPTION AS PROVINCE_NAME,COS.COUNTRY_DESC AS COUNTRY_NAME,
        PRS.PARTICULARS,BCT.DESCRIPTION,MC.REMARKS 
        FROM COD_CUSTOMER_MASTER CM
        LEFT JOIN B_UNIT_BOOKING_MASTER BM ON CM.CUS_ID=BM.ALLOTTE  
        LEFT JOIN COD_FORM_REG FR ON FR.FORM_NO=BM.REGISTRATION_FORM_NO  
        LEFT JOIN CITY_SETUP CS ON CS.CITY_ID = CM.CITY_ID
        LEFT JOIN PROVINCE_SETUP PS ON PS.PROVINCE_ID = CM.PROVINCE_ID
        LEFT JOIN COUNTRY_SETUP COS ON COS.COUNTRY_ID = CM.COUNTRY_ID
        LEFT JOIN PRJ_PROJECT_SETUP PRS ON PRS.PROJECT_ID = CM.PROJECT_ID
        LEFT JOIN B_BOOKING_CHARGES_TYPES BCT ON BCT.TYPE_ID = FR.TYPE_ID
        LEFT JOIN BALLOT_CAMPAIGN_MASTER MC ON MC.CAMPAIGN_ID = FR.CAMPAIGN_ID";

        if($_POST['search_type'] == 'cnic'){
            $query .= " WHERE CM.CNIC_NO ='".$_POST['search_number']."'";
        }elseif($_POST['search_type'] == 'form_number'){
            $query .= " WHERE BM.REGISTRATION_FORM_NO ='".$_POST['search_number']."'";
        }else{
            $query .= " WHERE CM.CUS_ID ='".$_POST['search_number']."'";
        }

        // print_r($query);die();
        $run = oci_parse($c, $query);
        oci_execute($run);
        $row = oci_fetch_assoc($run);
        if($row > 0){
            $return_data = array(
              "status" => 1,
              "data" => $row
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Data Not Found. Try another number"
            );
        }
    
        oci_free_statement($run);
        oci_close($c);

    }
    else{
        $return_data = array(
          "status" => 0,
          "message" => "Search fields Error"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'allotment_details'){
    if(isset($_POST['search_type']) && isset($_POST['search_number']) && !(empty($_POST['search_type']) || empty($_POST['search_number']))){
        
        $query = "SELECT  FG.CONFIRMATION,a.sale_id,a.sale_date,a.Allotte,a.Booking_date,a.Sale_Status,a.Asset_code,
                    a.Cancel_date,a.REGISTRATION_FORM_NO as form_no,c.REMARKS,b.TIME_FARME 
                    FROM cod_form_reg FG
                    INNER JOIN B_UNIT_BOOKING_MASTER a ON FG.FORM_NO=a.REGISTRATION_FORM_NO
                    left join Time_Frame_Master b
                    on a.TIME_FRAME_ID = b.TIME_FRAME_ID
                    left join BALLOT_CAMPAIGN_MASTER c 
                    on a.Campaign_id = c.CAMPAIGN_ID";

        if($_POST['search_type'] == 'cnic'){
            $query .= " where a.sale_id in (select sale_id from B_UNIT_BOOKING_MASTER aa inner join COD_CUSTOMER_MASTER bb on aa.allotte = bb.cus_id where CNIC_NO = '".$_POST['search_number']."')";
        }elseif($_POST['search_type'] == 'form_number'){
            $query .= " where a.REGISTRATION_FORM_NO = '".$_POST['search_number']."'";
        }elseif($_POST['search_type'] == 'cus_id'){
            $query .= " where a.sale_id in (select sale_id from B_UNIT_BOOKING_MASTER where allotte = '".$_POST['search_number']."')";
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "select valid option"
            );
        }
        // print_r($query);die();
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
          "message" => "Search fields Error"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_schedule'){
    if(isset($_POST['search_type']) && isset($_POST['search_number']) && !(empty($_POST['search_type']) || empty($_POST['search_number']))){
        $query = "select sale_id,a.sale_trno  sno ,b.description Particular ,a.schedule_date Schedule_Date, a.due_date Due_Date,a.received_date Paid_On,a.schedule_amount Due_Amount,a.discount Discount,a.amount Amount,
                CASE 
                WHEN a.received = 'Y' THEN  a.amount
                WHEN a.received = 'N' THEN 0
                END RECIVED_AMOUNT,
                CASE 
                WHEN a.received = 'Y' THEN  a.amount-a.schedule_amount
                WHEN a.received = 'N' THEN a.amount-0
                END Balance_AMOUNT
                from b_unit_booking_detail a
                left join b_booking_charges_types b 
                on a.charges_type_id = b.type_id";
        
        if($_POST['search_type'] == 'cnic'){
            $query .= " where sale_id in (select sale_id from B_UNIT_BOOKING_MASTER aa inner join COD_CUSTOMER_MASTER bb on aa.allotte = bb.cus_id where cnic_no='".$_POST['search_number']."') order by sale_id, sale_trno";
        }elseif($_POST['search_type'] == 'form_number'){
            $query .= " WHERE sale_id = (select sale_id from B_UNIT_BOOKING_MASTER where REGISTRATION_FORM_NO = '".$_POST['search_number']."') order by sale_id, sale_trno";
        }elseif($_POST['search_type'] == 'cus_id'){
            $query .= " WHERE sale_id in (select sale_id from B_UNIT_BOOKING_MASTER where allotte = '".$_POST['search_number']."') order by sale_id, sale_trno";
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "select valid option"
            );
        }
        
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
          "message" => "Search fields Error"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'view_invoices'){
    if(isset($_POST['form_no']) && !empty($_POST['form_no'])){
        $form_no = $_POST['form_no'];
        $query = "SELECT IM.PAID,IM.VOIDE,IM.SALE_ID,CG.FORM_NO,CG.CUS_ID,CM.CUS_NAME,IM.TRNO AS INV_ID,CM.CNIC_NO,CM.CONTACT_NO,IM.EXPIRE_DATE,IM.AMOUNT,IM.BOOKING_DETAIL_ID
                    FROM COD_FORM_REG CG
                    LEFT JOIN COD_CUSTOMER_MASTER CM
                    ON CG.CUS_ID = CM.CUS_ID
                    LEFT JOIN AVAILABLE_VOUCHER_NO IM
                    ON CG.FORM_NO = IM.FORM_NO
                    WHERE CM.PROJECT_ID='4'
                    AND CM.COMPANY_ID='2'
                    AND CG.FORM_NO = '$form_no'
                    ORDER BY IM.TRNO ASC";
                    // print_r($query);die();
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
            "message" => "field required"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_receipt'){
    if(isset($_POST['customer_id']) && !(empty($_POST['customer_id']))){
        $customer_id = $_POST['customer_id'];
        $query = "select a.Sale_Trno,a.REC_NO, a.Rec_Date, a.Amount,b.bank_name,a.Cheaque_no,a.cheaque_date,a.PAYMENT_MODE_ID,a.Receipt_NO,a.ASSET_CODE,a.VNO from b_sale_payment_receipt a, banks_setup b WHERE a.bank_id=b.bank_id  AND sale_id=(select sale_id from b_unit_booking_master where allotte='$customer_id')";
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
          "message" => "customer id required"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'voucher_detail'){
    if(isset($_POST['customer_id']) && !(empty($_POST['customer_id']))){
        $customer_id = $_POST['customer_id'];
        $query = "Select a.vno,a.vtype,a.vdate,a.remarks,a.source from v_master a, b_sale_payment_receipt b where a.vno=b.vno AND b.sale_id=(select sale_id from b_unit_booking_master where allotte='$customer_id') AND VTYPE_ID =2 AND a.project_id='$project_id'";
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
          "message" => "customer id required"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'selcted_voucher_detail'){
    if(isset($_POST['voucher_no']) && !(empty($_POST['voucher_no']))){
        $voucher_no = $_POST['voucher_no'];
        $query = "select a.vno,a.vtype,b.head_name,a.chart_acc_code,a.debit,a.credit,a.invno,a.pono,a.unit_id from v_detail a, cod_account_head b where vno='$voucher_no' and vtype='RV' and a.head_code=b.head_code and  project_id='$project_id'";
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
          "message" => "customer id required"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'generate_quarter_challan'){
    
    $booking_detail_id =  $_POST['bulkchecked'];
    
    // print_r("kk");
    // print_r($lastchecked);die();
    // $bulkchecked =  explode(",", $_POST['bulkchecked']);
    // $booking_detail_id = explode(',', $_POST['bulkchecked']);

    
    $booking_detail_ids = str_replace(",","','",$booking_detail_id);

    $current_date = date('j-M-y');
    $exp_date_q = "SELECT *
                    FROM COD_INVOICE_DATES
                    WHERE INVOICE_TYPE = 'quarter invoices'";
                    // print_r($exp_date_q);
    $exp_date_r = oci_parse($c, $exp_date_q);    
    oci_execute($exp_date_r);
    $exp_date_row = oci_fetch_assoc($exp_date_r);
    if($exp_date_row > 0){
        $expiry_days = $exp_date_row['EXPIRY_DATE'];
        $expiry_date = date('j-M-y', strtotime('+'.$expiry_days.' days'));
        // foreach ($bulkchecked as $booking_detail_id_val) {
            // print_r("fjdfks");
            // $booking_detail_id = $booking_detail_id_val;
            // print_r("$booking_detail_id");
            // $get_amount_q = "SELECT SUM(A.AMOUNT) AS AMOUNT
            //                 FROM B_UNIT_BOOKING_DETAIL A
            //                 INNER JOIN B_UNIT_BOOKING_MASTER B
            //                 ON A.SALE_ID = B.SALE_ID
            //                 INNER JOIN COD_FORM_REG C
            //                 ON B.REGISTRATION_FORM_NO = C.FORM_NO
            //                 WHERE A.BOOKING_DETAIL_ID IN ('$booking_detail_ids')
            //                 AND A.RECEIVED = 'N' 
            //                 AND A.CHARGES_TYPE_ID NOT IN (1,2,3)
            //                 GROUP BY A.SALE_ID";
                            
            // $get_amount_r = oci_parse($c, $get_amount_q);    
            // oci_execute($get_amount_r);
            // $row = oci_fetch_assoc($get_amount_r);
            // $get_data_q = "SELECT A.BOOKING_DETAIL_ID,A.SCHEDULE_DATE,A.CHARGES_TYPE_ID,A.SALE_ID,C.CUS_ID,C.PROJECT_ID,C.FORM_NO,C.CAMPAIGN_ID,C.UNIT_CATEGORY_ID,A.DUE_DATE
            //                 FROM B_UNIT_BOOKING_DETAIL A
            //                 INNER JOIN B_UNIT_BOOKING_MASTER B
            //                 ON A.SALE_ID = B.SALE_ID
            //                 INNER JOIN COD_FORM_REG C
            //                 ON B.REGISTRATION_FORM_NO = C.FORM_NO
            //                 WHERE A.BOOKING_DETAIL_ID IN ('$booking_detail_ids')
            //                 AND A.RECEIVED = 'N'
            //                 AND ROWNUM = 1
            //                 ORDER BY A.BOOKING_DETAIL_ID DESC";
            // $get_data_r = oci_parse($c, $get_data_q);    
            // oci_execute($get_data_r);
            // $row1 = oci_fetch_assoc($get_data_r);
            $get_data_q = "SELECT A.AMOUNT,A.CHARGES_TYPE_ID,A.SCHEDULE_DATE,A.SALE_ID,C.CUS_ID,C.PROJECT_ID,C.FORM_NO,C.CAMPAIGN_ID,C.UNIT_CATEGORY_ID,A.DUE_DATE,
                  (SELECT SUM(AMOUNT) FROM B_UNIT_BOOKING_DETAIL 
                  WHERE SALE_ID = A.SALE_ID AND BOOKING_DETAIL_ID < A.BOOKING_DETAIL_ID AND RECEIVED = 'N') AS ARREARS_AMOUNT,
                 (SELECT SUBSTR (SYS_CONNECT_BY_PATH (BOOKING_DETAIL_ID , ','), 2) csv
                      FROM (SELECT C.BOOKING_DETAIL_ID , ROW_NUMBER () OVER (ORDER BY C.BOOKING_DETAIL_ID ) rn,
                      COUNT (*) OVER () cnt
                      FROM B_UNIT_BOOKING_DETAIL C
                      INNER JOIN B_UNIT_BOOKING_MASTER B
                      ON C.SALE_ID = B.SALE_ID WHERE  BOOKING_DETAIL_ID < C.BOOKING_DETAIL_ID
                      AND RECEIVED = 'N' )
                        WHERE rn = cnt 
                        START WITH rn = 1
                        CONNECT BY rn = PRIOR rn + 1 )AS BOOKING_DETAIL_IDS
                        FROM B_UNIT_BOOKING_DETAIL A
                        INNER JOIN B_UNIT_BOOKING_MASTER B
                        ON A.SALE_ID = B.SALE_ID
                        INNER JOIN COD_FORM_REG C
                        ON B.REGISTRATION_FORM_NO = C.FORM_NO
                        WHERE A.BOOKING_DETAIL_ID = '$booking_detail_id'
                        AND A.RECEIVED = 'N'  ";
            
            if($row > 1){
                $arrears = $row['ARREARS_AMOUNT'];
                $booking_unit_detail_ids = $row['BOOKING_DETAIL_IDS'];
                $current_amount = $row['AMOUNT'];
                $charges_type_id = $row['CHARGES_TYPE_ID'];
                $sale_id = $row['SALE_ID'];
                $cus_id = $row['CUS_ID'];
                $proj_id = $row['PROJECT_ID'];
                $reg_form_no = $row['FORM_NO'];
                $campaign_id = $row['CAMPAIGN_ID'];
                $unit_type_id = $row['UNIT_CATEGORY_ID'];
                $due_date = $row['DUE_DATE'];
                $schedule_date = $row['SCHEDULE_DATE'];


                // $b_unit_detail_id = $row1['BOOKING_DETAIL_ID'];
                // $amount = $row['AMOUNT'];
                // $charges_type_id = $row1['CHARGES_TYPE_ID'];
                // $sale_id = $row1['SALE_ID'];
                // $cus_id = $row1['CUS_ID'];
                // $proj_id = $row1['PROJECT_ID'];
                // $reg_form_no = $row1['FORM_NO'];
                // $campaign_id = $row1['CAMPAIGN_ID'];
                // $unit_type_id = $row1['UNIT_CATEGORY_ID'];
                // $due_date = $row1['DUE_DATE'];
                // $schedule_date = $row1['SCHEDULE_DATE'];

                //max invoice number
                $get_invoice_no_q="SELECT MAX(AVAILABLE_VOUCHER)+1 AS INVOICE_NO,MAX(TRNO)+1 AS TRNO,MAX(VNO_MASTER_TRNO)+1 AS MAX_MASTER_TRNO FROM AVAILABLE_VOUCHER_NO"; 
                //    print_R($get_invoice_no_q);
                
                $get_invoice_no_r = oci_parse($c, $get_invoice_no_q);
                oci_execute($get_invoice_no_r);
                $get_invoice_norow = oci_fetch_assoc($get_invoice_no_r);
                $MaxInvoice_No=$get_invoice_norow['INVOICE_NO'];
                $tr_no = $get_invoice_norow['TRNO'];
                $vno_master_trno = $get_invoice_norow['MAX_MASTER_TRNO'];

                //VOIDE PREVIOUS INVOICES
                $update_invoice_q = "UPDATE AVAILABLE_VOUCHER_NO SET VOIDE = 'Y' WHERE SALE_ID = '$sale_id' AND PAID = 'N'";
                $update_invoice_r = oci_parse($c, $update_invoice_q);
                oci_execute($update_invoice_r);

                
                // GENERATE NEW INVOICES
                $invoice_master_q = "INSERT INTO AVAILABLE_VOUCHER_NO (TRNO,FORM_NO,AVAILABLE_VOUCHER,SALE_ID,FOR_THE_MONTH,AMOUNT,POST,TRANS_DATE,DUE_DATE,EXPIRE_DATE,VOIDE,VNO_MASTER_TRNO,ARREARS,CHARGES_TYPE,PROJECT_ID,PAID,CHARGES_ID_DESC,CURR_DESC,BOOKING_DETAIL_ID,printed_flg,BOOKING_DETAIL_ID_DESC) 
                                        VALUES ('$tr_no','$reg_form_no','$MaxInvoice_No','$sale_id','$schedule_date','$current_amount','Y','$current_date','$due_date','$expiry_date','N','$vno_master_trno','$arrears','$charges_type_id','$proj_id','N','$charges_type_id','$charges_type_id','$booking_detail_id','0','$booking_unit_detail_ids')";
                // print_r($invoice_master_q);die();
                $invoice_master_r = oci_parse($c, $invoice_master_q);
                $run = oci_execute($invoice_master_r);
            }
        // }
    }

    if($run){
        $return_data = array(
            "status" => 1,
            "message" => "Invoices has been created successfully"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Invoices has not been created"
        );
    }
}
else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>