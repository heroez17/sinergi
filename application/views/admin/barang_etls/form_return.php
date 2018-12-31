<script type="text/javascript">
function cekk(){
	var tanggal = $('#tgl').val();
	var no_faktur = $('#no_faktur').val();
	var id_supplier = $('#id_supplier').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/keluardetailretrun')?>",
                        data: 'id_supplier='+id_supplier+'&no_faktur='+no_faktur, 
						beforeSend : function(){
							
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							$('.lbl').html(msg);
									
	                              
									
							}
							
                    });
	
	}	


	
	</script>
    
    
    <script type="text/javascript">
function lihtano_terima(){
	var tanggal = $('#tgl').val();
	var no_faktur = $('#no_faktur').val();
	var id_supplier = $('#id_supplier').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/lihtano_terima')?>",
                        data: 'tanggal='+tanggal+'&no_faktur='+no_faktur, 
						beforeSend : function(){
							
							$('#rtn').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							$('#rtn').html(msg);
							$('.lbl').html("");
									
	                              
									
							}
							
                    });
	
	}	


	
	</script>

      <div class="row">
 <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-red">
              <h3 class="box-title">Cari Penerimaan</h3>

              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input data-date-format="yyyy-mm-dd" type="text" onchange="lihtano_terima()" class="form-control col-md-10" id="tgl" value="" /></td>
                </tr>
               
                 <tr>
                  <td>No Terima</td>
                  <td id="rtn"><?php if($data->num_rows()>0){?>

<select onchange="cekk()" class="form-control select2" name="id_supplier" id="id_supplier" >
      <option value=""></option>
      <?php //$ro=$this->db->get('barang_gdg_titipan');
	  foreach($data1->result() as $row){?>
      <option value="<?php echo $row->no_terima?>"><?php echo $row->no_terima?></option>
      <?php } ?>
      </select>
      
      <?php }else{
		  echo "Data Tidak Ditemukan";
		  
		  } ?></td>
                </tr>
                
               
                
              </table>
              
              
              <div class="lbl">
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
				if($data1->num_rows()>0){
					foreach($data1->result() as $row){
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
              </div>
              
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
 