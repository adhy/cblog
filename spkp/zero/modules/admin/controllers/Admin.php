<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MX_Controller {
	public $data = array(
			'title'     => 'Admin',
			'text'     => 'SPK',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();

		$this->load->model('admin/madmin', 'madmin');
    }
	
	public function index(){
		if($this->session->userdata('admin')==FALSE){
			redirect('admin/login');
		}else if($this->session->userdata('admin')==TRUE){
			redirect('admin/dashboard');
		}
	}

	function login(){
		if($this->session->userdata('admin')==FALSE){
			if(!$_POST){
				$this->data['css']='../';
				$view='admin/template_login/tm_login';
				$this->zero_hero->templatelogin($view,$this->data);
			}else{
				$this->form_validation->set_rules('spkuname', '', 'required');
				$this->form_validation->set_rules('spkpass', '', 'required');
				$msg    = "error";
				if ($this->form_validation->run() == TRUE){
	           	 	$this->data['username']    	= $this->db->escape_str($this->input->post('spkuname'));
	           	 	$this->data['password']    	= MD5($this->db->escape_str($this->input->post('spkpass')));
				 	$query=$this->madmin->getusername($this->data);
	            if($query->num_rows()>0){
	            	foreach ($query->result() as $view) {
	            		$sess_data['admin']		=	TRUE;
	            		$sess_data['numbadmin']	=	$view->id_user;
	            		$sess_data['nameadmin']	=	$view->nm_user;
	            		$this->session->set_userdata($sess_data);
	            		$this->session->set_flashdata('notif','<script>toastr.success("Selamat datang '.$view->nm_user.'");</script>');
	            	}
	                $msg    = "success";
	            }
				}else{
					$msg    = "error";
				}
				echo json_encode(array("msg"=>$msg));
			}
			
		}else if($this->session->userdata('admin')==TRUE){
			redirect('dashboard');
		}
	}
	function dashboard(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['css']='../';
			$this->data['filejs']='admin.js';
			$view='dashboard/template_dashboard/tm_dashboarda';
			$this->zero_hero->template_super($view,$this->data);
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function user(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['css']='../';
			$this->data['filejs']='admin.js';
			$view='admin/template_admin/tm_adminuser';
			$this->zero_hero->template_super($view,$this->data);
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function nomerpetugas(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_userpetugas'] = $this->input->post("nomer");
        	$sess_data['id_userpetugas']	=	$this->data['id_userpetugas'];
        	$this->session->set_userdata($sess_data);
        	 $msg    = "success";
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function nomereditpetugas(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_usereditpetugas'] = $this->input->post("nomer");
        	$sess_data['id_usereditpetugas']	=	$this->data['id_usereditpetugas'];
        	$this->session->set_userdata($sess_data);
	                $msg    = "success";
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function ajax_list() {
		if($this->session->userdata('admin')==TRUE){
	        $list = $this->madmin->get_datatables();
	        $data = array();
	        $no = $_POST['start']+1;
	        foreach ($list as $person) {
	        	$tampildata=0;
	            if($person->status == 0){
	            	$tampildata='User';
	            }else{
	            	$tampildata='Petugas';
	            }
	            if($person->status == 0){
	            	$link_menu='<li><a href="#" onclick=javascript:add_petugas('.$person->id_user.') ><span class="fa fa-plus fa-fw" aria-hidden="true"></span> Ubah User</a></li>';
	            }else if($person->status == 2){
	            	$link_menu='<li><a href="#" onclick=javascript:ganti_username('.$person->id_user.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Petugas</a></li>	';
	            }
	            $row = array();
	            $row[] = $no++;
	            $row[] = $person->nm_user;
	            $row[] = $person->email;
	            $row[] = $tampildata;
	 
	            //add html for action
	            $row[] = '<div class="btn-group">
	                <button type="button" class="btn btn-sm btn-primary">Option</button>
	                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <span class="caret"></span>&nbsp;
	                  <span class="sr-only">Toggle Dropdown</span>
	                </button>
	                <ul class="dropdown-menu dropdown-menu-right">
	                  <li><a href="#" onclick=javascript:edit_modaluser('.$person->id_user.') ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit User</a></li>
	                  '.$link_menu.'
	                  <li><a href="#" onclick=javascript:del_user('.$person->id_user.',"hapus-user")><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete User</a></li>
	                </ul>
	              </div>  ';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->madmin->count_all(),
	                        "recordsFiltered" => $this->madmin->count_filtered(),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
	    }else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
    }
    function addpetugas(){
		if($this->session->userdata('admin')==TRUE){
			$this->form_validation->set_rules('username', '', 'required');
			$this->form_validation->set_rules('password', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['username']	=	$this->db->escape_str($this->input->post('username'));
				$this->data['password']	=	MD5($this->db->escape_str($this->input->post('password')));
				$data_add  = array( 
									'id_user' => $this->session->userdata('id_userpetugas'),
									'username' => $this->data['username'],
									'password' => $this->data['password'],
									'status' => 1);
				$insert = $this->db->insert('tb_petugas',$data_add);
				$data_edit  = array( 'status' => 2);
				$update = $this->db->where("id_user",$this->session->userdata('id_userpetugas'))->update('tb_user',$data_edit);
				if($data_edit){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
    function addtable(){
		if($this->session->userdata('admin')==TRUE){
			$this->form_validation->set_rules('nm_user', '', 'required');
			$this->form_validation->set_rules('email_user', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['nm_user']	=	$this->db->escape_str($this->input->post('nm_user'));
				$this->data['email_user']	=	$this->db->escape_str($this->input->post('email_user'));
				$data_add  = array( 
									'nm_user' => $this->data['nm_user'],
									'email' => $this->data['email_user'],
									'status' => 0);
				$insert = $this->db->insert('tb_user',$data_add);
				if($insert){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function getdata(){
        $this->data['id_user'] = $this->input->post("nomer");
        $sess_data['id_user']	=	$this->data['id_user'];
        $this->session->set_userdata($sess_data);
        $cek   = $this->madmin->getdataid($this->data);
        $msg    = "error";
        if($cek->num_rows()>0){
            $msg    = "success";
            foreach ($cek->result() as $view) {
            	$hasil=array('nm_user'=>$view->nm_user,'email'=>$view->email);
            }
        }
        $msg    = array("msg"=>$msg);
        $data   = array_merge($msg,$hasil);
        echo json_encode($data);
    }
    function editpetugas(){
		if($this->session->userdata('admin')==TRUE){
			$this->form_validation->set_rules('username', '', 'required');
			$this->form_validation->set_rules('password', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['username']	=	$this->db->escape_str($this->input->post('username'));
				$this->data['password']	=	$this->db->escape_str($this->input->post('password'));
				$data_edit  = array( 'username' => $this->data['username'],
									'password' => $this->data['password']);
				$update = $this->db->where("id_user",$this->session->userdata('id_usereditpetugas'))->update('tb_petugas',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
    function edittable(){
		if($this->session->userdata('admin')==TRUE){
			$this->form_validation->set_rules('enama', '', 'required');
			$this->form_validation->set_rules('eemail', '', 'required');
			$msg    = "error";
			if ($this->form_validation->run() == TRUE){
				$this->data['enama']	=	$this->db->escape_str($this->input->post('enama'));
				$this->data['eemail']	=	$this->db->escape_str($this->input->post('eemail'));
				$data_edit  = array( 'nm_user' => $this->data['enama'],
									'email' => $this->data['eemail']);
				$update = $this->db->where("id_user",$this->session->userdata('id_user'))->update('tb_user',$data_edit);
				if($update){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			}
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
	function deleteuser(){
		if($this->session->userdata('admin')==TRUE){
			$this->data['id_user']	=	$this->db->escape_str($this->input->post('nomer'));
			$delete=$this->db->where_in('id_user',$this->data['id_user'])->delete('tb_user');
				if($delete){
	                $msg    = "success";
            	}else{
            		$msg    = "error";
            	}
			
            echo json_encode(array("msg"=>$msg));
		}else if($this->session->userdata('admin')==FALSE){
			redirect('login');
		}
	}
}