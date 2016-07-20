<?php

$route['zero/view-comment'] 	= "xzero_comment/index";
$route['zero/view-comment/icon'] 	= "xzero_comment/viewicon";
$route['zero/view-comment/read-comment'] 	= "xzero_comment/read_comment/$1";
$route['zero/view-comment/read-comment/(:any)'] 	= "xzero_comment/read_comment/$1";
$route['zero/view-comment/read-comment-off'] 	= "xzero_comment/read_commentoff/$1";
$route['zero/view-comment/read-comment-off/(:any)'] 	= "xzero_comment/read_commentoff/$1";
$route['zero/view-comment/change-view-offread/(:any)'] 	= "xzero_comment/change_view/$1";
$route['zero/view-comment/change-view-onread/(:any)'] 	= "xzero_comment/change_view/$1";
$route['zero/view-comment/delete-comment/(:any)'] 	= "xzero_comment/delete_comment/$1";

?>