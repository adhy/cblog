<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_detail extends MX_Controller {
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

		//$this->load->model('web_detail/mweb_detail', 'mweb_detail');
    }
	public function index(){
		$this->data['title']	="Page";
		
			if($this->uri->segment(2)==""){
				$this->data['link'] = $this->session->userdata('public_viewpage');
			}else{
				$sess_data['public_viewpage'] = $this->uri->segment(2);
				$this->session->set_userdata($sess_data);
				$this->data['link'] = $this->session->userdata('public_viewpage');
			}
			if(!$_POST) {
			$this->data['body']='<body onload="menuleft();menunavigasi();page_detail();">';
			$text=$this->data['link'];
			//$html=str_replace('.html','-',$text);
			$link1=str_replace('-',' ',$text);
			$link2=str_replace('_','-',$link1);
			$this->data['description']=$link2;
			//error_reporting(0);
			$string=file_get_contents(site_url('parse/json/view/home/page/'.$this->data['link'].''));
    		$decode=json_decode($string,TRUE);
    		$co_content=$decode[0]['by_me'];
    		if($co_content==null) {
    			$this->data['form_komentar']='null_o';
    			$this->db->set('views','views + 1', FALSE)->where('judul',$this->data['description'])->update('tb_content');
				$this->load->view('web_template/template/template_top', $this->data);
				$this->load->view('web_template/template/template_navigation', $this->data);
				$this->load->view('web_detail/template/template_detail', $this->data);
				$this->load->view('web_template/template/template_left', $this->data);
				$this->load->view('web_template/template/template_footer', $this->data);
				$this->load->view('web_detail/template/template_detailbottom', $this->data);
    		}else {
    		$id_content=$decode[0]['comment_act'];
    		$this->data['form_komentar']='active';
    		if($id_content==1) {
    			$this->data['form_komentar']='notactive';
    		}
			$this->db->set('views','views + 1', FALSE)->where('judul',$this->data['description'])->update('tb_content');
			$this->load->view('web_template/template/template_top', $this->data);
			$this->load->view('web_template/template/template_navigation', $this->data);
			$this->load->view('web_detail/template/template_detail', $this->data);
			$this->load->view('web_template/template/template_left', $this->data);
			$this->load->view('web_template/template/template_footer', $this->data);
			$this->load->view('web_detail/template/template_detailbottom', $this->data);
		}
		}else {
		$this->form_validation->set_rules('namac', 'Name', 'trim|required|min_length[3]|max_length[7]');	
		$this->form_validation->set_rules('emailc', 'Email', 'trim|required|valid_email');	
		$this->form_validation->set_rules('websitec', 'Website', 'trim|required');	
		$this->form_validation->set_rules('komentarp', 'Komentar', 'trim|required');	
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required');	
		$this->form_validation->set_rules('agree', 'Agree', 'trim|required');	
		$data['namac'] 			=  strip_tags(mysql_real_escape_string($this->input->post('namac', TRUE)));
		$data['email'] 			=  strip_tags(mysql_real_escape_string($this->input->post('emailc', TRUE)));
		$data['websitec'] 			=  strip_tags(mysql_real_escape_string($this->input->post('websitec', TRUE)));
		$encrypt						=  strip_tags(mysql_real_escape_string($this->input->post('komentarp', TRUE)));
		$data['komentarp'] 			=  str_replace('\\','',str_replace('\r','',str_replace('\n','',$encrypt)));
		$datan['captcha'] 			=  mysql_real_escape_string($this->input->post('captcha', TRUE));
		$datan['agree'] 			=  mysql_real_escape_string($this->input->post('agree', TRUE));
		if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Input Failed.</p></div>');
					redirect('page/'.$this->data['link'].'');
				}else{
					//error_reporting(0);
					$string=file_get_contents(site_url('parse/json/view/home/page/'.$this->data['link'].''));
    				$decode=json_decode($string,TRUE);
    				$id_content=$decode[0]['nomer_cont'];
    				$data['id_content']=$this->mysetting->decode($id_content);
					$data_insert	= array(
											'id_content'=>$data['id_content'],
											'name_user'=>$data['namac'],
											'email' => $data['email'],
											'website' => $data['websitec'],
											'date' => date('Y-m-d'),
											'comment' 		=> $data['komentarp'],
											'read_c' 		=> "1",
											'active' 		=> "1"											
											);
											$this->db->insert('tb_comment', $data_insert);
											$result=$this->db->affected_rows();
							if($result>0){
								$this->session->set_flashdata('notif', '<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Ok !</strong><p>Success</p></div>');
								redirect('page/'.$this->data['link'].'');						
							}else {
								$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Failed </p></div>');
								redirect('page/'.$this->data['link'].'');		
							}
				
				
				
				}
		
		}
	}
}