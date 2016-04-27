<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_login extends MX_Controller {
	public $data = array(
			'title'     => 'CodexList',
			'text'     => 'Blog',
			'author'    => 'andrei',
		);
	public function __construct(){
        parent::__construct();
		if(is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm');
        }
		$this->load->model('rtcwb_login/mrtcwb_login', 'mrtcwb_login');
    }
	public function index(){
		$this->load->view('rtcwb_login/trt_login');
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			//$view='rtcwb/trt_content';
			//$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}
	
	public function mailsing_in(){
		$this->form_validation->set_rules('email', '', 'required');
		$this->form_validation->set_rules('passblog', '', 'required');
		$msg    = "error";
		if ($this->form_validation->run() == TRUE){
			$this->data['username']    	= $this->db->escape_str($this->input->post('email',TRUE));
			$this->data['password']    	= MD5($this->db->escape_str($this->input->post('passblog',TRUE)));
			$query=$this->mrtcwb_login->getusername($this->data);
		if($query->num_rows()>0){
			foreach ($query->result() as $view) {
				$sess_data['superworm']		=	TRUE;
				$sess_data['wormood']	=	$view->id_user;
				$sess_data['wormname']	=	$view->nm_user;
				$this->session->set_userdata($sess_data);
				$this->session->set_flashdata('notif','<script>toastr.success("Selamat datang '.$view->nm_user.'");</script>');
			}
			$msg    = "success";
		}
		}else{
			$msg    = "error";
		}
		echo json_encode(array("msg"=>$msg));
	}
}
