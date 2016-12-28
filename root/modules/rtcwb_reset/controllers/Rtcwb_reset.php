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
		$this->data['fr_email']=$this->template->fr_input($n='email',$p='email@mail.com',$t='email',$s='froco');
		$this->data['fr_but']=$this->template->fr_but($n='reset_form',$c='Send');
		$this->data['js_fott']=$this->template->js_fot();
		$this->data['css_top']=$this->template->css_top();
		$view='rtcwb_reset/trt_resetsend';
		$this->mlib->templatelogin($view, $this->data);
		$datestring 			= 	"%Y-%m-%d %h:%i:%s";
		$time 					= 	time();
		$email='coba@mail.com';
		$hexc=$this->mlib->safe_hexc($email);
		$activation_key			= 	$this->mlib->encode(rand(0,1000).','.mdate($datestring, $time).','.$hexc);
		$decode=$this->mlib->decode($activation_key);
		var_dump($email);
		var_dump(rand(0,1000)) ;
		var_dump($hexc);
		var_dump($activation_key);
		var_dump($decode);
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
				$datestring 			= 	"%Y-%m-%d %h:%i:%s";
				$time 					= 	time();
				$email 					=   $this->mlib->safe_hexc($this->data['email']);
				$activation_key			= 	$this->mlib->encode(rand(0,1000).','.mdate($datestring, $time).','.$email);
				$time_now				=	date('Y-m-d H:i:s',time());
				$pesan= 'ini pesan 1 klik http://localhost/cblog/mailworm/conf/'.$activation_key.' untuk aktivasi';
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
	function cnf_reset(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			$key=$this->uri->segment(3);
			$decode=$this->mlib->decode($key);
			$explode_data= explode(",", $decode);
			var_dump($explode_data);
			$mail = $this->mlib->safe_hexd($explode_data[2]);
			echo $explode_data[0];
			echo $explode_data[1];
			echo $mail;
				$time1					=	strtotime($explode_data[1]);
				$time_now				=	date('Y-m-d H:i:s',time());
				$time2					=	strtotime($time_now);
				$sum					=	$time2-$time1;
				echo $sum;
			//if (is_null($this->data['offset']) || empty($this->data['offset']) || !isset($this->data['offset'])){

			//}
		}else{
			redirect('mailworm');
		}
	}
}
