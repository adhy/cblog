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
    table = $('#alluser').DataTable( {
        "searching": false,
        "paging":   true,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "view-tabel",
            "type": "POST"
        },
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
 
} );
function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax
}
var table;
function caprofil_modal() {
    $('#edit_profil').find('form')[0].reset();
    $('#fedit_profil').formValidation('resetForm', true);
    $.ajax({
            type    : "POST",
            url     : base_url+'web/ambil-aprofil',
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


function edit_modal() {
    $('#editmodal').find('form')[0].reset();
    $('#form_edit').formValidation('resetForm', true);
    $("#editmodal").modal("show").on('shown.bs.modal');
    
}
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

$(document).ready(function() {
    $('#form_add').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                nm_user: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            email_user: {
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
            url     : 'add-user',
            data    : $('#form_add').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Data user telah anda tambahkan ');
                    reload_table();
                    $('#addmodal').modal('hide');
                }else{
                    toastr.error('Terjadi kesalahan dalam pengisian data, mohon diulangi lagi !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
function del_user(id,link){
    $.ajax({
            type    : "POST",
            url     : 'hapus-user',
            data    : "nomer="+id,
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Data telah dihapus ! ');
                    reload_table();
                }
            }
        });
}
function edit_modaluser(id,link) {
    $('#update').attr('onclick', 'javascript:updatek("'+link+'","'+id+'")');
    $('#editmodal').find('form')[0].reset();
    $('#form_edit').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'getdata',
            data    : {nomer:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    $("#enama").val(response.nm_user);
                    $("#eemail").val(response.email);
                }
                $("#editmodal").modal("show").on('shown.bs.modal');
            }
        });
}
function ganti_username(id) {
    $('#editpetugasmodal').find('form')[0].reset();
    $('#form_editpetugas').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'nomereditpetugas',
            data    : {nomer:id},
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                      $('#editpetugasmodal').find('form')[0].reset();
                      $("#editpetugasmodal").modal("show").on('shown.bs.modal');
                }
            }
        });

}
function add_petugas(id) {
    $('#add_petugas').find('form')[0].reset();
    $('#form_addp').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'nomerpetugas',
            data    : {nomer:id},
            dataType: 'json',
            success : function(response){
                if( response.msg == 'success'){
                    $('#add_petugas').find('form')[0].reset
                $("#add_petugas").modal("show").on('shown.bs.modal'); 
                }
            }
        });
}
$(document).ready(function() {
    $('#form_edit').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                enama: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            eemail: {
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
            url     : 'edit-user',
            data    : $('#form_edit').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Berhasil memperbaharui data ! ');
                    reload_table();
                    $('#editmodal').modal('hide');
                }else{
                    toastr.error('Terjadi kesalahan dalam pengisian data, mohon diulangi lagi !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
$(document).ready(function() {
    $('#form_editpetugas').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                username: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        
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
            url     : 'edit-petugas',
            data    : $('#form_editpetugas').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Berhasil memperbaharui data ! ');
                    reload_table();
                    $('#editpetugasmodal').modal('hide');
                }else{
                    toastr.error('Terjadi kesalahan dalam pengisian data, mohon diulangi lagi !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
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
            url     : base_url+'web/valpa',
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
    $('#form_addp').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',
        fields: {
                username: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        
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
            url     : 'add-petugas',
            data    : $('#form_addp').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Berhasil menambah petugas ! ');
                    reload_table();
                    $('#add_petugas').modal('hide');
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
            url     : base_url+'web/edit-aprofil',
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



