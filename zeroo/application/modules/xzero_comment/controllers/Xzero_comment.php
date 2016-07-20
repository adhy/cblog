<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xzero_comment extends MX_Controller {
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

		$this->load->model('xzero_comment/mzero_comment', 'zero_comment');
    }
	public function index(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){		
			$this->data['title']	="Comment";	
			$result	=	$this->zero_comment->getcomment_s();
			$this->data['comment']=$result;
			$resultt	=	$this->zero_comment->getrcomment_s();
			$this->data['rcomment']=$resultt;	
				$this->load->view('xzero_template/template/template_top', $this->data);
				$this->load->view('xzero_template/template/template_navigation', $this->data);
				$this->load->view('xzero_comment/template/template_viewcomment', $this->data);
				$this->load->view('xzero_template/template/template_footer', $this->data);
				$this->load->view('xzero_template/template/template_bottom', $this->data);
						
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	private function __viewicon(){
		$resultt	=	$this->zero_comment->getcontentn_s();
		$result	=	$this->zero_comment->getcomment_s();
		$sumc=$resultt->num_rows();
		$json_icon=$result->num_rows();
		$link1= '<a href="'.site_url('zero/view-comment').'"><i style="color: rgb(255, 0, 0);" class="fa fa-comments fa-5x"></i></a>';
		$link2= '<i class="fa fa-comments fa-5x"></i>';
		$notif_com = '';
		if($json_icon>0) {
			$notif_com[]= array('iconf'=>array('<i style="color: rgb(255, 0, 0);" class="fa fa-comments fa-fw"></i>'),'iconff'=>array($link1),'sum'=>array($json_icon),'sumc'=>array($sumc));
		}else{
			$notif_com[]= array('iconf'=>array('<i class="fa fa-comments fa-fw"></i>'),'iconff'=>array($link2),'sum'=>array($json_icon),'sumc'=>array($sumc));
		}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($notif_com,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
		exit;
		}
	
	
	public function viewicon(){
			$this->__viewicon();
		}
	public function read_comment(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			$this->data['title']	="Read Comment";
			if($this->uri->segment(4)==""){
				$link = $this->session->userdata('read_comment');
			}else{
				$sess_data['read_comment'] = $this->uri->segment(4);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('read_comment');
			}			
			$data['id_comment']=$this->mysetting->decode($link);
			$resultc=$this->zero_comment->cek_comment_s($data);
			$jum=$resultc->num_rows();
			if($jum>0) {
				
					$this->data['judul']=$this->zero_comment->getcontent_s($data);
					$this->data['readc']=$resultc;
					if(!$_POST) {
						$row=$resultc->row();
						$read=$row->read_c;
						if($read == 1){
							$data['read_c'] = 0;
							$result=$this->zero_comment->change_readc_s($data);
							$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Read Succes.</p></div>');
						}
						$this->load->view('xzero_template/template/template_top', $this->data);
						$this->load->view('xzero_template/template/template_navigation', $this->data);
						$this->load->view('xzero_comment/template/template_readcomment', $this->data);
						$this->load->view('xzero_template/template/template_footer', $this->data);
						$this->load->view('xzero_comment/template/template_bottomon', $this->data);
					}else {
						$this->form_validation->set_rules('replay', 'Replay', 'trim');
						$encrypt 			=  strip_tags(mysql_real_escape_string($this->input->post('replay', TRUE)));
						$data['replay'] 	=  str_replace('\\','',str_replace('\r','',str_replace('\n','',$encrypt)));
						if ($this->form_validation->run() == FALSE){	
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
							redirect('zero/view-comment/read-comment'.$link.'');	
						}else {
							$data_insert	= array(
											'id_comment' 	=> $data['id_comment'],
											'id_login' 	=> $this->session->userdata('id_login'),
											'replay' => $data['replay'],
											'date' => date('Y-m-d'),
											'active' 		=> "0"											
											);
							$resultin=$this->zero_comment->inreplay_s($data_insert);
							if($resultin>0){
								$this->session->set_flashdata('notifoffread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay Success.</p></div>');
								redirect('zero/view-comment');						
							}else {
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay Failed.</p></div>');
								redirect('zero/view-comment/read-comment'.$link.'');		
							}
						}
					
					}
				
			}else {
				
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');				
						redirect('zero/view-comment');
					
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
		public function read_commentoff(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){
			$this->data['title']	="Read Comment";
			if($this->uri->segment(4)==""){
				$link = $this->session->userdata('read_commentoff');
			}else{
				$sess_data['read_commentoff'] = $this->uri->segment(4);
				$this->session->set_userdata($sess_data);
				$link = $this->session->userdata('read_commentoff');
			}		
			$data['id_comment']=$this->mysetting->decode($link);
			$resultc=$this->zero_comment->cek_comment_s($data);
			$jum=$resultc->num_rows();
			if($jum>0) {
					
					if(!$_POST) {
						$hasil=$this->zero_comment->cek_replay_s($data);
						$this->data['replayc']="1";
						if($hasil->num_rows()>0){
							$this->data['replayc']=$hasil;
						}
						$this->data['judul']=$this->zero_comment->getcontent_s($data);
						$this->data['readc']=$resultc;
						$this->load->view('xzero_template/template/template_top', $this->data);
						$this->load->view('xzero_template/template/template_navigation', $this->data);
						$this->load->view('xzero_comment/template/template_readcommentoff', $this->data);
						$this->load->view('xzero_template/template/template_footer', $this->data);
						$this->load->view('xzero_comment/template/template_bottomof', $this->data);
					}else {
						$this->form_validation->set_rules('replay', 'Replay', 'trim');
						$encrypt 						=  strip_tags(mysql_real_escape_string($this->input->post('replay', TRUE)));
						$data['replay'] 			=  str_replace('\\','',str_replace('\r','',str_replace('\n','',$encrypt)));
						if ($this->form_validation->run() == FALSE){	
							$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
							redirect('zero/view-comment/read-comment-off/'.$link.'');
						}else {
							$result=$this->zero_comment->cek_replay_s($data);
							if($result->num_rows()>0) {
								//$data_update	= array(
								//			'id_login' 	=> $this->session->userdata('id_login'),
								//			'replay' => $data['replay'],
								//			'date'=>date('Y-m-d')									
								//			);
							if($data['replay']=='delete_r') {
							$resultin=$this->zero_comment->delreplay_s($data);
							if($resultin>0){
								$this->session->set_flashdata('notifonread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay update Success.</p></div>');
								redirect('zero/view-comment');						
							}else {
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay update Failed.</p></div>');
								redirect('zero/view-comment/read-comment-off/'.$link.'');		
							}
							
							}else{
							$resultin=$this->zero_comment->upreplay_s($data);
							if($resultin>0){
								$this->session->set_flashdata('notifonread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay update Success.</p></div>');
								redirect('zero/view-comment');						
							}else {
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay update Failed.</p></div>');
								redirect('zero/view-comment/read-comment-off/'.$link.'');		
							}
							}
							
							}else {
							$data_insert	= array(
											'id_comment' 	=> $data['id_comment'],
											'id_login' 	=> $this->session->userdata('id_login'),
											'replay' => $data['replay'],
												'date'=>date('Y-m-d'),
											'active' 		=> "0"											
											);
							$resultin=$this->zero_comment->inreplay_s($data_insert);	
							if($resultin>0){
								$this->session->set_flashdata('notifonread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay insert Success.</p></div>');
								redirect('zero/view-comment');						
							}else {
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Replay insert Failed.</p></div>');
								redirect('zero/view-comment/read-comment-off/'.$link.'');		
							}						
							}
							
							
						}
					
					}
				
			}else {				
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>input Failed.</p></div>');
						redirect('zero/view-comment');
					
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
		
	public function change_view(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_comment']=$this->mysetting->decode($link);
			$result=$this->zero_comment->cek_comment_s($data);
			$jum=$result->num_rows();
			if($jum>0) {
				$row=$result->row();
				$read=$row->read_c;
				$data['active'] = 0;
				if($row->active == 0){
					$data['active'] = 1;
				}
				$result=$this->zero_comment->cek_replay_s($data);
				if($result->num_rows()>0) {
					$result=$this->zero_comment->change_replay_s($data);
				}
				$result=$this->zero_comment->change_comment_s($data);
				if($result>0){
					if($read==0) {
						$this->session->set_flashdata('notifonread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
						redirect('zero/view-comment');
					}else{
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Change Success.</p></div>');
						redirect('zero/view-comment');
					}
				}else{
					if($read==0) {
						$this->session->set_flashdata('notifonread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
						redirect('zero/view-comment');
					}else{
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
						redirect('zero/view-comment');
					}	
				}
			}else {
				
						$this->session->set_flashdata('notifonread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');				
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Change Failed.</p></div>');
						redirect('zero/view-comment');
					
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
	public function delete_comment(){
		if($this->session->userdata('zerologin')==TRUE && $this->session->userdata('code')=="1"){	
			$link=$this->uri->segment(4);
			$data['id_comment']=$this->mysetting->decode($link);
			$result=$this->zero_comment->cek_comment_s($data);
			if($result->num_rows()>0) {
				$row=$result->row();
				$read=$row->read_c;
				$result=$this->zero_comment->cek_replay_s($data);
				if($result->num_rows()>0) {
					$result=$this->zero_comment->del_replay_s($data);
				}
				$result=$this->zero_comment->del_comment_s($data);
				if($read==0) {
						$this->session->set_flashdata('notifonread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
						redirect('zero/view-comment');
					}else{
						$this->session->set_flashdata('notifoffread', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Delete Success.</p></div>');
						redirect('zero/view-comment');
					}
			}else {
				$this->session->set_flashdata('notifonread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				$this->session->set_flashdata('notifoffread', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
				redirect('zero/view-comment');	
			}
		
		}else if($this->session->userdata('zerologin')==FALSE){
			redirect('zero/login');
		}
	}
}