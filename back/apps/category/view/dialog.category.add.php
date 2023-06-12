<div class="modal fade" id="dialog_add_category" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_category" class="form-horizontal" role="form" onsubmit="fn.app.category.category.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Category</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txTitle" name="txTitle" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Short Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txBrief" name="txBrief" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Filter Box</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txFilter" name="txFilter" >
                    </div>
                </div>                
                <div class="form-group">
					<label for="txtSlug" class="col-sm-2 control-label">URL Slug</label>
					<div class="col-sm-10">
					    <input type="text" class="form-control" id="txSlug" name="txSlug" >	
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Over allDetail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDetail" name="txDetail" ></textarea>
					</div>
				</div>
               <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Inside Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txInside" name="txInside" ></textarea>
					</div>
				</div>
                
                <div class="form-group"><!--Edit dupicate txTitle-->
					<label for="meta_title" class="col-sm-2 control-label">Meta Title</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="meta_title" name="meta_title" ></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H1</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH1" name="txH1" ></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H2</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH2" name="txH2" ></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Descript</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDescript" name="txDescript" ></textarea>
					</div>
				</div>
                
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.category.category.upload_photo()">Upload</button>
                            <font color="#ff0000"> 1200 x 779 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths" id="path_photo" name="path_photo">
							<input type="hidden" name="txt_photo" id="txt_photo" >
							<img src=""  width="100%" class=" phos">
							<!--<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.category.category.remove_photo(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Cover Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.category.category.upload_photo_cover()">Upload</button>
                            <font color="#ff0000"> 1200 x 779 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths_cover" id="path_photo_cover" name="path_photo_cover">
							<input type="hidden" name="txt_photo_cover" id="txt_photo_cover" >
							<img src=""  width="100%" class=" phos_cover">
							<!--<button type="button" class="btn btn-danger bc_cover" style="width:100%; display:none" onclick="fn.app.category.category.remove_photo_cover(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                </div>
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
            <button type="button" id="btn_upp" onClick="fn.app.category.category.upload_photo_file()">UP</button>
        </form>
        <form id="form_add_photo_cover" class="hidden">
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <input id="f_Photo_cover" name="file" type="file">
            <button type="button" id="btn_upp_cover" onClick="fn.app.category.category.upload_photo_file_cover()">UP</button>
        </form>
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
