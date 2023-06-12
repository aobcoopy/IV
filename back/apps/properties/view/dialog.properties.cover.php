<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	include_once "../../../inc/format_photo.php";
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?>
<div class="modal fade" id="dialog_edit_pricing" data-backdrop="static">
  	<div class="modal-dialog  "  >
		<form id="form_edit_cover" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Cover</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
            $decode = json_decode($photo['cover'],true);
			if($decode != '') $decode = imagePath($decode);
			?>
		    <div class="modal-body">
                <div class="col-md-12">
                    <!--<div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_photo()">Upload</button>
                            <font color="#ff0000"> 670 x 350 px</font>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
						<?php //Edit by parinyimz 20192012?>
						<input type="hidden" id="format_photo_name" name="format_photo_name" value="<?php echo format_photo($photo["name"]);?>">
						<?php //echo format_photo($photo["name"]);?>
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_cover()">Upload</button>
                            <font color="#ff0000"> 1920 x 600 px</font>
                            <br>
                            <input type="hidden" id="tx_cover" name="tx_cover" class="form-control" value="<?php echo $decode;?>"><br>
                            <img src="<?php echo ($decode!='' && $decode != S3_BUCKET_URL)?$decode:'../../../../files/cover.jpg';?>" id="imgcover" width="100%">
                            
                        </div>
                    </div>
                    
                   
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_photo_cover();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_add_cover" class="hidden">
            <input id="f_cover" name="file" type="file">
            <button type="button" id="btn_upp_cover" onClick="fn.app.properties.properties.upload_cover_file()">UP</button>
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
	$('#dialog_edit_pricing').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_pricing").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_pricing").modal('show');
});	

	
</script>