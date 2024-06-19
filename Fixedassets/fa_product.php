<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Fixed Assets Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="products_breadcrumb">Assets Products</button></li>
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
                            <button type="button" class="btn btn-info btn-sm mt-2 702a1c_1" id="add_button" style="display:none;"><i class="fa fa-plus"></i></button>
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
                      <th>Category</th>
                      <th>Office</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Location</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="InsertForm">
                  <div class="row">  
                    <div class="col-sm-4 form-group">
                            <label for="">Location :</label><span style="color:red;">*</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="hidden" name="lo_id" id="lo_id" class="form-control form-control-sm" >
                                <select name="location_id" id="location_id" class="form-control form-control-sm">
                                </select>
                            </div>
                        </div>
                      <div class="col-sm-4 form-group">
                          <label for="">Offices :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input type="hidden" name="of_id" id="of_id" class="form-control form-control-sm" >
                              <select name="office_id" id="office_id" class="form-control form-control-sm">
                              </select>
                          </div>
                      </div>
                      
                      <div class="col-sm-4 form-group">
                          <label for="">Category :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input type="hidden" name="c_id" id="c_id" class="form-control form-control-sm" >
                              <select name="cat_id" id="cat_id" class="form-control form-control-sm cat_s">
                              </select>
                          </div>
                      </div> 
                      <div class="col-sm-4 form-group">
                          <label for="">Quantity :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" min="1" maxlength="2" type="number" name="quantity" id="quantity" class="form-control form-control-sm" >
                          </div>
                      </div> 
                      <div class="col-sm-8 form-group">
                          <label for="">Product Description :</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <textarea rows="1" cols="1" name="desc" id="desc" class="form-control"></textarea>
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
<!-- View  form -->
<div class="modal fade" id="ViewFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Single Product Detail</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>S.no</th>
                            <th>Description</th>
                            <th>Barcode</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ViewForm"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //description edit modal -->
<div class="modal fade" id="EditDesModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="EditDesForm">
                  <div class="row">
                      <div class="col-sm-4 form-group">
                          <label for="">Barcode :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="barcode_e" id="barcode_e" class="form-control form-control-sm" disabled >
                          </div>
                      </div> 
                      <div class="col-sm-8 form-group">
                          <label for="">Description :</label><span style="color:red;">*</span>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                              </div>
                              <textarea rows="1" cols="1" name="desc_e" id="desc_e" class="form-control"></textarea>
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

