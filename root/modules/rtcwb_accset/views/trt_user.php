<div id="page-wrapper">
            <!--<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$header?></h1>
                </div>-->
                <!-- /.col-lg-12 -->
           <!-- </div>-->
            <!-- /.row -->
            <div class="row trcen">
                <div class="col-lg-12">
                <?php foreach ($profile->result() as $row){ ?>

                <?php if(file_exists($row->img)){
                        $image = $row->img;
                  }
                      
                      else{
                        $image = "assets/img/gimg_not_available.jpg";
                      }
                      
                      ?>
                    <div class="card hovercard cardb">
                        <div class="card-background">
                            <img class="card-bkimg" alt="" src="<?=base_url($image)?>">
                            <!-- http://lorempixel.com/850/280/people/9/ -->
                        </div>
                        <div class="">

                        </div>
                        <div class="useravatar col-lg-10 col-lg-offset-1">
                        
                            <img id="imgprof" alt="" class="preview-image" style="cursor: pointer;" src="<?=base_url($image)?>">
                            <div class="col-xs-3" style="display: none">
                            <?php $attributes = array('role'=>'form','id'=>'form1','class'=>'form-horizontal');
                         echo form_open('',$attributes);
                         ?>
                                <div class="input-group">
                                <input id="fieldID" type="text" value="" placeholder="Upload Image ..." class="form-control" name="headimg" style="display: none">
                                <span class="input-group-btn">
                                <a id="oncha" style="display: none" href="<?=base_url()?>appex/dialog.php?type=1&field_id=fieldID&relative_url=1" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>
                    <!--<a href="<?=base_url()?>appex/dialog.php?type=1&amp;field_id=backgroundName" class="btn iframe-btn btn-default" type="button"><i class="fa fa-folder-open"></i></a>!-->
                                </span>
                                </div>
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="card-info"> <span class="card-title"><?=ucwords(stripslashes($row->nm_user))?></span> </div>
                    </div>
                    <?php }?>
                    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                        <div class="btn-group btn-prof" role="group">
                            <button type="button" id="stars" class="btn btn-primary btn-prof" href="#tab1" data-toggle="tab"><span class="fa fa-user" aria-hidden="true"></span>
                                <div class="hidden-xs">Profile</div>
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="fa fa-share-alt" aria-hidden="true"></span>
                                <div class="hidden-xs">Social Media</div>
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="following" class="btn btn-default btn-prof" href="#tab3" data-toggle="tab"><span class="fa fa-lock" aria-hidden="true"></span>
                                <div class="hidden-xs">Password</div>
                            </button>
                        </div>
                    </div>

                        <div class="col-xs-12 well btn-prof setpr">
                      <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                         <?php $attributes = array('role'=>'form','id'=>'edprof','class'=>'form-horizontal');
                         echo form_open('',$attributes);
                         ?>
                             <?php foreach ($profile->result() as $row){ ?>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Name</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="text" class="form-control ipt-prof fg-gg" name="mynm" value="'.$row->nm_user.'"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Mobile Phone</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="text" class="form-control ipt-prof fg-gg" name="mophon" value="'.$row->mopho.'"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">E-mail</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="text" class="form-control ipt-prof fg-gg" name="email" value="'.$row->email.'"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Address</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="text" class="form-control ipt-prof fg-gg" name="adde" value="'.$row->alamat.'"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Description</label>
                                <div class="col-xs-5">
                                    <textarea class="form-control ipt-prof" name="desc" rows="5" ><?=$row->decript?></textarea>
                                    <!--<input type="text" class="form-control" name="metad" />!-->

                                </div>
                            </div>
                            <?php }?>
                              <div class="form-group" style="margin-top: 15px;">
                                <div class="col-xs-5 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                          <?php echo form_close(); ?>
                        </div>
                        <div class="tab-pane fade in" id="tab2">
                          <h3>This is tab 2</h3>
                        </div>
                        <div class="tab-pane fade in" id="tab3">
                        <?php $attributes = array('role'=>'form','id'=>'edpassprof','class'=>'form-horizontal');
                         echo form_open('',$attributes);
                         ?>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Current Password</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="password" class="form-control ipt-prof fg-gg" name="cupass" value="" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">New Password</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="password" class="form-control ipt-prof fg-gg" name="nepass" value="" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Confrim Password</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="password" class="form-control ipt-prof fg-gg" name="copass" value="" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"/>';?>
                                </div>                                
                              </div>
                              <div class="form-group" style="margin-top: 15px;">
                                <div class="col-xs-5 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                         <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                
                </div>
            
    
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->