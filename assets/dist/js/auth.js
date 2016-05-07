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
                        min: 6,
                        max: 30,
                        
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
    
       .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
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
    
});