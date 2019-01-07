<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magen extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('agen', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_agen',$id);
		return $this->db->update('agen', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('agen', array('id_agen' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('agen')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_agen', $id);
		return $this->db->get('agen')->result_array();
	}

	public function getKode(){
		$q = $this->db->query("select max(right(id_agen,3)) as id_agen from agen");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_agen)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "AGN".$kd;
	}
}
?>