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
              <h1>Sale Permission</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="permission_breadcrumb">Sale Permission
                  </button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_setup_breadcrumb">Sale Setup</button></li>
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
                            <div class="card mt-3">
                                <div class="card-body">
                                    <form method="post" id="quick_search_form">
                                            <?php include '../../display_message/display_message.php'?>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label for="">Form Number :<span style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" name = "form_no" id="form_no" class="form-control form-control-sm">
                                                        <!-- <select class="form-control form-control-sm js-example-basic-single" id="form_no" name="form_no">
                                                        </select> -->
                                                    </div>
                                                    <div><span id="msg" style="color: red;font-size: 13px;"></span></div>
                                                    <br>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="">&nbsp;</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                        </div>
                                                        <button  onmouseover="this.style.background='black',this.style.color='white'" onmouseout="this.style.background='white',this.style.color='#495057'" type="submit" id="quick_search_btn" class="btn btn-default form-control-sm" style="background: white; color: rgb(73, 80, 87);">  Search Employees</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <?php include '../../display_message/display_message.php'?>
                        <div class="row">
                            <div class="col-sm-4">
                            <h3 class="card-title">Registration: <b><span id="cus_reg"></span></b></h3>
                            </div>
                            <div class="col-sm-4">
                            <h3 class="card-title">Name: <b><span id="cus_name"></span></b></h3>
                            </div>
                            <div class="col-sm-4">
                            <h3 class="card-title">Project: <b><span id="cus_project"></span></b></h3>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <!-- <h4>Custom Content Below</h4> -->
                            <h3>Customer Detail</h3>

                            <div class="tab-content" id="custom-content-below-tabContent">
                                
                                <!-- First Tab-->
                                <div class="tab-pane fade show active" id="customer-information" role="tabpanel" aria-labelledby="customer-information-tab">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <form>
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
                                            <div class="row">
                                                <div class="col-sm-11">
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="col-sm-12 text-right">
                                                        <button type="button" class="btn btn-info mt-2 btn-sm " id="add_button" >  <i class="fa fa-plus">  </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                <!--./First Tab-->
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
$(document).ready(function () {   
    
    // $("#ajax-loader").show(); 
    // $('.js-example-basic-single').select2();
    // $.ajax({
    //     url: 'api/sales/SalesSetups/EmergencyPermission/salesetup_emergency_permission_api.php',
    //     type: 'POST',
    //     data: {action: 'customers_formnos'},
    //     dataType: "json",
    //     success: function(response){
    //         $("#ajax-loader").hide();
    //         console.log(response);
    //         $('#form_no').html('');
    //         $('#form_no').append('<option value="">Select...</option>');
    //         $.each(response, function(key, value){
    //             $('#form_no').append('<option value='+value["FORM_NO"]+'>'+value["FORM_NO"]+'</option>');
    //         });
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // });

    // Form Validations
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
            }
        });
        $('#quick_search_form').validate({
            rules: {
                form_no: {
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

   

    $("#quick_search_btn").click(function() {
        $("#msg").text('');
        if ($("#quick_search_form").valid()) {
            var search_number = $('#form_no').val();
            console.log(search_number);
            $.ajax({
                url: 'api/sales/SalesSetups/EmergencyPermission/salesetup_emergency_permission_api.php',
                type:'POST',
                data:{action:'spec_cust_view',search_number:search_number},
                success: function(response) {
                    var message = response.message;
                    var status = response.status;
                    if(status == '1')
                    {
                        data = response.data;
                        $('#cus_reg').text(data.REGISTRATION_FORM_NO);
                        $('#cus_name').text(data.CUS_NAME);
                        $('#cus_project').text(data.PARTICULARS);
                        
                        $('#reg_no').val(data.REGISTRATION_FORM_NO);
                        $('#cus_no').val(data.CUS_ID);
                        $('#name').val(data.CUS_NAME);
                        $('#contact').val(data.CONTACT_NO);
                        $('#cnic').val(data.CNIC_NO);
                        $('#perm_address').text(data.PERM_ADD);
                        $('#country').val(data.COUNTRY_NAME);
                        $('#province').val(data.PROVINCE_NAME);
                        $('#city').val(data.CITY_NAME);
                        $('#project').val(data.PARTICULARS);
                        $('#campaign').val(data.REMARKS);
                        $('#unit_type').val(data.DESCRIPTION);
                    }else{
                        $('#cus_reg').text('');
                        $('#cus_name').text('');
                        $('#cus_project').text('');
                        
                        $('#reg_no').val('');
                        $('#cus_no').val('');
                        $('#name').val('');
                        $('#contact').val('');
                        $('#cnic').val('');
                        $('#perm_address').text('');
                        $('#country').val('');
                        $('#province').val('');
                        $('#city').val('');
                        $('#project').val('');
                        $('#campaign').val('');
                        $('#unit_type').val('');

                        $("#msg").text(message);
                    }
                },
                error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                }
            });
        }
    });


    $("#add_button").click(function(){
        var search_number = $('#form_no').val();
        $("#add_button").css('pointer-events','none');
        $("#add_button").find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
        $.ajax({
            url: 'api/sales/SalesSetups/EmergencyPermission/salesetup_emergency_permission_api.php',
            method:'POST',
            data: {action:'permission',search_number:search_number},
            beforeSend:function(){
            },
            success: function(response)
            {
                console.log(response);
                var message = response.message
                var status = response.status
                $.ajax({
                    url: "api/message_session/message_session.php",
                    type: 'POST',
                    data: {message:message,status:status},
                    success: function (response) {
                        console.log(response);
                        $.get('sale/sales_setup/Sale_ASFF_Permission.php',function(data,status){
                            $('#content').html(data);
                        });
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
    });

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#permission_breadcrumb").on("click", function() {
        $.get('sale/sales_setup/Sale_ASFF_Permission.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#sale_setup_breadcrumb").on("click", function() {
        $.get('sale/sales_setup/sales_setup.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>

<?php include '../../includes/loader.php'?>