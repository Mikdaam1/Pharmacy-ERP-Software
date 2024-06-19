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
            <h1>Agent Providers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="agent_breadcrumb">Agent List</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="sales_setup_breadcrumb">Sales Setup</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
            </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Components -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="total_registration">0</h3>
                <p>Total Registration</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="total_paid_registration">0</h3>
                <p>Paid Registration</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="paid_today_invoice">0</h3>
                <p>Today Invoices</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="paid_monthly_invoice">0</h3>
                <p>Monthly Invoices</p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.Components -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <?php include './../../display_message/display_message.php'?>
                <div class="row">
                    <div class="col-sm-11">
                      <h3 class="card-title">Agent Records</h3>
                    </div>
                    <div class="col-sm-1">
                          <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-info mt-2 btn-sm 402c2c_1" id="add_button" style="display:none;">  
                                <i class="fa fa-plus"></i> 
                            </button>
                          </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>FIRST_NAME</th>
                        <th>LAST_NAME</th>
                        <th>BUSINESS_NAME</th>
                        <th>CONTACT_NO</th>
                        <th>EMAIL</th>
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
$(document).ready(function(){
    $("#ajax-loader").show();
    $('#example1').ready(function(){
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
        // Stats
        $.ajax({
            url: 'api/sales/PaidRegistrationsStats/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index'},
            dataType: "json",
            success: function(response){
              $("#total_registration").text(response.data[0].TOTAL_CUSTOMER_REGISTRATIONS);
              $("#total_paid_registration").text(response.data[1].PAID_REGISTRATIONS);
              $("#paid_today_invoice").text(response.data[4].PAID_TODAY_INVOICE);
              $("#paid_monthly_invoice").text(response.data[5].PAID_MONTHLY_INVOICE);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        // *********
        // Fetch Data
        $.ajax({
            url: 'api/sales/SalesSetups/AgentRegistration/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                table.clear().draw();
                // append data in datatable
                k = 1;
                for (var i = 0; i < response.data.length; i++) {
                    // j = i++;
                    var s_no = k++;
                    var first_name = response.data[i].FIRST_NAME;
                    var last_name = response.data[i].LAST_NAME;
                    var business_name = response.data[i].BUSINESS_NAME;
                    var contact_no = response.data[i].CONTACT_NO;
                    var email = response.data[i].EMAIL;
                    var company_website = response.data[i].COMPANY_WEBSITE;
                    var zip_code = response.data[i].ZIP_CODE;
                    var ntn = response.data[i].NTN;
                    table.row.add([s_no,first_name,last_name,business_name,contact_no,email]);
                }
                table.draw();
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        //  Redirect Land Provider registration
        $("#add_button").click(function() {
            $.get('sale/sales_setup/Sale_ASFF_Agent.php', function(data, status) {
              $("#content").html(data); 
            });
        });
    });
});


// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$('#agent_breadcrumb').click(function(){
    $.get('sale/sales_setup/Sale_ASFF_Agent_Listing.php', function(data,status){
        $('#content').html(data);
    });
});
$('#sales_setup_breadcrumb').click(function(){
    $.get('sale/sales_setup/sales_setup.php',function(data,status){
        $('#content').html(data);
    });
});

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');

for (let i = 0; i < secF_dataArr.length; i++) {
    $('.'+secF_dataArr[i]).show();
    console.log(secF_dataArr[i]);
}
</script>
<?php include '../../includes/loader.php'?>