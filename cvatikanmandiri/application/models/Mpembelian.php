<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpembelian extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert_pembelian($data){
		return $this->db->insert('pembelian', $data);
	}
	public function insert_detail_pembelian($data){
		return $this->db->insert('detail_pembelian', $data);
	}
	public function insert_hutang($data){
		return $this->db->insert('hutang', $data);
	}

	public function find_pembelian($id)
	{
		$hasil = $this->db->where('no_faktur',$id)->limit(1)->get('pembelian');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	//query update
	public function update_pembelian($id, $data){
		$this->db->where('no_faktur',$id);
		return $this->db->update('pembelian', $data);
	}

	public function update_detail_pembelian($id, $data){
		$this->db->where('no_faktur',$id);
		return $this->db->update('detail_pembelian', $data);

	}
	
	function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

	function updateDatab($table,$data,$id)
    {
        $this->db->where('no_faktur',$id)->update($table,$data);
    }

    function getDataBerkasEdit($id){
        return $this->db->query("SELECT * from pembelian where no_faktur = '$id' ")->result();
    }

	public function get_bank()
	{
		$hasil=$this->db->get('banking');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	//query delete
	public function delete($id){
		return $this->db->delete('pembelian', array('no_faktur' => $id));
	}
	public function delete_pembelian($id){
		return $this->db->delete('pembelian', array('no_faktur' => $id));
	}
	public function delete_detail_pembelian($id){
		return $this->db->delete('detail_pembelian', array('id_detailbeli' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('pembelian')->result_array();
	}
	public function viewagen($id){
		$this->db->where('userid',$id);
        $result=$this->db->get('pembelian');
		return $result->result_array();
	}
	public function view_detail_pembelian(){
		return $this->db->get('detail_pembelian')->result_array();
	}
	public function rekapitulasi(){
		return $this->db->get('pembelian')->result_array();
	}

	//query detail
	public function detail($id){
		$this->db->where('no_faktur', $id);
		return $this->db->get('pembelian')->result_array();
	}
	public function detail_pembelian($id){ //QUERY join
		$this->db->select('CONCAT(b.judul_buku," ",b.tingkat," ",b.jenis," ",b.kelas) as buku, d.qty, b.harga, d.no_faktur ')->from('pembelian p');
		$this->db->join('detail_pembelian d', 'd.no_faktur = p.no_faktur', 'left');
		$this->db->join('daftar_buku b', 'd.id_buku = b.id_buku', 'left');
		$this->db->where('p.no_faktur', $id);
		return $this->db->get()->result_array();
	}

	//Last row
	public function lastrow(){
		$this->db->select('MAX(no_faktur) as id');
		return $this->db->get('pembelian')->result_array();
	}

	//untuk rekap detail
	public function buku_agen($userid){
		$this->db->select('daftar_buku.*,CONCAT(daftar_buku.judul_buku,"_",daftar_buku.tingkat,"_",daftar_buku.kelas) as jdl_buku')->from('detail_pembelian');
		$this->db->join('pembelian','pembelian.no_faktur = detail_pembelian.no_faktur', 'left');
		$this->db->join('daftar_buku', 'detail_pembelian.id_buku = daftar_buku.id_buku', 'left');
		$this->db->where('pembelian.userid', $userid);
		$this->db->group_by('detail_pembelian.id_buku');
		return $this->db->get()->result_array();
	}

	public function faktur_agen($userid){
		$this->db->where('userid', $userid);
		return $this->db->get('pembelian')->result_array();
	}

	public function buku_jurnal(){
		$this->db->select('daftar_buku.*,CONCAT(daftar_buku.judul_buku,"_",daftar_buku.tingkat,"_",daftar_buku.kelas) as jdl_buku')->from('detail_pembelian');
		$this->db->join('pembelian','pembelian.no_faktur = detail_pembelian.no_faktur', 'left');
		$this->db->join('daftar_buku', 'detail_pembelian.id_buku = daftar_buku.id_buku', 'left');
		$this->db->group_by('detail_pembelian.id_buku');
		return $this->db->get()->result_array();
	}

	public function faktur_jurnal(){
		return $this->db->get('pembelian')->result_array();
	}

	public function det_agen($no_faktur,$idbuku){
		$this->db->where('no_faktur', $no_faktur);
		$this->db->where('id_buku', $idbuku);
		return $this->db->get('detail_pembelian')->result_array();
	}

	public function tagihanagen($userid){
		$this->db->select('sum(total) as totaltagihan');
		$this->db->where('userid', $userid);
		return $this->db->get('pembelian')->result_array();
	}

	public function agenbayarfaktur($userid){
		$this->db->select('sum(pembayaran) as totalbayar');
		$this->db->where('userid', $userid);
		return $this->db->get('pembelian')->result_array();
	}

	public function agenbayar($userid){
		$this->db->select('sum(pembayaran) as totalbayar');
		$this->db->where('userid', $userid);
		return $this->db->get('pembelian')->result_array();
	}

	public function getKode(){
		$q = $this->db->query("select max(right(no_faktur,3)) as no_faktur from pembelian");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->no_faktur)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "INV".$kd;
	}

	}
?>