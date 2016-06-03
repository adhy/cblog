<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inkriteria extends MX_Controller {
	public $data = array(
			'title'     => 'Kriteria',
			'text'     => 'SPK',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('inkriteria/minkriteria', 'minkriteria');
    }
	
	public function index(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_kriteriagroup']	=	$this->zero_hero->decode($this->uri->segment(2));
			$sess_data['id_kriteriagroup']	=	$this->data['id_kriteriagroup'];
            $this->session->set_userdata($sess_data);
			//$this->data['inkriteria']	=	$this->minkriteria->getkriteria($this->data);
			$this->data['namekriteria']	=	$this->minkriteria->getkriterianame($this->data);
			$this->data['css']='../';
			$this->data['filejs']='kriteria.js';
			$view='inkriteria/template_inkriteria/tm_inkriteria';
			$this->zero_hero->template_admin($view,$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}

	function getweight(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_kriteriagroup'] = $this->db->escape_str($this->input->post('nomer'));
			$get_weight = $this->minkriteria->weight($this->data);
			$msg='error';
			$msg=0;
			if(!empty($get_weight->weight)){
				$msg = 'success';
				$sum = $get_weight->weight+1;
			}else{
				$msg = 'success';
				$sum = 1;
			}
			echo json_encode(array("msg"=>$msg,"sum"=>$sum));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function ajax_list() {
		if($this->session->userdata('petugas')==TRUE){
			$this->data['idview']=$this->session->userdata('id_kriteriagroup');
	        $list = $this->minkriteria->get_datatables($this->data);
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->rangenilai;
	            $row[] = $person->weight;
	 
	            //add html for action
	            $row[] = '<div class="btn-group">
	                <button type="button" class="btn btn-sm btn-primary">Option</button>
	                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li><a href="#" onclick=javascript:edit_modalk('.$person->id_kriteria.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Kriteria</a></li>
	                  <li><a href="#" onclick=javascript:del_k('.$person->id_kriteria.',"hapus-kriteria")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Kriteria</a></li>
	                </ul>
	              </div>  ';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->minkriteria->count_all($this->data),
	                        "recordsFiltered" => $this->minkriteria->count_filtered($this->data),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    }else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
    }

    function addtable(){
		if($this->session->userdata('petugas')==TRUE){
			$this->form_validation->set_rules('weight', '', 'required');
			$this->form_validation->set_rules('nmkriteria', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['idview']=$this->session->userdata('id_kriteriagroup');
				$this->data['weight']	=	$this->db->escape_str($this->input->post('weight'));
				$this->data['nmkriteria']	=	$this->db->escape_str($this->input->post('nmkriteria'));
				$data_add  = array( 'id_kriteriagroup' => $this->data['idview'],
									'rangenilai' => $this->data['nmkriteria'],
									'weight' => $this->data['weight'],
									'status' => 1);
				$insert = $this->db->insert('tb_kriteria',$data_add);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg,"sum"=>$this->data['weight'],"sim"=>$this->data['nmkriteria']));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function getdata(){
        $this->data['id_kriteria'] = $this->input->post("nomer");
        $sess_data['id_kriteria']	=	$this->data['id_kriteria'];
        $this->session->set_userdata($sess_data);
        $cek   = $this->minkriteria->getdataid($this->data);
        $msg    = "error";
        if($cek->num_rows()>0){
            $msg    = "success";
            foreach ($cek->result() as $view) {
            	$hasil=array('rangenilai'=>$view->rangenilai,'weight'=>$view->weight);
            }
        }
        $msg    = array("msg"=>$msg);
        $data   = array_merge($msg,$hasil);
        echo json_encode($data);
    }
    function edittable(){
		if($this->session->userdata('petugas')==TRUE){
			$this->form_validation->set_rules('eweight', '', 'required');
			$this->form_validation->set_rules('enmkriteria', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['idview']=$this->session->userdata('id_kriteriagroup');
				$this->data['weight']	=	$this->db->escape_str($this->input->post('eweight'));
				$this->data['nmkriteria']	=	$this->db->escape_str($this->input->post('enmkriteria'));
				$data_edit  = array( 'rangenilai' => $this->data['nmkriteria'],
									'weight' => $this->data['weight']);
				$insert = $this->db->where("id_kriteria",$this->session->userdata('id_kriteria'))->update('tb_kriteria',$data_edit);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function deletekriteria(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_kriteria']	=	$this->db->escape_str($this->input->post('nomer'));
			$delete=$this->db->where_in('id_kriteria',$this->data['id_kriteria'])->delete('tb_kriteria');
				if($delete){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
}