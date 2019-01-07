<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkurir extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('kurir', $data);
	}
	public function insert_user($data){
		return $this->db->insert('user', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_kur',$id);
		return $this->db->update('kurir', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('kurir', array('id_kur' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('kurir')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_kur', $id);
		return $this->db->get('kurir')->result_array();
	}

	public function idkur($id_kur){
			$this->db->where('id_kur', $id_kur);
			return $this->db->get('kurir')->result_array();
		}

	public function getKode(){
		$q = $this->db->query("select max(right(id_kur,3)) as id_kur from kurir");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_kur)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "KUR".$kd;
	}
}
?>