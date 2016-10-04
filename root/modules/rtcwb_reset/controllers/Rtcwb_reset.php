<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_reset extends MX_Controller {
		public $data = array(
			'title'     => 'CodexList || Reset',
			'header'	=> 'Reset',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
		
		$this->load->model('rtcwb_reset/mrtcwb_reset', 'mrtcwb_reset');
    }
	public function index(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
		$this->load->view('rtcwb_reset/trt_resetsend', $this->data);
		}else{
			redirect('mailworm');
		}
	}
	
	public function mail(){
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
				$pesan= 'ini pesan';
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
