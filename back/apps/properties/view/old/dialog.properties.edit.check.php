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
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" >
		<form id="form_edit_property_check" class="form-horizontal" role="form" onsubmit="fn.app.properties.properties.save_change_check();return false;">
		<input type="hidden" name="txtID" value="<?php echo $properties['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit properties</h4>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Facilities_ch" aria-controls="Facilities_ch" role="tab" data-toggle="tab">Facilities</a></li>
                   <!-- <li role="presentation"><a href="#Features_ch" aria-controls="Features_ch" role="tab" data-toggle="tab">Features</a></li>-->
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel " class="tab-pane " id="Facilities_ch">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">facilities</label>
                                <div class="col-sm-10">
                                    <?php 
									$icon_fac = array();
                                    $sql_fac_ch = $dbc->Query("select * from property_icon where status = '1' and property = '".$properties['id']."' ");
									while($line = $dbc->Fetch($sql_fac_ch))
									{
										array_push($icon_fac,$line['icon']);
									}
									
									
									$sql_fac = $dbc->Query("select * from icons where catgory = '1'");
                                    while($fac_r = $dbc->Fetch($sql_fac))
                                    { 
                                        $ar_fac = json_decode($properties['facilities'],true);
                                        if(in_array($fac_r['id'],$icon_fac))
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fac_ch[]" value="'.$fac_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="50">'.$fac_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fac_ch[]" value="'.$fac_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fac_r['icon'],true).'" width="50">'.$fac_r['name'];
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="Features_ch">
                    	<div class="col-md-12">
                        	<div class="form-group">
                                <label for="txtName" class="col-sm-2 control-label">features</label>
                                <div class="col-sm-10">
                                    <?php 
									$icon_fea = array();
                                    $sql_fac_ch_2 = $dbc->Query("select * from property_icon where status = '1' and property = '".$properties['id']."' ");
									while($line2 = $dbc->Fetch($sql_fac_ch_2))
									{
										array_push($icon_fea,$line2['icon']);
									}
									
                                    $sql_fea = $dbc->Query("select * from icons where catgory = '2'");
                                    while($fes_r = $dbc->Fetch($sql_fea))
                                    {
                                        //$ar_fea = json_decode($properties['features'],true);
                                        if(in_array($fes_r['id'],$icon_fea))
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fea_ch[]" value="'.$fes_r['id'].'" checked>';
                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fes_r['icon'],true).'" width="50">'.$fes_r['name'];
                                            echo '</div>';
                                        }
                                        else
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<input type="checkbox" name="chk_fea_ch[]" value="'.$fes_r['id'].'">';
                                                echo '   &nbsp;&nbsp;&nbsp; <img src="'.json_decode($fes_r['icon'],true).'" width="50">'.$fes_r['name'];
                                            echo '</div>';
                                        }
                                        
                                    }
                                    ?>
                                </div>
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