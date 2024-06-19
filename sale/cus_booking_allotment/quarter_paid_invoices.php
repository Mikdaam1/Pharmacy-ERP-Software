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
            <h1>Quarter Paid Invoices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_paid_breadcrumb">Quarter Paid Invoices</button></li>
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
                <form id="checkbox_form">
                    <div class="card">
                        <div class="card-header">
                        <?php include '../../display_message/display_message.php'?>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <!-- <button type="submit" class="btn btn-primary">Generate Invoice</button> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="error_msg" style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>SR.No</th>
                                <th>Form No</th>
                                <th>CUS ID</th>
                                <th>Customer Name</th>
                                <th>CNIC</th>
                                <th>Contact No</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- Challan Model -->
<div class="modal fade" id="exampleModalInvoices" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Invoices</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="example12" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR.No</th>
                            <th>Invoice ID</th>
                            <th>Form No</th>
                            <th>CUS ID</th>
                            <th>Customer Name</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                <div class="modal-body">
                    <div class="modal-footer justify-content-between">  
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
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
        url: 'api/sales/quarter_paid_invoices_api.php',
        type: 'POST',
        data: {action: 'view'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            // var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].TRNO+'>';
            var s_no = k++;
            var form_no = response[i].REGISTRATION_FORM_NO;
            var cus_id = response[i].CUS_ID;
            var cust_name = response[i].CUS_NAME;
            var cnic = response[i].CNIC_NO;
            var contact_no = response[i].CONTACT_NO;
            if(jQuery.inArray("402a4g_1", secF_dataArr) !== -1){
                var btn = '<button type="button" data-id='+form_no+' class="btn btn-sm paid_invoices 402a4g_1" title="Get Invoice"><i class="far fa-print text-info fa-fw" ></i></button>';
            }
            table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

//function for payment open model
$("#example1").on('click','.paid_invoices',function(){
    var form_no = $(this).attr("data-id");
    let table = $('#example12').DataTable({
    });
    $.ajax({
        url: 'api/sales/quarter_paid_invoices_api.php',
        type: 'POST',
        data: {action: 'paid_invoices',form_no:form_no},
        success: function(response){
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
                // j = i++;
                var s_no = k++;
                var form_no = response[i].FORM_NO;
                var cus_id = response[i].CUS_ID;
                var cust_name = response[i].CUS_NAME;
                var payment_date = response[i].RECEIVING_DATE;
                var inv_id = response[i].TRNO;
                var inv_Amount = response[i].AMOUNT;
                var payment_date = moment(payment_date).format("YYYY-MM-DD");
                var btn = '<button type="button" data-id='+inv_id+' class="btn btn-sm btn-print-reciept" title="Get Invoice"><i class="far fa-print text-info fa-fw" ></i></button>';
                table.row.add([s_no,inv_id,form_no,cus_id,cust_name,payment_date,inv_Amount,btn]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
    $('#exampleModalInvoices').modal('show');
});


// Payment reciept
$('#example12').on('click','.btn-print-reciept',function(){
    var inv_id = $(this).attr('data-id');
    let invoice_url = "invoicereports/quarter_payment_reciept.php?action=reciept_generate&invID="+inv_id;
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
$("#quarter_paid_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_paid_invoices.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>