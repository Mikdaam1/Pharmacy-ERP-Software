<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Asset Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="categories_breadcrumb">Assets Categories</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="fa_breadcrumb">Fixed Assets</button></li>
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
                    <?php include '../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 702a1b_1" id="add_button" style="display:none;"><i class="fa fa-plus"></i></button>
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
                      <th>Category Name</th>
                      <th>Category Code</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="InsertForm">
                  <div class="row">
                      <div class="col-sm-6 form-group">
                          <label for="">Category Name :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="category_name" id="category_name" class="form-control form-control-sm" >
                          </div>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="">Category Code :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="category_code" id="category_code" class="form-control form-control-sm" >
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
<!-- Edit  form -->
<div class="modal fade" id="EditFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="EditForm">
                  <div class="row">
                      <div class="col-sm-12 form-group">
                          <label for="">Category Name :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="categoryname_u" id="categoryname_u" class="form-control form-control-sm" >
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
      category_name: {
        required: true,
      },
      category_code: {
        required: true,
      }
     
    },
    messages: {
        category_name: {
        required: "Please enter a category name",
      },
      category_code: {
        required: "Please enter a category code",
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
      categoryname_u: {
        required: true,
      }
    },
    messages: {
      categoryname_u: {
        required: "Please enter a category name",
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
        url: 'api/fixedassets/fixedassets_category_api.php',
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
            
            if(jQuery.inArray("702a1b_2", secF_dataArr) !== -1){
              btn_edit = '<button class="btn btn-sm btn-select 702a1b_2" data-id="'+data[i].ID+'" ><i class="far fa-edit text-info fa-fw"></i></button>';
            }
            // btn_dlt = '<button class="btn btn-sm btn-delete" data-id="'+data[i].ID+'"><i class="far fa-trash-alt text-danger fa-fw"></i></button>';
            btn = btn_edit; 
            table.row.add([sno, data[i].ASSETCATEGORYNAME,data[i].CATEGORY_CODE,btn]);
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

//function for insert open model
//add
$('#add_button').click(function(){
  $('#InsertFormModel').modal('show');
    $("#InsertForm").on('click','#insert',function(){    
      if ($("#InsertForm").valid()) {
          var category_name = $('#category_name').val();
          var category_code = $('#category_code').val();
          console.log(category_name);
          $.ajax({
              url: 'api/fixedassets/fixedassets_category_api.php',
              type:'POST',
              data :  {action:'insert',category_name:category_name,category_code:category_code},
              success: function(response)
              {
                  var message = response.message
                  var status = response.status
                  if(status == 0){
                    $("#msg").html(message);
                  }else{
                    $("#msg").html('');
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                          $.get('Fixedassets/fa_category.php',function(data,status){
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
//edit
  $("#example1").on('click','.btn-select',function(){
    var id = $(this).attr("data-id");
    
    $.ajax({
        url : "api/fixedassets/fixedassets_category_api.php",
        type : "post",
        data : {action:'edit',id:id},
        success: function(response)
        {
          console.log(response);
          $('#categoryname_u').val(response.ASSETCATEGORYNAME);
       
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
        if ($("#EditForm").valid())
        { 
          // console.log(id);
          var categoryname_u = $('#categoryname_u').val();
          $.ajax({
                  url: 'api/fixedassets/fixedassets_category_api.php',
                  type:'POST',
                  data :  {action:'update',categoryname_u:categoryname_u, id:id},
                  success: function(response)
                  {
                    var message = response.message
                    var status = response.status
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                           if(status == 0){
                            $("#msg").html(message);
                           }else{
                            $.get('Fixedassets/fa_category.php',function(data,status){
                              $('#content').html(data);
                              $('#EditFormModel').modal('hide');
                              $('#EditFormModel input').trigger("reset");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
                          });
                           }
                        },
                        error: function(e) 
                        {
                          console.log(e);
                          alert("Contact IT Department");
                        }
                    });
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
  

// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#fa_breadcrumb").on("click", function () {
    $.get('Fixedassets/fixedassets.php', function(data,status){
        $("#content").html(data);
    });
});
$("#categories_breadcrumb").on("click", function () {
    $.get('Fixedassets/fa_category.php', function(data,status){
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
<?php include '../includes/loader.php'?>