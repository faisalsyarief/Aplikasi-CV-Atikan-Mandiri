<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

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
		$data['result'] = $this->Mpenerbit->view();
		$config['mnuPenerbit'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('penerbit/list_penerbit', $data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_terbit' => $this->input->post('id_terbit'),
				'nama_terbit' => $this->input->post('nama_terbit'),
				'alamat_terbit' => $this->input->post('alamat_terbit'),
				'no_tlpn_terbit' => $this->input->post('no_tlpn_terbit'),
				);
			if($id){
				$this->Mpenerbit->update($id, $datainput);
			}else {
				$this->Mpenerbit->insert($datainput);
			}


			redirect('penerbit');
		}

		if($id){
			$data['detail'] = $this->Mpenerbit->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuPenerbit'] = 'active';
		$data['kode'] = $this->Mpenerbit->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('penerbit/form_penerbit', $data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Mpenerbit->delete($id);
		redirect('penerbit');
	}


}
?>