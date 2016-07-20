<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb_template extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	public function getnew(){
		$this->db->where('active','0');
		$this->db->order_by('id_content', 'DESC');
		$this->db->limit(3);
		$result	= $this->db->get('tb_content');
		return $result;
	}
	public function getnewn(){
		$this->db->where('active','0');
		$this->db->order_by('id_content', 'DESC');
		$this->db->limit(1);
		$result	= $this->db->get('tb_content');
		return $result;
	}
	public function getpop(){
		$this->db->where('active','0');
		$this->db->order_by('views', 'DESC');
		$this->db->limit(3);
		$result	= $this->db->get('tb_content');
		return $result;
	}
	public function getcategoriesc(){
		$this->db->where('active','0');
		$this->db->where('column','1');
		$this->db->order_by('name_categories', 'DESC');
		$result	= $this->db->get('tb_categories');
		return $result;
	}
	public function getcategoriescc(){
		$this->db->where('active','0');
		$this->db->where('column','2');
		$this->db->order_by('name_categories', 'DESC');
		$result	= $this->db->get('tb_categories');
		return $result;
	}
	public function getallcat(){
		$this->db->where('active','0');
		$this->db->order_by('name_categories', 'ASC');
		$result	= $this->db->get('tb_categories');
		return $result;
	}
	public function getsumcont($data) {
		$this->db->join('tb_categories','tb_content.id_categories = tb_categories.id_categories','inner');		
		$this->db->where('tb_categories.id_categories', $data);
		$this->db->where('tb_categories.active', "0");
		$this->db->where('tb_categories.column', "1");
		$result 	=$this->db->get('tb_content');
		return $result;
	}
	public function getsumcontt($data) {
		$this->db->join('tb_categories','tb_content.id_categories = tb_categories.id_categories','inner');	
		$this->db->where('tb_categories.id_categories', $data);	
		$this->db->where('tb_categories.active', "0");
		$this->db->where('tb_categories.column', "2");
		$result 	=$this->db->get('tb_content');
		return $result;
	}
	public function gettag(){
		$this->db->where('active','0');
		$this->db->order_by('id_tag', 'ASC');
		$result	= $this->db->get('tb_tag');
		return $result;
	}
	public function getcont(){
		$this->db->where('active','0');
		$this->db->order_by('views', 'DESC');
		$this->db->limit(4);
		$result	= $this->db->get('tb_content');
		return $result;
	}
	public function getprofil($data){
		$this->db->select('tb_login.email,tb_user.name,tb_user.birthday,tb_user.phone,tb_user.country,tb_user.description,tb_user.photo');
		$this->db->join('tb_user','tb_user.id_login = tb_login.id_login','inner');	
		$this->db->where('tb_login.id_login',$data['id_login']);			
		$result	= $this->db->get('tb_login');;
		return $result;
	}
	
	public function getprofilicon($data){
		$this->db->select('tb_sosmed.icon,tb_usesos.url');	
		$this->db->join('tb_usesos','tb_usesos.id_login = tb_login.id_login','inner');
		$this->db->join('tb_sosmed','tb_sosmed.id_sosmed = tb_usesos.id_sosmed','inner');
		$this->db->where('tb_usesos.id_login',$data['id_login']);		
		$this->db->where('tb_sosmed.active','0');		
		$this->db->where('tb_usesos.active','0');	
		$result	= $this->db->get('tb_login');
		return $result;
	}
	/*public function getcontcat_limit($data){
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
		$this->db->select('tb_categories.name_categories,tb_categories.id_categories,tb_content.id_content,tb_content.judul,tb_content.isi,tb_content.url_cont,tb_content.date');	
		$this->db->join('tb_categories','tb_categories.id_categories = tb_content.id_categories','inner');
		$this->db->where('tb_categories.name_categories',$data['name_kategori']);		
		$this->db->where('tb_categories.active','0');		
		$this->db->where('tb_content.active','0');
		$this->db->get('tb_content');
		$result=$this->db->count_all_results();
		return $result;
	}
	public function getconttag($data){
		$this->db->select('tb_tag.name_tag,tb_tag.id_tag,tb_tagcont.id_tagcont,tb_content.id_content,tb_content.judul,tb_content.isi,tb_content.url_cont,tb_content.date');	
		$this->db->join('tb_tagcont','tb_tagcont.id_content = tb_content.id_content','inner');
		$this->db->join('tb_tag','tb_tag.id_tag = tb_tagcont.id_tag','inner');
		$this->db->where('tb_tag.name_tag',$data);		
		$this->db->where('tb_tagcont.active','0');		
		$this->db->where('tb_content.active','0');
		$this->db->order_by('tb_content.id_content', 'DESC');	
		$result	= $this->db->get('tb_content');;
		return $result;
	}*/
	public function getcontenttag($data){
		$this->db->select('tb_tag.name_tag,tb_tag.id_tag,tb_tagcont.id_tagcont');	
		$this->db->join('tb_tag','tb_tag.id_tag = tb_tagcont.id_tag','inner');
		$this->db->where('tb_tagcont.id_content',$data);		
		$this->db->where('tb_tag.active','0');		
		$this->db->order_by('tb_tag.id_tag', 'DESC');	
		$result	= $this->db->get('tb_tagcont');
		return $result;
	}
	public function getcontent($data){
		$this->db->select('tb_categories.name_categories,tb_categories.id_categories,tb_content.id_content,tb_content.judul,tb_content.isi,tb_content.url_cont,tb_content.date,tb_content.act_comment');	
		$this->db->join('tb_categories','tb_categories.id_categories = tb_content.id_categories','inner');
		$this->db->where('tb_content.judul',$data);		
		$this->db->where('tb_categories.active','0');		
		$this->db->where('tb_content.active','0');
		$this->db->limit(1);
		$result	= $this->db->get('tb_content');
		return $result;
	}
	public function getcontentcom($data){	
		$this->db->where('id_content',$data);		
		$this->db->where('read_c','0');		
		$this->db->where('active','0');
		$this->db->order_by('id_comment', 'DESC');			
		$result	= $this->db->get('tb_comment');
		return $result;
	}
	public function getcontentcomre($data){
		$this->db->select('tb_comment.id_comment,tb_replay.id_replay,tb_replay.replay,');
		$this->db->join('tb_comment','tb_comment.id_comment = tb_replay.id_comment','inner');
		$this->db->where('tb_replay.id_comment',$data);						
		$this->db->where('tb_replay.active','0');		
		$result	= $this->db->get('tb_replay');
		return $result;
	}

	
	
}