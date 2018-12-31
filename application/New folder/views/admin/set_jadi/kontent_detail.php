<script type="text/javascript">
function jmlhdata(){
		var id=$('#jmlh').val();
		if(!id){
			$('#jmlh').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/limitpage')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#del').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#del').html(msg);
	                              
									
							}
							
                    });
					
		
		};
		
		
		function Caridata(){
		var id=$('#nama').val();
		if(!id){
			$('#nama').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/caripage')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#del').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#del').html(msg);
	                              
									
							}
							
                    });
					
		
		};
		
		
function GetDDetail(data){
	var id = data;
		if(!id){
			$('#nama').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/caripagedetail')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#pageDetail').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#pageDetail').html(msg);
	                              
									
							}
							
                    });
	
	};
	
	
	
	function GetNonAktif(data,stts){
	var id = data;
	var stts = stts;
		if(!id){
			$('#nama').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/caripagedetail_non')?>",
                        data: 'id='+id+'&stts='+stts, 
						beforeSend : function(){
							
							$('#pageDetail').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#pageDetail').html(msg);
	                              
									
							}
							
                    });
	
	};
	
	
	function simpanDetail(){
	var id = $("#id_jadi").val();
	var id_dasar = $("#id_dasar").val();
	
		if(!id_dasar){
			$('#id_dasar').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/caripagedetail_simpan')?>",
                        data: 'id='+id+'&id_dasar='+id_dasar, 
						beforeSend : function(){
							
							$('#pageDetail').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#pageDetail').html(msg);
	                              
									
							}
							
                    });
	
	};
	
	
	
function DeleteDetail(id_detail,id_jadi){
	
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/DeleteDetail')?>",
                        data: 'id_detail='+id_detail+'&id_jadi='+id_jadi, 
						beforeSend : function(){
							
							$('#pageDetail').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#pageDetail').html(msg);
	                              
									
							}
							
                    });
	
	};
	
	
	
	
	
function bukaform(){
	var id = "0";
	
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/jadi/bukapagedetail')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#tampil_page').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#tampil_page').html(msg);
	                              
									
							}
							
                    });
	
	}			
	
		
</script>

<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo base_url()?>index.php/admin/jadi" class="btn btn-primary margin-bottom"><i class="fa fa-home"></i></a>
          <a href="" data-toggle="modal" data-target="#add" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i></a>

          <div class="box box-solid">
            <div class="box-header with-border">
            <div class="input-group input-group-sm">
            <h3 class="box-title">BAHAN SETENGAH JADI</h3>
                    
                    </div>
            </div>
            <div class="box-body no-padding">
            
              <ul class="nav nav-pills nav-stacked multiple" id="del">
               <?php foreach($data->result() as $row){
				   if($row->stts=="AKTIF"){
					   $bg="";
					   }else{
						   $bg="RED";
						   }?>
 <li><a style="color:<?php echo $bg;?>" onclick="GetDDetail('<?php echo $row->id_set_jadi?>')" href="#"><i class="fa fa-circle-o"></i> <?php echo $row->nama?></a></li>                <?php } ?>
                
              </ul>
            </div>
            <div class="box-body no-padding">
            
              <ul class="nav nav-pills nav-stacked multiple">
               
            <div class="input-group input-group-sm">
              <input type="number" id="jmlh" placeholder="Masukan Jumlah Data" class="form-control">
              <span class="input-group-btn">
                      <button onclick="jmlhdata()" type="button" class="btn btn-success btn-flat">Go</button>
                    </span>
                    </div>
               
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9"id="pageDetail">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">BAHAN DASAR</h3>
                
              </div>
          
          
          
          
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    
    
    
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA jadi</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/jadi/simpan" method="post">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="nama" class="form-control" placeholder="Nama" required>
                  <input type="hidden" name="id_jadi" />
                </div>
                <div class="form-group">
 <label>ALAMAT</label>
 <textarea name="alamat" required class="form-control"></textarea>
 </div>
  <div class="form-group">
 <label>PHONE</label>
 <input name="phone" class="form-control" type="number" required />
 </div>
 <div class="form-group">
 <label>EMAIL</label>
 <input name="email" class="form-control" type="email" required />
 </div>
 
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>
</div>





















 