<form id="maddtafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Tag</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="tags[]" autofocus="" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <!-- The tags field template containing an tags field and a Remove button -->
            <div class="form-group hide" id="optionTemplate">
                <div class="col-xs-offset-3 col-xs-5">
                    <input class="form-control" type="hidden" name="tag" autofocus="" disabled="disabled"/>
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
	var tagsv = {
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
					url: 'tags/tagauth',
					type: 'POST'
				}
            }
        },
		bookIndex = 0;
    $('#maddtafo')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                //valid: 'glyphicon glyphicon-ok',
                //invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'tags[]': tagsv
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
                $clone.find('[name="tag"]').attr({name : 'tags[]',type: 'text'}).removeAttr("disabled").end();

            // Add new field
            $('#maddtafo').formValidation('addField','tags[]', tagsv);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $tags = $row.find('[name="tags[]"]');

            // Remove element containing the tags
            

            // Remove field
            $('#maddtafo').formValidation('removeField','tags[]', tagsv);
			$row.remove();
        })

        // Called after adding new field
        .on('added.field.fv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.tagss --> The new field tagss

            if (data.field === 'tags[]') {
                if ($('#maddtafo').find(':visible[name="tags[]"]').length >= MAX_OPTIONS) {
                    $('#maddtafo').find('.addButton').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.fv', function(e, data) {
           if (data.field === 'tags[]') {
                if ($('#maddtafo').find(':visible[name="tags[]"]').length < MAX_OPTIONS) {
                    $('#maddtafo').find('.addButton').removeAttr('disabled');
                }
            }
        })
        .on('success.form.fv', function(e) {
        e.preventDefault();
        // Use Ajax to submit form data
		//var arr = [];
		//var tag = $('[name="tags[]"]').val();
		
        $.ajax({
            type    : "POST",
            url     : 'tags/procadd',
            data    : $('#maddtafo').serialize(),
			//data 	: 	{ tags []: arr.push(tag)
			//	
			//			},
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                     $('#maddta').modal('hide').on('hidden.bs.modal');
                    reload_table();
                    toastr.success('Successfully add a tags '+response.tag+'');
                }else{
                    toastr.error('Error occurred in adding tags, please try again !');
                    //window.lotagion.href = 'dashboard.html';
                }
            }
        });
    });
});

       </script>