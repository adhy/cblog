        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default panlog">
                    <div class="panel-heading pnhed">
                        <h3 class="panel-title fa fa-rocket" style="text-align: center"> Please Enter New Password </h3>
                    </div>
                    <div class="panel-body">
		<?php $attributes = array('role'=>'form','id'=>'newpass_form');
              echo form_open('',$attributes);
              echo form_fieldset('');?>
          <div class="form-group">
        <?=$fr_newpass?>
          </div>
          <div class="form-group">
        <?=$fr_newpassconf?>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?=anchor('mailworm/login','I Need Login');?>
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