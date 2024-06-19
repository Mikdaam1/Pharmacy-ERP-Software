<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>File Record</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="File_breadcrumb">File</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="record_room_breadcrumb">Record Room</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
              </ol>
            </div>   
          </div>
          <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="value1">Loading...</h3>

                <p id="Name1" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="value2">Loading...</h3>

                <p id="Name2" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="value3">Loading...</h3>

                <p id="Name3" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="value0">Loading...</h3>

                <p id="Name0" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 404b1d_1" id="add_button" style="display:none;"><i class="fa fa-plus"></i></button>
                    </div>
                  </div> 
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <table id="example1" class=" table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Room Name</th>
                      <th>Rack No</th>
                      <th>Shelf No</th>
                      <th>File No</th>
                      <th>P_Id/Sale_Id</th>
                      <th>Barcode</th>
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

<!-- insert  form -->
<div class="modal fade" id="InsertFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New File</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group text-center">
                    <span id="er_msg" style="color: red;font-size: 13px;"></span>
                </div>
            </div>
            <div class="modal-body">
              <form id="InsertForm">
                <div class="row">
                    <div class="col-md-4 form-group"> 
                        <label for="">Room : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="room_s" id="room_s" class="form-control room_s"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Rack : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="rack_s" id="rack_s" class="form-control rack_s"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Shelf : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="shelf_no" id="shelf_no" class="form-control shelf_no"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">File Number :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="form_s" id="form_s" class="form-control form_s" >
                        </div>
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                        <span id="code_error" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Category Type : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        <input type="text" class="form-control" id="category_type" name="category_type" readonly >
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Department :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="depart" id="depart" class="form-control depart"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"> 
                        <label for="">Employees :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="employee_s" id="employee_s" class="form-control employee_s"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                            <label for="">Date : </label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="date" class="form-control" id="todaysdat" name="todaysdat" >
                            </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">In/Out :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <input type="hidden" name="a_id" id="a_id" class="form-control form-control-sm" >
                            <select name="active" id="active" class="form-control ">
                            <option value="Out">Out</option>
                            <option value="In">In</option>                          
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Remarks :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" cols="1" name="desc" id="desc" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Status : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="status" id="status" class="form-control status"></select>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                <div style="text-align: center;">
                    <span id="msg" style="color: red;font-size: 13px;"></span>
                </div>
                </div> -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="button" id="insert" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit  form -->
<div class="modal fade" id="EditFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="EditForm">
                <div class="row">
                    <div class="col-md-4 form-group"> 
                        <label for="">Room : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="room_e" id="room_e" class="form-control room_e"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Rack : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="rack_e" id="rack_e" class="form-control rack_e"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Shelf : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="shelf_no_e" id="shelf_no_e" class="form-control shelf_no_e"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">File Number :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="form_e" id="form_e" class="form-control form_e" readonly >
                        </div>
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                        <span id="code_error" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">P.ID :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="pid_e" id="pid_e" class="form-control" readonly >
                        </div>
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                        <span id="code_error" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Category Type : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        <input type="text" class="form-control" id="edit_category_type" name="edit_category_type" readonly >
                        </div>
                    </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="button" id="update_data" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Minimum  form -->
