<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
function edittt(aa){
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/faktur/dit')?>",
                        data: 'aa='+aa, 
						beforeSend : function(){
							
							$('#muncul').html('<i class="fa fa-spin fa-refresh"></i>');},
                        success: function(msg){
							
							$('#muncul').html(msg);
								
	                              
									
							}
							
                    });
	
	
	}
</script>


<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a href="<?php echo base_url()?>index.php/admin/faktur/tambah/0" class="btn btn-primary" ><i class="fa fa-plus" ></i> Tambah</a></small>
        
     
     
      
    </section>
    <section class="content">
   <div id="muncul">
   </div>
    
<div class="box">
     <div class="box-body table-responsive">
           
            
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NO FAKTUR 
                  </th>
                  <th>NAMA</th>
                  <th>KETUA ROMBONG</th>
                  <th>TGL ORDER</th>
                  <th>JMLH NOTA</th>
                  <th>NOMINAL</th>
                  <th>STATUS</th>
                  
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
                  <td><?php echo $row->no_faktur;?></td>
                  <td><?php echo $row->cv ?></td>
                  <td><?php echo $row->ketua ?></td>
                  <td><?php echo $row->tgl_order ?></td>
                  <td><?php echo $this->model_view->getnota(str_replace('/','F',$row->no_faktur));?></td>
                  <td><?php echo number_format($this->model_view->getnotajumlah(str_replace('/','F',$row->no_faktur)));?></td>
                  <td><?php echo $status=$row->stts ?></td>
                  <td>
                   <span>
     <?php if($status=="KREDIT"){?>
          <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->no_faktur;?>"
             data-nama_pr2="<?php echo $row->cv;?>" 
             ></a> 
            </span>
            <span>
            <a href="#" class="glyphicon glyphicon-pencil" onclick="edittt('<?php echo $row->no_faktur;?>')"></a>
            
            </span>
            <span>
            <a href="<?php echo base_url()?>index.php/admin/barang_etls/kasir/<?php echo str_replace('/','F',$row->no_faktur);?>" title="nota" class="fa fa-folder"></a>
            
            </span>
            <?php } ?>
            <span>
            <a href="<?php echo base_url()?>index.php/admin/faktur/index_faktur/<?php echo str_replace('/','F',$row->no_faktur);?>" title="nota" class="fa fa-clock-o"></a>
            
            </span>
            
              
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

      <!-- Button trigger modal -->

<!-- Modal tambah dokter-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA faktur</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/admin/faktur/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="p_nama" class="form-control" placeholder="Nama" required>
                  
                </div>
                
                

                <div class="form-group">
                  <label for="exampleInputEmail1">DEPARTEMENT</label>
                  <select class="form-control" name="p_pangkat" id="p_pangkat" required>
            <option value="MARKETING">MARKETING</option>
            <option value="PURCHASING">PURCHASING</option>
            <option value="PPIC">PPIC</option>
             <option value="IT">IT</option>
             <option value="PABRIK">PABRIK</option>
             <option value="GA">GA</option>
              <option value="PERSONLIA">PERSONLIA</option>
              <option value="GUDANG">GUDANG</option>
              <option value="SECURITY">SECURITY</option>
             
                              </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">JABATAN</label>
                  <select class="form-control" name="p_nip" id="p_nip" required>
                   <option value="MANAGER">MANAGER</option>
                   <option value="STAFF">STAFF</option>
                   <option value="OPERATOR PRODUKSI">OPERATOR PRODUKSI</option>
                   <option value="KOMANDAN SECURITY">KOMANDAN SECURITY</option>
                   <option value="SECURITY">SECURITY</option>
            
             
                              </select>
                </div>

                
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>
</div>

<!-- Modal edit dokter-->


<div class="modal fade" id="editt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT DATA FAKTUR</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/faktur/updatefaktur" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                
                <div class="form-group">
                  <input type="hidden" name="lokasi2" value="Lokasi" />
        
                <label>No Faktur</label>
                 <input type="text" readonly="readonly" name="no_faktur1" id="no_faktur1" class="form-control" required="required" />
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">PELANGGAN</label>
                  <select class="form-control select2" id="nama1" name="pelanggan"  required>
                  <option value="" ></option>
                  <?php $r=$this->db->get("tab_pelanggan");
				  foreach($r->result() as $row){?>
                   <option value="<?php echo $row->nik;?>"><?php echo $row->nama.' || '.$row->jabatan;?></option>
           <?php } ?>
            
             
                              </select>
                </div>

                
                
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>

      
      
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color:red" id="myModalLabel">DATA FAKTUR AKAN TERHAPUS, TERMASUK DATA KREDIT YANG SUDAH DI MASUKAN!!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/faktur/deletefaktur" method="post" enctype="multipart/form-data">
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
