
<style>
select{
width:82% !important;
}
#btn-back-to-top {
position: fixed;
bottom: 20px;
right: 20px;
/* display: none; */
}
html {
scroll-behavior: smooth;
}
#down {
margin-top: -1%;
padding-top: -1%;
} 
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
.input-group-prepend{
/* border-right:2px solid black !important */
}
.select2-hidden-accessible{
border:1px solid black !important;

}
.select2-selection{
background-color: #ccd4e1 !important  
}
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
/* -webkit-text-stroke: 0.3vw #f7f7fe; */
font-weight:600;margin-top: -58px;
}
h2::before {
top: 0;
left: 0;
width: 0;
height: 100%;
color: #007bff;
overflow: hidden;
position: absolute;
content: attr(data-text);
border-right: 2px solid #37b9f1;
-webkit-text-stroke: 0vw #f7f7fe;
animation: animate 6s linear infinite;
font-weight:600
}
@keyframes animate {
0%,
10%,
100% {
width: 0;
}
70%,
90% {
width: 100%;
}
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none !important;
margin: 0!important;
}
/* Firefox */
input[type=number] {
-moz-appearance: textfield !important;
}
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td,th {
border: 1px solid #dddddd;
text-align: left;
font-size:15px
/* padding: 8px; */
}
tr:nth-child(even) {
background-color: #dddddd;
}
.select2-container{
width:80% !important;
/* border: 1px solid #d9dbde */
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:78% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container{
width:72% !important;
} 
}
td .select2-container{
    width:100% !important;
    /* border: 1px solid #d9dbde */
}
.type{
    
    width:100% !important;
}
.table td, .table th {
padding:0.35rem !important;
}
.table th{
text-align:center !important;
}
</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Bank Receipt</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="fm_breadcrumb"> Financial Management</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="account_voucher_breadcrumb"> Account Voucher</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="add_bank_receipt_breadcrumb">Add Bank Receipt</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="container">
                          <form method = "post" id = "voucher_form">
                            <?php include '../../display_message/display_message.php'?>
                              <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="">Voucher Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="voucher_no" id="voucher_no" class="form-control form-control-sm" placeholder="Voucher No" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Voucher Date :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="date" name="voucher_date" id="voucher_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Reference Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="reference_no" id="reference_no" class="form-control form-control-sm" placeholder="Reference No" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Year :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="number" name="year" id="year" class="form-control form-control-sm" min="1900" max="2099" step="1" value="<?php echo date("Y"); ?>" readonly />
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Company Code :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                        </div>
                                        <select class="form-control js-example-basic-single  form-control-sm" id="company_code" name="company_code">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Cash/Bank :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm js-example-basic-single" id="bank" name="bank">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Title :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input maxlength="30" type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Title Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Cash/Bank Ser# :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="bank_ser_no" id="bank_ser_no" class="form-control form-control-sm" placeholder="Cash/Bank Ser#" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Monthwise Ser# :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="monthwise_ser_no" id="monthwise_ser_no" class="form-control form-control-sm" placeholder="MonthWise Ser#" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for=""> &nbsp;</label>
                                    <div class="input-group">
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="monthwise_ser_no2" id="monthwise_ser_no2" class="form-control form-control-sm" placeholder="MonthWise Ser#" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">&nbsp; </label>
                                    <div class="input-group">
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="monthwise_ser_no3" id="monthwise_ser_no3" class="form-control form-control-sm" placeholder="MonthWise Ser#" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Cheque# :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="cheque_no" id="cheque_no" class="form-control form-control-sm" placeholder="Cheque No" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Cheque Date :</label><span style="color:red;">*</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="date" name="cheque_date" id="cheque_date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6  form-group">
                                    <label for="">Narration :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <textarea rows="1" name="narration" id="narration" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                  <input type="hidden" name="debit" id="debit" class="form-control">
                                </div>
                                <div class="col-md-6 form-group text-center">
                                  <span id="msg3" style="color: red;font-size: 13px;"></span>
                                </div>
                              </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <div style="height:50px" class="loading">
                                          <span style="text-align:center;font-weight:bold;">Account Details</span>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                <form id="d" name="geek">
                                  <table id="example1" class="table table-bordered table-striped table-responsive-lg">
                                      <thead>
                                          <tr>
                                              <th>Account Code</th>
                                              <th>Account Description</th>
                                              <th>Depart Code</th>
                                              <th>Depart Name</th>
                                              <th>Vehicle#</th>
                                              <th>Memo</th>
                                              <th>Amount</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="d_items">
                                        <tr id="main_tr">
                                            <td ><select style="font-size:12px" name="" id = "acc_desc" class="form-control form-control-sm js-example-basic-single acc_desc"></select></td>
                                            <td ><textarea style="font-size:12px"  rows="1"  name="" id = "detail" class="form-control form-control-sm detail" readonly></textarea></td>
                                            <td ><select style="font-size:12px;" name="" id = "depart_desc" class="form-control form-control-sm js-example-basic-single depart_desc"></select></td>
                                            <td ><textarea style="font-size:12px"  rows="1"  name="" id = "depart_detail" class="form-control form-control-sm depart_detail" readonly></textarea></td>
                                            <td ><select style="font-size:12px" name="" id = "vehicle_code" class="form-control form-control-sm js-example-basic-single vehicle_code"></select></td>
                                            <td ><textarea style="font-size:12px"  rows="1"  name="" id = "memo" class="form-control form-control-sm memo"></textarea></td>
                                            <td ><input style="font-size:12px" style="text-align:right; padding:0 13px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" value="0" type="text"  name="" id = "amount" class="form-control form-control-sm amount"></td>
                                            <td><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>
                                          <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td style="text-align:right;">Total:</td>
                                              <td style="font-weight:bold" name="total" id="total"><b>0</b></td>
                                              <td colspan="2"></td>
                                          </tr>
                                  </table>
                                </form>
                                      <div style="text-align: center;">
                                          <span id="msg" style="color: red;font-size: 13px;"></span>
                                      </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-sm-12 text-right">
                                          <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                          </form>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>   

      <!-- /.content -->
