<?php
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$tags = $_REQUEST['tags'];
	
	//$data = $dbc->GetRecord("properties","*","name LIKE '%".$tags."%' ");
	if($tags=='Villa U')
	{
		$sql = $dbc->Query("select * from properties where name LIKE '".$tags."%'  and status > 0");
		while($row = $dbc->Fetch($sql))
		{
			$v_name = explode("|",$row['name']);
			if(trim($v_name[0])==$tags)
			{
				$data = $dbc->GetRecord("properties","*","id = '".$row['id']."'  ");
				//echo $v_name[0].'++'.$row['id'].'<br>';
			}
			else
			{
				//echo 'noo++'.$v_name[0].'<br>';
			}
		}
		//echo 'YESS'.'<br><br><br>';
	}
	elseif($tags=='Villa M')
	{
		$sql = $dbc->Query("select * from properties where name LIKE '".$tags."%' and status > 0");
		while($row = $dbc->Fetch($sql))
		{
			$v_name = explode("|",$row['name']);
			if(trim($v_name[0])==$tags)
			{
				$data = $dbc->GetRecord("properties","*","id = '".$row['id']."'  ");
				//echo $v_name[0].'++'.$row['id'].'<br>';
			}
			else
			{
				//echo 'noo++'.$v_name[0].'<br>';
			}
		}
		//echo 'YESS'.'<br><br><br>';
	}
	elseif($tags=='Villa Uno')
	{
		$data = $dbc->GetRecord("properties","*","name LIKE '".$tags."%'  and status > 0");
		//echo 'NOOOOOOOOOOOOOOOOOOOOOOOOO'.'<br>';
	}
	else
	{
		$data = $dbc->GetRecord("properties","*","name LIKE '".$tags."%'  and status > 0");
		//echo 'NOOOOOOOOOOOOOOOOOOOOOOOOO'.'<br>';
	}
	
	//echo $tags.'----<br>/'.$data['name'].'/<br>----'.$data['ht_link'];
	echo json_encode($data['ht_link']);
	
?>