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
	
	
?>
<div class="modal fade" id="dialog_edit_pricing" data-backdrop="static">
  	<div class="modal-dialog  modal-lg"  >
		<form id="form_edit_floor" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Floor Plan</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
			$decode = json_decode($photo['plan'],true);
			
            if($decode != '') $decode = imagePath($decode);
			?>
		    <div class="modal-body">
                <div class="col-md-12">
                    <!--<div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_photo()">Upload</button>
                            <font color="#ff0000"> 670 x 350 px</font>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
							<?php //Edit by parinyimz 20192012?>
							
                            <input type="hidden" id="format_photo_name" name="format_photo_name" value="<?php echo format_photo($photo["name"]);?>">
                            <!--<input type="hidden" id="format_photo_name" name="format_photo_name" value="test">-->
                            
							<?php //echo format_photo($photo["name"]);?>
                            <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_floor()">Upload</button>
                            <font color="#ff0000"> 1536 x 864 px</font>
                            <br>
                           <input type="hidden" id="tx_floor" name="tx_floor" class="form-control" value="<?php echo $decode2;?>"><br>
                            <input type="hidden" id="tx_floor2" name="tx_floor2" class="form-control" value="<?php echo $decode2;?>"><br>
                             <?php /*?><img src="<?php echo ($decode!='')?$decode:'../../../../upload/photo.jpg';?>" id="img_floor" width="100%"><br>
                            
                            <?php 
							if($decode!='')
							{
								$sh = 'display:block;';
							}
							else
							{
								$sh = 'display:none;';
							}
							?>
                            <button type="button" class="btn btn-danger but_remove" style="width:100%;<?php echo $sh;?>" onClick="remove_fl_photo()"><i class="fa fa-times" aria-hidden="true"></i></button><?php */?>
                            
                        </div>
                    </div>
                    
                    <!--["/upload/property/villa-dove-chaweng-beach-koh-samui1588928354.jpg","/upload/property/villa-dove-chaweng-beach-koh-samui1588928354.jpg","https://media.inspiringvillas.com/prd/upload/property/villa-dove-chaweng-beach-koh-samui1588928354.jpg"]-->
                    <div class="box_pho">
                    <?php
                    $pho_dec = json_decode($photo['plan'],true);
					
					if(is_array($pho_dec))
					{
						foreach($pho_dec as $img)
						{?>
							<div class="col-md-4 top15"><?php //echo '>>'.imagePath($img);?>
								<img src="<?php echo ($img!='')?($img):'../../../../upload/photo.jpg';?>" id="img_floor" width="100%"><br>
								<input type="hidden" id="tx_floor" name="tx_floor[]" class="form-control" value="<?php echo $img;?>">
								<?php 
								if($decode!='')
								{
									$sh = 'display:block;';
								}
								else
								{
									$sh = 'display:none;';
								}
								?><br>
								<button type="button" class="btn btn-danger but_remove" style="width:100%;<?php echo $sh;?>" onClick="remove_fl_photo(this);"><i class="fa fa-times" aria-hidden="true"></i></button>
							</div>
							<?php
						}
					}
					else
					{
						?><div class="col-md-4 top15"><?php //echo '>>'.imagePath($img);?>
								<img src="<?php echo ($decode!='')?($decode):'../../../../upload/photo.jpg';?>" id="img_floor" width="100%"><br>
								<input type="hidden" id="tx_floor" name="tx_floor[]" class="form-control" value="<?php echo $decode;?>">
								<?php 
								if($decode!='')
								{
									$sh = 'display:block;';
								}
								else
								{
									$sh = 'display:none;';
								}
								?><br>
								<button type="button" class="btn btn-danger but_remove" style="width:100%;<?php echo $sh;?>" onClick="remove_fl_photo(this);"><i class="fa fa-times" aria-hidden="true"></i></button>
							</div>
                            <?php
					}
					//echo $decode;
					?>
                    </div>
                    
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_photo_floor();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_add_floor" class="hidden">
            <input id="f_floor" name="file" type="file">
            <button type="button" id="btn_upp_floor" onClick="fn.app.properties.properties.upload_floor_file()">UP</button>
        </form>
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
.top15
{
  margin-top:15px;
}
</style>
<script>
  $(function() {
	$( ".box_pho" ).sortable();
	$( ".box_pho" ).disableSelection();
  });
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_pricing').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_pricing").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_pricing").modal('show');
});	

function remove_fl_photo(me)
{
	$.ajax({
	   url: "apps/properties/xhr/action-remove-photo-fl.php",
	   data: {
		   txtID : $("#txtID").val(),
		   tx_floor2 : $(me).parent().find('#tx_floor').val()
		   },//$("#form_edit_floor").serialize(),
	   type: "POST",
	   dataType: "html",
	   success: function(html){
		   	$(me).parent().remove();
		   /*$("#tx_floor,#tx_floor2").val('');
		   $("#img_floor").attr('src','../../../../upload/photo.jpg');
		   $(".but_remove").remove();*/
	   }
   });
	''
}
</script>