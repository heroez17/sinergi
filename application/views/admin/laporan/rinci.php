<script type="text/javascript">
window.print();
window.onfocus=function(){window.close()}</script>
<style type="text/css" media="print">
@media print{
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:8mm;
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
			
			font-family:Calibri;
       }
	      
			   th{
				   size:15px;
			   border: 0.5px solid;
			   text-align:right
			   }
	   .tableh{
		   text-align:center;
		   }
		   .warna{
			   background-color:#CCC;
          		   }
		   .warna1{
			   background-color:#0F0;
          		   }
	h2{
		font-size:30px}
	h3{
		font-size:25px}

}
    </style>



 <div class="box">
            <div class="box-header bg-red">
  <table width="100%">
  </tr> <!--garis--><tr><th colspan="5"></th></tr>
             <tr>
    <td colspan="4" class="tableh"> LAPORAN RINCIAN KASIR</td>
    <td class="tableh"> Periode : <?php echo $satu.' s/d '.$dua?></td>
    
  </tr> 
  
  </tr> <!--garis--><tr><th colspan="5"></th></tr>
           
 
 
 
   </table>
           
   </div>
    <?php 
	$sumtot=0;
	if($data->num_rows()>0){
	foreach($data->result() as $row){
		$nofak=$row->nofak;?>
   <div class="box-body table-responsive no-padding">
    <table width="100%"> <!--garis--><tr><th colspan="5"></th></tr>
  <tr class="warna1">
    <td colspan="5" class="tableh"> JENIS TRANSAKSI : <?php if($nofak==""){
		echo "CASH";}else{
			echo "KREDIT ".$nofak;
			}
			
			?></td>
    
  </tr> <!--garis--><tr><th colspan="5"></th></tr>
  <?php $r=$this->db->query("select * from barang_jual where nofak='$nofak' GROUP BY no_jual");
  foreach($r->result() as $rt){?>  
  <tr class="warna">
  <td class="tableh">No Nota : <?php echo $nojual=$rt->no_jual;?></td>
  <td class="tableh">Barang</td>
  <td class="tableh">Qty</td>
  <td class="tableh">Harga</td>
  <td class="tableh">Total</td>
  </tr>
<?php 
$sum=0;
$b=$this->db->query("select * from barang_jual where no_jual='$nojual'");
foreach($b->result() as $rowp){?>
  <tr>
  <td class="tableh"></td>
  <td class="tableh"><?php echo $this->model_view->baranggdg($rowp->id_barang);?></td>
  <td class="tableh"><?php echo $rowp->qty;?></td>
  <td class="tableh"><?php echo $rowp->harga_jual;?></td>
  <td class="tableh"><?php echo number_format($tot=$rowp->harga_jual*$rowp->qty);?></td>
  </tr>
 
  <?php $sum+=$tot; } ?>
  <?php } ?>
  <tr>
    <td colspan="4" align="right">Total</td>
    <td class="tableh"><?php echo number_format($g1=$this->model_view->getsum($nofak,$satu,$dua));?></td>
  </tr> 
   <?php if($nofak==""){?>
		<?php }else{?>
			<tr>
    <td colspan="4" align="right">Sudah Bayar</td>
    <td class="tableh"><?php echo number_format($g2=$this->model_view->sudahbayar($nofak,$satu,$dua));
	
	?></td>
        <tr>
    <td colspan="4" align="right">Sisa </td>
    <td class="tableh"><?php echo number_format($g1-$g2);?></td></tr>
			<?php $sumtot+=$g2; }
			
			?>
   <!--garis--><tr><th colspan="5"></th></tr>
</table>
<p></p>
   </div>
         <?php }}else{
			 echo "NO DATA";
			 
			 } ?>   <!-- /.box-body -->
 </div>
  <table width="100%">
  
  </tr> <!--garis--><tr><th colspan="5"></th></tr>
             <tr>
    <td class="tableh" colspan="2"> Total Cash :<?php echo number_format($this->model_view->getsum("",$satu,$dua));?></td>
    <td class="tableh"> Total Kredit :<?php echo number_format($g1=$this->model_view->getsumheader($satu,$dua));?></td>
    <td class="tableh"> Total Lunas Kredit : <?php echo number_format($ty=$sumtot)?></td>
    <td class="tableh"> Sisa Kredit : <?php echo number_format($g1-$ty)?></td>
    
  </tr> 
   </tr> <!--garis--><tr><th colspan="5"></th></tr>
 
 
 
   </table>
          
          