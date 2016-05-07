<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets');?>/plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/pace-1.0.2/themes/blue/pace-theme-minimal.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/formvalidation/css/formValidation.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/toastr/build/toastr.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets');?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets');?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
		<?php $attributes = array('role'=>'form','id'=>'login_form');
        echo form_open('',$attributes);
    echo form_fieldset('');
    ?>
        <!--<form role="login_form" id="login_form" method="post">-->
          <div class="form-group">
        <?php $data = array(
            'name'          => 'email',
            'id'            => 'email',
            'class'         => 'form-control',
            'type'          => 'email',
            'autocomplate'  => 'off',
            'placeholder'   => 'Email',
            'autofocus'     => ''
            );
            echo form_input($data);?>
          </div>
          <div class="form-group">
          <?php $data = array(
            'name'          => 'passblog',
            'id'            => 'passblog',
            'class'         => 'form-control',
            'type'          => 'password',
            'autocomplate'  => 'off',
            'placeholder'   => 'Password',
            'autofocus'     => ''
            );
            echo form_input($data);?>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox">
                <label>
                <?php $data = array(
                    'name'          => 'remember',
                    'id'            => 'remember',
                    'value'         => 'accept',
                    'checked'       => FALSE,
                    'type'         => 'checkbox'
                );

                echo form_checkbox($data); ?>
                  Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?php $data = array(
                                    'name'          => 'login_form',
                                    'id'            => 'login_form',
                                    'class'         => 'btn btn-primary btn-block btn-flat',
                                    'type'          => 'submit',
                                    'content'       => 'Sign In'
                            );
                            echo form_button($data);
                
                ?>
            </div><!-- /.col -->
          </div>
        <?php 
        echo form_fieldset_close();
        echo form_close(); ?>

        <a href="#">I forgot my password</a><br>

                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/plugins/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/pace-1.0.2/pace.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/formValidation.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/language/id_ID.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/toastr/build/toastr.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url('assets');?>/dist/js/auth.js"></script>
    <script type="text/javascript">
    var url = '<?php echo base_url();?>';
  </script>
</body>

</html>

