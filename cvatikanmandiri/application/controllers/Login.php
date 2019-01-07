<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
}

	public function index()
	{
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/form_login');
		}else{
			$this->load->model('muser');
			$valid_user = $this->muser->check_credential();
			
			if($valid_user == FALSE){
				$this->session->set_flashdata('error','Maaf, username atau password yang Anda masukkan salah. Silakan coba lagi');
				redirect('login');
			}else{
				$this->session->set_userdata('userid',$valid_user->userid);
				$this->session->set_userdata('username',$valid_user->username);
				$this->session->set_userdata('alamat',$valid_user->alamat);
				$this->session->set_userdata('group',$valid_user->group);
				
				switch($valid_user->group){
					case 1 :
					redirect('Home'); 
					break;
					case 2 :
					redirect('Home/agen'); 
					break;
					case 3 :
					redirect('Home/kurir');
					break;
					default: 
					break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());	
	}

	
}
?>