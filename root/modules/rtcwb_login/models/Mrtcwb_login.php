<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_login extends CI_Model {
    var $table= 'cb_log';
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getusername($data){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('cb_profile', 'cb_log.id_user = cb_profile.id_user');
		$this->db->where('cb_profile.email', $data['email']);
		$this->db->where('cb_log.pass_log', $data['password']);
		$query = $this->db->get();
		return $query;
	}
	function js_frlogin(){
		return $script = "$(document).ready(function() {
    $('#login_form').formValidation({
        //message: 'This value is not valid',
        framework: 'bootstrap',
       // live: 'enable',
        icon: {
            //valid: 'glyphicon glyphicon-ok',
            //invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        row: {
            valid: 'field-success',
            invalid: 'field-error'
        },
        locale: 'id_ID',
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        
                    },
                    emailAddress: {
                       
                    },
                    regexp: {
                        regexp: '^[^@\\\\s]+@([^@\\\\s]+\\\\.)+[^@\\\\s]+$',
                        
                    }
                }
            },
            passblog: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        
                    }
                }
            }
        }
    })

        .on('err.validator.fv', function(e, data) {
            // data.bv        --> The FormValidation.Base instance
            // data.field     --> The field name
            // data.element   --> The field element
            // data.validator --> The current validator name

            if (data.field === 'email') {
                // The email field is not valid
                data.element
                    .data('fv.messages')
                    // Hide all the messages
                    .find('.help-block[data-fv-for=\"' + data.field + '\"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-fv-validator=\"' + data.validator + '\"]').show();
            }
        })
    
       .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : 'POST',
            url     : 'ServiceLoginAuth',
            data    : $('#login_form').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    //toastr.success('ok !');
                    window.location.href = 'dashboard.html';
                }else if(response.msg == 'error'){
                    toastr.error('username atau password yang anda masukkan salah !');
                    //toastr.success('username atau password yang anda masukkan salah !');
                    

                }else if(response.msg == 'info'){
                    toastr.info('Verifikasi telah dikirim ke email, mohon di periksa kembali !');
                    //toastr.success('username atau password yang anda masukkan salah !');
                    //window.location.href = 'dashboard.html';

                }else{
                    toastr.warning('Akun anda dibekukan, silahkan hubungi Admin !');
                    //toastr.success('username atau password yang anda masukkan salah !');
                    //window.location.href = 'dashboard.html';

                }
            }
        });
    });
    
});";
	}
	function fr_input($n=null,$p=null,$t=null){
		$data = array(
            'name'          => $n,
            'id'            => $n,
            'class'         => 'form-control froco ipt-prof',
            'type'          => $t,
            'autocomplate'  => 'off',
            'placeholder'   => $p,
            'autofocus'     => ''
            );
        return form_input($data) ;
	}
	function fr_but($n=null,$c=null){
		$data = array(
                'name'          => $n,
                'id'            => $n,
                'class'         => 'btn btn-primary btn-block btn-flat',
                'type'          => 'submit',
                'content'       => $c
        );
        return form_button($data);
	}
	function js_fot(){
		       return $jquery =array("	jquery.min.js", "bootstrap.min.js","metisMenu.min.js","pace.min.js",
                            			"formValidation.min.js","framework/bootstrap.min.js","language/id_ID.js",
                            			"toastr.min.js","jquery.uniform.min.js","sb-admin-2.js");
    }
    function css_top(){
		       return $jquery =array("	bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                            			"toastr.css","thesu/default/css/uniform.default.min.css","sb-admin-2.css",
                            			"font-awesome.min.css");
    }
	


}