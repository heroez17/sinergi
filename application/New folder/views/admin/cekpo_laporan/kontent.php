 <script type="text/javascript">
function po(){
	var id= $('#po').val()
		if(!id){
			$('#po').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/cekpo_laporan/per_po')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}	
	
	
function pertgl(){
	var id= $('#tgl').val()
	var id1= $('#tgl1').val()
		if(!id){
			$('#tgl').focus();
			return false;
			}
		if(!id1){
			$('#tgl1').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/cekpo_laporan/per_tgl')?>",
                        data: 'tgl='+id+'&tgl1='+id1, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}		
	</script>
<section class="content">
 <div class="row">
  <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Per PO</h3>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="input-group input-group-sm">
                <input type="text" id="po" placeholder="Masukan No PO" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" onclick="po()" class="btn btn-primary btn-flat">Cari!</button>
                    </span>
              </div>
            </div>
            <!-- /.box-body -->
           
            </div>
          </div>
          
          
          
          
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Per Tanggal</h3>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-xs-4">
            <div class="input-group ">
                <input type="text" id="tgl" data-date-format="yyyy-mm-dd"  placeholder="0000-00-00" class="form-control">
                   
              </div>
              </div>
              
               <div class="col-xs-4">
            <div class="input-group ">
                <input type="text" id="tgl1" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" class="form-control">
                   
              </div>
              </div>
               <div class="col-xs-4">
            <div class="input-group ">
               <button type="button" onclick="pertgl()" class="btn btn-primary">Submit</button>
                   
              </div>
              </div>
              
            </div>
            <!-- /.box-body -->
           
            </div>
          </div>
          <!-- /. box -->
        </div>
        
        
        
        <div class="box" id="add_form">
          
        
          
         
              </div>
       
</section>
 