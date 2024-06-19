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

if(isset($_POST['action']) && $_POST['action'] == 'Transaction_date'){ 
 
    $query = "SELECT * FROM COD_DATE_LOCK WHERE ACTIVE = 'Y'";
    //print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c); 

    //print_r($_POST); 
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

}elseif(isset($_POST['action']) && $_POST['action'] == 'payment_insert'){
    // print_r($_POST); die();
    if(isset($_POST['gl_acc_id']) && !(empty($_POST['gl_acc_id'])) ){
        // print_r($_POST); die();
        $tran_date = $_POST['tran_date'];
        $tran_date = new DateTime($tran_date);
        $tran_date = $tran_date->format('d:M:y'); // 27:Sep:21
        $customer_reference = $_POST['reference'];
        $amount_t_dt = substr($_POST['amount_t_dt'], 0, -3);
        $amount_t_dt = preg_replace("/[^a-zA-Z ,._-]+/", "", $amount_t_dt);
        $amount_t_cr = substr($_POST['amount_t_cr'], 0, -3);
        $amount_t_cr = preg_replace("/[^a-zA-Z ,._-]+/", "", $amount_t_cr);
        // print_r($_POST); print_r($amount_t_cr); die();
        if($amount_t_dt == $amount_t_cr){

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

            $query_voucher = "SELECT * FROM COD_VOUCHER_TYPE WHERE type = 'JV'";
            $run_voucher = oci_parse($c, $query_voucher);
            oci_execute($run_voucher);
            $run_voucher_row = oci_fetch_assoc($run_voucher);

            if($fiscal_year_row > 0 && $run_voucher_row > 0){

                $fiscal_year = $fiscal_year_row['FISCAL_YEAR'];

                $voucher_id = $run_voucher_row['ID'];
                $voucher_name = $run_voucher_row['TYPE'];
                $voucher_des = $run_voucher_row['DESCRIPTION'];
            
                $check_query = "SELECT MAX(VNO) AS VNO FROM V_DETAIL WHERE VTYPE = '$voucher_name' AND FISCAL_YEAR = '$fiscal_year'";
                $check_run = oci_parse($c, $check_query);
                oci_execute($check_run);
                $check_row = oci_fetch_assoc($check_run);

                $check_query_B = "SELECT MAX(VNO) AS VNO FROM V_MASTER WHERE VTYPE = '$voucher_name' AND FISCAL_YEAR = '$fiscal_year'";
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
                for($i=0; $i< count($_POST['gl_acc_id']); $i++){
                    $gl_acc_id = $_POST['gl_acc_id'][$i];
                    $amount_dt = $_POST['amount_dt'][$i];
                    $amount_dt = substr($amount_dt, 0, -3);
                    $amount_dt = preg_replace("/[,._-]+/", "", $amount_dt);
                    $amount_cr = $_POST['amount_cr'][$i];
                    $amount_cr = substr($amount_cr, 0, -3);
                    $amount_cr = preg_replace("/[,._-]+/", "", $amount_cr);
                    $memo = preg_replace("/[^a-zA-Z0-9 ,._-]+/", "", $_POST['memo'][$i]);

                    //GET
                    $query_gl_acc = "SELECT ACC_TYPE,ACC_DETAIL_TYPE,CHART_HEAD_CODE,CHART_ACC_CODE,CHART_ACC_DESC 
                    FROM CHART_DETAIL WHERE ID = '$gl_acc_id'";
                    $run_gl_acc = oci_parse($c, $query_gl_acc);
                    oci_execute($run_gl_acc);
                    $gl_acc_row = oci_fetch_assoc($run_gl_acc);

                    $gl_acc_chart = $gl_acc_row['CHART_ACC_CODE'];
                    $gl_acc_head = $gl_acc_row['CHART_HEAD_CODE'];
                    $gl_acc_type = $gl_acc_row['ACC_DETAIL_TYPE'];
                    $gl_acc_group = $gl_acc_row['ACC_TYPE'];
                    $gl_acc_desc = $gl_acc_row['CHART_ACC_DESC'];
                    
                    //INSERT
                    $query_v_detail = "INSERT INTO V_DETAIL (VNO,VTYPE,DEBIT,CREDIT,HEAD_CODE,CHART_ACC_CODE,ACC_DETAIL_TYPE,ACC_TYPE,REMARKS,CHQDT,ACTION_TYPE,ACTION_BY,ACTION_ON,PC_IP,COMPANY_ID,PROJECT_ID,FISCAL_YEAR,CHQNO,ACCOUNT_ID,ACCOUNT_TITLE) 
                                            VALUES ('$v_no_DETAIL','$voucher_name','$amount_dt','$amount_cr','$gl_acc_head','$gl_acc_chart','$gl_acc_type','$gl_acc_group','$memo','$tran_date','insert','$user_id','$current_date','$ip_address','$company_id','$project_id','$fiscal_year','$customer_reference','$gl_acc_id','$gl_acc_desc')";
                    $run_v_detail = oci_parse($c, $query_v_detail);
                    oci_execute($run_v_detail);
                    
                }

                $query_master = "INSERT INTO V_MASTER (VNO,VTYPE,VTYPE_ID,VDATE,CHQDT,CHQNO,POSTED,AUTO_POSTED,PC_IP,PROJECT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,FISCAL_YEAR) 
                                VALUES ('$V_no_MASTER','$voucher_name','$voucher_id','$tran_date','$tran_date','$customer_reference','N','N','$ip_address','$project_id','insert','$user_id','$current_date','$company_id','$fiscal_year')";
                $run_master = oci_parse($c, $query_master);
                if(oci_execute($run_master) ){
                    $return_data = array(
                        "status" => 1,
                        "message" => "Journal Voucher entry has been added!"
                    );
                }else{
                    $return_data = array(
                    "status" => 0,
                    "message" => "Journal Voucher entry has not been added!"
                    );
                }
                oci_free_statement($run_master);
                oci_close($c); 
            }else{
                $return_data = array(
                "status" => 0,
                "message" => "Check Fiscal Year/Transaction Date!"
                );
            }

        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Total Debit and Total Credit must always be equal!"
            );
        }
        
        
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Add atleast one journal voucher row!"
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