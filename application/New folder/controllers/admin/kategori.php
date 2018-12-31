<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Kategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_kategori');
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
        $total_records = $this->model_kategori->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $isi["data"] = $this->model_kategori->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 $isi['total']=$total_records;
            $config['base_url'] = base_url() . 'index.php/admin/kategori/index';
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
		$isi['home_nav1'] = "DATA KATEGORI";
		$isi['home_nav2'] = "CARI DATA KATEGORI";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/kategori/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function cari(){
		$id=$this->input->post('id');
		$car=$this->db->query('select * from tab_kategori where nama like "'.$id.'%"');
		if($car->num_rows()>0){
			foreach($car->result() as $row){
				 if($row->stts=="NONAKTIF"){
						   $cals = "text-red";
						   }else{
							    $cals = "";
							   }
				echo '<li>';
				echo '<a class="'.$cals.'" onclick="page_detail('.$row->id_kategori.')">';
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
		$f = $this->db->query("SELECT * from tab_kategori where id_kategori='$id'");
		
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KATEGORI";
			foreach($f->result() as $rw){
								$isi['id_kategori']=$rw->id_kategori;
								$isi['kategori']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
								$stts = $rw->stts;
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH KATEGORI";
			                    $isi['id_kategori']="";
								$isi['stts']="AKTIF";
								$isi['kategori']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		$isi['f'] = $this->db->query("SELECT * from tab_kategori where id_kategori='$id'");
		$isi['btn']='<a href="#" class="btn glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="'.$id.'"
             ></a> ';
			 $isi['detail']='admin/kategori/detail';
	   $this->load->view("admin/kategori/form",$isi);
		
		}
	
	
	public function buka_form($id){
	
       $f = $this->db->query("SELECT * from tab_kategori where id_kategori='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KATEGORI";
			foreach($f->result() as $rw){
								$isi['id_kategori']=$rw->id_kategori;
								$isi['kategori']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH KATEGORI";
			                    $isi['id_kategori']="";
								$isi['stts']="AKTIF";
								$isi['kategori']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		$isi['btn']='';
		
		$isi['detail']='admin/kategori/blank';
	    
        $this->load->view('admin/kategori/form', $isi);
		
		}
	
	
	public function ss()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA KATEGORI NONAKTIF";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM tab_kategori WHERE stts ="NONAKTIF" ');
		$isi['kontent'] = "admin/kategori/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
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
		$f = $this->db->query("SELECT * from tab_kategori where id_kategori='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KATEGORI";
			foreach($f->result() as $rw){
								$isi['id_kategori']=$rw->id_kategori;
								$isi['kategori']=$rw->nama;
								$isi['stts']=$rw->stts;
								$isi['userinput']=$rw->userinput;
								$isi['userupdate']=$this->session->userdata('nip');
								$isi['tglinput']=$rw->tglinput;
								$isi['tglupdate']=date('Y-m-d');
			}
		}else{
			                    $isi['home_nav1'] = "TAMBAH KATEGORI";
			                    $isi['id_kategori']="";
								$isi['stts']="AKTIF";
								$isi['kategori']="";
								$isi['userinput']=$this->session->userdata('nip');
								$isi['userupdate']="";
								$isi['tglinput']=date('Y-m-d');
								$isi['tglupdate']="";
			}
		
	   $isi['kontent'] = "admin/kategori/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_kategori');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	id_kategori => $this->input->post('id_kategori'),
	nama =>$this->input->post('nama'),
	stts =>$this->input->post('stts'),
	userinput => $this->input->post('userinput'),
	userupdate => $this->input->post('userupdate'),
	tglinput => $this->input->post('tglinput'),
	tglupdate => $this->input->post('tglupdate')
	
	);
	if(!$nok){
		$this->db->insert('tab_kategori',$data);
		$this->session->set_flashdata('info','Data Sukses Di Tambah');
		}else{
			$this->db->where('id_kategori',$nok);
			$this->db->update('tab_kategori',$data);
		$this->session->set_flashdata('info','Data Sukses Di Update');
			}

	redirect('admin/kategori');
		
		}
	
	}
	
	public function deletekategori()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
			$rt=$this->db->query('select * from tab_kategori where id_kategori="'.$id.'"');
			foreach($rt->result() as $roe){
				if($roe->stts=="AKTIF"){
					$stts="NONAKTIF";
					}else{
						$stts="AKTIF";
						}
				}
		$this->db->query('UPDATE tab_kategori SET stts="'.$stts.'",userdelete="'.$nip.'",tgldelete="'.$tgl.'" WHERE id_kategori="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/kategori');
		}else{
			redirect('admin/kategori');
			}
	}
	
	
	
	
	public function sd($id)
	{
		$key = "Lokasi";
		
		if($key == "Lokasi"){
			$tgl=date('Y-m-d');
			$nip = $this->session->userdata('nip');
		$this->db->query('UPDATE tab_kategori SET stts="AKTIF" WHERE id_kategori="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Aktivkan Kembali');
		redirect('admin/kategori');
		}else{
			redirect('admin/kategori');
			}
	}
	
	
	
	public function updateKATEGORI()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$id_kategori = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_KATEGORI 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	id_kategori = '$id_kategori' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/KATEGORI');
	}else{
		redirect('admin/KATEGORI');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */