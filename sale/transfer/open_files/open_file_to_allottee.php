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
              <h1>Open File To Allottee</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="current_breadcrumb">Enter File Number</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="open_files_breadcrumb">Open Files</button></li>
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
                        <?php include '../../../display_message/display_message.php'?>
                        <div class="col-sm-12 text-center">
                            <u><h3>Open File Info</h3></u>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Allottee ID :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                    <input type="text" name = "allottee_id" id="allottee_id" class="form-control form-control-sm" disabled>
                                </div>
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Primary Phone Number :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input type="text" name = "contact_no" id="pri_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text" disabled>
                                </div>
                            </div>
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
                                    <input type="email" id="email" name="email" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address" disabled>
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
                                    <input type="text" name="country_id" id="country_id" class="form-control form-control-sm imp test" placeholder="Country Name" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Province :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                    </div>
                                    <input type="text" name="province_id" id="province_id" class="form-control form-control-sm imp test" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">City :<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                    </div>
                                    <input type="text" name="city_id" id="city_id" class="form-control form-control-sm imp test" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="exampleFormControlTextarea1">Address :<span style="color:red">*</span></label>
                                <textarea pattern="[a-zA-Z0-9 ,._/#-]{1,}" class="form-control" name= "perm_add" id="address" rows="1" maxlength="255" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="transfer_form">
                            <input type="hidden" name = "saller_id" id="saller_id" class="form-control form-control-sm" readonly>
                            <input type="hidden" name = "sale_id" id="sale_id" class="form-control form-control-sm" readonly>
                            <div class="col-sm-12 text-center">
                                <u><h3>Buyer</h3></u>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Allottee ID :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <select class="form-control form-control-sm js-example-basic-single" id="buyer_id" name="buyer_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Name :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name="buyer_cus_name" id="buyer_cus_name" class="form-control form-control-sm imp test" placeholder="Enter Customer Name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">SWD :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "buyer_swd" id="buyer_swd" class="form-control form-control-sm imp test" placeholder="Enter SWD Name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="">Primary Phone Number :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" name = "buyer_contact_no" id="buyer_pri_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Secondary Phone Number :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input type="text" name = "buyer_contact_no2" id="buyer_sec_contact_number" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Email :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" id="buyer_email" name="buyer_email" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address" disabled>
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
                                        <input type="text" name="buyer_country_id" id="buyer_country_id" class="form-control form-control-sm imp test" placeholder="Country Name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">Province :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <input type="text" name="buyer_province_id" id="buyer_province_id" class="form-control form-control-sm imp test" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="">City :<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input type="text" name="buyer_city_id" id="buyer_city_id" class="form-control form-control-sm imp test" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="exampleFormControlTextarea1">Address :<span style="color:red">*</span></label>
                                    <textarea pattern="[a-zA-Z0-9 ,._/#-]{1,}" class="form-control" name= "buyer_perm_add" id="buyer_address" rows="1" maxlength="255" disabled></textarea>
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
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function () {
    var form_no = <?php echo $_GET['form_no'] ?>;
    // Form Validations

    $(":input").inputmask();


    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                // alert( "Form successful submitted!" );
            }
        });
        $('#transfer_form').validate({
            rules: {
                buyer_id: {
                    required: true
                },
            },

            messages: {
                buyer_id: {
                    required: "Field is required",
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

    // Get Data
    $.ajax({
        url: 'api/sales/open_files/open_file_to_allottee_api.php',
        type: 'POST',
        data: {action: 'form_no_detail', form_no:form_no},
        dataType: "json",
        success: function(response){
            console.log(response);
            $("#sale_id").val(response.SALE_ID);
            $("#saller_id").val(response.CUS_ID);
            $("#allottee_id").val(response.CUS_ID);
            $('#cus_name').val(response.CUS_NAME);
            $('#swd').val(response.SWD);
            $('#pri_contact_number').val(response.CONTACT_NO);
            $('#sec_contact_number').val(response.CONTACT_NO2);
            $('#email').val(response.EMAIL);
            $('#address').val(response.PERM_ADD);
            $('#country_id').val(response.COUNTRY_NAME);
            $('#province_id').val(response.PROVINCE_NAME);
            $('#city_id').val(response.CITY_NAME);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    // Get Allotte ID's
    $.ajax({
        url: 'api/sales/open_files/open_file_to_allottee_api.php',
        type: 'POST',
        data: {action: 'open_file_customer',form_no:form_no},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#buyer_id').html('');
            $('#buyer_id').append('<option value="">Select...</option>');
            $.each(response, function(key, value){
                $('#buyer_id').append('<option value='+value["CUSTOMER_ID"]+'>'+value["CUSTOMER_ID"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    

    // Get Buyer Data
    $('#buyer_id').change(function(){
        var buyer_id = $(this).val();
        console.log(buyer_id);
        $.ajax({
            url: 'api/sales/open_files/open_file_to_allottee_api.php',
            type: 'POST',
            data: {action: 'get_buyer_data', buyer_id:buyer_id},
            dataType: "json",
            success: function(response){
                console.log(response);
                $("#buyer_id").val(response.CUS_ID);
                $('#buyer_cus_name').val(response.CUS_NAME);
                $('#buyer_swd').val(response.SWD);
                $('#buyer_pri_contact_number').val(response.CONTACT_NO);
                $('#buyer_sec_contact_number').val(response.CONTACT_NO2);
                $('#buyer_email').val(response.EMAIL);
                $('#buyer_address').val(response.PERM_ADD);
                $('#buyer_country_id').val(response.COUNTRY_NAME);
                $('#buyer_province_id').val(response.PROVINCE_NAME);
                $('#buyer_city_id').val(response.CITY_NAME);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    // *******************

    // Submit Data
   $("#transfer_form").on("submit", function(e) {
    e.preventDefault();
       let request = $(this).serialize();
       let action = 'insert';
        if ($("#transfer_form").valid()) {
            $.ajax({
                url: 'api/sales/open_files/open_file_to_allottee_api.php',
                type: 'POST',
                dataType: "json",
                data: request + "&action="+action + "&form_no="+form_no,
                success: function(response){
                    if(response)
                    {
                        console.log(response);
                        printChallan(response.data);
                        var message = response.message;
                        var status = response.status;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                $.get('sale/transfer/open_files/form_no_check.php',function(data,status){
                                    $('#content').html(data);
                                });
                            },
                            error: function(e) 
                            {
                                console.log(e);
                                alert("Contact IT Department");
                            }
                        });

                    }
                    $( '#transfer_form' ).each(function(){
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
        let invoice_url = "invoicereports/open_file_transfer_challans.php?action=invoice_generate&file="+form_no;
        window.open(invoice_url, '_blank');
    }



    
    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#open_files_breadcrumb").on("click", function() {
        $.get('sale/transfer/open_files/open_files.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#current_breadcrumb").on("click", function() {
        $.get('sale/transfer/open_files/form_no_check.php', function(data,status){
            $("#content").html(data);
        });
    });

});
</script>