  <!-- Our Blog Grids -->
  <section class="content_section">
    <div class="content">
      <div class="internal_post_con clearfix">
        <!-- All Content -->
        <div class="content_block col-md-9 f_left">
          <div class="hm_blog_full_list hm_blog_list clearfix">
            <?php foreach ($view_cont->result() as $row){ 
                  if(file_exists($row->imgheader)){
                                        $image = $row->imgheader;
                                    }else{
                                        $image = "assets/img/gimg_not_available.jpg";
                                    }
                                     $row->c_date = '%d/%m/%Y';
                                     $time = time();
                                     $rewat= mdate($row->c_date, $time);
                                     $content = str_replace('\\','',$row->content);
                                     //$content = trim(preg_replace('/\s+/', ' ', $content));
                                     $content = str_replace('/\s\s+/','',$content);
                                     $content = str_replace('\n','7',$content);
                                     $nm_t    = explode(',', $row->nm_t);
                                     $slg_t    = explode(',', $row->slg_t);
              ?>
            <!-- Post Container -->
            <div id="post-1" class="post-1 post type-post status-publish format-gallery has-post-thumbnail category-media tag-photos clearfix">
              <div class="post_title_con">
                <h6 class="title"><a href="#"><?=$row->title?></a></h6>
                <span class="meta">
                  <span class="meta_part">
                    <a href="#">
                      <i class="ico-clock7"></i>
                      <span><?=$rewat?></span>
                    </a>
                  </span>
                  <!--<span class="meta_part">
                    <a href="#">
                      <i class="ico-comment-o"></i>
                      <span>34 Comments</span>
                    </a>
                  </span>-->
                  <span class="meta_part">
                    <i class="ico-folder-open-o"></i>
                    <span>
                      <a href="<?=site_url('category/'.$row->slg_c)?>"><?=$row->nm_c?></a> <!--<a href="#">Tutorials</a>-->
                    </span>
                  </span>

                  <span class="meta_part">
                    <a href="<?=site_url('about')?>"><i class="ico-user5"></i>
                      <span><?=$row->nm_user?></span>
                    </a>
                  </span>
                </span>
              </div>
  
                    <img src="<?=base_url($image)?>" alt="Post Title">
              <div class="blog_grid_con"><?=$content?>
                
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.</p>
                <p>Fusce non ante sed lorem rutrum feugiat. Vestibulum pellentesque, purus ut dignissim consectetur, nulla erat ultrices purus, <img class="conimg" src="assets/images/bg4.jpg" alt="Post Title">ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Fusce non ante sed lorem rutrum feugiat.</p>
                
                <blockquote>
                  <i class="ico-quote"></i>
                  <span class="quote_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Mauris non laoreet dui, Morbi lacus massa, euismod ut turpis molestie, tristique sodales est There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</span>
                </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur<img class="conimg" src="assets/images/bg3.jpg" alt="Post Title"> adipiscing elit Mauris non laoreet dui, Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa Fusce non ante sed lorem rutrum feugiat, Vestibulum pellentesque, purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>-->
              </div>
              
              <!-- Next / Prev and Social Share-->
              <div class="post_next_prev_con clearfix">
                <!-- Next and Prev Post-->
                <div class="post_next_prev clearfix">
                  <a href="#"><i class="ico-arrow-back"></i><span class="t">Prev</span></a>
                  <!--<a href="#" class="th_icon" title="All Posts"><i class="ico-apps"></i></a> -->
                  <a href="#"><span class="t">Next</span><i class="ico-arrow-forward"></i></a>
                </div>
                <!-- End Next and Prev Post-->
                
                <!-- Social Share-->
                <div class="single_pro_row">
                  <div id="share_on_socials">
                    <!-- <h6>Share:</h6> -->
                    <a class="facebook" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fsharer.php%3Fs%3D100%26p%255Burl%255D%3Dhttp%253A%252F%252Fwww.yourlink.com%26p%255Btitle%255D%3Dyour-post-title%26p%255Bsummary%255D%3Dyour-content-here%26p%255Bimages%255D%255B0%255D%3Dhttp%253A%252F%252Fwww.yourlink.com%252Fimage.jpg&amp;display=popup" target="_blank"><i class="ico-facebook4"></i></a>
                    <a class="twitter" href="http://twitter.com/home?status=your-post-title+http://www.yourlink.com" target="_blank"><i class="ico-twitter4"></i></a>
                    <a class="googleplus" href="https://plus.google.com/share?url=http://www.yourlink.com" target="_blank"><i class="ico-google-plus"></i></a>
                    <a class="pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media=http://www.yourlink.com/image.jpg&amp;url=http://www.yourlink.com&amp;is_video=false&amp;description=your-post-title" target="_blank"><i class="ico-pinterest-p"></i></a>
                    
                    <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.yourlink.com&amp;title=your-post-title&amp;source=http://www.yourlink.com" target="_blank"><i class="ico-linkedin3"></i></a>
                    
                  </div>
                </div>
                <!-- End Social Share-->
              </div>
              <!-- End Next / Prev and Social Share-->
              
              <!-- Tags -->
              <div class="small_title">
                <span class="small_title_con">
                  <span class="s_icon"><i class="ico-tag4"></i></span>
                  <span class="s_text">Tags</span>
                </span>
              </div>
              <div class="tags_con">
                <!-- <h6>Tags:</h6> -->
                <?php foreach ($slg_t as $shell => $shellname) {
                 echo '<a href="'.$shellname.'" rel="tag">'.$nm_t[$shell].'</a>';
                } ?>
                
              </div>
              <!-- End Tags -->
              
              <!-- About the author -->
              <div class="about_auther">
                <div class="small_title">
                  <span class="small_title_con">
                    <span class="s_icon"><i class="ico-user5"></i></span>
                    <span class="s_text">About the author</span>
                  </span>
                </div>
                
                <div class="about_auther_con clearfix">
                  <span class="avatar_img">
                    <img alt="client name" src="<?=base_url($row->img)?>">
                  </span>
                  <div class="about_auther_details">
                    <a href="#" class="auther_link">Harry John</a>
                    <span class="desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                    </span>
                    <div class="social_media clearfix">
                      <a href="#" target="_blank" class="twitter">
                        <i class="ico-twitter4"></i>
                      </a>
                      <a href="#" target="_blank" class="facebook">
                        <i class="ico-facebook4"></i>
                      </a>        
                      <a href="#" target="_blank" class="googleplus">
                        <i class="ico-google-plus"></i>
                      </a>     
                      <a href="#" target="_blank" class="linkedin">
                        <i class="ico-linkedin3"></i>
                      </a>
                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- End About the author -->
            </div>
            <!-- End Post Container -->
            <?php } ?>
            <!-- Related Posts -->
            <div class="related_posts">
              <div class="small_title">
                <span class="small_title_con">
                  <span class="s_icon"><i class="ico-laptop4"></i></span>
                  <span class="s_text">You might also like</span>
                </span>
              </div>
              
              <div class="related_posts_con">
              <?php   $is_rand=is_cuswid('is_rand');
                                foreach ($is_rand->result() as $row) {
                                     if(file_exists($row->imgheader)){
                                        $image = $row->imgheader;
                                    }else{
                                        $image = "assets/img/gimg_not_available.jpg";
                                    }
                                    $row->c_date = '%d/%m/%Y';
                                    $time = time();
                                    $text= character_limiter($row->title,30);
                                    $text= word_limiter($text,5);
                                    $rewat= mdate($row->c_date, $time);
                                    echo '<div class="related_posts_slide"><div class="related_img_con"><a href="'.site_url('read/'.$row->slug).'" class="related_img"><img alt="" src="'.base_url($image).'"><span><i class="ico-link3"></i></span></a></div><a class="related_title" href="'.site_url('read/'.$row->slug).'">'.$text.'</a><span class="post_date">'.$rewat.'</span></div>';
                                } ?>
              </div>
            </div>
            <!-- End Related Posts -->
            
            <!-- Comments Container -->
            <div id="comments" class="comments-area">
              <div class="small_title">
                <span class="small_title_con">
                  <span class="s_icon"><i class="ico-comment-o"></i></span>
                  <span class="s_text">Leave Comment</span>
                </span>
              </div>
              <?php 
              /*echo '              <!-- Comments Tree -->
              <ol class="comments_list clearfix">
                <li class="comment single_comment">
                <!-- Comment -->
                <div class="comment-container comment-box">
                  <div class="trees_number">1</div>
                  <a href="#" class="avatar">
                    <img width="75" height="75" src="assets/images/user2.jpg" alt="John Doe">
                  </a>
                  <div class="comment_content">
                    <h4 class="author_name"><a href="#">John Doe</a></h4>
                    <span class="comment_meta">
                      <a href="#">
                          <time datetime="2015-10-01T19:56:36+00:00">October 1, 2015 at 7:56 pm</time>
                      </a>
                    </span>
                    <div class="comment_said_text">
                      <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour or randomised.</p>
                    </div>
                    <a href="#commentform" class="comment-reply-link">Reply</a> 
                  </div>
                </div>
                <!-- End Comment -->
                  
                <ol class="children">
                  <li class="comment single_comment">
                    <!-- Comment -->
                    <div class="comment-container comment-box">
                      <div class="trees_number">1.1</div>
                      <a href="#" class="avatar">
                        <img width="75" height="75" src="assets/images/user1.jpg" alt="Jane Smith">
                      </a>
                      <div class="comment_content">
                        <h4 class="author_name"><a href="#">Jane Smith</a></h4>
                        <span class="comment_meta">
                          <a href="#">
                              <time datetime="2015-10-01T19:56:36+00:00">October 1, 2015 at 7:56 pm</time>
                          </a>
                        </span>
                        <div class="comment_said_text">
                          <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour or randomised.</p>
                        </div>
                        <a href="#commentform" class="comment-reply-link">Reply</a> 
                      </div>
                    </div>
                    <!-- End Comment -->
                
                    <ol class="children">
                      <li class="comment single_comment">
                        <!-- Comment -->
                        <div class="comment-container comment-box">
                          <div class="trees_number">1.1.1</div>
                          <a href="#" class="avatar">
                            <img width="75" height="75" src="assets/images/user3.jpg" alt="Tommy Horton">
                          </a>
                          <div class="comment_content">
                            <h4 class="author_name"><a href="#">Tommy Horton</a></h4>
                            <span class="comment_meta">
                              <a href="#">
                                <time datetime="2015-10-01T19:56:36+00:00">October 1, 2015 at 7:56 pm</time>
                              </a>
                            </span>
                            <div class="comment_said_text">
                              <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour or randomised.</p>
                            </div>
                            <a href="#commentform" class="comment-reply-link">Reply</a>  
                          </div>
                        </div>
                        <!-- End Comment -->   
                           
                        <ol class="children">
                          <li class="comment single_comment">
                            <!-- Comment -->
                            <div class="comment-container comment-box">
                              <div class="trees_number">1.1.1.1</div>
                              <a href="#" class="avatar">
                                <img width="75" height="75" src="assets/images/user4.jpg" alt="Alan Snow">
                              </a>
                              <div class="comment_content">
                                <h4 class="author_name"><a href="#">Alan Snow</a></h4>
                                <span class="comment_meta">
                                  <a href="#">
                                      <time datetime="2015-10-01T19:56:36+00:00">October 1, 2015 at 7:56 pm</time>
                                  </a>
                                </span>
                                <div class="comment_said_text">
                                    <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour or randomised.</p>
                                </div>
                                <a href="#commentform" class="comment-reply-link">Reply</a>  
                              </div>
                            </div>
                            <!-- End Comment -->
                          </li>
                        </ol>
              
                      </li>
                    </ol>
              
                  </li>
                </ol>
              
                </li>
                <li class="comment single_comment">
                  <!-- Comment -->
                  <div class="comment-container comment-box">
                    <div class="trees_number">2</div>
                    <a href="#" class="avatar">
                      <img width="75" height="75" src="assets/images/user5.jpg" alt="Harry John">
                    </a>
                    <div class="comment_content">
                      <h4 class="author_name"><a href="#">Harry John</a></h4>
                      <span class="comment_meta">
                        <a href="#">
                          <time datetime="2015-10-01T19:56:36+00:00">October 1, 2015 at 7:56 pm</time>
                        </a>
                      </span>
                      <div class="comment_said_text">
                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour or randomised.</p>
                      </div>
                      <a href="#commentform" class="comment-reply-link">Reply</a>  
                    </div>
                  </div>
                  <!-- End Comment -->
                </li>
              </ol>
              <!-- End Comments Tree -->
              
              <!-- Comments Form -->
            <div class="comments-form-area" id="comments-form">
                <div class="comment-respond" id="respond">
                  
                  <div class="small_title">
                    <span class="small_title_con">
                      <span class="s_icon"><i class="ico-pencil6"></i></span>
                      <span class="s_text">Leave a Reply</span>
                    </span>
                  </div>
                  <form class="comment-form" id="commentform" method="post" action="#">
                    <!-- <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p> -->
                    <input type="text" aria-required="true" size="30" value="" placeholder="Name (required)" name="author" id="author">
                    <input type="text" aria-required="true" size="30" value="" placeholder="Email (required)" name="email" id="email">
                    <input type="text" size="30" value="" placeholder="Website" name="url" id="url">
                    <p class="comment-form-comment">
                      <textarea aria-required="true" rows="8" cols="45" name="comment" placeholder="Comment..." id="comment"></textarea>
                    </p>
                    <p class="form-submit">
                      <input class="send_button" type="submit" value="Post Comment" id="submit-comment" name="submit">
                    </p>
                  </form>
                </div>
              </div>';*/ ?>
              <!-- End Comments Form -->
            </div>
            <!-- End Comments Container -->
          </div>
          <!-- End blog List -->
        </div>
        <!-- End All Content -->