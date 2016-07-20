<?php

$route['parse/json/view'] 	= "web_template/index";
$route['parse/json/view/home/new'] 	= "web_template/viewhome_new";
$route['parse/json/view/home/menu-top'] 	= "web_template/viewhome_menutop";
$route['parse/json/view/home/popular'] 	= "web_template/viewhome_pop";
$route['parse/json/view/home/menu-left'] 	= "web_template/viewhome_menuleft";
$route['parse/json/view/home/tag'] 	= "web_template/viewhome_tag";
$route['parse/json/view/home/about'] 	= "web_template/viewhome_about";
//$route['parse/json/view/home/category/(:any)'] 	= "web_template/viewhome_kategori/$1";
//$route['parse/json/view/home/category/page/(:any)'] 	= "web_template/viewhome_kategori/$1";
//$route['parse/json/view/home/tag/(:any)'] 	= "web_template/viewhome_tag/$1";
$route['parse/json/view/home/page/(:any)'] 	= "web_template/viewhome_page/$1";

?>