<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb_home extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getnew(){
		$this->db->where('active','0');
		$this->db->order_by('id_content', 'DESC');
		$this->db->limit(3);
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	public function getnewn(){
		$this->db->where('active','0');
		$this->db->order_by('id_content', 'DESC');
		$this->db->limit(1);
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	public function getpop(){
		$this->db->where('active','0');
		$this->db->order_by('views', 'DESC');
		$this->db->limit(3);
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	
	
}