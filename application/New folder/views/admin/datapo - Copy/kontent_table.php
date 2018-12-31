

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
              <h3 class="box-title">Data Bahan</h3>&nbsp;
       <form action="<?php echo base_url()?>index.php/admin/kedatangan/simpan" method="post">
       <input type="hidden" name="loop" value="<?php echo $loop;?>" />
        <div class="col-xs-12 table-responsive" id="reload_table">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Qty</th>
              <th>Qty Terima</th>
              </tr>
            </thead>
            <tbody>
            <?php 
			$no=1;
			$no_qty=1;
			$no_qty_terima=1;
			$no_id_pembelian=1;
			$no_id_pembelian_detail=1;
			$no_dasar=1;
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
              <td><?php echo $row->qty?></td>
              <td><input type="text" value="<?php echo $row->qty?>" name="qty_terima<?php echo $no_qty_terima++;?>" class="input-sm" />
              <input value="<?php echo $row->id_pembelian?>" type="hidden" name="id_pembelian<?php echo $no_id_pembelian++;?>" class="input-sm" />
   <input value="<?php echo $row->id_pembelian_detail?>" type="hidden" name="id_pembelian_detail<?php echo $no_id_pembelian_detail++;?>" class="input-sm" />
              <input value="<?php echo $row->dasar?>" type="hidden" name="dasar<?php echo $no_dasar++;?>" class="input-sm" />
              <input value="<?php echo $row->qty?>" type="hidden" name="qty<?php echo $no_qty++;?>" class="input-sm" />
              </td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="3" align="right">TOTAL</td>
            <td><?php echo $sumqty?> </td>
            <td></td>
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
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> Terima</i></button>
         
         
        </div>
        </form>
      </div>
    </section>
    <?php } ?>
    <!-- /.content -->