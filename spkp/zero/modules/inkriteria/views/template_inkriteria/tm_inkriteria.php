        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('dashboard','Dashboard'); ?></li>             
                    <li class="capitalize"><?php echo anchor('kriteria','Kriteria Group'); ?></li>
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
                            <?php foreach($namekriteria as $view){
                                    $name = $view->nm_kriteria;                                
                                    }
                                echo 'Data '.$title.' '.$name; ?>
							
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            <p><?php foreach($namekriteria as $view){  ?>                                
                                <button type="button" class="btn btn-sm btn-primary" onclick=javascript:add_modalk(<?=$view->id_kriteriagroup?>,'simpan-kriteria')><i class="fa fa-plus fa-fw"></i> Tambah</button>
                            <?php } ?>
                            </p>
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="kriteria" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Action</th>
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Kriteria</h4>
                    </div>
                    <form id="form_add" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bobot</label>
                                <div class="col-sm-6" id="add">
                                    <input class="form-control fc" id="weight" name="weight" readonly="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Kriteria</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" id="nmkriteria" name="nmkriteria" autofocus="" autocomplete="off" placeholder="Nama Kategori">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="save" name="form_add" >Simpan</button>
                    </div>
                    </form>
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
                        <h4 class="modal-title" id="myModalLabel">Edit Kriteria</h4>
                    </div>
                    <form id="form_edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bobot</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="eweight" name="eweight" placeholder="2" readonly="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Kriteria</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" id="enmkriteria" name="enmkriteria" autofocus="" autocomplete="off" placeholder="Nama Kategori">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="form_edit" id="update">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>