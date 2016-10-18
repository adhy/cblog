<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <br/>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('mailworm','Home'); ?></li>
                      <li ><?php $lower = strtolower($header); echo anchor('mailworm/'.$lower,$header); ?></li>
                      <li class="active">Add <?=$header?></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div  class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-file-text"></i>
                            <span class="break"></span>
                            Add <?=$header?>
                            <div class="pull-right">
                                <span id="tooltip" class="btn btn-default btn-header" data-toggle="collapse" data-target="#panel" rel="tooltip" title="Hide"><i class="fa fa-chevron-up fa-fw" ></i></span>
                                
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="panel" class="panel-body collapse in">
                            <ul class="nav nav-tabs">
    <li class="active"><a href="#step-1" data-toggle="tab">Step 1 <i class="fa"></i></a></li>
    <li><a href="#step-2" data-toggle="tab">Step 2 <i class="fa"></i></a></li>
</ul>

<?php //echo '<form id="contents" method="post" class="form-horizontal formtabs" action="'.base_url().'mailworm/contents/proc-add">';?>
<form id="contents" method="post" class="form-horizontal formtabs"">
    <div class="tab-content">
        <div class="tab-pane active" id="step-1">
            <div class="form-group">
                <label class="col-xs-3 control-label">Title</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control ipt-prof" name="title" />
                    <span>url :</span> <span class="url"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                    <div class="col-xs-5 chosenContainer">
                        <select class="form-control chosen-select ipt-prof" name="category" data-placeholder="-- Select a Category --">
                            <option></option>
                            <?php foreach($categories->result() as $row):                                                                          
                               echo '<option value="'.$row->id.'">'.$row->nm_c.'</option>';
                           endforeach; ?>
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Tags</label>
                    <div class="col-xs-5 chosenContainer">
                        <select class="form-control chosen-select ipt-prof" name="tags[]" multiple="multiple" data-placeholder="-- Select a tags --">
                            <?php foreach($tags->result() as $row):                                                                          
                               echo '<option value="'.$row->id.'">'.$row->nm_t.'</option>';
                           endforeach; ?>
                        </select>
                    </div>
            </div>
        </div>

        <div class="tab-pane" id="step-2">
            <div class="form-group">
                <label class="col-xs-3 control-label">Image Header</label>
                <div class="col-xs-3">
                <div class="input-group">
                    <input id="fieldID" type="text" value="" placeholder="Upload Image ..." class="form-control ipt-prof" name="headimg">
                    <span class="input-group-btn">
                    <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default ipt-prof" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>filemanager/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Meta Description</label>
                <div class="col-xs-5">
                    <textarea class="form-control ipt-prof" name="metad" rows="7"></textarea>
                    <!--<input type="text" class="form-control" name="metad" />!-->

                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">content</label>
                <div class="col-xs-8">
                     <textarea class="form-control ipt-prof" id="content" name="content" rows="7"></textarea>
                </div>
            </div>


        </div>
    </div>

    <div class="form-group" style="margin-top: 15px;">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
    /*tinymce.init({
        selector: '[name="content"]',
        skin: 'lightgray',
        max_height: 500,
        max_width: 500,
        min_height: 100,
        min_width: 400,
        relative_urls : false,
        remove_script_host: false,
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
        convert_urls:true,
        relative_urls:true,
        remove_script_host: false,
    plugins: [
         'advlist autolink link image lists charmap print preview hr anchor pagebreak',
         'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
         'table contextmenu directionality emoticons paste textcolor responsivefilemanager code'
   ],
   toolbar1: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect',
   toolbar2: '| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ',
   image_advtab: false,
   
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
                selector: 'textarea',
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect',
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#contents').formValidation('revalidateField', 'content');
            });
        }
    });*/

    $('#contents')
        
        .find('[name="tags[]"]').chosen({width: '100%',no_results_text: 'Oops, nothing found!'})
        .change(function(e) {
                $('#contents').formValidation('revalidateField', 'tags[]');
            })
            .end()
            .find('[name="category"]').chosen()
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
            row: {
                valid: 'field-success',
                invalid: 'field-error'
            },
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            //message: 'The full name is required'
                        },
                        remote: {
                        url: 'title-auths',
                        type: 'POST',
                        delay: 3000
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
                'tags[]': {
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
                content: {
                    validators: {
                         /*callback: {
                            message: 'The hobbies must be between 5 and 200 characters long',
                            callback: function(value, validator, $field) {
                                // Get the plain text without HTML
                                var text = tinyMCE.activeEditor.getContent({
                                    format: 'text'
                                });

                                return text.length >= 5;
                            }
                        },*/
                        
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
        })
        .on('success.form.fv', function(e) {
        e.preventDefault();
        tinyMCE.triggerSave();
        $.ajax({
            type    : 'POST',
            url     : 'proc-add',
            data    : $('#contents').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    window.location.href = url+'mailworm/contents.html';
                    //toastr.success('Save '+response.title+' Success ! ');
                }else{
                    toastr.error('Save '+response.title+' Error !');
                }
            }
        });
    });
});
    </script>