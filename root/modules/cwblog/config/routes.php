<?php
//$route['recent'] 	= "cwblog/is_recent";
$route['page'] 	= "cwblog/index";
$route['page/(:any)'] 	= "cwblog/index";
$route['recent/(:any)'] 	= "cwblog/is_recent";
$route['recent/page/(:any)']="cwblog/is_recent";
?>
