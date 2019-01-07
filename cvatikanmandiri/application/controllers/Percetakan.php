<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Percetakan extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
	}
	
	public function index()
	{
		$data['result'] = $this->Mpercetakan->view();
		$config['mnuPercetakan'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('percetakan/list_percetakan', $data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_cetak' => $this->input->post('id_cetak'),
				'nama_cetak' => $this->input->post('nama_cetak'),
				'alamat_cetak' => $this->input->post('alamat_cetak'),
				'no_tlpn_cetak' => $this->input->post('no_tlpn_cetak'),
				'no_fax_cetak' => $this->input->post('no_fax_cetak'),
				
				);
			if($id){
				$this->Mpercetakan->update($id, $datainput);
			}else {
				$this->Mpercetakan->insert($datainput);
			}


			redirect('percetakan');
		}

		if($id){
			$data['detail'] = $this->Mpercetakan->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuPercetakan'] = 'active';
		$data['kode'] = $this->Mpercetakan->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('percetakan/form_percetakan', $data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Mpercetakan->delete($id);
		redirect('percetakan');
	}


}
?>