<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mjurnal extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function buku_jurnal(){
		$this->db->select('daftar_buku.*,CONCAT(daftar_buku.judul_buku,"_",daftar_buku.tingkat,"_",daftar_buku.kelas) as jdl_buku')->from('detail_pembelian');
		$this->db->join('pembelian','pembelian.no_faktur = detail_pembelian.no_faktur', 'left');
		$this->db->join('daftar_buku', 'detail_pembelian.id_buku = daftar_buku.id_buku', 'left');
		$this->db->group_by('detail_pembelian.id_buku');
		return $this->db->get()->result_array();
	}

	public function faktur_jurnal(){
		return $this->db->get('pembelian')->result_array();
	}

	public function pengeluaran(){
		return $this->db->get('pengeluaran')->result_array();
	}

	public function view_hutang(){
		$this->db->select('user.*, hutang.*')->from('hutang');
		$this->db->join('user', 'user.userid = hutang.userid', 'left');
		return $this->db->get()->result_array();
	}

	}
?>