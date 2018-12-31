<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
</script>
      
       <div class="col-xs-3">
             <input type="hidden" id="id_pembelian" value="<?php echo $id?>" />
 <select class="form-control select1 input-sm" id="id_dasar" onchange="pilih_pemasok()" name="id_dasar" required>
 <option value="">PILIH BAHAN</option>
 <?php $this->db->where('stts','AKTIF');
 $sat=$this->db->get('tab_jadi');
 foreach($sat->result() as $row){
 ?>
 <option value="<?php echo $row->id_jadi;?>"><?php echo $row->nama;?></option>
 <?php } ?>
 </select>
 </div>
  <div id="page_pemasok">
  </div>
  
 
<div class="pull-right box-tools">
               
                <button type="button" onclick="simpanDetail()" class="btn btn-success btn-sm" data-toggle="tooltip" title="Simpan">
                  Simpan</button>
              </div>     