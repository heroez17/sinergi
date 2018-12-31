<div class="row">
<?php 
$i=1;

foreach($data->result() as $row){
	$i++;
	?>
  <div class="col-md-6">
    <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">KOMPOSISI <?php echo $row->satuan_komposisi.' '.$row->satuan.' '.$row->nama;?></h3>
            </div>
            <!-- /.box-header -->
          
            <?php  $no=1; $j=1;$setjadi = $this->db->query("SELECT
    tab_set_jadi.id_set_jadi
	,tab_set_jadi.satuan_komposisi
    , tab_set_jadi.nama
    , tab_set_jadi.jadi
    , tab_satuan.nama as satuan
FROM
    ibenk_pantri.tab_set_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_set_jadi.satuan = tab_satuan.id_satuan) where tab_set_jadi.jadi='$row->id_jadi'");
			foreach($setjadi->result() as $ri){
				$j++;
			?>
            
            <div class="box-body">
              <div class="box-group" id="accordion<?php echo $i;?>">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion<?php echo $i;?>" href="#collapse<?php echo $ri->id_set_jadi;?>">
                        <?php echo $no++.' . '.$ri->satuan_komposisi.' '.$ri->satuan.' '.$ri->nama;?> 
                      </a> 
                    </h4>
                  </div>
                  <div id="collapse<?php echo $ri->id_set_jadi;?>" class="panel-collapse collapse">
                   <?php $ni=1;$rt=$this->db->query("SELECT
    tab_dasar.id_dasar
    , tab_dasar.nama
    , tab_dasar.satuan_komposisi
    , tab_satuan.id_satuan
    , tab_satuan.nama as satuan
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan) WHERE tab_dasar.stts='AKTIF' AND tab_dasar.set_jadi='$ri->id_set_jadi'");
				   foreach($rt->result() as $tu){
				   ?>
                   <div class="box-body">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-right"></i> &nbsp;&nbsp;<?php echo $ni++.' . '.$tu->nama;?>
                    <?php echo ' ----- '.$tu->satuan_komposisi.' '.$tu->satuan;?>
                    </div>
                     <?php } ?>
                  </div>
                 </div>
                
              </div>
            </div>
            
			
			
			
			<?php }?>
			
			
			
			
    </div> 
	
	</div>
    
    
    
    
    
    
    
    
    <?php } ?>
    
    
    
    
        
      </div>
      <!-- /.row -->
      <!-- /.row -->
