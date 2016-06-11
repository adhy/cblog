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
                            <i class="fa fa-user"></i>
                            <span class="break"></span>
                            Add <?=$header?>
                            <div class="pull-right">
                                <span id="tooltip" class="btn btn-default btn-header" data-toggle="collapse" data-target="#panel" rel="tooltip" title="Hide"><i class="fa fa-chevron-up fa-fw" ></i></span>
                                
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="panel" class="panel-body collapse in">
                            <ul class="nav nav-tabs">
    <li class="active"><a href="#info-tab" data-toggle="tab">Information <i class="fa"></i></a></li>
    <li><a href="#address-tab" data-toggle="tab">Address <i class="fa"></i></a></li>
</ul>

<form id="contents" method="post" class="form-horizontal formtabs">
    <div class="tab-content">
        <div class="tab-pane active" id="info-tab">
            <div class="form-group">
                <label class="col-xs-3 control-label">Full name</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="fullName" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Company</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="company" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Job title</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="jobTitle" />
                </div>
            </div>
        </div>

        <div class="tab-pane" id="address-tab">
            <div class="form-group">
                <label class="col-xs-3 control-label">Address</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="address" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">City</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="city" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">Favorite color</label>
                    <div class="col-sm-4 chosenContainer">
                        <select class="form-control chosen-select" name="colors">
                            <option value="" disabled selected>-- Select a menu --</option>
                            <option value="black">Black</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="orange">Orange</option>
                            <option value="red">Red</option>
                            <option value="yellow">Yellow</option>
                            <option value="white">White</option>
                        </select>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top: 15px;">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
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