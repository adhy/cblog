<?php
$route['mailworm/reset'] 	= "rtcwb_reset/index";
$route['mailworm/send-email'] 	= "rtcwb_reset/mail";
$route['mailworm/reset/(:any)'] 	= "rtcwb_reset/mail/$1";
$route['mailworm/new-password'] 	= "rtcwb_reset/pro_pass";
?>