<div class="modal fade" id="dialog_add_quick_link" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_add_quick_link" class="form-horizontal" role="form" onsubmit="fn.app.quick_link.quick_link.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Quick Link</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group has-success">
                    <label for="txtName" class="col-sm-2 control-label">Url</label>
                    <div class="col-sm-10">
                    	<div class="input-group">
                    	<span class="input-group-addon">https://www.inspiringvillas.com</span>
                        <input type="text" class="form-control" id="txUrl" name="txUrl" autofocus  placeholder="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtShortName" class="col-sm-2 control-label">Text</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control editor" id="txText" name="txText"></textarea>
                    </div>
                </div>
                
               
                
                <!--<div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.quick_link.quick_link.upload_photo()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo" name="path_photo">
							<input type="hidden" name="txt_photo" id="txt_photo" >
							<img src=""  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.quick_link.quick_link.remove_photo(this);">
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
        
        
        

        <!--<form id="form_add_photo" class="hidden">-->
            <!--<input name="txtID" value="<?php echo $brand['id']?>" type="hidden">-->
            <!--<input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.quick_link.quick_link.upload_photo_file()">UP</button>
        </form>-->
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>