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
								if($level=="ADMIN"){redirect ('admin/dashboard');}
								else{redirect ('login');}
		}
		
		
			
	}
	
	
	public function ceksession($menu){
	
	$user_id=$this->session->userdata('user_id');
		$d=$this->db->query("SELECT
    tab_menu.nama
FROM
    ibenk_kassir.tab_login
    INNER JOIN ibenk_kassir.akses 
        ON (tab_login.user_id = akses.id_user)
    INNER JOIN ibenk_kassir.tab_menu 
        ON (akses.id_menu = tab_menu.id_menu)
        WHERE tab_login.user_id='$user_id' AND tab_menu.nama='$menu';")->num_rows();
		if($d<1){
			redirect ('admin/dashboard');
			
			}
		
		
		}	
	
	
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */