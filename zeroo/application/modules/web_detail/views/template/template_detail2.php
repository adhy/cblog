   
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

        <!-- /.row -->
 
        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-xs-12 col-md-8">
            <div class="col-lg-12 full-b">
        <div class="row">
            
                <ol class="breadcrumb">
                    <li><?php echo anchor('home','Home'); ?>  
                    </li>
                    <li class="active">Page</li>
                </ol>
            <hr class="bdc">
            <div class="well sea visible-sm visible-xs">
                    <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">                  
                           <button class="btn btn-default sea" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
        </div>
                <!-- Blog Post -->
                <div id="detail">
               
               
</div>
<form id="postcomment" method="post" class="form-horizontal" action="<?php echo site_url('page'); ?>">
<?php echo $this->session->flashdata('notif'); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="namac" />
                        </div>
                    </div>
							<div class="form-group">
                        <label class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-5">
                            <input type="url" class="form-control" name="websitec" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="emailc" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Komentar</label>
                        <div class="col-sm-8">
                       			<textarea style="max-width: 500px;max-height:200px;" rows="5"class="form-control" name="komentarp"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="bilanganganjil"></label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="captcha" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="agree" value="agree" /> Agree with the terms and conditions
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="postcomment" value="Submit">Submit</button>
                        </div>
                    </div>
                </form>
					</div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            