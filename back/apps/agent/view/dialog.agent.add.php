<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_add_agent" data-backdrop="static">
  	<div class="modal-dialog" style="width:70%;">
		<form id="form_add_agent" class="form-horizontal" role="form" onsubmit="fn.app.agent.agent.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add agent</h4>
      		</div>
		    <div class="modal-body">
            
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Agent Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txName" name="txName" autofocus>
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Website </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWebsite " name="txWebsite">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Contact Person</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txContact_Person" name="txContact_Person">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Phone Number</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txPhone_Number" name="txPhone_Number">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Whatsapp Contact</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWhatsapp " name="txWhatsapp">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Line</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txLine" name="txLine">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">WeChat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWeChat" name="txWeChat">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Billing Contact</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txBilling" name="txBilling">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Reservation</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txReservation" name="txReservation">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Commission</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txCommission" name="txCommission">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Taxes and Service Charge</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txTaxes" name="txTaxes">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Payment Terms</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txPayment" name="txPayment">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Bank Details</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control editor" id="tx_Bank" name="tx_Bank"></textarea>
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
