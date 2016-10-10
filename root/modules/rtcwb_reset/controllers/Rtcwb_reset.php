<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_reset extends MX_Controller {
		public $data = array(
			'title'     => 'CodexList || Reset',
			'header'	=> 'Reset',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	function __construct(){
        parent::__construct();
		
		$this->load->model('rtcwb_reset/mrtcwb_reset', 'mrtcwb_reset');
    }
	function index(){
		if(!is_logged_in()){ 
		$this->data['js_frlogin']=$this->mrtcwb_reset->js_frlogin();
		$this->data['fr_email']=$this->template->fr_input($n='email',$p='email@mail.com',$t='email');
		$this->data['fr_but']=$this->template->fr_but($n='reset_form',$c='Send');
		$this->data['js_fott']=$this->template->js_fot();
		$this->data['css_top']=$this->template->css_top();
		$view='rtcwb_reset/trt_resetsend';
		$this->mlib->templatelogin($view, $this->data);
		}else{
			redirect('mailworm');
		}
	}
	
	function mail(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->form_validation->set_rules('email', '', 'required');
		$msg    = "error";
		$notif	= "";
		if ($this->form_validation->run() == TRUE){
			$this->data['email']    		= $this->db->escape_str($this->input->post('email',TRUE));
			$query=$this->mrtcwb_reset->getemail($this->data);
			$psuc = '<script>toastr.success("Silahan buka notifikasi pada email");</script>';
			$pro   = '<script>toastr.error("Pesan Gagal dikirim");</script>';
			if($query->num_rows()>0){
				$msg    = "success";
				$judul='Reset Password';
				$tujuan=$this->data['email'] ;
				$pesan= 'ini pesan 1';
				$snma=$this->mlib->send_email($pesan,$judul,$tujuan,$psuc,$pro);
				$this->session->set_flashdata('notif',$snma);
			}else{
				$msg    = "error";
				$snma = "email salah";
			}
		}
		echo json_encode(array("msg"=>$msg,"pesan"=>$snma));
		}else{
			redirect('mailworm');
		}
	}
}
