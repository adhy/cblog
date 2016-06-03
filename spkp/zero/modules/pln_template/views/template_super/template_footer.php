    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  r1ver &nbsp;2015 &nbsp;</p>
    </div>
    <!--END FOOTER -->
        <div class="modal fade" id="edit_profil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
                    </div>
                    <form id="fedit_profil" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="punama" name="punama" placeholder="Username"  type="text" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="pnama" name="pnama" placeholder="Nama"  type="text" placeholder="Nama User">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" id="pemail" name="pemail" autofocus="" autocomplete="off" placeholder="Email">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="fedit_profil" id="update">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

                <div class="modal fade" id="edit_passp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
                    </div>
                    <form id="fedit_passp" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password Baru</label>
                                <div class="col-sm-6">
                                    <input class="form-control fc" id="passbaru" name="passbaru" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ulangi Password Baru</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control fc" id="ulpassbaru" name="ulpassbaru" autofocus="" autocomplete="off" >
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="fedit_passp" id="update">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>