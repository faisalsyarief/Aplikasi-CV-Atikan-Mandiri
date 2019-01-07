<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
	if(!$this->session->userdata('userid')){
		
		redirect('login/logout');
		}
	}
	
	public function view()
	{
		$data['result'] = $this->Mpembelian->view();
		$config['mnuPembelian'] = 'active';

		$this->load->view('element/header', $config);
		$this->load->view('pembelian/list_beli', $data);
		$this->load->view('element/footer');

	}

	public function viewagen()
	{

		$data['result'] = $this->Mpembelian->viewagen($this->session->userdata('userid'));
		$config['mnuPembelian'] = 'active';

		$this->load->view('element/headeragen', $config);
		$this->load->view('pembelian/list_beliagen', $data);
		$this->load->view('element/footeragen');

	}

	public function edit_pembelian($id)
	{
		$this->form_validation->set_rules('total','Total','required');
		$this->form_validation->set_rules('pembayaran','Pembayaran','required');
		
		if($this->form_validation->run() == FALSE){
			$data['pembelian'] = $this->Mpembelian->find_pembelian($id);
			$this->load->view('pembelian/form_edit_pembelian', $data);
		}else{
			$pembelian = $this->Mpembelian->find_pembelian($id);
			$data = array (
				'no_faktur' => $this->input->post('no_faktur'),
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'total' => str_replace(',','',$this->input->post('total')),
				'pembayaran' => $pembelian->pembayaran + str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' => str_replace(',','',$this->input->post('sisa_hutang')),
			);
			$this->Mpembelian->update_pembelian($id, $data);
			$this->Mpembelian->insert_hutang($data);
			$this->Mpembelian->detail($id);

			
		$hutang = count($this->input->post('id_buku'));
			for($i=0; $i<$hutang; $i++){
				$datahutang = array(
				'no_faktur' => $id,
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'total' => str_replace(',','', $this->input->post('total')),
				'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' =>str_replace(',','',$this->input->post('sisa_hutang')),
				);
				$this->Mpembelian->insert_hutang($datahutang);
			}
			redirect('pembelian/view');
		}
	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datapembelian = array(
				'no_faktur' => $this->input->post('no_faktur'),
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'tgl_lunas' => $this->input->post('tgl_lunas'),
				'diskon' => $this->input->post('diskon'),
				'total' => str_replace(',','', $this->input->post('total')),
				'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' =>str_replace(',','',$this->input->post('sisa_hutang')),
				'gambar' => 'Pembelian Langsung Di Toko',
				'status' => 'Sudah di Proses',
				);
			
			if($id){
				$this->Mpembelian->update($id, $datapembelian);
			}else {
				$this->Mpembelian->insert_pembelian($datapembelian);
				$last = $this->Mpembelian->lastrow();
				$id = @$last[0]['id'];
			}

			$cbrg = count($this->input->post('id_buku'));
			for($i=0; $i<$cbrg; $i++){
				$datadetail = array(
				'no_faktur' => $id,
				'id_buku' => $_POST['id_buku'][$i],
				'qty' => str_replace(',','',$_POST['qty'][$i]),

				);
				$this->Mpembelian->insert_detail_pembelian($datadetail);
			}
			$hutang = count($this->input->post('id_buku'));
			for($i=0; $i<$hutang; $i++){
				$datahutang = array(
				'no_faktur' => $id,
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'total' => str_replace(',','', $this->input->post('total')),
				'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' =>str_replace(',','',$this->input->post('sisa_hutang')),
				);
				$this->Mpembelian->insert_hutang($datahutang);
			}

			redirect('pembelian/invoice/'.$id);
		}

		if($id){
			$data['detail'] = $this->Mpembelian->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuPembelian'] = 'active';
		$data['user'] = $this->Muser->view();
		$data['buku'] = $this->Mbuku->view();
		$data['kode'] = $this->Mpembelian->getKode();
		
		$this->load->view('element/header', $config);
		$this->load->view('pembelian/form_beli', @$data);
		$this->load->view('element/footer');
	}

	public function managehutang($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datapembelian = array(
				'no_faktur' => $this->input->post('no_faktur'),
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'tgl_lunas' => $this->input->post('tgl_lunas'),
				'diskon' => $this->input->post('diskon'),
				'total' => str_replace(',','', $this->input->post('total')),
				'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' =>str_replace(',','',$this->input->post('sisa_hutang')),
				'gambar' => 'Pembelian Langsung Di Toko',
				'status' => 'Sudah di Proses',
				);
			

			if($id){
				$this->Mpembelian->update($id, $datapembelian);
			}else {
				$this->Mpembelian->insert_pembelian($datapembelian);
				$last = $this->Mpembelian->lastrow();
				$id = @$last[0]['id'];
			}

			$cbrg = count($this->input->post('id_buku'));
			for($i=0; $i<$cbrg; $i++){
				$datadetail = array(
				'no_faktur' => $id,
				'id_buku' => $_POST['id_buku'][$i],
				'qty' => str_replace(',','',$_POST['qty'][$i]),

				);
				$this->Mpembelian->insert_detail_pembelian($datadetail);
			}

			redirect('pembelian/invoice/'.$id);
		}

		if($id){
			$data['detail'] = $this->Mpembelian->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuPembelian'] = 'active';
		$data['user'] = $this->Muser->view();
		$data['buku'] = $this->Mbuku->view();
		$data['kode'] = $this->Mpembelian->getKode();
		
		$this->load->view('element/header', $config);
		$this->load->view('pembelian/form_beli_hutang', @$data);
		$this->load->view('element/footer');
	}

	public function manageagen($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$tgl_skrg=date('Y-m-d');
			$date=date_create($tgl_skrg);
			date_add($date,date_interval_create_from_date_string("1 month"));
			$tgl_lunas=date_format($date,"Y-m-d");
			
				$datapembelian = array(
				'no_faktur' => $this->input->post('no_faktur'),
				'userid' => $this->input->post('userid'),
				'tgl_beli' => date('Y-m-d H:i:s'),
				'tgl_lunas' => $tgl_lunas,
				'diskon' => $this->input->post('diskon'),
				'total' => str_replace(',','', $this->input->post('total')),
				'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
				'sisa_hutang' =>str_replace(',','',$this->input->post('sisa_hutang')),
				);
			

			if($id){
				$this->Mpembelian->update($id, $datapembelian);
			}else {
				$this->Mpembelian->insert_pembelian($datapembelian);
				$last = $this->Mpembelian->lastrow();
				$id = @$last[0]['id'];
			}

			$cbrg = count($this->input->post('id_buku'));
			for($i=0; $i<$cbrg; $i++){
				$datadetail = array(
				'no_faktur' => $id,
				'id_buku' => $_POST['id_buku'][$i],
				'qty' => str_replace(',','',$_POST['qty'][$i]),

				);
				$this->Mpembelian->insert_detail_pembelian($datadetail);
			}

			redirect('pembelian/invoiceagen/'.$id);
		}

		if($id){
			$data['detail'] = $this->Mpembelian->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnuPembelian'] = 'active';
		$data['user'] = $this->Muser->view();
		$data['buku'] = $this->Mbuku->view();
		$data['kode'] = $this->Mpembelian->getKode();
		
		$this->load->view('element/headeragen', $config);
		$this->load->view('pembelian/form_beliagen', @$data);
		$this->load->view('element/footeragen');
	}


	public function delete($id){
		$this->Mpembelian->delete($id);
		redirect('pembelian/view');
	}

	public function deleteagen($id){
		$this->Mpembelian->delete($id);
		redirect('pembelian/viewagen');
	}

	public function invoice($id=""){
		$d = $this->Mpembelian->detail($id);
		$data['info'] = $this->Mpembelian->detail($id);
		$data['user'] = $this->Muser->detailuser($d[0]['userid']);
		$data['detail'] = $this->Mpembelian->detail_pembelian($id);
		$this->load->view('element/header', @$config);
		$this->load->view('pembelian/invoice', @$data);
		$this->load->view('element/footer');
	}

	public function invoiceagen($id=""){
		$d = $this->Mpembelian->detail($id);
		$data['info'] = $this->Mpembelian->detail($id);
		$data['user'] = $this->Muser->detail($this->session->userdata('userid'));
		$data['detail'] = $this->Mpembelian->detail_pembelian($id);
		$this->load->view('element/headeragen', @$config);
		$this->load->view('pembelian/invoiceagen', @$data);
		$this->load->view('element/footeragen');
	}

	public function cetak($id=""){
		$d = $this->Mpembelian->detail($id);
		$data['info'] = $this->Mpembelian->detail($id);
		$data['user'] = $this->Muser->detail($d[0]['userid']);
		$data['detail'] = $this->Mpembelian->detail_pembelian($id);
		
		$this->load->view('pembelian/cetak', $data);
		
	}
	
	public function bank(){
		$data['banking'] = $this->Mpembelian->get_bank();
		
		$this->load->view('element/headeragen');
		$this->load->view('pembelian/bank', $data);
		$this->load->view('element/footeragen');
		
	}

	function editbukti($id){
            $data=array(
            'title'=>'Edit Berkas',
            'data_berkas'=>$this->Mpembelian->getDataBerkasEdit($id),
        );
		$this->load->view('element/headeragen');
        $this->load->view('pembelian/form_edit',$data);
		$this->load->view('element/footeragen');
    }	

    function editbukti1($id){
            $data=array(
            'title'=>'Edit Berkas',
            'data_berkas'=>$this->Mpembelian->getDataBerkasEdit($id),
        );
		$this->load->view('element/header');
        $this->load->view('pembelian/form_edit1',$data);
		$this->load->view('element/footer');
    }

	function transfer($id){

        $config['upload_path'] = 'uploads/bukti-image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']   = '10000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';
        $config['remove_spaces']  = FALSE;
        
        $upload_error=array();
        $this->load->library('upload');
        $this->upload->initialize($config);
        for($i=0; $i<count($_FILES['gambar']['name']); $i++)
        {
            $_FILES['userfile']['name']= $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['gambar']['size'][$i];
            
            if (!$this->upload->do_upload())
            {
                // fail
               $gambar="";
               echo $this->upload->display_errors();
              
            }
            else {
              echo $fileName = $_FILES['gambar']['name'][$i];
               $images[$i] = $fileName;
            }
        }
       
        $gambar=$images[0];
          
        $data=array(
			'pembayaran' => str_replace(',','',$this->input->post('pembayaran')),
            'gambar'=>$gambar,
        );
        
        $this->Mpembelian->updateDatab('pembelian',$data,$id);
        redirect("pembelian/viewagen");
    }

	function transfer1($id){

        $config['upload_path'] = 'uploads/bukti-image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']   = '10000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';
        $config['remove_spaces']  = FALSE;
        
        $upload_error=array();
        $this->load->library('upload');
        $this->upload->initialize($config);
        for($i=0; $i<count($_FILES['gambar']['name']); $i++)
        {
            $_FILES['userfile']['name']= $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']= $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name']= $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']= $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']= $_FILES['gambar']['size'][$i];
            
            if (!$this->upload->do_upload())
            {
                // fail
               $gambar="";
               echo $this->upload->display_errors();
              
            }
            else {
              echo $fileName = $_FILES['gambar']['name'][$i];
               $images[$i] = $fileName;
            }
        }
       
        $gambar=$images[0];
          
        $data=array(
			'status' => $this->input->post('status'),
        );
        
        $this->Mpembelian->updateDatab('pembelian',$data,$id);
        redirect("pembelian/view");
    }

}
?>