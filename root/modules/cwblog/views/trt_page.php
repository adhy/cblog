       
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
                       //echo $view_cont()->num_rows();
                       foreach ($view_cont->result() as $row){
                        if(file_exists($row->imgheader)){
                                        $image = $row->imgheader;
                                    }else{
                                        $image = "assets/img/gimg_not_available.jpg";
                                    }
                                     $row->c_date = '%Y/%m/%d';
                                     $time = time();
                                     $rewat= mdate($row->c_date, $time);
                                     $text= word_limiter($row->content,5);
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
                                    <a href="'.base_url($image).'" class="feature_inner_ling" data-rel="magnific-popup">
                                        <img src="'.base_url($image).'" alt="Post Title">
                                    </a>
                                </div>
                            </div>
                            <div class="blog_grid_con">
                                <h6 class="title"><a href="'.site_url('read/'.$row->slug).'">'.$row->title.'</a></h6>
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
                    <?=$pager_links?>
                        <!--<ul class="clearfix">
                            <li class="prev_pagination"><a href="#"><i class="ico-arrow-left4"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next_pagination"><a href="#"><i class="ico-arrow-right4"></i></a></li>
                        </ul>-->
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Content Block -->
                
                