<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('userid')){
		
		redirect('login/logout');
		}
	}
	
	public function index()
	{
		$this->load->view('element/header');
		$this->load->view('home/index');
		$this->load->view('element/footer');

	}

	public function agen()
	{
		$this->load->view('element/headeragen');
		$this->load->view('home/agen');
		$this->load->view('element/footeragen');

	}

	public function kurir()
	{
		$this->load->view('element/headerkurir');
		$this->load->view('home/index');
		$this->load->view('element/footer');

	}


}
?>