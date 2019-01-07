<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengiriman extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert_pengiriman($data){
		return $this->db->insert('det_pengiriman', $data);
	}

	//query update
	public function update_pengiriman($id, $data){
		$this->db->where('id_detkirim',$id);
		return $this->db->update('det_pengiriman', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('det_pengiriman', array('id_detkirim' => $id));
	}

	public function view(){
		return $this->db->get('det_pengiriman')->result_array();
	}
	public function viewkurir($id){
		$this->db->where('id_kurir', $id);
		return $this->db->get('det_pengiriman')->result_array();
	}
	
	public function detail($id){
			$this->db->where('id_detkirim', $id);
			return $this->db->get('det_pengiriman')->result_array();
		}
	public function kirim($nofaktur){
			$this->db->where('no_faktur', $nofaktur);
			return $this->db->get('det_pengiriman')->result_array();
		}

	function updateDatab($table,$data,$id)
    {
        $this->db->where('id_detkirim',$id)->update($table,$data);
    }

    function getDataBerkasEdit($id){
        return $this->db->query("SELECT * from det_pengiriman where id_detkirim = '$id' ")->result();
    }
    public function kurir($id){
			$this->db->where('id_kurir', $id);
			return $this->db->get('det_pengiriman')->result_array();
		}
}
?>