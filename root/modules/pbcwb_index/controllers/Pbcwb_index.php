<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pbcwb_index extends MX_Controller {
	public $data = array(
			'title'     => 'CodexList',
			'text'     => 'Blog',
			'author'    => 'andrei',
		);
	public function __construct(){
        parent::__construct();
		//$this->load->model('web/mweb', 'mweb');
    }
	public function index(){
		
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			//$view='rtcwb/trt_content';
			//$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
			redirect('mailworm/dashboard');
		//}
	}
}