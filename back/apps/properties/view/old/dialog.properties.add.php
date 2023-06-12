<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<div class="modal fade" id="dialog_add_properties" data-backdrop="static">
  	<div class="modal-dialog modal-lg" >
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
                    <li role="presentation"><a href="#PDF" aria-controls="PDF" role="tab" data-toggle="tab">PDF</a></li>
                    <!--<li role="presentation"><a href="#Photo" aria-controls="Photo" role="tab" data-toggle="tab">Photo</a></li>-->
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
                                <div class="col-sm-10">
                                <?php 
								$sql_cate = $dbc->Query("select * from categories where status > 0");
								while($r_cate = $dbc->Fetch($sql_cate))
								{
									//$p_ac = ($properties['category']==$r_cate['id'])?'selected':'';
									//echo '<option value="'.$r_cate['id'].'"'.$p_ac.'>'.$r_cate['name'].'</option>';
									
									echo '<div class="checkbox">';
                                        echo '<label>';
	                                        echo '<input type="checkbox" name="catego[]" value="'.$r_cate['id'].'">'.$r_cate['name'];
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
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLatitude" name="txLatitude" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Longtitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txLongtitude" name="txLongtitude" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="txPrice" name="txPrice" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Price Range</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="txPrice_rang" name="txPrice_rang" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-10">
                                    <select name="cbbDestination" id="cbbDestination" class="form-control" >
                                    	<?php 
                                        $sql_destinations = $dbc->Query("select * from destinations where status > 0");
                                        while($r_destinations = $dbc->Fetch($sql_destinations))
                                        {
                                            echo '<option value="'.$r_destinations['id'].'">'.$r_destinations['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <select name="cbbBed" id="cbbBed" class="form-control" >
                                        <option value="1"> 1-4 Bedrooms</option>
                                        <option value="2"> 5-7 Bedrooms </option>
                                        <option value="3"> 8-10 Bedrooms</option>
                                        <option value="4"> > 10 Bedrooms </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Guest</label>
                                <div class="col-sm-10">
                                    <select name="cbbGuest" id="cbbGuest" class="form-control" >
                                        <option value="1">1-4</option>
                                        <option value="2">5-15</option>
                                        <option value="3">16+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-10">
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
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Facilities">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">facilities</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_fac = $dbc->Query("select * from icons where catgory = '1'");
                                    while($fac_r = $dbc->Fetch($sql_fac))
                                    {
                                        echo '<div class="col-md-6">';
                                            echo '<input type="checkbox" name="chk_fac[]" value="'.$fac_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="50">'.$fac_r['name'];
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
                                <label for="txtName" class="col-sm-2 control-label">features</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_fea = $dbc->Query("select * from icons where catgory = '2'");
                                    while($fes_r = $dbc->Fetch($sql_fea))
                                    {
                                        echo '<div class="col-md-6">';
                                            echo '<input type="checkbox" name="chk_fea[]" value="'.$fes_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fes_r['icon'],true).'" width="50">'.$fes_r['name'];
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
                                <label for="txtName" class="col-sm-2 control-label">Bedroom</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_bed = $dbc->Query("select * from icons where catgory = '5'");
                                    while($bed_r = $dbc->Fetch($sql_bed))
                                    {
                                        echo '<div class="col-md-6">';
                                            echo '<input type="checkbox" name="chk_bed[]" value="'.$bed_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($bed_r['icon'],true).'" width="50">'.$bed_r['name'];
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
                                <label for="txtName" class="col-sm-2 control-label">appliances</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_app = $dbc->Query("select * from icons where catgory = '3'");
                                    while($app_r = $dbc->Fetch($sql_app))
                                    {
                                        echo '<div class="col-md-6">';
                                            echo '<input type="checkbox" name="chk_app[]" value="'.$app_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($app_r['icon'],true).'" width="50">'.$app_r['name'];
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
                                <label for="txtName" class="col-sm-2 control-label">address_map</label>
                                <div class="col-sm-10">
                                    <?php 
                                    $sql_add= $dbc->Query("select * from icons where catgory = '4'");
                                    while($add_r = $dbc->Fetch($sql_add))
                                    {
                                        echo '<div class="col-md-6">';
                                            echo '<input type="checkbox" name="chk_add[]" value="'.$add_r['id'].'">';
                                            echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($add_r['icon'],true).'" width="50">'.$add_r['name'];
                                        echo '</div>';
                                    }
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
                    	<!--<div class="col-md-12">
                        	<div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.upload_photo()">Upload</button>
                                    <font color="#ff0000"> 670 x 350 px</font>
                                </div>
                            </div>
                            <div class="thumbs_photo">
                                
                            </div>
                        </div>-->
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
</script>