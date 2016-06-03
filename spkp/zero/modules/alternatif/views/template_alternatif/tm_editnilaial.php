<?php   $attributes = array('class' => 'form-horizontal', 'id' => 'form_edita');
echo form_open_multipart('alternatif/addprocess',$attributes);                                
?>
<div class="modal-body">
<ul class="nav nav-tabs">
    <li class="active"><a href="#namaedit" data-toggle="tab">Alternatif <i class="fa"></i></a></li>
    <li><a href="#s1edit" data-toggle="tab">Semester 1 <i class="fa"></i></a></li>
    <li><a href="#s2edit" data-toggle="tab">Semester 2 <i class="fa"></i></a></li>
    <li><a href="#minatedit" data-toggle="tab">IQ dan Minat <i class="fa"></i></a></li>
</ul>
 <?php foreach($tampilalter->result() as $row){ ?>
<div class="tab-content">

<div class="tab-pane active" id="namaedit">
            <p></p>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Alternatifa</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control fc" value="<?=$row->nm_alternatif?>" name="nmalternatif" autofocus="" autocomplete="off" placeholder="Nama Alternatif">
                </div>
            </div>
        </div>
        <div class="tab-pane" id="s1edit">
        <p></p>
        <div class="form-group">
            <label class="col-sm-3 control-label">Matematika</label>
            <div class="col-sm-4" id="kkbag1">
                <select data-rel="chosen" class="kbag1 form-control" name="kkbag1" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria1->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knmsa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Fisika</label>
            <div class="col-sm-4" id="kkbag2">
                <select data-rel="chosen" class="kkbag2 form-control" name="kkbag2" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria2->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knfsa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Kimia</label>
            <div class="col-sm-4" id="kkbag3">
                <select data-rel="chosen" class="kkbag3 form-control" name="kkbag3" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria3->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knksa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Biologi</label>
            <div class="col-sm-4" id="kkbag4">
                <select data-rel="chosen" class="kkbag4 form-control" name="kkbag4" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                     <?php foreach($kriteria4->result() as $code): ?> 
                        <option value="<?php echo $code->weight;?>"<?=$row->knbsa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                        <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Sejarah</label>
            <div class="col-sm-4" id="kkbag5">
                <select data-rel="chosen" class="kkbag5 form-control" name="kkbag5" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria5->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knsesa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Geografi</label>
            <div class="col-sm-4" id="kkbag6">
                <select data-rel="chosen" class="kkbag6 form-control" name="kkbag6" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria6->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->kngsa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ekonomi</label>
            <div class="col-sm-4" id="kkbag7">
                <select data-rel="chosen" class="kkbag7 form-control" name="kkbag7" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                     <?php foreach($kriteria7->result() as $code): ?> 
                        <option value="<?php echo $code->weight;?>"<?=$row->knesa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                        <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Sosiologi</label>
            <div class="col-sm-4" id="kkbag8">
                <select data-rel="chosen" class="kkbag8 form-control" name="kkbag8" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                     <?php foreach($kriteria8->result() as $code): ?> 
                        <option value="<?php echo $code->weight;?>"<?=$row->knsosa==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                        <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="s2edit">
    <p></p>
        <div class="form-group">
            <label class="col-sm-3 control-label">Matematika</label>
            <div class="col-sm-4" id="kkbagw9">
                <select data-rel="chosen" class="kkbagw9 form-control" name="kkbag11" id="selectErrorr"  >
                    <option value="" disabled selected>-- Select a menu --</option>
                   <?php foreach($kriteria9->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knmsb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Fisika</label>
            <div class="col-sm-4" id="kkbag12">
                <select data-rel="chosen" class="kkbag12 form-control" name="kkbag12" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                     <?php foreach($kriteria10->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knfsb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Kimia</label>
            <div class="col-sm-4" id="kkbag13">
                <select data-rel="chosen" class="kkbag13 form-control" name="kkbag13" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria11->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knksb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Biologi</label>
            <div class="col-sm-4" id="kkbag14">
                <select data-rel="chosen" class="kkbag14 form-control" name="kkbag14" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria12->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knbsb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Sejarah</label>
            <div class="col-sm-4" id="kkbag15">
                <select data-rel="chosen" class="kkbag15 form-control" name="kkbag15" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria13->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knsesb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Geografi</label>
            <div class="col-sm-4" id="kkbag16">
                <select data-rel="chosen" class="kkbag16 form-control" name="kkbag16" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria14->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->kngsb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ekonomi</label>
            <div class="col-sm-4" id="kkbag17">
                <select data-rel="chosen" class="kkbag17 form-control" name="kkbag17" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                     <?php foreach($kriteria15->result() as $code): ?> 
                        <option value="<?php echo $code->weight;?>"<?=$row->knesb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                        <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Sosiologi</label>
            <div class="col-sm-4" id="kkbag18">
                <select data-rel="chosen" class="kkbag18 form-control" name="kkbag18" id="selectErrorr" >
                    <option value="" disabled selected>-- Select a menu --</option>
                    <?php foreach($kriteria16->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->knsosb==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="minatedit">
    <p></p>
    <div class="form-group">
        <label class="col-sm-3 control-label">Hasil tes IQ</label>
        <div class="col-sm-4" id="kkbagw21">
            <select data-rel="chosen" class="kkbagw21 form-control" name="kkbag21" id="selectErrorr" >
                <option value="" disabled selected>-- Select a menu --</option>
                <?php foreach($kriteria17->result() as $code): ?> 
                    <option value="<?php echo $code->weight;?>"<?=$row->ktq==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Hasil MInat</label>
        <div class="col-sm-4" id="kkbag22">
            <select data-rel="chosen" class="kkbag22 form-control" name="kkbag22" id="selectErrorr" >
                <option value="" disabled selected>-- Select a menu --</option>
            <?php foreach($kriteria18->result() as $code): ?> 
                <option value="<?php echo $code->weight;?>"<?=$row->khm==$code->weight ? ' selected="selected"' : '';?>><?php echo $code->rangenilai; ?></option>                                                                         
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    </div>

</div>  
    <?php } ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary" name="form_edita">Simpan</button>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
    $('#form_edita')
            .find('[name="kkbag3"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag3');}).end()
            .find('[name="kkbag4"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag4');}).end()
            .find('[name="kkbag5"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag5');}).end()
            .find('[name="kkbag6"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag6');}).end()
            .find('[name="kkbag7"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag7');}).end()
            .find('[name="kkbag8"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag8');}).end()
            .find('[name="kkbag11"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag11');}).end()
            .find('[name="kkbag12"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag12');}).end()
            .find('[name="kkbag13"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag13');}).end()
            .find('[name="kkbag14"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag14');}).end()
            .find('[name="kkbag15"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag15');}).end()
            .find('[name="kkbag16"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag16');}).end()
            .find('[name="kkbag17"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag17');}).end()
            .find('[name="kkbag18"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag18');}).end()
            .find('[name="kkbag21"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag21');}).end()
            .find('[name="kkbag22"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag22');}).end()
            .find('[name="kkbag1"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag1');}).end()
            .find('[name="kkbag2"]').chosen({width: '100%'}).change(function(e){$('#form_edita').formValidation('revalidateField', 'kkbag2');}).end()
            .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: '',
            invalid: '',
            validating: ''
        },
        locale: 'id_ID',

        fields: {
            nmalternatif: { validators: { notEmpty: {  }, regexp: {regexp: /^[A-Z\s]+$/i, } } },
            kkbag1: {  validators: {  }  },
            kkbag2: {  validators: {  }  },
            kkbag3: { validators: {  } },
            kkbag4: { validators: {  } },
            kkbag5: { validators: {  } },
            kkbag6: { validators: {  } },
            kkbag7: { validators: {  } },
            kkbag8: { validators: {  } },
            kkbag11: { validators: {  } },
            kkbag12: { validators: {  } },
            kkbag13: { validators: {  } },
            kkbag14: { validators: {  } },
            kkbag15: { validators: {  } },
            kkbag16: { validators: {  } },
            kkbag17: { validators: {  } },
            kkbag18: { validators: {  } },
            kkbag21: { validators: {  } },
            kkbag22: { validators: {  } }

        }
    })
    // Called when a field is invalid
        .on('err.field.fv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
                .parent()
                .find('i')
                .removeClass('fa-check')
                .addClass('fa-times');
        })
        // Called when a field is valid
        .on('success.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                            .parent()
                            .find('i')
                            .removeClass('fa-check fa-times');

            // Check if all fields in tab are valid
            var isValidTab = data.fv.isValidContainer($tabPane);
            if (isValidTab !== null) {
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
             // Prevent form submission
        
        })

    .on('success.form.fv', function(e) {
        e.preventDefault();
        // Use Ajax to submit form data
        $.ajax({
            type    : "POST",
            url     : 'alternatif/postedit',
            data    : $('#form_edita').serialize(),
            dataType: 'json',
            success : function(response){
               if(response.msg == 'success'){
                    $('#editmodal').modal('hide');
                    reload_table();
                    toastr.success('Pembaharuan data berhasil !'+response.msg);
                }else{
                    toastr.error('Pembaharuan data belum berhasil !'+response.msg);
                    //window.location.href = 'dashboard.html';
                }
            }
        });
    });
});
</script>