<?php 
  session_start(); 
  $user_id = $_SESSION['data']['ID']; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Operations Dashboard!</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="sale_dashboard_breadcrumb">Operations Dashboard</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
              </ol>
          </div>   
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content" style="display:none"  >
      <div class="container-fluid">
                <?php include '../../display_message/display_message.php'?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="value1">...</h3>

                <p id="Name1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street1"  data-id=""  class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="value2">...</h3>

                <p id="Name2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street2"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="value3">...</h3>
                <p id="Name3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street3"  data-id="" class="small-box-footer">&nbsp; <i ></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="value4">...</h3>
                <p id="Name4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street4"  data-id="" class="small-box-footer">&nbsp; <i ></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content" style="display:none" >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="hide1">...</h3>

                <p id="hidename1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for1"  data-id=""  class="small-box-footer"> </a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="hide2">...</h3>

                <p id="hidename2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for2"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="hide3">...</h3>

                <p id="hidename3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for3"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content" style="display:none" >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="card1">...</h3>

                <p id="cardname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total1"  data-id=""  class="small-box-footer">...</a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="card2">...</h3>

                <p id="cardname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total2"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="card3">...</h3>

                <p id="cardname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total3"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="card4">...</h3>

                <p id="cardname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total4"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>


          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content"  style="display:none" >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="plot1">...</h3>

                <p id="plotname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final1"  data-id=""  class="small-box-footer">...</a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="plot2">...</h3>

                <p id="plotname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final2"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot3">...</h3>

                <p id="plotname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final3"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot4">...</h3>

                <p id="plotname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final4"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-3 col-6" style="display:none">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot54">...</h3>

                <p id="plotname5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final5"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>


          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content"  >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="cards1">...</h3>

                <p id="cardsname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="#" id="cardsfinal1"  data-id=""  class="small-box-footer">...</a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="cards2">...</h3>

                <p id="cardsname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="fas fa-window-close"></i>
              </div>
              <a href="#" id="cardsfinal2"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards3">...</h3>

                <p id="cardsname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" id="cardsfinal3"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards4">...</h3>

                <p id="cardsname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="#" id="cardsfinal4"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards5">...</h3>

                <p id="cardsname5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-plus"></i>
              </div>
              <a href="#" id="cardsfinal5"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards6">...</h3>

                <p id="cardsname6" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="#" id="cardsfinal6"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="cards7">...</h3>

                <p id="cardsname7" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-check"></i>
              </div>
              <a href="#" id="cardsfinal7"  data-id=""  class="small-box-footer">...</a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="cards8">...</h3>

                <p id="cardsname8" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="fa fa-file-times"></i>
              </div>
              <a href="#" id="cardsfinal8"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards9">...</h3>

                <p id="cards1name9" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fa fa-file-invoice-dollar"></i>
              </div>
              <a href="#" id="cardsfinal9"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards10">...</h3>

                <p id="cardsname10" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-sack-dollar"></i>
              </div>
              <a href="#" id="cardsfinal10"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards11">...</h3>

                <p id="cardsname11" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="#" id="cardsfinal11"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards12">...</h3>

                <p id="cards1name12" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="#" id="cardsfinal12"  data-id="" class="small-box-footer">...</a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                  <!-- /.col -->
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Registered Plot Quantity</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Quantity</span>
                      </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="visitors-chart" height="200" width="524" style="display: block; width: 524px; height: 200px;" class="chartjs-render-monitor"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                      <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> Plot Quantity
                      </span>

                    </div>
                  </div>
                </div>
                <!-- /.card -->
                <!-- /.card -->
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Bar chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Asset Quantity Chart
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
                    <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="523" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 523.5px; height: 300px;"></canvas><canvas class="flot-overlay" width="523" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 523.5px; height: 300px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="106.29092684659093" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">February</text><text x="199.83948863636365" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">March</text><text x="288.0355113636364" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">April</text><text x="373.9927645596591" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">May</text><text x="25.323908025568187" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">January</text><text x="455.00031072443187" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">June</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="8.9521484375" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="8.9521484375" y="205.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">5</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="78.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">15</text></g></svg></div></div>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->

                
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Asset Quantity Chart
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
                        <div class="inv_progress">
                        </div>
                      </div>
                      <!-- /.col -->
                    <!-- /.row -->
                </div>
              </div>
            </div>
        </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card">
              <div class="card-header">
                <h3 class="card-title">Files Detail Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="height:230px; min-height:230px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
          </div>
          <div class="col-md-6">
            <div class="card card">
              <div class="card-header">
                <h3 class="card-title">Plot Registered</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart2" style="height:230px; min-height:230px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-4">
                <form id="checkbox_form">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php include '../../display_message/display_message.php'?>
                            <div class="row">
                              <div class="col-sm-12 text-right">
                                  <button type="submit" class="btn btn-primary bulk_inv_btn 402a4b_1" >Approve</button>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group text-center">
                                    <span id="error_msg" style="color: red;font-size: 13px;"></span>
                                </div>
                            </div>
                          Count of Selected Records : <span id="dvcount"></span>
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th >Form No</th>
                                  <th>Cus Id</th>
                                  <th>Cus Name</th>
                                  <th>CNIC</th>
                                  <th>Contact No</th>
                                  <th>Action</th>
                                  <!-- <th><input Type="checkbox" name="all_check" id="all_check" value="Y"></th> -->
                                </tr>
                            </thead>
                          </table>
                        </div>
                        <!-- /.card-body -->
                    <!-- /.card-footer -->
                    </div>
                </form>
                </div>
            </div>


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
    let table = $('#example1').DataTable({});
    $.ajax({
        url: 'api/sales/cus_allot_booking_api.php',
        type: 'POST',
        data: {action: 'allotted_booking'},
        success: function(response){
            $("#ajax-loader").hide();
            // console.log(response);
            table.clear().draw();
            // append data in datatable
            k = 1;
            for (var i = 0; i < response.length; i++) {
              // j = i++;
              var s_no = k++;
              var form_no = response[i].FORM_NO;
              var cus_id = response[i].CUS_ID;
              var cust_name = response[i].CUS_NAME;
              var cnic = response[i].CNIC_NO;
              var contact_no = response[i].CONTACT_NO;
              var user_id = response[i].APPROVAL_USER_ID;
              var role = response[i].ROLE;
              var user="<?php echo $user_id  ?>";
              // console.log(user);
              if(user ==user_id){
                // var checkboxes = 'Assigned to <b>You</b>';
                var checkboxes = '<input data-flag='+response[i].CONFIRMATION_APPROVAL_FLG+' type="checkbox" class="bulkchecked" name="bulkchecked[]" value='+response[i].FORM_NO+'>';
              }else{
              var checkboxes = "Assign to <b>"+response[i].APPROVAL_USER_NAME+"<b>("+role+")"+"</b>";
              }
              var btn = checkboxes;
              table.row.add([s_no,form_no,cus_id,cust_name,cnic,contact_no,btn]);
            }
            table.draw();
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    //all check
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
    
    // submit checkbox data
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
            // var bulkchecked = JSON.stringify(matches);
            //get all checked values
            
            var confirm_flg = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').attr("data-flag");
            
            formData.append('confirm_flg',confirm_flg);
            formData.append('matches',matches);
            formData.append('action','assigned_ids');

            var ck_box = $('#example1 input[type="checkbox"][class="bulkchecked"]:checked').length;
            if(ck_box < 1){
                $("#error_msg").text("please check at least one box");
            }else{
                
                $.ajax({
                    url: 'api/sales/SalesDashboard/sale_dashboard_api.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(response){
                        // console.log(response);
                        var status = response.status;
                        var message = response.message;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                              $.get('sale/sale_dashboard/sales_dashboard.php',function(data,status){
                              $('#content').html(data);
                              });
                                // $.get('sale/cus_booking_allotment/quarter_invoices.php',function(data,status){
                                //     $('#content').html(data);
                                // });
                                // window.stop();
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

    $("#sale_dashbaord").css('pointer-events','');
    $("#sale_dashbaord").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle nav-icon');
  });
});
$('document').ready(function(){
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'main_stats'},
      success: function(data) {
        console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var j='0';
        for (var i = 0; i < data.length; i++) {
            j++;
            // sum_all += data[2].COUNTS;

            value='#cards';
            valuetotal=value+j;
            $(valuetotal).text(data[i].TOTAL); 
            // console.log("value");
            // name='#Name';
            // nametotal=name+i;
            // $(nametotal).text('Total Contractor');

            // idNAME=data[i].ID;
            idvalue='#cardsfinal';
            idtotalname=idvalue+j;
            $(idtotalname).text(data[i].NAME).css('font-weight','bold'); 

            $(idtotalname).css('font-size','12px'); 
            // $(idtotalname).attr('data-id',idNAME); 

            
        } 
            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
  
  // INV PROGRESS
  $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'file_status_progress'},
      success: function(data) {
        // console.log(data);
            $(".inv_progress").html(data);
        // for (var i = 0; i < data.length; i++) {
        //     console.log(data[i].STATS_COUNT);
        //     $(".stats_cards h3:eq("+i+")").text(data[i].STATS_COUNT);
        //     $(".stats_cards p:eq("+i+")").text(data[i].STATS_NAME);
        // }  
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
  });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'showstats1'},
      success: function(data) {
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            sno++;
            // sum_all += data[2].COUNTS;

            value='#value';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].COUNTS); 
            // console.log("value");
            // name='#Name';
            // nametotal=name+sno;
            // $(nametotal).text('Total Contractor');

            // idNAME=data[i].ID;
            idvalue='#inv_asset_street';
            idtotalname=idvalue+sno;

            // $(idtotalname).attr('data-id',idNAME); 

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
            
            var name1 = $("#Name1").text();
            var name2 = $("#Name2").text();
            var name3 = $("#Name3").text();
            var name4 = $("#Name4").text();
            
            var donutData = [
                {
                    label:  name2,
                    data :  per1,
                    color: '#17a2b8'
                },
                {
                    label:  name1,
                    data :  per2,
                    color: '#28a745'
                },
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
            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'showstats1'},
      success: function(data) {
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            sno++;
            sum_all += data[2].COUNTS;

            value='#value';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].COUNTS); 
            // console.log("value");
            // name='#Name';
            // nametotal=name+sno;
            // $(nametotal).text('Total Contractor');

            // idNAME=data[i].ID;
            idvalue='#inv_asset_street';
            idtotalname=idvalue+sno;

            // $(idtotalname).attr('data-id',idNAME); 

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
            
            var name1 = $("#Name1").text();
            var name2 = $("#Name2").text();
            var name3 = $("#Name3").text();
            var name4 = $("#Name4").text();
            
            var donutData = [
                {
                    label:  name2,
                    data :  per1,
                    color: '#17a2b8'
                },
                {
                    label:  name1,
                    data :  per2,
                    color: '#28a745'
                },
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
            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'showstats2'},
      success: function(data) {
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        var no=1;
        for (var i = 0; i < data.length; i++) {
            // sno++;
            sno++;
            // sum_all += data[0].COUNTS;
            value='#hide';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].TOTAL); 
            idvalue='#hidename';
            idtotalname=idvalue+sno;
            $(idtotalname).text(data[i].NAME); 
            no++;

        } 
        
            // //for graph
            var per1 = $("#hide1").text();
            var per2 = $("#hide2").text();
            var per3 = $("#hide3").text();
            
            var name1 = $("#hidename1").text();
            // console.log(name1);
            var name2 = $("#hidename2").text();
            var name3 = $("#hidename3").text();
            
          var bar_data = {
            data : [[1,per1], [2,per2]],
            bars: { show: true }
          }
          $.plot('#bar-chart', [bar_data], {
            grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3',
            },
            series: {
              bars: {
                show: true, barWidth: 0.5, align: 'center',
              },
            },
            colors: [['#17a2b8']],
            xaxis : {
              ticks: [[1,name1], [2,name2], [3,'']],
             
            }
          })
          /* END BAR CHART */

            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'showstats3'},
      success: function(data) {
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            // sno++;
            sno++;
            // sum_all += data[1].TOTAL;

            value='#card';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].TOTAL); 
            idvalue='#cardname';
            idtotalname=idvalue+sno;
            $(idtotalname).text(data[i].NAME); 


            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
        } 
        
            // //for graph
            var per1 = $("#card1").text();
            // console.log(per1);
            var per2 = $("#card2").text();
            var per3 = $("#card3").text();
            var per4 = $("#card4").text();
            
            var name1 = $("#cardname1").text();
            var name2 = $("#cardname2").text();
            var name3 = $("#cardname3").text();
            var name4 = $("#cardname4").text();
            // console.log(name3);
            
           
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var donutData        = {
            labels: [
              name1, 
              name2,
              name3,
              name4,
            ],
            datasets: [
              {
                data: [per1,per2,per3,per4],
                backgroundColor : ['#28a745', '#ffc107', '#17a2b8', '#6c757d'],
              }
            ]
          }
          var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions      
          })

          /* END BAR CHART */

            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'showstats4'},
      success: function(data) {
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        var no='0';
        for (var i = 0; i < data.length-1; i++) {
            // sno++;
            sno++;
            // sum_all += data[1].COUNTS;
            i++;
            // console.log(i);
            value='#plot';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].TOTAL); 
            idvalue='#plotname';
            idtotalname=idvalue+sno;
            $(idtotalname).text(data[i].NAME); 
            i--;


            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
        } 
        
            // //for graph
            var per1 = $("#plot1").text();
            // console.log(per1);
            var per2 = $("#plot2").text();
            var per3 = $("#plot3").text();
            var per4 = $("#plot4").text();
            var per5 = $("#plot5").text();
            
            var name1 = $("#plotname1").text();
            var name2 = $("#plotname2").text();
            var name3 = $("#plotname3").text();
            var name4 = $("#plotname4").text();
            var name5 = $("#plotname5").text();
            

            //- DONUT CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
          var donutData        = {
            labels: [
              name1, 
              name2,
              name3,
              name4,
              name5,
            ],
            datasets: [
              {
                data: [per1,per2,per3,per4,per5],
                backgroundColor : ['#28a745', '#ffc107', '#17a2b8', '#6c757d', '#f56954'],
              }
            ]
          }
          var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions      
          })

          /* END BAR CHART */

            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });


    $.ajax({
      url: 'api/sales/dashboard_api.php',
      type:'POST',
      data: {action:'bar_chart2_stats'},
      success: function(data) {
        
        $("#ajax-loader").hide();
        // console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        var no=1;
        const barnames = [];
        const bartotal = [];
        var total=0;
        for (var i = 0; i < data.length; i++) {
            // sno++;
            sno++;
            barnames.push(data[i].NAME);
            bartotal.push(data[i].TOTAL);
            total=parseInt(data[i].TOTAL)+total;
            // no++;

        } 
        // console.log(total);
        
        var i=36000;
          $(function () {
            'use strict'

            var ticksStyle = {
              fontColor: '#495057',
              fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart')
            // eslint-disable-next-line no-unused-vars
            var visitorsChart = new Chart($visitorsChart, {
              data: {
                labels: barnames,
                datasets: [{
                  type: 'line',
                  data: bartotal,
                  backgroundColor: 'transparent',
                  borderColor: '#007bff',
                  pointBorderColor: '#007bff',
                  pointBackgroundColor: '#007bff',
                  fill: false
                  // pointHoverBackgroundColor: '#007bff',
                  // pointHoverBorderColor    : '#007bff'
                }]
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  mode: mode,
                  intersect: intersect
                },
                hover: {
                  mode: mode,
                  intersect: intersect
                },
                legend: {
                  display: false
                },
                scales: {
                  yAxes: [{
                    // display: false,
                    gridLines: {
                      display: true,
                      lineWidth: '4px',
                      color: 'rgba(0, 0, 0, .2)',
                      zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                      beginAtZero: true,
                      suggestedMax: 200
                    }, ticksStyle)
                  }],
                  xAxes: [{
                    display: true,
                    gridLines: {
                      display: false
                    },
                    ticks: ticksStyle
                  }]
                }
              }
            })
          })

          /* END BAR CHART */

            
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });
  
    $('#inv_asset_street1').click(function(){
        $.get('land/Partners_Dealer.php',function(data,status){
            $('#content').html(data);
        });
    });
    $('#inv_asset_street2').click(function(){
        $.get('land/Partners_Land_Provider.php',function(data,status){
            $('#content').html(data);
        });
    });
    // $('#inv_asset_street3').click(function(){
    //     $.get('land/Subsection/inv_div_dashboard_status_dril.php',function(data,status){
    //         $('#content').html(data);
    //     });
    // });

    $("#Inventory_breadcrumb").on("click", function () {
        $.get('Inventory/Inventory.php', function(data,status){
            $("#content").html(data);
        });
    });

});



// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#sale_dashboard_breadcrumb").on("click", function () {
    $.get('sale/sale_dashboard/sales_dashboard.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>
