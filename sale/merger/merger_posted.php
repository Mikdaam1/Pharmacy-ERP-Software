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
            <h1>Posted Merger</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="posted_breadcrumb">Posted Merger</button></li>
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
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
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
                            <th>Dissolved File</th>
                            <th>Merger_File</th>
                            <th>Dissolved Paid Quarter</th>
                            <th>Dissolved Paid Amount</th>
                            <th>Merger Remaining Quarter</th>
                            <th>Merger Paid Amount</th>
                            <th>Schedule</th>
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
                                <th>Issue Date</th>
                                <th>Paid Amount</th>
                                <th>Paid On</th>
                                <th>DS/DD No.</th>
                                <th>Out/Stand</th>
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
    data: {action: 'merger_posted'},
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
            var mtype = response[i].M_TYPE;
            var mtype_desc = response[i].M_TYPE=='1'?"one in one":response[i].M_TYPE=='2'?"one in two":"two in one";
                    
            if(jQuery.inArray("402a2c_2", secF_dataArr) !== -1){
                var btn_provisonal = '<button type="button" data-type='+mtype+' data-id='+mid+' class="btn btn-sm btn-provisonal 402a2c_2" title="Get Provisonal Letter"><i class="far fa-file text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a2c_2", secF_dataArr) !== -1){
                var btn_view = '<button type="button" data-id='+mid+' class="btn btn-sm btn-view 402a2c_3" title="View Paid Merger Detail"><i class="far fa-eye text-info fa-fw" ></i></button>';
            }
            btn = btn_view + btn_provisonal;
            // table.row.add([s_no,dissolved_file,merger_file,dissolved_remaining_quarter,dissolved_paid_amount,merger_remaining_quarter,merger_unpaid_amount,btn_post,btn]);
          table.row.add([s_no,mid,cus_name,contact_no,mtype_desc,btn]);
        }
        table.draw();
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
  });


    // Payment Receipt
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
                    var dissolved_paid_quarter = response[i].DISSOLVED_PAID_QUARTER??'0';
                    var dissolved_paid_amount = response[i].DISSOLVED_PAID_AMOUNT??'0';
                    var merger_remaining_quarter = response[i].MERGER_REMAINING_QUARTER??'0';
                    var merger_unpaid_amount = response[i].MERGER_UNPAID_AMOUNT??'0';
                    
                    if(dissolved_file == '0'){
                        form_no = merger_file;
                    }else{
                        form_no = dissolved_file;
                    }

                    if(jQuery.inArray("402a1a_1", secF_dataArr) !== -1){
                        var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
                    }
                    table.row.add([s_no,m_id,dissolved_file,merger_file,dissolved_paid_quarter,dissolved_paid_amount,merger_remaining_quarter,merger_unpaid_amount,schedule_btn]);
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

    // Payment Receipt
    $('#example1').on('click','.btn-provisonal',function(){
        // alert("Working");
        var mid = $(this).attr('data-id');
        var mtype = $(this).attr('data-type');
        console.log(mtype);
        if(mtype == '1'){
            let invoice_url = "invoicereports/merger_letter_one_in_one.php?action=letter_generate&mid="+mid;
            window.open(invoice_url, '_blank');
        }else if(mtype == '2'){
            console.log("djjdkdj");
            let invoice_url = "invoicereports/merger_letter_one_in_two.php?action=letter_generate&mid="+mid;
            window.open(invoice_url, '_blank');
        }else if(mtype == '3'){
            let invoice_url = "invoicereports/merger_letter_two_in_one.php?action=letter_generate&mid="+mid;
            window.open(invoice_url, '_blank');
        }else{
            alert("omly one in one is working");
        }
    });

    //view schedule
    $("#example12").on('click','.btn-schedule-view',function(){
        $('#exampleSchedule').html('');
        var form_no = $(this).attr("data-id");
        $("#ajax-loader").show();
        $(".btn-schedule-view").css('pointer-events','none');
        $(".btn-schedule-view").find($(".fas")).removeClass('fa-analytics').addClass('fa-spin fa-refresh');
        $.ajax({
            url: 'api/sales/merger/merger_api.php',
            type: 'POST',
            data: {action: 'view_schedule',form_no:form_no},
            success: function(response){
                console.log(response);
                $("#ajax-loader").hide();
                $(".btn-schedule-view").css('pointer-events','');
                $(".btn-schedule-view").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-analytics');
                if(response.status == 0){
                    alert(response.message);
                }else{
                    var date = new Date();
                    var current_date = moment(date).format("YYYY-MM-DD");
                    var cnic = response[0].CN0C_NO;
                    var form_no = response[0].FORM_NO;
                    var contact_no = response[0].CONTACT_NO;
                    var cust_name = response[0].CUS_NAME;
                    var email = response[0].EMAIL;
                    var address = response[0].PERM_ADD;
                    var logo_d = response[0].LOGO;
                    var inv_title = response[0].INVOICE_TITLE;
                    var unit_category_name = response[0].UNIT_CAT_NAME;
                    var block_name = response[0].BLOCK_NAME;
                    var street_name = response[0].STREET_NAME;
                    var project_name = response[0].PROJECT_NAME;
                    var plot_name = response[0].PLOT_NAME;
                    logo = logo_d?logo_d.replace('../', ''):'';
                    $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                    $('#inv_title').html('<h1>'+inv_title+'</h1>');
                    $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE NO : '+contact_no+'</p><p>Email : '+email+'</p>');
                    $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>'+block_name+'</p><p>'+project_name+'</p>');
                    $('.btn-schedule-challan').attr('data-id',form_no);

                    // append data in table
                    k = 1;
                    var total_schedule_amount = 0;
                    var total_received_amount = 0;
                    var total_balance = 0;
                    for (var i = 0; i < response.length; i++) {
                        var s_no = k++;
                        var charges_type_name = response[i].CHARGES_TYPE_NAME;
                        var due_date = response[i].DUE_DATE??''; 
                        var schedule_date = response[i].SCHEDULE_DATE??''; 
                        var received_date = response[i].REC_DATE??'';
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = response[i].SCHEDULE_AMOUNT??'0'; 
                        function formatNumber (schedule_amount) {
                            return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                        }
                        var received_amounts = formatNumber(received_amount);
                        var schedule_amounts = formatNumber(schedule_amount); 
                        var cheaque_no = response[i].CHEAQUE_NO??'';
                        var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                        var total_received_amount = total_received_amount + parseInt(received_amount);
                        var total_schedule_amounts=formatNumber(total_schedule_amount);
                        var total_received_amounts=formatNumber(total_received_amount);
                        var balance = parseInt(schedule_amount) - parseInt(received_amount);
                        var balances=formatNumber(balance);
                        var total_balance = total_balance + balance;
                        var total_balances=formatNumber(total_balance);
                        if(balance < 0){
                            $style = "color:red;";
                        }else{
                            $style = "";
                        }
                        $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td></tr>');
                    }
                        $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td></td><td style="text-align:right;">'+total_balances+'</td></tr>');
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
        let invoice_url = "invoicereports/merger_posted_schedule_challan.php?action=invoice_generate&form_no="+form_no;
        window.open(invoice_url, '_blank');
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
    $("#posted_breadcrumb").on("click", function() {
        $.get('sale/merger/merger_posted.php', function(data,status){
            $("#content").html(data);
        });
    });

});

</script>

<?php include '../../includes/loader.php'?>