<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_tags extends CI_Model {
    var $table = 'cb_tags';
    var $column = array('id','nm_t','sl_c',
                        'c_date','u_date','status');
    var $order = array('nm_t' => 'asc');
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
    function gettag($data){
        $this->db->where('nm_t',$data['nm_t']);
        return $this->db->get($this->table);
    }
    function gettagid($data){
        $this->db->where('id',$data['id']);
        return $this->db->get($this->table);
    }
    function gettagedit($data){
        $this->db->where('id',$data['id']);
        $this->db->where('nm_t',$data['nm_t']);
        return $this->db->get($this->table);
    }
    function js_frtags(){
        $js_frtags="
        var table;
$(document).ready(function() {
    table = $('#tabletags').DataTable( {
        'searching': false,
        'paging':   true,
        'ordering': false,
        'info':     false,
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': 'tags/view-tabel',
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
      table.ajax.reload(null,false);
}
function resetForm(){
    $('#maddtafo').trigger('reset');
}
$('#addta').click(function(){
    resetForm();
    $.ajax({
            type    : 'POST',
            url     : 'tags/addform',
            dataType: 'html',
            success : function(response){
                $('#maddta').modal('show').on('shown.bs.modal');
                $('#tampil').html(response);
            }
        });
});
function del_t(idc){
    $.ajax({
            type    : 'POST',
            url     : 'tags/change',
            data    : {change:idc},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $('#h4text').html('<i class=\"fa fa-question-circle\"> Delete '+response.tag+'</i>');
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
            url     : 'tags/prodel',
             data    : {delete:myid},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $('#confdel').modal('hide').on('shown.bs.modal');
                    toastr.success('Tags '+response.tag+' has been deleted !');
                    reload_table();
                }else{
                    toastr.error('An error occured, please try again !');
                }
               
            }
        });
}
function edit_modalt(id){
    $('#meditta').find('form')[0].reset();
    $('#medittafo').formValidation('resetForm', true);
        $.ajax({
            type    : 'POST',
            url     : 'tags/change',
            data    : {change:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $('[name=\"tag\"]').val(response.tag);
                    $('#meditta').modal('show').on('shown.bs.modal');
                }else{
                    toastr.error('Data '+response.msg+' !');
                }
                
            }
        });
}
function over(ot){
        $.ajax({
            type    : 'POST',
            url     : 'tags/over',
            data    : {take:ot},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'Enable'){
                    toastr.success(response.msg+' tag '+response.tag+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-success');
                    $('[data-target='+ot+']').html('Disable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-success');
                }else{
                    toastr.error(response.msg+' tag '+response.tag+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-danger');
                    $('[data-target='+ot+']').html('Enable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-danger');
                }
            }
        });
}
$(document).ready(function() {
    $('#medittafo').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        row: {
                valid: 'field-success',
                invalid: 'field-error'
            },
        locale: 'id_ID',
        fields: {
                tag: {
                validators: {
                    notEmpty: {
                    },
                    stringLength: {
                                max: 100,
                            },
                    remote: {
                        url: 'tags/tagauths',
                        type: 'POST',
                        delay: 3000
                    }
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        $.ajax({
            type    : 'POST',
            url     : 'tags/proch',
            data    : $('#medittafo').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Change Success ! ');
                    reload_table();
                    $('#meditta').modal('hide');
                }else{
                    toastr.error('Change Error !');
                }
            }
        });
    });
});";
return $js_frtags;



    }
        function end_modit($data){
        $enmt=$this->template->fr_input($n='tag',$p='tag',$t='text');
        $attributes = array('role'=>'form','id'=>'medittafo','class'=>'form-horizontal');
        return $end_modit='<div id="meditta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit '.$data['header'].'</h4>
      </div>
      '.form_open('',$attributes).'

                      
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Tag</label>
                <div class="col-xs-5">
                   '.$enmt.'
                </div>
            </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="update" type="submit" class="btn btn-primary">Save changes</button>
      </div>
      '.form_close().' 
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>';
    }
}

