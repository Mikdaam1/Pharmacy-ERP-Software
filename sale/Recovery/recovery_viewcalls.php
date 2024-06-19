<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Calls Records</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="viewcall_breadcrumb">View Calls Records</button></li>
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
                    <th>Agent</th>
                    <th>Email</th>
                    <th>Status</th>
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
    <div class="modal-dialog modal-lg" role="document">
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
                          <label for="">Total Form No :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="totalform_no" id="totalform_no" class="form-control " readonly >
                          </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Status :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <input type="hidden" name="a_id_m" id="a_id_m" class="form-control form-control-sm" >
                            <select name="status" id="status" class="form-control ">
                            <option value="Received">Received</option>  
                            <option value="Engaged">Engaged</option>
                            <option value="Busy">Busy</option>
                            <option value="Phone_Off">Phone Off</option>                         
                            </select>
                        </div>
                    </div>   
                    <div class="col-md-4 form-group">
                        <label for="">Remarks :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" cols="1" name="desc" id="desc" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                <div class="row text-right">
                    <div style="margin:  auto;">
                        <span id="msg" style="color: green;font-size: 13px;"></span>
                    </div>
                </div>
                <div class="row text-right">
                    <div style="margin:  auto;">
                        <span id="msg1" style="color: red;font-size: 13px;"></span>
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
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#StatusForm').validate({
    rules: {
      agents: {
        required: true,
      }
    },
    messages: {
      agents: {
        required: "Please select agents",
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
      url: 'api/sales/Recovery/recovery_viewcall_api.php',
      type:'POST',
      data: {action:'view'},
      success: function(data) {
          console.log(data);
        $("#ajax-loader").hide();
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < data.length; i++) {
          sno++;
          // btn = btn_edit+btn_info+btn_bar;
          // var schedule_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
          var btn = '<button type="button" data-id='+data[i].ID+' data='+data[i].FORM_NO+' class="btn btn-sm btn-addstatus" title="Add Agent Status"><i class="fas fa-edit text-info fa-fw" ></i></button>';
          table.row.add([sno, data[i].REG_NO,data[i].NAMENAME,data[i].EMAIL,data[i].STATUS]);
        }
        table.draw();
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $("#viewcalls").css('pointer-events','');
    $("#viewcalls").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
  });
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
$("#viewcall_breadcrumb").on("click", function () {
    $.get('sale/Recovery/recovery_viewcalls.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>