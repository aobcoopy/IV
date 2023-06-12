<?php 
//$url = "http://127.0.0.1:8119/back/";
$url = "https://www.inspiringvillas.com/back/";
?>
<link rel="stylesheet" type="text/css" id="theme" href="<?php echo $url;?>libs/css/theme-default.css"/>
<script type="text/javascript" src="<?php echo $url;?>libs/js/plugins/jquery/jquery.min.js"></script>

<div class="col-md-12">
    <div class="cal">0000</div>
</div>	
<?php

	include_once "../../config/define.php";
	include_once "../../libs/class/db.php";
	
	//include_once "../../libs/class/minerva.php";
	
	/*include_once "../dashboard/xhr/11/config/define.php";
	include_once "../dashboard/xhr/11/class/db.php";*/
	
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
	echo '<div class="col-md-2">';
		echo '<pre>';
		
			echo $row['id'].'--'.$ex[0].'--'.$row['tag_exp'];
			echo '<br>';
			
			
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
						
						echo check_date($today,$tds,$ex[0],$vids).'<br>';
						/*echo '='.$row['pro_exp_'.$i];
						echo check_date($today,$row['pro_exp_'.$i],$ex[0],$row['poid'],$i);
						echo '<br>';*/
					}
					else
					{
					}
					
					
				}
				
			
		echo '</pre>';
	echo '</div>';
}

function check_date($td='',$da='',$villa='',$vid='',$posi='')
{
	//global $villa_data;
	
	if($da!='' && $da!='0000-00-00')
	{
		if($da==$td)
		{
			return '--EXP TODAY--'.$villa.'--'.$vid.'--'.$posi;
		}
		elseif($da<$td)
		{
			return '--EXPIERED';
		}
		elseif($da>$td)
		{
			return '--SOON--'.$villa.'--'.$vid.'--'.$posi;
		}
		else
		{
			return '--No';
		}
	}
	else
	{
		return '-';
	}
}

?>

<form id="data_valu">
	<?php
	$a=0;
	foreach($villa_data as $dats)
	{
		echo '<div id="colec" class="sub_form col-md-12">';
			echo '<input type="hidden" class="form-control" id="tx_name" name="tx_name" value="'.$dats['name'].'">';
			echo '<input type="hidden" class="form-control" id="villa_id" name="villa_id" value="'.$dats['villa_id'].'">';
			echo '<input type="hidden" class="form-control" id="exp" name="exp" value="'.$dats['exp'].'">';
			echo '<input type="hidden" class="form-control" id="tag" name="tag" value="'.$dats['tag'].'">';
			echo '<br>';
		echo '</div>';
		$a++;
	}
	?>
</form>
<?php /*?><pre><?php print_r($villa_data);?></pre>
<br><?php */?>


<script>
var amt = '<?php echo count($villa_data);?>';
if(amt!=0)
{
	setTimeout(function(){
		sent_noti(amt);
	},2000);
}
else
{
	//alert(0);
}

function sent_noti(amt)
{
	var data_val=[];
	$(".sub_form").each(function() {
		/*console.log($(this).find("input[name=tx_name]").val());
		console.log($(this).find("input[name=villa_id]").val());
		console.log($(this).find("input[name=position]").val());*/
		data_val.push({
			tx_name : $(this).find("input[name=tx_name]").val(),
			villa_id : $(this).find("input[name=villa_id]").val(),
			exp : $(this).find("input[name=exp]").val(),
			tag : $(this).find("input[name=tag]").val(),
		});
	});
	$.ajax({
		//url:"alert_tag.php",  
		//url:"https://27.254.41.171/~inspiring/alert_tag.php",
		url:"https://www.inspiringvillas.com/libs/action_notifications/alert_tag.php",
		//url:"apps/dashboard/xhr/alertit.php",  check_exp_pro
		//url:"https://staging.inspiringvillas.com/back/apps/dashboard/xhr/alertit.php",
		type:"POST",
		dataType:"html",
		data:{data_val:data_val},//$("#form_data").serialize(),
		success: function(res){
			$(".cal").html(res);
			//if(res.status==true)
//			{
//				alert(res.dat);
//			}
//			else
//			{
//				alert(res.msg);
//			}
		}
	});
}
</script>