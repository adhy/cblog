
                      <form id="meditcafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                    <input id="enmc" type="text" class="form-control ipt-prof" name="category" autofocus="" value="" />
                </div>
            </div>
             <div class="form-group">
                <label class="col-xs-3 control-label">Parent</label>
                    <div class="col-xs-5 chosenContainer">
                        <select class="form-control chosen-select" name="parent" data-placeholder="-- Select a Parent --">
                           <?php if($cekidparnoze->num_rows()>0){
          //foreach ($cekidpar->result() as $rows){
                        foreach($cekidparzero->result() as $rowc):
                        $selectparent= " <option></option><option  value=".$rowc->id."'".$send->id==$rowc->id_parent ? ' selected="selected"' : ''.">".$rowc->nm_c."</option>";
                       endforeach;
                  // }                   
                }else{
                    foreach($cekidparzero->result() as $rowc):                                                                          
                    $selectparent=' <option></option><option value="'.$rowc->id.'">'.$rowc->nm_c.'</option>';
                  endforeach;
                } ?>
                        </select>
                    </div>
            </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="update" type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form> 