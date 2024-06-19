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
              <h1>Customer Cnic Check</h1>
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
                            <div class="card mt-3">
                                <div class="card-body">
                                    <form method="post" id="CustomerRegistrationsCheckCnicForm">
                                            <?php include '../display_message/display_message.php'?>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label for="">Enter Customer CNIC Number :<span style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" name = "cnic_no" id="cnic_number" placeholder="xxxxx-xxxxxxx-x" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                <!-- <h3 class="card-title">Language Records</h3> -->
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="text-right">
                                                    <button type="submit" id="add" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
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
    // Form Validations

    $(":input").inputmask();


    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
            }
        });
        $('#newCustomerRegistrationForm').validate({
            rules: {
                cnic_no: {
                    required: true,
                    // number: true
                }
            },

            messages: {
                cnic_no: {
                    minlength: "Cnic should be at least 13 characters"
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

    
    // ****************
   $("#CustomerRegistrationsCheckCnicForm").on("submit", function(e) {
    e.preventDefault();
       let request = $(this).serialize();
       let action = 'show';
            if ($("#CustomerRegistrationsCheckCnicForm").valid()) {
                $("#add").css('pointer-events','none');
                $("#add").find($(".fas")).removeClass('fa-arrow-right').addClass('fa-spin fa-refresh');
                $.ajax({
                url: 'api/sales/CustomerRegistrationsCheckCnic/ActionsHandler.php',
                type: 'POST',
                dataType: "json",
                data: request + "&action="+action,
                success: function(response){
                    if(response.success)
                    {
                        $.get('sale/exist_customer_reg.php?cnic_no='+response.data[0].CNIC_NO,function(data,status){
                            $('#content').html(data);
                        });
                    }else{
                        let cnic_no = $('#cnic_number').val();
                        cnic_no = cnic_no.replace(/-/g,'');
                        cnic_no = cnic_no.replace(/_/g,'');
                        if (cnic_no.length == 13) {
                            $.get('sale/new_customer_reg.php?cnic_no='+cnic_no,function(data,status){
                                $('#content').html(data);
                            });
                        }else{
                            alert("ERROR ! Cnic Number Should Have 13 Characters");
                        }
                    }
                    $( '#CustomerRegistrationsCheckCnicForm' ).each(function(){
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