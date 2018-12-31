
      
      
       <div class="col-xs-11">
             
 <select class="form-control select1 input-sm" id="id_dasar" name="id_dasar" required>
 <option value=""></option>
 <?php $this->db->where('stts','AKTIF');
 $sat=$this->db->get('tab_jadi');
 foreach($sat->result() as $row){
 ?>
 <option value="<?php echo $row->id_jadi;?>"><?php echo $row->nama;?></option>
 <?php } ?>
 </select>
 </div>
<div class="pull-right box-tools">
               
                <button type="button" onclick="simpanDetail()" class="btn btn-success btn-sm" data-toggle="tooltip" title="Simpan">
                  Simpan</button>
              </div>     