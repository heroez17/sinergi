<script type="text/javascript">
function buka_form1(a){
	var id= a;
		
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/datapo/buka_form1/0')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#tambah').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#tambah').html(msg);
	                              
									
							}
							
                    });
	
	}	
function delete_po(a,b){
	var id_po_detal= a;
	var id_po= b;
	
			
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/datapo/detail_data_delete')?>",
                        data: 'id_po_detail='+id_po_detal+'&id_po='+id_po, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}	
	</script>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail PO <?php echo $id;?></h3>

              <div class="box-tools pull-right">
              
              
              </div>
            </div>
            <div class="box-header with-border">
             <?php foreach($cari_header as $rot){ ?>
              <div class="col-sm-6">
              Userinput : <?php echo $rot->tglinput?>
              <?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$rot->userinput.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				  
				   
				   ?>
              </div>
              <div class="col-sm-6">
              Userdelete : <?php echo $rot->tgldelete?>
              <?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$rot->userdelete.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				  
				   
				   ?>
              </div>
               <div class="col-sm-6">
              Status : <?php echo $rot->stts?>
             
              </div>
              <?php } ?>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Qty </th>
              <th>#</th>
              </tr>
            </thead>
            <tbody>
            <?php 
			$no=1;
			$no_qty=1;
			$noqty_asli=1;
			$no_id_pembelian=1;
			$no_id_pembelian_detail=1;
			$no_dasar=1;
			$id_pembelian ="";
			$sumqty=0;
			$sumhrg=0;
			
			if($cari->num_rows()>0){
			foreach($cari->result() as $row){
				
	 
		 
			
	 ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row->id_jadi?></td>
              <td><?php echo $row->bahan;?></td>
              <td><?php echo $row->qty.' '.$row->satuan?>
              </td>
              <td><?php
              if($rot->stts=="AKTIF"){?>
				  <a href="#" onclick="delete_po('<?php echo $row->id_po_detail;?>','<?php echo $row->id_po;?>')"><i class="fa fa-trash text-red"></i></a>
             <?php  }?>
              </td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            
            <tr>
            <td colspan="4" align="right"></td>
            <td><?php   if($rot->stts=="AKTIF"){?>
				  <button type="button" onclick="buka_form1('<?php echo $row->id_po;?>')" class="btn btn-success pull-right"><i class="fa fa-plus"> </i></button>
             <?php  }?></td>
            
            </tr>
            </tfoot>
          </table>
         <table id="example2" class="table table-striped">
         <thead>
         <tr id="tambah"></tr>
         </thead>
          </table>
              </div>
  </div>
              </div>
             