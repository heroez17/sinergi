<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Pembelian extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		}
	public function index()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA PEMBELIAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_pembelian');
		$isi['kontent'] = "admin/pembelian/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function saveheader(){
		      $user=$this->session->userdata('nip');
			  $tgl=date('Y-m-d');
			  $stts = "PROSES";
			  $alasan = $this->input->post('id');
			  $id='NT'.date('ymdhis');
			  $this->db->query("
INSERT INTO ibenk_pantri.tab_pembelian 
	VALUES
	('$id', 
	'$user', 
	'', 
	'$tgl', 
	'', 
	'', 
	'', 
	'$stts', 
	'$alasan'
	)
");
        $data['cari']=$this->db->query("select * from tab_pembelian where id_pembelian='$id'");
$data['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id.'" and stts!="NONAKTIF"');
		$this->load->view('admin/pembelian/kontent_table',$data);
		
		}
	public function buka_form(){
		$data['id'] = $this->input->post('id');
		$this->load->view('admin/pembelian/form',$data);
		}
		public function pilih_pemasok(){
		$id = $this->input->post('id');
		$carisatuan=$this->db->query('SELECT
       tab_dasar.id_dasar
    , tab_pemasok.id_pemasok
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_pemasok_detail 
        ON (tab_dasar.id_dasar = tab_pemasok_detail.id_dasar)
    INNER JOIN ibenk_pantri.tab_pemasok 
        ON (tab_pemasok_detail.id_pemasok = tab_pemasok.id_pemasok)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_satuan.id_satuan = tab_dasar.satuan) WHERE tab_dasar.id_dasar="'.$id.'" GROUP BY tab_satuan.nama ASC');
		foreach($carisatuan->result() as $row){
			$data['satuan']=$row->satuan;
			}
		$data['cari']=$this->db->query('SELECT
    tab_pemasok.nama AS pemasok
    , tab_dasar.id_dasar
    , tab_pemasok.id_pemasok
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_pemasok_detail 
        ON (tab_dasar.id_dasar = tab_pemasok_detail.id_dasar)
    INNER JOIN ibenk_pantri.tab_pemasok 
        ON (tab_pemasok_detail.id_pemasok = tab_pemasok.id_pemasok) WHERE tab_dasar.id_dasar="'.$id.'";');
		$this->load->view('admin/pembelian/page_pemasok',$data);
		}
		
		public function simpanDetail(){
			$user=$this->session->userdata('nip');
			  $tgl=date('Y-m-d');
			$id_pembelian = $this->input->post('id');
			$id_dasar = $this->input->post('id_dasar');
			$id_pemasok = $this->input->post('id_pemasok');
			$harga = $this->input->post('harga');
			$qty = $this->input->post('qty');
			
            $this->db->query("
INSERT INTO ibenk_pantri.tab_pembelian_detail 
	VALUES
	('$id_pembelian', '', '$user','$tgl', '', '', '', '$id_dasar', '$qty', '$harga', 
	'AKTIF',
	'$id_pemasok'
	);
");
			
$data['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id_pembelian.'" and stts!="NONAKTIF"');
$this->load->view('admin/pembelian/table',$data);
			}
			
			
public function CanceDetail(){
	
			$user=$this->session->userdata('nip');
			  $tgl=date('Y-m-d');
			$id_detail = $this->input->post('id_detail');
			$id_pembelian = $this->input->post('id_pembelian');
			
            $this->db->query("UPDATE tab_pembelian_detail set stts='NONAKTIF',userdelete='$user',tgldelete='$tgl' where id_pembelian_detail='$id_detail'");
			
$data['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id_pembelian.'" and stts!="NONAKTIF"');
$this->load->view('admin/pembelian/table',$data);
			}
	public function CanceDetail_all(){
	
			$user=$this->session->userdata('nip');
			  $tgl=date('Y-m-d');
			
			$id_pembelian = $this->input->post('id_pembelian');
			
            $this->db->query("UPDATE tab_pembelian_detail set stts='NONAKTIF',userdelete='$user',tgldelete='$tgl' where id_pembelian='$id_pembelian'");
			
$data['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id_pembelian.'" and stts!="NONAKTIF"');
$this->load->view('admin/pembelian/table',$data);
			}
	
	
	
	
	public function tambah(){
		
		 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "TAMBAH PEMBELIAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_pembelian');
		$isi['kontent'] = "admin/pembelian/kontent_form";
		$this->load->view('admin/tampilan_home',$isi);
		
		}
		
public function edit_he($id){
		
		 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "TAMBAH PEMBELIAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id.'" and stts!="NONAKTIF"');

		$isi['cari']=$this->db->query("select * from tab_pembelian where id_pembelian='$id'");
		$isi['kontent'] = "admin/pembelian/kontent_table";
		$this->load->view('admin/tampilan_home',$isi);
		
		}		
		
		
	public function cancel($id){
		      $data['stts']="CANCEL";
			  $data['userdelete']=$this->session->userdata('nip');
			  $data['tgldelete']=date('Y-m-d');
		    $this->db->where('id_pembelian',$id);
			$this->db->update('tab_pembelian',$data);
		$this->session->set_flashdata('info','Data Sukses Di Update');
		redirect ('admin/pembelian');
		}
	public function ss()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA PEMBELIAN BAHAN NONAKTIF";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_pembelian');
		$isi['kontent'] = "admin/pembelian/kontent_form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function kirim($id){
		 $user=$this->session->userdata('nip');
			  $tgl=date('Y-m-d');
		$this->db->query("UPDATE ibenk_pantri.tab_pembelian 
	SET stts = 'KIRIM' , tglupdate='$tgl' , userupdate='$user' WHERE
	id_pembelian = '$id' ");
		$this->session->set_flashdata('info','Data Sukses Di Kirim');
		redirect('admin/pembelian');
		}
	public function tambahs($id)
	{   
	
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$f = $this->db->query("SELECT
    tab_pembelian.*
    , tab_kategori.id_kategori
    , tab_kategori.nama AS kategori
    , tab_satuan.id_satuan 
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_pembelian
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_pembelian.satuan = tab_satuan.id_satuan)
    INNER JOIN ibenk_pantri.tab_kategori 
        ON (tab_pembelian.kategori = tab_kategori.id_kategori) where tab_pembelian.id_jadi='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT DATA PEMBELIAN BAHAN";
			foreach($f->result() as $rw){
								$isi['id_jadi']=$rw->id_jadi;
								$isi['jadi']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['id_kategori']=$rw->id_kategori;
								$isi['nama_kategori']=$rw->kategori;
								$isi['id_satuan']=$rw->id_satuan;
								$isi['nama_satuan']=$rw->satuan;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH DATA PEMBELIAN BAHAN";
			                    $isi['id_jadi']="";
								$isi['nama_kategori']="";
								$isi['nama_satuan']="";
								$isi['id_kategori']="";
								$isi['id_satuan']="";
								$isi['stts']="AKTIF";
								$isi['jadi']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/pembelian/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_jadi');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{ 
	if(!$nok){
		$kode = $this->model_view->getkodejadi();
		}else{
			$kode= $this->input->post('id_jadi');
			} 
	$data = array(
	id_jadi => $kode,
	nama =>$this->input->post('nama'),
	satuan =>$this->input->post('satuan'),
	kategori =>$this->input->post('kategori'),
	stts =>$this->input->post('stts'),
	userinput => $this->input->post('userinput'),
	userupdate => $this->input->post('userupdate'),
	tglinput => $this->input->post('tglinput'),
	tglupdate => $this->input->post('tglupdate')
	
	);
	if(!$nok){
		$this->db->insert('tab_pembelian',$data);
		$this->session->set_flashdata('info','Data Sukses Di Tambah');
		}else{
			$this->db->where('id_jadi',$nok);
			$this->db->update('tab_pembelian',$data);
		$this->session->set_flashdata('info','Data Sukses Di Update');
			}

	redirect('admin/jadi');
		
		}
	
	}
	
	public function deletejadi()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_pembelian SET stts="NONAKTIF",userdelete="'.$nip.'",tgldelete="'.$tgl.'" WHERE id_jadi="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/jadi');
		}else{
			redirect('admin/jadi');
			}
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_pembelian SET stts="AKTIF" WHERE id_jadi="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/jadi');
		}else{
			redirect('admin/jadi');
			}
	}
	
	
	
	public function updatejadi()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_jadi = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_pembelian 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_jadi = '$id_jadi' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/jadi');
	}else{
		redirect('admin/jadi');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */