<!-- sidebar -->
                <aside id="sidebar" class="col-md-3 right_sidebar">
                
                      <!-- Popular Posts -->
                    <div class="widget_block">
                        <h6 class="widget_title">Popular Posts</h6>
                        <div class="posts_widget">
                            <ul class="posts_widget_list2">
                            <?php   $is_leafpop=is_cuswid('is_leafpop');
                                    foreach ($is_leafpop->result() as $row){
                                    if(file_exists($row->imgheader)){
                                        $image = $row->imgheader;
                                    }else{
                                        $image = "assets/img/gimg_not_available.jpg";
                                    }
                                    $row->c_date = '%Y/%m/%d';
                                    $time = time();
                                    $text= character_limiter($row->title,30);
                                    $text= word_limiter($text,5);
                                    $rewat= mdate($row->c_date, $time);
                                    echo '<li class="clearfix"><a href="'.site_url('page/'.$row->slug).'" title="'.$row->title.'"><img alt="'.$row->title.'" title="'.$row->title.'" src="'.base_url($image).'"><span>'.$text.'</span></a><span class="post_date">'.$rewat.'</span> </li>';
                                        }
                                    ;?>
                            </ul>
                        </div>
                    </div>
                    <!-- Popular Posts -->                                      
                    <!-- Categories -->
                    <div class="widget_block">
                        <h6 class="widget_title">Categories</h6>
                        <ul class="cat_list_widget">
                        <?php $leaft_cat=is_cuswid('leaft_cat');
                            foreach ($leaft_cat->result() as $row){
                                echo '<li><a href="'.site_url('category/'.$row->slg_c).'">'.$row->nm_c.'</a><span class="num_posts">'.$row->status.'</span></li>';
                              }
                        ;?>
                        </ul>
                    </div>
                    <!-- End Categories -->
                    <!-- Tag Cloud -->
                    <div class="widget_block">
                        <h6 class="widget_title">Tag Cloud</h6>
                        <div class="tagcloud style2 clearfix">
                        <?php 
                            $total = 0;
                            $is_tag=is_cuswid('is_tag');
                            foreach ($is_tag->result() as $row){
                            echo '<a href="'.site_url('tag/'.$row->slg_t).'"><span class="tag">'.$row->nm_t.'</span><span class="num">'.$row->status.'</span></a>';
                        };?>
                            
                        </div>
                    </div>
                    <!-- End Tag Cloud -->  
                      <!-- Related Posts Slider -->
                    <div class="widget_block">
                        <h6 class="widget_title">Related Posts</h6>
                        <div class="related_slider_widget centered">

                                <?php 
                                       /* foreach ($is_leafrec->result() as $row){
                                            if(file_exists($row->imgheader)){
                                                $image = $row->imgheader;
                                            }else{
                                                $image = "assets/img/gimg_not_available.jpg";
                                            }
                                        $row->c_date = '%Y/%m/%d';
                                        $time = time();
                                        $text= character_limiter($row->title,30);
                                        $text= word_limiter($text,5);
                                        $rewat= mdate($row->c_date, $time);
                                        echo '<li class="clearfix"><a href="'.site_url('page/'.$row->slug).'" title="'.$row->title.'"><img alt="'.$row->title.'" title="'.$row->title.'" src="'.base_url($image).'"><span>'.$text.'</span></a><span class="post_date">'.$rewat.'</span> </li> <li class="clearfix">';
                                        }*/
                                    ;?>
                            <?php $is_leafrec=is_cuswid('is_leafrec');
                                        foreach ($is_leafrec->result() as $row){
                                            if(file_exists($row->imgheader)){
                                                $image = $row->imgheader;
                                            }else{
                                                $image = "assets/img/gimg_not_available.jpg";
                                            }
                                        $row->c_date = '%Y/%m/%d';
                                        $time = time();
                                        $text= character_limiter($row->title,30);
                                        $text= word_limiter($text,5);
                                        $rewat= mdate($row->c_date, $time);
                            echo '<div class="related_posts_slide"><div class="related_img_con"><a href="'.site_url('page/'.$row->slug).'" class="related_img" title="'.$row->title.'"><img alt="'.$row->title.'" title="'.$row->title.'" src="'.base_url($image).'" style="height: 170px; width: 265px;"><span><i class="ico-link3"></i></span></a></div><a class="related_title" title="'.$row->title.'" href="'.site_url('page/'.$row->slug).'">'.$text.'</a><span class="post_date">'.$rewat.'</span></div>';
                            }
                                    ;?>
                        </div>
                    </div>
                    <!-- End Related Posts Slider -->              
                </aside>
                <!-- End sidebar -->
            </div>
            <!-- All Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
    
    
    <!-- footer -->
    