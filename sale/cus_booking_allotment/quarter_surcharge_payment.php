<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Surcharge Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="surcharge_pay_breadcrumb">Surcharge Payment</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
            </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">Surcharge Record</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SR.No</th>
                        <th>Form No</th>
                        <th>CUS ID</th>
                        <th>Customer Name</th>
                        <th>CNIC</th>
                        <th>Contact No</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- payment invoices Model -->
<div class="modal fade" id="exampleModalpay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Entry</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="customer_pay_form">
                <div class="card-body">
                    <table id="inv_detail" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SR.No</th>
                                <th>TRNO</th>
                                <th>Form No</th>
                                <th>CUS ID</th>
                                <th>Customer Name</th>
                                <th>Exp Date</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Into Bank Account</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name = "bank_acc" id="bank_acc">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Date of Deposit</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" name ="date_of_deposit" id = "date_of_deposit">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Invoice Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <input type="number" class="form-control form-control-sm" name ="rec_amount" id = "rec_amount" value="0" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Deposit Type :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="deposit_type" id="deposit_type">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Receipt Date :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "receipt_date" id="receipt_date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Receipt no :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name = "receipt_no" id="receipt_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                            </div>
                        </div>
                    </div>
                    <div class="row optional">
                        <div class="col-sm-4 form-group">
                            <label for="">Cheque Date :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "cheque_date" id="cheque_date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Checque no :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name = "cheque_no" id="cheque_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Remarks</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <textarea type="text" id="amount_desc" name="amount_desc" rows="2" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Discount/Wave off</label>
                            <div class="input-group">
                                <input type="checkbox" name = "discount_check" id="discount_check">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Discount Amount</label>
                            <div class="input-group">
                                <input type="text" name = "discount_amount" id="discount_amount" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Discount Reason</label>
                            <div class="input-group">
                                <input type="text" name = "discount_reason" id="discount_reason" value="" class="form-control form-control-sm"  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group text-center">
                            <span id="amount_error" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-body">
                            <div class="modal-footer justify-content-between">  
                                <input type="hidden" value="" name="pay_entry_sale_id" id="pay_entry_sale_id">
                                <input type="hidden" value="" name="pay_entry_form_no" id="pay_entry_form_no">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                <button type="submit" class="btn btn-primary modal_pay_btn"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- schedule view Model -->
<div class="modal fade" id="exampleModelSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Schedule</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4" id="logo"></div>
                    <div class="col-8 text-right p-3" id="inv_title"></div>
                </div>
                <div class="row">
                    <div class="col-6 h6" id="inv-left-detail"></div>
                    <div class="col-2"></div>
                    <div class="col-4 text-right h6" id="inv-right-detail"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SR.No</th>
                                <th>Account Head</th>
                                <th>Due Amount</th>
                                <th>Issue Date</th>
                                <th>Paid Amount</th>
                                <th>Paid On</th>
                                <th>DS/DD No.</th>
                                <th>Out/Stand</th>
                                <th>Surcharge</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSchedule"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-schedule-challan"><i class="far fa-print text-info fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
<script type="text/javascript">
            
var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');

