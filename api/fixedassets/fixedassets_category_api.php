<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$current_date = date('j:M:y');
$user_id = $_SESSION['data']['ID'];



if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $view_q = "SELECT * FROM COD_FA_CATEGORY";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else if(isset($_POST['action']) && $_POST['action'] == 'edit'){
        $id=$_POST['id'];
        $office_e="SELECT ASSETCATEGORYNAME FROM COD_FA_CATEGORY WHERE ID=$id";
        $office_r = oci_parse($c, $office_e);
        oci_execute($office_r);
        $office_row = oci_fetch_assoc($office_r);
        $return_data = $office_row;
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $ids=$_POST['id'];
    $categoryname_u=$_POST['categoryname_u'];
    $category_update="UPDATE COD_FA_CATEGORY set ASSETCATEGORYNAME='$categoryname_u', ACTION_TYPE='Update', 
                      ACTION_ON='$current_date', ACTION_BY='$user_id' WHERE ID=$ids";           
    $categoryupdate_r = oci_parse($c, $category_update);
    if(oci_execute($categoryupdate_r)){
        $return_data = array(
            "status" => 1,
            "message" => "Category has been updated"
        );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Category has not been updated"
        );
    }
    oci_free_statement($categoryupdate_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['category_name']) && isset($_POST['category_code']) && !(empty($_POST['category_name']) || empty($_POST['category_code']))){
        $category_name = $_POST['category_name'];
        $category_code = $_POST['category_code'];
        $add_q="select * from COD_FA_CATEGORY WHERE CATEGORY_CODE='$category_code'";
        $add_r = oci_parse($c, $add_q);
        oci_execute($add_r);
        $add_row = oci_fetch_assoc($add_r);

        if($add_row > 1){
            $return_data = array(
                "status" => 0,
                "message" => $category_code." already exist"
            );  
          
        }else{
            $query = "INSERT INTO COD_FA_CATEGORY (ASSETCATEGORYNAME,CATEGORY_CODE,ACTION_TYPE,ACTION_ON,ACTION_BY,PROJECT_ID,COMPANY_ID) 
                        VALUES ('$category_name','$category_code','Insert','$current_date ','$user_id','$project_id','$company_id')" ;
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "category has been inserted"
                );
            }else{
                $return_data = array(
                    "status" => 0,
                    "message" => "category has not been inserted"
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