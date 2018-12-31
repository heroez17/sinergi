<script type="text/javascript">
window.print();
window.onfocus=function(){window.location = "<?php echo base_url()?>index.php/admin/barang_etls/tambah_kedtangan";}</script>
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
                 <?php echo 'No : '.$id.'<br/>'.date('d-m-Y H:i:s');?><br />
                 -------------------------</span></td>
               </tr>
               <tr>
                 <td width="26">No</td>
                 <td colspan="4">Nama Barang</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td width="168">Qty</td>
                 <td width="57">Satuan</td>
                 <td width="57">Supplier</td>
                 <td width="58">&nbsp;</td>
               </tr>
               <?php 
				$sum=0;
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
               
               <tr>
                 <td width="26"><?php echo $no++?></td>
                 <td colspan="4"><?php $nama=$this->model_view->baranggdg($row->id_barang);
				  if($nama==""){
					  echo $this->model_view->barattp($row->id_barang);
					  }else{
						  echo $nama;
						  }
				  
				  ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td width="168"><?php echo $row->qty;?></td>
                 <td width="57"><?php echo $this->model_view->sptitip_satuan($row->id_barang);?></td>
                 <td width="57"><?php echo $this->model_view->sup_titipan($row->id_barang);?>&nbsp;</td>
                 <td width="58">&nbsp;</td>
               </tr>
               
               <?php }}?>
               <tr>
                 <td colspan="5" align="right">-------------------------</td>
                 
               </tr>
               <tr>
                 <td  align="left">Opr </td>
                 <td colspan="4" align="left" width="168"><?php echo $this->session->userdata('user_name');?></td>
               </tr>
               <tr>
                 <td colspan="5" align="right">-------------------------
                 
                 
                 </td>
                 
               </tr>
               <tr>
                 <td colspan="5" align="center">
                 <br /> TERIMAKASIH
                 
                 </td>
                 
               </tr>
               
             </table>
             <p>&nbsp;</p>
<p>&nbsp;</p>
             <p>&nbsp;</p>
   </div>
            <!-- /.box-body -->
          </div>
          
          