$(function () 
{
  $.validator.setDefaults({
    submitHandler: function () {
      // console.log( "Form successful submitted!" );
    }
  });
  $('#customer_pay_form').validate({
    rules: {
        bank_acc: {
            required: true,
        },
        date_of_deposit:{
            required:true,
        },
        amount_desc:{
            required:true,
        },
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

$('#example1').ready(function(){
    $("#ajax-loader").show();
    let table = $('#example1').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ],
        // "processing": true,
        // "serverSide": true,
        // "ajax": {
        //   url: 'api/sales/NewCustomerRegistration/ActionsHandler.php',
        //   type: 'POST',
        //   data: {action : 'index'},
        //   success: function(response){
        //     console.log(response);
        //   }
        // }
    });

    table.search('').draw(); //required after
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table.column(i).search( this.value ).draw();
            }
        });
    });

    $.ajax({
        url: 'api/sales/quarter_surcharge_payment_api.php',
        type: 'POST',
        data: {action: 'view'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
                var s_no = k++;
                var form_no = response[i].FORM_NO;
                var cus_id = response[i].CUS_ID;
                var cust_name = response[i].CUS_NAME;
                var cnic = response[i].CNIC_NO;
                var contact_no = response[i].CONTACT_NO;
                
                if(jQuery.inArray("402a5c_1", secF_dataArr) !== -1){
                    var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view 402a5c_1" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
                }
                if(jQuery.inArray("402a5c_2", secF_dataArr) !== -1){
                    var pay_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-pay 402a5c_2" title="Payment Entry"><i class="fas fa-money-bill-wave text-info fa-fw" ></i></button>';
                }
                var btn = pay_btn+schedule_btn;
                table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});


$("#example1").on('click','.btn-schedule-view',function(){
    $('#exampleSchedule').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            console.log(response);
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                logo = logo_d.replace('../', '');
                $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP : '+unit_category_name+'</p><p>NAME : '+cust_name+'</p><p>ADDRESS : '+address+'</p><p>PHONE NO : '+contact_no+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>APARTMENT DETAILS : PLOT</p></p><p>BLOCK : (USMAN)</p></p><p>ASF CITY KARACHI</p>');
                $('.btn-schedule-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_surcharge_amount = 0;
                var total_balance = 0;
                for (var i = 0; i < response.length; i++) {
                    var s_no = k++;
                    var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    var due_date = response[i].DUE_DATE;
                    var schedule_date = response[i].SCHEDULE_DATE;
                    var received_date = response[i].REC_DATE??''; 
                    var received_amount = response[i].RECEIVED_AMOUNT??'0';
                    var schedule_amount = response[i].SCHEDULE_AMOUNT;
                    function formatNumber (schedule_amount) {
                        return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var schedule_amounts=formatNumber(schedule_amount);
                    var received_amounts=formatNumber(received_amount);
                    var surcharge_amount = response[i].SURCHARGE_AMOUNT;
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
                    var total_surcharge_amounts=formatNumber(total_surcharge_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var balances=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    var total_balances=formatNumber(total_balance);
                    if(balance < 0){
                        $style = "color:red;";
                    }else{
                        $style = "";
                    }
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td><td style="text-align:right;color:red;">'+surcharge_amount+'</td></tr>');
                }
                    $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td><td style="text-align:right;color:red;">'+total_surcharge_amount+'</td></tr>');
                $('#exampleModelSchedule').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
$("#exampleModelSchedule").on('click','.btn-schedule-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_surcharge_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
});

// Payment Modes
$.ajax({
    url: 'api/sales/PaymentModes/ActionsHandler.php',
    type: 'POST',
    data: {action:'index'},
    dataType: "json",
    success: function(response){
        $('#deposit_type').empty();
        $.each(response.data, function(key, value){
            $('#deposit_type').append('<option value='+value["PAYMENT_MODE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
        });
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
});

$('#discount_check').click(function(){
    if($('input[name="discount_check"]').is(':checked'))
    {
        $('#discount_amount').removeAttr('readonly');
        $('#discount_reason').removeAttr('readonly');
    }else{
        $('#discount_amount').val('');
        $('#discount_reason').val('');
        $('#discount_amount').attr('readonly',true);
        $('#discount_reason').attr('readonly',true);
    }
});

// On change Payment Modes
$("#deposit_type").on("change", function() {
    if ($("#deposit_type").val() == 3) {
        $('#cheque_date').val('');
        $('#cheque_no').val('');
        $(".optional").hide();   
    }else{
        $(".optional").show();
    }
});


//function for payment open model
$("#example1").on('click','.btn-pay',function(){
    $('#rec_amount').val('0');
    $('#bank_acc').val('');
    $('#date_of_deposit').val('');
    // $('#deposit_type').val('');
    $('#receipt_date').val('');
    $('#receipt_no').val('');
    $('#cheque_date').val('');
    $('#cheque_no').val('');
    $('#amount_desc').val('');
    $('#discount_check').prop('checked',false);
    $('#discount_amount').val('');
    $('#discount_reason').val('');

    $('#amount_error').html('');
    var form_no = $(this).attr("data-id");
    let table = $('#inv_detail').DataTable({});
    $.ajax({
        url: 'api/sales/quarter_surcharge_payment_api.php',
        type: 'POST',
        data: {action: 'view_invoices',form_no:form_no},
        success: function(response){
            console.log(response);
            table.clear().draw();
            
            for (var i = 0; i < response.length; i++) {
                var pay_entry_sale_id = response[i].SALE_ID;
                $('#pay_entry_sale_id').val(pay_entry_sale_id);
                // append data in datatable
                    // j = i++;
                var s_no = '1';
                var form_no = response[i].FORM_NO;
                var cus_id = response[i].CUS_ID;
                var cust_name = response[i].CUS_NAME;
                var exp_date = response[i].EXPIRY_DATE;
                var inv_id = response[i].INV_ID;
                var inv_Amount = response[i].AMOUNT;
                // function formatNumber (inv_Amount) {
                //             return inv_Amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                // }
                // var inv_Amounts=formatNumber(inv_Amount);
                // console.log(inv_Amounts);
                var paid_status = response[i].PAID;
                var commission_status = response[i].COMMISSION_STATUS;
                var booking_detail_id = response[i].BOOKING_DETAIL_ID;
                var current_date = new Date();
                var current_date = moment(current_date).format("YYYY-MM-DD");
                var exp_date = moment(exp_date).format("YYYY-MM-DD");
                if(paid_status == 'Y'){
                    var checkbox = '<small class="badge badge-success">Paid</small>';
                }else{
                    var checkbox = '<input class="amount_checkbox" name="checkbox" type="checkbox" data-inv_id='+inv_id+' data-amount='+inv_Amount+' value='+booking_detail_id+'>';
                }
                table.row.add([s_no,inv_id,form_no,cus_id,cust_name,exp_date,inv_Amount,checkbox]);
            }
                
            table.draw();
            $('#pay_entry_form_no').val(form_no);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
    $('#exampleModalpay').modal('show');
    // bank account list
    $.ajax({
        url: 'api/sales/cus_booking_allotment_api.php',
        type:'POST',
        data: {action:'get_bank_acc'},
        success: function(response)
        {
            if(response)
            {
                for (var i=0; i<response.length; i++) {
                    $('#bank_acc').append($('<option>', { 
                        value: response[i].BANK_ID,
                        text : response[i].BANK_NAME
                    }));
                }
            }
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }
    });
});

//customer payment entry
$('#customer_pay_form').ready(function(e){
    $("#customer_pay_form").on('submit',(function(e) {
        $("#amount_error").text("");
        if ($(this).valid()) {
            var ck_box = $('#inv_detail input[name="checkbox"]:checked').length;
            if(ck_box < 1){
                $("#amount_error").text("please check at least one surcharge");
            }else{
                e.preventDefault();
                var formData = new FormData(this);
                var checkValues = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).val();
                }).get();
                var checkInvID = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).attr("data-inv_id");
                }).get();
                var checkamount = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).attr("data-amount");
                }).get();
                formData.append('booking_detail_id',checkValues);
                formData.append('inv_id',checkInvID);
                formData.append('amount',checkamount);
                formData.append('action','customer_payment_entry');
                $.ajax({
                    url: 'api/sales/quarter_surcharge_payment_api.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(response){
                        console.log(response);
                        var status = response.status;
                        var message = response.message;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                $.get('sale/cus_booking_allotment/quarter_paid_surcharge.php',function(data,status){
                                    $('#content').html(data);
                                    $('#exampleModalpay').modal('hide');
                                    $('#exampleModalpay input').trigger("reset");
                                    $('#customer_pay_form').trigger("reset");
                                    $(".modal-backdrop").remove();
                                    $('body').removeClass('modal-open');
                                });
                            },
                            error: function(e) 
                            {
                                console.log(e);
                                alert("Contact IT Department");
                            }   
                        })
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
            }
        }
    }));
});

$("#inv_detail").on('change','input:checkbox',function(){
    if($(this).is(':checked')){
        total = parseFloat($('#rec_amount').val()) + Number($(this).attr("data-amount"));
        console.log(total);
    } else {
        total = parseFloat($('#rec_amount').val()) - Number($(this).attr("data-amount"));
        console.log(total);
    }
    $('#rec_amount').val(total);
    console.log(total);
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#sale_breadcrumb").on("click", function() {
    $.get('sale/sale.php', function(data,status){
        $("#content").html(data);
    });
});
$("#surcharge_pay_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_surcharge_payment.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>