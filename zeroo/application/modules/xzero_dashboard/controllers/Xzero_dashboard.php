<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_dashboard extends MX_Controller {
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
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Dashboard";			
			$this->load->view('xzero_dashboard/template/template_top', $this->data);
			$this->load->view('xzero_template/template/template_navigation', $this->data);
			$this->load->view('xzero_dashboard/template/template_dashboard', $this->data);
			$this->load->view('xzero_template/template/template_footer', $this->data);
			$this->load->view('xzero_template/template/template_bottom', $this->data);
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
}