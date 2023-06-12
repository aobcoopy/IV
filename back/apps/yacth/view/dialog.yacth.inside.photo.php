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
	$img_1 = json_decode($yacth['img_1'],true);
	$img_2 = json_decode($yacth['img_2'],true);
	$img_3 = json_decode($yacth['img_3'],true);
	$img_4 = json_decode($yacth['img_4'],true);
	$img_5 = json_decode($yacth['img_5'],true);
	$img_6 = json_decode($yacth['img_6'],true);
	$img_7 = json_decode($yacth['img_7'],true);
	
	$path_1 = ($img_1!='')?'../../../../'.json_decode($yacth['img_1']):'';
	$path_2 = ($img_2!='')?'../../../../'.json_decode($yacth['img_2']):'';
	$path_3 = ($img_3!='')?'../../../../'.json_decode($yacth['img_3']):'';
	$path_4 = ($img_4!='')?'../../../../'.json_decode($yacth['img_4']):'';
	$path_5 = ($img_5!='')?'../../../../'.json_decode($yacth['img_5']):'';
	$path_6 = ($img_6!='')?'../../../../'.json_decode($yacth['img_6']):'';
	$path_7 = ($img_7!='')?'../../../../'.json_decode($yacth['img_7']):'';
	
	$image_1 = ($img_1!='')?'<img src="../../../../'.$img_1.'" class="img_1"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_1" width="100%">';
	$image_2 = ($img_2!='')?'<img src="../../../../'.$img_2.'" class="img_2"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_2" width="100%">';
	$image_3 = ($img_3!='')?'<img src="../../../../'.$img_3.'" class="img_3"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_3" width="100%">';
	$image_4 = ($img_4!='')?'<img src="../../../../'.$img_4.'" class="img_4"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_4" width="100%">';
	$image_5 = ($img_5!='')?'<img src="../../../../'.$img_5.'" class="img_5"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_5" width="100%">';
	$image_6 = ($img_6!='')?'<img src="../../../../'.$img_6.'" class="img_6"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_6" width="100%">';
	$image_7 = ($img_7!='')?'<img src="../../../../'.$img_7.'" class="img_7"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_7" width="100%">';	
	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_edit_slide" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="fn.app.yacth.yacth.save_photo_popup(this);return false;">
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
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_1');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_1!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_1;?>',this,'img_1','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.1) 228 x 280 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_1" name="butUploadPhoto_1" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_1; ?>
                            <label class="custom-file-label img_1" for="img"><?php echo $img_1; ?></label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout1.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_2');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_2!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_2;?>',this,'img_2','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.2) 228 x 96 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_2" name="butUploadPhoto_2" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_2; ?>
                            <label class="custom-file-label img_2" for="img"><?php echo $img_2; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout1.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_3');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_3!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_3;?>',this,'img_3','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.3) 228 x 180 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_3" name="butUploadPhoto_3" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_3; ?>
                            <label class="custom-file-label img_3" for="img"><?php echo $img_3; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout3.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_4');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_4!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_4;?>',this,'img_4','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.4) 251 x 145 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_4" name="butUploadPhoto_4" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_4; ?>
                            <label class="custom-file-label img_4" for="img"><?php echo $img_4; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout4.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                 <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_5');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_5!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_5;?>',this,'img_5','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.5) 168 x 116 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_5" name="butUploadPhoto_5" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_5; ?>
                            <label class="custom-file-label img_5" for="img"><?php echo $img_5; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout5.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_6');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_6!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_6;?>',this,'img_6','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.6) 168 x 116 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_6" name="butUploadPhoto_6" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_6; ?>
                            <label class="custom-file-label img_6" for="img"><?php echo $img_6; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout6.jpg" width="50%" alt="">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.choose_photo_popup('butUploadPhoto_7');">Upload</button>
                        <button type="button" class="btn btn-danger" <?php echo ($path_7!='')?'':'disabled';?> onClick="fn.app.yacth.yacth.remove_photo('<?php echo $path_7;?>',this,'img_7','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                        <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                        <font color="#ff0000"> (Photo No.7) 251 x 145 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_7" name="butUploadPhoto_7" placeholder="img" onchange="fn.app.yacth.yacth.showImgPopup(this);">
                            <label class="custom-file-label " for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img_1">
                            <?php echo $image_7; ?>
                            <label class="custom-file-label img_7" for="img"><?php echo $img_7; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                    	<img src="../../../../upload/layout7.jpg" width="50%" alt="">
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