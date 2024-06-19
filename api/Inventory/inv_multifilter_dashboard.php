<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];



if(isset($_POST['action']) && $_POST['action'] == 'showstats1'){
   
      
        $query  = "SELECT
        cod_inv_divisions.ID AS ID,
        cod_inv_divisions.description AS NAMED,
        COUNT(INV_MATERIAL_MASTER.diversion) AS Total
        FROM
            cod_inv_divisions
        LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_divisions.id = INV_MATERIAL_MASTER.diversion
        GROUP BY cod_inv_divisions.ID,cod_inv_divisions.description ORDER BY cod_inv_divisions.ID ASC";
     

        $run = oci_parse($c, $query);
        oci_execute($run);
        $return_data=[];
        while ($row = oci_fetch_assoc($run)){
            $return_data[] = $row;
        }
    
        oci_free_statement($run);
        oci_close($c);

   
}elseif(isset($_POST['action']) && $_POST['action'] == 'showstats2'){
   
      
    $query  = "SELECT
    cod_inv_status.STATUS_ID AS ID,
    cod_inv_status.STATUS AS NAMED,
    COUNT(INV_MATERIAL_MASTER.status) AS Total
    FROM
        cod_inv_status
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_status.STATUS_ID = INV_MATERIAL_MASTER.status
    GROUP BY cod_inv_status.STATUS_ID,cod_inv_status.STATUS ORDER BY cod_inv_status.STATUS_ID ASC";
 

    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'drilstatusgraph'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
    cod_inv_status.STATUS_ID AS ID,
    cod_inv_status.STATUS AS NAMED,
    COUNT(INV_MATERIAL_MASTER.status) AS Total
    FROM
        cod_inv_status
    LEFT JOIN INV_MATERIAL_MASTER ON cod_inv_status.STATUS_ID = INV_MATERIAL_MASTER.status 
    WHERE INV_MATERIAL_MASTER.diversion = '$id'
    GROUP BY cod_inv_status.STATUS_ID,cod_inv_status.STATUS ORDER BY cod_inv_status.STATUS_ID ASC";
 

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
}elseif(isset($_POST['action']) && $_POST['action'] == 'getdivisionname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        description
        FROM
        cod_inv_divisions
        WHERE ID = '$id'";
 

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
}elseif(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM VIEW_GETALL_INV";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'viewstatusdivdril'){
     if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query = "  SELECT
        inv.MATERIAL_CODE AS Assetcode,
        inv.short_name AS AssetName,
        area.Description AS AreaName,
        block.description AS AssetBlock,
        street.STREET_DESCRIPTION AS AssetStreet,
        unitype.description AS Assetcategory,
        unitnature.description AS AssetNature,
        unitfloor.description AS AssetFloor,
        unitareatype.description AS AssetAreaType,
        inv.land_area AS AssetArea,
        inv.dimension AS Dimension,
        unitfeatures.description AS AssetFeatures,
        unitstaus.status AS AssetStatus,
        div.description AS Assetdivision
        
        
      FROM
        cod_inv_divisions div,
        INV_MATERIAL_MASTER inv,
        cod_inv_asset_area area,
        B_UNIT_BLOCKS block,
        STREET_SETUP street,
        B_UNIT_TYPES unitype,
        cod_inv_asset_type unitnature,
        cod_inv_loc_type unitfloor,
        cod_inv_land_area_type unitareatype,
        b_unit_category_master unitfeatures,
        cod_inv_status unitstaus
        
        
      WHERE inv.diversion=div.id 
        AND
            inv.AREA_ID=area.AREA_ID
        AND 
            inv.block_id=block.block_id
        AND 
            inv.street_id=street.street_id
        AND 
            inv.asset_type_id=unitype.TYPE_ID
        AND 
            inv.asset_nature=unitnature.TYPE_ID
        AND 
            inv.location_id=unitfloor.loc_type_id
        AND 
            inv.land_area_type_id=unitareatype.type_id
        AND 
            inv.cat_id=unitfeatures.cat_id
        AND 
            inv.status=unitstaus.status_id 
        AND 
            inv.diversion='$id'";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['land_type']) && !(empty($_POST['land_type']))){
        $land_type = $_POST['land_type'];
        $block_name = $_POST['block_name'];
        $status = $_POST['status'];
        $current_date = date('j:M:y');

        $query = "INSERT INTO B_UNIT_BLOCKS (DESCRIPTION,ACTIVE,PROCUREMENT_ID,ACTION_TYPE,ACTION_BY,ACTION_ON,PROJECT_ID,COMPANY_ID) VALUES ('$block_name','$status','$land_type','Insert','$user_id','$current_date','$project_id','$company_id')";
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