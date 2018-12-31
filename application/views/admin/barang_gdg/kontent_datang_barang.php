<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     <small>  <a href="<?php echo base_url()?>index.php/admin/barang_gdg/pesan" class="btn btn-primary" ><i class="fa fa-plus" ></i> Kembali</a></small>
        
       
     
      
    </section>
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID 
                  </th>
                  <th>TANGGAL</th>
                  <th>DETAIL</th>
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
                  <td><?php echo $id=$row->no_faktur;?></td>
                  <td><?php echo $row->tanggal ?></td>
                  <td><table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
				  $nl=1;
				  $sum=0;
				   $g=$this->db->query("select * from barang_gdg_pesan where no_faktur='$id'");
				  foreach($g->result() as $kj){ ?>
                  <tr>
                  <td><?php echo $nl++?></td>
                  <td><?php echo $kj->id_barang.' / '.$this->model_view->baranggdg($kj->id_barang)?></td>
                  <td><?php echo $kj->qty.' '.$this->model_view->satuan_a($kj->id_barang)?></td>
                  <td><?php echo str_replace(',','.',number_format($kj->harga_beli));?></td>
                  <td><?php $tot = $kj->qty*$kj->harga_beli;
				   echo str_replace(',','.',number_format($tot));
				  ?></td>
                  </tr>
                  <?php $sum+=$tot;}?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <td align="left" colspan="4">Total
                  </td>
                  <td><?php echo str_replace(',','.',number_format($sum));?></td>
                  </tr>
                  </tfoot>
                  
                  </table></td>
                  <td>
                   <span>
            <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->no_faktur;?>"
             data-nama_pr2="<?php echo $row->no_faktur;?>" 
             ></a> 
            </span>||</span>
            <a target="_blank" href="<?php echo base_url()?>index.php/admin/barang_gdg/prt_faktur/<?php echo $row->no_faktur?>" class="glyphicon glyphicon-print edit-personil"
           
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
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE KEDATANGAN BARANG !!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/admin/barang_gdg/delete_datang" method="post" enctype="multipart/form-data">
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">FILTER DATA BARANG</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form role="form" target="_blank" action="<?php echo base_url()?>index.php/admin/barang_gdg/prt" method="post" enctype="multipart/form-data">
              <div class="box-body">
               
                <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Kategori</label>
      <select class="form-control" name="id_kategori">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php $r=$this->db->get('tab_kategori');
	  foreach($r->result() as $row){?>
      <option value="<?php echo $row->id_kategori?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                
                
                 <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Satuan Besar</label>
      <select class="form-control" name="id_satuan_gudang">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php 
	  $ri=$this->db->get('tab_satuan');
	  foreach($ri->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                
                
                 <div class="form-group">
                 
               
                  <label for="exampleInputEmail1">Satuan Kecil</label>
      <select class="form-control" name="id_satuan_pcs">
      <option value="<?php //echo $id_kategori?>"><?php //echo $nama_kategori?></option>
      <?php 
	  $ri=$this->db->get('tab_satuan');
	  foreach($ri->result() as $row){?>
      <option value="<?php echo $row->id_satuan?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
                
          
       
                </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Supplier</label>
      <select class="form-control" name="id_supplier">
      <option value="<?php //echo $id_supplier?>"><?php // echo $nama_su?></option>
      <?php $ro=$this->db->get('tab_supplier');
	  foreach($ro->result() as $row){?>
      <option value="<?php echo $row->id_supplier?>"><?php echo $row->nama?></option>
      <?php } ?>
      </select>
      </div>
      
      <div class="form-group">
               
                  <label for="exampleInputEmail1">Status</label>
      <select class="form-control" name="stts">
      <option value="<?php //echo $stts?>"><?php //echo $stts?></option>
      <option value="Aktif">Aktif</option>
      <option value="Tidak">Tidak</option>
     
      </select>
       
       </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Print</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
       
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>