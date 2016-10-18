<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_contents extends CI_Model {
	var $table = 'cb_contents';
    var $column = array('id','imgheader',
    					'title','slug','meta_content','content','c_date','u_date','status','creator');
    var $order = array('title' => 'asc');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	private function _get_datatables_query(){
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
 
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        //$this->db->order_by('emmail','asc');
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all(){	
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function getcatid($data){
        $this->db->where('id',$data['id']);
        return $this->db->get($this->table);
    }
    function getcategories($data){    
        $this->db->where('status',$data);
        return $this->db->get('cb_categories');
    } 
    function gettags($data){    
        $this->db->where('status',$data);
        return $this->db->get('cb_tags');
    }
    function getcontent($data){    
        $this->db->where('title',$data['title']);
        return $this->db->get('cb_contents');
    }
    function getcontentedit($data){    
        $this->db->where('id',$data['id']);
        $this->db->where('title',$data['title']);
        return $this->db->get('cb_contents');
    }
    function getidcont($data){
        $this->db->where('slug',$data);
        return $this->db->get('cb_contents');
    }
    function getselecttags($data){
         $this->db->select('cb_tagsrelation.id_tag,cb_tags.id,cb_tags.nm_t');
         $this->db->join('cb_tagsrelation','cb_tagsrelation.id_tag=cb_tags.id');
        $this->db->where('cb_tagsrelation.id_cont',$data['id']);
        return $this->db->get('cb_tags');
    }


    function getselectcategories($data){
        $this->db->where('id_cont',$data['id']);
        return $this->db->get('cb_catrelation');
    }
    function editcontent ($data){
        $this->db->where('id', $data['id']);
        return $this->db->get('cb_contents');
    }
    function js_frcont(){
        $js_frcont="var table;
$(document).ready(function() {
    table = $('#tablecontents').DataTable( {
        'searching': true,
        'paging':   true,
        'ordering': false,
        'info':     false,
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': 'contents/view-tabel',
            'type': 'POST'
        },
         responsive: true,
        'language': {
    'sEmptyTable':     'No data available in table',
    'sInfo':           'Showing _START_ to _END_ of _TOTAL_ entries',
    'sInfoEmpty':      'Showing 0 to 0 of 0 entries',
    'sInfoFiltered':   '(filtered from _MAX_ total entries)',
    'sInfoPostFix':    '',
    'sInfoThousands':  ',',
    'sLengthMenu':     'Show _MENU_ entries',
    'sLoadingRecords': 'Loading...',
    'sProcessing':     'Processing...',
    'sSearch':         'Search:',
    'sZeroRecords':    'No matching records found',
    'oPaginate': {
        'sFirst':    'First',
        'sLast':     'Last',
        'sNext':     'Next',
        'sPrevious': 'Previous'
    },
    'oAria': {
        'sSortAscending':  ': activate to sort column ascending',
        'sSortDescending': ': activate to sort column descending'
    }
}
    } );
 
} );
function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax
}
$('[name=\"title\"]').keyup(function(){
    var isi=$(this).val();
    var akh = isi.toLowerCase().replace(/-+/g, '-').replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
    $('.url').css({'color': 'rgb(255, 0, 0)', 'font-style': 'italic'}).html('.../'+akh+'.html');
});
function slugify(text){
  return text.toString().toLowerCase()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}
jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
      'width'   : 880,
      'height'  : 570,
      'type'    : 'iframe',
      'autoScale'   : false
      });
      
      $('#fieldID').on('change',function(){
          alert('changed');
      });
      
      $('#download-button').on('click', function() {
        ga('send', 'event', 'button', 'click', 'download-buttons');      
      });
      $('.toggle').click(function(){
        var _this=$(this);
        $('#'+_this.data('ref')).toggle(200);
        var i=_this.find('i');
        if (i.hasClass('icon-plus')) {
          i.removeClass('icon-plus');
          i.addClass('icon-minus');
        }else{
          i.removeClass('icon-minus');
          i.addClass('icon-plus');
        }
      });
});
function over(ot){
        $.ajax({
            type    : 'POST',
            url     : 'contents/over',
            data    : {take:ot},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'Enable'){
                    toastr.success(response.msg+' Category '+response.cont+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-success');
                    $('[data-target='+ot+']').html('Disable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-success');
                }else{
                    toastr.error(response.msg+' Category '+response.cont+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-danger');
                    $('[data-target='+ot+']').html('Enable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-danger');
                }
            }
        });
}
function del_t(idc){
    $.ajax({
            type    : 'POST',
            url     : 'contents/change',
            data    : {change:idc},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $('#h4text').html('<i class=\"fa fa-question-circle\"> Delete '+response.content+'</i>');
                     $('div.modal-footer .yes').attr('onclick','prodel(\"'+idc+'\")');
                    $('#confdel').modal('show').on('shown.bs.modal');
                }else{
                    toastr.error('Data '+response.msg+' !');
                }
                
            }
        });
}
function prodel(myid) {
         $.ajax({
            type    : 'POST',
            url     : 'contents/prodel',
             data    : {delete:myid},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $('#confdel').modal('hide').on('shown.bs.modal');
                    toastr.success('Content '+response.cont+' has been deleted !');
                    reload_table();
                }else{
                    toastr.error('An error occured, please try again !');
                }
               
            }
        });
}
function edit_modalt(id) {
    //$('#update').attr('onclick', 'javascript:updatek(\"'+link+'\",\"'+id+'\")');
    
    //$('#form_edit').formValidation('resetForm', true);
        $.ajax({
            type    : 'POST',
            url     : 'contents/change',
            data    : {change:id},
            dataType: 'json',
            success : function(response){
                //$('#editmodal').find('form')[0].reset();
                if(response.msg == 'true'){            
                    window.location.href = url+'mailworm/contents/edit-content.html';
                }else{
                    toastr.error('An error occured, please try again !');
                }
            }
        });
}";
   return $js_frcont; }

}