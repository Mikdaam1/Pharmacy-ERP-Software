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
        WHERE   
        cod_inv_divisions.ACTIVE='Y'
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
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
    WHERE   
    cod_inv_status.ACTIVE='Y'
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
    GROUP BY cod_inv_status.STATUS_ID,cod_inv_status.STATUS ORDER BY cod_inv_status.STATUS_ID ASC";
 
//  print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'getcatogorystats'){
   
      
    $query  = "SELECT
    B_UNIT_TYPES.TYPE_ID AS ID,
    B_UNIT_TYPES.TYPE_DESC AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_type_id) AS Total
    FROM
    B_UNIT_TYPES
    LEFT JOIN INV_MATERIAL_MASTER ON B_UNIT_TYPES.TYPE_ID = INV_MATERIAL_MASTER.Asset_type_id
    WHERE B_UNIT_TYPES.ACTIVE='Y'  
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
    GROUP BY B_UNIT_TYPES.TYPE_ID,B_UNIT_TYPES.TYPE_DESC ORDER BY B_UNIT_TYPES.TYPE_ID ASC";
 

    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);


}elseif(isset($_POST['action']) && $_POST['action'] == 'gettypestats'){
    
       
    $query  = "SELECT
    b_asset_type.TYPE_ID AS ID,
    b_asset_type.DESCRIPTION AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_Nature) AS Total
    FROM
    b_asset_type
    LEFT JOIN INV_MATERIAL_MASTER ON b_asset_type.TYPE_ID = INV_MATERIAL_MASTER.Asset_Nature
    WHERE b_asset_type.ACTIVE='Y' 
    AND b_asset_type.PROJECT_ID ='$project_id' 
    AND b_asset_type.COMPANY_ID='$company_id'
    GROUP BY b_asset_type.TYPE_ID,b_asset_type.DESCRIPTION ORDER BY b_asset_type.TYPE_ID ASC";
 


    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

   


}elseif(isset($_POST['action']) && $_POST['action'] == 'getcatogorystatsdril'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
       
    $query  = "SELECT
    B_UNIT_TYPES.TYPE_ID AS ID,
    B_UNIT_TYPES.TYPE_DESC AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_type_id) AS Total
    FROM
    B_UNIT_TYPES
    LEFT JOIN INV_MATERIAL_MASTER ON B_UNIT_TYPES.TYPE_ID = INV_MATERIAL_MASTER.Asset_type_id
    WHERE B_UNIT_TYPES.ACTIVE='Y' 
    AND INV_MATERIAL_MASTER.status ='$id'
    AND B_UNIT_TYPES.PROJECT_ID ='$project_id' 
    AND B_UNIT_TYPES.COMPANY_ID='$company_id'
    GROUP BY B_UNIT_TYPES.TYPE_ID,B_UNIT_TYPES.TYPE_DESC ORDER BY B_UNIT_TYPES.TYPE_ID ASC";
 


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


}elseif(isset($_POST['action']) && $_POST['action'] == 'gettypestatsdril'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
       
    $query  = "SELECT
    b_asset_type.TYPE_ID AS ID,
    b_asset_type.DESCRIPTION AS NAMED,
    COUNT(INV_MATERIAL_MASTER.Asset_Nature) AS Total
    FROM
    b_asset_type
    LEFT JOIN INV_MATERIAL_MASTER ON b_asset_type.TYPE_ID = INV_MATERIAL_MASTER.Asset_Nature
    WHERE b_asset_type.ACTIVE='Y' 
    AND INV_MATERIAL_MASTER.Asset_type_id ='$id'
    AND b_asset_type.PROJECT_ID ='$project_id' 
    AND b_asset_type.COMPANY_ID='$company_id'
    GROUP BY b_asset_type.TYPE_ID,b_asset_type.DESCRIPTION ORDER BY b_asset_type.TYPE_ID ASC";
 


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
        AND cod_inv_status.ACTIVE='Y'
        AND INV_MATERIAL_MASTER.PROJECT_ID ='$project_id' 
        AND INV_MATERIAL_MASTER.COMPANY_ID='$company_id'
        AND INV_MATERIAL_MASTER.DELETE_FLG='0'
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'getstatusnname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        STATUS
        FROM
        cod_inv_status
        WHERE STATUS_ID = '$id'";
 

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
}elseif(isset($_POST['action']) && $_POST['action'] == 'getcategorynname'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        $query  = "SELECT
        TYPE_DESC
        FROM
        B_UNIT_TYPES
        WHERE TYPE_ID = '$id'";
 

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
    $query = "  SELECT
    inv.MATERIAL_CODE AS Assetcode,
  inv.short_name AS AssetName,
  area.AREA_Description AS AreaName,
  block.description AS AssetBlock,
  street.street_description AS AssetStreet,
  unitype.type_desc AS Assetcategory,
  unitnature.description AS AssetNature,
  unitfloor.loc_desc AS AssetFloor,
  unitareatype.land_area_type AS AssetAreaType,
  inv.land_area AS AssetArea,
  inv.dimension AS Dimension,
  unitfeatures.description AS AssetFeatures,
  unitstaus.status AS AssetStatus,
  div.description AS Assetdivision
    
    
  FROM
     cod_inv_divisions div,
  inv_material_master inv,
  area_setup area,
  b_unit_blocks block,
  street_setup street,
  b_unit_types unitype,
  b_asset_type unitnature,
  fxa_loc_type unitfloor,
  land_area_type unitareatype,
  b_unit_category_master unitfeatures,
  cod_inv_status unitstaus
    
    
  WHERE 
 
        inv.PROJECT_ID ='$project_id' 
    AND 
        inv.COMPANY_ID='$company_id'
    AND 
        inv.DELETE_FLG='0'
    AND 
        inv.diversion=div.id 
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
      inv.land_area_type_id=unitareatype.LAND_AREA_TYPE_ID
  AND 
      inv.cat_id=unitfeatures.cat_id
  AND 
      inv.status=unitstaus.status_id
    ";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'inv_dashboard_view'){
    
    $query = "SELECT * FROM (SELECT
             inv.MATERIAL_CODE AS Assetcode,
  inv.short_name AS AssetName,
  area.AREA_Description AS AreaName,
  block.description AS AssetBlock,
  street.street_description AS AssetStreet,
  unitype.type_desc AS Assetcategory,
  unitnature.description AS AssetNature,
  unitfloor.loc_desc AS AssetFloor,
  unitareatype.land_area_type AS AssetAreaType,
  inv.land_area AS AssetArea,
  inv.dimension AS Dimension,
  unitfeatures.description AS AssetFeatures,
  unitstaus.status AS AssetStatus,
  div.description AS Assetdivision
        FROM
            cod_inv_divisions div,
  inv_material_master inv,
  area_setup area,
  b_unit_blocks block,
  street_setup street,
  b_unit_types unitype,
  b_asset_type unitnature,
  fxa_loc_type unitfloor,
  land_area_type unitareatype,
  b_unit_category_master unitfeatures,
  cod_inv_status unitstaus
            
            
        WHERE 
            inv.PROJECT_ID ='4' 
        AND 
            inv.COMPANY_ID='2'
        AND 
            inv.DELETE_FLG='0'
        AND 
             inv.diversion=div.id 
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
      inv.land_area_type_id=unitareatype.LAND_AREA_TYPE_ID
  AND 
      inv.cat_id=unitfeatures.cat_id
  AND 
      inv.status=unitstaus.status_id
        )
        WHERE ROWNUM <= 15
    ";
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
          area.AREA_Description AS AreaName,
          block.description AS AssetBlock,
          street.street_description AS AssetStreet,
          unitype.type_desc AS Assetcategory,
          unitnature.description AS AssetNature,
          unitfloor.loc_desc AS AssetFloor,
          unitareatype.land_area_type AS AssetAreaType,
          inv.land_area AS AssetArea,
          inv.dimension AS Dimension,
          unitfeatures.description AS AssetFeatures,
          unitstaus.status AS AssetStatus,
          div.description AS Assetdivision
        
        
      FROM
          cod_inv_divisions div,
          inv_material_master inv,
          area_setup area,
          b_unit_blocks block,
          street_setup street,
          b_unit_types unitype,
          b_asset_type unitnature,
          fxa_loc_type unitfloor,
          land_area_type unitareatype,
          b_unit_category_master unitfeatures,
          cod_inv_status unitstaus
        
        
      WHERE 
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.diversion='$id'
        AND 
            inv.DELETE_FLG='0'
        AND 
           inv.diversion=div.id 
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
            inv.land_area_type_id=unitareatype.LAND_AREA_TYPE_ID
        AND 
            inv.cat_id=unitfeatures.cat_id
        AND 
            inv.status=unitstaus.status_id 
        ";

        // print_r($query);die();
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'viewstatusgategory'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
       $id = $_POST['id'];
       $query = "  SELECT
        inv.MATERIAL_CODE AS Assetcode,
  inv.short_name AS AssetName,
  area.AREA_Description AS AreaName,
  block.description AS AssetBlock,
  street.street_description AS AssetStreet,
  unitype.type_desc AS Assetcategory,
  unitnature.description AS AssetNature,
  unitfloor.loc_desc AS AssetFloor,
  unitareatype.land_area_type AS AssetAreaType,
  inv.land_area AS AssetArea,
  inv.dimension AS Dimension,
  unitfeatures.description AS AssetFeatures,
  unitstaus.status AS AssetStatus,
  div.description AS Assetdivision
       
       
     FROM
         cod_inv_divisions div,
  inv_material_master inv,
  area_setup area,
  b_unit_blocks block,
  street_setup street,
  b_unit_types unitype,
  b_asset_type unitnature,
  fxa_loc_type unitfloor,
  land_area_type unitareatype,
  b_unit_category_master unitfeatures,
  cod_inv_status unitstaus
       
       
     WHERE  
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.status='$id'
        AND 
            inv.DELETE_FLG='0'
        AND  
            inv.diversion=div.id 
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
      inv.land_area_type_id=unitareatype.LAND_AREA_TYPE_ID
  AND 
      inv.cat_id=unitfeatures.cat_id
  AND 
      inv.status=unitstaus.status_id";
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
}
elseif(isset($_POST['action']) && $_POST['action'] == 'viewcategorytype'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
       $id = $_POST['id'];
       $query = "  SELECT
         inv.MATERIAL_CODE AS Assetcode,
  inv.short_name AS AssetName,
  area.AREA_Description AS AreaName,
  block.description AS AssetBlock,
  street.street_description AS AssetStreet,
  unitype.type_desc AS Assetcategory,
  unitnature.description AS AssetNature,
  unitfloor.loc_desc AS AssetFloor,
  unitareatype.land_area_type AS AssetAreaType,
  inv.land_area AS AssetArea,
  inv.dimension AS Dimension,
  unitfeatures.description AS AssetFeatures,
  unitstaus.status AS AssetStatus,
  div.description AS Assetdivision
       
       
     FROM
       cod_inv_divisions div,
  inv_material_master inv,
  area_setup area,
  b_unit_blocks block,
  street_setup street,
  b_unit_types unitype,
  b_asset_type unitnature,
  fxa_loc_type unitfloor,
  land_area_type unitareatype,
  b_unit_category_master unitfeatures,
  cod_inv_status unitstaus
  
       
       
     WHERE  
            inv.PROJECT_ID ='$project_id' 
        AND 
            inv.COMPANY_ID='$company_id'
        AND 
            inv.asset_type_id='$id'
        AND 
            inv.DELETE_FLG='0'
        AND  
            inv.diversion=div.id 
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
      inv.land_area_type_id=unitareatype.LAND_AREA_TYPE_ID
  AND 
      inv.cat_id=unitfeatures.cat_id
  AND 
      inv.status=unitstaus.status_id";
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'multifilter'){
    

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
    
       
        //end
        $query = "SELECT * FROM VIEW_GETALL_INV WHERE ASSETNAME = NVL('$Postfix',ASSETNAME)
        AND AREANAME = NVL('$location_id',AREANAME)
        AND ASSETBLOCK = NVL('$block_id',ASSETBLOCK)
        AND ASSETCATEGORY = NVL('$cat_id',ASSETCATEGORY)
        AND ASSETNATURE = NVL('$type_id',ASSETNATURE)
        AND ASSETFLOOR = NVL('$floor_id',ASSETFLOOR)
        AND ASSETAREATYPE = NVL('$sizetype_id',ASSETAREATYPE)
        AND ASSETAREA = NVL('$size',ASSETAREA)
        AND DIMENSION = NVL('$Dimension',DIMENSION)
        AND ASSETFEATURES = NVL('$feat_id',ASSETFEATURES)
        AND ASSETSTATUS = NVL('$unit_status',ASSETSTATUS)
        AND ASSETDIVISION = NVL('$unit_division',ASSETDIVISION)";
        
    $run = oci_parse($c, $query);
    
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
       $return_data[] = $row;
        
      
    }
 
    
    oci_free_statement($run);
    oci_close($c);

   
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>