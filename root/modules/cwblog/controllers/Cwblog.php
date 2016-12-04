<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cwblog extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || ',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
        $this->data['leaft_cat']= $this->template->is_leaftcat();
        $this->data['is_navv']= $this->template->is_navrek($this->template->parent,$this->template->hasil);
        $this->data['is_tag']= $this->template->is_tags();
        $this->data['is_leafpop']= $this->template->is_leafpop();
    }
	public function index(){		
		$this->data['css_topp']=$this->template->css_toppub();
		$view='cwblog/trt_page';
		$this->mlib->templatepublic($view,$this->data);
	}
	public function dashboard(){
			$view='cwblog/trt_content';
			$this->mlib->template_rt($view,$this->data);
	}

}