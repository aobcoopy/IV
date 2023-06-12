<?php 
	$rate = $dbc->GetRecord("variable","*","name = 'exchange'");
	$today = date("Y-m-d");
	//if($rate['updated']<$today)
//	{
//		$curl = curl_init();
//		
//			curl_setopt_array($curl, array(
//		  CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=thb&from=usd&amount=1",
//		  CURLOPT_HTTPHEADER => array(
//			"Content-Type: text/plain",
//			"apikey: CxqNTe9q7iDpVxqDN3Vr7bsEpofnB4wI"
//		  ),
//		  CURLOPT_RETURNTRANSFER => true,
//		  CURLOPT_ENCODING => "",
//		  CURLOPT_MAXREDIRS => 10,
//		  CURLOPT_TIMEOUT => 0,
//		  CURLOPT_FOLLOWLOCATION => true,
//		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//		  CURLOPT_CUSTOMREQUEST => "GET"
//		));
//	
//		$response = curl_exec($curl);
//		$decode = json_decode($response,true);
//		curl_close($curl);
//		//echo $response.'<br><br><br><br>';
//		//echo '>>'.$decode['info']['rate'].'<<';
//		$today_rate = number_format($decode['info']['rate'],2);
//		$ar_data = array(
//			'value' => $today_rate,
//			'#updated' => 'NOW()'
//		);
//		
//		if($dbc->Update("variable",$ar_data,"name = 'exchange'"))
//		{
//			$ar_data_us = array(
//				'value' => $today_rate,
//				'#updated' => 'NOW()'
//			);
//			$dbc->Update("variable",$ar_data_us,"name = 'us'");
//			
//			$ar_data_th = array(
//				'value' => $today_rate,
//				'#updated' => 'NOW()'
//			);
//			$dbc->Update("variable",$ar_data_th,"name = 'thb'");
//			
//		}
//		
//		$rate = $dbc->GetRecord("variable","*","name = 'exchange'");
//	}
//	else
//	{
//	}
	
function dateType($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
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
	return  $d.' / '.$month .' / '.$y;
}
?>


<div class="alert alert-warning" role="alert">

	<div class="col-md-6" style="font-size: 30px;">
    	Exchange rate today (<?php echo dateType($rate['updated']);?>)
    </div>
    <div class="col-md-6" style="font-size: 30px;">
    	<!--<span class="fa fa-money"></span> -->1 USD = <?php echo $rate['value'];?> THB
    </div>
    <div class="col-md-4">
    	
        <!--<form id="form_us" class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Exchange rate today <?php echo $decode['date'];?></div>
                    <input type="number" class="form-control" id="tx_us" name="tx_us" placeholder="Amount" min="1" step="0.01"  value="<?php echo $us['value'];?>">
                    <div class="input-group-addon">THB</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" onClick="save_money()">Save</button>
        </form>-->
    
    </div>
    

</div>
<script>
function save_money()
{
	if($("#tx_us").val()=='')
	{
		alert("Please fill your data");
		return false;
		$("#tx_us").focus();
	}
	else
	{
		$.ajax({
			url:"apps/dashboard/xhr/action-save-us.php",
			type:"POST",
			dataType:"json",
			data:$("#form_us").serialize(),
			success: function(res){
				if(res.success==true){setTimeout(function(){window.location.reload();},1000);}
			}
		});
	}
	
}
</script>




