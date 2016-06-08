<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_contents extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Contents',
			'header'	=> 'Contents',
			'text'     	=> 'CL-System',
			'author'    => 'ADW',
			'filejs'	=>	'contents.js',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_contents/mrtcwb_contents', 'contents');
    }
	public function index(){
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			$view='rtcwb_contents/trt_contents';
			$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}
	function ajax_list() {
	        $list = $this->contents->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->name;
	            $row[] = $person->emmail;
	            $row[] = $person->dt_c;
	 
	            //add html for action
	            $row[] = '<div class="btn-group">
	                <button type="button" class="btn btn-sm btn-success">Option</button>
	                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li class="drop-menu"><span onclick=javascript:edit_modalt('.$person->num.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Tag</span></li>
	                  <li class="drop-menu"><span onclick=javascript:del_t('.$person->num.',"delete-tag")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Tag</span></li>
	                </ul>
	              </div>  ';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->contents->count_all($this->data),
	                        "recordsFiltered" => $this->contents->count_filtered($this->data),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    
    }
}