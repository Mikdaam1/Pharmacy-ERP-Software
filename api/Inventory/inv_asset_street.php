<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT a.STREET_ID,a.STREET_DESCRIPTION,a.ACTIVE,b.DESCRIPTION BLOCKNAME
              FROM STREET_SETUP a, B_UNIT_BLOCKS b
              WHERE a.BLOCK_ID=b.BLOCK_ID AND a.PROJECT_ID='$project_id' AND a.DELETE_FLG='0' 
              order by a.STREET_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['block_type']) && !(empty($_POST['block_type']))){
        $block_type = $_POST['block_type'];
        $street_name = $_POST['street_name'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');

          $get_street_id_q = "SELECT MAX(STREET_ID)+1 as STREET_ID FROM STREET_SETUP";
                    $get_street_id_r = oci_parse($c, $get_street_id_q);    
                    oci_execute($get_street_id_r);
                    $get_street_id_row = oci_fetch_assoc($get_street_id_r);
                    $STREET_ID = $get_street_id_row['STREET_ID'];
      

        $query = "INSERT INTO STREET_SETUP (STREET_ID,STREET_DESCRIPTION,ACTIVE,BLOCK_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$STREET_ID','$street_name','$status','$block_type','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Street has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Street has not been inserted"
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
        $query = "SELECT * FROM STREET_SETUP WHERE STREET_ID = '$id'";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'editdrop'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "SELECT * FROM STREET_SETUP WHERE BLOCK_ID IN ('$id','0') AND ACTIVE='Y' AND DELETE_FLG='0'";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'editdropname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];

        $get_blockid_q = "SELECT BLOCK_ID FROM B_UNIT_BLOCKS WHERE DESCRIPTION = '$id'";
        $get_blockid_r = oci_parse($c, $get_blockid_q);    
        oci_execute($get_blockid_r);
        $get_block_row = oci_fetch_assoc($get_blockid_r);
        $block_id = $get_block_row['BLOCK_ID'];

        $query = "SELECT * FROM STREET_SETUP WHERE BLOCK_ID IN ('$block_id','0') AND ACTIVE='Y' AND DELETE_FLG='0'";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $block_type = $_POST['block_type'];
        $street_name = $_POST['street_name'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE STREET_SETUP SET STREET_DESCRIPTION='$street_name',ACTIVE='$status',BLOCK_ID='$block_type',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE STREET_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Street has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "street has not been updated"
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
        $query = "UPDATE  STREET_SETUP SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE STREET_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Street has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Street has not been Deleted"
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