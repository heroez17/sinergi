<script type="text/javascript">

function buka_form(){
	var id= "0";
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/buka_form/0')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}		
	
	function cari_data(){
	var id= $('#text_cari').val();
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/cari')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#cari_text').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#cari_text').html(msg);
	                              
									
							}
							
                    });
	
	}		
function page_detail(data){
	var id= data;
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/mix/detail_data')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}

  			
</script> 
 
 
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
        <?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>
        

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $home_nav1?></h3>

              <div class="box-tools">
                <button type="button" data-toggle="tooltip" title="MINIMIZE DATA" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            
            <div class="box-header with-border">
             <div class="has-feedback">
                  <input type="text" id="text_cari" onkeyup="cari_data()" data-toggle="tooltip" title="KETIKAN DATA" placeholder="<?php echo $home_nav2?>" class="form-control input-sm" >
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>

              
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked" id="cari_text">
               <?php 
				   foreach($data as $row_master){?>
                <li><a href="#" onclick="page_detail('<?php echo $row_master->id_jadi?>')"><i class="fa fa-file-text-o"></i> <?php echo $row_master->nama?></a></li>
                <?php } ?>
               
              
              </ul>
             
                 
             
                 <div class="box-footer">
                    <?php echo $links; ?>
                     <a href="" type="button" onclick="location.href=location.href()" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
                     <a data-toggle="modal" data-target="#delete" href="" type="button" onclick="location.href=location.href()" class="btn btn-primary btn-sm "><i class="fa fa-print"></i> Print</a>
                    
                </div>
                
               
             
            </div>
           
            <!-- /.box-body -->
          </div>
          <!-- /. box --><!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9" id="add_form">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" data-toggle="tooltip" title="KLIK MASTER DATA">TIDAK ADA AKTIFITAS</h3>
              <!-- /.box-tools -->
            </div>
          </div>
       
         
      
       
        </div>
        
        <div class="col-md-9" id="add_detail">
          
       
         
      
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FILTER BAHAN</h4>
      </div>
     
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/mix/printt" method="post">
              <div class="box-body">
                <div class="form-group">
                 
                  <select class="form-control input-sm" name="id_jadi">
                  <option value="">--PILIH-- </option>
                  <?php 
				   foreach($data as $tyu){?>
                   <option value="<?php echo $tyu->id_jadi;?>"><?php echo $tyu->nama;?></option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                 
                  <select class="form-control input-sm" name="stts">
                  <option value="">--STATUS-- </option>
                 <option value="AKTIF">AKTIF</option>
                   <option value="NONAKTIF">NONAKTIF</option>
                 
                  </select>
                </div>
               <div class="form-group">
               <span class="text-red">Kosongkan data untuk print semua data</span>
               </div> 
               
                <div class="box-footer">
                  <button type="submit" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>

    <!-- /.content -->