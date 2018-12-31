<script type="text/javascript">
function checksatuan(){
	var id = $("#qty").val();
	$("#satuan").html(id);
	var stk = $("#valstock").val();
	var a = parseInt(id);
	var b = parseInt(stk);
	if(b<a){
		alert('stock tidak cukup');
		$("#qty").val("");
		}
	
	}
	
function cekdist(){
	var id = $("#qty_isi").val();
	$("#dis").html(id);
	}	
function stn(){
	var id = $("#id_satuan").val();
	var harga_asli = $("#harga_asli").val();
	var qty = $("#qty").val();
		var qty_isi = $("#qty_isi").val();
	
	$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/barang_gdg/cekajaxsatuan')?>",
                        data: 'id='+id, 
						
                        success: function(msg){
							$("#satuan_cnv").html(msg);
	                              
							var hasil=parseInt(qty)*parseInt(qty_isi);
							var hasilmodal=parseInt(harga_asli)/parseInt(qty_isi);
		$("#total").html('Total Distribusi :'+hasil+' '+msg);	
		$("#hitung").html('Modal : '+harga_asli+' / '+qty_isi+' = '+hasilmodal.toFixed(2));		
							}
							
                    });
	
	
		
	}
	
</script>
<form method="post" action="<?php echo base_url()?>index.php/admin/barang_gdg/simpan_keluar">

<?php 
				$no=1;
				$notext=1;
				$noqty=1;
				$nojual=1;
				$nobeli=1;
				$noidbarang=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>


              
             
              
              
               <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group col-xs-2">
                  <label for="exampleInputEmail1">Id / Nama</label>
                  <input type="hidden" class="form-control input-sm " value="<?php echo $row->id_barang?>" name="id_barang">
                  <input type="text" class="form-control input-sm " value="<?php echo $row->id_barang.' / '.$row->nama_barang;?>" id="exampleInputEmail1" readonly="readonly" placeholder="">
                </div>
                <div class="form-group col-xs-2">
                  <label for="exampleInputEmail1">Harga / Satuan</label>
                  <input type="hidden" value="<?php echo $this->model_view->hargagudang($row->id_barang)?>" id="harga_asli">
                  <input type="text" class="form-control input-sm " value="<?php echo number_format($this->model_view->hargagudang($row->id_barang)).' / '.$this->model_view->satuan($row->id_satuan);;?>" id="exampleInputEmail1" readonly="readonly" placeholder="">
                </div>
                <div class="form-group col-xs-2">
                  <label for="exampleInputEmail1">Stock Gudang</label>
                  <input type="text" class="form-control input-sm " value="<?php echo $this->model_view->terima($row->id_barang)-$this->model_view->keluar($row->id_barang).' '.$this->model_view->satuan($row->id_satuan);; ?>" id="exampleInputEmail1" readonly="readonly" placeholder="">
                  <input type="hidden" id="valstock" value="<?php echo $this->model_view->terima($row->id_barang)-$this->model_view->keluar($row->id_barang);?>" />
                </div>
                <div class="form-group col-xs-2">
                  <label for="exampleInputPassword1">Qty Keluar</label>
                  <input type="text" name="qty" required class="form-control input-sm" onkeyup="checksatuan()" id="qty" placeholder="">
                </div>
                <div class="form-group col-xs-2">
                  <label for="exampleInputPassword1">Jumlah Distribusi</label>
                  <input type="text" class="form-control input-sm" required onkeyup="cekdist()" name="qty_isi"
                  value="<?php echo $this->model_view->qtyisi($row->id_barang);?>" id="qty_isi" placeholder="">
                </div>
                <div class="form-group col-xs-2">
                  <label for="exampleInputPassword1">Satuan Distribusi</label>
                 <select class="form-control select2" name="id_satuan" onchange="stn()" required id="id_satuan">
      <option value="<?php echo $this->model_view->idsatuan($row->id_barang);?>"><?php echo $this->model_view->namasatuan($row->id_barang);?></option>
      <?php $r=$this->db->get('tab_satuan');
	  foreach($r->result() as $rw){?>
      <option value="<?php echo $rw->id_satuan?>"><?php echo $rw->nama?></option>
      <?php } ?>
      </select>
                </div>
               
                
              </div>
             <div class="box-body">
                <div class="form-group col-xs-2">
                 <label for="exampleInputPassword1">Harga Jual Distribusi</label>
                  <input type="text" class="form-control input-sm" value="<?php echo $this->model_view->hrgjual($row->id_barang);?>" id="exampleInputEmail1" name="harga_jual" placeholder="" required>
                </div>
                <div class="form-group col-xs-6">
                 <label for="exampleInputPassword1">Jumlah Keluar : <i id="satuan"></i> <?php echo $this->model_view->satuan($row->id_satuan);?> </label>
                 <br />
                 <label for="exampleInputPassword1">Jumlah Distribusi : 1 <?php echo $this->model_view->satuan($row->id_satuan);?> = <i id="dis"></i> <i id="satuan_cnv"></i></label>
                 <br />
                  <label for="exampleInputPassword1" id="total"></label>
                  <br />
                  <label for="exampleInputPassword1" id="hitung"></label>
                </div>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
              
              
               </form>
               
                <?php }}?>