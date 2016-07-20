<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mzero_categories extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getcategories_s(){
		$result	= $this->db->get('tb_categories');;
		return $result;
	}
	public function change_categories_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_categories', $data['id_categories']);
		$this->db->update('tb_categories');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function cek_categories_s($data) {
		$this->db->where('id_categories', $data['id_categories']);
		$result 	= $this->db->get('tb_categories');
		return $result;
	}
	public function cek_ccategories_s($data) {
		$this->db->where('id_categories', $data['id_categories']);
		$result 	= $this->db->get('tb_content');
		return $result;
	}
	public function cek_tccategories_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	= $this->db->get('tb_tagcont');
		return $result;
	}
	public function cek_cccategories_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	= $this->db->get('tb_comment');
		return $result;
	}
	public function cek_rcccategories_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$result 	= $this->db->get('tb_comment');
		return $result;
	}
	public function change_ccategories_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_categories', $data['id_categories']);
		$this->db->update('tb_content');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function change_tccategories_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_content', $data['id_content']);
		$this->db->update('tb_tagcont');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function del_cccategories_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$this->db->delete('tb_comment');
		return $result;
	}
	public function del_rcccategories_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->delete('tb_replay');
		return $result;
	}
	public function del_tccategories_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	= $this->db->delete('tb_tagcont');
		return $result;
	}
	public function del_ccategories_s($data) {
		$this->db->where('id_categories', $data['id_categories']);
		$result 	= $this->db->delete('tb_content');
		return $result;
	}
	public function del_categories_s($data) {
		$this->db->where('id_categories', $data['id_categories']);
		$result 	= $this->db->delete('tb_categories');
		return $result;
	}
	public function cek_nmc_s($data) {
		$this->db->where('name_categories', $data['name_c']);
		$this->db->where('column', $data['column']);
		$result 	= $this->db->get('tb_categories');
		return $result;
	}
	public function add_nmc_s($data) {
		$this->db->insert('tb_categories',$data);
		$result 	= $this->db->affected_rows();
		return $result;
	}
	public function edit_nmc_s($data_update,$data) {
		$this->db->where('id_categories', $data['id_categories']);
		$this->db->update('tb_categories',$data_update);
		$result=$this->db->affected_rows();
		return $result;
	}
	
}