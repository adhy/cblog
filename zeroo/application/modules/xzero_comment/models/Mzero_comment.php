<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mzero_comment extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getcomment_s(){
		$this->db->where('read_c','1');
		$result	= $this->db->get('tb_comment');;
		return $result;
	}
	public function getcontentn_s(){
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	
	public function getrcomment_s(){
		$this->db->where('read_c','0');
		$result	= $this->db->get('tb_comment');
		return $result;
	}
	public function cek_comment_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$result 	= $this->db->get('tb_comment');
		return $result;
	}
	public function cek_replay_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$result 	= $this->db->get('tb_replay');
		return $result;
	}
	public function change_replay_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->update('tb_replay');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function change_comment_s($data) {
		$this->db->set('active',$data['active']);
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->update('tb_comment');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function del_comment_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->delete('tb_comment');
		return $result;
	}
	public function delreplay_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->delete('tb_replay');
		return $result;
	}
	public function del_replay_s($data) {
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->delete('tb_replay');
		return $result;
	}
	public function change_readc_s($data) {
		$this->db->set('read_c',$data['read_c']);
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->update('tb_comment');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function inreplay_s($data){
		$this->db->insert('tb_replay', $data);
		$result=$this->db->affected_rows();
		return $result;	
	}
	public function upreplay_s($data,$data_update) {
		$this->db->set('replay',$data['replay']);
		$this->db->where('id_comment', $data['id_comment']);
		$this->db->update('tb_replay');
		$result=$this->db->affected_rows();
		return $result;
	}
	public function getcontent_s($data){
		$this->db->select('tb_content.judul','tb_comment.date');
		$this->db->join('tb_content','tb_comment.id_content = tb_content.id_content','inner');			
		$this->db->where('tb_comment.id_comment', $data['id_comment']);		
		$result	= $this->db->get('tb_comment');;
		return $result;
	}
	
}