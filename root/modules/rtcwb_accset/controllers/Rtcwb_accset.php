<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_accset extends MX_Controller {
	public $data = array(
			'title'     => 'CL-System || User Profile',
			'header'	=> 'User Profile',
			'text'      => 'CL-System',
			'author'    => 'ADW',
			'filejs'	=>	'prset.js',
		);
	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm/login');
        }
		$this->load->model('rtcwb_accset/mrtcwb_accset', 'accset');
    }
	public function index(){
		$this->data['id']  =  $this->session->userdata('wormood');
		$this->data['profile']  =  $this->accset->getpro($this->data);
		$this->data['css_topp']=$this->template->css_toprot();
		$this->data['js_fott']=$this->template->js_fotrot();
		$this->data['js_from']=$this->accset->js_accset();
		$view='rtcwb_accset/trt_user';
		$this->mlib->template_rt($view,$this->data);
	}
	function imagelive(){
		$this->data['imgurl']=$this->db->escape_str($this->input->post('val',TRUE));
		$this->data['id']  =  $this->session->userdata('wormood');
		$input = array(
							'img' => $this->data['imgurl'],
							'u_date' =>  date('Y-m-d H:i:s',now())
						);
		$update=$this->db->where('id_user',$this->data['id'])->update('cb_profile',$input);
		if($update){
                $msg    = "success";
        	}else{
        		$msg    = "error Update to table content";
        	}
        echo json_encode(array('msg'=>$msg,'text'=>$this->data['imgurl']));
	}
	function get_profil(){
		$this->data['mynm']=$this->db->escape_str($this->input->post('mynm',TRUE));
		$this->data['mophon']=$this->db->escape_str($this->input->post('mophon',TRUE));
		$this->data['email']=$this->db->escape_str($this->input->post('email',TRUE));
		$this->data['adde']=$this->db->escape_str($this->input->post('adde',TRUE));
		$this->data['desc']=$this->db->escape_str($this->input->post('desc',TRUE));
		$this->data['id']  =  $this->session->userdata('wormood');
		$input = array(
							'nm_user' => $this->data['mynm'],
							'mopho'=> $this->data['mophon'],
							'email'=> $this->data['email'],
							'alamat' =>  $this->data['adde'],
							'decript' =>  $this->data['desc'],
							'u_date' =>  date('Y-m-d H:i:s',now())
						);
		$update=$this->db->where('id_user',$this->data['id'])->update('cb_profile',$input);
		if($update){
                $msg    = "success";
                $this->session->set_userdata('wormname', $this->data['mynm']);
        	}else{
        		$msg    = "error Update to table content";
        	}
        echo json_encode(array('msg'=>$msg,'text'=>$this->data['mynm']));
	}
	function get_pass(){
		$this->data['cupass']=MD5($this->db->escape_str($this->input->post('cupass',TRUE)));
		$this->data['nepass']=MD5($this->db->escape_str($this->input->post('nepass',TRUE)));
		$this->data['id']  =  $this->session->userdata('wormood');
		$cek_pass = $this->accset->get_passid($this->data);
		if ($cek_pass->num_rows()>0){
			$input = array(
							'pass_log' => $this->data['nepass'],
							'u_date' =>  date('Y-m-d H:i:s',now())
						);
		$update=$this->db->where('id_user',$this->data['id'])->update('cb_log',$input);
		if($update){
                $msg    = "success";
        	}else{
        		$msg    = "error Update to table content";
        	}
		}else{
			$msg    = "Not Found !";
		}
		
        echo json_encode(array('msg'=>$msg));
	}
}