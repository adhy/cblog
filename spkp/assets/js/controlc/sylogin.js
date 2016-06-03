$(document).ready(function() {
    $('#login').formValidation({
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
            email: {
                validators: {
                    notEmpty: {
                        
                    },
                    emailAddress: {

                    }
                }
            },
			 password: {
                validators: {
                    notEmpty: {
                       
                    },
		  stringLength: {
                            min: 8,
                            max: 30,
                            
                        }
                }
            }
        }
	})
});