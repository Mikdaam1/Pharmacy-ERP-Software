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
font-size:14px
/* padding: 8px; */
}
td select{
font-size:11px !important;
}
td input,textarea{
font-size:11px !important;  
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
.table td, .table th {
padding:0.25rem !important;
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
              <h1>Journal Voucher Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="fm_breadcrumb"> Financial Management</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="account_voucher_breadcrumb"> Account Voucher</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="voucher_list_breadcrumb">Voucher List</button></li>
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
                                        <select class="form-control js-example-basic-single  form-control-sm" id="company_code" name="company_code" readonly>
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
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="payee" id="payee" class="form-control form-control-sm" placeholder="Payee" >
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">&nbsp; </label>
                                    <div class="input-group">
                                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="mvoucher_no" id="mvoucher_no" class="form-control form-control-sm" placeholder="mVoucher # " >
                                    </div>
                                </div>
                                <div class="col-md-9  form-group">
                                    <label for="">Narration :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <textarea rows="1" name="narration" id="narration" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                    </div>
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
                                              <th>Debit</th>
                                              <th>Credit</th>
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
                                            <td><input style="text-align:right; padding:0 13px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "debit" class="form-control form-control-sm debit"></td>
                                            <td><input style="text-align:right; padding:0 13px 0 0"  pattern="[a-zA-Z0-9 ,._-]{1,}" type="text"  name="" id = "credit" class="form-control form-control-sm credit"></td>
                                            <td><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>
                                          <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                        <td colspan="2" style="text-align:right;">Total</td>
                                        <td style="font-weight:bold" id = "debit_total">0</td>
                                        <td style="font-weight:bold" id = "credit_total">0</td>
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
  //debit change
  $("#voucher_form").on('focus','.debit',function(){
      var button_id = $(this).attr("id");
      if(button_id =='debit'){
        var p_debit_id='';
      }else{
        var p_debitid = button_id.split("t");
        var p_debit_id=p_debitid[1];
      }
      var previous_debit= $('#debit'+p_debit_id).val();
      sessionStorage.setItem("previous_debit", previous_debit);
  });
  $("#voucher_form").on('change','.debit',function(){
    var previous_debits=sessionStorage.getItem('previous_debit');
    if(previous_debits == ""){
        previous_debit=0;
    }else{
        previous_debit = previous_debits.replaceAll(',','');  
    }
    var total=$('#debit_total').text();
    console.log(total);
    if(total == '' || total == '0' || total=='0.00'){
        minuss=0;
    }else{
        minus_t = total.replaceAll(',','');  
        minuss= parseFloat(minus_t) - parseFloat(previous_debit);
    }
    // console.log(minuss);
    var button_id = $(this).attr("id");
    if(button_id =='debit'){
      debit_id='';
    }else{
    var debitid = button_id.split("t");
    debit_id=debitid[1];
    }
    var credit=$('#credit'+debit_id).val();
    var debit=$('#debit'+debit_id).val();
    // console.log(debit);
    if(credit !='0.00' && credit !='' && credit !='0'){
      $('#msg').html("Credit or Debit has to be null");
    }else{
        $('#msg').html('');
        if(debit == '' || debit == '0' || debit=='0.00' || isNaN(debit)){
            $('#debit'+debit_id).val(0);
            debit=$('#debit'+debit_id).val();
            var fnf=parseFloat(minuss) +parseFloat(debit);
        }else{
            if (debit.indexOf(',') > -1) { 
                pre_debit = debit.replaceAll(',','');  
                var debit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_debit);
                var debit=debit.replace(/[$]/g,'');
                var  show_debit=debit;
                var fnf=parseFloat(minuss) +parseFloat(pre_debit);
            }else{
                var debits=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(debit);
                var amunt=debits.replace(/[$]/g,'');
                var show_debit=amunt;
                var fnf=parseFloat(minuss) +parseFloat(debit);
            }
        }
      var total=new Intl.NumberFormat(
      'en-US', { style: 'currency', 
        currency: 'USD',
      currencyDisplay: 'narrowSymbol'}).format(fnf);
      var total=total.replace(/[$]/g,'');
      $('#debit_total').text(total);
      $('#debit'+debit_id).val(show_debit);
    }
  }); 
  //credit change
  $("#voucher_form").on('focus','.credit',function(){
      var button_id = $(this).attr("id");
      if(button_id =='credit'){
        var p_credit_id='';
      }else{
        var p_creditid = button_id.split("t");
        var p_credit_id=p_creditid[1];
      }
      var previous_credit= $('#credit'+p_credit_id).val();
      sessionStorage.setItem("previous_credit", previous_credit);
  });
  $("#voucher_form").on('change','.credit',function(){
    var previous_credits=sessionStorage.getItem('previous_credit');
    if(previous_credits == ""){
      previous_credit=0;
    }else{
      previous_credit = previous_credits.replaceAll(',','');  
    }
    var total=$('#credit_total').text();
    if(total == '' || total == '0' || total=='0.00'){
      minuss=0;
    }else{
      minus_t = total.replaceAll(',','');  
      minuss= parseFloat(minus_t) - parseFloat(previous_credit);
    }
    var button_id = $(this).attr("id");
    if(button_id =='credit'){
      credit_id='';
    }else{
    var creditid = button_id.split("t");
    credit_id=creditid[1];
    }
    var credit=$('#credit'+credit_id).val();
    var debit=$('#debit'+credit_id).val();
    if(debit !='0.00' && debit !='' && debit !='0'){
      $('#msg').html("Credit or Debit has to be null");
    }else{
        $('#msg').html('');
        if(credit == '' || credit == '0' || credit=='0.00' || isNaN(credit)){
            $('#credit'+credit_id).val(0);
            credit=$('#credit'+credit_id).val();
            var fnf=parseFloat(minuss) +parseFloat(credit);
        }else{
            if (credit.indexOf(',') > -1) { 
                pre_credit = credit.replaceAll(',','');
                var credit=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(pre_credit);
                var credit=credit.replace(/[$]/g,'');
                var  show_credit=credit;
                var fnf=parseFloat(minuss) +parseFloat(pre_credit);
            }else{
                var credits=new Intl.NumberFormat(
                'en-US', { style: 'currency', 
                currency: 'USD',
                currencyDisplay: 'narrowSymbol'}).format(credit);
                var amunt=credits.replace(/[$]/g,'');
                var show_credit=amunt;
                var fnf=parseFloat(minuss) +parseFloat(credit);
            }
        }
        console.log(total);
        var total=new Intl.NumberFormat(
        'en-US', { style: 'currency', 
            currency: 'USD',
        currencyDisplay: 'narrowSymbol'}).format(fnf);
        var total=total.replace(/[$]/g,'');
        $('#credit_total').text(total);
        $('#credit'+credit_id).val(show_credit);
    }
  }); 
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
$(document).ready(function(){
    var co_code=<?php echo $_GET['co_code'] ?>;
    var voucher_year=<?php echo $_GET['voucher_year'] ?>;
    var voucher_type="<?php echo $_GET['voucher_type'] ?>";
    // voucher_type=voucher_type.toString();
    var voucher_no=<?php echo $_GET['voucher_no'] ?>;
    // console.log(voucher_type);
    $('#voucher_no').val(voucher_no);
    $.ajax({
      url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
        type : "post",
        data : {action:'edit',voucher_no:voucher_no,co_code:co_code,voucher_year:voucher_year,voucher_type:voucher_type},
        success: function(response)
        {
        //   console.log(response);
        $('#voucher_date').val(response.voucher_date);
        $('#year').val(response.doc_year);
        $('#narration').val(response.naration);
        $('#reference_no').val(response.ref_no);
        $('#monthwise_ser_no').val(response.payee);
        $('#bank_ser_no').val(response.sn_no);
      
          // company code dropdown
          $.ajax({
              url: 'api/setup/chart_of_account/control_account_api.php',
              type: 'POST',
              data: {action: 'company_code'},
              dataType: "json",
              success: function(data){
                  // $("#ajax-loader").show();
                  $('#company_code').html('');
                  $('#company_code').append('<option value="" selected disabled>Select Company</option>');
                  $.each(data, function(key, value){
                      $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code="'+value["co_code"]+'" value='+value["co_code"]+'>'+value["co_code"]+' - '+value["co_name"]+'</option>');
                  });
                  $('#company_code').val(response.co_code);
                  $('#bank').val('');
                  $('#select2-company_code-container').val('');
                  $('#title').val('');
                  var company_name=$('.js-example-basic-single').find(':selected').attr("data-name");
                  var company_code=$('.js-example-basic-single').find(':selected').attr("data-code");
                  console.log(company_code);
                  $('#select2-company_code-container').html(company_code);
                  $('#company_name').val(company_name);
                  
                  
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
                  var account_code=$('#acc_desc').find(':selected').val();
                  // console.log(account_code);
                  var detail=$('#acc_desc').find(':selected').attr("data-name");
                  // console.log(detail);
                  $('#select2-acc_desc-container').html(account_code);
                  $('#detail').val(detail);

                  $.ajax({
                      url: 'api/financial_management/account_vouchers/journal_vouchers_api.php',
                      type: 'POST',
                      data: {action: 'edit_table',co_code:co_code,voucher_year:voucher_year,voucher_type:voucher_type,voucher_no:voucher_no},
                      dataType: "json",
                      success: function(data){
                        console.log(data);
                        var total_amount_d=0;
                        var total_amount_c=0;
                        if(data.length > 0){
                          var k=0;
                          var j=1;
                          var l=0;
                          for(var i=1;i<=data.length;i++){
                            // console.log(i);
                            $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td><select name="depart_desc[]" id = "depart_desc'+i+'" class="form-control js-example-basic-single depart_desc" ></td><td><textarea rows="1" name="depart_detail[]" id = "depart_detail'+i+'" class="form-control form-control-sm depart_detail" readonly></textarea></td><td><select name="vehicle_code[]" id="vehicle_code'+i+'" class="form-control js-example-basic-single vehicle_code"></td><td><input type="text" name = "memo[]" id = "memo'+i+'" class = "form-control form-control-sm memo"></td><td><input type="text" name="debit[]" id = "debit'+i+'" class="form-control form-control-sm debit" pattern="[a-zA-Z0-9 ,._-]{1,}"></td><td><input type="text" name="credit[]" id = "credit'+i+'" class="form-control form-control-sm credit"   pattern="[a-zA-Z0-9 ,._-]{1,}"></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
                            //department code
                            $.ajax({
                                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                                type: 'POST',
                                data: {action: 'department_code'},
                                dataType: "json",
                                success: function(response1){
                                    // $("#ajax-loader").show();
                                    //   console.log(i);
                                    // $('#acc_desc'+i).html('');
                                    $('#depart_desc'+j).addClass('js-example-basic-single');
                                    $('.js-example-basic-single').select2();
                                    $('#depart_desc'+j).append('<option value="0" selected readonly="readonly">Select Deprt</option>');
                                    // var j=1;
                                    $.each(response1, function(key, value){
                                        $('#depart_desc'+j).append('<option data-name="'+value["dept_name"]+'"  data-code='+value["dept_code"]+' value='+value["dept_code"]+'>'+value["dept_code"]+' - '+value["dept_name"]+'</option>');                                       
                                    });
                                    // console.log(l);
                                    // console.log(data[l].dept_code);
                                    if(data[l].dept_code==0){
                                        $('#depart_desc'+j).prop("selectedIndex", 0).val();
                                    }else{
                                        $('#depart_desc'+j).val(data[l].dept_code);
                                    }
                                        var dept_code=$('#depart_desc'+j).find(':selected').val();
                                        var depart_detail=$('#depart_desc'+j).find(':selected').attr("data-name");
                                        $('#select2-depart_desc'+j+'-container').html(dept_code);
                                        $('#depart_detail'+j).val(depart_detail);
                                    l++;
                                },
                                error: function(error){
                                    console.log(error);
                                    alert("Contact IT Department");
                                }
                            });
                            var m=0;
                            //vehicle code
                            $.ajax({
                                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                                type: 'POST',
                                data: {action: 'vehicle_code'},
                                dataType: "json",
                                success: function(response2){
                                    // $("#ajax-loader").show();
                                    //   console.log(i);
                                    $('#vehicle_code'+j).html('');
                                    $('#vehicle_code'+j).addClass('js-example-basic-single');
                                    $('.js-example-basic-single').select2();
                                    $('#vehicle_code'+j).append('<option value="0" selected readonly="readonly">Select Veh#</option>');
                                    // var j=1;
                                    $.each(response2, function(key, value){
                                        $('#vehicle_code'+j).append('<option  data-code='+value["vehicle_code"]+' value='+value["vehicle_code"]+'>'+value["vehicle_code"]+'</option>');                                       
                                    });
                                    //   console.log(m);
                                    if(data[m].vehicle_code=='0'){
                                        $('#vehicle_code').prop("selectedIndex", 0).val();
                                    }else{
                                        $('#vehicle_code'+j).val(data[m].vehicle_code);
                                    }
                                    //   $('#memo'+j).val(data[j].remarks);
                                    //   $('#amount'+j).val(data[j].amount);
                                        m++;
                                },
                                error: function(error){
                                    console.log(error);
                                    alert("Contact IT Department");
                                }
                            });
                            var n=0;
                            // ACCOUNT code dropdown
                            $.ajax({
                                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                                type: 'POST',
                                data: {action: 'account_code',company_code:co_code},
                                dataType: "json",
                                success: function(data1){
                                    // $("#ajax-loader").show();
                                    // $('#acc_desc'+i).html('');
                                    $('#acc_desc'+j).addClass('js-example-basic-single');
                                    $('.js-example-basic-single').select2();
                                    $('#acc_desc'+j).append('<option value="" selected disabled>Select Account</option>');
                                    // var j=1;
                                    $.each(data1, function(key, value){
                                        $('#acc_desc'+j).append('<option data-name="'+value["descr"]+'"  data-code='+value["account_code"]+' value='+value["account_code"]+'>'+value["account_code"]+' - '+value["descr"]+'</option>');                                       
                                    });
                                //     console.log(n);
                                //   console.log(data[n].account_code);
                                    $('#acc_desc'+j).val(data[n].account_code);
                                      var account_code=$('#acc_desc'+j).find(':selected').val();
                                      var detail=$('#acc_desc'+j).find(':selected').attr("data-name");
                                      $('#select2-acc_desc'+j+'-container').html(account_code);
                                      $('#detail'+j).val(detail);
                                      n++;
                                      // var debits=Math.floor(data[k].DEBIT);
                                      var debit=data[k].debit;
                                      if(debit==''){
                                        debit=0;
                                      }else{
                                          var debits=new Intl.NumberFormat(
                                            'en-US', { style: 'currency', 
                                              currency: 'USD',
                                            currencyDisplay: 'narrowSymbol'}).format(debit);
                                          var debits=debits.replace(/[$]/g,''); 
                                      }
                                          console.log(debits);
                                      $('#debit'+j).val(debits);
                                      $('#debit'+j).css('text-align','right ');
                                      $('#debit'+j).css('padding','0 13px 0 0');

                                      // var credits=Math.floor(data[k].CREDIT);
                                      var credits=data[k].credit;
                                      var credits=new Intl.NumberFormat(
                                        'en-US', { style: 'currency', 
                                          currency: 'USD',
                                        currencyDisplay: 'narrowSymbol'}).format(credits);
                                      var credits=credits.replace(/[$]/g,''); 
                                      $('#credit'+j).val(credits);
                                      $('#credit'+j).css('text-align','right ');
                                      $('#credit'+j).css('padding','0 13px 0 0');
                                      var debit_amount=$('#debit'+j).val();
                                      // debit_amount=debit_amount.toLocaleString();
                                      total_amount_d = parseFloat(total_amount_d) + parseFloat(debit);
                                      debit_final_amount=total_amount_d.toLocaleString();
                                      $('#debit_total').text(debit_final_amount);
                                      $('#total_d').val(total_amount_d);
                                      $('#memo'+j).val(data[k].remarks);
                                      var credit_amount=$('#credit'+j).val();
                                      // credit_amount=credit_amount.toLocaleString();
                                      total_amount_c = parseFloat(total_amount_c) + parseFloat(data[k].credit);
                                      credit_final_amount=total_amount_c.toLocaleString();
                                      $('#credit_total').text(credit_final_amount);
                                      $('#total_c').val(total_amount_c);
                                      j++;
                                      k++;
                                },
                                error: function(error){
                                    console.log(error);
                                    alert("Contact IT Department");
                                }
                            });
                          }
                        }

                      },
                      error: function(error){
                          console.log(error);
                          alert("Contact IT Department");
                      }
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
            // ACCOUNT code dropdown
            $.ajax({
                url: 'api/financial_management/account_vouchers/cash_receipts_api.php',
                type: 'POST',
                data: {action: 'account_code',company_code:co_code},
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
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
    });
    $('#example1').ready(function(){ 
      
          //on chAnge account gl code
          $("#voucher_form").on('change','#acc_desc',function(){
              var account_code=$('#acc_desc').find(':selected').val();
              // console.log(account_code);
              var detail=$('#acc_desc').find(':selected').attr("data-name");
              // console.log(detail);
              $('#select2-acc_desc-container').html(account_code);
              $('#detail').val(detail);
          });

          //on chAnge company code
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


    });
    $('#example1').ready(function(){
      var i = 0;
      var total_d_amount = 0;
      var total_c_amount = 0;
      $('.add').click(function(){
        var rowCount = $("#example1 tr").length;
        var company_code=$('#company_code').val();
          i=rowCount-2;
          var acc_desc = $('#acc_desc').val();
          var detail = $("#detail").val();
          var depart_desc = $('#depart_desc').val();
          var depart_detail = $("#depart_detail").val();
          var vehicle_code = $("#vehicle_code").val();
          var memo = $("#memo").val();
          var debits = $("#debit").val();
          if(debits == ""){
          debit=0;
        }else{
          debit=debits;
        }
        var credits = $("#credit").val();
        if(credits == ""){
          credit=0;
        }else{
          credit=credits;
        }
        var memo = $("#memo").val();
        if(debit == '0' && credit == '0'){
            $('#msg').text("debit or credit cannot be the null.");
        }else if(memo == ""){
              $('#msg').text("memo cannot be the null.");
        }else if(acc_desc == null){
            $('#msg').text("account cannot be the null.");
        }else{
              $('#msg').text("");
              
              // values empty
            $("#debit").val('');
            $("#credit").val('');
              $("#detail").val('');
              $("#memo").val('');

              $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td><select name="depart_desc[]" id = "depart_desc'+i+'" class="form-control js-example-basic-single depart_desc" ></td><td><textarea rows="1" name="depart_detail[]" id = "depart_detail'+i+'" class="form-control form-control-sm depart_detail" readonly></textarea></td><td><select name="vehicle_code[]" id="vehicle_code'+i+'" class="form-control js-example-basic-single vehicle_code"></td><td><input type="text" name = "memo[]" id = "memo'+i+'" class = "form-control form-control-sm memo"></td><td><input type="text" name="debit[]" id = "debit'+i+'" class="form-control form-control-sm debit" pattern="[a-zA-Z0-9 ,._-]{1,}"></td><td><input type="text" name="credit[]" id = "credit'+i+'" class="form-control form-control-sm credit"   pattern="[a-zA-Z0-9 ,._-]{1,}"></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');
              
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
                          // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                          
                          
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
            $('#debit'+i+'').val(debit);
            $('#debit'+i+'').css('text-align','right ');
            $('#debit'+i+'').css('padding','0 13px 0 0');
            $('#credit'+i+'').val(credit);
            $('#credit'+i+'').css('text-align','right ');
            $('#credit'+i+'').css('padding','0 13px 0 0');
            $('#memo'+i+'').val(memo);
            
            var current_debit_amount = $('#debit_total').text();
            var current_credit_amount = $('#credit_total').text();
            if(current_debit_amount != '0'){
              cr_db_amount = current_debit_amount.replace(/[^\d\,\.]/g, '');  
              let commaNotation_dt = /^\d+(\.\d{3})?\,\d{2}$/.test(cr_db_amount);
              current_debit_amount = commaNotation_dt ?
              Math.round(parseFloat(cr_db_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
              Math.round(parseFloat(cr_db_amount.replace(/[^\d\.]/g, '')));
              if(current_credit_amount != '0'){
                cr_cr_amount = current_credit_amount.replace(/[^\d\,\.]/g, '');  
                let commaNotation_cr = /^\d+(\.\d{3})?\,\d{2}$/.test(cr_cr_amount);
                current_credit_amount = commaNotation_cr ?
                Math.round(parseFloat(cr_cr_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
                Math.round(parseFloat(cr_cr_amount.replace(/[^\d\.]/g, '')));
              }else{
                current_credit_amount='0.00';
              }
            }else{
              current_debit_amount='0.00';
            }
            var total_debit_amount = parseFloat(current_debit_amount) + parseFloat(debit);
            var total_credit_amount = parseFloat(current_credit_amount) + parseFloat(credit);
            // $('#total_d').text(total_debit_amount);
            // $('#total_d').val(total_debit_amount);
            // $('#total_c').text(total_credit_amount);
            // $('#total_c').val(total_credit_amount);
            total_debit_amount=total_debit_amount.toLocaleString()+'.00';
            total_credit_amount=total_credit_amount.toLocaleString()+'.00';
            // $('#debit_total').text(total_debit_amount);
            // $('#credit_total').text(total_credit_amount);
    
          }
      });
        
      $('#example1').on('click','.remove', function(){
        var button_id = $(this).attr("id");
        var remove_debit_amount = $('#debit'+button_id+'').val();
        // dcm_rd = remove_debit_amount.replace(/[^\d\,\.]/g, '');  
        // let commaNotation_rd = /^\d+(\.\d{3})?\,\d{2}$/.test(dcm_rd);
        // debit_r_amount = commaNotation_rd ?
        // Math.round(parseFloat(remove_debit_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
        // Math.round(parseFloat(remove_debit_amount.replace(/[^\d\.]/g, '')));
        debit_r_amount = remove_debit_amount.replaceAll(',','');  

        var remove_credit_amount = $('#credit'+button_id+'').val();
        // dcm_rc = remove_credit_amount.replace(/[^\d\,\.]/g, '');  
        // let commaNotation_rc = /^\d+(\.\d{3})?\,\d{2}$/.test(dcm_rc);
        // credit_r_amount = commaNotation_rc ?
        // Math.round(parseFloat(remove_credit_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
        // Math.round(parseFloat(remove_credit_amount.replace(/[^\d\.]/g, '')));
        credit_r_amount = remove_credit_amount.replaceAll(',','');  
        $('#tr'+button_id+'').remove();

        var debit_current_amount = $('#debit_total').text();
        // dcm = debit_current_amount.replace(/[^\d\,\.]/g, '');  
        // let commaNotation_td = /^\d+(\.\d{3})?\,\d{2}$/.test(dcm);
        // debit_current_amount = commaNotation_td ?
        // Math.round(parseFloat(debit_current_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
        // Math.round(parseFloat(debit_current_amount.replace(/[^\d\.]/g, '')));
        debit_current_amount = debit_current_amount.replaceAll(',',''); 

        var credit_current_amount = $('#credit_total').text();
        // ccm = credit_current_amount.replace(/[^\d\,\.]/g, '');  
        // let commaNotation_tc = /^\d+(\.\d{3})?\,\d{2}$/.test(ccm);
        // credit_current_amount = commaNotation_tc ?
        // Math.round(parseFloat(credit_current_amount.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
        // Math.round(parseFloat(credit_current_amount.replace(/[^\d\.]/g, '')));
        credit_current_amount = credit_current_amount.replaceAll(',',''); 
        var total_debit_amount = parseFloat(debit_current_amount) - parseFloat(debit_r_amount);
        // console.log(total_debit_amount);
        var total_credit_amount = parseFloat(credit_current_amount) - parseFloat(credit_r_amount);
        if(isNaN(total_debit_amount)){
          total_debit_amount='0';
          if(isNaN(total_credit_amount)){
            total_credit_amount='0';
          }else{
            total_credit_amount=total_credit_amount.toLocaleString()+'.00';
          }
        }else if(isNaN(total_credit_amount)){
            total_credit_amount='0';
        }else{
              total_debit_amount=total_debit_amount.toLocaleString()+'.00';
              total_credit_amount=total_credit_amount.toLocaleString()+'.00';
        }
          $('#debit_total').text(total_debit_amount);
          $('#credit_total').text(total_credit_amount);

      });
    });
});


      

$("#voucher_form").on("submit", function (e) {
      var debits = $('#debit_total').text();
      var credits = $('#credit_total').text();
      if ($("#voucher_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            if(debits == credits){
              e.preventDefault();
              var formData = new FormData(this); 
              formData.append('action','update');
              $.ajax({
                url: 'api/financial_management/account_vouchers/journal_vouchers_api.php',
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
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                        if(status == 0){
                            $("#msg").html(message);
                        }else{
                            $.get('financial_management/account_vouchers/account_voucher_list.php',function(data,status){
                             
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
            $("#msg").html("Debit must be equal to credit");
            }
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
$("#voucher_list_breadcrumb").on("click", function () {
    $.get('financial_management/account_vouchers/account_voucher_list.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>