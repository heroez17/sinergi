<script type="text/javascript">
function buka_form(data){
	var id= data;
		if(!id){
			$('#alasan').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/buka_form')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#add_form').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#add_form').html(msg);
	                              
									
							}
							
                    });
	
	}		
  
  
  function pilih_pemasok(){
	  var id= $('#id_dasar').val();
		if(!id){
			$('#id_dasar').focus();
			return false;
			}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/pilih_pemasok')?>",
                        data: 'id='+id, 
						beforeSend : function(){
							
							$('#page_pemasok').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#page_pemasok').html(msg);
	                              
									
							}
							
                    });
	  
	  
	  };
	  function convertToRupiah(objek) {
      separator = ".";
      a = objek.value;
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      objek.value = c;

    };
	
	 function simpanDetail(){
		
	  var id= $('#id_pembelian').val();
	  var id_dasar= $('#id_dasar').val();
	  var id_pemasok= $('#id_pemasok').val();
	   var harga= $('#harga').val();
	   var qty= $('#qty').val();
	  if(!id_dasar){$('#id_dasar').focus();return false;}
	   if(!id_pemasok){$('#id_pemasok').focus();return false;}
	  if(!harga){$('#harga').focus();return false;}
	   if(!qty){$('#qty').focus();return false;}
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/simpanDetail')?>",
                        data: 'id='+id+'&id_dasar='+id_dasar+'&id_pemasok='+id_pemasok+'&harga='+harga+'&qty='+qty, 
						beforeSend : function(){
							
							$('#reload_table').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#reload_table').html(msg);
	                              
									$('#add_form').html(''); 
							}
							
                    });
	  };
	  
	  
	  
	  function cnc_detail(id_detail,id_pembelian){
		
	  var id_detail= id_detail;
	  var id_pembelian= id_pembelian;
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/CanceDetail')?>",
                        data: 'id_detail='+id_detail+'&id_pembelian='+id_pembelian, 
						beforeSend : function(){
							
							$('#reload_table').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#reload_table').html(msg);
	                              
									$('#add_form').html(''); 
							}
							
                    });
	  };
	  
	  function cancel_all(id_pembelian){
		
	  var id_pembelian= id_pembelian;
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/pembelian/CanceDetail_all')?>",
                        data: 'id_pembelian='+id_pembelian, 
						beforeSend : function(){
							
							$('#reload_table').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#reload_table').html(msg);
	                              
									
							}
							
                    });
	  };
  
  </script>
      

 <?php foreach($cari->result() as $row){
	 if($row->stts=="PROSES"){
		 $bukaform="buka_form";
		 $cnc_detail="cnc_detail";
		 $cancel_all="cancel_all";
		 $kirim=base_url().'index.php/admin/pembelian/kirim/'.$row->id_pembelian;
			
		 }else{
			  $cnc_detail="";
			 $cancel_all="";
			 $bukaform="";
			 $kirim="#";
			 }
	 ?>
 
 <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-file"></i> #<?php echo $row->id_pembelian?>
            <small class="pull-right">Tgl: <?php echo $row->tglinput?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
         Alasan
          <address>
           <?php echo $row->alasan?>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Status
          <address>
           <?php echo $row->stts?>
           <br />
           <?php echo $row->userdelete.' '.$row->tgldelete?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          User Input
          <address>
          ADMINISTRATOR
          2017-09-09
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <div class="box-header with-border">
              <h3 class="box-title">Masukan Bahan</h3>&nbsp;
              <div class="pull-right box-tools">
               
          <button type="button" onclick="<?php echo $bukaform?>('<?php echo $row->id_pembelian?>')" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tambah Bahan">
                  <i class="fa fa-plus"></i></button>
              </div>     
        </div>
          <div class="box-header with-border" id="add_form">
              
            </div>
        <div class="col-xs-12 table-responsive" id="reload_table">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Pemasok</th>
              <th>@Harga</th>
              <th>Qty</th>
              <th>Total Harga</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php 
			$no=1;
			$id_pembelian ="";
			$sumqty=0;
			$sumhrg=0;
			
			if($cari_table->num_rows()>0){
			foreach($cari_table->result() as $row){
				$sumqty+=$row->qty;
				$aw=str_replace('.','',$row->harga)*str_replace('.','',$row->qty);
				$sumhrg+=$aw;
				$id_pembelian = $row->id_pembelian;
	 
		 
			
	 ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row->dasar?></td>
              <td><?php $this->db->where('id_dasar',$row->dasar);
			  $cr = $this->db->get('tab_dasar');
			  foreach($cr->result() as $crow){
				  echo $crow->nama;
				  }?></td>
              <td><?php $this->db->where('id_pemasok',$row->id_pemasok);
			  $crss = $this->db->get('tab_pemasok');
			  foreach($crss->result() as $crows){
				  echo $crows->nama;
				  }?></td>
              <td><?php echo $row->harga?></td>
              <td><?php echo $row->qty?></td>
              <td><?php echo number_format(str_replace('.','',$row->harga)*str_replace('.','',$row->qty))?></td>
              <td><a onclick="<?php echo $cnc_detail?>('<?php echo $row->id_pembelian_detail?>','<?php echo $row->id_pembelian?>')" data-toggle="tooltip" title="Cancel" class="glyphicon glyphicon-trash edit-personil"
           
            ></a></td>
            </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="5" align="right">TOTAL</td>
            <td><?php echo $sumqty?> </td>
            <td><?php echo number_format($sumhrg)?></td>
           <td><a data-toggle="tooltip" onclick="<?php echo $cancel_all?>('<?php echo $id_pembelian?>')" title="Cancel Semua" style="color:RED" class="glyphicon glyphicon-trash edit-personil"
           
            ></a></td>
            </tr>
            </tfoot>
          </table>
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo $kirim;?>" type="button" class="btn btn-success pull-right"><i class="fa fa-send"></i> Kirim
          </a>
         
        </div>
      </div>
    </section>
    <?php } ?>
    <!-- /.content -->