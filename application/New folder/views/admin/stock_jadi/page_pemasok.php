<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
  
  
  </script>
      
      <div class="col-xs-3" id="page_pemasok">
    
             
 <select class="form-control select1 input-sm" id="id_pemasok" onchange="" required>
 <option value="">PILIH PEMASOK</option>
 <?php 
 foreach($cari->result() as $row){
 ?>
 <option value="<?php echo $row->id_pemasok;?>"><?php echo $row->pemasok;?></option>
 <?php } ?>
 </select>
</div>
<div class="col-xs-2" >
  <input type="text" class="form-control input-sm" id="harga" onkeyup="convertToRupiah(this)" placeholder="@Harga" />
  </div>
  <div class="col-xs-2" id="">
  <input type="number" class="form-control input-sm" id="qty" onkeyup="" placeholder="Qty" /> <?php echo $satuan?>
  </div>