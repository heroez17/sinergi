 
 
 
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Bahan</th>
              <th> Bahan</th>
              <th>Pemasok</th>
              <th>@Harga</th>
              <th>Qty</th>
              <th>Total Harga</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php 
			$no=1;
			$id_pembelian ="";
			$sumqty=0;
			$sumhrg=0;
			$cnc_detail="";
			 $cancel_all="";
			if($cari_table->num_rows()>0){
			foreach($cari_table->result() as $row){
				$sumqty+=$row->qty;
				$aw=str_replace('.','',$row->harga)*str_replace('.','',$row->qty);
				$sumhrg+=$aw;
				$id_pembelian = $row->id_pembelian;
	 if($row->stts==""){
		 $cnc_detail="cnc_detail";
		 $cancel_all="cancel_all";
		 }else{
			 $cnc_detail="";
			 $cancel_all="";
			 }
	 ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row->dasar?></td>
              <td><?php $this->db->where('id_dasar',$row->dasar);
			  $cr = $this->db->get('tab_dasar');
			  foreach($cr->result() as $crow){
				  echo $crow->nama;
				  }?></td>
              <td><?php $this->db->where('id_pemasok',$row->id_pemasok);
			  $crss = $this->db->get('tab_pemasok');
			  foreach($crss->result() as $crows){
				  echo $crows->nama;
				  }?></td>
              <td><?php echo $row->harga?></td>
              <td><?php echo $row->qty?></td>
              <td><?php echo number_format(str_replace('.','',$row->harga)*str_replace('.','',$row->qty))?></td>
              <td><a onclick="<?php echo $cnc_detail?>('<?php echo $row->id_pembelian_detail?>','<?php echo $row->id_pembelian?>')" data-toggle="tooltip" title="Cancel" class="glyphicon glyphicon-trash edit-personil"
           
            ></a></td>
            </tr>
            <?php }} ?>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="5" align="right">TOTAL</td>
            <td><?php echo $sumqty?> </td>
            <td><?php echo number_format($sumhrg)?></td>
           <td><a data-toggle="tooltip" onclick="<?php echo $cancel_all?>('<?php echo $id_pembelian?>')" title="Cancel Semua" style="color:RED" class="glyphicon glyphicon-trash edit-personil"
           
            ></a></td>
            </tr>
            </tfoot>
          </table>
       
