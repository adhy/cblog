<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrtcwb_reset extends CI_Model {
<<<<<<< HEAD
	var $table = 'cb_profile';
    var $column = array('id','nm_c','sl_c','id_parent',
    					'c_date','u_date','status');
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	function getemail($data){
		$this->db->where('email', $data['email']);
		return $this->db->get($this->table);
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