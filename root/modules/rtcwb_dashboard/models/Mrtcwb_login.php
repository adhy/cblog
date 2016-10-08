<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_dashboard extends CI_Model {
	var $table = 'cb_log';
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getusername($data){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('cb_profile', 'cb_log.id_user = cb_profile.id_user');
		$this->db->where('cb_profile.email', $data['email']);
		$this->db->where('cb_log.pass_log', $data['password']);
		$query = $this->db->get();
		return $query;
	}

}