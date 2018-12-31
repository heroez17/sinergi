<script type="application/javascript">
 $(function () {
    $("#example1").DataTable();
    
  });
</script>
        <div class="box box-primary">
            
            
          
           
       <div class="box-header with-border">
              <h3 class="box-title"><?php echo $home_nav1?></h3>
            </div>
            <!-- form start -->
    
              <div class="box-body">
                
                <div class="form-group">
                 <div class="row">
        <div class="col-xs-12">
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
             <div class="input-group"> <input type="number" placeholder="0" name="qty<?php echo $no_qty++;?>" class="input-sm"  />
               <span class="input-group-addon text-red"><?php echo $row->satuan?></span></div>
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
        
             <?php echo $this->load->view($detail);?>
          </div>

 

   