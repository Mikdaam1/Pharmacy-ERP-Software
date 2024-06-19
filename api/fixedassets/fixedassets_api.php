<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../../index.php');die();
}
include("../auth/db.php");
header("Content-Type: application/json");

if(isset($_POST['action']) && $_POST['action'] == 'location'){
        //get group,head,chart cod
        $location_q = "SELECT * from COD_FA_LOCATION";
        $location_r = oci_parse($c, $location_q);
        oci_execute($location_r);
        $return_data=[];
        while ($location_row = oci_fetch_assoc($location_r)){
            $return_data[] = $location_row;
        }      

}
else if(isset($_POST['action']) && $_POST['action'] == 'departlocation'){
  //get group,head,chart cod
  $query = "SELECT * from COD_DEPARTMENTS";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }      

}
else if(isset($_POST['action']) && $_POST['action'] == 'departments'){
  //get group,head,chart cod
  $query = "SELECT * from COD_DEPARTMENTS";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }      

}
else if(isset($_POST['action']) && $_POST['action'] == 'projects'){
  //get group,head,chart cod
  $query = "SELECT * from PRJ_PROJECT_SETUP";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }      

}else if(isset($_POST['action']) && $_POST['action'] == 'paybasic'){
  //get group,head,chart cod
  $query = "SELECT * from COD_PAY_BASIS";
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
      $return_data[] = $row;
  }      

}else if(isset($_POST['action']) && $_POST['action'] == 'offices'){
  //get group,head,chart cod
  $dep_q = "SELECT * from COD_FA_OFFICES";
  $dep_run = oci_parse($c, $dep_q);
  oci_execute($dep_run);
  $return_data=[];
  while ($dep_row = oci_fetch_assoc($dep_run)){
      $return_data[] = $dep_row;
  }      

}else if(isset($_POST['action']) && $_POST['action'] == 'subcategory'){
  //get group,head,chart cod
  $subcat_q = "SELECT * from COD_FA_SUBCATEGORY";
  $subcat_r = oci_parse($c, $subcat_q);
  oci_execute($subcat_r);
  $return_data=[];
  while ($subcat_row = oci_fetch_assoc($subcat_r)){
      $return_data[] = $subcat_row;
  }      

}else if(isset($_POST['action']) && $_POST['action'] == 'category'){
  //get group,head,chart cod
      $company_q = "SELECT * from COD_FA_CATEGORY";
      $company_r = oci_parse($c, $company_q);
      oci_execute($company_r);
      $return_data=[];
      while ($company_row = oci_fetch_assoc($company_r)){
          $return_data[] = $company_row;
      } 
      oci_free_statement($company_r);
      oci_close($c);
    }else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));
?>