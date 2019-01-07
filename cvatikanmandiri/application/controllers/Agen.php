<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

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
		$data['result'] = $this->Magen->view();
		$config['mnuAgen'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('agen/list_agen', $data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_agen' => $this->input->post('id_agen'),
				'nama_agen' => $this->input->post('nama_agen'),
				'alamat_agen' => $this->input->post('alamat_agen'),
				'no_tlpn' => $this->input->post('no_tlpn'),
				'kota' => $this->input->post('kota'),
				);
			if($id){
				$this->Magen->update($id, $datainput);
			}else {
				$this->Magen->insert($datainput);
			}

			redirect('agen');
		}

		if($id){
			$data['detail'] = $this->Magen->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuAgen'] = 'active';
		$data['kode'] = $this->Magen->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('agen/form_agen', $data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Magen->delete($id);
		redirect('agen');
	}


}
?>