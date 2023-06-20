<div class="modal fade" id="dialog_add_destination" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_destination" class="form-horizontal" role="form" onsubmit="fn.app.destination.destination.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add destination</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txName" name="txName" autofocus >
                    </div>
                </div>
                <div class="form-group">
					<label for="txtSlug" class="col-sm-2 control-label">URL Slug</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txSlug" name="txSlug" autofocus >
					</div>
				</div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-4">
                        <select name="txCountry_edit" id="txCountry_edit" class="form-control">
                            <option value="">-- select country --</option>
                            <?php 
                            $sql_country = $dbc->Query("select * from countries_available where publish = '1' ORDER BY name");
                            while($r_country = $dbc->Fetch($sql_country))
                            {
                                //$actt = ($destination['country']==$r_country['id'])?'selected':'';
                                echo '<option value="'.$r_country['id'].'">'.$r_country['name'].'</option>';
                            }
                            ?>
                           
                        </select>
                    </div>
                </div>                
                <!--<div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.destination.destination.upload_photo()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo" name="path_photo">
							<input type="hidden" name="txt_photo" id="txt_photo" >
							<img src=""  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.destination.destination.remove_photo(this);">
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
            <button type="button" id="btn_upp" onClick="fn.app.destination.destination.upload_photo_file()">UP</button>
        </form>
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
