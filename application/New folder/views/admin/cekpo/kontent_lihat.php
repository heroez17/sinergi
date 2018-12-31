
 
 <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-file"></i> 
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row --><!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <div class="box-header with-border">
             
       <form action="<?php echo base_url()?>index.php/admin/cekpo/keluar" method="post">
       <input type="hidden" name="loop" value="<?php echo $cari->num_rows();?>" />
       
        <div class="col-xs-12 table-responsive" id="">
          <table id="example1" class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Qty</th>
              <th># </th>
              </tr>
            </thead>
            <tbody>
            <?php 
			$no=1;
			$no_id_po=1;
			$no_id_jadi=1;
			$no_id_pembelian=1;
			$no_id_pembelian_detail=1;
			$no_dasar=1;
			$id_pembelian ="";
			$sumqty=0;
			$qty=1;
			$sumhrg=0;
			
			if($cari->num_rows()>0){
			foreach($cari->result() as $row){
				
	 
		 
			
	 ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row->id_jadi?></td>
              <td><?php echo $row->bahanjadi;?></td>
              <td><?php echo $row->qty;?></td>
              <td> <input type="hidden" name="id_po" value="<?php echo $row->id_po;?>" />
              <input type="hidden" name="id_po_detail<?php echo $no_dasar++;?>" value="<?php echo $row->id_po_detail;?>" />
              <input type="hidden" name="qty<?php echo $qty++;?>" value="<?php echo $row->qty;?>" />
              <input type="hidden" name="id_jadi<?php echo $no_id_jadi++;?>" value="<?php echo $row->id_jadi;?>" /></td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="3"></td>
            <td>&nbsp;</td>
            <td> <?php if($row->stts=="AKTIF"){?><button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> Ambil Barang</i></button><?php }else{echo "";} ?></td>
           </tr>
            </tfoot>
          </table>
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
    
       
        </form>
     
    </section>

    <!-- /.content -->