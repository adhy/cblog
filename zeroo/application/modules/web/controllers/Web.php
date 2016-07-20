<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends MX_Controller {
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

		$this->load->model('web/mweb_home', 'mweb_home');
    }
	public function index(){
		error_reporting(0);
		$this->data['title']	="Home";
		$string=file_get_contents(site_url('parse/json/view/home/new'));
    	$decode=json_decode($string,TRUE);
    	$this->data['top']=$decode['new_top'];
    	$this->data['one']=$decode['new_topone'];
		$string=file_get_contents(site_url('parse/json/view/home/popular'));
    	$decode=json_decode($string,TRUE);
    	//$this->data['popular']=$decode['popular'];
		$this->load->view('web/template/template_webtop', $this->data);
		$this->load->view('web_template/template/template_navigation', $this->data);
		$this->load->view('web/template/template_home', $this->data);
		$this->load->view('web_template/template/template_footer', $this->data);
		$this->load->view('web/template/template_webbottom', $this->data);
	}
	
}