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
            <h1>Quarter Printed Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_inv_breadcrumb">Quarter Printed Reports</button></li>
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
                    <div class="card-body">
                        Count of Selected Records : <span id="dvcount"></span>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SR.No</th>
                                <th>Quarter ID</th>
                                <th>Form No</th>
                                <th>Sale ID</th>
                                <th>Type Desc</th>
                                <th>Due Date</th>
                                <th>Expiry Date</th>
                                <th>Amount</th>
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

if(jQuery.inArray("402a4h_2", secF_dataArr) !== -1){
    $('.402a4h_2').show();
}

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
        url: 'api/sales/cus_quarter_invoices_api.php',
        type: 'POST',
        data: {action: 'quarter_printed_report'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var id = response[i].BOOKING_DETAIL_ID;
            var form_no = response[i].FORM_NO;
            var sale_id = response[i].SALE_ID;
            var type_desc = response[i].TYPE_DESC;
            var due_date = response[i].DUE_DATE;
            var exp_date = response[i].EXPIRY_DATE;
            var amount = response[i].AMOUNT;
            var trno = response[i].TRNO;
            // var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
            
            table.row.add([s_no,id,form_no,sale_id,type_desc,due_date,exp_date,amount]);
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
$("#quarter_inv_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_report_printed.php', function(data,status){
        $("#content").html(data);
    });
});

</script>

<?php include '../../includes/loader.php'?>