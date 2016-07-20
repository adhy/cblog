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
                            <?php echo $title; ?>
							<div class="box-icon">
								<a id="tooltip-view" class="minimize" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" title="Minimize"><i class="collapseOne fa fa-chevron-up fa-fw"></i></a>
                        </div>
                        <div class="box-icon">
                        <a href="<?php echo site_url('zero/view-content/add-content');?>" id="tooltip-view" data-toggle="tooltip" data-placement="bottom" title="Add Categories"><i class="fa fa-plus fa-fw"></i></a>								
								<!-- <?php echo anchor('zero/add-categories','<i class="fa fa-plus fa-fw"></i>'); ?>  -->                       
                        </div>
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
							<!--Page -->
                                	
                              
											<?php echo $this->session->flashdata('notif'); ?>
											<!-- Categories -->
											
								<table class="table table-striped table-bordered table-hover dt-responsive display" id="view_content" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Categories</th>
											<th>Judul</th>
											<th>Date</th>
											<th>Active</th>
											<th>Comment</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($content->result() as $row){
												echo '<tr><td></td>';
												echo '<td>'.$row->name_categories.'</td>';
												echo '<td>'.$row->judul.'</td>';
												echo '<td>'.$row->date.'</td>';
												$idk=$this->mysetting->encode($row->id_content);
												if($row->active>0){
													echo '<td>'.anchor('zero/view-content/change-view/'.$idk.'','<i class="fa fa-ban"></i>', array('class' => 'btn btn-danger btn-sm')).'</td>';
												}else{
													echo '<td>'.anchor('zero/view-content/change-view/'.$idk.'','<i class="fa fa-check-circle-o"></i>', array('class' => 'btn btn-success btn-sm')).'</td>';
												}	
												$idkk=$this->mysetting->encode($row->id_content);
												if($row->act_comment>0){
													echo '<td>'.anchor('zero/view-content/active-comment/'.$idkk.'','<i class="fa fa-ban"></i>', array('class' => 'btn btn-danger btn-sm')).'</td>';
												}else{
													echo '<td>'.anchor('zero/view-content/active-comment/'.$idkk.'','<i class="fa fa-check-circle-o"></i>', array('class' => 'btn btn-success btn-sm')).'</td>';
												}											
												echo '<td>'.anchor('zero/view-content/edit-content/'.$idk.'','<i class="fa fa-edit"></i>', array('class' => 'btn btn-success btn-sm',)).' '.
															anchor('zero/view-content/delete-content/'.$idk.'','<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger btn-sm',)).'																				
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