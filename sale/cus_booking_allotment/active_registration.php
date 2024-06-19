<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="active_reg_breadcrumb">Active Registration</button></li>
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
                      <h3 class="card-title">Active Registration Customers Record</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-responsive" >
                    <thead>
                      <tr>
                        <th>SR.No</th>
                        <th>Project Sale ID</th>
                        <th>Sale ID</th>
                        <th>Form No</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Block</th>
                        <th>Type</th>
                        <th>Total Installment</th>
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
        url: 'api/sales/active_registration_api.php',
        type: 'POST',
        data: {action: 'active_reg'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              var s_no = k++;
              var project_sale_id = response[i].PROJECT_SALE_ID;
              var sale_id = response[i].SALE_ID;
              var form_no = response[i].FORM_NO;
              var cust_name = response[i].NAME;
              var contact_no = response[i].CONTACT_NO;
              var cnic = response[i].CNIC;
              var address = response[i].ADDRESS;
              var email = response[i].EMAIL;
              var block = response[i].BLOCK;
              var type = response[i].TYPE;
              var total_inst = response[i].TOT_INST;
              var amount = response[i].AMT;
            //   var permission_approval_plot = response[i].ASSIGN_PLOT_PERMISSSION;
              var currdate = new Date();
              var current_date = moment(current_date).format("YYYY-MM-DD");
              var letter_date = moment(letter_date).format("YYYY-MM-DD");

              
            if(jQuery.inArray("402a3c_1", secF_dataArr) !== -1){
            }
              table.row.add([s_no,project_sale_id,sale_id,form_no,cust_name,contact_no,cnic,address,email,
              block,type,total_inst,amount]);
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
$("#active_reg_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/active_registration.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>