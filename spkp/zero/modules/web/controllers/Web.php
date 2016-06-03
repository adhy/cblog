<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Web extends MX_Controller {
	public $data = array(
			'title'     => 'SPK',
			'text'     => 'PLN',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('web/mweb', 'mweb');
    }
	public function index(){
		if($this->session->userdata('petugas')==FALSE){
			redirect('login');
		}else if($this->session->userdata('petugas')==TRUE){
			redirect('dashboard');
		}
	}
	function getprofil(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbpetugas');
			$get_profil=$this->mweb->get_profil($this->data);
			$msg='error';
			foreach ($get_profil->result() as $row) {
            	$hasil=array('pnama'=>$row->nm_user,'pemail'=>$row->email);
				$msg='success';
			}
			$get_usernamep=$this->mweb->get_usernamep($this->data);
			foreach ($get_usernamep->result() as $rowu) {
            	$hasilu=array('uname'=>$rowu->username);
				$msg='success';
			}
			$msg    = array("msg"=>$msg);
			$data   = array_merge($msg,$hasil,$hasilu);
       		echo json_encode($data);
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('dashboard');
		}
	}
	function subeprofil(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbpetugas');
			$this->data['enama']	=	$this->db->escape_str($this->input->post('pnama'));
			$this->data['eemail']	=	$this->db->escape_str($this->input->post('pemail'));
			$this->data['euname']	=	$this->db->escape_str($this->input->post('punama'));
			$data_edit  = array( 'nm_user' => $this->data['enama'],
								'email' => $this->data['eemail']);
			$update = $this->db->where("id_user",$this->data['id_user'])->update('tb_user',$data_edit);
			$data_editu  = array( 'username' => $this->data['euname']);
			$updateu = $this->db->where("id_user",$this->data['id_user'])->update('tb_petugas',$data_editu);
			if($updateu){
                $msg    = "success";
        	}else{
        		$msg    = "error";
        	}
		echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('dashboard');
		}
	}
	function validasipassword(){
		if($this->session->userdata('petugas')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbpetugas');
			$this->data['password']=MD5($this->input->post('passbaru'));
			$data_edit  = array( 'password' => $this->data['password']);
			$updateu = $this->db->where("id_user",$this->data['id_user'])->update('tb_petugas',$data_edit);
			if($updateu){
                $msg    = "success";
        	}else{
        		$msg    = "error";
        	}
		echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('petugas')==FALSE){
			redirect('dashboard');
		}
	}
	//admin
	function getaprofil(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbadmin');
			$get_profil=$this->mweb->get_profil($this->data);
			$msg='error';
			foreach ($get_profil->result() as $row) {
            	$hasil=array('pnama'=>$row->nm_user,'pemail'=>$row->email);
				$msg='success';
			}
			$get_usernamea=$this->mweb->get_usernamea($this->data);
			foreach ($get_usernamea->result() as $rowu) {
            	$hasilu=array('uname'=>$rowu->username);
				$msg='success';
			}
			$msg    = array("msg"=>$msg);
			$data   = array_merge($msg,$hasil,$hasilu);
       		echo json_encode($data);
		}else if($this->session->userdata('admin')==FALSE){
			redirect('dashboard');
		}
	}
	function subeaprofil(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbadmin');
			$this->data['enama']	=	$this->db->escape_str($this->input->post('pnama'));
			$this->data['eemail']	=	$this->db->escape_str($this->input->post('pemail'));
			$this->data['euname']	=	$this->db->escape_str($this->input->post('punama'));
			$data_edit  = array( 'nm_user' => $this->data['enama'],
								'email' => $this->data['eemail']);
			$update = $this->db->where("id_user",$this->data['id_user'])->update('tb_user',$data_edit);
			$data_editu  = array( 'username' => $this->data['euname']);
			$updateu = $this->db->where("id_user",$this->data['id_user'])->update('tb_admin',$data_editu);
			if($updateu){
                $msg    = "success";
        	}else{
        		$msg    = "error";
        	}
		echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('dashboard');
		}
	}
	function validasipassworda(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_user']=$this->session->userdata('numbadmin');
			$this->data['password']=MD5($this->input->post('passbaru'));
			$data_edit  = array( 'password' => $this->data['password']);
			$updateu = $this->db->where("id_user",$this->data['id_user'])->update('tb_admin',$data_edit);
			if($updateu){
                $msg    = "success";
        	}else{
        		$msg    = "error";
        	}
		echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('dashboard');
		}
	}
}