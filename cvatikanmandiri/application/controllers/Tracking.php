<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('userid')){
		
		redirect('login/logout');
		}
		date_default_timezone_set('Asia/Bangkok');
	}
	
	public function tracking($id="")
	{
		$a = $this->Mtracking->faktur($id);
		$b = $this->Mpengiriman->kirim($id);
		$d = $this->Mpembelian->detail($id);
		$data['view'] = $this->Mtracking->faktur($id);
		$data['kirim'] = $this->Mpengiriman->kirim($id);
		$data['user'] = $this->Muser->detailuser($d[0]['userid']);
		$data['kurir']= $this->Mkurir->idkur($b[0]['id_kurir']);
		$data['penerima']= $this->Mtracking->penerima($a[0]['no_faktur']);
		$config['mnuTracking'] = 'active';

		$this->load->view('element/headeragen', $config);
		$this->load->view('tracking/tracking', @$data);
		$this->load->view('element/footer');

	}

	

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'no_faktur' => $this->input->post('no_faktur'),
				'tgl' => $this->input->post('tgl'),
				'time' => $this->input->post('time'),
				'status_track' => $this->input->post('status_track'),
				'lokasi' => $this->input->post('lokasi')
				);
			if($id){
				$this->Mtracking->update($id, $datainput);
			}else {
				$this->Mtracking->insert($datainput);
			}


			redirect('pengiriman/viewkurir');
		}

		if($id){
			$data['detail'] = $this->Mtracking->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$data['kirim'] = $this->Mpengiriman->kirim($id);
		$config['mnuTracking'] = 'active';

		$this->load->view('element/headerkurir', $config);
		$this->load->view('tracking/form_track', @$data);
		$this->load->view('element/footer');
	}

	public function list_kurir($id="")
	{
		
		$data['kirim'] = $this->Mpengiriman->kirim($id);
		$data['view'] = $this->Mtracking->faktur($id);
		$config['mnuTracking'] = 'active';

		$this->load->view('element/headerkurir', $config);
		$this->load->view('tracking/listtrackkurir', @$data);
		$this->load->view('element/footer');

	}


	public function list_agen($id="")
	{
		$data['view'] = $this->Mpengiriman->view();
		$data['pembelian'] = $this->Mpembelian->viewagen($this->session->userdata('userid'));
		$data['result'] = $this->Mpembelian->view();
		$config['mnuTracking'] = 'active';

		$this->load->view('element/headeragen', $config);
		$this->load->view('tracking/listtracking_agen', $data);
		$this->load->view('element/footer');

	}

	public function delete($id){
		$this->Mtracking->delete($id);
		redirect('pengiriman/viewkurir');
	}


	public function penerima($id=""){
          
        $submit = $this->input->post('submit');
		if($submit){

			$id = $this->input->post('id');
			$datainput= array(
				'no_faktur' => $this->input->post('no_faktur'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'no_tlpn' => $this->input->post('no_tlpn'),
				
				);
			
			$this->Mtracking->insertpenerima($datainput);
			
			


			redirect('pengiriman/viewkurir');
		}

		if($id){
			$data['detail'] = $this->Mtracking->detailpenerima($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}
		
		$config['mnuTracking'] = 'active';
		$d = $this->Mpengiriman->kirim($id);
		$data['view'] = $this->Mtracking->faktur($d[0]['no_faktur']);

		$this->load->view('element/headerkurir', $config);
		$this->load->view('tracking/penerima', @$data);
		$this->load->view('element/footer');
	}
	
	public function viewpenerima($id="")
	{
		$d = $this->Mtracking->faktur($id);
		$data['view'] = $this->Mtracking->penerima($d[0]['no_faktur']);
		$config['mnuTracking'] = 'active';

		$this->load->view('element/headerkurir', $config);
		$this->load->view('tracking/list_penerima', @$data);
		$this->load->view('element/footer');

	}
}
?>