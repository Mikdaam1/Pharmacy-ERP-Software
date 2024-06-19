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
            <h1>Quarter Printed Invoices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_printed_breadcrumb">Quarter Printed Invoices</button></li>
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
                                <!-- <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th> -->
                                <th>SR.No</th>
                                <th>SALE ID</th>
                                <th>DUE DATE</th>
                                <th>EXPIRY DATE</th>
                                <th>AMOUNT</th>
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
<script type="text/javascript">

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
        url: 'api/sales/quarter_printed_invoices_api.php',
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
            var sale_id = response[i].SALE_ID;
            var due_date = response[i].DUE_DATE;
            var exp_date = response[i].EXPIRY_DATE;
            var amount = response[i].AMOUNT;
            // var btn = checkboxes;
            // table.row.add([btn,s_no,sale_id,due_date,exp_date,amount]);
            table.row.add([s_no,sale_id,due_date,exp_date,amount]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    //check all rows in table
    $('#all_check').click(function(event) {
    var checked = this.checked;
    table.column(0).nodes().to$().each(function(index) {    
        if (checked) {
            $(this).find('.bulkchecked').prop('checked', true);
        } else {
            $(this).find('.bulkchecked').prop('checked', false);         
        }
    });    
    table.draw();
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
$("#quarter_printed_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_printed_invoices.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>