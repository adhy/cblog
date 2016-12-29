<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_reset extends CI_Model {
	var $table = 'cb_profile';
    var $column = array('id','nm_c','sl_c','id_parent',
    					'c_date','u_date','status');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getemail($data){
        $this->db->join('cb_log', 'cb_profile.id_user = cb_log.id_user');
        $this->db->where('cb_profile.email', $data['email']);
        return $this->db->get($this->table);
    }
    function valdesi($data){
        $this->db->join('cb_log', 'cb_profile.id_user = cb_log.id_user');
        $this->db->where('cb_profile.email', $data['email']);
        $this->db->where('cb_log.key_uppass', $data['key_uppass']);
        $this->db->where('cb_log.u_date', $data['date']);
        return $this->db->get($this->table);
    }
    function valdesi_key($data){
        $this->db->where('act_key', $data['key']);
		return $this->db->get('cb_log');
	}
		function js_frlogin(){
		return $script = "$(document).ready(function() {
    $('#reset_form').formValidation({
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
            url     : 'send-email',
            data    : $('#reset_form').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    //toastr.success('ok !');
                   window.location.href = 'login.html';
                }else{
                    toastr.warning('Email Yang Anda Masukkan Salah !');
                    //toastr.success('username atau password yang anda masukkan salah !');
                    //window.location.href = 'dashboard.html';

                }
            }
        });
    });
    
});";
	}
    function fr_reset(){
        return $script = "$(document).ready(function() {
    $('#newpass_form')
        .formValidation({
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
                password: {
                    enabled: false,
                    validators: {
                        notEmpty: {
                        },
                        stringLength: {
                        min: 6,
                        max: 30,
                        
                        }
                    }
                },
                confirm_password: {
                    enabled: false,
                    validators: {
                        notEmpty: {
                        },
                        identical: {
                            field: 'password',
                        }
                    }
                }
            }
        })
        // Enable the password/confirm password validators if the password is not empty
        .on('keyup', '[name=\"password\"]', function() {
            var isEmpty = $(this).val() == '';
            $('#enableForm')
                    .formValidation('enableFieldValidators', 'password', !isEmpty)
                    .formValidation('enableFieldValidators', 'confirm_password', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#enableForm').formValidation('validateField', 'password')
                                .formValidation('validateField', 'confirm_password');
            }
        })
               .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : 'POST',
            url     : 'new-password',
            data    : $('#newpass_form').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    //toastr.success('ok !');
                   window.location.href = 'login.html';
                }else{
                    toastr.warning('Ulangi password yang anda masukkan');
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
}