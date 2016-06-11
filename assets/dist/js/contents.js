var table;
$(document).ready(function() {
    table = $('#tablecontents').DataTable( {
        "searching": false,
        "paging":   true,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "contents/view-tabel",
            "type": "POST"
        },
         responsive: true,
        "language": {"sProcessing":   "Sedang memproses...",
    "sLengthMenu":   "Tampilkan _MENU_ entri",
    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    "sInfoPostFix":  "",
    "sSearch":       "Cari:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "Pertama",
        "sPrevious": "Sebelumnya",
        "sNext":     "Selanjutnya",
        "sLast":     "Terakhir"
    }
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
                $("#editcontents").modal("show").on('shown.bs.modal');
           /* }
        });*/
}
$(document).ready(function() {
    $('#contents')
        .find('[name="colors"]')
            .chosen({
                width: '100%'
            })
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#contents').formValidation('revalidateField', 'colors');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            // Only disabled elements are excluded
            // The invisible elements belonging to inactive tabs must be validated
            excluded: [':disabled'],
            icon: {
                //valid: 'glyphicon glyphicon-ok',
                //invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fullName: {
                    validators: {
                        notEmpty: {
                            //message: 'The full name is required'
                        }
                    }
                },
                company: {
                    validators: {
                        notEmpty: {
                            //message: 'The company name is required'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            //message: 'The address is required'
                        }
                    }
                },
                colors: {
                    validators: {
                        notEmpty: {
                            //message: 'The city is required'
                        }
                    }
                }
            }
        })
        // Called when a field is invalid
        .on('err.field.fv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
                .parent()
                .find('i')
                .removeClass('fa-check')
                .addClass('fa-times');
        })
        // Called when a field is valid
        .on('success.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                            .parent()
                            .find('i')
                            .removeClass('fa-check fa-times');

            // Check if all fields in tab are valid
            var isValidTab = data.fv.isValidContainer($tabPane);
            if (isValidTab !== null) {
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        });
});