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
            <?php 
			$price = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
			?>
		    <div class="modal-body">
                <div><br><br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Priceing</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Services / Tax</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Discount</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Promotion</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home"><br>
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
                                            <th>9 Room</th>
                                            <th>10 Room</th>
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
                                                <td><input type="text" class="form-control" id="tx_val" name="tx_val9" value="'.$valu['val9'].'"  ></td>
                                                <td><input type="text" class="form-control" id="tx_val" name="tx_val10" value="'.$valu['val10'].'"  ></td>
                                                <td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></abutton></td>
                                            </tr>';
                                        }
                                    }
                                    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile"><br>
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Services / Tax</label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" class="form-control" id="txTax" name="txTax" value="<?php echo $price['tax'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div><br>
                                <label for="txtName" class="col-sm-2 control-label">Deposite</label>
                                <div class="col-sm-3 input-group">
                                    <input type="text" class="form-control" id="txDeposite" name="txDeposite" value="<?php echo $price['deposite'];?>">
                                    <span class="input-group-addon" id="basic-addon2">USD</span>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages"><br>
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-4 input-group">
                                    <input type="text" class="form-control" id="early_percent" name="early_percent" value="<?php echo $price['early_percent'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_day" name="early_day" value="<?php echo $price['early_day'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                </div>
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">last minute</label>
                                <div class="col-sm-4 input-group">
                                    <input type="text" class="form-control" id="last_percent" name="last_percent" value="<?php echo $price['last_percent'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="date" class="form-control" id="last_date" name="last_date" value="<?php echo $price['last_date'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Date</span>
                                </div>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="settings"><br>
                        	
                            <div class="col-md-12">
                            <div class="alert alert-default" role="alert">
                            	 Get/Enjoy/Receive 15% discount, for min 7 nights booking for travel period between 25 May 2017 to 25 July 2017
                                 <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Get/Enjoy/Receive</div>
                                            <input type="text" class="form-control" id="p_discount" name="p_discount"  value="<?php echo $price['p_discount'];?>">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon">$</div>-->
                                            <input type="text" class="form-control" id="p_night" name="p_night"  value="<?php echo $price['p_night'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="p_from" name="p_from"  value="<?php echo $price['p_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="p_to" name="p_to"  value="<?php echo $price['p_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br>
                            
                           <div class="col-md-12"><br><br>
                           <div class="alert alert-default" role="alert">
                            Get/Enjoy/Receive 15% discount and FREE r/t transfer, for booking stay between  25 May 2017 to 25 July 2017
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Get/Enjoy/Receive</div>
                                            <input type="text" class="form-control" id="pr_discount" name="pr_discount"  value="<?php echo $price['pr_discount'];?>">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"> r/t transfer</div>
                                            <input type="text" class="form-control" id="pr_free" name="pr_free"  value="<?php echo $price['pr_free'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="pr_from" name="pr_from"  value="<?php echo $price['pr_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="pr_to" name="pr_to"  value="<?php echo $price['pr_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br>
                            
                           <div class="col-md-12"><br><br>
                           <div class="alert alert-default" role="alert">
                            Stay/book 3 nights and pay 2 nights. This promotion is applicable to full or less villa occupancy booking travelling between 15 March 2017 to 15 April 2017.
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book" name="ps_book"  value="<?php echo $price['ps_book'];?>">
                                            <div class="input-group-addon">night</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">pay</div>
                                            <input type="text" class="form-control" id="ps_pay" name="ps_pay"  value="<?php echo $price['ps_pay'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion" name="ps_applicetion"  value="<?php echo $price['ps_applicetion'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from" name="ps_from"  value="<?php echo $price['ps_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="ps_to" name="ps_to"  value="<?php echo $price['ps_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>
                            <br><br>
                            
                           <div class="col-md-12"><br><br>
                           <div class="alert alert-default" role="alert">
                            Special offer FREE ……. for booking stay between  25 May 2017 to 25 July 2017. Book between date to date.
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Special offer</div>
                                            <input type="text" class="form-control" id="psp_offer" name="psp_offer"  value="<?php echo $price['psp_offer'];?>">
                                            <div class="input-group-addon">night</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="psp_fron" name="psp_fron"  value="<?php echo $price['psp_fron'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">Get/Enjoy/Receive</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="psp_to" name="psp_to"  value="<?php echo $price['psp_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div><!--tab-content-->
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