<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$what_include = $dbc->GetRecord("what_include","*","id=".$_REQUEST['id']);
	//$photo = json_decode($what_include['icon'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_what_include" class="form-horizontal" role="form" onsubmit="fn.app.what_include.what_include.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $what_include['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit what_include</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Destination</label>
					<div class="col-sm-10">
                        <select class="form-control" name="cbbDestination_edit" id="cbbDestination_edit">
                        <option value="1" <?php echo ($what_include['cate']=='1')?'selected':'';?>>Main</option>
                        <option value="2" <?php echo ($what_include['cate']=='2')?'selected':'';?>>Complimentary airport transfer</option>
                        <option value="3" <?php echo ($what_include['cate']=='3')?'selected':'';?>>Staff service inclusion</option>
                        <option value="4" <?php echo ($what_include['cate']=='4')?'selected':'';?>>Extra Charge</option>
                        <option value="5" <?php echo ($what_include['cate']=='5')?'selected':'';?>>Special Note</option>
                        <?php 
						/*$sql = $dbc->Query("select * from what_include where parent IS NULL order by name asc");
						while($row = $dbc->Fetch($sql))
						{
							$act = ($row['id']==$what_include['parent'])?'selected':'';
							echo '<option value="'.$row['id'].'" '.$act.'>'.$row['name'].'</option>';
						}*/
						?>
                        </select>
					</div>
				</div>
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">what_include </label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" ><?php echo $what_include['name'];?></textarea>
					</div>
				</div>
                <?php /*?><div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.what_include.what_include.upload_photo_edit()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo $photo;?>"  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.what_include.what_include.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</div>
                    </div>
                </div><?php */?>
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.what_include.what_include.upload_photo_file_edit()">UP</button>
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