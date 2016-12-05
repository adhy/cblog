<footer id="footer">
        <div class="container row_spacer clearfix">
            <div class="rows_container clearfix">
                <div class="col-md-3">
                    <div class="footer_row">
                        <h6 class="footer_title">Company Info</h6>
                        <img alt="Enar" src="assets/images/logo-light.png">
                        <span class="footer_desc">
                            There are many  Purchase Now There are many variations of passages of Lorem Ipsum available, but the majority.
                        </span>
                        <a href="#" class="black_button">
                            <i class="ico-angle-right"></i><span>Read More</span>
                        </a>
                    </div>
                    <div class="footer_row">
                        <h6 class="footer_title">Newsletter Signup</h6>
                        <span class="footer_desc">
                            By subscribing to our mailing list you will always be update with the latest news :
                        </span>
                        <form id="newsletter_form" class="newsletter_form" action="http://www.enar.ideal-theme.com/html5/php/mailchimp/subscribe.php" method="post">
                            <div class="newsletter_con">
                                <input class="subscribe-mail" name="subscribe-mail" id="subscribe-mail" type="email" placeholder="Your Email Here ..." required>
                                <button type="submit" name="submit" class="newsletter_button">
                                    <i class="subscribe_true ico-check3"></i>
                                    <i class="subscribe_btn ico-send-o"></i>
                                    <i class="refresh_loader ico-refresh4"></i>
                                </button>
                            </div>
                            <div id="subscribe_output"></div>
                        </form>
                    </div>
                </div><!-- Grid -->
                
                <div class="col-md-3">
                    <div class="footer_row">
                        <h6 class="footer_title">Recent Posts</h6>
                        <ul class="recent_posts_list">
                        
                        <?php 
                                        foreach ($is_buttrec->result() as $row){
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
                            echo '<li class="clearfix">
                            <a href="'.site_url('page/'.$row->slug).'" class="related_img" title="'.$row->title.'">
                            <span class="recent_posts_img">
                            <img alt="'.$row->title.'" title="'.$row->title.'" src="'.base_url($image).'" style="width:90px;height:60px;">
                            </span>
                            <span>'.$text.'</span>
                            </a>
                            <span class="recent_post_detail">'.$rewat.'</span>';
                            //foreach ($is_buttrectag->result() as $rowt){
                                //if($row->id_tag == $rowt->id){
                                //    echo '<span class="recent_post_detail">'.$row->id_tag.'</span>';
                               //}
                            
                         //  }
                            echo '</li>';
                            }
                                    ;?>
                        </ul>
                        <a href="#" class="arrow_button full_width">
                            <span>
                                <i class="ico-arrow-forward"></i>
                                <span>Read More Posts</span>
                                <i class="ico-arrow-forward"></i>
                            </span>
                        </a>
                    </div>
                </div><!-- Grid -->
                
                <div class="col-md-3">
                    <div class="footer_row">
                        <h6 class="footer_title">Cloud Tags</h6>
                        <div class="tagcloud clearfix">
                            <a href="#"><span class="tag">Wordpress</span></a>
                            <a href="#"><span class="tag">Creative</span></a>
                            <a href="#"><span class="tag">CSS3</span></a>
                            <a href="#"><span class="tag">Design</span></a>
                            <a href="#"><span class="tag">Graphic</span></a>
                            <a href="#"><span class="tag">HTML5</span></a>
                            <a href="#"><span class="tag">SEO</span></a>
                            <a href="#"><span class="tag">CSS3</span></a>
                                                        <a href="#"><span class="tag">Web Design</span></a>
                        </div>
                    </div>
                    <div class="footer_row">
                        <h6 class="footer_title">Flicker Widget</h6>
                        <div class="flickr_widget_block clearfix">
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker1.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker2.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker3.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker4.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker5.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                            <span class="flickr_badge_image">
                                <a href="#">
                                    <img src="assets/images/flicker/flicker6.jpg" alt="Image Name" title="Flicker Image">
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- Grid -->
                
                <div class="col-md-3">
                    <div class="footer_row">
                        <h6 class="footer_title">Best Author</h6>
                        <div class="about_author clearfix">
                            <a href="#" class="about_author_link">
                                <img src="assets/images/clients/team2-medium.jpg" alt="Author Name">
                                <span>John Doe</span>
                            </a>
                            <div class="social_media clearfix">
                                <a class="twitter" target="_blank" href="#">
                                    <i class="ico-twitter4"></i>
                                </a>
                                <a class="facebook" target="_blank" href="#">
                                    <i class="ico-facebook4"></i>
                                </a>        
                                <a class="googleplus" target="_blank" href="#">
                                    <i class="ico-google-plus"></i>
                                </a>     
                                <a class="linkedin" target="_blank" href="#">
                                    <i class="ico-linkedin3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer_row">
                        <h6 class="footer_title">Custom Video</h6>
                        <a class="hm_vid_con popup-vimeo" href="http://vimeo.com/29193046">
                            <span class="vid_icon"><i class="ico-play5"></i></span>
                            <img alt="Video Title" src="assets/images/blog/blog5.jpg">
                        </a>
                    </div>
                </div><!-- Grid -->
            </div>
        </div>
        <div class="footer_copyright">
            <div class="container clearfix">
                <div class="col-md-6">
                    <span class="footer_copy_text">Copyright &copy; 2015 Powered By <a href="#">IdealTheme</a> - <a href="#">Enar Theme</a> - All Rights Reserved</span>
                </div>
                <div class="col-md-6 clearfix">
                    <ul class="footer_menu clearfix">
                        <li><a href="#"><span>Home</span></a></li>
                        <li>/</li>
                        <li><a href="#"><span>About Us</span></a></li>
                        <li>/</li>
                        <li><a href="#"><span>Help Center</span></a></li>
                        <li>/</li>
                        <li><a href="#"><span>Contact Us</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->
    <a href="#" class="hm_go_top">Top</a>   
</div>
<!-- End wrapper -->

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery.js"><\/script>')</script>
<script src="assets/js/plugins.js"></script>

<script src="assets/js/mediaelement-and-player.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- this is where we put our custom functions -->
<script type="text/javascript" src="assets/js/functions.js"></script>
</body>

</html>