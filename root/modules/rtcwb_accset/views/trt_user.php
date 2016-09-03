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
                    <div class="card hovercard cardb">
                        <div class="card-background">
                            <img class="card-bkimg" alt="" src="<?=base_url($row->img)?>">
                            <!-- http://lorempixel.com/850/280/people/9/ -->
                        </div>
                        <div class="useravatar">
                            <img alt="" src="<?=base_url($row->img)?>">
                        </div>
                        <div class="card-info"> <span class="card-title"><?=ucwords($row->nm_user)?></span> </div>
                    </div>
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

                        <div class="col-lg-12 well btn-prof setpr">
                      <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <form id="edprof" method="post" class="form-horizontal">
                              <div class="form-group">
                                <label class="col-xs-2 control-label">Name</label>
                                <div class="col-xs-5">
                                    <?php echo '<input type="text" class="form-control ipt-prof fg-gg" name="mynm" value="'.$row->nm_user.'"/>';?>
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
                              <div class="form-group" style="margin-top: 15px;">
                                <div class="col-xs-5 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                          </form>
                        </div>
                        <div class="tab-pane fade in" id="tab2">
                          <h3>This is tab 2</h3>
                        </div>
                        <div class="tab-pane fade in" id="tab3">
                          <form id="edpassprof" method="post" class="form-horizontal">
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
                          </form>
                        </div>
                      </div>
                    </div>
                <?php }?>
                </div>
            
    
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->