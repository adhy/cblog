<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msiswa extends CI_Model {
	var $table = 'tb_siswa';
    var $column = array('id_siswa','nis',
    					'nm_siswa','tgl_lahir','walisiswa','jurusan');
    var $order = array('nm_siswa' => 'asc');
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
        $this->db->order_by('nm_siswa','asc');
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

    function getnis($data){
    	$this->db->where('nis',$data['nis']);
    	return $this->db->get($this->table);
    }
    function getkriteria($data){    
        $this->db->where('id_kriteriagroup',$data);
        return $this->db->get('tb_kriteria');
    }
    function getdatasis($data){
    	$this->db->where('id_siswa',$data['id_siswa']);
    	return $this->db->get($this->table);
    }


    function getid(){
        return $this->db->get('tb_alternatif');
    } 
    function getcetak(){
        $this->db->order_by('nm_siswa','asc');
        return $this->db->get('tb_siswa');
    }
    function getsiswa($data){
        $this->db->where('id_siswa',$data);
        return $this->db->get('tb_nilai')->row();
    }
    function getsiswanilai($data){
        $this->db->where('id_siswa',$data);
        return $this->db->get('tb_nilai');
    }
    function totalhasilsiswa($data){
        $this->db->where('id_nilai',$data['id_nilaisiswahasil']);
        return $this->db->get('tb_hasil');
    }
    function getsiswanilaiorder($data){
        $this->db->where('id_nilai',$data);
        $this->db->order_by('v','desc');
        return $this->db->get('tb_hasil');
    }
    function getvup($data){
        $this->db->where('id_nilai',$data['id_nilaisiswahasil']);
        $this->db->where('result',1);
        return $this->db->get('tb_hasil');
    }
    function getnamaalternatif($data){
        $this->db->where('id_alternatif',$data);
        return $this->db->get('tb_alternatif');
    }

    function tampil_nilai($data){
        $this->db->select('*');
        $this->db->from('tb_nilai');
        $this->db->join('tb_siswa','tb_nilai.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_nilai.id_siswa',$data);
        return $this->db->get();
    }
}