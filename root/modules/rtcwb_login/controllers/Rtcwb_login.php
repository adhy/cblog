<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_login extends MX_Controller {
		public $data = array(
			'title'     => 'CodexList || Login',
			'header'	=> 'Login',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
		
		$this->load->model('rtcwb_login/mrtcwb_login', 'mrtcwb_login');
    }
	public function index(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->load->view('rtcwb_login/trt_login', $this->data);
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			//$view='rtcwb/trt_content';
			//$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
		}else{
			redirect('mailworm');
		}
	}
	
	public function mailsing_in(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->form_validation->set_rules('email', '', 'required');
		$this->form_validation->set_rules('passblog', '', 'required');
		$msg    = "error";
		$notif	= "";
		if ($this->form_validation->run() == TRUE){
			$this->data['email']    		= $this->db->escape_str($this->input->post('email',TRUE));
			$this->data['password']    	= MD5($this->db->escape_str($this->input->post('passblog',TRUE)));
			$query=$this->mrtcwb_login->getusername($this->data);
			if($query->num_rows()>0){
				foreach ($query->result() as $idst) {
						$idst = $idst->id_status;
					if($idst == 3){
						foreach ($query->result() as $view) {
							$sess_data['superworm']		=	TRUE;
							$sess_data['wormood']		=	$view->id_user;
							$sess_data['wormname']		=	$view->nm_user;
							$this->session->set_userdata($sess_data);
							$this->session->set_flashdata('notif','<script>toastr.success("Selamat datang '.$view->nm_user.'");</script>');
						}
						$msg    = "success";
					}elseif($idst == 2){
						$msg    = "info";
					}elseif($idst == 1){
						$msg    = "warning";
					}
				}
			}else{
				$msg    = "error";
			}
		}
		echo json_encode(array("msg"=>$msg));
		}else{
			redirect('mailworm');
		}
	}
	public function process_logout(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm');
        }else{
			$array_items = array('superworm' 	=> FALSE, 
								  'wormood' 	=> '',
								  'wormname' 	=> '');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma:no-cache');
			redirect('mailworm/login');
		}
	}
}
