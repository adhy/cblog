<div id="page-wrapper">
            <!--<div class="row">
                <div class="col-lg-12">
                <br/>
                    <ol class="breadcrumb">
                      <li><a href="<?=site_url('mailworm')?>">Home</a></li>
                      <li class="active"><?=$lower = strtolower($header)?></li>
                    </ol>
                </div> -->
                <!-- /.col-lg-12 -->
            <!--</div> -->
            <!-- /.row -->
            <div class="row trcen">
                <div class="col-lg-12">
                    <div  class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-th-list"></i>
                            <span class="break"></span>
                            Table <?=$header?> 
                             <div class="pull-right">
                                <button id="addca" class="btn btn-default btn-header" data-toggle="tooltip" data-placement="top" title="Add Categories !" ><i class="fa fa-plus"></i></button>
                                <span id="tooltip" class="btn btn-default btn-header" data-toggle="collapse" data-target="#panel" rel="tooltip" title="Hide"><i class="fa fa-chevron-up fa-fw" ></i></span>
                                
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div id="panel" class="panel-body collapse in">
                            <div class="dataTable_wrapper">
                           <?php $this->load->library('table');
                           $cell = array('data' => 'Blue', 'width' => '10%');


$this->table->set_heading($cell, 'Color', 'Size');

echo $this->table->generate(); ?>
contoh
                                <table class="table table-striped table-bordered table-hover dt-responsive display" id="tablecategories" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th>Category</th>
                                            <th>Slug</th>
                                            <th >Create</th>
                                            <th >Update</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                   
                                </table>
                            </div>
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




<!-- /.modal -->