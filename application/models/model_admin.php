<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	
	public function cekJaksa()
	{
		
		$this->db->where('daftar_jenis','1');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	public function cekdata_user()
	{
		
		$this->db->where('level !=','');
		$a = $this->db->get('tab_login');
		return $a;
	}
	
	public function cekpembina()
	{
		
		$this->db->where('daftar_jenis','2');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	
	public function cekintel()
	{
		
		$this->db->where('daftar_jenis','3');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	public function cekpidanaumum()
	{
		
		$this->db->where('daftar_jenis','4');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	public function cekpidanakhusus()
	{
		
		$this->db->where('daftar_jenis','5');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	public function cekdatun()
	{
		
		$this->db->where('daftar_jenis','6');
		$a = $this->db->get('tab_personil')->num_rows();
		return $a;
	}
	public function cekdata_kantor()
	{
		
		
		$a = $this->db->get('tab_settings');
		return $a;
	}
	public function cekdata_karyawan()
	{
		
		
		 
		$a = $this->db->get('tab_karyawan');
		return $a;
	}
	
	public function getUpdate($data)
	{
		
		$this->db->where('s_id','1');
		$a = $this->db->update('tab_settings',$data);
		return $a;
	}
	
	
	public function getUinsertpostingspdptahap1($data)
	{
		
		$a = $this->db->insert('tab_dataperkara2016',$data);
		return $a;
	}
	
	public function getUinsertpolisi($data)
	{
		
		$a = $this->db->insert('tab_polisi',$data);
		return $a;
	}
	public function getUinsertkaryawan($data)
	{
		
		$a = $this->db->insert('tab_karyawan',$data);
		return $a;
	}
	
	
	public function deletePersonil($id)
	{
		$this->db->where('daftar_pegid',$id);
		$a = $this->db->delete('tab_personil');
		return $a;
	}
	
	public function getUpdatetPersonil($data)
	{
		$id=$this->input->post('id');
		$this->db->where('daftar_pegid',$id);
		$a = $this->db->update('tab_personil',$data);
		return $a;
	}
	
	public function getUpdatetPolisi($data)
	{
		$id=$this->input->post('id');
		$this->db->where('p_id',$id);
		$a = $this->db->update('tab_polisi',$data);
		return $a;
	}
	
	
	public function cekdata_polisi()
	{
		
		
		$a = $this->db->get('tab_polisi');
		return $a;
	}
 	public function deletepolisi($id)
	{
		$this->db->where('p_id',$id);
		$a = $this->db->delete('tab_polisi');
		return $a;
	}
	public function jumlah_hari($bulan=0,$tahun=0)
	{
		$bulan = $bulan > 0 ? $bulan : date('m');
		$tahun = $tahun > 0 ? $tahun : date('Y');
		switch($bulan){
			case 1;
			case 3;
			case 5;
			case 7;
			case 8;
			case 10;
			case 12;
			return 31;
			break;
			case 4;
			case 6;
			case 9;
			case 11;
			return 30;
			break;
			case 2;
			return $tahun % 4==0? 29:28;
			}
	}
	public function getkodeKaryawan()
			{
			$d = $this->db->query("SELECT MAX(RIGHT(nik,5)) as kd FROM tab_karyawan limit 0,5");
		    $kode  = '';
		      if($d->num_rows()>0)
		             {
			               foreach($d->result() as $row)
						   {
				          
							 $tmp  =((int)$row->kd)+1;
							 $kode =sprintf('%05s',$tmp);
				           }
			          }
			else{
				$kode  = 00001;
				}
				return 'AB'.$kode;
			}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */