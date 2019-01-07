<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
		$data['result'] = $this->Mbuku->view();
		$config['mnuBuku'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('buku/list_buku', $data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datainput= array(
				'id_buku' => $this->input->post('id_buku'),
				'judul_buku' => $this->input->post('judul_buku'),
				'ket_judul' => $this->input->post('ket_judul'),
				'tingkat' => $this->input->post('tingkat'),
				'kelas' => $this->input->post('kelas'),
				'jenis' => $this->input->post('jenis'),
				'pengarang' => $this->input->post('pengarang'),
				'harga' => str_replace(',','',$this->input->post('harga')),
				'jumlah_stok' => $this->input->post('jumlah_stok'),
				'id_cetak' => $this->input->post('id_cetak'),
				'id_terbit' => $this->input->post('id_terbit'),
				'semester' => $this->input->post('semester'),
				);
			if($id){
				$this->Mbuku->update($id, $datainput);
			}else {
				$this->Mbuku->insert($datainput);
			}


			redirect('buku');
		}

		if($id){
			$data['detail'] = $this->Mbuku->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuBuku'] = 'active';
		$data['penerbit'] = $this->Mpenerbit->view();
		$data['percetakan'] = $this->Mpercetakan->view();
		$data['kode'] = $this->Mbuku->getKode();

		$this->load->view('element/header', $config);
		$this->load->view('buku/form_buku', @$data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Mbuku->delete($id);
		redirect('buku');
	}


}
?>