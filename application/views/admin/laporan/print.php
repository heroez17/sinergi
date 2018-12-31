<script type="text/javascript">
window.print();
window.onfocus=function(){window.location = "<?php echo base_url()?>index.php/admin/barang_etls/kasir/0";}</script>
<style type="text/css" media="print">
@media print{
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:0mm;
			margin-bottom:0mm;
			
              /* this affects the margin in the printer settings */
        }

        body 
        {
			-webkit-print-color-adjust: exact;
            background-color:#FFF; 
            border: solid 1px #FFF ;
            margin: 0px;  /* the margin on the content before printing */
			font-size:10;
			
			font-family:BatangChe;
       }
}
    </style>



 <div class="box">
            <div class="box-header bg-red">
              
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
   <div class="box-body table-responsive no-padding">

             <table width="100" >
               <tr>
                 <td colspan="5" align="center"><span class="box-title"><?php echo $pro['nama'];?><br /><?php echo $pro['alamat'];?><br /><?php echo $pro['telpon'];?>
                 <br />
                 -------------------------<br />
                 <?php echo $id;?><br />
                 -------------------------</span></td>
               </tr>
                
                 <tr>
                 <td width="26">No</td>
                 <td colspan="4">No Jual</td>
                 
               </tr>
               
               <?php
			   $no=1;
			   $sum=0;
			   if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
               <tr>
                 <td width="26"><?php echo $no++?></td>
                 <td colspan="4"><?php echo $id=$row->no_jual?></td>
                
               </tr>
               <tr>
                 
                 
                 <td>&nbsp;&nbsp;</td>
                 
                 <td>Nama</td>
                 <td>Qty</td>
                 <td>Hrg</td>
                 </tr>
                 <?php
				 $ni=1;
				  $fg=$this->db->query("select * from barang_jual where no_jual='$id'")->result();
                 foreach($fg as $row1){?>
                 <tr>
                 <td>&nbsp;&nbsp;</td>
                 
                 <td><?php  $nama=$this->model_view->baranggdg($row1->id_barang);
				  if($nama==""){
					  echo $this->model_view->barattp($row1->id_barang);
					  }else{
						  echo $nama;
						  }?></td>
                 <td><?php echo $row1->qty.' '.$row1->satuan;?></td>
                 <td><?php  echo number_format($row1->harga_jual) ?></td>
                 </tr>
                 <tr>
                 <td>&nbsp;&nbsp;</td>
                 <td colspan="2">Total</td>
                 <td><strong><?php 
				 $aaaa=$row1->harga_jual*$row1->qty;
				 echo number_format($row1->harga_jual*$row1->qty);?></strong></td></tr>
                 <?php
				 $sum+=$aaaa;
				 
				  }?>
                 
                 
               </tr>
               <?php } } ?>
               <tr>
               <td colspan="5">-----------------------------------</td>
               
               </tr>
               <tr>
               <td colspan="3">Total Setor</td>
               <td><?php echo number_format($sum);?></td>
               </tr>
               
               
</table>
             <p>&nbsp;</p>
<p>&nbsp;</p>
             <p>&nbsp;</p>
   </div>
            <!-- /.box-body -->
          </div>
          
          