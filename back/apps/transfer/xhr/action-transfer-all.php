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
	
$arid = $_REQUEST['txarid'];	
/*foreach($arid as $idd)
{
	echo '-----'.$idd.'<br>';
}
print_r($arid);
*/
$sql = $dbc->Query("select 
    properties.id AS idp,
    properties.`name`,
    pricing.val,
    pricing.updated AS pupdated,
    pricing.transfer_year,
	properties.ht_link
from properties 
INNER JOIN pricing ON properties.id = pricing.property 
where  properties.status > 0 order by idp asc");
$today = date("2018-m-d");
$today = date("Y-m-d");
$z=0;
while($line = $dbc->Fetch($sql))
{
	$id = $line['idp'];
	$newval = array();
	
	if(in_array($id,$arid))
	{
		if($line['transfer_year']>date("Y"))
		{
		}
		else
		{
			//echo $line['idp'].'<br>';
			
			/*$sqll = $dbc->Query("select * from pricing where property='".$id."'");
			while($row = $dbc->Fetch($sqll))
			{*/
				if($line['pupdated']>='2020-11-30')
				{
					$val = json_decode(base64_decode($line['val']),true);
				}
				else
				{
					$val = json_decode($line['val'],true);
				}
				
				$year = '';
				$x=0;
				if(count($val)>0)
				{
					foreach($val as $valu)
					{
						if($valu['chk_text_val']==0)
						{
							$ex_1 = explode("-",$valu['date1']);
							$ex_2 = explode("-",$valu['date2']);
							//------  +-  YEAR  -------------------------------------------------
							$new_year_1 = ($ex_1[0]+1).'-'.$ex_1[1].'-'.$ex_1[2];
							$new_year_2 = ($ex_2[0]+1).'-'.$ex_2[1].'-'.$ex_2[2];
							//------  +-  YEAR  -------------------------------------------------
							$da = array(
								'date1' => $new_year_1,
								'date2' => $new_year_2,
								'night' => $valu['night']					
							);
							for($i=1;$i<=28;$i++)
							{
								$da['val'.$i] = $valu['val'.$i];
							}
							$da['chk_text_val'] = $valu['chk_text_val'];
							$ty = ($ex_1[0]+1);
						}
						else
						{
							$ndate = check_date($valu['date1']);
							$ex_date = explode(".",$ndate);
							$ex_date_lv_1 = explode("-",$ex_date[0]);
							$ex_date_lv_1_2 = explode("-",$ex_date[1]);
							//------  +-  YEAR  -------------------------------------------------
							$ex_date_lv_2 = $ex_date_lv_1[0]+1;
							$ex_date_lv_2_2 = $ex_date_lv_1_2[0]+1;
							//------  +-  YEAR  -------------------------------------------------
							$new_date_text = $ex_date_lv_2.'-'.$ex_date_lv_1[1].'-'.$ex_date_lv_1[2].' . '.$ex_date_lv_2_2.'-'.$ex_date_lv_1_2[1].'-'.$ex_date_lv_1_2[2];
							
							$da = array(
								'date1' => reverse($new_date_text),
								'date2' => $valu['date2'],
								'night' => $valu['night']					
							);
							
							for($i=1;$i<=28;$i++)
							{
								$da['val'.$i] = $valu['val'.$i];
							}
							$da['chk_text_val'] = $valu['chk_text_val'];
							$ty = $ex_date_lv_2;
							
						}
						array_push($newval,$da);
						
						if($x==0)
						{
							$year = $ty;
						}
						$x++;
					}
					
					$data = array(
						'val' => base64_encode(json_encode($newval)),
						'#updated' => 'NOW()',
						'transfer_year' => $year
					);
					
					$dbc->Update("pricing",$data,"property = '".$id."'");
					
				}//---- end count val
			//}//---end while row
		}//---- end $line['transfer_year']>date("Y")
	}//---- in_array
	
	//print_r($data);
	//echo $id.'<br>';
	$data = null;
	$newval = null;
	$z++;
	
}
//echo $z;
		

	$dbc->Close();
?>
<?php
function reverse($val)
{
	// 2022-05-01 . 2021-06-30 >> 01 Jul 2021 - 31 Jul 2021
	$ex = explode(".",$val);
	$date_1 = splited("-",trim($ex[0]));
	$date_2 = splited("-",trim($ex[1]));
	
	$d1 = $date_1[2].' '.month_text($date_1[1]).' '.$date_1[0];
	$d2 = $date_2[2].' '.month_text($date_2[1]).' '.$date_2[0];
	return $d1.' - '.$d2;
}

function splited($oper,$val)
{
	return explode($oper,$val);
}

function month_text($val)
{
	$m = strtolower($val);
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
	return $month;
}

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
		$new_date = '';
	}
	return $new_date;
}
?>