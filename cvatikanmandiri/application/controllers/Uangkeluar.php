<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uangkeluar extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
	}

	public function view(){
		$data['result'] = $this->Muangkeluar->view();
		$config['mnuUangkeluar'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('pengeluaran/list_uangkeluar', $data);
		$this->load->view('element/footer');
	}

	public function pengeluaran($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_luar' => $this->input->post('id_luar'),
				'tgl_keluar' => $this->input->post('tgl_keluar'),
				'keperluan' => $this->input->post('keperluan'),
				'nominal' => str_replace(',','',$this->input->post('nominal')),
				);
			if($id){
				$this->Muangkeluar->update($id, $datainput);
			}else {
				$this->Muangkeluar->insert($datainput);
			}


			redirect('uangkeluar/view');
		}

		if($id){
			$data['detail'] = $this->Muangkeluar->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['masuk'] = 'active';
		$data['kode'] = $this->Muangkeluar->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('pengeluaran/form_uangkeluar', $data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Muangkeluar->delete($id);
		redirect('uangkeluar/view');
	}

}
?>