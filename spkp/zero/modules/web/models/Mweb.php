<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function get_profil($data){
		$this->db->where('id_user', $data['id_user']);
		return $this->db->get('tb_user');
	}
	function get_usernamep($data){
		$this->db->where('id_user', $data['id_user']);
		return $this->db->get('tb_petugas');
	}
	function get_usernamea($data){
		$this->db->where('id_user', $data['id_user']);
		return $this->db->get('tb_admin');
	}

}