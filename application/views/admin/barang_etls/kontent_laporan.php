<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/kasir/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> KASIR</a></small>
        <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/titipan/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> TITIPAN</a></small>
         <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/laporan/0" class="btn btn-primary" ><i class="fa fa-file" ></i> Laporan</a></small>
         
        
     
      
    </section>
    
    
    <section class="content">
    <div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-3 col-sm-6 col-xs-12" title="Pemesanan Gudang">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-folder"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Penjualan</span>
              <span class="info-box-number"><br /></span>
              <span class="info-box-text"><a href="#" data-toggle="modal" data-target="#opo">Download</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        
        
        
      </div>
      </div> 	
    
    </section>
    
    
    <div class="modal fade" id="opo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filter Data Penjualan</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <form method="post" action="<?php echo base_url()?>index.php/admin/barang_etls/download_kasir" target="_blank">
            <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" value="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" class="form-control col-md-10" id="tglp18" name="tgl" required /></td>
                </tr>
                <tr>
                  <td>S/d Tanggal</td>
                  <td><input type="text" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="form-control col-md-10" id="tglp21" name="tgl1" required /></td>
                </tr>
            
            <tr>
                  <td>Kasir</td>
                  <td>
                  <select name="user" class="form-control select2" required>
                  
                  <?php 
				  $this->db->where('user_name',$username);
				  $a=$this->db->get('tab_login');
				  foreach($a->result() as $e){?>
                  <option value="<?php echo $e->user_name;?>"><?php echo $e->user_name;?></option>
                  <?php } ?>
                  </select>
</td>
                </tr>
                 
                 
                  
                  <td><input type="submit" class="form-control col-md-10 btn-primary" name="d" value="Download"/></td>
                  <td><input type="submit" class="form-control col-md-10 btn-primary" name="d"  value="Print"/></td>
                </tr>
                
               
                
              </table>
              </form>
           
        </div>



      </div>
      
    </div>
  </div>
</div>