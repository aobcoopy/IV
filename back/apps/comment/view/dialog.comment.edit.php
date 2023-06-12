<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$comment = $dbc->GetRecord("rating","*","id=".$_REQUEST['id']);
	//$photo = json_decode($comment['icon'],true);
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog" style="width:70%;">
		<form id="form_edit_comment" class="form-horizontal" role="form" onsubmit="fn.app.comment.comment.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $comment['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit comment</h4>
      		</div>
		    <div class="modal-body">
            	
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txName" name="txName" autofocus  value="<?php echo $comment['name'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Email </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWebsite " name="txWebsite"  value="<?php echo $comment['email'];?>">
					</div>
				</div>
                
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Comment</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control " rows="10" id="tx_Comment" name="tx_Comment"><?php echo base64_decode($comment['text'],true);?></textarea>
                    </div>
				</div>
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <!--<form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.comment.comment.upload_photo_file_edit()">UP</button>
        </form>-->
       
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