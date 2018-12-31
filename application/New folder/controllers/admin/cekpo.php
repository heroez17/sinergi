<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Cekpo extends CI_Controller {

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
		$isi['page'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PROSES PO";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_po where stts="AKTIF" ORDER BY id_po DESC');
		$isi['kontent'] = "admin/cekpo/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function index1()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['page'] = "1";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA ORDER PRODUKSI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_po where stts="PRODUKSI" ORDER BY id_po DESC');
		$isi['kontent'] = "admin/cekpo/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function proses(){
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "INPUT PO";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['cari']=$this->db->query('SELECT * FROM tab_jadi where stts="AKTIF"');
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/cekpo/form";
		$this->load->view('admin/tampilan_home',$isi);
		
		
		}
public function check(){
	$id=$this->input->post('id');
	$car=$this->db->query('SELECT 
    tab_po.tglinput AS tglinput
    ,tab_po_detail.id_po_detail
    , tab_po_detail.qty
    , tab_po_detail.id_po
    , tab_satuan.nama
    , tab_jadi.nama AS bahanjadi
FROM
    ibenk_pantri.tab_po
    INNER JOIN ibenk_pantri.tab_po_detail 
        ON (tab_po.id_po = tab_po_detail.id_po)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="PO1712050704";');
	foreach($car->result() as $row){
		if($row->tot>0){
			$data['qty']=$row->tot;
			$data['satuan']=$row->satuan;
			$data['dis']='';
			$this->load->view("admin/cekpo/kontent_form",$data);
			}else{
			$data['qty']="QTY 0 Tidak Bisa Input";
			$data['satuan']="";
			$data['dis']='disabled="disabled"';
				}
		}
	}
public function keluar(){
	$id=$this->input->post('id_po');
	$this->db->query("UPDATE tab_po set stts='WAREHOUSE' where id_po='$id'");
redirect('admin/cekpo');
	}
	
	public function lihat($id){
		
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['page']="";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA DETAIL ORDER ".$id;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['cari'] = $this->db->query('SELECT 
    tab_po.tglinput AS tglinput,
	 tab_po.stts AS stts
    ,tab_po_detail.id_po_detail
    , tab_po_detail.qty
     , tab_po_detail.id_jadi
    , tab_po_detail.id_po
    , tab_satuan.nama
    , tab_jadi.nama AS bahanjadi
FROM
    ibenk_pantri.tab_po
    INNER JOIN ibenk_pantri.tab_po_detail 
        ON (tab_po.id_po = tab_po_detail.id_po)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id.'" AND tab_po.stts="AKTIF";');
		$isi['kontent'] = "admin/cekpo/kontent_lihat";
		$this->load->view('admin/tampilan_home',$isi);
		
		}
public function lihat1($id){
		$isi['idpo']=$id;
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['page']="1";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA DETAIL ORDER ".$id;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['cari'] = $this->db->query('SELECT 
    tab_po.tglinput AS tglinput,
	 tab_po.stts AS stts
    ,tab_po_detail.id_po_detail
    , tab_po_detail.qty
     , tab_po_detail.id_jadi
    , tab_po_detail.id_po
    , tab_satuan.nama
    , tab_jadi.nama AS bahanjadi
FROM
    ibenk_pantri.tab_po
    INNER JOIN ibenk_pantri.tab_po_detail 
        ON (tab_po.id_po = tab_po_detail.id_po)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id.'" AND tab_po.stts="PRODUKSI";');
		$isi['cari_detail'] = $this->db->query('SELECT
    tab_po_detail.id_po_detail
    , tab_jadi.nama
    , tab_satuan.nama AS satuan
    , tab_po_detail.id_jadi
	, tab_po_detail.qty
FROM
    ibenk_pantri.tab_po_detail
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
	INNER JOIN ibenk_pantri.tab_po 
        ON (tab_po_detail.id_po = tab_po.id_po)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'" AND tab_po.stts="PRODUKSI"');
		$isi['kontent'] = "admin/cekpo/kontent_table";
		$this->load->view('admin/tampilan_home',$isi);
		
		}		
		
public function selesai(){
	    $isi['idpo']=$this->input->post('idpo');
		$idpo=$this->input->post('idpo');
		$idpodet=$this->input->post('idpodet');
		$dasar=$this->input->post('dasar');
		$this->db->query("UPDATE ibenk_pantri.tab_pengeluaran SET stts = 'SELESAI' WHERE
	dasar='$dasar'
	AND id_po='$idpo'
	AND id_po_detail='$idpodet';");
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['page']="1";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA DETAIL ORDER ".$idpo;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['cari_detail'] = $this->db->query('SELECT
    tab_po_detail.id_po_detail
    , tab_jadi.nama
    , tab_satuan.nama AS satuan
    , tab_po_detail.id_jadi
	, tab_po_detail.qty
FROM
    ibenk_pantri.tab_po_detail
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
	INNER JOIN ibenk_pantri.tab_po 
        ON (tab_po_detail.id_po = tab_po.id_po)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$idpo.'" AND tab_po.stts="PRODUKSI"');
		
		$this->load->view('admin/cekpo/kontent_table_ajax',$isi);
		
		}				
		
		
	public function cancel($id){
		$userinput=$this->session->userdata('nip');
		     $tglinput=date('Y-m-d');
		$this->db->query('UPDATE tab_po set stts="NONAKTIF",userdelete="'.$userinput.'",tgldelete="'.$tglinput.'" where id_po="'.$id.'"');
		redirect('admin/datapo');
		
		}
		public function updt(){
			$id_po_detail=$this->input->post('id_po_detail');
			$id_po=$this->input->post('id_po');
			$id_set_jadi=$this->input->post('id_set_jadi');
			$this->db->query('UPDATE tab_produk SET stts="SELESAI" WHERE id_po_detail="'.$id_po_detail.'" AND id_set_jadi="'.$id_set_jadi.'"');
			$isi['cari'] = $this->db->query('SELECT 
    tab_po.tglinput AS tglinput,
	 tab_po.stts AS stts
    ,tab_po_detail.id_po_detail
    , tab_po_detail.qty
     , tab_po_detail.id_jadi
    , tab_po_detail.id_po
    , tab_satuan.nama
    , tab_jadi.nama AS bahanjadi
FROM
    ibenk_pantri.tab_po
    INNER JOIN ibenk_pantri.tab_po_detail 
        ON (tab_po.id_po = tab_po_detail.id_po)
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id_po.'" AND tab_po.stts="PRODUKSI";');
			
			$this->load->view('admin/cekpo/kontent_table_ajax',$isi);
			
			
			}
			
public function updatPO(){
	$id_po=$this->input->post('id_po');
	$isi['id_po']=$this->input->post('id_po');
	 $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['page'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PROSES PO";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
	
	$this->db->query('UPDATE tab_po SET stts="SELESAI PRODUKSI" WHERE id_po="'.$id_po.'"');
	
	$isi['kontent'] = "admin/cekpo/kontent_sukses";
		$this->load->view('admin/tampilan_home',$isi);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */