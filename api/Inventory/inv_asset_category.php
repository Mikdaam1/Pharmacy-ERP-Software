<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT TYPE_ID,DESCRIPTION,ACTIVE,TYPE_DESC
              FROM B_UNIT_TYPES
              WHERE PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'viewdrop'){
    $query = "SELECT TYPE_ID,DESCRIPTION,TYPE_DESC
              FROM B_UNIT_TYPES
              WHERE ACTIVE='Y' AND PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['category_short']) && !(empty($_POST['category_short']))){
        $category_short = $_POST['category_short'];
        $category_long = $_POST['category_long'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');



            $get_type_id_q = "SELECT MAX(TYPE_ID)+1 as TYPE_ID FROM B_UNIT_TYPES";
                    $get_type_id_r = oci_parse($c, $get_type_id_q);    
                    oci_execute($get_type_id_r);
                    $get_typeid_row = oci_fetch_assoc($get_type_id_r);
                    $type_id = $get_typeid_row['TYPE_ID'];


        $query = "INSERT INTO B_UNIT_TYPES (TYPE_ID,DESCRIPTION,ACTIVE,TYPE_DESC,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$type_id','$category_long','$status','$category_short','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Category Type has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Category has not been inserted"
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
        $query = "SELECT * FROM B_UNIT_TYPES WHERE TYPE_ID = '$id'";
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
        $category_short = $_POST['category_short'];
        $category_long = $_POST['category_long'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE B_UNIT_TYPES SET DESCRIPTION='$category_long',ACTIVE='$status',TYPE_DESC='$category_short',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
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
    
        oci_free_statement($run);
        oci_close($c);

    }else{
        $return_data = array(
          "status" => 0,
          "message" => "ID Required"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'delete'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE  B_UNIT_TYPES SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Asset Category has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Asset Category has not been Deleted"
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
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>