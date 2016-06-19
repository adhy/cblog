var table;
$(document).ready(function() {
    table = $('#tablecategories').DataTable( {
        "searching": false,
        "paging":   true,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "categories/view-tabel",
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

        /*{
            "url": url+"assets/js/i18n/English.lang"
        }*/
    } );
 
} );
function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax
}
function edit_modalt(id) {
    /*$('#update').attr('onclick', 'javascript:updatek("'+link+'","'+id+'")');
    
    $('#form_edit').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'ambil-nomer',
            data    : {nomer:id},
            dataType: 'json',
            success : function(response){
                $('#editmodal').find('form')[0].reset();
                if(response.msg == 'success'){            
                    $("#eweight").val(response.weight);
                    $("#enmkriteria").val(response.rangenilai);
                }*/
                $("#editcategories").modal("show").on('shown.bs.modal');
           /* }
        });*/
}
function resetForm(){
    $('#maddcafo').trigger("reset");
    //$("#maddcafo")[0].reset();
    //$('#maddcafo').reset();
}
$('#addca').click(function(){
    resetForm();
    $.ajax({
            type    : "POST",
            url     : 'categories/addform',
            dataType: 'html',
            success : function(response){
                $("#maddca").modal("show").on('shown.bs.modal');
                $('#tampil').html(response);
            }
        });
});
function edit_modalt(id){
    //$('#update').attr('onclick', 'proch("'+id+'")');
    $('#meditca').find('form')[0].reset();
    $('#meditcafo').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'categories/change',
            data    : {change:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $("#enmc").val(response.category);
                }
                $("#meditca").modal("show").on('shown.bs.modal');
            }
        });
}
function over(ot){
        $.ajax({
            type    : "POST",
            url     : 'categories/over',
            data    : {take:ot},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'Enable'){
                    toastr.success(response.msg+' Category '+response.cat+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-success');
                    $('[data-target='+ot+']').html('Enable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-success');
                }else{
                    toastr.error(response.msg+' Category '+response.cat+' !');
                    $('[data-target='+ot+']').attr('class','btn btn-sm btn-danger');
                    $('[data-target='+ot+']').html('Disable');
                    $('[data-target=dr'+ot+']').attr('class','btn btn-sm btn-danger');
                }
            }
        });
}
$(document).ready(function() {
    $('#meditcafo').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                category: {
                validators: {
                    notEmpty: {
                    //message: 'The title is required'
                    },
                    stringLength: {
                                max: 100,
                                //message: 'The option must be less than 100 characters long'
                            },
                    remote: {
                        url: 'categories/catauths',
                        type: 'POST'
                    }
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
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
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});

