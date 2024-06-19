<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Record Room Dashboard</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active" id="record_room_breadcrumb"><button class="btn btn-sm">Record Room</button></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                </div>   
            </div>
          <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="value1">Loading...</h3>
                        <p class="inv_asset_street"  id="Name1" style="font-weight:bold">Loading...</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3  id="value2">Loading...</h3>
                            <p class="inv_asset_street" id="Name2" style="font-weight:bold">Loading...</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3 id="value3">Loading...</h3>

                            <p class="inv_asset_street" id="Name3" style="font-weight:bold">Loading...</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="value4">Loading...</h3>

                            <p class="inv_asset_street" id="Name4" style="font-weight:bold">Loading...</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- Donut chart -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Record Room Chart
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="donut-chart" style="height: 300px;"></div>
                        </div>
                    <!-- /.card-body-->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                
            </div>
        </div>
    </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- <h3 class="card-title">Language Records</h3> -->
                    </div>
                  </div> 
                  
                </div>
                <!-- /.card-header -->
                <div id="record-content"></div>
                <div class="card-body" >
                  <table id="example1" class=" table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>SNO</th>
                      <th>Type</th>
                      <th>Present Files</th>
                      <th>Cancel Files</th>
                      <th>Total File</th>
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


<script>
$('document').ready(function(){
    $("#ajax-loader").show();
    $.ajax({
      url: 'api/sales/Record_Room/sale_recordroom_dashboard_api.php',
      type:'POST',
      data: {action:'showstats1'},
      success: function(data) {
          console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            sno++;
            sum_all += data[i].TOTAL_COUNT;
            // console.log(sum_all);

            value='#value';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].TOTAL_COUNT); 

            name='#Name';
            nametotal=name+sno;
            $(nametotal).text(data[i].NAME);

            idNAME=data[i].ID;
            // console.log(nametotal);
            idvalue='.inv_asset_street';
            idtotalname=idvalue+sno;
            // console.log(idtotalname);

            $(idtotalname).attr('data-id',idNAME); 

            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
        } 
        
            //for graph
            var per1 = ($("#value1").text()/sum_all)*100;
            var per2 = ($("#value2").text()/sum_all)*100;
            var per3 = ($("#value3").text()/sum_all)*100;
            var per4 = ($("#value4").text()/sum_all)*100;
            // console.log(per4); 
             
            var name1 = $("#Name1").text();
            var name2 = $("#Name2").text();
            var name3 = $("#Name3").text();
            var name4 = $("#Name4").text();
            // console.log(name1);
            
            var donutData = [
                {
                    label:  name1,
                    data :  per1,
                    color: '#28a745'
                },
                {
                    label:  name2,
                    data :  per2,
                    color: '#17a2b8'
                },
                {
                    label:  name3,
                    data :  per3,
                    color: '#6c757d'
                },
                {
                    label:  name4,
                    data :  per4,
                    color: '#ffc107'
                }
            ]
            $.plot('#donut-chart', donutData, {
                series: {
                    pie: {
                    show       : true,
                    radius     : 1,
                    innerRadius: 0.3,
                    label      : {
                        show     : true,
                        radius   : 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                    }
                },
                legend: {
                    show: false
                }
            })
            
            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });

});
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
    url: 'api/sales/Record_Room/sale_recordroom_dashboard_api.php',
    type:'POST',
    data: {action:'view'},
    success: function(data) {
        $("#ajax-loader").hide();
        // console.log(data);
      // Empty datatable previouse records
      table.clear().draw();
      // append data in datatable
      var sno='0';
      for (var i = 0; i < data.length; i++) {
        sno++;
        // btn = btn_edit+btn_info+btn_bar;
        table.row.add([sno, data[i].TYPE_DESC,data[i].TOTAL_PRESENT,data[i].TOTAL_ABSENT,
                     data[i].TOTAL_FILES]);
      }
      table.draw();
    },
    error: function(e){
        console.log(e);
        alert("Contact IT Department");
    }
  });
  $("#record_room_dashboard").css('pointer-events','');
  $("#record_room_dashboard").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
});



// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#record_room_breadcrumb").on("click", function () {
    $.get('sale/record_room/record_room.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>