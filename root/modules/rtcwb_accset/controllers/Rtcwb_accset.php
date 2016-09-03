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
		$view='rtcwb_accset/trt_user';
		$this->mlib->template_rt($view,$this->data);
	}
	function imagelive(){
		$this->data['imgurl']=$this->db->escape_str($this->input->post('val',TRUE));
		$this->data['id']  =  $this->session->userdata('wormood');
		$update=$this->db->set('img',$this->data['imgurl'])->where('id_user',$this->data['id'])->update('cb_profile');
		if($update){
                $msg    = "success";
        	}else{
        		$msg    = "error Update to table content";
        	}
        echo json_encode(array('msg'=>$msg,'text'=>$this->data['imgurl']));
	}
}