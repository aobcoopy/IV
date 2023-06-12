<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?>
<div class="modal fade" id="dialog_edit_pricing" data-backdrop="static">
  	<div class="modal-dialog  "  >
		<form id="form_edit_property_photo_heightlight" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Highlight</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
			$decode = json_decode($photo['photo_hl'],true);
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
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_long()">Upload</button>
                            <font color="#ff0000"> 1920 x 700 px</font>
                            <br>
                            <input type="hidden" id="tx_long" name="tx_long" class="form-control" value="<?php echo $decode['long'];?>"><br>
                            <img src="<?php echo ($decode['long']!='')?$decode['long']:'../../../../files/photo slide.png';?>" id="long" width="100%">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_short()">Upload</button>
                            <font color="#ff0000"> 768 x 700 px</font>
                            <br>
                            <input type="hidden" id="tx_short" name="tx_short" class="form-control" value="<?php echo $decode['short'];?>"><br>
                            <img src="<?php echo ($decode['short']!='')?$decode['short']:'../../../../files/mini.png';?>" id="short" width="100%">
                            
                        </div>
                    </div>
                   
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_photo_book_heightlight();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_add_hl_long" class="hidden">
            <input id="f_long" name="file" type="file">
            <button type="button" id="btn_upp_long" onClick="fn.app.properties.properties.upload_long_file()">UP</button>
        </form>
        <form id="form_add_hl_short" class="hidden">
            <input id="f_short" name="file" type="file">
            <button type="button" id="btn_upp_short" onClick="fn.app.properties.properties.upload_short_file()">UP</button>
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