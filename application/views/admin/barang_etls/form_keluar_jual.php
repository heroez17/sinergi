<script type="text/javascript">
function bayaran(){
	var harusbayar=$("#harusbayar").val();
	var uangnya=$("#uangnya").val();
	var total=parseInt(harusbayar);
	var bayar=parseInt(uangnya);
	if(total>bayar){
		alert('jumlah bayar tidak boleh kurang dari Total');
		return false;
		}
	}

</script>

 <?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo '<h2><strong style="color:red">'.$info.'</strong></h2>';
																 
																 
																 }
															?>
 <div class="box">
            <div class="box-header bg-red">
              <h3 class="box-title">Detail Jual</h3>

              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama 
                  </th>
                  <th>Harga </th>
                  <th>Qty </th>
                  <th>Total</th>
                  
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$sum=0;
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					$nog=$row->nofak;
					if($nog==""){
						$text_ket="hidden";
						$text_bayar="text";
						$btn="Bayar";
						
						}else{
							$text_ket="text";
							$text_bayar="hidden";
							$btn="Submit";
							}
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php $nama=$this->model_view->baranggdg($row->id_barang);
				  if($nama==""){
					  echo $this->model_view->barattp($row->id_barang);
					  }else{
						  echo $nama;
						  }
				  
				  ?></td>
                  <td>Rp. <?php echo $row->harga_jual.' / '.$row->satuan;?></td>
                  <td><?php echo $row->qty;?></td>
                  <td><?php $r=$row->harga_jual*$row->qty;
				  echo number_format($r);$sum+=$r;?></td>
            
                  <td>
                  
            <button class="btn bg-danger" onclick="dt('<?php echo $row->id_barang;?>','<?php echo $row->tanggal;?>')" style="color:red" ><i class="glyphicon glyphicon-trash delete-personil"></i></button> 
           
            
           
            
              
          </td>
                </tr>
                <?php }}else{
					$text_ket="hidden";
						$text_bayar="hidden";
						$btn="";
					
					}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="4" align="right">Total</td>
                <td colspan="2" ><?php echo number_format($sum);?></td>
                
                </tr>
                <tr>
                <td colspan="6">
                    <form onsubmit="return bayaran()" action="<?php echo base_url()?>index.php/admin/barang_etls/jual" method="post">
                        <input type="hidden" name="id" value="<?php echo $this->model_view->getkodeKasir()?>" />
                        <input type="<?php echo $text_bayar;?>" id="uangnya" name="bayar" value="" placeholder="bayar" required />
                   <input type="hidden" id="harusbayar" value="<?php echo $sum;?>" required />
                        <input type="<?php echo $text_ket;?>" name="ket" id="ket" size="60px" placeholder="keterangan / Nama Pengambil" required/>
                        
         <input type="hidden" name="no_faktur" id="nofak" size="60px" placeholder="" />
                        
                    <button type="submit" class="btn btn-primary"><?php echo $btn;?></button>
                    
                   
                    </form></td>
                <td></td>
                </tr>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          
          