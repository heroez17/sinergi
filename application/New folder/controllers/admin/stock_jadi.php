<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Stock_jadi extends CI_Controller {

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
		$isi['home_nav1'] = "DATA STOCK BAHAN JADI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
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
		$isi['kontent'] = "admin/stock_jadi/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function proses(){
		$isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "INPUT PENGELUARAN BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['cari']=$this->db->query('SELECT
   SUM(tab_stock_jadi.qty_terima) AS tot,
  tab_satuan.nama AS satuan,
     tab_jadi.id_jadi AS kode,
	 tab_jadi.nama AS nama_bahan
   
FROM
    ibenk_pantri.tab_stock_jadi
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_stock_jadi.dasar = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_stock_jadi.stts="AKTIF" GROUP BY tab_stock_jadi.dasar ASC');
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/stock_jadi/form";
		$this->load->view('admin/tampilan_home',$isi);
		
		
		}
		
public function proses_po(){
	$id=$this->input->post('id_po');
	$isi['idpo']=$this->input->post('id_po');
	   
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
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'"');
		$isi['kontent'] = "admin/stock_jadi/kontent_lihat";
		$this->load->view('admin/tampilan_home',$isi);
		
		
		}
		
		
		
		public function keluar_jadi(){
	$id=$this->input->post('id_po');
	$id_po_detail=$this->input->post('id_po_detail');
	$qty=$this->input->post('qty');
	$id_v=$this->input->post('id_v');
	$isi['idpo']=$this->input->post('id_po');
	$userinput=$this->session->userdata('nip');
	$tglinput=date('Y-m-d');
	$f=$this->db->query("SELECT * FROM tab_pengeluaran_jadi WHERE id_po='$id'
		                           AND id_po_detail='$id_po_detail' AND id='$id_v'")->num_rows();
	if($f>0){
	$this->db->query("DELETE FROM ibenk_pantri.tab_pengeluaran WHERE id_po='$id' AND id_po_detail='$id_po_detail' AND dasar='$id_v'");
	$this->db->query("DELETE FROM ibenk_pantri.tab_pengeluaran_jadi WHERE id_po='$id' AND id_po_detail='$id_po_detail' AND id='$id_v'");
	}else{
		$this->db->query("INSERT INTO ibenk_pantri.tab_pengeluaran_jadi VALUES
	('', '$userinput', '$tglinput', '', '', '', '$id_v', '$qty', 'SELESAI','$id', '$id_po_detail');");
	$this->db->query("INSERT INTO ibenk_pantri.tab_pengeluaran VALUES
	('', '$userinput', '$tglinput', '', '', '', '$id_v', '0', 'SELESAI','$id', '$id_po_detail');");
		}
	
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
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'"');
		$this->load->view("admin/stock_jadi/kontent_lihat",$isi);
		
		
		
		}
		
		
		
		
		
		public function po_keluar()
{
			$id=$this->input->post('id_po');
				$idpo=$this->input->post('id_po');
				   $isi['pro']=$this->model_view->title();
					$isi['title'] = $this->model_view->title();
					$isi['menu'] = $this->model_squrity->cekmenu();
					$isi['username'] = $this->session->userdata('user_name');
					$isi['level'] = $this->model_view->lev();
					$isi['log_sub'] = "";
					$isi['header'] = "admin/header";
					
					
					
			$this->db->query("UPDATE tab_po set stts='PRODUKSI' where id_po='$idpo'");
			
            
			$cari_detail = $this->db->query('SELECT
			    tab_po_detail.id_po_detail
			    , tab_jadi.nama
			    , tab_satuan.nama AS satuan
			    , tab_po_detail.id_jadi
				, tab_po_detail.qty
			FROM
			    ibenk_pantri.tab_po_detail
			    INNER JOIN ibenk_pantri.tab_jadi 
			        ON (tab_po_detail.id_jadi = tab_jadi.id_jadi)
			    INNER JOIN ibenk_pantri.tab_satuan 
			        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_po_detail.id_po="'.$id.'"');				
			foreach($cari_detail->result() as $row){
				$id_po_det = $row->id_po_detail;
				$userinput=$this->session->userdata('nip');
				$tglinput=date('Y-m-d');
				$qtypo = $row->qty;
				$car1=$this->db->query("SELECT
			                    tab_set_jadi.nama
			                    , tab_set_jadi.id_set_jadi
			                    , tab_satuan.nama AS satuan
			                    , tab_set_jadi.satuan_komposisi AS komposis
			                FROM
			                    ibenk_pantri.tab_set_jadi
			                    INNER JOIN ibenk_pantri.tab_satuan 
			                        ON (tab_set_jadi.satuan = tab_satuan.id_satuan) WHERE tab_set_jadi.jadi='$row->id_jadi';");
					$no1=1;
					
					foreach($car1->result() as $rod){
					  $car2=$this->db->query("SELECT
			    tab_jadi.nama
				,tab_mix.qty as komposisi
			    , tab_mix.id_jadi
			    , tab_satuan.nama AS satuan
			FROM
			    ibenk_pantri.tab_jadi
			    INNER JOIN ibenk_pantri.tab_mix 
			        ON (tab_jadi.id_jadi = tab_mix.id_jadi)
			    INNER JOIN ibenk_pantri.tab_satuan 
			        ON (tab_jadi.satuan = tab_satuan.id_satuan)
			      WHERE tab_mix.id_set_jadi='$rod->id_set_jadi' AND tab_mix.stts='AKTIF'        
			");

			 $no2=1; 
			 foreach($car2->result() as $rob){
				$qtykeluar=$rob->komposisi*$qtypo;
			
			$this->db->query("INSERT INTO ibenk_pantri.tab_pengeluaran VALUES
				('', '$userinput', '$tglinput', '', '', '', '$rob->id_jadi','$qtykeluar', 'AKTIF', '$idpo','$id_po_det'
				)");
			
							$tut=$this->db->query("select * from tab_pengeluaran_jadi 
							  where id_po='$idpo' AND stts='SELESAI' 
							   AND id_po_detail='$id_po_det'");
							  foreach($tut->result() as $tr){
								  echo $tr->id;
								  $idpodet=$tr->id_po_detail;
								  $idpoo=$tr->id_po;
								 $this->db->query("UPDATE tab_pengeluaran SET stts='SELESAI',qty='0' WHERE id_po='$idpoo' AND id_po_detail='$idpodet'");
								  }
								  

			 } 
			 
			  } }
     

 
	$this->session->set_flashdata('info','Data Sukses Keluar');
	redirect('admin/stock_jadi');
		}
		
public function check(){
	$id=$this->input->post('id');
	$car=$this->db->query('SELECT
   SUM(tab_stock_jadi.qty_terima) AS tot,
  tab_satuan.nama AS satuan,
     tab_jadi.id_jadi AS kode
   
FROM
    ibenk_pantri.tab_stock_jadi
    INNER JOIN ibenk_pantri.tab_jadi 
        ON (tab_stock_jadi.dasar = tab_jadi.id_jadi)
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan) WHERE tab_stock_jadi.stts="AKTIF" and tab_stock_jadi.dasar="'.$id.'" GROUP BY tab_stock_jadi.dasar ASC');
	foreach($car->result() as $row){
		if($row->tot>0){
			$data['qty']=$row->tot;
			$data['satuan']=$row->satuan;
			$data['dis']='';
			$this->load->view("admin/stock_jadi/kontent_form",$data);
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
			$no_qty_alsi=1;
			$no_id_pembelian=1;
			$no_id_pembelian_detail=1;
			$no_dasar=1;
			$userinput=$this->session->userdata('nip');
		     $tglinput=date('Y-m-d');
			for($i=1;$i<=$loop;$i++){
				$qty = $this->input->post('qty'.$no_qty++);
				$no_dasars = $this->input->post('no_dasar'.$no_dasar++);
				if($qty){
				$this->db->query("
INSERT INTO ibenk_pantri.tab_pengeluaran 
	
	VALUES
	('', 
	'$userinput', 
	'$tglinput', 
	'', 
	'', 
	'', 
	'$no_dasars', 
	'$qty', 
	'Aktif'
	)");
				}}
			
			
			
	
	$this->session->set_flashdata('info','Data Sukses Keluar');
	redirect('admin/stock_jadi');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */