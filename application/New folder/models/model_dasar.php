<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dasar extends CI_Model {

	
	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
		
        $query = $this->db->get("tab_dasar");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
		
		return $this->db->get('tab_dasar')->num_rows();
        
    }
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */