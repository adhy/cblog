
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcwblog extends CI_Model {
    var $parent = '0';
    var $hasil  = '';
	function __constuct(){
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.froco
	}
    function cw_home_limit($data){
        $this->db->select('*'); 
        $this->db->join('cb_categories','cb_categories.id = cb_contents.id_cat','inner');
        $this->db->join('cb_profile','cb_profile.id_user = cb_contents.creator','inner');     
        $this->db->where('cb_contents.status','1');
        $this->db->limit($data['limit'],$data['offset']);
        $this->db->order_by('cb_contents.id', 'DESC');   
        $result = $this->db->get('cb_contents');;
        return $result;
    }
    function is_sum_home(){
        $this->db->select('*'); 
        $this->db->from('cb_contents');
        $this->db->join('cb_categories','cb_categories.id = cb_contents.id_cat','inner');
        $this->db->join('cb_profile','cb_profile.id_user = cb_contents.creator','inner');     
        $this->db->where('cb_contents.status','1');
        $result=$this->db->count_all_results();
        return $result;
    }
    function cw_cat_limit($data){
        $this->db->select('*'); 
        $this->db->join('cb_categories','cb_categories.id = cb_contents.id_cat','inner');
        $this->db->join('cb_profile','cb_profile.id_user = cb_contents.creator','inner');     
        $this->db->where('cb_contents.status','1');
        $this->db->where('cb_categories.slg_c',$data['is_c']);
        $this->db->limit($data['limit'],$data['offset']);
        $this->db->order_by('cb_contents.id', 'DESC');   
        $result = $this->db->get('cb_contents');;
        return $result;
    }
    function is_sum_cat($data){
        $this->db->select('*'); 
        $this->db->from('cb_contents');
        $this->db->join('cb_categories','cb_categories.id = cb_contents.id_cat','inner');
        $this->db->join('cb_profile','cb_profile.id_user = cb_contents.creator','inner');     
        $this->db->where('cb_contents.status','1');
        $this->db->where('cb_categories.slg_c',$data['is_c']);
        $result=$this->db->count_all_results();
        return $result;
    }
    function cw_tag_limit($data){
        $this->db->select('cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader, cb_tagsrelation.id_cont, GROUP_CONCAT(cb_tagsrelation.slg_t) as idiot');
        $this->db->from('cb_contents');
        $this->db->where('cb_contents.status','1');
        $this->db->join('cb_tagsrelation','cb_tagsrelation.id_cont=cb_contents.id');
        //$this->db->join('cb_tags','cb_tagsrelation.id_cont=cb_tags.id');
        $this->db->order_by("cb_contents.c_date",'DESC');
        $this->db->group_by(" cb_tagsrelation.id_cont, cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader");
        $this->db->limit($data['limit'],$data['offset']);
        return $this->db->get();
    }
    function is_sum_tag($data){
        $this->db->select('cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader, cb_tagsrelation.id_cont, GROUP_CONCAT(cb_tagsrelation.slg_t) as idiot');
        $this->db->from('cb_contents');
        $this->db->where('cb_contents.status','1');
        $this->db->join('cb_tagsrelation','cb_tagsrelation.id_cont=cb_contents.id');
        //$this->db->join('cb_tags','cb_tagsrelation.id_cont=cb_tags.id');
        $this->db->order_by("cb_contents.c_date",'DESC');
        $this->db->group_by(" cb_tagsrelation.id_cont, cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader");
        $this->db->limit($data['limit'],$data['offset']);
        $result=$this->db->count_all_results();
        return $result;
    }
    function paging($base_url,$data){   
       $this->load->library('pagination');
        $config = array(
            'uri_segment'           => $data['uri'],
            'base_url'              => $base_url,
            'total_rows'             => $data['jumlah_cat'],
            'per_page'              => $data['limit'],
                'use_page_numbers'      => TRUE,
                'display_pages' => TRUE,
                //'uri_segment'       => $data['offset'],
            'first_url'             => $base_url.'.html',
            'num_tag_open'             => ' <li>',
            'num_tag_close'             => ' </li>',
            'cur_tag_open'             => ' <li class="active"><a href="">',
            'cur_tag_close'             => ' </a></li>',
            'first_link'             => 'Newer &rarr;',
            'first_tag_open'         => '<li class="next_pagination">',
            'first_tag_close'        => '</li>',
            'last_link'             => '&larr; Older',
                'last_tag_open'         => '<li class="prev_pagination">',
                'last_tag_close'        => '</li>',
                'full_tag_open'         => '<ul class="clearfix">',
                'full_tag_close'        => '</ul>',
                'suffix'                => '.html',
                'next_link'                => '',
                'prev_link'                => ''
        );

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }   
}