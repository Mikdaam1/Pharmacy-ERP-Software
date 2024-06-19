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
                                <!-- /.row -->
                                <div class="row 402b1" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Allottee To Allottee Registration Section</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402b1a" style="display: none;">
                                                        <button class="btn" id="transfer_customer_reg"> <i class="ion ion-person-add"></i>  Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1b" style="display: none;">
                                                        <button class="btn" id="transfer_unpaid_customer"> <i class="fa fa-user-times"></i>  UnPaid Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1c" style="display: none;">
                                                        <button class="btn" id="transfer_paid_customer"> <i class="fa fa-hands-helping"></i> Paid Registration</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div> 
                                <!-- /.row -->
                                <div class="row 402b2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Allottee To Allottee Biometric</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 402b2a" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee"> <i class="fa fa-plus"></i> Create</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2b" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_pending"> <i class="fa fa-fingerprint" style="color:red"></i> Biometric Pending</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2c" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_biometric"> <i class="fa fa-fingerprint"></i> Biometric Data</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2d" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_provisional"> <i class="fa fa-file"></i> Provisional Data</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 402b2f" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_approved"> <i class="fa fa-check"></i> Approved</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2e" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_final_printed"> <i class="fa fa-file-check"></i> Final Printed</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row 402b2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Open Files</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402b1a" style="display: none;">
                                                        <button class="btn" id="transfer_customer_reg"> <i class="ion ion-person-add"></i>  Registration</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2b" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_pending"> <i class="fa fa-fingerprint" style="color:red"></i> Biometric Pending</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2c" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_biometric"> <i class="fa fa-fingerprint"></i> Biometric Data</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2d" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_provisional"> <i class="fa fa-file"></i> Provisional Data</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2f" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_approved"> <i class="fa fa-check"></i> Approved</button>
                                                    </div>
                                                    <div class="col-sm-3 402b2e" style="display: none;">
                                                        <button class="btn" id="allottee_to_allottee_final_printed"> <i class="fa fa-file-check"></i> Final Printed</button>
                                                    </div>
                                                </div>
                                            </div>
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
    $('#transfer_customer_reg').click(function(){
        $.get('sale/transfer/transfer_customer_reg_cnic.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#transfer_unpaid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-user-times').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/transfer_unpaid_customers.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#transfer_paid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-hands-helping').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/transfer_paid_customers.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee').click(function(){
        $.get('sale/transfer/allottee_to_allottee_form_check.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee_pending').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-fingerprint').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/allottee_to_allottee_pending.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee_biometric').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-fingerprint').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/allottee_to_allottee_biometric.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee_provisional').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/allottee_to_allottee_provisional.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee_final_printed').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-file-check').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/allottee_to_allottee_final_printed.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#allottee_to_allottee_approved').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-check').addClass('fa-spin fa-refresh');
        $.get('sale/transfer/allottee_to_allottee_approved.php',function(data,status){
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