<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpercetakan extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('percetakan', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_cetak',$id);
		return $this->db->update('percetakan', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('percetakan', array('id_cetak' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('percetakan')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_cetak', $id);
		return $this->db->get('percetakan')->result_array();
	}

	public function getKode(){
		$q = $this->db->query("select max(right(id_cetak,3)) as id_cetak from percetakan");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_cetak)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "CTK".$kd;
	}
}
?>