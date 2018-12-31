
<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
  
function simapn_header(){
		var id= $('#alasan').val();
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/saveheader')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#tampil_detail').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#tampil_detail').html(msg);
	                              
									
							}
							
                    });
					
		
		};

		</script>



<div class="box box-danger">
          
            <div class="box-body">
              <div class="row" id="tampil_detail">
               <form method="post" action="">
                 <div class="col-xs-12">
                   <label>ALASAN PEMBELIAN</label>
                   <input type="text" required id="alasan"  value="" class="form-control input-sm" placeholder="">
                </div>
                <div class="col-xs-12">
                 <div class="box-footer">
                    <button type="button" onclick="simapn_header()" class="btn btn-primary btn-sm">Simpan Master</button>
                   </div>
                </div>
                 </form>
              </div>
              
            </div>
            
            

             
             
             
           
            
   