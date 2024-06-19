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
                <h1>Record Room</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="record_breadcrumb"> Record Room</button></li>
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
                                <!-- /.row -->
                                <div class="row 404b1" style="display: none;">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                <h3 class="card-title">Register Items </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 404b1a" style="display: none;">
                                                    <button class="btn" id="sale_record_room"> <i class="fas fa-building" ></i>  Record Room Detail</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 404b1b" style="display: none;">
                                                    <button class="btn" id="sale_rack"> <i class="fas fa-warehouse"></i>  Rack</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 404b1c" style="display: none;">
                                                    <button class="btn" id="sale_shelf"> <i class="fas fa-inventory"></i>  Shelf</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 404b1d" style="display: none;">
                                                    <button class="btn" id="sale_file"> <i class="fas fa-file"></i>  File</button>
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
$(document).ready(function() {
    $('#sale_record_room').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-building').addClass('fa-spin fa-refresh');
        $.get('sale/record_room/recordroom_detail.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#sale_rack').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-warehouse').addClass('fa-spin fa-refresh');
        $.get('sale/record_room/room_rack.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#sale_shelf').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-inventory').addClass('fa-spin fa-refresh');
        $.get('sale/record_room/room_shelf.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#sale_file').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-file').addClass('fa-spin fa-refresh');
        $.get('sale/record_room/room_file.php',function(data,status){
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
$("#record_breadcrumb").on("click", function () {
    $.get('sale/record_room/record_room.php', function(data,status){
        $("#content").html(data);
    });
});

</script>