<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
	}

	public function index($id=""){
		$data['buku'] = $this->Mjurnal->buku_jurnal($id);
		$data['faktur'] = $this->Mjurnal->faktur_jurnal();

		$config['mnuJurnal'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('jurnal/jurnal', @$data);
		$this->load->view('element/footer');
	}

	public function pembelian($id=""){
		$data['buku'] = $this->Mjurnal->buku_jurnal($id);
		$data['faktur'] = $this->Mjurnal->faktur_jurnal();

		$config['mnuJurnal'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('jurnal/jurnal_pembelian', @$data);
		$this->load->view('element/footer');
	}

		public function pengeluaran(){
		$data['result'] = $this->Mjurnal->pengeluaran();
		$config['mnuJurnal'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('jurnal/jurnal_pengeluaran', @$data);
		$this->load->view('element/footer');
	}

	public function cetak_umum($id=""){
		$data['buku'] = $this->Mjurnal->buku_jurnal($id);
		$data['faktur'] = $this->Mjurnal->faktur_jurnal();

		$config['mnuJurnal'] = 'active';

		$this->load->view('element/headercetak', $config);
		$this->load->view('jurnal/cetak_umum', @$data);
		$this->load->view('element/footer');
	}

	public function jurnal_hutang(){
		$data['result'] = $this->Mjurnal->view_hutang();
		$config['Uangmasuk'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('jurnal/jurnal_hutang', $data);
		$this->load->view('element/footer');
	}
}
