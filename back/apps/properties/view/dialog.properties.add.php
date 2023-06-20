<?php
//session_start();
//	include_once "../../../config/define.php";
//	include_once "../../../libs/class/db.php";
//	
//	@ini_set('display_errors',DEBUG_MODE?1:0);
//	date_default_timezone_set(DEFAULT_TIMEZONE);
//	
//	$dbc = new dbc;
//	$dbc->Connect();
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
<div class="modal fade" id="dialog_add_properties" data-backdrop="static">
  	<div class="modal-dialog modal-lg" style="width:90%;"  >
		<form id="form_add_properties" class="form-horizontal" role="form" onsubmit="fn.app.properties.properties.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add properties</h4>
      		</div>
		    <div class="modal-body">
            <br><br>
            <!--<div>-->

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information" aria-controls="Information" role="tab" data-toggle="tab">Information</a></li>
                    <!--<li role="presentation"><a href="#Facilities" aria-controls="Facilities" role="tab" data-toggle="tab">Facilities</a></li>-->
                    <li role="presentation"><a href="#Features" aria-controls="Features" role="tab" data-toggle="tab">Features</a></li>
                    <li role="presentation"><a href="#bed" aria-controls="bed" role="tab" data-toggle="tab">Bedroom</a></li>
                    <li role="presentation"><a href="#Appliances" aria-controls="Appliances" role="tab" data-toggle="tab">Appliances</a></li>
                    <li role="presentation"><a href="#Address_map" aria-controls="Address_map" role="tab" data-toggle="tab">Address map</a></li>
                    <li role="presentation"><a href="#what_include" aria-controls="what_include" role="tab" data-toggle="tab">What is include</a></li>
                    <li role="presentation"><a href="#PDF" aria-controls="PDF" role="tab" data-toggle="tab">PDF</a></li>
                    <!--<li role="presentation"><a href="#Bedroom" aria-controls="Bedroom" role="tab" data-toggle="tab">Bedroom Configuration</a></li>-->
                    <!--<li role="presentation"><a href="#Photo" aria-controls="Photo" role="tab" data-toggle="tab">Floor plan</a></li>-->
                   <!-- <li role="presentation"><a href="#Pricing" aria-controls="Pricing" role="tab" data-toggle="tab">Pricing</a></li>-->
                </ul>

  				<!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txName" name="txName" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Brief</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txBrief" name="txBrief" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="txShort" name="txShort" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control editor" id="txDetail" name="txDetail" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Trip Adviser (Link)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLink" name="txLink" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-4">
                                <?php 
								$sql_cate = $dbc->Query("select * from categories where status > 0");
								while($r_cate = $dbc->Fetch($sql_cate))
								{
									//$p_ac = ($properties['category']==$r_cate['id'])?'selected':'';
									//echo '<option value="'.$r_cate['id'].'"'.$p_ac.'>'.$r_cate['name'].'</option>';
									
									echo '<div class="checkbox">';
                                        echo '<label>';
	                                        echo '<input type="checkbox" name="catego[]" value="'.$r_cate['id'].'">&nbsp;&nbsp;&nbsp;'.$r_cate['name'];
                                        echo '</label>';
                                    echo '</div>';
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
								$ii1=0;
								while($r_cate = $dbc->Fetch($sql_cate))
								{
									$exname = explode("-",$r_cate['name']);
									$photo = array('beach.svg','largegroup.svg','seas.svg','wedding.svg','house.svg','house.svg','category/lake-view-villas.jpg');
									//$che = ($properties['cate_icon']==$r_cate['id'])?'checked':'';
										echo '<div class="radio">';
											echo '<label>';
												echo '<input type="radio" name="cate_icon" value="'.$r_cate['id'].'" >';//'.$che.'
												echo '<svg width="30" height="30" style="margin-bottom: -17px;">';
													if($r_cate['updated']>date("2020-01-01"))
													{
														echo '<image xlink:href="https://media.inspiringvillas.com/prd/upload/'.$photo[$ii1].'"   height="20" />';
													}
													else
													{
														echo '<image xlink:href="/upload/'.$photo[$ii1].'"   height="20" />';
													}
													
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$exname[0];
											echo '</label>';
										echo '</div>';
									$ii1++;
								}
								?>
                                </div>
                            </div>
                            
                            <?php /*?><div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="cbbCate" id="cbbCate" class="form-control">
                                        <option value="">Choose category</option>
                                        <?php 
                                        $sql_cate = $dbc->Query("select * from categories where status > 0");
                                        while($r_cate = $dbc->Fetch($sql_cate))
                                        {
                                            echo '<option value="'.$r_cate['id'].'">'.$r_cate['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                   
                                </div>
                            </div><?php */?>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Latitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txLatitude" name="txLatitude" >
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Longtitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txLongtitude" name="txLongtitude" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Actual Price</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice" name="txPrice" >
                                </div>
                                <div class="form-group">
                                    <label for="txtName" class="col-sm-2 control-label">Discount Price</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="txDiscountPrice" name="txDiscountPrice" >
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price Range</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txPrice_rang" name="txPrice_rang" >
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price Min</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_min" name="txPrice_min" min="0">
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Price Max</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_max" name="txPrice_max"  min="0">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price TH Min</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_min_TH" name="txPrice_min_TH" min="0">
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Price TH Max</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="txPrice_max_TH" name="txPrice_max_TH"  min="0">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-4">
                                    <select name="cbbDestination" id="cbbDestination" class="form-control" onChange="loadsubdes_add(this);">
                                    	<?php 
                                        //$sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0");
                                        $sql_destinations = $dbc->Query("select * from destinations where parent is null");
                                        while($r_destinations = $dbc->Fetch($sql_destinations))
                                        {
                                            echo '<option value="'.$r_destinations['id'].'">'.$r_destinations['name'].'</option>';
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
                                    	<div class="appd_add"></div>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <select name="cbbBed" id="cbbBed" class="form-control" >
                                    	<option value="1" >1-4 Bedrooms</option>
                                        <option value="2" >5-7 Bedrooms</option>
                                        <option value="3" >8-10 Bedrooms</option>
                                        <option value="4" >More than 10</option>
                                        <!--<option value="5" >15-20 Bedrooms</option>
                                        <option value="6" >20+ Bedrooms</option>
                                        <option value="7" >30+ Bedrooms</option>-->
                                        <!--<option value="1"> 1-4 Bedrooms</option>
                                        <option value="2"> 5-7 Bedrooms </option>
                                        <option value="3"> 8-10 Bedrooms</option>
                                        <option value="4"> > 10 Bedrooms </option>-d->
                                    </select>
                                </div>
                            </div>-->
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                <?php 
								$sql_bed = $dbc->Query("select * from bedroom where status > 0");
								while($r_bed = $dbc->Fetch($sql_bed))
								{
									//$p_ac = ($properties['category']==$r_cate['id'])?'selected':'';
									//echo '<option value="'.$r_cate['id'].'"'.$p_ac.'>'.$r_cate['name'].'</option>';
									
									echo '<div class="checkbox">';
                                        echo '<label>';
	                                        echo '<input type="checkbox" name="bedr[]" value="'.$r_bed['id'].'">&nbsp;&nbsp;&nbsp;'.$r_bed['name'];
                                        echo '</label>';
                                    echo '</div>';
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
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Actual Bedroom</label>
                                <div class="col-sm-4">
                                   <input type="number" id="tx_bedroom" name="tx_bedroom" class="form-control">
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Bedroom Range</label>
                                <div class="col-sm-4">
                                   <input type="text" id="tx_bedroom_range" name="tx_bedroom_range" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Guest</label>
                                <div class="col-sm-4">
                                    <select name="cbbGuest" id="cbbGuest" class="form-control" >
                                    	<option value="1" >1-4</option>
                                        <option value="2" >5-15</option>
                                        <option value="3" >16-20</option>
                                        <option value="4" >More than 20</option>
                                        <!--<option value="5" >30+</option>
                                        <option value="6" >40+</option>
                                        <option value="7" >50+</option>
                                        <option value="8" >60+</option>
                                        <option value="9" >70+</option>-->
                                       <!-- <option value="1">1-4</option>
                                        <option value="2">5-15</option>
                                        <option value="3">16+</option>-->
                                    </select>
                                </div>
                                <label for="txtName" class="col-sm-2 control-label">Adults</label>
                                <div class="col-sm-4">
                                   <input type="number" id="tx_Adults" name="tx_Adults"  min="0" class="form-control" value="<?php echo $properties['adults'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-4">
                                    <select name="cbbTag" id="cbbTag" class="form-control" >
                                    	<option value="0">None</option>
                                    	<?php 
                                        $sql_tag = $dbc->Query("select * from tags where status > 0");
                                        while($r_tag = $dbc->Fetch($sql_tag))
                                        {
                                            echo '<option value="'.$r_tag['id'].'">'.$r_tag['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <!--</div>
                            <div class="form-group">-->
                                <label for="txtName" class="col-sm-2 control-label">Promotion</label>
                                <div class="col-sm-4">
                                    <select name="cbbPro" id="cbbPro" class="form-control" >
                                    	<option value="null">Choose options</option>
                                        <option value="1">Promotion</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label for="txtName" class="col-sm-2 control-label">Tag Expire date</label>
                                <div class="col-sm-4">
                                    <input type="date" id="tx_tag_exp" name="tx_tag_exp"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Video</label>
                                <div class="col-sm-4">
                                    <textarea type="text" class="form-control" id="txvdo" name="txvdo" ></textarea>
                                </div>
                                
                                <label for="txtName" class="col-sm-2 control-label">Bathroom</label>
                                <div class="col-sm-4">
                                    <input type="number" id="tx_Bathroom" name="tx_Bathroom"  min="0" step="0.1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Facilities">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">facilities</label>-->
                                <div class="col-sm-12">
                                    <?php 
                                    $sql_fac = $dbc->Query("select * from icons where catgory = '1'");
                                    while($fac_r = $dbc->Fetch($sql_fac))
                                    {
                                        echo '<div class="col-md-3">';
                                            echo '<input type="checkbox" name="chk_fac[]" value="'.$fac_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="30">   '.$fac_r['name'];
                                        echo '</div>';
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="Features">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">features</label>-->
                                <div class="col-sm-12">
                                    <?php 
									$sql = $dbc->Query("select * from icon_group where status > 0 and igroup = 2");
									while($row = $dbc->Fetch($sql))
									{
										echo '<div class="col-md-12"><br><h3>'.$row['name'].'</h3><hr></div>';
										$w_group = "and status > 0 and icon_group = '".$row['id']."'";
										
										echo '<div class="alert alert-default" role="alert">';
										
										$sql_fea = $dbc->Query("select * from icons where catgory = '2' ".$w_group." order by name asc");
										while($fes_r = $dbc->Fetch($sql_fea))
										{
											$ex1 = explode("photo",json_decode($fes_r['icon'],true));
											$ex_name = explode("_",$ex1[1]);
											$svg = explode(".",$ex_name[1]);
											
											echo '<div class="col-sm-2">';
												echo '<input type="checkbox" name="chk_fea[]" value="'.$fes_r['id'].'">';
												//echo ' <img src="'.json_decode($fes_r['icon'],true).'" width="30">   '.$fes_r['name'];
												
												echo '<svg width="30" height="30">';
													$ar_new = array('2001','2003','2002');
												if(in_array($fes_r['id'],$ar_new))
												{
													echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($fes_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												else
												{
													if($fes_r['created']>date("2019-01-01"))
													{
														echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($fes_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
													}
													
												}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$fes_r['name'];
													
											echo '</div>';
										}
										echo '</div>';
									}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="bed">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">Bedroom</label>-->
                                <div class="col-sm-12">
                                    <?php 
									$sql1 = $dbc->Query("select * from icon_group where status > 0 and igroup = 5");
									while($row1 = $dbc->Fetch($sql1))
									{
										echo '<div class="col-md-12"><br><h3>'.$row1['name'].'</h3><hr></div>';
										$w_group1 = "and status > 0 and icon_group = '".$row1['id']."'";
										
										echo '<div class="alert alert-default" role="alert">';
										$sql_bed = $dbc->Query("select * from icons where catgory = '5' ".$w_group1." order by name asc");
										while($bed_r = $dbc->Fetch($sql_bed))
										{
											$ex1 = explode("photo",json_decode($bed_r['icon'],true));
											$ex_name = explode("_",$ex1[1]);
											$svg = explode(".",$ex_name[1]);
											
											echo '<div class="col-md-2">';
												echo '<input type="checkbox" name="chk_bed[]" value="'.$bed_r['id'].'">';
												//echo ' <img src="'.json_decode($bed_r['icon'],true).'" width="30">   '.$bed_r['name'];
												
												echo '<svg width="30" height="30">';
												$ar_new = array('2617','2009','2004');
												if(in_array($bed_r['id'],$ar_new))
												{
													echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($bed_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												else
												{
													if($bed_r['created']>date("2019-01-01"))
													{
														echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($bed_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
													}
													
													//echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$bed_r['name'];
												
											echo '</div>';
										}
										echo '</div>';
									}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Appliances">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">appliances</label>-->
                                <div class="col-sm-12">
                                    <?php 
									$sql = $dbc->Query("select * from icon_group where status > 0 and igroup = 3");
									while($row = $dbc->Fetch($sql))
									{
										echo '<div class="col-md-12"><br><h3>'.$row['name'].'</h3><hr></div>';
										$w_group = "and status > 0 and icon_group = '".$row['id']."'";
										
										echo '<div class="alert alert-default" role="alert">';
										$sql_app = $dbc->Query("select * from icons where catgory = '3' ".$w_group." order by name asc");
										while($app_r = $dbc->Fetch($sql_app))
										{
											$ex1 = explode("photo",json_decode($app_r['icon'],true));
											$ex_name = explode("_",$ex1[1]);
											$svg = explode(".",$ex_name[1]);
										   // $img = "https://media.inspiringvillas.com/staging".json_decode($app_r[1]);
											echo '<div class="col-md-2">';
												echo '<input type="checkbox" name="chk_app[]" value="'.$app_r['id'].'">';
												//echo ' <img src="'.json_decode($app_r['icon'],true).'" width="30">   '.$app_r['name'];
											
												echo '<svg width="30" height="30">';
												//	echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
											   $ar_new = array('2005','2008','2007','2006');
												if(in_array($app_r['id'],$ar_new))
												{
													echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($app_r['icon'],true).'"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												else
												{
													if($app_r['created']>date("2019-01-01"))
													{
														echo '<image xlink:href="https://media.inspiringvillas.com/prd'.json_decode($app_r['icon'],true).'"  width="30" height="30" />';
													}
													else
													{
														echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
													}
													//echo '<image xlink:href="/upload/icons/'.$svg[0].'.svg"  width="30" height="30" />';//src="'.json_decode($fes_r['icon'],true).'"
												}
												echo '</svg>';
												echo '&nbsp;&nbsp;&nbsp;'.$app_r['name'];
													
											echo '</div>';
										}
										echo '</div>';
									}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Address_map">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <!--<label for="txtName" class="col-sm-2 control-label">address_map</label>-->
                                <div class="col-sm-6">
                                    <table id="tb_adm_add" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Icon</th>
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
													<button type="button" disabled class="btn btn-info b-<?php echo $add_r['id'];?>" onClick="add_adm_to_box_add(this,'<?php echo $add_r['id'];?>','<?php echo $add_r['name'];?>')">
                                                    <i class="fa fa-plus"></i>
                                                    </button>
													<?php
												}
												else
												{
													?>
													<button type="button" class="btn btn-info b-<?php echo $add_r['id'];?>" onClick="add_adm_to_box_add(this,'<?php echo $add_r['id'];?>','<?php echo $add_r['name'];?>')">
                                                    <i class="fa fa-plus"></i>
                                                    </button>
													<?php
												}
												?>
                                                
                                                </td>
                                                
                                                <td><?php echo $add_r['id'];?></td>
                                                <td><img src="<?php echo $add_r['iconmap'];?>"  width="40"></td>
                                                <td><?php echo $add_r['name'];?><br>La : <?php echo ($add_r['la']!='')?$add_r['la']:'-';?> / Ln : <?php echo ($add_r['ln']!='')?$add_r['ln']:'-';?></td>
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
//													echo '<input type="checkbox" name="chk_add[]" value="'.$add_r['id'].'" checked>';
//													echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">&nbsp;&nbsp;&nbsp;'.$add_r['name'];
//												echo '</div>';
												$idadm = $add_r['id'];
												echo '<div class="col-sm-12" style="padding:5px 0px;">';
												echo '<input type="checkbox" class="hidden" name="chk_add[]" value="'.$idadm.'" checked>';
												echo '<button type="button" class="btn btn-danger" onClick="remove_adm_from_box(this,'.$idadm.')"><i class="fa fa-minus"></i></button>&nbsp;&nbsp;&nbsp;'.$add_r['name'];
												echo '</div>';
											}
											//else
//											{
//												echo '<div class="col-md-3">';
//													echo '<input type="checkbox" name="chk_add[]" value="'.$add_r['id'].'">';
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
                                        echo '<div class="col-md-3">';
                                            echo '<input type="checkbox" name="chk_add[]" value="'.$add_r['id'].'">';
                                            echo ' <img src="'.json_decode($add_r['icon'],true).'" width="30">   '.$add_r['name'];
                                        echo '</div>';
                                    }
                                    ?>
                                </div><?php */?>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="what_include">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">What is include
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_main','tx_main');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_main">
                                	
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '1' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Available at extra charge
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_available','tx_available');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_available">
                                	
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '1' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">House rules
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_House','tx_House');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_House">
                                	
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '1' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Complimentary airport transfer
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_transfer','tx_transfer');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_transfer">
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '2' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Staff service inclusion
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_service','tx_service');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_service">
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '3' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Extra Charge
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_Charge','tx_Charge');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_Charge">
                                    <?php 
                                    /*$sql_what = $dbc->Query("select * from what_include where cate = '4' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Special Note
                                <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addwiic_main('wiic_Special','tx_Special');"><i class="fa fa-plus"></i></button></label>
                                <div class="col-sm-10 wiic_Special">
                                    <?php 
                                   /* $sql_what = $dbc->Query("select * from what_include where cate = '5' and status > 0");
                                    while($what_r = $dbc->Fetch($sql_what))
                                    {
                                        echo '<div class="col-md-12">';
                                            echo '<input type="checkbox" name="chk_What[]" value="'.$what_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; '.$what_r['name'];
                                        echo '</div>';
                                    }*/
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane"  id="PDF">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">PDF</label>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_pdf()">Upload</button>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="txpdf" name="txpdf" readonly>
                                    
                                </div>
                                <div class="thumbs">
                                    <div class="col-md-1 phof">
                                        <input type="hidden" class="paths" id="path_photo" name="path_photo">
                                        <input type="hidden" name="txt_photo" id="txt_photo" >
                                        <!--<img src=""  width="100%" class=" phos">-->
                                        <button type="button" class="btn btn-danger bc" style=" display:none" onclick="fn.app.properties.properties.remove_photo(this);">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Photo">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_photo_plan()">Upload</button>
                                    <font color="#ff0000"> 670 x 350 px</font>
                                </div>
                                <div class="col-sm-4">
                                    <input type="hidden" class="form-control" id="txplan" name="txplan" readonly >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="../../../../upload/photo.jpg" class="floor_plan_add" width="80%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Pricing">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Pricing</label>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.addtb()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                                 <div class="col-sm-2">
                                    <input type="number" class="form-control" id="tx_num" name="tx_num" >
                                </div>
                            </div>
                            <div class="tbl_price">
                                

                               
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Bedroom">
                    	
                    </div>
                </div>

<!--</div>-->

            	
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        
        

        <form id="form_add_photo" class="hidden">
            <input id="f_Photo" name="file" type="file">
            <button type="button" id="btn_upp" onClick="fn.app.properties.properties.upload_photo_file()">UP</button>
        </form>
        
        <form id="form_add_photo_plan" class="hidden">
            <input id="f_Photo_plan" name="file" type="file">
            <button type="button" id="btn_upp_plan" onClick="fn.app.properties.properties.upload_photo_plan()">UP</button>
        </form>
        
        <form id="form_add_pdf" class="hidden">
            <input id="f_pdf" name="file" type="file">
            <button type="button" id="btn_upp_pdf" onClick="fn.app.properties.properties.upload_pdf_file()">UP</button>
        </form>
        
        
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function() {
	$( ".thumbs_photo" ).sortable();
	$( ".thumbs_photo" ).disableSelection();
	
	
  });
  $(document).ready(function(e) {
		$.ajax({
			url: "apps/properties/xhr/action-load-subdestination.php",
			data: {id:$("#cbbDestination").val()},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("#form_add_properties #cbbsubDestination").append(html);
			}	
		});
});
</script>


<script>
function add_adm_to_box_add(me,vall,names)
{
	var ss = '';
	//var names = $(me).parent('td').find('input[name:in_adm]').val();
	$(me).attr('disabled',true);
	ss+='<div class="col-sm-12" style="padding:5px 0px;">';
	ss+='<input type="checkbox" class="hidden" name="chk_add[]" value="'+vall+'" checked>   ';
	ss+='<button type="button" class="btn btn-danger" onClick="remove_adm_from_box_add(this,'+vall+')"><i class="fa fa-minus"></i></button>&nbsp&nbsp'+names;
	ss+='</div>';
	$(".chk_adm").append(ss);
	
}

function remove_adm_from_box_add(me,valu)
{
	$(me).parent().remove();
	$(".b-"+valu).attr('disabled',false);
}

$(function(){
	var ii = 1;
	$("#tb_adm_add").data( "selected", [] );
	$("#tb_adm_add").DataTable({
		
	});
	//fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});

</script>
