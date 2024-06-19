<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Capture Image Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="view_breadcrumb">Capture Image Data</button></li>
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
                        <th>BIOMATRIC DATE</th>
                        <th>BIOMATRIC BY</th>
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

<!-- webcam Modal -->
<div class="modal fade" id="image_hrmEmployees" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Employee</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="post" id="hrm_employeesImageForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="hrm_Imageemployee_id" id="hrm_Imageemployee_id">
                      <div class="row">
                          <div class="col-sm-12 form-group text-center">
                              <span id="error_msg" style="color: red;font-size: 13px;"></span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                            <label for="">Click Snapshot : </label>
                            <div id="my_camera" title="click on take snapshot"></div>
                            <br/>
                            <input type=button value="Take Snapshot" id="take_snapshot" class="btn btn-info btn-sm">
                            <input type="hidden" name="images" id="images" class="image-tag">
                          </div>
                        <div class="col-lg-6">
                        <label for="">Snapshot: </label>
                        <label for="">&nbsp;</label><br/>
                            <div onmouseover="this.title='Take Snapshot'" id="results">Your captured image will appear here...</div>
                        </div>
                      </div>
                </div>            
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" id="addHrmEmployeesImage" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                </div>
            </form>
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
        url: 'api/sales/allotte_to_allotte_api.php',
        type: 'POST',
        data: {action: 'capture_image_data'},
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
                  var biometric_date = response[i].BIOMATRIC_ON;
                  var biometric_by = response[i].BIOMATRIC_BY;
                  var image_status = response[i].IMAGE;
                  if(jQuery.inArray("402b2c_1", secF_dataArr) !== -1){
                    var btn = '<button type="button" data-id='+trans_req_id+' title="Print Provisional Letter" class="btn btn-sm btn-action 402b2c_1"><i class="fas fa-print text-info"></i></button>';
                  }
                  table.row.add([s_no,sale_id,form_no,req_date,buyer_name,seller_name,biometric_date,biometric_by,btn]);
              }
              table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

  
});
    
    // Transfer Provisional Letter
  $('#example1').on('click','.btn-action',function(){

    var trans_req_id = $(this).attr("data-id");
    if(confirm("Are you sure you want to print this?")){
      $.ajax({
        url: 'api/sales/allotte_to_allotte_api.php',
        type: 'POST',
        dataType: "json",
        data: {action:'update_provisional_letter',trans_req_id:trans_req_id},
        success: function(response){
            console.log(response.data);
            printChallan(trans_req_id);
            var message = "Provisional Letter Printed Successfully";
            var status = 1;
            $.ajax({
              url: "api/message_session/message_session.php",
              type: 'POST',
              data: {message:message,status:status},
              success: function (response) {
                      $.get('sale/transfer/allottee_to_allottee_image.php',function(data,status){
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

  function printChallan(trans_req_id) {
      let action = 'get_invoice';
      let invoice_url = "invoicereports/transfer_provisional_letter.php?action=provisional_letter_generate&trans_req_id="+trans_req_id;
      window.open(invoice_url, '_blank');
  }

  function getCurrentDate() {
      var months = ['JAN','FEB','MAR','APR','MAY','JUN','JULY','AUG','SEP','OCT','NOV','DEC'];
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(months[today.getMonth()]);
      var yyyy = today.getFullYear();
      today = dd + '-' + mm + '-' + yyyy;
      return today;
  }
    //  Print Challan Fucntion 

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
        $.get('sale/transfer/allottee_to_allottee_image.php', function(data,status){
            $("#content").html(data);
        });
    });
    

</script>

<?php include '../../includes/loader.php'?>