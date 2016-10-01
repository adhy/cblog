<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_reset extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getemail($data){
		$this->db->where('email', $data['email']);
		return $this->db->get('cb_profile');
	}

}