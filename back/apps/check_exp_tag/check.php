<?php

	include_once "../../config/define.php";
	include_once "../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
$q = "SELECT * FROM properties 
	WHERE
	status > 0
	order by tag_exp desc
";
$ss = $dbc->Query($q);
$today = date("Y-m-d");
//$villa_data = array();
while($row = $dbc->Fetch($ss))
{
	$ex = explode("|",$row['name']);
	if($row['tag_exp']!='' && $row['tag_exp']!='0000-00-00' )
	{
		$tds = $row['tag_exp'];
		$vids = $row['id'];
		if($today==$tds)
		{
			$villa_data[] = array(
				'name' => $ex[0],
				'villa_id' => $vids,
				'exp' => $tds,
				'tag' => $row['tag']
			);
			
		}
		else
		{
		}
	}
}
echo json_encode($villa_data);
?>

