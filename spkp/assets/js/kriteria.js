$(document).ready(function() {
    table = $('#kriteria').DataTable( {
        "searching": false,
        "paging":   false,
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
function savedata(link,formid){

}
function updatek(formid,link){

}
function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax
}
function del_k(id,link){
    $.ajax({
            type    : "POST",
            url     : 'hapus-kriteria',
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
function add_modalk(id,link) {
    $('#save').attr('onclick', 'javascript:savedata("'+link+'","'+id+'")');
    
    $('#form_add').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'ambil-bobot',
            data    : "nomer="+id,
            dataType: 'json',
            success : function(response){
                $('#addmodal').find('form')[0].reset();
                if(response.msg == 'success'){
                    $("#weight").val(response.sum);
                }
                $("#addmodal").modal("show").on('shown.bs.modal');
            }
        });
}
function edit_modalk(id,link) {
    $('#update').attr('onclick', 'javascript:updatek("'+link+'","'+id+'")');
    
    $('#form_edit').formValidation('resetForm', true);
        $.ajax({
            type    : "POST",
            url     : 'ambil-nomer',
            data    : {nomer:id},
            dataType: 'json',
            success : function(response){
                $('#editmodal').find('form')[0].reset();
                if(response.msg == 'success'){            
                    $("#eweight").val(response.weight);
                    $("#enmkriteria").val(response.rangenilai);
                }
                $("#editmodal").modal("show").on('shown.bs.modal');
            }
        });
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
                weight: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            nmkriteria: {
                validators: {
                    notEmpty: {
                        
                    },
                    regexp: {
                        regexp: /^[A-Z\s]+$/i,
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
            url     : 'add-tabel',
            data    : $('#form_add').serialize(),
            dataType: 'json',
            success : function(response){
                if(response.msg == 'success'){
                    toastr.success('Data '+response.sum+' '+response.sim+' telah anda tambahkan ');
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
                eweight: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            },
            enmkriteria: {
                validators: {
                    notEmpty: {
                        
                    },
                    regexp: {
                        regexp: /^[A-Z\s]+$/i,
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
            url     : 'edit-tabel',
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