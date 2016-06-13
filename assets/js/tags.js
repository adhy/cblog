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
            "url": url+"assets/js/i18n/English.lang"
        }
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
                $("#edittags").modal("show").on('shown.bs.modal');
           /* }
        });*/
}