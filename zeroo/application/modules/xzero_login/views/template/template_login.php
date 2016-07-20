<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading heading-panel">
						
						
                        <h3 class="panel-title title-panel"><i class="fa fa-lock fa-fw"> </i> Please Sign In</h3>
                    </div>
                    <div class="panel-body">
					<?php echo $this->session->flashdata('notif'); ?>
						<form role="form" id="login" method="post" action="<?php echo base_url('zero/login');?>" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" autocomplete="off">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox">Remember Me
                                    </label>
									| <?php echo anchor('zero/forget-password','| Forget Password', array('class' => 'alert-link')); ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-default btn-block" name="login" value="Login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>