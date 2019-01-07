<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenerbit extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('penerbit', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_terbit',$id);
		return $this->db->update('penerbit', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('penerbit', array('id_terbit' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('penerbit')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_terbit', $id);
		return $this->db->get('penerbit')->result_array();
	}

	public function getKode(){
		$q = $this->db->query("select max(right(id_terbit,3)) as id_terbit from penerbit");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_terbit)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "TRB".$kd;
	}
}
?>