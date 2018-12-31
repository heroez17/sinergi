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
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>SATUAN</th>
                  <th>HARGA JUAL</th>
                  <th>STOCK</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $this->model_view->baranggdg($row->id_barang); ?></td>
                  <td><?php echo $this->model_view->satuan($row->satuan); ?></td>
                  <td><?php //echo $row->harga_jual);
				  echo number_format($this->model_view->hrgupdate($row->id_barang));
				  ?></td>
                  <td><?php
                  $adad=$this->model_view->keluarisi($row->id_barang)-$this->model_view->stocketalase($row->id_barang);$has=$adad+$this->model_view->stocksudah($row->id_barang);
				  
				  
				  echo $has.' '.$this->model_view->satuan($row->satuan); 
				  ?></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
            <!-- /.box-body -->
      </div>
</section>

 

      
      
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE BARANG GUDANG !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
        <!-- form start --></div>



      </div>
      
    </div>
  </div>
</div>
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
          <!-- form start --></div>



      </div>
      
    </div>
  </div>
</div>    
