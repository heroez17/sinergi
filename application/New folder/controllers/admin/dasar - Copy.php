<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Dasar extends CI_Controller {

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
		$isi['home_nav1'] = "DATA BAHAN DASAR";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_dasar.*
    , tab_satuan.id_satuan
    , tab_satuan.nama AS satuan
    , tab_set_jadi.id_set_jadi
    , tab_set_jadi.nama AS set_jadi
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
    INNER JOIN ibenk_pantri.tab_set_jadi 
        ON (tab_dasar.set_jadi = tab_set_jadi.id_set_jadi) WHERE tab_dasar.stts="AKTIF" GROUP BY tab_dasar.id_dasar');
		$isi['kontent'] = "admin/dasar/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	public function ss()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA BAHAN DASAR NONAKTIF";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_dasar.*
    , tab_satuan.id_satuan
    , tab_satuan.nama AS satuan
    , tab_set_jadi.id_set_jadi
    , tab_set_jadi.nama AS set_jadi
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
    INNER JOIN ibenk_pantri.tab_set_jadi 
        ON (tab_dasar.set_jadi = tab_set_jadi.id_set_jadi) WHERE tab_dasar.stts="NONAKTIF" GROUP BY tab_dasar.id_dasar');
		$isi['kontent'] = "admin/dasar/kontent";
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
    tab_dasar.*
    , tab_satuan.id_satuan
    , tab_satuan.nama AS satuan
    , tab_set_jadi.id_set_jadi
    , tab_set_jadi.nama AS set_jadi
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan)
    INNER JOIN ibenk_pantri.tab_set_jadi 
        ON (tab_dasar.set_jadi = tab_set_jadi.id_set_jadi) where tab_dasar.id_dasar='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT DATA BAHAN DASAR";
			foreach($f->result() as $rw){
								$isi['id_dasar']=$rw->id_dasar;
								$isi['dasar']=$rw->nama;
								
$isi['satuan_komposisi']=$rw->satuan_komposisi;
								$isi['stts']=$rw->stts;
								$isi['id_satuan']=$rw->id_satuan;
								$isi['satuan']=$rw->satuan;
								$isi['id_set_jadi']=$rw->id_set_jadi;
								$isi['set_jadi']=$rw->set_jadi;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH DATA BAHAN DASAR";
			                    $isi['id_dasar']="";
								$isi['id_satuan']="";
								$isi['satuan_komposisi']="1";
								$isi['satuan']="";
								$isi['id_set_jadi']="";
								$isi['set_jadi']="";
								$isi['stts']="AKTIF";
								$isi['dasar']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/dasar/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_dasar');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	if(!$nok){
		$kode = $this->model_view->getkodedasar();
		}else{
			$kode =  $this->input->post('id_dasar');
			}
	$data = array(
	id_dasar => $kode,
	nama =>$this->input->post('nama'),
	satuan =>$this->input->post('satuan'),
	set_jadi =>$this->input->post('set_jadi'),
	stts =>$this->input->post('stts'),
	userinput => $this->input->post('userinput'),
	userupdate => $this->input->post('userupdate'),
	tglinput => $this->input->post('tglinput'),
	tglupdate => $this->input->post('tglupdate'),
	satuan_komposisi => $this->input->post('satuan_komposisi')
	
	);
	if(!$nok){
		$this->db->insert('tab_dasar',$data);
		$this->session->set_flashdata('info','Data Sukses Di Tambah');
		}else{
			$this->db->where('id_dasar',$nok);
			$this->db->update('tab_dasar',$data);
		$this->session->set_flashdata('info','Data Sukses Di Update');
			}

	redirect('admin/dasar');
		
		}
	
	}
	
	public function deletedasar()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_dasar SET stts="NONAKTIF",userdelete="'.$nip.'",tgldelete="'.$tgl.'" WHERE id_dasar="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/dasar');
		}else{
			redirect('admin/dasar');
			}
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_dasar SET stts="AKTIF" WHERE id_dasar="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/dasar');
		}else{
			redirect('admin/dasar');
			}
	}
	
	
	
	public function updatedasar()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_dasar = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_dasar 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_dasar = '$id_dasar' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/dasar');
	}else{
		redirect('admin/dasar');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */