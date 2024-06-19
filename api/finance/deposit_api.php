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

if(isset($_POST['action']) && $_POST['action'] == 'transaction_date_open_api'){

    $query = "SELECT td.FROM_DATE,td.TO_DATE 
                FROM COD_DATE_LOCK td 
                INNER JOIN COD_FISCAL_YEAR fy 
                ON fy.SNO = td.FISCAL_YEAR 
                WHERE fy.ACTIVE = '0' 
                AND td.ACTIVE = '0' 
                AND td.PROJECT_ID = '$project_id' 
                AND td.COMPANY_ID = '$company_id'";            

    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'bank_acc_in_option_api'){
    
    $query="SELECT BANK_ID, BANK_NAME FROM BANKS_SETUP WHERE COMPANY_ID = '$company_id' AND DELETE_FLG = '0'";

    $run = oci_parse($c, $query);
    oci_execute($run); 

    $return_data = '<option value="">Select Bank Account</option>';
	while($row=oci_fetch_array($run))
	{
	    $return_data .= '<option value="'.$row['BANK_ID'].'">'.$row['BANK_NAME'].'</option>';
	}
    //print_r($return_data); die();

}elseif(isset($_POST['action']) && $_POST['action'] == 'bank_acc_deposit_insert'){
    //print_r($_POST); die();
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

}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT)); 

?>
