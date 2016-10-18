<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                <br/>
                    <ol class="breadcrumb">
                      <li><?php echo anchor('mailworm','Home'); ?></li>
                      <li ><?php $lower = strtolower($header); echo anchor('mailworm/'.$lower,$header); ?></li>
                      <li class="active">Edit <?=$header?></li>
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
                            Edit <?=$header?>
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

<form id="edcontents" method="post" class="form-horizontal formtabs">
    <div class="tab-content">
        <div class="tab-pane active" id="step-1">

         <?php 
         foreach ($edcont->result() as $row){ ?>
            <div class="form-group">
                <label class="col-xs-3 control-label">Title</label>
                <div class="col-xs-5">
                    <?php echo '<input type="text" class="form-control ipt-prof" name="title" value="'.$row->title.'"/>';?>
                    <span>url :</span> <span class="url" style="color": rgb(255, 0, 0); font-style: italic;">.../<?=$row->slug?>.html</span>
                </div>
            </div>
           
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                    <div class="col-xs-5 chosenContainer">
                        <select class="form-control chosen-select" name="category" data-placeholder="-- Select a Category --">
                            <option></option>
                            <?php if($selcategories->num_rows()>0){
                                foreach ($selcategories->result() as $rows){
                                    foreach($categories->result() as $rowc):?>
                                    <option  value="<?php echo $rowc->id;?>"<?=$rows->id_c==$rowc->id ? ' selected="selected"' : '';?>><?php echo $rowc->nm_c; ?></option>
                                   <?php endforeach;
                                }
                            }else{
                                foreach($categories->result() as $rowc):                                                                          
                                echo '<option value="'.$rowc->id.'">'.$rowc->nm_c.'</option>';
                                endforeach;
                            }
                             ?>
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Tags</label>
                    <div class="col-xs-5 chosenContainer">
                        <select class="form-control chosen-select" name="tags[]" multiple="multiple" data-placeholder="-- Select a tags --">
                        <?php 
                                    foreach ($tags->result() as $rowt){
                                    $i=0;
                                    if(!empty($seltags)){
                                    foreach($seltags->result() as $rows):
                                        if($rowt->id==$rows->id_tag){
                                            echo '<option value="'.$rowt->id.'" selected="selected">'.$rowt->nm_t.'</option>';
                                            $i=1;
                                            break;
                                        }
                                    endforeach;
                                    if($i==0){
                                        echo '<option value="'.$rowt->id.'">'.$rowt->nm_t.'</option>';
                                    }
                                
                            }else{
                                                                                                      
                               echo '<option value="'.$rowt->id.'">'.$rowt->nm_t.'</option>';
                          
                            }
                        }
                             ?>
                        </select>
                    </div>
            </div>
        </div>

        <div class="tab-pane" id="step-2">
            <div class="form-group">
                <label class="col-xs-3 control-label">Image Header</label>
                <div class="col-xs-3">
                <div class="input-group">
                    <?php echo '<input id="fieldID" type="text" value="'.$row->imgheader.'" placeholder="Upload Image ..." class="form-control ipt-prof" name="headimg">';?>
                    <span class="input-group-btn">
                    <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default nobor" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>filemanager/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Meta Description</label>
                <div class="col-xs-5">
                    <?php 
                    //$order   = array("\r\n", "\n", "\r");
                   //$meta = preg_replace( "/\r|\n/", "", $row->meta_content );
                    $meta = str_replace('\r\n','',$row->meta_content);
                    $meta = str_replace('\\','',$meta);

                    echo '<textarea class="form-control ipt-prof" name="metaed" rows="7">'.$meta.'</textarea>';?>
                    <?php //echo ' <input type="text" class="form-control" name="metad" value="'.$row->meta_content.'"/>';?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">content</label>
                <div class="col-xs-8">
                     <?php 
                     $content = str_replace('\"','"',$row->content);
                     $content = str_replace('\r',' ',$content);
                     $content = str_replace('\n',' ',$content);


                     echo '<textarea class="form-control" name="edcontent" rows="7">'.$content.'</textarea>';?>
                </div>
            </div>


        </div>
    </div>
    <?php } ?>
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
  tinymce.init({
    selector: '[name=\"edcontent\"]',
        skin: 'lightgray',
        max_height: 800,
        min_height: 600,
        theme: 'modern',
        convert_urls:true,
relative_urls:false,
remove_script_host:false,
       //document_base_url:url,
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
                $('#edcontents').formValidation('revalidateField', 'edcontent');
            });
        }
 });

    $('#edcontents')
        
        .find('[name=\"tags[]\"]').chosen({width: '100%',no_results_text: 'Oops, nothing found!'})
        .change(function(e) {
                $('#contents').formValidation('revalidateField', 'tags[]');
            })
            .end()
            .find('[name=\"category\"]').chosen()
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
                        url: 'title-auths-edit',
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
                edcontent: {
                    validators: {
                        
                    }
                }
            }
        })
        .on('err.field.fv', function(e, data) {
            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');
            $('a[href=\"#' + tabId + '\"][data-toggle=\"tab\"]')
                .parent()
                .find('i')
                .removeClass('fa-check')
                .addClass('fa-times');
        })
        .on('success.field.fv', function(e, data) {
            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href=\"#' + tabId + '\"][data-toggle=\"tab\"]')
                            .parent()
                            .find('i')
                            .removeClass('fa-check fa-times');
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
            url     : 'proc-edit',
            data    : $('#edcontents').serialize(),
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