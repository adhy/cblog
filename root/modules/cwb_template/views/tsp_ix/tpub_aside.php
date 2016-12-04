<!-- sidebar -->
                <aside id="sidebar" class="col-md-3 right_sidebar">
                                        
    <!-- Tabs -->
                    <div class="widget_block">
                        <div class="tabs1">
                            <nav>
                                <ul class="tabs-navi">
                                <li><a data-content="new" class="selected"  href="#"><span></span>Recent</a></li>
                                    <li><a data-content="inbox" href="#"><span></span>Popular</a></li>
                                    
                                    <li><a data-content="gallery" href="#"><i class="icon_alone ico-comment-o"></i></a></li>
                                </ul>
                            </nav>
                            
                            <ul class="tabs-body">
                                <li data-content="new" class="selected">
                                    <ul class="posts_widget_list2">
                                <?php 
                                
                            foreach ($is_leafpop->result() as $row){
                                if(file_exists($row->imgheader)){
                                    $image = $row->imgheader;
                                }
                                else{
                                    $image = "assets/img/not-available.png";
                                }
                                $row->c_date = '%Y/%m/%d';
                                $time = time();
                                $rewat= mdate($row->c_date, $time);
                            echo '<li class="clearfix"><a href="'.site_url('page/'.$row->slug).'"><img alt="" title="" src="'.base_url($image).'"><span>'.$row->title.'</span></a><span class="post_date">'.$rewat.'</span> </li> <li class="clearfix">';
                                } ;?>
                                    </ul>
                                </li>

                                <li data-content="inbox" >
                                    <ul class="posts_widget_list2">
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb1.jpg">
                                                <span>Barbour Jacket</span>
                                            </a>
                                            <span class="post_date"><i class="ico-comments-o"></i>123 Comments</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb2.jpg">
                                                <span>Visvim Gornergrat</span>
                                            </a>
                                            <span class="post_date"><i class="ico-comments-o"></i>57 Comments</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb3.jpg">
                                                <span>Nanamica Graphic Tee</span>
                                            </a>
                                            <span class="post_date"><i class="ico-comments-o"></i>25 Comments</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb4.jpg">
                                                <span>Adidas Hoodie</span>
                                            </a>
                                            <span class="post_date"><i class="ico-comments-o"></i>14 Comments</span>   
                                        </li>
                                    </ul>
                                </li>
                                                        
                                <li data-content="gallery">
                                    <ul class="posts_widget_list2">
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb1.jpg">
                                                <span>Alan Snow:</span>
                                            </a>
                                            <span class="post_comment">There are many variations of passages of Lorem.</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb2.jpg">
                                                <span>John Doe:</span>
                                            </a>
                                            <span class="post_comment">There are many variations of passages of Lorem.</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb3.jpg">
                                                <span>Mary Loe:</span>
                                            </a>
                                            <span class="post_comment">Lorem Ipsum available, but the majority.</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb4.jpg">
                                                <span>Harry John:</span>
                                            </a>
                                            <span class="post_comment">Lorem Ipsum available, but the majority.</span>  
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Tabs -->
                    
                    <!-- Categories -->
                    <div class="widget_block">
                        <h6 class="widget_title">Categories</h6>
                        <ul class="cat_list_widget">
                        <?php foreach ($leaft_cat->result() as $row){
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
                            foreach ($is_tag->result() as $row){
                            echo '<a href="'.site_url('tag/'.$row->slg_t).'"><span class="tag">'.$row->nm_t.'</span><span class="num">'.$row->status.'</span></a>';
                        };?>
                            
                        </div>
                    </div>
                    <!-- End Tag Cloud -->  
                                    
                </aside>
                <!-- End sidebar -->
            </div>
            <!-- All Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
    
    
    <!-- footer -->
    