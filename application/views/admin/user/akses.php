<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>
                                                            <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
function saver(id,idmaster){
	var iduser = "<?php echo $id_user?>";
	var nama = "<?php echo $nama?>";
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/user/simpan_akses')?>",
                        data: 'id='+id+'&iduser='+iduser+'&nama='+nama+'&idmaster='+idmaster, 
						beforeSend : function(){
							
							$('.content').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('.content').html(msg);
	                              
									
							}
							
                    });
	
	}	
	$(function () {
    $("#example2").DataTable();
    
  });
	</script>
              
           
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body">
           
            
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA 
                  </th>
                  <th>AKSES</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->nama;
				   $id_master=$row->id_menu_master?></td>
                  <td><?php $cari=$this->db->query("select * from tab_menu where id_menu_master='$id_master'");
				  if($cari->num_rows()>0){
					  foreach($cari->result() as $rt){
						   $id_me=$rt->id_menu;
						  $carisub=$this->db->query("SELECT * FROM akses WHERE id_user='$id_user' AND id_menu='$id_me' AND id_menu_master='$id_master'");
					 if($carisub->num_rows()>0){
					  foreach($carisub->result() as $rit){
						  
						 ?>
                       
                         <input type="checkbox" checked="checked" onclick="saver(<?php echo $id_me.','.$id_master;?>)" />&nbsp;<?php echo $rt->nama_lihat;?><br />
                         
<?php						  }
					  }else{
							 ?>
                              <input type="checkbox" onclick="saver(<?php echo $id_me.','.$id_master;?>)"  />&nbsp;<?php echo $rt->nama_lihat;?>
                              <br/>
                             <?php
							  }	  
						  
						  }}else{
							 ?>
                             <?php
							  }
				  ?></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
            <!-- /.box-body -->
      </div>
</section>

