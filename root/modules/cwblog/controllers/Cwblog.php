<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cwblog extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || ',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
        //$this->data['is_buttrectag']= $this->template->is_footrectag();
    }
	public function index($num1=0){
		$data['limit']=1;
		$data['offset']=$num1;
		if (is_null($data['offset']) || empty($data['offset'])){
            $data['offset'] = 0;
        }
        /*else{
            $data['offset'] = ( $data['offset'] * $data['limit']) - $data['limit'];
        }*/
        $data['uri'] = 1;
		$this->data['view_cont']	=	$this->template->cw_home_limit($data);
		if($this->data['view_cont']->num_rows()>0) {
			$data['jumlah_cat'] = $this->template->is_sum_home($data);
			$this->data['pager_links'] = $this->template->paging(base_url('page/'),$data);
		}	
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
	public function dashboard(){
			$view='cwblog/trt_content';
			$this->mlib->template_rt($view,$this->data);
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