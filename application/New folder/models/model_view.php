<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_view extends CI_model {

	
	public function title()
	{
		$hasil = $this->db->get('app');
		if($hasil->num_rows()>0){
			foreach($hasil->result() as $row){
			$data = array('nama'=>$row->nama,
			              'id'=>$row->id,
			              'alamat'=>$row->alamat,
						  'telpon'=>$row->telpon,
						  'email'=>$row->email,
						  'photo'=>$row->photo,
						   'tentang'=>$row->tentang
						  );
			}
			}else{
				$data = array('nama'=>'NAMA WEB',
				              'id'=>'0',
				           'alamat'=>'Alamat WEB',
						  'telpon'=>'Telephone WEB',
						  'email'=>'Email WEB',
						  'photo'=>'logo.png',
						   'tentang'=>'Tentang WEB');
				
				}
		 
			return $data;
	}
	public function lev()
	{
		
		$level = $this->session->userdata('level');
		if($level == "ADMIN"){$hasil = "ADMIN";}
		else{$hasil = "ERROR";}
		return $hasil;
			
	}
	
	public function getkodeBeli()
			{
				$tgl=date("d-m-Y");
			$d = $this->db->query("SELECT MAX(RIGHT(urut,2)) as kd FROM ibenk_pantri where tgl='$tgl' limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%02s',$tmp);
				           }
			          }
			else{
				$kode  = 01;
				}
				return 'AB'.$kode;
			}
			
			
			
			
			public function getkodeSetJadii()
			{
				$tgl=date("d-m-Y");
			$d = $this->db->query("SELECT MAX(RIGHT(id_set_jadi,4)) as kd FROM tab_set_jadi limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%04s',$tmp);
				           }
			          }
			else{
				$kode  = 01;
				}
				$tgl=date('Ym');
				return 'SJ'.$tgl.$kode;
			}
			
public function getkodedasar()
			{
				$tgl=date("d-m-Y");
			$d = $this->db->query("SELECT MAX(RIGHT(id_dasar,4)) as kd FROM tab_dasar limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%04s',$tmp);
				           }
			          }
			else{
				$kode  = 01;
				}
				$tgl=date('Ym');
				return 'DS'.$tgl.$kode;
			}	
			
public function getkodejadi()
			{
				$tgl=date("d-m-Y");
			$d = $this->db->query("SELECT MAX(RIGHT(id_jadi,4)) as kd FROM tab_jadi limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%04s',$tmp);
				           }
			          }
			else{
				$kode  = 01;
				}
				$tgl=date('Ym');
				return 'JD'.$tgl.$kode;
			}						
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */