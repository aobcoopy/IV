<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	include_once "../../../inc/format_photo.php";
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$spl_cate = $dbc->GetRecord("spl_category","*","id=".$_REQUEST['id']);
//	$photo = json_decode($spl_cate['photo'],true);
//	//$photo = imagePath($photo);
//    $coverphoto = json_decode($spl_cate['cover'],true);
//	//$coverphoto = imagePath($coverphoto);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_slide" class="form-horizontal" role="form" onsubmit="fn.app.spl_cate.spl_cate.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $spl_cate['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Category</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $spl_cate['name'];?>" >
                    </div>
                </div>
                
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.spl_cate.spl_cate.upload_photo_file_edit()">UP</button>
        </form>
        
        <form id="form_edit_coverphoto" class="hidden">
            <input id="f_coverPhoto_edit" name="file" type="file">
            <button type="button" id="btn_coverupp2" onClick="fn.app.spl_cate.spl_cate.upload_coverphoto_file_edit()">UP</button>
        </form>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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