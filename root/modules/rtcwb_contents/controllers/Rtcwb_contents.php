<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_contents extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Contents',
			'header'	=> 'Contents',
			'text'     	=> 'CL-System',
			'author'    => 'ADW',
			'filejs'	=>	'contents.js',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_contents/mrtcwb_contents', 'contents');
    }
	public function index(){
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			$view='rtcwb_contents/trt_contents';
			$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
	}
	function ajax_list() {
	        $list = $this->contents->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->title;
	            $datec  = date('d M Y [H:i:s]', strtotime($person->c_date));
	            $dateu  = date('d M Y [H:i:s]', strtotime($person->u_date));
	            $row[] = $datec ;
	            $row[] = $dateu;
	 			$id    = $this->mlib->enhex($person->id);
	            //add html for action
	            if ($person->status == 1){
	            $row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-success" onclick=over("'.$id.'")>Disable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Content</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Content</span></li>
	                </ul>
	              </div>  ';}else{
	              	$row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-danger" onclick=over("'.$id.'")>Enable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Content</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Content</span></li>
	                </ul>
	              </div>  ';

	              }
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->contents->count_all($this->data),
	                        "recordsFiltered" => $this->contents->count_filtered($this->data),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    
    }
    public function adcon(){
    	$this->data['categories']=$this->contents->getcategories(1);	
    	$this->data['tags']=$this->contents->gettags(1);	
		$view='rtcwb_contents/trt_addcontents';
		$this->mlib->template_rt($view,$this->data);

	}    
	public function adconsave(){
		$this->form_validation->set_rules('title', '', 'required');
		$this->form_validation->set_rules('category', '', 'required');
		//$this->form_validation->set_rules('tags', '', 'required');		
		$this->form_validation->set_rules('headimg', '', '');
		$this->form_validation->set_rules('metad', '', 'required');
		$this->form_validation->set_rules('content', '', '');
		$msg    = "error1";
		if ($this->form_validation->run() == TRUE){
			$this->data['title']	=	$this->db->escape_str($this->input->post('title', TRUE));
			$this->data['category']	=	$this->db->escape_str($this->input->post('category', TRUE));
			$tags	=	$this->input->post('tags', TRUE);
			$this->data['headimg']	=	$this->db->escape_str($this->input->post('headimg', TRUE));
			$this->data['metad']	=	$this->db->escape_str($this->input->post('metad', TRUE));
			$this->data['content']	=	$this->db->escape_str($this->input->post('content', TRUE));
			$toslg = preg_replace("/[^a-zA-Z0-9]/", "-", $this->data['title']);
			$metahead=substr($this->data['metad'],0,200);
			//$toslg = str_replace(' ','-', $this->data['category']);
			$slg   = strtolower($toslg);
			$data_ico = array(
						'title' => $this->data['title'],
						'slug'=> $slg,
						'meta_content'=> $metahead,
						'imgheader'=> $this->data['headimg'],
						'content' =>  $this->data['content'],
						'c_date' =>  date('Y-m-d H:i:s',now()),
						'u_date' =>  date('Y-m-d H:i:s',now()),
						'status' => '0',
						'creator' => $this->session->userdata('wormood')
					);
			$insert = $this->db->insert('cb_contents',$data_ico);
			if($insert){
                $msg    = "success";
                $this->session->set_flashdata('notif','<script>toastr.success("Save '.$this->data['title'].' success !");</script>');
        	}else{
        		$msg    = "error insert to table content";
        	}
        	$id_content= $this->contents->getidcont($slg);
        	$getidcont=$id_content->row();
			$idc 	= $getidcont->id;
			       	$datacatrel= array(
				    'id_c' => $this->data['category'],
				    'id_cont' => $idc,
				    'c_date' =>  date('Y-m-d H:i:s',now()),
					'u_date' =>  date('Y-m-d H:i:s',now()),
					'status' => '0',
				);
			 $datacatrel=  $this->db->insert('cb_catrelation', $datacatrel);
			  if($datacatrel){
                $msg    = "success";
        	}else{
        		$msg    = "error insert to table tag relation";
        	}

        	foreach($tags as $row) {
				$datatagrel= array(
				    'id_tag' => $row,
				    'id_cont' => $idc,
				    'c_date' =>  date('Y-m-d H:i:s',now()),
					'u_date' =>  date('Y-m-d H:i:s',now()),
					'status' => '0',
				);
			  $datagrel=  $this->db->insert('cb_tagsrelation', $datatagrel);
		    }
		    		    if($datagrel){
                $msg    = "success";
        	}else{
        		$msg    = "error insert to table tag relation";
        	}
			 

 
        	$title=$this->data['title'];

		}
        echo json_encode(array("msg"=>$msg, "title"=>$title));
	}
	
	function sh_contents(){
		//$nm_c=$this->input->post('contents', TRUE);
		$id_c=$this->db->escape_str($this->input->post('take',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_c);		
        $cek=$this->db->where('id',$this->data['id'])->get('cb_contents');
        if($cek->num_rows() > 0){
            $row=$cek->row();
			$status = 0;
			$msg    = 'Disable';
			$cont 	= $row->title;
			if($row->status == 0){
				$status = 1;
				$msg    = 'Enable';
			}
            $this->db->set('status',$status)->where('id',$row->id)->update('cb_contents');
            echo json_encode(array('msg'=>$msg,'over'=>$status,'cont'=>$cont));	
        }		
	}
	function cek_title(){
		//$nm_t=$this->input->post('tags', TRUE);
		$this->data['title'] =$this->db->escape_str($this->input->post('title',TRUE));
		$cekidt=$this->contents->getcontent($this->data);
		if($cekidt->num_rows()>0){
			$msg = false;
		}else{
			$msg = true;
		}	
		
		echo json_encode(array('valid'=>$msg));			
	}

	function cek_contedit(){
		//$nm_c=$this->input->post('contents', TRUE);
		$id_co					=$this->db->escape_str($this->input->post('change',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_co);
		$cekidc=$this->contents->getcatid($this->data);
			if($cekidc->num_rows()>0){
				$msg = 'true';
				$sess_data['id_cont']	=	$this->data['id'] ;
        		$this->session->set_userdata($sess_data);
				$send=$cekidc->row();
				$sendnm=$send->title;
			}else{
				$msg = 'false';
				$sendnm='error';
			}	
		echo json_encode(array('msg'=>$msg,'content'=>$sendnm));			
	}
	function proc_delete(){
		//$nm_c=$this->input->post('contents', TRUE);
		$id_c					=$this->db->escape_str($this->input->post('delete',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_c);
		$cekidc=$this->contents->getcatid($this->data);
			if($cekidc->num_rows()>0){
				$cekidc=$cekidc->row();
				$cont 	= $cekidc->title;
				$delete=$this->db->where_in('id',$this->data['id'])->delete('cb_contents');
				if($delete){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}else{
				$msg = 'false';
				$cont = $id_c;
			}	
		echo json_encode(array('msg'=>$msg,'cont'=>$cont));			
	}
	function id_auth(){

	}
	function view_edit(){
		$this->data['id']  =  $this->session->userdata('id_cont');
		$this->data['edcont'] = $this->contents->editcontent($this->data);
		$this->data['categories']=$this->contents->getcategories(1);
		$this->data['selcategories']=$this->contents->getselectcategories($this->data);
    	$this->data['tags']=$this->contents->gettags(1);	
    	$this->data['seltags']=$this->contents->getselecttags($this->data);	
		$view='rtcwb_contents/trt_editcontents';
		$this->mlib->template_rt($view,$this->data);
	}
}