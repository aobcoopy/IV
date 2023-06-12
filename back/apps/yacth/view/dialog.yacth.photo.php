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
	
	$yacth = $dbc->GetRecord("yacht","*","id=".$_REQUEST['id']);
	$photo = json_decode($yacth['photo'],true);
	//$photo = imagePath($photo);
    //$coverphoto = json_decode($yacth['cover'],true);
	//$coverphoto = imagePath($coverphoto);
	if($photo!='')
	{
		$image = '<img src="../../../../'.$photo.'"  width="100%">';
	}
	else
	{
		$image = '<img src="../../../../upload/photo.jpg"  width="100%">';
	}
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_edit_slide" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="fn.app.yacth.yacth.save_photo(this);return false;">
		<input type="hidden" name="txtID" value="<?php echo $yacth['id'];?>">
        <input type="hidden" name="txtyname" value="<?php echo $yacth['name'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Photo</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name : </label>
                    <div class="col-sm-10">
                        <?php echo $yacth['name'];?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo();">Upload</button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> 670 x 350 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="img" name="img" placeholder="img" onchange="fn.app.yacth.yacth.showImg(this);">
                            <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img">
                            <?php echo $image; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="thumbs">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-md-10 phof">
                        
                        <input type="hidden" name="txt_photo" id="txt_photo" >
                        <img src=""  width="100%" class=" phos">
                        <!--<button type="button" class="btn btn-danger bc" style="width:100%; display:none" onclick="fn.app.yacth_cover.yacth_cover.remove_photo(this);">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>-->
                    </div>
                </div>
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <?php /*?><form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.yacth.yacth.upload_photo_file_edit()">UP</button>
        </form>
        
        <form id="form_edit_coverphoto" class="hidden">
            <input id="f_coverPhoto_edit" name="file" type="file">
            <button type="button" id="btn_coverupp2" onClick="fn.app.yacth.yacth.upload_coverphoto_file_edit()">UP</button>
        </form><?php */?>
       
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