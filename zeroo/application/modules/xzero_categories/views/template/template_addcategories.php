        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/view-categories','View Categories'); ?></li>                    
                    <li class="capitalize"><?php echo $title; ?></li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default content">
                        <div class="panel-heading">
						<i class="fa fa-user"></i>
							<span class="break"></span>
                            <?php echo $title; ?>
							<div class="box-icon">
								<a id="tooltip-view" class="minimize" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" title="Minimize"><i class="collapseOne fa fa-chevron-up fa-fw"></i></a>
                        </div>
                        <div class="box-icon">
                        <!-- <a href="<?php echo site_url('zero/add-categories');?>" id="tooltip-view" data-toggle="tooltip" data-placement="bottom" title="Add Categories"><i class="fa fa-plus fa-fw"></i></a> -->								
								<!-- <?php echo anchor('zero/add-categories','<i class="fa fa-plus fa-fw"></i>'); ?>  -->                       
                        </div>
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
							<!--Page -->
                                	
                              
											<?php echo $this->session->flashdata('notif'); ?>
											<!-- Categories -->
								<section>
									<form id="addcategories" method="post" class="form-horizontal" action="<?php echo site_url('zero/view-categories/add-categories');?>" enctype="multipart/form-data">
										<fieldset>
											<div class="form-group">
                        				<label class="col-sm-3 control-label">Categories Name</label>
                        				<div class="col-sm-4">
                            				<input type="text" class="form-control fc" name="name_c" autofocus autocomplete="off" placeholder="Categories Name" />
                        				</div>
                    					</div>
										<div class="form-group">
                        			<label class="col-sm-3 control-label">Column Position</label>
                        			<div class="col-sm-5 controls">
												<label class="radio cek-radio">
													<input type="radio" name="column" value="1" /> Column Left
												</label>
												<div style="clear:both"></div>
												<label class="radio cek-radio">
													<input type="radio" name="column" value="2" /> Column Right
												</label>
												<div style="clear:both"></div>
                        			</div>								
                    			</div>
												<div class="form-group">
													<div class="col-sm-3 col-sm-offset-3">
														<button type="submit" class="btn btn-primary" name="addcategories" value="Submit">Submit</button>
													</div>
												</div>
										</fieldset>
									</form>
								</section>			
								
											<!-- End Categories -->
										
                      <!--End Page -->          
                             </div>
                        </div>
                            <!-- /.row (nested) -->
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