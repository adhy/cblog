<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_login extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		$this->load->model('xzero_login/mzero_login', 'zero');
    }
	public function index(){
		if($this->session->userdata('zerologin')==FALSE){
			$this->data['title']	="Zero";			
			$this->login();
		}else if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			redirect('zero/dashboard');
		}
	}
	public function login(){
		if($this->session->userdata('zerologin')==FALSE){
			$this->data['title']	="Login-Zero";			
			if(!$_POST){
				$this->load->view('xzero_login/template/template_logintop', $this->data);
				$this->load->view('xzero_login/template/template_login', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
			}else{
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('remember', 'Remember', 'trim');
				$login['email'] 			=  mysql_real_escape_string($this->input->post('email', TRUE));
				$data['password'] 			=  mysql_real_escape_string($this->input->post('password', TRUE));
				$data['remember'] 			=  mysql_real_escape_string($this->input->post('remember', TRUE));
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/login');
				}else{
					$login['password'] 			= $this->mysetting->encode($data['password']);;
					$login['code'] 				= "1";
					$result	=	$this->zero->getlogin_s($login);
					if($result>0){
						foreach($result->result() as $view){
							$sess_data['zerologin'] 		= TRUE;
							$sess_data['id_login'] 			= $view->id_login;
							$sess_data['code'] 			= "1";
							if(!empty($data['remember'])){
								$sess_data['new_expiration']			= 60*60*24*365*2;
								$this->session->sess_expiration			=$sess_data['new_expiration'];
								$sess_data['new_expire_on_close']		=FALSE;
								$this->session->sess_expire_on_close	=$sess_data['new_expire_on_close'];
							}else{
								$sess_data['new_expiration']			= 2;
								$this->session->sess_expiration			=$sess_data['new_expiration'];
								$sess_data['new_expire_on_close']		=TRUE;
								$this->session->sess_expire_on_close	=$sess_data['new_expire_on_close'];
							}
								$this->session->set_userdata($sess_data);
							}
						redirect('zero/dashboard');
					}else{
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Maaf ! </strong><p>kombinasi username dan password yang anda masukkan tidak valid dengan database kami.</p></div>');
						redirect('zero/login');
					}
									
				}			
			}
			}else if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			redirect('zero/dashboard');
		}
	}
		/*start logout*/
	public function logout(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			$array_items = array('zerologin' 			=> FALSE, 
								  'new_expiration' 		=> 0,
								  'new_expire_on_close'	=> TRUE);
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma:no-cache');
			redirect('zero/login');
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	
			/*start forgetpass*/
	public function forgetpass(){
		if($this->session->userdata('zerologin')==FALSE){
			$this->data['title']	="Forget Password";
			if(!$_POST){
				$this->load->view('xzero_login/template/template_logintop', $this->data);
				$this->load->view('xzero_login/template/template_forget_pass', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
			}else{
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$data['email'] 			=  mysql_real_escape_string($this->input->post('email', TRUE));
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/forget-password');
				}else{
					$result	=	$this->zero->getlogin_s($data);
					if($result>0){
						 error_reporting(0);
						 
						$login['email'] 		=	$data['email'];
						$login['s_user'] 		= 	"2";
						$datestring 			= 	"Year: %Y Month: %m Day: %d - %h:%i %a";
						$time 					= 	time();
						$activation_key			= 	md5(rand(0,1000).mdate($datestring, $time).$data['email']);
						$data['activation_key']	=	$this->mysetting->encode($activation_key);
						$data['linkmail'] =	anchor('zero/reset-password/'.$data['activation_key'].'','Reset', array('target' => '_blank'));
						$linkutm= site_url('zero/reset-password');
						$email_config 		= 	Array(
									'protocol'  => 'smtp',
									'smtp_host' => 'ssl://belphegor.in-hell.com',
									'smtp_port' => '465',
									'smtp_user' => 'no-replay@adisetyo.info',
									'smtp_pass' => '%)(%)(katana',
									'mailtype'  => 'html',
									'starttls'  => true,
									'newline'   => "\r\n"
									);
						$this->load->library('email', $email_config);
						$this->email->from('no-replay@adisetyo.info', 'SYSTEM ZERO');
						$this->email->to($data['email']); 	
						$this->email->subject('Confirmation Reset Password');
						$this->email->message('Confirm your reset code '.$data['linkmail'].'');	
						$this->email->send();
						$time_now				=	date('Y-m-d H:i:s',time());
						$activation			=	array('pass_activation' => $activation_key,'ptime_requested'=>$time_now);
						$this->db->where('email', $data['email']);
						$this->db->update('tb_login', $activation); 
						$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Send activation Succes. Please check inbox message in your email !</p></div>');
						redirect('zero/login');				
					}else{
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Please check your email !</p></div>');
						redirect('zero/forget-password');					
					}
				}			
			}			
		}else if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			redirect('zero/dashboard');
		}
	}
		public function resetpassword(){	
		if($this->session->userdata('zerologin')==FALSE){
			$this->data['title']	="Reset Password";
			if($this->uri->segment(3)==""){
				$link = $this->session->userdata('resetpassword');
			}else{
				$sess_data['resetpassword'] = $this->uri->segment(3);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('resetpassword');
			}
			$data['pass_activation']	=$this->mysetting->decode($link);
			$this->db->where('pass_activation', $data['pass_activation']);
			$result=$this->db->get('tb_login');
			if($result->num_rows()>0){
				$row					=	$result->row();
				$time['time_requested']	=	$row->ptime_requested;
				$email['email']			=	$row->email;
				$time1					=	strtotime($time['time_requested']);
				$time_now				=	date('Y-m-d H:i:s',time());
				$time2					=	strtotime($time_now);
				$sum					=	$time2-$time1;
				if($sum<=1800){
					if(!$_POST){
						$this->load->view('xzero_login/template/template_logintop', $this->data);
						$this->load->view('xzero_login/template/template_reset_pass', $this->data);
						$this->load->view('xzero_template/template/template_bottom', $this->data);
					}else{
						$this->form_validation->set_rules('newpassword', 'Newpassword', 'trim|required|min_length[8]|max_length[20]');
						$this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'trim|required|matches[newpassword]');	
						$newpass 						=  mysql_real_escape_string($this->input->post('newpassword', TRUE));
						$data['password'] 				=	$this->mysetting->encode($newpass);
						$data['newpassword'] 			=  mysql_real_escape_string($this->input->post('confirmpassword', TRUE));
						if($this->form_validation->run() == FALSE){
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Reset Password Failed !</p></div>');
							redirect('zero/reset-password/'.$link.'');	
						}else{
							$datestring 			= 	"Year: %Y Month: %m Day: %d - %h:%i %a";
							$time 					= 	time();
							$activation_key			= 	md5(rand(0,1000).mdate($datestring, $time).$email['email']);
							$time_now				=	date('Y-m-d H:i:s',time());
							
							$update					=	array('password' => $data['password'],'ptime_requested' => $time_now,'pass_activation'=>$activation_key);
							$this->db->where('email', $email['email']);
							$this->db->update('tb_login', $update);
							$resultup=$this->db->affected_rows();
							if($resultup>0){
								$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Reset Password OK !</p></div>');
								redirect('zero/login');	
							}else{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Reset Password Failed !</p></div>');
								redirect('zero/reset-password/'.$link.'');
							}
						}
					}
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Time Activation key not aviable !</p></div>');
					redirect('zero/login');					
				}
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>OK !</strong><p>Activation Key Not Aviable !</p></div>');
				redirect('zero/login');
				
			}
			
		}else if($this->session->userdata('zerologin')== TRUE && $this->session->userdata('code')=="1"){
			redirect('zero/dashboard');
		}
	}
	
	
}