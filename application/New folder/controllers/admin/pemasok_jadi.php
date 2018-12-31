<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Pemasok_jadi extends CI_Controller {

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
		$isi['home_nav1'] = "DATA PEMASOK BAHAN JADI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_pemasok_jadi LIMIT 10');
		$isi['data_detail'] = $this->db->query('SELECT
    tab_pemasok_detail_jadi.*
    , tab_pemasok_jadi.id_pemasok
	, tab_pemasok_jadi.nama AS pemasok
    , tab_jadi.id_jadi AS dasar
    , tab_jadi.nama
FROM
    ibenk_pantri.tab_pemasok_detail_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_pemasok_detail_jadi.id_pemasok = tab_pemasok_jadi.id_pemasok)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_jadi.id_jadi = tab_pemasok_detail_jadi.id_dasar) WHERE tab_pemasok_detail_jadi.stts="AKTIF"');
		$isi['kontent'] = "admin/pemasok_jadi/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function limitpage(){
		$id = $this->input->post('id');
		$isi['data'] = $this->db->query('SELECT * FROM tab_pemasok_jadi WHERE tab_pemasok_jadi.stts="AKTIF" LIMIT '.$id );
		$this->load->view('admin/pemasok_jadi/halaman',$isi);
		}
	
	public function caripage(){
		$id = $this->input->post('id');
		$isi['data'] = $this->db->query('SELECT * FROM tab_pemasok_jadi WHERE tab_pemasok_jadi.stts="AKTIF" AND nama LIKE "'.$id.'%" LIMIT 0,5' );
		$this->load->view('admin/pemasok_jadi/halaman',$isi);
		}
	
	public function caripagedetail(){
		$id = $this->input->post('id');
		$isi['data_header']=$this->db->query('select * from tab_pemasok_jadi where id_pemasok="'.$id.'"');
		$isi['data_detail'] = $this->db->query('SELECT
    tab_pemasok_detail_jadi.*
    , tab_pemasok_jadi.id_pemasok
	 , tab_pemasok_jadi.nama as nama_pemasok
    , tab_jadi.id_jadi AS dasar
    , tab_jadi.nama
FROM
    ibenk_pantri.tab_pemasok_detail_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_pemasok_detail_jadi.id_pemasok = tab_pemasok_jadi.id_pemasok)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_jadi.id_jadi = tab_pemasok_detail_jadi.id_dasar) WHERE tab_pemasok_detail_jadi.id_pemasok="'.$id.'"');
		$this->load->view('admin/pemasok_jadi/halaman_detail',$isi);
		
		}
		
		
		
public function caripagedetail_non(){
		$id = $this->input->post('id');
		$sts=$this->input->post('stts');
		$userinput=$this->session->userdata('nip');
		$tglinput=date('Y-m-d');
		if($sts=="AKTIF"){
			$has="NONAKTIF";
			}else{
				$has="AKTIF";
				}
		
		
$this->db->query('UPDATE tab_pemasok_jadi SET stts="'.$has.'",tgldelete="'.$tglinput.'",userdelete="'.$userinput.'" WHERE id_pemasok="'.$id.'" ');
		$isi['data_header']=$this->db->query('select * from tab_pemasok_jadi where id_pemasok="'.$id.'"');
		$isi['data_detail'] = $this->db->query('SELECT
    tab_pemasok_detail_jadi.*
    , tab_pemasok_jadi.id_pemasok
	 , tab_pemasok_jadi.nama as nama_pemasok
    , tab_jadi.id_dasar AS dasar
    , tab_jadi.nama
FROM
    ibenk_pantri.tab_pemasok_detail_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_pemasok_detail_jadi.id_pemasok = tab_pemasok_jadi.id_pemasok)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_jadi.id_dasar = tab_pemasok_detail_jadi.id_dasar) WHERE tab_pemasok_detail_jadi.id_pemasok="'.$id.'"');
		$this->load->view('admin/pemasok_jadi/halaman_detail',$isi);
		
		}
		
		
		public function bukapagedetail(){
			$this->load->view('admin/pemasok_jadi/form');
			}
		
		

		
		
		public function DeleteDetail(){
		$id = $this->input->post('id_detail');
		$id_pemasok = $this->input->post('id_pemasok');
		$cr=$this->db->query("select stts from tab_pemasok_detail_jadi where id_pemasok_detail= '$id'");
		foreach($cr->result() as $ro){
			if($ro->stts=="AKTIF"){
				$stts="NONAKTIF";
				}else{
					$stts="AKTIF";
					}
			}
		$userinput=$this->session->userdata('nip');
		$tglinput=date('Y-m-d');
		$this->db->query("UPDATE ibenk_pantri.tab_pemasok_detail_jadi 
	SET 
	userdelete = '$userinput' , 
	tgldelete = '$tglinput' , 
	stts = '$stts' WHERE
	id_pemasok_detail = '$id'");
		
		$isi['data_header']=$this->db->query('select * from tab_pemasok_jadi where id_pemasok="'.$id_pemasok.'"');
		$isi['data_detail'] = $this->db->query('SELECT
    tab_pemasok_detail_jadi.*
    , tab_pemasok_jadi.id_pemasok
	 , tab_pemasok_jadi.nama as nama_pemasok
    , tab_jadi.id_dasar AS dasar
    , tab_jadi.nama
FROM
    ibenk_pantri.tab_pemasok_detail_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_pemasok_detail_jadi.id_pemasok = tab_pemasok_jadi.id_pemasok)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_jadi.id_dasar = tab_pemasok_detail_jadi.id_dasar) WHERE tab_pemasok_detail_jadi.id_pemasok="'.$id_pemasok.'"');
		$this->load->view('admin/pemasok_jadi/halaman_detail',$isi);
		
		}
		
		
		
		
		
