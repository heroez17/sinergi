<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo '<i class="red">'.$info.'</i>';
																 
																 
																 }
															?>
<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" onsubmit="return confirm('Anda Akan Logout otomatis jika data yang dimasukan benar')" action="<?php echo base_url()?>index.php/admin/user/simpan_rubah" method="post">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                 <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>" />
                  <label for="exampleInputEmail1">Username</label>
       <input type="text" name="user_name" readonly="readonly" value="<?php echo $this->session->userdata('user_name');?>" class="form-control" required>
       
       
                  
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Password Lama</label>
       <input type="password"  value=""  name="user_key_lama"  class="form-control col-6" required>
          </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Password baru</label>
       <input type="password"  value=""  name="user_key_baru"  class="form-control col-6" required>
          </div>
             
               

                      

               

                

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Rubah</button>
              </div>

              
             
            </form>
          </div>



      </div>
      
    </div>
  </div>