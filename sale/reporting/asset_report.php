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
              <h1>Asset Reporting</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="asset_breadcumb">Asset Reporting</button></li>
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
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6 form-group text-center">
                                                <label for="">Select Asset Type :</label>
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                    </div>
                                                    <select class="form-control" name = "search_type" id="search_type">
                                                        <option value="0">All</option>
                                                        <option value="null">Null</option>
                                                        <option value="For Category">For Category</option>
                                                        <option value="Normal">Normal</option>
                                                    </select>&nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary" id="quick_search_btn"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                        <div class="text-center">
                                            <span id="msg" style="color: red;font-size: 13px;"></span>
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
                                    <th>Asset Type</th>
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


$(document).ready(function(){
    $("#ajax-loader").hide();
    // $('#search_type').html('');
    $('#quick_search_form').ready(function(e){
        $("#quick_search_form").on('submit',(function(e) {
            if ($(this).valid()) {
                $("#ajax-loader").show();
                $("#quick_search_btn").css('pointer-events','none');
                $("#quick_search_btn").find($(".fa")).removeClass('fa-search').addClass('fa-spin fa-refresh');
                var search_type = $('#search_type').val();
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
                    url: 'api/sales/reporting/booked_report_api.php',
                    type:'POST',
                    data:{action:'view',search_type:search_type},
                    success: function(response) {
                        
                        $("#ajax-loader").hide();
                        $("#quick_search_btn").css('pointer-events','');
                        $("#quick_search_btn").find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-search');
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
                                var form_no = response[i].REGISTRATION_FORM_NO??'-';
                                var cus_id = response[i].CUS_ID??'-';
                                var cust_name = response[i].CUS_NAME??'-';
                                var cnic = response[i].CNIC_NO??'-';
                                var contact_no = response[i].CONTACT_NO??'-';
                                var sale_status = response[i].SALESTATUS??'-';
                                
                                table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,sale_status]);
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
        }));
    });
});
    

// breadcrumbs
$('#asset_breadcumb').click(function(){
    $.get('sale/reporting/asset_report.php',function(data,status){
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

<?php include '../../includes/loader.php'?>