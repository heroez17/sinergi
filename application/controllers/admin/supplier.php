<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Supplier extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->ceksession('supplier');
		}
	public function index()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA SUPPLIER";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->get('tab_supplier');
		
		$isi['kontent'] = "admin/supplier/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function tambah($id)
	{   
	
	    $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$f = $this->db->query("SELECT * from tab_supplier where id_supplier='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT SUPPLIER";
			foreach($f->result() as $rw){
								$isi['id_supplier']=$rw->id_supplier;
								$isi['id_kategori']=$rw->id_kategori;
								$t=$this->db->query("select nama from tab_kategori where id_kategori='$rw->id_kategori'");
								foreach($t->result() as $rt){
									$isi['nama_s']=$rt->nama;
									}
								$isi['nama']=$rw->nama;
								$isi['sales']=$rw->sales;
								$isi['email']=$rw->email;
								$isi['alamat']=$rw->alamat;
								$isi['stts']=$rw->stts;
								$isi['phone']=$rw->phone;
								
								}
		}else{
			$isi['home_nav1'] = "TAMBAH SUPPLIER";
			                    $isi['id_supplier']="";
								$isi['id_kategori']="";
								$isi['nama']="";
								$isi['stts']="";
								$isi['sales']="";
								$isi['alamat']="";
								$isi['stts']="";
								$isi['nama_s']="";
								$isi['phone']="";
								$isi['email']="";
								}
		
	   $isi['kontent'] = "admin/supplier/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('id_supplier');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	id_supplier => $this->input->post('id_supplier'),
	id_kategori => $this->input->post('id_kategori'),
	nama =>$this->input->post('nama'),
	email =>$this->input->post('email'),
	sales =>$this->input->post('sales'),
	stts =>$this->input->post('stts'),
	alamat => $this->input->post('alamat'),
	phone => $this->input->post('phone')
	
	);
	if(!$nok){
		$this->db->insert('tab_supplier',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}else{
			$this->db->where('id_supplier',$nok);
			$this->db->update('tab_supplier',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			}

	redirect('admin/supplier');
		
		}
	
	}
	
	public function deletesupplier()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM tab_supplier WHERE id_supplier="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/supplier');
		}else{
			redirect('admin/supplier');
			}
	}
	public function updatekaryawan()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_supplier 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/supplier');
	}else{
		redirect('admin/supplier');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */