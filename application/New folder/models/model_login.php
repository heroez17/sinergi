<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	
	public function getlogin($u,$p)
	{
		
		$query=$this->db->query('SELECT * from tab_login where user_name="'.$u.'" and user_key="'.$p.'" and level="ADMIN"
	LIMIT 0, 50;
');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$sess = array ('user_name' =>$row->user_name,
				                'user_key' =>$row->user_key,
								'nip' =>$row->nik,
								'photo' =>$row->photo,
								'level'   =>$row->level  );
								$this->session->set_userdata($sess);
								
								$level=$this->session->userdata('level');
								if($level=="ADMIN"){redirect ('admin/awal');}
								else{redirect ('login');}
								
								
								
								
								
								
			}
			
			
		  }
				else
				{
					
					$this->session->set_flashdata('info', 'Maaf Username atau Password Anda Salah');
								redirect ('login');
					
			
			}
}

public function getlogin_c($u,$p,$c)
	{
		$ce = $this->db->query('select * from tab_konter where ses="1" and id="'.$c.'"');
		if($ce->num_rows>0){$this->session->set_flashdata('info', 'Maaf COUNTER Sudah Ada Yang Mengisi');
								redirect ('login/konter');}else{
		$query=$this->db->query('SELECT * from tab_login where user_name="'.$u.'" and user_key="'.$p.'" and level="TELLER"
	LIMIT 0, 50;
');

		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$this->db->query("UPDATE tab_konter SET ses = '1' WHERE id = '$c'");
				$sess = array ('user_name' =>$row->user_name,
				                'user_key' =>$row->user_key,
								'nip' =>$row->nik,
								'photo' =>$row->photo,
								'konter' =>$c,
								'level'   =>$row->level  );
								$this->session->set_userdata($sess);
								
								$level=$this->session->userdata('level');
								if($level=="TELLER"){redirect ('teler/awal');}
								else{redirect ('login');}
								
								
								
								
								
								
			}
			
			
		  }
				else
				{
					
					$this->session->set_flashdata('info', 'Maaf Username atau Password Anda Salah');
								redirect ('login/konter');
					
			
			}}
}

	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */