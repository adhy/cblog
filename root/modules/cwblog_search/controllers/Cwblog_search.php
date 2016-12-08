<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cwblog_search extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || ',
			'author'    => 'ADW',
      'table'    => $this->uri->segment(1),
      'search'    => $this->uri->segment(2),
      'page'    => $this->uri->segment(3),
      'offset'    => $this->uri->segment(4),
		);
	public function __construct(){
        parent::__construct();
        //$this->data['is_buttrectag']= $this->template->is_footrectag();
    }
	public function index(){
		$this->data['limit']=2;
		//$this->data['offset']=$this->uri->segment(2);
    $url=$this->data['table'].$this->data['search'].'page/';
		if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 2;
		$this->data['view_cont']	=	$this->template->cw_home_limit($this->data);
		if($this->data['view_cont']->num_rows()>0) {
			$this->data['jumlah_cat'] = $this->template->is_sum_home($this->data);
			$this->data['pager_links'] = $this->template->paging(base_url($url),$this->data);
		}	
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
	function is_recent(){
		$this->data['limit']=2;
		$this->data['offset']=$this->uri->segment(2);
		if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 2;
		$this->data['view_cont']	=	$this->template->cw_home_limit($this->data);
		if($this->data['view_cont']->num_rows()>0) {
			$this->data['jumlah_cat'] = $this->template->is_sum_home($this->data);
			$this->data['pager_links'] = $this->template->paging(base_url('recent/'),$this->data);
		}	
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
	/*function index($offset=0)
{

   //set a limit of 10 per result
   $limit = 10;

   //query the database
   $q = "SELECT * FROM {table_name} LIMIT={limit} OFFSET={offset} ORDER BY {date} desc";

   //count the results
   $count = count({query results});

   //setup pagination config
   $config = array(
        'base_url' => site_url('controller/'),
        'total_rows' => $count,
        'per_page' => $limit,
        'uri_segment' => 2
   );

   //init the pagigination
   $this->pagination->initialize($config);

   //load the view and pagination data
    $this->load->view('link_to_template', array(
            'pagination'  =>  $this->pagination->create_links(),
            'results'  =>  {query results}
    ));

} */

}