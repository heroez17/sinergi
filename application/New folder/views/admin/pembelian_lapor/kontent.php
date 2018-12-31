 <section class="content">
  <div class="row">
    <div class="col-md-6">
          <!-- AREA CHART -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $bahandasar?></h3>

             
            </div>
            <div class="box-body">
              <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/pembelian_lapor/dasar" method="post">
              <div class="box-body">
              
                <div class="col-xs-4">
                 Dari <input type="text" required name="tgl" id="tgl"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
              
                <div class="col-xs-4">
                S/d
                  <input type="text" required name="tgl1" id="tgl1"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
                
                 
               </div>
              
                <div class="box-footer">
                  <button type="submit" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
              
                </div>
             
            </form>
            </div>
            <!-- /.box-body -->
  </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
    <!-- /.box -->

        </div>
    <div class="col-md-6">
          <!-- AREA CHART -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $bahanjadi?></h3>

             
            </div>
            <div class="box-body">
             <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/pembelian_lapor/jadi_p" method="post">
              <div class="box-body">
              
                <div class="col-xs-4">
                 Dari <input type="text" required name="tgl" id="tglberkastahap1"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
              
                <div class="col-xs-4">
                S/d
                  <input type="text" required name="tgl1" id="tglp17"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
                
                 
               </div>
              
                <div class="box-footer">
                  <button type="submit" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
  </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
    <!-- /.box -->

        </div>
    </div>
      <!-- /.row -->

    </section>
 
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url()?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->

<!-- page script -->
<script>
  $(function () {
   
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
	 var areaChart = new Chart(areaChartCanvas);
	var areaChartData = {
      labels: ["Jan", "Feb", "March", "April", "May", "June", "July","Agust","Sept","Okt","Nop","Des"],
      datasets: [
        {
          label: "",
          fillColor: "#00a65a",
          strokeColor: "rgba(2103, 2149, 222, 1)",
          pointColor: "rgba(2107, 2147, 2220, 15)",
          pointStrokeColor: "#F0F",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#f56954",
          data: [<?php echo $jan ?>,<?php echo $feb ?>,<?php echo $mar ?>,<?php echo $apr ?>,<?php echo $mei ?>,<?php echo $jun ?>,<?php echo $jul ?>,<?php echo $agus ?>,<?php echo $sep ?>,<?php echo $okt ?>,<?php echo $nop ?>,<?php echo $des ?>]
        }
      ]
    };

    var areaChartOptions = {
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
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

   
    areaChart.Line(areaChartData, areaChartOptions);

    
  });
  
  
  $(function () {
   
    var areaChart2Canvas = $("#areaChart2").get(0).getContext("2d");
	 var areaChart2 = new Chart(areaChart2Canvas);
	var areaChart2Data = {
      labels: ["Jan", "Feb", "March", "April", "May", "June", "July","Agust","Sept","Okt","Nop","Des"],
      datasets: [
        {
          label: "",
          fillColor: "#f56952",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          		data: [<?php echo $jan1 ?>,<?php echo $feb1 ?>,<?php echo $mar1 ?>,<?php echo $apr1 ?>,<?php echo $mei1 ?>,<?php echo $jun1 ?>,<?php echo $jul1 ?>,<?php echo $agus1 ?>,<?php echo $sep1 ?>,<?php echo $okt1 ?>,<?php echo $nop1 ?>,<?php echo $des1 ?>]
        }
       
      ]
    };

    var areaChart2Options = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the Chart2
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
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the Chart2 responsive to window resizing
      responsive: true
    };

   
    areaChart2.Line(areaChart2Data, areaChart2Options);

    
  });
</script>

<div class="modal fade" id="dasar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FILTER DATA PEMBELIAN BAHAN DASAR</h4>
      </div>
     
       
        <div class="box box-primary">
            <div class="form-group">
           
            <!-- form start -->
            
        </div>



      </div>
      
    </div>
  </div>
  
  
  
  
  
  
  
  <div class="modal fade" id="jadi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FILTER DATA PEMBELIAN BAHAN JADI</h4>
      </div>
     
       
        <div class="box box-primary">
            <div class="form-group">
           
            <!-- form start -->
            
        </div>



      </div>
      
    </div>
  </div>