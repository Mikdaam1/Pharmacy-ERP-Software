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

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.*,B.DESCRIPTION AS DIS_GROUP,C.DESCRIPTION AS DIS_TYPE  
    FROM CHART_HEAD A
    LEFT JOIN ACCOUNT_TYPES B
    ON A.ACC_TYPE = B.ACCOUNT_TYPE
    LEFT JOIN ACCOUNT_TYPES_DETAIL C
    ON A.ACC_DETAIL_TYPE = C.ACC_DETAIL_TYPE
    WHERE A.COMPANY_ID = '$company_id'
    AND A.PROJECT_ID = '$project_id' 
    AND A.DELETE_FLG = '0'";
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
        $query = "SELECT * FROM CHART_HEAD WHERE ACC_DETAIL_TYPE IN ('$id','0') AND COMPANY_ID = '$company_id' AND DELETE_FLG='0'";
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
    if(isset($_POST['group_code']) && isset($_POST['type_code']) && isset($_POST['head_name']) && !(empty($_POST['group_code']) || empty($_POST['type_code']) || empty($_POST['head_name']))){
        $group_code = $_POST['group_code'];
        $type_code = $_POST['type_code'];
        $head_name = $_POST['head_name'];
        $group_code_num = $group_code[0];
        
        $check_query = "SELECT MAX(HEAD_CODE) AS MAX_HEAD_CODE FROM CHART_HEAD WHERE ACC_TYPE LIKE '$group_code_num%'";
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

        // $check_query_ai = "SELECT MAX(ID) AS ID FROM CHART_HEAD WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        // $check_run_ai = oci_parse($c, $check_query_ai);  //oci_parse — Prepares an Oracle statement for execution  
        // oci_execute($check_run_ai);  //oci_execute — Executes a statement
        // $check_row_ai = oci_fetch_assoc($check_run_ai);  //oci_fetch_assoc — Returns the next row from a query as an associative array
        
        // if (empty($check_row_ai['ID'])) {
        //     $id = '1';
        // }else{
        //     $id = $check_row_ai['ID']+'1'; 
        // }

        $query = "INSERT INTO CHART_HEAD (ACC_TYPE,HEAD_CODE,HEAD_DESC,PC_IP,ACC_DETAIL_TYPE,ACTION_TYPE,ACTION_BY,ACTION_ON,COMPANY_ID,PROJECT_ID) VALUES ('$group_code','$head_code','$head_name','$ip_address','$type_code','Insert','$user_id','$current_date','$company_id','$project_id')";
        // print_r($query); die();
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
        $query = "SELECT * FROM CHART_HEAD
        WHERE HEAD_CODE = '$id'";
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
    if(isset($_POST['id']) && isset($_POST['head_name']) && !(empty($_POST['id']) || empty($_POST['head_name']))){
        
        $id = $_POST['id'];
        $head_name = $_POST['head_name'];
        
        // $check_query = "SELECT MAX(HEAD_CODE) AS MAX_HEAD_CODE FROM CHART_HEAD WHERE ACC_TYPE LIKE '$group_code_num%'";
        // // print_r($check_query); die();
        // $check_run = oci_parse($c, $check_query);    
        // oci_execute($check_run);
        // $check_row = oci_fetch_assoc($check_run);
        // if (empty($check_row['MAX_HEAD_CODE'])) {
        //     $group_code_num = $group_code[0];
        //     $group_code_pre = $group_code_num-1;
        //     $head_code = $group_code_num+$group_code_pre;
        //     $head_code = $head_code."01";
        // }else{
        //     $head_code = $check_row['MAX_HEAD_CODE']; 
        //     $head_code++;
        // }
        
        $query = "UPDATE CHART_HEAD
         SET HEAD_DESC = '$head_name'
        WHERE HEAD_CODE = '$id'";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Account has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Account has not been updated"
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

    $query_check = "SELECT * FROM CHART_HEAD B
    INNER JOIN CHART_DETAIL A 
    ON A.CHART_HEAD_CODE = B.HEAD_CODE
    WHERE B.HEAD_CODE = '$id'";
    // print_r($query_check); die();
    $run = oci_parse($c, $query_check);
    oci_execute($run);
    $row = oci_fetch_assoc($run); 
    if ($row > 0) {
        $return_data = array(
            "status" => 2,
            "message" => "Can not delete, account chart exist!"
        );
    }else{
    $query = "UPDATE CHART_HEAD 
    SET DELETE_FLG='1',
    PC_IP = '$ip_address', 
    ACTION_TYPE = 'Delete',
    ACTION_BY = '$user_id',
    ACTION_ON = '$current_date'
    WHERE HEAD_CODE = '$id'";
    $run = oci_parse($c, $query);
    if(oci_execute($run)){
        $return_data = array(
            "status" => 1,
            "message" => "Account Head has been deleted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Account Head has not been deleted"
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