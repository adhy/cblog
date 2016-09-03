<form id="maddcafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control ipt-prof" name="categories[]" autofocus="" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <!-- The categories field template containing an categories field and a Remove button -->
            <div class="form-group hide" id="optionTemplate">
                <div class="col-xs-offset-3 col-xs-5">
                    <input class="form-control ipt-prof" type="hidden" name="catgor" autofocus="" disabled="disabled"/>
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
	var categoriesv = {
            row: '.col-xs-5',   // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    //message: 'The title is required'
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
        },
		bookIndex = 0;
    $('#maddcafo')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                //valid: 'glyphicon glyphicon-ok',
                //invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            row: {
            valid: 'field-success',
            invalid: 'field-error'
        },
            fields: {
                'categories[]': categoriesv
            }
        })

        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#optionTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
                $clone.find('[name="catgor"]').attr({name : 'categories[]',type: 'text'}).removeAttr("disabled").end();

            // Add new field
            $('#maddcafo').formValidation('addField','categories[]', categoriesv);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $categories = $row.find('[name="categories[]"]');

            // Remove element containing the categories
            

            // Remove field
            $('#maddcafo').formValidation('removeField','categories[]', categoriesv);
			$row.remove();
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
		//var arr = [];
		//var cat = $('[name="categories[]"]').val();
		
        $.ajax({
            type    : "POST",
            url     : 'categories/procadd',
            data    : $('#maddcafo').serialize(),
			//data 	: 	{ categories []: arr.push(cat)
			//	
			//			},
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                     $('#maddca').modal('hide').on('hidden.bs.modal');
                    reload_table();
                    toastr.success('Successfully add a category '+response.cat+'');
                }else{
                    toastr.error('Error occurred in adding categories, please try again !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});

       </script>