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
              <h1>Customer Receiving</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="unpaid_breadcrumb">Unpaid</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="allottee_to_allottee_breadcrumb">Allottee To Allottee</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
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
                <?php include '../../display_message/display_message.php'?>
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
                    <!-- <h4>Custom Content Below</h4> -->
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
                                        <textarea type="text" id="receiving_remarks" name="receiving_remarks" rows="2" class="form-control form-control-sm"></textarea>
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
                                    <label for="">Payment Date :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                        </div>
                                        <input type="date" name = "receipt_date" id="receipt_date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Payment no :<span style="color:red">*</span></label>
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
                                    <label for="">Cheaque Date :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                        </div>
                                        <input type="date" name = "cheaque_date" id="cheaque_date" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Checque no :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" name = "cheaque_no" id="cheaque_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Drawn On Bank :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        </div>
                                        <input type="text" name = "drawn_on_bank" id="drawn_on_bank" placeholder="bank name / branch" value="" class="form-control form-control-sm" inputmode="text">
                                    </div>
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
            receipt_no: {
                required: true,
            },
            receipt_date: { 
                required: true,
                date: true
            },
            receiving_remarks: {
                required: true,
                minlength: 20
            }
        },

        messages: {
            receipt_no: {
                required: "Field is required",
            },
            receipt_date: {
                required: "Field is required",
            },
            receiving_remarks: {
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
    var customer_formno = <?php echo $_GET['cus_formno']; ?>;
    $("#ajax-loader").show();
    $.ajax({
        url: 'api/sales/transfer_unpaid_registration_api.php',
        type:'POST',
        dataType: "json",
        data:{action:'receiving_data',customer_formno:customer_formno},
        success: function(response) {
            console.log(response);
            $('#cus_reg').text(response.FORM_NO);
            $('#cus_name').text(response.CUS_NAME);
            $('#cus_project').text(response.PARTICULARS);
            $('#cus_invoice').text(response.TRNO);

            $('#reg_no').val(response.FORM_NO);
            $('#cus_no').val(response.CUS_ID);
            $('#name').val(response.CUS_NAME);
            $('#contact').val(response.CONTACT_NO);
            $('#cnic').val(response.CNIC_NO);
            $('#perm_address').text(response.PERM_ADD);
            $('#country').val(response.COUNTRY_NAME);
            $('#province').val(response.PROVINCE_NAME);
            $('#city').val(response.CITY_NAME);
            $('#project').val(response.PARTICULARS);
            $('#campaign').val(response.REMARKS);
            $('#unit_type').val(response.DESCRIPTION);
            
            $("#form_no").val(response.FORM_NO);
            $('#bank_id').val(response.BANK_ID);
            $('#invoice_no').val(response.TRNO);
            $('#amount').val(response.AMOUNT);
            $("#bank").val(response.BANK_NAME);
            $('#due_date').val(response.DUE_DATE);
            $('#expiry_date').val(response.EXPIRY_DATE);
            
            $("#ajax-loader").hide();

            // if (expiry_date.localeCompare(current_date) != 1) {
            //     $("#receipt_date").prop('disabled','true');
            //     $("#receipt_no").prop('disabled','true');
            //     $("#receiving_remarks").prop('disabled','true');
            //     $("#add").prop('disabled','true');
            // }

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
        let action = 'receiving_data_store';
        if ($("#customerRegistrationRecevingForm").valid()) {
          $("#add").css('pointer-events','none');
            $("#ajax-loader").show();
            $.ajax({
                url: 'api/sales/transfer_unpaid_registration_api.php',
                type: 'POST',
                datatype: "json",
                data: request + "&action="+action,
                success: function(response){
                    $("#ajax-loader").hide();
                    if(response)
                    {
                        paymentReceipt(form_no);
                        var message = "Customer Payment Received Successfully"
                        var status = 1;

                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                    $.get('sale/transfer/transfer_paid_customers.php',function(data,status){
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
          $("#add").css('pointer-events','');
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
        let action = 'get_invoice';
        $.ajax({
            url: 'api/sales/transfer_customer_registration_api.php',
            type: 'POST',
            data: "&action="+action + "&form_no="+form_no,
            dataType: "json",
            success: function(response){
                console.log(response);
                let invoice_url = "invoicereports/transfer_payment_reciept.php?action=receipt_generate&invoice_no="+response.TRNO;
                window.open(invoice_url, '_blank');
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }


    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#allottee_to_allottee_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#unpaid_breadcrumb").on("click", function() {
        $.get('sale/transfer/transfer_unpaid_customers.php', function(data,status){
            $("#content").html(data);
        });
    });

});


</script>
<?php include '../../includes/loader.php'?>