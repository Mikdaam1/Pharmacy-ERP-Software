<?php 
ob_start();
ob_clean();
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
            <h1>Unpaid Registrations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="unpaid_breadcrumb">Unpaid</button></li>
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
                <?php include './../display_message/display_message.php'?>
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
                        <th>Customer Name</th>
                        <th>CNIC</th>
                        <th>Contact No</th>
                        <th>Unit Type</th>
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
    url: 'api/sales/UnpaidCustomerRegistration/ActionsHandler.php',
    type: 'POST',
    data: {action: 'index'},
    dataType: "json",
    success: function(response){
        $("#ajax-loader").hide();
        if (response.success === true) {
          table.clear().draw();
          // append data in datatable
          k = 1;
          for (var i = 0; i < response.data.length; i++) {
            // j = i++;
            var s_no = k++;
            var form_no = response.data[i].FORM_NO;
            // var cus_id = response.data[i].CUS_ID;
            var unit_type = response.data[i].DESCRIPTION;
            var cust_name = response.data[i].CUS_NAME;
            var cnic = response.data[i].CNIC_NO;
            var contact_no = response.data[i].CONTACT_NO;
            var invoice_no = response.data[i].TRNO;

              // if (response.data[i].EXPIRY_DATE.localeCompare(getCurrentDate()) != 1) {
                // var btn_pay = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view 402a2c_1" title="View Supplementary Challan"><i class="fa fa-money text-info fa-fw" ></i></button>';
                // var btn_edit = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-edit 402a2c_2" title="Edit Supplementary Challan"><i class="far fa-pencil text-info fa-fw 402a2c_3" ></i></button>';
                // var btn_print = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-print" title="Print Challan"><i class="far fa-print text-info fa-fw" ></i></button>';
              // }else{
                // var btn_pay = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view 402a2c_1" title="View Supplementary Challan"><i class="fa fa-money text-info fa-fw" ></i></button>';
                // var btn_edit = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-edit 402a2c_2" title="Edit Supplementary Challan"><i class="far fa-pencil text-info fa-fw 402a2c_3" ></i></button>';
                // var btn_print = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-print" title="Print Challan"><i class="far fa-print text-info fa-fw" ></i></button>';
              // }
            if(jQuery.inArray("402a2c_1", secF_dataArr) !== -1){
                var btn_pay = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view 402a2c_1" title="View Supplementary Challan"><i class="fa fa-money text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a2c_2", secF_dataArr) !== -1){
                var btn_edit = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-edit 402a2c_2" title="Edit Supplementary Challan"><i class="far fa-pencil text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a2c_3", secF_dataArr) !== -1){
                var btn_print = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-print 402a2c_3" title="Print Challan"><i class="far fa-print text-info fa-fw" ></i></button>';
            }
            btn = btn_pay + btn_edit + btn_print
            table.row.add([s_no,form_no,cust_name,cnic,contact_no,unit_type,invoice_no,btn]);
          }
          table.draw();
        }
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
  });

  // ***********************************
  $('#example1').on('click','.btn-view',function(){
    var form_no = $(this).attr('data-id');
    $.get('sale/customer_charges_receiving.php?cus_formno='+form_no,function(data,status){
        $('#content').html(data);
    });
  });
  
  $('#example1').on('click','.btn-edit',function(){
    var form_no = $(this).attr('data-id');
    $.get('sale/customer_info_edit.php?cus_formno='+form_no,function(data,status){
        $('#content').html(data);
    });
  });

  // On CLick Print Button
  $('#example1').on('click','.btn-print',function(){
    var form_no = $(this).attr('data-id');
    let action = 'show';
    $.ajax({
        url: 'api/sales/GetInvoice/ActionsHandler.php',
        type: 'POST',
        data: "&action="+action + "&form_no="+form_no,
        dataType: "json",
        success: function(response){
            let invoice_url = "invoicereports/customer_registration_challan_api.php?action=invoice_generate&tr_no="+response.data[0].TRNO;
            // console.log(response);
            // let expiry_date = response.data[0].EXPIRY_DATE;
            // let current_date = getCurrentDate();
            // if (expiry_date.localeCompare(current_date) == 1) {
            window.open(invoice_url, '_blank');
            // }else{
            //   $.get('sale/GenerateInvoice/generate_invoice.php?cus_formno='+form_no, function(data, status) {
            //     $('#content').html(data);
            //   });
            // }
        },
        error: function(error) {
            console.log(error);
            alert("Contact IT Department");
        }
    });
  });

  function getCurrentDate() {
    var months = ['JAN','FEB','MAR','APR','MAY','JUN','JULY','AUG','SEP','OCT','NOV','DEC'];
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(months[today.getMonth()]);
    var yyyy = today.getFullYear();
    today = dd + '-' + mm + '-' + yyyy;
    return today;
  }

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
    $("#unpaid_breadcrumb").on("click", function() {
        $.get('sale/unpaid_customers.php', function(data,status){
            $("#content").html(data);
        });
    });

});

</script>

<?php include '../includes/loader.php'?>