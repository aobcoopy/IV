<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$quick_link = $dbc->GetRecord("quick_link_text","*","id=".$_REQUEST['id']);
	//$photo = json_decode($quick_link['icon'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_edit_quick_link" class="form-horizontal" role="form" onsubmit="fn.app.quick_link.quick_link.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $quick_link['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit quick_link</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group has-success">
                    <label for="txtName" class="col-sm-2 control-label">Url</label>
                    <div class="col-sm-10">
                    	<div class="input-group">
                    	<span class="input-group-addon">https://www.inspiringvillas.com</span>
                        <input type="text" class="form-control" id="txUrl_e" name="txUrl_e" autofocus  value="<?php echo $quick_link['link'];?>"  placeholder="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtShortName" class="col-sm-2 control-label">Text</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control editor" id="txText_e" name="txText_e"><?php echo base64_decode($quick_link['text'],true);?></textarea>
                    </div>
                </div>
                
                
                <?php /*?><div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.quick_link.quick_link.upload_photo_edit()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo $photo;?>"  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.quick_link.quick_link.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</div>
                    </div>
                </div><?php */?>
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.quick_link.quick_link.upload_photo_file_edit()">UP</button>
        </form>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>