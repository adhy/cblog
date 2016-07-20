<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_content extends MX_Controller {
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

		$this->load->model('xzero_content/mzero_content', 'zero_content');
    }
	public function index(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Content";
			$result	=	$this->zero_content->getcontent_s();
			
				$this->data['content']=$result;
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_content/template/template_viewcontent', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
						
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function edit_content(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Edit Content";
			if($this->uri->segment(4)==""){
				$link = $this->session->userdata('edit_content');
			}else{
				$sess_data['edit_content'] = $this->uri->segment(4);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('edit_content');
			}			
			$data['id_content']=$this->mysetting->decode($link);
			$resultc=$this->zero_content->cek_content_s($data);
			$jum=$resultc->num_rows();
			if($resultc->num_rows()>0) {
				if(!$_POST){
				$this->data['categories']	=	$this->zero_content->getcategories_s();
				$this->data['content']	=	$resultc;//$this->zero_content->cek_getcontent_s($data);
				$this->data['tagtable']	=	$this->zero_content->cek_tabletag_s();
				$this->data['tagcont']	=	$this->zero_content->cek_tag_s($data);//$this->zero_content->cek_getcontent_s($data);
				//$this->zero_content->cek_getcontent_s($data);
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_content/template/template_editcontent', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_content/template/template_bottomedit', $this->data);
			}else{
				$this->form_validation->set_rules('judulc', 'Judul', 'trim|required');
				$this->form_validation->set_rules('datepost', 'Date Post', 'trim|required');
				$this->form_validation->set_rules('categories', 'Categories', 'trim|required');
				$this->form_validation->set_rules('url_cont', 'URL IMAGE', 'trim');
				$this->form_validation->set_rules('tcontent', 'Text Content', 'trim');
				$datepost		 			=  mysql_real_escape_string($this->input->post('datepost', TRUE));
				$data['datepost'] 			= date('Y/m/d', strtotime($datepost)) ;
				$data['judul'] 			=  mysql_real_escape_string($this->input->post('judulc', TRUE));
				$data['categories'] 			=  mysql_real_escape_string($this->input->post('categories', TRUE));
				$data['tcontent'] 			=  $this->input->post('tcontent');
				$data['url_cont'] 			=  $this->input->post('url_cont');
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Insert Failed.</p></div>');
					redirect('zero/view-content/edit-content/'.$link.'');
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
						if(empty($bersih) && empty($data['url_cont'])){
								$data_update	= array(
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1"									
											);
						
						}elseif(empty($bersih) && !empty($data['url_cont'])) {
						$data_update	= array(
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'url_cont' => $data['url_cont'],
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1"									
											);
						}elseif(!empty($bersih) && empty($data['url_cont'])) {
							if(!$this->upload->do_upload('userfile')){
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed</p></div>');
								redirect('zero/view-content/edit-content/'.$link.'');
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
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'image_top' => $nama_fl,
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1",
											'views' 	=> "0"											
											);
								
							}				
				}elseif(!empty($bersih) && !empty($data['url_cont'])){
					if(!$this->upload->do_upload('userfile')){
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed</p></div>');
								redirect('zero/view-content/edit-content/'.$link.'');
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
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'image_top' => $nama_fl,
											'url_cont' => $data['url_cont'],
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1",
											'views' 	=> "0"											
											);
								
							}
					
				}
				$resultin=$this->zero_content->updatecont_s($data,$data_update);
						if($resultin>0){
							$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Update Success.</p></div>');
							redirect('zero/view-content/edit-content/'.$link.'');
						}else {
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Update Failed.</p></div>');
							redirect('zero/view-content/edit-content/'.$link.'');
						}	
					
				}
			
			}		
				
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-content');
			}
				
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function add_content(){
		
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Add Content";
			if(!$_POST){
				$this->data['categories']	=	$this->zero_content->getcategories_s();
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_content/template/template_addcontent', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_content/template/template_bottomadd', $this->data);
			}else{
				$this->form_validation->set_rules('judulc', 'Judul', 'trim|required');
				$this->form_validation->set_rules('datepost', 'Date Post', 'trim|required');
				$this->form_validation->set_rules('categories', 'Categories', 'trim|required');
				$this->form_validation->set_rules('tcontent', 'Text Content', 'trim');
				$this->form_validation->set_rules('url_cont', 'URL IMAGE', 'trim|required');
				$datepost		 			=  mysql_real_escape_string($this->input->post('datepost', TRUE));
				$data['datepost'] 			= date('Y/m/d', strtotime($datepost)) ;
				$data['judul'] 			=  mysql_real_escape_string($this->input->post('judulc', TRUE));
				$data['categories'] 			=  mysql_real_escape_string($this->input->post('categories', TRUE));
				$data['tcontent'] 			=  $this->input->post('tcontent');
				$data['url_cont'] 			=  $this->input->post('url_cont');
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Insert Failed.</p></div>');
					redirect('zero/view-content/add-content');
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
						$data_insert	= array(
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'url_cont' => $data['url_cont'],
											'image_top' => "default.jpg",
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1",
											'views' 	=> "0"											
											);
						}else {
							if(!$this->upload->do_upload('userfile')){
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Insert Failed</p></div>');
								redirect('zero/view-content/add-content');
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
								$data_insert	= array(
											'id_categories' 		=> $data['categories'],
											'judul' 	=> $data['judul'],										
											'isi' 		=> $data['tcontent'],
											'url_cont' => $data['url_cont'],
											'image_top' => $nama_fl,
											'date' => $data['datepost'],
											'act_comment' 		=> "1",
											'active' 		=> "1",
											'views' 	=> "0"											
											);
								
							}				
				}
				$resultin=$this->zero_content->insertcont_s($data_insert);
						if($resultin>0){
							$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Insert Success.</p></div>');
							redirect('zero/view-content');
						}else {
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
							redirect('zero/view-content');
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
			$data['id_content']=$this->mysetting->decode($link);
			$resultc=$this->zero_content->cek_categories_s($data);
			if($resultc->num_rows()>0) {
			$result=$this->zero_content->cek_content_s($data);
			if($result->num_rows()>0) {
				$row=$result->row();
				$data['active'] = 0;
				if($row->active == 0){
					$data['active'] = 1;
				}
				$this->zero_content->change_tagcont_s($data);
				$result=$this->zero_content->change_content_s($data);
				if($result>0){
					$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
					redirect('zero/view-content');
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
					redirect('zero/view-content');	
				}
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-content');	
			}
			}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed you must active categories.</p></div>');
					redirect('zero/view-content');	
				}
			
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function active_comment(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_content']=$this->mysetting->decode($link);
			$result=$this->zero_content->cek_content_s($data);
			if($result->num_rows()>0) {
				$row=$result->row();
				$data['act_comment'] = 0;
				if($row->act_comment == 0){
					$data['act_comment'] = 1;
				}
				$result=$this->zero_content->change_act_comment_s($data);
				if($result>0){
					$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Active Success.</p></div>');
					redirect('zero/view-content');
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Active Failed.</p></div>');
					redirect('zero/view-content');	
				}
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-content');	
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_content(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_content']=$this->mysetting->decode($link);
			$result=$this->zero_content->cek_content_s($data);
			if($result->num_rows()>0) {
				$resultco=$this->zero_content->cek_comment_s($data);
				if($resultco->num_rows()>0) {
					foreach($resultco->result() as $row){
						$this->zero_content->del_replay_s($row->id_comment);
					}
					$result=$this->zero_content->del_comment_s($data);
				}
				$result=$this->zero_content->cek_tag_s($data);
				if($result->num_rows()>0) {
					$result=$this->zero_content->del_tag_s($data);
				}
				$result=$this->zero_content->del_content_s($data);
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
				redirect('zero/view-content');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-content');	
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	///////////////////////
		public function edit_tagcontent(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Edit Tag Content";
			if($this->uri->segment(5)==""){
				$link = $this->session->userdata('edit_tagcontent');
			}else{
				$sess_data['edit_tagcontent'] = $this->uri->segment(5);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('edit_tagcontent');
			}			
			$data['id_content']=$this->mysetting->decode($link);
			$resultc=$this->zero_content->cek_content_s($data);
			$jum=$resultc->num_rows();
			if($resultc->num_rows()>0) {
				if(!$_POST){
					$this->data['viewlink']		=$link;
					$this->data['viewtagcont']	=	$this->zero_content->gettagcont_s($data);
					$this->data['tagtable']	=	$this->zero_content->cek_tabletag_s();
					$this->load->view('xzero_template/template/template_top', $this->data);
					$this->load->view('xzero_template/template/template_navigation', $this->data);
					$this->load->view('xzero_content/template/template_edittagcontent', $this->data);
					$this->load->view('xzero_template/template/template_footer', $this->data);
					$this->load->view('xzero_template/template/template_bottom', $this->data);
				}else{
					$this->form_validation->set_rules('tag', 'Tag', 'trim|required');
					$data['tag'] 			=  mysql_real_escape_string($this->input->post('tag', TRUE));
					if ($this->form_validation->run() == FALSE){	
						$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
						redirect('zero/view-content/edit-content/edit-tag-content/'.$link.'');
					}else{
						$cektable	=	$this->zero_content->gettagcontt_s($data);
						if($cektable->num_rows()>0){
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Like on Database.</p></div>');
							redirect('zero/view-content/edit-content/edit-tag-content/'.$link.'');	
						}else{
							$data_insert	= array(
											'id_content' 	=> $data['id_content'],
											'id_tag' =>$data['tag'],
											'active' 	=> "0"											
											);
						$resultin=$this->zero_content->intabtagcont_s($data_insert);
						}
					
					if($resultin>0){
						$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Input Success.</p></div>');
						redirect('zero/view-content/edit-content/edit-tag-content/'.$link.'');
					}else {
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('zero/view-content/edit-content/edit-tag-content/'.$link.'');
					}				
				}
					
					
				}
				
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-content/edit-content/'.$link.'');
				
				
			}
			
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_tagcontent(){	
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
		$link=$this->uri->segment(6);
		$linkk = $this->session->userdata('edit_tagcontent');
		$data['id_tagcont']=$this->mysetting->decode($link);
		$result=$this->zero_content->cek_ktag_s($data);
		if($result->num_rows()>0) {
			$result=$this->zero_content->del_ktag_s($data);
			if($result>0){
				$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
				redirect('zero/view-content/edit-content/edit-tag-content/'.$linkk.'');
			}else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Delete Failed.</p></div>');
				redirect('zero/view-content/edit-content/edit-tag-content/'.$linkk.'');
			}
		}else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Delete Failed 1.</p></div>');
			redirect('zero/view-content/edit-content/edit-tag-content/'.$linkk.'');
		}
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	
}