<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_template extends MX_Controller {
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

		$this->load->model('web_template/mweb_template', 'mweb_template');
    }
	public function index(){
		echo "<p>".anchor('parse/json/view/home/new','New Archive', array('target' => '_blank'))."</p>";
		/*//$linkuji=$this->session->userdata('public_viewkategori');
		//$linkuji2=$this->session->userdata('public_viewtag');
		//$linkuji3=$this->session->userdata('public_viewpage');
		echo "<p>".anchor('parse/json/view/home/about','About', array('target' => '_blank'))."</p>";
		//echo "<p>".anchor('parse/json/view/home/category/'.$linkuji.'','Category', array('target' => '_blank'))."</p>";
		echo "<p>".anchor('parse/json/view/home/menu-left','Menu Left', array('target' => '_blank'))."</p>";
		echo "<p>".anchor('parse/json/view/home/menu-top','Menu Top', array('target' => '_blank'))."</p>";
		
		//echo "<p>".anchor('parse/json/view/home/page/'.$linkuji3.'','Page', array('target' => '_blank'))."</p>";
		echo "<p>".anchor('parse/json/view/home/popular','Pop', array('target' => '_blank'))."</p>";
		//echo "<p>".anchor('parse/json/view/home/tag/'.$linkuji2.'','Tag', array('target' => '_blank'))."</p>";

		$data ="satu dua tiga empat lima enam tujuh delapan";
		$count=$this->mysetting->rsumstr_word_count($data);
		$total		=substr($data,0,$count);
		$code=' ';
		$code2=$data;
		$code3=0;
		$code4=1;
		$by	=$this->mysetting->r_implode($code,$code2,$code3,$code4);
	echo $by;
	//$code='';
	//$code2=$data;
	//$code3=0;
	//$code4=jumlah;
		//$string=file_get_contents(site_url('parse/json/view/home/categories'));
    	//$decode=json_decode($string,TRUE);
    	//print_r($decode);
    	//$coba=	"satu dua tiga empat lima enam tujuh delapan <img src=''> <span id='dua'>sembilan</span>";
    	//$isi			=strip_tags($coba);
		//	$total		=substr($isi,0,3);
		//	echo $total;
//$time = time();
//echo mdate($datestring, $time);*/
	}
	public function viewhome_new(){
			$this->__viewhome_new();
		}
	private function __viewhome_new(){
		$resultaa	=	$this->mweb_template->getnew();
		if($resultaa->num_rows()>0){
		$resultab	=	$this->mweb_template->getnewn();
		foreach($resultaa->result() as $row){
			$nomer=$this->mysetting->encode($row->id_content);
		   $data_jsonaa[]=array(	'nomer'	=>	$nomer,					
											'gambar'=>$row->url_cont);
        }
      foreach($resultab->result() as $row){
			$nomer=$this->mysetting->encode($row->id_content);
		   $data_jsonab[]=array(	'nomer'	=>	$nomer);
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode(array('new_top'=>$data_jsonaa,'new_topone'=>$data_jsonab),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
		exit;
	}else {
	show_404();
	
	}
	}
	public function viewhome_pop(){
			$this->__viewhome_pop();
		}
	private function __viewhome_pop(){
		$resultaa	=	$this->mweb_template->getpop();
		if($resultaa->num_rows()>0) {
		foreach($resultaa->result() as $row){
			$nomer=$this->mysetting->encode($row->id_content);
			$link=str_replace('-','_',$row->judul);
			$link=str_replace(' ','-',$link);
			$isi=strip_tags($row->isi);
			$hasil_isi		=substr($isi,0,200);
			$judul_isi		=(substr($row->judul,0,30)."...");
		   $data_jsonaa[]=array(	'nomer'	=>	$nomer,					
											'link_cont'	=>	$link,					
											'judul'	=>	$judul_isi,					
											'isi'		=>$hasil_isi);
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
		}else {
	show_404();
	
	}

	}
	public function viewhome_menuleft(){
			$this->__viewhome_menuleft();
		}
	private function __viewhome_menuleft(){
		$resultaa	=	$this->mweb_template->getcategoriesc();
		if($resultaa->num_rows()>0) {
		foreach($resultaa->result() as $row){
			$link_categories=str_replace('-','_',$row->name_categories);
			$clink_categories=str_replace(' ','-',$link_categories);
			$sumaa		=	$this->mweb_template->getsumcont($row->id_categories);
			$sumaa		=  $sumaa->num_rows();
		   $data_jsonaa[]=array('colomleft'=>array(	'nomer'	=>	$clink_categories,					
																'name_c'	=>	$row->name_categories,
																'total'	=>	$sumaa));
        }
        }else{
     		 $data_jsonaa=array('colomright'=>null);
     		
     		}
     	$resultab	=	$this->mweb_template->getcategoriescc();
     	if($resultab->num_rows()>0) {
      foreach($resultab->result() as $row){
			$link_categoriesb=str_replace('-','_',$row->name_categories);
			$clink_categoriesb=str_replace(' ','-',$link_categoriesb);
			$sumab		=	$this->mweb_template->getsumcontt($row->id_categories);
			$sumab		=  $sumab->num_rows();
		   $data_jsonab[]=array('colomright'=>array(	'nomer'	=>	$clink_categoriesb,					
																'name_c'	=>	$row->name_categories,
																'total'	=>	$sumab));
        }
        }else{
     		 $data_jsonab=array('colomright'=>null);
     		
     		}
        $resultac	=	$this->mweb_template->gettag();
        if($resultac->num_rows()>0) {
			foreach($resultac->result() as $row){
			$nomer=$this->mysetting->encode($row->id_tag);
			$link=str_replace('-','_',$row->name_tag);
			$link=str_replace(' ','-',$link);
		   $data_jsonac[]=array('tag'=>array(	'nomer'	=>	$nomer,					
																	'link'	=>	$link,			
																	'name_t'	=>	$row->name_tag));				
        	}
     		}else{
     		 $data_jsonac=array('tag'=>null);
     		
     		}
        $resultad	=	$this->mweb_template->getcont();
			foreach($resultad->result() as $row){
			$nomer=$this->mysetting->encode($row->id_content);
			$mon=date('M', strtotime($row->date));
			$day=date('d', strtotime($row->date));
			$link=str_replace('-','_',$row->judul);
			$link=str_replace(' ','-',$link);
			$hasil_judul		=substr($row->judul,0,50);
		   $data_jsonad[]=array('top_post'=>array(	'nomer'	=>	$nomer,					
															'bulan'	=>	$mon,				
															'tanggal'	=>	$day,				
															'judul'	=>	$hasil_judul,				
															'link'	=>	$link));				
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode(array($data_jsonaa,$data_jsonab,$data_jsonac,$data_jsonad),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;

	}	
	public function viewhome_menutop(){
			$this->__viewhome_menutop();
		}
	private function __viewhome_menutop(){
		$resultaa	=	$this->mweb_template->getallcat();
		if($resultaa->num_rows()>0) {
		foreach($resultaa->result() as $row){
			//$nomer=$this->mysetting->encode($row->id_categories);
			$nomer=str_replace(' ','-',$row->name_categories);
		   $data_jsonaa[]=array(	'nomer'	=>	$nomer,					
											'name_c'	=>	$row->name_categories);					
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
		}else {
	show_404();
	
	}

	}
	public function viewhome_about(){
			$this->__viewhome_about();
		}
	private function __viewhome_about(){
		$data['id_login']="19";
		$resultaa	=	$this->mweb_template->getprofil($data);					
		$resultab	=	$this->mweb_template->getprofilicon($data);
		foreach($resultab->result() as $rowb){
			$data_jsonab[]=array('link_sos'=>$rowb->url,'icon_sos'=>$rowb->icon);
		}					
		foreach($resultaa->result() as $row){
			$country				=$this->mysetting->country_code_to_country($row->country);
			$country_codephone=$this->mysetting->country_codephone_to_country($row->country);
			$phone				=$country_codephone.$row->phone;
			$birthday=date('d M Y', strtotime($row->birthday));
			//$nomer=$this->mysetting->encode($row->id_categories);
		   $data_jsonaa[]=array(						
											'nama'	=>	$row->name,
											'birthday'	=>	$birthday,
											'country'	=>	$country,
											'phone'	=>	$phone,
											'email'	=>	$row->email,
											'deskripsi'	=>	$row->description,
											'photo'	=>	$row->photo,
											'icon_sos'	=>$data_jsonab);	
														
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;

	}
	/*public function viewhome_kategori(){

			//////////
			$hasil = $this->uri->segment(6);
			$link		=str_replace('-',' ',$hasil);
			$link2  =str_replace('_','-',$link);
			if($hasil=="page"){
				$name_kategori = $this->session->userdata('public_viewkategori');
				
			}else{
				$sess_data['public_viewkategori'] = $link2;
				$this->session->set_userdata($sess_data);
				$name_kategori = $this->session->userdata('public_viewkategori');
			}
		$limit=2;
		$offset=$this->uri->segment(7);
		if (is_null($offset) || empty($offset)){
            $offset = 0;
        }else{
            $offset = ( $offset * $limit) - $limit;
        }
		//$data['id_kategori'] = $kategori;
		$uri = 3;
		
		$this->__viewhome_kategori($name_kategori,$limit,$offset,$uri);///fungsi memanggil
		//$data['tampil_content'] = $this->usermod->kategori_limit($offset,$data);ok
		//$data['tampil_jumlah'] = $this->usermod->search_kategori($data);ok
		//$data['pager_links'] = $this->usermod->paging(base_url('kategori/page'),$data);
		///////	
		}
	private function __viewhome_kategori($name_kategori,$limit,$offset,$uri){
		$data['name_kategori']=$name_kategori;
		$data['limit']=$limit;
		$data['offset']=$offset;

		$resultaa	=	$this->mweb_template->getcontcat_limit($data);
		if($resultaa->num_rows()>0){
			$data['id_login']="19";
			$resultab	=	$this->mweb_template->getprofil($data);
			foreach($resultab->result() as $rows){
			$count=$this->mysetting->rsumstr_word_count($rows->name);
			$code=' ';
			$code2=$rows->name;
			$code3=0;
			$code4=1;
			$by	=$this->mysetting->r_implode($code,$code2,$code3,$code4);
			foreach($resultaa->result() as $row){
				
				$nomera=$this->mysetting->encode($row->id_categories);
				$nomerb=$this->mysetting->encode($row->id_content);
				$isi				=strip_tags($row->isi);
				$hasil_isi		=substr($isi,0,50);
				$link_judul=str_replace('-','_',$row->judul);
				$clink_judul=str_replace(' ','-',$link_judul);
				$date_post=date('F d, Y', strtotime($row->date));
		  		$data_jsonaa[]=array(	'by_me'	=>	$by,	
		  									'nomer_cat'	=>	$nomera,
		   								'nomer_cont'=>	$nomerb,					
											'name_c'	=>	$row->name_categories,
											'link_judul'	=>	$clink_judul,
											'judul'	=>	$row->judul,
											'date_post'	=> $date_post,
											'image_cont'	=> $row->url_cont,
											'isi'		=> $hasil_isi
											);					
        }}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
	}else{
	show_404();
	}

	}
	public function viewhome_tag(){
		if($this->uri->segment(6)==""){
				show_404();
			}else{
				 $hasil	= $this->uri->segment(6);
				//$link		=$this->mysetting->decode($hasil);
				$link		=str_replace('-',' ',$hasil);
				$link2  =str_replace('_','-',$link);
				$this->__viewhome_tag($link2);
			}
			
		}
	private function __viewhome_tag($link){
		$resultaa	=	$this->mweb_template->getconttag($link);
		if($resultaa->num_rows()>0){
			$data['id_login']="19";
			$resultab	=	$this->mweb_template->getprofil($data);
			foreach($resultab->result() as $rows){
			$count=$this->mysetting->rsumstr_word_count($rows->name);
			$code=' ';
			$code2=$rows->name;
			$code3=0;
			$code4=1;
			$by	=$this->mysetting->r_implode($code,$code2,$code3,$code4);
			foreach($resultaa->result() as $row){
				
				$nomera=$this->mysetting->encode($row->id_tag);
				$nomerb=$this->mysetting->encode($row->id_content);
				$isi				=strip_tags($row->isi);
				$hasil_isi		=substr($isi,0,50);
				$link_judul=str_replace('-','_',$row->judul);
				$clink_judul=str_replace(' ','-',$link_judul);
				$date_post=date('F d, Y', strtotime($row->date));
		  		$data_jsonaa[]=array(	'by_me'	=>	$by,	
		  									'nomer_tag'	=>	$nomera,
		   								'nomer_cont'=>	$nomerb,					
											'name_tag'	=>	$row->name_tag,
											'link_judul'	=>	$clink_judul,
											'judul'	=>	$row->judul,
											'date_post'	=> $date_post,
											'image_cont'	=> $row->url_cont,
											'isi'		=> $hasil_isi
											);					
        }}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
	}else{
	show_404();
	}

	}*/
	public function viewhome_page(){
		if($this->uri->segment(6)==""){
				show_404();
			}else{
				 $hasil	= $this->uri->segment(6);
				//$link		=$this->mysetting->decode($hasil);
				$link		=str_replace('-',' ',$hasil);
				$link2  =str_replace('_','-',$link);
				$this->__viewhome_page($link2);
			}
			
		}
	private function __viewhome_page($link){
		$resultaa	=	$this->mweb_template->getcontent($link);
		if($resultaa->num_rows()>0){
			$data['id_login']="19";
			$resultab	=	$this->mweb_template->getprofil($data);
			foreach($resultab->result() as $rows){
			$count=$this->mysetting->rsumstr_word_count($rows->name);
			$code=' ';
			$code2=$rows->name;
			$code3=0;
			$code4=1;
			$by	=$this->mysetting->r_implode($code,$code2,$code3,$code4);
			foreach($resultaa->result() as $row){
				$id_cat=$row->id_content;
				$resultab	=	$this->mweb_template->getcontenttag($id_cat);
				if($resultab->num_rows()>0){
				foreach($resultab->result() as $rows){
					$nama_tag=ucwords($rows->name_tag);
					$data_jsonab[]=array('name_tag'	=>	$nama_tag);	
				
				}
				}else{
					$data_jsonab=null;
				
				}
				$resultac	=	$this->mweb_template->getcontentcom($id_cat);
				if($resultac->num_rows()>0){
					foreach($resultac->result() as $rowc){
					$id_com		= $rowc->id_comment; 
					$resultad	=	$this->mweb_template->getcontentcomre($id_com);
					if($resultad->num_rows()>0){
						foreach($resultad->result() as $rowd){
							$data_jsonad=array(	'by_me'	=>	$by,
															'replay_text'	=>	$rowd->replay
														);
						}
					}else{
						$data_jsonad=null;
					}
					$date_comment=date('F d, Y', strtotime($rowc->date));
					$data_jsonac[]=array('name_user'	=>	$rowc->name_user,
												'date_comment'	=>	$date_comment,
												'text_comment'	=>	$rowc->comment,
												'replay_comment'	=>	$data_jsonad
														);	
				
				}
				
				}else{
				$data_jsonac=null;	
				
				}
				
				$nomera=$this->mysetting->encode($row->id_categories);
				$nomerb=$this->mysetting->encode($row->id_content);
				//$isi				=strip_tags($row->isi);
				//$hasil_isi		=substr($isi,0,50);
				$link_categories=str_replace('-','_',$row->name_categories);
				$clink_categories=str_replace(' ','-',$link_categories);
				$date_post=date('F d, Y', strtotime($row->date));
				if($row->act_comment>0) {
				$active_comment=1;
				}else{
				$active_comment=null;
				}
		  		$data_jsonaa[]=array(	'by_me'	=>	$by,	
		  									'nomer_cat'	=>	$nomera,
		   								'nomer_cont'=>	$nomerb,					
											'name_c'	=>	$row->name_categories,
											'link_categories'	=>	$clink_categories,
											'judul'	=>	$row->judul,
											'date_post'	=> $date_post,
											'image_cont'	=> $row->url_cont,
											'isi'		=> $row->isi,
											'tag_cont'=>$data_jsonab,
											'comment_act'=>$active_comment,
											'comment_all'=>$data_jsonac
											);					
        }
        }
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
	}else{
		$data_jsonaa[]=array('by_me'	=>	null);
	$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data_jsonaa,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ))
        ->_display();
		exit;
	}

	}

}