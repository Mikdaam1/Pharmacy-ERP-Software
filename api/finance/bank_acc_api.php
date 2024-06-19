<?php
session_start(); 
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());
// print_r($_POST); die();
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.*,B.NAME,C.CHART_ACC_DESC
    FROM BANKS_SETUP A
    LEFT JOIN COD_BANK_TYPE B
    ON A.BANK_TYPE = B.ID
    LEFT JOIN CHART_DETAIL C
    ON A.CHART_PROJECT_ID = C.ID
    WHERE A.PROJECT_ID = '$project_id '  
    -- AND A.COMPANY_ID = '$company_id' 
    AND A.DELETE_FLG = '0'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c); 

}
elseif(isset($_POST['action']) && $_POST['action'] == 'view_2'){
    $query = "SELECT *
    FROM BANKS_SETUP
    WHERE PROJECT_ID = '$project_id'  
    AND COMPANY_ID = '$company_id' 
    AND DELETE_FLG = '0'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c); 

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    
    if(isset($_POST['bank_acc_name']) && !(empty($_POST['bank_acc_name']))){
        $bank_name = $_POST['bank_name'];
        $bank_acc_name = $_POST['bank_acc_name'];
        $bank_acc_no = $_POST['bank_acc_no'];
        $bank_acc_type = $_POST['bank_acc_type'];
        $currency = $_POST['currency'];
        $acc_default_currency = $_POST['acc_default_currency'];
        $status = $_POST['status'];
        $gl_account = $_POST['gl_account'];

        $check_query_ai = "SELECT MAX(BANK_ID) AS BANK_ID FROM BANKS_SETUP";
        $check_run_ai = oci_parse($c, $check_query_ai);    
        oci_execute($check_run_ai);
        $check_row_ai = oci_fetch_assoc($check_run_ai);
        // print_r($check_query_ai); die();
        if (empty($check_row_ai['BANK_ID'])) {
            $bank_id = '1';
        }else{
            $bank_id = $check_row_ai['BANK_ID']+'1'; 
        }

        $gl_query = "SELECT * FROM CHART_DETAIL WHERE ID = '$gl_account'";
        
        $gl_run = oci_parse($c, $gl_query);    
        oci_execute($gl_run);
        $gl_row = oci_fetch_assoc($gl_run);
        $gl_id = $gl_row['ID'];
        $gl_group = $gl_row['ACC_TYPE'];
        $gl_type = $gl_row['ACC_DETAIL_TYPE'];
        $gl_head = $gl_row['CHART_HEAD_CODE'];
        $gl_chart = $gl_row['CHART_ACC_CODE'];
        
        $query = "INSERT INTO BANKS_SETUP 
        (BANK_ID,
        BANK_NAME,
        BANK_ACC_NAME,
        BANK_ACCOUNT_NO,
        BANK_TYPE,
        CURRENCY,
        ACC_DEFAULT_CURRENCY,
        ACTIVE,
        ACC_TYPE,
        ACC_DETAIL_TYPE,
        ACC_HEAD_CODE,
        ACC_CHARTACC_CODE,CHART_PROJECT_ID,
        COMPANY_ID,PROJECT_ID,ACTION_BY,ACTION_ON,PC_IP,ACTION_TYPE) VALUES 
        ('$bank_id',
        '$bank_name',
        '$bank_acc_name',
        '$bank_acc_no',
        '$bank_acc_type',
        '$currency',
        '$acc_default_currency',
        '$status',
        '$gl_group',
        '$gl_type',
        '$gl_head',
        '$gl_chart','$gl_id',
        '$company_id','$project_id','$user_id','$current_date','$ip_address','Insert')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Bank Account has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account has not been inserted"
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
        $query = "SELECT * FROM BANKS_SETUP WHERE BANK_ID = '$id'";
        $run = oci_parse($c, $query);
        oci_execute($run);
        $return_data=[];
        $row = oci_fetch_assoc($run);
        $return_data = $row;
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    // print_r($_POST); die();
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $bank_name = $_POST['bank_name'];
        $bank_acc_name = $_POST['bank_acc_name'];
        $bank_acc_no = $_POST['bank_acc_no'];
        $bank_acc_type = $_POST['bank_acc_type'];
        $currency = $_POST['currency'];
        $acc_default_currency = $_POST['acc_default_currency'];
        $status = $_POST['status'];
        $gl_account = $_POST['gl_account'];

        $gl_query = "SELECT * FROM CHART_DETAIL WHERE ID = '$gl_account'";
        // print_r($gl_query); die();
        $gl_run = oci_parse($c, $gl_query);    
        oci_execute($gl_run);
        $gl_row = oci_fetch_assoc($gl_run);
        $gl_id = $gl_row['ID'];
        $gl_group = $gl_row['ACC_TYPE'];
        $gl_type = $gl_row['ACC_DETAIL_TYPE'];
        $gl_head = $gl_row['CHART_HEAD_CODE'];
        $gl_chart = $gl_row['CHART_ACC_CODE'];

        $query = "UPDATE BANKS_SETUP 
        SET BANK_NAME='$bank_name',
        BANK_ACC_NAME='$bank_acc_name',
        BANK_ACCOUNT_NO='$bank_acc_no',
        BANK_TYPE='$bank_acc_type',
        CURRENCY='$currency',
        ACC_DEFAULT_CURRENCY='$acc_default_currency',
        ACTIVE='$status',
        ACC_TYPE='$gl_group',
        ACC_DETAIL_TYPE='$gl_type',
        ACC_HEAD_CODE='$gl_head',
        ACC_CHARTACC_CODE='$gl_chart',
        CHART_PROJECT_ID='$gl_id',
        COMPANY_ID='$company_id',
        PROJECT_ID='$project_id',
        ACTION_BY='$user_id',
        ACTION_ON='$current_date',
        PC_IP='$ip_address',
        ACTION_TYPE='Update' WHERE BANK_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Bank Account has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account has not been updated"
            );
        }
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "ID Required"
        );
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id=$_POST['id'];
    $query = "UPDATE BANKS_SETUP 
              SET DELETE_FLG='1',
              PC_IP = '$ip_address', 
              ACTION_TYPE = 'Delete',
              ACTION_BY = '$user_id',
              ACTION_ON = '$current_date'
              WHERE BANK_ID = '$id'";
    $run = oci_parse($c, $query);
    if(oci_execute($run)){
        $return_data = array(
            "status" => 1,
            "message" => "Account has been deleted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Account has not been deleted"
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