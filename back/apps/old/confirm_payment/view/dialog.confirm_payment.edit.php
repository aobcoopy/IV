
<?php
	//session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$orders = $dbc->GetRecord("confirm_payment","*","id=".$_REQUEST['id']);
?>

<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_editgroup" class="form-horizontal" role="form" >
		<input type="hidden" name="txtID" value="<?php echo $orders['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Payment detail</h4>
      		</div>
		    <div class="modal-body">
            	<img src="<?php echo $orders['photo'];?>" width="100%">
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--<button type="submit" class="btn btn-primary">Save</button>-->
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
.top6
{
	margin-top: 6px;
}
</style>

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

