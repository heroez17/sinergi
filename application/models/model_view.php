<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_view extends CI_model {

	
	public function title()
	{
		$hasil = $this->db->get('app');
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
			$data = array('nama'=>$row->nama,
			              'id'=>$row->id,
			              'alamat'=>$row->alamat,
						  'telpon'=>$row->telpon,
						  'email'=>$row->email,
						  'photo'=>$row->photo,
						   'tentang'=>$row->tentang
						  );
			}
			}else{
				$data = array('nama'=>'NAMA WEB',
				              'id'=>'0',
				           'alamat'=>'Alamat WEB',
						  'telpon'=>'Telephone WEB',
						  'email'=>'Email WEB',
						  'photo'=>'logo.png',
						   'tentang'=>'Tentang WEB');
				
				}
		 
			return $data;
	}
	public function lev()
	{
		$a=$this->session->userdata('user_id');
		$hasil = $this->db->query("SELECT
    tab_menu_master.nama AS nama,
	tab_menu_master.id_menu_master AS id,
	akses.id_user as iduser
FROM
    ibenk_kassir.tab_menu
    INNER JOIN ibenk_kassir.akses 
        ON (tab_menu.id_menu = akses.id_menu)
    INNER JOIN ibenk_kassir.tab_login 
        ON (akses.id_user = tab_login.user_id)
    INNER JOIN ibenk_kassir.tab_menu_master 
        ON (tab_menu_master.id_menu_master = tab_menu.id_menu_master)
WHERE akses.id_user='$a' GROUP BY tab_menu_master.id_menu_master
		");
		
		 
			return $hasil;
			
	}
	
	public function kategori($id){
		$gt="";
		$hasil=$this->db->query("select nama from tab_kategori where id_kategori='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		public function kategori_barang($id){
			
		$hasil=$this->db->query("SELECT
    tab_kategori.nama as nama
FROM
    ibenk_kassir.tab_supplier
    INNER JOIN ibenk_kassir.tab_kategori 
        ON (tab_supplier.id_kategori = tab_kategori.id_kategori)
        WHERE tab_supplier.id_supplier='$id';");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
			
			}
		
		public function getsum($nofak,$tgl,$tgl1){
			$gt="";
		$hasil=$this->db->query("SELECT SUM(qty*harga_jual) AS tot FROM barang_jual WHERE nofak='$nofak' AND tanggal BETWEEN '$tgl' AND '$tgl1'");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}
		public function getsumheader($tgl,$tgl1){
			$gt="";
		$hasil=$this->db->query("SELECT SUM(qty*harga_jual) AS tot FROM barang_jual WHERE nofak!='' AND tanggal BETWEEN '$tgl' AND '$tgl1'");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}
		
			
			public function getrowno($id){
				$hasil=0;
	$hasil=$this->db->query("select no_jual from barang_jual where no_jual='$id'")->num_rows();
		
		return $hasil;
				}
			
		public function baranggdg($id){
			$gt="";
		$hasil=$this->db->query("select nama_barang as nama from barang_gdg where id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		
	public function getnota($id){
			$gt="";
			$fff=str_replace('F','/',$id);
		$gt=$this->db->query("select nofak from barang_jual where nofak='$fff' group by no_jual")->num_rows();
		//foreach($hasil){}
		return $gt;
		}
		
		public function getnotajumlah($id){
			$gt="";
			$sum=0;
			$fff=str_replace('F','/',$id);
		$hasil=$this->db->query("SELECT (harga_jual*qty) AS total FROM barang_jual WHERE nofak='$fff'")->result();
		foreach($hasil as $t){
		   	$sum+=$t->total;
			}
			
		return $sum;
		}
		
		public function barattp($id){
		$hasil=$this->db->query("select nama as nama from barang_gdg_titipan where id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}	
		public function sup_titipan($id){
		$hasil=$this->db->query("select supplier as nama from barang_gdg_titipan where id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}	
		

public function namabarangtitip($id){
		$hasil=$this->db->query("select nama as nama from barang_gdg_titipan where id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}	


    public function supplier_barang($id){
		$gt='';
				$hasil=$this->db->query("SELECT
    tab_supplier.nama AS nama
FROM
    ibenk_kassir.barang_gdg
    INNER JOIN ibenk_kassir.tab_supplier 
        ON (barang_gdg.id_supplier = tab_supplier.id_supplier)
        WHERE barang_gdg.id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;

		}
		
	public function satuan($id){
		$gt="";
		$hasil=$this->db->query("select nama from tab_satuan where id_satuan='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		
		
		public function hitung_pcs($id){
		$gt="";
		$hasil=$this->db->query("SELECT qty_pcs as nama FROM barang_gdg WHERE id_barang='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		
		
		public function satuan_a($id){
		$gt="";
		$hasil=$this->db->query("SELECT
    tab_satuan.nama as nama
FROM
    ibenk_kassir.barang_gdg
    INNER JOIN ibenk_kassir.tab_satuan 
        ON (barang_gdg.id_satuan_gudang = tab_satuan.id_satuan)
        WHERE barang_gdg.id_barang='$id';");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		
		
		public function sp_satuan($id){
		$hasil=$this->db->query("SELECT
   tab_satuan.nama
FROM
    ibenk_kassir.barang_gdg
    INNER JOIN ibenk_kassir.tab_satuan 
        ON (barang_gdg.id_satuan = tab_satuan.id_satuan)
        WHERE barang_gdg.id_barang='$id';");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
					
		public function sptitip_satuan($id){
		$hasil=$this->db->query("SELECT
   tab_satuan.nama
FROM
    ibenk_kassir.barang_gdg_titipan
    INNER JOIN ibenk_kassir.tab_satuan 
        ON (barang_gdg_titipan.satuan = tab_satuan.id_satuan)
        WHERE barang_gdg_titipan.id_barang='$id';");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		public function supplier($id){
		$hasil=$this->db->query("select nama from tab_supplier where id_supplier='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}					
		
		
		public function getkodepesan()
			{
			$dates='PO'.date('Ymd');
			$d = $this->db->query("SELECT MAX(RIGHT(no_faktur,3)) as kd 
			                       FROM barang_gdg_pesan
								   WHERE stts !='PROSES' and no_faktur like '$dates%'
								   limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%03s',$tmp);
				           }
			          }
			else{
				$kode  = 001;
				}
				return 'PO'.date('Ymd').$kode;
			}
			
	public function terima($id){
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty_terima) AS tot
	 FROM 
	barang_gdg_pesan WHERE id_barang='$id' AND stts='TERIMA'
	GROUP BY id_barang");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}
		
		public function stocketalase($id){
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty) AS tot
	 FROM 
	barang_jual WHERE id_barang='$id' AND stts='SELESAI'
	GROUP BY id_barang");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}



public function hitungstockgudang($id){
	$gt='0';
	$tt=0;
		$hasil=$this->db->query("SELECT SUM(qty) AS tot
	 FROM 
	barang_gdg_pesan WHERE id_barang='$id' AND stts='TERIMA'");
		foreach($hasil->result() as $row){
			$jual=$this->db->query("SELECT SUM(qty) AS qty
	 FROM 
	barang_jual WHERE id_barang='$id' AND stts='SELESAI' AND jenis='gudang'");
			foreach($jual->result() as $gt){
				$tt=$gt->qty;
				}
			
			
			$gt=$row->tot-$tt;
			}
		return $gt;
		
	
	}
	
	
	public function jual_gudang($id){
		$gt=0;
		$jual=$this->db->query("SELECT SUM(qty) AS qty
	 FROM 
	barang_jual WHERE id_barang='$id' AND stts='SELESAI' AND jenis='gudang'");
			foreach($jual->result() as $gto){
				$gt=$gto->qty;
				}
				
			return $gt;	
		}


public function hitungmodal($tangal){
		//$gt="L";
		$jual=$this->db->query("SELECT SUM(harga_beli*qty) AS tot FROM barang_gdg_pesan WHERE tanggal LIKE '$tangal%' AND stts='TERIMA'");
			foreach($jual->result() as $gto){
				$gt=$gto->tot;
				if($gt==""){
					$a="0";
					}else{
						$a=$gt;
						}
				}
				
			return $a;	
	
	
	}
	
public function hitungmasukk($tangal){
		//$gt="L";
		$jual=$this->db->query("SELECT SUM(harga_jual*qty) AS tot FROM barang_jual WHERE tanggal LIKE '$tangal%' AND stts='SELESAI'");
			foreach($jual->result() as $gto){
				$gt=$gto->tot;
				if($gt==""){
					$a="0";
					}else{
						$a=$gt;
						}
				}
				
			return $a;	
	
	
	}	


public function hitungstocketalase($id){
	$gt='0';
	$tt=0;
		$hasil=$this->db->query("SELECT SUM(qty_terima) AS tot
	 FROM 
	barang_gdg_pesan WHERE id_barang='$id' AND stts='TERIMA'");
		foreach($hasil->result() as $row){
			$jual=$this->db->query("SELECT SUM(qty) AS qty
	 FROM 
	barang_jual WHERE id_barang='$id' AND stts='SELESAI' AND jenis='pcs'");
			foreach($jual->result() as $gti){
				$tt=$gti->qty;
				}
				
				$er=$this->db->query("SELECT qty_pcs FROM barang_gdg WHERE id_barang='$id'");
			foreach($er->result() as $gto){
				$tti=$gto->qty_pcs;
				}
				
			$a=$row->tot-$tt; //hasil pengurangan dari pcs
			$c=$this->jual_gudang($id)*$tti; // hasil 
			$total=$a-$c;
			$subtotal=$total/$tti;
			$gt=$total;
			
			
			}
		return $gt;
		
	
	}




public function keluar($id){
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty) AS tot
	 FROM 
	barang_gdg_keluar WHERE id_barang='$id' and stts='SELESAI'
	GROUP BY id_barang");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}
		public function keluarisi($id){
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty_isi) AS tot
	 FROM 
	barang_gdg_keluar WHERE id_barang='$id' and stts='SELESAI'
	GROUP BY id_barang");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}

public function stktitipan($id){
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty) AS tot
	 FROM 
	barang_gdg_titipan WHERE id_barang='$id'
	GROUP BY id_barang");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}


public function getkodeKeluar()
			{
				$dates='KO'.date('Ymd');
			$d = $this->db->query("SELECT MAX(RIGHT(no_keluar,3)) as kd 
			                       FROM barang_gdg_keluar
								   WHERE stts !='PROSES' AND no_keluar like '$dates%'
								   limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%03s',$tmp);
				           }
			          }
			else{
				$kode  = 001;
				}
				return 'KO'.date('Ymd').$kode;
			}		
		public function hargagudang($id){
		$gt='0';
		$hasil=$this->db->query("SELECT harga_jual FROM barang_gdg_pesan 
WHERE id_barang='$id' AND stts='TERIMA' ORDER BY no_faktur
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$gt=$row->harga_jual;
			}
		return $gt;
		}
		public function hargagudangbeli($id){
		$gt='0';
		$hasil=$this->db->query("SELECT harga_beli FROM barang_gdg_pesan 
WHERE id_barang='$id' AND stts='TERIMA' ORDER BY no_faktur
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$gt=$row->harga_beli;
			}
		return $gt;
		}
		
		
		public function hrgupdate($id){
			$gt='0';
		$hasil=$this->db->query("SELECT harga_jual FROM barang_gdg_keluar WHERE no_keluar LIKE 'KO%' 
AND id_barang='$id' AND stts='SELESAI' ORDER BY no_keluar DESC LIMIT 1");
		foreach($hasil->result() as $row){
			$gt=$row->harga_jual;
			}
		return $gt;
			
			
			
			}
		
		
		public function qtyisi($id){
		$gt='0';
		$hasil=$this->db->query("SELECT qty_isi,qty FROM barang_gdg_keluar 
WHERE id_barang='$id' AND stts='SELESAI' AND no_keluar like 'KO%' ORDER BY no_keluar
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$gt=$row->qty_isi/$row->qty;
			}
		return $gt;
		}
		
			public function hrgjual($id){
		$gt='0';
		$hasil=$this->db->query("SELECT harga_jual FROM barang_gdg_keluar 
WHERE id_barang='$id' AND stts='SELESAI' AND harga_beli='' ORDER BY no_keluar
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$gt=$row->harga_jual;
			}
		return $gt;
		}
		
		public function idsatuan($id){
		$gt='0';
		$hasil=$this->db->query("SELECT
   tab_satuan.id_satuan
  FROM
    barang_gdg_keluar
    INNER JOIN tab_satuan 
        ON (barang_gdg_keluar.satuan = tab_satuan.id_satuan)
        WHERE barang_gdg_keluar.id_barang='$id' AND barang_gdg_keluar.stts='SELESAI' ORDER BY barang_gdg_keluar.no_keluar
 DESC LIMIT 1
        ;");
		foreach($hasil->result() as $row){
			$gt=$row->id_satuan;
			}
		return $gt;
		}
		
		public function namasatuan($id){
		$gt='0';
		$hasil=$this->db->query("SELECT
   tab_satuan.nama
  FROM
    barang_gdg_keluar
    INNER JOIN tab_satuan 
        ON (barang_gdg_keluar.satuan = tab_satuan.id_satuan)
        WHERE barang_gdg_keluar.id_barang='$id' AND barang_gdg_keluar.stts='SELESAI' ORDER BY barang_gdg_keluar.no_keluar
 DESC LIMIT 1
        ;");
		foreach($hasil->result() as $row){
			$gt=$row->nama;
			}
		return $gt;
		}
		
		
			public function sudahbayar($id){
		$gt=0;
$hasil=$this->db->query("SELECT SUM(nominal) AS nom FROM tab_trans WHERE no_faktur='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nom;
			}
		return $gt;
		}
		
		public function sisabayar($id){
		$gt=0;
$hasil=$this->db->query("SELECT SUM(harga_jual*qty) AS nom FROM barang_jual WHERE nofak='$id'");
		foreach($hasil->result() as $row){
			$gt=$row->nom;
			}
		return $gt;
		}
		
		
		
		
public function getkodeKasir()
			{
				$dates='NT'.date('Ymd');
			$d = $this->db->query("SELECT MAX(RIGHT(no_jual,3)) as kd 
			                       FROM barang_jual
								   WHERE stts !='PROSES' AND no_jual LIKE '$dates%'
								   limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%03s',$tmp);
				           }
			          }
			else{
				$kode  = 001;
				}
				return 'NT'.date('Ymd').$kode;
			}	


public function getkodefaktur()
			{
				$tahun=date('Y');
				$bulan=$this->bulan(date('m'));
				
			$d = $this->db->query("SELECT MAX(LEFT(no_faktur,2)) as kd 
			                       FROM tab_faktur");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%02s',$tmp);
				           }
			          }
			else{
				$kode  = 01;
				}
				return $kode.'/INV/KOP-PTM/'.$bulan.'/'.$tahun;
			}	

			
public function sumproseskasir($id){
	    $dr=$this->model_view->getkodeKasir();
		$user=$user=$this->session->userdata('user_name');
		$gt='0';
		$hasil=$this->db->query("SELECT SUM(qty) AS tot FROM barang_jual WHERE id_barang='$id' AND stts='PROSES' AND no_jual='$dr'
		AND usr_input='$user'
        ;");
		foreach($hasil->result() as $row){
			$gt=$row->tot;
			}
		return $gt;
		}
		
		
		
		
		
public function getkodeterimatitip()
			{
				$dates='TI'.date('Ymd');
			$d = $this->db->query("SELECT MAX(RIGHT(no_terima,3)) as kd 
			                       FROM barang_titipan_datang
								   WHERE stts !='PROSES' AND no_terima like '$dates%'
								   limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%03s',$tmp);
				           }
			          }
			else{
				$kode  = 001;
				}
				return 'TI'.date('Ymd').$kode;
			}
		
public function hargajualtitipan($id){
		$data='0';
		$hasil=$this->db->query("SELECT harga_jual,harga_beli FROM barang_titipan_datang 
WHERE id_barang='$id' ORDER BY no_terima
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$data=$row->harga_jual;
			}
		return $data;
		}
public function hargabelititipan($id){
		$data='0';
		$hasil=$this->db->query("SELECT harga_jual,harga_beli FROM barang_titipan_datang 
WHERE id_barang='$id' ORDER BY no_terima
 DESC LIMIT 1 ");
		foreach($hasil->result() as $row){
			$data=$row->harga_beli;
			}
		return $data;
		}




public function stktitipann($id){
	$gt='0';
	$hasilterjual='0';
		$terjual=$this->db->query("SELECT SUM(qty) AS tot
	 FROM 
	barang_jual WHERE id_barang='$id' AND stts='SELESAI'
	GROUP BY id_barang");
		foreach($terjual->result() as $row){
			$hasilterjual=$row->tot;
			}
			
		$terima=$this->db->query("SELECT SUM(qty) AS tot FROM barang_titipan_datang WHERE id_barang='$id' AND stts='SELESAI' ;
");
		foreach($terima->result() as $row){
			$hasilterima=$row->tot;
			}
			$gt=$hasilterima-$hasilterjual;
		return $gt;
	}



	public function stocksudah($id){
		$gt=0;
		$hasil=$this->db->query("SELECT SUM(qty) AS qty FROM barang_gdg_keluar WHERE no_keluar LIKE 'ks%' AND id_barang='$id' AND stts='SELESAI'
");
		foreach($hasil->result() as $row){
			$gt=$row->qty;
			}
		return $gt;
		}

public function bulan($bul){
	if($bul=="01"){
		$a="I";
		}
	elseif($bul=="02"){
		$a="II";
		}
	elseif($bul=="03"){
		$a="III";
		}		
	elseif($bul=="04"){
		$a="IV";
		}
	elseif($bul=="05"){
		$a="V";
		}
	elseif($bul=="06"){
		$a="VI";
		}
	elseif($bul=="07"){
		$a="VII";
		}
	elseif($bul=="08"){
		$a="VIII";
		}
	elseif($bul=="09"){
		$a="IX";
		}
	elseif($bul=="10"){
		$a="X";
		}
	elseif($bul=="11"){
		$a="XI";
		}
	elseif($bul=="12"){
		$a="XII";
		}
		else{
			$a="Error";
			}
		return $a;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */