var table;
$(document).ready(function() {
    table = $('#tabletags').DataTable( {
        "searching": false,
        "paging":   true,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "tags/view-tabel",
            "type": "POST"
        },
         responsive: true,
        "language": {
    "sEmptyTable":     "No data available in table",
    "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
    "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
    "sInfoFiltered":   "(filtered from _MAX_ total entries)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ",",
    "sLengthMenu":     "Show _MENU_ entries",
    "sLoadingRecords": "Loading...",
    "sProcessing":     "Processing...",
    "sSearch":         "Search:",
    "sZeroRecords":    "No matching records found",
    "oPaginate": {
        "sFirst":    "First",
        "sLast":     "Last",
        "sNext":     "Next",
        "sPrevious": "Previous"
    },
    "oAria": {
        "sSortAscending":  ": activate to sort column ascending",
        "sSortDescending": ": activate to sort column descending"
    }
}
    } );
 
} );
function reload_table(){
      table.ajax.reload(null,false);
}
function resetForm(){
    $('#maddtafo').trigger("reset");
}
$('#addta').click(function(){
    resetForm();
    $.ajax({
            type    : "POST",
            url     : 'tags/addform',
            dataType: 'html',
            success : function(response){
                $("#maddta").modal("show").on('shown.bs.modal');
                $('#tampil').html(response);
            }
        });
});
function del_t(idc){
    $.ajax({
            type    : "POST",
            url     : 'tags/change',
            data    : {change:idc},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $('#h4text').html('<i class="fa fa-question-circle"> Delete '+response.tag+'</i>');
                    $('div.modal-footer .yes').attr('onclick','prodel("'+idc+'")');
                    $('#confdel').modal('show').on('shown.bs.modal');
                }else{
                    toastr.error('Data '+response.msg+' !');
                }
                
            }
        });
}
function prodel(myid) {
         $.ajax({
            type    : "POST",
            url     : 'tags/prodel',
             data    : {delete:myid},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $("#confdel").modal("hide").on('shown.bs.modal');
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
            type    : "POST",
            url     : 'tags/change',
            data    : {change:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'true'){
                    $("#enmc").val(response.tag);
                    $("#meditta").modal("show").on('shown.bs.modal');
                }else{
                    toastr.error('Data '+response.msg+' !');
                }
                
            }
        });
}
function over(ot){
        $.ajax({
            type    : "POST",
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
            type    : "POST",
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
});

