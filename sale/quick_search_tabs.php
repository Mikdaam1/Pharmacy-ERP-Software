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
              <h1>Quick Search Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="current_breadcrumb">Quick Search</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fa fa-tachometer-alt"></i></button></li>
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
                    <div class="col-sm-4">
                      <h3 class="card-title">Name: <b><span id="cus_name"></span></b></h3>
                    </div>
                    <div class="col-sm-4">
                      <h3 class="card-title">CNIC: <b><span id="cus_cnic"></span></b></h3>
                    </div>
                    <div class="col-sm-4">
                      <h3 class="card-title">Project: <b><span id="cus_project"></span></b></h3>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <!-- <h4>Custom Content Below</h4> -->
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item col-sm-2">
                            <a class="nav-link active" id="customer-information-tab" data-toggle="pill" href="#customer-information" role="tab" aria-controls="customer-information" aria-selected="true">Customer Information</a>
                        </li>
                        <li class="nav-item col-sm-2">
                            <a class="nav-link" id="allotment-details-tab" data-toggle="pill" href="#allotment-details" role="tab" aria-controls="allotment-details" aria-selected="false">Allotment Details</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent">
                        
                        <!-- First Tab-->
                        <div class="tab-pane fade show active" id="customer-information" role="tabpanel" aria-labelledby="customer-information-tab">
                        <!-- <div class="card mt-3"> -->
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <!-- <div class="col-sm-4 form-group">
                                            <label for="">REG No :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "reg_no" id="reg_no" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-4 form-group">
                                            <label for="">Customer No :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" pattern="[a-zA-Z0-9 ,._-]{1,}"  maxlength="30" name = "cus_no" id="cus_no" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Customer Name :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name = "name" id="name" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Contact No 2:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "contact2" id="contact2" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">Contact No :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name = "contact" id="contact" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">CNIC No :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                </div>
                                                <input type="text" name = "cnic" id="cnic" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-4 form-group">
                                            <label for="">Unit Type :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <input type="text" name = "unit_type" id="unit_type" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-4 form-group">
                                            <label for="">Project :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                                </div>
                                                <input type="text" name = "project" id="project" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="">Country :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <input type="text" id="country" name="country" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">Province :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <input type="text" id="province" name="province" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label for="">City :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <input type="text" id="city" name="city" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-sm-4 form-group">
                                            <label for="">Campaign :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <input type="text" name = "campaign" id="campaign" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-12 form-group">
                                            <label for="">Permanent Address :</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
                                                </div>
                                                <textarea type="text" id="perm_address" name="perm_address" rows="2" class="form-control form-control-sm" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <!-- </div> -->
                        </div>
                        <!--./First Tab-->
                        <!--2nd Tab-->
                        <div class="tab-pane fade" id="allotment-details" role="tabpanel" aria-labelledby="allotment-details-tab">
                        <!-- <div class="card mt-3"> -->
                            <div class="card-body">
                                <table id="example1" class=" table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>Sale ID</th>
                                    <th>Sale Date</th>
                                    <th>Allote</th>
                                    <th>Booking Date</th>
                                    <th>Sale Status</th>
                                    <th>Asset Code</th>
                                    <th>Cancel Date</th>
                                    <th>Registration Form</th>
                                    <th>Remarks</th>
                                    <th>Time Farme</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        <!-- </div> -->
                        </div>
                        <!--./2nd Tab-->
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>

<!--View Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">View Supplementary Challan</h5> -->
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
              <table id="example12" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Invoice No</th>
                    <th>PONO</th>
                    <th>Unit</th>
                    <th>Chart Account Code</th>
                    <th>Head Name</th>
                    <th>Debit</th>
                    <th>Credit</th>
                  </tr>
                </thead>
              </table>
            </div>
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
                                <th>Issue Date</th>
                                <th>Paid Amount</th>
                                <th>Paid On</th>
                                <th>DS/DD No.</th>
                                <th>Out/Stand</th>
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

