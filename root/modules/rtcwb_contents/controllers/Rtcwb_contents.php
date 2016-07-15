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
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			$view='rtcwb_contents/trt_addcontents';
			$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
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
	function cek_catedit(){
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
}