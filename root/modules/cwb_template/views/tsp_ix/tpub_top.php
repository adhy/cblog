<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <?php 
    //$sub_titile=$is_c;
    if(empty($is_c)){
         $sub_titile=$is_se;
    }elseif(empty($is_se) || is_null($is_se) || isset($is_se)){
        $sub_titile='404';
    }else{
        $sub_titile=$is_c;
    }
    ?>
    <title><?php echo $title.$sub_titile;?></title>
    <?php 
    $all_description=array();
if (!empty($view_cont)){
foreach ($view_cont->result() as $key) {
    $all_description[] =$key->title;
}
$all_description=implode(',', $all_description);
}else{
    $all_description='System is Down';
}

    $meta = array(
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'description',
                'content' => $all_description
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
                'content' => $author
        ),
        array(
                'name' => 'X-UA-Compatible',
                'content' => 'IE=9', 'type' => 'equiv'
        )
);
echo meta($meta);?>

    <link href="<?=base_url('assets/images/favicon/favicon.ico')?>" rel="shortcut icon" type="image/ico" />  
    <?php foreach($css_topp as $urlcss){echo '<link href="'.base_url('assets/css/'.$urlcss).'" rel="stylesheet" type="text/css" />';}?>
<!-- Include required JS files -->
<script type="text/javascript" src="<?=base_url('assets/plugins/syntaxhighlighter/scripts/shCore.js')?>"></script>
 
<!--
    At least one brush, here we choose JS. You need to include a brush for every 
    language you want to highlight
-->
<script type="text/javascript" src="<?=base_url('assets/plugins/syntaxhighlighter/scripts/shBrushJScript.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/syntaxhighlighter/scripts/shBrushPhp.js')?>"></script>
 
<!-- Include *at least* the core style and default theme -->
<link href="<?=base_url('assets/plugins/syntaxhighlighter/styles/shCore.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/plugins/syntaxhighlighter/styles/shThemeMidnight.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/css/prism.css')?>" rel="stylesheet" type="text/css" data-noprefix/>
<link href="<?=base_url('assets/css/prism-line-numbers.css')?>" rel="stylesheet" type="text/css" data-noprefix/>
<script type="text/javascript" src="<?=base_url('assets/js/prefixfree.min.js')?>"></script>

</head>

<body class="preloader3 dark_sup_menu">