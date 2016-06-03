<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tabelx extends MX_Controller {
	public $data = array(
			'title'     => 'Tabel X',
			'text'     => 'PLN',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		//$this->load->model('web/mweb_home', 'mweb_home');
    }
	
	public function index(){
		$this->data['css']='';
		$view='tabelx/template_tabelx/tm_tabelxadd';
		$this->zero_hero->template_admin($view,$this->data);
	}
}