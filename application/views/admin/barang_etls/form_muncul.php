
<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/barang_etls/simpan_terima_titipan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                 <div class="form-group  col-sm-3">
               
                  <label for="exampleInputEmail1" class="lbl">ID BARANG &nbsp;</label>
       
       <input type="text" name="id_barang" readonly="readonly" id="id_barang" onkeyup="ckk()" value="<?php echo $id_barang;?>" class="form-control" required>
       
                  
                </div>
                
                <div class="form-group  col-sm-3">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" readonly="readonly" value="<?php echo $nama;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control"  required>
                </div>
       
                <div class="form-group  col-sm-3">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Satuan</label>
       <input type="text" name="satuan" readonly="readonly" value="<?php echo $satuan;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control"  required>
                </div>
                                <div class="form-group  col-sm-3">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Harga Beli</label>
       <input type="text" name="harga_beli" value="<?php echo $this->model_view->hargabelititipan($id_barang);?>" class="form-control"  required>
                </div>
                                <div class="form-group  col-sm-3">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Harga Jual</label>
  <input type="text" name="harga_jual" value="<?php echo $this->model_view->hargajualtitipan($id_barang);?>" class="form-control"  required>
                </div>
                                <div class="form-group  col-sm-3">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Qty Terima</label>
       <input type="text" name="qty" value="" class="form-control"  required>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url()?>index.php/admin/barang_etls/titipan" class="btn btn-warning">Cancel</a>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>