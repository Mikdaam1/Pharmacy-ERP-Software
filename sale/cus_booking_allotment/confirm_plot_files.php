<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Confirm Plot Files</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="confirm_booking_breadcrumb">Confirm</button></li>
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
                      <h3 class="card-title">Confirm Category Files Customers Record</h3>
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
                        <th>Letter Issue Date</th>
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
        url: 'api/sales/cus_confirm_booking_api.php',
        type: 'POST',
        data: {action: 'alloted_files'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              var s_no = k++;
              var form_no = response[i].FORM_NO;
              var cus_id = response[i].CUS_ID;
              var cust_name = response[i].CUS_NAME;
              var cnic = response[i].CNIC_NO;
              var contact_no = response[i].CONTACT_NO;
              var letter_date = response[i].LETTERDATE;
            //   var permission_approval_plot = response[i].ASSIGN_PLOT_PERMISSSION;
              var currdate = new Date();
              var current_date = moment(current_date).format("YYYY-MM-DD");
              var letter_date = moment(letter_date).format("YYYY-MM-DD");

              
            if(jQuery.inArray("402a3c_1", secF_dataArr) !== -1){
                if(letter_date <= current_date){
                  var btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-letter 402a3c_1" title="Get Letter"><i class="far fa-print text-info fa-fw" ></i></button>';
                }else{
                  var btn = '<button type="button" class="btn btn-sm 402a3c_1" style="pointer-events:none;"><i class="far fa-print text-danger fa-fw"></i></button>';
                }
                // if(permission_approval_plot == 1){                  
                //   var allot_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-allot 402a3c_2" title="Allot Plot"><i class="far fa-plus text-info fa-fw" ></i></button>';
                //   var allot_btn=btn+allot_btn;
                // }
                // else{
                //   var allot_btn=btn;

                // }
            }
              table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,letter_date,btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

$('#example1').on('click','.btn-letter',function () {
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/letter.php?action=LG&fn="+form_no;
    window.open(invoice_url, '_blank');
})

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
$("#confirm_booking_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/confirm_plot_files.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>