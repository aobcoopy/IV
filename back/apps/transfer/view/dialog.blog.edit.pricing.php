<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?>
<div class="modal fade" id="dialog_edit_pricing" data-backdrop="static">
  	<div class="modal-dialog  "  style="width:90%;">
		<form id="form_edit_property_pricing" class="form-horizontal" role="form" >
		<input type="hidden" id="txtID" name="txtID" value="<?php echo $_REQUEST['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Pricing</h4>
      		</div>
		    <div class="modal-body"><br><br>
                <div class="col-md-12">
                    <table class="tb table table-bordered" width="100%" border="1">
                        <thead>
                            <tr>
                                <th>Season Dates</th>
                                <th>Season Dates</th>
                                <th>Nights</th>
                                <th>1 Room</th>
                                <th>2 Room</th>
                                <th>3 Room</th>
                                <th>4 Room</th>
                                <th>5 Room</th>
                                <th>6 Room</th>
                                <th>7 Room</th>
                                <th>8 Room</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
						if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
						{
							$properties = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
							$data = json_decode($properties['val'],true);
							foreach($data as $valu)
							{
								echo '<tr>
									<td><input type="date" class="form-control" id="tx_date1" name="tx_date1" value="'.$valu['date1'].'"  ></td>
									<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" value="'.$valu['date2'].'"  ></td>
									<td><input type="number" class="form-control" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val1" value="'.$valu['val1'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val2" value="'.$valu['val2'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val3" value="'.$valu['val3'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val4" value="'.$valu['val4'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val5" value="'.$valu['val5'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val6" value="'.$valu['val6'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val7" value="'.$valu['val7'].'"  ></td>
									<td><input type="text" class="form-control" id="tx_val" name="tx_val8" value="'.$valu['val8'].'"  ></td>
									<td></td>
								</tr>';
							}
						}
						
						?>
                            <!--<tr>
                                <td><input type="date" class="form-control" id="tx_date1" name="tx_date1" placeholder="value" ></td>
                                <td><input type="date" class="form-control" id="tx_date2" name="tx_date2" placeholder="value" ></td>
                                <td><input type="number" class="form-control" id="tx_night" name="tx_night" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val1" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val2" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val3" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val4" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val5" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val6" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val7" placeholder="value" ></td>
                                <td><input type="text" class="form-control" id="tx_val" name="tx_val8" placeholder="value" ></td>
                                <td></td>
                            </tr>-->
                        </tbody>
                    </table>
                </div>
		    </div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.addtb()"><i class="fa fa-plus" aria-hidden="true"></i></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_table_pricing();">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

	
</script>