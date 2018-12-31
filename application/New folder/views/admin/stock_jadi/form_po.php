<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
  
  
  </script>
 
 <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            
            <small> </small>
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row --><!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <div class="box-header with-border">
             
       <form action="<?php echo base_url()?>index.php/admin/stock/keluar" method="post">
       <input type="hidden" name="loop" value="<?php echo $cari->num_rows();?>" />
        <div class="col-xs-12 table-responsive" id="">
          <table id="example1" class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Qty</th>
              <th>Qty Keluar</th>
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
              <td><?php echo $row->kode?></td>
              <td><?php echo $row->nama_bahan;?></td>
              <td><?php $ri = $this->db->query("SELECT SUM(qty) AS qty_keluar FROM tab_pengeluaran where dasar='".$row->kode."' GROUP BY dasar
");
if($ri->num_rows()>0){
foreach($ri->result() as $t){
	$keluar = $t->qty_keluar;
	}}else{
		$keluar = "0";
		}
				  $stok = $row->tot;
				  echo $stok-$keluar;
				  ?></td>
              <td><input type="hidden" value="<?php echo $row->kode?>" name="no_dasar<?php echo $no_dasar++;?>" class="input-sm" required />
              <input type="number" placeholder="0" name="qty<?php echo $no_qty++;?>" class="input-sm"  />
              </td>
             
              </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="3" align="right"></td>
            <td></td>
            <td> <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"> Simpan</i></button></td>
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