public function caripagedetail_simpan(){
		$id_pemasok = $this->input->post('id');
		$id_dasar = $this->input->post('id_dasar');
		$userinput=$this->session->userdata('nip');
		$tglinput=date('Y-m-d');
		$this->db->query("INSERT INTO ibenk_pantri.tab_pemasok_detail_jadi 
	(id_pemasok, 
	id_pemasok_detail, 
	id_dasar, 
	userinput, 
	userupdate, 
	tglinput, 
	tglupdate, 
	userdelete, 
	tgldelete, 
	stts
	)
	VALUES
	('$id_pemasok', 
	'', 
	'$id_dasar', 
	'$userinput', 
	'', 
	'$tglinput', 
	'', 
	'', 
	'', 
	'AKTIF'
	);
");
		
		$isi['data_header']=$this->db->query('select * from tab_pemasok_jadi where id_pemasok="'.$id_pemasok.'"');
		$isi['data_detail'] = $this->db->query('SELECT
    tab_pemasok_detail_jadi.*
    , tab_pemasok_jadi.id_pemasok
	 , tab_pemasok_jadi.nama as nama_pemasok
    , tab_jadi.id_jadi AS dasar
    , tab_jadi.nama
FROM
    ibenk_pantri.tab_pemasok_detail_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_pemasok_detail_jadi.id_pemasok = tab_pemasok_jadi.id_pemasok)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_jadi.id_jadi = tab_pemasok_detail_jadi.id_dasar) WHERE tab_pemasok_detail_jadi.id_pemasok="'.$id_pemasok.'"');
		$this->load->view('admin/pemasok_jadi/halaman_detail',$isi);
		
		}
		
		
		
	
	
	public function ss()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA BAHAN pemasok NONAKTIF";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_pemasok_jadi.*
    , tab_jadi.id_dasar
    , tab_jadi.nama AS dasar
    , tab_jadi.satuan
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_jadi.id_dasar = tab_pemasok_jadi.dasar)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_pemasok_jadi.stts="NONAKTIF"');
		$isi['kontent'] = "admin/pemasok_jadi/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function tambah($id)
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
    tab_pemasok_jadi.*
    , tab_jadi.id_dasar
    , tab_jadi.nama AS dasar
    , tab_jadi.satuan
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_jadi
    INNER JOIN ibenk_pantri.tab_pemasok_jadi 
        ON (tab_jadi.id_dasar = tab_pemasok_jadi.dasar)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_pemasok_jadi.id_pemasok='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT DATA BAHAN PEMASOK";
			foreach($f->result() as $rw){
								$isi['id_pemasok']=$rw->id_pemasok;
								$isi['pemasok']=$rw->nama;
								$isi['alamat']=$rw->alamat;
								$isi['id_dasar']=$rw->id_dasar;
								$isi['dasar']=$rw->dasar;
								$isi['phone']=$rw->phone;
								$isi['email']=$rw->email;
								$isi['stts']=$rw->stts;
								$isi['satuan']=$rw->satuan;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH DATA BAHAN pemasok";
			                    $isi['id_pemasok']="";
								$isi['id_satuan']="";
								$isi['id_dasar']="";
								$isi['dasar']="";
								$isi['satuan']="";
								$isi['phone']="";
								$isi['alamat']="";
								$isi['email']="";
								$isi['stts']="AKTIF";
								$isi['pemasok']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/pemasok_jadi/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
	$nok = $this->input->post('id_pemasok');
	$nama = $this->input->post('nama');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$alamat = $this->input->post('alamat');
	$key = $this->input->post('lokasi');
	$user=$this->session->userdata('nip');
		$tgl=date('Y-m-d');
	if($key=="Lokasi")
	{  
	if(!$nok){
		
		$this->db->query("INSERT INTO ibenk_pantri.tab_pemasok_jadi 
	(id_pemasok, 
	nama, 
	userinput, 
	userupdate, 
	tglinput, 
	tglupdate, 
	userdelete, 
	tgldelete, 
	stts, 
	alamat, 
	phone, 
	email
	)
	VALUES
	('', 
	'$nama', 
	'$user', 
	'', 
	'$tgl', 
	'', 
	'', 
	'', 
	'AKTIF', 
	'$alamat', 
	'$phone', 
	'$email'
	);

");
		$this->session->set_flashdata('info','Data Sukses Di Tambah');
		}else{
			$this->db->query("
UPDATE ibenk_pantri.tab_pemasok_jadi 
	SET
	nama = '$nama' , userupdate = '$user' , 
	tglupdate = '$tgl' , 
	alamat = '$alamat' , 
	phone = '$phone' , 
	email = '$email'
	
	WHERE
	id_pemasok = '$nok' ;
");
			
		$this->session->set_flashdata('info','Data Sukses Di Update');
			}

	redirect('admin/pemasok_jadi');
		
		}
	
	}
	
	public function deletepemasok()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_pemasok_jadi SET stts="NONAKTIF",userdelete="'.$nip.'",tgldelete="'.$tgl.'" WHERE id_pemasok="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/pemasok_jadi');
		}else{
			redirect('admin/pemasok_jadi');
			}
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_pemasok_jadi SET stts="AKTIF" WHERE id_pemasok="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/pemasok_jadi');
		}else{
			redirect('admin/pemasok_jadi');
			}
	}
	
	
	
	public function updatepemasok()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_pemasok = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_pemasok_jadi 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_pemasok = '$id_pemasok' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/pemasok_jadi');
	}else{
		redirect('admin/pemasok_jadi');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */