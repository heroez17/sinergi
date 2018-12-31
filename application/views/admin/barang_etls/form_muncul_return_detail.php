<script type="text/javascript">
function simpan_return(){
	var qty_return = $('#qty_return').val();
	var no_terima = $('#no_terima').val();
	var qty = $('#qty').val();
	var id_barang = $('#id_barang').val();
	if(parseInt(qty_return)>parseInt(qty)){
		alert("Error");
		return false;
		}
	$.ajax({
                        type: "POST",
                        url : "",
                   data: 'qty_return='+qty_return+'&no_terima='+no_terima+'&qty='+qty+'&id_barang='+id_barang, 
						beforeSend : function(){
							
						$('#lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							$('#lbl').html(msg);
							
									
	                              
									
							}
							
                    });
	
	}	


	
	</script>

<div class="box-body table-responsive no-padding">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama 
                  </th>
                  <th>Qty </th>
                  <th>Return</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  
                 
                </tr>
                </thead>
                <tbody>
                <?php 
				$sum=0;
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $this->model_view->namabarangtitip($row->id_barang);?></td>
                  <td><?php echo $this->model_view->stktitipann($row->id_barang).' '.$this->model_view->sptitip_satuan($row->id_barang);;?></td>
                  <td>
                  <form onsubmit="return simpan_return()" method="post" action="<?php echo base_url('index.php/admin/barang_etls/simpanreturn')?>">
                  <div class="input-group input-group-sm">
                  
                             <input type="hidden" name="no_terima" id="no_terima" value="<?php echo $row->no_terima;?>" class="form-control">
                <input type="hidden" id="qty" name="qty" value="<?php echo $this->model_view->stktitipann($row->id_barang);?>" class="form-control">
                <input type="hidden" id="id_barang" name="id_barang" value="<?php echo $row->id_barang;?>" class="form-control">
               <input type="text" id="qty_return" name="qty_return" value="<?php echo $row->qty_return;?>" class="form-control">
               
         <input type="hidden" id="" name="qty_rr" value="<?php echo $row->qty;?>" class="form-control">
               
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Go!</button>
                    </span>
                    
              </div></form></td>
                  <td><?php echo $row->harga_beli; ?></td>
                  <td><?php echo number_format($row->harga_jual); ?></td>
                  
                  <td>
                   
            
              
          </td>
                </tr>
                <?php }
				
				}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="6" align="right">&nbsp;</td>
                
                </tr>
                <tr>
                <td ><a href="<?php echo base_url()?>index.php/admin/barang_etls/titipan" class="btn btn-primary">Kembali</a></td>
                <td colspan="6" ></td>
                </tr>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->