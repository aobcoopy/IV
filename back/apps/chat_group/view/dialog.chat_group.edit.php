<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$subchat_group = $dbc->GetRecord("messages","*","id=".$_REQUEST['id'])
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.chat_group.chat_group.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $subchat_group['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Question</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Question</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_Question_e" name="tx_Question_e" placeholder="Question" value="<?php echo $subchat_group['message'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Answer</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_Answer_e" name="tx_Answer_e" placeholder="Answer" value="<?php echo $subchat_group['answer'];?>">
					</div>
				</div>
                
                <?php /*?><div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
                    	<select name="parent" id="parent" class="form-control">
                        	<option value="NULL">Choose subchat_group</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							$select = ($row['id']==$subchat_group['parent'])?'selected':'';
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
