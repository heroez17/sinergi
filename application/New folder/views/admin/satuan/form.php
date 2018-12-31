
        <div class="box box-primary">
            
            
          
           
       <div class="box-header with-border">
              <h3 class="box-title"><?php echo $home_nav1?></h3>
            </div>
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/satuan/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $satuan;?>"  class="form-control" placeholder="Nama" required>
       <input type="hidden" name="id_satuan" value="<?php echo $id_satuan?>" class="form-control" >
       
        <input type="hidden" name="userinput" value="<?php echo $userinput?>" class="input input-sm form-control" >
        <input type="hidden" name="userupdate" value="<?php echo $userupdate?>" class="form-control" >
        <input type="hidden" name="tglinput" value="<?php echo $tglinput?>" class="form-control" >
        <input type="hidden" name="tglupdate" value="<?php echo $tglupdate?>" class="form-control" >
        <input type="hidden" name="stts" value="<?php echo $stts?>" class="form-control" >
        </div>

                <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo $btn;?>
              </div>

              </div>
             
            </form>
             <?php echo $this->load->view($detail);?>
          </div>

 

   