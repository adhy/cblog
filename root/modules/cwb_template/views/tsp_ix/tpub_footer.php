<footer id="footer">
        <div class="container row_spacer clearfix">
            <div class="rows_container clearfix">
                <div class="col-md-3">

                    <div class="footer_row">
                    <h6 class="footer_title">Info</h6>
                    <img alt="Enar" src="assets/images/logo-light.png">
                    <span class="footer_desc">
                        <?php   $is_me=is_cuswid('');
                                foreach ($is_me->result() as $row) {
                                    $text_descript=character_limiter($row->decript,100);
                                    echo $text_descript;;
                                } ?>
                        </span>
                        <a href="<?=site_url("about-me")?>" class="black_button">
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
                        
                        <?php $is_buttrec=is_cuswid('is_buttrec');
                                        foreach ($is_buttrec->result() as $row){
                                            if(file_exists($row->imgheader)){
                                                $image = $row->imgheader;
                                            }else{
                                                $image = "assets/img/gimg_not_available.jpg";
                                            }
                                        $row->c_date = '%d/%m/%Y';
                                        $time = time();
                                        $text= character_limiter($row->title,7);
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
                            echo '<span class="recent_post_detail"><i class="ico-folder-open-o"></i> '.$row->nm_c.'</span>';
                            /*$data_aw=explode(',', $row->idiot);//apabila menggunakan tag
                            foreach ($is_tag->result() as $rowt){
                                foreach ($data_aw as $key) {
                                    if($rowt->id == $key){
                                        echo '<span class="recent_post_detail">'.$rowt->nm_t.'</span>';
                                    }
                                }                            
                           }*/
                            echo '</li>';
                            }
                                    ;?>
                        </ul>
                        <a href="<?=site_url("recent")?>" class="arrow_button full_width">
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
                         <?php 
                            $is_tag=is_cuswid('is_tag');
                            $total = 0;
                            foreach ($is_tag->result() as $row){
                            echo '<a href="'.site_url('tag/'.$row->slg_t).'"><span class="tag">'.$row->nm_t.'</span></a>';
                        };?>
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
                        <h6 class="footer_title">About Me</h6>
                        <div class="about_author clearfix">
                        <?php   $is_me=is_cuswid('');
                                foreach ($is_me->result() as $row) {
                                    echo '<a href="'.site_url("about-me").'" class="about_author_link">
                                        <img src="'.base_url($row->img).'" alt="'.$row->nm_user.'" style="height=100px;width=100px;">
                                        <span>'.$row->nm_user.'</span>
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
                            </div>';
                                }

                        ?>
                        </div>
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

<script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js')?>"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url('assets/js/jquery.js')?>"><\/script>')</script>
<script src="<?=base_url('assets/js/plugins.js')?>"></script>

<script src="<?=base_url('assets/js/mediaelement-and-player.min.js')?>"></script>
<script src="<?=base_url('assets/js/isotope.pkgd.min.js')?>"></script>
<script src="<?=base_url('assets/js/toastr.min.js')?>"></script>
<!-- this is where we put our custom functions -->
<?php if(!empty($code)){echo $code;} ?>
<script type="text/javascript" src="<?=base_url('assets/js/functions.js')?>"></script>
</body>

</html>