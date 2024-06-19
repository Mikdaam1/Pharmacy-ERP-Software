<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $view_q = "SELECT * FROM COD_FA_OFFICES WHERE PROJECT_ID='$project_id' AND COMPANY_ID='$company_id'";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }
    oci_free_statement($view_r);
    oci_close($c);
}
else if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    $id=$_POST['id'];
    $office_e="SELECT OFFICE_NAME,OFFICE_CODE FROM COD_FA_OFFICES WHERE ID=$id";
    $office_r = oci_parse($c, $office_e);
    oci_execute($office_r);
    $office_row = oci_fetch_assoc($office_r);
    $return_data = $office_row;
}
else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $ids=$_POST['id'];
    $officename_u=$_POST['officename_u'];
    $office_update="UPDATE COD_FA_OFFICES SET OFFICE_NAME='$officename_u', ACTION_TYPE='Update', 
                    ACTION_ON='$current_date',ACTION_BY='$user_id' WHERE ID=$ids";
    $officeupdate_r = oci_parse($c, $office_update);
    if(oci_execute($officeupdate_r)){
        $return_data = array(
            "status" => 1,
            "message" => "Office Name has been updated"
        );
    }else{
        $return_data = array(
          "status" => 0,
          "message" => "Office Name has not been updated"
        );
    }
    oci_free_statement($officeupdate_r);
    oci_close($c);
}
else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
  
    if(isset($_POST['office_name']) && isset($_POST['office_code']) && !(empty($_POST['office_name']) || empty($_POST['office_code']))){
        $office_name = $_POST['office_name'];
        $office_code = $_POST['office_code'];
        $val_q="select * from COD_FA_OFFICES WHERE OFFICE_CODE='$office_code'";
        $val_r = oci_parse($c, $val_q);
        oci_execute($val_r);
        $val_row = oci_fetch_assoc($val_r);

        if($val_row > 1){
            $return_data = array(
                "status" => 0,
                "message" => $office_code." already exist"
            );  
          
        }else{
            $query = "INSERT INTO COD_FA_OFFICES (OFFICE_NAME,OFFICE_CODE,ACTION_TYPE,ACTION_ON,ACTION_BY,PROJECT_ID,COMPANY_ID) 
                        VALUES ('$office_name','$office_code','Insert','$current_date ','$user_id','$project_id','$company_id')" ;
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Office has been inserted"
                );
            }else{
                $return_data = array(
                    "status" => 0,
                    "message" => "Office has not been inserted"
                );
            }
            oci_free_statement($run);
            oci_close($c);
        }
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