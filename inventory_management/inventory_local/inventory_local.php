
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Inventory Local</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><button class="btn btn-sm" id="inv_local_breadcrumb">Inventory Local</button></li>
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
                                    <div class="card  card-primary">
                                        <div class="card-header ">
                                            <h3 class="card-title">Local Inventory</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="po_local_list"> <i class="fas fa-box-open"></i> PO Local</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1a">
                                                    <button class="btn" id="po_local_list_v2"> <i class="fas fa-box-open"></i> PO Local v2</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="del_challan"> <i class="fas fa-coins"></i> Delivery Challan</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1b">
                                                    <button class="btn" id="b_invoice"> <i class="fas fa-receipt"></i> Invoive STAX</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="return_note"> <i class="fas fa-coins"></i> Return Note</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="credit_notes"> <i class="fas fa-money-check-alt"></i> Credit Notes</button>
                                                </div>
                                                <div class="col-sm-3 no-padding 702a1c">
                                                    <button class="btn" id="voucher_l"> <i class="fas fa-list"></i> Voucher List</button>
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
    $('#po_local_list').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/po_local_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#po_local_list_v2').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fas")).removeClass('fa-box-open').addClass('fa-spin fa-refresh');
        $.get('inventory_management/inventory_local/po_local_list_v2.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#del_challan').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/delivery_challan_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#b_invoice').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-receipt').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/invoice_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#return_note').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-coins').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/return_note_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#credit_notes').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-money-check-alt').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/credit_note_list.php',function(data,status){
            $('#content').html(data);
        });
    });

    $('#voucher_l').click(function(){
        $(this).css('pointer-events','none');
        $(this).find($(".fa")).removeClass('fa-list').addClass('fa-spin fa-refresh');
        $.get('sales_module/transaction_files/account_voucher_list.php',function(data,status){
            $('#content').html(data);
        });
    });



    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#inv_local_breadcrumb").on("click", function () {
        $.get('inventory_management/inventory_local/inventory_local.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>