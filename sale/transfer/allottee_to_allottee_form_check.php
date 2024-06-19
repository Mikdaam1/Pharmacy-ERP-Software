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
              <h1>Allottee To Allottee Form Number</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="form_no_breadcrumb">Form Number</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="allottee_to_allottee_breadcrumb">Allottee To Allottee</button></li>
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
                                    <form method="post" id="form_no_form">
                                            <?php include '../../display_message/display_message.php'?>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label for="">Enter Form Number :<span style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                        <input type="number" name = "form_no" id="form_no" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="row">
                                                        <div style="text-align: center;">
                                                            <span id="msg" style="color: red;font-size: 13px;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
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
                form_no: {
                    required: true,
                    number: true
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
   $("#form_no_form").on("submit", function(e) {
    e.preventDefault();
       let request = $(this).serialize();
       let action = 'form_number_check';
            if ($("#form_no_form").valid()) {
                $("#ajax-loader").show();
                $.ajax({
                url: 'api/sales/transfer_customer_registration_api.php',
                type: 'POST',
                dataType: "json",
                data: request + "&action="+action,
                success: function(response){
                    
                    $("#ajax-loader").hide();
                    console.log(response);
                    var message = response.message;
                    var status = response.status;
                    var formno = response.data;

                    if(status == 1)
                    {
                        $.get('sale/transfer/allottee_to_allottee_form.php?form_no='+formno,function(data,status){
                            $('#content').html(data);
                        });
                    }else{
                        $("#msg").html(message);
                    }

                    $( '#form_no_form' ).each(function(){
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
    $("#allottee_to_allottee_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#form_no_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee_form_check.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>
<?php include '../../includes/loader.php'?>