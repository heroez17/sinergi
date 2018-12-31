<script type="text/javascript">
function ckk(){
	var nama = $('#id_barang').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/ck')?>",
                        data: 'id_barang='+nama, 
						beforeSend : function(){
							
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							if(msg=='0'){
								$('.lbl').html("ID BARANG Tersedia");
								}else{
									$('.lbl').html("<i style='color:red'>ID BARANG SUDAH DIGUNAKAN</i>");
									$('#id_barang').val('');
									}
									
	                              
									
							}
							
                    });
	
	}	
	
	</script>

<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/barang_etls/simpan_titipan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                 <div class="form-group">
               
                  <label for="exampleInputEmail1" class="lbl">ID BARANG &nbsp;</label>
       
       <input type="text" name="id_barang" <?php echo $dis;?> id="id_barang" onkeyup="ckk()" value="<?php echo $id_barang;?>" class="form-control" required>
       
                  
                </div>
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $nama;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       <input type="hidden" name="harga_jual" value="<?php //echo $harga_jual;?>" onKeyUp="" class="form-control" placeholder="Harga" >
       <input type="hidden" name="harga_beli" value="<?php //echo $harga_beli;?>" onKeyUp="" class="form-control" placeholder="Harga" >
       <input type="hidden" name="qty" value="<?php //echo $qty;?>" onKeyUp="" class="form-control" placeholder="Qty" >
                </div>
                
                
                 <div class="form-group">
               
                  <label for="exampleInputEmail1">Satuan</label>
      <select class="form-control select2" name="id_satuan">
      <option value="<?php echo $id_satuan?>"><?php echo $nama_s?></option>
      <?php $r=$this->db->get('tab_satuan');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
       
       </div>
       
       
        <div class="form-group">
               
                  <label for="exampleInputEmail1">Supplier</label>
                   <input type="text" name="id_supplier" value="<?php echo $nama_su;?>" onKeyUp="" class="form-control" placeholder="Supplier" required>
      
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