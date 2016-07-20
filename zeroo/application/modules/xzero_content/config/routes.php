<?php

$route['zero/view-content'] 	= "xzero_content/index";
$route['zero/view-content/add-content'] 	= "xzero_content/add_content";
$route['zero/view-content/edit-content/(:any)'] 	= "xzero_content/edit_content/($1)";
$route['zero/view-content/edit-content'] 	= "xzero_content/edit_content";
$route['zero/view-content/edit-content/edit-tag-content/(:any)'] 	= "xzero_content/edit_tagcontent/($1)";
$route['zero/view-content/edit-content/edit-tag-content'] 	= "xzero_content/edit_tagcontent";
$route['zero/view-content/edit-content/edit-tag-content/delete-tag-content/(:any)'] 	= "xzero_content/delete_tagcontent/($1)";
$route['zero/view-content/change-view/(:any)'] 	= "xzero_content/change_view/($1)";
$route['zero/view-content/active-comment/(:any)'] 	= "xzero_content/active_comment/($1)";
$route['zero/view-content/delete-content/(:any)'] 	= "xzero_content/delete_content/($1)";

?>