<?php if($data->num_rows()>0){?>

<select onchange="cekk()" class="form-control select2" name="id_supplier" id="id_supplier" >
      <option value=""></option>
      <?php //$ro=$this->db->get('barang_gdg_titipan');
	  foreach($data->result() as $row){?>
      <option value="<?php echo $row->no_terima?>"><?php echo $row->no_terima?></option>
      <?php } ?>
      </select>
      
      <?php }else{
		  echo "Data Tidak Ditemukan";
		  
		  } ?>