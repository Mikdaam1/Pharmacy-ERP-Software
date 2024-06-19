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
              <h1>Existing Customer Registration</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="cnic_breadcrumb">Cnic</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"> <i class="fas fa-tachometer-alt"></i></li>
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
                        <form method="post" id="existingCustomerRegistrationForm">
                            <?php include '../display_message/display_message.php'?>
                            <input type="hidden" name="cus_id" id="cus_id">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Name :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name="cus_name" id="cus_name" class="form-control form-control-sm imp test" placeholder="Enter Customer Name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">SWD :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "swd" id="swd" class="form-control form-control-sm imp test" placeholder="Enter SWD Name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Primary Phone Number :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" name = "contact_no" id="pri_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Secondary Phone Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" name = "contact_no2" id="sec_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Email :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Date of Birth :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                        </div>
                                        <input type="text" name = "date_of_birth" id="dob" class="form-control form-control-sm" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Country :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <input type="text" name="country_id" id="country_id" class="form-control form-control-sm imp test" placeholder="Country Name" readonly="">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Province :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <input type="text" name="province_id" id="province_id" class="form-control form-control-sm imp test" readonly="">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">City :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input type="text" name="city_id" id="city_id" class="form-control form-control-sm imp test" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="exampleFormControlTextarea1">Address :<span style="color:red">*</span></label>
                                    <textarea pattern="[a-zA-Z0-9 ,._/#-]{1,}" class="form-control" name= "perm_add" id="address" rows="1" maxlength="255" readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                        <label for="">Unit Category :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-th-large"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "unit_type_id" id="unit_type_id">
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Campaign :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bullhorn"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "campaign_id" id="campaign_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Bank Accounts :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "bank_id" id="bank_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Registration Type :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-th-large"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "type_id" id="type_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Registration Type Listing :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "reg_type_id" id="reg_type_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                        <label for="">Amount :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                            </div>
                                            <input value="" type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "amount" id="amount" class="form-control form-control-sm imp test" readonly>
                                        </div>
                                    </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">DUE DATE :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input value="" type="text" name="due_date" id="due_date" class="form-control form-control-sm imp test" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">EXPIRY DATE :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                                        </div>
                                        <input value="" type="text" name="expiry_date" id="expiry_date" class="form-control form-control-sm imp test" readonly="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-11">
                                <!-- <h3 class="card-title">Language Records</h3> -->
                                </div>
                                <div class="col-sm-1">
                                    <div class="text-right">
                                    <button type="submit" id="add" class="btn btn-primary btn-block">Submit <i class="fas fa-arrow-right"></i></button>
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
$(document).ready(function () {
    var cnic = <?php echo $_GET['cnic_no'] ?>;

    // Form Validations

    $(":input").inputmask();


    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
        }
    });
        $('#existingCustomerRegistrationForm').validate({
            rules: {
                    cus_name: {
                        required: true,
                        minlength: 5
                    },
                    swd: {
                        required: true,
                        minlength: 5
                    },
                    contact_no: {
                        required: true
                        // number: true
                    },
                    contact_no2: {
                        required: true
                        // number: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    country_id: { 
                        required: true 
                    },
                    province_id: { 
                        required: true 
                    },
                    city_id: { 
                        required: true 
                    },
                    date_of_birth: { 
                        required: true,
                        date: true
                    },
                    campaign_id: { 
                        required: true 
                    },
                    unit_type_id: { 
                        required: true 
                    },
                    perm_add: {
                        required: true,
                        minlength: 20
                    },
                    bank_id: {
                        required: true
                    },
                    type_id: {
                        required: true,
                    },
                    reg_type_id: {
                        required: true
                    },
                    amount: {
                        required: true
                    },
                    due_date: {
                        required: true
                    },
                    expiry_date: {
                        required: true
                    }
                },

                messages: {
                    cus_name: {
                        minlength: "Name should be at least 5 characters"
                    },
                    swd: {
                        minlength: "Name should be at least 5 characters"
                    },
                    contact_no: {
                        minlength: "Phno should be at least 11 characters"
                    },
                    contact_no2: {
                        minlength: "Phno should be at least 11 characters"
                    },
                    email: {
                        required: "Field is required",
                        email: "email should ha valid format"
                    },
                    country_id: {
                        required: "Field is required",
                    },
                    province_id: {
                        required: "Field is required",
                    },
                    city_id: {
                        required: "Field is required",
                    },
                    date_of_birth: {
                        required: "Field is required",
                    },
                    campaign_id: {
                        required: "Field is required",
                    },
                    unit_type_id: {
                        required: "Field is required",
                    },
                    perm_add: {
                        required: "Field is required",
                    },
                    bank_id: {
                        required: "Field is required",
                    },
                    type_id: {
                        required: "Field is required",
                    },
                    reg_type_id: {
                        required: "Field is required",
                    },
                    amount: {
                        required: "Field is required"
                    },
                    due_date: {
                        required: "Field is required"
                    },
                    expiry_date: {
                        required: "Field is required"
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

    // Get all Marketing Campaigns
    $.ajax({
        url: 'api/sales/MarketingCampaign/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#campaign_id').empty();
            $('#campaign_id').append('<option value="0">--select--</option>');
            $.each(response.data, function(key, value){
                $('#campaign_id').append('<option value='+value["CAMPAIGN_ID"]+'>'+value["REMARKS"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************

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

    // Get all Active Unit Category
    $.ajax({
        url: 'api/sales/UnitCategory/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#unit_type_id').empty();
            $.each(response.data, function(key, value){
                $('#unit_type_id').append('<option value='+value["TYPE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************

    // Get all Active Bank Accounts
    $('#campaign_id').on('change', function() {
        var campaign_id = $(this).val();

        // Select Banks Of Given Campaign
        $.ajax({
            url: 'api/sales/BankAccounts/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index', campaign_id: campaign_id },
            dataType: "json",
            success: function(response){
                $('#bank_id').empty();
                $.each(response.data, function(key, value){
                    $('#bank_id').append('<option value='+value["BANK_ID"]+'>'+value["BANK_NAME"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });

        // Select Amount Of Given Camapign
        $.ajax({
            url: 'api/sales/Charges/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index', campaign_id: campaign_id},
            dataType: "json",
            success: function(response){
                if (response.success == false) {
                    $("input[name='amount']").val('');
                }else{
                    $("input[name='amount']").val(response.data[0]['AMOUNT']);
                }
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    })
    // *******************

    // Function of formating numbers
    function numberformat(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    // Get all Registrations Type
    $.ajax({
        url: 'api/sales/SalesSetups/Registration_Types/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#type_id').empty();
            $('#type_id').append('<option value=>Select Type</option>');
            $.each(response.data, function(key, value){
                $('#type_id').append('<option value='+value["ID"]+'>'+value["TYPE_NAME"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    // Get all Registrations Type 
    $("#type_id").change(function() {
        let type_id = $("#type_id").val();
        $.ajax({
            url: 'api/sales/SalesSetups/RegistrationTypes/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index'},
            dataType: "json",
            success: function(response){
                $('#reg_type_id').empty();
                $('#reg_type_id').append('<option value=>Select Type</option>');
                $.each(response.data, function(key, value){
                    if (value["TYPE_ID"] == type_id) {
                        $('#reg_type_id').append('<option value='+value["ID"]+'>'+value["BUSINESS_NAME"]+'</option>');   
                    }
                });
            },
            error: function(error){
                alert(error);
            }
        }); 
    });

    // Get Data
    $.ajax({
        url: 'api/sales/ExistingCustomerRegistration/ActionsHandler.php',
        type: 'POST',
        data: {action: 'show', cnic:cnic},
        dataType: "json",
        success: function(response){
            $("#cus_id").val(response.data[0].CUS_ID);
            $('#cus_name').val(response.data[0].CUS_NAME);
            $('#swd').val(response.data[0].SWD);
            $('#pri_contact_number').val(response.data[0].CONTACT_NO);
            $('#sec_contact_number').val(response.data[0].CONTACT_NO2);
            $('#email').val(response.data[0].EMAIL);
            $('#address').val(response.data[0].PERM_ADD);
            $('#country_id').val(response.data[0].COUNTRY_NAME);
            $('#province_id').val(response.data[0].PROVINCE_NAME);
            $('#city_id').val(response.data[0].CITY_NAME);
            $("#dob").val(response.data[0].DATE_OF_BIRTH);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // Submit Data
   $("#existingCustomerRegistrationForm").on("submit", function(e) {
    e.preventDefault();
       let request = $(this).serialize();
       let action = 'store';
            if ($("#existingCustomerRegistrationForm").valid()) {
                $("#add").css('pointer-events','none');
                // $("#add").find($(".fas")).removeClass('fa-arrow-right').addClass('fa spin fa-circle');
                $.ajax({
                    url: 'api/sales/ExistingCustomerRegistration/ActionsHandler.php',
                    type: 'POST',
                    dataType: "json",
                    data: request + "&action="+action,
                    success: function(response){
                        if(response)
                        {
                            console.log(response.data);
                            printChallan(response.data);
                            var message = "Customer Registered Successfully";
                            var status = 1;
                            $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
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
                        $( '#existingCustomerRegistrationForm' ).each(function(){
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

    //  Print Challan Fucntion 
    function printChallan(form_no) {
        let action = 'show';
        $.ajax({
            url: 'api/sales/GetInvoice/ActionsHandler.php',
            type: 'POST',
            data: "&action="+action + "&form_no="+form_no,
            dataType: "json",
            success: function(response){
                let invoice_url = "invoicereports/customer_registration_challan_api.php?action=invoice_generate&tr_no="+response.data[0].TRNO;
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
    $("#sale_breadcrumb").on("click", function() {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#cnic_breadcrumb").on("click", function() {
        $.get('sale/customer_reg_cnic.php', function(data,status){
            $("#content").html(data);
        });
    });
    
});
</script>