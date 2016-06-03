<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model {
	var $table = 'tb_user';
    var $column = array('id_user','status','nm_user','email');
    var $order = array('id_user' => 'asc');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getusername($data){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_admin', 'tb_admin.id_user = tb_user.id_user');
        $this->db->where('tb_admin.username',$data['username']);
        $this->db->where('tb_admin.password',$data['password']);
        $this->db->where('tb_user.status',1);
        return $this->db->get();
    }
	function getdataid($data){
		$this->db->where('id_user',$data['id_user']);
		return $this->db->get('tb_user');
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
        $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where_not_in('status',1);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){	
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}