<?php
class Apipembelian_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }

	function getPembelian(){	
		$this->db->select("*");
		$this->db->from('pembelian');				
		$query = $this->db->get();		
		return $query->result();			
	}

	function getBanking(){	
		$this->db->select("*");
		$this->db->from('banking');				
		$query = $this->db->get();		
		return $query->result();			
	}

	function getBuku(){	
		$this->db->select("*");
		$this->db->from('daftar_buku');				
		$query = $this->db->get();		
		return $query->result();			
	}

	function getJurnal(){	
		$this->db->select("*");
		$this->db->from('pembelian');				
		$query = $this->db->get();		
		return $query->result();			
	}
}
?>