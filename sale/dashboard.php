<?php 
session_start();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sale Dashboard!</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="sale_dashboard_breadcrumb">Sale Dashboard</button></li>
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
                <?php include '../display_message/display_message.php'?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="value1">Loading...</h3>

                <p id="Name1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street1"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="value2">Loading...</h3>

                <p id="Name2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="inv_asset_street2"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="value3">Loading...</h3>
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
                <h3 id="value4">Loading...</h3>
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
                <h3 id="hide1">Loading...</h3>

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
                <h3 id="hide2">Loading...</h3>

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
                <h3 id="hide3">Loading...</h3>

                <p id="hidename3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for3"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="hide4">Loading...</h3>

                <p id="hidename4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for4"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-3 col-6" style="display:none">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="hide5">Loading...</h3>

                <p id="hidename5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="for5"  data-id="" class="small-box-footer"></a>
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
                <h3 id="card1">Loading...</h3>

                <p id="cardname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total1"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="card2">Loading...</h3>

                <p id="cardname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total2"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="card3">Loading...</h3>

                <p id="cardname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total3"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="card4">Loading...</h3>

                <p id="cardname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="total4"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <h3 id="plot1">Loading...</h3>

                <p id="plotname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final1"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="plot2">Loading...</h3>

                <p id="plotname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final2"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot3">Loading...</h3>

                <p id="plotname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final3"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot4">Loading...</h3>

                <p id="plotname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final4"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6" style="display:none">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="plot54">Loading...</h3>

                <p id="plotname5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" id="final5"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <h3 id="cards1">Loading...</h3>

                <p id="cardsname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="#" id="cardsfinal1"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="cards2">Loading...</h3>

                <p id="cardsname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="fas fa-window-close"></i>
              </div>
              <a href="#" id="cardsfinal2"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards3">Loading...</h3>

                <p id="cardsname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" id="cardsfinal3"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards4">Loading...</h3>

                <p id="cardsname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="#" id="cardsfinal4"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards5">Loading...</h3>

                <p id="cardsname5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-plus"></i>
              </div>
              <a href="#" id="cardsfinal5"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards6">Loading...</h3>

                <p id="cardsname6" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="#" id="cardsfinal6"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <h3 id="cards7">Loading...</h3>

                <p id="cardsname7" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-check"></i>
              </div>
              <a href="#" id="cardsfinal7"  data-id=""  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="cards8">Loading...</h3>

                <p id="cardsname8" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="fas fa-sack-dollar"></i>
              </div>
              <a href="#" id="cardsfinal8"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards9">Loading...</h3>

                <p id="cards1name9" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="#" id="cardsfinal9"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards10">Loading...</h3>

                <p id="cardsname10" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-sack-dollar"></i>
              </div>
              <a href="#" id="cardsfinal10"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards11">Loading...</h3>

                <p id="cardsname11" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="#" id="cardsfinal11"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="cards12">Loading...</h3>

                <p id="cards1name12" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="#" id="cardsfinal12"  data-id="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- BAR CHAT 2 Main Cards-->
    <section class="content" style="display:none">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="current1">Loading...</h3>

                <p id="currentname1" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type1"  data-id=""  class="small-box-footer"></a>
            </div>
          </div>
          
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="current2">Loading...</h3>

                <p id="currentname2" style="font-weight:bold;"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type2"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="current3">Loading...</h3>

                <p id="currentname3" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type3"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current4">Loading...</h3>

                <p id="currentname4" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type4"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current5">Loading...</h3>

                <p id="currentname5" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type5"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current6">Loading...</h3>

                <p id="currentname6" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type6"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current7">Loading...</h3>

                <p id="currentname7" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type7"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current8">Loading...</h3>

                <p id="currentname8" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type8"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current9">Loading...</h3>

                <p id="currentname9" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type9"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="current10">Loading...</h3>

                <p id="currentname10" style="font-weight:bold"></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a id="type10"  data-id="" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <!-- Bar chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      Current Generated Quater Chart
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
                    <div id="bar-chart2" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="523" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 523.5px; height: 300px;"></canvas><canvas class="flot-overlay" width="523" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 523.5px; height: 300px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="106.29092684659093" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">February</text><text x="199.83948863636365" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">March</text><text x="288.0355113636364" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">April</text><text x="373.9927645596591" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">May</text><text x="25.323908025568187" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">January</text><text x="455.00031072443187" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">June</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="8.9521484375" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="8.9521484375" y="205.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">5</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="78.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">15</text></g></svg></div></div>
                  </div>
                  <!-- /.card-body-->
                </div>
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
                        <th>SALE ID</th>
                        <th>ALLOTTE</th>
                        <th>FORM NO</th>
                        <th>SALE DATE</th>
                        <th>SALE STATUS</th>
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
      pageLength: 5,
      "deferRender": true
    });
    $.ajax({
      url: 'api/sales/dashboard_api.php',
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
          var form=data[i].FORM_NO;
          var sale_status=data[i].SALE_STATUS=='B'?'BOOKING':'CANCELLED';
          table.row.add([sno, data[i].SALE_ID, 
                              data[i].ALLOTTE,
                              form,
                              data[i].SALE_DATE,
                              sale_status]);
        }
        table.draw();
        //$('#total').text(sno);
      },
      error: function(e){
          console.log(e);
          alert("Contact IT Department");
      }
    });

    // $("#inventory_dashbaord").css('pointer-events','');
    // $("#inventory_dashbaord").find($(".far")).removeClass('fa-spin fa-refresh').addClass('fa-circle');
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
        var sno='0';
        for (var i = 0; i < data.length; i++) {
            sno++;
            // sum_all += data[2].COUNTS;

            value='#cards';
            valuetotal=value+i;
            $(valuetotal).text(data[i].TOTAL); 
            // console.log("value");
            // name='#Name';
            // nametotal=name+i;
            // $(nametotal).text('Total Contractor');

            // idNAME=data[i].ID;
            idvalue='#cardsfinal';
            idtotalname=idvalue+i;
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
        console.log(data);
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
        console.log(data);
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
        console.log(data);
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
        console.log(data);
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

            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
        } 
        
            // //for graph
            var per1 = $("#hide1").text();
            var per2 = $("#hide2").text();
            var per3 = $("#hide3").text();
            
            var name1 = $("#hidename1").text();
            console.log(name1);
            var name2 = $("#hidename2").text();
            var name3 = $("#hidename3").text();
            
          var bar_data = {
            data : [[1,per1], [2,per2] ],
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
        console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        var no='0';
        for (var i = 0; i < data.length-1; i++) {
            // sno++;
            sno++;
            // sum_all += data[1].COUNTS;
            i++;
            console.log(i);
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
        console.log(data);
        // Empty datatable previouse records
        var sum_all = '';
        var sno='0';
        var no=1;
        for (var i = 0; i < data.length; i++) {
            // sno++;
            sno++;
            // sum_all += data[0].COUNTS;
            value='#current';
            valuetotal=value+sno;
            $(valuetotal).text(data[i].TOTAL); 
            idvalue='#currentname';
            idtotalname=idvalue+sno;
            $(idtotalname).text(data[i].TYPE); 
            // no++;

            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
            }
        } 
        
            // //for graph
            var per1 = $("#current1").text();
            var per2 = $("#current2").text();
            var per3 = $("#current3").text();
            var per4 = $("#current4").text();
            var per5 = $("#current5").text();
            var per6 = $("#current6").text();
            var per7 = $("#current7").text();
            var per8 = $("#current8").text();
            var per9 = $("#current9").text();
            var per10 = $("#current10").text();
            
            var name1 = $("#currentname1").text();
            var name2 = $("#currentname2").text();
            var name3 = $("#currentname3").text();
            var name4 = $("#currentname4").text();
            var name5 = $("#currentname5").text();
            var name6 = $("#currentname6").text();
            var name7 = $("#currentname7").text();
            var name8 = $("#currentname8").text();
            var name9 = $("#currentname9").text();
            var name10 = $("#currentname10").text();
            
          var bar_data = {
            data : [[1,per1], [2,per2], [3,per3], [4,per4], [5,per5], [6,per6], [7,per7], [8,per8], [9,per9], [10,per10] ],
            bars: { show: true }
          }
          $.plot('#bar-chart2', [bar_data], {
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
              ticks: [[1,name1], [2,name2], [3,name3], [4,name4], [5,name5], [6,name6], [7,name7], [8,name8], [9,name9], [10,name10]],
             
            }
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
    $.get('sale/dashboard.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../includes/loader.php'?>
