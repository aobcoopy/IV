<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$properties = $dbc->GetRecord("properties","*","id=".$_REQUEST['id']);
	$photo = json_decode($properties['photo'],true);
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<style>
input[type=radio], input[type=checkbox] {
    margin: 2px 0px 0px;
    width: 20px;
    height: 20px;
}
</style>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" style="width:90%;" >
		<form id="form_edit_property" class="form-horizontal" role="form" onsubmit="fn.app.properties.properties.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $properties['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit properties</h4>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information_e" aria-controls="Information_e" role="tab" data-toggle="tab">Information</a></li>
                    <!--<li role="presentation"><a href="#Facilities_e" aria-controls="Facilities_e" role="tab" data-toggle="tab">Facilities</a></li>-->
                    <li role="presentation"><a href="#Features_e" aria-controls="Features_e" role="tab" data-toggle="tab">Features</a></li>
                    <li role="presentation"><a href="#bed_e" aria-controls="bed_e" role="tab" data-toggle="tab">Bedroom</a></li>
                    <li role="presentation"><a href="#Appliances_e" aria-controls="Appliances_e" role="tab" data-toggle="tab">Appliances</a></li>
                    <li role="presentation"><a href="#Address_map_e" aria-controls="Address_map_e" role="tab" data-toggle="tab">Address map</a></li>
                    <li role="presentation"><a href="#what_include_e" aria-controls="what_include_e" role="tab" data-toggle="tab">What is include</a></li>
                    <li role="presentation"><a href="#PDF_e" aria-controls="PDF_e" role="tab" data-toggle="tab">PDF</a></li>
                   <!-- <li role="presentation"><a href="#Photo_e" aria-controls="Photo_e" role="tab" data-toggle="tab">Floor plan</a></li>-->
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName_e" name="txName_e" value="<?php echo $properties['name'];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Brief</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txBrief_e" name="txBrief_e" ><?php echo base64_decode($properties['brief']);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txShort_e" name="txShort_e" ><?php echo base64_decode($properties['short_det']);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDetail_e" name="txDetail_e" ><?php echo base64_decode($properties['detail']);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Trip Adviser (Link)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLink_e" name="txLink_e" value="<?php echo $properties['link'];?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-4">
                                <?php 
								$arr_cate = array();
                                    $sql_cate = $dbc->Query("select * from property_cate where property = '".$_REQUEST['id']."'");
                                    while($cate_r = $dbc->Fetch($sql_cate))
                                    {
										array_push($arr_cate,$cate_r['caategory']);
                                        //$ar_fac = json_decode($properties['facilities'],true);
                                       // if(in_array($fac_r['id'],$ar_fac))
//                                        {
//                                            echo '<div class="checkbox">';
//												echo '<label>';
//													echo '<input type="checkbox" name="cate[]" value="'.$r_cate['id'].'" checked>'.$r_cate['name'];
//												echo '</label>';
//											echo '</div>';
//											
//											echo '<div class="col-md-6">';
//                                                echo '<input type="checkbox" name="chk_fac_e[]" value="'.$fac_r['id'].'" checked>';
//                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="50">'.$fac_r['name'];
//                                            echo '</div>';
//                                        }
//                                        else
//                                        {
//                                            echo '<div class="col-md-6">';
//                                                echo '<input type="checkbox" name="chk_fac_e[]" value="'.$fac_r['id'].'">';
//                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="50">'.$fac_r['name'];
//                                            echo '</div>';
//                                        }
                                        
                                    }
                                ?>
								<?php 
								$sql_cate = $dbc->Query("select * from categories where status > 0");
								while($r_cate = $dbc->Fetch($sql_cate))
								{
									//$p_ac = ($properties['category']==$r_cate['id'])?'selected':'';
									//echo '<option value="'.$r_cate['id'].'"'.$p_ac.'>'.$r_cate['name'].'</option>';
									
									if(in_array($r_cate['id'],$arr_cate))
									{
										echo '<div class="checkbox">';
											echo '<label>';
												echo '<input type="checkbox" name="cate_e[]" value="'.$r_cate['id'].'" checked>&nbsp;&nbsp;&nbsp;'.$r_cate['name'];
											echo '</label>';
										echo '</div>';
									}
									else
									{
										echo '<div class="checkbox">';
											echo '<label>';
												echo '<input type="checkbox" name="cate_e[]" value="'.$r_cate['id'].'">&nbsp;&nbsp;&nbsp;'.$r_cate['name'];
											echo '</label>';
										echo '</div>';
									}
									
								}
								?>
                                    
                                    <?php /*?><select name="cbbCate_edit" id="cbbCate_edit" class="form-control">
                                        <option value="">Choose category</option>
                                        <?php 
                                        $sql_cate = $dbc->Query("select * from categories where status > 0");
                                        while($r_cate = $dbc->Fetch($sql_cate))
                                        {
                                            $p_ac = ($properties['category']==$r_cate['id'])?'selected':'';
                                            echo '<option value="'.$r_cate['id'].'"'.$p_ac.'>'.$r_cate['name'].'</option>';
                                        }
                                        ?>
                                    </select><?php */?>
                                   
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Category icon</label>
                                <div class="col-sm-4">
                                
								<?php 
								$sql_cate = $dbc->Query("select * from categories where v_status > 0");
								$ii=0;
								while($r_cate = $dbc->Fetch($sql_cate))
								{
									$exname = explode("-",$r_cate['name']);
									$photo = array('beach','largegroup','seas','wedding','house','house');
									$che = ($properties['cate_icon']==$r_cate['id'])?'checked':'';
										echo '<div class="radio">';
											echo '<label>';
												echo '<input type="radio" name="cate_icon_e" value="'.$r_cate['id'].'" '.$che.'>';
												echo '<svg width="30" height="30" style="margin-bottom: -17px;">';
													echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/'.$photo[$ii].'.svg"   height="20" />';
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$exname[0];
											echo '</label>';
										echo '</div>';
									$ii++;
								}
								
								?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Latitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txLatitude_e" name="txLatitude_e" value="<?php echo $properties['latitude'];?>">
                                </div>
                                
                                <label for="txtName" class="col-sm-2 control-label">Longtitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txLongtitude_e" name="txLongtitude_e" value="<?php echo $properties['longtitude'];?>">
                                </div>
                                
                            </div>
                           <!-- <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Longtitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLongtitude_e" name="txLongtitude_e" value="<?php echo $properties['longtitude'];?>">
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Actual Price</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_e" name="txPrice_e" value="<?php echo $properties['price'];?>">
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                            	<label for="txtName" class="col-sm-2 control-label">Discount Price</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txDiscountPrice_e" name="txDiscountPrice_e" value="<?php echo $properties['discount'];?>">
                                </div>
                                <?php /*?><label for="txtName" class="col-sm-2 control-label">Price Range</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txPrice_rang_e" name="txPrice_rang_e" value="<?php echo $properties['price_range'];?>" >
                                </div><?php */?>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price Min</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_min_e" name="txPrice_min_e"  min="0" value="<?php echo $properties['pmin'];?>">
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Price Max</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_max_e" name="txPrice_max_e"  min="0" value="<?php echo $properties['pmax'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-4">
                                    <select name="cbbDestination" id="cbbDestination" class="form-control" onChange="loadsubdes(this);">
                                    	<?php 
                                        //$sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0");
                                        $sql_destinations = $dbc->Query("select * from destinations where parent is null");
                                        while($r_destinations = $dbc->Fetch($sql_destinations))
                                        {
											$actt = ($properties['destination']==$r_destinations['id'])?'selected':'';
                                            echo '<option value="'.$r_destinations['id'].'"'.$actt.'>'.$r_destinations['name'].'</option>';
                                        }
                                        ?>
                                       
                                    </select>
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Subdestination</label>
                                <div class="col-sm-4">
                                    <select name="cbbsubDestination" id="cbbsubDestination" class="form-control" >
                                    <?php
									$sql_subdestinations = $dbc->Query("select * from destinations where parent = '".$properties['destination']."' ");
									while($r_subdestinations = $dbc->Fetch($sql_subdestinations))
									{
										$actt2 = ($properties['subdestination']==$r_subdestinations['id'])?'selected':'';
										echo '<option value="'.$r_subdestinations['id'].'"'.$actt2.'>'.$r_subdestinations['name'].'</option>';
									}
									?>
                                    	<div class="appd"></div>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <select name="cbbBed" id="cbbBed" class="form-control" >
                                        <?php /*?><option value="1" <?php echo ($properties['bedroom']=='1')?'selected':'';?>> 1-4 Bedrooms</option>
                                        <option value="2" <?php echo ($properties['bedroom']=='2')?'selected':'';?>>5-7 Bedrooms</option>
                                        <option value="3" <?php echo ($properties['bedroom']=='3')?'selected':'';?>> 8-10 Bedrooms</option>
                                        <option value="4" <?php echo ($properties['bedroom']=='4')?'selected':'';?>> > 10 Bedrooms</option><?php */?>
                                        <option value="1" <?php echo($properties['bedroom']=='1')?'selected':'';?>>1-4 Bedrooms</option>
                                        <option value="2" <?php echo($properties['bedroom']=='2')?'selected':'';?>>5-7 Bedrooms</option>
                                        <option value="3" <?php echo($properties['bedroom']=='3')?'selected':'';?>>8-10 Bedrooms</option>
                                        <option value="4" <?php echo($properties['bedroom']=='4')?'selected':'';?>>More than 10</option>
                                        <!--<option value="5" <?php echo($properties['bedroom']=='5')?'selected':'';?>>15-20 Bedrooms</option>
                                        <option value="6" <?php echo($properties['bedroom']=='6')?'selected':'';?>>20+ Bedrooms</option>
                                        <option value="7" <?php echo($properties['bedroom']=='7')?'selected':'';?>>30+ Bedrooms</option>-s->
                                        
                                    </select>
                                </div>
                            </div>-->
                            
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                <?php 
								$arr_bed = array();
                                    $sql_bed = $dbc->Query("select * from property_room where property = '".$_REQUEST['id']."'");
                                    while($cate_b = $dbc->Fetch($sql_bed))
                                    {
										array_push($arr_bed,$cate_b['room']);
									}
							   
								$sql_bedroom = $dbc->Query("select * from bedroom where status > 0");
								while($bed_room = $dbc->Fetch($sql_bedroom))
								{
									
									if(in_array($bed_room['id'],$arr_bed))
									{
										echo '<div class="checkbox">';
											echo '<label>';
												echo '<input type="checkbox" name="bedr[]" value="'.$bed_room['id'].'" checked>&nbsp;&nbsp;&nbsp;'.$bed_room['name'];
											echo '</label>';
										echo '</div>';
									}
									else
									{
										echo '<div class="checkbox">';
											echo '<label>';
												echo '<input type="checkbox" name="bedr[]" value="'.$bed_room['id'].'">&nbsp;&nbsp;&nbsp;'.$bed_room['name'];
											echo '</label>';
										echo '</div>';
									}
								}
								?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Actual Bedroom</label>
                                <div class="col-sm-4">
                                   <input type="number" id="tx_bedroom_e" name="tx_bedroom_e" class="form-control" value="<?php echo $properties['actualbed'];?>">
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Bedroom Range</label>
                                <div class="col-sm-4">
                                   <input type="text" id="tx_bedroom_range_e" name="tx_bedroom_range_e" class="form-control" value="<?php echo $properties['bedroom_range'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Guest</label>
                                <div class="col-sm-4">
                                    <select name="cbbGuestE" id="cbbGuestE" class="form-control" >
                                        <?php /*?><option value="1" <?php echo ($properties['guest']=='1')?'selected':'';?>>1-4</option>
                                        <option value="2" <?php echo ($properties['guest']=='2')?'selected':'';?>>5-15</option>
                                        <option value="3" <?php echo ($properties['guest']=='3')?'selected':'';?>>16+</option><?php */?>
                                        <option value="1" <?php echo($properties['guest']=='1')?'selected':'';?>>1-4</option>
                                        <option value="2" <?php echo($properties['guest']=='2')?'selected':'';?>>5-15</option>
                                        <option value="3" <?php echo($properties['guest']=='3')?'selected':'';?>>16-20</option>
                                        <option value="4" <?php echo($properties['guest']=='4')?'selected':'';?>>More than 20</option>
                                        <!--<option value="5" <?php echo($properties['guest']=='5')?'selected':'';?>>30+</option>
                                        <option value="6" <?php echo($properties['guest']=='6')?'selected':'';?>>40+</option>
                                        <option value="7" <?php echo($properties['guest']=='7')?'selected':'';?>>50+</option>
                                        <option value="8" <?php echo($properties['guest']=='8')?'selected':'';?>>60+</option>
                                        <option value="9" <?php echo($properties['guest']=='9')?'selected':'';?>>70+</option>-->
                                    </select>
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Adults</label>
                                <div class="col-sm-4">
                                   <input type="number" id="tx_Adults_e" name="tx_Adults_e"  min="0" class="form-control" value="<?php echo $properties['adults'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-4">
                                    <select name="cbbTagE" id="cbbTagE" class="form-control" >
                                    		<option value="0">None</option>
                                    	<?php 
                                        $sql_tag = $dbc->Query("select * from tags where status > 0");
                                        while($r_tag = $dbc->Fetch($sql_tag))
                                        {
											$taga = ($r_tag['id']==$properties['tag'])?'selected':'';
                                            echo '<option value="'.$r_tag['id'].'"'.$taga.'>'.$r_tag['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Promotion</label>
                                <div class="col-sm-4">
                                    <select name="cbbProE" id="cbbProE" class="form-control" >
                                    	<option value="null">Choose options</option>
                                        <option value="1" <?php echo ($properties['promotion']=='1')?'selected':'';?>>Promotion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Video</label>
                                <div class="col-sm-4">
                                    <textarea type="text" class="form-control" id="txvdo_e" name="txvdo_e" ><?php echo base64_decode($properties['vdo']);?></textarea>
                                </div>
                            
                            
                                <label for="txtName" class="col-sm-2 control-label">Bathroom</label>
                                <div class="col-sm-4">
                                    <input type="number" id="tx_Bathroom_e" name="tx_Bathroom_e"  min="0" class="form-control" value="<?php echo $properties['bathroom'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Facilities_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">facilities</label>-->
                                <div class="col-sm-12">
                                    <?php 
                                    $sql_fac = $dbc->Query("select * from icons where catgory = '1'");
                                    while($fac_r = $dbc->Fetch($sql_fac))
                                    {
                                        $ar_fac = json_decode($properties['facilities'],true);
                                        if(in_array($fac_r['id'],$ar_fac))
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fac_e[]" value="'.$fac_r['id'].'" checked>';
                                                echo '   <img src="'.json_decode($fac_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$fac_r['name'];
												
												echo '<svg width="30" height="30">';
												$ar_new = array('2001','2003','2002');
												if(in_array($fac_r['id'],$ar_new))
												{
													echo '<image xlink:href="' .  S3_BUCKET_URL .json_decode($fac_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												else
												{
													echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fac_r['icon'],true).'"
												}
													//echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fac_r['icon'],true).'"
												echo '</svg>';
												
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fac_e[]" value="'.$fac_r['id'].'">';
                                                echo '   <img src="'.json_decode($fac_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$fac_r['name'];
												
												echo '<svg width="30" height="30">';
													echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fac_r['icon'],true).'"
												echo '</svg>';
												
                                            echo '</div>';
                                        }
                                        
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Features_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">features</label>-->
                                <div class="col-sm-12">
                                    <?php 
                                    $sql_fea = $dbc->Query("select * from icons where catgory = '2' order by name asc");
                                    while($fes_r = $dbc->Fetch($sql_fea))
                                    {
										$ex1 = explode("photo",json_decode($fes_r['icon'],true));
										$ex_name = explode("_",$ex1[1]);
										$svg = explode(".",$ex_name[1]);
										
                                        $ar_fea = json_decode($properties['features'],true);
                                        if(in_array($fes_r['id'],$ar_fea))
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_fea_e[]" value="'.$fes_r['id'].'" checked>';
                                                //echo ' <img src="'.json_decode($fes_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$fes_r['name'];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2001','2003','2002');
													if(in_array($fes_r['id'],$ar_new))
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($fes_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
													}
													else
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
													}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$fes_r['name'];
												
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_fea_e[]" value="'.$fes_r['id'].'">';
                                                //echo ' <img src="'.json_decode($fes_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$fes_r['name'];
												
												echo '<svg width="30" height="30">';
												$ar_new = array('2001','2003','2002');
												if(in_array($fes_r['id'],$ar_new))
												{
													echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($fes_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												else
												{
													echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$fes_r['name'];
												
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="bed_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">Bedroom</label>-->
                                <div class="col-sm-12">
                                    <?php 
                                    $sql_bed = $dbc->Query("select * from icons where catgory = '5' order by name asc");
                                    while($bed_r = $dbc->Fetch($sql_bed))
                                    {
										$ex1 = explode("photo",json_decode($bed_r['icon'],true));
										$ex_name = explode("_",$ex1[1]);
										$svg = explode(".",$ex_name[1]);
										
                                        $ar_bed = json_decode($properties['bedfac'],true);
                                        if(in_array($bed_r['id'],$ar_bed))
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_bed_e[]" value="'.$bed_r['id'].'" checked>';
                                                //echo ' <img src="'.json_decode($bed_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$bed_r['name'].'--'.$svg[0];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2617','2009','2004');
													if(in_array($bed_r['id'],$ar_new))
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($bed_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';
													}
													//echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$bed_r['name'];
												
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_bed_e[]" value="'.$bed_r['id'].'">';
                                                //echo ' <img src="'.json_decode($bed_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$bed_r['name'].'--'.$svg[0];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2617','2009','2004');
													if(in_array($bed_r['id'],$ar_new))
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($bed_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';
													}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$bed_r['name'];
												
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Appliances_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">appliances</label>-->
                                <div class="col-sm-12">
                                    <?php 
                                    $sql_app = $dbc->Query("select * from icons where catgory = '3' order by name asc");
                                    while($app_r = $dbc->Fetch($sql_app))
                                    {
										$ex1 = explode("photo",json_decode($app_r['icon'],true));
										$ex_name = explode("_",$ex1[1]);
										$svg = explode(".",$ex_name[1]);
										
                                        $ar_app = json_decode($properties['appliances'],true);
                                        if(in_array($app_r['id'],$ar_app))
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_app_e[]" value="'.$app_r['id'].'" checked>';
                                                //echo ' <img src="'.json_decode($app_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$app_r['name'].'--'.$svg[0];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2005','2008','2007','2006');
													if(in_array($app_r['id'],$ar_new))
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($app_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';
													}
													//echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$app_r['name'];
												
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-2">';
                                                echo '<input type="checkbox" name="chk_app_e[]" value="'.$app_r['id'].'">';
                                                //echo ' <img src="'.json_decode($app_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$app_r['name'].'--'.$svg[0];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2005','2008','2007','2006');
													if(in_array($app_r['id'],$ar_new))
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL .''.json_decode($app_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';
													}
													//echo '<image xlink:href="' .  S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$app_r['name'];
												
                                            echo '</div>';
                                        }
                                        
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Address_map_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">address_map</label>-->
                                <div class="col-sm-6">
                                    <table id="tb_adm" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										$sql_add= $dbc->Query("select * from icons where catgory = '4' order by name asc");
										while($add_r = $dbc->Fetch($sql_add))
										{
											?>
											<tr>
                                                <td>
                                                <?php
												$ar_add = json_decode($properties['address_map'],true);
												if(in_array($add_r['id'],$ar_add))
												{
													?>
													<button type="button" disabled class="btn btn-info b-<?php echo $add_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $add_r['id'];?>','<?php echo $add_r['name'];?>')">
                                                    <i class="fa fa-plus"></i>
                                                    </button>
													<?php
												}
												else
												{
													?>
													<button type="button" class="btn btn-info b-<?php echo $add_r['id'];?>" onClick="add_adm_to_box(this,'<?php echo $add_r['id'];?>','<?php echo $add_r['name'];?>')">
                                                    <i class="fa fa-plus"></i>
                                                    </button>
													<?php
												}
												?>
                                                
                                                </td>
                                                <td><?php echo $add_r['id'];?></td>
                                                <td><?php echo $add_r['name'];?></td>
                                            </tr>
											<?php
										}
										?>
                                        </tbody>
                                    </table>
                                 </div>
                                 <div class="col-sm-6 ">
                                 	<div class="alert alert-default chk_adm" role="alert">
                                    	<h3>Address map <span class="label label-info">Selected</span></h3>
                                        <?php 
										$sql_add= $dbc->Query("select * from icons where catgory = '4' order by name asc");
										while($add_r = $dbc->Fetch($sql_add))
										{
											$ar_add = json_decode($properties['address_map'],true);
											if(in_array($add_r['id'],$ar_add))
											{
												//echo '<div class="col-md-3">';
//													echo '<input type="checkbox" name="chk_add_e[]" value="'.$add_r['id'].'" checked>';
//													echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$add_r['name'];
//												echo '</div>';
												$idadm = $add_r['id'];
												echo '<div class="col-sm-12" style="padding:5px 0px;">';
												echo '<input type="checkbox" class="hidden" name="chk_add_e[]" value="'.$idadm.'" checked>';
												echo '<button type="button" class="btn btn-danger" onClick="remove_adm_from_box(this,'.$idadm.')"><i class="fa fa-minus"></i></button>&nbsp;&nbsp;&nbsp;'.$add_r['name'];
												echo '</div>';
											}
											//else
//											{
//												echo '<div class="col-md-3">';
//													echo '<input type="checkbox" name="chk_add_e[]" value="'.$add_r['id'].'">';
//													echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$add_r['name'];
//												echo '</div>';
//											}
										}
										?>
                                        
                                    </div>
                                 </div>
                                 
                                <?php /*?><div class="col-sm-12">
                                    <?php 
                                    $sql_add= $dbc->Query("select * from icons where catgory = '4' order by name asc");
                                    while($add_r = $dbc->Fetch($sql_add))
                                    {
                                        $ar_add = json_decode($properties['address_map'],true);
                                        if(in_array($add_r['id'],$ar_add))
                                        {
                                            echo '<div class="col-md-3">';
                                                echo '<input type="checkbox" name="chk_add_e[]" value="'.$add_r['id'].'" checked>';
                                                echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$add_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-3">';
                                                echo '<input type="checkbox" name="chk_add_e[]" value="'.$add_r['id'].'">';
                                                echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$add_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div><?php */?>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="what_include_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">What is include</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_wic= $dbc->Query("select * from what_include where cate = '1' and status > 0 order by name asc");
                                    while($wic_r = $dbc->Fetch($sql_wic))
                                    {
                                        $ar_wic = json_decode($properties['what_ic'],true);
                                        if(in_array($wic_r['id'],$ar_wic))
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Complimentary airport transfer</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_wic= $dbc->Query("select * from what_include where cate = '2' and status > 0 order by name asc");
                                    while($wic_r = $dbc->Fetch($sql_wic))
                                    {
                                        $ar_wic = json_decode($properties['what_ic'],true);
                                        if(in_array($wic_r['id'],$ar_wic))
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Staff service inclusion</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_wic= $dbc->Query("select * from what_include where cate = '3' and status > 0 order by name asc");
                                    while($wic_r = $dbc->Fetch($sql_wic))
                                    {
                                        $ar_wic = json_decode($properties['what_ic'],true);
                                        if(in_array($wic_r['id'],$ar_wic))
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Extra Charge</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_wic= $dbc->Query("select * from what_include where cate = '4' and status > 0 order by name asc");
                                    while($wic_r = $dbc->Fetch($sql_wic))
                                    {
                                        $ar_wic = json_decode($properties['what_ic'],true);
                                        if(in_array($wic_r['id'],$ar_wic))
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Special Note</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_wic= $dbc->Query("select * from what_include where cate = '5' and status > 0 order by name asc");
                                    while($wic_r = $dbc->Fetch($sql_wic))
                                    {
                                        $ar_wic = json_decode($properties['what_ic'],true);
                                        if(in_array($wic_r['id'],$ar_wic))
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-12">';
                                                echo '<input type="checkbox" name="chk_what_e[]" value="'.$wic_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; '.$wic_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="PDF_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">PDF</label>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_pdf_edit()">Upload</button>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="txpdf_e" name="txpdf_e" readonly value="<?php echo json_decode($properties['file'],true);?>">
                                    
                                </div>
                                <div class="thumbs">
                                    <div class="col-md-1 phof">
                                        <input type="hidden" class="paths" id="path_photo_e" name="path_photo_e" value="<?php echo json_decode($properties['file'],true);?>">
                                        <input type="hidden" name="txt_photo_e" id="txt_photo_e" value="<?php echo json_decode($properties['file'],true);?>" >
                                        <!--<img src=""  width="100%" class=" phos">-->
                                        <button type="button" class="btn btn-danger bc_e" style=" display:none" onclick="fn.app.properties.properties.remove_pdf_edit(this);">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Photo_e">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" id="btup" onClick="fn.app.properties.properties.upload_photo_edit()">Upload</button>
                                    <font color="#ff0000"> 670 x 350 px</font>
                                </div>
                                <div class="col-sm-4">
                                    <input type="hidden" class="form-control" id="txplan_e" name="txplan_e" readonly value="<?php echo json_decode($properties['plan'],true);?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="<?php echo json_decode($properties['plan'],true);?>" class="floor_plan" width="80%">
                                </div>
                            </div>
                            <?php /*?><div class="thumbs_photo_edit">
                            <?pshp 
							/*echo '<pre>';
                            print_r($photo);
							echo '/<pre>';*s/
                            foreach($photo as $img)
                            {
								foreach($img as $index)
								{
									 echo '<div class="col-md-4 pho">';
										echo '<input type="hidden" class="paths" name="path_photo_e" value="'.$index[0].'">';
										echo '<input type="hidden" name="txt_photo_e[]" value="'.$index[0].'">';
										echo '<img src="'.$index['img'].'"  width="100%" class="img-thumbnail pho">';
										echo '<input type="text" name="txt_photo_name_e[]" value="'.$index[1].'" class="form-control">';
										echo '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.properties.properties.remove_photo_file(this);">';
											echo '<i class="fa fa-times" aria-hidden="true"></i>';
											echo '<input type="hidden" class="paths" name="path_photo" value="'.$index[0].'">';
										echo '</button>';
									echo '</div>';
								}
                            }
                            ?s>
                               
                            </div><?php */?>
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
            <button type="button" id="btn_upp2" onClick="fn.app.properties.properties.upload_photo_file_edit()">UP</button>
        </form>
        
        <form id="form_add_pdf_edit" class="hidden">
            <input id="f_pdf_edit" name="file" type="file">
            <button type="button" id="btn_upp_pdf_edit" onClick="fn.app.properties.properties.upload_pdf_file_edit()">UP</button>
        </form>
       
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
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>


<script>
function add_adm_to_box(me,vall,names)
{
	var ss = '';
	//var names = $(me).parent('td').find('input[name:in_adm]').val();
	$(me).attr('disabled',true);
	ss+='<div class="col-sm-12" style="padding:5px 0px;">';
	ss+='<input type="checkbox" class="hidden" name="chk_add_e[]" value="'+vall+'" checked>   ';
	ss+='<button type="button" class="btn btn-danger" onClick="remove_adm_from_box(this,'+vall+')"><i class="fa fa-minus"></i></button>&nbsp&nbsp'+names;
	ss+='</div>';
	$(".chk_adm").append(ss);
	
}

function remove_adm_from_box(me,valu)
{
	$(me).parent().remove();
	$(".b-"+valu).attr('disabled',false);
}

$(function(){
	var ii = 1;
	$("#tb_adm").data( "selected", [] );
	$("#tb_adm").DataTable({
		
	});
	//fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});

</script>