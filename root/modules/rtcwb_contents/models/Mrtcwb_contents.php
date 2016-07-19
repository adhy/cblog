<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_contents extends CI_Model {
	var $table = 'cb_contents';
    var $column = array('id','imgheader',
    					'title','slug','meta_content','content','c_date','u_date','status','creator');
    var $order = array('title' => 'asc');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	private function _get_datatables_query(){
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
 
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        //$this->db->order_by('emmail','asc');
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all(){	
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function getcatid($data){
        $this->db->where('id',$data['id']);
        return $this->db->get($this->table);
    }
    function getcategories($data){    
        $this->db->where('status',$data);
        return $this->db->get('cb_categories');
    } 
    function gettags($data){    
        $this->db->where('status',$data);
        return $this->db->get('cb_tags');
    }
    function getcontent($data){    
        $this->db->where('title',$data['title']);
        return $this->db->get('cb_contents');
    }
    function getidcont($data){
        $this->db->where('slug',$data);
        return $this->db->get('cb_contents');
    }

}