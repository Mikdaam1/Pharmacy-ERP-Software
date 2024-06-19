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
            <h1>New Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item"><button class="btn btn-sm"><i class="fa fa-tachometer-alt"></i></button></li>
              <li class="breadcrumb-item active">Sales</li>
              <li class="breadcrumb-item active">Sale</li>
              <li class="breadcrumb-item active">New Booking</li>
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
                      <h3 class="card-title">Paid Customers Record</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SR.No</th>
                        <th>Form No</th>
                        <th>CUS ID</th>
                        <th>Customer Name</th>
                        <th>CNIC</th>
                        <th>Contact No</th>
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
<!-- Edit Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Booking Form</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="" id="AddForm">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Project</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-tasks"></i></span>
                                    </div>
                                    <input type="hidden" class="form-control" name ="cus_id" id = "cus_id">
                                    <input type="text" class="form-control" name ="project" id = "project" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Campaign</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-globe-asia"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="campaign" id = "campaign" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name ="current_date" id = "current_date" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Form Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-book"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="form_number" id = "form_number" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Customer</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="customer" id = "customer" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">CNIC</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="cnic" id = "cnic" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">S/o,D/o,W/o</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user-friends"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="relation" id = "relation" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Contact</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="contact" id = "contact" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Unit Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="unit_type" id = "unit_type" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Sub Project</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-piggy-bank"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "sub_proj" id="sub_proj">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Select Block</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-piggy-bank"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "block" id="block">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Select Plot</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-piggy-bank"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "plot" id="plot">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Time Frame</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-piggy-bank"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "time_frame" id="time_frame">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="checkboxes" style="display:none">
                            <div class="col-sm-4 form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="booking" id="booking" value="1">
                                    <label for="booking">
                                        Booking
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="confirmation" id="confirmation" value="2" disabled>
                                    <label for="confirmation">
                                        Confirmation
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="allotment" id="allotment" value="3" disabled>
                                    <label for="allotment">
                                        Allotment
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary" id="add-booking"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
<script type="text/javascript">
$('#example1').ready(function(){
    let table = $('#example1').DataTable({
    dom: 'Bfrtip',
    orderCellsTop: true,
    fixedHeader: true,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print','colvis'
    ],
    // "processing": true,
    // "serverSide": true,
    // "ajax": {
    //   url: 'api/sales/NewCustomerRegistration/ActionsHandler.php',
    //   type: 'POST',
    //   data: {action : 'index'},
    //   success: function(response){
    //     console.log(response);
    //   }
    // }
  });

  $.ajax({
    url: 'api/sales/customer_booking_api.php',
    type: 'POST',
    data: {action: 'paid_cus_record'},
    success: function(response){
        table.clear().draw();
        // append data in datatable
        k = 1;
        for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var id = response[i].ID;
            var form_no = response[i].FORM_NO;
            var cus_id = response[i].CUS_ID;
            var cust_name = response[i].CUS_NAME;
            var cnic = response[i].CNIC_NO;
            var contact_no = response[i].CONTACT_NO;
            var btn = '<button type="button" data-id='+cus_id+' class="btn btn-sm btn-addbooking" title="Add New Booking"><i class="fa fa-plus text-info fa-fw" ></i></button>';
            table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
        }
            table.draw();
    },
    error: function(error){
        console.log(error);
    }
  });
});
//function for edit open model
$("#example1").on('click','.btn-addbooking',function(){
    $('#checkboxes').css('display','none');
    $('#time_frame').html('');
    $('#sub_proj').html('');
    $('#block').html('');
    $('#plot').html('');
    var cus_id = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/customer_booking_api.php',
        type:'POST',
        data: {action:'edit',cus_id:cus_id},
        success: function(response)
        {
            console.log(response);
            if(response)
            {
                campaign_id = response.CAMPAIGN_ID;
                project_id = response.PROJECT_ID;
                unit_type_id = response.UNIT_CATEGORY_ID;
                var d = new Date();
                var current_date = moment(d).format("YYYY-MM-DD");
                $('#cus_id').val(cus_id);
                $('#current_date').val(current_date);
                $('#form_number').val(response.FORM_NO);
                $('#customer').val(response.CUS_NAME);
                $('#cnic').val(response.CNIC_NO);
                $('#contact').val(response.CONTACT_NO);
                $('#relation').val(response.RELATION);
                $('#exampleModal').modal('show'); 

                //get campaign
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_campaign',id:campaign_id},
                    success: function(response)
                    {
                        if(response)
                        {
                            $('#campaign').val(response.REMARKS);
                        }
                    },
                    error: function(e) 
                    {
                    console.log(e);
                    alert("Contact IT Department");
                    }
                }); 
                //get project
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_project',id:project_id},
                    success: function(response)
                    {
                        if(response)
                        {
                            $('#project').val(response.PARTICULARS);
                        }
                    },
                    error: function(e) 
                    {
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
                //get unit type
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_unit_type',id:unit_type_id},
                    success: function(response)
                    {
                        if(response)
                        {
                            $('#unit_type').val(response.DESCRIPTION);
                        }
                    },
                    error: function(e) 
                    {
                    console.log(e);
                    alert("Contact IT Department");
                    }
                });
                // time frame list
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_time_frame_acc_unit_type',unit_type_id:unit_type_id},
                    success: function(response)
                    {
                        if(response)
                        {
                            for (var i=0; i<response.length; i++) {
                                $('#time_frame').append($('<option>', { 
                                    value: response[i].TIME_FRAME_ID,
                                    text : response[i].TIME_FRAME
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
                // get sub project list
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_all_projects'},
                    success: function(response)
                    {
                        if(response)
                        {
                            for (var i=0; i<response.length; i++) {
                                $('#sub_proj').append($('<option>', { 
                                    value: response[i].PROJECT_ID,
                                    text : response[i].PARTICULARS
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
                // get blocks list
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_all_blocks'},
                    success: function(response)
                    {
                        if(response)
                        {
                            for (var i=0; i<response.length; i++) {
                                $('#block').append($('<option>', { 
                                    value: response[i].BLOCK_ID,
                                    text : response[i].DESCRIPTION
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
                //get plot
                var block_id = $('#block').val();
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'get_blots_acc_block',block_id:block_id,unit_type_id:unit_type_id},
                    success: function(response)
                    {
                        console.log(response);
                        if(response)
                        {
                            for (var i=0; i<response.length; i++) {
                                $('#plot').append($('<option>', { 
                                    value: response[i].MATERIAL_CODE,
                                    text : response[i].DESCRIPTION
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
                //block change
                $("#block").change(function(){
                    $('#plot').html('');
                    var block_id = $(this).val();
                    $.ajax({
                        url: 'api/sales/cus_booking_allotment_api.php',
                        type:'POST',
                        data: {action:'get_blots_acc_block',block_id:block_id,unit_type_id:unit_type_id},
                        success: function(response)
                        {
                            console.log(response);
                            if(response)
                            {
                                for (var i=0; i<response.length; i++) {
                                    $('#plot').append($('<option>', { 
                                        value: response[i].MATERIAL_CODE,
                                        text : response[i].DESCRIPTION
                                    }));
                                }
                            }else{
                                $('#plot').append($('<option>', { 
                                    value: '0',
                                    text : 'Not Found'
                                }));
                            }
                        },
                        error: function(e) 
                        {
                        console.log(e);
                        alert("Contact IT Department");
                        }
                    });
                });
            }
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }
  	});
});
//time frame change
$("#AddForm").on('change','#time_frame',function(){
    var id = $(this).val();
    if(id == 1){
        $('#checkboxes').css('display','none');
    }else{
        $('#checkboxes').css('display','');
    }
});
$('#booking').click(function(){
    if($('input[name="booking"]').is(':checked'))
    {
        $('#confirmation').removeAttr('disabled');
    }else{
        $('#confirmation').attr('disabled',true);
        $('#confirmation').prop('checked',false);
        $('#allotment').attr('disabled',true);
        $('#allotment').prop('checked',false);
    }
});
$('#confirmation').click(function(){
    if($('input[name="confirmation"]').is(':checked'))
    {
        $('#allotment').removeAttr('disabled');
    }else{
        $('#allotment').attr('disabled',true);
        $('#allotment').prop('checked',false);
    }
});

    // submit
$('#AddForm').ready(function(e){
    $("#AddForm").on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('action','insert');
        $.ajax({
            url: 'api/sales/customer_booking_api.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                var formno = response.formno;
                var status = response.status;
                var message = response.message;
                console.log(response);
                $.ajax({
                    url: "api/message_session/message_session.php",
                    type: 'POST',
                    data: {message:message,status:status},
                    success: function (response) {
                        $.get('sale/cus_booking_allotment/new_booking.php',function(data,status){
                            $('#content').html(data);

                            $('#exampleModal').modal('hide');
                            $('#exampleModal input').trigger("reset");
                            $(".modal-backdrop").remove();
                            $('body').removeClass('modal-open');
                        });
                    },
                    error: function(e) 
                    {
                        console.log(e);
                        alert("Contact IT Department");
                    }   
                })
                // window.location.href = "../../invoicereports/customer_registration_challan_api.php?action='invoice_generate'";
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }));
});
</script>
