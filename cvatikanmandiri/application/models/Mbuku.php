<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbuku extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('daftar_buku', $data);

	}

	//query update
	public function update($id, $data){
		$this->db->where('id_buku',$id);
		return $this->db->update('daftar_buku', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('daftar_buku', array('id_buku' => $id));
	}

	//query view
	public function view(){
		$this->db->select('penerbit.*, daftar_buku.*')->from('daftar_buku');
		$this->db->join('penerbit', 'penerbit.id_terbit = daftar_buku.id_terbit', 'left');
		return $this->db->get()->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_buku', $id);
		return $this->db->get('daftar_buku')->result_array();
	}

	public function getKode(){
		$q = $this->db->query("select max(right(id_buku,3)) as id_buku from daftar_buku");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_buku)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "BK".$kd;
	}
}
?>