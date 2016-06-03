<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function getusername($data){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_petugas', 'tb_petugas.id_user = tb_user.id_user');
		$this->db->where('tb_petugas.username',$data['username']);
		$this->db->where('tb_petugas.password',$data['password']);
		$this->db->where('tb_petugas.status',1);
		$this->db->where('tb_user.status',2);
		return $this->db->get();
	}
}