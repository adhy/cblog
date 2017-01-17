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

    public function templatepublic($view=null,$data=null){
        $zeroview =& get_instance();
        $zeroview->load->view('cwb_template/tsp_ix/tpub_top',$data);
        $zeroview->load->view('cwb_template/tsp_ix/tpub_header',$data);
        $zeroview->load->view($view,$data);
        $zeroview->load->view('cwb_template/tsp_ix/tpub_aside',$data);
        $zeroview->load->view('cwb_template/tsp_ix/tpub_footer',$data);
        
    }
    
    public function templatelogin($view=null,$data=null){
        $zeroview =& get_instance();
        $zeroview->load->view('cwb_template/tsu_lg/trt_top',$data);
        $zeroview->load->view($view,$data);
        $zeroview->load->view('cwb_template/tsu_lg/trt_footer',$data);
        
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
    function socmed(){
        $socmed=array('ico-facebook4'=>'','ico-twitter4'=>'','ico-youtube5'=>'');
        return $socmed;
    }

    public function send_email($pesan=null,$judul=null,$tujuan=null,$psuc=null,$pro=null){
        $sendmail =& get_instance();
        $config = array();
        $config['charset'] = 'iso-8859-1';
        $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "5";
        $config['smtp_user']= "353emperor@gmail.com";//isi dengan email kamu
        $config['smtp_pass']= "%)(%)(katana"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 

        $config['wordwrap'] = TRUE;
//        $sendmail->load->library('email', $config);
        $sendmail->email->initialize($config);
        $sendmail->email->from('1st3rben@mail.ru', '1st34b3n');
        $sendmail->email->to($tujuan);
        $sendmail->email->subject($judul);
        $sendmail->email->message($pesan);
        if($sendmail->email->send()){
        $msg = $psuc;
        }else{
        $msg = show_error($sendmail->email->print_debugger()); 
        }
        return $msg;
    }
    function image_re(){
        $script='     <script type="text/javascript">
        $(document).ready(function(){ 
        var oldimg = $(\'div.blog_grid_con p img\');
        var newimg = $(\'div.blog_grid_con p img\');
        //var newimgwidth = newimg.clientWidth;
        //var newimgheight = newimg.clientHeight;
        $.each(oldimg, function(index){
            if(index == newimg.length)
                return false;
            $(newimg[index]).replaceWith(\'<div class="feature_inner"><div class="feature_inner_corners"><div class="feature_inner_btns"><a href="#" class="expand_image"><i class="ico-maximize"></i></a><a href="#" class="icon_link"><i class="ico-link3"></i></a></div><a href="\'+$(this).attr(\'src\')+\'" class="feature_inner_ling" data-rel="magnific-popup"><img src="\'+$(this).attr(\'src\')+\'" width="\'+$(this).attr("width")+\'" height="\'+$(this).attr("height")+\'" alt="\'+$(this).attr("alt")+\'"></a></div></div>\');
        });
        var holdimg = $(\'div.post-1 img\');
        var hnewimg = $(\'div.post-1 img\');
        //var hnewimgwidth = hnewimg.clientWidth;
        //var hnewimgheight = hnewimg.clientHeight;
        $.each(holdimg, function(index){
            if(index == hnewimg.length)
                return false;
            $(hnewimg[index]).replaceWith(\'<div class="feature_inner"><div class="feature_inner_corners"><div class="feature_inner_btns"><a href="#" class="expand_image"><i class="ico-maximize"></i></a><a href="#" class="icon_link"><i class="ico-link3"></i></a></div><a href="\'+$(this).attr(\'src\')+\'" class="feature_inner_ling" data-rel="magnific-popup"><img src="\'+$(this).attr(\'src\')+\'" alt="\'+$(this).attr("alt")+\'"></a></div></div>\');
        });

        var oldvideo = $(\'div.blog_grid_con iframe\');
        var newvideo = $(\'div.blog_grid_con iframe\');
        //var newimgwidth = newvideo.clientWidth;
        //var newimgheight = newvideo.clientHeight;
        $.each(oldvideo, function(index){
            if(index == newvideo.length)
                return false;
            $(newvideo[index]).replaceWith(\' <div class="feature_inner"><div class="embed-container"><a href="\'+$(this).attr(\'src\')+\'" data-rel="magnific-popup"></a><iframe width="100%" src="\'+$(this).attr(\'src\')+\'" frameborder="0" allowfullscreen></iframe></div> </div>\');});
        });
        </script>';
        return $script;
    }

}
?>