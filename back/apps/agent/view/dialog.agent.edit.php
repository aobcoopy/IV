<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$agent = $dbc->GetRecord("agent","*","id=".$_REQUEST['id']);
	//$photo = json_decode($agent['icon'],true);
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog" style="width:70%;">
		<form id="form_edit_agent" class="form-horizontal" role="form" onsubmit="fn.app.agent.agent.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $agent['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit agent</h4>
      		</div>
		    <div class="modal-body">
            	
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Agent Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txName" name="txName" autofocus  value="<?php echo $agent['name'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Website </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWebsite " name="txWebsite"  value="<?php echo $agent['website'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Contact Person</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txContact_Person" name="txContact_Person"  value="<?php echo $agent['contact_person'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Phone Number</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txPhone_Number" name="txPhone_Number"  value="<?php echo $agent['phone'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Whatsapp Contact</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWhatsapp " name="txWhatsapp"  value="<?php echo $agent['whatsapp'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Line</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txLine" name="txLine"  value="<?php echo $agent['line'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">WeChat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txWeChat" name="txWeChat"  value="<?php echo $agent['wechat'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Billing Contact</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txBilling" name="txBilling"  value="<?php echo $agent['billing'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Reservation</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txReservation" name="txReservation"  value="<?php echo $agent['reservation'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Commission</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txCommission" name="txCommission"  value="<?php echo $agent['commission'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Taxes and Service Charge</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txTaxes" name="txTaxes"  value="<?php echo $agent['tax'];?>">
					</div>
				<!--</div>
                <div class="form-group">-->
					<label for="txtName" class="col-sm-2 control-label">Payment Terms</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="txPayment" name="txPayment"  value="<?php echo $agent['payment_term'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Bank Details</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control editor" id="tx_Bank" name="tx_Bank"><?php echo base64_decode($agent['bank'],true);?></textarea>
                    </div>
				</div>
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.agent.agent.upload_photo_file_edit()">UP</button>
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