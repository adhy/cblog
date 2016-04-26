<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/pace-1.0.2/themes/blue/pace-theme-minimal.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/formvalidation/css/formValidation.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/toastr/build/toastr.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/style.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Codex</b>List</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form role="login_form" id="login_form" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" autofocus autocomplate="off">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="passblog" autofocus autocomplate="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login_form" id="login_form" >Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#">I forgot my password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets');?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets');?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets');?>/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/pace-1.0.2/pace.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/formValidation.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/language/id_ID.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/toastr/build/toastr.min.js"></script>
    <script src="<?php echo base_url('assets');?>/dist/js/pages/prsiro.js"></script>
	<script type="text/javascript">
		var url = '<?php echo base_url();?>';
	</script>

  </body>
</html>
