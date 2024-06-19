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
              <h1>Registration By Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="category_report">Category Reporting</button></li>
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
                                                <label for="">Select Category :</label>
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                    </div>
                                                    <select class="form-control" name = "search_type" id="search_type">
                                                        <option value="null">Null</option>
                                                        <option value="0">All</option>
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
                                    <th>Registration Date</th>
                                    <th>Category</th>
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

$('#category_data').ready(function(){

    $.ajax({
        url: 'api/sales/reporting/category_report_api.php',
        type: 'POST',
        data: {action: 'index'},
        success: function(response){
            console.log(response);
            // $('#search_type').empty();
            for (var i=0; i<response.length; i++) {
                $('#search_type').append($('<option>', {  
                    value: response[i].TYPE_ID,
                    text : response[i].DESCRIPTION
                }));
            }
            $('#search_type option:eq(0)').attr('selected', 'selected');
            var search_type=$('#search_type').val();
            console.log(search_type);
            // $("#ajax-loader").show();
            // let table = $('#category_data').DataTable({
            //     dom: 'Bfrtip',
            //     orderCellsTop: true,
            //     fixedHeader: true,
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print','colvis'
            //     ],
            // });
            //   // Setup - add a text input to each footer cell
            //   $('#category_data thead tr').clone(true).appendTo( '#category_data thead' );
            //   $('#category_data thead tr:eq(1) th').each( function (i) {
            //       var title = $(this).text();
            //       $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

            //       $( 'input', this ).on( 'keyup change', function () {
            //           if ( table.column(i).search() !== this.value ) {
            //               table
            //                   .column(i)
            //                   .search( this.value )
            //                   .draw();
            //             }
            //       });
            //   });

            // $.ajax({
            //     url: 'api/sales/reporting/category_report_api.php',
            //     type: 'POST',
            //     data: {action: 'view',search_type:search_type},
            //     success: function(response){
            //         $("#ajax-loader").hide();
            //         console.log(response);
            //         table.clear().draw();
            //         // append data in datatable
            //         k = 1;
            //         for (var i = 0; i < response.length; i++) {
            //         // j = i++;
            //         var s_no = k++;
            //         var form_no = response[i].FORM_NO??'-';
            //         var cus_id = response[i].CUS_ID??'-';
            //         var cust_name = response[i].CUS_NAME??'-';
            //         var cnic = response[i].CNIC_NO??'-';
            //         var contact_no = response[i].CONTACT_NO??'-';
            //         var registration_date = response[i].ACTION_ON??'-';
            //         var category_name = response[i].DESCRIPTION??'-';
                    
            //         table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,registration_date,category_name]);
            //         }
            //         table.draw();

            //     },
            //     error: function(error){
            //         console.log(error);
            //         alert("Contact IT Department");
            //     }
            // });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    
});

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
                url: 'api/sales/reporting/category_report_api.php',
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
    }));
});

    

// breadcrumbs
$('#category_report').click(function(){
    $.get('sale/reporting/category_report.php',function(data,status){
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