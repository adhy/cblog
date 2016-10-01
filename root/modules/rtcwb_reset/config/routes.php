<?php
$route['mailworm/reset'] 	= "rtcwb_reset/index";
$route['mailworm/send-email'] 	= "rtcwb_login/mail";
$route['mailworm/reset/(:any)'] 	= "rtcwb_login/mail/$1";
$route['mailworm/new-password'] 	= "rtcwb_login/pro_pass";
?>