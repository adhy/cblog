<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rtcwb_reset extends MX_Controller {
		public $data = array(
			'title'     => 'CodexList || Reset',
			'header'	=> 'Reset',
			'text'      => 'CL-System',
			'author'    => 'ADW',
		);
	public function __construct(){
        parent::__construct();
		
		$this->load->model('rtcwb_reset/mrtcwb_reset', 'mrtcwb_reset');
    }
	public function index(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->load->view('rtcwb_reset/trt_resetsend', $this->data);
		//if($this->session->userdata('admin')==TRUE){
			//$this->data['css']='../';
			//$this->data['filejs']='admin.js';
			//$view='rtcwb/trt_content';
			//$this->mlib->template_rt($view,$this->data);
		//}else if($this->session->userdata('admin')==FALSE){
		//	redirect('login');
		//}
		}else{
			redirect('mailworm');
		}
	}
	
	public function mail(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			
		$this->form_validation->set_rules('email', '', 'required');
		$msg    = "error";
		$notif	= "";
		if ($this->form_validation->run() == TRUE){
			$this->data['email']    		= $this->db->escape_str($this->input->post('email',TRUE));
			$query=$this->mrtcwb_reset->getemail($this->data);
			if($query->num_rows()>0){
				send_email($this->data['email']);
				 /*$config = array();
   $config['charset'] = 'utf-8';
   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
   $config['protocol']= "smtp";
   $config['mailtype']= "html";
   $config['smtp_host']= "ssl://smtp.gmail.com";
   $config['smtp_port']= "465";
   $config['smtp_timeout']= "5";
   $config['smtp_user']= "emailkamudisini@xxx.com";//isi dengan email kamu
   $config['smtp_pass']= "passwordkamudisini"; // isi dengan password kamu
   $config['crlf']="\r\n"; 
   $config['newline']="\r\n"; 
   
   $config['wordwrap'] = TRUE;
   $this->email->initialize($config);
    $this->email->from($this->input->post('from'));
   $this->email->to($this->input->post('to'));
   $this->email->subject($this->input->post('subject'));
   $this->email->message($this->input->post('isi'));
   if($this->email->send())
   {
    echo "berhasil mengirim email";
   }else
   {
    echo "gagal mengirim email";
   }


   lain


   $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'usercoba',
    'smtp_pass' => 'passcoba',
    'mailtype'  => 'html',
    'charset'   => 'iso-8859-1'
);
 
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
 
$mail = $this->email;
 
$mail->from('your@example.com', 'Your Name');
$mail->to('someone@example.com'); 
$mail->cc('another@another-example.com'); 
$mail->bcc('them@their-example.com'); 
 
$mail->subject('Mail Test');
$mail->message('Testing the mail class.');	
 
$mail->send();
 
echo $mail->print_debugger();*/
				$this->session->set_flashdata('notif','<script>toastr.success("Silahan buka notifikasi pada email");</script>');
			}else{
				$msg    = "error";
			}
		}
		echo json_encode(array("msg"=>$msg));
		}else{
			redirect('mailworm');
		}
	}

	private function send_mail($mail){

	}
	public function process_logout(){
		if(!is_logged_in()){ // if you add in constructor no need write each function in above controller. 
			redirect('mailworm');
        }else{
			$array_items = array('superworm' 	=> FALSE, 
								  'wormood' 	=> '',
								  'wormname' 	=> '');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache,must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma:no-cache');
			redirect('mailworm/login');
		}
	}
}
