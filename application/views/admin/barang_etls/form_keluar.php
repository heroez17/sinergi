<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
function pokus(){
	$('#id_supplier').focus();
	
	}
$(document).ready(function(){
	var nofok="<?php echo $nofak;?>";
	var id_supplier = $('#id_supplier').val();
	var optradio =  $('input[name=optradio]:checked').val();
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/keluarck')?>",
                        data: 'id_supplier='+id_supplier+'&optradio='+optradio, 
						beforeSend : function(){
							$("#id_supplier").val("");	
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							
							$('.lbl').html(msg);
								$("#nofak").val(nofok);
	                        		
							}
							
							
							
							
							
                    });
	
		
		$('#id_supplier').focus();
		
		
});
function clickedEdFind(){
    
    jInterfacer.openScanner();
}
    
function cekk(aa){
	var nofok="<?php echo $nofak;?>";
	var id_supplier = aa;
	var nofak = $('#nofak').val();
	var optradio =  $('input[name=optradio]:checked').val();
	if(!optradio){
		alert('Option harap di Isi');
		return false;
		}
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/keluarck')?>",
                        data: 'id_supplier='+id_supplier+'&optradio='+optradio+'&nofak='+nofak, 
						beforeSend : function(){
							$("#id_supplier").val("");	
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							
							$('.lbl').html(msg);
								$("#nofak").val(nofok);
	                              
									
							}
							
                    });
	
	}	
	
	function dt(id,od){
	
	var id_supplier = id;
	var tanggal = od;
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_etls/delte')?>",
                        data: 'id_supplier='+id_supplier+'&tanggal='+tanggal, 
						beforeSend : function(){
							
							$('.lbl').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							$('.lbl').html(msg);
							
									
	                              
									
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
      <h3><?php echo $baca;?></h3>
      <div class="row">
 <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               
                <tr><td><form>
    <label class="radio-inline">
      <input type="radio" name="optradio" onclick="pokus()" checked="checked" id="optradio" value="etalase">Etalase
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" onclick="pokus()" id="optradio" value="gudang">Gudang
    </label>
    
    
  </form></td>
                  <td>Nota</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" id="no_faktur" value="<?php echo $this->model_view->getkodeKasir()?>" /></td>
                   <td>Tanggal</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" id="tgl" value="<?php echo date('Y-m-d');?>" /></td>
               <td>Kode Barang</td>
                  <td><input type="text" onclick="clickedEdFind()" onchange="cekk(this.value)" class="form-control col-xs-3" name="id_supplier" id="id_supplier" /></td>
                  
                  <td><button type="button" data-toggle="modal" data-target="#op"  class="btn btn-primary btn-sm buka">Etalase <i class="fa fa-search"></i></button></td>
                  <td> 
                  
                   
      
       <button type="button" data-toggle="modal" data-target="#opi"  class="btn btn-primary btn-sm buka">Gudang <i class="fa fa-search"></i></button>
    </td>
    <td><button type="button" data-toggle="modal" data-target="#ope"  class="btn btn-primary btn-sm buka"> <i class="fa fa-print"></i></button></td>
                </tr>
                
               
               
                
              </table>
              
              
             
              
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
 <div class="col-xs-12 lbl">
        
        </div>
        
        
        
      </div>
        
 
 
 <div class="modal fade" id="op" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Barang Etalase</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>SATUAN</th>
                  <th>HARGA JUAL</th>
                  
                  <th>#</th>
                  </tr>
                </thead>
                
                <tbody>

				<?php 
				$no=1;
				if($dati->num_rows()>0){
					foreach($dati->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $row->nama_barang; ?></td>
                  <td><?php echo $this->model_view->satuan($row->id_satuan_pcs); ?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_pcs)); ?></td>
                  
                  <td>
                                  <form action="<?php echo base_url('index.php/admin/barang_etls/keluarck2')?>" method="post">
                 <input type="text" name="qty" size="3" required />
                 <input type="hidden" name="no_faktur" size="3" value="<?php echo $nofak;?>" required />
                 <input type="hidden" name="optradio" value="etalase"/>
                  <input type="hidden" name="id_supplier" value="<?php echo $row->id_barang;?>"/>
                  <button type="submit">save</button>
                
                    </form>
                  </td>
                  </tr>
                <?php }}?>
              
                </tbody>
                
                <tfoot>
                </tfoot>
              </table>
           
        </div>



      </div>
      
    </div>
  </div>
</div>


 <div class="modal fade" id="opi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cari Barang Gudang</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>SATUAN</th>
                  <th>HARGA JUAL</th>
                  
                  <th>#</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($dati->num_rows()>0){
					foreach($dati->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $row->nama_barang; ?></td>
                  <td><?php echo $this->model_view->satuan($row->id_satuan_gudang); ?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_gudang)); ?></td>
                  <td> <form action="<?php echo base_url('index.php/admin/barang_etls/keluarck2')?>" method="post">
                  
				 
                 
                  <input type="text" name="qty" size="3" required />
                                   <input type="hidden" name="no_faktur" size="3" value="<?php echo $nofak;?>" required />

                  <input type="hidden" name="optradio" value="gudang"/>
                  <input type="hidden" name="id_supplier" value="<?php echo $o=$row->id_barang;?>"/>
                  
				     <button type="submit">save</button>
					
                  
                
                    </form></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
           
        </div>



      </div>
      
    </div>
  </div>
</div>




<div class="modal fade" id="ope" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Print Nota</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            <div class="box-body">
             <form class="form" action="<?php echo base_url()?>index.php/admin/barang_etls/printlagi" method="post">
             <div class="form-group">
              <label for="exampleInputEmail1">Id Nota</label>
                        <input type="text" class="form-control" name="id" value="" required placeholder="KSxxxxxxxxxx" />
                        </div>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </form>
                    </div>
        </div>



      </div>
      
    </div>
  </div>
</div>
