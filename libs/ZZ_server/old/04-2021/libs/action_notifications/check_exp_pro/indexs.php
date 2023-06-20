<div class="col-md-12">
    <div class="cal">0000</div>
</div>	
<?php

	session_start();
	include_once "../../../config/define.php";
	include_once "../../class/db.php";
	//include_once "../../class/minerva.php";
    include_once "../../../inc/sendmail.inc.php";
	
	
	//include_once "../../libs/class/minerva.php";
	
	/*include_once "../dashboard/xhr/11/config/define.php";
	include_once "../dashboard/xhr/11/class/db.php";*/
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
$q = "SELECT 
	p.id AS pid,
	po.id AS poid,
	po.name AS pname,
	po.status AS postatus,
	pro_exp_1,
	pro_exp_2,
	pro_exp_3,
	pro_exp_4,
	pro_exp_5,
	pro_exp_6,
	pro_exp_7,
	pro_exp_8,
	pro_exp_9,
	pro_exp_10


	FROM pricing AS p
	LEFT JOIN properties AS po ON p.property = po.id
	WHERE
	po.status > 0
	order by pid desc
";
$ss = $dbc->Query($q);
$today = date("Y-m-d");
//$villa_data = array();
while($row = $dbc->Fetch($ss))
{
	$ex = explode("|",$row['pname']);
	echo '<div class="col-md-3">';
		echo '<pre>';
		
			echo $row['pid'].'--'.$row['poid'].'--'.$ex[0];
			echo '<br>';
			
			for($i=1;$i<=10;$i++)
			{
				if($row['pro_exp_'.$i]!='' && $row['pro_exp_'.$i]!='0000-00-00' )
				{
					
			
					$tds = $row['pro_exp_'.$i];
					$vids = $row['poid'];
					if($today==$tds)
					{
						$villa_data[] = array(
							'name' => $ex[0],
							'villa_id' => $vids,
							'position' => $i
						);
						
						echo check_date($today,$row['pro_exp_'.$i],$ex[0],$row['poid'],$i).'<br>';
						/*echo '='.$row['pro_exp_'.$i];
						echo check_date($today,$row['pro_exp_'.$i],$ex[0],$row['poid'],$i);
						echo '<br>';*/
					}
					else
					{
					}
					
					
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
			echo '<input type="hidden" class="form-control" id="position" name="position" value="'.$dats['position'].'">';
			echo '<br>';
		echo '</div>';
		$a++;
	}
	?>
</form>
<pre><?php //print_r($villa_data);?>
<br>


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
			position : $(this).find("input[name=position]").val(),
		});
	});
//alert(data_val['tx_name']);
	//$(".cal").html(data_val);
	$.ajax({
		//url:"https://27.254.41.171/~inspiring/alertit.php",
		url:"http://127.0.0.1:8119/libs/action_notifications/check_exp_pro/alertit.php",
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