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
				$rand					= rand(0,1000);
				$time_send				= mdate($datestring, $time);
				$activation_key			= 	$this->mlib->encode($rand.','.$time_send.','.$email);
				$time_now				=	date('Y-m-d H:i:s',time());
				$pesan= 'klik http://localhost/cblog/mailworm/conf/'.$activation_key.' untuk aktivasi';
				$snma=$this->mlib->send_email($pesan,$judul,$tujuan,$psuc,$pro);
				foreach ($query->result() as $value) {
					$data_edit = array(
							'key_uppass' => $rand,
							'u_date' => $time_send,
							'act_key' => $activation_key
						);
					$update = $this->db->where("id_user",$value->id_user)->update('cb_log',$data_edit);
				}
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
			$this->data['key']=$this->uri->segment(3);
			if (is_null($this->data['key']) || empty($this->data['key']) || !isset($this->data['key'])){
				$psuc = '<script>toastr.error("Ulangi Aktivasi Lagi");</script>';
				$this->session->set_flashdata('notif',$psuc);
				redirect('mailworm/login');
			}else{
				$result_key=$this->mrtcwb_reset->valdesi_key($this->data);
				if($result_key->num_rows()>0){
					$decode=$this->mlib->decode($key);
					$explode_data= explode(",", $decode);
					$this->data['email'] = $this->mlib->safe_hexd($explode_data[2]);
					$this->data['key_uppass'] = $explode_data[0];
					$this->data['date'] = $explode_data[1];
					$result=$this->mrtcwb_reset->valdesi($this->data);
					if($result->num_rows()>0){
						$sess_data['email_re'] =$this->db->escape_str($this->data['email']);
      					$this->session->set_userdata($sess_data);
						$time1					=	strtotime($explode_data[1]);
						$time_now				=	date('Y-m-d H:i:s',time());
						$time2					=	strtotime($time_now);
						$sum					=	$time2-$time1;
						if($sum<=1800){
							$this->data['js_frlogin']=$this->mrtcwb_reset->fr_reset();
							$this->data['fr_newpass']=$this->template->fr_input($n='password',$p='Enter New Password min 6',$t='password',$s='froco');
							$this->data['fr_newpassconf']=$this->template->fr_input($n='confirm_password',$p='Retype New Password min 6',$t='password',$s='froco');
							$this->data['fr_but']=$this->template->fr_but($n='newpass_form',$c='Send');
							$this->data['js_fott']=$this->template->js_fot();
							$this->data['css_top']=$this->template->css_top();
							$view='rtcwb_reset/trt_prore';
							$this->mlib->templatelogin($view, $this->data);
							$psuc = '<script>toastr.success("silahkan");</script>';
							//$this->session->set_flashdata('notif',$psuc);
						}else{
							$psuc = '<script>toastr.error("Melewati batas waktu yang telah diberikan, silahkan ulangi prosedur dari awal !");</script>';
							$this->session->set_flashdata('notif',$psuc);
							redirect('mailworm/login');
						}
					}else{
						$psuc = '<script>toastr.error("Key Activation telah berubah !");</script>';
						$this->session->set_flashdata('notif',$psuc);
						redirect('mailworm/login');
					}
				}else{
					$psuc = '<script>toastr.error("Key Activation telah berubah !");</script>';
					$this->session->set_flashdata('notif',$psuc);
					redirect('mailworm/login');
				}
			}

		}else{
			redirect('mailworm');
		}
	}
	function pro_pass(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->form_validation->set_rules('password', '', 'required');
		$msg    = "error";
		$notif	= "";
		if ($this->form_validation->run() == TRUE){
			$this->data['password']    		= md5($this->db->escape_str($this->input->post('password',TRUE)));
			$this->data['email']=$this->session->userdata('email_re');
			$query=$this->mrtcwb_reset->getemail($this->data);
			$psuc = '<script>toastr.success("Silahkan Login");</script>';
			$pro   = '<script>toastr.error("Ulangi Password anda");</script>';
			if($query->num_rows()>0){
					$msg    = "success";
					$judul='Reset Password';
					

					$datestring 			= 	"%Y-%m-%d %h:%i:%s";
					$time 					= 	time();
					$email 					=   $this->mlib->safe_hexc($this->data['email']);
					$rand					= rand(4,1000);
					$time_send				= mdate($datestring, $time);
					$activation_key			= 	$this->mlib->encode($rand.','.$time_send.','.$email);
					$time_now				=	date('Y-m-d H:i:s',time());
					foreach ($query->result() as $value) {
						$data_edit = array(
								'pass_log' => $this->data['password'],
								'key_uppass' => $rand,
								'u_date' => $time_send,
								'act_key' => $activation_key
							);
						$update = $this->db->where("id_user",$value->id_user)->update('cb_log',$data_edit);
					}
					$this->session->set_flashdata('notif',$psuc);
				}else{
					$msg    = "error";
					$snma = $pro;
			}
		}
		echo json_encode(array("msg"=>$msg,"pesan"=>$snma));
	}else{
			redirect('mailworm');
		}
	}
}
