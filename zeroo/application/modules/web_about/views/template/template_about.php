   
    <!-- Page Content -->
    <div class="container" style="min-height: 525px;">

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
                    <li class="active"><?php echo $title;  ?></li>
                </ol>
            <hr class="bdc">
            <div class="well sea visible-sm visible-xs">
                    <form id="postsearch" method="post" action="<?php echo site_url('search'); ?>">
                    <div class="input-group">
                    <input type="text" class="form-control" name="text_seaa">
                    <span class="input-group-btn">                  
                           <button class="btn btn-default sea" type="submit" name="postsearch"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
        </div>
                <!-- Blog Post -->
               <div id="about" class="user-info media">


                    </div>
                    <br/>
					</div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            