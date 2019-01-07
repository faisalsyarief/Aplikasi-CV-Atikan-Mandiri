<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtracking extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('tracking_detail', $data);
	}

	public function insertpenerima($data){
		return $this->db->insert('penerima', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_track',$id);
		return $this->db->update('tracking_detail', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('tracking_detail', array('id_track' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('tracking_detail')->result_array();
	}

	public function viewpenerima(){
		return $this->db->get('penerima')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('id_track', $id);
		return $this->db->get('tracking_detail')->result_array();
	}

	public function faktur($idkirim){
		$this->db->where('no_faktur', $idkirim);
		return $this->db->get('tracking_detail')->result_array();
	}

	public function detailpenerima($id){
		$this->db->where('id_penerima', $id);
		return $this->db->get('penerima')->result_array();
	}

	public function penerima($id){
		$this->db->where('no_faktur', $id);
		return $this->db->get('penerima')->result_array();
	}
}
?>