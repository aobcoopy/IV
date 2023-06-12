<div class="modal fade" id="dialog_add_what_include" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_what_include" class="form-horizontal" role="form" onsubmit="fn.app.what_include.what_include.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add what_include</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
                        <select class="form-control" name="cbbDestination" id="cbbDestination">
                        <!--<option value="0">Choose Category</option>-->
                        <option value="1">Main</option>
                        <option value="2">Complimentary airport transfer</option>
                        <option value="3">Staff service inclusion</option>
                        <option value="4">Extra Charge</option>
                        <option value="5">Special Note</option>
                        <?php 
						/*$sql = $dbc->Query("select * from destinations where parent IS NULL order by name asc");
						while($row = $dbc->Fetch($sql))
						{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						}*/
						?>
                        </select>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txName" name="txName" autofocus ></textarea>
					</div>
				</div>
                <!--<div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.what_include.what_include.upload_photo()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo" name="path_photo">
							<input type="hidden" name="txt_photo" id="txt_photo" >
							<img src=""  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.what_include.what_include.remove_photo(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</div>
                    </div>
                </div>-->
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        
        

        <form id="form_add_photo" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.what_include.what_include.upload_photo_file()">UP</button>
        </form>
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
