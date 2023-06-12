<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?> 
<!--rating-->
		<script type="text/javascript" src="libs/js/star-rating.js"></script>
        <!--rating-->
<link rel="stylesheet" type="text/css" id="theme" href="libs/css/star-rating.css"/>
<div class="modal fade" id="dialog_add_rate" data-backdrop="static">
  	<div class="modal-dialog  " > 
		<form id="form_edit_rate" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Rating</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
			?>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Rate</label>
                        <div class="col-sm-10">
                            <input id="input-4" name="input-4" class="rating rating-loading" data-step="1" data-show-clear="false" data-show-caption="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" id="tx_titler" name="tx_titler" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" id="tx_name" name="tx_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea id="tx_text-4" name="tx_text" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-10">
                            <input  type="month" id="tx_date_rate" name="tx_date_rate" class="form-control" placeholder="Date">
                        </div>
                    </div>
                </div>
                

		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.viewrate('<?php echo $_REQUEST['id'];?>');">View all</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_rate();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function() {
	$( ".thumbs_photo" ).sortable();
	$( ".thumbs_photo" ).disableSelection();
  });
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_add_rate').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_add_rate").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_add_rate").modal('show');
});	

	
</script>
