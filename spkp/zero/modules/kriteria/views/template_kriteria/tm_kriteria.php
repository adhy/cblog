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
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="kriteriagroup" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Kriteria</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                     
                                     if($kriteriagroup->num_rows()>0){
                                        foreach ($kriteriagroup->result() as $view) {
                                        $link=$this->zero_hero->encode($view->id_kriteriagroup);                                       
                                         ?>
                                        <tr>
                                            <td width="10%"></td>
                                            <td><?=$view->nm_kriteria?></td>
                                            <td width="20%">
                                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('kriteria/'.$link.''); ?>" ><i class="fa fa-plus fa-fw"></i> Detail</a>
                                                                                              
                                            </td>
                                        </tr>
                                         <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="3">Data masih kosong</td>
                                        </tr>
                                    <?php }
                                         ?>
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