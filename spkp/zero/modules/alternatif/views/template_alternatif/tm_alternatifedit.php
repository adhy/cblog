        <div id="page-wrapper">
            <div class="row row-breadcrumb">
                <ol class="breadcrumb">
                    <li class="capitalize"><?php echo anchor('dashboard','Dashboard'); ?></li>             
                    <li class="capitalize"><?php echo anchor('alternatif','Alternatif'); ?></li>             
                    <li class="capitalize"><?php echo $title; ?></li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default content">
                        <div class="panel-heading">
						<i class="fa fa-user"></i>
							<span class="break"></span>
                            <?php echo 'Tambah Data '.$title; ?>
							
                        </div>
						   
                        <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#nama" data-toggle="tab">Alternatif <i class="fa"></i></a></li>
                                <li><a href="#s1" data-toggle="tab">Semester 1 <i class="fa"></i></a></li>
                                <li><a href="#s2" data-toggle="tab">Semester 2 <i class="fa"></i></a></li>
                                <li><a href="#minat" data-toggle="tab">IQ dan Minat <i class="fa"></i></a></li>
                            </ul>
                            <?php   $attributes = array('class' => 'form-horizontal', 'id' => 'form_edita');
                                echo form_open_multipart('alternatif/addprocess',$attributes);                                
                                ?>
                                <div class="tab-content">
                                <?php foreach($alternatif->result() as $row){ ?>
                                <div class="tab-pane active" id="nama">
                                    <p></p>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Alternatif</label>
                                        <div class="col-sm-4">
                                            <input type="text" value="<?=$row->nm_alternatif?>" class="form-control fc" name="nmalternatif" autofocus="" autocomplete="off" placeholder="Nama Alternatif">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="s1">
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
                                    <div class="tab-pane" id="s2">
                                    <p></p>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Matematika</label>
                                            <div class="col-sm-4" id="kkbagw9">
                                                <select data-rel="chosen" class="kkbagw9 form-control" name="kkbag11" id="selectErrorr" >
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
                                    <div class="tab-pane" id="minat">
                                    <p></p>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Hasil tes IQ</label>
                                        <div class="col-sm-4" id="kkbagw21">
                                            <select data-rel="chosen" class="kkbagw21 form-control" name="kkbag21" id="selectErrorr">
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
                                    <?php } ?>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary" value="Submit">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="form_adda" value="Submit">Simpan</button>
                                    </div>
                                </div>
                                </form>
                             </div>
                        </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->