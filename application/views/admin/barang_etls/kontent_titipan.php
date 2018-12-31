<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/" class="btn btn-primary" ><i class="fa fa-plus" ></i> KASIR</a></small>
         
          <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/tambah_kedtangan/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Terima barang Titipan</a></small>
     <small>  <a href="<?php echo base_url()?>index.php/admin/barang_etls/kembali/0" class="btn btn-primary" ><i class="fa fa-refresh" ></i> Return barang Titipan</a></small>
     
     
     
      
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
                  <th>SUPPLIER</th>
                  <th>HARGA ASLI</th>
                  <th>HARGA JUAL</th>
                  <th>STOCK</th>
                  <th>#</th>
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
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $this->model_view->satuan($row->satuan); ?></td>
                  <td><?php echo $row->supplier;?></td>
                  <td><?php echo $this->model_view->hargabelititipan($row->id_barang);?></td>
                  <td><?php echo $this->model_view->hargajualtitipan($row->id_barang);?></td>
                  <td><?php echo $this->model_view->stktitipann($row->id_barang); ?></td>
                  <td><a href="<?php echo base_url()?>index.php/admin/barang_etls/tambah/<?php echo $row->id_barang?>" class="glyphicon glyphicon-pencil edit-personil"
           
            ></a></td>
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
