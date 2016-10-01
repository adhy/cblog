<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mlib {
    var $skey     = "^%)#(@$~+}|{'})?<9PBSJAR$#&XAE33"; // you can change it
    
    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
    public function set_permalink($title){
        $karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
        $hapus_karakter_aneh = strtolower(str_replace($karakter,'',$title));
        $link_akhir = strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
        //$link_akhir = $id.'-'.$tambah_strip;
        return $link_akhir;
    }
    public function slugify($text){
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
}
 
    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
    
    public  function encode($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }
    
    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }



    public  function safe_hexc($string) {
        $data = bin2hex($string);
        return $data;
    }
 
    public function safe_hexd($string) {
        $data=hex2bin($string);
        return $data;
    }
    
    public  function enhex($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RC2, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RC2, $this->skey, $text, MCRYPT_MODE_ECB);
        return trim($this->safe_hexc($crypttext)); 
    }
    
    public function dehex($value){
        if(!$value){return false;}
        $crypttext = $this->safe_hexd($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RC2, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RC2, $this->skey, $crypttext, MCRYPT_MODE_ECB);
        return trim($decrypttext);
    }
    
    public function templatelogin($view=null,$data=null){
        $zeroview =& get_instance();
        $zeroview->load->view('pln_template/template_login/template_top',$data);

        $zeroview->load->view($view,$data);

        $zeroview->load->view('pln_template/template_login/template_bottom',$data);
        
    }
    public function template_rt($view=null,$data=null){
        $zeroview =& get_instance();
        $zeroview->load->view('cwb_template/tsu/trt_top',$data);
        $zeroview->load->view('cwb_template/tsu/trt_header',$data);
        $zeroview->load->view('cwb_template/tsu/trt_leaft',$data);
        $zeroview->load->view($view,$data);
        $zeroview->load->view('cwb_template/tsu/trt_footer',$data);
        $zeroview->load->view('cwb_template/tsu/trt_down',$data);
        
    }

    public function template_super($view=null,$data=null){
        $zeroview =& get_instance();
        $zeroview->load->view('pln_template/template_super/template_top',$data);
        $zeroview->load->view('pln_template/template_super/template_navigation',$data);
        $zeroview->load->view($view,$data);
        $zeroview->load->view('pln_template/template_super/template_footer',$data);
        $zeroview->load->view('pln_template/template_super/template_bottom',$data);
        
    }
}
?>