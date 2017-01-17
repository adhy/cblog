  <!-- Our Blog Grids -->
  <section class="content_section">
    <div class="content">
      <div class="internal_post_con clearfix">
        <!-- All Content -->
        <div class="content_block col-md-9 f_left">
          <div class="hm_blog_full_list hm_blog_list clearfix">
            <?php foreach ($view_cont->result() as $row){ 
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
                                     $content = nl2br($row->content);
                                     $content = stripcslashes($content);                                    
                                     $nm_t    = explode(',', $row->nm_t);
                                     $slg_t    = explode(',', $row->slg_t);
              ?>
            <!-- Post Container -->
            <div id="post-1" class="post-1 post type-post status-publish format-gallery has-post-thumbnail category-media tag-photos clearfix">
              <div class="post_title_con">
                <h6 class="title"><a href="#"><?=$row->title?></a></h6>
                <span class="meta">
                  <span class="meta_part">
                      <i class="ico-clock7"></i>
                      <span><?=$rewat?></span>
                  </span>
                  <span class="meta_part">
                    <i class="ico-folder-open-o"></i>
                    <span>
                      <a href="<?=site_url('category/'.$row->slg_c)?>"><?=$row->nm_c?></a>
                    </span>
                  </span>

                  <span class="meta_part">
                    <a href="<?=site_url('about')?>"><i class="ico-user5"></i>
                      <span><?=$row->nm_user?></span>
                    </a>
                  </span>
                </span>
              </div>
  
                    <img src="<?=$image?>" alt="Post Title">
              <div class="blog_grid_con"><?php echo $content;?>
              </div>
              
              <div class="post_next_prev_con clearfix">
                
                
                <div class="single_pro_row">
                  <div id="share_on_socials">
                   
                    <a class="facebook" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fsharer.php%3Fs%3D100%26p%255Burl%255D%3Dhttp%253A%252F%252Fwww.yourlink.com%26p%255Btitle%255D%3Dyour-post-title%26p%255Bsummary%255D%3Dyour-content-here%26p%255Bimages%255D%255B0%255D%3Dhttp%253A%252F%252Fwww.yourlink.com%252Fimage.jpg&amp;display=popup" target="_blank"><i class="ico-facebook4"></i></a>
                    <a class="twitter" href="http://twitter.com/home?status=your-post-title+http://www.yourlink.com" target="_blank"><i class="ico-twitter4"></i></a>
                    <a class="googleplus" href="https://plus.google.com/share?url=http://www.yourlink.com" target="_blank"><i class="ico-google-plus"></i></a>
                    <a class="pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media=http://www.yourlink.com/image.jpg&amp;url=http://www.yourlink.com&amp;is_video=false&amp;description=your-post-title" target="_blank"><i class="ico-pinterest-p"></i></a>
                    
                    <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.yourlink.com&amp;title=your-post-title&amp;source=http://www.yourlink.com" target="_blank"><i class="ico-linkedin3"></i></a>
                    
                  </div>
                </div>
                
              </div>
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
            </div>
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
            <div id="comments" class="comments-area">
              <div class="small_title">
                <span class="small_title_con">
                  <span class="s_icon"><i class="ico-comment-o"></i></span>
                  <span class="s_text">Leave Comment</span>
                </span>
              </div>
            </div>
          </div>
        </div>