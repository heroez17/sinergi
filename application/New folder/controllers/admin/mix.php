<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Mix extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_mix');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->load->library('pagination');
        $this->load->helper('url');
		}
	public function index()
	{   
	$isi = array();
        $limit_per_page = 5;
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $total_records = $this->model_mix->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $isi["data"] = $this->model_mix->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'index.php/admin/mix/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            	$config["full_tag_open"] = '<ul class="pagination">';
				$config["full_tag_close"] = '</ul>';	
				$config["first_link"] = "<i class='fa fa-chevron-left'></i>";
				$config["first_tag_open"] = "<li>";
				$config["first_tag_close"] = "</li>";
				$config["last_link"] = "<i class='fa fa-chevron-right'></i>";
				$config["last_tag_open"] = "<li>";
				$config["last_tag_close"] = "</li>";
				$config['next_link'] = "<i class='fa fa-chevron-circle-right'></i>";
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '<li>';
				$config['prev_link'] = "<i class='fa fa-chevron-circle-left'></i>";
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '<li>';
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $isi["links"] = $this->pagination->create_links();
        }
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA MIX BAHAN";
		$isi['home_nav2'] = "CARI DATA MIX BAHAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/mix/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function cari(){
		$id=$this->input->post('id');
		$car=$this->db->query('select * from tab_jadi where nama like "'.$id.'%"');
		if($car->num_rows()>0){
			$ri="'";
			foreach($car->result() as $row){
				echo '<li>';
				echo '<a onclick="page_detail('.$ri.$row->id_jadi.$ri.')">';
				echo $row->nama;
				echo '</a>';
				echo '</li>';
				}
			}else{
				echo '<li>';
				echo '<a>';
				echo $id.' Tidak Ditemukan';
				echo '</a>';
				echo '</li>';
				}
		
		
		}
	
	
	public function detail_data(){
		$id=$this->input->post('id');
		$caride=$this->db->query("select nama,id_jadi from tab_jadi where id_jadi='$id'");
		foreach($caride->result() as $ro){
			$isi['p'] = $ro->nama;
			}
	   $isi['setengah']=$this->db->query("SELECT
	   tab_set_jadi.id_set_jadi,
	   tab_set_jadi.satuan_komposisi,
    tab_set_jadi.nama
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_set_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_set_jadi.satuan = tab_satuan.id_satuan) where tab_set_jadi.jadi='$id'");
	   $isi['jumlah_set']=$this->db->query("select * from tab_set_jadi where jadi='$id'")->num_rows();
	   $this->load->view("admin/mix/form",$isi);
		
		}
		
		public function detail_data2(){
		$id=$this->input->post('id');
		$setengah=$this->db->query("select * from tab_set_jadi where id_set_jadi='$id'");
		
		foreach($setengah->result() as $ro){
			$isi['p'] = $ro->nama;
			$isi['idjad'] = $ro->jadi;
			$isi['id'] = $ro->id_set_jadi;
			}
	   $isi['jumlah_set']=$this->db->query("SELECT
    tab_mix.id_mix
	,tab_mix.stts
    , tab_dasar.id_dasar
    , tab_dasar.nama AS dasar
    , tab_satuan.nama AS satuan
    , tab_mix.qty
FROM
    ibenk_pantri.tab_satuan
    INNER JOIN ibenk_pantri.tab_dasar 
        ON (tab_satuan.id_satuan = tab_dasar.satuan)
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar) WHERE tab_mix.id_set_jadi='$id'");
	   $this->load->view("admin/mix/form2",$isi);
		
		}
		
		
		
		public function detail_data22(){
		$id=$this->input->post('id');
		$stts=$this->input->post('stts');
		$setengah=$this->db->query("select * from tab_set_jadi where id_set_jadi='$id'");
		if($setengah->num_rows()>0){
		foreach($setengah->result() as $ro){
			$isi['p'] = $ro->nama;
			$isi['idjad'] = $ro->jadi;
			$isi['id'] = $ro->id_set_jadi;
			}}else{
				$isi['p'] = "";
			$isi['idjad'] = "";
			$isi['id'] = "";
				}
	   $isi['jumlah_set']=$this->db->query("SELECT
    tab_mix.id_mix
	,tab_mix.stts
    , tab_dasar.id_dasar
    , tab_dasar.nama AS dasar
    , tab_satuan.nama AS satuan
    , tab_mix.qty
FROM
    ibenk_pantri.tab_satuan
    INNER JOIN ibenk_pantri.tab_dasar 
        ON (tab_satuan.id_satuan = tab_dasar.satuan)
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar) WHERE tab_mix.id_set_jadi='$id' AND tab_mix.stts='$stts'");
	   $this->load->view("admin/mix/form2",$isi);
		
		}
		
		
public function page_baru(){
	$isi['id']=$this->input->post('id');
	$isi['bahan']=$this->db->query("select * from tab_dasar");
	$this->load->view("admin/mix/baru",$isi);
	
	}
	
