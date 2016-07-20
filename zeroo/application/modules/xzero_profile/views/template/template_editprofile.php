      
	   <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
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
                            <?php echo $title; ?> | Update Profil
							<div class="box-icon">
							<a id="tooltip-view" class="minimize" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" title="Minimize"><i class="collapseOne fa fa-chevron-up fa-fw"></i></a>
                        </div>
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
							<!--Page -->
                                	<?php echo $this->session->flashdata('notifprof'); ?>
                               <div class="row">
											
											<div class="col-md-10">
												<section>
												<?php
												$attributes = array('id' => 'editprofil','class'=>'form-horizontal');
												echo form_open_multipart('zero/user-profile/update-profil', $attributes);
												?>
													<!-- <form id="editprofil" method="post" class="form-horizontal" action="<?php echo site_url('zero/user-profile/update-profil');?>" enctype="multipart/form-data"> -->
														<fieldset>
														<?php foreach ($profile->result() as $row){
															$sum_name=$this->mysetting->rsumstr_word_count($row->name);
															$tanda=" ";
															$data=$row->name;
															$uruone=0;
															$sumfirst=1;
															$cutfirst=$this->mysetting->r_implode($tanda,$data,$uruone,$sumfirst);
															$urutwo=1;
															$sumtwo=$sum_name-1;
															$cuttwo=$this->mysetting->r_implode($tanda,$data,$urutwo,$sumtwo);													
															?>
														<div class="form-group">
                        								                       								
                        								<div class="col-sm-5 col-sm-offset-3">
                            								<img src="<?php echo base_url('asset/public/images/'.$row->photo.'');?>" class="img-circle img-responsive" alt="Responsive image" style="width: 140px; height: 140px;">
                        								</div>
                    									</div>
															<div class="form-group">
                        								<label class="col-sm-4 control-label">Full name</label>
                        								<div class="col-sm-3">
                            								<input type="text" class="form-control fc" name="firstname" value="<?php echo $cutfirst;?>" autofocus autocomplete="off" placeholder="First name" />
                        								</div>
                        								<div class="col-sm-5">
                            								<input type="text" class="form-control fc" name="lastname" value="<?php echo $cuttwo;?>" autofocus autocomplete="off" placeholder="Last name" />
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Date</label>
                        								<div class="col-sm-5 date">
																	<div class="input-group input-append date" id="datePicker">
																		<?php $the_date = date('m/d/Y', strtotime($row->birthday)); ?>
																		<input type="text" class="form-control" name="birthday" value="<?php echo $the_date;?>" autofocus autocomplete="off">
																		<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							 										</div>
                        								</div>
                    										</div>
                    										<div class="form-group">
																	<label class="col-sm-4 control-label">Country</label>
																	<div class="col-sm-6">
																		<select id="selectErrorr" data-rel="chosen" class="form-control" name="country">
																			<option value="">-- Select a Country --</option>
																			<?php $to_country=$this->mysetting->country_code_to_country;
									 												 foreach($to_country as $code => $name):
																				?>																			
																			<option value="<?php echo $code?>" <?=$row->country ==$code ? ' selected="selected"' : '';?>><?php echo $name;?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
                    										<div class="form-group">
																	<label class="col-sm-4 control-label">Phone</label>
                        								<div class="col-sm-5">
                            								<input type="text" class="form-control fc" name="phone" value="<?php echo $row->phone;?>" autofocus autocomplete="off" placeholder="Phone" />
                        								</div>
																</div>
																<div class="form-group">
                        									<label class="col-sm-4 control-label">Image file with max size</label>
                        									<div class="col-sm-7">
																		<label class="input-file">
                            										<input type="file"  id="fileInput" name="userfile" multiple/>
                            										<!-- //<?php echo form_upload('userfile[]','','multiple');?>//$the_date = date('m/d/Y', strtotime($row->birthday)); ?> -->
																		<div style="clear:both"></div>
																		<label>
                       											 </div>
                    											</div>
                    										<div class="form-group">
																	<label class="col-sm-4 control-label">Social Media</label>																	
                        								<div class="col-sm-5">
                        									<?php foreach($icon->result() as $rowicon) {
                        										$code="-square fa-2x";
                        										$newcode="";
                        										$data=$rowicon->icon;
                        										$change=$this->mysetting->r_str_replace($code,$newcode,$data);																			                        										
                        										?>
                            								<a class="btn btn-social-icon btn-<?php echo $rowicon->name_sosmed; ?>"><?php echo $change; ?></a>
                            								<?php } ?>
                            								<a href="<?php echo site_url('zero/user-profile/setting-social-media');?>" id="tooltip-view" data-toggle="tooltip" data-placement="bottom" title="Setting Social Media"><i class="fa fa-wrench fa-fw"></i></a>
                        								</div>
																</div>
																<div class="form-group">
							  										<label class="col-sm-4 control-label">Description</label>
							  										<div class="col-sm-8">
																		<textarea class="form-control cleditor" id="isi_content textarea2" rows="3" name="descriptionn"><?php echo $row->description;?></textarea>
							  										</div>
																</div>
															<div class="form-group">
																<div class="col-sm-3 col-sm-offset-3">
																	<button type="submit" class="btn btn-primary" name="editprofil" value="Submit">Submit</button>
																</div>
															</div>
														<?php
												 		}
														?>
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
                
<!-- change Password -->     

					 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default content">
                        <div class="panel-heading">
						<i class="fa fa-user"></i>
							<span class="break"></span>
                            <?php echo $title; ?> | Change Password
							<div class="box-icon">
							<a id="tooltip-view" class="minimize" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapseOne" title="Minimize"><i class="collapseOne fa fa-chevron-up fa-fw"></i></a>
                        </div>
                        </div>
						   
                        <div id="collapsetwo" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
							<!--Page -->
                                <?php echo $this->session->flashdata('notifpass'); ?>	
                              <!--  <div class="row"> -->
											
											<div class="col-md-10">
												<section>
													<form id="editpassword" method="post" class="form-horizontal" action="<?php echo site_url('zero/user-profile/update-password');?>" enctype="multipart/form-data">
														<fieldset>
                    										<div class="form-group">
																	<label class="col-sm-4 control-label">Password</label>
                        								<div class="col-sm-7">
                            								<input type="password" class="form-control fc" name="password" autofocus autocomplete="off"/>
                        								</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">New Password</label>
                        								<div class="col-sm-7">
                            								<input type="password" class="form-control fc" name="newpassword" autofocus autocomplete="off"/>
                        								</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-4 control-label">Confirm Password</label>
                        								<div class="col-sm-7">
                            								<input type="password" class="form-control fc" name="confirmpassword" autofocus autocomplete="off"/>
                        								</div>
																</div>
															<div class="form-group">
																<div class="col-sm-3 col-sm-offset-3">
																	<button type="submit" class="btn btn-primary" name="editpassword" value="Submit">Submit</button>
																</div>
															</div>
														</fieldset>												
													</form>
												</section>
											</div>
										<!-- </div> -->
                      <!--End Page -->          
                             </div>
                        </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>           
           <!-- END change Password -->  
                
               
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->