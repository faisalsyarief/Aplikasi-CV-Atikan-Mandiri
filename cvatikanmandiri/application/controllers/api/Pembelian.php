<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('api_model');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function index()
	{
		$pembelian = $this->api_model->get_pembelian();
		if(!empty($pembelian)){
			foreach ($pembelian as $pembelian) {
				$json[] = array(
					'no_faktur' => $pembelian['no_faktur'],
					'userid' => $pembelian['userid'],
					'tgl_beli' => $pembelian['tgl_beli'],
					'diskon' => $pembelian['diskon'],
					'total' => $pembelian['total'],
					'pembayaran' => $pembelian['pembayaran'],
					'sisa_hutang' => $pembelian['sisa_hutang'],
					'tgl_lunas' => $pembelian['tgl_lunas'],
					'gambar' => $pembelian['gambar'],
					'status' => $pembelian['status'],
					);
			}
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function detail()	
	{
		$no_faktur = $this->input->get('no_faktur');
		if(!empty($no_faktur)){
			$data = array('no_faktur' => $no_faktur);
			$pembelian = $this->api_model->get_pembelian_by_no_faktur($data);
			$json = array(
					'no_faktur' => $pembelian['no_faktur'],
					'userid' => $pembelian['userid'],
					'tgl_beli' => $pembelian['tgl_beli'],
					'diskon' => $pembelian['diskon'],
					'total' => $pembelian['total'],
					'pembayaran' => $pembelian['pembayaran'],
					'sisa_hutang' => $pembelian['sisa_hutang'],
					'tgl_lunas' => $pembelian['tgl_lunas'],
					'gambar' => $pembelian['gambar'],
					'status' => $pembelian['status'],
				);
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function add()	
	{
		$dataobjek = json_decode(file_get_contents("php://input"));
		$no_faktur = $dataobjek->no_faktur;
		$userid = $dataobjek->userid;
		$tgl_beli = $dataobjek->tgl_beli;
		$diskon = $dataobjek->diskon;
		$total = $dataobjek->total;
		$pembayaran = $dataobjek->pembayaran;
		$sisa_hutang = $dataobjek->sisa_hutang;
		$tgl_lunas = $dataobjek->tgl_lunas;
		$gambar = $dataobjek->gambar;
		$status = $dataobjek->status;
		if(!empty($no_faktur)){
			$data = array(
				'no_faktur' => $no_faktur,
				'userid' => $userid,
				'tgl_beli' => $tgl_beli,
				'diskon' => $diskon,
				'total' => $total,
				'pembayaran' => $pembayaran,
				'sisa_hutang' => $sisa_hutang,
				'tgl_lunas' => $tgl_lunas,
				'gambar' => $gambar,
				'status' => $status
				);

			$pembelian = $this->api_model->insert_pembelian($data);
			if(!empty($pembelian)){
				$json['status'] = "Data gagal disimpan";
			}else{
				$json['status'] = "Data berhasil disimpan";
			}
			echo json_encode($json);
		}
	}

	public function edit()	
	{
		$no_faktur = $this->input->get('no_faktur');
		$dataobjek = json_decode(file_get_contents("php://input"));
		$userid = $dataobjek->userid;
		$tgl_beli = $dataobjek->tgl_beli;
		$diskon = $dataobjek->diskon;
		$total = $dataobjek->total;
		$pembayaran = $dataobjek->pembayaran;
		$sisa_hutang = $dataobjek->sisa_hutang;
		$tgl_lunas = $dataobjek->tgl_lunas;
		$gambar = $dataobjek->gambar;
		$status = $dataobjek->status;
		if(!empty($name)){
			$data = array(
				'userid' => $userid,
				'tgl_beli' => $tgl_beli,
				'diskon' => $diskon,
				'total' => $total,
				'pembayaran' => $pembayaran,
				'sisa_hutang' => $sisa_hutang,
				'tgl_lunas' => $tgl_lunas,
				'gambar' => $gambar,
				'status' => $status
				);

			$pembelian = $this->api_model->update_pembelian($no_faktur, $data);
			if(!empty($pembelian)){
				$json['status'] = "Data gagal diedit";
			}else{
				$json['status'] = "Data berhasil diedit";
			}
			echo json_encode($json);
		}
	}

	public function delete()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		if($decoded->group=='1'){
			$code = $this->input->get('code');
			$product = $this->api_model->delete_product($code,$id_token);
			$json['status'] = "Data berhasil dihapus";
		}else{
			$json['warning'] = "Anda bukan admin"; 
		}
		echo json_encode($json);
	}

}
