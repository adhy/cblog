<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller {
	public $data = array(
			'title'     => 'Dashboard',
			'text'     => 'SPK',
			'author'    => 'ADW',
			'css'		=> '../',
		);
	public function __construct(){
        parent::__construct();

		//$this->load->model('web/mweb_home', 'mweb_home');
    }
	
	public function index(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='';
			$this->data['filejs']='';
			$view='dashboard/template_dashboard/tm_dashboard';
			$this->zero_hero->template_admin($view,$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
}