<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/supplier/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $nama;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       <input type="hidden" name="id_supplier" value="<?php echo $id_supplier;?>" class="form-control">
       
                  
                </div>
                 <div class="form-group">
               
                  <label for="exampleInputEmail1">Kategori</label>
      <select class="form-control select2" name="id_kategori">
      <option value="<?php echo $id_kategori?>"><?php echo $nama_s?></option>
      <?php 
	  $this->db->where('stts', 'AKTIF');
	  $r=$this->db->get('tab_kategori');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_kategori?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
       
       </div>
                
                <div class="form-group">
               
                  <label for="exampleInputEmail1">Nama Sales</label>
       <input type="text" name="sales" value="<?php echo $sales;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Sales" required>
       
       </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat </label>
                  <textarea class="form-control" name="alamat"><?php echo $alamat;?></textarea>
                 </div>
                 <div class="form-group">
                
                  <label for="exampleInputEmail1">Phone</label>
       <input type="text" value="<?php echo $phone;?>"  name="phone"  class="form-control col-6" required>
       
                  
                </div>
            
<div class="form-group">
                
                  <label for="exampleInputEmail1">Email</label>
       <input type="email" value="<?php echo $email;?>"  name="email"  class="form-control col-6" required>
       
                  
                </div>
                      

                <div class="form-group">
               
                  <label for="exampleInputEmail1">Status</label>
      <select class="form-control select2" name="stts">
      <option value="<?php echo $stts?>"><?php echo $stts?></option>
      <option value="Aktif">Aktif</option>
      <option value="Tidak">Tidak</option>
     
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