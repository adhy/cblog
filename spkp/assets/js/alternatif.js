$(document).ready(function() {
    table = $('#tabelalternatif').DataTable( {
        "searching": false,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "alternatif/view-tabel",
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
function del_al(id,link){
    $.ajax({
            type    : "POST",
            url     : 'alternatif/hapus-alternatif',
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
function add_modalal() {
    $.ajax({
            type    : "POST",
            url     : base_url+'alternatif/tambah',
            dataType: 'html',
            success : function(response){
                $("#addmodal").modal("show").on('shown.bs.modal');
                $('#tampil').html(response);
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

function edit_modalal(id) {
    $.ajax({
            type    : "POST",
            url     : base_url+'alternatif/getedit',
            data    : {nomer:id},
            dataType: 'html',
            success : function(response){
                $("#editmodal").modal("show").on('shown.bs.modal');
                $('#tampiledit').html(response);
            }
        });
}


