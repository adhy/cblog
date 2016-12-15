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
    case '':
        $this->index();
    break;
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
      $this->is_read();
    break;

    case 'search':
      $this->is_search();
    break;
    
    default:
      $this->is_404();
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
  function is_search(){
    if(!$_POST){
      $this->data['is_se']=$this->uri->segment(2);
      if(is_null($this->data['is_se']) || empty($this->data['is_se'])){
       // echo json_encode(array("msg"=>'null'));
        $this->_is_null_sea();
      }else{
         $this->_search($this->data);
      }
    }else{
      $this->data['is_se'] =$this->db->escape_str($this->input->post('search', TRUE));
      if(is_null($this->data['is_se']) || empty($this->data['is_se'])){
        //echo json_encode(array("msg"=>'null'));
        $this->_is_null_sea();
      }else{
         $this->_search($this->data);
      }
    }
  }
  private function _is_null_sea(){
    $this->data['css_topp']=$this->template->css_toppub();
    $view='cwblog/trt_page404';
     $this->mlib->templatepublic($view,$this->data);
  }
  private function _search($data){
    $this->data['limit']=2;
    $this->data['offset']=$this->uri->segment(4);
    $this->data['is_c']=$data['is_se'];
    $this->data['css_topp']=$this->template->css_toppub();
    if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 4;
    $this->data['view_cont']  = $this->mcwblog->cw_search_limit($this->data);
    if($this->data['view_cont']->num_rows()>0) {
      $this->data['jumlah_cat'] = $this->mcwblog->is_sum_search($this->data);
      $this->data['pager_links'] = $this->mcwblog->paging(base_url('search/'.$this->data['is_c'].'/page'),$this->data);
      $view='cwblog/trt_page';
    } else{
      $view='cwblog/trt_page404';
    }
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
      $view='cwblog/trt_page';
		}else{
      $view='cwblog/trt_page404';
    }
		$this->data['css_topp']=$this->template->css_toppub();
		$this->mlib->templatepublic($view,$this->data);
	}
  function is_category(){
    $this->data['limit']=6;
    $this->data['offset']=$this->uri->segment(4);
    $this->data['is_c']=$this->uri->segment(2);
    $this->data['css_topp']=$this->template->css_toppub();

    if (is_null($this->data['offset']) || empty($this->data['offset'])){
            $this->data['offset'] = 0;
        }
        else{
            $this->data['offset'] = ( $this->data['offset'] * $this->data['limit']) - $this->data['limit'];
        }
        $this->data['uri'] = 4;
    $this->data['view_cont']  = $this->mcwblog->cw_cat_limit($this->data);
    $view_cont=$this->data['view_cont']->num_rows();
    if($view_cont>0) {
      $this->data['jumlah_cat'] = $this->mcwblog->is_sum_cat($this->data);
      $this->data['pager_links'] = $this->mcwblog->paging(base_url('category/'.$this->data['is_c'].'/page'),$this->data);
      $view='cwblog/trt_page';
    }else{
      $query = $this->db->get_where('cb_categories', array('slg_c' => $this->data['is_c']));
      if($query->num_rows()>0){
        $result = $query->row();
        $this->data['is_parent']=$result->id;
        $this->data['view_cont']  = $this->mcwblog->cw_cat_limitp($this->data);
          if($this->data['view_cont']->num_rows()>0) {
          $this->data['jumlah_cat'] = $this->mcwblog->is_sum_catp($this->data);
          $this->data['pager_links'] = $this->mcwblog->paging(base_url('category/'.$this->data['is_c'].'/page'),$this->data);
          $view='cwblog/trt_page';
          }else{
            $view='cwblog/trt_page404';
          }
      }else{
        $view='cwblog/trt_page404';
      }
      
    } 
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
    $view='cwblog/trt_page';
    }else{
      $view='cwblog/trt_page';
    }
    $this->data['css_topp']=$this->template->css_toppub();
    $this->mlib->templatepublic($view,$this->data);
  }
  function is_read(){
    $this->data['is_c']=$this->uri->segment(2);
    $this->data['view_cont']=$this->mcwblog->is_reading($this->data);
    $this->data['css_topp']=$this->template->css_toppub();
    $this->data['code']=$this->mlib->image_re();
    $view='cwblog/trt_content';
    $this->mlib->templatepublic($view,$this->data);
  }
function is_404(){
  $this->data['css_topp']=$this->template->css_toppub();
  $view='cwblog/trt_page404';
  $this->mlib->templatepublic($view,$this->data);

}

}
