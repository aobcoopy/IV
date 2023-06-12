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
	$high_light = json_decode($yacth['highlight'],true);
	//$photo = imagePath($photo);
    //$coverphoto = json_decode($yacth['cover'],true);
	//$coverphoto = imagePath($coverphoto);
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog modal-lg">
		<form id="form_edit_slide" class="form-horizontal" role="form" onsubmit="fn.app.yacth.yacth.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $yacth['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit</h4>
      		</div>
		    <div class="modal-body">
            
            
            <br><br><br>
                <div>
                
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Information</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Prefered Program</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Prefered Time</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content"><br>
                        <div role="tabpanel" class="tab-pane active" id="home">
                        	
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $yacth['name'];?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control " id="txDetail" name="txDetail" ><?php echo $yacth['detail'];?></textarea>
                                </div>
                            </div>
                            
                            <?php /*?><div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Highlight</label>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-info" onClick="fn.app.yacth.yacth.highlight('all_highlight');"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="all_highlight col-sm-10 col-sm-offset-2" style="margin-top:15px;">
                                <?php
                                if(count($high_light)>0)
                                {
                                    foreach($high_light as $hl)
                                    {?>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="txhighlight_edit" name="txhighlight_edit[]" value="<?php echo $hl;?>" >
                                            <i class="fa fa-remove i_remove" onClick="$(this).parent().remove();"></i>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                </div>
                            </div><?php */?>
                            
                            <?php /*?><div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDescription" name="txDescription" ><?php echo base64_decode($yacth['description'],true);?></textarea>
                                </div>
                            </div><?php */?>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-4">
                                    <input type="number" min="0" class="form-control" id="txPrice" name="txPrice"  value="<?php echo $yacth['price'];?>">
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Hours</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txHours_e" name="txHours_e"  value="<?php echo $yacth['hours'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <input  type="number" min="0" class="form-control" id="txBedroom" name="txBedroom"  value="<?php echo $yacth['bedroom_capacity'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Guest Maximum</label>
                                <div class="col-sm-10">
                                    <input  type="number" min="0" class="form-control" id="txGuest" name="txGuest"  value="<?php echo $yacth['maximum_capacity'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-10">
                                    <select name="cbb_destination_e" id="cbb_destination_e" class="form-control" onChange="fill_list(this);">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NULL order  by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            $act = ($line['id']==$yacth['destination'])?'selected':'';
                                            echo '<option value="'.$line['id'].'" '.$act.'>'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <script>
                            function fill_list(me)
							{
								var val = $(me).val();
								$("#cbb_marina").val(0);
								$("#cbb_marina").children('.mari').hide();
								$("#cbb_marina").children('.'+val).show();
							}
                            </script>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Marina Location</label>
                                <div class="col-sm-10">
                                    <select name="cbb_marina" id="cbb_marina" class="form-control">
                                    	<option value="0">Choose Marina Location</option>
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_marina where status > 0  order  by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            $act = ($line['id']==$yacth['marina'])?'selected':'';
                                            echo '<option class="mari '.$line['destination'].'" value="'.$line['id'].'" '.$act.'>'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Type of charter</label>
                                <br>
                                <div class="col-sm-10">
                                		<div class="checkbox-inline1 col-md-4">
                                            <label>
                                                <input type="radio" name="tx_tochar" value="0" checked> No
                                            </label>
                                        </div>
                                        <?php
                                        //$prefer = json_decode($yacth['type_of_charter'],true);
                                        $sql = $dbc->Query("select * from yacth_charter where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
											$act = ($line['id']==$yacth['type_of_charter'])?'checked':'';
                                            echo '<div class="checkbox-inline1 col-md-4">';
                                                echo '<label>';
                                                    echo '<input type="radio" name="tx_tochar" value="'.$line['id'].'" '.$act.'> '.$line['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Type of Yacht</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" step="0.1" class="form-control" id="txNoTOY_e" name="txNoTOY_e"  value="<?php echo $yacth['no_type_of_yacht'];?>">
                                </div>
                                <div class="col-sm-8">
                                    <select name="cbb_fleet" id="cbb_fleet" class="form-control">
                                    	
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_destination where status > 0 and fleet_type IS NOT NULL order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            $act = ($line['id']==$yacth['fleet'])?'selected':'';
                                            echo '<option value="'.$line['id'].'" '.$act.'>'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Sailing Route</label>
                                <div class="col-sm-10">
                                    <select name="cbb_sr" id="cbb_sr" class="form-control">
                                        <?php
                                        $sql = $dbc->Query("select * from yacth_sailing_route where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            $act = ($line['id']==$yacth['sailing_route'])?'selected':'';
                                            echo '<option value="'.$line['id'].'" '.$act.'>'.$line['name'].'</option>';	
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control" id="txTag_e" name="txTag_e"  value="<?php echo $yacth['tag'];?>">
                                </div>
                            </div>
                
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                        	<a href="?app=yacth_prefer_program"><button class="btn btn-info" type="button">Add More</button></a>
                        	<div class="form-group">
                               <!-- <label for="txtName" class="col-sm-2 control-label">Prefered Program</label>-->
                                <br>
                                <div class="col-sm-12">
                                        <?php
                                        $prefer = json_decode($yacth['prefer_program'],true);
                                        $sql = $dbc->Query("select * from yacth_prefer_program where status > 0 order by name asc");
                                        while($line = $dbc->Fetch($sql))
                                        {
                                            //$act = ($line['id']==$yacth['sailing_route'])?'checked':'';
                                            if(in_array($line['id'],$prefer))
                                            {
                                                $act = 'checked';
                                            }
                                            else
                                            {
                                                $act = '';
                                            }
                                            echo '<div class="checkbox-inline1 col-md-6">';
                                                echo '<label>';
                                                    echo '<input type="checkbox" name="tx_prefer_e[]" value="'.$line['id'].'" '.$act.'> '.$line['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                </div>
                            </div>
                
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                        	<a href="?app=yacth_prefer_time"><button class="btn btn-info" type="button">Add More</button></a>
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">Prefered Time</label>-->
                                <br>
                                <div class="col-sm-12">
                                        <?php
                                        $prefer_time = json_decode($yacth['prefer_time'],true);
                                        $sql_time = $dbc->Query("select * from yacth_prefer_time where status > 0 order by name asc");
                                        while($line_time = $dbc->Fetch($sql_time))
                                        {
                                            //$act = ($line['id']==$yacth['sailing_route'])?'checked':'';
                                            if(in_array($line_time['id'],$prefer_time))
                                            {
                                                $act = 'checked';
                                            }
                                            else
                                            {
                                                $act = '';
                                            }
                                            echo '<div class="checkbox-inline1 col-md-4">';
                                                echo '<label>';
                                                    echo '<input type="checkbox" name="tx_prefer_time_e[]" value="'.$line_time['id'].'" '.$act.'> '.$line_time['name'].'';
                                                echo '</label>';
                                            echo '</div>';
                                        }
                                        ?>
                                        
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>


                
                
                
                <?php /*?><div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Short Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txBrief_edit" name="txBrief_edit" value="<?php echo $yacth['brief'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Filter Box</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txFilter_edit" name="txFilter_edit" value="<?php echo $yacth['filter_box'];?>">
                    </div>
                </div>                
            	<div class="form-group">
					<label for="txtSlug" class="col-sm-2 control-label">URL Slug</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txSlug_edit" name="txSlug_edit" value="<?php echo $yacth['slug'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Over all Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDetail_edit" name="txDetail_edit" ><?php echo base64_decode($yacth['detail'],true);?></textarea>
					</div>
				</div>
               <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Inside Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txInside_edit" name="txInside_edit" ><?php echo base64_decode($yacth['inside'],true);?></textarea>
					</div>
				</div>
                
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Meta Title</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txTitlee" name="txTitlee" ><?php echo $yacth['meta_title'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H1</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH1e" name="txH1e" ><?php echo $yacth['meta_h1'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H2</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH2e" name="txH2e" ><?php echo $yacth['meta_h2'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Descript</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDescripte" name="txDescripte" ><?php echo $yacth['meta_des'];?></textarea>
					</div>
				</div>
                
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.upload_photo_edit()">Upload</button>
                            <font color="#ff0000"> 1200 x 779 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo imagePath($photo);?>"  width="100%" class=" phos">
							<!--<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.yacth.yacth.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                </div>
                <div class="form-group">
					
				</div>
                
                    <div class="form-group" style="margin-top:15px;">
                        <label class="col-sm-2 control-label">Cover Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.yacth.yacth.upload_coverphoto_edit()">Upload</button>
                            <font color="#ff0000"> 1920 x 600 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths" id="path_coverphoto_edit" name="path_coverphoto_edit" value="<?php echo $coverphoto;?>">
							<input type="hidden" name="txt_coverphoto_edit" id="txt_coverphoto_edit"  value="<?php echo $coverphoto;?>">
							<img src="<?php echo imagePath($coverphoto);?>"  width="100%" class=" covphos">
						<!--	<button type="button" class="btn btn-danger bc_coveredit" style="width:100%; display:none" onclick="fn.app.yacth.yacth.remove_coverphoto_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                <?php */?>
                
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
	//$("#cbb_destination").change();
	fill_list2();
});	
function fill_list2(me)
{
	var val = $("#cbb_destination_e").val();
	$("#cbb_marina").children('.mari').hide();
	$("#cbb_marina").children('.'+val).show();
}
	
</script>