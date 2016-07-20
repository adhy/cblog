<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb_about extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getauser_s(){
		$this->db->select('tb_login.email,tb_user.name,tb_user.birthday,tb_user.phone,tb_user.country,tb_user.description,tb_user.photo');
		$this->db->join('tb_user','tb_user.id_login = tb_login.id_login','inner');			
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	
	public function getaiuser_s(){
		$this->db->select('tb_sosmed.icon,tb_usesos.url');	
		$this->db->join('tb_usesos','tb_usesos.id_login = tb_login.id_login','inner');
		$this->db->join('tb_sosmed','tb_sosmed.id_sosmed = tb_usesos.id_sosmed','inner');		
		$this->db->where('tb_sosmed.active','0');		
		$this->db->where('tb_usesos.active','0');	
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	
}