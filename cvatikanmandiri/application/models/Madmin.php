<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function verify($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user')->result_array();
		if(count($query)>0){
			$this->session->set_userdata('userid', @$query[0]['userid']);
			return true;
		}else{
			return false;
		}
	}
}
?>