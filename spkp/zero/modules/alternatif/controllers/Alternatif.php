<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Alternatif extends MX_Controller {
	public $data = array(
			'title'     => 'Alternatif',
			'text'     => 'SPK',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('alternatif/malternatif', 'malternatif');
    }
	
	public function index(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='';
			$this->data['filejs']='alternatif.js';
			$view='alternatif/template_alternatif/tm_alternatif';
			$this->zero_hero->template_admin($view,$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function load_krieria(){
		if($this->session->userdata('petugas')==TRUE){
			$id_kriteriagroup=$this->input->post('nomera');
			$view = $this->malternatif->getkriteria($id_kriteriagroup);
			echo '<select data-rel="chosen" class="kbag'.$id_kriteriagroup.' form-control" name="kkbag'.$id_kriteriagroup.'" id="selectErrorr">
				<option value="" disabled selected>-- Select a menu --</option>';
				foreach ($view->result() as $row) {
				echo "<option value='".$row->weight."'>".$row->rangenilai."</option>";
			}			
		echo"";
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function load_krieria1(){
		if($this->session->userdata('petugas')==TRUE){
			$id_kriteriagroup=$this->input->post('nomera');
			$view = $this->malternatif->getkriteria($id_kriteriagroup);
			$id_kriteriagroup=$id_kriteriagroup+2;
			echo '<select data-rel="chosen" class="kbag'.$id_kriteriagroup.' form-control" name="kkbag'.$id_kriteriagroup.'" id="selectErrorr">
				<option value="" disabled selected>-- Select a menu --</option>';
				foreach ($view->result() as $row) {
				echo "<option value='".$row->weight."'>".$row->rangenilai."</option>";
			}			
		echo"";
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function load_krieria2(){
		if($this->session->userdata('petugas')==TRUE){
			$id_kriteriagroup=$this->input->post('nomera');
			$view = $this->malternatif->getkriteria($id_kriteriagroup);
			$id_kriteriagroup=$id_kriteriagroup+5;
			echo '<select data-rel="chosen" class="kbag'.$id_kriteriagroup.' form-control" name="kkbag'.$id_kriteriagroup.'" id="selectErrorr">
				<option value="" disabled selected>-- Select a menu --</option>';
				foreach ($view->result() as $row) {
				echo "<option value='".$row->weight."'>".$row->rangenilai."</option>";
			}			
		echo"";
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function add(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['title']='Tambah Alternatif';
			if(!$_POST){
				$this->data['css']='../';
				$this->data['filejs']='alternatif.js';
				$this->data['kriteria1'] = $this->malternatif->getkriteria(1);
				$this->data['kriteria9'] = $this->malternatif->getkriteria(9);
				$this->data['kriteria17'] = $this->malternatif->getkriteria(17);
				$msg=$this->load->view('alternatif/template_alternatif/tm_addnilaial',$this->data);
			}else{
				$total=$this->malternatif->totalnya();
				if($total->num_rows()==2){
					$msg    = "error";
				}else{
					$data_add  = array( 'nm_alternatif'=>$this->input->post('nmalternatif'),
										'knmsa'=>$this->input->post('kkbag1'),
										'knfsa'=>$this->input->post('kkbag2'),
										'knksa'=>$this->input->post('kkbag3'),
										'knbsa'=>$this->input->post('kkbag4'),
										'knsesa'=>$this->input->post('kkbag5'),
										'kngsa'=>$this->input->post('kkbag6'),
										'knesa'=>$this->input->post('kkbag7'),
										'knsosa'=>$this->input->post('kkbag8'),
										'knmsb'=>$this->input->post('kkbag11'),
										'knfsb'=>$this->input->post('kkbag12'),
										'knksb'=>$this->input->post('kkbag13'),
										'knbsb'=>$this->input->post('kkbag14'),
										'knsesb'=>$this->input->post('kkbag15'),
										'kngsb'=>$this->input->post('kkbag16'),
										'knesb'=>$this->input->post('kkbag17'),
										'knsosb'=>$this->input->post('kkbag18'),
										'ktq'=>$this->input->post('kkbag21'),
										'khm'=>$this->input->post('kkbag22')

						);
					$insert = $this->db->insert('tb_alternatif',$data_add);
					if($insert){
		                $msg    = "success";
	            	}else{
	            		$msg    = "error";
	            	}
				}
				
            	echo json_encode(array("msg"=>$msg));
			}
			
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function edit(){
		if($this->session->userdata('petugas')==TRUE){
				$this->data['css']='../../';
				$this->data['filejs']='alternatif.js';

				$this->data['id_alternatif'] = $this->input->post("nomer");
		   		$sess_data['id_alternatif']	=	$this->data['id_alternatif'];
		    	$this->session->set_userdata($sess_data);
				$this->data['tampilalter'] = $this->malternatif->alternatifedit($this->data);

				$this->data['kriteria1'] = $this->malternatif->getkriteria(1);$this->data['kriteria5'] = $this->malternatif->getkriteria(5);
				$this->data['kriteria2'] = $this->malternatif->getkriteria(2);$this->data['kriteria6'] = $this->malternatif->getkriteria(6);
				$this->data['kriteria3'] = $this->malternatif->getkriteria(3);$this->data['kriteria7'] = $this->malternatif->getkriteria(7);
				$this->data['kriteria4'] = $this->malternatif->getkriteria(4);$this->data['kriteria8'] = $this->malternatif->getkriteria(8);

				$this->data['kriteria9'] = $this->malternatif->getkriteria(9);$this->data['kriteria10'] = $this->malternatif->getkriteria(10);
				$this->data['kriteria11'] = $this->malternatif->getkriteria(11);$this->data['kriteria14'] = $this->malternatif->getkriteria(14);
				$this->data['kriteria12'] = $this->malternatif->getkriteria(12);$this->data['kriteria15'] = $this->malternatif->getkriteria(15);
				$this->data['kriteria13'] = $this->malternatif->getkriteria(13);$this->data['kriteria16'] = $this->malternatif->getkriteria(16);

				$this->data['kriteria17'] = $this->malternatif->getkriteria(17);$this->data['kriteria18'] = $this->malternatif->getkriteria(18);
				$msg=$this->load->view('alternatif/template_alternatif/tm_editnilaial',$this->data);			
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function enedit(){
		if($this->session->userdata('petugas')==TRUE){
				$data_edit  = array( 'nm_alternatif'=>$this->input->post('nmalternatif'),
									'knmsa'=>$this->input->post('kkbag1'),
									'knfsa'=>$this->input->post('kkbag2'),
									'knksa'=>$this->input->post('kkbag3'),
									'knbsa'=>$this->input->post('kkbag4'),
									'knsesa'=>$this->input->post('kkbag5'),
									'kngsa'=>$this->input->post('kkbag6'),
									'knesa'=>$this->input->post('kkbag7'),
									'knsosa'=>$this->input->post('kkbag8'),
									'knmsb'=>$this->input->post('kkbag11'),
									'knfsb'=>$this->input->post('kkbag12'),
									'knksb'=>$this->input->post('kkbag13'),
									'knbsb'=>$this->input->post('kkbag14'),
									'knsesb'=>$this->input->post('kkbag15'),
									'kngsb'=>$this->input->post('kkbag16'),
									'knesb'=>$this->input->post('kkbag17'),
									'knsosb'=>$this->input->post('kkbag18'),
									'ktq'=>$this->input->post('kkbag21'),
									'khm'=>$this->input->post('kkbag22')

					);
				$update=$this->db->where('id_alternatif',$this->session->userdata('id_alternatif'))->update('tb_alternatif',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
            	echo json_encode(array("msg"=>$msg));			
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function delal(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_alternatif']	=	$this->db->escape_str($this->input->post('nomer'));
			$delete=$this->db->where_in('id_alternatif',$this->data['id_alternatif'])->delete('tb_alternatif');
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
	
	function ajax_list(){
		if($this->session->userdata('petugas')==TRUE){
	        $list = $this->malternatif->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            $link=$this->zero_hero->encode($person->id_alternatif);
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->nm_alternatif;
	 
	            //add html for action
	            $row[] = '<div class="btn-group">
	                <button type="button" class="btn btn-sm btn-primary">Option</button>
	                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li><a href="#" onclick=javascript:edit_modalal('.$person->id_alternatif.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Alternatif</a></li>
	                  <li><a href="#" onclick=javascript:del_al('.$person->id_alternatif.',"hapus-alternatif")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete ALternatif</a></li>
	                </ul>
	              </div>  ';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->malternatif->count_all(),
	                        "recordsFiltered" => $this->malternatif->count_filtered(),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    }else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
    }
}