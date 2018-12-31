<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
  
  function satuan(){
	var id= $('#id_dasar').val();
		if(!id){
			$('#id_dasar').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/satuan')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#page_satuan').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#page_satuan').html(msg);
									$('#btnn').html('<button type="button" onclick="simpan()" class="btn btn-sm btn-primary btn-flat">Simpan</button>');
	                             
									
							}
							
                    });
	
	}		

function simpan(){
	
	var id_set_jadi= $('#id_set_jadi').val();
	var id_dasar= $('#id_dasar').val();
	var qty= $('#qty').val();
    if(!id_set_jadi){
			$('#id_set_jadi').focus();
			return false;
			}
    if(!id_dasar){
			$('#id_dasar').focus();
			return false;
			}
	if(!qty){
			$('#qty').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/simpan')?>",
                        data: 'id_set_jadi='+id_set_jadi+'&id_dasar='+id_dasar+'&qty='+qty, 
						beforeSend : function(){
							
							$('#add_form2').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form2').html(msg);
									
	                             
									
							}
							
                    });
	
	
	}	
	

  </script>
<div class="box-body">
              <div class="row">
                
                  <input type="hidden" class="form-control" id="id_set_jadi" name="id_set_jadi" value="<?php echo $id?>" placeholder="Nama">
               
                 <div class="col-xs-3">
                <select onchange="satuan()" class="form-control select1 input-sm" id="id_dasar" required>
 <option value="">--PILIH--</option>
 <?php foreach($bahan->result() as $row){?>
 <option value="<?php echo $row->id_dasar;?>"><?php echo $row->nama;?></option>
<?php } ?>
 </select>
 </div>
  <div class="col-xs-3" id="page_satuan">
  </div>
  <div class="col-xs-3" id="btnn">
  
  </div>
              </div>
            </div>