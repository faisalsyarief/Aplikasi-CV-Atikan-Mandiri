<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muangkeluar extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function view(){
		return $this->db->get('pengeluaran')->result_array();
	}

	public function detail($id){
		$this->db->where('id_luar', $id);
		return $this->db->get('pengeluaran')->result_array();
	}

	//query insert/ save
	public function insert($data){
		return $this->db->insert('pengeluaran', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('id_luar',$id);
		return $this->db->update('pengeluaran', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('pengeluaran', array('id_luar' => $id));
	}

	public function viewOmzetKeluar($tahun){
		$this->db->where('YEAR(pengeluaran.tgl_keluar)', $tahun);
		return $this->db->get('pengeluaran')->result_array();
	}

	public function viewOmzetKeluarbulanan($bulan){
		$this->db->where('YEAR(pengeluaran.tgl_keluar)', $bulan);
		return $this->db->get('pengeluaran')->result_array();
	}
	public function viewOmzetKeluarminggu($minggu){
		$this->db->where('YEAR(pengeluaran.tgl_keluar)', $minggu);
		return $this->db->get('pengeluaran')->result_array();
	}
	
	public function getKode(){
		$q = $this->db->query("select max(right(id_luar,3)) as id_luar from pengeluaran");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->id_luar)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "PLN".$kd;
	}
}
?>