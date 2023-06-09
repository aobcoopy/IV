<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$date_in = dateType2($_REQUEST['checkin']);
	$date_out = dateType2($_REQUEST['checkout']);
	$id = $_REQUEST['txtID'];
	$no_bed = $_REQUEST['no_bed'];

	$datetime1 = date_create($date_in);
	$datetime2 = date_create($date_out);
	$dateinterval = date_diff($datetime1, $datetime2);
	
	$total_day = $dateinterval->format('%d');

	//echo $date_in.' - '.$date_out;
	$sql = $dbc->GetRecord("pricing","*","property = '".$id."' ");
	if($sql['updated']>='2020-11-30')
	{
		$data = json_decode(base64_decode($sql['val']),true);
	}
	else
	{
		$data = json_decode($sql['val'],true);
	}
	
	$text = 0;
	foreach($data as $d_price)
	{
		if($d_price['chk_text_val']==1)
		{
			$text = 0;
			$d_price['date1'] = check_date($d_price['date1']);
			
			//echo $d_price['date1'][0].' ++ '.$d_price['date1'][1].'<br>';
			$d_price_date1 = $d_price['date1'][0];
			$d_price_date2 = $d_price['date1'][1];
			
			//echo $d_price_date2.'<br>';
			if($date_in >= $d_price_date1)//&& $d_price_date2<=$date_out
			{
				//echo 'YES---In '.$d_price_date1.'--'.$date_in.'  <br>';
				
				if($date_out <= $d_price_date2)
				{
					//echo 'YES---Out  '.$d_price_date2.'--'.$date_out.'<br>';
					
					if(year($date_in) == year($d_price_date1))
					{
						//echo '<br> Year In---'.year($date_in) .'=='. year($d_price_date1);
						
						if(year($date_out) <= year($d_price_date2))
						{
							//echo '<br> Year Out---'.year($date_out) .'<='. year($d_price_date2);
							
							if(month($date_in) >= month($d_price_date1))
							{
								//echo '<br> Month In---'.month($date_in) .'=='. month($d_price_date1);
								
								if(month($date_out) <= month($d_price_date2))
								{
									//echo '<br> Month Out---'.month($date_out) .'<='. month($d_price_date2);
									//echo year($date_in).' - '.year($date_out);
									//echo '--YESSS  ';
									//echo $d_price_date1.'--'.$date_in.' / '.$d_price_date2.'--'.$date_out.'<br>';
									//echo $d_price_date1;
									$ar_val = array(
										'date1' => $d_price_date1,
										'date2' => $d_price_date2,
									);
									for($i=1;$i<=28;$i++)
									{
										if($no_bed==0)
										{
											$ar_val['val'] = 0;
										}
										else
										{
											if($d_price['val'.$i]!='' && $i==$no_bed)
											{
												//echo $i.'--'.$d_price['val'.$i].'<br>';
												$ar_val['val'] = ($d_price['val'.$i]*$total_day);
												$ar_val['trueval'] = str_replace('+','',$d_price['val'.$i]);
											}
										}
										
									}
								}
								else
								{
									$ar_val = array(
										'date1' => $d_price_date1,
										'date2' => $d_price_date2,
									);
									for($i=1;$i<=28;$i++)
									{
										if($no_bed==0)
										{
											$ar_val['val'] = 0;
										}
										else
										{
											if($d_price['val'.$i]!='' && $i==$no_bed)
											{
												//echo $i.'--'.$d_price['val'.$i].'<br>';
												$ar_val['val'] = ($d_price['val'.$i]*$total_day);
												$ar_val['trueval'] = str_replace('+','',$d_price['val'.$i]);
											}
										}
										
									}
								}
							}
							else
							{
								/*$ar_val = array(
									'date1' => $d_price_date1,
									'date2' => $d_price_date2,
									'val' => 0
								);*/
							}
						}
					}
				}
			}
		}
		else
		{
			$text = 0;
			if($date_in >= $d_price['date1'])//&& $d_price['date2']<=$date_out
			{
				//echo 'YES---In '.$d_price['date1'].'--'.$date_in.'  <br>';
				
				if($date_out <= $d_price['date2'])
				{
					//echo 'YES---Out  '.$d_price['date2'].'--'.$date_out.'<br>';
					
					if(year($date_in) == year($d_price['date1']))
					{
						//echo '<br> Year In---'.year($date_in) .'=='. year($d_price['date1']);
						
						if(year($date_out) <= year($d_price['date2']))
						{
							//echo '<br> Year Out---'.year($date_out) .'<='. year($d_price['date2']);
							
							if(month($date_in) >= month($d_price['date1']))
							{
								//echo '<br> Month In---'.month($date_in) .'=='. month($d_price['date1']);
								
								if(month($date_out) <= month($d_price['date2']))
								{
									//echo '<br> Month Out---'.month($date_out) .'<='. month($d_price['date2']);
									//echo year($date_in).' - '.year($date_out);
									//echo '--YESSS  ';
									//echo $d_price['date1'].'--'.$date_in.' / '.$d_price['date2'].'--'.$date_out.'<br>';
									//echo $d_price['date1'];
									$ar_val = array(
										'date1' => $d_price['date1'],
										'date2' => $d_price['date2'],
									);
									for($i=1;$i<=28;$i++)
									{
										if($no_bed==0)
										{
											$ar_val['val'] = 0;
										}
										else
										{
											if($d_price['val'.$i]!='' && $i==$no_bed)
											{
												//echo $i.'--'.$d_price['val'.$i].'<br>';
												$ar_val['val'] = ($d_price['val'.$i]*$total_day);
												$ar_val['trueval'] = str_replace('+','',$d_price['val'.$i]);
											}
										}
										
									}
								}
								else
								{
									$ar_val = array(
										'date1' => $d_price['date1'],
										'date2' => $d_price['date2'],
									);
									for($i=1;$i<=28;$i++)
									{
										if($no_bed==0)
										{
											$ar_val['val'] = 0;
										}
										else
										{
											if($d_price['val'.$i]!='' && $i==$no_bed)
											{
												//echo $i.'--'.$d_price['val'.$i].'<br>';
												$ar_val['val'] = ($d_price['val'.$i]*$total_day);
												$ar_val['trueval'] = str_replace('+','',$d_price['val'.$i]);
											}
										}
										
									}
								}
							}
							else
							{
								/*$ar_val = array(
									'date1' => $d_price['date1'],
									'date2' => $d_price['date2'],
									'val' => 0
								);*/
							}
						}
					}
				}
			}
		}
		/*else
		{
			//echo 'NOOOOOOOOOOOOOOO';
			$ar_val = array(
				'date1' => $d_price['date1'],
				'date2' => $d_price['date2'],
				'val' => 0
			);
		}*/
	}
	
	$d_today = date("Y-m-d");
	/*$date_1 = date_create($date_in);
	$date_2 = date_create($d_today);
	$dateinterval_1 = date_diff($date_2, $date_1);*/
	
	
	$diff_date_discount = datediff($d_today , $date_in);//$dateinterval_1->format('%d');
	//echo $diff_date_discount;
	
	$ar_val['diff_date_discount'] = ($diff_date_discount!=0)?$diff_date_discount:'-';
	
	//-----Discount
		$ar_val['discount_1'] = ($sql['early_percent']!='' && $diff_date_discount >= $sql['early_day'])?($sql['early_percent']/100):'-';//--Early bird %
		$ar_val['discount_1_1'] = ($sql['early_percent']!='' && $diff_date_discount >= $sql['early_day'])?$sql['early_percent']:'-';//--Early bird %
		//$ar_val['early_day'] = ($sql['early_day']!='')?$sql['early_day']:'-';//--Early bird days
	
		$ar_val['discount_2'] = ($sql['last_percent']!='' && $diff_date_discount >= $sql['last_date'])?($sql['last_percent']/100):'-';//--last minute last_percent
		$ar_val['discount_2_2'] = ($sql['last_percent']!='' && $diff_date_discount >= $sql['last_date'])?$sql['last_percent']:'-';//--last minute last_percent
		//$ar_val['last_date'] = ($sql['last_date']!='')?$sql['last_date']:'-';//--last minute last_date	
	
	if($dbc->HasRecord("discounts","property=".$id))
	{
		$discount = $dbc->GetRecord("discounts","*","property=".$id);

		$ar_val['discount_3'] = ($discount['early_1']!='' && $diff_date_discount >= $discount['early_2'])?($discount['early_1']/100):'-';//--Early bird
		$ar_val['discount_3_3'] = ($discount['early_1']!='' && $diff_date_discount >= $discount['early_2'])?$discount['early_1']:'-';//--Early bird
		//$ar_val['early_2'] = ($discount['early_2']!='' && $diff_date_discount >= $discount['early_2'])?$discount['early_2']:'-';//--Early bird

		$ar_val['discount_4'] = ($discount['last_1']!='' && $diff_date_discount >= $discount['last_2'])?($discount['last_1']/100):'-';//--last minute
		$ar_val['discount_4_4'] = ($discount['last_1']!='' && $diff_date_discount >= $discount['last_2'])?$discount['last_1']:'-';//--last minute
		//$ar_val['last_2'] = ($discount['last_2']!='' && $diff_date_discount >= $discount['last_2'])?$discount['last_2']:'-';//--last minute

		$ar_val['discount_5'] = ($discount['long_1']!='' && $diff_date_discount >= $discount['long_2'])?($discount['long_1']/100):'-';//--Long Stay
		$ar_val['discount_5_5'] = ($discount['long_1']!='' && $diff_date_discount >= $discount['long_2'])?$discount['long_1']:'-';//--Long Stay
		//$ar_val['long_2'] = ($discount['long_2']!='' && $diff_date_discount >= $discount['long_2'])?$discount['long_2']:'-';//--Long Stay

		$ar_val['discount_6'] = ($discount['long_3']!='' && $diff_date_discount >= $discount['long_4'])?($discount['long_3']/100):'-';//--Long Stay
		$ar_val['discount_6_6'] = ($discount['long_3']!='' && $diff_date_discount >= $discount['long_4'])?$discount['long_3']:'-';//--Long Stay
		//$ar_val['long_4'] = ($discount['long_4']!='' && $diff_date_discount >= $discount['long_4'])?$discount['long_4']:'-';//--Long Stay

		$ar_val['discount_7'] = ($discount['early_3']!='' && $diff_date_discount >= $discount['early_date_3'])?($discount['early_3']/100):'-';//--Early bird
		$ar_val['discount_7_7'] = ($discount['early_3']!='' && $diff_date_discount >= $discount['early_date_3'])?$discount['early_3']:'-';//--Early bird
		//$ar_val['early_date_3'] = ($discount['early_date_3']!='' && $diff_date_discount >= $discount['early_date_3'])?$discount['early_date_3']:'-';//--Early bird

		$ar_val['discount_8'] = ($discount['early_4']!='' && $diff_date_discount >= $discount['early_date_4'])?($discount['early_4']/100):'-';//--Early bird
		$ar_val['discount_8_8'] = ($discount['early_4']!='' && $diff_date_discount >= $discount['early_date_4'])?$discount['early_4']:'-';//--Early bird
		//$ar_val['early_date_4'] = ($discount['early_date_4']!='' && $diff_date_discount >= $discount['early_date_4'])?$discount['early_date_4']:'-';//--Early bird

		$ar_val['discount_9'] = ($discount['early_5']!='' && $diff_date_discount >= $discount['early_date_5'])?($discount['early_5']/100):'-';//--Early bird
		$ar_val['discount_9_9'] = ($discount['early_5']!='' && $diff_date_discount >= $discount['early_date_5'])?$discount['early_5']:'-';//--Early bird
		//$ar_val['early_date_5'] = ($discount['early_date_5']!='' && $diff_date_discount >= $discount['early_date_5'])?$discount['early_date_5']:'-';//--Early bird
		
	}
	//-----Discount
	
	$ar_val['services'] = ($sql['tax']!='')?$sql['tax']:'-';
	$ar_val['vat'] = ($sql['vat']!='')?$sql['vat']:'-';
	$ar_val['deposite'] = ($sql['deposite']!='')?$sql['deposite']:'-';
	$ar_val['tax_1'] = ($sql['tax_1']!='')?$sql['tax_1']/100:'-';
	$ar_val['tax_2'] = ($sql['tax_2']!='')?$sql['tax_2']/100:'-';
	$ar_val['tax_3'] = ($sql['tax_3']!='')?$sql['tax_3']/100:'-';
	$ar_val['tax_4'] = ($sql['tax_4']!='')?$sql['tax_4']/100:'-';
	$ar_val['tax_5'] = ($sql['tax_5']!='')?$sql['tax_5']/100:'-';
	
	$ar_val['tax_1_txt'] = ($sql['tax_1']!='')?$sql['tax_1']:'-';
	$ar_val['tax_2_txt'] = ($sql['tax_2']!='')?$sql['tax_2']:'-';
	$ar_val['tax_3_txt'] = ($sql['tax_3']!='')?$sql['tax_3']:'-';
	$ar_val['tax_4_txt'] = ($sql['tax_4']!='')?$sql['tax_4']:'-';
	$ar_val['tax_5_txt'] = ($sql['tax_5']!='')?$sql['tax_5']:'-';
	$ar_val['exchange'] = ($sql['exchange']!='')?strtoupper($sql['exchange']):'-';
	$ar_val['total_night'] = ($total_day!=0)?$total_day:'-';

	if($text==1)
	{
		echo json_encode(
			array(
				'status' => false,
				'msg' => 'NO Data',
				'data' => 0
			)
		);
	}
	else
	{
		echo json_encode(
			array(
				'status' => true,
				'msg' => '',
				'data' => $ar_val
			)
		);
	}
	/*echo json_encode(
		array(
			'status' => true,
			'msg' => '',
			'data' => $ar_val
		)
	);*/
	//$count = $dbc->GetCount("rating","property = '".$_REQUEST['id']."'");
	
	function datediff ( $start, $end ) 
	{
	   $datediff = strtotime(dateform($end)) - strtotime(dateform($start));
	   return floor($datediff / (60 * 60 * 24));
	}

	function dateform($date)
	{
	   $d = explode('/',$date);
	   //return $d[2].'-'.$d[1].'-'.$d[0];
	   return $date;
	}
	
	function check_amont_date($date_1='',$date_2='')
	{
		if($date_1 >= $date_2)
		{
			return true;
		}
	}
	
	function month($data)
	{
		$ex = explode("-",$data);
		$y = $ex[0];
		$m = $ex[1];
		$d = $ex[2];
		return  $m;//.'-'.$m.'-'.$d;
	}
	
	function year($data)
	{
		$ex = explode("-",$data);
		$y = $ex[0];
		$m = $ex[1];
		$d = $ex[2];
		return  $y;//.'-'.$m.'-'.$d;
	}
	
	function dateType2($data)
	{
		$ex = explode("/",$data);
		$y = $ex[2];
		$m = $ex[0];
		$d = $ex[1];
		switch($m)
		{
			case'01':  $month = 'Jan';break;
			case'02':  $month = 'Feb';break;
			case'03':  $month = 'Mar';break;
			case'04':  $month = 'Apr';break;
			case'05':  $month = 'May';break;
			case'06':  $month = 'Jun';break;
			case'07':  $month = 'Jul';break;
			case'08':  $month = 'Aug';break;
			case'09':  $month = 'Sep';break;
			case'10':  $month = 'Oct';break;
			case'11':  $month = 'Nov';break;
			case'12':  $month = 'Dec';break;
		}
		return  $y.'-'.$m.'-'.$d;
	}
	
	function check_date($date)
	{
		if(strstr($date,'-'))
		{
			$ex = explode("-",$date);
		
			$date1 = explode(" ",$ex[0]);
			$date2 = explode(" ",$ex[1]);
			
			$day1 = $date1[2].'-'.months($date1[1]).'-'.$date1[0];
			$day2 = $date2[3].'-'.months($date2[2]).'-'.$date2[1];
			$new_date = array(date($day1),date($day2));
		}
		else
		{
			$new_date = '-';
		}
		return $new_date;
	}
	
	function months($val)
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

?>
