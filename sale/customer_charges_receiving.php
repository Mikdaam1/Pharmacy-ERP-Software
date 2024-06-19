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
              <h1>Registration Receiving</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="unpaid_reg_breadcrumb">Unpaid Registerations</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
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
                <div class="card-header">
                <?php include '../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h3 class="card-title">Registration: <b><span id="cus_reg"></span></b></h3>
                    </div>
                    <div class="col-sm-3">
                      <h3 class="card-title">Name: <b><span id="cus_name"></span></b></h3>
                    </div>
                    <div class="col-sm-3">
                      <h3 class="card-title">Project: <b><span id="cus_project"></span></b></h3>
                    </div>
                    <div class="col-sm-3">
                      <h3 class="card-title">Invoice: <b><span id="cus_invoice"></span></b></h3>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">REG No :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "reg_no" id="reg_no" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Customer No :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "cus_no" id="cus_no" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Customer Name :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name = "name" id="name" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Contact No :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name = "contact" id="contact" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">CNIC No :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                </div>
                                <input type="text" name = "cnic" id="cnic" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Unit Type :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <input type="text" name = "unit_type" id="unit_type" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Country :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <input type="text" id="country" name="country" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Province :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <input type="text" id="province" name="province" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">City :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <input type="text" id="city" name="city" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Project :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="text" name = "project" id="project" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Campaign :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <input type="text" name = "campaign" id="campaign" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Permanent Address :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                </div>
                                <textarea type="text" id="perm_address" name="perm_address" rows="2" class="form-control form-control-sm" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Reveving Form -->
                    <form method="post" id="customerRegistrationRecevingForm">
                        <?php include '../display_message/display_message.php'?>
                        <input type="hidden" id="form_no" name="form_no" value="">
                        <input type="hidden" id="bank_id" name="bank_id" value="">
                        <input type="hidden" id="invoice_no" name="invoice_no" value="">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Amount :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <input value="" type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "amount" id="amount" class="form-control form-control-sm imp test" placeholder="Enter Customer Name" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">DUE DATE:</label>
                                <input value="" type="text" name="due_date" id="due_date" class="form-control form-control-sm imp test" readonly="true">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">EXPIRY DATE:</label>
                                <input value="" type="text" name="expiry_date" id="expiry_date" class="form-control form-control-sm imp test" readonly="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Bank Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <input value="" type="text"  name = "bank" id="bank" class="form-control form-control-sm imp test" placeholder="Enter Customer Name" readonly>
                                </div>
                            </div>
                            <div class="col-sm-8 form-group">
                                <label for="">Remarks :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                    </div>
                                    <textarea minlength="5" maxlength="250" type="text" id="receiving_remarks" name="receiving_remarks" rows="2" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Bank Type :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name="bank_type" id="bank_type">
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
                            <div class="col-sm-4 form-group optional">
                                <label for="">Checque no :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="number" name = "cheaque_no" id="cheaque_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                                </div>
                            </div>
                        </div>
                        <div class="row optional">
                            <div class="col-sm-4 form-group">
                                <label for="">Drawn On Bank :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name="drawn_on_bank" id="drawn_on_bank">
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-11">
                            <!-- <h3 class="card-title">Language Records</h3> -->
                            </div>
                            <div class="col-sm-1">
                                <div class="text-right">
                                <button type="submit" id="add" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
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
<script>


