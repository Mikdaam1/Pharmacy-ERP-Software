<?php 
ob_start();
ob_clean();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                            <div class="card-body button">
                                <div class="row 402a1" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title ">Quick Search</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="quick_search"> <i class="ion ion-person-add"></i>  Quick Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row -->
                                <div class="row 402a2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Registration Section</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402a2a" style="display: none;">
                                                        <button class="btn" id="new_customer_reg"> <i class="ion ion-person-add"></i>  New Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a2b" style="display: none;">
                                                        <button class="btn" id="expired_invoices"> <i class="fa fa-ban"></i>  Expired Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a2c" style="display: none;">
                                                        <button class="btn" id="unpaid_customer"> <i class="fa fa-user-times"></i>  UnPaid Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a2d" style="display: none;">
                                                        <button class="btn" id="paid_customer"> <i class="fa fa-hands-helping"></i> Paid Registration</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row -->
                                <!-- /.row -->
                                <div class="row 402a2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title"> MIS</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402a2a" style="display: none;">
                                                        <button class="btn" id="upload_mis"> <i class="fa fa-file-upload"></i>  Upload MIS</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a2a" style="display: none;">
                                                        <button class="btn" id="posted_mis"> <i class="fa fa-file-upload"></i>  Posted MIS</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row -->
                                <div class="row 402a3" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Booking</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 402a3a" style="display: none;">
                                                        <button class="btn" id="pending_booking"> <i class="fa fa-file-times"></i> Pending Bookings</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3b" style="display: none;">
                                                        <button class="btn" id="allotment_booking"> <i class="fa fa-tags"></i> Allotment</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3c" >
                                                        <button class="btn" id="category_files"> <i class="fa fa-list-alt"></i> Category Files</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3d" >
                                                        <button class="btn" id="confirm_booking"> <i class="fa fa-paper-plane"></i> Confirm Category Files</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 402a3e">
                                                        <button class="btn" id="confirm_plot"> <i class="fa fa-check"></i> Confirm Plot Files</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3e">
                                                        <button class="btn" id="active_reg"> <i class="fa fa-registered"></i> Active Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3e">
                                                        <button class="btn" id="complete_file"> <i class="fa fa-clipboard-list-check"></i> Complete Files</button>
                                                    </div>
                                                    <div class="col-sm-3 402a3e">
                                                        <button class="btn" id="complete_detail_file"> <i class="fa fa-clipboard-list-check"></i> Complete Detail Files</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>  
                                <!-- /.row -->
                                <div class="row 402a4" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Quarters</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 402a4a" style="display: none;">
                                                        <button class="btn" id="filter_due_quarter"> <i class="fa fa-search"></i> Filter Due Quarter</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4b" style="display: none;">
                                                        <button class="btn" id="due_quarter"> <i class="fa fa-file-times"></i> Due Quarter</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4c" style="display: none;">
                                                        <button class="btn" id="quarter_invoices"> <i class="fa fa-file-invoice"></i> Quarter Invoices</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4d" style="display: none;">
                                                        <button class="btn" id="quarter_printed_invoices"> <i class="fa fa-print"></i> Quarter Printed Invoices</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4e" style="display: none;">
                                                        <button class="btn" id="exp_quarter_invoices"> <i class="fa fa-ban"></i> Expired Quarter Invoices</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4f" style="display: none;">
                                                        <button class="btn" id="quarter_invoice_payment"> <i class="fa fa-donate"></i> Quarter Invoice Payment</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4g" style="display: none;">
                                                        <button class="btn" id="quarter_paid_invoices"> <i class="fa fa-file-invoice-dollar"></i> Quarter Paid Invoices</button>
                                                    </div>
                                                    <div class="col-sm-3 402a4g" style="display: none;">
                                                        <button class="btn" id="voide_quarters"> <i class="fa fa-file-times"></i> Voide Quarter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row 402a6" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Quarter Reports</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4 402a4h" style="display: none;">
                                                        <button class="btn" id="quarter_report"> <i class="fa fa-file-invoice-dollar"></i> Print Reports (Bulk Invoices + Statement)</button>
                                                    </div>
                                                    <div class="col-sm-4 402a4h" style="display: none;">
                                                        <button class="btn" id="quarter_report_printed"> <i class="fa fa-file-invoice-dollar"></i> Printed Reports (Bulk Invoices + Statement)</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row 402a5" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Surcharge</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 402a5a" style="display: none;">
                                                        <button class="btn" id="customer_surcharge"> <i class="fa fa-money-check-alt"></i> Surcharge</button>
                                                    </div>
                                                    <div class="col-sm-3 402a5b" style="display: none;">
                                                        <button class="btn" id="surcharge_waveoff"> <i class="fa fa-donate"></i> Surcharge Wave off</button>
                                                    </div>
                                                    <div class="col-sm-3 402a5c" style="display: none;">
                                                        <button class="btn" id="quarter_surcharge_payment"> <i class="fa fa-donate"></i> Surcharge Payment</button>
                                                    </div>
                                                    <div class="col-sm-3 402a5d" style="display: none;">
                                                        <button class="btn" id="quarter_paid_surcharge"> <i class="fa fa-ban"></i> Paid Surcharge</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row 402a6" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Statement</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 402a6a" style="display: none;">
                                                        <button class="btn" id="cus_statement"> <i class="fa fa-list"></i> Customer Statement</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

