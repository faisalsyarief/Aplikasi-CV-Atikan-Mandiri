<?php

class Webservice extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Apipembelian_model');	
		$this->load->database();
		$this->load->helper('download');
		$this->load->dbutil();
	}
	
	public function index(){
		$this->load->model('Apipembelian_model');
		$query = $this->db->query("SELECT * FROM pembelian");

		$config = array (
			'root'		=> 'Pembelian',
			'element'	=> 'Data_Pembelian',
			'newline'	=> "\n",
			'tab'		=> "\t"
			);
		header('Content-type: text/xml');
		echo $this->dbutil->xml_from_result ($query, $config);
	}

	public function jurnal(){
		$this->load->model('Apipembelian_model');
		$query = $this->db->query("SELECT tgl_beli, pembayaran as debet, pembayaran as kredit, pembayaran as jumlah FROM pembelian");

		$config = array (
			'root'		=> 'Jurnal',
			'element'	=> 'Data_Jurnal',
			'newline'	=> "\n",
			'tab'		=> "\t"
			);
		header('Content-type: text/xml');
		echo $this->dbutil->xml_from_result ($query, $config);
	}

	public function banking(){
		$this->load->model('Apipembelian_model');
		$query = $this->db->query("SELECT * FROM banking");

		$config = array (
			'root'		=> 'Banking',
			'element'	=> 'Data_BANK',
			'newline'	=> "\n",
			'tab'		=> "\t"
			);
		header('Content-type: text/xml');
		echo $this->dbutil->xml_from_result ($query, $config);
	}

	public function daftar_buku(){
		$this->load->model('Apipembelian_model');
		$query = $this->db->query("SELECT * FROM daftar_buku");

		$config = array (
			'root'		=> 'Daftar_Buku',
			'element'	=> 'Data_Buku',
			'newline'	=> "\n",
			'tab'		=> "\t"
			);
		header('Content-type: text/xml');
		echo $this->dbutil->xml_from_result ($query, $config);
	}
}
?>