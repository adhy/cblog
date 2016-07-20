        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/view-content','View Content'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/view-content/edit-content/'.$viewlink.'','Edit Content'); ?></li>                    
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
											<!-- Categories -->
								<section>
									<form id="edittagcontent" method="post" class="form-horizontal" action="<?php echo site_url('zero/view-content/edit-content/edit-tag-content');?>" enctype="multipart/form-data">
										<fieldset>
                    						<div class="form-group">
													<label class="col-sm-3 control-label">Social Media</label>
													<div class="col-sm-4">
														<select id="selectErrorr" data-rel="chosen" class="form-control" name="tag">
															<option value=""><-- Select Tag --></option>
															<?php
									 						 foreach($tagtable->result() as $row):
															?>																			
															<option value="<?php echo $row->id_tag ;?>"><?php echo $row->name_tag;?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 col-sm-offset-3">
														<button type="submit" class="btn btn-primary" name="edittagcontent" value="Submit">Submit</button>
													</div>
												</div>
										</fieldset>
									</form>
								</section>			
								<table class="table table-striped table-bordered table-hover dt-responsive display" id="view_edittagcontent" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Name Tag</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($viewtagcont->result() as $row){
												echo '<tr><td></td>';
												echo '<td>'.$row->name_tag.'</td><td>';
												$idk=$this->mysetting->encode($row->id_tagcont);
												echo anchor('zero/view-content/edit-content/edit-tag-content/delete-tag-content/'.$idk.'','<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger btn-sm',)).'																				
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