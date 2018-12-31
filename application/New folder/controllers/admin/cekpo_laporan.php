<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Cekpo_laporan extends CI_Controller {

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
		$isi['home_nav1'] = "DATA LAPORAN PRODUKSI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/cekpo_laporan/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
public function per_po(){
	$id=$this->input->post('id');
	$isi['idpo']=$id;
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
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id.'"');
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
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'"');
	$tr=$this->db->query("select * from tab_po where id_po='$id' LIMIT 1");
	if($tr->num_rows()>0){
		foreach($tr->result() as $tri){
			$isi['stts']=$tri->stts;
			}
		
		$this->load->view("admin/cekpo_laporan/perpo",$isi);
		}
	else{
		echo '<div class="box-header">
    <h3>DATA PO '.$id.' Tidak Di temukan</h3></div>
    </div>';
		}
	
	}
	
	
	public function per_po_cetak(){
	$id=$this->input->post('id_po');
	$isi['idpo']=$id;
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
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id.'"');
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
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'"');
	$tr=$this->db->query("select * from tab_po where id_po='$id' LIMIT 1");
	if($tr->num_rows()>0){
		foreach($tr->result() as $tri){
			$isi['stts']=$tri->stts;
			}
		
		$this->load->view("admin/cekpo_laporan/perpo_cetak",$isi);
		}
	else{
		echo '<div class="box-header">
    <h3>DATA PO '.$id.' Tidak Di temukan</h3></div>
    </div>';
		}
	
	}



public function per_tgl(){
	$tgl=$this->input->post('tgl');
	$tgl1=$this->input->post('tgl1');
	$isi['tgl']=$this->input->post('tgl');
	$isi['tgl1']=$this->input->post('tgl1');
	$isi['inpo']='Data PO dari '.$tgl.' S/d '.$tgl1;
	$inpo='Data PO dari '.$tgl.' S/d '.$tgl1;
	$isi['home_nav1'] = "DATA DETAIL ORDER ".$inpo;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		
	$tr=$this->db->query("select * from tab_po where tglinput BETWEEN '$tgl' AND '$tgl1'");
	$isi['tr']=$this->db->query("select * from tab_po where tglinput BETWEEN '$tgl' AND '$tgl1'");
	if($tr->num_rows()>0){
		foreach($tr->result() as $tri){
			
			$isi['stts']=$tri->stts;
			}
		
		$this->load->view("admin/cekpo_laporan/pertgl",$isi);
		}
	else{
		echo '<div class="box-header">
    <h3>'.$inpo.' Tidak Di temukan</h3></div>
    </div>';
		}
	
	}


public function per_tgl_cetak(){
	$tgl=$this->input->post('tgl');
	$tgl1=$this->input->post('tgl1');
	$isi['tgl']=$this->input->post('tgl');
	$isi['tgl1']=$this->input->post('tgl1');
	$isi['inpo']='Data PO dari '.$tgl.' S/d '.$tgl1;
	$inpo='Data PO dari '.$tgl.' S/d '.$tgl1;
	$isi['home_nav1'] = "DATA DETAIL ORDER ".$inpo;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		
	$tr=$this->db->query("select * from tab_po where tglinput BETWEEN '$tgl' AND '$tgl1'");
	$isi['tr']=$this->db->query("select * from tab_po where tglinput BETWEEN '$tgl' AND '$tgl1'");
	if($tr->num_rows()>0){
		foreach($tr->result() as $tri){
			
			$isi['stts']=$tri->stts;
			}
		
		$this->load->view("admin/cekpo_laporan/pertgl_cetak",$isi);
		}
	else{
		echo '<div class="box-header">
    <h3>'.$inpo.' Tidak Di temukan</h3></div>
    </div>';
		}
	
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */