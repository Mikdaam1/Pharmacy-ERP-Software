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
            <h1>Posted MIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="posted_breadcrumb">Posted MIS</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="sale_breadcrumb">Sale</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_main"> <i class="fas fa-tachometer-alt"></i></li>
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
                        <div class="card-body">
                          Count of Selected Records : <span id="dvcount"></span>
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>SR.No</th>
                                  <th>Form No</th>
                                  <th>Invoice No</th>
                                  <th>Customer</th>
                                  <th>Type</th>
                                  <th>Due Date</th>
                                  <th>Amount</th>
                                  <th>Expiry Date</th>
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
<!-- ADD Modal -->


<!-- Edit Modal -->
<div class="modal fade" id="ADDMODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="INSERTFORM">
              <div class="modal-body">
                <!-- <input type="hidden" name="hrm_departmentId" id="hrm_departmentId"> -->
                <div class="row">
                  <div class="col-md-12 form-group"> 
                        <label for="">Upload Excel : </label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-image"></i></span>
                              </div>
                                <input class="form-control" type="file" name="excel" id="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >                         
                        </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="">Bank Account :<span style="color:red">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>
                            </div>
                            <select class="form-control form-control" name = "bank_acc" id="bank_acc">
                            </select>
                        </div>
                    </div>
                </div>
              </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" id="addexceldetail" class="btn btn-primary"><i class="far fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<script>
// insertform validations
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#INSERTFORM').validate({
    rules: {
      excel: {
        required: true,
      }
    },
    messages: {
      excel: {
        required: "Please Insert an Excel",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});



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
        url: 'api/sales/BANK_MIS/Bank_MIS_api.php',
        type: 'POST',
        data: {action: 'posted_view'},
        success: function(response){
            $("#ajax-loader").hide();
            console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
            // j = i++;
            var s_no = k++;
            var id = response[i].ID;
            var reg_no = response[i].REGNO;
            var challan_no = response[i].CHALLANNO;
            var customer = response[i].CUSTOMER;
            var type = response[i].TYPE;
            var due_date = response[i].DUEDATE;
            var amount = response[i].AMOUNT;
            var exp_date = response[i].EXPIREDATE;
            table.row.add([s_no,reg_no,challan_no,customer,type,due_date,amount,exp_date]);
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
});
    // Breadcrumbs
    $("#sale_breadcrumb").on("click", function () {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });

    $("#posted_breadcrumb").on("click", function () {
        $.get('sale/MIS/posted_mis.php', function(data,status){
            $("#content").html(data);
        }); 
    });

var secF_data = '<?php echo $_SESSION['data']['SEC_F']; ?>';
var secF_dataArr = secF_data.split(',');

for (let i = 0; i < secF_dataArr.length; i++) {
    $('.'+secF_dataArr[i]).show();
    // console.log(secF_dataArr[i]);
}
</script>
<?php include '../../includes/loader.php'?>