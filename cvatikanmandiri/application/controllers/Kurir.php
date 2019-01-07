<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('userid')){
		$this->session->set_flashdata('error','aadadada');
		redirect('login/logout');
	}
	}
	
	public function index()
	{
		$data['result'] = $this->Mkurir->view();
		$config['mnukurir'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('kurir/list_kurir', $data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_kur' => $this->input->post('id_kur'),
				'nama_kurir' => $this->input->post('nama_kurir'),
				'alamat' => $this->input->post('alamat'),
				'no_tlpn' => $this->input->post('no_tlpn')
				);
			$datainput2= array(
				'userid' => $this->input->post('id_kur'),
				'name' => $this->input->post('nama_kurir'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'alamat' => $this->input->post('alamat'),
				'group' => '3'
				);
			if($id){
				$this->Mkurir->update($id, $datainput);
				$this->Muser->update($id, $datainput2);
			}else {
				$this->Mkurir->insert($datainput);
				$this->Muser->insert($datainput2);
			}
			redirect('kurir');
		}

		if($id){
			$data['detail'] = $this->Mkurir->detail($id);
			$data['detail2'] = $this->Muser->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnukurir'] = 'active';
		$data['kode'] = $this->Mkurir->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('kurir/form_kurir', $data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Mkurir->delete($id);
		redirect('kurir');
	}


}
?>