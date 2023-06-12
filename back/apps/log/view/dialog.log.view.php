<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$log = $dbc->GetRecord("logs","*","log_id=".$_REQUEST['id'])
?>
<div class="modal fade" id="dialog_view_log" data-backdrop="static">
  	<div class="modal-dialog" style="width:80%">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Log Detail</h4>
      		</div>
		    <div class="modal-body">
				<pre>
				<?php
					print_r(json_decode($log['log_data'],true));
				?>
				</pre>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$('#dialog_view_log').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_view_log").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_view_log").modal('show');
});	
</script>
