<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
<?php foreach($css_top as $urlcss){echo link_tag('assets/private/css/'.$urlcss);}?>
<?=link_tag('assets/private/css/img/emoticon-devil-512.png', 'shortcut icon', 'image/ico')?>
</head>
<body class="bg-log">