<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		
		}
	public function index()
	{   
	
	    $isi['title'] = $this->model_view->title();
		 $isi['pro'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA USER";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_karyawan.*
    , tab_login.*
   
FROM
    tab_login
    INNER JOIN tab_karyawan 
        ON (tab_login.nik = tab_karyawan.nik);');
		
		$isi['kontent'] = "admin/user/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function tambah($id)
	{   
	
	     $isi['pro'] = $this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$f = $this->db->query("SELECT
    tab_karyawan.*
    , tab_login.*
   
FROM
    tab_login
    INNER JOIN tab_karyawan 
        ON (tab_login.nik = tab_karyawan.nik) WHERE tab_login.user_name='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT USER";
			foreach($f->result() as $rw){
								$isi['nik']=$rw->nik;
								$isi['nama']=$rw->nama;
								$isi['alamat']=$rw->alamat;
								$isi['jk']=$rw->jk;
								$isi['phone']=$rw->phone;
								$isi['user_name']=$rw->user_name;
								$isi['user_key']=$rw->user_key;
								
								
								$isi['level']=$rw->level;
								$isi['tem_lah']=$rw->tem_lah;
								$isi['tgl_lah']=$rw->tgl_lah;
								$isi['user_id']=$rw->user_id;}
		}else{
			$isi['home_nav1'] = "TAMBAH USER";
			                    $isi['nik']="";
								$isi['user_id']="";
								$isi['nama']="";
								$isi['alamat']="";
								$isi['user_name']="";
								$isi['user_key']="";
								$isi['jk']="";
								$isi['level']="";
								$isi['phone']="";
								
								
								$isi['tem_lah']="";
								$isi['tgl_lah']="";
			}
		$isi['data']=$this->db->get('tab_karyawan');
	   $isi['kontent'] = "admin/user/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('user_id');
		$ilevel = $this->input->post('level');
		
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{
		
		  if($ilevel=="MANAGER"){
	      $t = $this->db->query("select * from tab_login where level='MANAGER'");
	           if($t->num_rows>0){
		$this->session->set_flashdata('info','Maaf POSISI Manager Sudah Ada Yang Menempati,, Silahkan Delete data Manager Terlebih dahulu'              );
		}else{
			$config['upload_path'] = 'assets/images/';
           $config['allowed_types'] = '*'; // file yang diijinkan
           $config['max_size'] = 4000;
           $config['max_height'] = 4000;
           $config['max_width'] = 4000;
		   $config['encrypt_name'] = TRUE;
		   $this->load->library('upload', $config);
	if ($this->upload->do_upload('poto'))
	 {
		 $dok = $this->upload->data();
		$this->_resize_materi($dok['file_name']);
		$this->_create_thumb_materi($dok['file_name']);
		$data = array(
	user_id =>$this->input->post('user_id'),
	nik => $this->input->post('nik'),
	user_name =>$this->input->post('user_name'),
	level => $this->input->post('level'),
	user_key => md5($this->input->post('user_key')),
	photo => $dok['file_name']
	
	);}else{
		
		$data = array(
	user_id =>$this->input->post('user_id'),
	nik => $this->input->post('nik'),
	user_name =>$this->input->post('user_name'),
	level => $this->input->post('level'),
	user_key => md5($this->input->post('user_key'))
	);
		
		}$this->db->insert('tab_login',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			}
		}else{
			
			$config['upload_path'] = 'assets/images/';
           $config['allowed_types'] = '*'; // file yang diijinkan
           $config['max_size'] = 4000;
           $config['max_height'] = 4000;
           $config['max_width'] = 4000;
		   $config['encrypt_name'] = TRUE;
		   $this->load->library('upload', $config);
	if ($this->upload->do_upload('poto'))
	 {
		 $dok = $this->upload->data();
		$this->_resize_materi($dok['file_name']);
		$this->_create_thumb_materi($dok['file_name']);
		$data = array(
	user_id =>$this->input->post('user_id'),
	nik => $this->input->post('nik'),
	user_name =>$this->input->post('user_name'),
	level => $this->input->post('level'),
	user_key => md5($this->input->post('user_key')),
	photo => $dok['file_name']
	
	);}else{
		
		$data = array(
	user_id =>$this->input->post('user_id'),
	nik => $this->input->post('nik'),
	user_name =>$this->input->post('user_name'),
	level => $this->input->post('level'),
	user_key => md5($this->input->post('user_key'))
	);
		
		}
	
	if(!$nok){
		$this->db->insert('tab_login',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}else{
			$this->db->where('user_id',$nok);
			$this->db->update('tab_login',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			}
			
			
			
			}
	

	redirect('admin/user');
		
		}
	
	}
	
	public function deletekaryawan($id)
	{
		$key = $this->input->post('lokasi3');
		
		
		$this->db->query('DELETE FROM tab_login WHERE user_id="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/user');
		
			redirect('admin/user');
			
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
UPDATE db_tamu.tab_karyawan 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/user');
	}else{
		redirect('admin/user');
		
		}
	
	}
	public function _resize_materi($fulpat) {
        $config['source_file'] = './assets/images/' . $fulpat;
        $config['new_file'] = './assets/images/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 2000;
        $config['height'] = 2000;
    }
	public function _create_thumb_materi($fulpet) {
        $config['source_file'] = './assets/images/' . $fulpet;
        $config['new_file'] = './assets/images/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 2000;
        $config['height'] = 2000;   
    }

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */