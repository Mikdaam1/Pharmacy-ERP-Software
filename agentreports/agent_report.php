<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';
// $barcode = new Helpers();
if (isset($_GET['action']) && $_GET['action'] == 'print') {


        $sql = "SELECT sman_code, sman_name, sman_add, phone_no FROM `salesman` ";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);


        
        
        

        if($count > 1){
            $return_data=[];
            while($show = mysqli_fetch_assoc($result)){
                $return_data[] = $show; 
                
                $space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

                // $page = 'page 1 of 1';
                
                $date = date("l, ") . date("F d Y");
                
                
                
            } 
            $i=1;
            foreach ($return_data as  $value) {
                $data_tr .=
                '<tr style="padding-top:13px">
                                <td style="width: 180px;text-align:center;">'.$value['sman_code'].'</td>
                                <td style="width:120px;text-align:center;>'.$value['sman_name'].'</td>
                                <td style="width:180px;text-align:center;">'.$value['sman_add'].'</td>
                                <td style="text-align:center;">'.$value['phone_no'].'</td>
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
            
            <h2 style="border: 3px solid black; border-left:none;border-right:none;"><span class="c_name" style="font-size: 25px; font-weight: bold;">Agent List</span> <span style="font-size: 15px; font-weight: normal;">'. $space .$page. $date.'</span> </h2>
            </div>
            <br>
            
            
                            <div class="invoice_detail"  style="padding-top:30px;height: ;">
                            <table class="table_head" style="border: 3px solid black; border-bottom: none;border-left:none;border-right:none;display:inline-block;width:100%;height:;">
                                    <tr style="padding-top:53px">
                                    <td style="width: 220px; font-size:20px; text-align:center;"><b>CODE</b></td>
                                    <td style="width:25%; font-size:20px;text-align:center;"><b>NAME</b></td>
                                    <td style="width: 235px; font-size:20px;text-align:center;"><b>ADDRESS</b></td>
                                    <td style="width:30%;font-size:20px;text-align:center;"><b>PHONE NO.</b></td>
                                    <br>
                                    </tr>

                                </table>
                                <table class="data1" style="border: 3px solid black; border-left:none;border-right:none;border-bottom:none;display:inline-block;width:100%;height:;padding-bottom:150px">

                                    '.$data_tr.'
                                </table>
                            </div>
                         
                        
                            
                    </div>
                </div>
                            
        
            </div>', 2);
            $mpdf->Output();
        }


     else {
        echo "form no required";
    }
} else {
    echo "action not matched";
}




