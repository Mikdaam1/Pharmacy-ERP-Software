<?php
session_start();
header("Content-Type: application/json");
include '../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM items";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST);die();
    $company_code=$_POST['company_code'];
    $item_code=$_POST['item_code'];
    $loc_code=$_POST['location_code'];
    $batch_no=$_POST['batch_no'];
    $expiry_date=$_POST['expiry_date'];
    $gd_no=$_POST['gd_no'];
    $gd_date=$_POST['gd_date'];
    $item_hs=$_POST['item_hs'];
    $stax=$_POST['stax'];
    $adjust_qty=$_POST['adjust_qty']==''?'0':$_POST['adjust_qty'];

    $opening=$_POST['openning']==''?'0.00':$_POST['openning'];
    $openning = str_replace( ',', '', $opening );
    if( is_numeric( $openning ) ) {
      $opening = $openning;
    }
    $receipts=$_POST['receipts']==''?'0.00':$_POST['receipts'];
    $receipts = str_replace( ',', '', $receipts );
    if( is_numeric( $receipts ) ) {
      $receipt = $receipts;
    }
    $Issues=$_POST['Issues']==''?'0.00':$_POST['Issues'];
    $Issues = str_replace( ',', '', $Issues );
    if( is_numeric( $Issues ) ) {
      $issue = $Issues;
    }
    $Balances=$_POST['Balance']==''?'0.00':$_POST['Balance'];
    $Balances = str_replace( ',', '', $Balances );
    if( is_numeric( $Balances ) ) {
      $balance = $Balances;
    }
    // print_r("hi"); 
      // print_r($item_code);die();
      $query = "insert into item_batch_no(co_code,item_code,loc_code,batch_no,expiry_date,g_d,gd_date,item_hscode,item_taxrate,open_stock,adj_qty,rcpt_stock,iss_stock,bal_stock) 
      value ('$company_code','$item_code','$loc_code','$batch_no','$expiry_date','$gd_no','$gd_date','$item_hs','$stax','$opening','$adjust_qty','$receipt','$issue','$balance')";
      $result = $conn->query($query);
      // PRINT_R($query); die();
      if($result){
        $return_data = array(
          "status" => 1,
          "message" => "Item has been added "
      );
      }else{
          $return_data = array(
          "status" => 0,
          "message" => "Item has not been added "
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



