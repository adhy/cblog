<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller {
	public $data = array(
			'css'		=>'',
			'title'     => 'Login',
			'text'     => 'PLN',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('login/mlogin', 'mlogin');
    }
	public function index(){
		if($this->session->userdata('petugas')==FALSE){
			$view='login/template_login/tm_login';
			$this->zero_hero->templatelogin($view,$this->data);
		}else if($this->session->userdata('petugas')==TRUE){
			redirect('dashboard');
		}
	}
	public function process_login(){
		if($this->session->userdata('petugas')==FALSE){
			$this->form_validation->set_rules('spkuname', '', 'required');
			$this->form_validation->set_rules('spkpass', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
           	 	$this->data['username']    	= $this->db->escape_str($this->input->post('spkuname'));
           	 	$this->data['password']    	= MD5($this->db->escape_str($this->input->post('spkpass')));
			 	$query=$this->mlogin->getusername($this->data);
            if($query->num_rows()>0){
            	foreach ($query->result() as $view) {
            		$sess_data['petugas']		=	TRUE;
            		$sess_data['numbpetugas']	=	$view->id_user;
            		$sess_data['namepetugas']	=	$view->nm_user;
            		$this->session->set_userdata($sess_data);
            		$this->session->set_flashdata('notif','<script>toastr.success("Selamat datang '.$view->nm_user.'");</script>');
            	}
                $msg    = "success";
            }
			}else{
				$msg    = "error";
			}
		echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('petugas')==TRUE){
			redirect('dashboard');
		}
	}
	public function process_logout(){
		if($this->session->userdata('petugas')==TRUE){
			$array_items = array('petugas' 			=> FALSE, 
								  'numbpetugas' 	=> '',
								  'namepetugas' 	=> '');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma:no-cache');
			redirect('login');
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	public function process_logouta(){
		if($this->session->userdata('admin')==TRUE){
			$array_items = array('admin' 			=> FALSE, 
								  'numbadmin' 	=> '',
								  'nameadmin' 	=> '');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma:no-cache');
			redirect('login');
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
}