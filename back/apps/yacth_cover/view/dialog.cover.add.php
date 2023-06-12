<div class="modal fade" id="dialog_add_cover" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_cover" class="form-horizontal" role="form" onsubmit="fn.app.cover.cover.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add cover</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Page</label>
					<div class="col-sm-10">
						<!--<input type="text" class="form-control" id="txTitle" name="txTitle" >-->
                        <select name="txTitle" id="txTitle" class="form-control" >
                        	<option value="villas">Collection--villas</option>
                            <option value="service">Our Service--service</option>
                            <option value="forrent">For Rent--forrent</option>
                            <option value="blog">Blog & Lifestyle--blog</option>
                            <option value="faq">Faq--faq</option>
                            <option value="contact">Contact--contact</option>
                            <option value="about">About Us--about</option>
                        </select>
					</div>
				</div>
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.cover.cover.upload_photo()">Upload</button>
                            <font color="#ff0000"> 1920 x 600 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-10 phof">
							<input type="hidden" class="paths" id="path_photo" name="path_photo">
							<input type="hidden" name="txt_photo" id="txt_photo" >
							<img src=""  width="100%" class=" phos">
							<!--<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.cover.cover.remove_photo(this);">
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
            <button type="button" id="btn_upp" onClick="fn.app.cover.cover.upload_photo_file()">UP</button>
        </form>
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
