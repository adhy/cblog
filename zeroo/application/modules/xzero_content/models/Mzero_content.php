<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mzero_content extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	public function getcontent_s(){
		$this->db->select('tb_categories.name_categories,tb_content.judul,tb_content.isi,tb_content.image_top,tb_content.date,tb_content.act_comment,tb_content.active,tb_content.id_content');
		$this->db->join('tb_categories','tb_content.id_categories = tb_categories.id_categories','inner');		
		//$this->db->where('tb_categories.active', '0');
		//$this->db->where('tb_content.active', '0');
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	public function cek_getcontent_s($data){
		$this->db->select('tb_categories.name_categories,tb_categories.id_categories,tb_content.judul,tb_content.isi,tb_content.image_top,tb_content.date,tb_content.act_comment,tb_content.active,tb_content.id_content');
		$this->db->join('tb_categories','tb_content.id_categories = tb_categories.id_categories','inner');		
		$this->db->where('tb_content.id_content', $data['id_content']);
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	public function getcategories_s() {
		$this->db->where('active', "0");
		$result 	= $this->db->get('tb_categories');
		return $result;
	}
	public function cek_content_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	= $this->db->get('tb_content');
		return $result;
	}
	public function cek_categories_s($data) {
		$this->db->select('tb_categories.id_categories,tb_content.id_content');
		$this->db->join('tb_categories','tb_content.id_categories = tb_categories.id_categories','inner');		
		$this->db->where('tb_content.id_content', $data['id_content']);
		$this->db->where('tb_categories.active', "0");
		$result 	= $this->db->get('tb_content');
		return $result;
	}
	
	public function change_content_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_content', $data['id_content']);
		$this->db->update('tb_content');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function change_act_comment_s($data) {
		$this->db->set('act_comment',$data['act_comment']);
		$this->db->where('id_content', $data['id_content']);
		$this->db->update('tb_content');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function change_tagcont_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_content', $data['id_content']);
		$this->db->update('tb_tagcont');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function del_content_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	=$this->db->delete('tb_content');
		return $result;
	}
	public function del_comment_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	=$this->db->delete('tb_comment');
		return $result;
	}
	public function cek_comment_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	=$this->db->get('tb_comment');
		return $result;
	}
	public function del_replay_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$result 	=$this->db->delete('tb_replay');
		return $result;
	}
	public function gettagcont_s($data) {
		$this->db->select('tb_tag.name_tag,tb_tag.id_tag,tb_tagcont.id_tagcont');
		$this->db->join('tb_tag','tb_tagcont.id_tag = tb_tag.id_tag','inner');		
		$this->db->where('tb_tag.active', "0");
		$this->db->where('tb_tagcont.id_content', $data['id_content']);
		$result 	=$this->db->get('tb_tagcont');
		return $result;
	}
	public function gettagcontt_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$this->db->where('id_tag', $data['tag']);
		$result 	=$this->db->get('tb_tagcont');
		return $result;
	}
	public function cek_tabletag_s() {
		$this->db->where('active', "0");
		$result 	=$this->db->get('tb_tag');
		return $result;
	}
	public function cek_tag_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	=$this->db->get('tb_tagcont');
		return $result;
	}
	public function cek_ktag_s($data) {
		$this->db->where('id_tagcont', $data['id_tagcont']);
		$result 	=$this->db->get('tb_tagcont');
		return $result;
	}
	public function del_tag_s($data) {
		$this->db->where('id_content', $data['id_content']);
		$result 	=$this->db->delete('tb_tagcont');
		return $result;
	}
	public function del_ktag_s($data) {
		$this->db->where('id_tagcont', $data['id_tagcont']);
		$result 	=$this->db->delete('tb_tagcont');
		return $result;
	}
	public function insertcont_s($data){
		$this->db->insert('tb_content', $data);
		$result=$this->db->affected_rows();
		return $result;	
	}
	public function intabtagcont_s($data){
		$this->db->insert('tb_tagcont', $data);
		$result=$this->db->affected_rows();
		return $result;	
	}
	public function updatecont_s($data,$update) {
		$this->db->where('id_content', $data['id_content']);
		$this->db->update('tb_content',$update);
		$result=$this->db->affected_rows();
		return $result;
	}
}