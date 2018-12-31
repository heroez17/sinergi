<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {


	public function index()

	{
		$data['log']="404";
		$data['lo']="ERROR";
		
		$this->load->view('tampilan_error',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */