        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default panlog">
                    <div class="panel-heading pnhed">
                        <h3 class="panel-title fa fa-rocket" style="text-align: center"> To reset your password, please enter your email address</h3>
                    </div>
                    <div class="panel-body">
		<?php $attributes = array('role'=>'form','id'=>'reset_form');
        echo form_open('',$attributes);
    echo form_fieldset('');
    ?>
        <!--<form role="login_form" id="login_form" method="post">-->
          <div class="form-group">
<?=$fr_email?>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?=anchor('mailworm/login','Login'); ?>
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
