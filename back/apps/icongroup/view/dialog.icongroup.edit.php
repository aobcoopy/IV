.<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$icongroup = $dbc->GetRecord("icon_group","*","id=".$_REQUEST['id']);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_icongroup" class="form-horizontal" role="form" onsubmit="fn.app.icongroup.icongroup.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $icongroup['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit icongroup</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $icongroup['name'];?>" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Group</label>
					<div class="col-sm-10">
						<select class="form-control" id="selGroup_e" name="selGroup_e" >
                        	<option value="1" <?php echo ($icongroup['igroup']==1)?'selected':'';?>>Facilities</option>
                            <option value="2" <?php echo ($icongroup['igroup']==2)?'selected':'';?>>Features</option>
                            <option value="3" <?php echo ($icongroup['igroup']==3)?'selected':'';?>>Appliances</option>
                            <option value="5" <?php echo ($icongroup['igroup']==5)?'selected':'';?>>Bedroom</option>
                        </select>
					</div>
				</div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
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