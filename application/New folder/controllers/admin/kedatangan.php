<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Kedatangan extends CI_Controller {

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
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA KEDATANGAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_pembelian where stts="KIRIM"');
		$isi['kontent'] = "admin/kedatangan/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function proses($id){
		
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA KEDATANGAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['cari'] = $this->db->query('SELECT * FROM tab_pembelian where stts="KIRIM" and id_pembelian="'.$id.'"');
$isi['cari_table']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id.'" and stts!="NONAKTIF"');
$isi['loop']=$this->db->query('select * from tab_pembelian_detail where id_pembelian="'.$id.'" and stts!="NONAKTIF"')->num_rows();

		$isi['kontent'] = "admin/kedatangan/kontent_table";
		$this->load->view('admin/tampilan_home',$isi);
		
		}
	
	public function simpan(){
		
		 $loop = $this->input->post('loop');
		     $a=1;
		     $no_qty=1;
			$no_qty_terima=1;
			$no_id_pembelian=1;
			$no_id_pembelian_detail=1;
			$no_dasar=1;
			
		 for($i=1;$i<=$loop;$i++){
			 $userinput=$this->session->userdata('nip');
		     $tglinput=date('Y-m-d');
			$qty = $this->input->post('qty'.$no_qty++);
			$qty_terima = $this->input->post('qty_terima'.$no_qty_terima++);
			$id_pembelian = $this->input->post('id_pembelian'.$no_id_pembelian++);
			$id_pembelian_detail = $this->input->post('id_pembelian_detail'.$no_id_pembelian_detail++);
			$dasar = $this->input->post('dasar'.$no_dasar++);
			$this->db->query("UPDATE ibenk_pantri.tab_pembelian SET stts = 'SELESAI' WHERE id_pembelian = '$id_pembelian' ;");
			$this->db->query("UPDATE ibenk_pantri.tab_pembelian_detail 
												SET stts = 'OKE'  WHERE
												id_pembelian_detail = '$id_pembelian_detail' AND id_pembelian = '$id_pembelian' ;");
			$this->db->query("INSERT INTO ibenk_pantri.tab_stock VALUES
										('', 
										'$id_pembelian', 
										'$id_pembelian_detail', 
										'$userinput', 
										'$tglinput', 
										'', 
										'', 
										'', 
										'$dasar', 
										'$qty', 
										'$qty_terima', 
										'AKTIF'
										);");
			}
			redirect("admin/kedatangan");
		}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */