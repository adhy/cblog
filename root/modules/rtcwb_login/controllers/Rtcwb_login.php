<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_login extends MX_Controller {
		public $data = array(
			'title'     => 'CodexList || Login',
			'header'	=> 'Login',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	function __construct(){
        parent::__construct();
		
		$this->load->model('rtcwb_login/mrtcwb_login', 'mrtcwb_login');
    }
	function index(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
		//$this->data['jQuery']=$this->mlib->folog();	
		$this->data['js_frlogin']=$this->mrtcwb_login->js_frlogin();
		$this->data['fr_email']=$this->template->fr_input($n='email',$p='email@mail.com',$t='email',$s='froco');
		$this->data['fr_password']=$this->template->fr_input($n='passblog',$p='&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;',$t='password',$s='froco');
		$this->data['fr_but']=$this->mrtcwb_login->fr_but($n='login_form',$c='Sign In');
		$this->data['js_fott']=$this->template->js_fot();
		$this->data['css_top']=$this->template->css_top();
		$view='rtcwb_login/trt_login';
		$this->mlib->templatelogin($view, $this->data);
		}else{
			redirect('mailworm');
		}
	}
	
	function mailsing_in(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->form_validation->set_rules('email', '', 'required');
		$this->form_validation->set_rules('passblog', '', 'required');
		$msg    = "error";
		$notif	= "";
		$hash = $this->security->get_csrf_hash();
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
		echo json_encode(array("msg"=>$msg, "st3rben"=>$hash));
		}else{
			redirect('mailworm');
		}
	}
	function process_logout(){
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
