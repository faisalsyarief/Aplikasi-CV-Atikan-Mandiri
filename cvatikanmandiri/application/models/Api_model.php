<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	
	public function get_pembelian()
	{
		$hasil=$this->db->get('pembelian');
		if($hasil->num_rows() > 0){
			return $hasil->result_array();
		}else{
			return false;
		}
	}

	public function get_pembelian_by_no_faktur($data=array())
	{
		$hasil=$this->db->get_where('pembelian',$data)->result_array();
		if($hasil){
			return $hasil[0];
		}
	}

	public function insert_pembelian($data=array())
	{
		$this->db->where('no_faktur',$no_faktur)->insert('pembelian',$data);
	}

	public function update_pembelian($no_faktur=array(), $data=array())
	{
		$this->db->where('no_faktur',$no_faktur)->update('pembelian',$data);	
	}
}
