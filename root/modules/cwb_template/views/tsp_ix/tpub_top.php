<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?=$title;?></title>
    <?php $meta = array(
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'description',
                'content' => 'My 1st3rben'
        ),
        array(
                'name' => 'csrf-token',
                'content' => $this->security->get_csrf_hash()
        ),
        array(
                'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1'
        ),
        array(
                'name' => 'keywords',
                'content' => 'love, passion, intrigue, deception'
        ),
        array(
                'name' => 'author',
                'content' => ''
        ),
        array(
                'name' => 'X-UA-Compatible',
                'content' => 'IE=9', 'type' => 'equiv'
        )
);
echo meta($meta);?>

    <?=link_tag('assets/images/favicon/favicon.ico', 'shortcut icon', 'image/x-icon')?>    
    <?php foreach($css_topp as $urlcss){echo link_tag('assets/css/'.$urlcss);}?>

</head>

<body class="preloader3 dark_sup_menu">