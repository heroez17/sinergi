<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
class Barang_etls extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url'); 
        $this->load->helper('html'); 
		 $this->load->library('PHPExcel');
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
				$this->load->model('model_laporan');
		$this->model_squrity->ceksession('barang_etls');
				}
	public function index()
	{   
	redirect('admin/barang_etls/kasir');
	}
	
	
	public function Laporan()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA LAPORAN KASIR";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('
SELECT 	no_keluar, 
	tanggal, 
	id_barang, 
	harga_beli, 
	harga_jual, 
	qty, 
	qty_isi, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_gdg_keluar GROUP BY id_barang
	
');
		
		$isi['kontent'] = "admin/barang_etls/kontent_laporan";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	public function titipan()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA BARANG TITIPAN";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM 
	ibenk_kassir.barang_gdg_titipan');
		
		$isi['kontent'] = "admin/barang_etls/kontent_titipan";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	public function Kembali($no_tr)
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "RETURN BARANG TITIPAN";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['data'] = $this->db->query('SELECT * FROM 
	ibenk_kassir.barang_gdg_titipan');
	$tanggal=date('Y-m-d');
	$isi['data1'] = $this->db->query('SELECT * FROM barang_titipan_datang WHERE no_terima="'.$no_tr.'"');
		
		$isi['kontent'] = "admin/barang_etls/form_return";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	public function lihtano_terima(){
		$tgl=$this->input->post('tanggal');
		$isi['data']=$this->db->query("select * from barang_titipan_datang where tanggal='$tgl' group by no_terima");
		$this->load->view('admin/barang_etls/form_muncul_return',$isi);
		}
	
	
	public function tambah_kedtangan()
	{   
	
	     $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "TERIMA BARANG TITIPAN";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$kode=$this->model_view->getkodeterimatitip();
		$isi['data'] = $this->db->query('SELECT *
	FROM 
	ibenk_kassir.barang_titipan_datang where stts="PROSES" and no_terima="'.$kode.'"

');
		
		$isi['kontent'] = "admin/barang_etls/form_terima";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	
	public function kasir()
	{   
	$idkk=$this->uri->segment(4);
	
	   $isi['pro']=$this->model_view->title();
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['nofak'] = str_replace('F','/',$idkk);
		$isi['home_nav'] = "";
		if($idkk==""){
			$isi['baca']="TRANSAKSI CASH";
			}
		else{
			$isi['baca']="TRANSAKSI KREDIT ".str_replace('F','/',$idkk);
			}
		
		$isi['home_nav1'] = "KASIR";
		$isi['menu'] = "admin/menu";
		$isi['username'] = $this->session->userdata('user_name');
		$isi['listmenu'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "admin/header";
		$isi['no_faktur'] = $this->model_view->getkodepesan();
		
$this->db->where("stts","AKTIF");
$isi['dati'] = $this->db->get('barang_gdg');
		$isi['kontent'] = "admin/barang_etls/form_keluar";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	public function keluarck(){
		$a=$this->input->post('id_supplier');
		$nofuk=$this->input->post('nofak');
		$nooo=str_replace('/','F',$nofuk);
		$optradio=$this->input->post('optradio');
		$kode=$this->model_view->getkodeKasir();
		$isi['id_supplier']=$this->input->post('id_supplier');
		$data=$this->db->query("SELECT * FROM barang_gdg WHERE id_barang='$a' AND stts='AKTIF'");
		$tanggal=date('Y-m-d');
		$user=$this->session->userdata('user_name');
		foreach($data->result() as $row){
		$id_barang=$row->id_barang;
		$id_satuan_gudang=$row->id_satuan_gudang;
		$id_satuan_pcs=$row->id_satuan_pcs;
		$harga_jual_gudang=$row->harga_jual_gudang;
		$harga_jual_pcs=$row->harga_jual_pcs;
			if($optradio=="etalase"){
				$harga = $harga_jual_pcs;
				$satuan=$this->model_view->satuan($id_satuan_pcs);
				$jenis="pcs";
				}else{
					$harga = $harga_jual_gudang;
					$satuan=$this->model_view->satuan($id_satuan_gudang);
					$jenis="gudang";
					}
	    		$this->db->query("INSERT INTO ibenk_kassir.barang_jual 
	VALUES
	('$kode', 
	'$tanggal', 
	'$id_barang', 
	'$harga', 
	'1', 
	'PROSES', 
	'$satuan', 
	'$user', 
	'$jenis',
	'',
	'$nofuk'
	);");
			
			
			
			}
		
		
		
		
		
		
			$isi['data']=$this->db->query("SELECT no_jual, 
	tanggal, 
	id_barang, 
	harga_jual, 
	sum(qty) as qty, 
	stts, 
	satuan, 
	usr_input,
	nofak
	 
	FROM 
	ibenk_kassir.barang_jual WHERE no_jual
	='$kode' AND stts='PROSES' GROUP BY id_barang,harga_jual,jenis");
		$this->load->view('admin/barang_etls/form_keluar_jual',$isi);
		}
		
public function delte(){
	$a=$this->input->post('id_supplier');
	$b=$this->input->post('tanggal');
	$this->db->query("delete from barang_jual 
	where id_barang='$a' AND stts='PROSES' AND tanggal='$b'
");

$kode=$this->model_view->getkodeKasir();
$isi['data']=$this->db->query("SELECT no_jual, 
	tanggal, 
	id_barang, 
	harga_jual,
	sum(qty) as qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual WHERE no_jual
	='$kode' AND stts='PROSES' GROUP BY id_barang,harga_jual ");
$this->db->query("delete from barang_gdg_keluar 
	where id_barang='$a' AND no_keluar='$kode'
");


		$this->load->view('admin/barang_etls/form_keluar_jual',$isi);


	}


	public function jual(){
	    $id=$this->input->post('id');
		$ket=$this->input->post('ket');
		$isi['bayar']=$this->input->post('bayar');
		$isi['ket']=$this->input->post('ket');
		$isi['pro']=$this->model_view->title();
		$this->db->query("update barang_jual set stts='SELESAI',ket='$ket' WHERE no_jual='$id'");
		$this->db->query("update barang_gdg_keluar set stts='SELESAI' WHERE no_keluar='$id'");
		$isi['data']=$this->db->query("SELECT no_jual, 
	tanggal, 
	id_barang, 
	harga_jual,
	sum(qty) as qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual WHERE no_jual
	='$id' GROUP BY id_barang,harga_jual");
		$isi['itemss']=$this->db->query("select * from barang_jual where no_jual='$id'")->num_rows();
		$isi['id']=$id;
		$this->load->view('admin/barang_etls/print',$isi);
		
		
		}		
		
		
		
		public function printlagi(){
	    $id=$this->input->post('id');
		$isi['bayar']=$this->input->post('bayar');
		$isi['pro']=$this->model_view->title();
		$isi['data']=$this->db->query("SELECT no_jual, 
	tanggal, 
	id_barang, 
	harga_jual,
	sum(qty) as qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual WHERE no_jual
	='$id' GROUP BY id_barang,harga_jual");
		$isi['itemss']=$this->db->query("select * from barang_jual where no_jual='$id'")->num_rows();
		$a=$this->db->query("select * from barang_jual where no_jual='$id'")->num_rows();
		$isi['id']=$id;
		if($a>0){
		$this->load->view('admin/barang_etls/print',$isi);
		}else{
			$this->session->set_flashdata('info','<h2>ID tidak ditemukan</h2>');
			redirect("admin/barang_etls/kasir/");
			
			}
		
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
		$f = $this->db->query("SELECT * from barang_gdg_titipan where id_barang='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT BARANG TITIPAN";
			foreach($f->result() as $rw){
								$isi['id_barang']=$rw->id_barang;
								$isi['dis']='readonly="readonly"';
								$isi['id_satuan']=$rw->satuan;
								$t=$this->db->query("select nama from tab_satuan where id_satuan='$rw->satuan'");
								foreach($t->result() as $rt){
									$isi['nama_s']=$rt->nama;
									}
								$isi['nama']=$rw->nama;
								$isi['nama_su']=$rw->supplier;
								//$isi['harga_jual']=$rw->harga_jual;
								//$isi['harga_beli']=$rw->harga_beli;
								//$isi['qty']=$rw->qty;
								
								
								
								
								
								}
		}else{
			$isi['home_nav1'] = "TAMBAH BARANG TITIPAN";
			                    $isi['id_barang']="";
								  $isi['harga_jual']="";
								    $isi['harga_beli']="";
								$isi['id_satuan']="";
								$isi['dis']='';
								$isi['nama']="";
								$isi['stts']="";
								$isi['id_supplier']="";
								$isi['nama_su']="";
								$isi['stts']="";
								$isi['nama_s']="";
								$isi['qty']="";
								$isi['email']="";
								}
		
	   $isi['kontent'] = "admin/barang_etls/form";
		$this->load->view('admin/tampilan_home',$isi);
		
	}
	
	
	
	public function simpan_titipan()
	{
		$nok = $this->input->post('id_barang');
	$key = $this->input->post('lokasi');
	$user=$this->session->userdata('user_name');
	if($key=="Lokasi")
	{  
	$data = array(
	tanggal=>date('Y-m-d'), 
	
	//harga_beli=> $this->input->post('harga_beli'), 
	//harga_jual=>$this->input->post('harga_jual'),
	//qty=>$this->input->post('qty'),
	
	usr_input=>$user, 
	
	id_barang => $this->input->post('id_barang'),
	satuan => $this->input->post('id_satuan'),
	nama =>$this->input->post('nama'),
	supplier =>$this->input->post('id_supplier')
	
	
	);
	
	
		$t=$this->db->query('select id_barang from barang_gdg_titipan where id_barang="'.$nok.'"')->num_rows();
	if($t>0){
		$this->db->where('id_barang',$nok);
		$this->db->update('barang_gdg_titipan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Edit');
		}else{
		$this->db->insert('barang_gdg_titipan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}
		
		
		
			

	redirect('admin/barang_etls/titipan');
		
		}}
		
		public function ck(){
		$a=$this->input->post('id_barang');
		$t=$this->db->query('select id_barang from barang_gdg where id_barang="'.$a.'"')->num_rows();
		$o=$this->db->query('select id_barang from barang_gdg_titipan where id_barang="'.$a.'"')->num_rows();
		echo $t+$o;
		}
	public function keluardetail(){
		$id_barang=$this->input->post('id_supplier');
		$h=$this->db->query("select * from barang_gdg_titipan where id_barang='$id_barang' ");
		foreach($h->result() as $row){
		$isi['id_barang']=$row->id_barang;
		$isi['nama']=$row->nama;
		$isi['satuan']=$this->model_view->satuan($row->satuan);;	
			}
				$this->load->view("admin/barang_etls/form_muncul",$isi);
		
		}
		
		public function keluardetailretrun(){
		$id_barang=$this->input->post('id_supplier');
		$isi['data']=$this->db->query("SELECT * FROM 
	ibenk_kassir.barang_titipan_datang where no_terima='$id_barang' 
");	
$isi['jmlh']=$this->db->query("SELECT * FROM 
	ibenk_kassir.barang_titipan_datang where no_terima='$id_barang' 
")->num_rows();	
			
				$this->load->view("admin/barang_etls/form_muncul_return_detail",$isi);
		
		}
		
		public function simpanreturn(){
		$id_barang=$this->input->post('id_barang');
		$qty_return=$this->input->post('qty_return');
		$no_terima=$this->input->post('no_terima');
		$qty=$this->input->post('qty_rr');
		$hasil_qty=$qty-$qty_return;
		if($qty>=$qty_return){
		$this->db->query("
UPDATE ibenk_kassir.barang_titipan_datang 
	SET
	qty = '$hasil_qty' , 
	qty_return = '$qty_return' 
	WHERE
	no_terima = '$no_terima' AND 
	id_barang = '$id_barang';
 ");
	
		
		}else{
			$this->session->set_flashdata('info','Qty Return lebih besar, silahkan cek kembali');
			}
redirect('admin/barang_etls/kembali/'.$no_terima);	
		
		}
   
     public function simpan_terima_titipan()
	{
		$nok = $this->input->post('id_barang');
	$key = $this->input->post('lokasi');
	$user=$this->session->userdata('user_name');
	$harga_jual=$this->input->post('harga_jual');
	$harga_beli=$this->input->post('harga_beli');
	$qty=$this->input->post('qty');
	$no_terima=$this->model_view->getkodeterimatitip();
		
	
	
	if($key=="Lokasi")
	{  
	$data = array(
	
	'no_terima'=>$no_terima, 
	'tanggal'=>date('Y-m-d'), 
	'id_barang'=>$nok, 
	'harga_beli'=>$harga_beli, 
	'harga_jual'=>$harga_jual, 
	'qty'=>$qty, 
	'qty_return'=>'', 
	'stts'=>'PROSES', 
	'usr_input'=>$user
 );
	
	
		$this->db->insert('barang_titipan_datang',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		
	redirect('admin/barang_etls/tambah_kedtangan');
		
		}}
	
public function delete_keluar($id,$od){
	
	$this->db->query("delete from barang_titipan_datang where id_barang='$id' and no_terima='$od' and stts='PROSES'");
	redirect('admin/barang_etls/tambah_kedtangan');
	}
public function kirim_keluar($id){
	
	$this->db->query("update barang_titipan_datang set stts='SELESAI' where no_terima='$id'");
	$isi["data"]=$this->db->query("select * from barang_titipan_datang where no_terima='$id'");
//	redirect('admin/barang_etls/titipan');
     $isi['pro']=$this->model_view->title();
	 $isi['id']=$id;
	$this->load->view("admin/barang_etls/print_titip",$isi);
	}


public function keluarck2(){
		$a=$this->input->post('id_supplier');
		$optradio=$this->input->post('optradio');
		$kode=$this->model_view->getkodeKasir();
		$nofak=$this->input->post('no_faktur');
		$nooo=str_replace('/','F',$nofak);
		$isi['id_supplier']=$this->input->post('id_supplier');
		$data=$this->db->query("SELECT * FROM barang_gdg WHERE id_barang='$a'");
		$tanggal=date('Y-m-d');
		$qty=$this->input->post('qty');
		$user=$this->session->userdata('user_name');
		foreach($data->result() as $row){
		$id_barang=$row->id_barang;
		$id_satuan_gudang=$row->id_satuan_gudang;
		$id_satuan_pcs=$row->id_satuan_pcs;
		$harga_jual_gudang=$row->harga_jual_gudang;
		$harga_jual_pcs=$row->harga_jual_pcs;
			if($optradio=="etalase"){
				$harga = $harga_jual_pcs;
				$satuan=$this->model_view->satuan($id_satuan_pcs);
				$jenis="pcs";
				}else{
					$harga = $harga_jual_gudang;
					$satuan=$this->model_view->satuan($id_satuan_gudang);
					$jenis="gudang";
					}
	    		$this->db->query("INSERT INTO ibenk_kassir.barang_jual 
	VALUES
	('$kode', 
	'$tanggal', 
	'$id_barang', 
	'$harga', 
	'$qty', 
	'PROSES', 
	'$satuan', 
	'$user', 
	'$jenis',
	'',
	'$nofak'
	);");
			
			
			
			}
		
		
		
		
		
		
			$isi['data']=$this->db->query("SELECT no_jual, 
	tanggal, 
	id_barang, 
	harga_jual, 
	sum(qty) as qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual WHERE no_jual
	='$kode' AND stts='PROSES' GROUP BY id_barang,harga_jual,jenis");
		//$this->load->view('admin/barang_etls/form_keluar_jual',$isi);
		
		redirect('admin/barang_etls/kasir/'.$nooo);
		}


public function printtest(){
	
	try {
    // Enter the device file for your USB printer here
    // You can check the tutorial here: https://mike42.me/blog/2015-03-getting-a-usb-receipt-printer-working-on-linux
    $connector = new FilePrintConnector("/dev/usb/lp0");
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer -> text("Hello World!\n");
    $printer -> cut();
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
	}


public function download_kasir(){
			$tgl=$this->input->post('tgl');
			$tgl1=$this->input->post('tgl1');
			$admin=$this->input->post('user');
			$tglx=$this->input->post('tgl').' 01:00:00';
		$tgl1x=$this->input->post('tgl1').' 24:00:00';
			
			$d=$this->input->post('d');
			if($d=="Download"){
		$this->model_laporan->download_kasir($tgl,$tgl1,$admin);
			}else{
				$isi['data']=$this->db->query("SELECT no_jual, 
			COUNT(no_jual) AS tot,
			LEFT(tanggal,10) AS tgl,
	tanggal, 
	id_barang, 
	harga_jual, 
	qty, 
	stts, 
	satuan, 
	usr_input
	 
	FROM 
	ibenk_kassir.barang_jual  WHERE tanggal BETWEEN '$tglx' AND '$tgl1x'
	AND usr_input LIKE '$admin%'
	GROUP BY no_jual");
	$isi['id']=' Periode '.$tgl.' s/d '.$tgl1;
	$isi['pro']=$this->model_view->title();
				$this->load->view('admin/laporan/print',$isi);
				}
		}



}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */