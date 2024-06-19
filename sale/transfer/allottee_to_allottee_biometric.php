<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biometric Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="view_breadcrumb">Biometric Data</button></li>
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
                        <th>Image Status</th>
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Customer Image</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="post" id="hrm_employeesImageForm" enctype="multipart/form-data">
                <div class="modal-body">
                      <input type="hidden" name="hrm_Imageemployee_id" id="hrm_Imageemployee_id">
                      <div class="row">
                        <div class="col-lg-6 text-center">
                          <label for="">Seller Image </label>
                          <div id="seller_img" class="border border-dark">
                            <!-- <img class="seller" id="seller"> -->
                          </div>
                          <br/>
                        </div>
                        <div class="col-lg-6 text-center">
                          <label for="">Buyer Image </label>
                          <div id="buyer_img" class="border border-dark">
                            <!-- <img class="buyer" id="buyer"> -->
                          </div>
                          <br/>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12 form-group text-center">
                              <span id="error_msg" style="color: red;font-size: 13px;"></span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12">
                            <label for="">Click Snapshot : </label>
                            <div id="my_camera" title="click on take snapshot"></div>
                            <br/>

                            <input type=button value="Take Snapshot" id="take_snapshot" class="btn btn-info btn-sm">
                            <input type="hidden" name="images" id="images" class="image-tag">
                            <input type="hidden" name="images" id="image_buyer" class="image-tag_buyer">
                          </div>
                          <!-- <div class="col-lg-6">
                            <label for="">Snapshot: </label>
                            <label for="">&nbsp;</label>
                            <br/>
                            <div onmouseover="this.title='Take Snapshot'" id="results">Your captured image will appear here...</div>
                            <br/>
                            <input type=button value="Approve Snapshot" id="take_snapshot_captured" class="btn btn-info btn-sm float-right" style="display:none;">
                          </div> -->
                      </div>
                      <div class="row">
                        
                        <div class="col-sm-4 form-group">
                          <label for="">Allottee Type :</label><span style="color:red;">*</span>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <select name="allottee_id" id="allottee_id" class="form-control">
                                <option value="seller">Seller</option>
                                <option value="buyer">Buyer</option>
                            </select>
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
  Webcam.attach( '#my_camera' ); 
  $('#my_camera,video').removeAttr('style',''); 
  $('#my_camera video').css('width','100%'); 
  function show_seller_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('seller_img').innerHTML = '<img style="width: 100%;height: 100%;" src="'+data_uri+'"/>';
    });
  }
  function show_buyer_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag_buyer").val(data_uri);
        document.getElementById('buyer_img').innerHTML = '<img style="width: 100%;height: 100%;" src="'+data_uri+'"/>';
    });
  } 

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
        data: {action: 'biometric_data'},
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
                  if(image_status == 'Y'){
                    var image_status = 'Image Found' ;
                  }else{
                    var image_status = 'Image Not Found' ;
                  }
                  if(jQuery.inArray("402b2c_1", secF_dataArr) !== -1){
                    var btn_camera='<button class="btn btn-sm btn-image 302a1a_4" title="Upload Employee Image" data-id='+trans_req_id+' ><i class="fas fa-camera text-warning"></i></button>';
                  }
                  var btn=btn_camera;
                  table.row.add([s_no,sale_id,form_no,req_date,buyer_name,seller_name,biometric_date,biometric_by,image_status,btn]);
              }
              table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    
  // On Click Open Image Modal
  $("#example1").on('click','.btn-image',function() {
        $("#error_msg").text("");
        let trans_req_id = $(this).attr('data-id');
        $("#image_hrmEmployees").modal('show');

      // Employee Image Submit
      $("#hrm_employeesImageForm").on("submit", function(e) {
        e.preventDefault();
        var data = new FormData(this);
        // var upload_image = $('input[name="hrm_employeeImageUpload"]')[0].files[0];

        // Webcam capture Image
        var seller_img = $('#images').val();
        console.log(seller_img);
        var buyer_img = $('#image_buyer').val();
        console.log(buyer_img);
        if($.trim(seller_img) != null && $.trim(buyer_img) != null){
          $("#error_msg").text("please take a snapshot first");
        }else{
          // $("#ajax-loader").show();
          // $("#addHrmEmployeesImage").css('pointer-events','none');
          // $("#addHrmEmployeesImage").find($(".fas")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
          // console.log(webcam_image);
          data.append('seller_img',seller_img);
          data.append('buyer_img',buyer_img);
          data.append('action','employee_image_webcam');
          data.append('trans_req_id',trans_req_id);
          $.ajax({
            url: 'api/sales/allotte_to_allotte_api.php',
            type: 'POST',
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response){
                // $("#ajax-loader").hide();
                var message = response.message;
                var status = response.status;
                console.log(message);
                // $.ajax({
                //   url: "api/message_session/message_session.php",
                //   type: 'POST',
                //   data: {message:message,status:status},
                //   success: function (data) {
                //         $.get('sale/transfer/allottee_to_allottee_biometric.php',function(data,status){
                //             $('#content').html(data);
                //             $('#image_hrmEmployees').modal('hide');
                //             $('#image_hrmEmployees input').trigger("reset");
                //             $(".modal-backdrop").remove();
                //             $('body').removeClass('modal-open');
                //         });
                //   },
                //   error: function(e) 
                //   {
                //     console.log(e);
                //     alert("Contact IT Department");
                //   }
                // });        

            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
          });
        }
        
      });
      // Click On Snap Shot 
      $("#take_snapshot").click(function() {
        var type = $('#allottee_id').val();
        if(type == 'seller'){
          show_seller_snapshot();
        }else{
          show_buyer_snapshot();
        }
        // $('#take_snapshot_captured').css('display','');
      });
      // Click On Snap Shot  captured
      // $("#take_snapshot_captured").click(function() {
      //   $('#take_snapshot_captured').css('display','none');
      //   var type = $('#allottee_id').val();
      //   if(type == 'seller'){
      //     show_seller_snapshot();
      //   }else{
      //     show_buyer_snapshot();
      //   }

      // });
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
                      $.get('sale/transfer/allottee_to_allottee_biometric.php',function(data,status){
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
        $.get('sale/transfer/allottee_to_allottee_biometric.php', function(data,status){
            $("#content").html(data);
        });
    });
    

</script>

<?php include '../../includes/loader.php'?>