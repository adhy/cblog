   
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
                    <li class="active">Search</li>
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
         <?php echo $this->session->flashdata("notif"); ?>
                <?php
                if($view_catcont!="no_no") { 					
					foreach($view_catcont->result() as $row){ 
					$link_judul=str_replace('-','_',$row->judul);
					$clink_judul=str_replace(' ','-',$link_judul);
					$date_post=date('F d, Y', strtotime($row->date));
					$isi				=strip_tags($row->isi);
					$hasil_isi		=substr($isi,0,50);
					?>
        			<h1 ><small><a href="<?php echo site_url('page/'.$clink_judul.''); ?>" style="text-transform: capitalize;"><?php echo $row->judul;?></a></small></h1>
					<p><i class="fa fa-user"></i> by <a href="<?php echo site_url('about'); ?>" style="text-transform: capitalize;">
					<?php foreach($view_profil->result() as $rowp){ 
					$count=$this->mysetting->rsumstr_word_count($rowp->name);
					$code=' ';
					$code2=$rowp->name;
					$code3=0;
					$code4=1;
					$by	=$this->mysetting->r_implode($code,$code2,$code3,$code4);
					echo '<span id="by">'.$by.'</span>';
					 } ?>  
					</a> | <i class="fa fa-folder"></i> Category <a href="#<?php echo $row->name_categories ?>" style="text-transform: capitalize;"> <?php echo $row->name_categories ?> </a> | <i class="fa fa-calendar"></i> <?php echo $date_post;?></p><hr>
					<div class="row"><div class="col-md-12"><a href="<?php echo $row->url_cont;?>"><img class="img-responsive img-hover" src="<?php echo $row->url_cont;?>" alt="<?php echo $row->judul;?>" style="width: 100%;height: 140px;padding: 0px;margin: 0px;"></a></div></div>
					<div class="row"><div class="col-md-12"><p><?php echo $hasil_isi;?></p>
					<a class="btn btn-link" href="<?php echo site_url('page/'.$clink_judul.''); ?>">Read More <i class="fa fa-angle-right"></i></a><br/></div></div><div class="row"><hr class="bdc"></div>
					
                
              
       			 <!-- Pager -->
                <?php }
               ?>
                
                <?php  echo $pager_links;
                
                
                }
                ?>
                 </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            