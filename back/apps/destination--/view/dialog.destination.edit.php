<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$destination = $dbc->GetRecord("destinations","*","id=".$_REQUEST['id']);
	//$photo = json_decode($destination['icon'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_destination" class="form-horizontal" role="form" onsubmit="fn.app.destination.destination.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $destination['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit destination</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $destination['name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtSlug" class="col-sm-2 control-label">URL Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txSlug_edit" name="txSlug_edit" value="<?php echo $destination['slug'];?>">
                    </div>
                </div>
            	<div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-4">
                        <select name="txCountry_edit" id="txCountry_edit" class="form-control">
                            <?php 
                            $sql_country = $dbc->Query("select * from countries_available where publish = '1' ORDER BY name");
                            while($r_country = $dbc->Fetch($sql_country))
                            {
                                $actt = ($destination['country']==$r_country['id'])?'selected':'';
                                echo '<option value="'.$r_country['id'].'"'.$actt.'>'.$r_country['name'].'</option>';
                            }
                            ?>
                           
                        </select>
                    </div>
				</div>
                <?php /*?><div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.destination.destination.upload_photo_edit()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo $photo;?>"  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.destination.destination.remove_photo_edit(this);">
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
            <button type="button" id="btn_upp2" onClick="fn.app.destination.destination.upload_photo_file_edit()">UP</button>
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