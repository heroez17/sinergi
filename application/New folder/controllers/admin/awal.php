<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Awal extends CI_Controller {

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
		$isi['log'] = "";
		$isi['home_nav'] = "HOME";
		$isi['home_nav1'] = "DASHBOARD";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		
		$isi['jmlhhari'] = $this->model_admin->jumlah_hari();
		
		$isi['kontent'] = "admin/kontent";
		$this->load->view('admin/tampilan_home',$isi);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

public function simpan(){
	$id=$this->input->post('id');
	$config['upload_path'] = 'assets/dist/img';
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
		id =>$this->input->post('id'),
	nama =>$this->input->post('nama'),
	alamat => $this->input->post('alamat'),
	tentang =>$this->input->post('tentang'),
	telpon => $this->input->post('telpon'),
	email => $this->input->post('email'),
	photo => $dok['file_name']
	
	);}else{
		$data = array(
		id =>$this->input->post('id'),
	nama =>$this->input->post('nama'),
	alamat => $this->input->post('alamat'),
	tentang =>$this->input->post('tentang'),
	telpon => $this->input->post('telpon'),
	email => $this->input->post('email'));}
		if($id=="0"){
	$this->db->insert('app',$data);
		}else{
			$this->db->where('id',$id);
			$this->db->update('app',$data);
			}
	redirect ('admin/awal');
	}




public function _resize_materi($fulpat) {
        $config['source_file'] = './assets/dist/img/' . $fulpat;
        $config['new_file'] = './assets/dist/img/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 2000;
        $config['height'] = 2000;
    }
	public function _create_thumb_materi($fulpet) {
        $config['source_file'] = './assets/dist/img/' . $fulpet;
        $config['new_file'] = './assets/dist/img/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 2000;
        $config['height'] = 2000;   
    }

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */