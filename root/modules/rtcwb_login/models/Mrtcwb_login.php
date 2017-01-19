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
		return $script = "

        $(document).ready(function() {
    $('#login_form').formValidation({
        framework: 'bootstrap',
        icon: {
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
            if (data.field === 'email') {
                data.element
                    .data('fv.messages')
                    .find('.help-block[data-fv-for=\"' + data.field + '\"]').hide()
                    .filter('[data-fv-validator=\"' + data.validator + '\"]').show();
            }
        })
    
       .on('success.form.fv', function(e) {
        e.preventDefault();
        $.ajax({
            type    : 'POST',
            url     : 'ServiceLoginAuth',
            data    : $('#login_form').serialize(),
            dataType: 'json',
            async: true,
            success : function(response){
                if(response.msg == 'success'){
                    window.location.href = 'dashboard.html';
                }else if(response.msg == 'error'){
                    $('[name=\"st3rben\"]').val(response.st3rben);
                    toastr.error('username atau password yang anda masukkan salah !');                 
                }else if(response.msg == 'info'){
                    $('[name=\"st3rben\"]').val(response.st3rben);
                    toastr.info('Verifikasi telah dikirim ke email, mohon di periksa kembali !');
                }else{
                    $('[name=\"st3rben\"]').val(response.st3rben);
                    toastr.warning('Akun anda dibekukan, silahkan hubungi Admin !');
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
                            			"toastr.min.js","jquery.uniform.min.js","confyle.min.js");
    }
    function css_top(){
		       return $jquery =array("	bootstrap.min.css", "metisMenu.min.css","thepa/blue/pace-theme-minimal.css","formValidation.min.css",
                            			"toastr.css","thesu/default/css/uniform.default.min.css","confyle.min.js",
                            			"font-awesome.min.css");
    }
	


}