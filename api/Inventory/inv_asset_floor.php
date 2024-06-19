<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT LOC_TYPE_ID,SHORT_NAME,LOC_DESC,ACTIVE
              FROM FXA_LOC_TYPE
              WHERE PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by LOC_TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'viewdrop'){
    $query = "SELECT LOC_TYPE_ID,SHORT_NAME
              FROM FXA_LOC_TYPE
              WHERE ACTIVE='Y' AND PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by LOC_TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['floor_short']) && !(empty($_POST['floor_short']))){
        $floor_short = $_POST['floor_short'];
        $floor_long = $_POST['floor_long'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');


          $get_floor_id_q = "SELECT MAX(LOC_TYPE_ID)+1 as LOC_TYPE_ID FROM FXA_LOC_TYPE";
                    $get_floor_id_r = oci_parse($c, $get_floor_id_q);    
                    oci_execute($get_floor_id_r);
                    $get_floor_id_row = oci_fetch_assoc($get_floor_id_r);
                    $LOC_TYPE_ID = $get_floor_id_row['LOC_TYPE_ID'];

        $query = "INSERT INTO FXA_LOC_TYPE (LOC_TYPE_ID,LOC_DESC,SHORT_NAME,ACTIVE,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$LOC_TYPE_ID','$floor_long','$floor_short','$status','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Floor has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Floor has not been inserted"
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
        $query = "SELECT * FROM FXA_LOC_TYPE WHERE LOC_TYPE_ID = '$id'";
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
        $floor_short = $_POST['floor_short'];
        $floor_long = $_POST['floor_long'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE FXA_LOC_TYPE SET LOC_DESC='$floor_long',ACTIVE='$status',SHORT_NAME='$floor_short',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE LOC_TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Floor has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Floor has not been updated"
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
        $query = "UPDATE  FXA_LOC_TYPE SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE LOC_TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Floor has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Floor has not been Deleted"
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