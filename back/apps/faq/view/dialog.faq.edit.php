<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$subfaq = $dbc->GetRecord("faq","*","id=".$_REQUEST['id'])
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.faq.faq.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $subfaq['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Group</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Group Name" value="<?php echo $subfaq['name'];?>">
					</div>
				</div>
                <?php /*?><div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
                    	<select name="parent" id="parent" class="form-control">
                        	<option value="NULL">Choose subfaq</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							$select = ($row['id']==$subfaq['parent'])?'selected':'';
							echo '<option value="'.$row['id'].'" '.$select.'>'.$row['name'].'</option>';
						}
						?>
                        </select>
						
					</div>
				</div><?php */?>
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
