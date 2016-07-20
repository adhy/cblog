$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();
$(function() {

    $('#side-menu').metisMenu();

});
 $('.tooltip-view').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

	
	$('.content').on('hidden.bs.collapse', function (e) {
	$('.collapseOne',$(this)).removeClass('fa-chevron-up').addClass('fa-chevron-down')+ e.currentTarget.id;
});
	$('.content').on('shown.bs.collapse', function (e) {
	$('.collapseOne',$(this)).removeClass('fa-chevron-down').addClass('fa-chevron-up')+ e.currentTarget.id;;
});

$(document).ready(function() {
    var t = $('#view_kriteria').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
		"searching": false,
		"paging":   false,
		"ordering": true,
		"info":     false,
		 responsive: true,
		"language": {"sProcessing":   "Sedang memproses...",
	"sLengthMenu":   "Tampilkan _MENU_ entri",
	"sZeroRecords":  "Tidak ditemukan data yang sesuai",
	"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
	"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
	"sInfoPostFix":  "",
	"sSearch":       "Cari:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst":    "Pertama",
		"sPrevious": "Sebelumnya",
		"sNext":     "Selanjutnya",
		"sLast":     "Terakhir"
	}
        }
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
$(document).ready(function() {
    $('#add_k').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            kriteria: {
                validators: {
                    notEmpty: {
                        message: 'The Kriteria is required and can\'t be empty'
                    },
					stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The Kriteria must be more than 3 and less than 20 characters long'
                    },
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#add_subk').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            sub_kriteria: {
                validators: {
                    notEmpty: {
                        message: 'The Sub Kriteria is required and can\'t be empty'
                    },
					stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The Sub Kriteria must be more than 3 and less than 20 characters long'
                    },
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#edit_subk').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            sub_kriteria: {
                validators: {
                    notEmpty: {
                        message: 'The Sub Kriteria is required and can\'t be empty'
                    },
					stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The Sub Kriteria must be more than 3 and less than 20 characters long'
                    },
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#editk')			
			.find('[data-rel="chosen"]').chosen()
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#editk').formValidation('revalidateField', 'sub_kriteria');
            })
            .end()
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			kriteria: {
                validators: {
                    notEmpty: {
                        message: 'The Kriteria is required and can\'t be empty'
                    },
					stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The Kriteria must be more than 3 and less than 20 characters long'
                    },
                }
            },
            sub_kriteria: {
                validators: {
                    notEmpty: {
                        message: 'The Sub Kriteria is required and can\'t be empty'
                    }
                }
            }
        }
	})
});
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
                        message: 'The Email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
			 password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
					stringLength: {
                            min: 8,
                            max: 30,
                            message: 'The password must be more than 8 and less than 30 characters long'
                        }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#forgetpass').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
	})
});


	