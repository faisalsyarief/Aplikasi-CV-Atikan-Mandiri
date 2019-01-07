<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
	}

	public function rekapagen($id=""){
		$data['result'] = $this->Muser->view();
		$config['mnuPembelian'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('rekapitulasi/rekap_beli', $data);
		$this->load->view('element/footer');
	}

	public function rekap($id=""){
		$data['buku'] = $this->Mpembelian->buku_agen($id);
		$data['faktur'] = $this->Mpembelian->faktur_agen($id);

		$config['mnuPembelian'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('rekapitulasi/rekapitulasi', @$data);
		$this->load->view('element/footer');
	}

	public function omset(){
		$tahun = date('Y');
		$bulan = date('Y-M');
		$minggu = date('Y-M-D');
		$data['omsetmasukminggu'] = $this->Muangmasuk->viewOmzetMasuk($minggu);
		$data['omsetkeluarminggu'] = $this->Muangkeluar->viewOmzetKeluar($minggu);
		$data['omsetmasuk'] = $this->Muangmasuk->viewOmzetMasukbulanan($bulan);
		$data['omsetkeluar'] = $this->Muangkeluar->viewOmzetKeluarbulanan($bulan);
		$data['omzetmasuk'] = $this->Muangmasuk->viewOmzetMasuk($tahun);
		$data['omzetkeluar'] = $this->Muangkeluar->viewOmzetKeluar($tahun);
		$config['omset'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('rekapitulasi/omset', @$data);
		$this->load->view('element/footer');

	}

	public function rekap_hutang(){
		$data['result'] = $this->Muangmasuk->view();
		$config['Uangmasuk'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('rekapitulasi/rekap_hutang', $data);
		$this->load->view('element/footer');
	}
}
?>