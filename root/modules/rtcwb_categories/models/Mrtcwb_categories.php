<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_categories extends CI_Model {
	var $table = 'cb_categories';
    var $column = array('id','nm_c','sl_c','id_parent',
    					'c_date','u_date','status');
    var $order = array('nm_c' => 'asc');
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
    function getcat($data){
        $this->db->where('nm_c',$data['nm_c']);
        return $this->db->get($this->table);
    }
    function getcatid($data){
        $this->db->where('id',$data['id']);
        return $this->db->get($this->table);
    }
    function getcatidchange($data){
        $this->db->where('id',$data['id']);
        $this->db->where('id_parent',$data['id_parent']);
        return $this->db->get($this->table);
    }
    function getcatidedit($data){
        $this->db->where('id',$data['id']);
        $this->db->where('nm_c',$data['nm_c']);
        return $this->db->get($this->table);
    }
    function getcatidpar(){
        $this->db->where('id_parent','0');
        $this->db->where('status','1');
        return $this->db->get($this->table);
    }
    function getcatidparnoze($data){
        $this->db->where('id',$data['id']);
        $this->db->where('id_parent !=','0');
        return $this->db->get($this->table);
    }
//%%%%
    function js_frcategor(){
        $js_frcategor="

var table;
$(document).ready(function() {
    table = $('#tablecategories').DataTable( {
        'searching': false,
        'paging':   true,
        'ordering': false,
        'info':     false,
        'processing': true,
        'serverSide': true,
        'ajax': {
            'url': 'categories/view-tabel',
            'type': 'POST',

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
 return set_tok(csfrData);
} );
function reload_table(){
      table.ajax.reload(null,false);
}
function resetForm(){
    $('#maddcafo').trigger('reset');
}
$('#addca').click(function(){
    resetForm();
    $.ajax({
            type    : 'POST',
            url     : 'categories/addform',
            dataType: 'html',
            success : function(response){
                $('#maddca').modal('show').on('shown.bs.modal');
                $('#tampil').html(response);
            }
        });
});
function del_t(idc){
    $.ajax({
            type    : 'POST',
            url     : 'categories/change',
            data    : {change:idc},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $('#h4text').html('<i class=\"fa fa-question-circle\"> Delete '+response.category+'</i>');
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
            url     : 'categories/prodel',
             data    : {delete:myid},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $('#confdel').modal('hide').on('shown.bs.modal');
                    toastr.success('Category '+response.cat+' has been deleted !');
                    reload_table();
                }else{
                    toastr.error('An error occured, please try again !');
                }
               
            }
        });
}

function edit_modalt(id){
   // $('#meditca').find('form')[0].reset();
    
    $('#meditcafo').formValidation('resetForm', true);
        $.ajax({
            type    : 'POST',
            url     : 'categories/change',
            data    : {change:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $(\"[name='category']\").val(response.category);
                    $(\"[name='parent']\").append(response.parent).trigger('chosen:updated');

                    $('#meditca').modal('show').on('shown.bs.modal');
                }else{
                    toastr.error('Data '+response.msg+' !');
                }
                $(\"[name='parent']\").chosen({ width: '100%' });
                
            }
        });
}
function over(ot){
        $.ajax({
            type    : 'POST',
            url     : 'categories/over',
            data    : {take:ot},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'Enable'){
                    toastr.success(response.msg+' Category '+response.cat+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-success');
                    $('[data-target='+ot+']').html('Disable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-success');
                }else{
                    toastr.error(response.msg+' Category '+response.cat+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-danger');
                    $('[data-target='+ot+']').html('Enable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-danger');
                }
            }
        });
}
$(document).ready(function() {
    $('#meditcafo')
    .find('[name=\"parent\"]').chosen({ width: '100%' })
            .change(function(e) {
                $('#meditcafo').formValidation('revalidateField', 'parent');
            })
            .end()
    .formValidation({
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
                category: {
                validators: {
                    notEmpty: {
                    },
                    stringLength: {
                                max: 100,
                            },
                    remote: {
                        url: 'categories/catauths',
                        type: 'POST',
                        delay: 3000
                    }
                }
            },
            parent:{

            }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        $.ajax({
            type    : 'POST',
            url     : 'categories/proch',
            data    : $('#meditcafo').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Change Success ! ');
                    reload_table();
                    $('#meditca').modal('hide');
                }else{
                    toastr.error('Change Error !');
                }
            }
        });
    });
});
";

return $js_frcategor;
    }
    function end_modit($data){
        $enmc=$this->template->fr_input($n='category',$p='category',$t='text');
        $parent=$this->template->form_dropdown($n='parent',$dp='-- Select a Parent --');
        $attributes = array('role'=>'form','id'=>'meditcafo','class'=>'form-horizontal');
        return $end_modit='<div id="meditca" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit '.$data['header'].'</h4>
      </div>
      '.form_open('',$attributes).'

                      
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                   '.$enmc.'
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-3 control-label">Parent</label>
                    <div class="col-xs-5 chosenContainer">
                              '.$parent.'
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