<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Call Reminder Records</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="callremainder_breadcrumb">Call Remainder Records</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="Recovery_breadcrumb">Recovery</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <?php include '../../display_message/display_message.php'?>
                  <table id="example1" class=" table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Form No</th>
                      <th>Customer Name</th>
                      <th>Mobile No1</th>
                      <th>Mobile No2</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Assign From</th>
                      <th>Assigning Date</th>
                      <th>Actions</th>
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
<!-- ./wrapper -->

<!-- Assign  form -->
<div class="modal fade" id="StatusFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Call Status</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="StatusForm">
                <div class="row"> 
                    <div class="col-sm-4 form-group">
                          <label for="">Form No :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="totalform_no" id="totalform_no" class="form-control " readonly >
                          </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Call Type Status :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <select name="call_type_status" id="call_type_status" class="form-control ">                     
                            </select>
                        </div>
                    </div>   
                    <div class="col-sm-4 form-group">
                        <label for="">Status :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <select name="status" id="status" class="form-control ">
                            <option value="" disabled selected>Select...</option>  
                            <option value="Forward">Forward</option>  
                            <option value="Done">Done</option>                      
                            </select>
                        </div>
                    </div>   
                    <div class="col-md-4 form-group"> 
                            <label for="">Next Date : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="date" class="form-control" id="nextsdat" name="nextsdat" >
                            </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-8 form-group">
                      <label for="">Remarks :</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar"></i></span>
                          </div>
                          <textarea rows="1" cols="1" name="desc" id="desc" class="form-control" max="200"></textarea>
                      </div>
                  </div>
                  <div class="col-md-4 form-group"> 
                      <label for="">Departments : </label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                          </div>
                          <select name="DepartmentId" id="DepartmentId" class="form-control"></select>
                      </div>
                  </div>
                </div>
                <div class="row">
                </div>
                <div class="row text-right">
                    <div style="margin:  auto;">
                        <span id="msg" style="color: green;font-size: 13px;"></span>
                    </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="button" id="Assign" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<script>

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');


$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#StatusForm').validate({
    rules: {
      totalform_no: {
        required: true,
      },
      call_type_status: {
        required: true,
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
  

$(document).ready(function(){
  $("#ajax-loader").show();
  $('#DepartmentId').html("");
  $.ajax({
        url: 'api/fixedassets/fixedassets_api.php',
        type:'POST',
        data: {action:'departments'},
        success: function(response)
        {
          // console.log(response);
            $('#DepartmentId').append($('<option disabled selected>Choose Option</option>'));
            for (var i=0; i<response.length; i++) {
                $('#DepartmentId').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].NAME
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
  $("#example1").ready(function(){
    let table = $('#example1').DataTable({
    dom: 'Bfrtip',
    orderCellsTop: true,
    fixedHeader: true,
    
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis',
            ]
    });


    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
              }
        });
    });

    $.ajax({
      url: 'api/sales/Recovery/recovery_callremainder_api.php',
      type:'POST',
      data: {action:'view'},
      success: function(data) {
        console.log(data);
          // console.log(data);
        $("#ajax-loader").hide();
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < data.length; i++) {
          sno++;
          // btn = btn_edit+btn_info+btn_bar;
          // var schedule_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
          
          if(jQuery.inArray("403b1b_1", secF_dataArr) !== -1){
            var btn = '<button type="button" data-depart='+data[i].ASSIGN_TO_DEPART+'  data-remarks='+data[i].REMARKS+'  datas='+data[i].STATUS+' data-id='+data[i].ID+' data='+data[i].REG_NO+' class="btn btn-sm btn-addstatus 403b1b_1" title="Add Customer Status"><i class="fas fa-edit text-info fa-fw" ></i></button>';
          }
          table.row.add([sno, data[i].REG_NO,data[i].CUS_NAME,data[i].MOBILE_NO1,data[i].MOBILE_NO2,data[i].EMAIL,data[i].STATUS,data[i].ASSIGN_FROM,data[i].ASSIGN_TO_AGENT_DATE,btn]);
        }
        table.draw();
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $("#call_remainder").css('pointer-events','');
    $("#call_remainder").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
  });
});

$(document).ready(function(){
  $.ajax({
      url: 'api/sales/Recovery/recovery_callremainder_api.php',
      type:'POST',
      data: {action:'call_type_status'},
      success: function(response)
      {
          if(response)
          {
              for (var i=0; i<response.length; i++) {
                  $('#call_type_status').append($('<option>', { 
                      value: response[i].ID,
                      text : response[i].NAME
                  }));
              }
          }
      },
      error: function(e) 
      {
      console.log(e);
      alert("Contact IT Department");
      }
  });
});

//edit
$("#example1").on('click','.btn-addstatus',function(){
    var id = $(this).attr("data-id");
    var form = $(this).attr("data");
    var status = $(this).attr("datas");
    var remarks = $(this).attr("data-remarks");
    var depart = $(this).attr("data-depart");
    // console.log(status);
    $('#totalform_no').val(form);
    $('#status').val(status);
    $('#status').val(status);
    $('#desc').val(remarks);
    $('#DepartmentId').val(depart);
    $('#StatusFormModel').modal('show');
});
    //insert
$("#StatusForm").on('click','#Assign',function(){
  if ($("#StatusForm").valid()) {
    var form=$('#totalform_no').val();
    var call_type_status=$('#call_type_status').val();
    var status=$('#status').val();
    var nextsdat=$('#nextsdat').val();
    var desc=$('#desc').val();
    var departid=$('#DepartmentId').val();
    $.ajax({
      url : "api/sales/Recovery/recovery_callremainder_api.php",
      type : "post",
      data : {action:'insert',form:form,call_type_status:call_type_status,status:status,nextsdat:nextsdat,desc:desc,departid:departid},
      success: function(response)
      {
        var message = response.message
              var status = response.status
              if(status == 0){
                $("#msg").html(message).css("color","red");
              }else{
                $.ajax({
                    url: "api/message_session/message_session.php",
                    type: 'POST',
                    data: {message:message,status:status},
                    success: function (response) {
                      $.get('sale/Recovery/recovery_callremainder.php',function(data,status){
                          $('#content').html(data);
                          $('#AssignFormModel').modal('hide');
                          $('#AssignFormModel input').trigger("reset");
                          $(".modal-backdrop").remove();
                          $('body').removeClass('modal-open');
                      });
                    },
                    error: function(e) 
                    {
                      console.log(e);
                      alert("Contact IT Department");
                    }
                });
              }
      },
      error: function(e) 
      {
        console.log(e);
        alert("Contact IT Department");
      }
    });
  }
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#Recovery_breadcrumb").on("click", function () {
    $.get('sale/Recovery/recovery.php', function(data,status){
        $("#content").html(data);
    });
});
$("#callremainder_breadcrumb").on("click", function () {
    $.get('sale/Recovery/recovery_callremainder.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>