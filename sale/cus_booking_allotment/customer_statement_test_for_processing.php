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
            <h1>Customer Statement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="surcharge_breadcrumb">Customer Statement</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
            </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">Customer Statement Record</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Form No</th>
                        <th>CUS ID</th>
                        <th>Customer Name</th>
                        <th>CNIC</th>
                        <th>Contact No</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- schedule view Model -->
<div class="modal fade" id="exampleModelSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Schedule</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4" id="logo"></div>
                    <div class="col-8 text-right p-3" id="inv_title"></div>
                </div>
                <div class="row">
                    <div class="col-6 h6" id="inv-left-detail"></div>
                    <div class="col-2"></div>
                    <div class="col-4 text-right h6" id="inv-right-detail"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>SR.No</th>
                            <th>Account Head</th>
                            <th>Due Amount</th>
                            <th>Due Date</th>
                            <th>Paid Amount</th>
                            <th>Paid On</th>
                            <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSchedule"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-schedule-challan"><i class="far fa-print text-info fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<script type="text/javascript">

$(document).ready(function(){
  $('#example1').DataTable({
    "processing": true,
    "serverSide": true,
		"order":[],
		"ajax":{
			url:"api/sales/cus_confirm_booking_api.php",
			type:"POST",
			data:{action:'confirm_booking'},
      // success:function(response){
      //   console.log(response);
      // },
      error:function(error){
        console.log(error);
        alert("Contact IT Department");
      }
		},
	});
});

// $('#example1').ready(function(){
//     let table = $('#example1').DataTable({
//         dom: 'Bfrtip',
//         orderCellsTop: true,
//         fixedHeader: true,
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print','colvis'
//         ],
//     });

//     $.ajax({
//         url: 'api/sales/cus_confirm_booking_api.php',
//         type: 'POST',
//         data: {action: 'confirm_booking'},
//         success: function(response){
//             console.log(response);
//             table.clear().draw();
//             // append data in datatable
//             k = 1;
//             for (var i = 0; i < response.length; i++) {
//               var s_no = k++;
//               var form_no = response[i].FORM_NO;
//               var cus_id = response[i].CUS_ID;
//               var cust_name = response[i].CUS_NAME;
//               var cnic = response[i].CNIC_NO;
//               var contact_no = response[i].CONTACT_NO;
//               var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
//               var btn = schedule_btn;
//               table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
//             }
//             table.draw();
//         },
//         error: function(error){
//             console.log(error);
//         }
//     });
// });
//function for schedule view open model
$("#example1").on('click','.btn-schedule-view',function(){
    $('#exampleSchedule').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            console.log(response);
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                logo = logo_d.replace('../', '');
                $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP : '+unit_category_name+'</p><p>NAME : '+cust_name+'</p><p>ADDRESS : '+address+'</p><p>PHONE NO : '+contact_no+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>APARTMENT DETAILS : PLOT</p></p><p>BLOCK : (USMAN)</p></p><p>ASF CITY KARACHI</p>');
                $('.btn-schedule-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_balance = 0;
                for (var i = 0; i < response.length; i++) {
                    var s_no = k++;
                    var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    var due_date = response[i].DUE_DATE ?? '';
                    var received_date = response[i].RECEIVED_DATE ?? ''; 
                    var received_amount = response[i].RECEIVED_AMOUNT ?? '0';
                    var schedule_amount = response[i].SCHEDULE_AMOUNT ?? '0';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var total_balance = total_balance + balance;
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amount+'</td><td style="text-align:center;">'+due_date+'</td><td style="text-align:right;">'+received_amount+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:right;">'+balance+'</td></tr>');
                }
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amount+'</td><td style="text-align:center;">'+due_date+'</td><td style="text-align:right;">'+total_received_amount+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:right;">'+total_balance+'</td></tr>');
                $('#exampleModelSchedule').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
$("#exampleModelSchedule").on('click','.btn-schedule-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_booking_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
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
$("#surcharge_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/customer_statement.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
