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
			font-family:BatangChe;
			
			
       }
	   table{
		   border-collapse:collapse;}
		   table,td{
			   border: 0.5px solid black;
			   text-align:center
			   }
			   table,th{
				   size:15px;
			   border: 0.5px solid black;
			   text-align:center
			   }
			   
}
    </style>



 <div class="box">
            <div class="box-header bg-red">
              
              <div class="box-tools">
                <h2 align="center">&nbsp;</h2>
                <h2 align="center">DATA BARANG</h2>
                <h2 align="center"><?php echo $pro['nama']?></h2>
                <p align="center"><?php echo $pro['alamat'].' '.$pro['telpon'];?></p>
              </div>
            </div>
            <!-- /.box-header -->
   <div class="box-body table-responsive no-padding">

             <div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
           
            
              <table id="example1" style="border-collapse:collapse;" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>KATEGORI</th>
                  <th>SATUAN BESAR</th>
                  <th>SATUAN KECIL</th>
                  <th>HARGA BELI</th>
                  <th>HARGA JUAL BESAR</th>
                  <th>HARGA JUAL KECIL</th>
                  <th>SUPPLIER</th>
                  <th>STATUS</th>
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
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $row->nama_barang ?></td>
                  <td><?php echo $this->model_view->kategori($row->id_kategori); ?></td>
                  <td><?php echo '1 '.$this->model_view->satuan($row->id_satuan_gudang); ?></td>
                  <td><?php echo $row->qty_pcs.' '.$this->model_view->satuan($row->id_satuan_pcs); ?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_beli))?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_gudang))?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_pcs))?></td>
                  <td><?php echo $this->model_view->supplier($row->id_supplier); ?></td>
                  <td><?php echo $row->stts ?></td>
                  </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
            <!-- /.box-body -->
      </div>
             <p>&nbsp;</p>
<p>&nbsp;</p>
             <p>Tanggal Cetak : <?php echo date('d-m-Y')?></p>
   </div>
            <!-- /.box-body -->
          </div>
          
          