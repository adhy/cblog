<form id="maddcafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="categories[]" autofocus="" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <!-- The categories field template containing an categories field and a Remove button -->
            <div class="form-group hide" id="optionTemplate">
                <div class="col-xs-offset-3 col-xs-5">
                    <input id="addall" class="form-control" type="hide" name="categories[]" autofocus=""/>
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                </div>
            </div>


            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form> 
       <script>
           $(document).ready(function() {
    // The maximum number of options
    var MAX_OPTIONS = 5;

    $('#maddcafo')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                //valid: 'glyphicon glyphicon-ok',
                //invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'categories[]': {
                    validators: {
                        notEmpty: {
                            //message: 'The option required and cannot be empty'
                        },
                        stringLength: {
                            max: 100,
                            //message: 'The option must be less than 100 characters long'
                        },
                        remote: {
                            url: 'categories/catauth',
                            type: 'POST'
                        }
                    }
                }
            }
        })

        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#optionTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $categories   = $clone.find('[name="categories[]"]');

            // Add new field
            $('#maddcafo').formValidation('addField', $categories);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $categories = $row.find('[name="categories[]"]');

            // Remove element containing the categories
            $row.remove();

            // Remove field
            $('#maddcafo').formValidation('removeField', $categories);
        })

        // Called after adding new field
        .on('added.field.fv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.categoriess --> The new field categoriess

            if (data.field === 'categories[]') {
                if ($('#maddcafo').find(':visible[name="categories[]"]').length >= MAX_OPTIONS) {
                    $('#maddcafo').find('.addButton').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.fv', function(e, data) {
           if (data.field === 'categories[]') {
                if ($('#maddcafo').find(':visible[name="categories[]"]').length < MAX_OPTIONS) {
                    $('#maddcafo').find('.addButton').removeAttr('disabled');
                }
            }
        })
        .on('success.form.fv', function(e) {
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'categories/procadd',
            data    : $('#maddcafo').serialize(),
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                     $('#maddca').modal('hide').on('hidden.bs.modal');
                    reload_table();
                    toastr.success('Berhasil menambahkan categories : '+response.cat+'');
                }else{
                    toastr.error('Kesalahan pada pengisian data categories !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});

       </script>