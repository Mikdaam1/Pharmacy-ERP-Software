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
            <h1>Paid Merger</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="paid_breadcrumb">Paid Merger</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="merger_breadcrumb">Merger</button></li>
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
                        <!-- <th>SR.No</th>
                        <th>Dissolved File</th>
                        <th>Merger File</th>
                        <th>Dissolved Paid Quarter</th>
                        <th>Dissolved Paid Amount</th>
                        <th>Merger Remaining Quarter</th>
                        <th>Merger Unpaid Amount</th>
                        
                        <th>Action</th> -->
                        <th>SR.No</th>
                        <th>Merger ID</th>
                        <th>Customer Name</th>
                        <th>Contact Number</th>
                        <th>Merger Type</th>
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
    <!-- Merger paid Detail Model -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Merger Detail</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="example12" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR.No</th>
                            <th>Merger ID</th>
                            <th>Sale ID</th>
                            <th>Dissolved File</th>
                            <th>Merger_File</th>
                            <th>Dissolved Quarter</th>
                            <th>Merger Quarter</th>
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
    url: 'api/sales/merger/merger_api.php',
    type: 'POST',
    data: {action: 'merger_paid'},
    dataType: "json",
    success: function(response){
        $("#ajax-loader").hide();
        table.clear().draw();
        // append data in datatable
        k = 1;
        for (var i = 0; i < response.length; i++) {
          // j = i++;
          var s_no = k++;
          var mid = response[i].ID;
          var cus_name = response[i].CUS_NAME;
          var contact_no = response[i].CONTACT_NO;
          var mtype = response[i].M_TYPE=='1'?"one in one":response[i].M_TYPE=='2'?"one in two":"two in one";
          // var mid = response[i].MID;
          // var dissolved_file = response[i].DISSOLVED_FILE;
          // // var cus_id = response[i].CUS_ID;
          // var merger_file = response[i].MERGER_FILE;
          // var dissolved_remaining_quarter = response[i].DISSOLVED_REMAINING_QUARTER??'0';
          // var dissolved_paid_amount = response[i].DISSOLVED_PAID_AMOUNT??'0';
          // var merger_remaining_quarter = response[i].MERGER_REMAINING_QUARTER??'0';
          // var merger_unpaid_amount = response[i].MERGER_UNPAID_AMOUNT??'0';
            if(jQuery.inArray("402a2c_1", secF_dataArr) !== -1){
                var btn_post = '<button type="button" data-id='+mid+' class="btn btn-sm btn-post btn-primary 402a2c_1" title="Post">POST</button>';
            }
            if(jQuery.inArray("402a2c_2", secF_dataArr) !== -1){
                var btn_provisonal = '<button type="button" data-id='+mid+' class="btn btn-sm btn-provisonal 402a2c_2" title="Get Provisonal Letter"><i class="far fa-file text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a2d_3", secF_dataArr) !== -1){
                var btn_print = '<button type="button" data-id='+mid+' class="btn btn-sm btn-print-receipt 402a2d_3" title="Print Invoice Receipt"><i class="far fa-print text-info fa-fw" ></i></button>';
            }
            var btn_view = '<button type="button" data-id='+mid+' class="btn btn-sm btn-view 402a2c_3" title="View Paid Merger Detail"><i class="far fa-eye text-info fa-fw" ></i></button>';
            btn = btn_print + btn_provisonal + btn_view;
          // table.row.add([s_no,dissolved_file,merger_file,dissolved_remaining_quarter,dissolved_paid_amount,merger_remaining_quarter,merger_unpaid_amount,btn_post,btn]);
          table.row.add([s_no,mid,cus_name,contact_no,btn_post,mtype,btn]);
        }
        table.draw();
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
  });


    // letter merger
    $('#example1').on('click','.btn-print-receipt',function(){

        var mid = $(this).attr('data-id');
        let action = 'get_invoice';
        $.ajax({
            url: 'api/sales/merger/merger_api.php',
            type: 'POST',
            data: "&action="+action + "&mid="+mid,
            dataType: "json",
            success: function(response){
                let invoice_url = "invoicereports/merger_payment_reciept.php?action=receipt_generate&tr_no="+response.TRNO;
                window.open(invoice_url, '_blank');
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });

    // Payment Receipt
    $('#example1').on('click','.btn-provisonal',function(){
        // alert("Working");
        var mid = $(this).attr('data-id');
        let invoice_url = "invoicereports/merger_temporary_letter.php";
        window.open(invoice_url, '_blank');
    });

    // Post
    $('#example1').on('click','.btn-post',function(){
        if (confirm('Are you sure, you want to post ?')){
            $("#ajax-loader").show();
            $(this).css('pointer-events','');
            var mid = $(this).attr('data-id');
            let action = 'post';
            $.ajax({
                url: 'api/sales/merger/merger_api.php',
                type: 'POST',
                data: {action:action,mid:mid},
                dataType: "json",
                success: function(response){
                  
                    $("#ajax-loader").hide();
                    $(this).css('pointer-events','');
                    var message = response.message;
                    var status = response.status;
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                                $.get('sale/merger/merger_paid.php',function(data,status){
                                    $('#content').html(data);
                                });
                        },
                        error: function(e) 
                        {
                            console.log(e);
                            alert("Contact IT Department");
                        }   
                    });
                },
                error: function(error) {
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
        
        }else{
            return false;
        }
    });

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#merger_breadcrumb").on("click", function() {
        $.get('sale/merger/merger.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#paid_breadcrumb").on("click", function() {
        $.get('sale/merger/merger_paid.php', function(data,status){
            $("#content").html(data);
        });
    });

});

//open modal of detail of paid mergers
$("#example1").on('click','.btn-view',function(){
    $("#ajax-loader").show();
    var mid = $(this).attr("data-id");
    let table = $('#example12').DataTable({
    });
    $.ajax({
        url: 'api/sales/merger/merger_api.php',
        type: 'POST',
        data: {action: 'view_paid_merger_detail',mid:mid},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
                // j = i++;
                var s_no = k++;
                var m_id = response[i].MID;
                var dissolved_file = response[i].DISSOLVED_FILE??'0';
                var merger_file = response[i].MERGER_FILE??'0';
                var dissolved_quarter = response[i].DISSOLVED_QUARTER??'0';
                var merger_quarter = response[i].MERGER_QUARTER??'0';
                var sale_id = response[i].SALE_ID;
                
                table.row.add([s_no,m_id,sale_id,dissolved_file,merger_file,dissolved_quarter,merger_quarter]);
            }
            table.draw();
            $('#exampleModal1').modal('show');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
});

</script>

<?php include '../../includes/loader.php'?>