        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('admin/dashboard','Dashboard'); ?></li>             
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
                            <?php echo 'Data User '; ?>
							
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            <p>                         
                                <button type="button" class="btn btn-sm btn-primary" onclick=javascript:add_modal()><i class="fa fa-plus fa-fw"></i> Tambah</button>
                            
                            </p>
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="alluser" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Status</th>
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
                        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
                    </div>
                    <form id="form_add" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama User</label>
                                <div class="col-sm-6" id="add">
                                    <input class="form-control fc" id="nm_user" name="nm_user"  type="text" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" id="email_user" name="email_user" autofocus="" autocomplete="off" placeholder="Email">
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
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                    </div>
                    <form id="form_edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama User</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="enama" name="enama" placeholder="Nama User"  type="text" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" id="eemail" name="eemail" autofocus="" autocomplete="off" placeholder="Email">
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

         <div class="modal fade" id="add_petugas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Petugas</h4>
                    </div>
                    <form id="form_addp" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6" id="add">
                                    <input class="form-control fc" id="username" name="username"  type="text" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control fc" id="password" name="password" autofocus="" autocomplete="off" placeholder="Password">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="save" name="form_addp" >Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="editpetugasmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edit Petugas</h4>
                    </div>
                    <form id="form_editpetugas" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="username" name="username" placeholder="Username"  type="text" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control fc" id="password" name="password" autofocus="" autocomplete="off" placeholder="password">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="form_editpetugas" id="update">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>