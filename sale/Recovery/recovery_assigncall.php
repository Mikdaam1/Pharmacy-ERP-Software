<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Unpaid Due Quarters</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="assigncall_breadcrumb">Unpaid Due Quarters</button></li>
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
                <div class="card-header">
                  <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <h3 class="card-title">Unpaid Due Quarters Records</h3>
                    </div>
                    <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2 403b1a_1" id="assign_button" style="display:none;"> Assign Calls</i></button>
                    </div>
                  </div> 
                  <div class="row">
                      <div class="col-sm-12 form-group text-center">
                          <span id="error_msg" style="color: red;font-size: 13px;"></span>
                      </div>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  Count of Selected Records : <span id="dvcount"></span>
                  <table id="example1" class=" table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th>
                      <th>SNO</th>
                      <th>Sale ID</th>
                      <th>Form No</th>
                      <th>Total Pending</th>
                      <th>Customer</th>
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
<!-- ./wrapper -->

<!-- Assign  form -->
<div class="modal fade" id="AssignFormModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Calls</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="AssignForm">
                <div class="row">
                    <div class="col-md-9 form-group"> 
                        <label for="">Agents : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-secret"></i></span>
                            </div>
                            <select name="agents" id="agents" class="form-control" multiple></select>
                        </div>
                    </div>
                </div>
                <div class="row text-right">
                    <div style="margin:  auto;">
                        <span id="msg" style="font-size: 15px;"></span>
                    </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="button" id="Assign" class="btn btn-primary"><i class="far fa-plus"></i></button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- customer detail view -->
<div class="modal fade" id="CustomerDetailModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Detail</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="EditMinForm">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">File Number :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="form_no" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Sale ID :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="sale_id" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Name :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="cus_name" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Phone No1 :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="phone_no1" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Phone No2 :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="phone_no2" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">CNIC NO :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="cnic" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Country :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="country" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Province :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="province" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">City :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="city" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Email :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">SWD :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="swd" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Date Of Birth :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="date_of_birth" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Address :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input id="address" class="form-control" readonly>
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
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#AssignForm').validate({
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
    url: 'api/sales/Recovery/recovery_api.php',
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
        var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+data[i].FORM_NO+'>';
        var btn_view = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-view 402a2c_2" title="Edit Supplementary Challan"><i class="far fa-eye text-info fa-fw" ></i></button>';
        var statement_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
        btn = statement_btn+btn_view;
        table.row.add([checkboxes,sno, data[i].SALE_ID,data[i].FORM_NO,data[i].TOTAL_PENDING,data[i].CUS_NAME,btn]);
      }
      table.draw();
    },
    error: function(e){
        console.log(e);
        alert("Contact IT Department");
    }
  });

  $("#all_check").click(function() {
      var rows = table.rows({ 'search': 'applied' }).nodes();

      // debugger;
      if($('input:checked', rows).length == rows.length){
        console.log("1");
          $('input[type="checkbox"]', rows).prop('checked', false);
      }else{
        console.log("2");
          $('input[type="checkbox"]', rows).prop('checked', true);
      }


      $('#dvcount').html($(rows).find("input:checked").length);

      $("body").on("change","input",function() {

          var rows = table.rows({ 'search': 'applied' }).nodes();
          $('#dvcount').html($(rows).find("input:checked").length);

      });
  });
  
  $("#assign_calls").css('pointer-events','');
  $("#assign_calls").find($(".fas")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
  
});

  
$('#example1').on('click','.btn-view',function(){
  $("#ajax-loader").show();
  var form_no = $(this).attr('data-id');

  $.ajax({
      url: 'api/sales/Recovery/recovery_api.php',
      type:'POST',
      dataType: "json",
      data:{action:'customer_info',form_no:form_no},
      success: function(response) {
          $("#ajax-loader").hide();
          console.log(response);
          $('#form_no').val(response.FORM_NO);
          $('#sale_id').val(response.SALE_ID);
          $('#cus_name').val(response.CUS_NAME);
          $('#phone_no1').val(response.CONTACT_NO);
          $('#phone_no2').val(response.CONTACT_NO2);
          $('#cnic').val(response.CNIC_NO);
          $('#email').val(response.EMAIL);
          $('#address').text(response.PERM_ADD);
          $('#date_of_birth').val(response.DOB);
          $('#country').val(response.COUNTRY_NAME);
          $('#province').val(response.PROVINCE_NAME);
          $('#city').val(response.CITY_NAME);
          $('#project').val(response.PROJECT_NAME);
          $('#campaign').val(response.CAMPAIGN_NAME);
          $('#date_of_birth').val(response.DATE_OF_BIRTH);
          $('#swd').val(response.SWD);
          $('#CustomerDetailModel').modal('show');
          
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
      
  }); 
});
$(document).ready(function(){
  $('#agents').html("");
    $.ajax({
        url: 'api/sales/Recovery/recovery_api.php',
        type:'POST',
        data: {action:'agents'},
        success: function(response)
        {
            // console.log(response.length);
            for (var i=0; i<response.length; i++) {
                $('#agents').append($('<option>', {  
                    value: response[i].ID,
                    text : response[i].NAMENAME
                }));
            }
        },
        error: function(e){
          console.log(e);
          alert("Contact IT Department");
        }
    });
});
//function for Assign open model
$('#assign_button').click(function(){
    var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
    if(ck_box < 1){
        $("#error_msg").text("please check at least one quater");
    }else{
      $('#AssignFormModel').modal('show');
    }
});

//add
$("#AssignForm").on('click','#Assign',function(){
  
    //get all checked values
    var matches = [];
    var table = $('#example1').dataTable();
    var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
    checkedcollection.each(function (index, elem) {
        matches.push($(elem).val());
    });
    var bulkchecked = matches;
    //get all checked values

    var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
    if(ck_box < 1){
        $("#msg").text("please check at least one quater");
    }else{
      if ($("#AssignForm").valid()) {

        $("#ajax-loader").show();
        $(this).css('pointer-events','none');
        $(this).find($(".far")).removeClass('fa-plus').addClass('fa-spin fa-refresh');

        var agents = $('#agents').val();
        
        $.ajax({
            url: 'api/sales/Recovery/recovery_api.php',
            type:'POST',
            data :  {action:'store',agents:agents,bulkchecked:bulkchecked},
            success: function(response)
            {
                // console.log(response);
                $("#ajax-loader").hide();
                $("#Assign").css('pointer-events','');
                $("#Assign").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
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
                        $.get('sale/Recovery/recovery_assigncall.php',function(data,status){
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
$("#assigncall_breadcrumb").on("click", function () {
    $(this).css('pointer-events','none');
    $(this).find($(".fas")).removeClass('fa-circle').addClass('fa-spin fa-refresh');
    $.get('sale/Recovery/recovery_assigncall.php', function(data,status){
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