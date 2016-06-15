<form id="maddcafo" method="post" class="form-horizontal">
      <div class="modal-body">
        
            <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-5">
                    <input type="text" class="form-control" name="option[]" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <!-- The option field template containing an option field and a Remove button -->
            <div class="form-group hide" id="optionTemplate">
                <div class="col-xs-offset-3 col-xs-5">
                    <input class="form-control" type="text" name="option[]" />
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                </div>
            </div>


            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form> 