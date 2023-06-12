<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$subcategory = $dbc->GetRecord("categories","*","id=".$_REQUEST['id'])
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.subcategory.subcategory.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $subcategory['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Group</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Subcategory Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Group Name" value="<?php echo $subcategory['name'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-9">
                    	<select name="parent" id="parent" class="form-control">
                        	<!--<option value="NULL">Choose subcategory</option>-->
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							$select = ($row['id']==$subcategory['parent'])?'selected':'';
							echo '<option value="'.$row['id'].'" '.$select.'>'.$row['name'].'</option>';
						}
						?>
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
