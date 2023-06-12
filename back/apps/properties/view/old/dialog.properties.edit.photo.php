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
  	<div class="modal-dialog  "  style="width:90%;">
		<form id="form_edit_property_photo" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Photo</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
			?>
		    <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_photo()">Upload</button>
                            <font color="#ff0000"> 670 x 350 px</font>
                        </div>
                    </div>
                    <div class="thumbs_photo">
                    <?php 
					$decode = json_decode($photo['photo'],true);
					foreach($decode as $img)
					{
                       echo '<div class="col-md-2 pho">';
							echo '<input type="hidden" class="paths" name="path_photo" value="'.$img['img'].'">';
							echo '<input type="hidden" name="txt_photo" value="'.$img['img'].'">';
							echo '<img src="'.$img['img'].'"  width="100%" class="img-thumbnail pho">';
							echo '<input type="text" name="txt_photo_name" value="'.$img['name'].'" class="form-control">';
							echo '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.properties.properties.remove_photo_file(this);">';
								echo '<i class="fa fa-times" aria-hidden="true"></i>';
								echo '<input type="hidden" class="paths" name="path_photo" value="'.$img['img'].'">';
							echo '</button>';
						echo '</div>';
					}
					?>
                    </div>
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_photo_book();">Save</button>
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
	$('#dialog_edit_pricing').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_pricing").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_pricing").modal('show');
});	

	
</script>