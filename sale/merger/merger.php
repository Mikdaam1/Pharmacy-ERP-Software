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
                                                <h3 class="card-title">Merge Process</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402b1a" style="display: none;">
                                                        <button class="btn" id="one_in_one"> <i class="ion ion-person-add"></i>  One In One</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1b" style="display: none;">
                                                        <button class="btn" id="one_in_two"> <i class="fa fa-user-times"></i>  One In Two</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1b" style="display: none;">
                                                        <button class="btn" id="two_in_one"> <i class="fa fa-user-times"></i>  Two In Ones</button>
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
                                                <h3 class="card-title">Merger Files</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 no-padding 402b1b" style="display: none;">
                                                        <button class="btn" id="merger_unpaid_customer"> <i class="fa fa-user-times"></i>  UnPaid</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1c" style="display: none;">
                                                        <button class="btn" id="merger_paid_customer"> <i class="fa fa-hands-helping"></i> Paid</button>
                                                    </div>
                                                    <div class="col-sm-3 no-padding 402b1c" style="display: none;">
                                                        <button class="btn" id="merger_posted_customer"> <i class="fa fa-hands-helping"></i> Posted</button>
                                                    </div>
                                                </div>
                                            </div>
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
    $('#one_in_one').click(function(){
        $.get('sale/merger/one_in_one.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#one_in_two').click(function(){
        $.get('sale/merger/one_in_two.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#two_in_one').click(function(){
        $.get('sale/merger/two_in_one.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#merger_unpaid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-user-times').addClass('fa-spin fa-refresh');
        $.get('sale/merger/merger_unpaid.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#merger_paid_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-hands-helping').addClass('fa-spin fa-refresh');
        $.get('sale/merger/merger_paid.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#merger_posted_customer').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-hands-helping').addClass('fa-spin fa-refresh');
        $.get('sale/merger/merger_posted.php',function(data,status){
            $('#content').html(data);
        });
    });
    
});
</script>