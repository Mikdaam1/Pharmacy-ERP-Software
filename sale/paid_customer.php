<?php
ob_start();
ob_clean();
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
            <h1>Paid Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="paid_breadcrumb">Paid</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
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
                <?php include './../display_message/display_message.php'?>
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
                        <th>Form No</th>
                        <th>CUS ID</th>
                        <th>Customer Name</th>
                        <th>CNIC</th>
                        <th>Contact No</th>
                        <th>Invoice No</th>
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

<!--View Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Supplementary Challan</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Form No</th>
                    <th>Customer Name</th>
                    <th>CNIC</th>
                    <th>a</th>
                    <th>Issue Date</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                  <tr>
                    <td id="form_no"></td>
                    <td id="cust_no"></td>
                    <td id="cnic_no"></td>
                    <td id="challan_no"></td>
                    <td id="issue_date"></td>
                    <td id="expiry_no"></td>
                    <td id="status"></td>
                  </tr>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
<!-- Booking Model -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
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
                                    <input type="hidden" class="form-control" name ="form_num" id = "form_num">
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
                                        <span class="input-group-text"><i class="far fa-cube"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="unit_type" id = "unit_type" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Select Block</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-building"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "block" id="block">
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4 form-group">
                                <label for="">Select Street</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-road"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "street" id="street">
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-sm-4 form-group">
                                <label for="">Select Plot</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-home-alt"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "plot" id="plot">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Sub Project</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-tasks"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "sub_proj" id="sub_proj">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Time Frame</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
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
                                    <input type="checkbox" name="allocation" id="allocation" value="2" disabled>
                                    <label for="allocation">
                                        Allocation
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="confirmation" id="confirmation" value="3" disabled>
                                    <label for="confirmation">
                                        Confirmation
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="amount_error" style="color: red;font-size: 13px;"></span>
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
        
    var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
    var secF_dataArr = secF_data.split(',');


    $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    // alert( "Form successful submitted!" );
                }
            });
            $('#AddForm').validate({
                rules: {
                        block: {
                            required: true,
                        },
                        // street: {
                        //     required: true,
                        // },
                        plot: {
                            required: true
                        },
                        sub_proj: {
                            required: true
                        },
                        time_frame: {
                            required: true
                        }
                    },

                    // messages: {
                    //     expiry_date: {
                    //         required: "Field is required"
                    //     }
                    // },
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

    $('#example1').ready(function(){
        $("#ajax-loader").show();
        let table = $('#example1').DataTable({
            dom: 'Bfrtip',
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print','colvis'
            ],
        });

        table.search('').draw(); //required after
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
            url: 'api/sales/NewCustomerRegistration/ActionsHandler.php',
            type: 'POST',
            data: {action: 'index'},
            dataType: "json",
            success: function(response){
                $("#ajax-loader").hide();
                console.log(response);
                if (response.success === true) {
                    table.clear().draw();
                    // append data in datatable
                    k = 1;
                    for (var i = 0; i < response.data.length; i++) {
                        // j = i++;
                        var s_no = k++;
                        var id = response.data[i].ID;
                        var form_no = response.data[i].FORM_NO;
                        var cus_id = response.data[i].CUS_ID;
                        var cust_name = response.data[i].CUS_NAME;
                        var cnic = response.data[i].CNIC_NO;
                        var contact_no = response.data[i].CONTACT_NO;
                        var invoice_no = response.data[i].TRNO;
                        
                        if(jQuery.inArray("402a2d_1", secF_dataArr) !== -1){
                            var booking_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-addbooking 402a2d_1" title="Add New Booking"><i class="fa fa-plus text-info fa-fw" ></i></button>';
                        }
                        if(jQuery.inArray("402a2d_2", secF_dataArr) !== -1){
                            var btn_view = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view 402a2d_2" title="View Supplementary Challan"><i class="far fa-eye text-info fa-fw" ></i></button>';
                        }
                        if(jQuery.inArray("402a2d_3", secF_dataArr) !== -1){
                            var btn_print = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-print-receipt 402a2d_3" title="Print Invoice Receipt"><i class="far fa-print text-info fa-fw" ></i></button>';
                        }
                        
                        var btn = btn_view + btn_print + booking_btn;
                        table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,invoice_no,btn]);
                    }
                table.draw();
                }
                
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });
    // Stats
    $.ajax({
        url: 'api/sales/PaidRegistrationsStats/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $("#total_registration").text(response.data[0].TOTAL_CUSTOMER_REGISTRATIONS);
            $("#total_paid_registration").text(response.data[1].PAID_REGISTRATIONS);
            $("#paid_today_invoice").text(response.data[4].PAID_TODAY_INVOICE);
            $("#paid_monthly_invoice").text(response.data[5].PAID_MONTHLY_INVOICE);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // *********  

    //functions for booking start
    $("#example1").on('click','.btn-addbooking',function(){
        $("#ajax-loader").show();
        $('#checkboxes').css('display','none');
        $('#time_frame').html('');
        $('#sub_proj').html('');
        $('#block').html('');
        // $('#street').html('');
        $('#plot').html('');
        var form_no = $(this).attr("data-id");
        $.ajax({
            url: 'api/sales/customer_booking_api.php',
            type:'POST',
            data: {action:'edit',form_no:form_no},
            success: function(response)
            {
                $("#ajax-loader").hide();
                console.log(response);
                if(response)
                {
                    unit_type_id = response.UNIT_CATEGORY_ID;
                    campaign_id = response.CAMPAIGN_ID;
                    var d = new Date();
                    var current_date = moment(d).format("YYYY-MM-DD");
                    $('#form_num').val(response.FORM_NO);
                    $('#current_date').val(current_date);
                    $('#form_number').val(response.FORM_NO);
                    $('#customer').val(response.CUS_NAME);
                    $('#cnic').val(response.CNIC_NO);
                    $('#contact').val(response.CONTACT_NO);
                    $('#relation').val(response.SWD);
                    $('#unit_type').val(response.UNIT_TYPE_NAME);
                    $('#campaign').val(response.CAMPAIGN_NAME);
                    $('#project').val(response.PROJECT_NAME);
                    $('#exampleModal2').modal('show');
                    // time frame list
                    $.ajax({
                        url: 'api/sales/cus_booking_allotment_api.php',
                        type:'POST',
                        data: {action:'get_time_frame_acc_unit_type',campaign_id:campaign_id},
                        success: function(response)
                        {
                            for (var i=0; i<response.length; i++) {
                                $('#time_frame').append($('<option>', { 
                                    value: response[i].TIME_FRAME_ID,
                                    text : response[i].TIME_FARME
                                }));
                            }
                            // get checkboxes list
                            var time_frame_id = response[0].TIME_FRAME_ID;
                            if(time_frame_id == 1){
                                $('#checkboxes').css('display','none');
                            }else{
                                $('#checkboxes').css('display','');
                            }
                            // get checkboxes list
                        },
                        error: function(e) {
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
                        data: {action:'get_booking_blocks',unit_type_id:unit_type_id},
                        success: function(response)
                        {
                            console.log(response);
                            if(response)
                            {
                                    $('#block').append($('<option>', { 
                                        value: '',
                                        text : 'Select Block'
                                    }));
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
                }
            },
            error: function(e) 
            {
            console.log(e);
            alert("Contact IT Department");
            }
        });
    });
    
    //block change
    $("#AddForm").on('change','#block',function(){
            // $('#street').html('');
            $('#plot').html('');
            var block_id = $(this).val();
            $.ajax({
                url: 'api/sales/cus_booking_allotment_api.php',
                type:'POST',
                data: {action:'get_blots_acc_street',block_id:block_id,unit_type_id:unit_type_id},
                success: function(response)
                {
                    console.log(response);
                    if($.trim(response))
                    {
                        for (var i=0; i<response.length; i++) {
                            $('#plot').append($('<option>', { 
                                value: response[i].MATERIAL_CODE,
                                text : response[i].DESCRIPTION
                            }));
                        }
                    }else{
                        $('#plot').append($('<option>', { 
                            value: '',
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
            // $.ajax({
            //     url: 'api/sales/cus_booking_allotment_api.php',
            //     type:'POST',
            //     data: {action:'get_street_acc_block',block_id:block_id,unit_type_id:unit_type_id},
            //     success: function(response)
            //     {
            //         console.log(response);
            //         if(response)
            //         {
            //             $('#street').append($('<option>', { 
            //                 value: '',
            //                 text : 'Select'
            //             }));
            //             for (var i=0; i<response.length; i++) {
            //                 $('#street').append($('<option>', { 
            //                     value: response[i].STREET_ID,
            //                     text : response[i].STREET_DESCRIPTION
            //                 }));
            //             }
            //         }else{
            //             $('#street').append($('<option>', { 
            //                 value: '',
            //                 text : 'Not Found'
            //             }));
            //         }
            //     },
            //     error: function(e) 
            //     {
            //     console.log(e);
            //     alert("Contact IT Department");
            //     }
            // });
    });

    //street change


    // $("#AddForm").on('change','#street',function(){
    //         $('#plot').html('');
    //             var street_id = $(this).val();
    //             var block_id = $('#block').val();
    //         $.ajax({
    //             url: 'api/sales/cus_booking_allotment_api.php',
    //             type:'POST',
    //             data: {action:'get_blots_acc_street',block_id:block_id,street_id:street_id,unit_type_id:unit_type_id},
    //             success: function(response)
    //             {
    //                 console.log(response);
    //                 if($.trim(response))
    //                 {
    //                     for (var i=0; i<response.length; i++) {
    //                         $('#plot').append($('<option>', { 
    //                             value: response[i].MATERIAL_CODE,
    //                             text : response[i].DESCRIPTION
    //                         }));
    //                     }
    //                 }else{
    //                     $('#plot').append($('<option>', { 
    //                         value: '',
    //                         text : 'Not Found'
    //                     }));
    //                 }
    //             },
    //             error: function(e) 
    //             {
    //             console.log(e);
    //             alert("Contact IT Department");
    //             }
    //         });
    // });


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
            $('#allocation').removeAttr('disabled');
        }else{
            $('#allocation').attr('disabled',true);
            $('#allocation').prop('checked',false);
            $('#confirmation').attr('disabled',true);
            $('#confirmation').prop('checked',false);
        }
    });
    $('#allocation').click(function(){
        if($('input[name="allocation"]').is(':checked'))
        {
            $('#confirmation').removeAttr('disabled');
        }else{
            $('#confirmation').attr('disabled',true);
            $('#allotment').prop('checked',false);
        }
    });

        // submit
    $('#AddForm').ready(function(e){
        $("#AddForm").on('submit',(function(e) {

            $("#amount_error").text("");
            
            var time_frame = $("#time_frame").val();
            var charges_checked = $('#checkboxes input[type="checkbox"]:checked').length;

            if ($("#AddForm").valid()) {
                if(time_frame != 1 && charges_checked  < 1){
                    $("#amount_error").text("please check at least one");
                }else{
                    $('#add-booking').css('pointer-events','none');
                    $('#add-booking').find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
                    $("#ajax-loader").show();
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
                            $("#ajax-loader").hide();
                            var formno = response.formno;
                            var status = response.status;
                            var message = response.message;
                            console.log(response);
                            $.ajax({
                                url: "api/message_session/message_session.php",
                                type: 'POST',
                                data: {message:message,status:status},
                                success: function (response) {
                                    $.get('sale/cus_booking_allotment/pending_booking.php',function(data,status){
                                        $('#content').html(data);
                                        $('#exampleModal2').modal('hide');
                                        $('#exampleModal2 input').trigger("reset");
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
                }
            }
        }));
        $('#add-booking').css('pointer-events','');
        $('#add-booking').find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
    });
    //functions for booking end
    
    $('#example1').on('click','.btn-view',function(){
        var form_no = $(this).attr('data-id');
        $.get('sale/customer_info_view.php?cus_formno='+form_no,function(data,status){
            $('#content').html(data);
        });
    });

    // Payment Receipt
    $('#example1').on('click','.btn-print-receipt',function(){
        $("#ajax-loader").show();
        var form_no = $(this).attr('data-id');
        let action = 'show';
        $.ajax({
            url: 'api/sales/GetInvoice/ActionsHandler.php',
            type: 'POST',
            data: "&action="+action + "&form_no="+form_no,
            dataType: "json",
            success: function(response){
            // ?action=payment_invoice_generate&tr_no="+response.data[0].TRNO
            $("#ajax-loader").hide();
            let invoice_url = "invoicereports/reg_payment_receipt.php?action=receipt_generate&invoice_no="+response.data[0].TRNO;
            window.open(invoice_url, '_blank');
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    });

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#sale_breadcrumb").on("click", function() {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#paid_breadcrumb").on("click", function() {
        $.get('sale/paid_customer.php', function(data,status){
            $("#content").html(data);
        });
    });

</script>

<?php include '../includes/loader.php'?>