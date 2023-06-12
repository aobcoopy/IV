<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$booking = $dbc->GetRecord("contact_us","*","id=".$_REQUEST['id']);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" onsubmit="fn.app.booking.booking.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $booking['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>View Detail </h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Checkin</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="parth_edit" name="parth_edit" value="<?php echo $booking['checkin'];?>" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Checkout</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="parth_edit" name="parth_edit" value="<?php echo $booking['checkout'];?>" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Guest</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="parth_edit" name="parth_edit" value="<?php echo $booking['guest'];?>" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Children</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="parth_edit" name="parth_edit" value="<?php echo $booking['children'];?>" >
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" rows="10" id="parth_edit" name="parth_edit"  ><?php echo $booking['message'];?></textarea>
					</div>
				</div>
		    </div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" >Close</button>
               
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

