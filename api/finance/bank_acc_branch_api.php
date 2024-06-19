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
    //$query = "SELECT * FROM BANKS_SETUP WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $query = "SELECT A.*,B.BANK_NAME
    FROM BANKS_SETUP_BRANCHES A
    LEFT JOIN BANKS_SETUP B
    ON A.BANK_ID = B.BANK_ID
    WHERE A.COMPANY_ID = '$company_id' 
    AND A.PROJECT_ID = '$project_id'
    AND A.DELETE_FLG = '0'";
    //print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); die();
    if(isset($_POST['branch_name']) && !(empty($_POST['branch_name']))){
        $branch_name = $_POST['branch_name'];
        $bank_name = $_POST['bank_name'];
        $region = $_POST['region'];
        $area = $_POST['area'];
        $city = $_POST['city'];
        $bm_d_number = $_POST['bm_d_number'];
        $om_d_number = $_POST['om_d_number'];
        $pabx = $_POST['pabx'];
        $fax = $_POST['fax'];
        $address = $_POST['address'];

        $check_query_ai = "SELECT MAX(ID) AS ID FROM BANKS_SETUP_BRANCHES WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $check_run_ai = oci_parse($c, $check_query_ai);    
        oci_execute($check_run_ai);
        $check_row_ai = oci_fetch_assoc($check_run_ai);
        // print_r($check_query_ai); die();
        if (empty($check_row_ai['ID'])) {
            $id = '1';
        }else{
            $id = $check_row_ai['ID']+'1'; 
        }

        $query = "INSERT INTO BANKS_SETUP_BRANCHES (ID,BRANCH_NAME,BANK_ID,REGION,CITY_AREA,CITY,BM_DIRECT_NO,OM_DIRECT_NO,PABX,FAX,ADDRESS,COMPANY_ID,PROJECT_ID,ACTION_BY,ACTION_ON,PC_IP,ACTION_TYPE) 
        VALUES ('$id','$branch_name','$bank_name','$region','$area','$city','$bm_d_number','$om_d_number','$pabx','$fax','$address','$company_id','$project_id','$user_id','$current_date','$ip_address','Insert')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Branch has not been inserted"
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
        $query = "SELECT * FROM BANKS_SETUP_BRANCHES WHERE ID = '$id'";
        //print_r($query); die();
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
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $branch_name = $_POST['branch_name'];
        $bank_name = $_POST['bank_name'];
        $region = $_POST['region'];
        $area = $_POST['area'];
        $city = $_POST['city'];
        $bm_d_number = $_POST['bm_d_number'];
        $om_d_number = $_POST['om_d_number'];
        $pabx = $_POST['pabx'];
        $fax = $_POST['fax'];
        $address = $_POST['address'];
        //get group,head,chart code
        //end
        $query = "UPDATE BANKS_SETUP_BRANCHES SET BRANCH_NAME='$branch_name',BANK_ID='$bank_name',REGION='$region',CITY_AREA='$area',CITY='$city',BM_DIRECT_NO='$bm_d_number',OM_DIRECT_NO='$om_d_number',PABX='$pabx',FAX='$fax',ADDRESS='$address',ACTION_BY='$user_id',ACTION_ON='$current_date',PC_IP='$ip_address',ACTION_TYPE='Update' WHERE ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Branch has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Branch has not been updated"
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
    $query = "UPDATE BANKS_SETUP_BRANCHES 
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
            "message" => "Branch has been deleted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Branch has not been deleted"
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