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
                            <?php echo $title; ?>
							<div class="box-icon">
                             <a href="#ss" data-toggle="tooltip"  data-placement="left" title="Add Tabel X" onclick=javascript:add_modal()><i class="fa fa-plus fa-fw"></i></a>
                            </div>
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="tabelx" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>kolom</th>
                                            <th>kolom</th>
                                            <th>kolom</th>
                                            <th>kolom</th>
                                            <th>kolom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-target="#myModal" data-placement="top" title="Tooltip on top"><i class="fa fa-ban"></i></button>                                     
                                            </td>
                                            <td>
                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick=javascript:edit_modal()><i class="fa fa-edit"></i></button>
                                                 <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-target="#myModal" data-placement="top" title="Tooltip on top"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
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
                        <h4 class="modal-title" id="myModalLabel">Modal title Add</h4>
                    </div>
                    <form id="form_add" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Recipient</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" name="nomersatu" autofocus="" autocomplete="off" placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Message:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="message-text" name="nomerdua"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Recipient:</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="input-name" name="nomertiga" multiple/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select submenu</label>
                                <div class="col-sm-6">
                                    <select data-rel="chosen" class="form-control" name="submenu" id="selectErrorr">
                                        <option value="" disabled selected>-- Select a submenu --</option>
                                         <option value="">1</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="form_add">Save changes</button>
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
                        <h4 class="modal-title" id="myModalLabel">Modal title Add</h4>
                    </div>
                    <form id="form_edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Recipient</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control fc" name="nomersatu" autofocus="" autocomplete="off" placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Message:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="message-text" name="nomerdua"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Recipient:</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="input-name" name="nomertiga" multiple/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select submenu</label>
                                <div class="col-sm-6">
                                    <select data-rel="chosen" class="form-control" name="submenu" id="selectErrorr">
                                        <option value="" disabled selected>-- Select a submenu --</option>
                                         <option value="">1</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="form_add">Save changes</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>