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
	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->

<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" >
		<form id="form_edit_property" class="form-horizontal" role="form" onsubmit="fn.app.blog.blog.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $blog['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit blog</h4><?php //echo $_SESSION['b_name'];?>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information_e" aria-controls="Information_e" role="tab" data-toggle="tab">Information</a></li>
                    <li role="presentation"><a href="#Photo_e" aria-controls="Photo_e" role="tab" data-toggle="tab">Photo</a></li>
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name (Title,H1)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName_e" name="txName_e" value="<?php echo $blog['name'];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Snippet</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txSnippet_e" name="txSnippet_e" ><?php echo base64_decode($blog['snippet']);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Brief (Meta Description)</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txBrief_e" name="txBrief_e" ><?php echo base64_decode($blog['brief']);?></textarea>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txShort_e" name="txShort_e" ><?php echo base64_decode($blog['short_det']);?></textarea>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDetail_e" name="txDetail_e" ><?php echo base64_decode($blog['detail']);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Sign</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txSign_e" name="txSign_e" value="<?php echo $blog['byname'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="txDate_e" name="txDate_e" value="<?php echo $blog['day'];?>">
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
                                    <font color="#ff0000"> 735 x 300 px</font>
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