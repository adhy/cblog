    $('#imgprof').on('click', function() {
        $('#oncha').click();      
      });
    jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
      'width'   : 880,
      'height'  : 570,
      'type'    : 'iframe',
      'autoScale'   : false
      });
      
      $('#fieldID').on('change',function(){
          alert('changed');
      });
      $(function() {
        // Executes a callback detecting changes with a frequency of 1 second
        $("#fieldID").observe_field(1, function( ) {
            // alert('Change observed! new value: ' + this.value );
            var reader = url+this.value;
            var uploadfile = this.value;
            $('.preview-image').attr('src',reader).show();
            $('.card-bkimg').attr('src',reader).show();
            var link = 'change-image';
            sendfile(uploadfile,link);

        });
      });
      function sendfile(uploadfile){
        var val = uploadfile;
      $.ajax({
            type    : "POST",
            url     : link,
            data: "val="+ val,
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Update success');
                }else if(response.msg == 'error'){
                    toastr.error('Update error');
                    //toastr.success('username atau password yang anda masukkan salah !');
                    

                }
            }
        });
      }
      
      
      $('#download-button').on('click', function() {
        ga('send', 'event', 'button', 'click', 'download-buttons');      
      });
      $('.toggle').click(function(){
        var _this=$(this);
        $('#'+_this.data('ref')).toggle(200);
        var i=_this.find('i');
        if (i.hasClass('icon-plus')) {
          i.removeClass('icon-plus');
          i.addClass('icon-minus');
        }else{
          i.removeClass('icon-minus');
          i.addClass('icon-plus');
        }
      });
}); /*
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imgprof').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#fieldID").change(function(){
        readURL(this);
    });
$('.form-control').on('change', function(){
    var inputVal = $(this).val();
    $('.preview-image').attr('src', inputVal).fadeIn();
})


$('#oncha').on('click', function(){
    var href = $('#oncha').attr('href');
    $('.form-control').val(href).trigger('change');
    return false;
})*/

$(document).ready(function() {
    $('#edprof').formValidation({
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
            mynm: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        
                    },
                    emailAddress: {
                       
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        
                    }
                }
            },
            adde: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
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
                    .find('.help-block[data-fv-for="' + data.field + '"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-fv-validator="' + data.validator + '"]').show();
            }
        });
    
       /*.on('success.form.fv', function(e) {
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
    });*/
    
});
$(document).ready(function() {
    $('#edpassprof').formValidation({
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
            cupass: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                        min: 8,
                        max: 20
                    }
                }
            },
            nepass: {
                    validators: {
                        notEmpty: {
                        },
                        different:{
                            field: 'cupass'
                        },
                        stringLength: {
                        min: 8,
                        max: 20
                        }
                    }
                },
            copass: {
                    validators: {
                        notEmpty: {
                        },
                        identical: {
                            field: 'nepass'
                        }
                    }
                }


        }
    })
        .on('keyup', '[name="nepass"]', function() {
            var isEmpty = $(this).val() == '';
            $('#enableForm')
                    .formValidation('enableFieldValidators', 'nepass', !isEmpty)
                    .formValidation('enableFieldValidators', 'copass', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#enableForm').formValidation('validateField', 'nepass')
                                .formValidation('validateField', 'copass');
            }
        });
    
       /*.on('success.form.fv', function(e) {
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
    });*/
    
});