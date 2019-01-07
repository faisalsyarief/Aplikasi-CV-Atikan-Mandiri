<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model {

	public function get_bank_id()
	{
		$hasil=$this->db->query("SELECT MAX(RIGHT(id_bank,5)) AS kode_max FROM banking");
		$kode = "";
		if($hasil->num_rows() > 0){
			foreach($hasil->result() as $kd){
                $tmp = ((int)$kd->kode_max)+1;
                $kode = sprintf("%05s", $tmp);
            }
		}else{
			$kode = "001";
		}

		$karakter = "BANK";
		return $karakter.$kode;
	}

	public function get_bank()
	{
		$hasil=$this->db->get('banking');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function view(){
		return $this->db->get('banking')->result_array();
	}

	
	public function find($id_bank)
	{
		$hasil = $this->db->where('id_bank',$id_bank)->limit(1)->get('banking');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}
	
	public function insert($bank_data)
	{
		$this->db->insert('banking',$bank_data);
	}
	
	public function update($id_bank, $bank_data)
	{
		$this->db->where('id_bank',$id_bank)
		->update('banking',$bank_data);	
	}
	
	public function delete($id_bank)
	{
		$this->db->where('id_bank',$id_bank)
		->delete('banking');
	}
}