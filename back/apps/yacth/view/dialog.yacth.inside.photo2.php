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
	$img_8 = json_decode($yacth['img_8'],true);
	$img_9 = json_decode($yacth['img_9'],true);

	$path_8 = ($img_8!='')?'../../../../'.json_decode($yacth['img_8']):'';
	$path_9 = ($img_9!='')?'../../../../'.json_decode($yacth['img_9']):'';

	
	$image_8 = ($img_8!='')?'<img src="../../../../'.$img_8.'" class="img_8"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_8" width="100%">';
	$image_9 = ($img_9!='')?'<img src="../../../../'.$img_9.'" class="img_9"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_9" width="100%">';

	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_edit_slide" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="fn.app.yacth.yacth.save_photo_popup2(this);return false;">
		<input type="hidden" name="txtID" value="<?php echo $yacth['id'];?>">
        <input type="hidden" name="txtyname" value="<?php echo $yacth['name'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Photo Popup </h4>
      		</div>
		    <div class="modal-body">
                <?php  /*?><div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name : </label>
                    <div class="col-sm-10">
                        <?php echo $yacth['name'];?>
                    </div>
                </div><?php */?>
                
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_8');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_8!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_8;?>',this,'img_8','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo Thumbnail) 900 x 695 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_8" name="butUploadPhoto_8" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_8; ?>
                            <label class="custom-file-label img_8" for="img"><?php echo $img_8; ?></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_9');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_9!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_9;?>',this,'img_9','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo High Resolution) 5000 x 3864 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_9" name="butUploadPhoto_9" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_9; ?>
                            <label class="custom-file-label img_9" for="img"><?php echo $img_9; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                    </div>
                </div>
                
                
                
                
                
                <!--<div class="thumbs">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-md-10 phof">
                        
                        <input type="hidden" name="txt_photo" id="txt_photo" >
                        <img src=""  width="100%" class=" phos">
                    </div>
                </div>-->
                
		    </div>
			<div class="modal-footer">
            	
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <img style="display:none;" class="lo" src="../../../../upload/loading.gif" width="30" alt="">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
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