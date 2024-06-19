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
              <h1>Marketing Firm Registration</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="marketing_breadcrumb">Narketing</button></li>
                <!-- <li class="breadcrumb-item"><button class="btn btn-sm" id="marketing_list_breadcrumb">Marketing List</button></li> -->
                <li class="breadcrumb-item"><button class="btn btn-sm" id="sales_setup_breadcrumb">Sales Setup</button></li>
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
                            <div class="card-body">
                                <form method="post" id="sale_ASFFMarketingFirmRegistrationForm">
                                    <?php include '../../display_message/display_message.php'?>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">First Name :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name="FIRST_NAME" id="FIRST_NAME" class="form-control form-control-sm imp test" placeholder="Enter First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Last Name :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "LAST_NAME" id="LAST_NAME" class="form-control form-control-sm imp test" placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Business Name :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "BUSINESS_NAME" id="BUSINESS_NAME" placeholder="Enter Business Name" value="" class="form-control form-control-sm" inputmode="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">Primary Phone Number :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="number" name = "CONTACT_NO" id="CONTACT_NO" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Email :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                                </div>
                                                <input type="email" id="EMAIL" name="EMAIL" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder = "Enter Email Address" title="Enter Valid Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Company Website :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "COMPANY_WEBSITE" id="COMPANY_WEBSITE" placeholder="Enter Website Url" value="" class="form-control form-control-sm" inputmode="text">
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
                                                <select class="form-control form-control-sm" name="COUNTRY_ID" id="COUNTRY_ID">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Province :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm" name = "PROVINCE_ID" id="PROVINCE_ID">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">City :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <select class="form-control form-control-sm" name = "CITY_ID" id="CITY_ID">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">Zip Code :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "ZIP_CODE" id="ZIP_CODE" placeholder="Enter Zip Code" class="form-control form-control-sm" inputmode="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">NTN :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "NTN" id="NTN" placeholder="Enter NTN" class="form-control form-control-sm" inputmode="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">COMMISSION :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "COMMISSION" id="COMMISSION" placeholder="Enter Commission AMount" class="form-control form-control-sm" inputmode="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">COMMISSION TYPE:<span style="color:red">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="COMMISSION_PERCENT" name="COMMISSION_PERCENT_AMOUNT" value="percent">Percent
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="COMMISSION_AMOUNT" name="COMMISSION_PERCENT_AMOUNT" value="amount">Amount
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="exampleFormControlTextarea1">Address :<span style="color:red">*</span></label>
                                            <textarea pattern="[a-zA-Z0-9 ,._/#-]{1,}" class="form-control" name= "ADDRESS" id="ADDRESS" rows="1" maxlength="255" placeholder="Enter Address" ></textarea>
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
<script>
$(document).ready(function(){
    // Get all countries
    $.ajax({
        url: 'api/sales/Countries/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            let country_id = response.data[0].COUNTRY_ID;
            $('#COUNTRY_ID').empty();
            $('#COUNTRY_ID').append('<option value=>Select Country</option>');
            $.each(response.data, function(key, value){
                $('#COUNTRY_ID').append('<option value='+value["COUNTRY_ID"]+'>'+value["COUNTRY_DESC"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *******************
    // Get all Provinces
    $("#COUNTRY_ID").on("change", function() {
        let country_id = $(this).val();
        $('#PROVINCE_ID').empty();
        $('#city_id').empty();
        $.ajax({
            url: 'api/sales/Provinces/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index',country_id:country_id},
            dataType: "json",
            success: function(response){
                $.each(response.data, function(key, value){
                    $('#PROVINCE_ID').append('<option value='+value["PROVINCE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
                });
                // List all cities Related To First Province
                let province_id = response.data[0].PROVINCE_ID;
                $.ajax({
                    url: 'api/sales/Cities/ActionsHandler.php',
                    type: 'POST',
                    data: {action: 'index', province_id:province_id},
                    dataType: "json",
                    success: function(response){
                        $.each(response.data, function(key, value){
                            $('#CITY_ID').append('<option value='+value["CITY_ID"]+'>'+value["CITY_NAME"]+'</option>');
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
    $("#PROVINCE_ID").on("change", function() {
        let province_id = $(this).val();
        $('#CITY_ID').empty();
        $.ajax({
            url: 'api/sales/Cities/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index', province_id:province_id},
            dataType: "json",
            success: function(response){
                $.each(response.data, function(key, value){
                    $('#CITY_ID').append('<option value='+value["CITY_ID"]+'>'+value["CITY_NAME"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
    });
    // *******************
    // Get all Registrations Type
    $.ajax({
        url: 'api/sales/SalesSetups/Registration_Types/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#TYPE_ID').empty();
            $('#TYPE_ID').append('<option value=>Select Type</option>');
            $.each(response.data, function(key, value){
                $('#TYPE_ID').append('<option value='+value["ID"]+'>'+value["TYPE_NAME"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // Submit Land Provider Data
    $("#sale_ASFFMarketingFirmRegistrationForm").on('submit',function(e){
        e.preventDefault();
        let request = $(this).serialize();
        let action = 'store';
        $.ajax({
                url: 'api/sales/SalesSetups/MarketingFirmRegistration/ActionsHandler.php',
                type: 'POST',
                dataType: "json",
                data: request + "&action="+action,
                success: function(response){
                    if(response)
                    {
                        var message = "ASFF Marketing Firm Successfully";
                        var status = 1;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                    $.get('sale/sales_setup/Sale_ASFF_Marketing_Firm_Listing.php',function(data,status){
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
                    $( '#sale_ASFFMarketingFirmRegistrationForm' ).each(function(){
                        this.reset();
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
    });
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
// $('#marketing_list_breadcrumb').click(function(){
//     $.get('sale/sales_setup/Sale_ASFF_Marketing_Firm_Listing.php', function(data,status){
//         $('#content').html(data);
//     });
// });
$('#marketing_breadcrumb').click(function(){
    $.get('sale/sales_setup/Sale_ASFF_Marketing_Firm.php', function(data,status){
        $('#content').html(data);
    });
});
$('#sales_setup_breadcrumb').click(function(){
    $.get('sale/sales_setup/sales_setup.php',function(data,status){
        $('#content').html(data);
    });
});
</script>