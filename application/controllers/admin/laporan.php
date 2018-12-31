<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Laporan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_laporan');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->load->helper('url'); 
        $this->load->helper('html'); 
		 $this->load->library('PHPExcel');
		 $this->model_squrity->ceksession('laporan');
		}
	public function index()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA LAPORAN";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->get('tab_karyawan');
		
		$isi['kontent'] = "admin/laporan/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function download_karyawan(){
		$this->model_laporan->download_karyawan();
		
		}


public function rincian(){
	$isi['pro']=$this->model_view->title();
		$isi['satu']=$this->input->post('tgl');
		$isi['dua']=$this->input->post('tgl1');
		$tgl=$this->input->post('tgl');
		$tgl1=$this->input->post('tgl1');
		$isi["data"]=$this->db->query("SELECT * FROM barang_jual WHERE tanggal BETWEEN '$tgl' AND '$tgl1' AND stts='SELESAI' GROUP BY nofak ORDER BY tanggal ASC");
		$this->load->view('admin/laporan/rinci',$isi);
		}



	public function download_barang_titipan(){
		$this->model_laporan->download_barang_titipan();
		
		}
		
		public function download_titipan_datang(){
		$this->model_laporan->download_titipan_datang();
		
		}


	public function download_barang(){
		$this->model_laporan->download_barang();
		
		}
	public function download_barang_etalase(){
		$this->model_laporan->download_barang_etalase();
		
		}
		public function download_barang_keluar(){
			$dari=$this->input->post('tgl');
			$samapi=$this->input->post('tgl1');
			
		$this->model_laporan->download_barang_keluar($dari,$samapi);
		
		}
		
		
		public function download_kasir(){
			$tgl=$this->input->post('tgl');
			$tgl1=$this->input->post('tgl1');
			$admin=$this->input->post('user');
			$tglx=$this->input->post('tgl').' 01:00:00';
		$tgl1x=$this->input->post('tgl1').' 24:00:00';
			
			$d=$this->input->post('d');
			if($d=="Download"){
		$this->model_laporan->download_kasir($tgl,$tgl1,$admin);
			}else{
				$isi['data']=$this->db->query("SELECT no_jual, 
			COUNT(no_jual) AS tot,
			LEFT(tanggal,10) AS tgl,
	tanggal, 
	id_barang, 
	harga_jual, 
	qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual  WHERE tanggal BETWEEN '$tglx' AND '$tgl1x'
	AND usr_input LIKE '$admin%'
	GROUP BY no_jual");
	$isi['id']=' Periode '.$tgl.' s/d '.$tgl1;
	$isi['pro']=$this->model_view->title();
				$this->load->view('admin/laporan/print',$isi);
				}
		}

public function download_kasir_supplier(){
			$tgl=$this->input->post('tgl');
			$tgl1=$this->input->post('tgl1');
			$admin=$this->input->post('user');
		$this->model_laporan->download_kasir_supplier($tgl,$tgl1,$admin);
		
		}
		
		public function download_kasirr(){
			$tgl=$this->input->post('tgl');
			$tgl1=$this->input->post('tgl1');
			$admin=$this->input->post('user');
		$this->model_laporan->download_kasir($tgl,$tgl1,$admin);
		
		}
		
		
		public function download_barang_distribusi(){
			$dari=$this->input->post('tgl');
			$samapi=$this->input->post('tgl1');
			
		$this->model_laporan->download_barang_distribusi($dari,$samapi);
		
		}
		
		public function pritn_barcode(){
			
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);

			}
			
			private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>'2232'), array());
	}
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */