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
			   text-align:right
			   }
			   table,th{
				   size:15px;
			   border: 0.5px solid black;
			   text-align:right
			   }
			   
}
    </style>



 <div class="box">
            <div class="box-header bg-red">
              
             <div class="box-tools">
                <h2 align="center">&nbsp;</h2>
                <h2 align="center">DATA KEDATANGAN <?php echo $id?></h2>
                <h2 align="center"><?php echo $pro['nama']?></h2>
                <p align="center"><?php echo $pro['alamat'].' '.$pro['telpon'];?></p>
              </div>
            </div>
            <!-- /.box-header -->
   <div class="box-body table-responsive no-padding">

             <div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive" align="center">
           
            
              <table id="example1" style="border-collapse:collapse;" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>QTY</th>
                  <th>HARGA BELI</th>
                  <th>TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				$sum=0;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $this->model_view->baranggdg($row->id_barang)?></td>
                  <td><?php echo $row->qty.' / '.$this->model_view->satuan_a($row->id_barang)?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_beli));?></td>
                  <td><?php $tot = $row->qty*$row->harga_beli;
				   echo str_replace(',','.',number_format($tot));
				  ?></td>
                  </tr>
                <?php
				
				$sum+=$tot;
				 }}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="5">Total</td>
                <td><?php echo str_replace(',','.',number_format($sum));?></td>
                </tr>
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
          
          