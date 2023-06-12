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
	
	$blog = $dbc->GetRecord("blogs","*","id=".$_REQUEST['id']);
	$photo = json_decode($blog['photo'],true);
	
	$img_photo_main = json_decode($blog['photo_main'],true);
	$img_photo_hl_1 = json_decode($blog['photo_hl_1'],true);
	$img_photo_hl_2 = json_decode($blog['photo_hl_2'],true);
	$img_photo_hl_3 = json_decode($blog['photo_hl_3'],true);
	$img_photo_width = json_decode($blog['photo_width'],true);
	$img_photo_high = json_decode($blog['photo_high'],true);
	$img_photo_sq = json_decode($blog['photo_sq'],true);
	//$img_9 = json_decode($blog['img_9'],true);

	$path_photo_main = ($img_photo_main!='')?'../../../../'.json_decode($blog['photo_main']):'';
	$path_photo_hl_1 = ($img_photo_hl_1!='')?'../../../../'.json_decode($blog['photo_hl_1']):'';
	$path_photo_hl_2 = ($img_photo_hl_2!='')?'../../../../'.json_decode($blog['photo_hl_2']):'';
	$path_photo_hl_3 = ($img_photo_hl_3!='')?'../../../../'.json_decode($blog['photo_hl_3']):'';
	$path_photo_width = ($img_photo_width!='')?'../../../../'.json_decode($blog['photo_width']):'';
	$path_photo_high = ($img_photo_high!='')?'../../../../'.json_decode($blog['photo_high']):'';
	$path_photo_sq = ($img_photo_sq!='')?'../../../../'.json_decode($blog['photo_sq']):'';
	//$path_9 = ($img_9!='')?'../../../../'.json_decode($blog['img_9']):'';

	
	$image_photo_main = ($img_photo_main!='')?'<img src="../../../../'.$img_photo_main.'" class="img_photo_main"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_main" width="100%">';
	$image_photo_hl_1 = ($img_photo_hl_1!='')?'<img src="../../../../'.$img_photo_hl_1.'" class="img_photo_hl_1"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_hl_1" width="100%">';
	$image_photo_hl_2 = ($img_photo_hl_2!='')?'<img src="../../../../'.$img_photo_hl_2.'" class="img_photo_hl_2"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_hl_2" width="100%">';
	$image_photo_hl_3 = ($img_photo_hl_3!='')?'<img src="../../../../'.$img_photo_hl_3.'" class="img_photo_hl_3"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_hl_3" width="100%">';
	$image_photo_width = ($img_photo_width!='')?'<img src="../../../../'.$img_photo_width.'" class="img_photo_width"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_width" width="100%">';
	$image_photo_high = ($img_photo_high!='')?'<img src="../../../../'.$img_photo_high.'" class="img_photo_high"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_high" width="100%">';
	$image_photo_sq = ($img_photo_sq!='')?'<img src="../../../../'.$img_photo_sq.'" class="img_photo_sq"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_photo_sq" width="100%">';
	//$image_9 = ($img_9!='')?'<img src="../../../../'.$img_9.'" class="img_9"  width="100%">':'<img src="../../../../upload/photo.jpg"  class="img_9" width="100%">';
	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->

