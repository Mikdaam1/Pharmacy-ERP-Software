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
            <h1>Quarter Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="quarter_inv_breadcrumb">Quarter Report</button></li>
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
                        <form id="checkbox_form" action="invoicereports/quarter_multiple_statement_inv.php" method="post" target="blank">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input Type="hidden" name="action" value="invoice_generate">
                                    <input Type="hidden" name="bulk_form_numbers" id="bulk_form_numbers">
                                    <button type="submit" class="btn btn-primary bulk_schedule_btn 402a4h_2"><i class="fas fa-print fa-fw" ></i> &nbsp; Only Statements</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <form id="checkbox_invoices" action="invoicereports/report_multiple_vouchers.php" method="post" target="blank">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input Type="hidden" name="action" value="invoice_generate">
                                    <input Type="hidden" name="bulk_invID" id="bulk_invID">
                                    <button type="submit" class="btn btn-primary bulk_inv_btn 402a4h_2"><i class="fas fa-print fa-fw" ></i> &nbsp; Only Vouchers</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <form id="checkbox_statement_invoices" action="invoicereports/multiple_statement_and_voucher.php" method="post" target="blank">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input Type="hidden" name="action" value="invoice_generate">
                                    <input Type="hidden" name="bulk_statement_invID" id="bulk_statement_invID">
                                    <button type="submit" class="btn btn-primary bulk_statement_inv_btn 402a4h_2"><i class="fas fa-print fa-fw" ></i> &nbsp; Statements & Vouchers</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="error_msg" style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        Count of Selected Records : <span id="dvcount"></span>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th>
                                <th>SR.No</th>
                                <th>Quarter ID</th>
                                <th>Form No</th>
                                <th>Sale ID</th>
                                <th>Type Desc</th>
                                <th>Due Date</th>
                                <th>Expiry Date</th>
                                <th>Amount</th>
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
                                <th>Surcharge</th>
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

if(jQuery.inArray("402a4h_2", secF_dataArr) !== -1){
    $('.402a4h_2').show();
}

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
        url: 'api/sales/cus_quarter_invoices_api.php',
        type: 'POST',
        data: {action: 'quarter_report'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" data-id='+response[i].TRNO+' value='+response[i].FORM_NO+'>';
            var s_no = k++;
            var id = response[i].BOOKING_DETAIL_ID;
            var form_no = response[i].FORM_NO;
            var sale_id = response[i].SALE_ID;
            var type_desc = response[i].TYPE_DESC;
            var due_date = response[i].DUE_DATE;
            var exp_date = response[i].EXPIRY_DATE;
            var amount = response[i].AMOUNT;
            var trno = response[i].TRNO;
            // var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
            
            if(jQuery.inArray("402a4h_1", secF_dataArr) !== -1){
                var inv_btn = '<button data-id='+trno+' class="btn btn-sm btn-surcharge-invoice-view 402a4h_1" title="View Surcharge Invoice"><i class="fas fa-print text-info fa-fw" ></i></button>';
            }
            var btn = inv_btn;
            table.row.add([checkboxes,s_no,id,form_no,sale_id,type_desc,due_date,exp_date,amount,btn]);
            }
            table.draw();
            
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    //check all rows in table
    // $('#all_check').click(function(event) {
    // var checked = this.checked;
    // table.column(0).nodes().to$().each(function(index) {    
    //     if (checked) {
    //         $(this).find('.bulkchecked').prop('checked', true);
    //     } else {
    //         $(this).find('.bulkchecked').prop('checked', false);         
    //     }
    // });    
    // table.draw();
    // });


    $("#all_check").click(function() {
        var rows = table.rows({ 'search': 'applied' }).nodes();
        $('#dvcount').html($(rows).find("input:checked").length);
        // var count_row= $('#dvcount').val();
        // console.log(count_row);
        // debugger;
        if($('input:checked', rows).length == 250){
            $('input[type="checkbox"]', rows).slice(0,250).prop('checked', false);
        }
        else{
            console.log(rows.length);
            $('input[type="checkbox"]', rows).slice(0,250).prop('checked', true);
            // $('input[type="checkbox"]', rows).attr('disabled',true)
        }



        $("body").on("change","input",function() {

            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('#dvcount').html($(rows).find("input:checked").length);

        });
    });
});

