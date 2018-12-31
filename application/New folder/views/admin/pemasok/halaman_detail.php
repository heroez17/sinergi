
<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
</script>




<div class="box box-danger">
           <div class="box-header with-border">
              <h3 class="box-title">DATA DETAIL PEMASOK</h3>
            </div>
            <div class="box-body">
              <div class="row">
             
              <form method="post" action="<?php echo base_url()?>index.php/admin/pemasok/simpan">
               <?php foreach($data_header->result() as $rt){
			   $nama_pemasok=$rt->nama;
			   $id_pemasok=$rt->id_pemasok;
			   $stts=$rt->stts;
			   if($stts=="AKTIF"){
				   $toltip = "NONAKTIFKAN";
				   $bukaform="bukaform";
				   $dltdt="bukaform";
				   
				   }else{
					   $bukaform="";
					   $toltip = "AKTIFKAN";
					   $dltdt="";
				   }
			   ?>
                <div class="col-xs-3">
                <label>Nama</label>
                  <input type="text" required name="nama" onKeyUp="this.value = this.value.toUpperCase()" class="form-control input-sm" value="<?php echo $rt->nama;?>" placeholder="">
            <input type="hidden" required name="id_pemasok" class="form-control" value="<?php echo $rt->id_pemasok;?>" placeholder="">
                  <input type="hidden" required name="lokasi" class="form-control" value="Lokasi" placeholder="">
                </div>
                 <div class="col-xs-6">
                <label>Alamat</label>
                  <input type="text" required name="alamat"  value="<?php echo $rt->alamat;?>" class="form-control input-sm" placeholder="">
                </div>
                 <div class="col-xs-3">
                <label>Phone</label>
                  <input type="text" value="<?php echo $rt->phone;?>" required name="phone" class="form-control input-sm" placeholder="">
                </div>
                <div class="col-xs-3">
                <label>Email</label>
                  <input type="email" value="<?php echo $rt->email;?>" required name="email" class="form-control input-sm" placeholder="">
                </div>
                  <div class="col-xs-3">
                <label>User Input</label>
                <?php
				 $car=$this->db->query('select nama from tab_karyawan where nik="'.$rt->userinput.'" ');
				    foreach($car->result() as $ro){$userinput=$ro->nama;}
				   $cars=$this->db->query('select nama from tab_karyawan where nik="'.$rt->userupdate.'" ');
				   if($cars->num_rows()>0){
					   foreach($cars->result() as $ros){
					  $userupdate=$ros->nama;} }else{$userupdate=""; }
		 $carsi=$this->db->query('select nama from tab_karyawan where nik="'.$rt->userdelete.'" ');
				   if($carsi->num_rows()>0){
					   foreach($carsi->result() as $rosss){
					  $userdelete=$rosss->nama;} }else{$userdelete=""; }			  
				  
				?>
                  <input type="userinput" disabled="disabled" value="<?php echo $userinput.' '.$rt->tglinput;;?>" required name="email" class="form-control input-sm" placeholder="">
                </div>
               
                <div class="col-xs-3">
                <label>User Update</label>
                  <input type="text"  disabled="disabled" value="<?php echo $userupdate.' '.$rt->tglupdate;?>" required name="userupdate" class="form-control input-sm" placeholder="">
                </div>
                 
                <div class="col-xs-3">
                <label>Status</label>
                  <input type="text"  disabled="disabled" value="<?php echo $rt->stts;?>" required name="tglupdate" class="form-control input-sm" placeholder="">
                </div>
                 <div class="col-xs-3">
                <label>User NonAktiv</label>
                  <input type="text"  disabled="disabled" value="<?php echo $userdelete.' '.$rt->tgldelete;?>" required name="tglinput" class="form-control input-sm" placeholder="">
                </div>
                <div class="col-xs-3">
                <label></label>
               <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
                
<button type="button" onclick="GetNonAktif('<?php echo $id_pemasok?>','<?php echo $stts?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="<?php echo $toltip;?>">
                  <i class="fa fa-recycle"></i></button>              </div>
                </div>
                
                <?php  } ?>
                </form>
              </div>
              
            </div>
            
       
<div class="box-header with-border">
 
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">DATA BAHAN YANG DI JUAL <?php echo $nama_pemasok?></h3>&nbsp;
<div class="pull-right box-tools">
               
                <button type="button" onclick="<?php echo $bukaform?>()" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tambah Bahan">
                  <i class="fa fa-plus"></i></button>
              </div>     
            </div>
            <input type="hidden" name="id_pemasok" id="id_pemasok" value="<?php echo $id_pemasok?>" />
            <div class="box-header with-border" id="tampil_page">
           
            </div>
                      
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>BAHAN</th>
                  <th>USER INPUT</th>
                  <th>USER UPDATE</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($data_detail->num_rows()>0){
					foreach($data_detail->result() as $row){
						$nama_pemasok=$row->nama_pemasok;
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->nama;
				 echo ' <p></p><i>';
				  if($row->stts=="AKTIF"){
					  echo "";
					   }else{
						 echo "Di Nonaktifkan Oleh :";  
						 $carss=$this->db->query('select nama from tab_karyawan where nik="'.$row->userdelete.'" ');
				  foreach($carss->result() as $ross){
					  echo $ross->nama;
					  }
				   echo ' '.$row->tgldelete;?>
                   <a href="#" onclick="DeleteDetail('<?php echo $row->id_pemasok_detail?>','<?php echo $row->id_pemasok?>')" class="glyphicon glyphicon-check delete-personil" data-toggle="tooltip" title="Aktifkan Kembali" style="color:green"></a> 
                   <?php }
				  ?></td>
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
                  <td>
                   <span>
            <a href="#" onclick="<?php echo $dltdt?>('<?php echo $row->id_pemasok_detail?>','<?php echo $row->id_pemasok?>')" class="glyphicon glyphicon-trash delete-personil" style="color:red"></a> 
            </span>
            
              
          </td>
                </tr>
                <?php }}else{
					$nama_pemasok="BELUM ADA DATA DETAIL";
					
					}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              
             
            </div>
            </div>
            </div>
            
          
    <!-- /.content -->