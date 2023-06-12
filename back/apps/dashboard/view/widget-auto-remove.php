<div class="panel-group" id="ARS" role="tablist" aria-multiselectable="true">
<h3 class="pull-left">Data is Type <span class="label label-warning">Date</span></h3>
<h3>Data is Type <span class="label label-danger">TEXT</span></h3>
<div class="row">
    <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
    Make sure before proceeding with the deletion.
    Once deleted, it cannot be recovered.
    </div>
    
    <!--<button class="btn btn-danger pull-right" onClick="fn.app.dashboard.del_remove_data();">Delete Now</button>-->
</div>

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
    pricing.val,
    pricing.updated,
    pricing.transfer_year,
	properties.ht_link,
	pricing.auto_remove AS auto_remove
from properties 
INNER JOIN pricing ON properties.id = pricing.property 
where  properties.status > 0 order by idp asc");
//$today = date("2018-m-d");
$today = date("Y-m-d");
$z=0;
$ar_atr = array();
while($row = $dbc->Fetch($sql))
{
	if($row['updated']>='2020-11-30')
	{
		$data = json_decode(base64_decode($row['val']),true);
	}
	else
	{
		$data = json_decode($row['val'],true);
	}
	
	/*echo '<a href="../'.$row['ht_link'].'.html" target="_blank">';
	echo $row['idp'].' '.$row['name'];
	echo '</a>';
	echo '<br>';*/
	
	$ar_atr[$row['idp']] = $row['idp'];
	
	foreach($data as $val)
	{
		if($val['chk_text_val']==1)
		{
			//echo '-----'.check_date($val['date1']).' - Not Support';
			if($row['auto_remove']==0)
			{
				$ndate = check_date($val['date1']);
				$ex_date = explode(".",$ndate);
				$val['date1'] = $ex_date[0];
				$val['date2'] = $ex_date[1];
				
				if($val['date2']<$today)
				{
					/*echo '<span class="label label-danger">';
						echo $val['date1'].' - '.$val['date2'];
					echo '</span>';*/
	
					$ar_val = array();
					for($i=1;$i<=28;$i++)
					{
						if($val['val'.$i.'']!='')
						{
								//echo ' - '.$i.' Bedroom '.$val['val'.$i.''].'';
								$br = $i.' Bedroom '.$val['val'.$i.''];
								array_push($ar_val,$br);
						} 
					}
					
					$data_atr[$row['idp']][] = array(
						'id' => $row['idp'],
						'name' => $row['name'],
						'date1' => $val['date1'],
						'date2' => $val['date2'],
						'val' => $ar_val,
						'typeText' => 1,
						'link' => $row['ht_link'],
						'remov' => $val['remov']
					);
					//echo '<br>';
				}
			}
			
		}
		else
		{
			if($row['auto_remove']==0)
			{
				if($val['date2']<$today)
				{
					/*echo ' <span class="label label-default">';
					echo $val['date1'].' - '.$val['date2'];
					echo '</span>';*/
					
					$ar_val = array();
					for($i=1;$i<=28;$i++)
					{
						if($val['val'.$i.'']!='')
						{
							//echo ' - '.$i.' Bedroom '.$val['val'.$i.''].'';
							$br = $i.' Bedroom '.$val['val'.$i.''];
							array_push($ar_val,$br);
						} 
					}
					
					$data_atr[$row['idp']][] = array(
						'id' => $row['idp'],
						'name' => $row['name'],
						'date1' => $val['date1'],
						'date2' => $val['date2'],
						'val' => $ar_val,
						'link' => $row['ht_link'],
						'remov' => $val['remov']
					);
					//echo '<br>';
				}
			}
			else
			{
			}
			
			
		}
	}
}



$total = count($data_atr);
if($total>0)
{
	foreach($data_atr as $v_data)
	{
		//echo $v_data[0];
		$identity = '';
		//echo '<div class="col-md-6">';
		foreach($v_data as $level_1)
		{
			
			if($identity != $level_1['id'])
			{
				$identity = $level_1['id'];
				
				
				


				echo '<a href="../'.$level_1['link'].'.html" target="_blank">';
				echo '<h3 style="line-height:0;">'.$level_1['id'].' '.$level_1['name'].'</h3>';	
				echo '</a>';
				//echo '<button type="button" class="btn btn-warning pull-right" onClick="fn.app.transfer.transfer_year(this,'.$row['idp'].');">Transfer</button>';
				echo '<br>';
			}
				
					$color = ($level_1['typeText']==1)?'danger':'warning';
					echo ' <span class="label label-'.$color.'">';
					echo $level_1['date1'].' - '.$level_1['date2'];//.' ----- '.$level_1['remov'];
					echo '</span>';
					//echo '<br>';
						
						foreach($level_1['val'] as $level_2)
						{
							echo ' - '.$level_2.'&nbsp; ';
						}
			echo '<br>';
			
		}
		
		echo '<br><br>';
		//echo '</div>';
	}
}
else
{
	echo '<div class="alert alert-info" role="alert"> <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Today there is no data to delete. </div>';
}

?>
</div>
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

