 <form method="post" action="<?php echo base_url()?>index.php/admin/barang_gdg/simpan_pesan">
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>NAMA</th>
                  <th>SATUAN</th>
                  <th>Qty Datang</th>
                  <th>Harga beli</th>
                  <th>Harga jual</th>
                  
                </tr>
                </thead>
                <tbody>
               
                <?php 
				$no=1;
				$notext=1;
				$noqty=1;
				$nojual=1;
				$nobeli=1;
				$noidbarang=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->id_barang;?></td>
                  <td><?php echo $row->nama_barang ?></td>
                  <td><?php echo $this->model_view->satuan($row->id_satuan_gudang); ?></td>
                  <td><input type="text" name="qty<?php echo $noqty++?>" />
                  <input type="hidden" value="<?php echo $no_faktur?>" name="no_faktur" />
                  <input type="hidden" value="<?php echo $row->id_barang?>" name="id_barang<?php echo $noidbarang++?>" /></td>
                  <td>
                  <input type="hidden" name="beli<?php echo $nobeli++ ?>" value="<?php echo str_replace(',','.',number_format($row->harga_beli));?>" /><?php echo str_replace(',','.',number_format($row->harga_beli));?></td>
                  <td><?php echo str_replace(',','.',number_format($row->harga_jual_gudang));?><input type="hidden" value="<?php echo str_replace(',','.',number_format($row->harga_jual_gudang));?>" name="jual<?php echo $nojual++?>" /></td>
                 
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                  <tr>
                  <td>
                  <input type="hidden" name="jmlh" value="<?php echo $jmlh?>" />
                  <input type="hidden" name="id_supplier" value="<?php echo $id_supplier?>" />
                  
                  
                <button type="submit" class="btn btn-primary">Simpan</button>
                </td>
                </tr>
                </tfoot>
               
              </table>
               </form>