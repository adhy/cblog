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
                                <button type="button" class="btn btn-sm btn-primary" onclick=javascript:add_modalsiswa()><i class="fa fa-plus fa-fw"></i> Tambah</button>
                                <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo site_url('cetak'); ?>"><i class="fa fa-print fa-fw"></i> Cetak</a>
                            </p>
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="tabelsiswa" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Nama Siswa</th>
                                            <th>Jurursan</th>
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
        <div class="modal fade" id="addsiswamodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
                    </div>
                    <form id="form_addsis" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NIS</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" name="nis" autofocus="" autocomplete="off" placeholder="NIS">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Siswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" name="nmsis" autofocus="" autocomplete="off" placeholder="Nama Siswa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6 date">
                                    <div class="input-group input-append date" id="datePicker">
                                        <input type="text" class="form-control" name="date" />
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Wali Siswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" name="walisis" autofocus="" autocomplete="off" placeholder="Wali Siswa">
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="form_addsis">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
<div class="modal fade" id="editsiswamodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Ubah Siswa</h4>
                    </div>
                    <div id="editsiswa">
                        <form id="form_editsis"></form>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.add-nilai -->
        <div class="modal fade" id="addnilaisiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Nilai</h4>
                    </div>
                    <div id="tampil"></div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
         <div class="modal fade" id="editnilaisiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Ubah Nilai</h4>
                    </div>
                    <div id="tampiledit"></div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
