<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('userid')){
		redirect('login/logout');
	}
	}
	
	public function index()
	{
		$data['result'] = $this->Muser->view();
		$config['mnuUser'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('user/list_user', $data);
		$this->load->view('element/footer');

	}

	public function agen($id)
	{
		$data['user'] = $this->Muser->detail($id);
		$config['mnuUser'] = 'active';

		$this->load->view('element/headeragen', $config);
		$this->load->view('user/list_useragen', $data);
		$this->load->view('element/footeragen');

	}

	public function kurir($id)
	{
		$data['user'] = $this->Muser->detail($id);
		$config['mnuUser'] = 'active';

		$this->load->view('element/headerkurir', $config);
		$this->load->view('user/list_useragen', $data);
		$this->load->view('element/footeragen');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'userid' => $this->input->post('userid'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'alamat' => $this->input->post('alamat'),
				'group' => $this->input->post('group'),
				'lastlogin' => date('Y-m-d')
				);
			if($id){
				$this->Muser->update($id, $datainput);
			}else {
				$this->Muser->insert($datainput);
			}
			redirect('user');
		}

		if($id){
			$data['detail'] = $this->Muser->detailuser($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuUser'] = 'active';
		$data['kode'] = $this->Muser->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('user/form_user', $data);
		$this->load->view('element/footer');
	}
	
	public function delete($id){
		$this->Muser->delete($id);
		redirect('user');
	}


}
?>