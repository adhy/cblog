<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pprof extends MX_Controller {
	public $data = array(
			'title'     => 'Profil',
			'text'     => 'PLN',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		//$this->load->model('web/mweb_home', 'mweb_home');
    }
	
	public function index(){
		$this->data['css']='';
		$view='pprof/template_pprof/tm_pprof';
		$this->zero_hero->template_admin($view,$this->data);
	}
	public function change_password(){
		$this->data['css']='';
		$view='pprof/template_pprof/tm_pprof';
		$this->zero_hero->template_admin($view,$this->data);
	}
}