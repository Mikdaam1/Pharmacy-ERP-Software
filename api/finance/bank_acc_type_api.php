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

if(isset($_POST['action']) && $_POST['action'] == 'view'){ 
    $query = "SELECT * FROM COD_BANK_TYPE WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND DELETE_FLG = '0'"; 
    $run = oci_parse($c, $query); 
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['bank_account_type']) && !(empty($_POST['bank_account_type']))){
        $bank_account_type = $_POST['bank_account_type'];
        $query = "INSERT INTO COD_BANK_TYPE (NAME,COMPANY_ID,PROJECT_ID,ACTION_BY,ACTION_ON,PC_IP,ACTION_TYPE) VALUES ('$bank_account_type','$company_id','$project_id','$user_id','$current_date','$ip_address','Insert')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Bank Account Type has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account Type has not been inserted"
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
    $id = $_POST['id'];
    $query = "SELECT * FROM COD_BANK_TYPE WHERE COMPANY_ID = '$company_id' AND ID = '$id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    if(isset($_POST['bank_account_type']) && !(empty($_POST['bank_account_type']))){ 
        $id = $_POST['id'];
        $bank_account_type = $_POST['bank_account_type'];
        $query = "UPDATE COD_BANK_TYPE SET NAME='$bank_account_type',ACTION_BY='$user_id',ACTION_ON='$current_date',PC_IP='$ip_address',ACTION_TYPE='Update' WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Bank Account Type has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account Type has nod been updated"
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
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id=$_POST['id'];
    $query = "UPDATE COD_BANK_TYPE 
              SET DELETE_FLG='1',
              PC_IP = '$ip_address', 
              ACTION_TYPE = 'Delete',
              ACTION_BY = '$user_id',
              ACTION_ON = '$current_date'
              WHERE ID = '$id'";
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