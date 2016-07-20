<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_sosmed extends MX_Controller {
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

		$this->load->model('xzero_sosmed/mzero_sosmed', 'zero_sosmed');
    }
	public function index(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Social Media";
			$result	=	$this->zero_sosmed->getsosmed_s();
			
				$this->data['sosmed']=$result;
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_sosmed/template/template_viewsosmed', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
						
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function add_sosmed(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$this->data['title']	="Add Sosmed";
			if(!$_POST) {			
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_sosmed/template/template_addsosmed', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
			}else{	
			$this->form_validation->set_rules('namesosmed', 'Name Sosmed', 'trim|required');
			$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
			$data['namesosmed'] 			=  mysql_real_escape_string($this->input->post('namesosmed', TRUE));
			$data['icon'] 			=  $this->input->post('icon');
			if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
					redirect('zero/view-social-media/add-sosmed');
				}else{
					$result=$this->zero_sosmed->cek_namesosmed_s($data);
					if($result->num_rows()>0) {
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
						redirect('zero/view-social-media/add-sosmed');				
					}else{
						$data_insert	= array(
											'name_sosmed' 	=> $data['namesosmed'],
											'icon' 	=> $data['icon'],
											'active' 	=> "0"											
											);
					$result=$this->zero_sosmed->add_sosmed_s($data_insert);
					if($result>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>input Success.</p></div>');
						redirect('zero/view-social-media');
					}else{
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
						redirect('zero/view-social-media/add-sosmed');
					}
					}
				}
			}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function edit_sosmed(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$this->data['title']	="Edit Sosmed";
			if($this->uri->segment(4)==""){
				$link = $this->session->userdata('id_sosmededit');
			}else{
				$sess_data['id_sosmededit'] = $this->uri->segment(4);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('id_sosmededit');
			}
			$data['id_sosmed']=$this->mysetting->decode($link);
			$result=$this->zero_sosmed->cek_sosmed_s($data);
			if($result->num_rows()>0) {
			if(!$_POST) {			
				$this->data['sosmed']=$result;
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_sosmed/template/template_editsosmed', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
			}else{	
			$this->form_validation->set_rules('namesosmed', 'Name Sosmed', 'trim|required');
			$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
			$data['namesosmed'] 			=  mysql_real_escape_string($this->input->post('namesosmed', TRUE));
			$data['icon'] 			=  $this->input->post('icon');
			if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
					redirect('zero/view-social-media/edit-sosmed/'.$link.'');
				}else{
					$result=$this->zero_sosmed->cek_namesosmed_s($data);
					if($result->num_rows()>0) {
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input like on database.</p></div>');
						redirect('zero/view-social-media/edit-sosmed/'.$link.'');				
					}else{
					$data_update	= array(
											'name_sosmed' 	=> $data['namesosmed'],
											'icon' 	=> $data['icon'],
											'active' 	=> "0"											
											);
					$result=$this->zero_sosmed->edit_sosmed_s($data,$data_update);
					if($result>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>input Success.</p></div>');
						redirect('zero/view-social-media');
					}else{
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
						redirect('zero/view-social-media/edit-sosmed/'.$link.'');
					}
					}
				}
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
			redirect('zero/view-social-media');
		}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
public function change_view(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_sosmed']=$this->mysetting->decode($link);
			$result=$this->zero_sosmed->cek_sosmed_s($data);
			if($result->num_rows()>0) {
				$row=$result->row();
				$data['active'] = 0;
				if($row->active == 0){
					$data['active'] = 1;
				}
				$result=$this->zero_sosmed->cek_usesosmed_s($data);
				if($result->num_rows()>0) {
					$result=$this->zero_sosmed->change_usesosmed_s($data);
				}
				$result=$this->zero_sosmed->change_sosmed_s($data);
				if($result>0){
					$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
					redirect('zero/view-social-media');
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed2.</p></div>');
					redirect('zero/view-social-media');	
				}
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed1.</p></div>');
				redirect('zero/view-social-media');	
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_sosmed(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_sosmed']=$this->mysetting->decode($link);
			$result=$this->zero_sosmed->cek_sosmed_s($data);
			if($result->num_rows()>0) {
				$result=$this->zero_sosmed->cek_usesosmed_s($data);
				if($result->num_rows()>0) {
					$result=$this->zero_sosmed->del_usesosmed_s($data);
				}
				$result=$this->zero_sosmed->del_sosmed_s($data);
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
				redirect('zero/view-social-media');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-social-media');	
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}	
}