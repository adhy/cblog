<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_categories extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
			'nc'			=>'',
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		$this->load->model('xzero_categories/mzero_categories', 'zero_categories');
    }
	public function index(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Categories";
			$result	=	$this->zero_categories->getcategories_s();
			
				$this->data['categories']=$result;
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_categories/template/template_viewcategories', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
						
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function edit_categories(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Edit Categories";
			if($this->uri->segment(4)==""){
				$link = $this->session->userdata('id_categories');
			}else{
				$sess_data['id_categories'] = $this->uri->segment(4);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('id_categories');
			}
			$data['id_categories']=$this->mysetting->decode($link);
			$result=$this->zero_categories->cek_categories_s($data);
			if($result->num_rows()>0) {
				$this->data['categories']=$result;
				if(!$_POST) {
					$this->load->view('xzero_template/template/template_top', $this->data);
					$this->load->view('xzero_template/template/template_navigation', $this->data);
					$this->load->view('xzero_categories/template/template_editcategories', $this->data);
					$this->load->view('xzero_template/template/template_footer', $this->data);
					$this->load->view('xzero_template/template/template_bottom', $this->data);
				}else {
				$this->form_validation->set_rules('name_c', 'Name Categories', 'trim|required|min_length[2]|max_length[20]');
				$this->form_validation->set_rules('column', 'Column Position', 'trim|required');
				$data['name_c'] 			=  mysql_real_escape_string($this->input->post('name_c', TRUE));
				$data['column'] 			=  mysql_real_escape_string($this->input->post('column', TRUE));
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/view-categories/add-categories');
				}else{
					$result=$this->zero_categories->cek_nmc_s($data);
					if($result->num_rows()>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Like on Dtabase.</p></div>');
						redirect('zero/categories/edit-categories/'.$link.'');
					}else{
						$data_update=array(
								'name_categories' => $data['name_c'],
        						'column'  => $data['column'] ,
        						'active'  => '1'						
						);
						$result=$this->zero_categories->edit_nmc_s($data_update,$data);
						if($result>0){
							$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Success.</p></div>');
							redirect('zero/view-categories');
						}else {
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed.</p></div>');
							redirect('zero/categories/edit-categories/'.$link.'');						
						}
					}
				}
			
			}
		}else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Database Not Found.</p></div>');
			redirect('zero/view-categories');		
		}
									
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function add_categories(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Add Categories";
			if(!$_POST) {
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_categories/template/template_addcategories', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);	
			}else {
				$this->form_validation->set_rules('name_c', 'Name Categories', 'trim|required|min_length[2]|max_length[20]');
				$this->form_validation->set_rules('column', 'Column Position', 'trim|required');
				$data['name_c'] 			=  mysql_real_escape_string($this->input->post('name_c', TRUE));
				$data['column'] 			=  mysql_real_escape_string($this->input->post('column', TRUE));
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/view-categories/add-categories');
				}else{
					$result=$this->zero_categories->cek_nmc_s($data);
					if($result->num_rows()>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Like on Dtabase.</p></div>');
						redirect('zero/view-categories/add-categories');
					}else{
						$data_insert=array(
								'name_categories' => $data['name_c'],
        						'column'  => $data['column'] ,
        						'active'  => '1'						
						);
						$result=$this->zero_categories->add_nmc_s($data_insert);
						if($result>0){
							$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Success.</p></div>');
							redirect('zero/view-categories');
						}else {
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
							redirect('zero/view-categories/add-categories');						
						}
					}
				}
			
			}
									
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function change_view(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
		$link=$this->uri->segment(4);
		$data['id_categories']=$this->mysetting->decode($link);
		$result=$this->zero_categories->cek_categories_s($data);
		if($result->num_rows()>0) {
			$row=$result->row();
			$data['active'] = 0;
			if($row->active == 0){
				$data['active'] = 1;
			}
			$result=$this->zero_categories->change_categories_s($data);
			if($result>0){
				$result=$this->zero_categories->cek_ccategories_s($data);
				if($result->num_rows()>0) {
					foreach($result->result() as $row){
						$data['id_content']=$row->id_content;
						$result=$this->zero_categories->cek_tccategories_s($data);
						if($result->num_rows()>0) {
							$result=$this->zero_categories->change_tccategories_s($data);
						}
					}
					$result=$this->zero_categories->change_ccategories_s($data);
				}
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
				redirect('zero/view-categories');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
				redirect('zero/view-categories');
			}
		}else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
			redirect('zero/view-categories');
		}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_categories(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
		$link=$this->uri->segment(4);
		$data['id_categories']=$this->mysetting->decode($link);
		$result=$this->zero_categories->cek_categories_s($data);
		if($result->num_rows()>0) {
			$result=$this->zero_categories->cek_ccategories_s($data);
			if($result->num_rows()>0) {
			foreach($result->result() as $row){
						$data['id_content']=$row->id_content;
						$result=$this->zero_categories->cek_tccategories_s($data);
						if($result->num_rows()>0) {
							$result=$this->zero_categories->del_tccategories_s($data);
						}
						$result=$this->zero_categories->cek_cccategories_s($data);
						if($result->num_rows()>0) {
							foreach($result->result() as $row){
								$data['id_comment']=$row->id_comment;
								$result=$this->zero_categories->cek_rcccategories_s($data);
								if($result->num_rows()>0) {
									$resultt=$this->zero_categories->del_rcccategories_s($data);						
								}
							}
							$resultt=$this->zero_categories->del_cccategories_s($data);
						}
					}
					$result=$this->zero_categories->del_ccategories_s($data);
					}
					$result=$this->zero_categories->del_categories_s($data);
					$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
					redirect('zero/view-categories');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Delete Failed.</p></div>');
			redirect('zero/view-categories');		
		}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
}