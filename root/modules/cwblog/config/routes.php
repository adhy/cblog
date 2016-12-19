<?php
$default_controller = "cwblog";
$controller_exceptions = array('page','page/(:any)','recent','recent/(:any)','recent/page/(:any)','category','category/(:any)','category/(:any)/page/(:any)','tag','tag/(:any)','tag/(:any)/page/(:any)','read/(:any)','searching','search','search/(:any)','search/(:any)/page','search/(:any)/page/(:any)','about-us');
foreach($controller_exceptions as $page):
$route[$page] = $default_controller.'/index/$1/$2/$3/$4';
endforeach;
?>