<script>
    

// Function for control module
$(document).ready(function() {


    var secD_data = '<?php echo $_SESSION['data']['SEC_D']; ?>';
    var secD_dataArr = secD_data.split(',');

    for (let i = 0; i < secD_dataArr.length; i++) {
        $('.'+secD_dataArr[i]).show();
        console.log(secD_dataArr[i]);
    }


    var secE_data = '<?php echo $_SESSION['data']['SEC_E']; ?>';
    var secE_dataArr = secE_data.split(',');

    for (let i = 0; i < secE_dataArr.length; i++) {
        $('.'+secE_dataArr[i]).show();
        console.log(secE_dataArr[i]);
    }

});
// Function for control module
$('document').ready(function(){
    $('#quick_search').click(function(){
        $.get('sale/quick_search.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#new_customer_reg').click(function(){
        $.get('sale/customer_reg_cnic.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#paid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-hands-helping').addClass('fa-spin fa-refresh');
        $.get('sale/paid_customer.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#unpaid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-user-times').addClass('fa-spin fa-refresh');
        $.get('sale/unpaid_customers.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#new_booking').click(function(){
        $.get('sale/cus_booking_allotment/new_booking.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#upload_mis').click(function(){
        $.get('sale/MIS/Upload_Mis.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#posted_mis').click(function(){
        $.get('sale/MIS/posted_mis.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#pending_booking').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-times').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/pending_booking.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allotment_booking').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-tags').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/allotment_booking.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#category_files').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list-alt').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/category_files.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#confirm_booking').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-paper-plane').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/confirm_booking.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#confirm_plot').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-check').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/confirm_plot_files.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#active_reg').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-registered').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/active_registration.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#complete_file').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-clipboard-list-check').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/complete_files.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#complete_detail_file').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-clipboard-list-check').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/complete_detail_files.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#filter_due_quarter').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-search').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/filter_due_quarter.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#due_quarter').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-times').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/due_quarter.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#quarter_invoices').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-invoice').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_invoices.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#quarter_printed_invoices').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-print').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_printed_invoices.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#surcharge_waveoff').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-donate').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/surcharge_waveoff.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#quarter_surcharge_payment').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-donate').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_surcharge_payment.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#expired_invoices").on('click', function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-ban').addClass('fa-spin fa-refresh');
        $.get('sale/expired_invoices.php', function(data,status){
                $("#content").html(data);
        });
    });
    $("#exp_quarter_invoices").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-ban').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/exp_quarter_invoices.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#cus_statement").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/customer_statement.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#quarter_paid_invoices").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-invoice-dollar').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_paid_invoices.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#voide_quarters").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-times').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/voide_quarters.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#quarter_report").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-invoice-dollar').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_report.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#quarter_report_printed").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-invoice-dollar').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_report_printed.php', function(data,status){
            $("#content").html(data);
        });
    });
    $("#customer_surcharge").on("click", function() {
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-money-check-alt').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/customer_surcharge.php', function(data,status){
            $("#content").html(data);
        });
    });
    $('#quarter_invoice_payment').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-donate').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_invoice_payment.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#quarter_paid_surcharge').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-ban').addClass('fa-spin fa-refresh');
        $.get('sale/cus_booking_allotment/quarter_paid_surcharge.php',function(data,status){
            $('#content').html(data);
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
    
});
</script>