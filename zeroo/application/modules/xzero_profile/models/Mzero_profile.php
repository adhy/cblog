<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mzero_profile extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getpass_s($data){
		$result 					= $this->db->get_where('tb_login', $data);
		return $result;
	}
	public function getuser_s($data){
		$this->db->select('tb_login.email,tb_user.name,tb_user.birthday,tb_user.phone,tb_user.country,tb_user.description,tb_user.photo');
		$this->db->join('tb_user','tb_user.id_login = tb_login.id_login','inner');			
		$this->db->where('tb_login.id_login', $data['id_login']);		
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	
	public function getiuser_s($data){
		$this->db->select('tb_sosmed.icon,tb_usesos.url,tb_sosmed.name_sosmed,tb_usesos.id_usesos,tb_usesos.active');	
		$this->db->join('tb_usesos','tb_usesos.id_login = tb_login.id_login','inner');
		$this->db->join('tb_sosmed','tb_sosmed.id_sosmed = tb_usesos.id_sosmed','inner');		
		$this->db->where('tb_sosmed.active','0');		
		$this->db->where('tb_usesos.active','0');
		$this->db->where('tb_login.id_login', $data['id_login']);		
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	public function getiiuser_s($data){
		$this->db->select('tb_sosmed.icon,tb_usesos.url,tb_sosmed.name_sosmed,tb_usesos.id_usesos,tb_usesos.active');	
		$this->db->join('tb_usesos','tb_usesos.id_login = tb_login.id_login','inner');
		$this->db->join('tb_sosmed','tb_sosmed.id_sosmed = tb_usesos.id_sosmed','inner');		
		$this->db->where('tb_sosmed.active','0');		
		$this->db->where('tb_login.id_login', $data['id_login']);		
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	public function getsosmed_s(){
		$this->db->where('active','0');
		$result=$this->db->get('tb_sosmed');
		return $result;	
	}
	public function insosmed_s($data){
		$this->db->insert('tb_usesos', $data);
		$result=$this->db->affected_rows();
		return $result;	
	}
	public function cek_sosmed_s($data) {
		$this->db->where('id_usesos', $data['id_usesos']);
		$result 	= $this->db->get('tb_usesos');
		return $result;
	}
	public function del_sosmed_s($data) {
		$this->db->where('id_usesos', $data['id_usesos']);
		$result 	= $this->db->delete('tb_usesos');
		return $result;
	}
	public function change_sosmed_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_usesos', $data['id_usesos']);
		$this->db->update('tb_usesos');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function upuser_s($data,$login) {
		$this->db->set('id_login',$login);
		$this->db->update('tb_user',$data);
		$result=$this->db->affected_rows();
		return $result;
	}
	public function uppass_s($data) {
		$this->db->set('password',$data['newpassword']);
		$this->db->where('id_login', $data['id_login']);
		$this->db->update('tb_login');
		$result=$this->db->affected_rows();
		return $result;
	}
}