public function satuan(){
	$id=$this->input->post('id');
	$isi['bahan']=$this->db->query("SELECT
    tab_dasar.id_dasar
    , tab_satuan.nama 
FROM
    ibenk_pantri.tab_dasar
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_dasar.satuan = tab_satuan.id_satuan) WHERE tab_dasar.id_dasar='$id';");
	$this->load->view("admin/mix/baru_satuan",$isi);
	
	}	
	
	public function buka_form($id){
	
       $f = $this->db->query("SELECT * from tab_mix where id_mix='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT mix";
			foreach($f->result() as $rw){
								$isi['id_mix']=$rw->id_mix;
								$isi['mix']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH mix";
			                    $isi['id_mix']="";
								$isi['stts']="AKTIF";
								$isi['mix']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		$isi['btn']='';
		
		$isi['detail']='admin/mix/blank';
	    
        $this->load->view('admin/mix/form', $isi);
		
		}
	
	
	
	public function tambah($id)
	{   
	
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$f = $this->db->query("SELECT * from tab_mix where id_mix='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT mix";
			foreach($f->result() as $rw){
								$isi['id_mix']=$rw->id_mix;
								$isi['mix']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH mix";
			                    $isi['id_mix']="";
								$isi['stts']="AKTIF";
								$isi['mix']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/mix/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		
$id_set_jadi = $this->input->post('id_set_jadi');
$id_dasar = $this->input->post('id_dasar');
$qty = $this->input->post('qty');
$username = $this->session->userdata('nip');
$tgl=date("Y-m-d");
$this->db->query("
INSERT INTO ibenk_pantri.tab_mix VALUES
	('', 
	'$id_dasar', 
	'$username', 
	'', 
	'$tgl', 
	'', 
	'', 
	'', 
	'AKTIF', 
	'$id_set_jadi', 
	'$qty'
	);
");

	$setengah=$this->db->query("select * from tab_set_jadi where id_set_jadi='$id_set_jadi'");
		
		foreach($setengah->result() as $ro){
			$isi['p'] = $ro->nama;
			$isi['id'] = $ro->id_set_jadi;
			$isi['idjad'] = $ro->jadi;
			}
	   $isi['jumlah_set']=$this->db->query("SELECT
    tab_mix.id_mix
	,tab_mix.stts
    , tab_dasar.id_dasar
    , tab_dasar.nama AS dasar
    , tab_satuan.nama AS satuan
    , tab_mix.qty
FROM
    ibenk_pantri.tab_satuan
    INNER JOIN ibenk_pantri.tab_dasar 
        ON (tab_satuan.id_satuan = tab_dasar.satuan)
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar) WHERE tab_mix.id_set_jadi='$id_set_jadi'");
	   $this->load->view("admin/mix/form2",$isi);
		
		
	
	}
	
	public function hapus()
	{
		
$id_mix = $this->input->post('id_mix');
$id_set_jadi = $this->input->post('id_dasar');

$username = $this->session->userdata('nip');
$tgl=date("Y-m-d");
$car=$this->db->query('select * from tab_mix where id_mix="'.$id_mix.'"');
foreach($car->result() as $row){
	$stts=$row->stts;
	}
if($stts=="AKTIF"){
	$istts = "NONAKTIF";
	}else{
		$istts = "AKTIF";
		}	
$this->db->query("UPDATE ibenk_pantri.tab_mix 
	SET userdelete = '$username' , 
	tgldelete = '$tgl' , 
	stts = '$istts' 
	WHERE
	id_mix = '$id_mix'");

	$setengah=$this->db->query("select * from tab_set_jadi where id_set_jadi='$id_set_jadi'");
		
		foreach($setengah->result() as $ro){
			$isi['p'] = $ro->nama;
			$isi['id'] = $ro->id_set_jadi;
			$isi['idjad'] = $ro->jadi;
			}
	   $isi['jumlah_set']=$this->db->query("SELECT
    tab_mix.id_mix
	,tab_mix.stts
    , tab_dasar.id_dasar
    , tab_dasar.nama AS dasar
    , tab_satuan.nama AS satuan
    , tab_mix.qty
FROM
    ibenk_pantri.tab_satuan
    INNER JOIN ibenk_pantri.tab_dasar 
        ON (tab_satuan.id_satuan = tab_dasar.satuan)
    INNER JOIN ibenk_pantri.tab_mix 
        ON (tab_dasar.id_dasar = tab_mix.id_dasar) WHERE tab_mix.id_set_jadi='$id_set_jadi'");
	   $this->load->view("admin/mix/form2",$isi);
		
		
	
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_mix SET stts="AKTIF" WHERE id_mix="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/mix');
		}else{
			redirect('admin/mix');
			}
	}
	
	
	
	public function updatemix()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_mix = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_mix 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_mix = '$id_mix' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/mix');
	}else{
		redirect('admin/mix');
		
		}
	
	}

public function printt(){
	$id=$this->input->post('id_jadi');
	$stts=$this->input->post('stts');
	if($id){
		$kriteria="WHERE tab_jadi.id_jadi LIKE '$id%'";
		if($stts){
			$status="AND tab_jadi.stts LIKE '$stts%'";
			}else{
				$status="";
				}
		
		}else{
			$kriteria="";
			if($stts){
			$status="WHERE tab_jadi.stts ='$stts'";
			}else{
				$status="";
				}
			
			}
	$isi['table']=$this->db->query('SELECT
    tab_jadi.*
    , tab_satuan.nama AS satuan
FROM
    ibenk_pantri.tab_jadi
    INNER JOIN ibenk_pantri.tab_satuan 
        ON (tab_jadi.satuan = tab_satuan.id_satuan)

'.$kriteria.' '.$status);
	$this->load->view('admin/mix/lapor',$isi);
	
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */