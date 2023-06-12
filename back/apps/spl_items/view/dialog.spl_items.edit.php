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
	
	$spl_items = $dbc->GetRecord("spl_items","*","id=".$_REQUEST['id']);
//	$photo = json_decode($spl_items['photo'],true);
//	//$photo = imagePath($photo);
//    $coverphoto = json_decode($spl_items['cover'],true);
//	//$coverphoto = imagePath($coverphoto);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_slide" class="form-horizontal" role="form" onsubmit="fn.app.spl_items.spl_items.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $spl_items['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit Category</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tx_name_edit" name="tx_name_edit" value="<?php echo $spl_items['name'];?>" >
                    </div>
                </div>
				<div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Unit</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tx_unit_edit" name="tx_unit_edit" placeholder="830ml."  value="<?php echo $spl_items['unit'];?>"  onclick="fn.app.spl_items.sel(this);" onblur="fn.app.spl_items.matches(this,'tx_unit_type_edit');">
                    </div>
                    
                    <div class="col-sm-4">
                        <label class="sr-only" for="exampleInputAmount"></label>
                        <div class="input-group">
                            <div class="input-group-addon">/</div>
                            <input type="text" class="form-control" id="tx_unit_type_edit" name="tx_unit_type_edit" placeholder="bottle"  value="<?php echo $spl_items['unit_type'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tx_price_edit" name="tx_price_edit" placeholder="0.00"  value="<?php echo $spl_items['price'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name="cbb_cate_edit" id="cbb_cate_edit" class="form-control" >
                        <?php 
                        $sql = $dbc->Query("select * from spl_category where status > 0 order by name asc");
                        while($row = $dbc->Fetch($sql))
                        {
							$act = ($spl_items['category']==$row['id'])?'selected':'';
                            echo '<option value="'.$row['id'].'" '.$act.'>'.$row['name'].'</option>';
                        }
                        ?>
                        </select>
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
            <button type="button" id="btn_upp2" onClick="fn.app.spl_items.spl_items.upload_photo_file_edit()">UP</button>
        </form>
        
        <form id="form_edit_coverphoto" class="hidden">
            <input id="f_coverPhoto_edit" name="file" type="file">
            <button type="button" id="btn_coverupp2" onClick="fn.app.spl_items.spl_items.upload_coverphoto_file_edit()">UP</button>
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