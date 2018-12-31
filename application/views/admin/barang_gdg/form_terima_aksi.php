<form action="<?php echo base_url()?>index.php/admin/barang_gdg/terima_pesan" method="post">

      <div class="row">
 <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-green">
              <h3 class="box-title">Detail Pemesanan <?php echo $no_faktur?></h3>

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
                  <th>Qty</th>
                  <th>Qty Terima</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Total</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php 
				$sum=0;
				$no=1;
				$no_qty=1;
				$no_idbarang=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $this->model_view->baranggdg($row->id_barang);?></td>
                  <td><?php echo $row->qty;?></td>
                  <td><input type="text" name="qty_terima<?php echo $no_qty++?>" value="<?php echo $row->qty;?>" />
                  <input type="hidden" name="id_barang<?php echo $no_idbarang++?>" value="<?php echo $row->id_barang;?>" />&nbsp;</td>
                  <td><?php echo number_format($row->harga_beli); ?></td>
                  <td><?php echo number_format($row->harga_jual); ?></td>
                  <td><?php echo number_format($row->harga_beli*$row->qty);
				  $sum+=$row->harga_beli*$row->qty;?></td>
                 
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                <tr>
                <td colspan="6" align="right">Total</td>
                <td><?php echo number_format($sum);?></td>
                </tr>
                <tr>
                <td > <input type="hidden" name="no_faktur" value="<?php echo $no_faktur;?>" />
                <input type="hidden" name="jumlah" value="<?php echo $jmlh;?>" />
                <button type="submit" class="btn btn-primary">Terima</button></td>
                <td colspan="6" ></td>
                </tr>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
      </div>
        
 </form>