<div class="modal fade" id="dialog_add_subcategory" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_subcategory" class="form-horizontal" role="form" onsubmit="fn.app.subcategory.subcategory.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Subcategory</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Subcategory Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Subcategory  Name">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-9">
                    	<select name="parent" id="parent" class="form-control">
                        	<option value="NULL">Choose category</option>
                        <?php 
						$sql = $dbc->Query("select * from categories where parent is null");
						while($row = $dbc->Fetch($sql))
						{
							echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
	
</script>
