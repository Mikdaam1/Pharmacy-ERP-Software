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
            <h1>Unpaid Merger</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="unpaid_breadcrumb">Unpaid Merger</button></li>
              <li class="breadcrumb-item"><button class="btn btn-sm" id="merger_breadcrumb">Merger</button></li>
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
                        <th>Merger ID</th>
                        <th>Customer Name</th>
                        <th>Contact Number</th>
                        <th>Merger Type</th>
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
    
<!-- Merger Unpaid Detail Model -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Merger Payment</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="example12" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR.No</th>
                            <th>Merger ID</th>
                            <th>Sale ID</th>
                            <th>Dissolved File</th>
                            <th>Merger_File</th>
                            <th>Dissolved Quarter</th>
                            <th>Merger Quarter</th>
                        </tr>
                    </thead>
                </table>
                <div class="modal-body">
                    <div class="modal-footer justify-content-between">  
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Model for Detail Quater -->
<div class="modal fade" id="PaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Merger Detail</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
              <form id="merger_form">
                <div class="card mt-3" id="forms_div">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Dissolved File</h3>
                                        </div>
                                        <div class="card-body">
                                            <!-- radio -->
                                            <div class="form-group clearfix radiodispatchDiv">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <h1 class="text-center">&rarr;</h1>
                                </div>
                                <div class="col-sm-5">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Merger File</h3>
                                        </div>
                                        <div class="card-body">
                                            <!-- radio -->
                                            <div class="form-group clearfix radiomergeDiv">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"> 
                        <label for="">Challan No : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        <input type="number" class="form-control" id="challan_no" name="challan_no" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 form-group"> 
                        <label for="">Total Amount : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="number" class="form-control" id="merger_fee" name="merger_fee" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="">Receiving Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            </div>
                            <input type="date" name ="receiving_date" id="receiving_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <span id="error_msg1" style="color: red;font-size: 13px;"></span>
                </div>
                <div class="modal-body">
                    <div class="modal-footer justify-content-between">  
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <button type="submit" class="btn btn-primary" id="merger_form_btn"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
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
  $('#merger_form').validate({
    rules: {
        receiving_date: {
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
    url: 'api/sales/merger/merger_api.php',
    type: 'POST',
    data: {action: 'merger_unpaid'},
    dataType: "json",
    success: function(response){
      console.log(response);
        $("#ajax-loader").hide();
        table.clear().draw();
        // append data in datatable
        k = 1;
        for (var i = 0; i < response.length; i++) {
          // j = i++;
          var s_no = k++;
          var mid = response[i].ID;
          var cus_name = response[i].CUS_NAME;
          var contact_no = response[i].CONTACT_NO;
          var mtype = response[i].M_TYPE=='1'?"one in one":response[i].M_TYPE=='2'?"one in two":"two in one";
          // var dissolved_file = response[i].DISSOLVED_FILE;
          // // var cus_id = response[i].CUS_ID;
          // var merger_file = response[i].MERGER_FILE;
          // var dissolved_remaining_quarter = response[i].DISSOLVED_REMAINING_QUARTER??'0';
          // var dissolved_paid_amount = response[i].DISSOLVED_PAID_AMOUNT??'0';
          // var merger_remaining_quarter = response[i].MERGER_REMAINING_QUARTER??'0';
          // var merger_unpaid_amount = response[i].MERGER_UNPAID_AMOUNT??'0';
          // if(jQuery.inArray("402a2c_1", secF_dataArr) !== -1){
          //     var btn_pay = '<button type="button" data-id='+dissolved_file+' class="btn btn-sm btn-view 402a2c_1" title="View Supplementary Challan"><i class="fa fa-money text-info fa-fw" ></i></button>';
          // }
          // if(jQuery.inArray("402a2c_2", secF_dataArr) !== -1){
          //     var btn_edit = '<button type="button" data-id='+dissolved_file+' class="btn btn-sm btn-edit 402a2c_2" title="Edit Supplementary Challan"><i class="far fa-pencil text-info fa-fw" ></i></button>';
          // }
          if(jQuery.inArray("402a2c_3", secF_dataArr) !== -1){
              var btn_print = '<button type="button" data-id='+mid+' class="btn btn-sm btn-print 402a2c_3" title="Print Challan"><i class="far fa-print text-info fa-fw" ></i></button>';
              var btn_view = '<button type="button" data-id='+mid+' class="btn btn-sm btn-view 402a2c_3" title="View UnPaid Merger Detail"><i class="far fa-eye text-info fa-fw" ></i></button>';
              var btn_payment = '<button type="button" data-id='+mid+' class="btn btn-sm btn-pay 402a2c_3" title="Merger Payment"><i class="far fa-money text-info fa-fw" ></i></button>';
         }
          btn = btn_print+btn_view+btn_payment;
          table.row.add([s_no,mid,cus_name,contact_no,mtype,btn]);
        }
        table.draw();
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
  });

  // On CLick Print Button
  $('#example1').on('click','.btn-print',function(){

    var mid = $(this).attr('data-id');
    let action = 'get_invoice';
    $.ajax({
        url: 'api/sales/merger/merger_api.php',
        type: 'POST',
        data: "&action="+action + "&mid="+mid,
        dataType: "json",
        success: function(response){
            let invoice_url = "invoicereports/merger_fees_challan.php?action=invoice_generate&tr_no="+response.TRNO;
            // console.log(response);
            // let expiry_date = response.data[0].EXPIRY_DATE;
            // let current_date = getCurrentDate();
            // if (expiry_date.localeCompare(current_date) == 1) {
            window.open(invoice_url, '_blank');
            // }else{
            //   $.get('sale/GenerateInvoice/generate_invoice.php?cus_formno='+form_no, function(data, status) {
            //     $('#content').html(data);
            //   });
            // }
        },
        error: function(error) {
            console.log(error);
            alert("Contact IT Department");
        }
    });
  });

  // On CLick Payment Button
  $('#example1').on('click','.btn-pay',function(){
    $('.radiodispatchDiv').html('');
    $('.radiomergeDiv').html('');
    $("#ajax-loader").show();
    var mid = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/merger/merger_api.php',
        type:'POST',
        data: {action:'get_formno_payment',mid:mid},
        success: function(response)
        {
          $("#ajax-loader").hide();
          console.log(response);
          // var dispatch_file=response[0].DISSOLVED_FILE;
          // console.log(dispatch_file);   
              $('.radiodispatchDiv').append('<div class="icheck-danger"><input type="radio" id="radiodispatch" name="radiodispatch" value="'+response.DISSOLVED_FILE+'" checked disabled><label for="radiodispatch">'+response.DISSOLVED_FILE+'</label></div>');
          
              // var j = i+'+1';
              $('.radiomergeDiv').append('<div class="icheck-primary"><input type="radio" id="radiomerge" name="radiomerge" value="'+response.MERGER_FILE+'" checked disabled><label for="radiomerge">'+response.MERGER_FILE+'</label></div>');                   

          $('#challan_no').val(response.TRNO);
          $('#merger_fee').val(response.AMOUNT);

            // $("#ajax-loader").hide();
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
    });
    $('#PaymentModal').modal('show');
    
    // **************** 
    $("#merger_form").on("submit", function(e) {
      $("#error_msg1").html('');
      var invoice_no=$('#challan_no').val();
      console.log(invoice_no);
      if($('#merger_form').valid()){
        if(confirm("Are you sure you want to Pay the Merger Fee?")){  
          $("#ajax-loader").show();
          $('#merger_form_btn').css('pointer-events','none');
          $('#merger_form_btn').find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
          e.preventDefault();
          var forms_data = new FormData(this);
          forms_data.append('mid',mid);
          forms_data.append('action','payment_merger');
          $.ajax({
            url:'api/sales/merger/merger_api.php',
              method:'POST',
              data: forms_data,
              contentType:false,
              cache:false,
              processData:false,
              success: function(response){
                    console.log(response);
                    var message = response.message;
                    var status = response.status;
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                                $("#ajax-loader").hide();
                                $('#merger_form_btn').css('pointer-events','');
                                $('#merger_form_btn').find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
                                $.get('sale/merger/merger_unpaid.php',function(data,status){
                                    $('#content').html(data);
                                    $('#PaymentModal').modal('hide');
                                    $('#PaymentModal input').trigger("reset");
                                    $(".modal-backdrop").remove();
                                    $('body').removeClass('modal-open');
                                });
                                
                                let invoice_url = "invoicereports/merger_payment_reciept.php?action=receipt_generate&tr_no="+invoice_no;
                                window.open(invoice_url, '_blank');
                        },
                        error: function(e) 
                        {
                            console.log(e);
                            alert("Contact IT Department");
                        }   
                    });
              },
              error: function(error) {
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
        }
      }
            
    });


  });
  // breadcrumbs
  $('#dashboard_breadcrumb').click(function(){
      $.get('dashboard_main/dashboard_main.php',function(data,status){
          $('#content').html(data);
      });
  });
  $("#merger_breadcrumb").on("click", function() {
      $.get('sale/merger/merger.php', function(data,status){
          $("#content").html(data);
      });
  });
  $("#unpaid_breadcrumb").on("click", function() {
      $.get('sale/merger/merger_unpaid.php', function(data,status){
          $("#content").html(data);
      });
  });

});

//open modal of detail of unpaid mergers
$("#example1").on('click','.btn-view',function(){
    $("#ajax-loader").show();
    var mid = $(this).attr("data-id");
    let table = $('#example12').DataTable({
    });
    $.ajax({
        url: 'api/sales/merger/merger_api.php',
        type: 'POST',
        data: {action: 'view_unpaid_merger_detail',mid:mid},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
                // j = i++;
               
                var s_no = k++;
                var m_id = response[i].MID;
                var dissolved_file = response[i].DISSOLVED_FILE??'0';
                var merger_file = response[i].MERGER_FILE??'0';
                var dissolved_quarter = response[i].DISSOLVED_QUARTER??'0';
                var merger_quarter = response[i].MERGER_QUARTER??'0';
                var sale_id = response[i].SALE_ID;
                
                table.row.add([s_no,m_id,sale_id,dissolved_file,merger_file,dissolved_quarter,merger_quarter]);
            }
            table.draw();
            $('#exampleModal1').modal('show');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
});

</script>

<?php include '../../includes/loader.php'?>