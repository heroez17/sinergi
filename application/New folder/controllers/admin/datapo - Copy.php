<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Datapo extends CI_Controller {

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
		$isi['home_nav1'] = "DATA ORDER";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_po ORDER BY id_po DESC');
		$isi['kontent'] = "admin/datapo/kontent";
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
		$isi['kontent'] = "admin/datapo/form";
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
			$this->load->view("admin/datapo/kontent_form",$data);
			}else{
			$data['qty']="QTY 0 Tidak Bisa Input";
			$data['satuan']="";
			$data['dis']='disabled="disabled"';
				}
		}
	}
public function keluar(){
	 $loop = $this->input->post('loop');
	 
		     $a=1;
		     $no_qty=1;
			$id_jadi=1;
			$userinput=$this->session->userdata('nip');
		     $tglinput=date('Y-m-d');
			 $dapo = 'PO'.date('ymdhis');
			 $this->db->query("INSERT INTO ibenk_pantri.tab_po VALUES
	('$dapo', '$userinput', '', '$tglinput', '', '', '', 'AKTIF');");
			for($i=1;$i<=$loop;$i++){
				$qty = $this->input->post('qty'.$no_qty++);
				$id_jadi_p = $this->input->post('id_jadi'.$id_jadi++);
				
				if($qty){
				$this->db->query("
INSERT INTO ibenk_pantri.tab_po_detail 
	VALUES
	('', '$dapo', '$userinput', '', '$tglinput', '', '', '', 'AKTIF', '$qty','$id_jadi_p'
	);
");
				}}
			
			
			
	
	$this->session->set_flashdata('info','Data Sukses Di Input');
	redirect('admin/datapo');
	}
	
	public function lihat($id){
		
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
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
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po.id_po="'.$id.'";');
		$isi['kontent'] = "admin/datapo/kontent_lihat";
		$this->load->view('admin/tampilan_home',$isi);
		
		}
	public function cancel($id){
		$userinput=$this->session->userdata('nip');
		     $tglinput=date('Y-m-d');
		$this->db->query('UPDATE tab_po set stts="NONAKTIF",userdelete="'.$userinput.'",tgldelete="'.$tglinput.'" where id_po="'.$id.'"');
		redirect('admin/datapo');
		
		}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */