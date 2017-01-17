<div id="preloader">
    <div class="spinner">
        <div class="sk-dot1"></div><div class="sk-dot2"></div>
        <div class="rect3"></div><div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>

<div id="main_wrapper">
    <header id="site_header">            
        <div id="navigation_bar">
            <div class="content">
                <div id="logo">
                    <a href="index.html">
                        <img class="logo_dark" src="<?=base_url('assets/images/logo-dark.png')?>" alt="Enar Logo">
                        <img class="logo_light" src="<?=base_url('assets/images/logo-light.png')?>" alt="Enar Logo">
                    </a>
                </div>
                                
                <!-- Top Search -->
                 <?php 
                 $urlaction=base_url('searching');
                 $attributes = array('id'=>'top_search','class'=>'top_search clearfix small_top_search','action'=>$urlaction);
                    echo form_open_multipart('',$attributes);
                 ?>
                    <div class="top_search_con">
                        <input type="text" class="s" name="search" placeholder="Search Here ...">
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
                            <!--current_page_item-->
                            <li class="normal_menu mobile_menu_toggle">
                            <?=anchor('', '<span>Home</span>');?>
                            </li>
                            <!--<li class="normal_menu mobile_menu_toggle">
                                <?=anchor('category', '<span>Category</span>');?>
                        
                            </li>-->
                            <?php echo is_cuswid('is_navv');?>
                            <li class="normal_menu mobile_menu_toggle">
                            <?=anchor('about-us', '<span>About Us</span>');?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Nav -->    
                
                <div class="clear"></div>
            </div>
        </div>
    </header>   