<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" >
		<form id="form_edit_property" class="form-horizontal" role="form" enctype="multipart/form-data"  onsubmit="fn.app.blog.blog.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $blog['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Photo</h4><?php //echo $_SESSION['b_name'];?>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information_e" aria-controls="Information_e" role="tab" data-toggle="tab">Photo</a></li>
                    <!--<li role="presentation"><a href="#Photo_e" aria-controls="Photo_e" role="tab" data-toggle="tab">Photo</a></li>-->
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information_e">
                    	<div class="col-md-12">
                        
                        	<div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_main');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_main!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_main;?>',this,'img_photo_main','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 800 x 460 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_main" name="butUploadPhoto_photo_main" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_main; ?>
                                        <label class="custom-file-label img_photo_main" for="img"><?php echo $img_photo_main; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                        
                        	<div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_hl_1');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_hl_1!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_hl_1;?>',this,'img_photo_hl_1','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 534 x 468 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_hl_1" name="butUploadPhoto_photo_hl_1" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_hl_1; ?>
                                        <label class="custom-file-label img_photo_hl_1" for="img"><?php echo $img_photo_hl_1; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_hl_2');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_hl_2!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_hl_2;?>',this,'img_photo_hl_2','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 533 x 261 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_hl_2" name="butUploadPhoto_photo_hl_2" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_hl_2; ?>
                                        <label class="custom-file-label img_photo_hl_2" for="img"><?php echo $img_photo_hl_2; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_hl_3');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_hl_3!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_hl_3;?>',this,'img_photo_hl_3','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 800 x 598 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_hl_3" name="butUploadPhoto_photo_hl_3" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_hl_3; ?>
                                        <label class="custom-file-label img_photo_hl_3" for="img"><?php echo $img_photo_hl_3; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                            
                            
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_width');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_width!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_width;?>',this,'img_photo_width','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 1024 x 550 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_width" name="butUploadPhoto_photo_width" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_width; ?>
                                        <label class="custom-file-label img_photo_width" for="img"><?php echo $img_photo_width; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_high');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_high!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_high;?>',this,'img_photo_high','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 690 x 1024 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_high" name="butUploadPhoto_photo_high" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_high; ?>
                                        <label class="custom-file-label img_photo_high" for="img"><?php echo $img_photo_high; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.blog.blog.choose_photo_popup('butUploadPhoto_photo_sq');">Upload</button>
                                    <button type="button" class="btn btn-danger" <?php echo ($path_photo_sq!='')?'':'disabled';?> onClick="fn.app.blog.blog.remove_photo('<?php echo $path_photo_sq;?>',this,'img_photo_sq','<?php echo $_REQUEST['id'];?>');"><i class="fa fa-remove"></i></button>
                                    <!--<button type="submit" class="btn btn-primary pull-right">Save</button>-->
                                    <font color="#ff0000"> (Photo Size) 800 x 800 px</font>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input validate hidden" id="butUploadPhoto_photo_sq" name="butUploadPhoto_photo_sq" placeholder="img" onchange="fn.app.blog.blog.showImgPopup(this);">
                                        
                                        <input type="text" class="paths" id="path_photo" name="path_photo">
                                    </div>
                                    <div class="form-group row"><br>
                                        <div class="col-sm-6" id="preview-img">
                                        <?php echo $image_photo_sq; ?>
                                        <label class="custom-file-label img_photo_sq" for="img"><?php echo $img_photo_sq; ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <!--<img src="../../../../upload/layout1.jpg" width="50%" alt="">-->
                                </div>
                            </div>
                
                
                

						
                



                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div role="tabpanel" class="tab-pane" id="Photo_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                <?php //Edit by parinyimz 20192012?>
                                <input type="hidden" id="format_photo_name" name="format_photo_name" value="<?php echo format_photo_blog($blog['name']);?>">
                                <?php //echo format_photo($photo["name"]);?>
                                    <button type="button" class="btn btn-primary" id="btup" onClick="fn.app.blog.blog.upload_photo_edit()">Upload</button>
                                    <font color="#ff0000"> 1040 x 690 px</font>
                                </div>
                            </div>
                            <div class="thumbs_photo_edit">
                            <?php 
                            
                            foreach($photo as $img)
                            {
                                 echo '<div class="col-md-4 pho">';
                                    echo '<input type="hidden" class="paths" name="path_photo_e" value="'.$img.'">';
                                    echo '<input type="hidden" name="txt_photo_e[]" value="'.$img.'">';
                                    echo '<img src="'.imagePath($img).'"  width="100%" class="img-thumbnail pho">';
                                    echo '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.blog.blog.remove_photo_file(this);">';
                                        echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                        echo '<input type="hidden" class="paths" name="path_photo" value="'.$img.'">';
                                    echo '</button>';
                                echo '</div>';
                            }
                            ?>
                               
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div> <!-- Tab panes -->
            
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.blog.blog.upload_photo_file_edit()">UP</button>
        </form>
        
        <!--<form id="form_add_pdf_edit" class="hidden">
            <input id="f_pdf_edit" name="file" type="file">
            <button type="button" id="btn_upp_pdf_edit" onClick="fn.app.blog.blog.upload_pdf_file_edit()">UP</button>
        </form>-->
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function() {
	$( ".thumbs_photo_edit" ).sortable();
	$( ".thumbs_photo_edit" ).disableSelection();
  });
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
		<?php $_SESSION['b_name'] = $blog['name'];?>
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>
<!--<script>
	CKEDITOR.replace( 'txDetail_e', {
	  height: 300,
	  filebrowserUploadUrl: "apps/blog/upload.php"
 });
</script>-->