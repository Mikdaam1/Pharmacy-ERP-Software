<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $view_q = "SELECT DISTINCT A.ID,A.DESCRIPTION,B.ASSETCATEGORYNAME,C.OFFICE_NAME,D.NAME AS LOCATION_NAME,
                (SELECT COUNT(*) FROM COD_FA_PRODUCT_DETAIL WHERE PRODUCT_ID = A.ID AND DEL_FLG='0') AS QUANTITY
            FROM COD_FA_PRODUCTS A 
            INNER JOIN COD_FA_CATEGORY B ON A.CAT_ID=B.ID 
            INNER JOIN COD_FA_OFFICES C ON A.OFFICE_ID = C.ID 
            INNER JOIN COD_FA_LOCATION D ON A.LOCATION_ID = D.ID 
            INNER JOIN COD_FA_PRODUCT_DETAIL E ON A.ID = E.PRODUCT_ID
            WHERE E.DEL_FLG='0'";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else if(isset($_POST['action']) && $_POST['action'] == 'editproduct'){
    $barcode=$_POST['barcode'];
    $pro_e="SELECT BARCODE,DESCRIPTION FROM COD_FA_PRODUCT_DETAIL WHERE BARCODE='$barcode'";
    $pro_r = oci_parse($c, $pro_e);
    oci_execute($pro_r);
    $pro_row = oci_fetch_assoc($pro_r);
    $return_data = $pro_row;
}else if(isset($_POST['action']) && $_POST['action'] == 'view_barcodes'){
    $id = $_POST['id'];
    $view_q = "SELECT PRODUCT_ID,DESCRIPTION, BARCODE FROM COD_FA_PRODUCT_DETAIL 
               WHERE PRODUCT_ID='$id' AND DEL_FLG='0' ORDER BY BARCODE ASC";
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }   
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $barcode=$_POST['barcode'];
    $prod_id=$_POST['id'];
    // $upd_product_q = "UPDATE COD_FA_PRODUCTS SET QUANTITY=QUANTITY-1 , ACTION_TYPE='Update', 
    //                 ACTION_ON='$current_date', ACTION_BY='$user_id' WHERE ID='$prod_id'";
    $upd_pro_detail = "UPDATE COD_FA_PRODUCT_DETAIL SET DEL_FLG='1', ACTION_TYPE='Delete', 
                    ACTION_ON='$current_date', ACTION_BY='$user_id' WHERE BARCODE='$barcode'";
    // $upd_product_r = oci_parse($c, $upd_product_q);
    $upd_pro_detail_r = oci_parse($c, $upd_pro_detail);
    if(oci_execute($upd_pro_detail_r)){
        $return_data = array(
            "status" => 1,
            "message" => "Product has been deleted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Product has not been deleted"
        );
    }
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $barcode=$_POST['barcode'];
    $desc_u=$_POST['desc_u'];
    $des_update="UPDATE COD_FA_PRODUCT_DETAIL set DESCRIPTION='$desc_u', ACTION_TYPE='Update', 
                      ACTION_ON='$current_date', ACTION_BY='$user_id' WHERE BARCODE='$barcode'";          
    $desupdate_r = oci_parse($c, $des_update);
    if(oci_execute($desupdate_r)){
        $return_data = array(
            "status" => 1,
            "message" => "Description has been updated"
        );
    }else{
        $return_data = array(
        "status" => 0,
        "message" => "Description has not been updated"
        );
    }
    oci_free_statement($desupdate_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['office_id']) && isset($_POST['location_id']) && isset($_POST['cat_id']) && 
    isset($_POST['quantity']) && !(empty($_POST['office_id']) || 
    empty($_POST['location_id']) || empty($_POST['cat_id']) || empty($_POST['quantity']))){
        $location_id  = $_POST['location_id'];
        $office_id = $_POST['office_id'];
        $cat_id = $_POST['cat_id'];
        $quantity = $_POST['quantity'];
        $desc = $_POST['desc'];
            //CHECK EXISTING RECORD
            $check_q="SELECT * FROM COD_FA_PRODUCTS WHERE LOCATION_ID='$location_id' AND OFFICE_ID='$office_id' AND CAT_ID='$cat_id'  ";
            $check_r = oci_parse($c, $check_q);
            oci_execute($check_r);  
            $check_row = oci_fetch_assoc($check_r);
            if($check_row > 1){
                $check_quan=$check_row['QUANTITY'];
                $strt_loop_quan=$check_quan;
                $strt_loop_quan++;
                $PRO_ID=$check_row['ID'];
                $updated_quan= $check_quan+$quantity;
                $q="UPDATE COD_FA_PRODUCTS SET QUANTITY= '$updated_quan' WHERE ID='$PRO_ID'";
        
            }else{
                $strt_loop_quan='1';
                $q ="INSERT INTO COD_FA_PRODUCTS (LOCATION_ID,OFFICE_ID,CAT_ID,QUANTITY,DESCRIPTION,ACTION_TYPE,ACTION_ON,
                ACTION_BY,PROJECT_ID,COMPANY_ID)VALUES('$location_id','$office_id','$cat_id','$quantity','$desc','Insert',
                '$current_date','$user_id','$project_id','$company_id')";    
            }
            $run2 = oci_parse($c, $q); 
            if(oci_execute($run2)){ 
                //GET CODES FOR BARCODES
                $detail_q= "SELECT A.ID AS PRODUCT_ID,A.DESCRIPTION,A.QUANTITY,A.LOCATION_ID,B.CATEGORY_CODE,C.OFFICE_CODE,D.LOCATION_CODE 
                            FROM COD_FA_PRODUCTS A 
                            INNER JOIN COD_FA_CATEGORY B 
                            ON A.CAT_ID=B.ID 
                            INNER JOIN COD_FA_OFFICES C 
                            ON A.OFFICE_ID=C.ID 
                            INNER JOIN COD_FA_LOCATION D 
                            ON D.ID=A.LOCATION_ID
                            WHERE A.LOCATION_ID='$location_id' AND A.OFFICE_ID='$office_id' AND A.CAT_ID='$cat_id' ";           
                $detail_r = oci_parse($c, $detail_q);
                oci_execute($detail_r);  
                $detail_row = oci_fetch_assoc($detail_r);
                $pro_id=$detail_row["PRODUCT_ID"];
                $cat_code=$detail_row["CATEGORY_CODE"];
                $off_code=$detail_row["OFFICE_CODE"];
                $loc_code=$detail_row["LOCATION_CODE"];
                $db_quantity=$detail_row["QUANTITY"];
                $db_desc=$detail_row["DESCRIPTION"];
                // loop for barcode
                for($i=$strt_loop_quan;$i<=$db_quantity;$i++){  
                    if($i < '10'){
                        $quantity_code = "00".$i;
                    }else if($i < '100'){
                        $quantity_code = "0".$i;
                    }else{
                        $quantity_code = $i;
                    }
                    $barcode =  $loc_code.$cat_code.$quantity_code.$off_code;
                    $in="INSERT INTO COD_FA_PRODUCT_DETAIL(DESCRIPTION,PRODUCT_ID,CAT_CODE,OFFICE_CODE,LOCATION_CODE,
                        QUANTITY_CODE,BARCODE,ACTION_TYPE,ACTION_BY,PROJECT_ID,COMPANY_ID) VALUES ('$db_desc','$pro_id','$cat_code',
                        '$off_code','$loc_code','$i','$barcode','Insert','$user_id','$project_id','$company_id') ";
                    $in_r = oci_parse($c, $in);
                    $run1 = oci_execute($in_r);
                }
                if($run1){  
                    $return_data = array(
                        "status" => 1,
                        "message" => "product detail has been inserted"
                    );
                }else{
                    $return_data = array(
                        "status" => 0,
                        "message" => "product detail has not been inserted"
                    );
                }
                    // oci_free_statement($run1);
                    // oci_close($c);
            
            }else{
                $return_data = array(
                "status" => 0,
                "message" => "Data cant be inserted"
                );
            }
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "All Fields Are Required"
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