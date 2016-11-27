<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_dashboard extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Dashboard',
			'header'	=> 'Dashboard',
			'text'      => 'CL-System',
			'author'    => 'ADW',
			'filejs'	=>	'maintenance.js',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		//$this->load->model('web/mweb', 'mweb');
    }
	public function index(){
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			$this->data['js_from']='';
			$this->data['js_fott']=$this->template->js_fotrot();
			$this->data['css_topp']=$this->template->css_toprot();
			$view='rtcwb_dashboard/trt_content';
			$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}
}