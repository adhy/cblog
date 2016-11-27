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
              echo form_fieldset('');?>
          <div class="form-group">
        <?=$fr_email?>
          </div>
          <div class="form-group">
        <?=$fr_password?>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?=anchor('mailworm/reset','I forgot my password');?>
            </div>
            <div class="col-xs-4">
                <?=$fr_but?>
            </div>
          </div>
        <?php 
        echo form_fieldset_close();
        echo form_close(); ?>
                  </div>
                </div>
            </div>
        </div>
    </div>


