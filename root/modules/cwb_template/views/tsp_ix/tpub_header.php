<div id="preloader">
    <div class="spinner">
        <div class="sk-dot1"></div><div class="sk-dot2"></div>
        <div class="rect3"></div><div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>

<div id="main_wrapper">
    <header id="site_header">
        <div class="topbar"><!-- class ( topbar_colored  ) -->
            <div class="content clearfix">
            
                <div class="top_details clearfix f_left">
                    <div class="languages-select languages-drop">
                        <span><i class="ico-globe4"></i><span>English</span></span>
                        <div class="languages-panel">
                            <ul class="languages-panel-con">
                                <li class="active"><a href="#">English <i class="ico-check lang_checked"></i></a></li>
                                <li><a href="#">RTL</a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="top_login">

                        <i class="icon ico-key3"></i><a class="popup-with-move-anim" href="#login-popup">Login</a>
                    </span>
                    <div class="zoom-anim-dialog small-dialog mfp-hide login_popup" id="login-popup">
                        <form class="login_form_colored">
                            <div class="lfc_user_row">
                                <span class="lfc_header">Login to your Account</span>
                            </div>
                            <div class="lfc_user_row">
                                <label for="login_user_name">
                                    <span class="lfc_alert"></span>
                                    <i class="lfc_icon ico-user5"></i>
                                    <input type="text" name="login_user_name" id="login_user_name">
                                </label>
                            </div>
                            <div class="lfc_user_row">
                                <label for="login_password">
                                    <span class="lfc_alert"></span>
                                    <i class="lfc_icon ico-key3"></i>
                                    <input type="password" name="login_password" id="login_password">
                                </label>    
                            </div>
                            <div class="lfc_user_row clearfix">
                                <div class="my_col_half">
                                    <label for="rememberme">
                                        <span class="remember-box">
                                            <input type="checkbox" id="rememberme" name="rememberme">
                                            <span>Remember me</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="my_col_half clearfix">
                                    <button type="submit" name="login" class="send_button f_right upper">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                            <a class="lfc_forget_pass" href="#">Forgot Your Password?</a>
                        </form>
                    </div>
                    <span><i class="icon ico-phone5"></i><span class="title">Call Us :</span> (123) 456 - 7890</span>
                    <span><i class="icon ico-comment2"></i><span class="title">Support :</span> (123) 456 - 7890</span>
                </div>
                    
                <div class="top-socials box_socials f_right">
                    <a href="#" target="_blank">
                        <span class="soc_name">Facebook</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-facebook4"></i>
                    </a>
                    <a href="#" target="_blank">
                        <span class="soc_name">Twitter</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-twitter4"></i>
                    </a>
                    <a href="#" target="_blank">
                        <span class="soc_name">Google+</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-google-plus"></i>
                    </a>     
                    <a href="skype:#?call">
                        <span class="soc_name">Skype</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-skype"></i>
                    </a>
                    <a href="#" target="_blank">
                        <span class="soc_name">Picassa</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-picassa"></i>
                    </a>
                    <a href="#" target="_blank">
                        <span class="soc_name">Vimeo</span>
                        <span class="soc_icon_bg"></span>
                        <i class="ico-vimeo"></i>
                    </a>
                 </div>
            </div>
            <!-- End content -->
            <span class="top_expande not_expanded">
                <i class="no_exp ico-angle-double-down"></i>
                <i class="exp ico-angle-double-up"></i>
            </span>
        </div>
        <!-- End topbar -->
            
        <div id="navigation_bar">
            <div class="content">
                <div id="logo">
                    <a href="index.html">
                        <img class="logo_dark" src="assets/images/logo-dark.png" alt="Enar Logo">
                        <img class="logo_light" src="assets/images/logo-light.png" alt="Enar Logo">
                    </a>
                </div>
                                
                <!-- Top Search -->
                <form class="top_search clearfix small_top_search">
                    <div class="top_search_con">
                        <input type="text" class="s" placeholder="Search Here ...">
                        <span class="top_search_icon"><i class="ico-search4"></i></span>
                        <input type="submit" class="top_search_submit" >
                    </div>
                </form>
                <!-- End Top Search -->
                <nav id="main_nav">
                    <div id="nav_menu">
                        <span class="mobile_menu_trigger">
                            <a href="#" class="nav_trigger"><span></span></a>
                        </span>     
                        <ul id="navy" class="clearfix">
                            <li class="normal_menu mobile_menu_toggle current_page_item">
                            <?=anchor('', '<span>Home</span>');?>
                            </li>
                            <li class="normal_menu mobile_menu_toggle">
                                <?=anchor('category', '<span>Category</span>');?>
                                <ul>
                                <?php foreach ($is_nav->result() as $row){
                                    echo '<li class="normal_menu"><a href="'.site_url('category/'.$row->slg_c).'">'.$row->nm_c.'</a></li>';
                                };?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Nav -->    
                
                <div class="clear"></div>
            </div>
        </div>
    </header>   