<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cwblog extends MX_Controller {
	public $data = array(
			'title'     => 'SPK',
			'text'     => 'PLN',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
        /*if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }*/
		//$this->load->model('web/mweb', 'mweb');
    }
	public function index(){
		$this->load->view('cwblog/trt_page', $this->data);
		//$view='cwblog/trt_content';
		//$this->mlib->template_rt($view,$this->data);
		//redirect('mailworm/dashboard');
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			//$view='cwblog/trt_content';
			//$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}
	public function dashboard(){
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			$view='cwblog/trt_content';
			$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}

}