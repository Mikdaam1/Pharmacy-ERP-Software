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
            <h1>Due Quarter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="due_quarter_breadcrumb">Due Quarter</button></li>
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
                <form id="checkbox_form">
                    <div class="card">
                        <div class="card-header">
                        <?php include '../../display_message/display_message.php'?>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary bulk_inv_btn 402a4b_1" style="display:none;">Generate Invoice</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group text-center">
                                <span id="error_msg" style="color: red;font-size: 13px;"></span>
                            </div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        Count of Selected Records : <span id="dvcount"></span>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th>
                                <th>SR.No</th>
                                <th>Form No</th>
                                <th>SALE ID</th>
                                <th>SCHEDULE DATE</th>
                                <th>DUE DATE</th>
                                <th>AMOUNT</th>
                                <th>SCHEDULE AMOUNT</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
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

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');

if(jQuery.inArray("402a4b_1", secF_dataArr) !== -1){
    $('.402a4b_1').show();
}

$('#example1').ready(function(){
    $("#ajax-loader").show();
    let table = $('#example1').DataTable({
        dom: 'Bfrtip',
        orderCellsTop: true,
        fixedHeader: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ],
    });

    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table.column(i).search( this.value ).draw();
            }
        });
    });

    $.ajax({
        url: 'api/sales/cus_due_quarter_api.php',
        type: 'POST',
        data: {action: 'due_quarter'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].ID+'>';
            var s_no = k++;
            var sale_id = response[i].SALE_ID;
            var schedule_date = response[i].SCHEDULE_DATE;
            var due_date = response[i].DUE_DATE;
            var amount = response[i].AMOUNT;
            var schedule_amount = response[i].SCHEDULE_AMOUNT;
            var form_no = response[i].REGISTRATION_FORM_NO;
            var type = response[i].TYPE;
            var btn = checkboxes;
            table.row.add([btn,s_no,form_no,sale_id,schedule_date,due_date,amount,schedule_amount,type]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });

    //check all rows in table
    // $('#all_check').click(function(event) {
    // var checked = this.checked;
    // table.column(0).nodes().to$().each(function(index) {    
    //     if (checked) {
    //         $(this).find('.bulkchecked').prop('checked', true);
    //     } else {
    //         $(this).find('.bulkchecked').prop('checked', false);         
    //     }
    // });    
    // table.draw();
    // });

    $("#all_check").click(function() {
        var rows = table.rows({ 'search': 'applied' }).nodes();
        
        // debugger;
        if($('input:checked', rows).length == rows.length){
            $('input[type="checkbox"]', rows).prop('checked', false);
            }
            else{
            $('input[type="checkbox"]', rows).prop('checked', true);
        }


        $('#dvcount').html($(rows).find("input:checked").length);

        $("body").on("change","input",function() {

            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('#dvcount').html($(rows).find("input:checked").length);

        });
    });
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
        //get all checked values
        
        formData.append('bulkchecked',bulkchecked);
        formData.append('action','insert');
        
        var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
        if(ck_box < 1){
            $("#error_msg").text("please check at least one quater");
        }else{
            $("#ajax-loader").show();
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
                            
                            $("#ajax-loader").hide();
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
$("#due_quarter_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/due_quarter.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>
