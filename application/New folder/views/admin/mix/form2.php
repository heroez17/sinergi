<script type="text/javascript">
function page_baru(data){
	var id= data;
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/page_baru')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#baru').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#baru').html(msg);
	                              
									
							}
							
                    });
	
	}
	
function page_detail22(){
	var id= $("#id_set_jadi").val();
	var stts= $("#status").val();
		
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/detail_data22')?>",
                        data: 'id='+id+'&stts='+stts, 
						beforeSend : function(){
							
							$('#add_form2').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form2').html(msg);
	                              
									
							}
							
                    });
	
	}					
</script>
<?php
 $val=$this->db->query("SELECT tab_pengeluaran.dasar, tab_jadi.id_jadi
FROM
    ibenk_pantri.tab_pengeluaran
    INNER JOIN ibenk_pantri.tab_po_detail 
        ON (tab_pengeluaran.id_po_detail = tab_po_detail.id_po_detail)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi) WHERE tab_pengeluaran.stts='AKTIF' AND tab_jadi.id_jadi='$idjad';")->num_rows();
		if($val>0){$add="";
		$textadd="Bahan Sedang Di Produksi, Tidak Bisa Add";
		$textadd1="Bahan Sedang Di Produksi, Tidak Bisa Modify";
		$hapus = "";
		
		}else{
			$hapus="hapus_mix";
			$textadd1="";
			$add="page_baru";
			$textadd="Add";}

?>
<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">BAHAN DASAR <strong class="text-light-blue"><?php echo $p;?></strong></h3><i class="text-red">  <?php echo $textadd1;?></i>
              <div class="box-tools">
              <small class="label pull-right bg-blue"><?php echo $jumlah_set->num_rows();?> item</small>
             </div>
            </div>
            
            
            
            
            
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
             <li><a><div class="has-feedback">
             <input type="hidden" id="id_set_jadi" value="<?php echo $id?>" />
             <select onchange="page_detail22()" class="form-control input-sm" id="status"><option value=""></option>
             <option value="AKTIF">AKTIF</option>
             <option value="NONAKTIF">NONAKTIF</option></select>
                 
                </div></a></li>
              <?php 
			  if($jumlah_set->num_rows()>0){
			  foreach($jumlah_set->result() as $row){ ?>
               <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> <?php echo $row->dasar?>
               <?php if($row->stts=="AKTIF"){
					$label="success";
					$trash="danger";
					$tittle="NONAKTIFKAN";
					}else{
						$trash="danger";
						$tittle="AKTIFKAN";
						$label="danger";
						
						}?>
                        
                        
                <span data-toggle="tooltip" title="<?php echo $tittle?>" onclick="<?php echo $hapus?>('<?php echo $row->id_mix;?>','<?php echo $id?>')" class="label label-<?php echo $trash;?> pull-right"><i class="fa fa-trash"></i></span>
                
                
                
                <span class="label label-<?php echo $label;?> pull-right"><?php echo $row->stts;?></span>
                <span data-toggle="tooltip" title="QTY" class="label label-primary pull-right"><?php echo $row->qty.' '.$row->satuan?></span>
               </a></li>
               <?php }}else{?>
				   <li><a href="#">Belum Ada Data</a></li>
				  <?php } ?>
                <li><a href="#" onclick="<?php echo $add?>('<?php echo $id; ?>')"><i class="fa fa-plus text-light-blue"></i> <?php echo $textadd?></a></li>
              </ul>
            </div>
             <div class="box-footer with-border" id="baru">
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->