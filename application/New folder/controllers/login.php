<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_login');
		$this->load->model('model_squrity');
		$this->model_squrity->ceklogin();
		
		
	    
		}
	public function index()

	{
		
		
		$data['pro']=$this->model_view->title();
		$data['login'] = "LOGIN";
		$this->load->view('tampilan_login',$data);
	}
	public function konter()

	{
		
		
		$data['pro']=$this->model_view->title();
		$data['login'] = "LOGIN COUNTER";
		$data['tabel'] = $this->db->query('select * from tab_konter where ses="0"');
		$this->load->view('tampilan_login_c',$data);
	}
	public function getlogin()
	{
		$u=$this->input->post('uu');
		$ps=$this->input->post('pp');
		$p=md5($ps);
		$this->model_login->getlogin($u,$p);
	}
	public function getlogin_c()
	{
		$u=$this->input->post('uu');
		$c=$this->input->post('c');
		$ps=$this->input->post('pp');
		$p=md5($ps);
		$this->model_login->getlogin_c($u,$p,$c);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */