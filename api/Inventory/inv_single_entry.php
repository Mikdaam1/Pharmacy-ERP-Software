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
    if(isset($_POST['location_id']) && !(empty($_POST['location_id']))){
        $location_id = $_POST['location_id'];
        $block_id = $_POST['block_id'];
        $street_id = $_POST['street_id'];
        $type_id = $_POST['type_id'];
        $cat_id = $_POST['cat_id'];
        $feat_id = $_POST['feat_id'];
        $floor_id = $_POST['floor_id'];
        $sizetype_id = $_POST['sizetype_id'];
        $size = $_POST['size'];
        $Dimension = $_POST['Dimension'];
        $unit_status = $_POST['unit_status'];
        $unit_division = $_POST['unit_division'];
        $Postfix = $_POST['Postfix'];
        $assetnumber = $_POST['assetnumber'];
        $prefix = $_POST['prefix'];
        $material_code = $Postfix.$assetnumber.$prefix;
        $current_date = date('j:M:y');
        $action_type="Insert";
        $clen_material_code = preg_replace('/[^A-Za-z0-9]/', '', $material_code);
          $ACC_TYPE        =          '2000';
        $ACC_DETAIL_TYPE =          '20002';
        $HEAD_CODE       =          '310';
        $CHART_ACC_CODE  =          '11';
        $HEAD_CODE_CNCL  =          '301';
        $CHART_ACC_CODE_CNCL  =     '16';
        $ACC_TYPE_CNCL        =     '2000';
        $ACC_DETAIL_TYPE_CNCL =     '20001';
        $HEAD_CODE_FORFEIT    =     '713';
        $CHART_ACC_CODE_FORFEIT  =  '8';
        $ACC_TYPE_FORFEIT        =  '40000';
        $ACC_DETAIL_TYPE_FORFEIT =  '40003';
        $ACC_TYPE_SRC            =  '40000';
        $ACC_DETAIL_TYPE_SRC     =  '40002';
        $HEAD_CODE_SRC           =  '705';
        $CHART_ACC_CODE_SRC      =  '4';

        $query = "SELECT * FROM INV_MATERIAL_MASTER 
                    WHERE SHORT_NAME = '$clen_material_code' 
                    AND BLOCK_ID = '$block_id' 
                    AND STREET_ID = '$street_id' 
                    AND ASSET_NATURE = '$type_id' 
                    AND ASSET_TYPE_ID = '$cat_id'";
        $run = oci_parse($c, $query);
        oci_execute($run);
        $row = oci_fetch_assoc($run);
        if($row > 1){
            $return_data = array(
                "status" => 0,
                "message" => "This '".$clen_material_code."' Asset Number Already Exist"
            );
        }else{
            $proc_q = 'BEGIN Single_entry_inv(:SHORT_NAME, :AREA_ID, :BLOCK_ID, :STREET_ID,
            :ASSET_NATURE, :ASSET_TYPE_ID, :CAT_ID,
            :LOCATION_ID,:LAND_AREA_TYPE_ID,:LAND_AREA, :DIMENSION,
            :STATUS,:DIVERSION,:PROJECT_ID,:COMPANY_ID,:ACTION_TYPE,:ACTION_BY,:ACTION_ON,:BUNCH_CODE,:ACC_TYPE, :ACC_DETAIL_TYPE, :HEAD_CODE, :CHART_ACC_CODE, :HEAD_CODE_CNCL  
            , :CHART_ACC_CODE_CNCL, :ACC_TYPE_CNCL, :ACC_DETAIL_TYPE_CNCL, :HEAD_CODE_FORFEIT    
            , :CHART_ACC_CODE_FORFEIT, :ACC_TYPE_FORFEIT, :ACC_DETAIL_TYPE_FORFEIT, :ACC_TYPE_SRC  ,:ACC_DETAIL_TYPE_SRC, :HEAD_CODE_SRC, :CHART_ACC_CODE_SRC); END;';
            $proc_q_r = oci_parse($c, $proc_q);
            oci_bind_by_name($proc_q_r, ':SHORT_NAME', $clen_material_code);
            oci_bind_by_name($proc_q_r, ':AREA_ID', $location_id);
            oci_bind_by_name($proc_q_r, ':BLOCK_ID', $block_id);
            oci_bind_by_name($proc_q_r, ':STREET_ID', $street_id);
            oci_bind_by_name($proc_q_r, ':ASSET_NATURE', $type_id);
            oci_bind_by_name($proc_q_r, ':ASSET_TYPE_ID', $cat_id);
            oci_bind_by_name($proc_q_r, ':CAT_ID', $feat_id);
            oci_bind_by_name($proc_q_r, ':LOCATION_ID', $floor_id);
            oci_bind_by_name($proc_q_r, ':LAND_AREA_TYPE_ID', $sizetype_id);
            oci_bind_by_name($proc_q_r, ':LAND_AREA', $size);
            oci_bind_by_name($proc_q_r, ':DIMENSION', $Dimension);
            oci_bind_by_name($proc_q_r, ':STATUS', $unit_status);
            oci_bind_by_name($proc_q_r, ':DIVERSION', $unit_division);
            oci_bind_by_name($proc_q_r, ':PROJECT_ID', $project_id);
            oci_bind_by_name($proc_q_r, ':COMPANY_ID', $company_id);
            oci_bind_by_name($proc_q_r, ':ACTION_TYPE',$action_type);
            oci_bind_by_name($proc_q_r, ':ACTION_BY', $user_id);
            oci_bind_by_name($proc_q_r, ':ACTION_ON', $current_date);
            oci_bind_by_name($proc_q_r, ':BUNCH_CODE', $bunch_code);
            oci_bind_by_name($proc_q_r, ':ACC_TYPE',$ACC_TYPE);
            oci_bind_by_name($proc_q_r, ':ACC_DETAIL_TYPE', $ACC_DETAIL_TYPE);
            oci_bind_by_name($proc_q_r, ':HEAD_CODE', $HEAD_CODE);
            oci_bind_by_name($proc_q_r, ':CHART_ACC_CODE', $CHART_ACC_CODE);
            oci_bind_by_name($proc_q_r, ':HEAD_CODE_CNCL',$HEAD_CODE_CNCL);
            oci_bind_by_name($proc_q_r, ':CHART_ACC_CODE_CNCL', $CHART_ACC_CODE_CNCL);
            oci_bind_by_name($proc_q_r, ':ACC_TYPE_CNCL', $ACC_TYPE_CNCL);
            oci_bind_by_name($proc_q_r, ':ACC_DETAIL_TYPE_CNCL', $ACC_DETAIL_TYPE_CNCL);
            oci_bind_by_name($proc_q_r, ':HEAD_CODE_FORFEIT',$HEAD_CODE_FORFEIT);
            oci_bind_by_name($proc_q_r, ':CHART_ACC_CODE_FORFEIT', $CHART_ACC_CODE_FORFEIT);
            oci_bind_by_name($proc_q_r, ':ACC_TYPE_FORFEIT', $ACC_TYPE_FORFEIT);
            oci_bind_by_name($proc_q_r, ':ACC_DETAIL_TYPE_FORFEIT', $ACC_DETAIL_TYPE_FORFEIT);
            oci_bind_by_name($proc_q_r, ':ACC_TYPE_SRC',$ACC_TYPE_SRC);
            oci_bind_by_name($proc_q_r, ':ACC_DETAIL_TYPE_SRC', $ACC_DETAIL_TYPE_SRC);
            oci_bind_by_name($proc_q_r, ':HEAD_CODE_SRC', $HEAD_CODE_SRC);
            oci_bind_by_name($proc_q_r, ':CHART_ACC_CODE_SRC', $CHART_ACC_CODE_SRC);
             
         
            if(oci_execute($proc_q_r)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Inventory Asset has been inserted"
                );
            }else{
                $return_data = array(
                    "status" => 0,
                    "message" => "Inventory Asset has not been inserted"
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
}
elseif(isset($_POST['action']) && $_POST['action'] == 'insert1'){
    if(isset($_POST['location_id']) && !(empty($_POST['location_id']))){
        $location_id = $_POST['location_id'];
        $block_id = $_POST['block_id'];
        $street_id = $_POST['street_id'];
        $type_id = $_POST['type_id'];
        $cat_id = $_POST['cat_id'];
        $feat_id = $_POST['feat_id'];
        $floor_id = $_POST['floor_id'];
        $sizetype_id = $_POST['sizetype_id'];
        $size = $_POST['size'];
        $Dimension = $_POST['Dimension'];
        $unit_status = $_POST['unit_status'];
        $unit_division = $_POST['unit_division'];
        $Postfix = $_POST['Postfix'];
        $assetnumber = $_POST['assetnumber'];
        //$assetnumbermax=$_POST['assetnumbermax'];
        $prefix = $_POST['prefix'];
        //$material_code = $Postfix.$assetnumber;
        $current_date = date('j:M:y');
        $action_type="Insert";
        $returndata=0;
        
        $looptotal = $prefix-$assetnumber;
        for($i=0;i<=$looptotal;$i++)
        {
            
            $material_code = $Postfix.$assetnumber;
            $clen_material_code = preg_replace('/[^A-Za-z0-9]/', '', $material_code);

            $query = "SELECT * FROM INV_MATERIAL_MASTER WHERE SHORT_NAME = '$clen_material_code'";
            $run = oci_parse($c, $query);
            oci_execute($run);
            $row = oci_fetch_assoc($run);
            if($row > 1){
                $returndata=$clen_material_code;
            }
            $assetnumber++;
        }
        $return_data = array(
            "status" => 0,
            "message" => "This '".$returndata."' Asset Number Already Exist"
        );
        
       

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