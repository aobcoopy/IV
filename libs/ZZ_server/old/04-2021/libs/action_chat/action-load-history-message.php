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
	
	$id = $_REQUEST['id'];
	
	
	$sql = $dbc->Query("select * from chat_history where room = '".$id."' order by id asc");
	while($row = $dbc->Fetch($sql))
	{
		if($row['user']=='')
		{
			$user = '0';
		}
		else
		{
			$udata = $dbc->GetRecord("users","*","id = '".$row['user']."'");
			$user = $udata['name'];
		}
		
		$today = date("Y-m-d");
		$da = substr($row['created'],0,10);
		if($da==$today)
		{
			$date = dateToday($row['created']);
		}
		else
		{
			$date = dateType($row['created']);
		}
		
		$ar_text[] = array(
			'name' => $row['name'],
			'text' => $row['message'],
			'user' => $user,
			'read' => $row['read_status'],
			'date' => $date,
			'status' => $row['status'],
		);
	}
	//$data = $dbc->GetRecord("chat_history","*","room = '".$id."'");
	
	echo json_encode(
		$ar_text
	);
	
	
function dateToday($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	$time = substr($data,10,10);
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
	return  'Today '.$time;
}
function dateType($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	$time = substr($data,10,10);
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
	return  $d.' '.$month .' '.$y.' -'.$time;
}
?>
