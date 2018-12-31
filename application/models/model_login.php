<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	
	public function getlogin($u,$p)
	{
		
		$query=$this->db->query('SELECT * from tab_login where user_name="'.$u.'" and user_key="'.$p.'" 
	LIMIT 0, 50;
');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$sess = array ('user_name' =>$row->user_name,
				                'user_key' =>$row->user_key,
								 'user_id' =>$row->user_id,
								'nip' =>$row->nik,
								'photo' =>$row->photo
								  );
								$this->session->set_userdata($sess);
								redirect ('admin/dashboard/');}
						}
				else
				{
					
					$this->session->set_flashdata('info', 'Maaf Username atau Password Anda Salah');
								redirect ('login');
					
			
			}
}




	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */