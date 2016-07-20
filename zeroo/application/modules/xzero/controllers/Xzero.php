<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
			'nc'		  => '',
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		/*$this->load->model('web', 'web');*/
    }
	public function index(){
		$this->data['title']	="Zero";
		if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}else if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			redirect('zero/dashboard');
		}
	}
}