$("#example1").on('click','.btn-schedule-view',function(){
    $('#exampleSchedule').html('');
    var form_no = $(this).attr("data-id");
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view_schedule',form_no:form_no},
        success: function(response){
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
                logo = logo_d.replace('../', '');
                $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP : '+unit_category_name+'</p><p>NAME : '+cust_name+'</p><p>ADDRESS : '+address+'</p><p>PHONE NO : '+contact_no+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>APARTMENT DETAILS : PLOT</p></p><p>BLOCK : (USMAN)</p></p><p>ASF CITY KARACHI</p>');
                $('.btn-schedule-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_schedule_amount = 0;
                var total_received_amount = 0;
                var total_surcharge_amount = 0;
                var total_balance = 0;
                for (var i = 0; i < response.length; i++) {
                    var s_no = k++;
                    var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    var due_date = response[i].DUE_DATE;
                    var schedule_date = response[i].SCHEDULE_DATE;
                    var received_date = response[i].REC_DATE??''; 
                    var received_amount = response[i].RECEIVED_AMOUNT??'0';
                    var schedule_amount = response[i].SCHEDULE_AMOUNT;
                    var surcharge_amount = response[i].SURCHARGE_AMOUNT;
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
                    var balance = parseInt(schedule_amount) - parseInt(received_amount);
                    var total_balance = total_balance + balance;
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amount+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amount+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;">'+balance+'</td><td style="text-align:right;color:red;">'+surcharge_amount+'</td></tr>');
                }
                    $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amount+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amount+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balance+'</td><td style="text-align:right;color:red;">'+total_surcharge_amount+'</td></tr>');
                $('#exampleModelSchedule').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
});
$("#exampleModelSchedule").on('click','.btn-schedule-challan',function(){
    var form_no = $(this).attr("data-id");
    let invoice_url = "invoicereports/customer_surcharge_schedule_challan.php?action=invoice_generate&form_no="+form_no;
    window.open(invoice_url, '_blank');
});

$("#example1").on('click','.btn-surcharge-invoice-view',function(){
    var trno = $(this).attr("data-id");
    let invoice_url = "invoicereports/quarter_inv_with_surcharge.php?action=invoice_generate&invID="+trno;
    window.open(invoice_url, '_blank');
});

// submit

//BULK SCHEDULE PRINT
$("#checkbox_form").on('click','.bulk_schedule_btn',(function() {
    $("#error_msg").text("");
    //get all checked values
    var matches = [];
    var table = $('#example1').dataTable();
    var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
    checkedcollection.each(function (index, elem) {
        matches.push($(elem).val());
    });

    // $.ajax({
    //     url: 'api/sales/cus_quarter_invoices_api.php',
    //     type: 'POST',
    //     data: {action: 'report_print',bulk_form_numbers:matches},
    //     success: function(response){
    //         var status = response.status;
    //         var message = response.message;
    //         $("#ajax-loader").hide();
    //         console.log(response);
    //         if(status == 1){
                $('#bulk_form_numbers').val(matches);
    //         }else{
    //             $("#error_msg").text(message);
    //         }

            
    //     },
    //     error: function(error){
    //         console.log(error);
    //         alert("Contact IT Department");
    //     }
    // });
}));

//BULK INVOICES PRINT
$("#checkbox_invoices").on('click','.bulk_inv_btn',(function() {
    $("#error_msg").text("");
    //get all checked values
    var matches = [];
    var table = $('#example1').dataTable();
    var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
    checkedcollection.each(function (index, elem) {
        matches.push($(elem).attr('data-id'));
    });

    $('#bulk_invID').val(matches);
}));
//BULK Statement and vouchers PRINT
$("#checkbox_statement_invoices").on('click','.bulk_statement_inv_btn',(function() {
    $("#error_msg").text("");
    //get all checked values
    var matches = [];
    var table = $('#example1').dataTable();
    var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
    checkedcollection.each(function (index, elem) {
        matches.push($(elem).attr('data-id'));
    });

    $('#bulk_statement_invID').val(matches);
}));

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
$("#quarter_inv_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/quarter_report.php', function(data,status){
        $("#content").html(data);
    });
});

</script>

<?php include '../../includes/loader.php'?>