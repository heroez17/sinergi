<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Status</th>
                    <th>User Input</th>
                    <th>User Update</th>
                    <th>User Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($f->result() as $row){?>
                  <tr>
                     <td>
                     <?php if($row->stts=="AKTIF"){?>
                     <span class="label label-success"><?php echo $stts;?></span>
                     <?php }else{ ?>
                      <span class="label label-danger"><?php echo $stts;?></span>
                     <?php } ?>
                    </td>
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
                      <?php
                  $carss=$this->db->query('select nama from tab_karyawan where nik="'.$row->userdelete.'" ');
				  foreach($carss->result() as $ross){
					  echo $ross->nama;
					  }
				   echo ' '.$row->tgldelete;
				  
				  ?>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
  </div>
              </div>
             