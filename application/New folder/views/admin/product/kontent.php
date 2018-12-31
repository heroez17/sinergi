<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/product/tambah/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Tambah</a></small>
        
     
     
      
    </section>
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
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
                  <td><?php echo $row->id_product;?></td>
                  <td><?php echo $row->nama ?></td>
                  <td>
                   <span>
            <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->id_product;?>"
             data-nama_pr2="<?php echo $row->nama;?>" 
             ></a> 
            </span>||</span>
            <a href="<?php echo base_url()?>index.php/admin/product/tambah/<?php echo $row->id_product?>" class="glyphicon glyphicon-pencil edit-personil"
           
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

      <!-- Button trigger modal -->

<!-- Modal tambah dokter-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA product</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/product/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="p_nama" class="form-control" placeholder="Nama" required>
                  
                </div>
                
                

                <div class="form-group">
                  <label for="exampleInputEmail1">DEPARTEMENT</label>
                  <select class="form-control" name="p_pangkat" id="p_pangkat" required>
            <option value="MARKETING">MARKETING</option>
            <option value="PURCHASING">PURCHASING</option>
            <option value="PPIC">PPIC</option>
             <option value="IT">IT</option>
             <option value="PABRIK">PABRIK</option>
             <option value="GA">GA</option>
              <option value="PERSONLIA">PERSONLIA</option>
              <option value="GUDANG">GUDANG</option>
              <option value="SECURITY">SECURITY</option>
             
                              </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">JABATAN</label>
                  <select class="form-control" name="p_nip" id="p_nip" required>
                   <option value="MANAGER">MANAGER</option>
                   <option value="STAFF">STAFF</option>
                   <option value="OPERATOR PRODUKSI">OPERATOR PRODUKSI</option>
                   <option value="KOMANDAN SECURITY">KOMANDAN SECURITY</option>
                   <option value="SECURITY">SECURITY</option>
            
             
                              </select>
                </div>

                
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>
</div>

<!-- Modal edit dokter-->


<div class="modal fade" id="editt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT DATA product</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/product/updateproduct" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi2" value="Lokasi" />
                  <label for="exampleInputEmail2">Nama</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="p_nama2" id="p_nama2" class="form-control" placeholder="Nama" required="required" />
                  <input type="hidden" name="id" id="id" class="form-control" required="required" />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DEPARTEMENT</label>
                  <select class="form-control" name="p_pangkat2" id="p_pangkat2" required>
            <option value="MARKETING">MARKETING</option>
            <option value="PURCHASING">PURCHASING</option>
            <option value="PPIC">PPIC</option>
             <option value="IT">IT</option>
             <option value="PABRIK">PABRIK</option>
             <option value="GA">GA</option>
              <option value="PERSONLIA">PERSONLIA</option>
              <option value="GUDANG">GUDANG</option>
              <option value="SECURITY">SECURITY</option>
             
                              </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">JABATAN</label>
                  <select class="form-control" name="p_nip2" id="p_nip2" required>
                   <option value="MANAGER">MANAGER</option>
                   <option value="STAFF">STAFF</option>
                   <option value="OPERATOR PRODUKSI">OPERATOR PRODUKSI</option>
                   <option value="KOMANDAN SECURITY">KOMANDAN SECURITY</option>
                   <option value="SECURITY">SECURITY</option>
            
             
                              </select>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>

      
      
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE product !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/product/deleteproduct" method="post" enctype="multipart/form-data">
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
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
          <!-- form start --></div>



      </div>
      
    </div>
  </div>
</div>    
