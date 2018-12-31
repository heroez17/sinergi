<script type="text/javascript">
function lihat(id){
	
	var no_faktur = id;
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_gdg/lihat')?>",
                        data: 'no_faktur='+no_faktur, 
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
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <div class="lbl"></div>
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>No Faktur 
                  </th>
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
                  <td><button class="btn btn-primary" onclick="lihat('<?php echo $row->no_faktur;?>')"><?php echo $row->no_faktur;?></button></td>
                  <td>
                   <span>
            <a href="<?php echo base_url()?>index.php/admin/barang_gdg/terima_delete/<?php echo $row->no_faktur;?>" class="glyphicon glyphicon-trash delete-personil" style="color:red" ></a> 
           
            
            <span>
            
              
          </td>
                </tr>
                <?php }}?>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
      </div>
        
 