<form id="maddcafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="option[]" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <!-- The option field template containing an option field and a Remove button -->
            <div class="form-group hide" id="optionTemplate">
                <div class="col-xs-offset-3 col-xs-5">
                    <input class="form-control" type="text" name="option[]" />
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
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                question: {
                    validators: {
                        notEmpty: {
                            message: 'The question required and cannot be empty'
                        }
                    }
                },
                'option[]': {
                    validators: {
                        notEmpty: {
                            message: 'The option required and cannot be empty'
                        },
                        stringLength: {
                            max: 100,
                            message: 'The option must be less than 100 characters long'
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
                $option   = $clone.find('[name="option[]"]');

            // Add new field
            $('#maddcafo').formValidation('addField', $option);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $option = $row.find('[name="option[]"]');

            // Remove element containing the option
            $row.remove();

            // Remove field
            $('#maddcafo').formValidation('removeField', $option);
        })

        // Called after adding new field
        .on('added.field.fv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.options --> The new field options

            if (data.field === 'option[]') {
                if ($('#maddcafo').find(':visible[name="option[]"]').length >= MAX_OPTIONS) {
                    $('#maddcafo').find('.addButton').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.fv', function(e, data) {
           if (data.field === 'option[]') {
                if ($('#maddcafo').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
                    $('#maddcafo').find('.addButton').removeAttr('disabled');
                }
            }
        });
});

       </script>