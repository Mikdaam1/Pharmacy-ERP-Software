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
            <h1>Transfer Paid Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="paid_breadcrumb">Paid</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="allottee_to_allottee_breadcrumb">Allottee To Allottee</button></li>
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
                      <h3 class="card-title">Records</h3>
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
                        <th>Invoice No</th>
                        <th>Action</th>
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

<!--View Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Supplementary Challan</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Form No</th>
                    <th>Customer Name</th>
                    <th>CNIC</th>
                    <th>a</th>
                    <th>Issue Date</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                  <tr>
                    <td id="form_no"></td>
                    <td id="cust_no"></td>
                    <td id="cnic_no"></td>
                    <td id="challan_no"></td>
                    <td id="issue_date"></td>
                    <td id="expiry_no"></td>
                    <td id="status"></td>
                  </tr>
                <tbody>
                </tbody>
              </table>
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
        url: 'api/sales/transfer_paid_registration_api.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $("#ajax-loader").hide();
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
                var cnic = response[i].CNIC_NO;
                var contact_no = response[i].CONTACT_NO;
                var invoice_no = response[i].TRNO;
                
                if(jQuery.inArray("402b1c_1", secF_dataArr) !== -1){
                  var btn_view = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view 402b1c_1" title="View Supplementary Challan"><i class="far fa-eye text-info fa-fw" ></i></button>';
                }
                if(jQuery.inArray("402b1c_2", secF_dataArr) !== -1){
                  var btn_print = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-print-receipt 402b1c_2" title="Print Invoice Receipt"><i class="far fa-print text-info fa-fw" ></i></button>';
                }
                
                var btn = btn_view + btn_print;
                table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,invoice_no,btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
}); 


$('#example1').on('click','.btn-view',function(){
    var form_no = $(this).attr('data-id');
    $.get('sale/transfer/transfer_customer_info_view.php?cus_formno='+form_no,function(data,status){
        $('#content').html(data);
    });
});

// Payment Receipt
$('#example1').on('click','.btn-print-receipt',function(){
    var form_no = $(this).attr('data-id');
    let action = 'get_invoice';
    $.ajax({
        url: 'api/sales/transfer_customer_registration_api.php',
        type: 'POST',
        data: "&action="+action + "&form_no="+form_no,
        dataType: "json",
        success: function(response){
        // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
        let invoice_url = "invoicereports/transfer_payment_reciept.php?action=receipt_generate&invoice_no="+response.TRNO;
        window.open(invoice_url, '_blank');
        },
        error: function(error) {
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
$("#allottee_to_allottee_breadcrumb").on("click", function() {
    $.get('sale/transfer/allottee_to_allottee.php', function(data,status){
        $("#content").html(data);
    });
});
$("#paid_breadcrumb").on("click", function() {
    $.get('sale/transfer/transfer_paid_customers.php', function(data,status){
        $("#content").html(data);
    });
});

</script>

<?php include '../../includes/loader.php'?>