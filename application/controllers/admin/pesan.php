<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Pesan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->ceksession('barang_gdg');
		}
	public function index()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA BARANG";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->get('barang_gdg');
		
		$isi['kontent'] = "admin/barang_gdg/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	public function cek_datang()
	{   
	
	    $tgl=$this->input->post('tgl');
		$tgl2=$this->input->post('tgl2');
		 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA KEDATANGAN BARANG TGL ".$tgl.' S/D '.$tgl2;
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$tgl=$this->input->post('tgl');
		$tgl2=$this->input->post('tgl2');
		$isi['data'] = $this->db->query('SELECT * FROM barang_gdg_pesan WHERE stts="TERIMA" AND tanggal BETWEEN "'.$tgl.'" AND "'.$tgl2.'" GROUP BY no_faktur DESC');
		
		$isi['kontent'] = "admin/barang_gdg/kontent_datang_barang";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	public function stk()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "STOCK BARANG";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->get('barang_gdg');
		
		$isi['kontent'] = "admin/barang_gdg/kontent_stock";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function pesan()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "KEDATANGAN BARANG";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['no_faktur'] = $this->model_view->getkodepesan();
		$isi['data']=$this->db->query('select * from barang_gdg_pesan where no_faktur="'.$this->model_view->getkodepesan().'"');
		
		$isi['kontent'] = "admin/barang_gdg/form_pesan";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function tambah($id)
	{   
	
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$f = $this->db->query("SELECT * from barang_gdg where id_barang='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT BARANG GUDANG";
			foreach($f->result() as $rw){
								$isi['id_barang']=$rw->id_barang;
								$isi['dis']='readonly="readonly"';
								$isi['id_satuan']=$rw->id_satuan;
								$isi['id_kategori']=$rw->id_kategori;
								$t=$this->db->query("select nama from tab_satuan where id_satuan='$rw->id_satuan'");
								foreach($t->result() as $rt){
									$isi['nama_s']=$rt->nama;
									}

$l=$this->db->query("select nama from tab_kategori where id_kategori='$rw->id_kategori'");
								foreach($l->result() as $rt){
									$isi['nama_kategori']=$rt->nama;
									}
									
	$m=$this->db->query("select nama from tab_satuan where id_satuan='$rw->id_satuan_gudang'");
								foreach($m->result() as $rt){
									$isi['nama_satuan_gudang']=$rt->nama;
									}								
                               $isi['id_satuan_gudang']=$rw->id_satuan_gudang;
							   
							   	$k=$this->db->query("select nama from tab_satuan where id_satuan='$rw->id_satuan_pcs'");
								foreach($k->result() as $rt){
									$isi['nama_satuan_pcs']=$rt->nama;
									}								
                               $isi['id_satuan_pcs']=$rw->id_satuan_pcs;
							   $isi['qty_pcs']=$rw->qty_pcs;
							    $isi['harga_beli']=str_replace(',','.',number_format($rw->harga_beli));
								$isi['harga_jual_gudang']=str_replace(',','.',number_format($rw->harga_jual_gudang));
								$isi['harga_jual_pcs']=str_replace(',','.',number_format($rw->harga_jual_pcs));
							   
							   
							   
								$isi['nama']=$rw->nama_barang;
								
								$isi['stts']=$rw->stts;
								
								$isi['id_supplier']=$rw->id_supplier;
								$it=$this->db->query("select nama from tab_supplier where id_supplier='$rw->id_supplier' and stts='AKTIF'");
								foreach($it->result() as $rto){
									$isi['nama_su']=$rto->nama;
									}
								
								}
		}else{
			$isi['home_nav1'] = "TAMBAH BARANG GUDANG";
			                    $isi['id_barang']="";
								 $isi['qty_pcs']="";
								 $isi['harga_jual_gudang']="";
								  $isi['harga_jual_pcs']="";
								  $isi['id_kategori']="";
								 $isi['nama_kategori']="";
								 $isi['nama_satuan_gudang']="";
								  $isi['harga_beli']="";
								$isi['id_satuan']="";
								$isi['id_satuan_pcs']="";
								$isi['nama_satuan_pcs']="";
								$isi['dis']='';
								$isi['nama']="";
								$isi['stts']="";
								$isi['id_supplier']="";
								$isi['nama_su']="";
								$isi['stts']="";
								$isi['nama_s']="";
								$isi['phone']="";
								$isi['email']="";
								}
		
	   $isi['kontent'] = "admin/barang_gdg/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_barang');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	id_barang => $this->input->post('id_barang'),
	id_satuan_gudang => $this->input->post('id_satuan_gudang'),
	nama_barang =>$this->input->post('nama'),
	id_supplier =>$this->input->post('id_supplier'),
	id_kategori =>$this->input->post('id_kategori'),
	id_satuan_pcs =>$this->input->post('id_satuan_pcs'),
	harga_beli =>str_replace('.','',$this->input->post('harga_beli')),
	harga_jual_gudang =>str_replace('.','',$this->input->post('harga_jual_gudang')),
	harga_jual_pcs =>str_replace('.','',$this->input->post('harga_jual_pcs')),
	qty_pcs =>$this->input->post('qty_pcs'),
	  
	
	stts =>$this->input->post('stts')
	);
	
	
		$t=$this->db->query('select id_barang from barang_gdg where id_barang="'.$nok.'"')->num_rows();
	if($t>0){
		$this->db->where('id_barang',$nok);
		$this->db->update('barang_gdg',$data);
		$this->session->set_flashdata('info','Data Sukses Di Edit');
		}else{
		$this->db->insert('barang_gdg',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}
		
		
		
			

	redirect('admin/pesan');
		
		}
	
	}
	
	public function delete()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM barang_gdg WHERE id_barang="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/pesan');
		}else{
			redirect('admin/pesan');
			}
	}


