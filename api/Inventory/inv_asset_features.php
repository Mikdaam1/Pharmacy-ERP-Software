<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];

if(isset($_POST['action']) && $_POST['action'] == 'viewdrop'){
    $query = "SELECT * FROM B_UNIT_CATEGORY_MASTER ORDER BY CAT_ID ASC";
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
        $query = "INSERT INTO COD_BANK_TYPE (NAME,COMPANY_ID) VALUES ('$bank_account_type','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Bank Account Type has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Bank Account Type has nod been inserted"
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
        $query = "UPDATE COD_BANK_TYPE SET NAME='$bank_account_type' WHERE ID = '$id'";
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
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>