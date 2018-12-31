
 
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
             
       <form action="<?php echo base_url()?>index.php/admin/datapo/keluar" method="post">
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
              <td><?php echo $row->bahanjadi;?></td>
              <td><?php echo $row->qty;?></td>
              <td><?php if($row->stts=="AKTIF"){?><a data-toggle="tooltip" title="Cancel" href="<?php echo base_url()?>index.php/admin/datapo/canceldet/<?php echo $row->id_po_detail.'/'.$row->id_po?>" style="color:RED" class="glyphicon glyphicon-trash"></a><?php } ?></td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="3"><?php if($row->stts=="AKTIF"){?><a data-toggle="tooltip" title="Tambah" href="<?php echo base_url()?>index.php/admin/datapo/tambahedit/<?php echo $row->id_po_detail.'/'.$row->id_po?>" class="btn btn-primary glyphicon glyphicon-pencil"></a><?php } ?></td>
            <td>&nbsp;</td>
            <td> <?php if($row->stts=="AKTIF"){?><button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> KIRIM</i></button><?php } ?></td>
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