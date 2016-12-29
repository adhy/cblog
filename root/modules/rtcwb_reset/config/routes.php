<?php
$route['mailworm/reset'] 	= "rtcwb_reset/index";
$route['mailworm/conf'] 	= "rtcwb_reset/cnf_reset";
$route['mailworm/conf/(:any)'] 	= "rtcwb_reset/cnf_reset/$1";
$route['mailworm/send-email'] 	= "rtcwb_reset/mail";
$route['mailworm/reset/(:any)'] 	= "rtcwb_reset/mail/$1";
$route['mailworm/conf/new-password'] 	= "rtcwb_reset/pro_pass";
?>