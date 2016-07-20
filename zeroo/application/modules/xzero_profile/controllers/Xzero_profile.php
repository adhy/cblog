<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_profile extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
			'nc'		  => '',
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		$this->load->model('xzero_profile/mzero_profile', 'zero_profile');
    }
	public function index(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="User Profile";
			$data['id_login']=$this->session->userdata('id_login');
			$result		=	$this->zero_profile->getuser_s($data);
			$resultti	=	$this->zero_profile->getiuser_s($data);
			if($result->num_rows()>0){
				$this->data['profile']=$result;
				$this->data['icon']=$resultti;
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_profile/template/template_editprofile', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_profile/template/template_bottom', $this->data);
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry ! </strong><p>User not Found !</p></div>');
				redirect('zero/dashboard');			
			}			
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	
	public function change_profil(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			$login=$this->session->userdata('id_login');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
			$this->form_validation->set_rules('country', 'Country', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
			//$this->form_validation->set_rules('image', 'Sosmed', 'trim');
			$this->form_validation->set_rules('descriptionn', 'Descriptionn', 'trim|required|min_length[30]');
			$firstname 			=  mysql_real_escape_string($this->input->post('firstname', TRUE));
			$lastname 			=  mysql_real_escape_string($this->input->post('lastname', TRUE));
			$data['name'] 			=  $firstname.' '.$lastname;
			$birthday		 			=  mysql_real_escape_string($this->input->post('birthday', TRUE));
			$data['birthday'] 			= date('Y/m/d', strtotime($birthday)) ;
			$data['country'] 			=  mysql_real_escape_string($this->input->post('country', TRUE));
			$data['phone'] 			=  mysql_real_escape_string($this->input->post('phone', TRUE));
			//$data['photo'] 			=  mysql_real_escape_string($this->input->post('image', TRUE));
			$data['description'] 			=  $this->input->post('descriptionn');
			if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notifprof', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed.</p></div>');
					redirect('zero/user-profile');
				}else{
					$acak=rand(00000000000,99999999999);
					$bersih=$_FILES['userfile']['name'];
					//$bersih=pathinfo($_FILES['userfile'.1]['name'], PATHINFO_EXTENSION);
					$nm=str_replace(" ","_","$bersih");
					$pisah=explode(".",$nm);
					$nama_murni=$pisah[0];
					$ubah=$acak.$nama_murni; //tanpa ekstensi
					$config["file_name"]=$ubah; //dengan eekstensi
					$nama_fl=$acak.$nm; //simpan nama ini k database
					$config['upload_path'] = './asset/public/images/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_size'] = '2000000';
					$config['max_size'] = '2000000';
					$config['max_width'] = '3080';
					$config['max_height'] = '3080';					
					$this->load->library('upload', $config);
					if(empty($bersih)) {
						$data_update	= array(
											'name' 	=> $data['name'],
											'birthday' => $data['birthday'],
											'country' 		=> $data['country'],
											'phone' 		=> $data['phone'],
											'description' 		=> $data['description'],
											'active' 	=> "0"											
											);
						}else {
							if(!$this->upload->do_upload('userfile')){
								$this->session->set_flashdata('notifprof', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed</p></div>');
								redirect('zero/user-profile');
							}else {					
								$config['overwrite'] = TRUE;
								$config['image_library'] = 'gd2';
   			            $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			               //$config['new_image'] = './image_uploads/';
 			   	         $config['maintain_ratio'] = false;
								$config['create_thumb'] = TRUE;
  				            $config['width'] = '250';
       				      $config['height'] = '250';
               			$this->load->library('image_lib',$config); 
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								if ( $this->image_lib->resize()){
									$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
								}
								$data_update	= array(
											'name' 	=> $data['name'],
											'birthday' => $data['birthday'],
											'country' 		=> $data['country'],
											'phone' 		=> $data['phone'],
											'photo' 		=> $nama_fl,
											'description' 		=> $data['description'],
											'active' 	=> "0"											
											);
								
							}				
				}
				$resultin=$this->zero_profile->upuser_s($data_update,$login);
						if($resultin>0){
							$this->session->set_flashdata('notifprof', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Update Success.</p></div>');
							redirect('zero/user-profile');
						}else {
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
							redirect('zero/user-profile');
						}
			}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function change_password(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('newpassword', 'Newpassword', 'trim|required|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('confirmpassword', 'Confirmpassword', 'trim|required|matches[newpassword]');	
			$password 			=  mysql_real_escape_string($this->input->post('password', TRUE));
			$newpassword 			=  mysql_real_escape_string($this->input->post('newpassword', TRUE));
			$confirmpassword 			=  mysql_real_escape_string($this->input->post('confirmpassword', TRUE));
			$data['password'] 			= $this->mysetting->encode($password);
			$data['id_login']			=$this->session->userdata('id_login');
			$result	=	$this->zero_profile->getpass_s($data);
			if($result->num_rows()>0){
				$data['newpassword']=$this->mysetting->encode($newpassword);
				$resultin=$this->zero_profile->uppass_s($data);
					if($resultin>0){
						$this->session->set_flashdata('notifpass', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Password Success.</p></div>');
						redirect('zero/user-profile');
					}else {
					$this->session->set_flashdata('notifpass', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Password Failed.</p></div>');
					redirect('zero/user-profile');
					}
			}else{
				$this->session->set_flashdata('notifpass', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Password Worng.</p></div>');
				redirect('zero/user-profile');			
			}
			
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function setting_sosmed(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Change Social Media";
			$data['id_login']=$this->session->userdata('id_login');
			$result		=	$this->zero_profile->getsosmed_s();
			$resultti	=	$this->zero_profile->getiiuser_s($data);
			$this->data['sosmed']=$result;				
			$this->data['icon']=$resultti;
			if(!$_POST){
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_profile/template/template_editprofilesosmed', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_profile/template/template_bottom', $this->data);
			}else{
				$this->form_validation->set_rules('url_sos', 'URL sos', 'trim|required');
				$this->form_validation->set_rules('sosmed', 'Sosmed', 'trim|required');
				$data['url_sos'] 			=  mysql_real_escape_string($this->input->post('url_sos', TRUE));
				$data['sosmed'] 			=  mysql_real_escape_string($this->input->post('sosmed', TRUE));
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/user-profile/setting-social-media');
				}else{
					$data_insert	= array(
											'id_login' 	=> $data['id_login'],
											'id_sosmed' => $data['sosmed'],
											'url' 		=> $data['url_sos'],
											'active' 	=> "1"											
											);
					$resultin=$this->zero_profile->insosmed_s($data_insert);
					if($resultin>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Input Success.</p></div>');
						redirect('zero/user-profile/setting-social-media');
					}else {
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/user-profile/setting-social-media');
					}				
				}
			}	
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_sosmed(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
		$link=$this->uri->segment(5);
		$data['id_usesos']=$this->mysetting->decode($link);
		$data['id_login']=$this->session->userdata('id_login');
		$result=$this->zero_profile->cek_sosmed_s($data);
		if($result->num_rows()>0) {
			$result=$this->zero_profile->del_sosmed_s($data);
			if($result>0){
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
				redirect('zero/user-profile/setting-social-media');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Delete Failed 1.</p></div>');
				redirect('zero/user-profile/setting-social-media');
			}
		}else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Delete Failed 2.'.$data['id_usesos'].'</p></div>');
			redirect('zero/user-profile/setting-social-media');
		}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function change_sosmed(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
		$link=$this->uri->segment(5);
		$data['id_usesos']=$this->mysetting->decode($link);
		$data['id_login']=$this->session->userdata('id_login');
		$result=$this->zero_profile->cek_sosmed_s($data);
		if($result->num_rows()>0) {
			$row=$result->row();
			$data['active'] = 0;
			if($row->active == 0){
				$data['active'] = 1;
			}
			$result=$this->zero_profile->change_sosmed_s($data);
			if($result>0){
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
				redirect('zero/user-profile/setting-social-media');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
				redirect('zero/user-profile/setting-social-media');
			}
		}else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
			redirect('zero/user-profile/setting-social-media');
		}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}		
}