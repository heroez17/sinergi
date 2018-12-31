<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Faktur extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->ceksession('faktur');
		}
	public function index()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA FAKTUR";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_faktur.*
    , tab_pelanggan.nama AS cv
    , tab_pelanggan.alamat AS alamat
    , tab_pelanggan.jabatan AS ketua
FROM
    ibenk_kassir.tab_faktur
    INNER JOIN ibenk_kassir.tab_pelanggan 
        ON (tab_faktur.pelanggan = tab_pelanggan.nik)
		order by tgl_order desc');
		
		$isi['kontent'] = "admin/faktur/kontent";
		$this->load->view('admin/tampilan_home',$isi);
		
	}

	public function index_faktur($id)
	{   
	$idd=str_replace('F','/',$id);
	$isi['jdu']=$idd;
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA FAKTUR ".$idd;
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data1']=$this->db->query("select * from tab_trans where no_faktur='$idd'");
		$isi['data'] = $this->db->query('SELECT
    tab_faktur.*
    , tab_pelanggan.nama AS cv
    , tab_pelanggan.alamat AS alamat
    , tab_pelanggan.jabatan AS ketua
FROM
    ibenk_kassir.tab_faktur
    INNER JOIN ibenk_kassir.tab_pelanggan 
        ON (tab_faktur.pelanggan = tab_pelanggan.nik)
		where tab_faktur.no_faktur="'.$idd.'" order by tgl_order desc');
		$isi['faktur']=$this->db->query("select * from barang_jual where nofak='$idd' group by no_jual");
		$isi['kontent'] = "admin/faktur/kontent_faktur";
		$this->load->view('admin/tampilan_home',$isi);
		
	}

	public function tutup($id)
	{   
	$idd=str_replace('F','/',$id);
	$this->db->query("update tab_faktur set stts='LUNAS' where no_faktur='$idd'");
	$this->session->set_flashdata('info','Faktur Sukses di Tutup');
	    redirect('admin/faktur');
	}
	
	public function bayarkredit()
	{   
	$id=$this->input->post("no_faktur");
	$nama=$this->input->post("nama");
	$nominal=str_replace('.','',$this->input->post("nominal"));	
	$tgl=date('Y-m-d');
	$no='BY'.date("ymdhis");
	$idd=str_replace('/','F',$id);
	$this->db->query("INSERT INTO ibenk_kassir.tab_trans 
	VALUES
	('$no', 
	'$id', 
	'$nama', 
	'$tgl', 
	'$nominal'
	);");
	$total=$this->model_view->getnotajumlah($id);
	$sudah=$this->model_view->sudahbayar($id);
	if($sudah>=$total){
		$this->db->query("update tab_faktur set stts='LUNAS' where no_faktur='$id'");
		
		}
	
	$this->session->set_flashdata('info','Sukses');
	    redirect('admin/faktur/index_faktur/'.$idd);
	}

	public function deletekredit($id,$idd)
	{   
	$this->db->query("delete from tab_trans where no_transaksi='$id'");
	$tt=str_replace('F','/',$idd);
	$total=$this->model_view->getnotajumlah($tt);
	$sudah=$this->model_view->sudahbayar($tt);
	if($sudah<$total){
		$this->db->query("update tab_faktur set stts='KREDIT' where no_faktur='$tt'");
		
		}
	$this->session->set_flashdata('info','Sukses Didelete');
	    redirect('admin/faktur/index_faktur/'.$idd);
	}

public function printkredit($id,$idd)
	{   
	$isi['id']=$id;
	$isi['idd']=$idd;
	$iff=str_replace('F','/',$idd);
	$isi['pro']=$this->model_view->title();
	if($id=="h"){
	$isi['data']=$this->db->query("select * from tab_trans where no_faktur='$iff'");
	}else{
		$isi['data']=$this->db->query("select * from tab_trans where no_transaksi='$id'");
		}
	$this->load->view('admin/faktur/print',$isi);
	    //redirect('admin/faktur/index_faktur/'.$idd);
	}


	public function dit(){
		$idd=$this->input->post('aa');
				$isi['data'] = $this->db->query('SELECT
    tab_faktur.*
    , tab_pelanggan.nama AS cv
    , tab_pelanggan.alamat AS alamat
    , tab_pelanggan.jabatan AS ketua
FROM
    ibenk_kassir.tab_faktur
    INNER JOIN ibenk_kassir.tab_pelanggan 
        ON (tab_faktur.pelanggan = tab_pelanggan.nik)
		where tab_faktur.no_faktur="'.$idd.'"
		order by tgl_order desc');
		$this->load->view('admin/faktur/ajax',$isi);
		}
		
public function simpanedit(){
	$no_faktur=$this->input->post('no_faktur');
	$pelanggan=$this->input->post('pelanggan');
	$this->db->query("update tab_faktur set pelanggan='$pelanggan' where no_faktur='$no_faktur'");
    		$this->session->set_flashdata('info','Data Sukses Di Edit');

	redirect('admin/faktur');
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
		$f = $this->db->query("SELECT
    tab_faktur.*
    , tab_pelanggan.nama
    , tab_pelanggan.alamat
FROM
    ibenk_kassir.tab_faktur
    INNER JOIN ibenk_kassir.tab_pelanggan 
        ON (tab_faktur.pelanggan = tab_pelanggan.nik)
        WHERE tab_faktur.no_faktur='$id';");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT FAKTUR";
			foreach($f->result() as $rw){
								$isi['no_faktur']=$rw->no_faktur;
								$isi['nama']=$rw->nama;
								$isi['alamat']=$rw->alamat;
								$isi['tgl_order']=$rw->tgl_order;
								$isi['stts']=$rw->stts;
								}
		}else{
			$isi['home_nav1'] = "TAMBAH FAKTUR";
			
								$isi['no_faktur']=$this->model_view->getkodefaktur();
								$isi['nama']="";
								$isi['alamat']="";
								$isi['tgl_order']=date("Y-m-d");
								$isi['stts']="";
			}
		
	   $isi['kontent'] = "admin/faktur/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('nik');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	no_faktur => $this->model_view->getkodefaktur(),
	tgl_order =>date("Y-m-d"),
	pelanggan => $this->input->post('pelanggan'),
	stts=>"KREDIT"
	);
	
		$this->db->insert('tab_faktur',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			

	redirect('admin/faktur');
		
		}
	
	}
	
	public function download_barang_faktur(){
	   $tgl=$this->input->post('tgl');
	   $tgl1=$this->input->post('tgl1');
	   $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA FAKTUR ".$tgl." s/d ".$tgl1;
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT
    tab_faktur.*
    , tab_pelanggan.nama AS cv
    , tab_pelanggan.alamat AS alamat
    , tab_pelanggan.jabatan AS ketua
FROM
    ibenk_kassir.tab_faktur
    INNER JOIN ibenk_kassir.tab_pelanggan 
        ON (tab_faktur.pelanggan = tab_pelanggan.nik)
		where tab_faktur.tgl_order between "'.$tgl.'" and "'.$tgl1.'" order by tgl_order desc');
		//$isi['faktur']=$this->db->query("select * from barang_jual where  group by no_jual");
		//$isi['kontent'] = "admin/faktur/kontent_faktur";
		$this->load->view('admin/faktur/lapor',$isi);
		
		}
	
	
	public function deletefaktur()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM tab_faktur WHERE no_faktur="'.$id.'"');
		$this->db->query('DELETE FROM barang_jual WHERE nofak="'.$id.'"');
		$this->db->query('DELETE FROM tab_trans WHERE no_faktur="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('admin/faktur');
		}else{
			redirect('admin/faktur');
			}
	}
	public function updatefaktur()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_faktur 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('admin/faktur');
	}else{
		redirect('admin/faktur');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */