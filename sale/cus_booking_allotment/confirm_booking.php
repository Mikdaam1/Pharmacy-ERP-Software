<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Confirm Category Files</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="confirm_booking_breadcrumb">Confirm</button></li>
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
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">Confirm Category Files Customers Record</h3>
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
                        <th>Letter Issue Date</th>
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
  
<!-- Booking Model -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign the plot</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="" id="AddForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 form-group">
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
                            <div class="col-sm-6 form-group">
                                <label for="">Select Plot</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-home-alt"></i></span>
                                    </div>
                                    <select class="form-control form-control-sm" name = "plot" id="plot">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary" id="add-booking"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
</div>
<script type="text/javascript">

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');
$(function () 
{
  $.validator.setDefaults({
    submitHandler: function () {
      // console.log( "Form successful submitted!" );
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
            required: true,
        },
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
        url: 'api/sales/cus_confirm_booking_api.php',
        type: 'POST',
        data: {action: 'confirm_booking'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              var s_no = k++;
              var form_no = response[i].FORM_NO;
              var cus_id = response[i].CUS_ID;
              var cust_name = response[i].CUS_NAME;
              var cnic = response[i].CNIC_NO;
              var contact_no = response[i].CONTACT_NO;
              var letter_date = response[i].LETTERDATE;
              var currdate = new Date();
              var current_date = moment(current_date).format("YYYY-MM-DD");
              var letter_date = moment(letter_date).format("YYYY-MM-DD");

              
            if(jQuery.inArray("402a3c_1", secF_dataArr) !== -1){
                  var allot_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-allot 402a3c_2" title="Allot Plot"><i class="far fa-plus text-info fa-fw" ></i></button>';
            }
              
              table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,letter_date,allot_btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
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
            //                     value: response[i].ID,
            //                     text : response[i].DESCRIPTION
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

      // $.ajax({
      //   url: 'api/sales/cus_confirm_booking_api.php',
      //   type: 'POST',
      //   data: {action: 'allot',form_no:form_no},
      //   dataType: "json",
      //   success: function(response){
      //       var message = response.message;
      //       var status = response.status;
      //         $.ajax({
      //           url: "api/message_session/message_session.php",
      //           type: 'POST',
      //           data: {message:message,status:status},
      //           success: function (response) {
      //             $.get('sale/cus_booking_allotment/confirm_booking.php',function(data,status){
      //                 $('#content').html(data);
      //             });
            
      //           },
      //           error: function(e) 
      //           {
      //             alert(e);
      //             alert("Contact IT Department");
      //           }        
      //         });
      //   },
      //   error: function(error){
      //     console.log(error);
      //     alert("Contact IT Department");
      //   }
      // });


$('#example1').on('click','.btn-allot',function () {
    var form_no = $(this).attr("data-id");
    $('#block').html('');
    // $('#street').html('');
    $('#plot').html('');
    $.ajax({
        url: 'api/sales/customer_booking_api.php',
        type:'POST',
        data: {action:'edit',form_no:form_no},
        success: function(response)
        {
            console.log(response);
            if(response)
            {
                unit_type_id = response.UNIT_CATEGORY_ID;
                // get blocks list
                $.ajax({
                    url: 'api/sales/cus_booking_allotment_api.php',
                    type:'POST',
                    data: {action:'permission_booking_blocks',unit_type_id:unit_type_id},
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
    $('#exampleModal2').modal('show');
      
    //SUBMIT FORM
    $('#AddForm').ready(function(e){
        $("#AddForm").on('submit',(function(e) {
            if ($("#AddForm").valid()) {
                    $('#add-booking').css('pointer-events','none');
                    $('#add-booking').find($(".fa")).removeClass('fa-refresh').addClass('fa-spin fa-refresh');
                    e.preventDefault();
                    var formData = new FormData(this);
                    formData.append('form_no',form_no);
                    formData.append('action','confirm_category_files');
                    $.ajax({
                        url: 'api/sales/customer_booking_api.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(response){
                            var message = response.message;
                            var status = response.status;
                              $.ajax({
                                url: "api/message_session/message_session.php",
                                type: 'POST',
                                data: {message:message,status:status},
                                success: function (response) {
                                  $.get('sale/cus_booking_allotment/confirm_booking.php',function(data,status){
                                      $('#content').html(data);
                                      $('#exampleModal2').modal('hide');
                                      $('#exampleModal2 input').trigger("reset");
                                      $(".modal-backdrop").remove();
                                      $('body').removeClass('modal-open');
                                  });
                            
                                },
                                error: function(e) 
                                {
                                  alert(e);
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
      }));    
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
$("#confirm_booking_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/confirm_booking.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>