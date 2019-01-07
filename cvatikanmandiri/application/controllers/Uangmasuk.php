<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uangmasuk extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
	}

	public function view(){
		$data['result'] = $this->Muangmasuk->view();
		$config['Uangmasuk'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('Pemasukan/list_uangmasuk', $data);
		$this->load->view('element/footer');
	}

}
?>