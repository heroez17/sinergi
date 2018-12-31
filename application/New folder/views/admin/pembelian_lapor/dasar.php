<script type="text/javascript">
window.print();
window.onfocus=function(){window.close();}</script>
<style type="text/css" media="print">
@media print{
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:3mm;
			margin-bottom:0mm;
			
              /* this affects the margin in the printer settings */
        }

        body 
        {
			-webkit-print-color-adjust: exact;
            background-color:#FFF; 
            border: solid 1px #FFF ;
            margin: 0px;  /* the margin on the content before printing */
       }
	   table{
		   margin:1px;
		   background:#FFF;
		     font-size:12px;}
		 thead{
			 background-color:#CCC;
			
			 }
			 hr{
				 color::#CCC;
				 border:none;
				 height:10px;
				 background-color:#CCC;
				 }
				 footer{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#CCC;
					 }
				footer table{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#CCC;
					 color:#FFF;
					 padding:1px;
					}	 
					footer hr{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#000;
					}	 

}}
    </style>
<html>

<title>LAPORAN </title>

<body>

<div align="center">
<p><h4><?php echo $judul;?></h4> <?php echo $p_tgl.' s/d '.$p_tgl1;?></p></div>
<?php 
$no=1;
if($table->num_rows()>0){
foreach($table->result() as $row){
	$id_pembelian=$row->id_pembelian;?>
<table width="100%" style="border-collapse:collapse;
    border: 1px solid #000;
     text-align:center;" border="1">
  <thead>
<tr>
        <td bgcolor="#999999">No</td>
      <td bgcolor="#999999">Kode</td>
      <td bgcolor="#999999">Alasan Pembelian</td>
      <td bgcolor="#999999">User Input</td>
      <td bgcolor="#999999">User Update</td>
      <td bgcolor="#999999">User Delete</td>
        <td bgcolor="#999999">Status</td>
    </tr>
  </thead>
       


<tbody>
      <tr align="center">
       <td><?php echo $no++?></td>
       <td><?php echo $row->id_pembelian?></td>
       <td><?php echo $row->alasan?></td>
       <td><?php
				  $car=$this->db->query('select nama from tab_karyawan where nik="'.$row->userinput.'" ');
				  foreach($car->result() as $ro){
					  echo $ro->nama;
					  }
				   echo ' '.$row->tglinput;
				   
				   ?></td>
       <td><?php
                  $cars=$this->db->query('select nama from tab_karyawan where nik="'.$row->userupdate.'" ');
				  foreach($cars->result() as $ros){
					  echo $ros->nama;
					  }
				   echo ' '.$row->tglupdate;
				  
				  ?></td>
       <td><?php
                  $carss=$this->db->query('select nama from tab_karyawan where nik="'.$row->userdelete.'" ');
				  foreach($carss->result() as $ross){
					  echo $ross->nama;
					  }
				   echo ' '.$row->tgldelete;
				  
				  ?></td>
       <td><?php echo $row->stts?></td>
    </tr>
      <tr align="center">
        <td colspan="7">DETAIL</td>
      </tr>
    <tr>
    <td>#</td>
    <td>Bahan</td>
    <td>Pemasok</td>
    <td>@Harga</td>
     <td>Qty</td>
      <td>Satuan</td>
    <td>Total Harga</td>
    
    </tr>
    <?php
	$number=1;
	$sum=0;
	 $cari=$this->db->query("SELECT
    tab_dasar.nama AS dasar
    , tab_pemasok.nama AS pemasok
    , tab_satuan.nama AS satuan
    , tab_pembelian_detail.harga
    , tab_pembelian_detail.qty
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_pembelian_detail 
        ON (tab_dasar.id_dasar = tab_pembelian_detail.dasar)
    INNER JOIN ibenk_pantri.tab_pemasok 
        ON (tab_pembelian_detail.id_pemasok = tab_pemasok.id_pemasok)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_satuan.id_satuan = tab_dasar.satuan) WHERE tab_pembelian_detail.id_pembelian='$id_pembelian';");
		foreach($cari->result() as $rl){
			$rep=str_replace('.','',$rl->harga);
			$totalharga=$rep*$rl->qty;
			$sum+=$totalharga;
		?>
    <tr>
    <td><?php echo $number++?></td>
    <td><?php echo $rl->dasar;?></td>
    <td><?php echo $rl->pemasok;?></td>
    <td><?php echo $rl->harga;?></td>
     <td><?php echo $rl->qty;?></td>
      <td><?php echo $rl->satuan;?></td>
    <td><?php echo number_format($totalharga)?></td>
    
    </tr>
    
    <?php }?>
    <tr>
      <td colspan="6">&nbsp;</td>
      <td><?php echo number_format($sum);?></td>
    </tr>
    </tbody>
   
   
  
     
</table>

     <?php  
	  
	 echo "<br/>"; }
	
	 
	 }?>
    
    <table width="100%">
      <tr>
        <td width="13%">Tanggal Cetak</td>
        <td width="1%">:</td>
        <td width="25%"><?php  echo date('d-m-Y H:i') ?>&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td>User Cetak</td>
        <td>:</td>
        <td><?php echo $user;?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
</table>

    <table width="100%" style="background-color:#CCC; color:#FFF">
      <tr>
        <td><?php echo $pro['nama'];?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><?php echo $pro['nama'];?></a>.</strong> 
    <?php echo $pro['alamat'];?> <?php echo $pro['telpon'];?> <a><?php echo $pro['email'];?></td>
      </tr>
</table>
</body>
    </html>   