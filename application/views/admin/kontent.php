  <?php $tahun=date('Y');?>
  <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">STATISTIK <?php echo $tahun;?></h3>
              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i> Pendapatan
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square" style="color:#CCC"></i> Modal</button> 
                </div>
              </div>
             
              

              
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
          <!-- BAR CHART -->
              
                <canvas id="areaChart" style="height:230px"></canvas>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

<script src="<?php echo base_url()?>assets/jquery.min.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['Jan', 'Feb', 'Mart', 'April', 'Mei', 'Jun', 'Jul','Agust','Sept','Okt','Nov','Des'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $this->model_view->hitungmodal($tahun.'-01').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-02').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-03').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-04').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-05').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-06').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-07').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-08').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-09').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-10').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-11').',';?>
              <?php echo $this->model_view->hitungmodal($tahun.'-12');?>]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $this->model_view->hitungmasukk($tahun.'-01').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-02').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-03').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-04').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-05').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-06').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-07').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-08').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-09').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-10').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-11').',';?>
              <?php echo $this->model_view->hitungmasukk($tahun.'-12');?>]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
