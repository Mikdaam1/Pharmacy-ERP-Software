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
            <h1>Generate Invoice In Reference Of Expired Invoice</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="expired_invoices_breadcrumb">Expired Invoices</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_main"> <i class="fas fa-tachometer-alt"></i></li>
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
                <form method="post" id="newCustomerChallanGenerateForm">
                    <?php include '../../display_message/display_message.php'?>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">FORM NO :</label>
                                <div class="input-group">
                                    <input value="" type="text" name = "form_no" id="form_no" class="form-control form-control-sm imp test" placeholder="Form no" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">OLD INVOICE NO :</label>
                                <input value="" type="text" name = "invoice_no" id="invoice_no" class="form-control form-control-sm imp test" placeholder="Invoice no" readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Amount :</label>
                                <div class="input-group">
                                    <input value="" type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "amount" id="amount" class="form-control form-control-sm imp test" placeholder="Invoice Amount" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">DUE DATE :</label>
                                <input value="" type="text" name="due_date" id="due_date" class="form-control form-control-sm imp test" readonly="true">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">EXPIRY DATE :</label>
                                <input value="" type="text" name="expiry_date" id="expiry_date" class="form-control form-control-sm imp test" readonly="true">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="exampleFormControlTextarea1">Remarks :<span style="color:red">*</span></label>
                                <select class="form-control form-control-sm" name="remarks" id="remarks"></select>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" id="add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
$(document).ready(function(){
    var customer_id = <?php echo $_GET['cus_formno']; ?>;

    // Get all Invoice Dates
    $.ajax({
        url: 'api/sales/InvoiceDates/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $("input[name='due_date']").val(response.data[0]['DUE_DATE']);
            $("input[name='expiry_date']").val(response.data[0]['EXPIRY_DATE']);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************

    $.ajax({
        url: 'api/sales/GetInvoice/ActionsHandler.php',
        type: 'POST',
        data: {action:'show',form_no:customer_id},
        dataType: "json",
        success: function(response) {
            $('#form_no').val(response.data[0].FORM_NO);
            $('#invoice_no').val(response.data[0].TRNO);
            $('#amount').val(response.data[0].AMOUNT);
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    });
    // Form Validations
    $(":input").inputmask();

    // remarks option
    $.ajax({
        url: 'api/sales/unpaid_customer_api.php',
        type: 'POST',
        data: {action:'exp_invoice_reasons'},
        dataType: "json",
        success: function(response){
            $('#remarks').empty();
            $.each(response, function(key, value){
                $('#remarks').append('<option value='+value["ID"]+'>'+value["DESCRIPTION"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
            }
        });
        $('#newCustomerChallanGenerateForm').validate({
            rules: {
                remarks: {
                    required: true
                }
            },
            messages: {
                remarks: {
                    required: "Field is required",
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
    // Generate Challan
    $("#newCustomerChallanGenerateForm").on("submit", function(e) {
        e.preventDefault();
        let request = $(this).serialize();
        let action = 'store';
        if ($("#newCustomerChallanGenerateForm").valid()) {
                $.ajax({
                url: 'api/sales/GetInvoice/ActionsHandler.php',
                type: 'POST',
                data: request + "&action="+action,
                success: function(response){
                    console.log(response);
                    $( '#newCustomerChallanGenerateForm' ).each(function(){
                        this.reset();
                    });
                    if(response)
                    {
                        var message = "Customer Invoice Generated Successfully"
                        var status = 1;

                        $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                            console.log(response);
                                $.get('sale/unpaid_customers.php',function(data,status){
                                    $('#content').html(data);

                                    $('#exampleModal').modal('hide');
                                    $('#exampleModal input').trigger("reset");
                                    $(".modal-backdrop").remove();
                                    $('body').removeClass('modal-open');
                                });
                        },
                        error: function(e) 
                        {
                            console.log(e);
                            alert("Contact IT Department");
                        }   
                        
                        });

                    }
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });   
        }
   });

   // Breadcrumbs
   $("#sale_breadcrumb").on("click", function () {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });

    $("#expired_invoices_breadcrumb").on("click", function () {
        $.get('sale/expired_invoices.php', function(data,status){
            $("#content").html(data);
        });
    });

});
</script>