
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
<p><h4><?php echo $judul;?></h4></p></div>
  <table width="100%" style="border-collapse:collapse;
    border: 1px solid #000;
     text-align:center;" border="1">
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
			$ri = $this->db->query("SELECT SUM(qty) AS qty_keluar FROM tab_pengeluaran where dasar='".$row->kode."' GROUP BY dasar
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

     <?php  
	  
	 echo "<br/>"; 
	
	 
	 ?>
    
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