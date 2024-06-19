<?php
session_start();
include("../../api/auth/db.php");

$current_date = date('j-M-y');
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Provisional Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="view_breadcrumb">Provisional Data</button></li>
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
                        <th>PROVISIONAL DATE</th>
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
        url: 'api/sales/allotte_to_allotte_api.php',
        type: 'POST',
        data: {action: 'provisional_data'},
        dataType: "json",
        success: function(response){
        console.log(response);
            $("#ajax-loader").hide();
            
              table.clear().draw();
              // append data in datatable
              k = 1;
              for (var i = 0; i < response.length; i++) {
                  // j = i++;
                  var s_no = k++;
                  var trans_req_id = response[i].TRANS_REQ_ID;
                  var sale_id = response[i].SALE_ID;
                  var form_no = response[i].FORM_NO;
                  var req_date = response[i].REQ_DATE;
                  var buyer_name = response[i].BUYER_NAME;
                  var seller_name = response[i].SELLER_NAME;
                  var provisional_date = response[i].PROVISIONAL_DATE;
                  var TodayDate = moment().format('DD-MM-YYYY');
                  var add15DayInProvisionalDate = moment(provisional_date).add(00, 'days').format("DD-MM-YYYY");
                  console.log(add15DayInProvisionalDate);
                  var today = new Date();
                  var dd = String(today.getDate()).padStart(2, '0');
                  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                  var yyyy = today.getFullYear();

                  today = dd + '-' + mm + '-' + yyyy;
                  console.log(today);
                  if(add15DayInProvisionalDate == today){
                    if(jQuery.inArray("402b2d_1", secF_dataArr) !== -1){
                      var btn = '<button type="button" data-id='+trans_req_id+' class="btn btn-approve btn-primary 402b2d_1">Approve</button>';
                    }
                  }else{
                    var btn='-';
                  }
                  // console.log(add15DayInProvisionalDate);
                  // console.log(provisional_date);
                  table.row.add([s_no,sale_id,form_no,req_date,buyer_name,seller_name,add15DayInProvisionalDate+' '+TodayDate,btn]);
              }
              table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    
    // print approve
    $("#example1").on('click','.btn-approve',function(){
        // get the current row
        if(confirm("Are you sure you want to print this?")){
            var trans_req_id = $(this).attr("data-id");
            $.ajax({
                url: 'api/sales/allotte_to_allotte_api.php',
                type: 'POST',
                data: {action: 'action_to_approve_allottee',trans_req_id:trans_req_id},
                success : function(response) {
                    console.log(response);
                    var message = response.message
                    var status = response.status

                    $.ajax({
                    url: "api/message_session/message_session.php",
                    type: 'POST',
                    data: {message:message,status:status},
                    success: function (response) {
                        $.get('sale/transfer/allottee_to_allottee_approved.php',function(data,status){
                            $('#content').html(data);
                        });
                    },
                    error: function(e) 
                    {
                        console.log(e);
                        alert("Contact IT Department");
                    }   
                    
                    })
                },
                error : function(e) {
                    console.log(e);
                    alert("Contact IT Department");
                }
            });
        }else{
          return false;
  }
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
    $("#allottee_to_allottee_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#view_breadcrumb").on("click", function() {
        $.get('sale/transfer/allottee_to_allottee_provisional.php', function(data,status){
            $("#content").html(data);
        });
    });

});
</script>

<?php include '../../includes/loader.php'?>