<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/kategori/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $kategori;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       <input type="hidden" name="id_kategori" value="<?php echo $id_kategori?>" class="form-control" >
        
        <input type="hidden" name="userinput" value="<?php echo $userinput?>" class="form-control" >
        <input type="hidden" name="userupdate" value="<?php echo $userupdate?>" class="form-control" >
        <input type="hidden" name="tglinput" value="<?php echo $tglinput?>" class="form-control" >
        <input type="hidden" name="tglupdate" value="<?php echo $tglupdate?>" class="form-control" >
        <input type="hidden" name="stts" value="<?php echo $stts?>" class="form-control" >
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