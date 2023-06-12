<div class="modal fade" id="dialog_add_icongroup" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_icongroup" class="form-horizontal" role="form" onsubmit="fn.app.icongroup.icongroup.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Icon group</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txTitle" name="txTitle" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Group</label>
					<div class="col-sm-10">
						<select class="form-control" id="selGroup" name="selGroup" >
                        	<option value="1">Facilities</option>
                            <option value="2">Features</option>
                            <option value="3">Appliances</option>
                            <option value="5">Bedroom</option>
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