</div>
<!-- ./wrapper -->



<script>
 
$(document).ready(function(){
  $("#voucher_form").on('focus','.amount',function(){
      var button_id = $(this).attr("id");
      if(button_id =='amount'){
        var p_amount_id='';
      }else{
        var p_amountid = button_id.split("t");
        var p_amount_id=p_amountid[1];
      }
      var previous_amount= $('#amount'+p_amount_id).val();
      sessionStorage.setItem("previous_amount", previous_amount);
  });
  $("#voucher_form").on('change','.amount',function(){
    var previous_amounts=sessionStorage.getItem('previous_amount');
    if(previous_amounts == ""){
      previous_amount=0;
    }else{
      // myStr_pre = previous_amounts.replace(/[^\d\,\.]/g, '');  
      // let commaNotations_pre = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_pre);
      // previous_amount = commaNotations_pre ?
      // Math.round(parseFloat(previous_amounts.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
      // Math.round(parseFloat(previous_amounts.replace(/[^\d\.]/g, '')));
      previous_amount = previous_amounts.replaceAll(',','');
    }
    var total=$('#total').text();
    if(total == '' || total == '0' || total=='0.00' ){
      minuss=0;
    }else{
      minus_t = total.replaceAll(',','');
      minuss= parseFloat(minus_t) - parseFloat(previous_amount);
    }
    // console.log(minuss);
    var button_id = $(this).attr("id");
    if(button_id =='amount'){
      amount_id='';
    }else{
    var amountid = button_id.split("t");
    amount_id=amountid[1];
    }
    $('#amount'+amount_id).css('text-align','right ');
    $('#amount'+amount_id).css('padding','0 13px 0 0');
    var amount=$('#amount'+amount_id).val();
    if(amount == '' || amount == '0' || amount=='0.00' || isNaN(amount)){
      $('#amount'+amount_id).val(0);
      amount=$('#amount'+amount_id).val();
      var fnf=parseFloat(minuss) +parseFloat(amount);
      var total=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
        currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(fnf);
      var total=total.replace(/[$]/g,'');
      $('#total').text(total);
    }else{
      if (amount.indexOf(',') > -1) { 
        pre_amount = amount.replaceAll(',','');
        var amount=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
          currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(pre_amount);
        var amount=amount.replace(/[$]/g,'');
        var  show_amount=amount;
        var fnf=parseFloat(minuss) +parseFloat(pre_amount);
      }else{
        var amounts=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
          currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(amount);
        var amunt=amounts.replace(/[$]/g,'');
        var show_amount=amunt;
        var fnf=parseFloat(minuss) +parseFloat(amount);
      }
      var total=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
        currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(fnf);
      var total=total.replace(/[$]/g,'');
      $('#total').text(total);
      $('#amount'+amount_id).val(show_amount);
    }

  });    
});
$(document).ready(function(){
    $('.js-example-basic-single').select2();
});
//validation
$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#voucher_form').validate({
        rules: {
          voucher_date: {
            required: true,
          },
          year: {
            required: true,
          },
          company_code: {
            required: true,
          },
          company_name: {
            required: true,
          },
          bank: {
            required: true,
          },
          title: {
            required: true,
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
});
$("#voucher_form").on('change','#voucher_date',function(){
  var date = new Date($('#voucher_date').val());
  var year = date.getFullYear();
  $('#year').val(year);
  });
    
