<script type="text/javascript">
function cekk(){
	var tanggal = $('#tgl').val();
	var no_faktur = $('#no_faktur').val();
	var id_supplier = $('#id_supplier').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_gdg/pesanck')?>",
                        data: 'id_supplier='+id_supplier+'&no_faktur='+no_faktur, 
						beforeSend : function(){
							
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							$('.lbl').html(msg);
									
	                              
									
							}
							
                    });
	
	}	
	
	</script>

      <div class="row">
 <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-default">
              <h3 class="box-title"><small>  <a data-toggle="modal" data-target="#editt-poto" href="#" class="btn btn-primary" ><i class="fa fa-database" ></i> Check Data Kedatangan</a></small>
        </h3>

              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               
                <tr>
                  <td>Tanggal</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" id="tgl" value="<?php echo date('Y-m-d');?>" /></td>
                </tr>
                <tr>
                  <td>No Faktur</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" id="no_faktur" value="<?php echo $this->model_view->getkodepesan()?>" /></td>
                </tr>
                 <tr>
                  <td>Supplier</td>
                  <td><select onchange="cekk()" class="form-control select2" name="id_supplier" id="id_supplier" >
      <option value=""></option>
      <?php 
	   $this->db->where('stts','AKTIF');
	  $ro=$this->db->get('tab_supplier');
	  foreach($ro->result() as $row){?>
      <option value="<?php echo $row->id_supplier?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select></td>
                </tr>
                
               
                
              </table>
              
              
              <div class="lbl">
              </div>
              
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
 <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-green">
              <h3 class="box-title">Detail Kedatangan</h3>

              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama 
                  </th>
                  <th>Qty</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Total</th>
                  <th>AKSI</th>
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
                  <td><?php echo $this->model_view->baranggdg($row->id_barang);?></td>
                  <td><?php echo $row->qty.' '.$this->model_view->satuan_a($row->id_barang);?></td>
                  <td><?php echo number_format($row->harga_beli); ?></td>
                  <td><?php echo number_format($row->harga_jual); ?></td>
                  <td><?php echo number_format($row->harga_beli*$row->qty);
				  $sum+=$row->harga_beli*$row->qty;?></td>
                  <td>
                   <span>
            <a href="<?php echo base_url()?>index.php/admin/barang_gdg/delete_pesan/<?php echo $row->id_barang;?>" class="glyphicon glyphicon-trash delete-personil" style="color:red" ></a> 
           
            
            <span>
            
              
          </td>
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="5" align="right">Total</td>
                <td><?php echo number_format($sum);?></td>
                </tr>
                <tr>
                <td ><a href="<?php echo base_url()?>index.php/admin/barang_gdg/kirim_pesan/<?php echo $this->model_view->getkodepesan()?>" class="btn btn-primary">TERIMA</a></td>
                <td colspan="5" ></td>
                </tr>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
      </div>
      
      
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">FILTER DATA KEDATANGAN BARANG</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form role="form" action="<?php echo base_url()?>index.php/admin/barang_gdg/cek_datang" method="post" enctype="multipart/form-data">
              <div class="box-body">
               
                <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Tanggal</label>
      <input type="text" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d")?>" class="form-control col-md-10" id="tglp20" name="tgl" required />     
          
       
                </div>
                
                
                <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">s/d Tanggal</label>
      <input type="text" id="tglp201" name="tgl2" value="<?php echo date("Y-m-d")?>" data-date-format="yyyy-mm-dd" class="form-control" required />          
          
       
                </div>
                
                
       </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Cek</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
       
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>
        
 