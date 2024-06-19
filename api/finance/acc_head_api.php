<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM COD_ACCOUNT_HEAD WHERE COMPANY_ID = '$company_id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run); 
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['group_code']) && isset($_POST['head_name']) && !(empty($_POST['group_code']) || empty($_POST['head_name']))){
        $group_code = $_POST['group_code'];
        $head_name = $_POST['head_name'];
        $group_code_num = $group_code[0];

        $check_query = "SELECT MAX(HEAD_CODE) AS MAX_HEAD_CODE FROM COD_ACCOUNT_HEAD WHERE ACCOUNT_GROUP LIKE '$group_code_num%'";
        $check_run = oci_parse($c, $check_query);    
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        if (empty($check_row['MAX_HEAD_CODE'])) {
            $group_code_num = $group_code[0];
            $group_code_pre = $group_code_num-1;
            $head_code = $group_code_num+$group_code_pre;
            $head_code = $head_code."01";
        }else{
            $head_code = $check_row['MAX_HEAD_CODE'];
            $head_code++;
        }
        $query = "INSERT INTO COD_ACCOUNT_HEAD (HEAD_CODE,HEAD_NAME,ACCOUNT_GROUP,COMPANY_ID) VALUES ('$head_code','$head_name','$group_code','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account head has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account head has not been inserted"
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
        $query = "SELECT * FROM COD_ACCOUNT_HEAD WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $row = oci_fetch_assoc($run);
            $return_data = $row;
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Data not found"
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    if(isset($_POST['head_name']) && isset($_POST['id']) && !(empty($_POST['head_name']) || empty($_POST['id']))){
        $head_name = $_POST['head_name'];
        $id = $_POST['id'];
        
        $query = "UPDATE COD_ACCOUNT_HEAD SET HEAD_NAME = '$head_name' WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account head has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account head has not been updated"
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