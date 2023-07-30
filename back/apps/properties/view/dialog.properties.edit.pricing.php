<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	
?>
<style>
.alert-info {
    background-color: #e0f7ff;
    color: #FFF;
    border-color: #e0f7ff;
    margin-top: 15px;
}
.form-horizontal .form-group:before {
    display: block;
}
</style>
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
			$stay = json_decode($price['stay'],true);
			?>
            <?php //echo '---->'.$stay['ps_book_4'].'<---';?>
		    <div class="modal-body">
                <div><br><br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Priceing</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Services / Tax</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Discount</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Promotion</a></li>
                        <li role="presentation"><a href="#Note" aria-controls="Note" role="tab" data-toggle="tab">Note</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home"><br>
                        	<div class="col-md-4">
    							
                                 <h3>Auto Remove <!--<span class="label label-default">New</span>--></h3>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="tx_auto_remove" name="tx_auto_remove" value="<?php echo ($price['auto_remove']==0)?0:1;?>" <?php echo ($price['auto_remove']==0)?'checked':'';?>> &nbsp;&nbsp;
                                        Auto-delete the date of the past season.
                                    </label>
                                </div>
                            </div>
                        	<div class="col-md-4 text-left">
								<h3>Price Rate <!--<span class="label label-default">New</span>--></h3>
								<label class="radio-inline">
									<input type="radio" name="ra_exchange" id="ra_exchange1" value="usd" <?php echo ($price['exchange']=='usd' || $price['exchange']=='')?'checked':'';?> style="margin-top: 0px;"> &nbsp;&nbsp;USD
								</label>
								&nbsp;&nbsp;
								<label class="radio-inline">
									<input type="radio" name="ra_exchange" id="ra_exchange2" value="thb"  <?php echo ($price['exchange']=='thb')?'checked':'';?> style="margin-top: 0px;"> &nbsp;&nbsp;THB
								</label>
								<br><br><br>
                            </div>
                            <div class="col-md-4">
								<h3>No Price</h3>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="tx_no_price" name="tx_no_price" onChange="check_price(this);" value="<?php echo ($price['no_price']==0)?0:1;?>" <?php echo ($price['no_price']==1)?'checked':'';?>> &nbsp;&nbsp; This villa has no fixed seasonal price range, however we can assist you on pricing on each enquiryby request
                                        
                                    </label>
                                </div>
							</div>
							<script>
								function check_price(me)
								{
									if($(me).is(':checked'))
									{
										//alert(11111);
										$(me).val(1);
									}
									else
									{
										//alert(22222);
										$(me).val(0);
									}
								}
							
							</script>
							
                            <div class="col-md-6">
                            	<div class="panel panel-danger">
                                    <div class="panel-heading"><strong>Remark</strong></div>
                                    <div class="panel-body">
                                        <strong>Auto Remove / Year Transfer</strong>
                                        <br>Text Mode - Compatible with text format is Ex.11 Feb 2021 - 17 Feb 2021
                                        
                                    </div>
                                </div>
                            	
                                
                            </div>
                            
                             <div class="col-md-12 table-responsive">
                                <table id="sortable" class="tb table table-bordered" width="100%" border="1">
                                    <thead>
                                        <tr>
                                            <th>Duplicate</th>
                                            <th>Season Dates</th>
                                            <th>Season Dates</th>
                                            <th width="80px">Nights</th>
                                            <?php 
											for($i=1;$i<=26;$i++)
											{
												echo '<th>'.$i.' Room</th>';
											}
											?>
                                            <th>Weekend</th>
                                            <th>Weekday</th>
                                            <!--<th>1 Room</th>
                                            <th>2 Room</th>
                                            <th>3 Room</th>
                                            <th>4 Room</th>
                                            <th>5 Room</th>
                                            <th>6 Room</th>
                                            <th>7 Room</th>
                                            <th>8 Room</th>
                                            <th>9 Room</th>
                                            <th>10 Room</th>
                                            <th>11 Room</th>
                                            <th>12 Room</th>
                                            <th>13 Room</th>
                                            <th>14 Room</th>
                                            <th>15 Room</th>-->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                                    {
                                        $properties = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
										if($properties['updated']>='2020-11-30')
										{
											$data = json_decode(base64_decode($properties['val']),true);
										}
										else
										{
											$data = json_decode($properties['val'],true);
										}
                                        
										$today = date("Y-m-d");
foreach($data as $valu)
{
	$chked = ($valu['chk_text_val']==1)?'checked':'';
	if($valu['chk_text_val']==1)//--------------- type text-------------------------
	{
		if($price['auto_remove']==0)//---auto_remove ON
		{
			$newdate = check_date($valu['date1']);
			$ex_date = explode(".",$newdate);
			//echo $ex_date[0].'----'.$ex_date[1].'<br>';
			if($ex_date[1] >= $today)
			{
				echo '<tr>';
					echo '<td><button type="button" class="btn btn-warning" onclick="fn.app.properties.properties.Duplicate(this);"><i class="fa fa-clone" aria-hidden="true"></i></button><br>';
						echo '<input type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
						echo '<input type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
					echo '</td>';
					
					$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
					echo '<td><input type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);" id="tx_date1" name="tx_date1" style="width:180px;" value="'.$valu['date1'].'"  placeholder="11 Feb 2021 - 17 Feb 2021">';
						echo '<span class="txnoti" style="">-</span>';
					echo '</td>';
					
					$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
					echo '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
					echo '<td><input type="number" class="form-control" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
					for($i=1;$i<=28;$i++)
					{
						echo '<td><input type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
					}
					echo '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
				echo '</tr>';
			}
			else //----EXP date
			{
				echo '<tr>';
					echo '<td class="danger" colspan="33"><div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ';
					echo 'Warning Remove Soon!</strong> - The data type is TEXT does not support to year transfer function Go to Remark</div>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class="danger">';
						//echo '<input disabled type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
						echo '<input disabled type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
						echo '<button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button>';
					echo '</td>';
					
					$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
					echo '<td class="danger"><input  type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1" style="width:180px;"  value="'.$valu['date1'].'" placeholder="11 Feb 2021 - 17 Feb 2021" >';
					echo '<span class="txnoti" style="">-</span>';
					echo '</td>';
					
					$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
					echo '<td class="danger"><input  type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
					echo '<td class="danger"><input disabled type="number" class="form-control" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
					
					
					
					for($i=1;$i<=28;$i++)
					{
						echo '<td class="danger"><input disabled type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
					}
					echo '<td class="danger"><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
				echo '</tr>';
			}//----EXP date
				
		}
		else//---auto_remove OFF
		{
			echo '<tr>';
				echo '<td><button type="button" class="btn btn-warning" onclick="fn.app.properties.properties.Duplicate(this);"><i class="fa fa-clone" aria-hidden="true"></i></button><br>';
					echo '<input type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
					echo '<input type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
				echo '</td>';
				
				$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
				echo '<td><input type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1" style="width:180px;" value="'.$valu['date1'].'"  placeholder="11 Feb 2021 - 17 Feb 2021">';
				echo '<span class="txnoti" style="">-</span>';
				echo '</td>';
				
				$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
				echo '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
				echo '<td><input type="number" class="form-control" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
				for($i=1;$i<=28;$i++)
				{
					echo '<td><input type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
				}
				echo '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
			echo '</tr>';
		}
		
	}
	else//--------------- type DATE-------------------------
	{
		if($price['auto_remove']==0)//---auto_remove ON
		{
			if($valu['date2'] >= $today)
			{
				//echo $today.'-------------------'.$valu['date1'].'----'.$valu['date2'].'----'.$valu['chk_text_val'].'<br>';
			
				echo '<tr>';
					echo '<td><button type="button" class="btn btn-warning" onclick="fn.app.properties.properties.Duplicate(this);"><i class="fa fa-clone" aria-hidden="true"></i></button><br>';
						echo '<input type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
						echo '<input type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
					echo '</td>';
					
					$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
					echo '<td><input type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);"  onBlur="fn.app.properties.properties.check_type_date_format(this);" id="tx_date1" name="tx_date1" value="'.$valu['date1'].'" placeholder="11 Feb 2021 - 17 Feb 2021" >';
					echo '<span class="txnoti" style=""><span style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Support</span></span>';
					echo '</td>';
					
					$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
					echo '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
					echo '<td><input type="number" class="form-control" style="width:60px;" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
					for($i=1;$i<=28;$i++)
					{
						echo '<td><input type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
					}
					echo '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
				echo '</tr>';
			}
			else //----EXP date
			{
				echo '<tr>';
					echo '<td class="warning" colspan="33"><div class="alert alert-warning" role="alert"> <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ';
					echo 'Warning Remove Soon!</strong> - The data type is DATE support to year transfer function </div>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class="warning">';
						echo '<button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button><br>';
						//echo '<input  type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
						echo '<input  type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
					echo '</td>';
					
					$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
					echo '<td class="warning"><input  disabled type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1" value="'.$valu['date1'].'" placeholder="11 Feb 2021 - 17 Feb 2021" >';
					echo '<span class="txnoti" style=""><span style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Support</span></span>';
					echo '</td>';
					
					$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
					echo '<td class="warning"><input disabled type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
					echo '<td class="warning"><input disabled type="number" class="form-control" style="width:60px;" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
					for($i=1;$i<=28;$i++)
					{
						echo '<td class="warning"><input disabled type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
					}
					echo '<td class="warning"><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
				echo '</tr>';
			}//----EXP date
		}
		else//---auto_remove OFF
		{
			echo '<tr>';
					echo '<td><button type="button" class="btn btn-warning" onclick="fn.app.properties.properties.Duplicate(this);"><i class="fa fa-clone" aria-hidden="true"></i></button><br>';
						echo '<input type="checkbox" id="chk_text" name="chk_text" '.$chked.' onClick="fn.app.properties.properties.Change_to_text(this);"> Text';
						echo '<input type="hidden" id="chk_text_val" name="chk_text_val"   value="'.$valu['chk_text_val'].'">';
					echo '</td>';
					
					$t_type_1 = ($valu['chk_text_val']==1)?'text':'date';
					echo '<td><input type="'.$t_type_1.'" class="form-control" onKeyUp="fn.app.properties.properties.check_type_date_format(this);" onBlur="fn.app.properties.properties.check_type_date_format(this);"  id="tx_date1" name="tx_date1" value="'.$valu['date1'].'" placeholder="11 Feb 2021 - 17 Feb 2021" >';
					echo '<span class="txnoti" style=""><span style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Support</span></span>';
					echo '</td>';
					
					$t_type_2 = ($valu['chk_text_val']==1)?'disabled':'';
					echo '<td><input type="date" class="form-control" id="tx_date2" name="tx_date2" '.$t_type_2.'  value="'.$valu['date2'].'"  ></td>';
					echo '<td><input type="number" class="form-control" style="width:60px;" id="tx_night" name="tx_night" value="'.$valu['night'].'"  ></td>';
					for($i=1;$i<=28;$i++)
					{
						echo '<td><input type="text" class="form-control" id="tx_val" name="tx_val'.$i.'" value="'.$valu['val'.$i.''].'"  ></td>';
					}
					echo '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><i class="fa fa-times" aria-hidden="true"></i></button></td>';
				echo '</tr>';
		}
		
	}
	
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
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="txTax" name="txTax" value="<?php echo $price['tax'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div><br>
                                <label for="txtName" class="col-sm-2 control-label">VAT / Tax</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="txVat" name="txVat" value="<?php echo $price['vat'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div><br>
                                <label for="txtName" class="col-sm-2 control-label">Deposite</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="txDeposite" name="txDeposite" value="<?php echo $price['deposite'];?>">
                                    <span class="input-group-addon" id="basic-addon2">USD</span>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Rate is subject to</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="tax_1" name="tax_1" value="<?php echo $price['tax_1'];?>">
                                    <span class="input-group-addon" id="basic-addon2">% service charge & tax.</span>
                                </div>
                                <div class="col-sm-4 input-group"></div>
                            </div>
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Rate is subject to</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="tax_2" name="tax_2" value="<?php echo $price['tax_2'];?>">
                                    <span class="input-group-addon" id="basic-addon2">% service charge & government tax.</span>
                                </div>
                                <div class="col-sm-4 input-group"></div>
                            </div>
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Rate is subject to</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="tax_3" name="tax_3" value="<?php echo $price['tax_3'];?>">
                                    <span class="input-group-addon" id="basic-addon2">% service charge.</span>
                                </div>
                                <div class="col-sm-4 input-group"></div>
                            </div>
                            <div class="form-group ">
                            	<label for="txtName" class="col-sm-2 control-label">Rate is subject to</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="tax_4" name="tax_4" value="<?php echo $price['tax_4'];?>">
                                    <span class="input-group-addon" id="basic-addon2">% tax.</span>
                                </div>
                                <div class="col-sm-4 input-group"></div>
                           </div>
                           <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Rate is subject to</label>
                                <div class="col-sm-6 input-group">
                                    <input type="text" class="form-control" id="tax_5" name="tax_5" value="<?php echo $price['tax_5'];?>">
                                    <span class="input-group-addon" id="basic-addon2">% vat.</span>
                                </div>
                            </div>
                            
                            <div class="col-md-12"><br><br>
                           <div class="alert alert-default" role="alert">
                            Refundable security deposit of ________ USD is required to be paid ________ days before arrival by
                            <?php
							$deposit = json_decode($price['service'],true);
							?>
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">deposit of</div>
                                            <input type="text" class="form-control" id="s_deposit" name="s_deposit"  value="<?php echo $deposit['deposit'];?>">
                                            <div class="input-group-addon">USD</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">paid</div>
                                            <input type="text" class="form-control" id="s_paid" name="s_paid"  value="<?php echo $deposit['paid'];?>">
                                            <div class="input-group-addon">days</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--new-->
                            <div class="alert alert-default" role="alert">
                            Refundable security deposit of ________ USD is required to be paid on arrival date.
                            <?php
							$deposit = json_decode($price['service'],true);
							?>
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount"></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">deposit of</div>
                                            <input type="text" class="form-control" id="s_deposit_2" name="s_deposit_2"  value="<?php echo $deposit['deposit_2'];?>">
                                            <div class="input-group-addon">USD</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--new-->
                            </div>
                        </div>
                        
                         <?php
						if($dbc->HasRecord("discounts","property=".$_REQUEST['id']))
						{
							$discount = $dbc->GetRecord("discounts","*","property=".$_REQUEST['id']);
						}
						?>
                            
                        <!--------------------Discount------------------------------------------------------------------------------>
                        <div role="tabpanel" class="tab-pane" id="messages"><br>
                       
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="early_percent" name="early_percent" value="<?php echo $price['early_percent'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_day" name="early_day" value="<?php echo $price['early_day'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_1" name="dis_exp_1"  value="<?php echo $discount['dis_exp_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">last minute</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="last_percent" name="last_percent" value="<?php echo $price['last_percent'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="last_date" name="last_date" value="<?php echo $price['last_date'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_2" name="dis_exp_2"  value="<?php echo $discount['dis_exp_2'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="early_1" name="early_1" value="<?php echo $discount['early_1'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_2" name="early_2" value="<?php echo $discount['early_2'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_3" name="dis_exp_3"  value="<?php echo $discount['dis_exp_3'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">last minute</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="last_1" name="last_1" value="<?php echo $discount['last_1'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="last_2" name="last_2" value="<?php echo $discount['last_2'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_4" name="dis_exp_4"  value="<?php echo $discount['dis_exp_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="txtName" class="col-sm-2 control-label">Long Stay</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="long_1" name="long_1" value="<?php echo $discount['long_1'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="long_2" name="long_2" value="<?php echo $discount['long_2'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_5" name="dis_exp_5"  value="<?php echo $discount['dis_exp_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">Long Stay</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="long_3" name="long_3" value="<?php echo $discount['long_3'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="long_4" name="long_4" value="<?php echo $discount['long_4'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_6" name="dis_exp_6"  value="<?php echo $discount['dis_exp_6'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <!--NEW-->
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="early_3" name="early_3" value="<?php echo $discount['early_3'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_date_3" name="early_date_3" value="<?php echo $discount['early_date_3'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_7" name="dis_exp_7"  value="<?php echo $discount['dis_exp_7'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--NEW-->
                                
                                <!--NEW-->
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="early_4" name="early_4" value="<?php echo $discount['early_4'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_date_4" name="early_date_4" value="<?php echo $discount['early_date_4'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_8" name="dis_exp_8"  value="<?php echo $discount['dis_exp_8'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--NEW-->
                                
                                <!--NEW-->
                                <br>
                                <label for="txtName" class="col-sm-2 control-label">Early bird</label>
                                <div class="col-sm-8 input-group">
                                    <input type="text" class="form-control" id="early_5" name="early_5" value="<?php echo $discount['early_5'];?>">
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                
                                    <input type="text" class="form-control" id="early_date_5" name="early_date_5" value="<?php echo $discount['early_date_5'];?>">
                                    <span class="input-group-addon" id="basic-addon2">Days</span>
                                    
                                    <div class="form-group has-warning" style="margin-left: 15px;">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="dis_exp_9" name="dis_exp_9"  value="<?php echo $discount['dis_exp_9'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--NEW-->
                                
                                
                            </div>
                        </div>
                        <!--------------------Discount------------------------------------------------------------------------------>
                        
                        
                        <!--------------------
                        NOTE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div role="tabpanel" class="tab-pane" id="Note"><br>
                        	<div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-info" onClick="fn.app.properties.properties.add_note();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            
                        	<div class="col-md-12 u-note">
                            <?php
							if(count($price['note'])>0)
							{
								$no = json_decode($price['note'],true);
								if($price['new_note']==1)
								{
									foreach($no as $note)
									{
									?>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form-control" id="tx_note" name="tx_note" value="<?php echo $note['notes'];?>" placeholder="Note">
										</div>
										<div class="col-sm-3">
											<input type="date" class="form-control" id="tx_note_exp" name="tx_note_exp" value="<?php echo $note['exp'];?>">
										</div>
										<div class="col-sm-2">
											<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button>	
										</div>
									</div>
									<?php
									}
								}
								else
								{
									//echo '0000000000000000';
									foreach($no as $note)
									{
									?>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form-control" id="tx_note" name="tx_note" value="<?php echo $note;?>" placeholder="Note">
										</div>
										<div class="col-sm-3">
											<input type="date" class="form-control" id="tx_note_exp" name="tx_note_exp" >
										</div>
										<div class="col-sm-2">
											<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button>	
										</div>
									</div>
									<?php
									}
								}
								
								
							}
							?>
                            	
                                
                            </div>
                        </div>
                         <!--------------------
                        NOTE------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        
                        <div role="tabpanel" class="tab-pane" id="settings"><br>
                        	
                            <div class="col-md-12">
                            <!----------------------------------------------------------------------------------------------------------------------------->
                            <div class="alert alert-default" role="alert">
                            	 1. Receive……….discount, for min……..nights booking for travel period between ………………. to ……………….(Remark)
                                 <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="p_discount" name="p_discount"  value="<?php echo $price['p_discount'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">for min</div>
                                            <input type="text" class="form-control" id="p_night" name="p_night"  value="<?php echo $price['p_night'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="p_from" name="p_from"  value="<?php echo $price['p_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="p_to" name="p_to"  value="<?php echo $price['p_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_1" name="pro_rm_1"  value="<?php echo $price['pro_rm_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-warning">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_1" name="pro_exp_1"  value="<?php echo $price['pro_exp_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------->
                            <!----------------------------------------------------------------------------------------------------------------------------->
                            
                            <div class="alert alert-default" role="alert">
                            	 2. Receive……….discount, for min……..nights booking for travel period between ………………. to ……………….(Remark)
                                 <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="p_discount_1" name="p_discount_1"  value="<?php echo $price['p_discount_1'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">for min</div>
                                            <input type="text" class="form-control" id="p_night_1" name="p_night_1"  value="<?php echo $price['p_night_1'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="p_from_1" name="p_from_1"  value="<?php echo $price['p_from_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="p_to_1" name="p_to_1"  value="<?php echo $price['p_to_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_2" name="pro_rm_2"  value="<?php echo $price['pro_rm_2'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-warning">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_2" name="pro_exp_2"  value="<?php echo $price['pro_exp_2'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------->
                            <!----------------------------------------------------------------------------------------------------------------------------->

                            <div class="alert alert-default" role="alert">
                            	 3. Receive……….discount, for min……..nights booking for travel period between ………………. to ……………….(Remark)
                                 <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="p_discount_2" name="p_discount_2"  value="<?php echo $price['p_discount_2'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">for min</div>
                                            <input type="text" class="form-control" id="p_night_2" name="p_night_2"  value="<?php echo $price['p_night_2'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="p_from_2" name="p_from_2"  value="<?php echo $price['p_from_2'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="p_to_2" name="p_to_2"  value="<?php echo $price['p_to_2'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_3" name="pro_rm_3"  value="<?php echo $price['pro_rm_3'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-warning">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_3" name="pro_exp_3"  value="<?php echo $price['pro_exp_3'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------->
                            
                            
                            </div>
                            
                            
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            4. Receive……….discount, and FREE r/t transfer, for travel period between ………………. to ……………….(Remark)
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="pr_discount" name="pr_discount"  value="<?php echo $price['pr_discount'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <?php /*?><div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> r/t transfer</div>
                                            <input type="text" class="form-control" id="pr_free" name="pr_free"  value="<?php echo $price['pr_free'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div><?php */?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="pr_from" name="pr_from"  value="<?php echo $price['pr_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="pr_to" name="pr_to"  value="<?php echo $price['pr_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_4" name="pro_rm_4"  value="<?php echo $price['pro_rm_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_4" name="pro_exp_4"  value="<?php echo $price['pro_exp_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br>
                            
                            
                           <!--  3  --> 
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            5. Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark)
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book" name="ps_book"  value="<?php echo $price['ps_book'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay</div>
                                            <input type="text" class="form-control" id="ps_pay" name="ps_pay"  value="<?php echo $price['ps_pay'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion" name="ps_applicetion"  value="<?php echo $price['ps_applicetion'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from" name="ps_from"  value="<?php echo $price['ps_from'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="ps_to" name="ps_to"  value="<?php echo $price['ps_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_5" name="pro_rm_5"  value="<?php echo $price['pro_rm_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_5" name="pro_exp_5"  value="<?php echo $price['pro_exp_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>
                            <br><br>
                           <!--  3  --> 
                            
                            
                            
                           <!--  4  --> 
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            6. Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark)
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book_4" name="ps_book_4"  value="<?php echo $stay['ps_book_4'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay</div>
                                            <input type="text" class="form-control" id="ps_pay_4" name="ps_pay_4"  value="<?php echo $stay['ps_pay_4'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion_4" name="ps_applicetion_4"  value="<?php echo $stay['ps_applicetion_4'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from_4_1" name="ps_from_4_1"  value="<?php echo $stay['ps_from_4_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="ps_to_4_1" name="ps_to_4_1"  value="<?php echo $stay['ps_to_4_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <?php /*?><div class="alert alert-info" role="alert">
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_4_1" name="ps_from_4_1"  value="<?php echo $stay['ps_from_4_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_4_1" name="ps_to_4_1"  value="<?php echo $stay['ps_to_4_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_4_2" name="ps_from_4_2"  value="<?php echo $stay['ps_from_4_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_4_2" name="ps_to_4_2"  value="<?php echo $stay['ps_to_4_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php */?>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_6" name="pro_rm_6"  value="<?php echo $price['pro_rm_6'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_6" name="pro_exp_6"  value="<?php echo $price['pro_exp_6'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                
							</div>
                            
                            <br><br>
                           <!--  4  --> 
                           
                           
                            
                           <!--  5  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                           7. Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark)
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book_5" name="ps_book_5"  value="<?php echo $stay['ps_book_5'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay</div>
                                            <input type="text" class="form-control" id="ps_pay_5" name="ps_pay_5"  value="<?php echo $stay['ps_pay_5'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion_5" name="ps_applicetion_5"  value="<?php echo $stay['ps_applicetion_5'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from_5_1" name="ps_from_5_1"  value="<?php echo $stay['ps_from_5_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="ps_to_5_1" name="ps_to_5_1"  value="<?php echo $stay['ps_to_5_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                        
								<?php /*?> <div class="alert alert-info" role="alert">
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_5_1" name="ps_from_5_1"  value="<?php echo $stay['ps_from_5_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_5_1" name="ps_to_5_1"  value="<?php echo $stay['ps_to_5_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_5_2" name="ps_from_5_2"  value="<?php echo $stay['ps_from_5_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_5_2" name="ps_to_5_2"  value="<?php echo $stay['ps_to_5_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php */?>                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_7" name="pro_rm_7"  value="<?php echo $price['pro_rm_7'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_7" name="pro_exp_7"  value="<?php echo $price['pro_exp_7'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  5  -->
                            
                            
                           <!--  6  --> 
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            8. Stay/book......nights and pay for.......nights. This promotion applies to (full or less) villa occupancy booking, staying period no later than ........................ (This exclude holiday and weekend)(Remark)
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book_6" name="ps_book_6"  value="<?php echo $stay['ps_book_6'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="ps_pay_6" name="ps_pay_6"  value="<?php echo $stay['ps_pay_6'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion_6" name="ps_applicetion_6"  value="<?php echo $stay['ps_applicetion_6'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from_6_1" name="ps_from_6_1"  value="<?php echo $stay['ps_from_6_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                        
                                <?php /*?><div class="alert alert-info" role="alert">
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_6_1" name="ps_from_6_1"  value="<?php echo $stay['ps_from_6_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_6_1" name="ps_to_6_1"  value="<?php echo $stay['ps_to_6_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_6_2" name="ps_from_6_2"  value="<?php echo $stay['ps_from_6_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_6_2" name="ps_to_6_2"  value="<?php echo $stay['ps_to_6_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php */?>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_8" name="pro_rm_8"  value="<?php echo $price['pro_rm_8'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_8" name="pro_exp_8"  value="<?php echo $price['pro_exp_8'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  6  -->
                            
                            
                            <!--  7  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            9. Stay/book......nights and pay for.......nights. This promotion applies to (full or less) villa occupancy booking, staying period no later than ........................ (This exclude holiday and weekend)(Remark)

                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="ps_book_7" name="ps_book_7"  value="<?php echo $stay['ps_book_7'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="ps_pay_7" name="ps_pay_7"  value="<?php echo $stay['ps_pay_7'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="ps_applicetion_7" name="ps_applicetion_7"  value="<?php echo $stay['ps_applicetion_7'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="ps_from_7_1" name="ps_from_7_1"  value="<?php echo $stay['ps_from_7_1'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                        
                                <?php /*?><div class="alert alert-info" role="alert">
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_7_1" name="ps_from_7_1"  value="<?php echo $stay['ps_from_7_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_7_1" name="ps_to_7_1"  value="<?php echo $stay['ps_to_7_1'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Date</div>
                                                    <input type="date" class="form-control" id="ps_from_7_2" name="ps_from_7_2"  value="<?php echo $stay['ps_from_7_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">To</div>
                                                    <input type="date" class="form-control" id="ps_to_7_2" name="ps_to_7_2"  value="<?php echo $stay['ps_to_7_2'];?>">
                                                    <!--<div class="input-group-addon">.00</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php */?>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_9" name="pro_rm_9"  value="<?php echo $price['pro_rm_9'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_9" name="pro_exp_9"  value="<?php echo $price['pro_exp_9'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  7  -->
                            
                            <!--  10  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            10.Stay/book......nights and pay for.......nights. This promotion applies to (full or less) villa occupancy booking, staying period no later than ........................ (This exclude holiday and weekend)(Remark)

                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="stay_10_1" name="stay_10_1"  value="<?php echo $stay['stay_10_1'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="stay_10_2" name="stay_10_2"  value="<?php echo $stay['stay_10_2'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="stay_10_3" name="stay_10_3"  value="<?php echo $stay['stay_10_3'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="stay_10_4" name="stay_10_4"  value="<?php echo $stay['stay_10_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                        
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_10" name="pro_rm_10"  value="<?php echo $price['pro_rm_10'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_10" name="pro_exp_10"  value="<?php echo $price['pro_exp_10'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  10  -->
                            
                            <!--  11  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            11.Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark) 

                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="stay_11_1" name="stay_11_1"  value="<?php echo $stay['stay_11_1'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="stay_11_2" name="stay_11_2"  value="<?php echo $stay['stay_11_2'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="stay_11_3" name="stay_11_3"  value="<?php echo $stay['stay_11_3'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="stay_11_4" name="stay_11_4"  value="<?php echo $stay['stay_11_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Book by</div>
                                            <input type="date" class="form-control" id="stay_11_5" name="stay_11_5"  value="<?php echo $stay['stay_11_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                        
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_11" name="pro_rm_11"  value="<?php echo $price['pro_rm_11'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_11" name="pro_exp_11"  value="<?php echo $price['pro_exp_11'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  11  -->
                            
                             <!--  12  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            12.Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark)

                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="stay_12_1" name="stay_12_1"  value="<?php echo $stay['stay_12_1'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="stay_12_2" name="stay_12_2"  value="<?php echo $stay['stay_12_2'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="stay_12_3" name="stay_12_3"  value="<?php echo $stay['stay_12_3'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="stay_12_4" name="stay_12_4"  value="<?php echo $stay['stay_12_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Book by</div>
                                            <input type="date" class="form-control" id="stay_12_5" name="stay_12_5"  value="<?php echo $stay['stay_12_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>        
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_12" name="pro_rm_12"  value="<?php echo $price['pro_rm_12'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_12" name="pro_exp_12"  value="<?php echo $price['pro_exp_12'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  12  -->
                            
                            <!--  13  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            13.Stay/book……nights and pay......nights. This promotion applies to (full or less) villa occupancy booking, staying period by...................(Remark)

                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> Stay/book</div>
                                            <input type="text" class="form-control" id="stay_13_1" name="stay_13_1"  value="<?php echo $stay['stay_13_1'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">pay for</div>
                                            <input type="text" class="form-control" id="stay_13_2" name="stay_13_2"  value="<?php echo $stay['stay_13_2'];?>">
                                            <div class="input-group-addon">nights</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon"> full or less</div>
                                            <input type="text" class="form-control" id="stay_13_3" name="stay_13_3"  value="<?php echo $stay['stay_13_3'];?>">
                                            <!--<div class="input-group-addon">nights</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Date</div>
                                            <input type="date" class="form-control" id="stay_13_4" name="stay_13_4"  value="<?php echo $stay['stay_13_4'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Book by</div>
                                            <input type="date" class="form-control" id="stay_13_5" name="stay_13_5"  value="<?php echo $stay['stay_13_5'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>         
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_13" name="pro_rm_13"  value="<?php echo $price['pro_rm_13'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_13" name="pro_exp_13"  value="<?php echo $price['pro_exp_13'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
							</div>
                            <br><br>
                            <!--  13  -->
                            
                            
                            
                            <!--  14  -->
                           <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                           14. Special offer FREE …………………… for staying period by...................(Remark)
                            <hr>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Special offer FREE</div>
                                            <input type="text" class="form-control" id="psp_offer" name="psp_offer"  value="<?php echo $price['psp_offer'];?>">
                                            <!--<div class="input-group-addon">night</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">period by Date</div>
                                            <input type="date" class="form-control" id="psp_fron" name="psp_fron"  value="<?php echo $price['psp_fron'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Book by</div>
                                            <input type="date" class="form-control" id="psp_to" name="psp_to"  value="<?php echo $price['psp_to'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_14" name="pro_rm_14"  value="<?php echo $price['pro_rm_14'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_14" name="pro_exp_14"  value="<?php echo $price['pro_exp_14'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!--  14  -->
                            
                            <!--  15  -->
                            <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            15. Receive……….discount, for travel period between ………………. to ……………….(Remark)
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="pr_discount_15" name="pr_discount_15"  value="<?php echo $price['pr_discount_15'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="pr_from_15" name="pr_from_15"  value="<?php echo $price['pr_from_15'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="pr_to_15" name="pr_to_15"  value="<?php echo $price['pr_to_15'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_15" name="pro_rm_15"  value="<?php echo $price['pro_rm_15'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_15" name="pro_exp_15"  value="<?php echo $price['pro_exp_15'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br>
                            <!--  15  -->
                            
                            <!--  16  -->
                            <div class="col-md-12">
                           <div class="alert alert-default" role="alert">
                            16. Receive……….discount, for travel period between ………………. to ……………….(Remark)
                            <hr>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">Receive</div>
                                            <input type="text" class="form-control" id="pr_discount_16" name="pr_discount_16"  value="<?php echo $price['pr_discount_16'];?>">
                                            <div class="input-group-addon">% discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">between</div>
                                            <input type="date" class="form-control" id="pr_from_16" name="pr_from_16"  value="<?php echo $price['pr_from_16'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">To</div>
                                            <input type="date" class="form-control" id="pr_to_16" name="pr_to_16"  value="<?php echo $price['pr_to_16'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <br><br>
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Remark</div>
                                            <input type="text" class="form-control" id="pro_rm_16" name="pro_rm_16"  value="<?php echo $price['pro_rm_16'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputAmount">exp</label>
                                        <div class="input-group has-warning">
                                            <div class="input-group-addon">Expire date</div>
                                            <input type="date" class="form-control" id="pro_exp_16" name="pro_exp_16"  value="<?php echo $price['pro_exp_16'];?>">
                                            <!--<div class="input-group-addon">.00</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br><br>
                            <!--  16  -->
                            
                        </div>
                    </div><!--tab-content-->
                </div>
               
		    </div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-info pull-left" onClick="fn.app.properties.properties.addtb()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-warning pull-left but_transfer" disabled onClick="fn.app.properties.properties.transfer_year(<?php echo $_REQUEST['id'];?>);">Year Transfer</button>
                <!--<button type="button" class="btn btn-default pull-left"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Year Transfer function not compatible text mode</strong></button>-->
                
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick="fn.app.properties.properties.save_table_pricing();">Save</button>
                
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
       
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
function month($val)
{
	$m = strtolower($val);
	switch($m)
	{
		case'jan':  $month = '01';break;
		case'feb':  $month = '02';break;
		case'mar':  $month = '03';break;
		case'apr':  $month = '04';break;
		case'may':  $month = '05';break;
		case'jun':  $month = '06';break;
		case'jul':  $month = '07';break;
		case'aug':  $month = '08';break;
		case'sep':  $month = '09';break;
		case'oct':  $month = '10';break;
		case'nov':  $month = '11';break;
		case'dec':  $month = '12';break;
	}
	return $month;
}
function check_date($date)
{
	if(strstr($date,'-'))
	{
		$ex = explode("-",$date);
	
		$date1 = explode(" ",$ex[0]);
		$date2 = explode(" ",$ex[1]);
		
		$day1 = $date1[2].'-'.month($date1[1]).'-'.$date1[0];
		$day2 = $date2[3].'-'.month($date2[2]).'-'.$date2[1];
		$new_date = date($day1).'.'.date($day2);
	}
	else
	{
		$new_date = '-';
	}
	
	
	return $new_date;
}
?>
<script tyle="text/javascript">
$( function() {
$( "#sortable tbody" ).sortable();
$( "#sortable" ).disableSelection();
} );
 
function check_date()
{
	
	var i=0;
	$("table#sortable > tbody.ui-sortable > tr").each(function(index, element) {
        var me = $(this).find("#tx_date1");
		$(me).focus();
		$(me).select();
		$(me).blur();
		i++;
		//alert(i);
    });
}
 
$(function(){
	$('#dialog_edit_pricing').on('shown.bs.modal', function () {
		setTimeout(function(){check_date()},500);
	});
	$("#dialog_edit_pricing").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_pricing").modal('show');
	
	$('#tx_auto_remove').click(function(e) {
        if($(this).is(':checked'))
		{
			$(this).val(0);
		}
		else
		{
			$(this).val(1);
		}
    });
	
});	
</script>
<style>
.alert {
    padding: 5px;
    margin-bottom: 0px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.panel-danger>.panel-heading {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
/*.alert-warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
}*/
</style>