<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/karyawan/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $nama;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       <input type="hidden" name="nik" value="<?php echo $nik;?>" class="form-control" placeholder="NIK" required>
       
                  
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat </label>
                  <textarea class="form-control" name="alamat"><?php echo $alamat;?></textarea>
                 </div>
                 <div class="form-group">
                
                  <label for="exampleInputEmail1">PHONE</label>
       <input type="text" value="<?php echo $phone;?>"  name="phone"  class="form-control col-6" required>
       
                  
                </div>
             <div class="form-group">
                
                  <label for="exampleInputEmail1">TEMPAT LAHIR</label>
       <input type="text" value="<?php echo $tem_lah;?>"  name="tem_lah"  class="form-control col-6" required>
       
                  
                </div>
                <div class="form-group">
                
                  <label for="exampleInputEmail1">TANGGAL LAHIR</label>
 <input type="text" value="<?php echo $tgl_lah;?>"  name="tgl_lah" id="tgl" class="form-control"  required>       
                  
                </div>

                      

                <div class="form-group">
                  <label for="exampleInputEmail1">JENIS KELAMIN</label>
                  <select class="form-control" name="jk" id="jk" required>
                   <option value="<?php echo $jk;?>"><?php echo $jk;?></option>
            <option value="LAKI-LAKI">LAKI-LAKI</option>
            <option value="PEREMPUAN">PEREMPUAN</option>
            
             
                              </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">JABATAN</label>
 <input type="text" value="<?php echo $jabatan;?>"  name="jabatan" class="form-control"  required>       
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