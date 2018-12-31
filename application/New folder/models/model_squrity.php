<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_squrity extends CI_model {

	
	public function getsqurity()
	{
		
		$user=$this->session->userdata('user_name');
		
		if(empty($user))
		{  
		
		$this->session->sess_destroy();
		
		   redirect ('login');
		}
		
		
			
	}
	
	public function ceklogin()
	{
		
		$user=$this->session->userdata('user_name');
		
		if($user)
		{  
		
		                        $level=$this->session->userdata('level');
								if($level=="ADMIN"){redirect ('admin/awal');}
								else{redirect ('login');}
		}
		
		
			
	}
	
	
	
	public function cekmenu()
	{
		
	                           $level=$this->session->userdata('level');
								if($level=="ADMIN"){
									$hasil = "admin/menu";
									}
								elseif($level=="TELLER"){
									$hasil = "teler/menu";
									}
								else{
									$hasil = "sekertaris_pusat/menu";
									}
								
								return $hasil;
								}
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */