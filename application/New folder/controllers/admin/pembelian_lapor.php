<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Pembelian_lapor extends CI_Controller {

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
		$isi['home_nav1'] = "DATA LAPORAN PEMBELIAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['bahanjadi'] = "PEMBELIAN BAHAN JADI";
		$isi['bahandasar'] = "PEMBELIAN BAHAN DASAR";
		
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
		$isi['kontent'] = "admin/pembelian_lapor/kontent";
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
		$isi['judul'] = "DATA LAPORAN PEMBELIAN BAHAN DASAR ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_pembelian,userinput,tglinput,userupdate,tglupdate,userdelete,tgldelete,stts,alasan FROM tab_pembelian WHERE tglinput BETWEEN '$p_tgl' AND '$p_tgl1' ORDER BY tglinput ASC");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/pembelian_lapor/dasar',$isi);
	
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
		$isi['judul'] = "DATA LAPORAN PEMBELIAN BAHAN JADI ";
		$nik = $this->session->userdata('nip');
		$us=$this->db->query("SELECT nama FROM tab_karyawan WHERE nik='$nik' LIMIT 1")->result();
		foreach($us as $as){
			$nama = $as->nama;
			}
			$isi['table'] = $this->db->query("SELECT id_pembelian,userinput,tglinput,userupdate,tglupdate,userdelete,tgldelete,stts,alasan FROM tab_pembelian_jadi WHERE tglinput BETWEEN '$p_tgl' AND '$p_tgl1' ORDER BY tglinput ASC");
		$isi['user']=$nama;
		$isi['level'] = $this->model_view->lev();
		$this->load->view('admin/pembelian_lapor/jadi',$isi);
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */