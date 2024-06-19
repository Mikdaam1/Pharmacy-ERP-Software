<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Financial Mnagement !</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a class="btn btn-sm"  href = "web-api/logout/logout.php">LOGOUT</a></li> -->
              <li class="breadcrumb-item active"><button class="btn btn-sm" id="fa_dashboard_breadcrumb" >Fixedassets</button></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <?php include '../display_message/display_message.php'?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="value1">Loading...</h3>

                <p id="Name1" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="location"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="value2">Loading...</h3>

                <p id="Name2" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="offices"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="value0">Loading...</h3>

                <p id="Name0" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="category"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="value3">Loading...</h3>

                <p id="Name3" style="font-weight:bold">Loading...</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="products"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
  

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                
                  <div class="row">
                    <div class="col-sm-6">
                      <h3 class="card-title">Last 15 Days Records</h3>
                    </div>
                  </div> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SR.No</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Office</th>
                        <th>Quantity</th>
                        <th>Barcode</th>
                        <th>Action By</th>
                        <th>Action On</th>
                        <th>Action Type</th>
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

<!--View Model -->


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
        url: 'api/fixedassets/fixedassets_dashboard_api.php',
        type:'POST',
        data: {action:'inv_dashboard_view'},
        beforeSend: function() {
        },
        success: function(data) {
          $("#ajax-loader").hide();
          // Empty datatable previouse records
          table.clear().draw();
          // append data in datatable
          var sno='0';
          for (var i = 0; i < data.length; i++) {
            sno++;
            table.row.add([sno, data[i].NAME, 
                                data[i].ASSETCATEGORYNAME,
                                data[i].OFFICE_NAME,
                                data[i].QUANTITY_CODE,
                                data[i].BARCODE,
                                data[i].NAMENAME,
                                data[i].ACTION_ON,
                                data[i].ACTION_TYPE]);
          }
          table.draw();
          //$('#total').text(sno);
        },
        error: function(e){
            console.log(e);
            alert("Contact IT Department");
        }
      });
      $("#fa_dashboard").css('pointer-events','');
      $("#fa_dashboard").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
    });
});

$('document').ready(function(){
  
    $.ajax({
      url: 'api/fixedassets/fixedassets_dashboard_api.php',
      type:'POST',
      data: {action:'showstats1'},
      success: function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#Name'+i).html(data[i].NAME);
          $('#value'+i).html(data[i].TOTAL_COUNT);
        }
        // Empty datatable previouse records
        // var sum_all = '';
        // var sno='0';
        // for (var i = 0; i < data.length; i++) {
        //     sno++;
        //     sum_all += data[i].TOTAL;

        //     value='#value';
        //     valuetotal=value+sno;
        //     $(valuetotal).text(data[i].TOTAL); 

        //     name='#Name';
        //     nametotal=name+sno;
        //     $(nametotal).text(data[i].NAMED);

        //     idNAME=data[i].ID;
        //     idvalue='#inv_asset_street';
        //     idtotalname=idvalue+sno;

        //     $(idtotalname).attr('data-id',idNAME); 

        //     function labelFormatter(label, series) {
        //         return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        //         + label
        //         + '<br>'
        //         + Math.round(series.percent) + '%</div>'
        //     }
        // } 
        
        //     //for graph
        //     var per1 = ($("#value1").text()/sum_all)*100;
        //     var per2 = ($("#value2").text()/sum_all)*100;
        //     var per3 = ($("#value3").text()/sum_all)*100;
        //     var per4 = ($("#value4").text()/sum_all)*100;
            
        //     var name1 = $("#Name1").text();
        //     var name2 = $("#Name2").text();
        //     var name3 = $("#Name3").text();
        //     var name4 = $("#Name4").text();
            
        //     var donutData = [
        //         {
        //             label:  name1,
        //             data :  per1,
        //             color: '#28a745'
        //         },
        //         {
        //             label:  name2,
        //             data :  per2,
        //             color: '#17a2b8'
        //         },
        //         {
        //             label:  name3,
        //             data :  per3,
        //             color: '#ffc107'
        //         },
        //         {
        //             label:  name4,
        //             data :  per4,
        //             color: '#6c757d'
        //         }
        //     ]
        //     $.plot('#donut-chart', donutData, {
        //         series: {
        //             pie: {
        //             show       : true,
        //             radius     : 1,
        //             innerRadius: 0.3,
        //             label      : {
        //                 show     : true,
        //                 radius   : 2 / 3,
        //                 formatter: labelFormatter,
        //                 threshold: 0.1
        //             }

        //             }
        //         },
        //         legend: {
        //             show: false
        //         }
        //     })
            
        //     function labelFormatter(label, series) {
        //         return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        //         + label
        //         + '<br>'
        //         + Math.round(series.percent) + '%</div>'
        //     }
      },
      error: function(e){
          console.log(e);                    
          alert("Contact IT Department");
      }
    });
  
    $('#offices').click(function(){
        $.get('Fixedassets/fa_offices.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#category').click(function(){
        $.get('Fixedassets/fa_category.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#products').click(function(){
        $.get('Fixedassets/fa_product.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#fa_dashboard_breadcrumb').click(function(){
      $.get('Fixedassets/fa_dashboard.php',function(data,status){
            $('#content').html(data);
        });
    });

    

});
</script>
<?php include '../includes/loader.php'?>