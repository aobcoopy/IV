<div class="modal fade" id="dialog_add_invoice" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_invoice" class="form-horizontal" role="form" onsubmit="fn.app.invoice.invoice.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add invoice</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Villa name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txName" name="txName" autofocus >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Check In </label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tx_in" name="tx_in"  >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Check Out</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tx_out" name="tx_out"  >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Guest detail</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_guest" name="tx_guest"  >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="tx_price" name="tx_price"  >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Ref</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tx_ref" name="tx_ref"  >
					</div>
				</div>
                
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Comment</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="tx_comment" name="tx_comment"></textarea>
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
