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
 <?php $attributes = array('role'=>'form','id'=>'contents','class'=>'form-horizontal');
 echo form_open('',$attributes);
 ?>
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
                    <a href="<?=base_url()?>appex/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default ipt-prof" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>appex/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                    </span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Meta Description</label>
                <div class="col-xs-5">
                    <textarea class="form-control ipt-prof" name="metad" rows="2"></textarea>
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
    <script type="text/javascript">
        

    </script>