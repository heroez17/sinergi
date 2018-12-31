<div class="row">
 <div class="col-xs-12">
          <div class="box">
 <form class="form" action="<?php echo base_url()?>index.php/admin/faktur/simpanedit" method="post" enctype="multipart/form-data">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <?php foreach($data->result() as $row){?>
              <table class="table table-hover">
               
                <tr>
                  <td>Faktur</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" name="no_faktur" value="<?php echo $row->no_faktur?>" /></td>
                   <td>Tanggal</td>
                  <td><input type="text" readonly="readonly" class="form-control col-md-10" nama="tgl" value="<?php echo $row->tgl_order?>" /></td>
               <td>Pelanggan</td>
                  <td><select class="form-control select2" name="pelanggan" id="pelanggan" required>
                  <option value="<?php echo $row->pelanggan;?>"><?php echo $row->cv?></option>
                  <?php $r=$this->db->get("tab_pelanggan");
				  foreach($r->result() as $row){?>
                   <option value="<?php echo $row->nik;?>"><?php echo $row->nama.' || '.$row->jabatan;?></option>
           <?php } ?>
            
             
                              </select></td>
                  
                  <td> 
       <button type="submit" class="btn btn-primary btn-sm">Edit <i class="fa fa-pencil"></i></button>
    </td>

                </tr>
                
               
               
                
              </table>
              <?php } ?>
              
             
              
              
              
            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
 <div class="col-xs-12 lbl">
        
        </div>
        
        
        
      </div>