<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM SET_SUPPLIER_CAT WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND DELETE_FLG = '0'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){ 
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['cat']) && !empty($_POST['cat'])){
        
        $cat = $_POST['cat'];

        $check_query_ai = "SELECT MAX(SUP_CAAT_ID) AS SUP_CAAT_ID FROM SET_SUPPLIER_CAT WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $check_run_ai = oci_parse($c, $check_query_ai);  //oci_parse — Prepares an Oracle statement for execution  
        oci_execute($check_run_ai);  //oci_execute — Executes a statement
        $check_row_ai = oci_fetch_assoc($check_run_ai);  //oci_fetch_assoc — Returns the next row from a query as an associative array
        
        if (empty($check_row_ai['SUP_CAAT_ID'])) {
            $id = '1';
        }else{
            $id = $check_row_ai['SUP_CAAT_ID']+'1'; 
        }

        $query = "INSERT INTO SET_SUPPLIER_CAT (SUP_CAAT_ID,DSCRIPTION,ACTION_BY,ACTION_ON,ACTION_TYPE,PROJECT_ID,COMPANY_ID,PC_IP) VALUES ('$id','$cat','$user_id','$current_date','insert','$project_id','$company_id','$ip_address')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Category has been inserted!"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Category has not been inserted!"
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
    //fetch for edit
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT * FROM SET_SUPPLIER_CAT WHERE SUP_CAAT_ID = '$id'";
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
          "message" => "ID not found or mached!"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    if(isset($_POST['id']) && isset($_POST['cat']) && !(empty($_POST['id']) || empty($_POST['cat']))){
        //$class_code = $_POST['class_code'];
        $cat = $_POST['cat'];
        $id = $_POST['id'];
        $query = "UPDATE SET_SUPPLIER_CAT 
            SET DSCRIPTION = '$cat' ,
            ACTION_TYPE = 'update',
            ACTION_BY = '$user_id',
            ACTION_ON = '$current_date',
            PROJECT_ID = '$project_id',
            COMPANY_ID = '$company_id',
            PC_IP = '$ip_address'
            WHERE SUP_CAAT_ID = '$id'";
            //print_r($query); die();
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Category has not been updated!"
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
    $query = "UPDATE SET_SUPPLIER_CAT SET DELETE_FLG='1', ACTION_TYPE = 'delete',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address' WHERE SUP_CAAT_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Category has been deleted!"
            );
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Category has not been deleted!"
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