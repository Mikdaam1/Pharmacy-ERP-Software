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
              <h1>Quick Search</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="current_breadcrumb">Quick 
                      Search
                  </button></li>
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
                                <div class="card-body container">
                                    <form method="post" id="quick_search_form">
                                            <?php include '../display_message/display_message.php'?>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Select Type :<span style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                        <select class="form-control form-control-sm" name = "search_type" id="search_type">
                                                            <option value="cnic">CNIC Number</option>
                                                            <option value="cus_id">Customer ID</option>
                                                            <option value="form_number">Form Number</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Enter Number :<span style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                        </div>
                                                        <input maxlength='13' type="number" name = "search_number" id="search_number" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span id="msg" style="color: red;font-size: 13px;"></span>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" id="quick_search_btn"><i class="fa fa-search"></i></button>
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
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
            }
        });
        $('#quick_search_form').validate({
            rules: {
                search_type: {
                    required: true,
                },
                search_number: {
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

    
    // ****************
    

    $("#quick_search_btn").click(function() {
        if ($("#quick_search_form").valid()) {
            var search_type = $('#search_type').val();
            var search_number = $('#search_number').val();
            
            $.ajax({
                url: 'api/finance/customer_information_api.php',
                type:'POST',
                data:{action:'spec_cust_view',search_type:search_type,search_number:search_number},
                success: function(response) {
                    console.log(response);
                    if(response.status == 1){
                        $.get('sale/quick_search_tabs.php?search_type='+search_type+'&search_number='+search_number,function(data,status){
                            $('#content').html(data);
                        });
                    }else{
                        $("#msg").html(response.message);
                    }
                },
                error: function(e){
                    console.log(e);
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
    $("#current_breadcrumb").on("click", function() {
        $.get('sale/quick_search.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>