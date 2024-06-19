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
            <h1>Customer Surcharge</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="surcharge_breadcrumb">Surcharge</button></li>
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
                      <h3 class="card-title">Customer Surcharge Record</h3>
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
<!-- Surcharge view Model -->
<div class="modal fade" id="exampleModelSurcharge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quarter Surcharge</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4" id="logo-Surcharge"></div>
                    <div class="col-8 text-right p-3" id="inv_title-Surcharge"></div>
                </div>
                <div class="row">
                    <div class="col-6 h6" id="inv-left-detail-Surcharge"></div>
                    <div class="col-2"></div>
                    <div class="col-4 text-right h6" id="inv-right-detail-Surcharge"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 form-group text-center">
                        <span id="error_msg_Surcharge" style="color: red;font-size: 13px;"></span>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>SR.No</th>
                              <th>Account Head</th>
                              <th>Quarter Amount</th>
                              <th>Issue Date</th>
                              <th>Invoice Issue Date</th>
                              <th>Surcharge Expiry Date</th>
                              <th>Surcharge</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="exampleSurcharge"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-Surcharge-challan"><i class="far fa-print text-info fa-fw"></i></button>
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
//function for schedule view open model

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
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view'},
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
              
            if(jQuery.inArray("402a5a_1", secF_dataArr) !== -1){
                var schedule_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-schedule-view 402a5a_1" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
            }
            if(jQuery.inArray("402a5a_2", secF_dataArr) !== -1){
                var inv_btn = '<button type="button" data-id='+form_no+' class="btn btn-sm btn-surcharge-invoice-view 402a5a_2" title="View Surcharge Invoice"><i class="fas fa-print text-info fa-fw" ></i></button>';
            }
              var btn = schedule_btn+inv_btn;
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
$("#example1").on('click','.btn-schedule-view',function(){
    $('#exampleSchedule').html('');
    var form_no = $(this).attr("data-id");
    $("#ajax-loader").show();
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
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
                var email = response[0].EMAIL;
                var address = response[0].PERM_ADD;
                var logo_d = response[0].LOGO;
                var inv_title = response[0].INVOICE_TITLE;
                var unit_category_name = response[0].UNIT_CAT_NAME;
                var block_name = response[0].BLOCK_NAME;
                var street_name = response[0].STREET_NAME;
                var project_name = response[0].PROJECT_NAME;
                var plot_name = response[0].PLOT_NAME;
                // logo = logo_d.replace('../', '');
                // $('#logo').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#inv-right-detail').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>BLOCK ('+block_name+')</p><p>'+project_name+'</p>');
                $('.btn-schedule-challan').attr('data-id',form_no);

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
                        var surcharge_amount = response[i].SURCHARGE_AMOUNT??'0';
                    }else{
                        var s_no = k++;
                        var charges_type_name = response[i].CHARGES_TYPE_NAME;
                        var due_date = response[i].DUE_DATE??''; 
                        var schedule_date = response[i].SCHEDULE_DATE??''; 
                        var received_date = response[i].REC_DATE??''; 
                        var received_amount = response[i].RECEIVED_AMOUNT??'0';
                        var schedule_amount = response[i].SCHEDULE_AMOUNT??'0'; 
                        var surcharge_amount = response[i].SURCHARGE_AMOUNT??'0';
                        var pre_due_date = due_date;
                    }
                    // var s_no = k++;
                    // var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    // var due_date = response[i].DUE_DATE??'';
                    // var schedule_date = response[i].SCHEDULE_DATE??'';
                    // var received_date = response[i].REC_DATE??''; 
                    // var received_amount = response[i].RECEIVED_AMOUNT??'0';
                    // var schedule_amount = response[i].SCHEDULE_AMOUNT??'0';
                    function formatNumber (amount) {
                        return amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var schedule_amounts=formatNumber(schedule_amount);
                    var received_amounts=formatNumber(received_amount);
                    var surcharge_amounts = formatNumber(surcharge_amount); 
                    // var surcharge_amount = response[i].SURCHARGE_AMOUNT??'0';
                    var cheaque_no = response[i].CHEAQUE_NO??'';
                    var total_schedule_amount = total_schedule_amount + parseInt(schedule_amount);
                    var total_schedule_amounts=formatNumber(total_schedule_amount);
                    var total_received_amount = total_received_amount + parseInt(received_amount);
                    var total_received_amounts=formatNumber(total_received_amount);
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
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
                    $('#exampleSchedule').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:right;">'+schedule_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:right;">'+received_amounts+'</td><td style="text-align:center;">'+received_date+'</td><td style="text-align:center;">'+cheaque_no+'</td><td style="text-align:right;'+$style+'">'+balances+'</td><td style="text-align:right;color:red;">'+surcharge_amounts+'</td></tr>');
                }
                    $('#exampleSchedule').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:right;">'+total_schedule_amounts+'</td><td style="text-align:center;"></td><td style="text-align:right;">'+total_received_amounts+'</td><td style="text-align:center;"></td><td></td><td style="text-align:right;">'+total_balances+'</td><td style="text-align:right;color:red;">'+total_surcharge_amounts+'</td></tr>');
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
    $('#exampleSurcharge').html('');
    var form_no = $(this).attr("data-id");
    $("#ajax-loader").show();
    $.ajax({
        url: 'api/sales/cus_surcharge_api.php',
        type: 'POST',
        data: {action: 'view_surcharge',form_no:form_no},
        success: function(response){
            console.log(response);
            $("#ajax-loader").hide();
            if(response.status == 0){
                alert(response.message);
            }else{
                var date = new Date();
                var current_date = moment(date).format("YYYY-MM-DD");
                var cnic = response[0].CN0C_NO;
                var sale_id = response[0].SALE_ID;
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
                logo = logo_d.replace('../', '');
                $('#logo-Surcharge').html('<img id="logoImg" src="'+logo+'"  width="145" height="70"/>');
                $('#inv_title-Surcharge').html('<h1>'+inv_title+'</h1>');
                $('#inv-left-detail-Surcharge').html('<p>REG.NO : '+form_no+'</p><p>MEMBERSHIP # '+unit_category_name+'</p><p>'+cust_name+'</p><p>'+address+'</p><p>PHONE NO : '+contact_no+'</p><p>Email : '+email+'</p>');
                $('#inv-right-detail-Surcharge').html('<p>DATED : '+current_date+'</p><p>RESIDENTIAL NO.'+plot_name+'</p><p>'+street_name+'</p><p>BLOCK ('+block_name+')</p><p>'+project_name+'</p>');
                $('.btn-Surcharge-challan').attr('data-id',form_no);

                // append data in table
                k = 1;
                var total_surcharge_amount = 0;
                var total_balance = 0;
                for (var i = 0; i < response.length; i++) {
                    if(response[i].SURCHARGE_AMOUNT == '0'){
                        continue;
                    }
                    var s_no = k++;
                    var charges_type_name = response[i].CHARGES_TYPE_NAME;
                    var surcharge_exp_date = response[i].SURCHARGE_EXP_DATE;
                    var quarter_amount = response[i].SCHEDULE_AMOUNT;
                    var schedule_date = response[i].SCHEDULE_DATE??''; 
                    var inv_issue_date = response[i].SURCHARGE_ISSUE_DATE??''; 
                    function formatNumber (quarter_amount) {
                        return quarter_amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    var quarter_amounts=formatNumber(quarter_amount);
                    var surcharge_amount = response[i].SURCHARGE_AMOUNT;
                    var surcharge_amounts = formatNumber(surcharge_amount);
                    var booking_detail_id = response[i].ID;
                    var surcharge_issue_date = response[i].SURCHARGE_ISSUE_DATE??'';
                    var total_surcharge_amount = total_surcharge_amount + parseInt(surcharge_amount);
                    var total_surcharge_amounts = formatNumber(total_surcharge_amount);
                    var checkboxes = '<input class="bulkchecked" name="checkbox" type="checkbox" data-amount='+surcharge_amount+' data-sale-id='+sale_id+' data-form='+form_no+' value='+booking_detail_id+' title='+charges_type_name+'>';
                    $('#exampleSurcharge').append('<tr><td>'+s_no+'</td><td>'+charges_type_name+'</td><td style="text-align:center;">'+quarter_amounts+'</td><td style="text-align:center;">'+schedule_date+'</td><td style="text-align:center;">'+inv_issue_date+'</td><td style="text-align:center;">'+surcharge_exp_date+'</td><td style="text-align:right;color:red;">'+surcharge_amounts+'</td><td>'+checkboxes+'</td></tr>');
                }
                    // var all_check = '<input class="all_check" id="all_check" data-sale-id='+sale_id+' data-form='+form_no+' value='+total_surcharge_amount+' type="checkbox">';
                    $('#exampleSurcharge').append('<tr><td></td><td style="text-align:center;">TOTAL</td><td style="text-align:center;"></td><td></td><td></td><td></td><td style="text-align:right;color:red;">'+total_surcharge_amounts+'</td></tr>');
                $('#exampleModelSurcharge').modal('show');
            }
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    
    // $('#exampleSurcharge').on('click','#all_check',function(){
    //     var checked = this.checked;
    //     if (checked) {
    //         $('#exampleSurcharge').find('.bulkchecked').prop('checked', true);
    //     } else {
    //         $('#exampleSurcharge').find('.bulkchecked').prop('checked', false);         
    //     }
    // });
});
$("#exampleModelSurcharge").on('click','.btn-Surcharge-challan',function(){
    $("#error_msg_Surcharge").text("");
    var ck_box = $('#exampleSurcharge input[type="checkbox"]:checked').length;
    if(ck_box < 1){
        $("#error_msg_Surcharge").text("please check at least one surcharge");
    }else{
        var checkValues = $('#exampleSurcharge input[name=checkbox]:checked').map(function()
        {
            return $(this).val();
        }).get();

        //amount calculate
        var checkamount = $('#exampleSurcharge input[name=checkbox]:checked').map(function()
        {
            return $(this).attr('data-amount');
        }).get();
        var totalAmount = 0;
        for (var i = 0; i < checkamount.length; i++) {
            totalAmount += checkamount[i] << 0;
        }
        //amount calculate

        // var tamount = $('#all_check').val();
        var sale_id = $('#exampleSurcharge input[name=checkbox]:checked').attr('data-sale-id');
        var form_no = $('#exampleSurcharge input[name=checkbox]:checked').attr('data-form');
        
        $.ajax({
            url: 'api/sales/cus_surcharge_api.php',
            type: 'POST',
            data: {action: 'insert',totalAmount:totalAmount,checkamount:checkamount,booking_detail_id:checkValues,sale_id:sale_id,form_no:form_no},
            success: function(response){
                
                console.log(response);
                var status = response.status;
                var message = response.message;
                var booking = response.booking;
                $.ajax({
                    url: "api/message_session/message_session.php",
                    type: 'POST',
                    data: {message:message,status:status},
                    success: function (response) {
                        $.get('sale/cus_booking_allotment/quarter_surcharge_payment.php',function(data,status){
                            $('#content').html(data);
                            $('#exampleModelSurcharge').modal('hide');
                            $('#exampleModelSurcharge input').trigger("reset");
                            $(".modal-backdrop").remove();
                            $('body').removeClass('modal-open');
                        });
                        let invoice_url = "invoicereports/customer_surcharge_challan.php?action=invoice_generate&B="+booking;
                        window.open(invoice_url, '_blank');
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
$("#surcharge_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/customer_surcharge.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>