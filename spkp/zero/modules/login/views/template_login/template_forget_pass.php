<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading heading-panel">
						
						
                        <h3 class="panel-title title-panel"><i class="fa fa-lock fa-fw"> </i> Send Activation</h3>
                    </div>
                    <div class="panel-body">
					<?php echo $this->session->flashdata('notif'); ?>
						<form role="form" id="forgetpass" method="post" action="<?php echo base_url('zero/forget-password');?>" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus autocomplete="off">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-default btn-block" name="forgetpass" value="Send">Send Activation</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>