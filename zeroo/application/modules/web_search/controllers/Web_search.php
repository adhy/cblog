<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_search extends MX_Controller {
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

		$this->load->model('web_search/mweb_search', 'mweb_search');
    }
	public function index(){
		$this->data['title']	="Search";
		$linka 	= $this->input->post("text_seaa");
		$link 	= $this->input->post("text_sea");
			if(empty($linka) && !empty($link)){
				$sess_data['public_viewsearch'] = $link;
				$this->session->set_userdata($sess_data);
				$data['name_search'] = $this->session->userdata('public_viewsearch');				
			}elseif(!empty($linka) && empty($link)){
				$sess_data['public_viewsearch'] = $linka;
				$this->session->set_userdata($sess_data);
				$data['name_search'] = $this->session->userdata('public_viewsearch');
			}elseif(!empty($linka) && !empty($link)){
				$sess_data['public_viewsearch'] = $link;
				$this->session->set_userdata($sess_data);
				$data['name_search'] = $this->session->userdata('public_viewsearch');
			}elseif(empty($linka) && empty($link)){
				$data['name_search'] = $this->session->userdata('public_viewsearch');
			}
		$data['limit']=3;
		$data['offset']=$this->uri->segment(3);
		if (is_null($data['offset']) || empty($data['offset'])){
            $data['offset'] = 0;
        }else{
            $data['offset'] = ( $data['offset'] * $data['limit']) - $data['limit'];
        }
		$data['uri'] = 3;
		$data['id_login']="19";
		$this->data['view_catcont']	=	$this->mweb_search->getcontent_limit($data);
		if($this->data['view_catcont']->num_rows()>0) {
			$this->data['view_profil']	=	$this->mweb_search->getprofil($data);
			//$row= $this->data['view_catcont']->row();
			//$data['id_categories']=$row->id_categories;
			$data['jumlah_cat'] = $this->mweb_search->sum_content($data);
			$this->data['pager_links'] = $this->mweb_search->paging(base_url('search/page'),$data);
			$this->data['tampil']=$data['jumlah_cat'];
			$this->data['body']='<body onload="menuleft();menunavigasi()">';
			$this->data['description']=$data['name_search'];
			$this->load->view('web_template/template/template_top', $this->data);
			$this->load->view('web_template/template/template_navigation', $this->data);
			$this->load->view('web_search/template/template_search', $this->data);
			$this->load->view('web_template/template/template_left', $this->data);
			$this->load->view('web_template/template/template_footer', $this->data);
			$this->load->view('web_template/template/template_bottom', $this->data);
		}else {
			$this->data['view_catcont']='no_no';
			$this->session->set_flashdata('notif', '<div class="alert alert-danger fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>Sorry !</strong><p>Pencarian dengan Keyword '.$link.' gagal.</p></div>');
			$this->data['body']='<body onload="menuleft();menunavigasi()">';
			$this->data['description']=$data['name_search'];
			$this->load->view('web_template/template/template_top', $this->data);
			$this->load->view('web_template/template/template_navigation', $this->data);
			$this->load->view('web_search/template/template_search', $this->data);
			$this->load->view('web_template/template/template_left', $this->data);
			$this->load->view('web_template/template/template_footer', $this->data);
			$this->load->view('web_template/template/template_bottom', $this->data);
		}
	}
}