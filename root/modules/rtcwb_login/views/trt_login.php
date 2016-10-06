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
                'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
        )
);
echo meta($meta);?>
    <?=link_tag('assets/css/bootstrap.min.css')?>
    <?=link_tag('assets/css/metisMenu.min.css')?>
    <?=link_tag('assets/css/thepa/blue/pace-theme-minimal.css')?>
    <?=link_tag('assets/css/formValidation.min.css')?>
    <?=link_tag('assets/css/toastr.css')?>
    <?=link_tag('assets/css/thesu/default/css/uniform.default.min.css')?>
    <?=link_tag('assets/css/sb-admin-2.css')?>
    <?=link_tag('assets/css/font-awesome.min.css')?>
    <?=link_tag('assets/css/img/emoticon-devil-512.png', 'shortcut icon', 'image/ico')?>
</head>

<body class="bg-log">
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default panlog">
                    <div class="panel-heading pnhed">
                        <h3 class="panel-title fa fa-rocket" style="text-align: center"> Please Sign In </h3>
                    </div>
                    <div class="panel-body">
		<?php $attributes = array('role'=>'form','id'=>'login_form');
              echo form_open('',$attributes);
              echo form_fieldset('');
        ?>
        <!--<form role="login_form" id="login_form" method="post">-->
          <div class="form-group">
        <?=$fr_email?>
          </div>
          <div class="form-group">
        <?=$fr_password?>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?=anchor('mailworm/reset','I forgot my password'); ?>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?=$fr_but?>
            </div><!-- /.col -->
          </div>
        <?php 
        echo form_fieldset_close();
        echo form_close(); ?>

       

                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
     <?php foreach($js_fott as $urljs){
        echo "<script src='".base_url('assets')."/js/".$urljs."'></script>";
    }?>
    <script type="text/javascript">
    var url = '<?php echo base_url();?>';
    <?=$js_frlogin?>
  </script>
  <?php echo $this->session->flashdata('notif');?>
</body>

</html>