$(function () {
    $.validator.setDefaults({
            submitHandler: function () {
        }
    });
    $('#customerRegistrationRecevingForm').validate({
        rules: {
            receipt_date: { 
                required: true,
                date: true
            }
        },

        messages: {
            receipt_date: {
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
//tab1
$(document).ready(function(){
    var cust_form_no = <?php echo $_GET['cus_formno']; ?>;

    $.ajax({
        url: 'api/sales/UnpaidCustomerRegistration/ActionsHandler.php',
        type:'POST',
        dataType: "json",
        data:{action:'show',customer_formno:cust_form_no},
        success: function(response) {
            $('#cus_reg').text(response.data.FORM_NO);
            $('#cus_name').text(response.data.CUS_NAME);
            $('#cus_project').text(response.data.PARTICULARS);
            $('#cus_invoice').text(response.data.TRNO);

            $('#reg_no').val(response.data.FORM_NO);
            $('#cus_no').val(response.data.CUS_ID);
            $('#name').val(response.data.CUS_NAME);
            $('#contact').val(response.data.CONTACT_NO);
            $('#cnic').val(response.data.CNIC_NO);
            $('#perm_address').text(response.data.PERM_ADD);
            $('#country').val(response.data.COUNTRY_NAME);
            $('#province').val(response.data.PROVINCE_NAME);
            $('#city').val(response.data.CITY_NAME);
            $('#project').val(response.data.PARTICULARS);
            $('#campaign').val(response.data.REMARKS);
            $('#unit_type').val(response.data.DESCRIPTION);
            
            $("#form_no").val(response.data.FORM_NO);
            $('#bank_id').val(response.data.BANK_ID);
            $('#invoice_no').val(response.data.TRNO);
            $('#amount').val(response.data.AMOUNT);
            $("#bank").val(response.data.BANK_NAME);
            $('#due_date').val(response.data.DUE_DATE);
            $('#expiry_date').val(response.data.EXPIRE_DATE);

            let expiry_date = response.data.EXPIRE_DATE;
            let current_date = getCurrentDate();
            var form=response.data.FORM_NO;
            var duedate = response.data.DUE_DATE;
            var C_DUE_DATE = moment(duedate).format("YYYY-MM-DD");
            var expdate = response.data.EXPIRE_DATE;
            var C_EXPIRY_DATE = moment(expdate).format("YYYY-MM-DD");
            $('#receipt_date').attr('min',C_DUE_DATE);
            $('#receipt_date').attr('max',C_EXPIRY_DATE);

            // if (expiry_date.localeCompare(current_date) != 1) {
            //     $("#receipt_date").prop('disabled','true');
            //     $("#receipt_no").prop('disabled','true');
            //     $("#receiving_remarks").prop('disabled','true');
            //     $("#add").prop('disabled','true');
            // }

            
            $.ajax({
                url: 'api/sales/unpaid_customer_api.php',
                type:'POST',
                data: {action:'get_bank',form:form},
                success: function(response)
                {
                    if(response)
                    {
                        for (var i=0; i<response.length; i++) {
                            $('#drawn_on_bank').append($('<option>', { 
                                value: response[i].BANK_ID,
                                text : response[i].BANK_NAME
                            }));
                        }
                        // $('#bank_acc').val(BANK_NAME)
                    }
                },
                error: function(e) 
                {
                console.log(e);
                alert("Contact IT Department");
                }
            });

        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    });

    // Validate Form Data
    $(":input").inputmask();


    // RECEIVING
    $("#customerRegistrationRecevingForm").on("submit", function(e) {
        e.preventDefault();
        let request = $(this).serialize();
        let invoice_no = $("#invoice_no").val();
        let form_no = $("#form_no").val();
        let action = 'store';
        if ($("#customerRegistrationRecevingForm").valid()) {
            $("#add").css('pointer-events','none');
            $("#add").find($(".fas")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
            $("#ajax-loader").show();
            $.ajax({
                url: 'api/sales/UnpaidCustomerRegistration/ActionsHandler.php',
                type: 'POST',
                datatype: "json",
                data: request + "&action="+action,
                success: function(response){
                    if(response)
                    {
                        $("#ajax-loader").hide();
                        paymentReceipt(form_no);
                        var message = "Customer Payment Received Successfully"
                        var status = 1;

                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                    $.get('sale/paid_customer.php',function(data,status){
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
                    $( '#customerRegistrationRecevingForm' ).each(function(){
                        this.reset();
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        }
   });

    //Get Current Date
    function getCurrentDate() {
        var months = ['JAN','FEB','MAR','APR','MAY','JUN','JULY','AUG','SEP','OCT','NOV','DEC'];
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(months[today.getMonth()]);
        var yyyy = today.getFullYear();
        today = dd + '-' + mm + '-' + yyyy;
        return today;
    }

    // Selected Dates Open Only
    var availableDates = ["9-5-2021","14-5-2021","15-5-2021"];

    function available(date) {
        dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
        console.log(dmy+' : '+($.inArray(dmy, availableDates)));
        if ($.inArray(dmy, availableDates) != -1) {
            return [true, "","Available"];
        } else {
            return [false,"","unAvailable"];
        }
    }

    // $("#receipt_date").datepicker({ afterShowDay: available });
    // Payment Modes
    $.ajax({
        url: 'api/sales/PaymentModes/ActionsHandler.php',
        type: 'POST',
        data: {action:'index'},
        dataType: "json",
        success: function(response){
            $('#bank_type').empty();
            $.each(response.data, function(key, value){
                $('#bank_type').append('<option value='+value["PAYMENT_MODE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    // On change Payment Modes
    $("#bank_type").on("change", function() {
        if ($("#bank_type").val() == 3) {
            $(".optional").hide();   
        }else{
            $(".optional").show();
        }
    });
    // Payment Receipt

    function paymentReceipt(form_no) {
        let action = 'show';
        $.ajax({
            url: 'api/sales/GetInvoice/ActionsHandler.php',
            type: 'POST',
            data: "&action="+action + "&form_no="+form_no,
            dataType: "json",
            success: function(response){
                console.log(response);
            // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
            let invoice_url = "invoicereports/reg_payment_receipt.php?action=receipt_generate&invoice_no="+response.data[0].TRNO;
            window.open(invoice_url, '_blank');
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }

    // Breadcrumbs
    $("#sale_breadcrumb").on("click", function () {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });

    $("#unpaid_reg_breadcrumb").on("click", function () {
        $.get('sale/unpaid_customers.php', function(data,status){
            $("#content").html(data);
        }); 
    });

});
</script>
<?php include '../includes/loader.php'?>