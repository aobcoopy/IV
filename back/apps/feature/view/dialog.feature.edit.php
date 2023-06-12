.<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$feature = $dbc->GetRecord("icons","*","id=".$_REQUEST['id']);
	$photo = json_decode($feature['icon'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_feature" class="form-horizontal" role="form" onsubmit="fn.app.feature.feature.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $feature['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit feature</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $feature['name'];?>" readonly>
					</div>
				</div>
                <?php /*?><div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Group</label>
					<div class="col-sm-10">
						<select multiple  class="form-control" id="selGroup_e" name="selGroup_e" >
                        	<?php
							$sql = $dbc->Query("select * from icon_group where status > 0 and igroup = 2");
							while($row = $dbc->Fetch($sql))
							{
								$sele = ($feature['icon_group']==$row['id'])?'selected':'';
								echo '<option value="'.$row['id'].'" '.$sele.'>'.$row['name'].'</option>';
							}
							?>
                        </select>
					</div>
				</div><?php */?>
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.feature.feature.upload_photo_edit()">Upload</button>
                            <font color="#ff0000"> 128 x 128 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo imagePath($photo);?>"  width="100%" class=" phos">
							<!--<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.feature.feature.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
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
            <button type="button" id="btn_upp2" onClick="fn.app.feature.feature.upload_photo_file_edit()">UP</button>
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