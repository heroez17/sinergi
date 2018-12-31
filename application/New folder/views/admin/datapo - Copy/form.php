
 
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
              <th>Qty </th>
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
              <td><?php echo $row->nama;?></td>
              <td><input type="hidden" value="<?php echo $row->id_jadi?>" name="id_jadi<?php echo $no_dasar++;?>" class="input-sm" required />
              <input type="number" placeholder="0" name="qty<?php echo $no_qty++;?>" class="input-sm"  />
              </td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="3" align="right"></td>
            <td> <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> KIRIM</i></button></td>
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