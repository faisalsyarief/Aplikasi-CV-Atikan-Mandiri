<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('userid')){
		$this->session->set_flashdata('error','aadadada');
		redirect('login/logout');
		}
	}
	
	public function view()
	{
		$data['view'] = $this->Mpengiriman->view();
		$data['pembelian'] = $this->Mpembelian->view();
		$config['mnupengiriman'] = 'active';
		$this->load->view('element/header', $config);
		$this->load->view('pengiriman/list_pengiriman', @$data);
		$this->load->view('element/footer');

	}

	public function viewkurir($id="")
	{
		
		$data['kurir'] = $this->Muser->detailuser($id);
		$data['view'] = $this->Mpengiriman->viewkurir($this->session->userdata('userid'));
		

		$config['mnupengiriman'] = 'active';
		$this->load->view('element/headerkurir', $config);
		$this->load->view('pengiriman/listkurir', @$data);
		$this->load->view('element/footer');

	}

	public function manage($id=""){
		$submit = $this->input->post('submit');
		if($submit){
			$id = $this->input->post('id');
			$datapengiriman = array(

				'no_faktur' => $this->input->post('no_faktur'),
				'tgl_kirim' => $this->input->post('tgl_kirim'),
				'status_kirim' => $this->input->post('status_kirim'),
				'id_kurir' => $this->input->post('id_kurir')
				);
			

			if($id){
				$this->Mpengiriman->update_pengiriman($id, $datapengiriman);
			}else {
				$this->Mpengiriman->insert_pengiriman($datapengiriman);
			}


			redirect('pengiriman/view'.$id);
		}

		if($id){
			$data['detail'] = $this->Mpengiriman->detail($id);
			$data['mode'] = 'Edit';
		}else{
			$data['mode'] = 'Tambah';
		}

		$config['mnupengiriman'] = 'active';
		$data['faktur'] = $this->Mpembelian->view();
		$data['kurir'] = $this->Mkurir->view();
		
		
		$this->load->view('element/header', $config);
		$this->load->view('pengiriman/form_pengiriman', @$data);
		$this->load->view('element/footer');
	}

	public function delete($id){
		$this->Mpengiriman->delete($id);
		redirect('pengiriman/view');
	}

	public function info($id=""){
		$d = $this->Mpembelian->detail($id);
		$data['info'] = $this->Mpembelian->detail($id);
		$data['user'] = $this->Muser->detailuser($d[0]['userid']);
		$data['detail'] = $this->Mpembelian->detail_pembelian($id);
		$this->load->view('element/headerkurir', @$config);
		$this->load->view('pengiriman/detail', @$data);
		$this->load->view('element/footer');
	}

	public function cetak($id=""){
		$d = $this->Mpembelian->detail($id);
		$data['info'] = $this->Mpembelian->detail($id);
		$data['user'] = $this->Muser->detailuser($d[0]['userid']);
		$data['detail'] = $this->Mpembelian->detail_pembelian($id);
		
		$this->load->view('pengiriman/cetak_detail', $data);
		
	}

	function editbuktiadmin($id){
            $data=array(
            'title'=>'Edit Berkas',
            'data_berkas'=>$this->Mpengiriman->getDataBerkasEdit($id),
        );
		$this->load->view('element/header');
        $this->load->view('pengiriman/form_editadmin',@$data);
		$this->load->view('element/footer');
    }

    function editbuktikurir($id){
            $data=array(
            'title'=>'Edit Berkas',
            'data_berkas'=>$this->Mpengiriman->getDataBerkasEdit($id),
        );
		$this->load->view('element/headerkurir');
        $this->load->view('pengiriman/form_editkurir',$data);
		$this->load->view('element/footer');
    }

    function statuskirim_kurir($id){

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
        	'status_kirim' => $this->input->post('status_kirim'),
            'gambar'=>$gambar,
        );
        
        $this->Mpengiriman->updateDatab('det_pengiriman',$data,$id);
        redirect("pengiriman/viewkurir");
    }

    function statuskirim($id){

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
          
    
    }
}
?>