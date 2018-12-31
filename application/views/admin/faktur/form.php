<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/faktur/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                 <label for="exampleInputEmail1">NO FAKTUR</label>           
       <input type="text" name="no_faktur" value="<?php echo $no_faktur;?>" disabled="disabled" class="form-control" placeholder="" required>
       
                  
                </div>
                 
                
                
                
                 <div class="form-group">
                
                  <label for="exampleInputEmail1">TGL ORDER</label>
       <input type="text" value="<?php echo $tgl_order;?>" disabled="disabled"  name="tgl_order"  class="form-control col-6" required>
       
                  
                </div>
             
                <div class="form-group">
                  <label for="exampleInputEmail1">PELANGGAN</label>
                  <select class="form-control select2" name="pelanggan" id="pelanggan" required>
                  <option value=""></option>
                  <?php $r=$this->db->get("tab_pelanggan");
				  foreach($r->result() as $row){?>
                   <option value="<?php echo $row->nik;?>"><?php echo $row->nama.' || '.$row->jabatan;?></option>
           <?php } ?>
            
             
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