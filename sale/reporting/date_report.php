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
              <h1>Registration By Date</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="date_report">Date Reporting</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="reporting_breadcrumb">Reporting</button></li>
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
                                            <?php include '../../display_message/display_message.php'?>
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-6 form-group"></div>
                                                <div class="col-lg-4 col-sm-6 form-group">
                                                    <label for="">From Year</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                                        </div>
                                                        <select class="form-control form-control-sm" name = "f_from_year" id="f_from_year">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 form-group">
                                                    <label for="">To Year</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                                        </div>
                                                        <select class="form-control form-control-sm" name = "f_to_year" id="f_to_year">
                                                        </select>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table id="category_data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SR.No</th>
                                    <th>Form No</th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>CNIC</th>
                                    <th>Contact No</th>
                                    <th>Registration Date</th>
                                    <th>Category Date</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
        if ($("#quick_search_form").valid()) {
            
            $("#ajax-loader").show();
            var f_from_year = $('#f_from_year').val();
            var f_to_year = $('#f_to_year').val();
            $('#category_data').dataTable().fnDestroy();
            let table = $('#category_data').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print','colvis'
                ],
            });
            $.ajax({
                url: 'api/sales/reporting/date_report_api.php',
                type:'POST',
                data:{action:'view',f_from_year:f_from_year,f_to_year:f_to_year},
                success: function(response) {
                    
                    $("#ajax-loader").hide();
                    // console.log(data);
                    if(response == ''){
                        table.clear().draw();
                        $("#msg").html('Data Not Found.');
                    }else{
                        table.clear().draw();
                        
                        $("#msg").html('');
                        // append data in datatable
                        k = 1;
                        for (var i = 0; i < response.length; i++) {
                            // j = i++;
                            var s_no = k++;
                            var form_no = response[i].FORM_NO??'-';
                            var cus_id = response[i].CUS_ID??'-';
                            var cust_name = response[i].CUS_NAME??'-';
                            var cnic = response[i].CNIC_NO??'-';
                            var contact_no = response[i].CONTACT_NO??'-';
                            var registration_date = response[i].ACTION_ON??'-';
                            var category_name = response[i].DESCRIPTION??'-';
                            
                            table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,registration_date,category_name]);
                        }
                            table.draw();
                    }
                },
                error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                }
            });
        }
    });
});



    
    // Get all Years
    var nowY = new Date().getFullYear(),
    optionsY = "";

    for(var Y=nowY; Y>=2016; Y--) {
        optionsY += "<option value="+Y+">"+ Y +"</option>";
    }
    $("#f_from_year").append( optionsY );
    $("#f_to_year").append( optionsY );
    
    // Get quarters number
    optionsN = "";
    for(var N=1; N<=20; N++) {
        optionsN += "<option value="+N+">"+ N +"</option>";
    }
    $("#f_from_quarter").append( optionsN );
    $("#f_to_quarter").append( optionsN );

    // breadcrumbs
    $('#date_report').click(function(){
        $.get('sale/reporting/date_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    
    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#reporting_breadcrumb").on("click", function() {
        $.get('sale/reporting/reporting.php', function(data,status){
            $("#content").html(data);
        });
    });
</script>