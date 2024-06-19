<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Recovery Inquiry</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="recovery_inquiry_breadcrumb">Recovery Inquiry</button></li>
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
              <div class="card">
                <div class="card-header">
                <?php include '../../display_message/display_message.php'?>
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                    <!-- <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-info btn-sm mt-2" id="reminder"><i class="fa fa-plus"></i> Call Status</button>
                    </div> -->
                  </div> 
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <table id="example1" class=" table table-bordered table-striped ">
                    <thead>
                    <tr>
                    <th>SNO</th>
                    <th>Form No</th>
                    <th>Agent</th>
                    <th>Email</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                  </table>
                </div>
                <!-- /.card-body -->
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
<!-- ./wrapper -->


<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<script>

$(document).ready(function(){
  $("#ajax-loader").show();
  $("#example1").ready(function(){
    let table = $('#example1').DataTable({
    dom: 'Bfrtip',
    orderCellsTop: true,
    fixedHeader: true,
    
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis',
            ]
    });


    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
              }
        });
    });

    $.ajax({
      url: 'api/sales/Recovery/recovery_inquiry_api.php',
      type:'POST',
      data: {action:'sale_view'},
      success: function(data) {
          console.log(data);
        $("#ajax-loader").hide();
        // Empty datatable previouse records
        table.clear().draw();
        // append data in datatable
        var sno='0';
        for (var i = 0; i < data.length; i++) {
          sno++;
          // btn = btn_edit+btn_info+btn_bar;
          // var schedule_btn = '<button type="button" data-id='+data[i].FORM_NO+' class="btn btn-sm btn-schedule-view" title="View Booking Schedule"><i class="fas fa-analytics text-info fa-fw" ></i></button>';
          // var btn = '<button type="button" data-id='+data[i].ID+' class="btn btn-sm btn-addstatus" title="Add Agent Status"><i class="fas fa-edit text-info fa-fw" ></i></button>';
          table.row.add([sno, data[i].REG_NO,data[i].NAMENAME,data[i].EMAIL,data[i].STATUS]);
        }
        table.draw();
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
  });
  
  $("#recovery_inquiry").css('pointer-events','');
    $("#recovery_inquiry").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
});
// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#recovery_inquiry_breadcrumb").on("click", function () {
    $.get('sale/Recovery/recovery_inquiry.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>