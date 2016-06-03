<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siswa extends MX_Controller {
	public $data = array(
			'title'     => 'Siswa',
			'text'     => 'SPK',
			'author'    => 'ADW',
			'filejs'	=> 'siswa.js',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('siswa/msiswa', 'msiswa');
    }
	
	public function index(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='';
			$view='siswa/template_siswa/tm_siswa';
			$this->zero_hero->template_admin($view,$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function addnilai(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='../';
			$this->data['id_siswanilai'] = $this->input->post("nomera");
			$this->data['kriteria1'] = $this->msiswa->getkriteria(1);
			$this->data['kriteria9'] = $this->msiswa->getkriteria(9);
			$this->data['kriteria17'] = $this->msiswa->getkriteria(17);
			$msg=$this->load->view('siswa/template_siswa/tm_addnilai',$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function cetak(){
		if($this->session->userdata('petugas')==TRUE){
			// load dompdf
			$this->load->helper('dompdf');
			//load content html
			$this->data['css']='';
			$this->data['cetak']=$this->msiswa->getcetak();
			$html=$this->load->view('pln_template/template_super/cetak',$this->data, true);
			
			//$html = $this->load->view('large_table', '', true);
			// create pdf using dompdf
			$date = date('d-m-Y');
			$name = 'Penjurusan_';
			$filename=$name.$date;
			$paper = 'A4';
			$orientation = 'potrait';
			pdf_create($html, $filename, $paper, $orientation);
			
			
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function editnilai(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['css']='../';
			$this->data['id_siswanilai'] = $this->input->post("nomera");
		    $idsis 		= $this->input->post("nomera");
		    $this->data['tampilalnilai'] = $this->msiswa->getsiswanilai($idsis);
			$this->data['kriteria1'] = $this->msiswa->getkriteria(1);$this->data['kriteria5'] = $this->msiswa->getkriteria(5);
			$this->data['kriteria2'] = $this->msiswa->getkriteria(2);$this->data['kriteria6'] = $this->msiswa->getkriteria(6);
			$this->data['kriteria3'] = $this->msiswa->getkriteria(3);$this->data['kriteria7'] = $this->msiswa->getkriteria(7);
			$this->data['kriteria4'] = $this->msiswa->getkriteria(4);$this->data['kriteria8'] = $this->msiswa->getkriteria(8);

			$this->data['kriteria9'] = $this->msiswa->getkriteria(9);$this->data['kriteria10'] = $this->msiswa->getkriteria(10);
			$this->data['kriteria11'] = $this->msiswa->getkriteria(11);$this->data['kriteria14'] = $this->msiswa->getkriteria(14);
			$this->data['kriteria12'] = $this->msiswa->getkriteria(12);$this->data['kriteria15'] = $this->msiswa->getkriteria(15);
			$this->data['kriteria13'] = $this->msiswa->getkriteria(13);$this->data['kriteria16'] = $this->msiswa->getkriteria(16);

			$this->data['kriteria17'] = $this->msiswa->getkriteria(17);$this->data['kriteria18'] = $this->msiswa->getkriteria(18);
			$msg=$this->load->view('siswa/template_siswa/tm_editnilai',$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function subnilaiedit(){
		if($this->session->userdata('petugas')==TRUE){
			$sesiku=0;
			$msg = 'error';
			$idsiswamnilai=$this->input->post('siswa');
				$data_edit  = array( 
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
				$update=$this->db->where('id_siswa',$idsiswamnilai)->update('tb_nilai',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
            	
            	
			
			$this->_proses($idsiswamnilai);
			$sesiku=$idsiswamnilai;            	
               	echo json_encode(array("msg"=>$msg,"sesiku"=>$sesiku));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}

	function subnilai(){
		if($this->session->userdata('petugas')==TRUE){
			$sesiku=0;
			$msg = 'error';
			$idsiswamnilai=$this->input->post('siswa');
			$ceksiswanilai=$this->msiswa->getsiswanilai($idsiswamnilai);
			if($ceksiswanilai->num_rows()>0){
				$msg    = "error";
			}else{
				$data_add  = array( 'id_siswa'=>$this->input->post('siswa'),
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
				$insert = $this->db->insert('tb_nilai',$data_add);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
            	
            	
			}
			$this->_proses($idsiswamnilai);
			$sesiku=$idsiswamnilai; 
            	
               	echo json_encode(array("msg"=>$msg,"sesiku"=>$sesiku));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function delsis(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_siswa']	=	$this->db->escape_str($this->input->post('nomer'));
			$delete=$this->db->where_in('id_siswa',$this->data['id_siswa'])->delete('tb_siswa');
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
	function nis(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['nis']=$this->input->post('nis');
			$ceknis=$this->msiswa->getnis($this->data);
			if($ceknis->num_rows()>0){
				$msg = false;
			}else{
				$msg = true;
			}
			echo json_encode(array('valid'=>$msg));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function addsiswa(){
		if($this->session->userdata('petugas')==TRUE){
			$this->form_validation->set_rules('nis', '', 'required');
			$this->form_validation->set_rules('nmsis', '', 'required');
			$this->form_validation->set_rules('date', '', 'required');
			$this->form_validation->set_rules('walisis', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['nis']		=	$this->db->escape_str($this->input->post('nis'));
				$this->data['nmsis']	=	$this->db->escape_str($this->input->post('nmsis'));
				$tanggal				=	$this->db->escape_str($this->input->post('date'));
				$this->data['walisis']	=	$this->db->escape_str($this->input->post('walisis'));
				$this->data['date']		=	date('Y-m-d', strtotime(str_replace('/', '-', $tanggal)));
				$data_add  = array( 'nis' => $this->data['nis'],
									'nm_siswa' => $this->data['nmsis'],
									'tgl_lahir' => $this->data['date'],
									'walisiswa' => $this->data['walisis'],
									'jurusan' => 0,
									'status' => 1);
				$insert = $this->db->insert('tb_siswa',$data_add);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg,"sum"=>$this->data['nis']));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function edit_siswa(){
		if($this->session->userdata('petugas')==TRUE){
				$this->data['id_siswa']	=	$this->db->escape_str($this->input->post('get'));
				$this->data['nmsis']	=	$this->db->escape_str($this->input->post('nmsis'));
				$tanggal				=	$this->db->escape_str($this->input->post('dateedit'));
				$this->data['walisis']	=	$this->db->escape_str($this->input->post('walisis'));
				$this->data['date']		=	date('Y-m-d', strtotime(str_replace('-', '/', $tanggal)));
				$data_edit  = array( 'nm_siswa' => $this->data['nmsis'],
									'tgl_lahir' => $this->data['date'],
									'walisiswa' => $this->data['walisis']);
				$update=$this->db->where('id_siswa',$this->data['id_siswa'])->update('tb_siswa',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
            echo json_encode(array("msg"=>$msg,'nis'=>$this->session->userdata('id_siswa')));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function getsis(){
		if($this->session->userdata('petugas')==TRUE){
           	$this->data['id_siswa'] = $this->input->post("nomer");
	        $this->data['cek']   = $this->msiswa->getdatasis($this->data);
	        $msg=$this->load->view('siswa/template_siswa/tm_editsiswa',$this->data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
	}
	function ajax_list(){
		if($this->session->userdata('petugas')==TRUE){
	        $list = $this->msiswa->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	            $link=$this->zero_hero->encode($person->id_siswa);
	            $nilai='<a href="#" onclick=javascript:edit_nilaisiswa('.$person->id_siswa.')  ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah Nilai</a>';
	            if($person->jurusan == 0){
	            	$jurus='Belum dijiruskan';
	            	$nilai='<a href="#" onclick=javascript:add_nilaisiswa('.$person->id_siswa.') ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Nilai</a>';
	            }else if ($person->jurusan == 1){
	            	$jurus='IPA';
	            }else{
	            	$jurus='IPS';
	            }
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->nm_siswa;
	            $row[] = $jurus;
	 
	            //add html for action
	            $row[] = ' <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary">Option</button>
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="caret"></span>&nbsp;
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#" onclick=javascript:edit_modalsiswa('.$person->id_siswa.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Siswa</a></li>
                              <li>'.$nilai.'</li>
                              <li><a href="#" onclick=javascript:hapus_siswa('.$person->id_siswa.') ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Siswa</a></li>
                              <li><a href="'.site_url('siswa/proses/'.$link).'"  ><span class="glyphicon glyphicon-file " aria-hidden="true"></span> Proses Siswa</a></li>
                            </ul>
                          </div>  ';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->msiswa->count_all(),
	                        "recordsFiltered" => $this->msiswa->count_filtered(),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    }else if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}
    }
    private function _proses($idsiswamnilai){
    	//strat ternormalisasi
		$alternatif=$this->msiswa->getid();
		$knmsa		= 0;	$knmsb		= 0 ;
		$knfsa		= 0;	$knfsb		= 0 ;
		$knksa		= 0;	$knksb		= 0 ;
		$knbsa		= 0;	$knbsb		= 0 ;
		$knsesa		= 0;	$knsesb		= 0 ;
		$kngsa		= 0;	$kngsb		= 0 ;
		$knesa		= 0	;	$knesb		= 0 ;
		$knsosa		= 0 ;	$knsosb		= 0 ;
		$ktq		= 0 ;	$khm		= 0 ;
		foreach($alternatif->result() as $row){
			$id_alternatif = $row->id_alternatif;
			$knmsa		+= pow($row->knmsa,2);	$knmsb		+= pow($row->knmsb,2);
			$knfsa		+= pow($row->knfsa,2);	$knfsb		+= pow($row->knfsb,2);
			$knksa		+= pow($row->knksa,2);	$knksb		+= pow($row->knksb,2);
			$knbsa		+= pow($row->knbsa,2);	$knbsb		+= pow($row->knbsb,2);
			$knsesa		+= pow($row->knsesa,2);	$knsesb		+= pow($row->knsesb,2);
			$kngsa		+= pow($row->kngsa,2);	$kngsb		+= pow($row->kngsb,2);
			$knesa		+= pow($row->knesa,2);	$knesb		+= pow($row->knesb,2);
			$knsosa		+= pow($row->knsosa,2);	$knsosb		+= pow($row->knsosb,2);
			$ktq		+= pow($row->ktq,2);	$khm		+= pow($row->khm,2);
		}
			$terid_alternatif = array();     
			$terknmsa		= array();     		$terknmsb		= array();     
			$terknfsa		= array();     		$terknfsb		= array();     
			$terknksa		= array();     		$terknksb		= array();     
			$terknbsa		= array();     		$terknbsb		= array();     
			$terknsesa		= array();     		$terknsesb		= array();     
			$terkngsa		= array();     		$terkngsb		= array();     
			$terknesa		= array();     		$terknesb		= array();     
			$terknsosa		= array();     		$terknsosb		= array();     
			$terktq			= array();     		$terkhm		= array();     	
			/*foreach($alternatif->result() as $row){
			$terid_alternatif []= $row->id_alternatif;
			$terknmsa		[]= $row->knmsa/SQRT($knmsa);		$terknmsb		[]= $row->knmsb/SQRT($knmsb);
			$terknfsa		[]= $row->knfsa/SQRT($knfsa);		$terknfsb		[]= $row->knfsb/SQRT($knfsb);
			$terknksa		[]= $row->knksa/SQRT($knksa);		$terknksb		[]= $row->knksb/SQRT($knksb);
			$terknbsa		[]= $row->knbsa/SQRT($knbsa);		$terknbsb		[]= $row->knbsb/SQRT($knbsb);
			$terknsesa		[]= $row->knsesa/SQRT($knsesa);		$terknsesb		[]= $row->knsesb/SQRT($knsesb);
			$terkngsa		[]= $row->kngsa/SQRT($kngsa);		$terkngsb		[]= $row->kngsb/SQRT($kngsb);
			$terknesa		[]= $row->knesa/SQRT($knesa);		$terknesb		[]= $row->knesb/SQRT($knesb);
			$terknsosa		[]= $row->knsosa/SQRT($knsosa);		$terknsosb		[]= $row->knsosb/SQRT($knsosb);
			$terktq			[]= $row->ktq/SQRT($ktq);			$terkhm			[]= $row->khm/SQRT($khm);

		}*/
		foreach($alternatif->result() as $row){
			$terid_alternatif []= $row->id_alternatif;
			$terknmsa		[]= number_format($row->knmsa/number_format(SQRT($knmsa),1),1);		$terknmsb		[]= number_format($row->knmsb/number_format(SQRT($knmsb),1),1);
			$terknfsa		[]= number_format($row->knfsa/number_format(SQRT($knfsa),1),1);		$terknfsb		[]= number_format($row->knfsb/number_format(SQRT($knfsb),1),1);
			$terknksa		[]= number_format($row->knksa/number_format(SQRT($knksa),1),1);		$terknksb		[]= number_format($row->knksb/number_format(SQRT($knksb),1),1);
			$terknbsa		[]= number_format($row->knbsa/number_format(SQRT($knbsa),1),1);		$terknbsb		[]= number_format($row->knbsb/number_format(SQRT($knbsb),1),1);
			$terknsesa		[]= number_format($row->knsesa/number_format(SQRT($knsesa),1),1);	$terknsesb		[]= number_format($row->knsesb/number_format(SQRT($knsesb),1),1);
			$terkngsa		[]= number_format($row->kngsa/number_format(SQRT($kngsa),1),1);		$terkngsb		[]= number_format($row->kngsb/number_format(SQRT($kngsb),1),1);
			$terknesa		[]= number_format($row->knesa/number_format(SQRT($knesa),1),1);		$terknesb		[]= number_format($row->knesb/number_format(SQRT($knesb),1),1);
			$terknsosa		[]= number_format($row->knsosa/number_format(SQRT($knsosa),1),1);	$terknsosb		[]= number_format($row->knsosb/number_format(SQRT($knsosb),1),1);
			$terktq			[]= number_format($row->ktq/number_format(SQRT($ktq),1),1);			$terkhm			[]= number_format($row->khm/number_format(SQRT($khm),1),1);
		}
		//$this->data['id_siswa']=$idsiswamnilai;
		$siswa=$this->msiswa->getsiswa($idsiswamnilai);
		foreach($terknmsa as $row){ 
			$norknmsa	[]= number_format($row * $siswa->knmsa,1);	}
		foreach($terknfsa as $row){ $norknfsa	[]= number_format($row * $siswa->knfsa,1);	}
		foreach($terknksa as $row){ $norknksa	[]= number_format($row * $siswa->knksa,1);	}
		foreach($terknbsa as $row){ $norknbsa	[]= number_format($row * $siswa->knbsa,1);	}
		foreach($terknsesa as $row){ $norknsesa	[]= number_format($row * $siswa->knsesa,1); }
		foreach($terkngsa as $row){ $norkngsa	[]= number_format($row * $siswa->kngsa,1);	}
		foreach($terknesa as $row){ $norknesa	[]= number_format($row * $siswa->knesa,1);	}
		foreach($terknsosa as $row){ $norknsosa	[]= number_format($row * $siswa->knsosa,1); }

		foreach($terknmsb as $row){ $norknmsb	[]= number_format($row * $siswa->knmsb,1);	}
		foreach($terknfsb as $row){ $norknfsb	[]= number_format($row * $siswa->knfsb,1);	}
		foreach($terknksb as $row){ $norknksb	[]= number_format($row * $siswa->knksb,1);	}
		foreach($terknbsb as $row){ $norknbsb	[]= number_format($row * $siswa->knbsb,1);	}
		foreach($terknsesb as $row){ $norknsesb	[]= number_format($row * $siswa->knsesb,1); }
		foreach($terkngsb as $row){ $norkngsb	[]= number_format($row * $siswa->kngsb,1);	}
		foreach($terknesb as $row){ $norknesb	[]= number_format($row * $siswa->knesb,1);	}
		foreach($terknsosb as $row){ $norknsosb	[]= number_format($row * $siswa->knsosb,1); }

		foreach($terktq as $row){ $norktq	[]= number_format($row * $siswa->ktq,1); }
		foreach($terkhm as $row){ $norkhm	[]= number_format($row * $siswa->khm,1); }

		/*foreach($terknmsa as $row){ $norknmsa	[]= $row * $siswa->knmsa;	}
		foreach($terknfsa as $row){ $norknfsa	[]= $row * $siswa->knfsa;	}
		foreach($terknksa as $row){ $norknksa	[]= $row * $siswa->knksa;	}
		foreach($terknbsa as $row){ $norknbsa	[]= $row * $siswa->knbsa;	}
		foreach($terknsesa as $row){ $norknsesa	[]= $row * $siswa->knsesa; }
		foreach($terkngsa as $row){ $norkngsa	[]= $row * $siswa->kngsa;	}
		foreach($terknesa as $row){ $norknesa	[]= $row * $siswa->knesa;	}
		foreach($terknsosa as $row){ $norknsosa	[]= $row * $siswa->knsosa; }

		foreach($terknmsb as $row){ $norknmsb	[]= $row * $siswa->knmsb;	}
		foreach($terknfsb as $row){ $norknfsb	[]= $row * $siswa->knfsb;	}
		foreach($terknksb as $row){ $norknksb	[]= $row * $siswa->knksb;	}
		foreach($terknbsb as $row){ $norknbsb	[]= $row * $siswa->knbsb;	}
		foreach($terknsesb as $row){ $norknsesb	[]= $row * $siswa->knsesb; }
		foreach($terkngsb as $row){ $norkngsb	[]= $row * $siswa->kngsb;	}
		foreach($terknesb as $row){ $norknesb	[]= $row * $siswa->knesb;	}
		foreach($terknsosb as $row){ $norknsosb	[]= $row * $siswa->knsosb; }

		foreach($terktq as $row){ $norktq	[]= $row * $siswa->ktq; }
		foreach($terkhm as $row){ $norkhm	[]= $row * $siswa->khm; }*/

		//max n min

		$knmsamax		= number_format(max($norknmsa),1);		$knmsbmax		= number_format(max($norknmsb),1);
		$knfsamax		= number_format(max($norknfsa),1);		$knfsbmax		= number_format(max($norknfsb),1);
		$knksamax		= number_format(max($norknksa),1);		$knksbmax		= number_format(max($norknksb),1);
		$knbsamax		= number_format(max($norknbsa),1);		$knbsbmax		= number_format(max($norknbsb),1);
		$knsesamax		= number_format(max($norknsesa),1);		$knsesbmax		= number_format(max($norknsesb),1);
		$kngsamax		= number_format(max($norkngsa),1);		$kngsbmax		= number_format(max($norkngsb),1);
		$knesamax		= number_format(max($norknesa),1);		$knesbmax		= number_format(max($norknesb),1);
		$knsosamax		= number_format(max($norknsosa),1);		$knsosbmax		= number_format(max($norknsosb),1);
		$ktqmax			= number_format(max($norktq),1);		$khmmax			= number_format(max($norkhm),1);

		$knmsamin		= number_format(min($norknmsa),1);		$knmsbmin		= number_format(min($norknmsb),1);
		$knfsamin		= number_format(min($norknfsa),1);		$knfsbmin		= number_format(min($norknfsb),1);
		$knksamin		= number_format(min($norknksa),1);		$knksbmin		= number_format(min($norknksb),1);
		$knbsamin		= number_format(min($norknbsa),1);		$knbsbmin		= number_format(min($norknbsb),1);
		$knsesamin		= number_format(min($norknsesa),1);		$knsesbmin		= number_format(min($norknsesb),1);
		$kngsamin		= number_format(min($norkngsa),1);		$kngsbmin		= number_format(min($norkngsb),1);
		$knesamin		= number_format(min($norknesa),1);		$knesbmin		= number_format(min($norknesb),1);
		$knsosamin		= number_format(min($norknsosa),1);		$knsosbmin		= number_format(min($norknsosb),1);
		$ktqmin			= number_format(min($norktq),1);		$khmmin			= number_format(min($norkhm),1);

		/*$knmsamax		= max($norknmsa);		$knmsbmax		= max($norknmsb);
		$knfsamax		= max($norknfsa);		$knfsbmax		= max($norknfsb);
		$knksamax		= max($norknksa);		$knksbmax		= max($norknksb);
		$knbsamax		= max($norknbsa);		$knbsbmax		= max($norknbsb);
		$knsesamax		= max($norknsesa);		$knsesbmax		= max($norknsesb);
		$kngsamax		= max($norkngsa);		$kngsbmax		= max($norkngsb);
		$knesamax		= max($norknesa);		$knesbmax		= max($norknesb);
		$knsosamax		= max($norknsosa);		$knsosbmax		= max($norknsosb);
		$ktqmax			= max($norktq);			$khmmax			= max($norkhm);

		$knmsamin		= min($norknmsa);		$knmsbmin		= min($norknmsb);
		$knfsamin		= min($norknfsa);		$knfsbmin		= min($norknfsb);
		$knksamin		= min($norknksa);		$knksbmin		= min($norknksb);
		$knbsamin		= min($norknbsa);		$knbsbmin		= min($norknbsb);
		$knsesamin		= min($norknsesa);		$knsesbmin		= min($norknsesb);
		$kngsamin		= min($norkngsa);		$kngsbmin		= min($norkngsb);
		$knesamin		= min($norknesa);		$knesbmin		= min($norknesb);
		$knsosamin		= min($norknsosa);		$knsosbmin		= min($norknsosb);
		$ktqmin			= min($norktq);			$khmmin			= min($norkhm);*/

		$jumlah=count($terid_alternatif);
		//D+
		for($i=0;$i<$jumlah;$i++){
			$d_plus[] = SQRT(pow($norknmsa[$i]-$knmsamax,2)+pow($norknfsa[$i]-$knfsamax,2)+pow($norknksa[$i]-$knksamax,2)+pow($norknbsa[$i]-$knbsamax,2)+pow($norknsesa[$i]-$knsesamax,2)+pow($norkngsa[$i]-$kngsamax,2)+pow($norknesa[$i]-$knesamax,2)+pow($norknsosa[$i]-$knsosamax,2)
							+pow($norknmsb[$i]-$knmsbmax,2)+pow($norknfsb[$i]-$knfsbmax,2)+pow($norknksb[$i]-$knksbmax,2)+pow($norknbsb[$i]-$knbsbmax,2)+pow($norknsesb[$i]-$knsesbmax,2)+pow($norkngsb[$i]-$kngsbmax,2)+pow($norknesb[$i]-$knesbmax,2)+pow($norknsosb[$i]-$knsosbmax,2)
							+pow($norktq[$i]-$ktqmax,2)+pow($norkhm[$i]-$khmmax,2));
		}
		//D-
		for($i=0;$i<$jumlah;$i++){
			$d_min[] = SQRT(pow($norknmsa[$i]-$knmsamin,2)+pow($norknfsa[$i]-$knfsamin,2)+pow($norknksa[$i]-$knksamin,2)+pow($norknbsa[$i]-$knbsamin,2)+pow($norknsesa[$i]-$knsesamin,2)+pow($norkngsa[$i]-$kngsamin,2)+pow($norknesa[$i]-$knesamin,2)+pow($norknsosa[$i]-$knsosamin,2)
							+pow($norknmsb[$i]-$knmsbmin,2)+pow($norknfsb[$i]-$knfsbmin,2)+pow($norknksb[$i]-$knksbmin,2)+pow($norknbsb[$i]-$knbsbmin,2)+pow($norknsesb[$i]-$knsesbmin,2)+pow($norkngsb[$i]-$kngsbmin,2)+pow($norknesb[$i]-$knesbmin,2)+pow($norknsosb[$i]-$knsosbmin,2)
							+pow($norktq[$i]-$ktqmin,2)+pow($norkhm[$i]-$khmmin,2));
		}
		//V
		for($i=0;$i<$jumlah;$i++){
			$V_hasil[]	=$d_min[$i]/($d_min[$i]+$d_plus[$i]);
		}

		$nilai_ipa=$V_hasil[0];
		$nilai_ips=$V_hasil[1];
		$nilai_array=array($nilai_ipa,$nilai_ips);
		$get_idnilai=$this->msiswa->getsiswanilai($idsiswamnilai);
		foreach ($get_idnilai->result() as $row) {
			$this->data['id_nilaisiswahasil']=$row->id_nilai;
			$get_idnilaihasil=$this->msiswa->totalhasilsiswa($this->data);
			if($get_idnilaihasil->num_rows()>0){
				for($i=0;$i<$jumlah;$i++){
					$update=$this->db->set('v',$nilai_array[$i])
						->where('id_nilai',$this->data['id_nilaisiswahasil'])
						->where('id_alternatif',$terid_alternatif[$i])
						->update('tb_hasil');
				}
			}else{
				for($i=0;$i<$jumlah;$i++){
					$update=$this->db->set('v',$nilai_array[$i])
						->set('id_nilai',$this->data['id_nilaisiswahasil'])
						->set('id_alternatif',$terid_alternatif[$i])
						->insert('tb_hasil');
				}
			}

		}

		//strat rengking
			$rank=0;	
			//$this->data['id_nilaisiswahasil']=0;
			foreach($get_idnilai->result() as $v_d){
				$this->data['id_nilaisiswahasil'] = $v_d->id_nilai;
				$ini_idnilai=$this->msiswa->getsiswanilaiorder($v_d->id_nilai);
				foreach ($ini_idnilai->result() as $row) {
					$id_alternatif = $row->id_alternatif;
					$rank++;
					$result = array(
						'result' => $rank
					);
					$this->db->where('id_nilai',$this->data['id_nilaisiswahasil'])->where('id_alternatif',$id_alternatif)->update('tb_hasil',$result);
				}
				
			}

			//$nilai_id=$idsiswamnilai;
			$get_idnilai=$this->msiswa->getsiswanilai($idsiswamnilai);
			foreach ($get_idnilai->result() as $row) {
				$this->data['id_nilaisiswahasil'] = $v_d->id_nilai;
				$getvup=$this->msiswa->getvup($this->data);
				foreach($getvup->result() as $row){
					//$id_alternatif=$row->id_alternatif;
					if($row->id_alternatif == $terid_alternatif[0]){
						$data_update=array(
								'jurusan' =>1
							);
					}else{
						$data_update=array(
								'jurusan' =>2
							);
					}
						
						$this->db->where('id_siswa',$idsiswamnilai)->update('tb_siswa',$data_update);
				}
			}
			

		$sesiku=$idsiswamnilai;
		return $sesiku;
    }

    function proses_detail(){
    	$uri_link=$this->uri->segment(3);
    	$idsiswamnilai=$link=$this->zero_hero->decode($uri_link);
    	//strat ternormalisasi
		$this->data['siswaku']=$this->msiswa->tampil_nilai($idsiswamnilai);
		$alternatif=$this->msiswa->getid();
		$this->data['alternatif']=$alternatif;
		$knmsa		= 0;	$knmsb		= 0 ;
		$knfsa		= 0;	$knfsb		= 0 ;
		$knksa		= 0;	$knksb		= 0 ;
		$knbsa		= 0;	$knbsb		= 0 ;
		$knsesa		= 0;	$knsesb		= 0 ;
		$kngsa		= 0;	$kngsb		= 0 ;
		$knesa		= 0	;	$knesb		= 0 ;
		$knsosa		= 0 ;	$knsosb		= 0 ;
		$ktq		= 0 ;	$khm		= 0 ;
		foreach($alternatif->result() as $row){
			$id_alternatif = $row->id_alternatif;
			$knmsa		+= pow($row->knmsa,2);	$knmsb		+= pow($row->knmsb,2);
			$knfsa		+= pow($row->knfsa,2);	$knfsb		+= pow($row->knfsb,2);
			$knksa		+= pow($row->knksa,2);	$knksb		+= pow($row->knksb,2);
			$knbsa		+= pow($row->knbsa,2);	$knbsb		+= pow($row->knbsb,2);
			$knsesa		+= pow($row->knsesa,2);	$knsesb		+= pow($row->knsesb,2);
			$kngsa		+= pow($row->kngsa,2);	$kngsb		+= pow($row->kngsb,2);
			$knesa		+= pow($row->knesa,2);	$knesb		+= pow($row->knesb,2);
			$knsosa		+= pow($row->knsosa,2);	$knsosb		+= pow($row->knsosb,2);
			$ktq		+= pow($row->ktq,2);	$khm		+= pow($row->khm,2);
		}
			$terid_alternatif = array();     
			$terknmsa		= array();     		$terknmsb		= array();     
			$terknfsa		= array();     		$terknfsb		= array();     
			$terknksa		= array();     		$terknksb		= array();     
			$terknbsa		= array();     		$terknbsb		= array();     
			$terknsesa		= array();     		$terknsesb		= array();     
			$terkngsa		= array();     		$terkngsb		= array();     
			$terknesa		= array();     		$terknesb		= array();     
			$terknsosa		= array();     		$terknsosb		= array();     
			$terktq			= array();     		$terkhm		= array();     	
			foreach($alternatif->result() as $row){
			$this->data['terid_alternatif'] []= $row->id_alternatif;
			$this->data['terknmsa']		[]= number_format($row->knmsa/number_format(SQRT($knmsa),1),1);		$this->data['terknmsb']		[]= number_format($row->knmsb/number_format(SQRT($knmsb),1),1);
			$this->data['terknfsa']		[]= number_format($row->knfsa/number_format(SQRT($knfsa),1),1);		$this->data['terknfsb']		[]= number_format($row->knfsb/number_format(SQRT($knfsb),1),1);
			$this->data['terknksa']		[]= number_format($row->knksa/number_format(SQRT($knksa),1),1);		$this->data['terknksb']		[]= number_format($row->knksb/number_format(SQRT($knksb),1),1);
			$this->data['terknbsa']		[]= number_format($row->knbsa/number_format(SQRT($knbsa),1),1);		$this->data['terknbsb']		[]= number_format($row->knbsb/number_format(SQRT($knbsb),1),1);
			$this->data['terknsesa']	[]= number_format($row->knsesa/number_format(SQRT($knsesa),1),1);	$this->data['terknsesb']	[]= number_format($row->knsesb/number_format(SQRT($knsesb),1),1);
			$this->data['terkngsa']		[]= number_format($row->kngsa/number_format(SQRT($kngsa),1),1);		$this->data['terkngsb']		[]= number_format($row->kngsb/number_format(SQRT($kngsb),1),1);
			$this->data['terknesa']		[]= number_format($row->knesa/number_format(SQRT($knesa),1),1);		$this->data['terknesb']		[]= number_format($row->knesb/number_format(SQRT($knesb),1),1);
			$this->data['terknsosa']	[]= number_format($row->knsosa/number_format(SQRT($knsosa),1),1);	$this->data['terknsosb']	[]= number_format($row->knsosb/number_format(SQRT($knsosb),1),1);
			$this->data['terktq']		[]= number_format($row->ktq/number_format(SQRT($ktq),1),1);			$this->data['terkhm']		[]= number_format($row->khm/number_format(SQRT($khm),1),1);
		}
		foreach($alternatif->result() as $row){
			$terid_alternatif []= $row->id_alternatif;
			$terknmsa		[]= number_format($row->knmsa/number_format(SQRT($knmsa),1),1);		$terknmsb		[]= number_format($row->knmsb/number_format(SQRT($knmsb),1),1);
			$terknfsa		[]= number_format($row->knfsa/number_format(SQRT($knfsa),1),1);		$terknfsb		[]= number_format($row->knfsb/number_format(SQRT($knfsb),1),1);
			$terknksa		[]= number_format($row->knksa/number_format(SQRT($knksa),1),1);		$terknksb		[]= number_format($row->knksb/number_format(SQRT($knksb),1),1);
			$terknbsa		[]= number_format($row->knbsa/number_format(SQRT($knbsa),1),1);		$terknbsb		[]= number_format($row->knbsb/number_format(SQRT($knbsb),1),1);
			$terknsesa		[]= number_format($row->knsesa/number_format(SQRT($knsesa),1),1);	$terknsesb		[]= number_format($row->knsesb/number_format(SQRT($knsesb),1),1);
			$terkngsa		[]= number_format($row->kngsa/number_format(SQRT($kngsa),1),1);		$terkngsb		[]= number_format($row->kngsb/number_format(SQRT($kngsb),1),1);
			$terknesa		[]= number_format($row->knesa/number_format(SQRT($knesa),1),1);		$terknesb		[]= number_format($row->knesb/number_format(SQRT($knesb),1),1);
			$terknsosa		[]= number_format($row->knsosa/number_format(SQRT($knsosa),1),1);	$terknsosb		[]= number_format($row->knsosb/number_format(SQRT($knsosb),1),1);
			$terktq			[]= number_format($row->ktq/number_format(SQRT($ktq),1),1);			$terkhm			[]= number_format($row->khm/number_format(SQRT($khm),1),1);
		}
		
		$siswa=$this->msiswa->getsiswa($idsiswamnilai);
		foreach($terknmsa as $row){ $this->data['norknmsa']		[]= number_format($row * $siswa->knmsa,1);	}
		foreach($terknfsa as $row){ $this->data['norknfsa']		[]= number_format($row * $siswa->knfsa,1);	}
		foreach($terknksa as $row){ $this->data['norknksa']		[]= number_format($row * $siswa->knksa,1);	}
		foreach($terknbsa as $row){ $this->data['norknbsa']		[]= number_format($row * $siswa->knbsa,1);	}
		foreach($terknsesa as $row){ $this->data['norknsesa']	[]= number_format($row * $siswa->knsesa,1); }
		foreach($terkngsa as $row){ $this->data['norkngsa']		[]= number_format($row * $siswa->kngsa,1);	}
		foreach($terknesa as $row){ $this->data['norknesa']		[]= number_format($row * $siswa->knesa,1);	}
		foreach($terknsosa as $row){ $this->data['norknsosa']	[]= number_format($row * $siswa->knsosa,1); }

		foreach($terknmsb as $row){ $this->data['norknmsb']		[]= number_format($row * $siswa->knmsb,1);	}
		foreach($terknfsb as $row){ $this->data['norknfsb']		[]= number_format($row * $siswa->knfsb,1);	}
		foreach($terknksb as $row){ $this->data['norknksb']		[]= number_format($row * $siswa->knksb,1);	}
		foreach($terknbsb as $row){ $this->data['norknbsb']		[]= number_format($row * $siswa->knbsb,1);	}
		foreach($terknsesb as $row){ $this->data['norknsesb']	[]= number_format($row * $siswa->knsesb,1); }
		foreach($terkngsb as $row){ $this->data['norkngsb']		[]= number_format($row * $siswa->kngsb,1);	}
		foreach($terknesb as $row){ $this->data['norknesb']		[]= number_format($row * $siswa->knesb,1);	}
		foreach($terknsosb as $row){ $this->data['norknsosb']	[]= number_format($row * $siswa->knsosb,1); }

		foreach($terktq as $row){ $this->data['norktq']	[]= number_format($row * $siswa->ktq,1); }
		foreach($terkhm as $row){ $this->data['norkhm']	[]= number_format($row * $siswa->khm,1); }

		foreach($terknmsa as $row){ $norknmsa	[]= number_format($row * $siswa->knmsa,1);	}
		foreach($terknfsa as $row){ $norknfsa	[]= number_format($row * $siswa->knfsa,1);	}
		foreach($terknksa as $row){ $norknksa	[]= number_format($row * $siswa->knksa,1);	}
		foreach($terknbsa as $row){ $norknbsa	[]= number_format($row * $siswa->knbsa,1);	}
		foreach($terknsesa as $row){ $norknsesa	[]= number_format($row * $siswa->knsesa,1); }
		foreach($terkngsa as $row){ $norkngsa	[]= number_format($row * $siswa->kngsa,1);	}
		foreach($terknesa as $row){ $norknesa	[]= number_format($row * $siswa->knesa,1);	}
		foreach($terknsosa as $row){ $norknsosa	[]= number_format($row * $siswa->knsosa,1); }

		foreach($terknmsb as $row){ $norknmsb	[]= number_format($row * $siswa->knmsb,1);	}
		foreach($terknfsb as $row){ $norknfsb	[]= number_format($row * $siswa->knfsb,1);	}
		foreach($terknksb as $row){ $norknksb	[]= number_format($row * $siswa->knksb,1);	}
		foreach($terknbsb as $row){ $norknbsb	[]= number_format($row * $siswa->knbsb,1);	}
		foreach($terknsesb as $row){ $norknsesb	[]= number_format($row * $siswa->knsesb,1); }
		foreach($terkngsb as $row){ $norkngsb	[]= number_format($row * $siswa->kngsb,1);	}
		foreach($terknesb as $row){ $norknesb	[]= number_format($row * $siswa->knesb,1);	}
		foreach($terknsosb as $row){ $norknsosb	[]= number_format($row * $siswa->knsosb,1); }

		foreach($terktq as $row){ $norktq	[]= number_format($row * $siswa->ktq,1); }
		foreach($terkhm as $row){ $norkhm	[]= number_format($row * $siswa->khm,1); }

		//max n min

		$this->data['knmsamax']		= number_format(max($norknmsa),1);		$this->data['knmsbmax']		= number_format(max($norknmsb),1);
		$this->data['knfsamax']		= number_format(max($norknfsa),1);		$this->data['knfsbmax']		= number_format(max($norknfsb),1);
		$this->data['knksamax']		= number_format(max($norknksa),1);		$this->data['knksbmax']		= number_format(max($norknksb),1);
		$this->data['knbsamax']		= number_format(max($norknbsa),1);		$this->data['knbsbmax']		= number_format(max($norknbsb),1);
		$this->data['knsesamax']	= number_format(max($norknsesa),1);		$this->data['knsesbmax']	= number_format(max($norknsesb),1);
		$this->data['kngsamax']		= number_format(max($norkngsa),1);		$this->data['kngsbmax']		= number_format(max($norkngsb),1);
		$this->data['knesamax']		= number_format(max($norknesa),1);		$this->data['knesbmax']		= number_format(max($norknesb),1);
		$this->data['knsosamax']	= number_format(max($norknsosa),1);		$this->data['knsosbmax']	= number_format(max($norknsosb),1);
		$this->data['ktqmax']		= number_format(max($norktq),1);		$this->data['khmmax']		= number_format(max($norkhm),1);

		$this->data['knmsamin']		= number_format(min($norknmsa),1);		$this->data['knmsbmin']		= number_format(min($norknmsb),1);
		$this->data['knfsamin']		= number_format(min($norknfsa),1);		$this->data['knfsbmin']		= number_format(min($norknfsb),1);
		$this->data['knksamin']		= number_format(min($norknksa),1);		$this->data['knksbmin']		= number_format(min($norknksb),1);
		$this->data['knbsamin']		= number_format(min($norknbsa),1);		$this->data['knbsbmin']		= number_format(min($norknbsb),1);
		$this->data['knsesamin']	= number_format(min($norknsesa),1);		$this->data['knsesbmin']	= number_format(min($norknsesb),1);
		$this->data['kngsamin']		= number_format(min($norkngsa),1);		$this->data['kngsbmin']		= number_format(min($norkngsb),1);
		$this->data['knesamin']		= number_format(min($norknesa),1);		$this->data['knesbmin']		= number_format(min($norknesb),1);
		$this->data['knsosamin']	= number_format(min($norknsosa),1);		$this->data['knsosbmin']	= number_format(min($norknsosb),1);
		$this->data['ktqmin']		= number_format(min($norktq),1);			$this->data['khmmin']		= number_format(min($norkhm),1);

		$knmsamax		= number_format(max($norknmsa),1);		$knmsbmax		= number_format(max($norknmsb),1);
		$knfsamax		= number_format(max($norknfsa),1);		$knfsbmax		= number_format(max($norknfsb),1);
		$knksamax		= number_format(max($norknksa),1);		$knksbmax		= number_format(max($norknksb),1);
		$knbsamax		= number_format(max($norknbsa),1);		$knbsbmax		= number_format(max($norknbsb),1);
		$knsesamax		= number_format(max($norknsesa),1);		$knsesbmax		= number_format(max($norknsesb),1);
		$kngsamax		= number_format(max($norkngsa),1);		$kngsbmax		= number_format(max($norkngsb),1);
		$knesamax		= number_format(max($norknesa),1);		$knesbmax		= number_format(max($norknesb),1);
		$knsosamax		= number_format(max($norknsosa),1);		$knsosbmax		= number_format(max($norknsosb),1);
		$ktqmax			= number_format(max($norktq),1);		$khmmax			= number_format(max($norkhm),1);

		$knmsamin		= number_format(min($norknmsa),1);		$knmsbmin		= number_format(min($norknmsb),1);
		$knfsamin		= number_format(min($norknfsa),1);		$knfsbmin		= number_format(min($norknfsb),1);
		$knksamin		= number_format(min($norknksa),1);		$knksbmin		= number_format(min($norknksb),1);
		$knbsamin		= number_format(min($norknbsa),1);		$knbsbmin		= number_format(min($norknbsb),1);
		$knsesamin		= number_format(min($norknsesa),1);		$knsesbmin		= number_format(min($norknsesb),1);
		$kngsamin		= number_format(min($norkngsa),1);		$kngsbmin		= number_format(min($norkngsb),1);
		$knesamin		= number_format(min($norknesa),1);		$knesbmin		= number_format(min($norknesb),1);
		$knsosamin		= number_format(min($norknsosa),1);		$knsosbmin		= number_format(min($norknsosb),1);
		$ktqmin			= number_format(min($norktq),1);		$khmmin			= number_format(min($norkhm),1);

		$jumlah=count($terid_alternatif);


		for($i=0;$i<$jumlah;$i++){
			$d_plus[] = SQRT(pow($norknmsa[$i]-$knmsamax,2)+pow($norknfsa[$i]-$knfsamax,2)+pow($norknksa[$i]-$knksamax,2)+pow($norknbsa[$i]-$knbsamax,2)+pow($norknsesa[$i]-$knsesamax,2)+pow($norkngsa[$i]-$kngsamax,2)+pow($norknesa[$i]-$knesamax,2)+pow($norknsosa[$i]-$knsosamax,2)
							+pow($norknmsb[$i]-$knmsbmax,2)+pow($norknfsb[$i]-$knfsbmax,2)+pow($norknksb[$i]-$knksbmax,2)+pow($norknbsb[$i]-$knbsbmax,2)+pow($norknsesb[$i]-$knsesbmax,2)+pow($norkngsb[$i]-$kngsbmax,2)+pow($norknesb[$i]-$knesbmax,2)+pow($norknsosb[$i]-$knsosbmax,2)
							+pow($norktq[$i]-$ktqmax,2)+pow($norkhm[$i]-$khmmax,2));
		}
		//D-
		for($i=0;$i<$jumlah;$i++){
			$d_min[] = SQRT(pow($norknmsa[$i]-$knmsamin,2)+pow($norknfsa[$i]-$knfsamin,2)+pow($norknksa[$i]-$knksamin,2)+pow($norknbsa[$i]-$knbsamin,2)+pow($norknsesa[$i]-$knsesamin,2)+pow($norkngsa[$i]-$kngsamin,2)+pow($norknesa[$i]-$knesamin,2)+pow($norknsosa[$i]-$knsosamin,2)
							+pow($norknmsb[$i]-$knmsbmin,2)+pow($norknfsb[$i]-$knfsbmin,2)+pow($norknksb[$i]-$knksbmin,2)+pow($norknbsb[$i]-$knbsbmin,2)+pow($norknsesb[$i]-$knsesbmin,2)+pow($norkngsb[$i]-$kngsbmin,2)+pow($norknesb[$i]-$knesbmin,2)+pow($norknsosb[$i]-$knsosbmin,2)
							+pow($norktq[$i]-$ktqmin,2)+pow($norkhm[$i]-$khmmin,2));
		}
		//V
		for($i=0;$i<$jumlah;$i++){
			$V_hasil[]	=$d_min[$i]/($d_min[$i]+$d_plus[$i]);
		}


		//D+
		for($i=0;$i<$jumlah;$i++){
			$this->data['d_plus'][] = SQRT(pow($norknmsa[$i]-$knmsamax,2)+pow($norknfsa[$i]-$knfsamax,2)+pow($norknksa[$i]-$knksamax,2)+pow($norknbsa[$i]-$knbsamax,2)+pow($norknsesa[$i]-$knsesamax,2)+pow($norkngsa[$i]-$kngsamax,2)+pow($norknesa[$i]-$knesamax,2)+pow($norknsosa[$i]-$knsosamax,2)
							+pow($norknmsb[$i]-$knmsbmax,2)+pow($norknfsb[$i]-$knfsbmax,2)+pow($norknksb[$i]-$knksbmax,2)+pow($norknbsb[$i]-$knbsbmax,2)+pow($norknsesb[$i]-$knsesbmax,2)+pow($norkngsb[$i]-$kngsbmax,2)+pow($norknesb[$i]-$knesbmax,2)+pow($norknsosb[$i]-$knsosbmax,2)
							+pow($norktq[$i]-$ktqmax,2)+pow($norkhm[$i]-$khmmax,2));
		}
		//D-
		for($i=0;$i<$jumlah;$i++){
			$this->data['d_min'][] = SQRT(pow($norknmsa[$i]-$knmsamin,2)+pow($norknfsa[$i]-$knfsamin,2)+pow($norknksa[$i]-$knksamin,2)+pow($norknbsa[$i]-$knbsamin,2)+pow($norknsesa[$i]-$knsesamin,2)+pow($norkngsa[$i]-$kngsamin,2)+pow($norknesa[$i]-$knesamin,2)+pow($norknsosa[$i]-$knsosamin,2)
							+pow($norknmsb[$i]-$knmsbmin,2)+pow($norknfsb[$i]-$knfsbmin,2)+pow($norknksb[$i]-$knksbmin,2)+pow($norknbsb[$i]-$knbsbmin,2)+pow($norknsesb[$i]-$knsesbmin,2)+pow($norkngsb[$i]-$kngsbmin,2)+pow($norknesb[$i]-$knesbmin,2)+pow($norknsosb[$i]-$knsosbmin,2)
							+pow($norktq[$i]-$ktqmin,2)+pow($norkhm[$i]-$khmmin,2));
		}
		//V
		for($i=0;$i<$jumlah;$i++){
			$this->data['V_hasil'][]	=$d_min[$i]/($d_min[$i]+$d_plus[$i]);
		}



		$nilai_ipa=$V_hasil[0];
		$nilai_ips=$V_hasil[1];
		$nilai_array=array($nilai_ipa,$nilai_ips);
		//$nilai_v=array('v'=>$V_hasil[]);
		//$this->data['idalternatifipa']=$terid_alternatif[0];
		//$this->data['idalternatifips']=$terid_alternatif[1];
		//$nilai_id=$idsiswamnilai;
		$get_idnilai=$this->msiswa->getsiswanilai($idsiswamnilai);
		foreach ($get_idnilai->result() as $row) {
			$this->data['id_nilaisiswahasil']=$row->id_nilai;
			$get_idnilaihasil=$this->msiswa->totalhasilsiswa($this->data);
			if($get_idnilaihasil->num_rows()>0){
				for($i=0;$i<$jumlah;$i++){
					$update=$this->db->set('v',$nilai_array[$i])
						->where('id_nilai',$this->data['id_nilaisiswahasil'])
						->where('id_alternatif',$terid_alternatif[$i])
						->update('tb_hasil');
				}
			}else{
				for($i=0;$i<$jumlah;$i++){
					$update=$this->db->set('v',$nilai_array[$i])
						->set('id_nilai',$this->data['id_nilaisiswahasil'])
						->set('id_alternatif',$terid_alternatif[$i])
						->insert('tb_hasil');
				}
			}

		}

		//strat rengking
			$rank=0;	
			//$this->data['id_nilaisiswahasil']=0;
			foreach($get_idnilai->result() as $v_d){
				$this->data['id_nilaisiswahasil'] = $v_d->id_nilai;
				$ini_idnilai=$this->msiswa->getsiswanilaiorder($v_d->id_nilai);
				foreach ($ini_idnilai->result() as $row) {
					$id_alternatif = $row->id_alternatif;
					$rank++;
					$result = array(
						'result' => $rank
					);
					$this->db->where('id_nilai',$this->data['id_nilaisiswahasil'])->where('id_alternatif',$id_alternatif)->update('tb_hasil',$result);
				}
				
			}

			//$nilai_id=$idsiswamnilai;
			$get_idnilai=$this->msiswa->getsiswanilai($idsiswamnilai);
			foreach ($get_idnilai->result() as $row) {
				$this->data['id_nilaisiswahasil'] = $v_d->id_nilai;
				$getvup=$this->msiswa->getvup($this->data);
				foreach($getvup->result() as $row){
					//$id_alternatif=$row->id_alternatif;
					if($row->id_alternatif == $terid_alternatif[0]){
						$data_update=array(
								'jurusan' =>1
							);
					}else{
						$data_update=array(
								'jurusan' =>2
							);
					}
						
						$this->db->where('id_siswa',$idsiswamnilai)->update('tb_siswa',$data_update);
				}
			}
			

		$sesiku=$idsiswamnilai;
		$msg=$this->load->view('siswa/template_siswa/tm_detail',$this->data);
		//return $sesiku;
    }

}