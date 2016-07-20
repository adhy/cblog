<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb_kategori extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	} 
	public function getprofil($data){
		$this->db->select('tb_login.email,tb_user.name,tb_user.birthday,tb_user.phone,tb_user.country,tb_user.description,tb_user.photo');
		$this->db->join('tb_user','tb_user.id_login = tb_login.id_login','inner');	
		$this->db->where('tb_login.id_login',$data['id_login']);			
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	public function getcontcat_limit($data){
		$this->db->select('tb_categories.name_categories,tb_categories.id_categories,tb_content.id_content,tb_content.judul,tb_content.isi,tb_content.url_cont,tb_content.date');	
		$this->db->join('tb_categories','tb_categories.id_categories = tb_content.id_categories','inner');
		$this->db->where('tb_categories.name_categories',$data['name_kategori']);		
		$this->db->where('tb_categories.active','0');		
		$this->db->where('tb_content.active','0');
		$this->db->limit($data['limit'],$data['offset']);
		$this->db->order_by('tb_content.id_content', 'DESC');	
		$result	= $this->db->get('tb_content');;
		return $result;
	}
	public function sum_category($data){
		$this->db->select('tb_content.id_categories,tb_content.id_content,tb_content.judul,tb_content.isi,tb_content.url_cont,tb_content.date');	
		$this->db->from('tb_content');
		$this->db->join('tb_categories','tb_categories.id_categories = tb_content.id_categories','inner');
		$this->db->where('tb_categories.name_categories',$data['name_kategori']);		
		$this->db->where('tb_categories.active','0');		
		$this->db->where('tb_content.active','0');
		$result=$this->db->count_all_results();
		return $result;
	}
	public function paging($base_url,$data)
    {	
       $this->load->library('pagination');
        $config = array(
			'uri_segment'			=> $data['uri'],
            'base_url'         		=> $base_url,
            'total_rows'      		 => $data['jumlah_cat'],
            'per_page'         		=> $data['uri'],
				'use_page_numbers' 		=> TRUE,
				'display_pages' => FALSE,
            'next_link'        		=> 'Newer &rarr;',
            'next_tag_open'       	=> '<li class="next">',
            'next_tag_close'        => '</li>',
            'prev_link'        		=> '&larr; Older',
				'prev_tag_open' 		=> '<li class="previous">',
				'prev_tag_close' 		=> '</li>',
				'full_tag_open' 		=> '<ul class="pager">',
				'full_tag_close' 		=> '</ul>',
				'suffix'        		=> '.html'
        );



        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }	
 }