<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT LAND_AREA_TYPE_ID,LAND_AREA_TYPE
              FROM LAND_AREA_TYPE
              WHERE PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by LAND_AREA_TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'viewdrop'){
    $query = "SELECT LAND_AREA_TYPE_ID,LAND_AREA_TYPE
              FROM LAND_AREA_TYPE
              WHERE  PROJECT_ID='$project_id' AND DELETE_FLG='0' 
              order by LAND_AREA_TYPE_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['typedes_short']) && !(empty($_POST['typedes_short']))){
        $typedes_short = $_POST['typedes_short'];
        
        $current_date = date('j:M:y');
        
         $get_area_id_q = "SELECT MAX(LAND_AREA_TYPE_ID)+1 as LAND_AREA_TYPE_ID FROM LAND_AREA_TYPE";
                    $get_area_id_r = oci_parse($c, $get_area_id_q);    
                    oci_execute($get_area_id_r);
                    $get_area_id_row = oci_fetch_assoc($get_area_id_r);
                    $area_id = $get_area_id_row['LAND_AREA_TYPE_ID'];


        $query = "INSERT INTO LAND_AREA_TYPE (LAND_AREA_TYPE_ID,LAND_AREA_TYPE,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$area_id','$typedes_short','Insert','$user_id','$current_date','$project_id','$company_id')";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area Type has been inserted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area Type has not been inserted"
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
        $query = "SELECT * FROM LAND_AREA_TYPE WHERE LAND_AREA_TYPE_ID = '$id'";
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
        $typedes_short = $_POST['typedes_short'];
        $current_date = date('j:M:y');
       
        //end
        $query = "UPDATE LAND_AREA_TYPE SET LAND_AREA_TYPE='$typedes_short',ACTION_TYPE='Update',ACTION_BY='$user_id',ACTION_ON='$current_date',PROJECT_ID='$project_id',COMPANY_ID='$company_id' WHERE LAND_AREA_TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area Type has been updated"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area Type has not been updated"
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
        $query = "UPDATE  LAND_AREA_TYPE SET DELETE_FLG='1',ACTION_TYPE='Delete',ACTION_BY='$user_id',ACTION_ON='$current_date' WHERE LAND_AREA_TYPE_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Area Type has been Deleted"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Area Type has not been Deleted"
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