<?php
$default_controller = "cwblog";
$controller_exceptions = array('page','page/(:any)','recent','recent/(:any)','recent/page/(:any)','category','category/(:any)','category/(:any)/page/(:any)','tag','tag/(:any)','tag/(:any)/page/(:any)','read/(:any)','search','search/(:any)','search/(:any)/page/(:any)');
foreach($controller_exceptions as $page):
$route[$page] = $default_controller.'/index/$1/$2/$3/$4';
endforeach;
?>
