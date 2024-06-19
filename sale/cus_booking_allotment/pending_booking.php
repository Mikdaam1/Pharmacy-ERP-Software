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
            <h1>Pending Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="pending_booking_breadcrumb">Pending</button></li>
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
                      <h3 class="card-title">Pending Booking Customers Record</h3>
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
                <h5 class="modal-title" id="exampleModalLabel">Pending Booking Form</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="" id="pendingbookingform">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Project</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-tasks"></i></span>
                                    </div>
                                    <input type="hidden" class="form-control" name ="e_form_no" id = "e_form_no">
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
                                        <span class="input-group-text"><i class="fas fa-cube"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="unit_type" id = "unit_type" disabled>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="">Block</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="block" id = "block" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4 form-group">
                                <label for="">Street</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-road"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="street" id = "street" disabled>
                                </div>
                            </div> -->
                            <div class="col-sm-4 form-group">
                                <label for="">Plot</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-home-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="plot" id = "plot" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="">Time Frame</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name ="time_frame" id = "time_frame" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="checkboxes">
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
                                    <input type="checkbox" name="allocation" id="allocation" value="2">
                                    <label for="allocation">
                                        Allocation
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="confirmation" id="confirmation" value="3">
                                    <label for="confirmation">
                                        Confirmation
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="error_msg" style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary modal_u_btn"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Challan Model -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Invoices</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="example12" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR.No</th>
                            <th>Form No</th>
                            <th>CUS ID</th>
                            <th>Customer Name</th>
                            <th>Exp Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Action</th>
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
                                <label for="exampleFormControlTextarea1">Remarks :<span style="color:red">*</span></label>
                                <select class="form-control form-control-sm" name="remarks" id="remarks"></select>
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
<!-- payment invoices Model -->
<div class="modal fade" id="exampleModalpay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Entry</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="customer_pay_form">
                <div class="card-body">
                    <table id="inv_detail" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SR.No</th>
                                <th>Form No</th>
                                <th>CUS ID</th>
                                <th>Customer Name</th>
                                <th>Exp Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <div class="row"><div class="col-12 text-center spinnerr"></div></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 form-group text-center">
                            <label for="">Total Amount</label>
                            <div id="total_amount"></div>
                        </div>
                        <div class="col-sm-1 form-group text-center">
                            <label for=""></label>
                            <div><h1>-</h1></div>
                        </div>
                        <div class="col-sm-3 form-group text-center">
                            <label for="">Total Received Amount</label>
                            <div id="total_received_amount"></div>
                        </div>
                        <div class="col-sm-1 form-group text-center">
                            <label for=""></label>
                            <div><h1>=</h1></div>
                        </div>
                        <div class="col-sm-4 form-group text-center">
                            <label for="">Total Due Amount</label>
                            <div id="total_due_amount"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Into Bank Account :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-bank"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name = "bank_acc" id="bank_acc">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Date of Deposit :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control form-control-sm" name ="date_of_deposit" id = "date_of_deposit">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="">Invoice Amount :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money"></i></span>
                                </div>
                                <input type="number" class="form-control form-control-sm" name ="rec_amount" id = "rec_amount" value="0" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="">Deposit Type :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                                <select class="form-control form-control-sm" name="deposit_type" id="deposit_type">
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4 form-group">
                            <label for="">Receipt Date :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "receipt_date" id="receipt_date" class="form-control form-control-sm">
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-4 form-group">
                            <label for="">Receipt no :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-edit-alt"></i></span>
                                </div>
                                <input type="number" name = "receipt_no" id="receipt_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                            </div>
                        </div> -->
                        <div class="col-sm-4 form-group optional">
                            <label for="">Cheque Date :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                                <input type="date" name = "cheque_date" id="cheque_date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 form-group optional">
                            <label for="">Cheque no :<span style="color:red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                </div>
                                <input type="number" name = "cheque_no" id="cheque_no" placeholder="xxxx" value="" class="form-control form-control-sm" inputmode="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 form-group">
                            <label for="">Remarks :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-edit"></i></span>
                                </div>
                                <textarea type="text" id="amount_desc" name="amount_desc" rows="2" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group text-center" id="ci_div">
                            <label for="">Commission Included</label>
                            <div class="input-group">
                                <input type="checkbox" id="ci" value="1" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group text-center">
                            <span id="amount_error" style="color: red;font-size: 13px;"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-body">
                            <div class="modal-footer justify-content-between">  
                                <input type="hidden" value="" name="pay_entry_sale_id" id="pay_entry_sale_id">
                                <input type="hidden" value="" name="pay_entry_form_no" id="pay_entry_form_no">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                <button type="submit" class="btn btn-primary modal_pay_btn"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- schedule view Model -->