<!-- Quarter view Model -->
<div class="modal fade" id="exampleModelQuarter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pay Due Quarter</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="checkbox_form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4" id="qlogo"></div>
                        <div class="col-8 text-right p-3" id="qinv_title"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 h6" id="qinv-left-detail"></div>
                        <div class="col-2"></div>
                        <div class="col-4 text-right h6" id="qinv-right-detail"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group text-center">
                            <span id="error_msg" style="color: red;font-size: 13px;"></span>
                        </div>
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
                                    <th>Issue Date</th>
                                    <th>Paid Amount</th>
                                    <th>Paid On</th>
                                    <th>DS/DD No.</th>
                                    <th>Out/Stand</th>
                                </tr>
                            </thead>
                            <tbody id="exampleQuarter"></tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="modal-body">
                            <div class="modal-footer justify-content-between">  
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                <button type="submit" class="btn btn_pay_quarter_challan"><i class="far fa-print text-info fa-fw"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Surcharge view Model -->
<div class="modal fade" id="exampleModelSurcharge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Surcharge</h5>
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
                                <th>Issue Date</th>
                                <th>Paid Amount</th>
                                <th>Paid On</th>
                                <th>DS/DD No.</th>
                                <th>Out/Stand</th>
                                <th>Surcharge</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSurcharge"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-surcharge-challan"><i class="far fa-print text-info fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Surcharge view Model -->
<div class="modal fade" id="exampleModelSurchargeHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document" style="width: 1450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Surcharge</h5>
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
                                <th style="width:20%;">Account Head</th>
                                <th style="width:8%;">Due Amount</th>
                                <th style="width:8%;">Issue Date</th>
                                <th style="width:8%;">Paid Amount</th>
                                <th style="width:8%;">Paid On</th>
                                <th style="width:8%;">DS/DD No.</th>
                                <th style="width:8%;">Out/Stand</th>
                                <th style="width:8%;">Surcharge</th>
                                <th style="width:8%;">Surcharge Paid</th>
                                <th style="width:8%;">Surcharge Discount</th>
                                <th style="width:8%;">Remaining Surcharge</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSurchargeHistory"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-surcharge-challan"><i class="far fa-print text-info fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invoices view Model -->
<div class="modal fade" id="exampleModalInvoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Invoices</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="inv_detail" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR.No</th>
                            <th>VOIDE</th>
                            <th>INV ID</th>
                            <th>Form No</th>
                            <th>SALE ID</th>
                            <!-- <th>SALE TRNO</th> -->
                            <th>CUS ID</th>
                            <th>Customer Name</th>
                            <th>Exp Date</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quarter Record view Model -->
<div class="modal fade" id="exampleModalQuarterRecord" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quarter Record</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <table id="quarter_record" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SALE ID</th>
                            <th>Form No</th>
                            <th>TOTAL QUARTER</th>
                            <th>TOTAL RECEIVED QUARTER</th>
                            <th>TOTAL RECEIVED AMOUNT</th>
                            <th>TOTAL PENDING QUARTER</th>
                            <th>TOTAL PENDING AMOUNT</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
<script>
        
var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');
//tab1
var search_type = '<?php echo $_GET['search_type']; ?>';
var search_number = '<?php echo $_GET['search_number']; ?>';

