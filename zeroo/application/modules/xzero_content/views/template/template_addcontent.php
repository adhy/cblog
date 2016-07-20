		<div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/view-content','View Content'); ?></li>                    
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
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
							<!--Page -->
                                	<?php echo $this->session->flashdata('notif'); ?>
                               <div class="row">
											
											<div class="col-md-10">
												<section>
												<?php
												$attributes = array('id' => 'addcontent','class'=>'form-horizontal');
												echo form_open_multipart('zero/view-content/add-content', $attributes);
												?>
													<!-- <form id="editprofil" method="post" class="form-horizontal" action="<?php echo site_url('zero/user-profile/update-profil');?>" enctype="multipart/form-data"> -->
														<fieldset>
														<!-- <div class="form-group">
                        								                       								
                        								<div class="col-sm-5 col-sm-offset-3">
                            								<img src="" class="img-circle img-responsive" alt="Responsive image" style="width: 140px; height: 140px;">
                        								</div>
                    									</div> -->
															<div class="form-group">
                        								<label class="col-sm-4 control-label">Judul</label>
                        								<div class="col-sm-5">
                            								<input type="text" class="form-control fc" name="judulc" value="" autofocus autocomplete="off" placeholder="judul" />
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Date</label>
                        								<div class="col-sm-5 date">
															<div class="input-group input-append date" id="datePicker">
																<input type="text" class="form-control" name="datepost" value="" autofocus autocomplete="off">
																<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
															</div>
                        								</div>
                    										</div>
                    										<div class="form-group">
																	<label class="col-sm-4 control-label">Select Categories</label>
																	<div class="col-sm-6">
																		<select data-rel="chosen" class="form-control" name="categories" id="selectErrorr">
																			<option value="">-- Select a Categories --</option>
																			<?php  foreach($categories->result() as $code):	?>																			
																			<option value="<?php echo $code->id_categories;?>"><?php echo $code->name_categories; ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="form-group">
                        									<label class="col-sm-4 control-label">Image file with max size</label>
                        									<div class="col-sm-7">
																		<label class="input-file">
                            										<input type="file"  id="fileInput" name="userfile" multiple/>
                            										<!-- //<?php echo form_upload('userfile[]','','multiple');?>//$the_date = date('m/d/Y', strtotime($row->birthday)); ?> -->
																		<div style="clear:both"></div>
																		</label>
                       											 </div>
                    											</div>
																<div class="form-group">
                        				<label class="col-sm-4 control-label">URL</label>
                        				<div class="col-sm-5">
                            				<input type="url" class="form-control fc" name="url_cont" autofocus autocomplete="off" placeholder="http://" />
                        				</div>
                    					</div>
																<div class="form-group">
                                            <label class="col-sm-4 control-label">Tag</label>
																<div class="col-sm-6">
																
                                            <select multiple class="form-control mul" id="selectErrorr" data-rel="chosen" name="tagcont" disabled="disabled">
                                                <option ></option>
                                                <!-- <option >1</option>
                                                <option >2</option>
                                                <option >3</option>
                                                <option >4</option>
                                                <option >5</option> -->
                                            </select>
                                            
                                        </div>
                                        <a href="#close" id="tooltip-view" data-toggle="tooltip" data-placement="bottom" title="You Must Add content and edit Tag"><i class="fa fa-wrench fa-fw"></i></a>
                                        </div>
																<div class="form-group">
							  										<label class="col-sm-4 control-label">Text Content</label>
							  										<div class="col-sm-8">
																		<textarea class="form-control cleditor" id="isi_content textarea2" rows="3" name="tcontent"></textarea>
							  										</div>
																</div>
															<div class="form-group">
																<div class="col-sm-3 col-sm-offset-3">
																	<button type="submit" class="btn btn-primary" name="addcontent" value="Submit">Submit</button>
																</div>
															</div>
													
														</fieldset>												
													</form>
												</section>
											</div>
										</div>
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