public function delete_datang()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM barang_gdg_pesan WHERE no_faktur="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/pesan');
		}else{
			redirect('admin/pesan');
			}
	}



	public function updatekaryawan()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.barang_gdg 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/pesan');
	}else{
		redirect('admin/pesan');
		
		}
	
	}
	public function ck(){
		$a=$this->input->post('id_barang');
		$t=$this->db->query('select id_barang from barang_gdg where id_barang="'.$a.'"')->num_rows();
		$o=$this->db->query('select id_barang from barang_gdg_titipan where id_barang="'.$a.'"')->num_rows();
		echo $t+$o;
		}
		public function pesanck(){
		$a=$this->input->post('id_supplier');
		$isi['no_faktur']=$this->input->post('no_faktur');
		$isi['id_supplier']=$this->input->post('id_supplier');
		$isi['data']=$this->db->query("SELECT * FROM barang_gdg WHERE id_supplier='$a'");
		$isi['jmlh']=$this->db->query("SELECT * FROM barang_gdg WHERE id_supplier='$a'")->num_rows();
		$this->load->view('admin/barang_gdg/form_pesan_aksi',$isi);
		}
		
		
		public function keluarck(){
		$a=$this->input->post('id_supplier');
		$isi['no_faktur']=$this->input->post('no_faktur');
		$isi['id_supplier']=$this->input->post('id_supplier');
		$isi['data']=$this->db->query("SELECT * FROM barang_gdg WHERE id_barang='$a'");
		$isi['jmlh']=$this->db->query("SELECT * FROM barang_gdg WHERE id_barang='$a'")->num_rows();
		$this->load->view('admin/barang_gdg/form_keluar_aksi',$isi);
		}


	public function simpan_pesan()
	{
		
		$id_supplier=$this->input->post('id_supplier');
		$user = $this->session->userdata('user_name');
		$no_faktur=$this->input->post('no_faktur');
		$jmlh=$this->input->post('jmlh');
		for($i=1;$i<=$jmlh;$i++){
			$tanggal=date('Y-m-d');
			$id_barang=$this->input->post('id_barang'.$i);
			$harga_beli=str_replace('.','',$this->input->post('beli'.$i));
			$harga_jual=str_replace('.','',$this->input->post('jual'.$i));
			$qty=$this->input->post('qty'.$i);
			$qty_pcs=$this->model_view->hitung_pcs($id_barang)*$qty;
				$this->db->query("INSERT INTO barang_gdg_pesan 
	VALUES
	('$no_faktur', 
	'$tanggal', 
	'$id_barang', 
	'$harga_beli', 
	'$harga_jual', 
	'$qty',
	'$qty_pcs', 
	'PROSES',
	'',
	'$user',
	''
	);");
	
			}
		$this->db->query("delete from barang_gdg_pesan where qty=''");
	redirect("admin/pesan");
	
	}

public function delete_pesan($id){
	$this->db->query("delete from barang_gdg_pesan where id_barang='$id' and stts='PROSES'");
	redirect("admin/barang_gdg/pesan");
	}
public function delete_keluar($id){
	$this->db->query("delete from barang_gdg_keluar where id_barang='$id' and stts='PROSES'");
	redirect("admin/barang_gdg/keluar");
	}
public function kirim_pesan($id){
	$this->db->query("update barang_gdg_pesan set stts='TERIMA' where no_faktur='$id'");
	$this->session->set_flashdata('info','Pemesanan Sukses Di kirim');
	redirect("admin/barang_gdg/pesan");
	}
	public function kirim_keluar($id){
	$this->db->query("update barang_gdg_keluar set stts='SELESAI' where no_keluar='$id'");
	$this->session->set_flashdata('info','Sukses Di Keluarkan');
	redirect("admin/barang_gdg");
	}
	
	public function terima(){
		
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PENERIMAAN BARANG GUDANG";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data']=$this->db->query('select * from barang_gdg_pesan where stts="KIRIM" group by no_faktur DESC');
		
		$isi['kontent'] = "admin/barang_gdg/form_terima";
		$this->load->view('admin/tampilan_home',$isi);
		
		}
		public function terima_delete($id){
			$this->db->query("delete from barang_gdg_pesan where no_faktur='$id'");
			$this->session->set_flashdata('info','Pemesanan Sukses Di Delete');
			redirect("admin/barang_gdg/terima");
			}
	public function lihat(){
		
		$a=$this->input->post('no_faktur');
		$isi['no_faktur']=$this->input->post('no_faktur');
		$isi['id_supplier']=$this->input->post('id_supplier');
		$isi['data']=$this->db->query("SELECT * FROM barang_gdg_pesan WHERE no_faktur='$a'");
		$isi['jmlh']=$this->db->query("SELECT * FROM barang_gdg_pesan WHERE no_faktur='$a'")->num_rows();
		$this->load->view('admin/barang_gdg/form_terima_aksi',$isi);
		
		}
		public function terima_pesan(){
			
		$no_faktur=$this->input->post('no_faktur');
		$user = $this->session->userdata('user_name');
		$jmlh=$this->input->post('jumlah');
		for($i=1;$i<=$jmlh;$i++){
			$tanggal=date('Y-m-d');
			$id_barang=$this->input->post('id_barang'.$i);
			$qty_terima=$this->input->post('qty_terima'.$i);
			$this->db->query("UPDATE barang_gdg_pesan 
	SET 
	qty_terima = '$qty_terima' , 
	stts = 'TERIMA',
	tanggal_terima='$tanggal',
	usr_trm='$user'
	
	WHERE
	no_faktur = '$no_faktur' AND id_barang='$id_barang'");
	
			}
		
	redirect("admin/barang_gdg/terima");
			
			}
	public function keluar()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PENGELUARAN BARANG GUDANG";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['no_faktur'] = $this->model_view->getkodeKeluar();
		$isi['data']=$this->db->query('select * from barang_gdg_keluar where no_keluar="'.$this->model_view->getkodeKeluar().'"');
		
		$isi['kontent'] = "admin/barang_gdg/form_keluar";
		$this->load->view('admin/tampilan_home',$isi);
		
	}	
	
	public function cekajaxsatuan(){
		$id=$this->input->post('id');
		$this->db->where("id_satuan",$id);
		$a=$this->db->get('tab_satuan')->result();
		foreach($a as $row){
			echo $row->nama;
			}
		}	
	public function simpan_keluar(){
		$no_keluar=$this->model_view->getkodeKeluar();
		$tanggla=date("Y-m-d");
		$user = $this->session->userdata('user_name');
		$id_barang=$this->input->post('id_barang');
		$harga_jual=$this->input->post('harga_jual');
		$qty=$this->input->post('qty');
		$satuan=$this->input->post('id_satuan');
		$qty_isi=$this->input->post('qty_isi')*$qty;
		
		$this->db->query("INSERT INTO barang_gdg_keluar 
	VALUES
	('$no_keluar', 
	'$tanggla', 
	'$id_barang', 
	'', 
	'$harga_jual', 
	'$qty', 
	'$qty_isi', 
	'PROSES',
	'$satuan',
	'$user'
	);");
		redirect('admin/barang_gdg/keluar');
		}		
		
		public function prt(){
$data['pro']=$this->model_view->title();
			$id_kategori=$this->input->post('id_kategori');
			$id_satuan_gudang=$this->input->post('id_satuan_gudang');
			$id_satuan_pcs=$this->input->post('id_satuan_pcs');
			$status=$this->input->post('stts');
			$id_supplier=$this->input->post('id_supplier');
			$data['data']=$this->db->query("SELECT * FROM barang_gdg WHERE 
    id_kategori LIKE '$id_kategori%'
    AND id_satuan_gudang LIKE '$id_satuan_gudang%'
    AND id_satuan_pcs LIKE '$id_satuan_pcs%'
    AND stts LIKE '$status%'
    AND id_supplier LIKE '$id_supplier%'");
			$this->load->view('admin/barang_gdg/print',$data);
			}
			
			public function prt_faktur($id){
				$data['pro']=$this->model_view->title();
			$data['id']=$id;
			$data['data']=$this->db->query("SELECT * FROM barang_gdg_pesan WHERE no_faktur='$id'");
			$this->load->view('admin/barang_gdg/print_faktur',$data);
			}
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */