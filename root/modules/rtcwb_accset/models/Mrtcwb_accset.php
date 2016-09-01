<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_accset extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getpro($data){
		$this->db->select('*');
		$this->db->from('cb_log');
		$this->db->join('cb_profile', 'cb_log.id_user = cb_profile.id_user');
		$this->db->where('cb_profile.id_user', $data['id']);
		$query = $this->db->get();
		return $query;
	}

}