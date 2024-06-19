<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Rack</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="Rack_breadcrumb">Rack</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="record_room_breadcrumb">Record Room</button></li>
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
                <div class="card-header">
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 404b1b_1" id="add_button" style="display:none;"><i class="fa fa-plus"></i></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Rack</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
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
                            <select name="room_s" id="room_s" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Rack No :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="number" name="rack_no" id="rack_no" class="form-control " >
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                          <label for="">Active :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-file-check"></i></span>
                              </div>
                              <select name="active" id="active" class="form-control ">
                                <option value="Y">Yes</option>
                                <option value="N">No</option>                          
                              </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                <div style="text-align: center;">
                    <span id="msg" style="color: red;font-size: 13px;"></span>
                </div>
                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Rack</h5>
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
                            <select name="room_e" id="room_e" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Rack No :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="rack_no_e" id="rack_no_e" class="form-control " >
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Active :</label><span style="color:red;">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                            </div>
                            <select name="active_e" id="active_e" class="form-control ">
                                <option value="Y">Yes</option>
                                <option value="N">No</option>                          
                            </select>
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
      rack_no: {
        required: true,
        digits:true,
      },
      active: {
        required: true,
      }
    },
    messages: {
      room_s: {
        required: "Please enter a room name",
      },
      rack_no: {
        required: "Please enter a rack no",
      },
      active: {
        required: "Please select status",
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
      rack_no_e: {
        required: true,
      },
      active_e: {
        required: true,
      }
    },
    messages: {
      room_e: {
        required: "Please enter a room name",
      },
      rack_no_e: {
        required: "Please enter a rack no",
      },
      active_e: {
        required: "Please select status",
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
    url: 'api/sales/Record_Room/sale_rackdetail_api.php',
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
        
        if(jQuery.inArray("404b1b_2", secF_dataArr) !== -1){
          btn_edit = '<button class="btn btn-sm btn-select 404b1b_2" data-id="'+data[i].ID+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
        }
        if(jQuery.inArray("404b1b_3", secF_dataArr) !== -1){
          btn_bar = '<button class="btn btn-sm btn-barcode 404b1b_3" data-id="'+data[i].ID+'" ><i class="far fa-barcode text-info fa-fw"></i></button>';
        }
        btn = btn_edit+btn_bar;
        table.row.add([sno, data[i].ROOM_NAME,data[i].RACK_NO,data[i].BARCODE,btn]);
      }
      table.draw();

    },
    error: function(e){
        console.log(e);
        alert("Contact IT Department");
    }
  });
  $("#sale_rack").css('pointer-events','');
  $("#sale_rack").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
});

//function for insert open model
    // $('#room_s').html("");
    $.ajax({
        url: 'api/sales/Record_Room/sale_rackdetail_api.php',
        type:'POST',
        data: {action:'room'},
        success: function(response)
        {
          $('#room_s').append($('<option disabled selected>Choose Option</option>'));
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
$('#add_button').click(function(){
    $('#InsertFormModel').modal('show');
});

//add
$("#InsertForm").on('click','#insert',function(){
    if ($("#InsertForm").valid()) {
        var room_s = $('#room_s').val();
        var rack_no = $('#rack_no').val();
        var active = $('#active').val();
        $.ajax({
            url: 'api/sales/Record_Room/sale_rackdetail_api.php',
            type:'POST',
            data :  {action:'store',room_s:room_s,rack_no:rack_no,active:active},
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
                        $.get('sale/record_room/room_rack.php',function(data,status){
                            $('#content').html(data);
                            $('#EditFormModel').modal('hide');
                            $('#EditFormModel input').trigger("reset");
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

    $.ajax({
      url: 'api/sales/Record_Room/sale_rackdetail_api.php',
      type:'POST',
      data: {action:'room'},
      success: function(data)
      {
          for (var i=0; i<data.length; i++) {
              $('#room_e').append($('<option>', {  
                  value: data[i].ID,
                  text : data[i].ROOM_NAME
              }));
          }
      },
      error: function(e){
      console.log(e);
      alert("Contact IT Department");
      }
    });
$("#example1").on('click','.btn-select',function(){
    var id = $(this).attr("data-id");
    $.ajax({
        url : "api/sales/Record_Room/sale_rackdetail_api.php",
        type : "post",
        data : {action:'edit',id:id},
        success: function(response)
        {
          
          $('#rack_no_e').val(response.RACK_NO);
          $('#active_e').val(response.STATUS);
          $('#room_e').val(response.ROOM_ID);
          $('#EditFormModel').modal('show');
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
        var rack_no_e = $('#rack_no_e').val();
        var active_e = $('#active_e').val();
        $.ajax({
          url: 'api/sales/Record_Room/sale_rackdetail_api.php',
          type:'POST',
          data :  {action:'update',room_e:room_e,active_e:active_e,rack_no_e:rack_no_e, id:id},
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
                    $.get('sale/record_room/room_rack.php',function(data,status){
                        $('#content').html(data);
                        $('#EditFormModel').modal('hide');
                        $('#EditFormModel input').trigger("reset");
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
    let invoice_url = "invoicereports/rack_barcode.php?action=generate_barcode&id="+id;
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
$("#Rack_breadcrumb").on("click", function () {
    $.get('sale/record_room/room_rack.php', function(data,status){
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