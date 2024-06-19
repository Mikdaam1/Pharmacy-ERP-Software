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
            <h1>Filter Paid Quarter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="filter_due_quarter_breadcrumb">Filter Due Quarter</button></li>
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
                        
                        <form id="filter_form">
                            <div class="card-header">
                                <?php include '../../display_message/display_message.php'?>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 form-group">
                                        <label for="">Campaign</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-bullhorn"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "f_campaign" id="f_campaign">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 form-group">
                                        <label for="">From Year</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "f_from_year" id="f_from_year">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 form-group">
                                        <label for="">To Year</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "f_to_year" id="f_to_year">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 form-group">
                                        <label for="">From Paid Qty</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "f_from_quarter" id="f_from_quarter">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 form-group">
                                        <label for="">To Paid Qty</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm" name = "f_to_quarter" id="f_to_quarter">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary search">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form id="checkbox_form">
                            <!-- /.card-header -->
                            <div class="card-body" id="record_table" style="display:none">
                                <div class="row">
                                    <div class="col-sm-12 form-group text-center">
                                        <span id="error_msg" style="color: red;font-size: 13px;"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Generate Invoice</button>
                                    </div>
                                </div>
                                <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th>
                                        <th>SR.No</th>
                                        <th>Form No</th>
                                        <th>SALE ID</th>
                                        <th>First BOOKING DATE</th>
                                        <th>TOTAL QUARTERS</th>
                                        <th>TOTAL RECEIVED QUARTERS</th>
                                        <th>TOTAL REMAINING QUARTERS</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </form>
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
<script type="text/javascript">

$('document').ready(function(){
    // Get all Marketing Campaigns
    $.ajax({
        url: 'api/sales/MarketingCampaign/ActionsHandler.php',
        type: 'POST',
        data: {action: 'index'},
        dataType: "json",
        success: function(response){
            $('#f_campaign').empty();
            $('#f_campaign').append('<option value=>--select--</option>');
            $.each(response.data, function(key, value){
                $('#f_campaign').append('<option value='+value["CAMPAIGN_ID"]+'>'+value["REMARKS"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    // Get all Years
    var nowY = new Date().getFullYear(),
    optionsY = "";

    for(var Y=nowY; Y>=2016; Y--) {
        optionsY += "<option value="+Y+">"+ Y +"</option>";
    }
    $("#f_from_year").append( optionsY );
    $("#f_to_year").append( optionsY );
    
    // Get quarters number
    optionsN = "";
    for(var N=1; N<=20; N++) {
        optionsN += "<option value="+N+">"+ N +"</option>";
    }
    $("#f_from_quarter").append( optionsN );
    $("#f_to_quarter").append( optionsN );
}); 


$('#filter_form').ready(function(e){
    $("#filter_form").on('submit',(function(e) {
            
            $("#ajax-loader").show();
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('action','filter_due_quarter');
            $('#example1').dataTable().fnDestroy();

            $("#record_table").css('display','');
            let table = $('#example1').DataTable({
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print','colvis'
                ],
            });

            // Setup - add a text input to each footer cell
            // $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
            // $('#example1 thead tr:eq(1) th').each( function (i) {
            //     var title = $(this).text();
            //     $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

            //     $( 'input', this ).on( 'keyup change', function () {
            //         if ( table.column(i).search() !== this.value ) {
            //             table.column(i).search( this.value ).draw();
            //         }
            //     });
            // });

            $.ajax({
                url: 'api/sales/cus_due_quarter_api.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    $("#ajax-loader").hide();
                    console.log(response);
                    table.clear().draw();
                    
                    // append data in datatable
                    k = 1;
                    for (var i = 0; i < response.length; i++) {
                        var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].MAX_UNPAID_BOOKING_ID+'>';
                        var s_no = k++;
                        var form_no = response[i].FORM_NO;
                        var sale_id = response[i].SALE_ID;
                        var booking_date = response[i].BOOKING_DATE;
                        var last_received_quarter_date = response[i].LAST_RECEIVED_QUARTER_DATE;
                        var total_quarter = response[i].TOTAL_QUARTER;
                        var total_received_quarter = response[i].TOTAL_RECEIVED_QUARTER;
                        var total_remain_quarter = response[i].TOTAL_REMAIN_QUARTER;
                        var btn = checkboxes;
                        table.row.add([btn,s_no,form_no,sale_id,booking_date,total_quarter,total_received_quarter,total_remain_quarter]);
                    }
                    table.draw();
                },
                error: function(error){
                    console.log(error);
                    alert("Contact IT Department");
                }
            });
            //check all rows in table
            $('#all_check').click(function(event) {
            var checked = this.checked;
            table.column(0).nodes().to$().each(function(index) {    
                if (checked) {
                    $(this).find('.bulkchecked').prop('checked', true);
                } else {
                    $(this).find('.bulkchecked').prop('checked', false);         
                }
            });    
            table.draw();
            });
    }));
});

// submit
$('#checkbox_form').ready(function(e){
    $("#checkbox_form").on('submit',(function(e) {
        $("#error_msg").text("");
        
        e.preventDefault();
        var formData = new FormData(this);
        //get all checked values
        var matches = [];
        
        var table = $('#example1').dataTable();
        var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
        checkedcollection.each(function (index, elem) {
            matches.push($(elem).val());
        });
        var bulkchecked = JSON.stringify(matches);
        // console.log(bulkchecked);
        // console.log(matches);
        //get all checked values
        
        formData.append('bulkchecked',bulkchecked);
        formData.append('action','insert');

        var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
        if(ck_box < 1){
            $("#error_msg").text("please check at least one quater");
        }else{
            $.ajax({
                url: 'api/sales/cus_due_quarter_api.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    console.log(response);
                    var status = response.status;
                    var message = response.message;
                    $.ajax({
                        url: "api/message_session/message_session.php",
                        type: 'POST',
                        data: {message:message,status:status},
                        success: function (response) {
                            $.get('sale/cus_booking_allotment/quarter_invoices.php',function(data,status){
                                $('#content').html(data);
                            });
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
    }));
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
$("#filter_due_quarter_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/filter_due_quarter.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>