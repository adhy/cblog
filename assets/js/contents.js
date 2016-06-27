var table;
$(document).ready(function() {
    table = $('#tablecontents').DataTable( {
        "searching": true,
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
      table.ajax.reload(null,false); //reload datatable ajax
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
    /*tinymce.init({
        selector: '[name="content"]',
        skin: 'lightgray',
        max_height: 500,
        max_width: 500,
        min_height: 100,
        min_width: 400,
theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#contents').formValidation('revalidateField', 'content');
            });
        }
    });*/
  tinymce.init({
    selector: '[name="content"]',
        skin: 'lightgray',
        max_height: 800,
        min_height: 600,
        theme: 'modern',
        relative_urls : false,
        remove_script_host: false,
    plugins: [
         'advlist autolink link image lists charmap print preview hr anchor pagebreak',
         'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
         'table contextmenu directionality emoticons paste textcolor responsivefilemanager code'
   ],
   toolbar1: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect',
   toolbar2: '| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ',
   image_advtab: true ,
   
   external_filemanager_path:url+'/filemanager/',
   filemanager_title:'Responsive Filemanager' ,
   external_plugins: { 'filemanager' : url+'/filemanager/plugin.min.js'},
   setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#contents').formValidation('revalidateField', 'content');
            });
        }
 });
/*tinymce.init({
        selector: '#isinya',
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#contents').formValidation('revalidateField', 'content');
            });
        }
    });*/

    $('#contents')
        
        .find('[name="tags"]').chosen({width: '100%',no_results_text: "Oops, nothing found!"})
        .change(function(e) {
                $('#contents').formValidation('revalidateField', 'tags');
            })
            .end()
            .find('[name="category"]').chosen({width: '100%',no_results_text: "Oops, nothing found!",allow_single_deselect: true})
            .change(function(e) {
                $('#contents').formValidation('revalidateField', 'category');
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
                title: {
                    validators: {
                        notEmpty: {
                            //message: 'The full name is required'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            //message: 'The company name is required'
                        }
                    }
                },
                tags: {
                    validators: {
                        notEmpty: {
                            //message: 'The address is required'
                        }
                    }
                },
                fieldID: {
                    validators: {
                        notEmpty: {
                            //message: 'The city is required'
                        }
                    }
                },
                metad: {
                    validators: {
                        notEmpty: {
                            //message: 'The city is required'
                        }
                    }
                },
                /*content: {
                    validators: {
                         callback: {
                            message: 'The hobbies must be between 5 and 200 characters long',
                            callback: function(value, validator, $field) {
                                // Get the plain text without HTML
                                var text = tinyMCE.activeEditor.getContent({
                                    format: 'text'
                                });

                                return text.length <= 20000000000000000 && text.length >= 5;
                            }
                        }
                    }
                }*/
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