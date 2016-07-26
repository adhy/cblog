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
                            <i class="fa fa-user"></i>
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

<form id="contents" method="post" class="form-horizontal formtabs">
    <div class="tab-content">
        <div class="tab-pane active" id="step-1">

         <?php 
         foreach ($edcont->result() as $row){ ?>
            <div class="form-group">
                <label class="col-xs-3 control-label">Title</label>
                <div class="col-xs-5">
                    <?php echo '<input type="text" class="form-control" name="title" value="'.$row->title.'"/>';?>
                    <span>url :</span> <span class="url"></span>
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
                        <?php if($seltags->num_rows()>0){
                                foreach ($seltags->result() as $rows){
                                    foreach($tags->result() as $rowt):?>
                                    <option  value="<?php echo $rowt->id;?>"<?=$rows->id_tag==$rowt->id ? ' selected="selected"' : '';?>><?php echo $rowt->nm_t; ?></option>
                                   <?php endforeach;
                                }
                            }else{
                                foreach($tags->result() as $rowt):                                                                          
                               echo '<option value="'.$rowt->id.'">'.$rowt->nm_t.'</option>';
                           endforeach;
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
                    <?php echo '<input id="fieldID" type="text" value="'.$row->imgheader.'" placeholder="Upload Image ..." class="form-control" name="headimg">';?>
                    <span class="input-group-btn">
                    <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>filemanager/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Meta Description</label>
                <div class="col-xs-5">
                    <?php echo '<textarea class="form-control" name="metad" rows="7">'.$row->meta_content.'</textarea>';?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">content</label>
                <div class="col-xs-8">
                     <?php echo '<textarea class="form-control" name="content" rows="7">'.$row->content.'</textarea>';?>
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