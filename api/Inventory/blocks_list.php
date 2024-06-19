<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT a.BLOCK_ID,a.DESCRIPTION,a.ACTIVE,b.LANDDESC
              FROM B_UNIT_BLOCKS a, COD_LAND_PROCUREMENT b
              WHERE a.PROCUREMENT_ID=b.ID AND a.PROJECT_ID='$project_id' AND a.DELETE_FLG='0' AND a.ACTIVE ='Y'
              order by a.BLOCK_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['land_type']) && !(empty($_POST['land_type']))){
        $land_type = $_POST['land_type'];
        $block_name = $_POST['block_name'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');


            $get_block_id_q = "SELECT MAX(BLOCK_ID)+1 as BLOCK_ID FROM B_UNIT_BLOCKS";
                    $get_block_id_r = oci_parse($c, $get_block_id_q);    
                    oci_execute($get_block_id_r);
                    $get_block_id_row = oci_fetch_assoc($get_block_id_r);
                    $block_id = $get_block_id_row['BLOCK_ID'];

        $query = "INSERT INTO B_UNIT_BLOCKS (BLOCK_ID,DESCRIPTION,ACTIVE,PROCUREMENT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$block_id','$block_name','$status','$land_type','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Inventory Block has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Inventory Block has not been inserted"
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
        $query = "SELECT * FROM B_UNIT_BLOCKS WHERE BLOCK_ID = '$id'";
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
        $land_type = $_POST['land_type'];
        $block_name = $_POST['block_name'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE B_UNIT_BLOCKS SET DESCRIPTION='$block_name',ACTIVE='$status',PROCUREMENT_ID='$land_type',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE BLOCK_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Inventory Block has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Inventory Block has not been updated"
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
        $query = "UPDATE  B_UNIT_BLOCKS SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE BLOCK_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Inventory Block has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Inventory Block has not been Deleted"
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'viewdrop'){
    $query = "SELECT a.BLOCK_ID,a.DESCRIPTION,a.ACTIVE,b.LANDDESC
              FROM B_UNIT_BLOCKS a, COD_LAND_PROCUREMENT b
              WHERE a.PROCUREMENT_ID=b.ID AND a.PROJECT_ID='$project_id' AND a.DELETE_FLG='0' AND ACTIVE='Y'
              order by a.BLOCK_ID DESC";
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
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>