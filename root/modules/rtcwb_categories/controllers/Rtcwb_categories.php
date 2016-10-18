<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_categories extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || Categories',
			'header'	=> 'Categories',
			'text'      => 'CL-System',
			'author'    => 'ADW',
			'add'	=>	'maddca',
			'idt'	=>	'tablecategories'
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_categories/mrtcwb_categories', 'categories');
    }
	public function index(){
		$this->data['table']= array( array('data'=>'No', 'width' => '10%'),'Category','Slug','Create','Update',array('data'=>'Action', 'width' => '20%') );
		$this->data['js_from']=$this->categories->js_frcategor();
		$this->data['css_topp']=$this->template->css_toprot();
		$this->data['js_fott']=$this->template->js_fotrot();
		$this->data['end_table']=$this->template->view_table($this->data);
		$this->data['end_model']=$this->template->end_model();
		$this->data['end_modadd']=$this->template->end_modadd($this->data);
		$this->data['end_modit']=$this->categories->end_modit($this->data);
		$view='rtcwb_categories/trt_categories';
		$this->mlib->template_rt($view, $this->data);
	}
	function ajax_list() {
	        $list = $this->categories->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->nm_c;
	            $row[] = $person->slg_c;
	            $datec  = date('d M Y [H:i:s]', strtotime($person->c_date));
	            $dateu  = date('d M Y [H:i:s]', strtotime($person->u_date));
	            $row[] = $datec ;
	            $row[] = $dateu;
	 			$id    = $this->mlib->enhex($person->id.','.$person->id_parent);
	 			$nm_c  = str_replace(' ','-', $person->nm_c);
	 			//$id2    = $this->mlib->dehex($id);
	            //add html for action
	            if ($person->status == 1){
	            $row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-success" onclick=over("'.$id.'")>Disable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Category</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Category</span></li>
	                </ul>
	              </div>  ';}else{
	              	$row[] = '<div class="btn-group">
	                <button data-target='.$id.' type="button" class="btn btn-sm btn-danger" onclick=over("'.$id.'")>Enable</button>
	                <button data-target="dr'.$id.'" type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li ><span class="drop-menu" onclick=javascript:edit_modalt("'.$id.'") ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Category</span></li>
	                  <li ><span class="drop-menu" onclick=javascript:del_t("'.$id.'")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Category</span></li>
	                </ul>
	              </div>  ';

	              }
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->categories->count_all($this->data),
	                        "recordsFiltered" => $this->categories->count_filtered($this->data),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    
    }
    function addcategories(){
			$msg=$this->load->view('rtcwb_categories/trt_addcategories',$this->data);
	}
	function cek_categories(){
		//$nm_c=$this->input->post('categories', TRUE);
		$nm_c=$this->db->escape_str($this->input->post('categories',TRUE));
		foreach ($nm_c as $row) {
			$this->data['nm_c'] = $row;
			$cekidc=$this->categories->getcat($this->data);
			if($cekidc->num_rows()>0){
				$msg = false;
			}else{
				$msg = true;
			}	
		}
		echo json_encode(array('valid'=>$msg));			
	}
	function cek_categoriess(){
		//$nm_c=$this->input->post('categories', TRUE);
		$this->data['nm_c'] =$this->db->escape_str($this->input->post('category',TRUE));
		$this->data['id']=$this->session->userdata('id_cat');
			$cekidc=$this->categories->getcat($this->data);
			if($cekidc->num_rows()>0){
				$cekidc=$this->categories->getcatidedit($this->data);
				if($cekidc->num_rows()>0){
					$msg = true;
				}else{
					$msg = false;
				}
			}else{
				$msg = true;
			}	
		
		echo json_encode(array('valid'=>$msg));			
	}
	function cek_catedit(){
		//$nm_c=$this->input->post('categories', TRUE);
		$selectparent= array();
		$id_c					=$this->db->escape_str($this->input->post('change',TRUE));
		$goexpl   = $this->mlib->dehex($id_c);
		$fromexpl = explode(',',$goexpl);;
		$this->data['id']    = $fromexpl[0];
		$this->data['id_parent']    = $fromexpl[1];
		$cekidc=$this->categories->getcatidchange($this->data);
		$cekidparzero=$this->categories->getcatidpar();
			if($cekidc->num_rows()>0){
				$msg = 'true';
				$sess_data['id_cat']	=	$this->data['id'] ;
        		$this->session->set_userdata($sess_data);
				$send=$cekidc->row();
				$sendnm=$send->nm_c;
				$cekidparzero=$this->categories->getcatidpar();
				$cekidparnoze=$this->categories->getcatidparnoze($this->data);
				 if($cekidparnoze->num_rows()>0){
          foreach ($cekidc->result() as $rows){
                        foreach($cekidparzero->result() as $rowc):
                        	$select="";
                        	if($rows->id_parent==$rowc->id){
                        		$select="selected='selected'";
                        	}
                        	$id    = $this->mlib->enhex($rowc->id);
                        $selectparent[]= '<option></option><option value="'.$id.'"'.$select.'>'.$rowc->nm_c.'</option>';
                       endforeach;
                  }                   
                }else{
                    foreach($cekidparzero->result() as $rowc):        
                    $id    = $this->mlib->enhex($rowc->id);                                                                  
                    $selectparent[]='<option></option><option value="'.$id.'">'.$rowc->nm_c.'</option>';
                  endforeach;
                }
			}else{
				$msg = 'false';
				$sendnm='error';
			}	
		echo json_encode(array('msg'=>$msg,'category'=>$sendnm,'parent'=>$selectparent));			
	}
	function proc_delete(){
		//$nm_c=$this->input->post('categories', TRUE);
		$id_c					=$this->db->escape_str($this->input->post('delete',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_c);
		$cekidc=$this->categories->getcatid($this->data);
			if($cekidc->num_rows()>0){
				$cekidc=$cekidc->row();
				$cat 	= $cekidc->nm_c;
				$delete=$this->db->where_in('id',$this->data['id'])->delete('cb_categories');
				if($delete){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}else{
				$msg = 'false';
				$cat = $id_c;
			}	
		echo json_encode(array('msg'=>$msg,'cat'=>$cat));			
	}
	function save_categories(){
		$cat = array();
			$nm_c=$this->db->escape_str($this->input->post('categories',TRUE));
			foreach ($nm_c as $row) {
				$cat []= $row;
				$toslg = $this->mlib->slugify($row);	
				$input = array(
							'nm_c' => $row,
							'slg_c'=> $toslg,
							'id_parent'=>'0',
							'c_date' =>  date('Y-m-d H:i:s',now()),
							'u_date' =>  date('Y-m-d H:i:s',now()),
							'status' => '0'
						);
				$insert = $this->db->insert('cb_categories',$input);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
		echo json_encode(array('msg'=>$msg,'cat'=> $cat));
	}
	function sh_categories(){
		//$nm_c=$this->input->post('categories', TRUE);
		$id_c=$this->db->escape_str($this->input->post('take',TRUE));
		$this->data['id']    = $this->mlib->dehex($id_c);		
        $cek=$this->db->where('id',$this->data['id'])->get('cb_categories');
        if($cek->num_rows() > 0){
            $row=$cek->row();
			$status = 0;
			$msg    = 'Disable';
			$cat 	= $row->nm_c;
			if($row->status == 0){
				$status = 1;
				$msg    = 'Enable';
			}
            $this->db->set('status',$status)->where('id',$row->id)->update('cb_categories');
            echo json_encode(array('msg'=>$msg,'over'=>$status,'cat'=>$cat));	
        }		
	}
	function proc_update(){
			$this->form_validation->set_rules('category', '', 'required');
			$msg    = "error1";
			if ($this->form_validation->run() == TRUE){
				$this->data['category']	=	$this->db->escape_str($this->input->post('category', TRUE));
				$id_p	=	$this->db->escape_str($this->input->post('parent', TRUE));
				$this->data['parent']   = $this->mlib->dehex($id_p);
				$toslg=$this->mlib->slugify($this->data['category']);
				//$toslg=url_title($this->data['category'],'dash',TRUE);
				$data_edit = array(
							'nm_c' => $this->data['category'],
							'id_parent'=> $this->data['parent'],
							'slg_c'=> $toslg,
							'u_date' =>  date('Y-m-d H:i:s',now()),
							'status' => '0'
						);
				$update = $this->db->where("id",$this->session->userdata('id_cat'))->update('cb_categories',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
	}
}
