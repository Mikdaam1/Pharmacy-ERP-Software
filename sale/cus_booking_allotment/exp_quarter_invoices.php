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
            <h1>Expired Quarter Invoices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_exp_breadcrumb">Quarter Expired Invoices</button></li>
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
                <form id="checkbox_form">
                    <div class="card">
                        <div class="card-header">
                        <?php include '../../display_message/display_message.php'?>
                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="error_msg" style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SR.No</th>
                                <th>SALE ID</th>
                                <th>DUE DATE</th>
                                <th>EXPIRY DATE</th>
                                <th>AMOUNT</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Remarks Model -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remarks Form</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="" id="remarksForm">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Form No</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="form_no" id = "form_no" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Invoice No</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="invoice_no" id = "invoice_no" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="amount" id = "amount" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Due Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="due_date" id = "due_date" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Expiry Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="exp_date" id = "exp_date" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Remarks</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                                    </div>
                                    <textarea type="text" id="remarks" name="remarks" rows="2" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary modal_remarks_btn"><i class="fa fa-plus"></i></button>
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

$(function () 
{
  $.validator.setDefaults({
    submitHandler: function () {
      // console.log( "Form successful submitted!" );
    }
  });
  $('#remarksForm').validate({
    rules: {
        remarks: {
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
        url: 'api/sales/expired_quarter_invoices_api.php',
        type: 'POST',
        data: {action: 'exp_quarter_invoices'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var inv_id = response[i].TRNO;
            var sale_id = response[i].SALE_ID;
            var due_date = response[i].DUE_DATE;
            var exp_date = response[i].EXPIRY_DATE;
            var amount = response[i].AMOUNT;
            
            if(jQuery.inArray("402a4e_1", secF_dataArr) !== -1){
                var btn = '<button type="button" data-id='+inv_id+' class="btn btn-sm btn-exp-challan 402a4e_1" title="Get Challan"><i class="far fa-print text-danger fa-fw" ></i></button>';
            }
            table.row.add([s_no,sale_id,due_date,exp_date,amount,btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    //check all rows in table
    $('#all_check').click(function(event) {
    var checked = this.checked;
    table.column(0).nodes().to$().each(function(index) {    
        if (checked) {
            $(this).find('.bulkchecked').prop('checked', true);
        } else {
            $(this).find('.bulkchecked').prop('checked', false);         
        }
    });    
    table.draw();
    });
});


//function for exp challan
$("#example1").on('click','.btn-exp-challan',function(){
    var inv_id = $(this).attr("data-id");
    $('#form_no').val('');
    $('#invoice_no').val('');
    $('#amount').val('');
    $('#due_date').val('');
    $('#exp_date').val('');
    $.ajax({
        url: 'api/sales/expired_quarter_invoices_api.php',
        type: 'POST',
        data: {action:'view_exp_quarter_challan',inv_id:inv_id},
        success: function(response){
            console.log(response);
            $('#form_no').val(response.form_no);
            $('#invoice_no').val(response.trno);
            $('#amount').val(response.amount);
            $('#due_date').val(response.due_date);
            $('#exp_date').val(response.exp_date);
            $('#exampleModal2').modal('show');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

    // remarks form submit
$('#remarksForm').ready(function(e){
    $("#remarksForm").on('submit',(function(e) {
        if ($(this).valid()) {
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action','remarks_insert');
          $.ajax({
              url: 'api/sales/expired_quarter_invoices_api.php',
              type: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              processData:false,
              success: function(response){
                  var status = response.status;
                  var message = response.message;
                  $.ajax({
                      url: "api/message_session/message_session.php",
                      type: 'POST',
                      data: {message:message,status:status},
                      success: function (response) {
                          $.get('sale/cus_booking_allotment/exp_quarter_invoices.php',function(data,status){
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
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
        }
    }));
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
$("#quarter_exp_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/exp_quarter_invoices.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>