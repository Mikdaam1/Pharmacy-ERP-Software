<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {
    if (isset($_GET['po_no']) && !empty($_GET['po_no'])) {
        // print_r($_GET);die();
        $po_no = $_GET['po_no'];
        $co_code = $_GET['co_code'];
        $doc_no = $_GET['doc_no'];
        $doc_year = $_GET['doc_year'];
        $doc_type = $_GET['doc_type'];

        $sql = "SELECT a.*,b.co_name FROM DC_UM_VIEW_NEW a left join company b on a.co_code=b.co_code 
        WHERE a.co_code   = '$co_code' AND   a.do_key     = '$po_no' AND   a.doc_type   = 'DC'
                AND   a.doc_year   = '$doc_year' AND a.doc_no='$doc_no' ORDER BY a.do_key,a.doc_no ";
                // print_r($sql); die();
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                $data_tr='';
                $data_tr2='';
                $co_name =  $return_data[0]['co_name'];
                $party_ref =  $return_data[0]['order_party_ref'];
                $refnum =  $return_data[0]['refnum'];
                $refnum2 =  $return_data[0]['REFNUM2'];
                $order_refnum =  $return_data[0]['order_refnum'];
                $due_date = $return_data[0]['due_date'];
                $po_date = $return_data[0]['po_date'];
                $party_code = $return_data[0]['party_code'];
                $party_name = $return_data[0]['PARTY_NAME'];
                $address = $return_data[0]['address'];
                $contact_name = $return_data[0]['contact_name'];
                $phone_nos = $return_data[0]['phone_nos'];
                $gst = $return_data[0]['gst'];
                $ntn =  $return_data[0]['ntn'];
                $city_name = $return_data[0]['city_name'];
                $crdays = $return_data[0]['crdays'];
                $div_name = $return_data[0]['div_name'];
                $sman_name = $return_data[0]['sman_name'];
                $ship_mode =  $return_data[0]['ship_mode'];
                $ship_no = $return_data[0]['ship_no'];
                $stax_rate = $return_data[0]['stax_rate'];
                $stax_amt = $return_data[0]['stax_amt'];
                $other_charges = $return_data[0]['other_chrgs'];
                $other_ded =  $return_data[0]['other_ded'];
                $total_gross_amt = $return_data[0]['total_gross_amt'];
                $total_net_amt = $return_data[0]['total_net_amt'];
                $remarks = $return_data[0]['remarks'];
                $addtax_amt = $return_data[0]['addtax_amt'];
                $charge_amt =  $return_data[0]['charge_amt'];
                $addtax_rate = $return_data[0]['addtax_rate'];
                $loc_code = $return_data[0]['loc_code'];
                $entry_no = $return_data[0]['entry_no'];
                $item_code = $return_data[0]['item_code'];
                $item_name_sale =  $return_data[0]['ITEM_NAME_sale'];
                $type_name = $return_data[0]['TYPE_NAME'];
                $item_name_sale2 = $return_data[0]['ITEM_NAME_sale2'];
                $um_name = $return_data[0]['um_name'];
                $qty = $return_data[0]['qty'];
                $rate =  $return_data[0]['rate'];
                $amt = $return_data[0]['amt'];
                $disc_rate = $return_data[0]['disc_rate'];
                $disc_amt = $return_data[0]['disc_amt'];
                $frt_rate = $return_data[0]['FRT_RATE'];
                $frt_amt =  $return_data[0]['FRT_AMT'];
                $excl_rate = $return_data[0]['EXCL_RATE'];
                $excl_amt = $return_data[0]['excl_amt'];
                $stax_rate_dtl = $return_data[0]['STAX_RATE_DTL'];
                $stax_amt_dtl = $return_data[0]['STAX_AMT_DTL'];
                $add_rate =  $return_data[0]['ADD_RATE'];
                $add_amt = $return_data[0]['ADD_AMT'];
                $net_amt = $return_data[0]['net_amt'];
                $batch_no = $return_data[0]['batch_no'];
                $expiry_date = $return_data[0]['expiry_date'];
                $item_hscode =  $return_data[0]['item_hscode'];
                $loc_name = $return_data[0]['loc_name'];
                $ledger_bal = $return_data[0]['ledger_bal'];
                $itax_amt = $return_data[0]['ITAX_AMT'];
                $itax_rate = $return_data[0]['ITAX_RATE'];
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                
            } 
            $i=1;
            foreach ($return_data as  $value) {
                $item_name=empty($value['item_name_sale'])?'Nil':$value['item_name_sale'];
                $data_tr .='<tr style="border:1px solid black">
                                <td style="border:2px solid black;width:40px">'.$i.'</td>
                                <td style="border:2px solid black;width:210px">'.$item_name.'</td>
                                <td  style="border:2px solid black;width:70px">'.$item_hscode.'</td>
                                <td  style="border:2px solid black;width:60px">'.$qty.'</td>
                                <td    style="border:2px solid black;width:63px">'.$batch_no.'</td>
                                <td style="border:2px solid black;width:57px">'.$excl_rate.'</td>
                                <td style="border:2px solid black;width:57px">'.$gst.'</td>
                                <td style="border:2px solid black;width:57px">'.$add_rate.'</td>
                                <td style="border:2px solid black;width:60px">'.$addtax_rate.'</td>
                            </tr>
                            <tr style="border:1px solid black">
                                <td  style="border:2px solid black;width:40px"></td>
                                <td  style="border:2px solid black;text-align:left;width:210px">'.$item_code.'&emsp; '.$type_name.'  &emsp;&emsp; &emsp;  '.$um_name.'</td>
                                <td  style="border:2px solid black;width:70px"></td>
                                <td style="border:2px solid black;width:60px !important">'.$loc_code.'</td>
                                <td  style="border:2px solid black;text-align:left;width:63px">2022-08-30</td>
                                <td style="border:2px solid black;width:57px !important">'.$excl_amt.'</td>
                                <td style="border:2px solid black;width:57px !important">'.$gst.'</td>
                                <td style="border:2px solid black;width:57px !important">'.$add_amt.'</td>
                                <td style="border:2px solid black;width:60px !important">'.$addtax_amt.'</td>
                            </tr>';
                            // $data_tr2 .='';
                            
                                 ++$i;
            }
            $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
            $stylesheet = file_get_contents('stax_invoice.css');
            //     // $mpdf->SetWatermarkText('PAID');
            //     // $mpdf->showWatermarkText = true;
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML('<div class="row">
                <div class="main">
                    <div class="row">
                            <div class="head">
                                <span class="c_name" style="">'.$co_name.'</span>'.$space.'
                                <span class="main_heading" style= ""><u>Sales Tax Invoice</u> </span>
                            </div>
                            <table style="padding-top:20px" class="table1" >
                        
                                <tr class="tr1">
                                    <td style="">House No N-11 street 13 mujahid colony </td>
                                    <td style="font-size:13px"><b>Voice:</b> '.$phone_nos.'</td>
                                    <td style="font-size:13px"><b>Invoice No#:</b> '.$gst.'</td>
                                    <td style="font-size:13px"><b>Date:</b> '.$ntn.'</td>
                                </tr>
                                <tr class="tr2" >
                                    <td>'.$address.'rtttttttttttt djdk dfndf dnfkdttt</td>
                                    <td style="font-size:13px"><b>Fax:</b> '.$phone_nos.'</td>
                                    <td style="font-size:13px"><b>Transaction#:</b> '.$gst.'</td>
                                    <td style="font-size:13px"><b>Division#:</b> '.$ntn.'</td>
                                </tr>
                                <tr  class="tr3">
                                    <td>'.$address.'rtttttttttttt djdk dfndf dnfkdttt</td>
                                    <td style="font-size:13px"><b>GST#:</b> '.$phone_nos.'</td>
                                    <td style="font-size:13px"><b>Sales Order#:</b> '.$gst.'</td>
                                    <td style="font-size:13px"><b>Order Date:</b> '.$ntn.'</td>
                                </tr>
                                <tr class="tr4">
                                    <td></td>
                                    <td style="font-size:13px"><b>NTN#:</b> '.$phone_nos.'</td>
                                    <td style="font-size:13px"></td>
                                    <td style="font-size:13px"><b>Order Ref#:</b> '.$ntn.'</td>
                                </tr>
                            
                            </table><br>
                            <div class="party" style="border:1px solid black;width:100%;">
                                <table class="mast">
                                    <tr>
                                        <td style="background-color:gray;height:50px;border-right:2px solid black;width:50%;padding-left:20px;" >BILL TO</td>
                                        <td style="background-color:gray;height:50px;padding-left:20px">DELIVER TO</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>PARTY NAME: '.$party_name.'</b></td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;">'.$party_name.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>ADDRESS:</b> '.$address.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase">'.$address.'</td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>CITY:</b> '.$city_name.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>CUSTOMER REF#:'.$party_ref.'</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>PHONE#:</b> '.$phone_nos.'</td>
                                        <td style="width:20px;padding-left:20px;text-transform:uppercase;"><b>PAYMENT TERMS#:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>DAYS:</b>&emsp;&emsp;&emsp;&emsp;</span><span><b>DUE DT:</b></span></td>
                                    
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><b>CONTACT#:</b> '.$phone_nos.'</td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>PARTY#:</b> '.$party_code.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span><b>SHIP METHOD:</b>'.$ship_mode.'</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>CN#:</b>'.$ship_no.'</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;border-right:2px solid black;"><span><b>GST#:</b> '.$gst.'</span></td>
                                        <td style="width:50%;padding-left:20px;text-transform:uppercase;"><b>NTN/CNIC#:</b> '.$ntn.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b>SALESMAN:</b>'.$party_name.'</span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="invoice_detail"  style="padding-top:30px;height: 350px;">
                                <table class="table_head" style="border:1px solid black;display:inline-block;width:100%;height:1200px;">
                                    <tr style="padding-top:55px">
                                        <td style="border:2px solid black;">S-No<td>
                                        <td colspan="4" style="border:2px solid black;width:200px">Item Description</td>
                                        <td  style="border:2px solid black;width:67px">HS Code</td>
                                        <td style="border:2px solid black;width:60px">Qty</td>
                                        <td style="border:2px solid black;width:65px">Batch#</td>
                                        <td style="border:2px solid black;">Excl Rate</td>
                                        <td style="border:2px solid black;">GST %</td>
                                        <td style="border:2px solid black;">GST Add %</td>
                                        <td style="border:2px solid black;">Inc. Rate</td>
                                    </tr>

                                    <tr style="padding-top:55px">
                                        <td colspan="1"><td>
                                        <td  style="border:2px solid black;">Code</td>
                                        <td colspan="1" style="border:2px solid black;">Type</td>
                                        <td colspan="1" style="border:2px solid black;">UM</td>
                                        <td colspan="2"></td>
                                        <td style="border:2px solid black;width:60px">Loc</td>
                                        <td style="border:2px solid black;width:45px">Expiry</td>
                                        <td style="border:2px solid black;">Amount</td>
                                        <td style="border:2px solid black;">Amount</td>
                                        <td style="border:2px solid black;">Amount</td>
                                        <td style="border:2px solid black;">Amount</td>
                                    </tr>
                                </table>
                                <table class="data1" style="border:1px solid black;display:inline-block;width:100%;height:1200px;padding-bottom:150px">

                                    '.$data_tr.'
                                </table>
                            </div>
                            <div class="total_detail"  style="border:1px solid black;height:100px">
                                <table class="item_head" style="display:inline-block;width:100%;height:1200px;padding-left:20px;">
                                    <tr>
                                        <td colspan="5" style="text-align:left;padding-left:20px;"><b>ITEM TOTAL</b></td>
                                        <td style=""><b></b></td>
                                        <td style="width:120px"><b></b></td>
                                        <td style="width:120px;padding-left:150px"></td>
                                        <td style="border:1px solid black;width:58px;"><b>136,607.32</b></td>
                                        <td style="border:1px solid black;width:58px"><b></b></td>
                                        <td style="border:1px solid black;width:58px"><b></b></td>
                                        <td style="border:1px solid black;width:58px"><b>136,607.32</b></td>
                                    </tr>
                                </table>
                                <table class="secondlast" style="border:1px solid black;display:inline-block;width:100%;" >
                                <tr style="">
                                    <td rowspan="6" style="padding-bottom:110px"><img width="100%" height="25%" src="../uploads/um_part1.jpg"></td>
                                        <td style="width:168px;font-size:12px;padding-left:40px"><b>Sub Total</b></td>
                                        <td style="width:55px;padding-bottom:30px" ></td>
                                        <td style="width:120px;" ><p style="border:2px solid black;font-size:12px">136,607.32</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:12px;padding-left:40px"><b>Add: Itax Amt</b></td>
                                    <td  style="width:55px;padding-bottom:0px;"><p style="border:2px solid black;width:55px;padding-bottom:20px">&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</p></td>
                                    <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:12px">12345.00</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:12px;padding-left:40px"><b>Add: Others</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:12px">12345.00</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:12px;padding-left:40px"><b>Less: Freight</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:12px">12345.00</p></td>
                                </tr>
                                <tr>
                                    <td style="width:168px;font-size:12px;padding-left:40px"><b>Less: Further Disc</b></td>
                                        <td style="width:55px;padding-bottom:0px" ></td>
                                    <td style="width:120px;padding-bottom:0px" ><p style="border:2px solid black;font-size:12px">12345.00</p></td>
                                </tr>
                                <tr>
                                    <td style="font-size:15px;padding-left:40px;padding-bottom:40px"><b>Net Amount</b></td>
                                    <td  style="width:55px;padding-bottom:0px;"></td>
                                    <td style="width:120px;padding-bottom:30px" ><p style="border:2px solid black;font-size:12px">136,607.32</p></td>
                                </tr> 
                                </table>
                            </div>
                        
                            
                    </div>
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
        }
    } else {
        echo "form no required";
    }
} else {
    echo "action not matched";
}




