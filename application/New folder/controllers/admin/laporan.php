<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Laporan extends CI_Controller {

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
		$isi['home_nav1'] = "DATA ANTRIAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['kontent'] = "admin/lapor/kontent";
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
		$f = $this->db->query("SELECT * from tab_karyawan where nik='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KARYAWAN";
			foreach($f->result() as $rw){
								$isi['nik']=$rw->nik;
								$isi['nama']=$rw->nama;
								$isi['alamat']=$rw->alamat;
								$isi['jk']=$rw->jk;
								$isi['phone']=$rw->phone;
								
								$isi['jabatan']=$rw->jabatan;
								$isi['tem_lah']=$rw->tem_lah;
								$isi['tgl_lah']=$rw->tgl_lah;}
		}else{
			$isi['home_nav1'] = "TAMBAH KARYAWAN";
			                    $isi['nik']="";
								$isi['nama']="";
								$isi['alamat']="";
								$isi['jk']="";
								$isi['phone']="";
								$isi['id_cabang']="";
								$isi['jabatan']="";
								$isi['tem_lah']="";
								$isi['tgl_lah']="";
			}
		
	   $isi['kontent'] = "admin/karyawan/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('nik');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	nik => $this->input->post('nik'),
	nama =>$this->input->post('nama'),
	alamat => $this->input->post('alamat'),
	jk => $this->input->post('jk'),
	phone => $this->input->post('phone'),
	jabatan => $this->input->post('jabatan'),
	tem_lah => $this->input->post('tem_lah'),
	tgl_lah => $this->input->post('tgl_lah')
	);
	if(!$nok){
		$this->db->insert('tab_karyawan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}else{
			$this->db->where('nik',$nok);
			$this->db->update('tab_karyawan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			}

	redirect('admin/karyawan');
		
		}
	
	}
	
	public function deletekaryawan()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM tab_karyawan WHERE nik="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/karyawan');
		}else{
			redirect('admin/karyawan');
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
UPDATE db_tamu.tab_karyawan 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/karyawan');
	}else{
		redirect('admin/karyawan');
		
		}
	
	}
	
	public function checkk(){
		$tgl1=$this->input->post('id');
		$tgl2=$this->input->post('id1');
		$data['data']=$this->db->query("SELECT 	id, urut, tgl, jam, stts, 
	cs FROM tab_antri WHERE tgl BETWEEN '$tgl1' AND '$tgl2'");
	$data['jumlah']=$this->db->query("SELECT 	id, urut, tgl, jam, stts, 
	cs FROM tab_antri WHERE tgl BETWEEN '$tgl1' AND '$tgl2'")->num_rows();
	$this->load->view('admin/lapor/table',$data);
		}
		
		public function reste(){
			$car = $this->db->get('tab_antri')->num_rows();
			$this->db->query('delete from tab_antri');
			echo "<h2>".$car. " DATA ANTRIAN TERHAPUS </h2>";
			}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */