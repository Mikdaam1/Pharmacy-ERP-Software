<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biometric Pending</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="view_breadcrumb">Biometric Pending</button></li>
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
                        <th>SALE ID</th>
                        <th>FORM NO</th>
                        <th>REQ DATE</th>
                        <th>BUYER NAME</th>
                        <th>SELLER NAME</th>
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
    url: 'api/sales/allotte_to_allotte_api.php',
    type: 'POST',
    data: {action: 'pending_allottee'},
    dataType: "json",
    success: function(response){
      console.log(response);
        $("#ajax-loader").hide();
        if (response) {
          table.clear().draw();
          // append data in datatable
          k = 1;
          for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var sale_id = response[i].SALE_ID;
            var form_no = response[i].FORM_NO;
            var req_date = response[i].REQ_DATE;
            var buyer_name = response[i].BUYER_NAME;
            var seller_name = response[i].SELLER_NAME;

            table.row.add([s_no,sale_id,form_no,req_date,buyer_name,seller_name]);
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
  // $('#example1').on('click','.btn-view',function(){
  //   var form_no = $(this).attr('data-id');
  //   $.get('sale/transfer/transfer_customer_charges_receiving.php?cus_formno='+form_no,function(data,status){
  //       $('#content').html(data);
  //   });
  // });
  
  // $('#example1').on('click','.btn-edit',function(){
  //   var form_no = $(this).attr('data-id');
  //   $.get('sale/transfer/transfer_customer_info_edit.php?cus_formno='+form_no,function(data,status){
  //       $('#content').html(data);
  //   });
  // });

  // On CLick Print Button
  // $('#example1').on('click','.btn-print',function(){
  //   var form_no = $(this).attr('data-id');
  //   let action = 'show';
  //   $.ajax({
  //       url: 'api/sales/GetInvoice/ActionsHandler.php',
  //       type: 'POST',
  //       data: "&action="+action + "&form_no="+form_no,
  //       dataType: "json",
  //       success: function(response){
  //           let invoice_url = "invoicereports/customer_registration_challan_api.php?action=invoice_generate&tr_no="+response.data[0].TRNO;
  //           // console.log(response);
  //           // let expiry_date = response.data[0].EXPIRY_DATE;
  //           // let current_date = getCurrentDate();
  //           // if (expiry_date.localeCompare(current_date) == 1) {
  //           window.open(invoice_url, '_blank');
  //           // }else{
  //           //   $.get('sale/GenerateInvoice/generate_invoice.php?cus_formno='+form_no, function(data, status) {
  //           //     $('#content').html(data);
  //           //   });
  //           // }
  //       },
  //       error: function(error) {
  //           console.log(error);
  //           alert("Contact IT Department");
  //       }
  //   });
  // });

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
    $("#allottee_to_allottee_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#view_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee_pending.php', function(data,status){
            $("#content").html(data);
        });
    });

});
</script>

<?php include '../../includes/loader.php'?>