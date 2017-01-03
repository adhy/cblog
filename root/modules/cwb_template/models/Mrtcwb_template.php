
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_template extends CI_Model {
    var $parent = '0';
    var $hasil  = '';
	function __constuct(){
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.froco
	}
   
    function is_rand() {
        $this->db->select('*');
        $this->db->order_by('title', 'RANDOM');
        $this->db->limit(9);
        //$this->db->join('cb_profile','cb_profile.id_user=cb_log.id_user');
        //$this->db->where('cb_log.id_level','1');
        return $this->db->get('cb_contents');
    }
    function is_me() {
        $this->db->select('*');
        $this->db->join('cb_profile','cb_profile.id_user=cb_log.id_user');
        $this->db->where('cb_log.id_level','1');
        return $this->db->get('cb_log');
    }
    function is_leaftcat() {
        $this->db->select_sum('cb_contents.status');
        $this->db->select('cb_contents.id_cat,cb_categories.id,cb_categories.nm_c,cb_categories.slg_c');
        $this->db->join('cb_contents','cb_contents.id_cat=cb_categories.id');
        $this->db->where_not_in('cb_categories.id_parent','0');
        $this->db->where('cb_contents.status','1');
        $this->db->group_by("cb_categories.nm_c");
        return $this->db->get('cb_categories');
    }
    function is_leafrec() {
        $this->db->select('*');
        $this->db->where('cb_contents.status','1');
        $this->db->join('cb_tagsrelation','cb_tagsrelation.id_cont=cb_contents.id');
        //$this->db->join('cb_tags','cb_tagsrelation.id_cont=cb_tags.id');
        $this->db->order_by("cb_contents.c_date",'DESC');
        $this->db->group_by("cb_tagsrelation.id");
        $this->db->limit(4);
        return $this->db->get('cb_contents');
    }
    /*function is_buttrec() { //penggunaan tag
        $this->db->select('cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader, cb_tagsrelation.id_cont, GROUP_CONCAT(cb_tagsrelation.id_tag) as idiot');
        $this->db->from('cb_contents');
        $this->db->where('cb_contents.status','1');
        $this->db->join('cb_tagsrelation','cb_tagsrelation.id_cont=cb_contents.id');
        //$this->db->join('cb_tags','cb_tagsrelation.id_cont=cb_tags.id');
        $this->db->order_by("cb_contents.c_date",'DESC');
        $this->db->group_by(" cb_tagsrelation.id_cont, cb_contents.id, cb_contents.title, cb_contents.slug, cb_contents.imgheader");
        $this->db->limit(5);
        return $this->db->get();
    }*/
    function is_buttrec() {
        $this->db->select('*');
        $this->db->join('cb_categories','cb_categories.id=cb_contents.id_cat');
        $this->db->where('cb_contents.status','1');
        $this->db->order_by("cb_contents.c_date",'DESC');
        $this->db->limit(4);
        //$this->db->group_by("cb_tagsrelation.id_cont");
        return $this->db->get('cb_contents');
    }
    function is_leafpop() {
        $this->db->select('*');
        $this->db->where('status','1');
        $this->db->order_by("views",'DESC');
        $this->db->limit(4);
        return $this->db->get('cb_contents');
    }
    function is_navrek($parent=0,$hasil){
        $this->db->where('status','1');
        $this->db->where('id_parent','0');
        $menu = $this->db->get('cb_categories');
        $this->db->where('cb_categories.status','1');
        $this->db->where('cb_categories.id_parent !=','0');
        $this->db->join('cb_contents','cb_categories.id=cb_contents.id_cat');
        $this->db->group_by('cb_categories.id');
        $submenu = $this->db->get('cb_categories');
        

        if(($menu->num_rows())>0){    
            foreach($menu->result() as $h){
                $hasil .='<li class="normal_menu mobile_menu_toggle"><a href="'.site_url('category/'.$h->slg_c).'"><span>'.stripslashes($h->nm_c).'</span></a><ul>';
                foreach ($submenu->result() as $subm) {
                    if($h->id === $subm->id_parent){
                        $viewsubmenu="<li class='normal_menu'><a href='".site_url("category/".$subm->slg_c)."'>".stripslashes($subm->nm_c);
                    }else{
                        $viewsubmenu='';
                    }
                    $hasil .= $viewsubmenu;

                }
                $hasil .= "</ul></li>";
            }               
        }else{
            $hasil='';
        }
        return $hasil;
    }
    function is_tags() {
    // Get current CodeIgniter instance
        $this->db->select_sum('cb_tagsrelation.status');
        $this->db->select('cb_tagsrelation.id_tag,cb_tags.id,cb_tags.nm_t,cb_tags.slg_t');
        $this->db->join('cb_tagsrelation','cb_tagsrelation.id_tag=cb_tags.id');
        $this->db->where('cb_tagsrelation.status','1');
        $this->db->group_by("cb_tags.nm_t");
        return $this->db->get('cb_tags');
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
    function view_table($data=null){
        $template = array(
                            'table_open' => '<table class="table table-striped table-bordered table-hover dt-responsive display" id="'.$data['idt'].'" cellspacing="0" width="100%">'
        );

        $this->table->set_template($template);
        $this->table->set_heading($data['table']);
        return $this->table->generate();
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
		       return $jquery =array("jquery-2.2.4.min.js","jquery-ui.min.js", "bootstrap.min.js","metisMenu.min.js","pace.min.js",
                            			"formValidation.min.js","framework/bootstrap.min.js","language/id_ID.js",
                            			"toastr.min.js","jquery.uniform.min.js","bootstrap-select.min.js","jquery.dataTables.min.js","dataTables.bootstrap.min.js","dataTables.responsive.js","chosen.jquery.min.js","jquery.mousewheel-3.0.6.pack.js","jquery.fancybox.pack.js","jquery.observe_field.js","tinymce/tinymce.min.js","masonry.pkgd.min.js","imagesloaded.pkgd.min.js","prism.js","sb-admin-2.js");
    }
    function css_top(){
		       return $jquery =array("bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                            			"toastr.css","thesu/default/css/uniform.default.min.css","sb-admin-2.css",
                            			"font-awesome.min.css");
    }
    function css_toprot(){
               return $jquery =array("bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                                        "toastr.css","dataTables.bootstrap.css","thesu/default/css/uniform.default.min.css","bootstrap-select.css","dataTables.responsive.css","bootstrap-chosen.css","jquery.fancybox.css","sb-admin-2.css",
                                        "imageload.css","prism.css","font-awesome.min.css");
    }
    function css_toppub(){
               return $jquery =array("style.css", "bootstrap.css","mediaelementplayer.css","animate.min.css",
                                        "magnific-popup.css","icon-fonts.css","toastr.js.map","toastr.min.css");
    }
}