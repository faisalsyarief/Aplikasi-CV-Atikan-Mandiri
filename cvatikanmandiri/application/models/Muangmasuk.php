<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muangmasuk extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function view(){
		$this->db->select('user.*, pembelian.*')->from('pembelian');
		$this->db->join('user', 'user.userid = pembelian.userid', 'left');
		return $this->db->get()->result_array();
	}

	public function detail($id){
		$this->db->where('no_faktur', $id);
		return $this->db->get('pembelian')->result_array();
	}

	public function viewOmzetMasuk($tahun){
		$this->db->select('user.*, pembelian.*')->from('pembelian');
		$this->db->join('user', 'user.userid = pembelian.userid', 'left');
		$this->db->where('YEAR(pembelian.tgl_beli)', $tahun);
		return $this->db->get()->result_array();
	}
	public function viewOmzetMasukbulanan($bulan){
		$this->db->select('user.*, pembelian.*')->from('pembelian');
		$this->db->join('user', 'user.userid = pembelian.userid', 'left');
		$this->db->where('YEAR(pembelian.tgl_beli)', $bulan);
		return $this->db->get()->result_array();
	}
}
?>