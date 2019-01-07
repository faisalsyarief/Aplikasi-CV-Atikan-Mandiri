<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	//query insert/ save
	public function insert($data){
		return $this->db->insert('user', $data);
	}

	//query update
	public function update($id, $data){
		$this->db->where('userid',$id);
		return $this->db->update('user', $data);

	}

	//query delete
	public function delete($id){
		return $this->db->delete('user', array('userid' => $id));
	}

	//query view
	public function view(){
		return $this->db->get('user')->result_array();
	}

	//query detail
	public function detail($id)
	{
		$hasil = $this->db->where('userid',$id)
		->limit(1)
		->get('user');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function detailuser($id){
		$this->db->where('userid', $id);
		return $this->db->get('user')->result_array();
	}

	public function check_credential()
	{
		$username = set_value('username');
		$password = set_value('password');
		
		$hasil = $this->db->where('username',$username)
		->where('password',$password)
		->limit(1)
		->get('user');
		
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function check_user($data = array()){
		$hasil = $this->db->where(array('email' => $data['email']))
		->limit(1)
		->get('user');
		
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
    }

    public function find_email($email)
	{
		$hasil = $this->db->where('email',$email)
		->limit(1)
		->get('user');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function getKode(){
		$q = $this->db->query("select max(right(userid,3)) as userid from user");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int) $k->userid)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd ="001";
		}
		return "USR".$kd;
	}
	
	public function register($user_data)
	{
		$this->db->insert('user',$user_data);
	}

	public function get_user()
	{
		$hasil=$this->db->get('user');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}
	
	public function find($id)
	{
		$hasil = $this->db->where('userid',$id)
		->limit(1)
		->get('user');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

}
?>