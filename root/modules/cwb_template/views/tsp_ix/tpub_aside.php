<!-- sidebar -->
                <aside id="sidebar" class="col-md-3 right_sidebar">
                                        
    <!-- Tabs -->
                    <div class="widget_block">
                        <div class="tabs1">
                            <nav>
                                <ul class="tabs-navi">
                                    <li><a data-content="inbox" class="selected" href="#"><span></span>Popular</a></li>
                                    <li><a data-content="new" href="#"><span></span>Recent</a></li>
                                    <li><a data-content="gallery" href="#"><i class="icon_alone ico-comment-o"></i></a></li>
                                </ul>
                            </nav>
                            
                            <ul class="tabs-body">
                                <li data-content="inbox" class="selected">
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
                            
                                <li data-content="new">
                                    <ul class="posts_widget_list2">
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb1.jpg">
                                                <span>Barbour Jacket</span>
                                            </a>
                                            <span class="post_date">2015/01/23</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb2.jpg">
                                                <span>Visvim Gornergrat</span>
                                            </a>
                                            <span class="post_date">2015/01/23</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb3.jpg">
                                                <span>Nanamica Graphic Tee</span>
                                            </a>
                                            <span class="post_date">2015/01/23</span> 
                                        </li>
                                        <li class="clearfix">
                                            <a href="#">
                                                <img alt="" title="" src="assets/images/blog/thumb4.jpg">
                                                <span>Adidas Hoodie</span>
                                            </a>
                                            <span class="post_date">2015/02/12</span>  
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
                            <li>
                                <a href="#">Media</a>
                                <span class="num_posts">61</span>
                            </li>
                            <li>
                                <a href="#">Movies</a>
                                <span class="num_posts">22</span>
                            </li>
                            <li>
                                <a href="#">News</a>
                                <span class="num_posts">78</span>
                            </li>
                            <li>
                                <a href="#">Sound</a>
                                <span class="num_posts">12</span>
                            </li>
                            <li>
                                <a href="#">Tutorials</a>
                                <span class="num_posts">7</span></li>
                            <li>
                                <a href="#">Tweets</a>
                                <span class="num_posts">28</span>
                            </li>
                            <li>
                                <a href="#">Uncategorized</a>
                                <span class="num_posts">9</span>
                            </li>
                            <li>
                                <a href="#">Wordpress</a>
                                <span class="num_posts">32</span>
                            </li>
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
                            $total+=$row->status;
                            echo '<a href="'.site_url('tag/'.$row->slg_t).'"><span class="tag">'.$row->nm_t.'</span><span class="num">'.$total.'</span></a>';
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
    