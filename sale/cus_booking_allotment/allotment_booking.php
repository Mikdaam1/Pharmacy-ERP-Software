<?php 
  session_start(); 
  include("../../api/auth/db.php");
  $user_id = $_SESSION['data']['ID']; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Allotment Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="allotment_booking_breadcrumb">Allotment</button></li>
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
                                <!-- <button type="submit" class="btn btn-primary">Approve</button> -->
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
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <!-- <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th> -->
                            <th>SR.No</th>
                            <th>Form No</th>
                            <th>CUS ID</th>
                            <th>Customer Name</th>
                            <th>CNIC</th>
                            <th>Contact No</th>
                            <th>Status</th>
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

    table.search('').draw(); //required after
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
        url: 'api/sales/cus_allot_booking_api.php',
        type: 'POST',
        data: {action: 'allotted_booking'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              // j = i++;
            //   var checkboxes = '<input type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].FORM_NO+'>';
              var s_no = k++;
              var form_no = response[i].FORM_NO;
              var cus_id = response[i].CUS_ID;
              var cust_name = response[i].CUS_NAME;
              var cnic = response[i].CNIC_NO;
              var contact_no = response[i].CONTACT_NO;
              var user_id = response[i].APPROVAL_USER_ID;
              var role = response[i].ROLE;
              var user="<?php echo $user_id  ?>";
              if(user ==user_id){
                var checkboxes = 'Assigned to <b>You</b>';
                // var checkboxes = '<input data-flag='+response[i].CONFIRMATION_APPROVAL_FLG+' type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].FORM_NO+'>';
              }else{
              var checkboxes = "Assign to "+response[i].APPROVAL_USER_NAME+"<b>("+role+")"+"</b>";
              }
            //   var btn = checkboxes;
              table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,checkboxes]);
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
});

// submit
// $('#checkbox_form').ready(function(e){
//     $("#checkbox_form").on('submit',(function(e) {
//         $("#error_msg").text("");
        
//         e.preventDefault();
//         var formData = new FormData(this);
//         //get all checked values
//         var matches = [];
//         var table = $('#example1').dataTable();
//         var checkedcollection = table.$(".bulkchecked:checked", { "page": "all" });
//         checkedcollection.each(function (index, elem) {
//             matches.push($(elem).val());
//         });
//         var bulkchecked = JSON.stringify(matches);
//         //get all checked values
        
//         formData.append('bulkchecked',bulkchecked);
//         formData.append('action','insert');
        
//         var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
//         if(ck_box < 1){
//             $("#error_msg").text("please check at least one booking");
//         }else{
//             $.ajax({
//                 url: 'api/sales/cus_quarter_invoices_api.php', // copy from quarter invoices
//                 type: 'POST',
//                 data: formData,
//                 contentType: false,
//                 cache: false,
//                 processData:false,
//                 success: function(response){
//                     var invoice_trno = response.invoice_trno;
//                     console.log(invoice_trno);
//                     var status = response.status;
//                     var message = response.message;
//                     $.ajax({
//                         url: "api/message_session/message_session.php",
//                         type: 'POST',
//                         data: {message:message,status:status},
//                         success: function (response) {
//                             $.get('sale/cus_booking_allotment/quarter_invoice_payment.php',function(data,status){
//                                 $('#content').html(data);
//                             });
//                         },
//                         error: function(e) 
//                         {
//                             console.log(e);
//                             alert("Contact IT Department");
//                         }   
//                     })
                    
//                     $.each(invoice_trno, function(key, value){
//                         let invoice_url = "invoicereports/quarter_invoices.php?action=invoice_generate&invID="+value;
//                         // window.location.href = 'pdfDownload/invoice_url';
//                         window.open(invoice_url, '_blank');
//                     });
//                 },
//                 error: function(error){
//                     console.log(error);
//                     alert("Contact IT Department");
//                 }
//             });
//         }
//     }));
// });

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
$("#allotment_booking_breadcrumb").on("click", function() {
    $.get('sale/cus_booking_allotment/allotment_booking.php', function(data,status){
        $("#content").html(data);
    });
});
</script>

<?php include '../../includes/loader.php'?>
