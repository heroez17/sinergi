<script type="text/javascript">
function buka_form(){
	var id= "0";
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/datapo/buka_form/0')?>",
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
                        url : "<?php echo base_url('index.php/admin/datapo/cari')?>",
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
                        url : "<?php echo base_url('index.php/admin/datapo/detail_data')?>",
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
          <a href="#" onclick="buka_form()" data-toggle="tooltip" title="TAMBAH DATA" class="btn btn-primary margin-bottom">
          Tambah Data</a>
          <a href="#" data-toggle="modal" data-target="#Print" title="PRINT DATA" class="btn btn-primary margin-bottom"><i class="fa fa-print"></i> 
          Print Data</a>

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
               <?php if($data){
				   foreach($data as $row_master){?>
                <li><a href="#" onclick="page_detail('<?php echo $row_master->id_po?>')"><i class="fa fa-file-text-o"></i> <?php echo $row_master->id_po?></a></li>
                <?php }}else{?>
                <li><a>DATA KOSONG</a></li>
					<?php } ?>
               
              
              </ul>
             
                 
             
                 <div class="box-footer">
                    <?php echo $links; ?>
                     <a href="" type="button" onclick="location.href=location.href()" class="btn btn-default btn-sm btn-block"><i class="fa fa-refresh"></i> Refresh</a>
                    
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
        <h4 class="modal-title" style="color:red" id="myModalLabel">RUBAH STATUS BAHAN JADI !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/datapo/deletejadi" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi3" value="Lokasi" />
                  
                  <input type="hidden" name="id3" id="id3" class="form-control" required="required" />
                  
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>

 <div class="modal fade" id="Print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FILTER DATA</h4>
      </div>
     
       
        <div class="box box-primary">
            <div class="form-group">
           
            <!-- form start -->
            <form class="form" target="_blank" action="<?php echo base_url()?>index.php/admin/datapo/printt" method="post">
              <div class="box-body">
              
                <div class="col-xs-4">
                 Dari <input type="text" required name="tgl" id="tgl"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
              
                <div class="col-xs-4">
                S/d
                  <input type="text" required name="tgl1" id="tgl1"  class="form-control" placeholder="000-00-00"  data-date-format="yyyy-mm-dd">
                </div>
                
                 
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