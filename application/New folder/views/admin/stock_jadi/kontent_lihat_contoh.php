<?php 
 echo "UPDATE tab_po set stts='PRODUKSI' where id_po='$idpo'";
foreach($cari_detail->result() as $row){
	$userinput=$this->session->userdata('nip');
	$tglinput=date('Y-m-d');
			
			 echo '<p></p>';
            $qtypo = $row->qty;
        $car1=$this->db->query("SELECT
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
		  $car2=$this->db->query("SELECT
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

<?php $no2=1; foreach($car2->result() as $rob){
	$qtykeluar=$rob->komposisi*$qtypo;
 echo 
"INSERT INTO ibenk_pantri.tab_pengeluaran VALUES
	('', 
	'$userinput', 
	'$tglinput', 
	'', 
	'', 
	'', 
	'$rob->id_dasar', 
	'$qtykeluar', 
	'AKTIF', 
	'$idpo'
	)";
	echo '<p></p>';
 }  }  } ?>
 