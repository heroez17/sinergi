
<script type="text/javascript">
$(function () {
	$(".select1").select2();
    $("#example1").DataTable();
  
  });
</script>




<div class="box box-danger">
           <div class="box-header with-border">
              <h3 class="box-title">DATA BAHAN DASAR</h3>
            </div>
           
            
       
<div class="box-header with-border">
 
             <div class="box box-primary">
               <div class="box-header with-border" id="tampil_page">
                 
               </div>
                      
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>BAHAN DASAR</th>
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