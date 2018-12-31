<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	
	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
		$this->db->where('stts', 'AKTIF');
        $query = $this->db->get("tab_kategori");
 
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
		$this->db->where('stts', 'AKTIF');
		return $this->db->get('tab_kategori')->num_rows();
        
    }
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */