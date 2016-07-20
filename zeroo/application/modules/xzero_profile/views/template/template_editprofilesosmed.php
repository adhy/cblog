        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/user-profile','User Profil'); ?></li>                    
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
									<form id="editprofilsos" method="post" class="form-horizontal" action="<?php echo site_url('zero/user-profile/setting-social-media');?>" enctype="multipart/form-data">
										<fieldset>
											<div class="form-group">
                        				<label class="col-sm-3 control-label">URL</label>
                        				<div class="col-sm-4">
                            				<input type="url" class="form-control fc" name="url_sos" autofocus autocomplete="off" placeholder="http://" />
                        				</div>
                    					</div>
                    						<div class="form-group">
													<label class="col-sm-3 control-label">Social Media</label>
													<div class="col-sm-4">
														<select id="selectErrorr" data-rel="chosen" class="form-control" name="sosmed">
															<option value="">-- Select a Social Media --</option>
															<?php
									 						 foreach($sosmed->result() as $row):
															?>																			
															<option value="<?php echo $row->id_sosmed ;?>"><?php echo $row->name_sosmed;?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 col-sm-offset-3">
														<button type="submit" class="btn btn-primary" name="editprofilsos" value="Submit">Submit</button>
													</div>
												</div>
										</fieldset>
									</form>
								</section>			
								<table class="table table-striped table-bordered table-hover dt-responsive display" id="view_profilesos" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Icon</th>
											<th>Url</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($icon->result() as $row){
												$code="-square fa-2x";
                        				$newcode="";
                        				$data=$row->icon;
                        				$change=$this->mysetting->r_str_replace($code,$newcode,$data);	
												echo '<tr><td></td>';
												echo '<td><a class="btn btn-social-icon btn-'.$row->name_sosmed.'">'.$change.'</a></td>';
												echo '<td>'.$row->url.'</td>';
												$idk=$this->mysetting->encode($row->id_usesos);
												if($row->active>0){
													echo '<td>'.anchor('zero/user-profile/setting-social-media/change-view/'.$idk.'','<i class="fa fa-ban"></i>', array('class' => 'btn btn-danger btn-sm')).' ';
												}else{
													echo '<td>'.anchor('zero/user-profile/setting-social-media/change-view/'.$idk.'','<i class="fa fa-check-circle-o"></i>', array('class' => 'btn btn-success btn-sm')).' ';													
												}	
												echo anchor('zero/user-profile/setting-social-media/delete-view/'.$idk.'','<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger btn-sm',)).'																				
												</td></tr>';											
												
										}
										?>
									</tbody>
								</table>
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