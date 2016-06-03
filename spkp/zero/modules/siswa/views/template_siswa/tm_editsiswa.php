<form id="form_editsis" method="post" class="form-horizontal" enctype="multipart/form-data">
<?php foreach ($cek->result() as $row) { 
$tgl     =   date('d/m/Y', strtotime(str_replace('/', '-', $row->tgl_lahir)));

    ?>

<div class="modal-body">
         <div class="form-group">
            <label class="col-sm-3 control-label">NIS</label>
            <div class="col-sm-6">
                <input type="text" name="get" autofocus="" id="get" value="<?=$row->id_siswa?>" autocomplete="off" placeholder="NIS" hidden>
                <input type="text" class="form-control fc" name="nis" autofocus="" value="<?=$row->nis?>" id="nis" autocomplete="off" placeholder="NIS" readonly="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Siswa</label>
            <div class="col-sm-6">
                <input type="text" class="form-control fc" name="nmsis" autofocus="" value="<?=$row->nm_siswa?>" id="nms" autocomplete="off" placeholder="NNama Siswa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-6 date">
                <div class="input-group input-append date" id="datePickeredit">
                    <input type="text" class="form-control" name="dateedit" value="<?=$tgl?>" id="tanggal" />
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Wali Siswa</label>
            <div class="col-sm-6">
                <input type="text" class="form-control fc" name="walisis" autofocus="" value="<?=$row->walisiswa?>" id="wls" autocomplete="off" placeholder="Wali Siswa">
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary" name="form_editsis">Simpan</button>
</div>
<?php } ?>
</form>
<script>
    $(document).ready(function() {
    $('#tanggal')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#form_editsis').formValidation('revalidateField', 'dateedit');
        });
    $('#form_editsis').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',

        fields: {
            nis: { validators: { notEmpty: {  }, integer: {   } } },
            get: { validators: {  } },
            nmsis: { validators: { notEmpty: {  } } },
            dateedit: { validators: {  notEmpty: { }, date: {  format: 'MM/DD/YYYY',  } }  },
            walisis: { validators: { notEmpty: {  } } }
        }
    })


    .on('success.form.fv', function(e) {
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'siswa/ubah-siswa',
            data    : $('#form_editsis').serialize(),
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                    $('#editsiswamodal').modal('hide');
                    reload_table();
                    toastr.success('Berhasil memperbaharui data siswa dengan nis : '+response.sum+'');
                   $('#form_editsis').remove();
                }else{
                    $('#editsiswamodal').modal('hide');
                    toastr.error('Kesalahan pada pengisian data siswa !');
                    reload_table();
                     $('#form_editsis').remove();
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});

</script>