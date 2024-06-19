<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if(isset($_POST['action']) && $_POST['action'] == 'view'){
  // print_r("jfsksk");
    $query = "SELECT * FROM stktran_mst";
    // PRINT_R($query);
    $result = $conn->query($query);
    $return_data=[];
      while($show = mysqli_fetch_assoc($result)){
          $return_data[] = $show;
      }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // print_r($_POST); 
    // die();
    $order_doc_no=$_POST['order_doc_no'];
    $dc_doc_no=$_POST['dc_doc_no'];
    $doc_no=$_POST['doc_no'];
    $ref_no=$_POST['ref_no'];
    $ex=$_POST['ex'];
    $due_date=$_POST['due_date'];
    $dc_key=$_POST['order_key'];
    $company_code=$_POST['company_code'];
    $division=$_POST['division'];
    $party=$_POST['party'];
    $purchase_mode=$_POST['purchase_mode'];
    $ship_mode=$_POST['ship_mode'];
    $salesman=$_POST['salesman'];
    $invoice_date=$_POST['po_date'];
    $doc_date=$_POST['voucher_date'];
    $year=date('Y', strtotime($invoice_date));
    // print_r($year);
    $order_ref=$_POST['order_ref'];
    $party_ref=$_POST['party_ref'];
    $v_no=$_POST['v_no'];
    $ship_no=$_POST['ship_no'];
    $narration=$_POST['narration'];
    $debit=$_POST['debit'];
    $debits = str_replace( ',', '', $debit );
    if( is_numeric( $debits ) ) {
      $debit = $debits;
    }

    // $select_q="SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
    //           FROM dc_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND doc_type = 'DC'
    //           AND po_catg='$purchase_mode' and div_code='$division'";
    //           // PRINT_R($select_q);
    //           // die();
    // $select_r = $conn->query($select_q);
    // $show = mysqli_fetch_assoc($select_r);
    // $doc_no=$show['doc_no'];

    $master_q = "insert into stktran_mst(doc_type,po_no,do_key,po_date,co_code,doc_year,doc_no,doc_date,po_catg,div_code,order_refnum,order_party_ref,refnum2,party_code,sman_code,ship_mode,ship_no,remarks,total_gross_amt)value 
    ('DC','$dc_key','$dc_key','$invoice_date','$company_code','$year','$doc_no','$doc_date','$purchase_mode','$division','$order_ref','$party_ref','$v_no','$party','$salesman','$ship_mode','$ship_no','$narration','$debit')";
    // print_r($master_q);die();
    $master_r = $conn->query($master_q);
    if($master_r){
        // $amounts=0;
        for($i=0;$i< count($_POST['acc_desc']); $i++){
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $quantity = $_POST['quantity'][$i];
            $quantitys = str_replace( ',', '', $quantity );
            if( is_numeric( $quantitys ) ) {
              $quantity = $quantitys;
            }
            $rate = $_POST['rate'][$i];
            $rates = str_replace( ',', '', $rate );
            if( is_numeric( $rates ) ) {
              $rate = $rates;
            }
            $amount = $_POST['amount'][$i];
            $amounts = str_replace( ',', '', $amount );
            if( is_numeric( $amounts ) ) {
              $amount = $amounts;
            }
            $disc = $_POST['disc'][$i];
            $discs = str_replace( ',', '', $disc );
            if( is_numeric( $discs ) ) {
              $disc = $discs;
            }
            $disc_e = $_POST['disc_e'][$i];
            $disc_es = str_replace( ',', '', $disc_e );
            if( is_numeric( $disc_es ) ) {
              $disc_e = $disc_es;
            }
            $frt = $_POST['frt'][$i];
            $frts = str_replace( ',', '', $frt );
            if( is_numeric( $frts ) ) {
              $frt = $frts;
            }
            $frt_e = $_POST['frt_e'][$i];
            $frt_es = str_replace( ',', '', $frt_e );
            if( is_numeric( $frt_es ) ) {
              $frt_e = $frt_es;
            }
            $excl = $_POST['excl'][$i];
            $excls = str_replace( ',', '', $excl );
            if( is_numeric( $excls ) ) {
              $excl = $excls;
            }
            $excl_e = $_POST['excl_e'][$i];
            $excl_es = str_replace( ',', '', $excl_e );
            if( is_numeric( $excl_es ) ) {
              $excl_e = $excl_es;
            }
            $stax_amt = $_POST['stax_amt'][$i];
            $stax_amts = str_replace( ',', '', $stax_amt );
            if( is_numeric( $stax_amts ) ) {
              $stax_amt = $stax_amts;
            }
            $stax_amt_e = $_POST['stax_amt_e'][$i];
            $stax_amt_es = str_replace( ',', '', $stax_amt_e );
            if( is_numeric( $stax_amt_es ) ) {
              $stax_amt_e = $stax_amt_es;
            }
            $add_amt = $_POST['add_amt'][$i];
            $add_amts = str_replace( ',', '', $add_amt );
            if( is_numeric( $add_amts ) ) {
              $add_amt = $add_amts;
            }
            $add_amt_e = $_POST['add_amt_e'][$i];
            $add_amt_es = str_replace( ',', '', $add_amt_e );
            if( is_numeric( $add_amt_es ) ) {
              $add_amt_e = $add_amt_es;
            }
            $net_amt = $_POST['net_amt'][$i];
            $net_amts = str_replace( ',', '', $net_amt );
            if( is_numeric( $net_amts ) ) {
              $net_amt = $net_amts;
            }
            $expiry_dt = $_POST['expiry_dt'][$i]==''?'0':$_POST['expiry_dt'][$i];
            $batch_no = $_POST['batch_no'][$i]==''?'0':$_POST['batch_no'][$i];
            $loc = $_POST['loc'][$i]==''?'':$_POST['loc'][$i];
            // $get_data_q="SELECT a.* from items a 
            // WHERE a.item_div = '$acc_desc'";
            // $get_data_r = $conn->query($get_data_q);
            // $dat = mysqli_fetch_assoc($get_data_r);
            // $hs_code=$dat['hscode'];
            // $tax_rate=$dat['tax_rate'];
            // $bal_qty=$dat['bal_qty'];
            $min_qty_detail="SELECT receipt_qty,amt,qty from dc_dtl where co_code = '$company_code' AND doc_year = '$year'
            AND po_no='$dc_key' and item_code='$acc_desc'";
            $update_order_r = $conn->query($min_qty_detail);
            $show_m = mysqli_fetch_assoc($update_order_r);
            $pre_rec_qty=$show_m['receipt_qty'];
            $new_receipt=$pre_rec_qty+$quantity;
            $detail_q = "insert into stktran_dtl(doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,remarks,po_catg,loc_code,po_no,do_key_ref,po_date,stax_rate,stax_amt,add_rate,add_amt,frt_rate,frt_amt,disc_rate,disc_amt,excl_rate,excl_amt,rate,amt,net_amt,g_d,gd_date,expiry_date)value 
            ('DC','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$quantity','$narration','$purchase_mode','$loc','$dc_key','$dc_key','$invoice_date','$stax_amt','$stax_amt_e','$add_amt','$add_amt_e','$frt','$frt_e','$disc','$disc_e','$excl','$excl_e','$rate','$amount','$net_amt','','','$expiry_dt')"; 
            // print_r($detail_q);
            $detail_r = $conn->query($detail_q);
            if($detail_r){
              $update_order_q="UPDATE dc_dtl set receipt_qty='$new_receipt' WHERE co_code = '$company_code' AND doc_year = '$year'
              AND po_no='$dc_key' and item_code='$acc_desc'";
              $update_order_r = $conn->query($update_order_q);
              
              $return_data = array(
                  "status" => 1,
                  // "doc_no" => $doc_no,
                  "message" => "Invoice has been Inserted having doc No:".$doc_no 
              );
            }else{
              $return_data = array(
              "status" => 0,
              "message" => "Invoice has not been Inserted"
              );
          }
        }
        // die();
      
    }
    
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  // print_r($_POST); die();
  $doc_no=$_POST['doc_no'];
  $order_key=$_POST['order_key'];
  $company_code=$_POST['company_code'];
  $division=$_POST['division'];
  $party=$_POST['party'];
  $purchase_mode=$_POST['purchase_mode'];
  $ship_mode=$_POST['ship_mode'];
  $salesman=$_POST['salesman'];
  $po_date=$_POST['po_date'];
  $doc_date=$_POST['voucher_date'];
  $year=date('Y', strtotime($doc_date));
  // print_r($year);
  $order_ref=$_POST['order_ref'];
  $party_ref=$_POST['party_ref'];
  $v_no=$_POST['v_no'];
  $ship_no=$_POST['ship_no'];
  $narration=$_POST['narration'];
  $upd_mst_q="UPDATE dc_mst SET doc_date='$doc_date', doc_year='$year' , order_refnum='$order_ref',
              remarks='$narration',order_party_ref='$party_ref' ,refnum2='$v_no' AND ship_mode='$ship_mode'
              AND ship_no='$ship_no'
              WHERE co_code = '$company_code' AND div_code = '$division' AND po_no='$order_key'
              AND po_catg='$purchase_mode' AND doc_no='$doc_no'";
  // print_r($upd_mst_q); die();
  $upd_mst_r = $conn->query($upd_mst_q);
  if($upd_mst_r){
    $del_dtl_q="DELETE FROM dc_dtl  WHERE co_code = '$company_code' AND div_code = '$division' 
                AND po_no='$order_key'AND po_catg='$purchase_mode' AND doc_no='$doc_no' AND doc_type='DC'";
    // print_r($del_dtl_q); die();
    $del_dtl_r = $conn->query($del_dtl_q);
    if($del_dtl_r){
      for($i=0;$i< count($_POST['acc_desc']); $i++){
        $acc_desc = $_POST['acc_desc'][$i];
        $detail = $_POST['detail'][$i];
        $type = $_POST['type'][$i]=='0'?'0':$_POST['type'][$i];
        $loc = $_POST['loc'][$i]=='0'?'0':$_POST['loc'][$i];
        $quantity = $_POST['quantity'][$i];
        $quantitys = str_replace( ',', '', $quantity );
        if( is_numeric( $quantitys ) ) {
          $quantity = $quantitys;
        }
        $get_data_q="SELECT a.* from items a 
        WHERE a.item_div = '$acc_desc'";
        $get_data_r = $conn->query($get_data_q);
        $dat = mysqli_fetch_assoc($get_data_r);
        $hs_code=$dat['hscode'];
        $tax_rate=$dat['tax_rate'];
        $bal_qty=$dat['bal_qty'];
        $detail_q = "insert into dc_dtl(item_type,doc_type,div_code,co_code,doc_year,doc_no,doc_date,item_code,qty,remarks,po_catg,loc_code,po_no,do_key_ref,po_date,stax_rate,g_d,gd_date,item_hscode)value 
        ('$type','DC','$division','$company_code','$year','$doc_no','$doc_date','$acc_desc','$quantity','$narration','$purchase_mode','$loc','$order_key','$order_key','$po_date','$tax_rate','','','$hs_code')"; 
        // print_r($detail_q);
        $detail_r = $conn->query($detail_q);
        if($detail_r){
          $return_data = array(
              "status" => 1,
              // "doc_no" => $doc_no,
              "message" => "Delivery Order has been Updated having doc No:".$doc_no 
          );
        }else{
          $return_data = array(
          "status" => 0,
          "message" => "Delivery Order has not been Updated"
          );
        }
      }
    }
  } 
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
  // print_r($_POST); die();
  $co_code=$_POST['co_code'];
  $party_code=$_POST['party_code'];
  $div_code=$_POST['div_code'];
  $salesman_code=$_POST['salesman_code'];
  $po_catg=$_POST['po_catg'];
  $doc_year=$_POST['doc_year'];
  $doc_no=$_POST['doc_no'];
    $query = "SELECT A.*,B.co_name,C.div_name,D.party_name,E.sman_name FROM dc_mst A
    LEFT JOIN company B ON A.co_code=B.co_code LEFT JOIN division C ON C.div_code=A.div_code
    LEFT JOIN party D ON A.party_code= D.party_code LEFT JOIN salesman E ON A.sman_code= E.sman_code 
    WHERE A.co_code='$co_code' AND A.div_code='$div_code' 
    AND A.party_code='$party_code' AND A.sman_code='$salesman_code' AND A.doc_year='$doc_year' 
    AND A.doc_no='$doc_no' AND A.po_catg='$po_catg' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit_table'){
    // print_r("jfsksk");
    $co_code=$_POST['co_code'];
    // $party_code=$_POST['party_code'];
    $div_code=$_POST['div_code'];
    $po_catg=$_POST['po_catg'];
    $doc_no=$_POST['doc_no'];
    $year=$_POST['doc_year'];
    $query = "SELECT * FROM dc_dtl WHERE co_code='$co_code' AND div_code='$div_code' 
    AND doc_no='$doc_no' AND po_catg='$po_catg' AND doc_year='$year' ";
    // PRINT_R($query); die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'party_code'){
    // print_r("jfsksk");
    $company_code=$_POST['company_code'];
    $query = "SELECT a.party_div,a.party_name,b.div_name,c.zone_name,d.city_name FROM party a
    INNER JOIN division b on a.div_code=b.div_code
    INNER JOIN zone c on a.zone_code =c.zone_code 
    INNER JOIN city d on a.city_code=d.city_code WHERE a.co_code='$company_code'";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data=[];
    while($show = mysqli_fetch_assoc($result)){
        $return_data[] = $show;
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'document_no'){
    // print_r($_POST); die();
    $company_code=$_POST['company_code'];
    $division_code=$_POST['division_code'];
    $purchase_mode=$_POST['purchase_mode'];
    $query = "SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
    FROM order_mst  WHERE co_code = '$company_code' AND div_code = '$division_code' AND po_catg = '$purchase_mode'";
    // PRINT_R($query); die();
    $select_r = $conn->query($query);
    $show = mysqli_fetch_assoc($select_r);
    $doc_no=$show['doc_no'];
      $return_data = array(
        "status" => 1,
        "doc_no" => $doc_no
      );
}elseif(isset($_POST['action']) && $_POST['action'] == 'order_code'){
  // print_r($_POST); die();
  $query = "SELECT distinct a.*,b.party_name,d.refnum,e.qty as od_qty,c.refnum as ref,c.doc_date as dates,e.doc_no as doc from dc_dtl a  
  left join order_mst c on c.order_key=a.po_no 
  inner join order_dtl e on e.doc_no=c.doc_no and e.order_key=c.order_key and c.doc_date=c.doc_date and c.co_code=c.co_code and c.div_code=c.div_code  
  left join dc_mst d on d.po_no=a.po_no 
  left join party b on c.party_code=b.party_div 
  -- group by a.co_code,a.doc_no,a.doc_date,a.po_no,a.qty
  order by doc_date desc";
    // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $count = mysqli_num_rows($select_r);
  $return_data=[];
  while($show = mysqli_fetch_assoc($select_r)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'get_detail'){
  // print_r($_POST); die();
  $doc_no=$_POST['doc_no'];
  $party_name=$_POST['party_name'];
  $ref_num=$_POST['ref_num']=='-'?'':$_POST['ref_num'];
  $doc_date=$_POST['doc_date'];
  $order_key=$_POST['order_key'];
  $total_net_amt=$_POST['total_net_amt'];
  $qty=$_POST['qty'];
  $receipt_qty=$_POST['receipt_qty'];
  $order_bal=$_POST['order_bal'];
  $order_doc=$_POST['order_doc'];
  //   $div_code=$_POST['div_code'];
  //   $doc_year=$_POST['doc_year'];
  $query="SELECT DISTINCT a.*,b.sman_name,a.sman_code,a.refnum2 from order_mst a
  inner join order_dtl c on a.doc_no=c.doc_no and a.order_key=c.order_key and a.doc_date=c.doc_date and a.co_code=c.co_code and a.div_code=c.div_code 
  left join salesman b on a.sman_code=b.sman_code
   where a.doc_no='$order_doc' and a.order_key='$order_key' and a.refnum='$ref_num'
  and a.doc_date='$doc_date'";
  // print_r("fff");
    // print_r($query);die();
  $select = $conn->query($query);
  $show = mysqli_fetch_assoc($select);
  $party_code=$show['party_code'];
  $company_code=$show['co_code'];
  $sman_name=$show['sman_name'];
  $sman_code=$show['sman_code'];
  $party_ref=$show['party_ref'];
  $refnum2=$show['refnum2'];
  $query_m="SELECT a.*,b.co_name,c.div_name from order_dtl a inner join company b on a.co_code=b.co_code 
  inner join division c on a.div_code=c.div_code
  where a.co_code='$company_code' and a.doc_no='$order_doc' and 
  a.order_key='$order_key' and a.refnum='$ref_num' and a.doc_date='$doc_date' and a.qty='$qty' 
  and a.order_key='$order_key'";

  // PRINT_R($query_m); die();
  $select_m = $conn->query($query_m);
  $show_m = mysqli_fetch_assoc($select_m);
  // print_r($show_m);die();
  $return_data=$show_m;
  $query3="SELECT ship_mode,ship_no from dc_mst where doc_no='$doc_no' and po_no='$order_key'";
  $select3= $conn->query($query3);
  $show3 = mysqli_fetch_assoc($select3);
  $ship_mode=$show3['ship_mode'];
  $ship_no=$show3['ship_no'];
  $select_q="SELECT (case when MAX(doc_no) is null then 1 else MAX(doc_no)+1 end) doc_no 
            FROM stktran_mst  WHERE co_code = '$company_code' AND po_no='$order_key' ";
            // PRINT_R($select_q);
            // die();
  $select_r = $conn->query($select_q);
  $show_r = mysqli_fetch_assoc($select_r);
  $doc_no=$show_r['doc_no'];
  $return_data = array(
      "detail" => $show_m,
      "party_code" => $party_code,
      "sman_name" => $sman_name,
      "sman_code" => $sman_code,
      "party_ref" => $party_ref,
      "v_no"      => $refnum2,
      "ship_mode" => $ship_mode,
      "ship_no"   => $ship_no,
      "doc_no"    => $doc_no
  );
}elseif(isset($_POST['action']) && $_POST['action'] == 'location_code'){
  // print_r("jfsksk");
  $item_code=$_POST['item_code'];
  $query = "SELECT a.*,b.loc_name FROM item_wh_um a left join location b on a.loc_code=b.loc_code  WHERE a.item_code='$item_code'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_detail'){
  // print_r("djfjdf");
  // print_r($_POST); die();
  $item_code=$_POST['item_code'];
  $query = "SELECT a.*,b.div_name,d.gen_name from items a 
            inner join division b on a.div_code=b.div_code
            inner join gen_name d on a.gen_code=d.gen_code 
            WHERE a.item_div = '$item_code'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'quantity_detail'){
  // print_r($_POST); die();
  $item_code=$_POST['item_code'];
  $company_code=$_POST['company_code'];
  $order_key=$_POST['order_key'];
  $dc_doc_no=$_POST['dc_doc_no'];
  $query = "SELECT a.* from dc_dtl a 
            WHERE a.item_code = '$item_code' AND a.po_no='$order_key' AND a.co_code='$company_code' AND a.doc_no='$dc_doc_no'";
  // PRINT_R($query); die();
  $select_r = $conn->query($query);
  $show = mysqli_fetch_assoc($select_r);
  $return_data=$show;
}elseif(isset($_POST['action']) && $_POST['action'] == 'item_code'){
  // print_r("jfsksk");
  $company_code=$_POST['company_code'];
  $order_key=$_POST['order_key'];
  $query = "SELECT DISTINCT a.* FROM items a inner join order_dtl b on a.item_div=b.item_code and b.receipt_qty !='0.00' AND b.order_key='$order_key'";
  // PRINT_R($query); DIE();  
  $result = $conn->query($query);
  $count = mysqli_num_rows($result);
  $return_data=[];
  while($show = mysqli_fetch_assoc($result)){
      $return_data[] = $show;
  }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

?>



