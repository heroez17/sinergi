<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
function edittt(aa){
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/faktur/dit')?>",
                        data: 'aa='+aa, 
						beforeSend : function(){
							
							$('#muncul').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							
							$('#muncul').html(msg);
								
	                              
									
							}
							
                    });
	
	
	}
	
	
	
	

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
	

	
</script>


<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


        
<a href="<?php echo base_url()?>index.php/admin/faktur" class="btn btn-primary"><i class="fa fa-caret-left"></i> Kembali</a>        
               <section class="content-header">
     
        
       
     
     
      

   <div id="muncul">
   </div>    
<div class="box">

          
     <div class="box-body table-responsive">
           
              <table id="" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NO FAKTUR 
                  </th>
                  <th>NAMA</th>
                  <th>KETUA ROMBONG</th>
                  <th>TGL ORDER</th>
                  <th>JMLH NOTA</th>
                  <th>NOMINAL</th>
                  <th>STATUS</th>
                  <th>#</th>
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
                  <td><?php echo $row->no_faktur;?></td>
                  <td><?php echo $row->cv;?></td>
                  <td><?php echo $row->ketua;?></td>
                  <td><?php echo $row->tgl_order ?></td>
          <td><?php echo $this->model_view->getnota(str_replace('/','F',$row->no_faktur));?></td>
                  <td><?php echo number_format($this->model_view->getnotajumlah(str_replace('/','F',$row->no_faktur)));?></td>
                  <td><?php echo $staus=$row->stts;?></td>
                  <td>
                 
                  <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-primary">Transakasi</a></td>
                 </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
      
      
      
      
      
      
    <div id="" class="box-body table-responsive">
           
            
      <p>&nbsp;</p>
          <table id="example1" class="table table-bordered table-striped ">
            <thead>
              <tr>
                <th>NO</th>
                <th>NO NOTA 
                </th>
                <th>TGL</th>
                <th>ITEM</th>
                <th>KETERANGAN</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php 
				$nox=1;
				if($faktur->num_rows()>0){
					foreach($faktur->result() as $rw){
					?>
              <tr>
                <td><?php echo $nox++?></td>
                <td><?php echo $nof=$rw->no_jual;?></td>
                <td><?php echo $rw->tanggal; ?></td>
                <td>
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Qty</th>
                <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$nov=1;
				
				$vv=$this->db->query("select * from barang_jual where no_jual='$nof'");
				foreach($vv->result() as $rt){
				?>
                <tr>
                <td><?php echo $nov++?></td>
                <td><?php echo $rt->id_barang;?></td>
                <td><?php echo $rt->qty.' '.$rt->satuan;?></td>
                <td><?php echo number_format($rt->qty*$rt->harga_jual);?></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
                </td>
                <td><?php echo $rw->ket ?></td>
                <td>             <form target="_blank" class="form" action="<?php echo base_url()?>index.php/admin/barang_etls/printlagi" method="post">
                           
                        <input type="hidden" class="form-control" name="id" value="<?php echo $rt->no_jual;?>" required placeholder="KSxxxxxxxxxx" />
                        
                        <button type="submit" class="btn btn-primary">Print</button>
                    </form>
</td>
              </tr>
              <?php }}?>
            </tbody>
            <tfoot>
            </tfoot>
      </table>
</div>
      
      
      
      
      
      
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TRANSAKSI FAKTUR</h4>
          <li> Total : Rp. <?php echo number_format($this->model_view->getnotajumlah($jdu))?></li>
         <li> Sudah Bayar : Rp. <?php echo number_format($a=$this->model_view->sudahbayar($jdu));?></li>
         <li> Sisa Bayar : Rp. <?php echo number_format($sisa=$this->model_view->sisabayar($jdu)-$a);?></li>
      </div>
      <?php
	  if($sisa=="0"){
		  $dis='disabled="disabled"';
		  }else{
			 $dis='';
			  }
	  
	  ?>
      <div class="modal-body">
        <div class="box box-danger">
           
            <div class="box-body">
              <div class="row">
              <form method="post" action="<?php echo base_url()?>index.php/admin/faktur/bayarkredit">
                <div class="col-xs-5">
                  <input type="text" <?php echo $dis?> class="form-control" required placeholder="Nama Pembayar" name="nama">
                  <input type="hidden"  class="form-control" placeholder="Nama Pembayar" name="no_faktur" value="<?php echo $jdu?>">
                </div>
                <div class="col-xs-5">
                  <input type="text" <?php echo $dis?> onkeyup="convertToRupiah(this)" required class="form-control" placeholder="Nominal" name="nominal">
                </div>
                <div class="col-xs-2">
                
                 <button type="submit" <?php echo $dis?> class="btn btn-primary">Bayar <i class="fa fa-save"></i></button>
                </div>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">Histori Pembayaran <?php echo $jdu?></h3>
            
            </div>
          <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>No Bayar</th>
                  <th>Tgl Bayar</th>
                  <th>Jumlah</th>
                  <th>Nama Pembayar</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$ni=1;if($data1->num_rows()>0){
					foreach($data1->result() as $row1){?>
                <tr>
                  <td><?php echo $ni++?></td>
                  <td><?php echo $row1->no_transaksi;?></td>
                  <td><?php echo $row1->tgl;?></td>
                  <td><?php echo number_format($row1->nominal);?></td>
                  <td><?php echo $row1->pelanggan;?></td>
                  <td>
                 <a href="<?php echo base_url()?>index.php/admin/faktur/deletekredit/<?php echo $row1->no_transaksi;?>/<?php echo str_replace('/','F',$jdu)?>" class="glyphicon glyphicon-trash delete-personil" style="color:red"></a>
                 
                  <a target="_blank" href="<?php echo base_url()?>index.php/admin/faktur/printkredit/<?php echo $row1->no_transaksi;?>/<?php echo str_replace('/','F',$jdu)?>" class="glyphicon glyphicon-print"></a> 
                    
                  </td>
                </tr>
                <?php } }?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
    
          </div>

 <a target="_blank" href="<?php echo base_url()?>index.php/admin/faktur/printkredit/h/<?php echo str_replace('/','F',$jdu)?>" class="glyphicon glyphicon-print"> PRINT</a> 

      </div>
      
    </div>
  </div>
</div>
      
      
      
      
      
      
      
      
      
<!-- /.box-body -->
      </div>
</section>
