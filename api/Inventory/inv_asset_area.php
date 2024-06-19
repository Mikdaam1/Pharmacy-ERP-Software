<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT AREA_ID,AREA_DESCRIPTION,ACTIVE
              FROM AREA_SETUP
              WHERE PROJECT_ID='$project_id' AND DELETE_FLG='0' AND ACTIVE='Y'
              order by AREA_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['area_short']) && !(empty($_POST['area_short']))){
        $area_short = $_POST['area_short'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
          

           $get_area_id_q = "SELECT MAX(AREA_ID)+1 as AREA_ID FROM AREA_SETUP";
                    $get_area_id_r = oci_parse($c, $get_area_id_q);    
                    oci_execute($get_area_id_r);
                    $get_area_id_row = oci_fetch_assoc($get_area_id_r);
                    $area_id = $get_area_id_row['AREA_ID'];

        $query = "INSERT INTO AREA_SETUP (AREA_ID,AREA_DESCRIPTION,ACTIVE,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$area_id','$area_short','$status','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area has not been inserted"
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
        $query = "SELECT * FROM AREA_SETUP WHERE AREA_ID = '$id'";
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
        $area_short = $_POST['area_short'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE AREA_SETUP SET AREA_DESCRIPTION='$area_short',ACTIVE='$status',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE AREA_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area has not been updated"
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
        $query = "UPDATE  AREA_SETUP SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE AREA_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area has not been Deleted"
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