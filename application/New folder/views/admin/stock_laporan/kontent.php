 <a target="_blank" href="<?php echo base_url()?>index.php/admin/stock_laporan/s_dasar" class="btn btn-warning"><i class="fa fa-print"></i> Print Stock Bahan Dasar</a>
  <a target="_blank" href="<?php echo base_url()?>index.php/admin/stock_laporan/s_jadi" class="btn btn-warning"><i class="fa fa-print"></i> Print Stock Bahan Jadi</a>
<section class="content">
  <div class="row">
    <div class="col-md-6">
          <!-- AREA CHART -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $bahandasar?></h3>

             
            </div>
            <div class="box-body">
              <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/stock_laporan/dasar" method="post">
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
             <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/stock_laporan/jadi_p" method="post">
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
              <h3 class="box-title"><?php echo $kbahandasar?></h3>

             
            </div>
            <div class="box-body">
              <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/stock_laporan/dasar_keluar" method="post">
              <div class="box-body">
              
                <div class="col-xs-4">
                 Dari <input type="text" required name="tgl" id="tglp20"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
              
                <div class="col-xs-4">
                S/d
                  <input type="text" required name="tgl1" id="tglp18"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
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
              <h3 class="box-title"><?php echo $kbahanjadi?></h3>

             
            </div>
            <div class="box-body">
             <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/stock_laporan/jadi_p_keluar" method="post">
              <div class="box-body">
              
                <div class="col-xs-4">
                 Dari <input type="text" required name="tgl" id="tglp21"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
              
                <div class="col-xs-4">
                S/d
                  <input type="text" required name="tgl1" id="tglp19"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
                
                 
               </div>
              
                <div class="box-footer">
                  <button type="submit" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
              
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
</section>
 