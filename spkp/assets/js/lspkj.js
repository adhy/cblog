toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$(document).ready(function() {
    $('#login_form').formValidation({
        message: 'This value is not valid',
        framework: 'bootstrap',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'id_ID',
        fields: {
            spkuname: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        
                    }
                }
            },
            spkpass: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        
                    }
                }
            }
        }
    })
        .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'access-acount',
            data    : $('#login_form').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'error'){
                    toastr.error('username atau password yang anda masukkan salah !');
                }else{
                    //toastr.success('username atau password yang anda masukkan salah !');
                    window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
$(document).ready(function() {
    $('#admin_login').formValidation({
        message: 'This value is not valid',
        framework: 'bootstrap',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'id_ID',
        fields: {
            spkuname: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        
                    }
                }
            },
            spkpass: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        
                    }
                }
            }
        }
    })
        .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'login',
            data    : $('#admin_login').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'error'){
                    toastr.error('username atau password yang anda masukkan salah !');
                }else{
                    //toastr.success('username atau password yang anda masukkan salah !');
                    window.location.href = 'dashboard.html';
                }
            }
        });
    });
});