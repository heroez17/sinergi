<script type="text/javascript">

function convertToRupiah(objek) {
      separator = ".";
      a = objek.value;
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      objek.value = c;

    };
	

function ckk(){
	var nama = $('#id_barang').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_gdg/ck')?>",
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
    <form class="form" action="<?php echo base_url()?>index.php/admin/barang_gdg/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
  <div class="form-group">
        <div class="col-xs-6">
               <div class="form-group">
                  <label for="exampleInputEmail1" class="lbl">ID BARANG &nbsp;</label>
       
       <input type="text" name="id_barang" <?php echo $dis;?> id="id_barang" onkeyup="ckk()" value="<?php echo $id_barang;?>" class="form-control" required>
               </div>
       </div>
       
       
         <div class="col-xs-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Kategori</label>
      <select class="form-control select2" required name="id_kategori">
      <option value="<?php echo $id_kategori?>"><?php echo $nama_kategori?></option>
      <?php
	  $this->db->where("stts","AKTIF");
	   $r=$this->db->get('tab_kategori');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_kategori?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                </div>
          </div>
       
                  
                </div>
                
                <div class="form-group">
                <div class="col-xs-12">
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
       <input type="text" name="nama" value="<?php echo $nama;?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
       </div>
                </div>
                </div>
                
       <div class="form-group">
            <div class="col-xs-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Satuan Grosir</label>
      <select class="form-control select2" required name="id_satuan_gudang">
      <option value="<?php echo $id_satuan?>"><?php echo $nama_satuan_gudang?></option>
      <?php
	  $this->db->where("stts","AKTIF");
	   $r=$this->db->get('tab_satuan');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
               </div>
             </div>
       
       
             <div class="col-xs-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Harga Beli satuan Grosir</label>
      <input type="text" class="form-control" required name="harga_beli" onkeyup="convertToRupiah(this)" value="<?php echo $harga_beli?>" /> 
               </div>
             </div>
       
       
       


       
       <div class="col-xs-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Harga Jual satuan Grosir</label>
      <input type="text" required class="form-control" onkeyup="convertToRupiah(this)" name="harga_jual_gudang" value="<?php echo $harga_jual_gudang?>" /> 
      </div>
       </div>
       
       
       </div>
       
       
       
                 <div class="form-group">
                  
               <div class="col-xs-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Satuan Eceran</label>
      <select required class="form-control select2" name="id_satuan_pcs">
      <option value="<?php echo $id_satuan_pcs?>"><?php echo $nama_satuan_pcs?></option>
      <?php $r=$this->db->get('tab_satuan');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
       </div>
       </div>
       
         <div class="col-xs-4">
         <div class="form-group">
                  <label for="exampleInputEmail1">Isi</label>
      <input type="number" required name="qty_pcs" class="form-control" value="<?php echo $qty_pcs;?>" />
       </div>
       </div>
       <div class="col-xs-4">
               <div class="form-group">
                  <label for="exampleInputEmail1">Harga Jual satuan Eceran</label>
      <input type="text" class="form-control" required onkeyup="convertToRupiah(this)" name="harga_jual_pcs" value="<?php echo $harga_jual_pcs?>" /> 
      </div>
       </div>
       
       
       
       </div>
       
       
        <div class="form-group">
               <div class="col-xs-6">
<div class="form-group">
                  <label for="exampleInputEmail1">Supplier</label>
      <select required class="form-control select2" name="id_supplier">
      <option value="<?php echo $id_supplier?>"><?php echo $nama_su?></option>
      <?php $ro=$this->db->get('tab_supplier');
	  foreach($ro->result() as $row){?>
      <option value="<?php echo $row->id_supplier?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
      <input type="hidden" name="stts" value="Aktif" />
       </div>
       </div>
       
       
       
       
       </div>
                
                
                      

             
                
              
              <!-- /.box-body -->
<div class="col-xs-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url()?>index.php/admin/barang_gdg" class="btn btn-warning">Cancel</a>
              </div>
</div>
              </div>
              
             
            </form>
          </div>



      </div>
      
    </div>
  </div>