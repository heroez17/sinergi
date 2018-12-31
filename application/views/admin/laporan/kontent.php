

 <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">



        
        
        
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Barang Gudang">Barang Gudang</span>
              <span class="info-box-number"><?php echo $this->model_laporan->jumlah_barang()?></span>
              <span class="info-box-text"><a target="_blank" href="<?php echo base_url()?>index.php/admin/laporan/download_barang">Download</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" title="Kedatangan Barang">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kedatangan</span>
              <span class="info-box-number"><br /></span>
              <span class="info-box-text"><a href="#" data-toggle="modal" data-target="#op">Download</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" title="Pemesanan Gudang">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-folder"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rincian Laporan</span>
              <span class="info-box-number"><br /></span>
              <span class="info-box-text"><a href="#" data-toggle="modal" data-target="#titip">Download</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       
       
       
        
        
        
        
        </div>
        </div>
        </section>
        
        
        
        
        <div class="modal fade" id="op" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data Kedatangan</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/laporan/download_barang_keluar" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="" name="tgl1" required /></td>
                </tr>
                 <tr>
                  
                  <td colspan="2"><input type="submit" class="form-control col-md-10 btn-primary"  value="Download"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>







  
        <div class="modal fade" id="opol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data FAKTUR & CASH</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/faktur/download_barang_faktur" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tgl" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tgl1" name="tgl1" required /></td>
                </tr>
                 <tr>
                  
                  <td colspan="2"><input type="submit" class="form-control col-md-10 btn-primary"  value="Download"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>












  <div class="modal fade" id="titip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Rincian Laporan</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form target="_blank" method="post" action="<?php echo base_url()?>index.php/admin/laporan/rincian" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp20" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp201" name="tgl1" required /></td>
                </tr>
                 <tr>
                  
                  <td colspan="2"><input type="submit" class="form-control col-md-10 btn-primary"  value="Print"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>





 <div class="modal fade" id="ip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data Pengeluaran Barang Gudang ( Distribusi )</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/laporan/download_barang_distribusi" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglberkastahap1" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp17" name="tgl1" required /></td>
                </tr>
                 <tr>
                  
                  <td colspan="2"><input type="submit" class="form-control col-md-10 btn-primary"  value="Download"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>


 <div class="modal fade" id="opo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data Penjualan</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/laporan/download_kasir" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp18" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp21" name="tgl1" required /></td>
                </tr>
                 
                 
                  
                  <td colspan="2"><input type="submit" name="d" class="form-control col-md-10 btn-primary"  value="Download"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>



<div class="modal fade" id="supp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data Penjualan Barang Titipan / Supplier</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/laporan/download_kasir_supplier" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
            <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp21a" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tgltahap2" name="tgl1" required /></td>
                </tr>
            
            <tr>
                  <td>Supplier</td>
                  <td>
                  <select name="user" class="form-control select2">
                  <option value=""></option>
                  <?php $a=$this->db->get('barang_gdg_titipan');
				  foreach($a->result() as $e){?>
                  <option value="<?php echo $e->supplier;?>"><?php echo $e->supplier;?></option>
                  <?php } ?>
                  </select>
</td>
                </tr>
                 
                 
                  
                  <td colspan="2"><input type="submit" class="form-control col-md-10 btn-primary"  value="Download"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>