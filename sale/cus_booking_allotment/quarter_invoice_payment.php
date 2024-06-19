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
            <h1>Quarter Invoice Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_inv_pay_breadcrumb">Quarter Payment Invoices</button></li>
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
                      <h3 class="card-title">Quarter Invoice Record</h3>
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
                        <th>Amount</th>
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
                        <div class="col-sm-3 form-group text-center">
                            <label for="">Total Amount</label>
                            <div id="total_amount"></div>
                        </div>
                        <div class="col-sm-1 form-group text-center">
                            <label for=""></label>
                            <div><h1>-</h1></div>
                        </div>
                        <div class="col-sm-3 form-group text-center">
                            <label for="">Total Received Amount</label>
                            <div id="total_received_amount"></div>
                        </div>
                        <div class="col-sm-1 form-group text-center">
                            <label for=""></label>
                            <div><h1>=</h1></div>
                        </div>
                        <div class="col-sm-4 form-group text-center">
                            <label for="">Total Due Amount</label>
                            <div id="total_due_amount"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Into Bank Account :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name = "bank_acc" id="bank_acc">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Date of Deposit :<span style="color:red">*</span></label>
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
                            <label for="">Deposit Type</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="deposit_type" id="deposit_type">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Payment Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "receipt_date" id="receipt_date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Payment no</label>
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
                            <label for="">Cheque Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "cheque_date" id="cheque_date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Checque no</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name = "cheque_no" id="cheque_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Remarks :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                </div>
                                <textarea type="text" id="amount_desc" name="amount_desc" rows="1" class="form-control form-control-sm"></textarea>
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
        url: 'api/sales/quarter_invoice_payment_api.php',
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
                var amount = response[i].AMOUNT;
                
                if(jQuery.inArray("402a4f_1", secF_dataArr) !== -1){
                    var pay_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-pay 402a4f_1" title="Payment Entry"><i class="fas fa-money-bill-wave text-info fa-fw" ></i></button>';
                }
                var btn = pay_btn;
                table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,amount,btn]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
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
    $('#amount_error').html('');
    var form_no = $(this).attr("data-id");
    
    $.ajax({
        url: 'api/sales/quarter_invoice_payment_api.php',
        type: 'POST',
        data: {action: 'view_pay',form_no:form_no},
        success: function(response){
            if(response.status == 0){
                alert(response.message);
            }else{
                console.log(response);
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var total_amount = parseInt(response['TOTAL_AMOUNT']);
                console.log(total_amount);
                function formatNumber (total_amount) {
                        return total_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                }
                var total_amounts=formatNumber(total_amount);
                var received_amount = parseInt(response['RECEIVED']) > 0 ? parseInt(response['RECEIVED']) : 0 ;
                console.log(received_amount);
                var received_amounts=formatNumber(received_amount);
                $('#total_amount').html('<h3>'+total_amounts+'</h3>');
                $('#total_received_amount').html('<h3>'+received_amounts+'</h3>');
                var total_due_amount = total_amount - received_amount;
                var total_due_amounts=formatNumber(total_amount);
                $('#total_due_amount').html('<h3>'+total_due_amounts+'</h3>');
                
                let table = $('#inv_detail').DataTable({
                });
                $.ajax({
                    url: 'api/sales/quarter_invoice_payment_api.php',
                    type: 'POST',
                    data: {action: 'view_invoices',form_no:form_no},
                    success: function(response){
                        table.clear().draw();
                        var pay_entry_sale_id = response.SALE_ID;
                        $('#pay_entry_sale_id').val(pay_entry_sale_id);
                        // append data in datatable
                        var form_no = response.FORM_NO;
                        var cus_id = response.CUS_ID;
                        var cust_name = response.CUS_NAME;
                        var exp_date = response.EXPIRY_DATE;
                        var inv_id = response.INV_ID;
                        var charges_id = response.CHARGES_ID_DESC;
                        var booking_detail_id = response.BOOKING_DETAIL_ID;
                        var inv_Amount = response.AMOUNT;
                        var inv_Amounts=formatNumber(inv_Amount);
                        var paid_status = response.PAID;
                        var commission_status = response.COMMISSION_STATUS;
                        var current_date = new Date();
                        var current_date = moment(current_date).format("YYYY-MM-DD");
                        var exp_date = moment(exp_date).format("YYYY-MM-DD");
                        if(paid_status == 'Y'){
                            var checkbox = '<small class="badge badge-success">Paid</small>';
                        }else{
                            var checkbox = '<input class="amount_checkbox" name="checkbox" type="checkbox" data-inv_id='+inv_id+' data-amount='+inv_Amount+' value='+booking_detail_id+'>';
                        }
                        table.row.add([inv_id,form_no,cus_id,cust_name,exp_date,inv_Amounts,checkbox]);
                            
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
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
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

//customer payment entry
$('#customer_pay_form').ready(function(e){
    $("#customer_pay_form").on('submit',(function(e) {
        $("#amount_error").text("");
        if ($(this).valid()) {
            
            var ck_box = $('#inv_detail input[name="checkbox"]:checked').length;
            if(ck_box < 1){
                $("#amount_error").text("please check at least one invoice");
            }else{
            
                $('.modal_pay_btn').css('pointer-events','none');
                $('.modal_pay_btn').find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
                
                e.preventDefault();
                var formData = new FormData(this);
                var checkInvID = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).attr("data-inv_id");
                }).get();
                formData.append('check_inv_id',checkInvID);
                formData.append('action','customer_payment_entry');
                $.ajax({
                    url: 'api/sales/quarter_invoice_payment_api.php',
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
                                $.get('sale/cus_booking_allotment/quarter_paid_invoices.php',function(data,status){
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
    
    $(".modal_u_btn").css('pointer-events','');
    $(".modal_u_btn").find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
});

$("#inv_detail").on('change','input:checkbox',function(){
    if($(this).is(':checked')){
        total = parseFloat($('#rec_amount').val()) + Number($(this).attr("data-amount"));
    } else {
        total = parseFloat($('#rec_amount').val()) - Number($(this).attr("data-amount"));
        console.log(total);
    }
    $('#rec_amount').val(total);
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
$("#quarter_inv_pay_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_invoice_payment.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>