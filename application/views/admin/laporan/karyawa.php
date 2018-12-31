<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Karyawan</span>
              <span class="info-box-number"><?php echo $this->model_laporan->jumlah_karyawan()?></span>
              <span class="info-box-text"><a target="_blank" href="<?php echo base_url()?>index.php/admin/laporan/download_karyawan">Download</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>