<script type="text/javascript">
function cekk(){
	var tanggal = $('#tgl').val();
	var no_faktur = $('#no_faktur').val();
	var id_supplier = $('#id_supplier').val();
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_gdg/keluarck')?>",
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
            <div class="box-header bg-red">
              <h3 class="box-title">Pengeluaran</h3>

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
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" id="no_faktur" value="<?php echo $this->model_view->getkodeKeluar()?>" /></td>
                </tr>
                 <tr>
                  <td>Barang</td>
                  <td><select onchange="cekk()" class="form-control select2" name="id_supplier" id="id_supplier" >
      <option value=""></option>
      <?php 
	 
	  $ro=$this->db->get('barang_gdg');
	  foreach($ro->result() as $row){?>
      <option value="<?php echo $row->id_barang?>"><?php echo $row->nama_barang?></option>
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
            <div class="box-header bg-red">
              <h3 class="box-title">Detail Pengeluaran</h3>

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
                  <th>Qty </th>
                  <th>Qty Distribusi</th>
                  <th>Harga Jual</th>
                  <th>&nbsp;</th>
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
                  <td><?php echo $row->qty.' '.$this->model_view->sp_satuan($row->id_barang);;?></td>
                  <td><?php echo $row->qty_isi.' '.$this->model_view->satuan($row->satuan);; ?></td>
                  <td><?php echo number_format($row->harga_jual); ?></td>
                  <td>&nbsp;</td>
                  <td>
                   <span>
            <a href="<?php echo base_url()?>index.php/admin/barang_gdg/delete_keluar/<?php echo $row->id_barang;?>" class="glyphicon glyphicon-trash delete-personil" style="color:red" ></a> 
           
            
            <span>
            
              
          </td>
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="5" align="right">&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td ><a href="<?php echo base_url()?>index.php/admin/barang_gdg/kirim_keluar/<?php echo $this->model_view->getkodeKeluar()?>" class="btn btn-primary">Kirim</a></td>
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
        
 