<div class="modal fade" id="exampleModelSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Schedule</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4" id="logo"></div>
                    <div class="col-8 text-right p-3" id="inv_title"></div>
                </div>
                <div class="row">
                    <div class="col-6 h6" id="inv-left-detail"></div>
                    <div class="col-2"></div>
                    <div class="col-4 text-right h6" id="inv-right-detail"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>SR.No</th>
                            <th>Account Head</th>
                            <th>Due Amount</th>
                            <th>Due Date</th>
                            <th>Paid Amount</th>
                            <th>Paid On</th>
                            <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSchedule"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-schedule-challan"><i class="far fa-print text-info fa-fw"></i></button>
                        </div>
                    </div>
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
  $('#customer_pay_form').validate({
    rules: {
        bank_acc: {
            required: true,
        },
        date_of_deposit:{
            required:true,
        },
        rec_amount:{
            required:true,
        },
        deposit_type:{
            required:true,
        },
        // receipt_date:{
        //     required:true,
        // },
        // receipt_no:{
        //     required:true,
        // },
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
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'pending_booking'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var form_no = response[i].FORM_NO;
            var cus_id = response[i].CUS_ID;
            var cust_name = response[i].CUS_NAME;
            var cnic = response[i].CNIC_NO;
            var contact_no = response[i].CONTACT_NO;
            
            if(jQuery.inArray("402a3a_1", secF_dataArr) !== -1){
                var edit_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-editbooking 402a3a_1" title="Add Pending Booking"><i class="fa fa-plus text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a3a_2", secF_dataArr) !== -1){
                var pay_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-pay 402a3a_2" title="Payment Entry"><i class="fas fa-money-bill-wave text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a3a_3", secF_dataArr) !== -1){
                var challan_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-view-invoices 402a3a_3" title="View Invoices"><i class="far fa-print text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a3a_4", secF_dataArr) !== -1){
                var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view 402a3a_4" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
            }
            var btn = edit_btn+challan_btn+schedule_btn+pay_btn;
            table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
            }
            table.draw();

        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
//function for edit open model
$("#example1").on('click','.btn-editbooking',function(){
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type:'POST',
        data: {action:'edit',form_no:form_no},
        success: function(response)
        {
            console.log(response.data);
            if(response.status == 1)
            {
                var campaign_id = response.data.CAMPAIGN_ID;
                var project_id = response.data.PROJECT_ID;
                var unit_type_id = response.data.UNIT_CATEGORY_ID;
                var time_frame_id = response.data.TIME_FRAME_ID;
                var check_box_charge_type = response.data.CHECK_BOX_CHARGE_TYPE;
                var max_charge_type = response.data.CURR_DESC;
                var sale_id = response.data.SALE_ID;
                var inv_id = response.data.INV_ID;
                var d = new Date();
                var current_date = moment(d).format("YYYY-MM-DD");
                $('#e_form_no').val(form_no);
                $('#current_date').val(current_date);
                $('#form_number').val(response.data.FORM_NO);
                $('#customer').val(response.data.CUS_NAME);
                $('#cnic').val(response.data.CNIC_NO);
                $('#contact').val(response.data.CONTACT_NO);
                $('#block').val(response.data.BLOCK_NAME);
                // $('#street').val(response.data.STREET_NAME);
                $('#plot').val(response.data.PLOT_NAME);
                $('#campaign').val(response.data.REMARKS);
                $('#project').val(response.data.PARTICULARS);
                $('#unit_type').val(response.data.UNIT_TYPE_NAME);
                
                $('input[type=checkbox]').prop('checked', false);
                $('input[type=checkbox]').removeAttr('disabled'); 

                var time_frame = response.data.TIME_FARME;
                $('#time_frame').val(time_frame);

                if(time_frame == 'Full Paid'){
                    $('#checkboxes').css('display','none');
                    $('.modal_u_btn').css('display','none');
                }else{
                    $('#checkboxes').css('display','');
                    if(max_charge_type == '3'){
                        $('.modal_u_btn').css('display','none');
                    }else{
                        $('.modal_u_btn').css('display','');
                    }
                    //selected checked
                    for (i=0;i<=max_charge_type;i++){
                        $('input[type=checkbox][value="'+i+'"]').attr('disabled',true);
                        $('input[type=checkbox][value="'+i+'"]').prop('checked', true); 
                    }
                    if($('#allocation').prop('checked') == false)
                    {
                        $('#confirmation').attr('disabled',true);
                    }
                }
                $('#exampleModal').modal('show');
            }else{
                alert("Contact IT Department");
            }
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }
  	});
});
$('#allocation').click(function(){
    if($('input[name="allocation"]').is(':checked'))
    {
        $('#confirmation').removeAttr('disabled');
    }else{
        $('#confirmation').attr('disabled',true);
        $('#confirmation').prop('checked',false);
    }
});
//function for challan open model
$("#example1").on('click','.btn-view-invoices',function(){
    $("#ajax-loader").show();
    var form_no = $(this).attr("data-id");
    let table = $('#example12').DataTable({
    });
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_invoices',form_no:form_no},
        success: function(response){
            // console.log(response);
            $("#ajax-loader").hide();
            
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
                var exp_date = response[i].EXPIRE_DATE;
                var inv_id = response[i].INV_ID;
                var charges_name = response[i].CHARGES_NAME;
                var inv_Amount = response[i].T_AMOUNT;
                var paid = response[i].PAID;
                var current_date = new Date();
                var current_date = moment(current_date).format("YYYY-MM-DD");
                var exp_date = moment(exp_date).format("YYYY-MM-DD");
                if(paid == 'Y'){
                    var btn = '<small class="badge badge-success">Paid</small>';
                }else if(current_date < exp_date){
                    var btn = '<button type="button" data-id='+inv_id+' class="btn btn-sm btn-challan" title="Get Challan"><i class="far fa-print text-info fa-fw" ></i></button>';
                }else{
                    var btn = '<button type="button" data-id='+inv_id+' class="btn btn-sm btn-exp-challan" title="Get Challan"><i class="far fa-print text-danger fa-fw" ></i></button>';
                }
                table.row.add([s_no,form_no,cus_id,cust_name,exp_date,charges_name,inv_Amount,btn]);
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
//function for payment open model
$("#example1").on('click','.btn-pay',function(){
    $("#ajax-loader").show();
    $('#rec_amount').val('0');
    $('#bank_acc').html('');
    $('#date_of_deposit').val('');
    // $('#deposit_type').val('');
    // $('#receipt_date').val('');
    // $('#receipt_no').val('');
    $('#cheque_date').val('');
    $('#cheque_no').val('');
    $('#amount_desc').val('');

    $('#amount_error').html('');
    var form_no = $(this).attr("data-id");
    
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_pay',form_no:form_no},
        success: function(response){
            $("#ajax-loader").hide();
            if(response.status == 0){
                alert(response.message);
            }else{
                console.log(response);
                var date = new Date();
                var bank_name=response['BANK_NAME'];
                var bank_ids=response['BANK_ID'];
                // console.log(bank);
                var current_date = moment(date).format("YYYY-MM-DD");
                var total_amount = parseInt(response['TOTAL_AMOUNT']);
                var received_amount = parseInt(response['RECEIVED']) > 0 ? parseInt(response['RECEIVED']) : 0 ;
                function formatNumber (total_amount) {
                    return total_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                }
                var total_amounts=formatNumber(total_amount);
                var received_amounts=formatNumber(received_amount);
                $('#total_amount').html('<h3>'+total_amounts+'</h3>');
                $('#total_received_amount').html('<h3>'+received_amounts+'</h3>');
                var total_due_amount = total_amount - received_amount;
                var total_due_amount=formatNumber(total_due_amount);
                $('#total_due_amount').html('<h3>'+total_due_amount+'</h3>');
                $('#bank_acc').append($('<option>', { 
                        value: bank_ids,
                        text : bank_name
                }));

                let table = $('#inv_detail').DataTable({
                });
                $.ajax({
                    url: 'api/sales/cus_pending_booking_api.php',
                    type: 'POST',
                    data: {action: 'view_invoices',form_no:form_no},
                    beforeSend : function()
                    {
                        $('.spinnerr').html('<i class="fa fa-spin fa-refresh"></i>');
                        $('#inv_detail > tbody > tr').empty();
                    },
                    success: function(response){
                        $('.spinnerr').html('');
                        console.log(response);
                        table.clear().draw();
                        var pay_entry_sale_id = response[0].SALE_ID;
                        $('#pay_entry_sale_id').val(pay_entry_sale_id);
                        // append data in datatable
                        k = 1;
                        for (var i = 0; i < response.length; i++) {
                            // j = i++;
                            var s_no = k++;
                            var form_no = response[i].FORM_NO;
                            var cus_id = response[i].CUS_ID;
                            var cust_name = response[i].CUS_NAME;
                            var exp_date = response[i].EXPIRE_DATE;
                            var inv_id = response[i].INV_ID;
                            var charges_name = response[i].CHARGES_NAME;
                            var charges_id = response[i].CHARGES_TYPE;
                            var inv_Amount = response[i].T_AMOUNT;
                            // function formatNumber (inv_Amount) {
                            //     return inv_Amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                            // }
                            var inv_Amounts=formatNumber(inv_Amount);
                            var paid_status = response[i].PAID;
                            var commission_status = response[i].COMMISSION_STATUS;
                            var current_date = new Date();
                            var current_date = moment(current_date).format("YYYY-MM-DD");
                            var exp_date = moment(exp_date).format("YYYY-MM-DD");
                            if(paid_status == 'Y'){
                                var color_status = 'paid';
                                var checkbox = '<small class="badge badge-success" title="Your invoice has been paid.">Paid</small>';
                            }else if(exp_date < current_date){
                                var color_status = 'expired';
                                var checkbox = '<small class="badge badge-danger" title="Your invoice has been expired. Kindly create new invoice.">Expired</small><input style="display:none" class="amount_checkbox" name="checkbox" type="checkbox" data-inv_id='+inv_id+' data-type='+charges_name+' data-amount='+inv_Amount+' value='+charges_id+' title='+charges_name+'>';
                            }else{
                                var color_status = 'else';
                                var checkbox = '<input class="amount_checkbox" name="checkbox" type="checkbox" data-inv_id='+inv_id+' data-type='+charges_name+' data-amount='+inv_Amount+' value='+charges_id+' title='+charges_name+'>';
                            }
                            table.row.add([s_no,form_no,cus_id,cust_name,exp_date,charges_name,inv_Amounts,checkbox]);
                            table.rows(i).nodes().to$().attr("id", color_status);
                        }
                        table.draw();
                        $('#pay_entry_form_no').val(form_no);
                        if(commission_status == '1'){
                            $('#ci_div input[type="checkbox"]').attr('disabled',true);
                            $('#ci_div input[type="checkbox"]').attr('checked',true);
                        }else{
                            $('#ci_div input[type="checkbox"]').removeAttr('disabled');
                            $('#ci_div input[type="checkbox"]').prop('checked', false); ;
                        }
                        if($('#inv_detail input[type=checkbox][value="1"]').prop('checked') == false){

                            $('#inv_detail input[type=checkbox][value="2"]').attr('disabled',true);
                            $('#inv_detail input[type=checkbox][value="3"]').attr('disabled',true);

                        }else if($('#inv_detail input[type=checkbox][value="2"]').prop('checked') == false){

                            $('#inv_detail input[type=checkbox][value="3"]').attr('disabled',true);

                        }
                        $('#inv_detail tbody tr[id="paid"]').css('background-color','aquamarine');
                        $('#inv_detail tbody tr[id="expired"]').css('background-color','pink');
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                table.destroy();
                $('#exampleModalpay').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // bank account list
    // $.ajax({
    //     url: 'api/sales/cus_booking_allotment_api.php',
    //     type:'POST',
    //     data: {action:'get_bank_acc'},
    //     success: function(response)
    //     {
    //         if(response)
    //         {
    //             for (var i=0; i<response.length; i++) {
    //                 $('#bank_acc').append($('<option>', { 
    //                     value: response[i].BANK_ID,
    //                     text : response[i].BANK_NAME
    //                 }));
    //             }
    //             $('#bank_acc').val(BANK_NAME)
    //         }
    //     },
    //     error: function(e) 
    //     {
    //     console.log(e);
    //     alert("Contact IT Department");
    //     }
    // });
});

//function for schedule view open model
$("#example1").on('click','.btn-schedule-view',function(){
    $("#ajax-loader").show();
    $('#exampleSchedule').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var plot_name = response[0].PLOT_NAME;
                var project_name = response[0].PROJECT_NAME;
                logo = logo_d.replace('../', '');
                $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP : '+unit_category_name+'</p><p>NAME : '+cust_name+'</p><p>ADDRESS : '+address+'</p><p>PHONE NO : '+contact_no+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>APARTMENT DETAILS : '+plot_name+'</p><p>'+street_name+'</p><p>BLOCK : '+block_name+'</p><p>'+project_name+'</p>');
                $('.btn-schedule-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_balance = 0;
                var pre_due_date = '';
                for (var i = 0; i < response.length; i++) {
                    if(response[i].DUE_DATE == pre_due_date && response[i].CHARGES_TYPE_ID > 3){
                        var s_no = '-';
                        var charges_type_name = '-';
                        var due_date = '-';
                        var schedule_date = '-';
                        var received_date = response[i].REC_DATE??''; 
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = '0';
                    }else{
                        var s_no = k++;
                        var charges_type_name = response[i].CHARGES_TYPE_NAME;
                        var due_date = response[i].DUE_DATE??''; 
                        var schedule_date = response[i].SCHEDULE_DATE??''; 
                        var received_date = response[i].REC_DATE??''; 
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = response[i].SCHEDULE_AMOUNT??'0'; 
                        var pre_due_date = due_date;
                    }
                    // var s_no = k++;
                    // var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    // var due_date = response[i].DUE_DATE ?? '';
                    // var received_date = response[i].REC_DATE ?? ''; 
                    // var received_amount = response[i].RECEIVED_AMOUNT ?? '0';
                    var add_received_amount=received_amount.toString();
                    var add_received_amount=received_amount.replace(/,/g,'');
                    // var schedule_amount = response[i].SCHEDULE_AMOUNT ?? '0';
                    var add_schedule_amount=schedule_amount.toString();
                    var add_schedule_amount=schedule_amount.replace(/,/g,'');
                    var total_schedule_amount = total_schedule_amount + parseInt(add_schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(add_received_amount);
                    var balance = parseInt(add_schedule_amount) - parseInt(add_received_amount);
                    function formatNumber (balance) {
                        return balance.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var balanced=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amount+'</td><td style="text-align:center;">'+due_date+'</td><td style="text-align:right;">'+received_amount+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:right;">'+balanced+'</td></tr>');
                }
                var total_schedule_amount=formatNumber(total_schedule_amount);
                var total_received_amount=formatNumber(total_received_amount);
                var total_balance=formatNumber(total_balance);
                var schedule_amount=schedule_amount.toString();
                var received_amount=received_amount.toString();
                var schedule_amount=schedule_amount.replace(/,/g,'');
                var received_amount=received_amount.replace(/,/g,'');
                    $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amount+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amount+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_balance+'</td></tr>');
                $('#exampleModelSchedule').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
//function for get challan
$("#example12").on('click','.btn-challan',function(){
    var inv_id = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_booking_challan.php?action=invoice_generate&invID="+inv_id;
    window.open(invoice_url, '_blank');
});
//function for exp challan
$("#example12").on('click','.btn-exp-challan',function(){
    var inv_id = $(this).attr("data-id");
    $('#form_no').val('');
    $('#invoice_no').val('');
    $('#amount').val('');
    $('#due_date').val('');
    $('#exp_date').val('');
    $('#remarks').html('');
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action:'view_exp_challan',inv_id:inv_id},
        success: function(response){
            console.log(response);
            $('#form_no').val(response.form_no);
            $('#invoice_no').val(response.trno);
            $('#amount').val(response.amount);
            $('#due_date').val(response.due_date);
            $('#exp_date').val(response.exp_date);
            
            // remarks option
            $.ajax({
                url: 'api/sales/unpaid_customer_api.php',
                type: 'POST',
                data: {action:'exp_invoice_reasons'},
                dataType: "json",
                success: function(response){
                    $('#remarks').empty();
                    $.each(response, function(key, value){
                        $('#remarks').append('<option value='+value["ID"]+'>'+value["DESCRIPTION"]+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            $('#exampleModal2').modal('show');
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
            alert("Contact IT Department");
        }
    });
});
//function for schedule challan
$("#exampleModelSchedule").on('click','.btn-schedule-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_booking_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
});

    // submit
$('#pendingbookingform').ready(function(e){
    $("#pendingbookingform").on('submit',(function(e) {
        $('.modal_u_btn').css('pointer-events','none');
        $('.modal_u_btn').find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
        $("#error_msg").text("");
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('action','insert');
        $.ajax({
            url: 'api/sales/cus_pending_booking_api.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                console.log(response);
                var formno = response.formno;
                var status = response.status;
                var message = response.message;
                if(status == 0){
                    $("#error_msg").text("Please check to proceed");
                    $(".modal_u_btn").css('pointer-events','');
                    $(".modal_u_btn").find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
                }else{
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                            $.get('sale/cus_booking_allotment/pending_booking.php',function(data,status){
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
                }
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }));
    
    $(".modal_u_btn").css('pointer-events','');
    $(".modal_u_btn").find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
});

// remarks form submit
$('#remarksForm').ready(function(e){
    $("#remarksForm").on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('action','remarks_insert');
        $.ajax({
            url: 'api/sales/cus_pending_booking_api.php',
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
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }));
});
//customer payment entry
$('#customer_pay_form').ready(function(e){
    $("#customer_pay_form").on('submit',(function(e) {

        $("#amount_error").text("");
        if ($(this).valid()) {
            var ck_box = $('#inv_detail input[name="checkbox"]:checked').length;
            if(ck_box < 1){
                $("#amount_error").text("please check at least one invoice");
            }else{
                
                $('.modal_pay_btn').css('pointer-events','none');
                $('.modal_pay_btn').find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');

                e.preventDefault();
                var formData = new FormData(this);
                var checkValues = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).val();
                }).get();
                var checkInvID = $('#inv_detail input[name=checkbox]:checked').map(function()
                {
                    return $(this).attr("data-inv_id");
                }).get();
                var ci_checkValues = $('#ci_div input[type="checkbox"]:checked').map(function()
                {
                    return $(this).val();
                }).get();
                if(ci_checkValues==""){
                    ci_checkValues = "N";
                }
                formData.append('inv_check',checkValues);
                formData.append('ci_check',ci_checkValues);
                formData.append('check_inv_id',checkInvID);
                formData.append('action','customer_payment_entry');
                $.ajax({
                    url: 'api/sales/cus_pending_booking_api.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(response){
                        console.log(response);
                        var status = response.status;
                        var message = response.message;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                $.get('sale/cus_booking_allotment/pending_booking.php',function(data,status){
                                    $('#content').html(data);
                                    $('#exampleModalpay').modal('hide');
                                    $('#exampleModalpay input').trigger("reset");
                                    $('#customer_pay_form').trigger("reset");
                                    $(".modal-backdrop").remove();
                                    $('body').removeClass('modal-open');
                                });
                                
                                let invoice_url = "invoicereports/payment_reciept.php?action=receipt_generate&invoice_no="+checkInvID;
                                window.open(invoice_url, '_blank');
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
        }
    }));
    
                
    $(".modal_pay_btn").css('pointer-events','');
    $(".modal_pay_btn").find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
});

// Payment Modes
$.ajax({
    url: 'api/sales/PaymentModes/ActionsHandler.php',
    type: 'POST',
    data: {action:'index'},
    dataType: "json",
    success: function(response){
        $('#deposit_type').empty();
        $.each(response.data, function(key, value){
            $('#deposit_type').append('<option value='+value["PAYMENT_MODE_ID"]+'>'+value["DESCRIPTION"]+'</option>');
        });
    },
    error: function(error){
        console.log(error);
        alert("Contact IT Department");
    }
});

// On change Payment Modes
$("#deposit_type").on("change", function() {
    if ($("#deposit_type").val() == 3) {
        $('#cheque_date').val('');
        $('#cheque_no').val('');
        $(".optional").hide();   
    }else{
        $(".optional").show();
    }
});

$("#inv_detail").on('change','input:checkbox',function(){
    if($(this).is(':checked')){
        total = parseFloat($('#rec_amount').val()) + Number($(this).attr("data-amount"));
        console.log(total);
    } else {
        total = parseFloat($('#rec_amount').val()) - Number($(this).attr("data-amount"));
        console.log(total);
    }
    $('#rec_amount').val(total);
    console.log(total);
});

// on check invoices
$('#inv_detail').on('click','input[name=checkbox][value="1"]',function(){
    if(this.checked)
    {
        $('input[name=checkbox][value="2"]').removeAttr('disabled');
        $('input[name=checkbox][value="2,3"]').removeAttr('disabled');
    }
    else
    {
        $('input[name=checkbox][value="2"]').attr('disabled',true);
        $('input[name=checkbox][value="2,3"]').attr('disabled',true);
    }
});
$('#inv_detail').on('click','input[name=checkbox][value="2"]',function(){
    if(this.checked)
    {
        $('input[name=checkbox][value="1"]').attr('disabled',true);
        $('input[name=checkbox][value="3"]').removeAttr('disabled');
    }
    else
    {
        $('input[name=checkbox][value="1"]').removeAttr('disabled');
        $('input[name=checkbox][value="3"]').attr('disabled',true);
    }
});
$('#inv_detail').on('click','input[name=checkbox][value="3"]',function(){
    if(this.checked)
    {
        $('input[name=checkbox][value="2"]').attr('disabled',true);
        $('input[name=checkbox][value="1,2"]').attr('disabled',true);
        $('#ci').attr('disabled',true);
        $('#ci').prop('checked',true);
    }
    else
    {
        $('input[name=checkbox][value="2"]').removeAttr('disabled');
        $('input[name=checkbox][value="1,2"]').removeAttr('disabled');
        $('#ci').attr('disabled',false);
        $('#ci').prop('checked',false);
    }
});
$('#inv_detail').on('click','input[name=checkbox][value="2,3"]',function(){
    if(this.checked)
    {
        $('input[name=checkbox][value="1"]').attr('disabled',true);
    }
    else
    {
        $('input[name=checkbox][value="1"]').removeAttr('disabled');
    }
});
$('#inv_detail').on('click','input[name=checkbox][value="1,2"]',function(){
    if(this.checked)
    {
        $('input[name=checkbox][value="3"]').removeAttr('disabled');
    }
    else
    {
        $('input[name=checkbox][value="3"]').attr('disabled',true);
    }
});
var inv_dis_check_box = $('#inv_detail input[name="checkbox"][disabled="disabled"]:checked').length;
if(inv_dis_check_box > 2 && $('input[value="3"]').is(':checked'))
{
    $('input[name=checkbox][value="1"]').attr('disabled',true);
    $('input[name=checkbox][value="2"]').attr('disabled',true);
}

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
$("#pending_booking_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/pending_booking.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>