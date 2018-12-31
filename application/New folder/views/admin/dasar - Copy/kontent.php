<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
         <small>  <a href="<?php echo base_url()?>index.php/admin/dasar" class="btn btn-primary" ><i class="fa fa-home" ></i> Home</a></small>
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/dasar/tambah/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Tambah</a></small>
           <small>  <a href="<?php echo base_url()?>index.php/admin/dasar/ss" class="btn btn-primary" ><i class="fa fa-recycle" ></i> Recycle Bin</a></small>
     
     
      
    </section>
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>KODE</th>
                  <th>NAMA
                  </th>
                  <th>BAG SETENGAH JADI</th>
                  <th>SATUAN</th>
                  <th>USER INPUT</th>
                  <th>USER UPDATE</th>
                  <th>AKSI</th>
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
                  <td><?php echo $row->id_dasar;?></td>
                  <td><?php echo $row->nama; echo ' <p></p><i>';
				  if($row->stts=="AKTIF"){
					  echo "";
					   }else{
						 echo "Di Nonaktifkan Oleh :";  
						 $carss=$this->db->query('select nama from tab_karyawan where nik="'.$row->userdelete.'" ');
				  foreach($carss->result() as $ross){
					  echo $ross->nama;
					  }
				   echo ' '.$row->tgldelete;
						echo "</i> <a href='".base_url()."index.php/admin/dasar/sd/".$row->id_dasar."'>Aktifkan Kembali</a>"; 
						   }?></td>
                  <td><?php echo $row->set_jadi;?></td>
                  <td><?php echo $row->satuan_komposisi.' '.$row->satuan;
				
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
            <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->id_dasar;?>"
             data-nama_pr2="<?php echo $row->nama;?>" 
             ></a> 
            </span>||</span>
            <a href="<?php echo base_url()?>index.php/admin/dasar/tambah/<?php echo $row->id_dasar?>" class="glyphicon glyphicon-pencil edit-personil"
           
            ></a>
            
            <span>
            
              
          </td>
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
            <!-- /.box-body -->
      </div>
</section>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE dasar !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/dasar/deletedasar" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi3" value="Lokasi" />
                  <label for="exampleInputEmail2">Anda Akan Menghapus <strong style="color:red"><i id="nama"></i></strong> ?</label>
                  
                  <input type="hidden" name="id3" id="id3" class="form-control" required="required" />
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
          <!-- form start --></div>



      </div>
      
    </div>
  </div>
</div>    
