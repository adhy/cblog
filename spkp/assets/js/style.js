$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();
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
$(function() {
    $('#side-menu').metisMenu();
    $('[data-toggle="tooltip"]').tooltip();
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
    var t = $('#kriteriagroup').DataTable( {
        "columnDefs": [ {
            "searchable": true,
            "orderable": true,
            "targets": 0
        } ],
        "order": [[ 0, 'asc' ]],
        "searching": false,
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
var table;



function cprofil_modal() {
    $('#edit_profil').find('form')[0].reset();
    $('#fedit_profil').formValidation('resetForm', true);
    $.ajax({
            type    : "POST",
            url     : base_url+'web/ambil-profil',
            dataType: 'json',
            success : function(response){
                //$('#edit_profil').find('form')[0].reset();
                if(response.msg == 'success'){            
                    $("#punama").val(response.uname);
                    $("#pnama").val(response.pnama);
                    $("#pemail").val(response.pemail);
                }
                 $("#edit_profil").modal("show").on('shown.bs.modal');
            }
        });    
}
function cpass_modal() {
    $('#edit_passp').find('form')[0].reset();
    $('#fedit_passp').formValidation('resetForm', true);
    $("#edit_passp").modal("show").on('shown.bs.modal'); 
}
$(document).ready(function() {
    $('#fedit_passp').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                passbaru: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            ulpassbaru: {
                validators: {
                    identical: {
                        field: 'passbaru',
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
            url     : base_url+'web/valp',
            data    : $('#fedit_passp').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                     $('#edit_passp').modal('hide');
                    toastr.success('Berhasil memperbaharui data profil ! ');
                    return false;
                }else{
                    toastr.error('Terjadi kesalahan dalam pengisian data, mohon diulangi lagi !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
$(document).ready(function() {
    $('#fedit_profil').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                punama: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
                pnama: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            pemail: {
                validators: {
                    notEmpty: {
                        
                    },
                    emailAddress: {
                            
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
            url     : base_url+'web/edit-profil',
            data    : $('#fedit_profil').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                     $('#edit_profil').modal('hide');
                    toastr.success('Berhasil memperbaharui data profil ! ');
                    return false;
                }else{
                    toastr.error('Terjadi kesalahan dalam pengisian data, mohon diulangi lagi !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
function add_modal() {
    $('#addmodal').find('form')[0].reset();
    $('#form_add').formValidation('resetForm', true);
    $("#addmodal").modal("show").on('shown.bs.modal');
}


function add_nilai() {
    $('#addnilai').find('form')[0].reset();
    $('#form_addnilai').formValidation('resetForm', true);
    $("#addnilai").modal("show").on('shown.bs.modal');
}
function edit_nilai(id) {
    $('#editnilai').find('form')[0].reset();
    $('#form_editnilai').formValidation('resetForm', true);
    $("#editnilai").modal("show").on('shown.bs.modal');
    $('#save').attr('onclick', 'javascript:update("edit-nilai","'+id+'")');
}
function changeprof() {
    $('#changeprof').find('form')[0].reset();
    $('#form_changeprof').formValidation('resetForm', true);
    $("#changeprof").modal("show").on('shown.bs.modal');
}
function changepass() {
    $('#changepass').find('form')[0].reset();
    $('#form_changepass').formValidation('resetForm', true);
    $("#changepass").modal("show").on('shown.bs.modal');
}




