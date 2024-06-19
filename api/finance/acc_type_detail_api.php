<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'view'){ 
    $query = "SELECT A.*,B.DESCRIPTION AS DIS_GROUP FROM ACCOUNT_TYPES_DETAIL A
    LEFT JOIN ACCOUNT_TYPES B
    ON (A.ACCOUNT_TYPE = B.ACCOUNT_TYPE AND A.PROJECT_ID = B.PROJECT_ID)
    WHERE A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id' AND A.DELETE_FLG = '0'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'editdrop'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT * FROM ACCOUNT_TYPES_DETAIL WHERE ACCOUNT_TYPE IN ('$id','0') AND COMPANY_ID = '$company_id' AND DELETE_FLG='0'";
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
          "message" => "id Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['class_code']) && isset($_POST['group_name']) && !(empty($_POST['class_code']) || empty($_POST['group_name']))){
        $class_code = $_POST['class_code'];
        $group_name = $_POST['group_name'];

        $check_query = "SELECT MAX(ACC_DETAIL_TYPE) AS MAX_ACC_DETAIL_TYPE FROM ACCOUNT_TYPES_DETAIL WHERE ACCOUNT_TYPE = '$class_code'";
        $check_run = oci_parse($c, $check_query);    
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);
        if (empty($check_row['MAX_ACC_DETAIL_TYPE'])) {
            $group_code = $class_code+1;
        }else{
            $group_code = $check_row['MAX_ACC_DETAIL_TYPE']+1;
        }

        // $check_query_ai = "SELECT MAX(ID) AS ID FROM ACCOUNT_TYPES_DETAIL WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        // $check_run_ai = oci_parse($c, $check_query_ai);    
        // oci_execute($check_run_ai);
        // $check_row_ai = oci_fetch_assoc($check_run_ai);
        // // print_r($check_query_ai); die();
        // if (empty($check_row_ai['ID'])) {
        //     $id = '1';
        // }else{
        //     $id = $check_row_ai['ID']+'1'; 
        // }
        $query = "INSERT INTO ACCOUNT_TYPES_DETAIL (ACC_DETAIL_TYPE,DESCRIPTION,ACCOUNT_TYPE,COMPANY_ID,PC_IP,ACTION_ON,ACTION_TYPE,ACTION_BY,PROJECT_ID) VALUES ('$group_code','$group_name','$class_code','$company_id','$ip_address','$current_date','Insert','$user_id','$project_id')";
        //print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account group has been inserted"
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
    if(isset($_POST['account_type']) && !(empty($_POST['account_type']))){
        $account_type = $_POST['account_type'];
        $query = "SELECT ACCOUNT_TYPE,ACC_DETAIL_TYPE,DESCRIPTION
        FROM ACCOUNT_TYPES_DETAIL 
        WHERE ACC_DETAIL_TYPE = '$account_type'";
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
    if(isset($_POST['group_name']) && isset($_POST['id']) && !(empty($_POST['group_name']) || empty($_POST['id']))){
        // $class_code = $_POST['class_code'];
        $group_name = $_POST['group_name'];
        $id = $_POST['id'];
        
        $query = "UPDATE ACCOUNT_TYPES_DETAIL 
                  SET DESCRIPTION = '$group_name',
                  PC_IP = '$ip_address',
                  ACTION_BY = '$user_id',
                  ACTION_ON = '$current_date',
                  ACTION_TYPE = 'Update'
                  WHERE ACC_DETAIL_TYPE = '$id'";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account Type has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account Type has not been updated"
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

    $query_check = "SELECT * FROM ACCOUNT_TYPES_DETAIL B
    INNER JOIN CHART_HEAD A 
    ON A.ACC_DETAIL_TYPE = B.ACC_DETAIL_TYPE
    WHERE B.ID = '$id'
    AND B.COMPANY_ID = '$company_id' AND A.DELETE_FLG = 0";
    $run = oci_parse($c, $query_check);
    oci_execute($run);
    $row = oci_fetch_assoc($run); 
    if ($row > 0) {
        $return_data = array(
            "status" => 2,
            "message" => "Can not delete, account head exist!"
        );
    }else{
    $query = "UPDATE ACCOUNT_TYPES_DETAIL 
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
            "message" => "Account Type has been deleted!"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Account Type has not been deleted!"
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