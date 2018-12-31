<?php foreach($cari_detail->result() as $row){
	$id_po_det=$row->id_po_detail;?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $row->id_jadi.' ( '.$row->nama.' ) ';?> <?php echo $qtypo = $row->qty.' '.$row->satuan?>
            <small class="pull-right"></small>
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
              <td><?php echo $rod->nama;?></td>
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
<td>#</td>
</tr>
</thead>
<tbody>
<?php $no2=1; foreach($car2->result() as $rob){
	$dasar=$rob->id_dasar;
	?>
<tr>
<td><?php echo $no2++?></td>
<td><?php echo $rob->nama ?></td>
<td><?php echo $rob->komposisi.' '.$rob->satuan;?></td>
<td><?php echo $rob->komposisi*$qtypo.' '.$rob->satuan;?></td>
<td><?php 
$cariaksi=$this->db->query("SELECT * FROM tab_pengeluaran WHERE dasar='$dasar' AND id_po='$idpo' AND id_po_detail='$id_po_det' AND stts='AKTIF'")->num_rows();
if($cariaksi>0){?>
	<a href="#" onclick="selesai('<?php echo $dasar;?>','<?php echo $idpo;?>','<?php echo $id_po_det?>')" data-toggle="tooltip" title="Klick Jika Selesai"><span class="glyphicon glyphicon-upload btn-lg"></span></a>
	<?php }else{
		echo "Selesai";
		}

?></td>
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
  <?php $carr=$this->db->query("SELECT * FROM tab_pengeluaran WHERE stts='AKTIF' AND id_po='$idpo'")->num_rows(); 
  if($carr==""){?><div class="col-xs-12">
        <form action="<?php echo base_url()?>index.php/admin/cekpo/updatPO" method="post">
        <input type="hidden" name="id_po" value="<?php echo $idpo;?>" />
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit 
          </button>
          </form>
          <?php } ?>
        </div>
      </div>