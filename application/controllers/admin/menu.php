<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Menu extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->ceksession('menu');
		
		}
	public function index()
	{  
	
		 $a=$this->session->userdata('user_id');
		 $nama=$this->input->post('nama');
		 $isi['listmenu'] = $this->db->query("SELECT
    tab_menu.nama as nama
FROM
    ibenk_kassir.akses
    INNER JOIN ibenk_kassir.tab_menu 
        ON (akses.id_menu = tab_menu.id_menu)
    INNER JOIN ibenk_kassir.tab_login 
        ON (tab_login.user_id = akses.id_user)
		WHERE akses.id_user = '$a' and tab_menu.nama like '$nama%' order by tab_menu.id_menu ASC");
		 $this->load->view('admin/menu_cari',$isi);
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */