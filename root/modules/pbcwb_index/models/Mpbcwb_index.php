<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpbcwb_index extends CI_Model {
    var $tbco ='cb_contents';
    var $tbca = 'cb_categories';
    var $tbcala = 'cb_catreltion';
    var $tbtag = 'cb_tags';
    var $tbtag = 'cb_tagsrelation';
	function __constuct(){
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getcont($status=null){
		$this->db->select('*');
		$this->db->from('cb_contents');
		$this->db->join('cb_profile', 'cb_contents.creator = cb_profile.id_user');
		$this->db->where($tbco.'status', $status);
		$query = $this->db->get();
		return $query;
	}
}