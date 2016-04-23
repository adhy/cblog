$(document).ready(function() {
    $('#login_form').formValidation({
        //message: 'This value is not valid',
        framework: 'bootstrap',
       // live: 'enable',
        icon: {
            //valid: 'glyphicon glyphicon-ok',
            //invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'id_ID',
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        
                    }
                }
            },
            passblog: {
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
       /* .on('success.form.fv', function(e) {
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
    });*/
});