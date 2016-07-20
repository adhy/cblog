

$('[data-rel="chosen"],[rel="chosen"]').chosen();

$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();
$(function() {

    $('#side-menu').metisMenu();

});
 $('.tooltip-view').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
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



	$(document).ready(function() {
	$('.content').on('hidden.bs.collapse', function (e) {
	$('div.box-icon a.minimize i',$(this)).removeClass('fa-chevron-up').addClass('fa-chevron-down').parent()+ e.currentTarget.id;
});
	$('.content').on('shown.bs.collapse', function (e) {
	$('div.box-icon a.minimize i',$(this)).removeClass('fa-chevron-down').addClass('fa-chevron-up').parent()+ e.currentTarget.id;
});
} );
$(document).ready(function() {
    var t = $('#view_iconadd').DataTable( {
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
    var t = $('#view_categories').DataTable( {
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
    var t = $('#view_edittagcontent').DataTable( {
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
    var t = $('#view_profilesos').DataTable( {
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
    var t = $('#view_tag').DataTable( {
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
    var t = $('#view_sosmed').DataTable( {
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
    var t = $('#view_comment').DataTable( {
        "columnDefs": [ {
            "searchable": true,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
		"searching": true,
		"paging":   true,
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
    var t = $('#view_rcomment').DataTable( {
        "columnDefs": [ {
            "searchable": true,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
		"searching": true,
		"paging":   true,
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
    var t = $('#view_content').DataTable( {
        "columnDefs": [ {
            "searchable": true,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
		"searching": true,
		"paging":   true,
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
/*$(document).ready(function() {
    $('#imagehome').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
		framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
            images: {
                validators: {
                    notEmpty: {
                       
                    },
					stringLength: {
                        min: 3,
                        max: 20,
                        
                    },
                }
            }
        }
	})
});*/
$(document).ready(function() {
    $('#edittagcontent')			
			.find('[data-rel="chosen"]').chosen()
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#edittagcontent').formValidation('revalidateField', 'tag');
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
		locale: 'id_ID',
        fields: {
              tag: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#editprofilsos')			
			.find('[data-rel="chosen"]').chosen()
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#editprofilsos').formValidation('revalidateField', 'sosmed');
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
		locale: 'id_ID',
        fields: {
        		url_sos: {
                validators: {
                    notEmpty: {
                        
                    },
                    uri: {
                        
                    }
                }
            },
            sosmed: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#editcategories')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        name_c: {
                validators: {
                    notEmpty: {
                        
                    },
		  regexp: {
                        regexp: /^[A-Z\s]+$/i,
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            },
            column: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#editsosmed')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        namesosmed: {
                validators: {
                    notEmpty: {
                        
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            },
	icon: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#addsosmed')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        namesosmed: {
                validators: {
                    notEmpty: {
                        
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            },
	icon: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#addsosmed')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        namesosmed: {
                validators: {
                    notEmpty: {
                        
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            },
	icon: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#addtag')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        nametag: {
                validators: {
                    notEmpty: {
                        
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#edittag')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        nametag: {
                validators: {
                    notEmpty: {
                        
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            }
        }
	})
});
$(document).ready(function() {
    $('#addcategories')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        name_c: {
                validators: {
                    notEmpty: {
                        
                    },
		  regexp: {
                        regexp: /^[A-Z\s]+$/i,
                    },
		  stringLength: {
                            min: 2,
                            max: 20,
                            
                        }
                }
            },
            column: {
                validators: {
                    notEmpty: {
                        
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
$(document).ready(function() {
    $('#editpassword').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
		framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        	   password: {
                validators: {
                    notEmpty: {
                        
                    },
					stringLength: {
                        min: 8,
                        max: 20,
                        
                    }
                }
            },
            newpassword: {
                validators: {
                    notEmpty: {
                        
                    },
					stringLength: {
                        min: 8,
                        max: 20,
                        
                    }
                }
            },
			confirmpassword: {
                validators: {
                    notEmpty: {
                        
                    },
                    identical: {
                        field: 'newpassword',
                        
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
		framework: 'bootstrap',
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
            }
        }
	})
});
$(document).ready(function() {
    $('#resetpass').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
		framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
            newpassword: {
                validators: {
                    notEmpty: {
                        
                    },
					stringLength: {
                        min: 8,
                        max: 20,
                        
                    }
                }
            },
			confirmpassword: {
                validators: {
                    notEmpty: {
                        
                    },
                    identical: {
                        field: 'newpassword',
                        
                    }
                }
            }
        }
	})
});


	