<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_tag extends MX_Controller {
	/**
		* @Author				: Localhost {adi setyo}
		* @Email				: adhytsa18@gmail.com
		* @Web					: http://adisetyo.info
		* @Date					: 2015-02-21 08:31:25
	**/
	public $data = array(
			'pager_links'=>'',
        'title'     => '',
        'text'     => 'adisetyo',
        'author'    => 'ADW',
    );
	    public function __construct(){
        parent::__construct();

		$this->load->model('web_tag/mweb_tag', 'mweb_tag');
    }
	public function index(){
		$this->data['title']	="Tag";
			$link 	= $this->uri->segment(2);
			$link1	=str_replace('-',' ',$link);
			$link2  =str_replace('_','-',$link1);
			$data['name_tag'] = $this->session->userdata('public_viewtag');
			if($link2!=$data['name_tag']){
				$sess_data['public_viewtag'] = $link2;
				$this->session->set_userdata($sess_data);
				$data['name_tag'] = $this->session->userdata('public_viewtag');
				
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
		$this->data['view_catcont']	=	$this->mweb_tag->getcontcat_limit($data);
		if($this->data['view_catcont']->num_rows()>0) {
			$this->data['view_profil']	=	$this->mweb_tag->getprofil($data);
			//$row= $this->data['view_catcont']->row();
			//$data['id_categories']=$row->id_categories;
			$data['jumlah_cat'] = $this->mweb_tag->sum_tag($data);
			$this->data['pager_links'] = $this->mweb_tag->paging(base_url('tag/'.$link.''),$data);
			$this->data['tampil']=$data['jumlah_cat'];
			$this->data['body']='<body onload="menuleft();menunavigasi();">';
			$this->data['description']=$data['name_tag'];
			$this->load->view('web_template/template/template_top', $this->data);
			$this->load->view('web_template/template/template_navigation', $this->data);
			$this->load->view('web_tag/template/template_tag', $this->data);
			$this->load->view('web_template/template/template_left', $this->data);
			$this->load->view('web_template/template/template_footer', $this->data);
			$this->load->view('web_template/template/template_bottom', $this->data);
		}else {
			$this->data['view_catcont']='null_o';
			$this->data['body']='<body onload="menuleft();menunavigasi();">';
			$this->data['description']=$data['name_tag'];
			$this->load->view('web_template/template/template_top', $this->data);
			$this->load->view('web_template/template/template_navigation', $this->data);
			$this->load->view('web_tag/template/template_tag', $this->data);
			$this->load->view('web_template/template/template_left', $this->data);
			$this->load->view('web_template/template/template_footer', $this->data);
			$this->load->view('web_template/template/template_bottom', $this->data);
		}
		
	}
}