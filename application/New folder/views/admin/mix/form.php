<script type="text/javascript">
function page_detail2(data){
	var id= data;
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/detail_data2')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#add_form2').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form2').html(msg);
	                              
									
							}
							
                    });
	
	}	
	
function hapus_mix(a,b){
	
	var id_mix = a;
	var id_dasar = b;
	
	
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/hapus')?>",
                        data: 'id_mix='+id_mix+'&id_dasar='+id_dasar, 
						beforeSend : function(){
							
							$('#add_form2').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form2').html(msg);
									
	                             
									
							}
							
                    });
	
	
	}			
</script>

<div class="col-md-12"><!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Bahan Setengah Jadi <strong class="text-yellow"><?php echo $p;?></strong></h3>

              <div class="box-tools"><small class="label pull-right bg-yellow"><?php echo $jumlah_set?> item</small>
               
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
              <?php 
			  if($setengah->num_rows()>0){
			  foreach($setengah->result() as $row){?>
                <li><a href="#" onclick="page_detail2('<?php echo $row->id_set_jadi;?>')"><i class="fa fa-circle-o text-yellow"></i> <?php echo $row->nama?><span class="label label-warning pull-right"><?php echo $row->satuan_komposisi.' '.$row->satuan?> </span></a></li><?php }}else{?>
				<li><a href="#" class="text-red">Belum Ada Data</a></li>
				<?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <div class="col-md-12" id="add_form2"><!-- /. box -->
          
        </div>
        <!-- /.col -->
        