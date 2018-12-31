<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/user/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                 <input type="hidden" name="user_id" value="<?php echo $user_id?>" />
                  <label for="exampleInputEmail1">Username</label>
       <input type="text" name="user_name" value="<?php echo $user_name;?>" class="form-control" required>
       
       
                  
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
       <input type="text" value="<?php echo $user_key;?>"  name="user_key"  class="form-control col-6" required>
          </div>
             <div class="form-group">
                
                  <label for="exampleInputEmail1">LEVEL</label>
                    
                  <select class="form-control" name="level" id="level" required>
                   <option value="<?php echo $level;?>"><?php echo $level;?></option>
                  
            <option value="ADMIN">ADMIN</option>
           
            </select>
                  
                </div>
               

                      

                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA KARYAWAN</label>
                  <select class="form-control" name="nik" id="nik" required>
                   <option value="<?php echo $nik?>"><?php echo $nama?></option>
                  <?php foreach($data->result() as $rw){?>
                   <option value="<?php echo $rw->nik?>"><?php echo $rw->nama;?></option>
                  <?php } ?>
            
             
                              </select>
                </div>

                
<div class="form-group">
<label for="exampleInputEmail1">Upload Photo</label>
<input name="poto" type="file" required />
</div></div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              
             
            </form>
          </div>



      </div>
      
    </div>
  </div>