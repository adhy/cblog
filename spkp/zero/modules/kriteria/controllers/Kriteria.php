<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kriteria extends MX_Controller {
	public $data = array(
			'title'     => 'Kriteria Group',
			'text'     => 'SPK',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('kriteria/mkriteria', 'mkriteria');
    }
	
	public function index(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='';
			$this->data['filejs']='kriteria.js';
			$this->data['kriteriagroup']=$this->mkriteria->getkriteriagroup();
			$view='kriteria/template_kriteria/tm_kriteria';
			$this->zero_hero->template_admin($view,$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
}