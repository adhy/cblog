<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_categories extends CI_Model {
	var $table = 'cb_categories';
    var $column = array('id','nm_c','sl_c',
    					'c_date','u_date');
    var $order = array('nm_c' => 'asc');
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
    function getcat($data){
        $this->db->where('nm_c',$data['nm_c']);
        return $this->db->get($this->table);
    }

}