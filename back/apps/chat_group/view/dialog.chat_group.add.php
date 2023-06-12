<div class="modal fade" id="dialog_add_chat_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_add_chat_group" class="form-horizontal" role="form" onsubmit="fn.app.chat_group.chat_group.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Question</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Question</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_Question" name="tx_Question" placeholder="Question">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Answer</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_Answer" name="tx_Answer" placeholder="Answer">
					</div>
				</div>
               <?php /*?> <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
                    	<select name="parent" id="parent" class="form-control">
                        	<option value="NULL">Choose subchat_group</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
	
</script>
