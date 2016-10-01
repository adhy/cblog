<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_tags extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Tags',
			'header'	=> 'Tags',
			'text'      => 'CL-System',
			'author'    => 'ADW',
			'filejs'	=>	'tags.js',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_tags/mrtcwb_tags', 'tags');
    }
	public function index(){
			$view='rtcwb_tags/trt_tags';
			$this->mlib->template_rt($view, $this->data);
	}
	function ajax_list() {
	        $list = $this->tags->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->nm_t;
	            $row[] = $person->slg_t;
	            $datec  = date('d M Y [H:i:s]', strtotime($person->c_date));
	            $dateu  = date('d M Y [H:i:s]', strtotime($person->u_date));
	            $row[] = $datec ;
	            $row[] = $dateu;
	 			$id    = $this->mlib->enhex($person->id);
	 			$nm_t  = str_replace(' ','-', $person->nm_t);
	            if ($person->status == 1){
	            $row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-success" onclick=over("'.$id.'")>Disable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Tag</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Tag</span></li>
	                </ul>
	              </div>  ';}else{
	              	$row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-danger" onclick=over("'.$id.'")>Enable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Tag</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Tag</span></li>
	                </ul>
	              </div>  ';

	              }
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->tags->count_all($this->data),
	                        "recordsFiltered" => $this->tags->count_filtered($this->data),
	                        "data" => $data,
	                );
	        echo json_encode($output);
	    
    }
    function addtags(){
			$msg=$this->load->view('rtcwb_tags/trt_addtags',$this->data);
	}
	function cek_tags(){
		//$nm_t=$this->input->post('tags', TRUE);
		$nm_t=$this->db->escape_str($this->input->post('tags',TRUE));
		foreach ($nm_t as $row) {
			$this->data['nm_t'] = $row;
			$cekidt=$this->tags->gettag($this->data);
			if($cekidt->num_rows()>0){
				$msg = false;
			}else{
				$msg = true;
			}	
		}
		echo json_encode(array('valid'=>$msg));			
	}
	function cek_tagss(){
		//$nm_t=$this->input->post('tags', TRUE);
		$this->data['nm_t'] =$this->db->escape_str($this->input->post('tag',TRUE));
		$this->data['id']=$this->session->userdata('id_tag');
			$cekidt=$this->tags->gettag($this->data);
			if($cekidt->num_rows()>0){
				$cekidt=$this->tags->gettagedit($this->data);
				if($cekidt->num_rows()>0){
					$msg = true;
				}else{
					$msg = false;
				}
			}else{
				$msg = true;
			}	
		
		echo json_encode(array('valid'=>$msg));			
	}
	function cek_tagedit(){
		//$nm_t=$this->input->post('tags', TRUE);
		$id_t					=$this->db->escape_str($this->input->post('change',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_t);
		$cekidt=$this->tags->gettagid($this->data);
			if($cekidt->num_rows()>0){
				$msg = 'true';
				$sess_data['id_tag']	=	$this->data['id'] ;
        		$this->session->set_userdata($sess_data);
				$send=$cekidt->row();
				$sendnm=$send->nm_t;
			}else{
				$msg = 'false';
				$sendnm='error';
			}	
		echo json_encode(array('msg'=>$msg,'tag'=>$sendnm));			
	}
	///
	function proc_delete(){
		//$nm_t=$this->input->post('tags', TRUE);
		$id_t					=$this->db->escape_str($this->input->post('delete',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_t);
		$tag = '';
		$cekidt=$this->tags->gettagid($this->data);
			if($cekidt->num_rows()>0){
				$cekidt=$cekidt->row();
				$tag 	= $cekidt->nm_t;
				$delete=$this->db->where_in('id',$this->data['id'])->delete('cb_tags');
				if($delete){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}else{
				$msg = 'false';
			}	
		echo json_encode(array('msg'=>$msg,'tag'=>$tag));			
	}
	function save_tags(){
		$tag = array();
		//$this->form_validation->set_rules('tags', '', 'strip_tags|xss_clean');
		//$msg    = "error1";
		//if ($this->form_validation->run() == TRUE){
			$nm_t=$this->db->escape_str($this->input->post('tags',TRUE));
			//$nm_t=$this->input->post('tags', TRUE);
			foreach ($nm_t as $row) {
				$tag []= $row;
				$slg=$this->mlib->slugify($row);
				//$slg=url_title($row,'dash',TRUE);
				
				$input = array(
							'nm_t' => $row,
							'slg_t'=> $slg,
							'c_date' =>  date('Y-m-d H:i:s',now()),
							'u_date' =>  date('Y-m-d H:i:s',now()),
							'status' => '0'
						);
				$insert = $this->db->insert('cb_tags',$input);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
		//}
		echo json_encode(array('msg'=>$msg,'tag'=> $tag));
	}
	function sh_tags(){
		//$nm_t=$this->input->post('tags', TRUE);
		$id_t=$this->db->escape_str($this->input->post('take',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_t);		
        $cek=$this->db->where('id',$this->data['id'])->get('cb_tags');
        if($cek->num_rows() > 0){
            $row=$cek->row();
			$status = 0;
			$msg    = 'Disable';
			$tag 	= $row->nm_t;
			if($row->status == 0){
				$status = 1;
				$msg    = 'Enable';
			}
            $this->db->set('status',$status)->where('id',$row->id)->update('cb_tags');
            echo json_encode(array('msg'=>$msg,'over'=>$status,'tag'=>$tag));	
        }		
	}
	function proc_update(){
			$this->form_validation->set_rules('tag', '', 'required');
			$msg    = "error1";
			if ($this->form_validation->run() == TRUE){
				$this->data['tag']	=	$this->db->escape_str($this->input->post('tag', TRUE));
				$slg = $this->mlib->slugify($this->data['tag']);
				//$slg = url_title($toslg,'dash',TRUE);
				//$slg   = strtolower($toslg);
				$data_edit = array(
							'nm_t' => $this->data['tag'],
							'slg_t'=> $slg,
							'u_date' =>  date('Y-m-d H:i:s',now()),
							'status' => '0'
						);
				$update = $this->db->where("id",$this->session->userdata('id_tag'))->update('cb_tags',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg,"pesan"=>$this->data['tag']));
	}
}