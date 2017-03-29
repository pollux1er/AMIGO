<?php 
setlocale(LC_TIME, 'fr_FR.utf8','fra');
$monday = utf8_encode(strftime("%d %B, %Y", strtotime("monday this week")));
$friday = utf8_encode(strftime("%d %B, %Y", strtotime("friday this week")));
//var_dump($conso);
//var_dump($consoweek);
//var_dump($friday);
//die;
 ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head.php'); ?>
<?php include ('inc/menu.php'); ?> 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
          <!-- Small boxes (Stat box) -->
		  <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $nbaccounts; ?></h3>
                  <p>Comptes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/account/newaccount" class="small-box-footer">Créer un nouveau compte <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $nbusers; ?></h3>
                  <p>Utilisateurs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/users" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
		  
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $platschauds; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Plats consommés ce jour</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/report/logs" class="small-box-footer">Voir les rapports <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>&nbsp;</h3>
                  <p>Statistiques </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/report/stats" class="small-box-footer">Voir toutes les statistiques <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
			</div>
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Recap Rapport hebdomadaire</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Ventes : <?php echo $monday; ?> - <?php echo $friday; ?></strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 180px;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Legende</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Plat chauds</span>
                        <span class="progress-number"><b><?php if($conso) echo abs($conso->meals); else echo "0"; ?></b>/5</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <!--<div class="progress-group">
                        <span class="progress-text"></span>
                        <span class="progress-number"><b><?php if($conso) echo abs($conso->meals); else echo "0";  ?></b>/5</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                        </div>
                      </div> /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Dessert</span>
                        <span class="progress-number"><b><?php if($conso) echo abs($conso->desserts); else echo "0"; ?></b>/5</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Entrees</span>
                        <span class="progress-number"><b><?php if($conso) echo abs($conso->starters); else echo "0"; ?></b>/5</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                       <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>-->
                        <h5 class="description-header"><?php if($conso) echo abs($conso->starters*500); else echo "0";  ?> Fcfa</h5>
                        <span class="description-text">TOTAL ENTREES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>-->
                        <h5 class="description-header"><?php if($conso) echo abs($conso->meals*2000); else echo "0"; ?> Fcfa</h5>
                        <span class="description-text">TOTAL PLATS CHAUDS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>-->
                        <h5 class="description-header"><?php if($conso) echo abs($conso->desserts*500); else echo "0"; ?> Fcfa</h5>
                        <span class="description-text">TOTAL DESSERTS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <!--<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>-->
                        <h5 class="description-header"><?php if($conso) echo abs($conso->desserts*500)+abs($conso->meals*2000)+abs($conso->starters*500); else echo "0"; ?> Fcfa</h5>
                        <span class="description-text">TOTAL CANTINE</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    <?php include ('inc/footer.php'); ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
	<script>
		 // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"],
    datasets: [
      {
        label: "Entrees",
        fillColor: "rgba(243, 156, 18, 0.9)",
        strokeColor: "rgba(243, 156, 18, 0.8)",
        pointColor: "rgba(243, 156, 18,1)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(243, 156, 18,1)",
        data: [<?php 
			foreach($consoweek as $c)
				echo abs($c->starters) .',';
		?>]
      },
      {
        label: "Plats chauds",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [<?php 
			foreach($consoweek as $c)
				echo abs($c->meals) .',';
		?>]
      },
      {
        label: "Desserts",
        fillColor: "rgba(0, 166, 90,0.9)",
        strokeColor: "rgba(0, 166, 90,0.8)",
        pointColor: "#00A65A",
        pointStrokeColor: "rgba(0, 166, 90,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(0, 166, 90,1)",
        data: [<?php 
			foreach($consoweek as $c)
				echo abs($c->desserts) .',';
		?>]
      }
    ]
  };

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.4,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: false,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
  };

  //Create the line chart
  //salesChart.Line(salesChartData, salesChartOptions);
  
   var lineChartCanvas = $("#salesChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = salesChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(salesChartData, salesChartOptions);

	</script>
	<script src="<?php echo base_url(); ?>/assets/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/demo.js"></script>
