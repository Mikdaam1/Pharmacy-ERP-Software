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
              <h1>Customer Registration</h1>
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
                    <div class="card-body">
                        <form method="post" id="customerInfoChangeForm">
                            <?php include '../display_message/display_message.php'?>
                            <input type="hidden" name="form_no" id="form_no" value="">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Name :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name="cus_name" id="cus_name" class="form-control form-control-sm imp test" placeholder="Enter Customer Name">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">SWD :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "swd" id="swd" class="form-control form-control-sm imp test" placeholder="Enter SWD Name">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Primary Phone Number :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name = "contact_no" id="pri_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Secondary Phone Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name = "contact_no2" id="sec_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">CNIC Number :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                        <input type="text" name = "cnic_no" id="cnic_number" placeholder="xxxxx-xxxxxxx-x" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Email :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address">
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
                                        <select class="form-control form-control-sm" name="country_id" id="country_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Province :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "province_id" id="province_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">City :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "city_id" id="city_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Date of Birth :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                        </div>
                                        <input type="date" name = "date_of_birth" id="date_of_birth" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Campaign :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "campaign_id" id="campaign_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Unit Category :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "unit_type_id" id="unit_type_id">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Bank Accounts :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                        </div>
                                        <select class="form-control form-control-sm" name = "bank_id" id="bank_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="exampleFormControlTextarea1">Address :<span style="color:red">*</span></label>
                                    <textarea pattern="[a-zA-Z0-9 ,._/#-]{1,}" class="form-control" name= "perm_add" id="perm_add" rows="1" maxlength="255"></textarea>
                                </div>
                            </div>
                        <div class="text-right">
                            <input type="submit" id="add" class="btn btn-primary" disabled>
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

    // Get all countries
    $.ajax({
        url: 'api/sales/Countries/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#country_id').empty();
            $.each(response.data, function(key, value){
                $('#country_id').append('<option value='+value["COUNTRY_ID"]+'>'+value["COUNTRY_DESC"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************

    // Get all Provinces on change
    $("#country_id").on("change", function() {
        let country_id = $(this).val();
        $.ajax({
            url: 'api/sales/Provinces/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index',country_id:country_id},
            dataType: "json",
            success: function(response){
                $('#province_id').empty();
                $.each(response.data, function(key, value){
                    $('#province_id').append('<option value='+value["PROVINCE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
                });
                // List all cities Related To First Province
                let province_id = response.data[0].PROVINCE_ID;
                $.ajax({
                    url: 'api/sales/Cities/ActionsHandler.php',
                    type: 'POST',
                    data: {action: 'index', province_id:province_id},
                    dataType: "json",
                    success: function(response){
                        $('#city_id').empty();
                        $.each(response.data, function(key, value){
                            $('#city_id').append('<option value='+value["CITY_ID"]+'>'+value["CITY_NAME"]+'</option>');
                        });
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
    });
    // *******************

    // Get all Cities
    $("#province_id").on("change", function() {
        let province_id = $(this).val();
        $.ajax({
            url: 'api/sales/Cities/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index', province_id:province_id},
            dataType: "json",
            success: function(response){
                $('#city_id').empty();
                $.each(response.data, function(key, value){
                    $('#city_id').append('<option value='+value["CITY_ID"]+'>'+value["CITY_NAME"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
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

    // Get all Active Bank Accounts on campaign change
    $('#campaign_id').on('change', function() {
        var campaign_id = $(this).val();
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
    })
    // *******************

    // Get all Charges
    // $.ajax({
    //     url: 'api/sales/Charges/ActionsHandler.php',
    //     type: 'POST',
    //     data: {action: 'index'},
    //     dataType: "json",
    //     success: function(response){
    //         $("input[name='amount']").val(response.data[0]['AMOUNT']);
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // });
    // *******************

    var customer_id = <?php echo $_GET['cus_formno']; ?>;

    
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
            console.log();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************

    // Get Selected Customer Info
    $.ajax({
        url: 'api/sales/UnpaidCustomerRegistration/ActionsHandler.php',
        type:'POST',
        dataType: "json",
        data:{action:'show',customer_formno:customer_id},
        success: function(response) {

            // Get all Active Bank Accounts
            var campaign_id = response.data.CAMPAIGN_ID;
            $.ajax({
                url: 'api/sales/BankAccounts/ActionsHandler.php',
                type: 'POST',
                data: {action:'index',campaign_id:campaign_id},
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
            // *******************

            let province_id = response.data.PROVINCE_ID;
            console.log(province_id);
            // Get all Provinces Related To First country
            var res_country_id = response.data.COUNTRY_ID;
            $.ajax({
                url: 'api/sales/Provinces/ActionsHandler.php',
                type: 'POST',
                data: {action: 'index',country_id:res_country_id},
                dataType: "json",
                success: function(response){
                    $('#province_id').empty();
                    $.each(response.data, function(key, value){
                        $('#province_id').append('<option value='+value["PROVINCE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // *******************

            // List all cities Related To First Province
            $.ajax({
                url: 'api/sales/Cities/ActionsHandler.php',
                type: 'POST',
                data: {action: 'index', province_id:province_id},
                dataType: "json",
                success: function(response){
                    $('#city_id').empty();
                    $.each(response.data, function(key, value){
                        $('#city_id').append('<option value='+value["CITY_ID"]+'>'+value["CITY_NAME"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            // *******************

            var dob = moment(response.data.DATE_OF_BIRTH).format("YYYY-MM-DD");
            $('#form_no').val(response.data.FORMNO);
            $('#cus_name').val(response.data.CUS_NAME);
            $('#swd').val(response.data.SWD);
            $('#pri_contact_number').val(response.data.CONTACT_NO);
            $('#sec_contact_number').val(response.data.CONTACT_NO2);
            $('#cnic_number').val(response.data.CNIC_NO);
            $('#email').val(response.data.EMAIL);
            $('#country_id option[value='+response.data.COUNTRY_ID+']').prop('selected', true);
            $('#province_id option[value='+response.data.PROVINCE_ID+']').prop('selected', true);
            $('#city_id option[value='+response.data.CITY_ID+']').prop('selected', true);
            $('#date_of_birth').val(dob);
            $('#campaign_id option[value='+response.data.CAMPAIGN_ID+']').prop('selected', true);
            $('#unit_type_id option[value='+response.data.UNIT_CATEGORY_ID+']').prop('selected', true);
            $('#bank_id option[value='+response.data.BANK_ID+']').prop('selected', true);
            $('#amount').val(response.data.AMOUNT);
            $('#perm_add').text(response.data.PERM_ADD);
            $('#due_date').val(response.data.DUE_DATE);
            $('#expiry_date').val(response.data.EXPIRY_DATE);
            
            
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    });

    // Form Validations
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
        }
    });
        $('#customerInfoChangeForm').validate({
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
                    cnic_no: {
                        required: true,
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
                    cnic_no: {
                        minlength: "Cnic should be at least 13 characters"
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
    // Update Data On Submit
    $("#customerInfoChangeForm").on("submit", function(e) {
    e.preventDefault();
       let request = $(this).serialize();
       let action = 'update';
            if ($("#customerInfoChangeForm").valid()) {
                $.ajax({
                url: 'api/sales/NewCustomerRegistration/ActionsHandler.php',
                type: 'POST',
                data: request + "&action="+action,
                success: function(response){
                    if(response)
                    {
                        var message = "Customer Info Updated Successfully";
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
                    $( '#customerInfoChangeForm' ).each(function(){
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