$(document).ready(function(){
    $.ajax({
        url: 'api/finance/customer_information_api.php',
        type:'POST',
        data:{action:'spec_cust_view',search_type:search_type,search_number:search_number},
        success: function(response) {
            data = response.data;
            console.log(data);
            $('#contact2').val(data.CONTACT_NO2);
            $('#cus_cnic').text(data.CNIC_NO);
            $('#cus_name').text(data.CUS_NAME);
            $('#cus_project').text(data.PARTICULARS);

            
            // $('#reg_no').val(data.FORM_NO);
            $('#cus_no').val(data.CUS_ID);
            $('#name').val(data.CUS_NAME);
            $('#contact').val(data.CONTACT_NO);
            $('#contact2').val(data.CONTACT_NO2);
            $('#cnic').val(data.CNIC_NO);
            $('#perm_address').text(data.PERM_ADD);
            $('#country').val(data.COUNTRY_NAME);
            $('#province').val(data.PROVINCE_NAME);
            $('#city').val(data.CITY_NAME);
            $('#project').val(data.PARTICULARS);
            // $('#campaign').val(data.REMARKS);
            // $('#unit_type').val(data.DESCRIPTION);
        },
        error: function(e){
            console.log(e);
                    alert("Contact IT Department");
        }
    });
});
//tab2
$(document).ready(function(){
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
        url: 'api/finance/customer_information_api.php',
        type:'POST',
        data:{action:'allotment_details',search_type:search_type,search_number:search_number},
        success: function(data) {
            console.log(data);
            // Empty datatable previouse records
            table.clear().draw();
            // append data in datatable
            for (var i = 0; i < data.length; i++) {
                if(data[i].CONFIRMATION > 2){
                    
                    if(jQuery.inArray("402a1a_1", secF_dataArr) !== -1){
                        var schedule_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
                    }
                    if(jQuery.inArray("402a1a_2", secF_dataArr) !== -1){
                        var surcharge_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-surcharge-view" title="View Surcharge Statement"><i class="fas fa-analytics text-danger fa-fw" ></i></button>';
                    }
                    if(jQuery.inArray("402a1a_2", secF_dataArr) !== -1){
                        var surcharge_history_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-surcharge-history-view" title="View Surcharge Statement History"><i class="fas fa-analytics text-gray fa-fw" ></i></button>';
                    }
                    if(jQuery.inArray("402a1a_3", secF_dataArr) !== -1){
                        var quarter_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-quarter-view" title="View Quater Schedule"><i class="fas fa-file-invoice text-success fa-fw" ></i></button>';
                    }
                    if(jQuery.inArray("402a1a_4", secF_dataArr) !== -1){
                        var pending_quarter_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-pending-quarter" title="View Pending Quater Record"><i class="fas fa-file-invoice text-danger fa-fw" ></i></button>';
                    }
                // }else if(data[i].CONFIRMATION > 2){
                }else{
                    var schedule_btn='';
                    var surcharge_btn='';
                    var quarter_btn='';
                    var pending_quarter_btn='';
                }
                if(jQuery.inArray("402a1a_5", secF_dataArr) !== -1){
                    var invoice_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-invoice-view" title="View Booking Invoice"><i class="fas fa-print text-success fa-fw" ></i></button>';
                }
                var btn = schedule_btn+surcharge_btn+surcharge_history_btn+invoice_btn+quarter_btn+pending_quarter_btn;
                table.row.add([data[i].SALE_ID, data[i].SALE_DATE, data[i].ALLOTTE, data[i].BOOKING_DATE, data[i].SALE_STATUS, data[i].ASSET_CODE, data[i].CANCEL_DATE, data[i].FORM_NO, data[i].REMARKS, data[i].TIME_FARME ,btn]);
            }
            table.draw();
        },
        error: function(e){
            console.log(e);
                    alert("Contact IT Department");
        }
    });
});

