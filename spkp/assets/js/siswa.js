$(document).ready(function() {
    table = $('#tabelsiswa').DataTable( {
        "searching": true,
        "paging":   true,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "siswa/view-tabel",
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
//$('#editsiswamodal').modal({backdrop : 'static', keyboard : false});
function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax
}
function del_al(id,link){
    $.ajax({
            type    : "POST",
            url     : 'siswa/hapus-siswa',
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
function hapus_siswa(id,link){
    $.ajax({
            type    : "POST",
            url     : 'siswa/hapus-siswa',
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
function add_modalsiswa(id,bag) {
    $('#addsiswamodal').find('form')[0].reset();
    $('#form_addsis').formValidation('resetForm', true);
    var bag2=eval(1);
    var jumlah=eval(bag)+bag2;
    $("#addsiswamodal").modal("show").on('shown.bs.modal');
}
function add_nilaisiswa(id) {
    $.ajax({
            type    : "POST",
            url     : 'siswa/form-nilai',
            data    : {nomera:id},
            dataType: 'html',
            success : function(response){
                $("#addnilaisiswa").modal("show").on('shown.bs.modal');
                $('#tampil').html(response);
            }
        });
}

function edit_nilaisiswa(id) {
    $.ajax({
            type    : "POST",
            url     : 'siswa/formedit-nilai',
            data    : {nomera:id},
            dataType: 'html',
            success : function(response){
                $("#editnilaisiswa").modal("show").on('shown.bs.modal');
                $('#tampiledit').html(response);
            }
        });
}
function ganti(id,bag){
    var bag2=eval(1);
    var hasil2=eval(bag)+bag2;
    $.ajax({
            type    : "POST",
            url     : base_url+'alternatif/view-select',
            data    : {nomera:id},
            success : function(hasil){
                    $('.kbag'+bag).prop('disabled', true);
                    $('#kkbag'+bag).html(hasil);
                    $('.kbag'+bag).attr('onchange', 'javascript:ganti("'+hasil2+'","'+hasil2+'")');
                    $(".kbag"+bag).chosen();
            }
        });
}
function ganti1(id,bag){
    var bag2=eval(1);
    var hasil2=eval(id)+bag2;
    var bag3=eval(3);
    var hasil3=eval(id)+bag3;
    $.ajax({
            type    : "POST",
            url     : base_url+'alternatif/view-select1',
            data    : {nomera:id},
            success : function(hasil){
                    $('.kbag'+bag).prop('disabled', true);
                    $('#kkbag'+bag).html(hasil);
                    $('.kbag'+bag).attr('onchange', 'javascript:ganti1("'+hasil2+'","'+hasil3+'")');
                    $(".kbag"+bag).chosen();
            }
        });
}
function ganti2(id,bag){
    var bag2=eval(1);
    var hasil2=eval(id)+bag2;
    var bag3=eval(3);
    var hasil3=eval(id)+bag3;
    $.ajax({
            type    : "POST",
            url     : base_url+'alternatif/view-select2',
            data    : {nomera:id},
            success : function(hasil){
                    $('.kbag'+bag).prop('disabled', true);
                    $('#kkbag'+bag).html(hasil);
                    $('.kbag'+bag).attr('onchange', 'javascript:ganti2("'+hasil2+'","'+hasil3+'")');
                    $(".kbag"+bag).chosen();
            }
        });
}
function edit_modalsiswa(id) {
        $.ajax({
            type    : "POST",
            url     : 'siswa/ambil-siswa',
            data    : {nomer:id},
            dataType: 'html',
            success : function(response){
                    $('#form_editsis').remove();
                     $("#editsiswamodal").modal("show").on('shown.bs.modal');
                    $("#editsiswa").html(response);
            }
        });
}
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#form_addsis').formValidation('revalidateField', 'date');
        });
    $('#form_addsis').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',

        fields: {
            nis: { validators: { notEmpty: {  }, integer: {   },remote: {
                        message: 'Periksa Nomer Induk Siswa !',
                        url: 'siswa/ceknis',
                        type: 'POST'
                    } } },
            nmsis: { validators: { notEmpty: {  } } },
            date: { validators: {  notEmpty: { }, date: {  format: 'MM/DD/YYYY',  } }  },
            walisis: { validators: { notEmpty: {  } } }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'siswa/simpan-siswa',
            data    : $('#form_addsis').serialize(),
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                     $('#addsiswamodal').modal('hide').on('hidden.bs.modal');
                    reload_table();
                    toastr.success('Berhasil menambahkan siswa dengan nis : '+response.sum+'');
                }else{
                    toastr.error('Kesalahan pada pengisian data siswa !');
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});