//insertform validations
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#InsertForm').validate({
    rules: {
      location_id: {
        required: true,
      },
      office_id: {
        required: true,
      },
      cat_id: {
        required: true,
      },
      quantity: {
        required: true,
      },
     
    },
    messages: {
      location_id: {
        required: "Please select a Location",
      },
      office_id: {
        required: "Please select a Office",
      },
      cat_id: {
        required: "Please select a Category",
      },
      quantity: {
        required: "Please enter a Quantity",
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
  $('#EditDesForm').validate({
    rules: {
      desc_e: {
        required: true,
      }  
    },
    messages: {
      desc_e: {
        required: "Please add a product description",
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

//function for insert open model

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
        url: 'api/fixedassets/fixedassets_product_api.php',
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

            if(jQuery.inArray("702a1c_2", secF_dataArr) !== -1){
              var btn_eye = '<button class="btn btn-sm btn-view 702a1c_2" data-id="'+data[i].ID+'" ><i class="far fa fa-eye text-info  fa-fw"></i></button>';
            }
            if(jQuery.inArray("702a1c_3", secF_dataArr) !== -1){
              var btn_barcode='<button class="btn btn-sm btn-bar 702a1c_3" data-id="'+data[i].ID+'" ><i class="far fa-barcode text-info fa-fw"></i></button>';
            }
            var btn= btn_eye+btn_barcode;
            table.row.add([sno,
                          data[i].ASSETCATEGORYNAME,
                          data[i].OFFICE_NAME,
                          data[i].DESCRIPTION,
                          data[i].QUANTITY,
                          data[i].LOCATION_NAME,
                          btn
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
 
// all dropdown in insert form
$('#add_button').click(function(){
    $('#cat_id').html("");
    $('#office_id').html("");
    $('#location_id').html("");
    //account type
    $.ajax({
        url: 'api/fixedassets/fixedassets_api.php',
        type:'POST',
        data: {action:'category'},
        success: function(response)
        {
          $('#cat_id').append($('<option disabled selected>Choose Option</option>'));

            for (var i=0; i<response.length; i++) {
                $('#cat_id').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].ASSETCATEGORYNAME
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
    $.ajax({
        url: 'api/fixedassets/fixedassets_office_api.php',
        type:'POST',
        data: {action:'view'},
        success: function(response)
        {
          $('#office_id').append($('<option disabled selected>Choose Option</option>'));

            for (var i=0; i<response.length; i++) {
                $('#office_id').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].OFFICE_NAME
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
    $.ajax({
        url: 'api/fixedassets/fixedassets_api.php',
        type:'POST',
        data: {action:'location'},
        success: function(response)
        {
          $('#location_id').append($('<option disabled selected>Choose Option</option>'));
            for (var i=0; i<response.length; i++) {
                $('#location_id').append($('<option>', {  
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
    $('#InsertFormModel').modal('show');
});

//insert 
$("#InsertForm").on('click','#insert',function(){    
  if ($("#InsertForm").valid()) {
    var location_id = $('#location_id').val();
    var office_id = $('#office_id').val();
    var cat_id = $('#cat_id').val();
    var quantity = $('#quantity').val();
    var desc = $('#desc').val();
      $.ajax({
          url: 'api/fixedassets/fixedassets_product_api.php',
          type:'POST',
          data :  {action:'insert',location_id:location_id,cat_id:cat_id,office_id:office_id
          ,quantity:quantity,desc:desc},
          success: function(response)
          {
              var message = response.message
              var status = response.status
              $.ajax({
                  url: "api/message_session/message_session.php",
                  type: 'POST',
                  data: {message:message,status:status},
                  success: function (response) {
                    $.get('Fixedassets/fa_product.php',function(data,status){
                        $('#content').html(data);
                        $('#InsertFormModel').modal('hide');
                        $('#InsertFormModel input').trigger("reset");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                    });
                  },
                  error: function(e){
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

//view form data
$("#example1").on('click','.btn-view',function(){
  $('#ViewForm').html('');
  var id = $(this).attr("data-id");
    //view
  $.ajax({
    url: 'api/fixedassets/fixedassets_product_api.php',
    type:'POST',
    data: {action:'view_barcodes',id:id},
    success: function(data) {
      // Empty datatable previouse records
      var k=1;
      for (var i = 0; i < data.length; i++) {
          var s_no = k++;
          var desc = data[i].DESCRIPTION;
          var barcode = data[i].BARCODE;
          var btn_edit ='<button class="btn btn-sm btn-edit" data-id="'+barcode+'"><i class="far fa fa-edit text-info  fa-fw"></i></button>' ;
          var btn_barcode ='<button class="btn btn-sm btn-singlebarcode" data-id="'+barcode+'"><i class="far fa fa-barcode text-info  fa-fw"></i></button>' ;
          var btn_delete ='<button class="btn btn-sm btn-delete" data-id="'+id+'" data-code="'+barcode+'"><i class="far fa fa-trash-alt fa-danger text-danger  fa-fw"></i></button>' ;
          var btn = btn_edit+btn_barcode+btn_delete;
          $('#ViewForm').append('<tr><td>'+s_no+'</td><td>'+desc+'</td><td style="text-align:center;">'+barcode+'</td><td style="text-align:center;">'+btn+'</td></tr>');
      }
      $('#ViewFormModel').modal('show');
    },
    error: function(e){
        console.log(e);
        alert("Contact IT Department");
    }
  });
  $('#ViewFormModel').modal('show');  
});

//edit description
$("#ViewForm").on('click','.btn-edit',function(){
    var barcode = $(this).attr("data-id");
    $.ajax({
        url : "api/fixedassets/fixedassets_product_api.php",
        type : "post",
        data : {action:'editproduct',barcode:barcode},
        success: function(response)
        {
          $('#barcode_e').val(response.BARCODE);
          $('#desc_e').val(response.DESCRIPTION);
       
          $('#EditDesModel').modal('show');
        },
        error: function(e) 
        {
          console.log(e);
          alert("Contact IT Department");
        }
  	});
  //update
    $("#EditDesForm").on('click','#update_data',function(){
      if ($("#EditDesForm").valid())
      {
        var desc_u = $('#desc_e').val();
        $.ajax({
          url: 'api/fixedassets/fixedassets_product_api.php',
          type:'POST',
          data :  {action:'update',desc_u:desc_u,barcode:barcode},
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
                      $.get('Fixedassets/fa_product.php',function(data,status){
                        $('#content').html(data);
                        $('#EditDesModel').modal('hide');
                        $('#EditDesModel input').trigger("reset");
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
            alert("Contact IT Department");
            console.log(e);
          }
        });
      }
    });
});
   
//print multiple barcode
$("#example1").on('click','.btn-bar',function(){
    var product_id = $(this).attr("data-id");
    let invoice_url = "invoicereports/fa_prod_multi_barcodes.php?action=generate_barcode&PrID="+product_id;
    window.open(invoice_url, '_blank');
});
$("#example2").on('click','.btn-singlebarcode',function(){
    var barcode = $(this).attr("data-id");
    let invoice_url = "invoicereports/fa_prod_single_barcode.php?action=generate_singbarcode&bars="+barcode;
    window.open(invoice_url, '_blank');
});

$("#example2").on('click','.btn-delete',function(){
  var barcode = $(this).attr("data-code");
  var id = $(this).attr("data-id");
  if (confirm("Do you want to delete")){
    $.ajax({
        url : "api/fixedassets/fixedassets_product_api.php",
        type : "post",
        data : {action:'delete',barcode:barcode,id:id},
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
                    $.get('Fixedassets/fa_product.php',function(data,status){
                      $('#content').html(data);
                      $('#ViewFormModel').modal('hide');
                      $('#ViewFormModel input').trigger("reset");
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
  }else{
    return false;
  }
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
$("#products_breadcrumb").on("click", function () {
    $.get('Fixedassets/fa_product.php', function(data,status){
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