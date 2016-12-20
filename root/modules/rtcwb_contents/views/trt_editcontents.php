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
 <?php $attributes = array('role'=>'form','id'=>'edcontents','class'=>'form-horizontal formtabs');
 echo form_open('',$attributes);
 ?>
    <div class="tab-content">
        <div class="tab-pane active" id="step-1">

         <?php 
         foreach ($edcont->result() as $row){ ?>
            <div class="form-group">
                <label class="col-xs-3 control-label">Title</label>
                <div class="col-xs-5">
                    <?php echo '<input type="text" class="form-control ipt-prof" name="title" value="'.stripslashes($row->title).'"/>';?>
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
                                    <option  value="<?php echo $rowc->id;?>"<?=$rows->id_cat==$rowc->id ? ' selected="selected"' : '';?>><?php echo stripslashes($rowc->nm_c); ?></option>
                                   <?php endforeach;
                                }
                            }else{
                                foreach($categories->result() as $rowc):                                                                          
                                echo '<option value="'.$rowc->id.'">'.stripslashes($rowc->nm_c).'</option>';
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
                                            echo '<option value="'.$rowt->id.'" selected="selected">'.stripslashes($rowt->nm_t).'</option>';
                                            $i=1;
                                            break;
                                        }
                                    endforeach;
                                    if($i==0){
                                        echo '<option value="'.$rowt->id.'">'.stripslashes($rowt->nm_t).'</option>';
                                    }
                                
                            }else{
                                                                                                      
                               echo '<option value="'.$rowt->id.'">'.stripslashes($rowt->nm_t).'</option>';
                          
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
                    <a href="<?=base_url()?>appex/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default nobor" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>appex/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Meta Description</label>
                <div class="col-xs-5">
                    <?php 
                    $meta = preg_replace('/\v+|\\\r\\\n/', "<br />", $row->meta_content);
                    $meta = stripslashes($meta);
                    echo '<textarea class="form-control ipt-prof" name="metaed" rows="2">'.$meta.'</textarea>';?>
                    <?php //echo ' <input type="text" class="form-control" name="metad" value="'.$row->meta_content.'"/>';?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">content</label>
                <div class="col-xs-8">
                     <?php 
                     $content = preg_replace('/\v+|\\\r\\\n/', "<br />", $row->content);
                     $content = stripslashes($content);
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
<?php echo form_close() ?>

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
