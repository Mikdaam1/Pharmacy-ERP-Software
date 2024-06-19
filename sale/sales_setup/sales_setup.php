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
                <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active""><button class="btn btn-sm" id="sales_setup_breadcrumb"></button></li>
                        <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
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
                        <div class="card-body button">
                            <div class="row 402c1" style="display: none;">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"> Sales Invoice Settings</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 402c1a" style="display: none;">
                                                    <button class="btn" id="sale_invoice_date"> <i class="ion ion-calendar"></i> Sales Invoice Dates</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 402c1b" style="display: none;">
                                                    <button class="btn" id="booking_letter_date"> <i class="ion ion-calendar"></i> Booking Letter Date</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="row 402c2">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"> Sales Registration Types</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-sm-3 no-padding 402c2a" style="display: none;">
                                                    <button class="btn" id="asff_land_provider"> <i class="fa fa-map-marked"></i> Land Provider</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 402c2b" style="display: none;">
                                                    <button class="btn" id="asff_land_dealer"> <i class="fa fa-building"></i> Dealer</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 402c2c" style="display: none;">
                                                    <button class="btn" id="asff_land_agent"> <i class="fa fa-user-tie"></i> Agent</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 402c2d" style="display: none;">
                                                    <button class="btn" id="asff_marketing_firm"> <i class="fa fa-bullhorn"></i> Marketing Firm</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="row 402c3" >
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"> Permission</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-sm-3 no-padding 402c3a">
                                                    <button class="btn" id="emergency_permission"> <i class="fa fa-map-marked"></i> Emergency Permission</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="row 402c3" >
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"> Record Room Setup</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-sm-3 no-padding 402c3a">
                                                    <button class="btn" id="file_status"> <i class="fa fa-file"></i> File Status</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
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

    // Sales Registration Types
    $('#asff_land_provider').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-map-marked').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_Land_Provider_Listing.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#asff_land_dealer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-building').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_Dealer_Listing.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#asff_land_agent').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-user-tie').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_Agent_Listing.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#asff_marketing_firm').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-bullhorn').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_Marketing_Firm_Listing.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#emergency_permission').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-bullhorn').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_Permission.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#file_status').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-bullhorn').addClass('fa-spin fa-refresh');
        $.get('sale/sales_setup/Sale_ASFF_File_Status.php',function(data,status){
            $('#content').html(data);
        });
    });


    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#sales_setup_breadcrumb').click(function(){
        $.get('sale/sales_setup/sales_setup.php',function(data,status){
            $('#content').html(data);
        });
    });

});
</script>