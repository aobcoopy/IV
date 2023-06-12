<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$faqs = $dbc->GetRecord("faq","*","id=".$_REQUEST['id'])
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.faqs.faqs.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $faqs['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Group</h4>
      		</div>
		    <div class="modal-body">
				<?php /*?><div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">faqs Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Group Name" value="<?php echo $faqs['name'];?>">
					</div>
				</div><?php */?>
                <div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Title</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Title" value="<?php echo $faqs['name'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Name</label>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" id="txtName" name="txtName" placeholder="Name"><?php echo base64_decode($faqs['detail'],true);?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-9">
                    	<select name="parent" id="parent" class="form-control">
                        	<!--<option value="NULL">Choose faqs</option>-->
                        <?php 
						$sql = $dbc->Query("select * from faq where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							$select = ($row['id']==$faqs['parent'])?'selected':'';
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
