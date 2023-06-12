<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	if($dbc->HasRecord("metatag","property=".$_REQUEST['id']))
	{
		$meta = $dbc->GetRecord("metatag","*","property=".$_REQUEST['id']);
		$prop = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
	}
	
?> 
<div class="modal fade" id="dialog_add_meta" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" > 
		<form id="form_edit_meta" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Meta Tag</h4>
      		</div>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tx_h1" name="tx_h1" value="<?php echo $meta['title']; ?>">
                            <span style="color:red;">Ex.1 Villa name - Beach, Destination</span><br>
                            Ex.2 Makata Villa - Kata, Phuket
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Descript</label>
                        <div class="col-sm-10">
                            <textarea  class="form-control" id="tx_Descript" name="tx_Descript"><?php echo base64_decode($meta['description'],true); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tx_Link" name="tx_Link" value="<?php echo $prop['ht_link']; ?>">
                        </div>
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.viewrate('<?php echo $_REQUEST['id'];?>');">View all</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_meta('<?php echo $_REQUEST['id'];?>');">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script tyle="text/javascript">
$(function(){
	$('#dialog_add_meta').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_add_meta").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_add_meta").modal('show');
});	

	
</script>
