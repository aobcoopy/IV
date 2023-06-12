<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?>
<div class="modal fade" id="dialog_edit_pricing" data-backdrop="static">
  	<div class="modal-dialog  "  style="width:100%;">
		<form id="form_edit_property_photo" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Bedroom Photo</h4>
      		</div>
            <?php 
			$photo = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
			$base_status = 0;
			if($photo['br_status']==1)
			{
				$base_status = 1;
			}
			
			if($base_status==1)
			{
				$ph__desc = base64_decode($photo['bedroom_description'],true);
			}
			else
			{
				$ph__desc = $photo['bedroom_description'];
			}
			?>
		    <div class="modal-body">
            	
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Bedroom Description</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="txb_det" name="txb_det" ><?php echo $ph__desc;?></textarea>
                    </div>
                </div>
    
                <div class="col-md-6">
                	<h2>Select Photo</h2>
                    <?php /*?><div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary mybutt_bed" onClick="fn.app.properties.properties.upload_bedroom_photo()">Upload</button>
                            <font color="#ff0000"> 670 x 350 px</font>
                        </div>
                    </div><?php */?>
                    <div class="thumbs_photo">
                    <?php 
					
					$decode = json_decode($photo['photo'],true);
					$bedroom_photo = json_decode($photo['bedroom_photo'],true);
					//$ar_photo = array();
					$ar_bedroom = array();
					
					foreach($bedroom_photo as $img_1)
					{
						//array_push($ar_photo,$img_1['img']);
						$ar_photo[] = array(
							'img' => $img_1['img'],
							'name' => $img_1['name']
						);
					}
					/*echo '<pre>';
					print_r($ar_photo);
					echo '</pre>';*/
					
					foreach($bedroom_photo as $img_2)
					{
						array_push($ar_bedroom,$img_2['img']);
					}
					/*echo '<pre>';
					print_r($ar_bedroom);
					echo '</pre>';*/
					
					/*echo '<pre>';
					print_r($decode);
					echo '</pre>';*/
					
					if(count($decode)>0)
					foreach($decode as $img)
					{
                       echo '<div class="col-md-4 pho">';
					   		echo '<br>';
							
							$nex_1 = str_replace("/","_",$img['img']);
							$nex_2 = str_replace(".","_",$nex_1);
							$nex = 'b'.$nex_2;
							$pname = $img['name'];
					   		
							echo '<input type="hidden" class="paths" name="path_photo" value="'.$img['img'].'">';
							echo '<input type="hidden" name="txt_photo" value="'.$img['img'].'">';
							echo '<img src="'.imagePath($img['img']).'"  width="100%" class="img-thumbnail pho">';
							echo '<input type="hidden" class="ne_position_1"  value="'.$nex.'">';
							echo '<input type="text" class="form-control" name="pname" value="'.$img['name'].'" readonly>';
							//echo '<input type="text" name="txt_photo_name" value="'.$img['name'].'" class="form-control">';
							
							if(in_array($img['img'],$ar_bedroom))
							{
								?><button type="button" class="btn btn-info <?php echo $nex;?>" style="width:100%" onclick="add_photo_bedroom(this,'<?php echo $pname;?>');" disabled><?php
									echo '<i class="fa fa-plus" aria-hidden="true"></i>';
									echo '<input type="hidden" class="paths_bed" name="path_photo" value="'.$img['img'].'">';
									//echo '<input type="text" class="paths_bed" name="path_photo" value="'.$img['name'].'">';
								echo '</button>';
							}
							else
							{
								?><button type="button" class="btn btn-info <?php echo $nex;?>" style="width:100%" onclick="add_photo_bedroom(this,'<?php echo $pname;?>');" ><?php
								//echo '<button type="button" class="btn btn-info '.$nex.'" style="width:100%" onclick="add_photo_bedroom(this,\'$pname\');">';
									echo '<i class="fa fa-plus" aria-hidden="true"></i>';
									echo '<input type="hidden" class="paths_bed" name="path_photo" value="'.$img['img'].'">';
									//echo '<input type="text" class="paths_bed" name="path_photo" value="'.$img['name'].'">';
								echo '</button>';
							}
							
						echo '</div>';
					}
					
					?>
                    </div>
                </div>
                <div class="col-md-6">
                	<h2>Bedroom Photo</h2>
                    
                    <div class="thumbs_photo_2">
                    	<?php
						
						
						if(count($bedroom_photo)>0)
						foreach($bedroom_photo as $img)
						{
							$nex_1 = str_replace("/","_",$img['img']);
							$nex_2 = str_replace(".","_",$nex_1);
							$nex = 'b'.$nex_2;
							
							if($base_status==1)
							{
								$ph__name = base64_decode($img['name'],true);
							}
							else
							{
								$ph__name = $img['name'];
							}
							
						   echo '<div class="col-md-4 pho_2">';
								echo '<br>';
								echo '<input type="hidden" class="paths" name="path_photo" value="'.$img['img'].'">';
								echo '<input type="hidden" name="txt_photo" value="'.$img['img'].'">';
								echo '<img src="'.imagePath($img['img']).'"  width="100%" class="img-thumbnail pho">';
								echo '<input type="text" name="txt_photo_name" value="'.$ph__name.'" class="form-control">';
								echo '<input type="hidden" class="ne_position"  value="'.$nex.'">';
								echo '<button type="button" class="btn btn-danger" style="width:100%" onclick="remove_bedroom_pt(this);">';
									echo '<i class="fa fa-times" aria-hidden="true"></i>';
									echo '<input type="hidden" class="paths_bed" name="path_photo" value="'.$img['img'].'">';
								echo '</button>';
							echo '</div>';
						}
						?>
                    </div>
                    
                </div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary mybutt" onClick="fn.app.properties.properties.save_bedroom_photo();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_add_bedroom_photo" class="hidden">
            <input id="f_bedroom_photo" name="file" type="file">
            <button type="button" id="btn_upp_bedroom_photo" onClick="fn.app.properties.properties.upload_bedroom_photo_file()">UP</button>
        </form>
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function() {
	$( ".thumbs_photo_2" ).sortable();
	$( ".thumbs_photo_2" ).disableSelection();
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

function add_photo_bedroom(me,pname)
{
	var po_name='';
	if(pname!='')
	{
		 po_name = pname;
	}
	else
	{
		 po_name='';
	}
	var datas = $(me).find($('.paths_bed')).val();
	var posi_1 = $(me).parent().find($('.ne_position_1')).val();
	var a='';
	a+= '<div class="col-md-4 pho_2">';
		a+= '<br>';
		a+= '<input type="hidden" class="paths" name="path_photo" value="'+datas+'">';
		a+= '<input type="hidden" name="txt_photo" value="'+datas+'">';
		a+= '<img src="<?php echo S3_BUCKET_URL ?>'+datas+'"  width="100%" class="img-thumbnail pho">';
		a+= '<input type="text" name="txt_photo_name"  class="form-control" value="'+po_name+'">';
		a+= '<input type="hidden" class="ne_position"  value="'+posi_1+'">';
		a+= '<button type="button" class="btn btn-danger" style="width:100%" onclick="remove_bedroom_pt(this);">';
			a+= '<i class="fa fa-times" aria-hidden="true"></i>';
			a+= '<input type="hidden" class="paths" name="path_photo" value="'+datas+'">';
		a+= '</button>';
	a+= '</div>';
	
	$(".thumbs_photo_2").append(a);
	$(me).attr('disabled',true);
}
function remove_bedroom_pt(me)
{
	
	var posi = $(me).parent().find($('.ne_position')).val();
	//alert(posi);
	$('.'+posi).attr('disabled',false);
	$(me).parent().remove();
}
</script>