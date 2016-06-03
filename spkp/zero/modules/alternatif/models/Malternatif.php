<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Malternatif extends CI_Model {
	var $table = 'tb_alternatif';
    var $column = array('id_alternatif','nm_alternatif',
    					'knmsa','knfsa','knksa','knbsa','knsesa','kngsa','knesa','knsosa',
    					'knmsb','knfsb','knksb','knbsb','knsesb','kngsb','knesb','knsosb',
    					'ktq','khm');
    var $order = array('id_alternatif' => 'asc');
	function __constuct(){
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
    function getkriteria($data){    
        $this->db->where('id_kriteriagroup',$data);
        return $this->db->get('tb_kriteria');
    }
    function alternatifedit($data){	
        $this->db->where('id_alternatif',$data['id_alternatif']);
        return $this->db->get('tb_alternatif');
    }
    function totalnya(){ 
        return $this->db->get('tb_alternatif');
    }
}