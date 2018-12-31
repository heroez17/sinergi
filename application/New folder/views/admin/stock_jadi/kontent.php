<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


            
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>KODE</th>
                  <th>BAHAN</th>
                  <th>STOCK</th>
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
                  <td><?php echo $row->kode;?></td>
                  <td><?php echo $row->dasar?></td>
                  <td><?php 
			$ri = $this->db->query("SELECT SUM(qty) AS qty_keluar FROM tab_pengeluaran_jadi where id='".$row->kode."' GROUP BY id
");
if($ri->num_rows()>0){
foreach($ri->result() as $t){
	$keluar = $t->qty_keluar;
	}}else{
		$keluar = "0";
		}
				  $stok = $row->tot;
				  echo $stok-$keluar.' ';
				  echo $row->satuan;?></td>
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
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CHECK PO</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/stock/proses_po" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <select class="form-control " id="id_po"  name="id_po" required>
 <option value="">CHECK PO</option>
 <?php 
 foreach($this->db->query('select * from tab_po where stts="WAREHOUSE"')->result() as $rw){
 ?>
 <option value="<?php echo $rw->id_po;?>"><?php echo $rw->id_po;?></option>
 <?php } ?>
 </select>
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">PROSES</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
        <div class="box box-primary">
            
        TEST   
        </div>



      </div>
      
    </div>
  </div>
</div>    









