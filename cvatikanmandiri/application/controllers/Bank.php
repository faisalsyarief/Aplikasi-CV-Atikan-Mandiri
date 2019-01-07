<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		
		$this->load->model('bank_model');
	}

	public function index()
	{
		$data['banking'] = $this->bank_model->get_bank();
        $this->load->view('bank/manage_bank', $data);
	}

	public function add_bank()
	{
		$this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required');
		$this->form_validation->set_rules('no_rekening','No Rekening','required|numeric|is_unique[banking.no_rekening]');
		$this->form_validation->set_rules('jenis_bank','Jenis Bank','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('bank/form_add_bank');
		}else{
			$config['upload_path'] = './uploads/bank-image/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				$this->load->view('bank/form_add_bank');
			}else{
				$image = $this->upload->data();
				$bank_data = array (
					'id_bank' => $this->bank_model->get_bank_id(),
					'nama_pemilik' => set_value('nama_pemilik'),
					'no_rekening' => set_value('no_rekening'),
					'jenis_bank' => set_value('jenis_bank'),
					'gambar' => $image['file_name']
				);
				$this->bank_model->insert($bank_data);
				redirect('Bank');
			}
		}
	}

	public function edit_bank($id_bank)
	{
		$this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required');
		$this->form_validation->set_rules('no_rekening','No Rekening','required|numeric|is_unique[banking.no_rekening]');
		$this->form_validation->set_rules('jenis_bank','Jenis Bank','required');
		
		if($this->form_validation->run() == FALSE){
			$data['banking'] = $this->bank_model->find($id_bank);
			$this->load->view('/bank/form_edit_bank', $data);
		}else{
			if($_FILES['userfile']['nama_pemilik'] !=''){
				
				$config['upload_path'] = './uploads/bank-image/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '1024';
				$config['max_width']  = '2000';
				$config['max_height']  = '2000';
		
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload())
				{
					$data['banking'] = $this->bank_model->find($id_bank);
					$this->load->view('bank/form_edit_bank', $data);
				}else{
					$image = $this->upload->data();
					$bank_data = array (
						'nama_pemilik' => set_value('nama_pemilik'),
						'no_rekening' => set_value('no_rekening'),
						'jenis_bank' => set_value('jenis_bank'),
						'gambar' => $image['file_name']
					);
					$this->bank_model->update($id_bank, $bank_data);
					redirect('bank');
				}
			}else{
				$bank_data = array (
						'nama_pemilik' => set_value('nama_pemilik'),
						'no_rekening' => set_value('no_rekening'),
						'jenis_bank' => set_value('jenis_bank')
				);
				$this->bank_model->update($id_bank, $bank_data);
				redirect('bank');
			}
		}	
	}

	public function delete_bank($id_bank)
	{
		$this->bank_model->delete($id_bank);
		redirect('bank');	
	}
}