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
	
	
	$sql = $dbc->Query("select 
    properties.id AS idp,
    properties.`name`,
    pricing.val AS val,
    pricing.updated AS p_update,
    pricing.transfer_year,
	properties.ht_link,
	pricing.auto_remove AS auto_remove
from properties 
INNER JOIN pricing ON properties.id = pricing.property 
where  properties.status > 0 order by idp asc ");
//$today = date("2018-m-d");
$today = date("Y-m-d");
$z=0;
$xx=0;
$okID=array();
$notokID=array();
while($line = $dbc->Fetch($sql))
{
	$id = $line['idp'];
	$newval = array();
	
	if($line['p_update']>='2020-11-30')
	{
		$val = json_decode(base64_decode($line['val']),true);
	}
	else
	{
		$val = json_decode($line['val'],true);
	}
	echo $
	$year = '';
	$x=0;
	$remov = 0;
	
	foreach($val as $valu)
	{
		if($valu['chk_text_val']==1)
		{
			$ndate = check_date($valu['date1']);
			$ex_date = explode(".",$ndate);
			//$valu['date1'] = $ex_date[0];
			//$valu['date2'] = $ex_date[1];
			
			if($line['auto_remove']==0)
			{
				if($ex_date[1]<$today)
				{
					$remov = 1;
				}
				else
				{
					$remov = 0;
				}
			}
			else
			{
				$remov = 0;
			}
			
			$da = array(
				'date1' => $valu['date1'],
				'date2' => $valu['date2'],
				'night' => $valu['night']					
			);
			for($i=1;$i<=28;$i++)
			{
				$da['val'.$i] = $valu['val'.$i];
			}
			$da['chk_text_val'] = $valu['chk_text_val'];
			$da['remov'] = $remov;
			//{"date1":"2021-06-11","date2":"2021-06-20","night":"5","val1":"1000","val2":"2000","val3":"","val4":"","val5":"","val6":"","val7":"","val8":"","val9":"","val10":"","val11":"","val12":"","val13":"","val14":"","val15":"","val16":"","val17":"","val18":"","val19":"","val20":"","val21":"","val22":"","val23":"","val24":"","val25":"","val26":"","val27":"","val28":"","chk_text_val":"0"}
		}
		else
		{
			if($line['auto_remove']==0)
			{
				if($valu['date2']<$today)
				{
					$remov = 1;
				}
				else
				{
					$remov = 0;
				}
			}
			else
			{
				$remov = 0;
			}
			
				
			$da = array(
				'date1' => $valu['date1'],
				'date2' => $valu['date2'],
				'night' => $valu['night']					
			);
			for($i=1;$i<=28;$i++)
			{
				$da['val'.$i] = $valu['val'.$i];
			}
			$da['chk_text_val'] = 0;
			$da['remov'] = $remov;
		}
		array_push($newval,$da);
		$x++;
	}

	$data = array(
		'val' => base64_encode(json_encode($newval)),
		'#updated' => 'NOW()'
	);
	
	if($dbc->Update("pricing",$data,"property = '".$id."'"))
	{
		$xx=1*1;
		array_push($okID,$id);
	}
	else
	{
		$xx=1*0;
		array_push($notokID,$id);
	}
	
	/*echo '<pre>';
	print_r($newval);
	echo '</pre>';*/

	//print_r($data);
	//echo $id.'<br>';
	$data = null;
	$newval = null;
	$z++;
	
}
if($xx==1)
{
	echo json_encode(array(
		'status' => true,
		'work' => $okID,
		'notwork' => $notokID
	));
}
else
{
	echo json_encode(array(
		'status' => false,
		'work' => $okID,
		'notwork' => $notokID
	));
}
//echo $z.'--'.$xx;
	$dbc->Close();
?>
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
