       
    <!-- Our Blog Grids -->
    <section class="content_section">
        <div class="content row_spacer">    
            <div class="main_title centered upper">
                <h2><span class="line"><i class="ico-pencil2"></i></span>From The Blog</h2>
            </div>
                        
            <!-- All Content -->
            <div class="content_spacer clearfix">
                <div class="content_block col-md-9 f_left">
                    <div class="hm_blog_list clearfix">
                       <?php 
                       foreach ($view_cont->result() as $row){
                        $image=base_url($row->imgheader);
              $thumb_name = $_SERVER['DOCUMENT_ROOT'] .'/cblog/'.$row->imgheader;
                        if(file_exists($thumb_name)){
                                        $image = base_url($row->imgheader);
                                    }else{
                                        $image = base_url("assets/img/gimg_not_available.jpg");
                                    }
                                     $row->c_date = '%d/%m/%Y';
                                     $time = time();
                                     $rewat= mdate($row->c_date, $time);
                                     $content = str_replace('\r',' ',$row->content);
                                     $content = str_replace('\n',' ',$content);
                                     $content = stripslashes($content);
                                     $text= word_limiter($content,5);
                        echo '
                        <div class="blog_grid_block clearfix">
                            <div class="feature_inner">
                                <!-- <a href="#" class="blog_list_format">
                                    <i class="ico-image4"></i>
                                </a> -->
                                <div class="feature_inner_corners">
                                    <div class="feature_inner_btns">
                                        <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                        <a href="#" class="icon_link"><i class="ico-link3"></i></a>
                                    </div>
                                    <a href="'.$image.'" class="feature_inner_ling" data-rel="magnific-popup">
                                        <img src="'.$image.'" alt="Post Title">
                                    </a>
                                </div>
                            </div>
                            <div class="blog_grid_con">
                                <h6 class="title"><a href="'.site_url('read/'.$row->slug).'">'.stripslashes($row->title).'</a></h6>
                                <span class="meta">
                                    <span class="meta_part">
                                        <a href="#">
                                            <i class="ico-clock7"></i>
                                            <span>'.$rewat.'</span>
                                        </a>
                                    </span>
                                    <span class="meta_part">
                                        <i class="ico-folder-open-o"></i>
                                        <span>
                                            <a href="#">'.$row->nm_c.'</a>
                                        </span>
                                    </span>
                                    <span class="meta_part">
                                        <a href="#">
                                            <i class="ico-user5"></i>
                                            <span>'.$row->nm_user.'</span>
                                        </a>
                                    </span>
                                </span>
                                <p class="desc">'.$text.'</p>
                                <a class="btn_a" href="'.site_url('read/'.$row->slug).'">
                                    <span>
                                        <i class="in_left ico-angle-right"></i>
                                        <span>Details</span>
                                        <i class="in_right ico-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>';
                    }
                ?>


                    </div>
                    <!-- End blog List -->
        
                    <!-- Pagination -->
                    <div id="pagination" class="pagination">
                    <?php if(empty($pager_links)||is_null($pager_links)){
                        echo '';}else{echo $pager_links;}?>
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Content Block -->
                
                