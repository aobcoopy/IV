<?php
if($dbc->HasRecord("yacth_cover","id=1"))
{
	$data = $dbc->GetRecord("yacth_cover","photo","id=2");
	if(json_decode($data['photo'])!='')
	{
		$path = '../../../../'.json_decode($data['photo']);
		$image = '<img src="../../../../'.json_decode($data['photo']).'"  width="100%">';
	}
	else
	{
		$path = '';
		$image = '<img src="../../../../upload/photo.jpg"  width="100%">';
	}
	
	
}
else
{
	$path = '';
	$image = '<img src="../../../../upload/photo.jpg"  width="100%">';
}
?><div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Background</h3>
	    </div>
	    <div class="panel-body">
	        
            <form id="form_add_yacth_cover" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="fn.app.yacth_cover.yacth_cover.add(this);return false;">
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" onClick="fn.app.yacth_cover.choose_photo();">Upload</button>
                        <button type="submit"id="bt_save" class="btn btn-primary pull-right">Save</button>
                        <font color="#ff0000"> 750 x 772 px</font>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hidden" id="img" name="img" placeholder="img" onchange="fn.app.yacth_cover.showImg(this);">
                            <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                            <!--<input type="text" class="paths" id="path_photo" name="path_photo">-->
                        </div>
                        <div class="form-group row"><br>
                            <div class="col-sm-6" id="preview-img">
                            <?php echo $image; ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger " <?php echo ($path!='')?'':'disabled';?> onClick="fn.app.yacth_cover.yacth_cover.remove_cover('<?php echo $path;?>');"><i class="fa fa-remove"></i></button>
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
                
            </form>
            
            
	    </div>
	</div>
</div>

<!--<form id="form_add_photo" class="hidden">
    <input id="f_Photo" name="file" type="file">
    <button type="button" id="btn_upp" onClick="fn.app.yacth_cover.yacth_cover.upload_photo_file()">UP</button>
</form>
-->


