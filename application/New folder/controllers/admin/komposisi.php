<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Komposisi extends CI_Controller {

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
		$isi['home_nav1'] = "DATA KOMPOSISI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_jadi.id_jadi
	,tab_jadi.satuan_komposisi
    , tab_jadi.nama
    , tab_satuan.nama as satuan
FROM
    ibenk_pantri.tab_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_jadi.stts="AKTIF"');
		$isi['kontent'] = "admin/komposisi/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	public function ss()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA KATEGORI NONAKTIF";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_kategori WHERE stts ="NONAKTIF" ');
		$isi['kontent'] = "admin/komposisi/kontent";
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
		$f = $this->db->query("SELECT * from tab_kategori where id_kategori='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KATEGORI";
			foreach($f->result() as $rw){
								$isi['id_kategori']=$rw->id_kategori;
								$isi['kategori']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH KATEGORI";
			                    $isi['id_kategori']="";
								$isi['stts']="AKTIF";
								$isi['kategori']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/komposisi/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_kategori');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	id_kategori => $this->input->post('id_kategori'),
	nama =>$this->input->post('nama'),
	stts =>$this->input->post('stts'),
	userinput => $this->input->post('userinput'),
	userupdate => $this->input->post('userupdate'),
	tglinput => $this->input->post('tglinput'),
	tglupdate => $this->input->post('tglupdate')
	
	);
	if(!$nok){
		$this->db->insert('tab_kategori',$data);
		$this->session->set_flashdata('info','Data Sukses Di Tambah');
		}else{
			$this->db->where('id_kategori',$nok);
			$this->db->update('tab_kategori',$data);
		$this->session->set_flashdata('info','Data Sukses Di Update');
			}

	redirect('admin/komposisi');
		
		}
	
	}
	
	public function deletekategori()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_kategori SET stts="NONAKTIF",userdelete="'.$nip.'",tgldelete="'.$tgl.'" WHERE id_kategori="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/komposisi');
		}else{
			redirect('admin/komposisi');
			}
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_kategori SET stts="AKTIF" WHERE id_kategori="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/komposisi');
		}else{
			redirect('admin/komposisi');
			}
	}
	
	
	
	public function updateKATEGORI()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_kategori = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_KATEGORI 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_kategori = '$id_kategori' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/komposisi');
	}else{
		redirect('admin/komposisi');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */