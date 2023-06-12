<?php 
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$sql = $dbc->Query("select * from chat_history where room = '".$_REQUEST['id']."'");
	while($row = $dbc->Fetch($sql))
	{
		$user = $dbc->GetRecord("users","*","id=".$_SESSION['auth']['user_id']);
		//@$time = date("H:i:s",$row['created']);
		
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
		
		echo '<div class="col-md-12">';
		if($row['user']=='')
		{
			echo "<div class=\"cover_chat\">";
				echo "<p><strong>".$row['name']."</strong> : ".$row['message']."</p>";
				
			echo "</div>";
			echo "<p>".$date."</p>";
			/*echo "<div class=\"cover_chat_ad text-right pull-right\">";
				echo "<p>".$row['message']."<strong> : IV Team - ".$row['name']."</strong></p>";
			   // echo "<p>".$row['message']."</p> ";
			echo "</div>";*/
		}
		else
		{
			$readsta = ($row['status']==1)?"<span class=\"read_sta\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span>":"";
			
			echo "<div class=\"cover_chat_ad text-right pull-right\">";
				echo "<p>".$row['message']."<strong> : ".$row['name']."</strong></p>";
			   // echo "<p>".$row['message']."</p> ";
			echo "</div>";
			echo "<p class=\"text-right2 text-right \">".$date." ".$readsta."</p>";
			
			/*echo "<div class=\"cover_chat\">";
				echo "<p><strong>ผู้ใช้งาน</strong> : ".$row['message']."</p>";
			   // echo "<p>".$row['message']."</p>";
			echo "</div>";*/
		}
		echo '</div>';
	}
	
	
	
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