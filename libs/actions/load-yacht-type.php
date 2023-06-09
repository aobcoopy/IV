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
	
	$w_yacht = "";
	$option = "";
	
	$id = $_REQUEST['id'];
	$tx_type = isset($_REQUEST['type'])?$_REQUEST['type']:'';
	
	if($id == 'all')
	{
		$w_yacht = "";
		//$sql_yacht = $dbc->Query("SELECT * FROM yacth_destination WHERE status > 0 and fleet_type IS NOT NULL ORDER BY name ASC ");
		$sql_yacht = $dbc->Query("SELECT DISTINCT yacht.fleet FROM yacht WHERE status > 0 ".$w_yacht." ORDER BY fleet ASC ");
		while($yacht = $dbc->Fetch($sql_yacht))
		{
			//$option.= '<option value="'.$yacht['slug'].'">'.$yacht['name'].'</option>';
			$type = $dbc->GetRecord("yacth_destination","*","id = '".$yacht['fleet']."'");
			$act = ($tx_type==$type['slug'])?'selected':'';
			$option.= '<option value="'.$type['slug'].'" '.$act.'>'.$type['name'].'</option>';
		}
	}
	else
	{
		$w_yacht = "and destination = '".$id."' ";
		$sql_yacht = $dbc->Query("SELECT DISTINCT yacht.fleet FROM yacht WHERE status > 0 ".$w_yacht." ORDER BY fleet ASC ");
		while($yacht = $dbc->Fetch($sql_yacht))
		{
			$type = $dbc->GetRecord("yacth_destination","*","id = '".$yacht['fleet']."'");
			$act = ($tx_type==$type['slug'])?'selected':'';
			$option.= '<option value="'.$type['slug'].'" '.$act.'>'.$type['name'].'</option>';
		}
	}
	
	
	
	echo $option;
?>
