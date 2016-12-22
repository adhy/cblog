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