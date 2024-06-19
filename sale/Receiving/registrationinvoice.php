<?php
require_once __DIR__ . './../../dist/invoice/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$stylesheet = file_get_contents('./../../dist/invoice/styletest.css');

$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML('<div class="row">
  <div class="column main">
  <div class="row">
    <div class="columnD1">
       <h5>Customer</h5>
    </div>
    <div class="columnD2">
          <img src="./../../dist/invoice/logo1.png">
       </div>
      <div class="columnD1">
          <h5>Challan: 90001</h5>
      </div>
  </div>
   <div class="row">
    <div class="divrow2"><h5>ASF HOUSING SCHEME KARACHI</h5></div>
  </div>
   <div class="row divrow2">
    <div class="divrow3"><h5>Registration Fee</h5></div>
  </div>
   <div class="row divrow2">
    <div class="columnD3"><p style="text-align: left; margin-left: 3px;">Form:</p><span id="reg_no"></span></div>
    <div class="columnD3"><p style="text-align: left;">Date:</p></div>
  </div>
    <div class="row divrow2">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Name:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Type:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">CNIC:</p></div>
  </div>
  <div class="row divrow3">
         <img  src="barcode.png" width="180" height="30">
  </div>
   <div class="row divrow4">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Bank:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount RS.</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount in Words:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Due Date:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Expiry Date:</p></div>
     <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Drawn on Bank:________________________</p></div>   
   </div>
   <div class="row divrow3">
     <div class="columnD2"><p style="text-align: left; margin-left: 3px; margin-top:1-px;">Ins No:__________</p>
    </div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">DD</input></div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">PO</input></div>
    <div class="columnD6"><input type="checkbox" style="text-align: left;">Cash</input></div>

   </div>
   <div class="divrow5"><p>----------------------------------------------------------</p></div>
   <div>
   <div class="row divrow3">
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Customer Sig</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Contact No</p></div>
  </div>

  </div>
   <div class="row divrow4">
   <div class="divrow5"><p style="text-align: left; margin-left: 3px;">Bank Name:_______________________</p></div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Branch Code</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Stamp & Sign</p></div>
   </div>
    <div class="row">
         <img  src="barcode.png" width="180" height="30">
   </div>
   <div class="divrow2"><p>---------------------------------------------------------</p></div>
    <div class="divrow6"><p style="text-align: left; font-size: 9px; margin-left: 3px;"> In case of cash deposited in bank then stamp of bank on challan is compulsory otherwise challan will not be acceptable.</p></div>
    <div class="divrow2"><p>---------------------------------------------------------</p></div>
     <div class="divrow6"><h4 style="text-align: center;">For Office Use Only</h4></div>
      <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Date: ___________________</p></div>
      <div class="divrow3"><p style="text-align: left; margin-left: 3px;">Sign & Office Stamp</p></div>
  </div>

<div class="column main">
  <div class="row">
    <div class="columnD1">
       <h5>Customer</h5>
    </div>
    <div class="columnD2">
          <img src="./../../dist/invoice/logo1.png">
       </div>
      <div class="columnD1">
          <h5>Challan: 90001</h5>
      </div>
  </div>
   <div class="row">
    <div class="divrow2"><h5>ASF HOUSING SCHEME KARACHI</h5></div>
  </div>
   <div class="row divrow2">
    <div class="divrow3"><h5>Registration Fee</h5></div>
  </div>
   <div class="row divrow2">
    <div class="columnD3"><p style="text-align: left; margin-left: 3px;">Form:</p></div>
    <div class="columnD3"><p style="text-align: left;">Date:</p></div>
  </div>
    <div class="row divrow2">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Name:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Type:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">CNIC:</p></div>
  </div>
  <div class="row divrow3">
         <img  src="barcode.png" width="180" height="30">
  </div>
   <div class="row divrow4">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Bank:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount RS.</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount in Words:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Due Date:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Expiry Date:</p></div>
     <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Drawn on Bank:________________________</p></div>   
   </div>
   <div class="row divrow3">
     <div class="columnD2"><p style="text-align: left; margin-left: 3px; margin-top:1-px;">Ins No:__________</p>
    </div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">DD</input></div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">PO</input></div>
    <div class="columnD6"><input type="checkbox" style="text-align: left;">Cash</input></div>

   </div>
   <div class="divrow5"><p>----------------------------------------------------------</p></div>
   <div>
   <div class="row divrow3">
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Customer Sig</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Contact No</p></div>
  </div>

  </div>
   <div class="row divrow4">
   <div class="divrow5"><p style="text-align: left; margin-left: 3px;">Bank Name:_______________________</p></div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Branch Code</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Stamp & Sign</p></div>
   </div>
    <div class="row">
         <img  src="barcode.png" width="180" height="30">
   </div>
   <div class="divrow2"><p>---------------------------------------------------------</p></div>
    <div class="divrow6"><p style="text-align: left; font-size: 9px; margin-left: 3px;"> In case of cash deposited in bank then stamp of bank on challan is compulsory otherwise challan will not be acceptable.</p></div>
    <div class="divrow2"><p>---------------------------------------------------------</p></div>
     <div class="divrow6"><h4 style="text-align: center;">For Office Use Only</h4></div>
      <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Date: ___________________</p></div>
      <div class="divrow3"><p style="text-align: left; margin-left: 3px;">Sign & Office Stamp</p></div>
  </div>
  <div class="column main">
  <div class="row">
    <div class="columnD1">
       <h5>Customer</h5>
    </div>
    <div class="columnD2">
          <img src="./../../dist/invoice/logo1.png">
       </div>
      <div class="columnD1">
          <h5>Challan: 90001</h5>
      </div>
  </div>
   <div class="row">
    <div class="divrow2"><h5>ASF HOUSING SCHEME KARACHI</h5></div>
  </div>
   <div class="row divrow2">
    <div class="divrow3"><h5>Registration Fee</h5></div>
  </div>
   <div class="row divrow2">
    <div class="columnD3"><p style="text-align: left; margin-left: 3px;">Form:</p></div>
    <div class="columnD3"><p style="text-align: left;">Date:</p></div>
  </div>
    <div class="row divrow2">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Name:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Type:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">CNIC:</p></div>
  </div>
  <div class="row divrow3">
         <img  src="barcode.png" width="180" height="30">
  </div>
   <div class="row divrow4">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Bank:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount RS.</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount in Words:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Due Date:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Expiry Date:</p></div>
     <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Drawn on Bank:________________________</p></div>   
   </div>
   <div class="row divrow3">
     <div class="columnD2"><p style="text-align: left; margin-left: 3px; margin-top:1-px;">Ins No:__________</p>
    </div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">DD</input></div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">PO</input></div>
    <div class="columnD6"><input type="checkbox" style="text-align: left;">Cash</input></div>

   </div>
   <div class="divrow5"><p>----------------------------------------------------------</p></div>
   <div>
   <div class="row divrow3">
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Customer Sig</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Contact No</p></div>
  </div>

  </div>
   <div class="row divrow4">
   <div class="divrow5"><p style="text-align: left; margin-left: 3px;">Bank Name:_______________________</p></div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Branch Code</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Stamp & Sign</p></div>
   </div>
    <div class="row">
         <img  src="./../../dist/invoice/barcode.png" width="180" height="30">
   </div>
   <div class="divrow2"><p>---------------------------------------------------------</p></div>
    <div class="divrow6"><p style="text-align: left; font-size: 9px; margin-left: 3px;"> In case of cash deposited in bank then stamp of bank on challan is compulsory otherwise challan will not be acceptable.</p></div>
    <div class="divrow2"><p>---------------------------------------------------------</p></div>
     <div class="divrow6"><h4 style="text-align: center;">For Office Use Only</h4></div>
      <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Date: ___________________</p></div>
      <div class="divrow3"><p style="text-align: left; margin-left: 3px;">Sign & Office Stamp</p></div>
  </div>
  <div class="column main">
  <div class="row">
    <div class="columnD1">
       <h5>Customer</h5>
    </div>
    <div class="columnD2">
          <img src="logo1.png">
       </div>
      <div class="columnD1">
          <h5>Challan: 90001</h5>
      </div>
  </div>
   <div class="row">
    <div class="divrow2"><h5>ASF HOUSING SCHEME KARACHI</h5></div>
  </div>
   <div class="row divrow2">
    <div class="divrow3"><h5>Registration Fee</h5></div>
  </div>
   <div class="row divrow2">
    <div class="columnD3"><p style="text-align: left; margin-left: 3px;">Form:</p></div>
    <div class="columnD3"><p style="text-align: left;">Date:</p></div>
  </div>
    <div class="row divrow2">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Name:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Type:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">CNIC:</p></div>
  </div>
  <div class="row divrow3">
         <img  src="barcode.png" width="180" height="30">
  </div>
   <div class="row divrow4">
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Bank:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount RS.</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Amount in Words:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Due Date:</p></div>
   <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Expiry Date:</p></div>
     <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Drawn on Bank:________________________</p></div>   
   </div>
   <div class="row divrow3">
     <div class="columnD2"><p style="text-align: left; margin-left: 3px; margin-top:1-px;">Ins No:__________</p>
    </div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">DD</input></div>
    <div class="columnD4"><input type="checkbox" style="text-align: left;">PO</input></div>
    <div class="columnD6"><input type="checkbox" style="text-align: left;">Cash</input></div>

   </div>
   <div class="divrow5"><p>----------------------------------------------------------</p></div>
   <div>
   <div class="row divrow3">
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Customer Sig</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Contact No</p></div>
  </div>

  </div>
   <div class="row divrow4">
   <div class="divrow5"><p style="text-align: left; margin-left: 3px;">Bank Name:_______________________</p></div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Branch Code</p>
    </div>
    <div class="columnD3"><p style="text-align: center;" class="textbourder">Stamp & Sign</p></div>
   </div>
    <div class="row">
         <img  src="barcode.png" width="180" height="30">
   </div>
   <div class="divrow2"><p>---------------------------------------------------------</p></div>
    <div class="divrow6"><p style="text-align: left; font-size: 9px; margin-left: 3px;"> In case of cash deposited in bank then stamp of bank on challan is compulsory otherwise challan will not be acceptable.</p></div>
    <div class="divrow2"><p>---------------------------------------------------------</p></div>
     <div class="divrow6"><h4 style="text-align: center;">For Office Use Only</h4></div>
      <div class="divrow6"><p style="text-align: left; margin-left: 3px;">Date: ___________________</p></div>
      <div class="divrow3"><p style="text-align: left; margin-left: 3px;">Sign & Office Stamp</p></div>
  </div>
</div>',2);
$mpdf->Output();
?>
<script>
  $(document).ready(function(){
      var customer_id = <?php echo $_GET['cus_formno']; ?>;
      $.ajax({
          url: 'api/sales/UnpaidCustomerRegistration/ActionsHandler.php',
          type:'POST',
          dataType: "json",
          data:{action:'show',customer_formno:customer_id},
          success: function(response) {
              console.log(response);
              $('#cus_reg').text(response.data[0].FORMNO);
              $('#cus_name').text(response.data[0].CUS_NAME);
              $('#cus_project').text(response.data[0].PARTICULARS);


              $('#reg_no').text(response.data[0].FORMNO);
              $('#cus_no').val(response.data[0].CUS_ID);
              $('#name').val(response.data[0].CUS_NAME);
              $('#contact').val(response.data[0].CONTACT_NO);
              $('#cnic').val(response.data[0].CNIC_NO);
              $('#perm_address').text(response.data[0].PERM_ADD);
              $('#country').val(response.data[0].COUNTRY_NAME);
              $('#province').val(response.data[0].PROVINCE_NAME);
              $('#city').val(response.data[0].CITY_NAME);
              $('#project').val(response.data[0].PARTICULARS);
              $('#campaign').val(response.data[0].REMARKS);
              $('#unit_type').val(response.data[0].DESCRIPTION);
          },
          error: function(e){
              console.log(e);
              alert("Contact IT Department");
          }
      });
  });
</script>