   
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
                    <li class="active">Page</li>
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
                <div id="detail">
               
               
</div>
				
				 
				<?php if($form_komentar=='null_o'){?>
						<p><i class="fa fa-warning"></i> Page Not Found</p> <br/>
					<?php }elseif($form_komentar=='notactive'){?>
						<p><i class="fa fa-warning"></i> Komentar Tidak Diaktifkan</p> <br/>
					<?php }elseif($form_komentar=='active'){?>
						<form id="postcomment" method="post" class="form-horizontal" action="<?php echo site_url('page'); ?>">
						<?php echo $this->session->flashdata("notif"); ?><div class="form-group"><label class="col-sm-3 control-label">Nama</label><div class="col-sm-5"><input type="text" class="form-control" name="namac" placeholder="Nama tanpa spasi" autocomplete="off"/></div></div>
						<div class="form-group"><label class="col-sm-3 control-label">Website</label><div class="col-sm-5"><input type="url" class="form-control" name="websitec" placeholder="http://website.com" autocomplete="off"/></div></div>
                  <div class="form-group"><label class="col-sm-3 control-label">Email</label><div class="col-sm-5"><input type="text" class="form-control" name="emailc" placeholder="email@email.com" autocomplete="off"/></div></div>
                  <div class="form-group"><label class="col-sm-3 control-label">Komentar</label><div class="col-sm-8"><textarea style="max-width: 500px;max-height:200px;" rows="5"class="form-control" name="komentarp"></textarea></div></div>
                  <div class="form-group"><label class="col-sm-3 control-label" id="bilanganganjil"></label><div class="col-sm-2"><input type="text" class="form-control" name="captcha" /></div></div>
                  <div class="form-group"><div class="col-sm-6 col-sm-offset-3"><div class="checkbox"><label><input type="checkbox" name="agree" value="agree" /> Agree with the terms and conditions</label></div></div></div>
						<div class="form-group"><div class="col-sm-9 col-sm-offset-3"><button type="submit" class="btn btn-primary" name="postcomment" value="Submit">Submit</button></div></div></form>				
					<?php }?>

					</div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            