//view schedule
$("#example1").on('click','.btn-schedule-view',function(){
    $('#exampleSchedule').html('');
    $("#ajax-loader").show();
    $(".btn-schedule-view").css('pointer-events','none');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            $(".btn-schedule-view").css('pointer-events','');
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var email = response[0].EMAIL;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var project_name = response[0].PROJECT_NAME;
                var plot_name = response[0].PLOT_NAME;
                logo = logo_d?logo_d.replace('../', ''):'';
                $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE NO : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>'+block_name+'</p><p>'+project_name+'</p>');
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
                    function formatNumber (schedule_amount) {
                        return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var received_amounts = formatNumber(received_amount);
                    var schedule_amounts = formatNumber(schedule_amount); 
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var balances=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    var total_balances=formatNumber(total_balance);
                    if(balance < 0){
                        $style = "color:red;";
                    }else{
                        $style = "";
                    }
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td></tr>');
                }
                    $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td></tr>');
                $('#exampleModelSchedule').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
//view quater surcharge
$("#example1").on('click','.btn-quarter-view',function(){
    $('#exampleQuarter').html('');
    $("#ajax-loader").show();
    $(".btn-quarter-view").css('pointer-events','none');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            $(".btn-quarter-view").css('pointer-events','');
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var email = response[0].EMAIL;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var project_name = response[0].PROJECT_NAME;
                var plot_name = response[0].PLOT_NAME;
                logo = logo_d?logo_d.replace('../', ''):'';
                $('#qlogo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#qinv_title').html('<h1>'+inv_title+'</h1>');
                $('#qinv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE NO : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#qinv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>'+block_name+'</p><p>'+project_name+'</p>');
                $('.btn_pay_quarter_challan').attr('data-id',form_no);

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
                    function formatNumber (schedule_amount) {
                        return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var received_amounts = formatNumber(received_amount);
                    var schedule_amounts = formatNumber(schedule_amount); 
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var received_status = response[i].RECEIVED_STATUS;
                    var booking_detail_id = response[i].BOOKING_DETAIL_ID;
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var balances=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    var total_balances=formatNumber(total_balance);
                    
                    if(received_status == 'Y'){
                        var checkbox = '<small class="badge badge-success">Paid</small>';
                    }else{
                        var checkbox = '<input class="bulkchecked" name="bulkchecked[]" type="checkbox" data-amount='+total_schedule_amount+' value='+booking_detail_id+'>';
                    }
                    
                    if(balance < 0){
                        $style = "color:red;";
                    }else{
                        $style = "";
                    }                
                    $('#exampleQuarter').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td><td>'+checkbox+'</td></tr>');      
                }
                    $('#exampleQuarter').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td></tr>');
                $('#exampleModelQuarter').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

//view pending quarter
$("#example1").on('click','.btn-pending-quarter',function(){
    $("#ajax-loader").show();
    $(".btn-pending-quarter").css('pointer-events','none');
    var form_no = $(this).attr("data-id");
    let table = $('#quarter_record').DataTable({});
    $.ajax({
        url: 'api/sales/cus_pending_booking_api.php',
        type: 'POST',
        data: {action: 'view_pending_quarter_record',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            $(".btn-pending-quarter").css('pointer-events','');
            if(response.status == '1'){

                table.clear().draw();
                
                table.row.add([response.data.SALE_ID,response.data.FORM_NO,response.data.TOTAL_QUARTER,response.data.TOTAL_RECEIVED_QUARTER,response.data.TOTAL_RECEIVED_AMOUNT,response.data.TOTAL_PENDING_QUARTER,response.data.TOTAL_PENDING_AMOUNT]);
                    
            }else{
                table.clear().draw();
                
                table.row.add(['-','-','-','-','-','-','-']);
                  
            }
                table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
    $('#exampleModalQuarterRecord').modal('show');
});

//view surcharge
$("#example1").on('click','.btn-surcharge-view',function(){
    $("#ajax-loader").show();
    $(".btn-surcharge-view").css('pointer-events','none');
    $('#exampleSurcharge').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            $(".btn-surcharge-view").css('pointer-events','');
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var email = response[0].EMAIL;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var project_name = response[0].PROJECT_NAME;
                var plot_name = response[0].PLOT_NAME;
                logo = logo_d?logo_d.replace('../', ''):'';
                $('#exampleModelSurcharge #logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#exampleModelSurcharge #inv_title').html('<h1>'+inv_title+'</h1>');
                $('#exampleModelSurcharge #inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#exampleModelSurcharge #inv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>BLOCK ('+block_name+')</p><p>'+project_name+'</p>');
                $('#exampleModelSurcharge .btn-surcharge-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_surcharge_amount = 0;
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
                        var surcharge_amount = response[i].REMAINING_SURCHARGE??'0';
                    }else{
                        var s_no = k++;
                        var charges_type_name = response[i].CHARGES_TYPE_NAME;
                        var due_date = response[i].DUE_DATE??'';
                        var schedule_date = response[i].SCHEDULE_DATE??'';
                        var received_date = response[i].REC_DATE??''; 
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = response[i].SCHEDULE_AMOUNT??'0';
                        var surcharge_amount = response[i].REMAINING_SURCHARGE??'0';
                        var pre_due_date = due_date;
                    }
                    function formatNumber (schedule_amount) {
                        return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var received_amounts = formatNumber(received_amount);
                    var schedule_amounts = formatNumber(schedule_amount); 
                    var surcharge_amounts = formatNumber(surcharge_amount); 
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var total_surcharge_amounts=formatNumber(total_surcharge_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var balances=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    var total_balances=formatNumber(total_balance);
                    if(balance < 0){
                        $style = "color:red;";
                    }else{
                        $style = "";
                    }
                    $('#exampleSurcharge').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td><td style="text-align:right;color:red;">'+surcharge_amounts+'</td></tr>');
                }
                    $('#exampleSurcharge').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td><td style="text-align:right;color:red;">'+total_surcharge_amounts+'</td></tr>');
                $('#exampleModelSurcharge').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

//view surcharge
$("#example1").on('click','.btn-surcharge-history-view',function(){
    $("#ajax-loader").show();
    $(".btn-surcharge-history-view").css('pointer-events','none');
    $('#exampleSurchargeHistory').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view_surcharge_history',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            $(".btn-surcharge-history-view").css('pointer-events','');
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var form_no = response[0].FORM_NO;
                var contact_no = response[0].CONTACT_NO;
                var cust_name = response[0].CUS_NAME;
                var email = response[0].EMAIL;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var project_name = response[0].PROJECT_NAME;
                var plot_name = response[0].PLOT_NAME;
                logo = logo_d?logo_d.replace('../', ''):'';
                $('#exampleModelSurchargeHistory #logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#exampleModelSurchargeHistory #inv_title').html('<h1>'+inv_title+'</h1>');
                $('#exampleModelSurchargeHistory #inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#exampleModelSurchargeHistory #inv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>BLOCK ('+block_name+')</p><p>'+project_name+'</p>');
                $('#exampleModelSurchargeHistory .btn-surcharge-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_surcharge_amount = 0;
                var total_sur_receiving_amount = 0;
                var total_sur_discount_amount = 0;
                var total_remaining_surcharge = 0;
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
                        var surcharge_amount = response[i].SURCHARGE_AMOUNT??'0';
                        var sur_receiving_amount = response[i].SUR_RECEIVING_AMOUNT??'0';
                        var sur_discount_amount = response[i].SUR_DISCOUNT_AMOUNT??'0';
                        var remaining_surcharge = response[i].REMAINING_SURCHARGE??'0';
                    }else{
                        var s_no = k++;
                        var charges_type_name = response[i].CHARGES_TYPE_NAME;
                        var due_date = response[i].DUE_DATE??'';
                        var schedule_date = response[i].SCHEDULE_DATE??'';
                        var received_date = response[i].REC_DATE??''; 
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = response[i].SCHEDULE_AMOUNT??'0';
                        var surcharge_amount = response[i].SURCHARGE_AMOUNT??'0';
                        var sur_receiving_amount = response[i].SUR_RECEIVING_AMOUNT??'0';
                        var sur_discount_amount = response[i].SUR_DISCOUNT_AMOUNT??'0';
                        var remaining_surcharge = response[i].REMAINING_SURCHARGE??'0';
                        var pre_due_date = due_date;
                    }
                    function formatNumber (schedule_amount) {
                        return schedule_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var received_amounts = formatNumber(received_amount);
                    var schedule_amounts = formatNumber(schedule_amount); 
                    var surcharge_amounts = formatNumber(surcharge_amount); 
                    var sur_receiving_amounts = formatNumber(sur_receiving_amount); 
                    var sur_discount_amounts = formatNumber(sur_discount_amount); 
                    var remaining_surcharges = formatNumber(remaining_surcharge); 
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
                    var total_sur_receiving_amount = total_sur_receiving_amount + parseInt(sur_receiving_amount);
                    var total_sur_discount_amount = total_sur_discount_amount + parseInt(sur_discount_amount);
                    var total_remaining_surcharge = total_remaining_surcharge + parseInt(remaining_surcharge);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var total_surcharge_amounts=formatNumber(total_surcharge_amount);
                    var total_sur_receiving_amounts=formatNumber(total_sur_receiving_amount);
                    var total_sur_discount_amounts=formatNumber(total_sur_discount_amount);
                    var total_remaining_surcharges=formatNumber(total_remaining_surcharge);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var balances=formatNumber(balance);
                    var total_balance = total_balance + balance;
                    var total_balances=formatNumber(total_balance);
                    if(balance < 0){
                        $style = "color:red;";
                    }else{
                        $style = "";
                    }
                    $('#exampleSurchargeHistory').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td><td style="text-align:right;color:red;">'+surcharge_amounts+'</td><td style="text-align:right;color:red;">'+sur_receiving_amounts+'</td><td style="text-align:right;color:red;">'+sur_discount_amounts+'</td><td style="text-align:right;color:red;">'+remaining_surcharges+'</td></tr>');
                }
                    $('#exampleSurchargeHistory').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td><td style="text-align:right;color:red;">'+total_surcharge_amounts+'</td><td style="text-align:right;color:red;">'+total_sur_receiving_amounts+'</td><td style="text-align:right;color:red;">'+total_sur_discount_amounts+'</td><td style="text-align:right;color:red;">'+total_remaining_surcharges+'</td></tr>');
                $('#exampleModelSurchargeHistory').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});

//view invoices
$("#example1").on('click','.btn-invoice-view',function(){
    $("#ajax-loader").show();
    $(".btn-invoice-view").css('pointer-events','none');
    var form_no = $(this).attr("data-id");
    let table = $('#inv_detail').DataTable({});
    $.ajax({
        url: 'api/finance/customer_information_api.php',
        type: 'POST',
        data: {action: 'view_invoices',form_no:form_no},
        success: function(response){
            $("#ajax-loader").hide();
            $(".btn-invoice-view").css('pointer-events','');
            console.log(response);
            table.clear().draw();
            
            for (var i = 0; i < response.length; i++) {
                // append data in datatable
                var s_no = '1';
                var sale_id = response[i].SALE_ID;
                var voide = response[i].VOIDE;
                var form_no = response[i].FORM_NO;
                var cus_id = response[i].CUS_ID;
                var cust_name = response[i].CUS_NAME;
                var exp_date = response[i].EXPIRY_DATE;
                var inv_id = response[i].INV_ID;
                var inv_Amount = response[i].AMOUNT;
                var paid_status = response[i].PAID;
                var commission_status = response[i].COMMISSION_STATUS;
                var booking_detail_id = response[i].BOOKING_DETAIL_ID;
                var current_date = new Date();
                var current_date = moment(current_date).format("YYYY-MM-DD");
                var exp_date = moment(exp_date).format("YYYY-MM-DD");
                if(paid_status == 'Y'){
                    var checkbox = '<small class="badge badge-success">Paid</small>';
                }else{
                    var checkbox = '<input class="amount_checkbox" name="checkbox" type="checkbox" data-inv_id='+inv_id+' data-amount='+inv_Amount+' value='+booking_detail_id+'>';
                }
                table.row.add([s_no,voide,inv_id,form_no,sale_id,cus_id,cust_name,exp_date,inv_Amount,checkbox]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    table.destroy();
    $('#exampleModalInvoice').modal('show');
});

// submit
$('#checkbox_form').ready(function(e){
    $("#checkbox_form").on('submit',(function(e) {
        $("#error_msg").text("");
        
        e.preventDefault();
        var formData = new FormData(this);
        //get all checked values
        var matches = [];
        
        var bulkchecked = $('#exampleQuarter input[type=checkbox]:checked').map(function()
        {
            return $(this).val();
        }).get();
        
        // var bulkchecked = JSON.stringify(bulkchecked);
        // console.log(bulkchecked1);
        formData.append('bulkchecked',bulkchecked);
        formData.append('action','generate_quarter_challan');
        
        var ck_box = $('#exampleQuarter input[type="checkbox"][class="bulkchecked"]:checked').length;
        if(ck_box < 1){
            $("#error_msg").text("please check at least one quater");
        }else{
            $("#ajax-loader").show();
            $.ajax({
                url: 'api/finance/customer_information_api.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                            
                    $("#ajax-loader").hide();
                    console.log(response);
                    var status = response.status;
                    var message = response.message;
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                            
                            $.get('sale/quick_search.php',function(data,status){
                                $('#content').html(data);
                            });

                            $('#exampleModelQuarter').modal('hide');
                            $('#exampleModelQuarter input').trigger("reset");
                            $(".modal-backdrop").remove();
                            $('body').removeClass('modal-open');
                        },
                        error: function(e) 
                        {
                            console.log(e);
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

$("#exampleModelSchedule").on('click','.btn-schedule-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_booking_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
});
$("#exampleModelSurcharge").on('click','.btn-surcharge-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_surcharge_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
});

// breadcrumbs
$('#current_breadcrumb').click(function(){
    $.get('sale/quick_search.php',function(data,status){
        $('#content').html(data);
    });
});
$("#sale_breadcrumb").on("click", function() {
    $.get('sale/sale.php', function(data,status){
        $("#content").html(data);
    });
});
$("#surcharge_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/customer_statement.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../includes/loader.php'?>