        
		<div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('zero/dashboard','Dashboard'); ?></li>                    
                    <li class="capitalize"><?php echo anchor('zero/view-comment','View Comment'); ?></li>                    
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
														//if($replayc==0){
															$attributes = array('id' => 'replaysum','class'=>'form-horizontal');
															echo form_open_multipart('zero/view-comment/read-comment-off/', $attributes);
															echo"<fieldset>";
															foreach ($readc->result() as $row){
																foreach ($judul->result() as $judull){
														?>
														<div class="form-group">
                        								<label class="col-sm-4 control-label">Judul Conttent : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $judull->judul;?></span>
                        								</div>
                    									</div>
                    									<?php } ?>
														<div class="form-group">
                        								<label class="col-sm-4 control-label">Nama User : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $row->name_user;?></span>
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Email User : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $row->email;?></span>
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Website User : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $row->website;?></span>
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Comment User : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $row->comment;?></span>
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Date Comment : </label>
                        								<div class="col-sm-5">
                            								<span><?php echo $row->date;?></span>
                        								</div>
                    									</div>
                    									<div class="form-group">
                        								<label class="col-sm-4 control-label">Active Comment : </label>
                        								<div class="col-sm-5">
                        								<?php if($row->active>0) {
                        									echo "<span>No Active</span>";
                        								}else {
                        									echo "<span>Active</span>";
                        								} }?>
                            								
                        								</div>
                    									</div>
                    									
														<div class="form-group">
							  										<label class="col-sm-4 control-label">Description : </label>
							  										<div class="col-sm-8">
							  										<?php if($replayc == "1"){  ?>
																		<textarea class="form-control cleditor" id="isi_content textarea2" rows="3" name="replay"></textarea>
																		<?php }else{ 
																		foreach ($replayc->result() as $rec){
																		?>
																		<textarea class="form-control cleditor" id="isi_content textarea2" rows="3" name="replay"><?php echo $rec->replay; ?></textarea>
																		<?php } } ?>
																		** delete_r : untuk menghapus komentar
							  										</div>
																</div>
															
														
															
															<div class="form-group">
																<div class="col-sm-3 col-sm-offset-3">
																	<button type="submit" class="btn btn-primary" name="replaysum" value="Submit">Submit</button>
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