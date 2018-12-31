<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/user/tambah/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Tambah</a></small>
        
     
     
      
    </section>
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA 
                  </th>
                  <th>USERNAME</th>
                  <th>AKSES</th>
                  
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
                  <td><?php echo $row->nama;?></td>
                  <td><?php echo $row->user_name ?></td>
                  <td><a href="<?php echo base_url()?>index.php/admin/user/akses/<?php echo $row->user_name.'/'.$row->user_id?>" class="fa fa-book"></a></td>
                 
                  <td>
                   <span>
            <a href="<?php echo base_url()?>index.php/admin/user/deletekaryawan/<?php echo $row->user_id?>" class="glyphicon glyphicon-trash" style="color:red"  title=""
             
             ></a> 
            </span>||</span>
            <a href="<?php echo base_url()?>index.php/admin/user/tambah/<?php echo $row->user_name?>" class="glyphicon glyphicon-pencil edit-personil"
           
            ></a><span>
            
              
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

