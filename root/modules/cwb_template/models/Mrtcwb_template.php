<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_template extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.froco
	}
	function fr_input($n=null,$p=null,$t=null,$s=null){
		$data = array(
            'name'          => $n,
            'id'            => $n,
            'class'         => 'form-control '.$s.' ipt-prof',
            'type'          => $t,
            'autocomplate'  => 'off',
            'placeholder'   => $p,
            'autofocus'     => '',
            );
        return form_input($data) ;
	}
    function form_dropdown($n=null,$dp=null){
        $data=array(
            'id' =>$n ,
            'class' => 'form-control chosen-select',
            'data-placeholder'=>$dp );
        $options= array();
        return form_dropdown($n, $options, '', $data);
    }
	function fr_but($n=null,$c=null){
		$data = array(
                'name'          => $n,
                'id'            => $n,
                'class'         => 'btn btn-primary btn-block btn-flat',
                'type'          => 'submit',
                'content'       => $c
        );
        return form_button($data);
	}
    function end_model(){
        return $end_mod='
        <div id="confdel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header delete">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="h4text" class="modal-title"><i class="fa-question-circle">Delete </i></h4>
      </div>
      <div class="modal-body">
        <p id="bootstrap-confirm-dialog-text">Are you sure you want to delete this <?=$header?> ?</p>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left no" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger pull-right yes">Yes</button>
      </div>    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>';
    }
    function end_modadd($data){
        return $end_modadd='<div id="'.$data['add'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add '.$data['header'].'></h4>
      </div>
      <div id="tampil"></div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';
    }
	function js_fot(){
		       return $jquery =array("jquery.min.js", "bootstrap.min.js","metisMenu.min.js","pace.min.js",
                            			"formValidation.min.js","framework/bootstrap.min.js","language/id_ID.js",
                            			"toastr.min.js","jquery.uniform.min.js","sb-admin-2.js");
    }
    function js_fotrot(){
		       return $jquery =array("jquery.min.js","jquery-ui.min.js", "bootstrap.min.js","metisMenu.min.js","pace.min.js",
                            			"formValidation.min.js","framework/bootstrap.min.js","language/id_ID.js",
                            			"toastr.min.js","jquery.uniform.min.js","bootstrap-select.min.js","jquery.dataTables.min.js","dataTables.bootstrap.min.js","dataTables.responsive.js","chosen.jquery.min.js","jquery.mousewheel-3.0.6.pack.js","jquery.fancybox.pack.js","jquery.observe_field.js","tinymce/tinymce.min.js","masonry.pkgd.min.js","imagesloaded.pkgd.min.js","sb-admin-2.js");
    }
    function css_top(){
		       return $jquery =array("bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                            			"toastr.css","thesu/default/css/uniform.default.min.css","sb-admin-2.css",
                            			"font-awesome.min.css");
    }
    function css_toprot(){
               return $jquery =array("bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                                        "toastr.css","dataTables.bootstrap.css","thesu/default/css/uniform.default.min.css","bootstrap-select.css","dataTables.responsive.css","bootstrap-chosen.css","jquery.fancybox.css","sb-admin-2.css",
                                        "font-awesome.min.css");
    }
}