<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Stock_laporan extends CI_Controller {

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
		$tahun=date('Y');
		$isi['home_nav1'] = "DATA LAPORAN STOCK BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['bahanjadi'] = "LAPORAN KEDATANGAN BAHAN JADI";
		$isi['bahandasar'] = "LAPORAN KEDATANGAN BAHAN DASAR";
		$isi['kbahanjadi'] = "LAPORAN PENGELUARAN BAHAN JADI";
		$isi['kbahandasar'] = "LAPORAN PENGELUARAN BAHAN DASAR";
		
		$isi['jan']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-01-%"')->num_rows();
		$isi['feb']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-02-%"')->num_rows();
		$isi['mar']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-03-%"')->num_rows();
		$isi['apr']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-04-%"')->num_rows();
		$isi['mei']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-05-%"')->num_rows();
		$isi['jun']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-06-%"')->num_rows();
		$isi['jul']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-07-%"')->num_rows();
		$isi['agus']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-08-%"')->num_rows();
		$isi['sep']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-09-%"')->num_rows();
		$isi['okt']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-10-%"')->num_rows();
		$isi['nop']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-11-%"')->num_rows();
		$isi['des']=$this->db->query('SELECT id_pembelian FROM tab_pembelian WHERE tglinput LIKE "'.$tahun.'-12-%"')->num_rows();
		
		$isi['jan1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-01-%"')->num_rows();
		$isi['feb1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-02-%"')->num_rows();
		$isi['mar1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-03-%"')->num_rows();
		$isi['apr1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-04-%"')->num_rows();
		$isi['mei1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-05-%"')->num_rows();
		$isi['jun1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-06-%"')->num_rows();
		$isi['jul1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-07-%"')->num_rows();
		$isi['agus1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-08-%"')->num_rows();
		$isi['sep1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-09-%"')->num_rows();
		$isi['okt1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-10-%"')->num_rows();
		$isi['nop1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-11-%"')->num_rows();
		$isi['des1']=$this->db->query('SELECT id_pembelian FROM tab_pembelian_jadi WHERE tglinput LIKE "'.$tahun.'-12-%"')->num_rows();
		$isi['kontent'] = "admin/stock_laporan/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
public function jadi(){
	
	
	}
public function dasar(){
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN KEDATANGAN BAHAN DASAR ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_pembelian,tglinput,userinput FROM tab_stock WHERE tglinput BETWEEN '$p_tgl' AND '$p_tgl1' GROUP BY id_pembelian ASC");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/stock_laporan/dasar',$isi);
	
	}
	
	public function dasar_keluar(){
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN PENGELUARAN BAHAN DASAR ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_po,stts,tglinput,userinput FROM tab_pengeluaran WHERE dasar LIKE 'ds%' AND tglinput BETWEEN '$p_tgl' AND '$p_tgl1' AND qty !='0' GROUP BY id_po");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/stock_laporan/dasar_keluar',$isi);
	
	}

public function jadi_p(){
	   $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN KEDATANGAN BAHAN JADI ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_pembelian,tglinput,userinput FROM tab_stock_jadi WHERE tglinput BETWEEN '$p_tgl' AND '$p_tgl1' GROUP BY id_pembelian ASC");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/stock_laporan/jadi',$isi);
	
	}
	
	public function jadi_p_keluar(){
	  $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN PENGELUARAN BAHAN DASAR ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_po,stts,tglinput,userinput,id FROM tab_pengeluaran_jadi WHERE id LIKE 'JD%' AND tglinput BETWEEN '$p_tgl' AND '$p_tgl1' AND qty !='0' GROUP BY id_po");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/stock_laporan/jadi_keluar',$isi);
	
	}
	
public function s_dasar(){
	
	 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN STOCK BAHAN DASAR ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['user']=$nama;
		$isi['data'] = $this->db->query('SELECT
   SUM(tab_stock.qty_terima) AS tot,
  tab_satuan.nama AS satuan,
     tab_dasar.id_dasar as kode
    , tab_dasar.nama as dasar
FROM
    ibenk_pantri.tab_stock
    INNER JOIN ibenk_pantri.tab_dasar 
        ON (tab_stock.dasar = tab_dasar.id_dasar)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan) WHERE tab_stock.stts="AKTIF" GROUP BY tab_stock.dasar ASC;');
		$this->load->view('admin/stock_laporan/s_dasar',$isi);
	
	
	}
	
	public function s_jadi(){
	
	 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$tahun=date('Y');
		$tgl=date('Y-m-d H:is');
		$isi['p_tgl']=$this->input->post('tgl');
		$isi['p_tgl1']=$this->input->post('tgl1');
		$p_tgl=$this->input->post('tgl');
		$p_tgl1=$this->input->post('tgl1');
		$isi['judul'] = "DATA LAPORAN STOCK BAHAN JADI ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['user']=$nama;
		$isi['data'] = $this->db->query('SELECT
   SUM(tab_stock_jadi.qty_terima) AS tot,
  tab_satuan.nama AS satuan,
     tab_jadi.id_jadi as kode
    , tab_jadi.nama as dasar
FROM
    ibenk_pantri.tab_stock_jadi
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_stock_jadi.dasar = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_stock_jadi.stts="AKTIF" GROUP BY tab_stock_jadi.dasar ASC;');
		$this->load->view('admin/stock_laporan/s_jadi',$isi);
	
	
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */