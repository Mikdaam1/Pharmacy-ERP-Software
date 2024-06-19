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
                                                <h3 class="card-title ">Booking Reporting</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="category_report"> <i class="fa fa-list-alt"></i> Registration By Category </button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="date_report"> <i class="fa fa-calendar-minus"></i> Registration By Date </button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="enduser_report"> <i class="fa fa-calendar-minus"></i> Registration By End User </button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="campaign_report"> <i class="fa fa-calendar-minus"></i> Registration By Campaign </button>
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
                                                <h3 class="card-title ">Booked Reporting</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="booking_report"> <i class="fa fa-list-alt"></i> Booking </button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="asset_report"> <i class="fa fa-calendar-minus"></i> Asset</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402a1a" style="display: none;">
                                                        <button class="btn" id="file_report"> <i class="fa fa-calendar-minus"></i> File </button>
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
    $('#category_report').click(function(){
        $.get('sale/reporting/category_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    
    
    $('#campaign_report').click(function(){
        $.get('sale/reporting/campaign_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#date_report').click(function(){
        $.get('sale/reporting/date_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#asset_report').click(function(){
        $.get('sale/reporting/asset_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#file_report').click(function(){
        $.get('sale/reporting/file_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#enduser_report').click(function(){
        $.get('sale/reporting/end_user_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#booking_report').click(function(){
        $.get('sale/reporting/booking_report.php',function(data,status){
            $('#content').html(data);
        });
    });
    
    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#reporting_breadcrumb").on("click", function() {
        $.get('sale/reporting/reporting.php', function(data,status){
            $("#content").html(data);
        });
    });
    
});
</script>