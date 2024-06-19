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
                <h1>Recovery</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="recovery_breadcrumb"> Recovery</button></li>
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
                                <div class="row 403b1" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h3 class="card-title">Assign Jobs </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6 no-padding 403b1a" style="display: none;">
                                                        <button class="btn" id="assign_calls"> <i class="fas fa-tasks" ></i>  Unpaid Due Quarters</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row 403b2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h3 class="card-title">Out Going Calls </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6 no-padding 403b1b" style="display: none;">
                                                        <button class="btn" id="call_remainder"> <i class="fas fa-calendar-exclamation"></i>  Call Reminder</button>
                                                    </div>
                                                    <div class="col-sm-6 no-padding 403b2a" style="display: none;">
                                                        <button class="btn" id="viewcalls"> <i class="fas fa-address-card" ></i>  View Calls</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-12 -->
                                </div>
                                <div class="row 403b2" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h3 class="card-title">Report </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6 no-padding 403b2a" style="display: none;">
                                                        <a href="invoicereports/daily_report_cs.php" target="_blank"><button class="btn" id="today_report"> <i class="fas fa-download" ></i>  Today Report</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-12 -->
                                </div>
                            </div>
                    </div>
                </div>
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
$(document).ready(function() {
    $('#assign_calls').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-tasks').addClass('fa-spin fa-refresh');
        $.get('sale/Recovery/recovery_assigncall.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#call_remainder').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-calendar-exclamation').addClass('fa-spin fa-refresh');
        $.get('sale/Recovery/recovery_callremainder.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#viewcalls').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-address-card').addClass('fa-spin fa-refresh');
        $.get('sale/Recovery/recovery_viewcalls.php',function(data,status){
            $('#content').html(data);
        });
    });
    
});
//breadcumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
//breadcrumbs
$("#recovery_breadcrumb").on("click", function () {
    $.get('sale/Recovery/recovery.php', function(data,status){
        $("#content").html(data);
    });
});

</script>