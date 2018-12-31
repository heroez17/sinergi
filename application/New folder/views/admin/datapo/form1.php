<script type="text/javascript">
$(function () {
	$(".select1").select2();
	});
	
	
function simp(){
	var id_po1= $('#id_po1').val();
	var id_jadi_1= $('#id_jadi_1').val();
	var qty1= $('#qty1').val();
	
		if(!id_po1){
			$('#id_po1').focus();
			return false;
			}
			if(!id_jadi_1){
			$('#id_jadi_1').focus();
			return false;
			}
			if(!qty1){
			$('#qty1').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/datapo/detail_data_simpan')?>",
                        data: 'id_po='+id_po1+'&id_jadi='+id_jadi_1+'&qty='+qty1, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}
	
				
  </script>

<td colspan="4"><input type="hidden" id="id_po1" value="<?php echo $id_po?>" />
<select class="form-control select1 input-sm" id="id_jadi_1" style="width:400px" required>
 <option value="">--PILIH--</option>
 <?php foreach($table as $row){?>
 <option value="<?php echo $row->id_jadi;?>"><?php echo $row->nama;?></option>
<?php } ?>
 </select></td>
<td> - </td>
<td><input type="number" name="qty" id="qty1" placeholder="Qty" /></td>
<td> <button type="button" onclick="simp()" class="btn btn-success pull-right"><i class="fa fa-save"> </i></button></td>