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
            <h1>Upload MIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="upload_breadcrumb">Upload MIS</button></li>
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
                        <div class="card-header">
                          <?php include '../../display_message/display_message.php'?>
                          <div class="row">
                              <!-- <div class="col-sm-9 text_right"> -->
                                  <!-- <button type="submit" class="btn btn-primary bulk_inv_btn 402a4b_1" style="display:none;">Generate Invoice</button> -->
                              <!-- </div> -->
                              
                              <!-- <div style="padding-left:10px" class="col-sm-2 text-right"> -->

                              <!-- <button type="submit" class="btn btn-primary bulk_inv_btn 402a4b_1" style="display:none;">Post</button> -->

                              <!-- <button type="button" id="add_button" class="btn btn-primary bulk_inv_btn 402a4b_1" style="display:none;">Import Excel</button> -->
                              <!-- </div> -->

                              
                            <div class="col-sm-12">
                              <button style="font-weight:bolder;background-color:#17588a; color:#ffffff;" type="submit" class="btn float-left"><i class="fa fa-file-import fa-xs"></i>&nbsp; Post</button>
                              <button style="font-weight:bolder;background-color:#17588a; color:#ffffff;" type="button" id="add_button" class="btn float-right"><i class="fa fa-upload"></i>&nbsp; Import Excel</button>
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
        data: {action: 'view'},
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
            var id = response[i].ID;
            var reg_no = response[i].REGNO;
            var challan_no = response[i].CHALLANNO;
            var customer = response[i].CUSTOMER;
            var type = response[i].TYPE;
            var due_date = response[i].DUEDATE;
            var amount = response[i].AMOUNT;
            var exp_date = response[i].EXPIREDATE;
            var btn = checkboxes;
            table.row.add([btn,s_no,reg_no,challan_no,customer,type,due_date,amount,exp_date,btn]);
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

// On Click Open Add Modal
$("#add_button").click(function() {
  $('#bank_acc').html('');
    // bank account list
    $.ajax({
        url: 'api/sales/cus_booking_allotment_api.php',
        type:'POST',
        data: {action:'get_bank_acc'},
        success: function(response)
        {
            if(response)
            {
                for (var i=0; i<response.length; i++) {
                    $('#bank_acc').append($('<option>', { 
                        value: response[i].BANK_ID,
                        text : response[i].BANK_NAME
                    }));
                }
            }
        },
        error: function(e) 
        {
        console.log(e);
        alert("Contact IT Department");
        }
    });
  $("#ADDMODAL").modal('show');
});

$(document).ready(function() {
  // On Click Add Form Submit Add Data
  $("#INSERTFORM").submit(function(e) {
    if ($("#INSERTFORM").valid()) {
      $("#ajax-loader").show();
      $("#addexceldetail").css('pointer-events','none');
      $("#addexceldetail").find($(".far")).removeClass('fa-plus').addClass('fa-spin fa-refresh');

      e.preventDefault();
      var form_data = new FormData(this);
      // console.log(form_data);
      form_data.append('action','store');
      $.ajax({
        url:'api/sales/BANK_MIS/Bank_MIS_api.php',
        method:'POST',
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
          // console.log(data);
          $("#ajax-loader").hide();
          var message = data.message;
          var status = data.status;
          $.ajax({
            url: "api/message_session/message_session.php",
            type: 'POST',
            data: {message:message,status:status},
            
            success: function (data) {
                  $.get('sale/MIS/Upload_Mis.php',function(data,status){
                      $('#content').html(data);
                      $('#ADDMODAL').modal('hide');
                      $('#ADDMODAL input').trigger("reset");
                      $(".modal-backdrop").remove();
                      $('body').removeClass('modal-open');
                  });
            },
            error: function(e) 
            {
              console.log(e);
              alert("Contact IT Department");
            }        
          });
        },
        error:function(error){
          console.log(error);
          alert("Contact IT Department");
        }
      });
    }
  });
});
//checkbox post invoices

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
        formData.append('action','post');
        
        var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
        if(ck_box < 1){
            $("#error_msg").text("please check at least one quater");
        }else{
            // $("#ajax-loader").show();
            $.ajax({
                url: 'api/sales/BANK_MIS/Bank_MIS_api.php',
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
                        success: function (data) {
                            
                            $("#ajax-loader").hide();
                            $.get('sale/MIS/Upload_Mis.php',function(data,status){
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
    // Breadcrumbs
    $("#sale_breadcrumb").on("click", function () {
        $.get('sale/sale.php', function(data,status){
            $("#content").html(data);
        });
    });

    $("#upload_breadcrumb").on("click", function () {
        $.get('sale/MIS/Upload_Mis.php', function(data,status){
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