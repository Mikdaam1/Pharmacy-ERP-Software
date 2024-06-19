<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM ACCOUNT_TYPES WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND DELETE_FLG = '0'";
    // print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['class_name']) && !empty($_POST['class_name'])){
        $class_name = $_POST['class_name'];

        $check_query = "SELECT MAX(ACCOUNT_TYPE) AS ACCOUNT_TYPE FROM ACCOUNT_TYPES WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $check_run = oci_parse($c, $check_query);  //oci_parse — Prepares an Oracle statement for execution  
        oci_execute($check_run);  //oci_execute — Executes a statement
        $check_row = oci_fetch_assoc($check_run);  //oci_fetch_assoc — Returns the next row from a query as an associative array
        
        if (empty($check_row['ACCOUNT_TYPE'])) {
            $acc_type = '10000';
        }else{
            $acc_type = $check_row['ACCOUNT_TYPE']+'10000'; 
        }

        // $check_query_ai = "SELECT MAX(ID) AS ID FROM ACCOUNT_TYPES WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        // $check_run_ai = oci_parse($c, $check_query_ai);  //oci_parse — Prepares an Oracle statement for execution  
        // oci_execute($check_run_ai);  //oci_execute — Executes a statement
        // $check_row_ai = oci_fetch_assoc($check_run_ai);  //oci_fetch_assoc — Returns the next row from a query as an associative array
        
        // if (empty($check_row_ai['ID'])) {
        //     $id = '1';
        // }else{
        //     $id = $check_row_ai['ID']+'1'; 
        // }

        $query = "INSERT INTO ACCOUNT_TYPES (ACCOUNT_TYPE,DESCRIPTION,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$acc_type','$class_name','insert','$user_id','$current_date','$project_id','$company_id')";
        
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account type has ben inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account type has not ben inserted"
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
    if(isset($_POST['account_type']) && !(empty($_POST['account_type']))){
        $account_type = $_POST['account_type'];
        $query = "SELECT * FROM ACCOUNT_TYPES WHERE ACCOUNT_TYPE = '$account_type'";
        // print_r($query); die();
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
    if(isset($_POST['class_name']) && isset($_POST['id']) && !(empty($_POST['class_name']) || empty($_POST['id']))){
        //$class_code = $_POST['class_code'];
        $class_name = $_POST['class_name'];
        $id = $_POST['id'];
        
            $query = "UPDATE ACCOUNT_TYPES 
                      SET DESCRIPTION = '$class_name' ,
                      ACTION_TYPE = 'update',
                      ACTION_BY = '$user_id',
                      ACTION_ON = '$current_date',
                      PROJECT_ID = '$project_id',
                      COMPANY_ID = '$company_id'
                      WHERE ACCOUNT_TYPE = '$id'";
            // print_r($query); die();
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Account class has ben updated"
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

    $query_check = "SELECT * FROM ACCOUNT_TYPES B
    INNER JOIN ACCOUNT_TYPES_DETAIL A 
    ON A.ACCOUNT_TYPE = B.ACCOUNT_TYPE
    WHERE B.ACCOUNT_TYPE = '$id' AND B.COMPANY_ID = '$company_id' AND A.DELETE_FLG = 0";
    $run = oci_parse($c, $query_check);
    oci_execute($run);
    $row = oci_fetch_assoc($run); 
    if ($row > 0) {
        $return_data = array(
            "status" => 2,
            "message" => "Can not delete, account type exist!"
        );
    }else{
        $query = "UPDATE ACCOUNT_TYPES 
                        SET DELETE_FLG='1', ACTION_TYPE = 'delete',
                        ACTION_BY = '$user_id',
                        ACTION_ON = '$current_date'
                        WHERE ACCOUNT_TYPE = '$id'";
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
    }
        
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>