$('#example1').ready(function(){
  
      // company code dropdown
      $.ajax({
          url: 'api/setup/chart_of_account/control_account_api.php',
          type: 'POST',
          data: {action: 'company_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#company_code').html('');
              $('#company_code').append('<option value="" selected disabled>Select Company</option>');
              $.each(response, function(key, value){
                  $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code='+value["co_code"]+' value='+value["co_code"]+'>'+value["co_code"]+' - '+value["co_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // department code dropdown
      $.ajax({
          url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
          type: 'POST',
          data: {action: 'department_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#depart_desc').html('');
              $('#depart_desc').append('<option value="0" selected readonly="readonly">Select Deprt</option>');
              $.each(response, function(key, value){
                  $('#depart_desc').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      // Vehicle code dropdown
      $.ajax({
          url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
          type: 'POST',
          data: {action: 'vehicle_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#vehicle_code').html('');
              $('#vehicle_code').append('<option value="0" selected readonly="readonly">Select Veh#</option>');
              $.each(response, function(key, value){
                  $('#vehicle_code').append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });
      
      //on chAnge department code
      $("#voucher_form").on('change','#depart_desc',function(){
        var dept_name=$('#depart_desc').find(':selected').attr("data-name");
        var dept_desc=$('#depart_desc').find(':selected').attr("data-code");
        $('#select2-depart_desc-container').html(dept_desc);
        $('#depart_detail').val(dept_name);
      });
      //on chAnge company code
      $("#voucher_form").on('change','#company_code',function(){
          $("#ajax-loader").show();
          var rowCount = $("#example1 tr").length;
          console.log(rowCount);
          if(rowCount == 3){
            $('#acc_desc').val('');
            $('#detail').val('');
            $('#depart_desc').val('');
            $('#depart_detail').val('');
            $('#vehicle_code').val('');
            $('#memo').val('');
            $('#amount').val('');
            $('#total').val('');
            $('#debit').val('');
          }else{
            for(var a=2;a<rowCount -1;a++){
              var d=a-1;
              $('#tr'+d+'').remove(); 
              $('#total').text('0');
              $('#debit').val('');
            }
          }
          $('#bank').val('');
          $('#select2-company_code-container').val('');
          $('#title').val('');
          var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
          var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
          $('#select2-company_code-container').html(company_code);
          $('#company_name').val(company_name);
          
          // cash account dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/bank_receipts_api.php',
              type: 'POST',
              data: {action: 'cash_accounts',company_code:company_code},
              dataType: "json",
              success: function(response){
                  $("#ajax-loader").hide();
                  console.log(response);
                  $('#bank').html('');
                  $('#bank').append('<option value="" selected disabled>Select Control</option>');
                    $.each(response, function(key, value){
                        $('#bank').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                    });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          // ACCOUNT code dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
              type: 'POST',
              data: {action: 'account_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  // $("#ajax-loader").show();
                  // console.log(response);
                  $('#acc_desc').html('');
                  $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                  $.each(response, function(key, value){
                      $('#acc_desc').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });     
      });
      
      //on chAnge company code
      $("#voucher_form").on('change','#bank',function(){
          var bank_detail=$('#bank').find(':selected').attr("data-name");
          // console.log(bank_detail);
          var bank_code=$('#bank').find(':selected').attr("data-code");
          // console.log(detail);
          $('#select2-bank-container').html(bank_code);
          $('#title').val(bank_detail);
      });
      
      //on chAnge company code
      $("#voucher_form").on('change','#acc_desc',function(){
          var account_code=$('#acc_desc').find(':selected').val();
          // console.log(account_code);
          var detail=$('#acc_desc').find(':selected').attr("data-name");
          // console.log(detail);
          $('#select2-acc_desc-container').html(account_code);
          $('#detail').val(detail);
      });
        //on chAnge account code
        $("#voucher_form").on('change','.acc_desc',function(){
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id=id[1];
            var id = id.split("acc_desc");
            id=id[1];
            var account_code=$('#acc_desc'+id).find(':selected').val();
            // console.log(account_code);
            var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
            // console.log(detail);
            $('#select2-acc_desc'+id+'-container').html(account_code);
            $('#detail'+id).val(detail);
        });
        //on chAnge depart code
        $("#voucher_form").on('change','.depart_desc',function(){
            var target = event.target || event.srcElement;
            var id = target.id;
            var id = id.split("-");
            id=id[1];
            var id = id.split("c");
            id=id[1];
            var depart_code=$('#depart_desc'+id).find(':selected').val();
            // console.log(depart_code);
            var depart_detail=$('#depart_desc'+id).find(':selected').attr("data-name");
            // console.log(depart_detail);
            $('#select2-depart_desc'+id+'-container').html(depart_code);
            $('#depart_detail'+id).val(depart_detail);
        });

});
$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
    var company_code=$('#company_code').val();
      i++;
      // console.log(i);
      var acc_desc = $('#acc_desc').val();
      var detail = $("#detail").val();
      var depart_desc = $('#depart_desc').val();
      var depart_detail = $("#depart_detail").val();
      var vehicle_code = $("#vehicle_code").val();
      var memo = $("#memo").val();
      var amount = $("#amount").val();
      if(amount <= 0){
          $('#msg').text("amount cannot be the null.");
      }else if(memo == ""){
          $('#msg').text("memo cannot be the null.");
      }else if(acc_desc == null){
          $('#msg').text("account cannot be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#amount").val('0');
          $("#detail").val('');
          $("#memo").val('');
          $("#vehicle_code").val('');
          $("#depart_detail").val('');

          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><textarea rows="1" name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></textarea></td><td><select name="depart_desc[]" id = "depart_desc'+i+'" class="form-control js-example-basic-single depart_desc" ></td><td><textarea rows="1" name="depart_detail[]" id = "depart_detail'+i+'" class="form-control form-control-sm depart_detail" readonly></textarea></td><td><select name="vehicle_code[]" id="vehicle_code'+i+'" class="form-control js-example-basic-single vehicle_code"></td><td><textarea rows="1" name = "memo[]" id = "memo'+i+'" class = "form-control form-control-sm memo"></textarea></td><td><input type="text" name="amount[]" id = "amount'+i+'" class="form-control form-control-sm amount"></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
          
          // ACCOUNT code dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
              type: 'POST',
              data: {action: 'account_code',company_code:company_code},
              dataType: "json",
              success: function(data){
                  // $("#ajax-loader").show();
                  // console.log(data);
                  $('#acc_desc').html('');
                  $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                  $.each(data, function(key, value){
                      $('#acc_desc').append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                      // console.log(value["DESCR"]);
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          // ACCOUNT code dropdown
          $.ajax({
              url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
              type: 'POST',
              data: {action: 'account_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  // $("#ajax-loader").show();
                  // console.log(response);
                  $('#acc_desc'+i).html('');
                  $('#acc_desc'+i).addClass('js-example-basic-single');
                  $('.js-example-basic-single').select2();
                  $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
                  // var j=1;
                  $.each(response, function(key, value){
                      $('#acc_desc'+i).append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');
                      if(value["account_code"]== acc_desc){
                        acc_desc= value["account_code"];
                        // console.log(acc_desc);
                        $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
                      } 
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
          //on chAnge account code
          $("#voucher_form").on('change','#acc_desc',function(){
              var account_code=$('#acc_desc').find(':selected').val();
              // console.log(account_code);
              var detail=$('#acc_desc').find(':selected').attr("data-name");
              // console.log(detail);
              $('#select2-acc_desc-container').html(account_code);
              $('#detail').val(detail);
              // console.log(detail);
          });
      

          
      // department code dropdown
        $.ajax({
          url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
          type: 'POST',
          data: {action: 'department_code'},
          dataType: "json",
          success: function(response){
              // $("#ajax-loader").show();
              // console.log(response);
              $('#depart_desc').html('');
              $('#depart_desc').append('<option value="0" selected readonly="readonly">Select Deprt</option>');
              $.each(response, function(key, value){
                  $('#depart_desc').append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
              });
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
        });
        // department code loop dropdown
        $.ajax({
            url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
            type: 'POST',
            data: {action: 'department_code'},
            dataType: "json",
            success: function(response){
                $('#depart_desc'+i).html('');
                $('#depart_desc'+i).addClass('js-example-basic-single');
                $('.js-example-basic-single').select2();
                $('#depart_desc'+i).append('<option value="0" selected readonly="readonly">Select Account</option>');
                // var j=1;
                $.each(response, function(key, value){
                    $('#depart_desc'+i).append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');
                    if(value["dept_code"]== depart_desc){
                      depart_desc= value["dept_code"];
                      // console.log(depart_desc);
                      $('#depart_desc'+i+' option[value='+depart_desc+']').prop("selected", true);
                    } 
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        //on chAnge department code
        $("#voucher_form").on('change','#depart_desc',function(){
          var dept_name=$('#depart_desc').find(':selected').attr("data-name");
          var dept_desc=$('#depart_desc').find(':selected').attr("data-code");
          $('#select2-depart_desc-container').html(dept_desc);
          $('#depart_detail').val(dept_name);
        });
        // Vehicle code dropdown
        $.ajax({
            url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
            type: 'POST',
            data: {action: 'vehicle_code'},
            dataType: "json",
            success: function(response){
                // $("#ajax-loader").show();
                // console.log(response);
                $('#vehicle_code').html('');
                $('#vehicle_code').append('<option value="0" readonly="readonly">Select Veh#</option>');
                $.each(response, function(key, value){
                    $('#vehicle_code').append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        // Vehicle code loop dropdown
        $.ajax({
            url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
            type: 'POST',
            data: {action: 'vehicle_code'},
            dataType: "json",
            success: function(response){
                $('#vehicle_code'+i).html('');
                $('#vehicle_code'+i).addClass('js-example-basic-single');
                $('.js-example-basic-single').select2();
                $('#vehicle_code'+i).append('<option value="0" selected readonly="readonly">Select Veh#</option>');
                // var j=1;
                $.each(response, function(key, value){
                    $('#vehicle_code'+i).append('<option value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');
                    if(value["vehicle_code"]== vehicle_code){
                      vehicle_code= value["vehicle_code"];
                      // console.log(vehicle_code);
                      $('#vehicle_code'+i+' option[value='+vehicle_code+']').prop("selected", true);
                    } 
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        
        



          $('#detail'+i+'').val(detail);
          $('#depart_detail'+i+'').val(depart_detail);
          $('#amount'+i+'').val(amount);
          $('#amount'+i+'').css('text-align','right ');
          $('#amount'+i+'').css('padding','0 13px 0 0');
          $('#memo'+i+'').val(memo);
  
          var current_amount = $('#total').text();
          if(current_amount != '0'){
            cr_amount = current_amount.replace(/[^\d\,\.]/g, '');  
            let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(cr_amount);
            current_amount = commaNotation ?
            Math.round(parseFloat(current_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            Math.round(parseFloat(current_amount.replace(/[^\d\.]/g, '')));
            console.log(current_amount);
          }else{
            current_amount='0.00';
          }
          
          var total_amount = parseFloat(current_amount) + parseFloat(amount);
          total_amount=total_amount.toLocaleString()+'.00';
          // console.log(total_amount);
          // $('#total').text(total_amount);
          debit_myStr = total_amount.replace(/[^\d\,\.]/g, '');  
          let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(debit_myStr);
          debit = commaNotation ?
          Math.round(parseFloat(total_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          Math.round(parseFloat(total_amount.replace(/[^\d\.]/g, '')));
          // $('#debit').val(total_amount);
      }
  });
   
      $('#example1').on('click','.remove', function(){
          var button_id = $(this).attr("id");
          var remove_amount = $('#amount'+button_id+'').val();
          $('#tr'+button_id+'').remove();

          if (remove_amount.indexOf(',') > -1) { 
            // r_amount = remove_amount.replace(/[^\d\,\.]/g, '');  
            // let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(r_amount);
            // remove_amount_fnf = commaNotation ?
            // Math.round(parseFloat(remove_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
            // Math.round(parseFloat(remove_amount.replace(/[^\d\.]/g, ''))); 
            remove_amount_fnf = remove_amount.replaceAll(',','');   
          }else{
            remove_amount_fnf=remove_amount;
          }
          var current_amount = $('#total').text();
          // cr_amount = current_amount.replace(/[^\d\,\.]/g, '');  
          // let commaNotation = /^\d+(\.\d{3})?\,\d{2}$/.test(cr_amount);
          // current_amount = commaNotation ?
          // Math.round(parseFloat(current_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(current_amount.replace(/[^\d\.]/g, '')));
          current_amount = current_amount.replaceAll(',','');  
          var total_amount = parseFloat(current_amount) - parseFloat(remove_amount_fnf);
          if(isNaN(total_amount)){
            total_amount='0';
          }else{
            total_amount=total_amount.toLocaleString();
          }
          $('#total').text(total_amount);
          // debit_myStr = total_amount.replace(/[^\d\,\.]/g, '');  
          // let commaNotations = /^\d+(\.\d{3})?\,\d{2}$/.test(debit_myStr);
          // debit = commaNotations ?
          // Math.round(parseFloat(total_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(total_amount.replace(/[^\d\.]/g, '')));
          // $('#debit').val(total_amount);
          debit = total_amount.replaceAll(',','');   
      });
});
      
$("#voucher_form").on("submit", function (e) {
      if ($("#voucher_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
          e.preventDefault();
          var formData = new FormData(this); 
          var total=$('#total').text();
          formData.append('debit',total);
          var company_code=$('#company_code').val();
          formData.append('company_code',company_code);
          formData.append('action','insert');
          $.ajax({
              url: 'api/financial_management/account_vouchers/bank_receipts_api.php',
              type: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              processData:false,
              success: function(response)
              {
                  $("#ajax-loader").hide();
                  var message = response.message
                  var status = response.status
                //   var voucher_no = response.voucher_no
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                      if(status == 0){
                          $("#msg").html(message);
                      }else{
                          $.get('financial_management/account_vouchers/bank_receipt.php',function(data,status){
                            
                            $('#content').html(data);
                          });
                      }
                      },
                      error: function(e) 
                      {
                      console.log(e);
                      alert("Contact IT Department");
                      }
                  });
              },
              error: function(e) 
              {
                  console.log(e);
                  alert("Contact IT Department");
              } 
          });
        }else{
            $("#msg").html("Click on Insert Row");
        }
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#account_voucher_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/account_voucher.php', function(data,status){
        $("#content").html(data);
    });
});
$("#add_bank_receipt_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/bank_receipt.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>