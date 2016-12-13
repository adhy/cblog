<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cwblog extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || ',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
        $this->load->model('cwblog/mcwblog', 'mcwblog');
        //$this->data['is_buttrectag']= $this->template->is_footrectag();
    }
    public function _remap(){   
    $segment_1 = $this->uri->segment(1);
    switch ($segment_1) {
    case null:
    case false:
    case 'page':
        $this->index();
    break;
    case 'recent':
        $this->is_recent();
    break;

    case 'category':
        $this->is_category();
    break;

    case 'tag':
        $this->is_tag();
    break;

    case 'read':
      $this->profil_web();
    break;
    
    default:
      show_404();
    break;
    }
  } 
	public function index(){
		$this->data['limit']=2;
		$this->data['offset']=$this->uri->segment(2);
		if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 2;
		$this->data['view_cont']	=	$this->mcwblog->cw_home_limit($this->data);
		if($this->data['view_cont']->num_rows()>0) {
			$this->data['jumlah_cat'] = $this->mcwblog->is_sum_home($this->data);
			$this->data['pager_links'] = $this->mcwblog->paging(base_url('page/'),$this->data);
		}	
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
	function is_recent(){
		$this->data['limit']=6;
		$this->data['offset']=$this->uri->segment(3);

		if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 3;
		$this->data['view_cont']	=	$this->mcwblog->cw_home_limit($this->data);
		if($this->data['view_cont']->num_rows()>0) {
			$this->data['jumlah_cat'] = $this->mcwblog->is_sum_home($this->data);
			$this->data['pager_links'] = $this->mcwblog->paging(base_url('recent/page'),$this->data);
		}	
        var_dump($this->data['pager_links']);
        var_dump($this->data['jumlah_cat']);
        var_dump($this->data['offset']);
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
  function is_category(){
    $this->data['limit']=6;
    $this->data['offset']=$this->uri->segment(4);
    $this->data['is_c']=$this->uri->segment(2);

    if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 4;
    $this->data['view_cont']  = $this->mcwblog->cw_cat_limit($this->data);
    if($this->data['view_cont']->num_rows()>0) {
      $this->data['jumlah_cat'] = $this->mcwblog->is_sum_cat($this->data);
      $this->data['pager_links'] = $this->mcwblog->paging(base_url('category/'.$this->data['is_c'].'/page'),$this->data);
    } 
        var_dump($this->data['pager_links']);
        var_dump($this->data['jumlah_cat']);
        var_dump($this->data['is_c']);
    $this->data['css_topp']=$this->template->css_toppub();
    $view='cwblog/trt_page';
    $this->mlib->templatepublic($view,$this->data);
  }
  function is_tag(){
    $this->data['limit']=6;
    $this->data['offset']=$this->uri->segment(4);
    $this->data['is_c']=$this->uri->segment(2);

    if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 4;
    $this->data['view_cont']  = $this->mcwblog->cw_tag_limit($this->data);
    if($this->data['view_cont']->num_rows()>0) {
      $this->data['jumlah_cat'] = $this->mcwblog->is_sum_tag($this->data);
      $this->data['pager_links'] = $this->mcwblog->paging(base_url('tag/'.$this->data['is_c'].'/page'),$this->data);
    } 
        var_dump($this->data['pager_links']);
        var_dump($this->data['jumlah_cat']);
        var_dump($this->data['is_c']);
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
