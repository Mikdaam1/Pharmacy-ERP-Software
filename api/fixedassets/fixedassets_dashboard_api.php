<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];



if(isset($_POST['action']) && $_POST['action'] == 'showstats1'){
    $query=" SELECT 'TOTAL LOCATIONS' AS NAME,COUNT(ID) AS TOTAL_COUNT FROM COD_FA_LOCATION 
            UNION
            SELECT 'TOTAL OFFICES' AS NAME,COUNT(ID) AS TOTAL_COUNT FROM COD_FA_OFFICES WHERE PROJECT_ID='$project_id' AND COMPANY_ID='$company_id'
            UNION
            SELECT 'TOTAL CATEGORY' AS NAME,COUNT(ID) AS TOTAL_COUNT FROM COD_FA_CATEGORY
            UNION
            SELECT 'TOTAL PRODUCTS' AS NAME,COUNT(ID) AS TOTAL_COUNT FROM COD_FA_PRODUCTS";
            // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
   
}elseif(isset($_POST['action']) && $_POST['action'] == 'inv_dashboard_view'){  
    $query = "SELECT  A.*,B.NAME,C.ASSETCATEGORYNAME,D.OFFICE_NAME,E.NAMENAME FROM COD_FA_PRODUCT_DETAIL A 
    INNER JOIN COD_FA_LOCATION B ON A.LOCATION_CODE = B.LOCATION_CODE
    INNER JOIN COD_FA_CATEGORY C ON A.CAT_CODE = C.CATEGORY_CODE
    INNER JOIN COD_FA_OFFICES D ON A.OFFICE_CODE = D.OFFICE_CODE
    INNER JOIN COD_USER_LOGIN E ON A.ACTION_BY = E.ID  WHERE A.ACTION_ON >= sysdate-15 ORDER BY A.ACTION_ON DESC
    ";
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