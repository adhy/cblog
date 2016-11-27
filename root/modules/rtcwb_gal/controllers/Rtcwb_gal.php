<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_gal extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Gallery',
			'header'	=> 'Gallery',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_gal/mrtcwb_gal', 'gallery');
    }
	public function index(){
		$this->data['css_topp']=$this->template->css_toprot();
		$this->data['js_fott']=$this->template->js_fotrot();
		$this->data['js_from']=$this->gallery->js_gallery();
		$view='rtcwb_gal/trt_gal';
		$this->mlib->template_rt($view, $this->data);
	}
	public function disim(){

	}
	
}