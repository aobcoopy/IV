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
	
	foreach($data as $d_price)
	{
		if($date_in >= $d_price['date1'] && $date_out <= $d_price['date2'])//&& $d_price['date2']<=$date_out
		{
			if(year($date_in) == year($d_price['date1']) && year($date_out) == year($d_price['date2']))
			{
				if(month($date_in) == month($d_price['date1']) && month($date_out) == month($d_price['date2']))
				{
					//echo year($date_in).' - '.year($date_out);
					//echo '--YESSS  ';
					//echo $d_price['date1'].'--'.$date_in.' / '.$d_price['date2'].'--'.$date_out.'<br>';
					//echo $d_price['date1'];
					$ar_val = array(
						'date1' => $d_price['date1'],
						'date2' => $d_price['date2'],
						'val' => $d_price['date1'],
					);
				}
				else
				{
				}
			}
		}
		else
		{
			//echo 'NOOOOOOOOOOOOOOO';
		}
	}

	echo json_encode(
		array(
			'status' => true,
			'msg' => '',
			'data' => $ar_val
		)
	);
	//$count = $dbc->GetCount("rating","property = '".$_REQUEST['id']."'");
	
	
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
?>
