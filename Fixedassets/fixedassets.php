<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Fixed Assets</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="fa_breadcrumb">Fixed Assets</button></li>
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
                            <div class="row 702a1">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Assets Record</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="offices"> <i class="fa fa-building"></i> Offices</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="asset_category"> <i class="fa fa-list-alt"></i> Asset Category</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="asset_product"> <i class="fa fa-dolly"></i> Asset Product</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 
                            <!-- /.row -->
                        </div>
                        <!-- /.card -->
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
    $('#offices').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-building').addClass('fa-spin fa-refresh');
        $.get('Fixedassets/fa_offices.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#asset_category').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list-alt').addClass('fa-spin fa-refresh');
        $.get('Fixedassets/fa_category.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#asset_product').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-dolly').addClass('fa-spin fa-refresh');
        $.get('Fixedassets/fa_product.php',function(data,status){
            $('#content').html(data);
        });
    });
    

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#fa_breadcrumb").on("click", function () {
        $.get('Fixedassets/fixedassets.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>