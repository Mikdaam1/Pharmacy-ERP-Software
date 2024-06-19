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
            <h1>Customer Info</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="paid_breadcrumb">Paid Registrations</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="allottee_to_allottee_breadcrumb">Allottee To Allottee</button></li>
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
                    <div class="card mt-3">
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
                                            <span class="input-group-text"><i class="fas fa-cube"></i></span>
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
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <textarea type="text" id="perm_address" name="perm_address" rows="2" class="form-control form-control-sm" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
$(document).ready(function() {
    var form_no = <?php echo $_GET['cus_formno']; ?>;

    $.ajax({
        url: 'api/sales/transfer_customer_registration_api.php',
        type:'POST',
        dataType: "json",
        data:{action:'form_no_detail',form_no:form_no},
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
            console.log(response.DESCRIPTION);
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    }); 

    // Breadcrumbs
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
    $("#paid_breadcrumb").on("click", function () {
        $.get('sale/transfer/transfer_paid_customers.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>