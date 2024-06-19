<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>File Status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><button class="btn btn-sm" id="file_status_breadcrumb">File Status</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_setup_breadcrumb">Sale Setup</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"> <i class="fas fa-tachometer-alt"></i></li>
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
                    <div class="col-sm-11">
                      <h3 class="card-title">File Status</h3>
                    </div>
                    <div class="col-sm-1">
                      <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-info mt-2 btn-sm 302a1b_1" id="add_button" style="display:none;">  
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
                        <th>SR.No</th>
                        <th>File Status</th>
                        <th>Action On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
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
<!-- ADD Modal -->

<div class="modal fade" id="AddFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">File Status</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="AddForm">
              <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                    <label for="">File Status : </label><span style="color: red">*</span>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                        </div>
                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="50" type="text" class="form-control" name ="file_status" id = "file_status" placeholder="Enter File Status">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="submit" id="insert" class="btn btn-primary"><i class="far fa-plus"></i></button>
              </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="EditFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit File Status</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="EditForm">
              <div class="modal-body">
                <input type="hidden" name="status_id" id="status_id">
                <div class="row">
                    <div class="col-sm-12 form-group">
                    <label for="">File Status : </label><span style="color: red">*</span>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                        </div>
                        <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="50" type="text" class="form-control" name ="edit_file_status" id = "edit_file_status" placeholder="Enter File Status">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="submit" id="update" class="btn btn-primary"><i class="far fa-refresh"></i></button>
              </div>
            </form>
        </div>
    </div>
</div>

<script>
//insertform validations
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#AddForm').validate({
    rules: {
      file_status: {
        required: true,
      }
    },
    messages: {
      file_status: {
        required: "Please Insert a File Status",
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

//editform validations

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#EditForm').validate({
    rules: {
        edit_file_status: {
        required: true,
      }
    },
    messages: {
        edit_file_status: {
        required: "Please Insert a File Status",
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
    //view
    $.ajax({
      url: 'api/sales/SalesSetups/Record_File_Status/sale_setup_file_status_api.php',
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

          if(jQuery.inArray("302a1b_2", secF_dataArr) !== -1){
            var btn_edit = '<button class="btn btn-sm btn-edit 302a1b_2" data-id="'+data[i].ID+'" ><i class="far fa fa-edit text-info  fa-fw"></i></button>';
          }
          // var btn= btn_eye+btn_view;
          table.row.add([sno,
                        data[i].STATUS,
                        data[i].ACTION_ON,                                                                
                        btn_edit
          ]);
        }
        table.draw();

      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
  });
});


    // On Click Open Add Modal
    $("#add_button").click(function() {
      $("#AddFormModal").modal('show');
    });
    // On Click Add Form Submit Add Data
    $("#AddForm").submit(function(e) {
      if ($("#AddForm").valid()) {
        $("#ajax-loader").show();
        $("#insert").css('pointer-events','none');
        $("#insert").find($(".far")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
      e.preventDefault();
      var forms_data = new FormData(this);
      forms_data.append('action','store');
    //   forms_data.append('id',id);
      $.ajax({
        url:'api/sales/SalesSetups/Record_File_Status/sale_setup_file_status_api.php',
          method:'POST',
          data: forms_data,
          contentType:false,
          cache:false,
          processData:false,
        success: function(response){
            $("#ajax-loader").hide();
            var message = response.message;
            var status = response.status;
            $.ajax({
              url: "api/message_session/message_session.php",
              type: 'POST',
              data: {message:message,status:status},
            success: function (data) {
                    $.get('sale/sales_setup/Sale_ASFF_File_Status.php',function(data,status){
                        $('#content').html(data);
                        $('#AddFormModal').modal('hide');
                        $('#AddFormModal input').trigger("reset");
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

          
        },
        error: function(error){
          console.log(error);
          alert("Contact IT Department");
        }
      });
      }
    });

    // // On Click Open Edit Modal
    $("#example1").on('click','.btn-edit',function() {
      let id = $(this).attr('data-id');
      console.log(id);
      $.ajax({
        url: 'api/sales/SalesSetups/Record_File_Status/sale_setup_file_status_api.php',
        type: 'POST',
        data: {action: 'show',id:id},
        dataType: "json",
        success: function(response){
            $("#edit_file_status").val(response.STATUS);
            // Open Edit Modal
            $("#EditFormModal").modal('show');
            // $('body').css('padding-right','0');
          
        },
        error: function(error){
          console.log(e);
          alert("Contact IT Department");
        }
      });
    // On Click Edit Form Submit Data
    $("#EditForm").submit(function(e) {
      if ($("#EditForm").valid()) {
        $("#ajax-loader").show();
        $("#update").css('pointer-events','none');
        $("#update").find($(".far")).removeClass('fa-refresh').addClass('fa-spin fa-refresh');
      e.preventDefault();
      var forms_data = new FormData(this);
      forms_data.append('action','update');
      forms_data.append('id',id);
      $.ajax({
        url:'api/sales/SalesSetups/Record_File_Status/sale_setup_file_status_api.php',
          method:'POST',
          data: forms_data,
          contentType:false,
          cache:false,
          processData:false,
        success: function(response){
            $("#ajax-loader").hide();
            var message = response.message;
            var status = response.status;
            $.ajax({
              url: "api/message_session/message_session.php",
              type: 'POST',
              data: {message:message,status:status},
            success: function (data) {
                    $.get('sale/sales_setup/Sale_ASFF_File_Status.php',function(data,status){
                        $('#content').html(data);
                        $('#EditFormModal').modal('hide');
                        $('#EditFormModal input').trigger("reset");
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

          
        },
        error: function(error){
          console.log(error);
          alert("Contact IT Department");
        }
      });
      }
    });
    
   
});
 // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#file_status_breadcrumb").on("click", function() {
        $.get('sale/sales_setup/Sale_ASFF_File_Status.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#sale_setup_breadcrumb").on("click", function() {
        $.get('sale/sales_setup/sales_setup.php', function(data,status){
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