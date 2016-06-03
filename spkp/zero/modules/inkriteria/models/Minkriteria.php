<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Minkriteria extends CI_Model {
	var $table = 'tb_kriteria';
    var $column = array('id_kriteria','rangenilai','weight','status');
    var $order = array('id_kriteria' => 'asc');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getkriteria($data){
		$this->db->select('*');
		$this->db->from('tb_kriteria');
		$this->db->join('tb_kriteriagroup', 'tb_kriteria.id_kriteriagroup = tb_kriteriagroup.id_kriteriagroup');
		$this->db->where('tb_kriteria.id_kriteriagroup',$data['id_kriteriagroup']);
		return $this->db->get();
	}
	function getkriterianame($data){
		$this->db->where('id_kriteriagroup',$data['id_kriteriagroup']);
		return $this->db->get('tb_kriteriagroup')->result();
	}
	function weight($data){
		$this->db->where('id_kriteriagroup',$data['id_kriteriagroup']);
		$this->db->order_by('weight','desc');
		$this->db->limit(1);
		return $this->db->get('tb_kriteria')->row();
	}
	function getdataid($data){
		$this->db->where('id_kriteria',$data['id_kriteria']);
		return $this->db->get('tb_kriteria');
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
 
    function get_datatables($data){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    	$this->db->join('tb_kriteriagroup', 'tb_kriteria.id_kriteriagroup = tb_kriteriagroup.id_kriteriagroup');
        $this->db->where('tb_kriteria.id_kriteriagroup',$data['idview']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($data){
        $this->_get_datatables_query();
        $this->db->join('tb_kriteriagroup', 'tb_kriteria.id_kriteriagroup = tb_kriteriagroup.id_kriteriagroup');
        $this->db->where('tb_kriteriagroup.id_kriteriagroup',$data['idview']);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($data){	
    	$this->db->join('tb_kriteriagroup', 'tb_kriteria.id_kriteriagroup = tb_kriteriagroup.id_kriteriagroup');
        $this->db->where('tb_kriteriagroup.id_kriteriagroup',$data['idview']);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}