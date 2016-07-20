<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mzero_sosmed extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getsosmed_s(){
		$result	= $this->db->get('tb_sosmed');;
		return $result;
	}
	public function cek_sosmed_s($data) {
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$result 	= $this->db->get('tb_sosmed');
		return $result;
	}
	public function cek_usesosmed_s($data) {
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$result 	= $this->db->get('tb_usesos');
		return $result;
	}
	public function change_usesosmed_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$this->db->update('tb_usesos');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function change_sosmed_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$this->db->update('tb_sosmed');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function del_sosmed_s($data) {
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$this->db->delete('tb_sosmed');
		return $result;
	}
	public function del_usesosmed_s($data) {
		$this->db->where('id_sosmed', $data['id_sosmed']);
		$this->db->delete('tb_usesos');
		return $result;
	}
	public function cek_namesosmed_s($data) {
		$this->db->where('name_sosmed', $data['namesosmed']);
		$result 	= $this->db->get('tb_sosmed');
		return $result;
	}
	public function add_sosmed_s($data){
		$this->db->insert('tb_sosmed', $data);
		$result=$this->db->affected_rows();
		return $result;	
	}
	public function edit_sosmed_s($data,$data_update) {
		$this->db->where('id_sosmed',$data['id_sosmed']);
		$this->db->update('tb_sosmed',$data_update);
		$result=$this->db->affected_rows();
		return $result;
	}
	
}