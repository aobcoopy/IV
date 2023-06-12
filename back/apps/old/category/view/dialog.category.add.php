<div class="modal fade" id="dialog_add_category" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_category" class="form-horizontal" role="form" onsubmit="fn.app.category.category.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add subcategory</h4>
      		</div>
		    <div class="modal-body">
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="subcategory Name">
					</div>
				</div>
               <?php /*?> <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Parent</label>
					<div class="col-sm-10">
                    	<select name="parent" id="parent" class="form-control">
                        	<option value="NULL">Choose subcategory</option>
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