<div class="modal fade" id="EditMinFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign File</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="EditMinForm">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">File Number :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="form_m" id="form_m" class="form-control form_m" readonly >
                        </div>
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                        <span id="code_error" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">P.ID :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="pid_s" id="pid_s" class="form-control" readonly >
                        </div>
                        <span id="msg" style="color: red;font-size: 13px;"></span>
                        <span id="code_error" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Department : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="depart_m" id="depart_m" class="form-control depart_m"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"> 
                        <label for="">Employees : </label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="employee_m" id="employee_m" class="form-control employee_m"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Status : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="status_e" id="status_e" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                            <label for="">Date : </label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="date" class="form-control" id="todaysdat_m" name="todaysdat_m" >
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">In/Out :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <input type="hidden" name="a_id_m" id="a_id_m" class="form-control form-control-sm" >
                            <select name="active_m" id="active_m" class="form-control ">
                            <option value="Out">Out</option>
                            <option value="In">In</option>                          
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-4 form-group">
                        <label for="">Remarks :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <textarea rows="1" cols="1" name="desc_m" id="desc_m" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="button" id="update_limdata" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
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
  $('#InsertForm').validate({
    rules: {
      room_s: {
        required: true,
      },
      rack_s: {
        required: true,
      },
      shelf_no: {
        required: true,
      },
      form_s: {
        required: true,
      },
      todaysdat: {
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
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#EditForm').validate({
    rules: {
      room_e: {
        required: true,
      },
      rack_e: {
        required: true,
      },
      shelf_no_e: {
        required: true,
      },
      form_e: {
        required: true,
      }
    },
    messages: {
      room_e: {
        required: "Please select a room name",
      },
      rack_e: {
        required: "Please select a rack number",
      },
      shelf_no_e: {
        required: "Please select a shelf number",
      },
      form_e: {
        required: "Please select a file number",
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
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#EditMinForm').validate({
    rules: {
      form_m: {
        required: true,
      },
      depart_m: {
        required: true,
      },
      employee_m: {
        required: true,
      },
      todaysdat_m: {
        required: true,
      },
      active_m: {
        required: true,
      }
    },
    messages: {
      form_m: {
        required: "Please insert a file number",
      },
      depart_m: {
        required: "Please select a department name",
      },
      employee_m: {
        required: "Please select a employee name",
      },
      todaysdat_m: {
        required: "Please select a date",
      },
      active_m: {
        required: "Please select a status",
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
$('document').ready(function(){
    $.ajax({
      url: 'api/sales/Record_Room/sale_filedetail_api.php',
      type:'POST',
      data: {action:'showstats1'},
      success: function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#Name'+i).html(data[i].NAME);
          $('#value'+i).html(data[i].TOTAL_COUNT);
        }
      },
      error: function(e){
          console.log(e);                    
          alert("Contact IT Department");
      }
    });
});
$("#example1").ready(function(){
  $("#ajax-loader").show();
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
    url: 'api/sales/Record_Room/sale_filedetail_api.php',
    type:'POST',
    data: {action:'view'},
    success: function(data) {
      $("#ajax-loader").hide();
      // Empty datatable previouse records
      table.clear().draw();
      // append data in datatable
      var sno='0';
      for (var i = 0; i < data.length; i++) {
        sno++;

        if(jQuery.inArray("404b1d_2", secF_dataArr) !== -1){
          btn_edit = '<button class="btn btn-sm btn-select 404b1d_2" data-id="'+data[i].ID+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
        }
        if(jQuery.inArray("404b1d_4", secF_dataArr) !== -1){
          btn_info = '<button class="btn btn-sm btn-sel 404b1d_4" data-id="'+data[i].ID+'" ><i class="far fa-broadcast-tower text-info fa-fw"></i></button>';
        }
        if(jQuery.inArray("404b1d_3", secF_dataArr) !== -1){
          btn_bar = '<button class="btn btn-sm btn-barcode 404b1d_3" data-id="'+data[i].ID+'" ><i class="far fa-barcode text-info fa-fw"></i></button>';
        }
        btn = btn_edit+btn_info+btn_bar;
        table.row.add([sno, data[i].ROOM_NAME,data[i].RACK_NO,data[i].SHELF_NO,
                     data[i].FILE_NO,data[i].SALE_ID,data[i].BARCODE,btn]);
      }
      table.draw();
    },
    error: function(e){
        console.log(e);
        alert("Contact IT Department");
    }
  });
  $("#sale_file").css('pointer-events','');
  $("#sale_file").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
});


//function for insert open model
$('#add_button').click(function(){
    $('#room_s').html("");
    $('#rack_s').html("");
    $('#shelf_no').html("");
    $('#form_s').html("");
    $('#depart').html("");
    $('#employee_s').html("");
    $('#todaysdat').html("");
    $('#pid').html("");
    $('#desc').html("");
    $.ajax({
        url: 'api/sales/Record_Room/sale_shelfdetail_api.php',
        type:'POST',
        data: {action:'room'},
        success: function(response)
        {
          $('#room_s').append($('<option value="0" disabled selected>Choose Option</option>'));
            for (var i=0; i<response.length; i++) {
                $('#room_s').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].ROOM_NAME
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
    $.ajax({
        url: 'api/sales/Record_Room/sale_filedetail_api.php',
        type:'POST',
        data: {action:'Department'},
        success: function(response)
        {
            $('#depart').html("");
            $('#depart').append($('<option value="0" selected>Choose Option</option>'));
            for (var i=0; i<response.length; i++) {
                $('#depart').append($('<option>', {  
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
    $.ajax({
        url: 'api/sales/Record_Room/sale_filedetail_api.php',
        type:'POST',
        data: {action:'file_status'},
        success: function(response)
        {
          $('#status').append($('<option value="0" disabled selected>Choose Option</option>'));
            for (var i=0; i<response.length; i++) {
                $('#status').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].STATUS
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
    $("#InsertForm").on('change','.depart',function(){
      var depart=$('#depart').val();
        $.ajax({
            url: 'api/sales/Record_Room/sale_filedetail_api.php',
            type:'POST',
            data: {action:'employees',depart:depart},
            success: function(response)
            {
                $('#employee_s').html("");
                $('#employee_s').append($('<option value="0" selected>Choose Option</option>'));
                for (var i=0; i<response.length; i++) {
                    $('#employee_s').append($('<option>', {  
                        value: response[i].ID,
                        text : response[i].FIRST_NAME
                    }));
                }
            },
            error: function(e){
            console.log(e);
            alert("Contact IT Department");
            }
        });
    });

    $('#InsertFormModel').modal('show');
});


    $("#InsertForm").on('change','.room_s',function(){
        $('#rack_s').html("");
        $('#shelf_no').html("");
        var room_s=$('#room_s').val();
        console.log(room_s);
        $.ajax({
            url: 'api/sales/Record_Room/sale_shelfdetail_api.php',
            type:'POST',
            data: {action:'rack',room_s:room_s},
            success: function(response)
            {
                $('#rack_s').html("");
                for (var i=0; i<response.length; i++) {
                    $('#rack_s').append($('<option>', {  
                        value: response[i].ID,
                        text : response[i].RACK_NO
                    }));
                }
                var rack_s=$('#rack_s').val();
                $('#shelf_no').html("");
                $.ajax({
                    url: 'api/sales/Record_Room/sale_filedetail_api.php',
                    type:'POST',
                    data: {action:'initialshelf',rack_s:rack_s,room_s:room_s},
                    success: function(response)
                    {
                        console.log(response);
                        for (var i=0; i<response.length; i++) {
                            $('#shelf_no').append($('<option>', {  
                                value: response[i].ID,
                                text : response[i].SHELF_NO
                            }));
                        }
                    },
                    error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
            },
            error: function(e){
            console.log(e);
            alert("Contact IT Department");
            }
        });
    });
    $("#InsertForm").on('change','.rack_s',function(){
        $('#shelf_no').html("");
        var rack_s=$('#rack_s').val();
        var room_s=$('#room_s').val();
        $.ajax({
            url: 'api/sales/Record_Room/sale_filedetail_api.php',
            type:'POST',
            data: {action:'shelf',rack_s:rack_s,room_s:room_s},
            success: function(response)
            {
                
                for (var i=0; i<response.length; i++) {
                    $('#shelf_no').append($('<option>', {  
                        value: response[i].ID,
                        text : response[i].SHELF_NO
                    }));
                }
            },
            error: function(e){
            console.log(e);
            alert("Contact IT Department");
            }
        });
    });
 // message for same code
$("#InsertForm").ready(function(){
  $("#form_s").keyup(function(){
      $("#msg").html('');
      var form_s = $("#form_s").val();
      $.ajax({
        url: 'api/sales/Record_Room/sale_filedetail_api.php',
        type: 'POST',
        data: {action:'checkFormExist',form_s:form_s},
        success: function (response) {
          console.log(response);
          if(response.status == "0"){
            $("#form_s").css("background-color", "pink");
            $("#code_error").text(response.message);
            $('#category_type').val('')
          }else{
            $("#form_s").css("background-color", "");
            $("#code_error").text("");
            $.ajax({
              url: 'api/sales/Record_Room/sale_filedetail_api.php',
              type: 'POST',
              data: {action:'get_unit_category',form_s:form_s},
              success: function (data) {
                // console.log(data);
                  $('#category_type').val(data)
                
              },
              error: function(e) 
              {
                console.log(e);
                alert("Contact IT Department");
              }   
            
            })
          }
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }   
       
      })
  });
});
//on change room, rec change automatically 
//add
$("#InsertForm").on('click','#insert',function(){
    $("#er_msg").html('');
    if ($("#InsertForm").valid()) {
        var room_s = $('#room_s').val();
        var rack_s = $('#rack_s').val();
        var shelf_no = $('#shelf_no').val();
        var form_s = $('#form_s').val();
        var file_s = $('#file_s').val();
        var depart = $('#depart').val();
        var employee_s = $('#employee_s').val();
        var todaysdat = $('#todaysdat').val();
        var active = $('#active').val();
        var desc = $('#desc').val();
        var status = $('#status').val();
        $.ajax({
            url: 'api/sales/Record_Room/sale_filedetail_api.php',
            type:'POST',
            data :  {action:'store',room_s:room_s,rack_s:rack_s,shelf_no:shelf_no,
                    form_s:form_s,depart:depart,employee_s:employee_s,todaysdat:todaysdat,desc:desc,
                    active:active,status:status},
            success: function(response)
            {
                console.log(response);
                var message = response.message
                var status = response.status
                if(status == 0){
                  $("#er_msg").html(message);
                }else{
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                        $.get('sale/record_room/room_file.php',function(data,status){
                            $('#content').html(data);
                            $('#InsertFormModel').modal('hide');
                            $('#InsertFormModel input').trigger("reset");
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
//edit
$("#example1").on('click','.btn-select',function(){
  
    $('#room_e').html("");
    $('#rack_e').html("");
    $('#shelf_no_e').html("");
    $('#form_e').html("");
    var id = $(this).attr("data-id");
    $.ajax({
        url : "api/sales/Record_Room/sale_filedetail_api.php",
        type : "post",
        data : {action:'edit',id:id},
        success: function(response)
        {
          // console.log(response.SALE_ID);
            var rack_e=response.RACK_NO;
            var roomid=response.ROOM_ID;
            var date=response.DEPART_ID;
            $.ajax({
                url: 'api/sales/Record_Room/sale_shelfdetail_api.php',
                type:'POST',
                data: {action:'room'},
                success: function(data)
                {
                    $('#room_e').html("");
                    
                    for (var i=0; i<data.length; i++) {
                        $('#room_e').append($('<option>', {  
                            value: data[i].ID,
                            text : data[i].ROOM_NAME
                        }));
                    }
                    $('#room_e').val(roomid);
                },
                error: function(e){
                console.log(e);
                alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/sales/Record_Room/sale_shelfdetail_api.php',
                type:'POST',
                data: {action:'rack_edit',roomid:roomid},
                success: function(data)
                {
                    console.log(data);
                    $('#rack_e').html("");
                    
                    for (var i=0; i<data.length; i++) {
                        $('#rack_e').append($('<option>', {  
                            value: data[i].ID,
                            text : data[i].RACK_NO
                        }));
                    }
                    $('#rack_e').val(response.RACK_NO);
                },
                error: function(e){
                console.log(e);
                alert("Contact IT Department");
                }
            });
            $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data: {action:'rack_edit',roomid:roomid},
                success: function(data)
                {
                    console.log(data);
                    $('#rack_e').html("");
                    
                    for (var i=0; i<data.length; i++) {
                        $('#rack_e').append($('<option>', {  
                            value: data[i].ID,
                            text : data[i].RACK_NO
                        }));
                    }
                    $('#rack_e').val(response.RACK_NO);
                },
                error: function(e){
                console.log(e);
                alert("Contact IT Department");
                }
            });
            $.ajax({
                    url: 'api/sales/Record_Room/sale_filedetail_api.php',
                    type:'POST',
                    data: {action:'initialshelf',rack_s:rack_e,room_s:roomid},
                    success: function(data)
                    {
                        console.log(data);
                        for (var i=0; i<data.length; i++) {
                            $('#shelf_no_e').append($('<option>', {  
                                value: data[i].ID,
                                text : data[i].SHELF_NO
                            }));
                        }
                        $('#shelf_no_e').val(response.SHELF_NO);
                    },
                    error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                    }
            });
          $('#form_e').val(response.FILE_NO);
          $('#pid_e').val(response.SALE_ID);
          $('#edit_category_type').val(response.DESCRIPTION);
          
          $('#EditFormModel').modal('show');
            $("#EditForm").on('change','.room_e',function(){
                $('#rack_e').html("");
                $('#shelf_no_e').html("");
                var room_e=$('#room_e').val();
                console.log(room_e);
                $.ajax({
                    url: 'api/sales/Record_Room/sale_filedetail_api.php',
                    type:'POST',
                    data: {action:'rack',room_e:room_e},
                    success: function(response)
                    {
                        $('#rack_e').html("");
                        for (var i=0; i<response.length; i++) {
                            $('#rack_e').append($('<option>', {  
                                value: response[i].ID,
                                text : response[i].RACK_NO
                            }));
                        }
                        
                var rack_e=$('#rack_e').val();
                console.log(rack_e);
                $('#shelf_no_e').html("");
                $.ajax({
                    url: 'api/sales/Record_Room/sale_filedetail_api.php',
                    type:'POST',
                    data: {action:'initialshelf_edit',rack_e:rack_e,room_e:room_e},
                    success: function(data )
                    {
                        console.log(data );
                        for (var i=0; i<data .length; i++) {
                            $('#shelf_no_e').append($('<option>', {  
                                value: data [i].ID,
                                text : data [i].SHELF_NO
                            }));
                        }
                    },
                    error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
                    },
                    error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
            });
            $("#EditForm").on('change','.rack_e',function(){
                $('#shelf_no_e').html("");
                var rack_e=$('#rack_e').val();
                var room_e=$('#room_e').val();
                $.ajax({
                    url: 'api/sales/Record_Room/sale_filedetail_api.php',
                    type:'POST',
                    data: {action:'shelfedit',rack_e:rack_e,room_e:room_e},
                    success: function(response)
                    {
                        
                        for (var i=0; i<response.length; i++) {
                            $('#shelf_no_e').append($('<option>', {  
                                value: response[i].ID,
                                text : response[i].SHELF_NO
                            }));
                        }
                    },
                    error: function(e){
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
                
            });
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
  	});
    //update
    $("#EditForm").on('click','#update_data',function(){ 
      if ($("#EditForm").valid()) {
        var room_e = $('#room_e').val();
        var rack_e = $('#rack_e').val();
        var pid = $('#pid_e').val();
        var shelf_no_e = $('#shelf_no_e').val();
       
        $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data :  {action:'update',room_e:room_e,rack_e:rack_e,
                shelf_no_e:shelf_no_e, id:id,pid:pid},
                success: function(response)
                {
                  var message = response.message
                var status = response.status
                if(status == 0){
                  $("#msg").html(message);
                }else{
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                        $.get('sale/record_room/room_file.php',function(data,status){
                            $('#content').html(data);
                            $('#InsertFormModel').modal('hide');
                            $('#InsertFormModel input').trigger("reset");
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
});


//edit limited data
$("#example1").on('click','.btn-sel',function(){
  $('#employee_s').html("");
    var id = $(this).attr("data-id");
    $.ajax({
        url : "api/sales/Record_Room/sale_filedetail_api.php",
        type : "post",
        data : {action:'edit',id:id},
        success: function(response)
        {
          console.log(response);
          var depart=response.DEPART_ID;
          $('#pid_s').val(response.SALE_ID);
            $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data: {action:'Department'},
                success: function(data)
                {
                  // console.log(data);
                  $('#depart_m').html("");
                  $('#depart_m').append($('<option value="0" selected>Choose Option</option>'));
                  for (var i=0; i<data.length; i++) {
                      $('#depart_m').append($('<option>', {  
                          value: data[i].ID,
                          text : data[i].NAME
                      }));
                  }
                  $('#depart_m').val(response.DEPART_ID);
                },
                error: function(e){
                  console.log(e);
                  alert("Contact IT Department");
                }
            });

            $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data: {action:'initialemployees',depart:depart},
                success: function(data)
                {
                  // console.log(data);
                    $('#employee_m').html("");
                    $('#employee_m').append($('<option value="0" selected>Choose Option</option>'));
                    for (var i=0; i<data.length; i++) {
                        $('#employee_m').append($('<option>', {  
                            value: data[i].ID,
                            text : data[i].FIRST_NAME
                        }));
                    }
                    $('#employee_m').val(response.TO_USER);
                },
                error: function(e){
                console.log(e);
                alert("Contact IT Department");
                }
            });
            
            $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data: {action:'file_status',id:id},
                success: function(data)
                {
                  $('#status_e').append($('<option value="0" disabled selected>Choose Option</option>'));
                    for (var i=0; i<data.length; i++) {
                        $('#status_e').append($('<option>', {  
                            value: data[i].ID,
                            text : data[i].STATUS
                        }));
                    }
                    $('#status_e').val(response.FILE_STATUS);
                },
                error: function(e){
                  console.log(e);
                  alert("Contact IT Department");
                }
            });
            
          $('#form_m').val(response.FILE_NO);
          $('#todaysdat_m').val(response.TO_USER_ON);
          $('#active_m').val(response.STATUS);
          $('#desc_m').val(response.REMARKS);
          $('#EditMinFormModel').modal('show');
          $("#EditMinForm").on('change','.depart_m',function(){
              var depart_m=$('#depart_m').val();
              $.ajax({
                  url: 'api/sales/Record_Room/sale_filedetail_api.php',
                  type:'POST',
                  data: {action:'employees',depart:depart_m},
                  success: function(data)
                  {
                      $('#employee_m').html("");
                      // $('#employee_m').append($('<option value="0" selected>Choose Option</option>'));
                      for (var i=0; i<data.length; i++) {
                          $('#employee_m').append($('<option>', {  
                              value: data[i].ID,
                              text : data[i].FIRST_NAME
                          }));
                      }
                      $('#employee_e').val(response.TO_USER);
                  },
                  error: function(e){
                  console.log(e);
                  alert("Contact IT Department");
                  }
              });
          });
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
  	});
    //update
    $("#EditMinForm").on('click','#update_limdata',function(){ 
      if ($("#EditMinForm").valid()) {
        var depart_m = $('#depart_m').val();
        var employee_m = $('#employee_m').val();
        var todaysdat_m = $('#todaysdat_m').val();
        var active_m = $('#active_m').val();
        var desc_m = $('#desc_m').val();
        var pid_s = $('#pid_s').val();
        var status_e = $('#status_e').val();
        $.ajax({
                url: 'api/sales/Record_Room/sale_filedetail_api.php',
                type:'POST',
                data :  {action:'assign',active_m:active_m,
                id:id,depart_m:depart_m,employee_m:employee_m,
                todaysdat_m:todaysdat_m,desc_m:desc_m,status_e:status_e,pid_s:pid_s},
                success: function(response)
                {
                  var message = response.message
                var status = response.status
                if(status == 0){
                  $("#msg").html(message);
                }else{
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                        $.get('sale/record_room/room_file.php',function(data,status){
                            $('#content').html(data);
                            $('#EditMinFormModel').modal('hide');
                            $('#EditMinFormModel input').trigger("reset");
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
});
//barcode
$("#example1").on('click','.btn-barcode',function(){
    var id = $(this).attr("data-id");
    let invoice_url = "invoicereports/file_barcode.php?action=generate_barcode&id="+id;
    window.open(invoice_url, '_blank');
});

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#record_room_breadcrumb").on("click", function () {
    $.get('sale/record_room/record_room.php', function(data,status){
        $("#content").html(data);
    });
});
$("#File_breadcrumb").on("click", function () {
    $.get('sale/record_room/room_file.php', function(data,status){
        $("#content").html(data);
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