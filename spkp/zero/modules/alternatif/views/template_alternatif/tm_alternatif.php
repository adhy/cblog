        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('dashboard','Dashboard'); ?></li>             
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
                            <?php echo 'Data '.$title; ?>
							
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            <p>
                                <a class="btn btn-sm btn-primary" href="#" onclick=javascript:add_modalal()><i class="fa fa-plus fa-fw"></i> Tambah</a>
                            </p>
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="tabelalternatif" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Alternatif</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
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
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Alternatif</h4>
                    </div>
                    <div id="tampil"></div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
         <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Perbaharui Alternatif</h4>
                    </div>
                    <div id="tampiledit"></div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>