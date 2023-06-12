<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$data_rate = $dbc->GetRecord("rating","*","id = '".$_REQUEST['id']."'");
	
?> 
<!--rating-->
		<script type="text/javascript" src="libs/js/star-rating.js"></script>
        <!--rating-->
<link rel="stylesheet" type="text/css" id="theme" href="libs/css/star-rating.css"/>
<div class="modal fade" id="dialog_edit_rate_detail" data-backdrop="static">
  	<div class="modal-dialog  " > 
		<form id="form_edit_rate_detail" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Rating</h4>
      		</div>
            
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Rate</label>
                        <div class="col-sm-10">
                            <input id="input-4_ed" name="input-4_ed" class="rating rating-loading" data-step="1" data-show-clear="false" data-show-caption="true"  value="<?php echo $data_rate['rate'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" id="tx_titler_ed" name="tx_titler_ed" class="form-control" placeholder="Title" value="<?php echo $data_rate['title'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input id="tx_name_ed" name="tx_name_ed" class="form-control" placeholder="Name" value="<?php echo $data_rate['name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea id="tx_text-4_ed" name="tx_text_ed" rows="10" class="form-control"><?php echo base64_decode($data_rate['text'],true);?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-10">
                            <input  type="month" id="tx_date_rate_ed" name="tx_date_rate_ed" class="form-control" placeholder="Date" value="<?php echo $data_rate['days'];?>">
                        </div>
                    </div>
                </div>
                

		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.viewrate('<?php echo $data_rate['property'];?>');">View all</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_edit_rate();">Save</button>
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
	$('#dialog_edit_rate_detail').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_rate_detail").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_rate_detail").modal('show');
});	

	
</script>
