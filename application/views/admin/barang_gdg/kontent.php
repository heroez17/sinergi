<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/barang_gdg/tambah/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Tambah Data Barang</a></small>
        
        <small>  <a href="#"  data-toggle="modal" data-target="#editt-poto" class="btn btn-primary" ><i class="fa fa-print" ></i> Print Barang</a></small>
     
     
      
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
                  <th>KATEGORI</th>
                  <th>SATUAN GROSIR</th>
                  <th>SATUAN ECERAN</th>
                  <th>HARGA BELI</th>
                  <th>HARGA JUAL GROSIR</th>
                  <th>HARGA JUAL ECERAN</th>
                  <th>SUPPLIER</th>
                  <th>AKSI</th>
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
                  <td><?php echo $row->nama_barang ?></td>
                  <td><?php echo $this->model_view->kategori($row->id_kategori); ?></td>
                  <td><?php echo '1 '.$this->model_view->satuan($row->id_satuan_gudang); ?></td>
                  <td><?php echo $row->qty_pcs.' '.$this->model_view->satuan($row->id_satuan_pcs); ?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_beli))?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_gudang))?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_pcs))?></td>
                  <td><?php echo $this->model_view->supplier($row->id_supplier); ?></td>
                  <td>
                   <span>
            <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->id_barang;?>"
             data-nama_pr2="<?php echo $row->nama_barang;?>" 
             ></a> 
            </span>||</span>
            <a href="<?php echo base_url()?>index.php/admin/barang_gdg/tambah/<?php echo $row->id_barang?>" class="glyphicon glyphicon-pencil edit-personil"
           
            ></a>
            
            <span>
            
              
          </td>
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
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE BARANG !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/barang_gdg/delete" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi3" value="Lokasi" />
                  <label for="exampleInputEmail2">Anda Akan Menghapus <strong style="color:red"><i id="nama"></i></strong> ?</label>
                  
                  <input type="hidden" name="id3" id="id3" class="form-control" required="required" />
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">FILTER DATA BARANG</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form role="form" target="_blank" action="<?php echo base_url()?>index.php/admin/barang_gdg/prt" method="post" enctype="multipart/form-data">
              <div class="box-body">
               
                <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Kategori</label>
      <select class="form-control" name="id_kategori">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php $r=$this->db->get('tab_kategori');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_kategori?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                
                
                 <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Satuan Grosir</label>
      <select class="form-control" name="id_satuan_gudang">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php 
	  $ri=$this->db->get('tab_satuan');
	  foreach($ri->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                
                
                 <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Satuan Eceran</label>
      <select class="form-control" name="id_satuan_pcs">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php 
	  $ri=$this->db->get('tab_satuan');
	  foreach($ri->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Supplier</label>
      <select class="form-control" name="id_supplier">
      <option value="<?php //echo $id_supplier?>"><?php // echo $nama_su?></option>
      <?php $ro=$this->db->get('tab_supplier');
	  foreach($ro->result() as $row){?>
      <option value="<?php echo $row->id_supplier?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
      <input type="hidden" name="stts" />
      </div>
      
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Print</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
       
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>