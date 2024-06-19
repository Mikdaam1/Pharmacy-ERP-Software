<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM VOUCHER_TYPES WHERE COMPANY_ID = '$company_id' AND DELETE_FLG = '0'";
    //print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){ 
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['voucher_type']) && !empty($_POST['voucher_type'])){
        
        $voucher_type = $_POST['voucher_type'];
        $voucher_type_name = $_POST['voucher_type_name'];
        
        $voucher_name = $_POST['voucher_name'];
        $voucher_des = $_POST['voucher_des'];
        $query = "INSERT INTO COD_VOUCHER_TYPE (NAME,TYPE,TYPE_NAME,DESCRIPTION,ACTION_TYPE,ACTION_BY,ACTION_ON,DELETE_FLG,COMPANY_ID,PROJECT_ID) VALUES ('$voucher_name','$voucher_type','$voucher_type_name','$voucher_des','insert','$user_id','$current_date','0','$company_id','$project_id')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Voucher has been added!"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Voucher has not been added!"
            );
        }
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All fields are required!"
        );
    }
    //fetch for edit
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT * FROM VOUCHER_TYPES WHERE TYPE_ID = '$id'";
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
    if(isset($_POST['id']) && isset($_POST['voucher_name']) && isset($_POST['voucher_des']) && !(empty($_POST['id']) || empty($_POST['voucher_name']) || empty($_POST['voucher_des']))){
        
        $id = $_POST['id'];
        // $voucher_type = $_POST['voucher_type'];
        $voucher_name = $_POST['voucher_name'];
        $voucher_des = $_POST['voucher_des'];
        
            $query = "UPDATE VOUCHER_TYPES 
                      SET DESCRIPTION = '$voucher_name' ,
                      VOUCHER_NATURE = '$voucher_des',
                      ACTION_TYPE = 'update',
                      ACTION_BY = '$user_id',
                      ACTION_ON = '$current_date'
                      WHERE TYPE_ID = '$id'";
            //print_r($query); die();
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Voucher has been updated"
                );
            }
        
            oci_free_statement($run);
            oci_close($c);
        

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "All fields are required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'delete'){ 
    $id=$_POST['id'];
        
    $query = "UPDATE COD_VOUCHER_TYPE SET ACTION_TYPE = 'delete',ACTION_BY = '$user_id',ACTION_ON = '$current_date',DELETE_FLG = '1'WHERE ID = '$id'";
    //print_r($query); die();
    $run = oci_parse($c, $query);
    if(oci_execute($run)){
        $return_data = array(
            "status" => 1,
            "message" => "Voucher has been deleted"
        );
    }

    oci_free_statement($run);
    oci_close($c);
    
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>