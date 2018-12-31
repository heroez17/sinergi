<script type="text/javascript">
function keluar_jadi(a,b,c,d){
	var id_po = a;
	var qty = d;
	var id_po_detail = b;
	var id_jadi = c;
		$.ajax({
                        type: "POST",
                        url : "<?php echo base_url('index.php/admin/stock/keluar_jadi')?>",
                        data: 'id_po='+id_po+'&id_po_detail='+id_po_detail+'&id_v='+id_jadi+'&qty='+qty, 
						beforeSend : function(){
							
							$('#reload1').html('<h1  align="center"><i class="fa fa-spin fa-refresh"></i></h1>');},
                        success: function(msg){
							
									$('#reload1').html(msg);
	                              
									
							}
							
                    });
					
		
		};
		</script>
<div id="reload1">
 <form action="<?php echo base_url()?>index.php/admin/stock/po_keluar" method="post">
<?php
foreach($cari_detail->result() as $row){?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $row->id_jadi.' ( '.$row->nama.' ) ';?> <?php echo $qtypo = $row->qty.' '.$row->satuan?>
          <small class="pull-right">
          <?php $f=$this->db->query("SELECT * FROM tab_pengeluaran_jadi WHERE id_po='$idpo'
		                           AND id_po_detail='$row->id_po_detail' AND id='$row->id_jadi' LIMIT 1")->num_rows();
		  if($f>0){?>
			 <a data-toggle="tooltip" onclick="keluar_jadi('<?php echo $idpo;?>','<?php echo $row->id_po_detail?>','<?php echo $row->id_jadi?>','<?php echo $row->qty?>')" title="Cancel" class="btn btn-social-icon btn-google btn-sm"><i class="fa fa-refresh"></i></a>
			 <?php  }else{
		  ?>
          
          <a data-toggle="tooltip" onclick="keluar_jadi('<?php echo $idpo;?>','<?php echo $row->id_po_detail?>','<?php echo $row->id_jadi?>','<?php echo $row->qty?>')" title="Ambil Bahan Jadi" class="btn btn-social-icon btn-primary btn-sm"><i class="fa fa-shopping-cart"></i></a>
           <?php } ?>
         </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Detail Bahan Dasar</th>
            </tr>
            </thead>
            <tbody>
            <?php $car1=$this->db->query("SELECT
    tab_set_jadi.nama
	, tab_set_jadi.id_set_jadi
    , tab_satuan.nama AS satuan
    , tab_set_jadi.satuan_komposisi AS komposis
FROM
    ibenk_pantri.tab_set_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_set_jadi.satuan = tab_satuan.id_satuan) WHERE tab_set_jadi.jadi='$row->id_jadi';");
		$no1=1;
		foreach($car1->result() as $rod){
		?>
            <tr>
              <td><?php echo $no1++?></td>
              <td><?php echo $rod->nama;?>
             </td>
              <td><?php $car2=$this->db->query("SELECT
    tab_dasar.nama
	,tab_mix.qty as komposisi
    , tab_mix.id_dasar
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
      WHERE tab_mix.id_set_jadi='$rod->id_set_jadi' AND tab_mix.stts='AKTIF'        
");?>
<table class="table table-striped">
<thead>
<tr>
<td>No</td>
<td>Bahan Dasar</td>
<td>Satuan Komposisi</td>
<td>Total</td>

</tr>
</thead>
<tbody>
<?php $no2=1; foreach($car2->result() as $rob){?>
<tr>
<td><?php echo $no2++?></td>
<td><?php echo $rob->nama ?></td>
<td><?php echo $rob->komposisi.' '.$rob->satuan;?></td>
<td><?php echo $rob->komposisi*$qtypo.' '.$rob->satuan;?></td>

<?php } ?>
</tr>
</tbody>
</table>
</td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      
    </section>
    <?php } ?>
  <div class="row no-print">
        <div class="col-xs-12">
       
        <input type="hidden" name="id_po" value="<?php echo $idpo;?>" />
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit 
          </button>
       
          
        </div>
      </div>
         </form>
         
         </div>