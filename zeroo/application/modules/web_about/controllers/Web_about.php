<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_about extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		$this->load->model('web_about/mweb_about', 'web_about');
    }
	public function index(){
		$this->data['title']	="About";
		$this->data['body']='<body onload="menuleft();menunavigasi();about();">';
		$text=$this->uri->segment(1);
		//$html=str_replace('.html','-',$text);
		$link1=str_replace('-',' ',$text);
		$link2=str_replace('_','-',$link1);
		$this->data['description']=$link2;
		$this->load->view('web_template/template/template_top', $this->data);
		$this->load->view('web_template/template/template_navigation', $this->data);
		$this->load->view('web_about/template/template_about', $this->data);
		$this->load->view('web_template/template/template_left', $this->data);
		$this->load->view('web_template/template/template_footer', $this->data);
		$this->load->view('web_about/template/template_aboutbottom', $this->data);
	}
	
}