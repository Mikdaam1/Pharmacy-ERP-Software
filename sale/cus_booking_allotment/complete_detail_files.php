<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Complete Detail Files</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="complete_detail_file_breadcrumb">Complete Detail Files</button></li>
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
                      <h3 class="card-title">Complete File Detail of Customers</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                      <tr>
                        <th>SR.No</th>
                        <th>Sale ID</th>
                        <th>Form No</th>
                        <th>Name</th>
                        <th>Booking Date</th>
                        <th>Unit</th>
                        <th>Block</th>
                        <th>Type</th>
                        <th>Street</th>
                        <th>RCV</th>
                        <th>Campaign ID</th>
                        <th>Remarks</th>
                        <th>Sale Status</th>
                        <th>Balloting</th>
                        <th>Dealer File Intimation No</th>
                        <th>Dealer File Direct Unit Allot</th>
                        <th>Time Frame</th>
                      </tr>
                    </thead>
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
<script type="text/javascript">

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');

$('#example1').ready(function(){
    $("#ajax-loader").show();
    let table = $('#example1').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ],
    });

    table.search('').draw(); //required after
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table.column(i).search( this.value ).draw();
            }
        });
    });

    $.ajax({
        url: 'api/sales/complete_detail_files_api.php',
        type: 'POST',
        data: {action: 'complete_detail'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              var s_no = k++;
              var sale_id = response[i].SALE_ID??'-';
              var form_no = response[i].REGISTRATION_FORM_NO??'-';
              var cust_name = response[i].NAME??'-';
              var booking_date = response[i].BOOKING_DATE??'-';
              var unit = response[i].UNIT??'-';
              var block = response[i].BLOCK??'-';
              var type = response[i].TYPE??'-';
              var street = response[i].STREET??'-';
              var rcv = response[i].RCV??'-';
              var campaign_id = response[i].CAMPAIGN_ID??'-';
              var remarks = response[i].REMARKS??'-';
              var sale_status = response[i].SALE_STATUS??'-';
              var ballot = response[i].BALLOTING_YES_OR_NOT??'-';
              var int_no = response[i].DEALER_FILE_INTIMATION_NO??'-';
              var direct = response[i].DEALER_FILE_DIRECT_UNIT_ALLOT??'-';
              var time_frame = response[i].TIME_FRAME??'-';

              
            if(jQuery.inArray("402a3c_1", secF_dataArr) !== -1){
            }
              table.row.add([s_no,sale_id,form_no,cust_name,booking_date,unit,block,type,street,rcv,
              campaign_id,remarks,sale_status,ballot,int_no,direct,time_frame]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
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
$("#sale_breadcrumb").on("click", function() {
    $.get('sale/sale.php', function(data,status){
        $("#content").html(data);
    });
});
$("#complete_detail_file_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/complete_detail_files.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>