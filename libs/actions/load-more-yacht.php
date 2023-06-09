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
	
	$start = $_REQUEST['start'];
	$desttination = $_REQUEST['destination'];
	$y_marina = isset($_REQUEST['marina'])?$_REQUEST['marina']:'all';
	$type = $_REQUEST['type'];
	$y_charter = isset($_REQUEST['charter'])?$_REQUEST['charter']:'all';
	$y_cabin = isset($_REQUEST['cabin'])?$_REQUEST['cabin']:'all';
	$price = $_REQUEST['price'];
	

	//$next = isset($_REQUEST['next'])?$_REQUEST['next']:'';
	
	$where_destination = '';
	if($desttination!='all')
	{
		$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$desttination."'");
		$where_destination = "and destination = '".$yacht_destination['id']."'";
		$destination_name = $yacht_destination['name'];
	}
	
	$where_marina = '';
	if($y_marina!='all')
	{
		$yacht_marina = $dbc->GetRecord("yacth_marina","*","slug = '".$_REQUEST['marina']."'");
		$where_marina = "and marina = '".$yacht_marina ['id']."'";
	}
	
	$where_type = '';
	if($type!='all')
	{
		$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$type."'");
		$where_type = "and fleet = '".$yacht_destination['id']."'";
	}
	
	$where_type_of_charter = '';
	if($y_charter!='all')
	{
		$yacht_charter = $dbc->GetRecord("yacth_charter","*","id = '".$_REQUEST['charter']."'");
		$where_type_of_charter = "and type_of_charter = '".$yacht_charter ['id']."'";
	}
	
	$where_cabin = '';
	if($y_cabin!='all')
	{
		//$yacht_charter = $dbc->GetRecord("yacth_charter","*","id = '".$_REQUEST['cabin']."'");
		switch($y_cabin)
		{
			case"1-4" :
				$where_cabin = "and bedroom_capacity BETWEEN 1 AND 4 ";
			break;
			case"5-7" :
				$where_cabin = "and bedroom_capacity BETWEEN 5 AND 7 ";
			break;
			case"more" :
				$where_cabin = "and bedroom_capacity > 8 ";
			break;
			default:
		}
	}



	$where_price = "";
	if($price!='all')
	{
		$ste_replace = str_replace("USD","",$price);
		$price_explode = explode("-",$ste_replace);
		$option_price = "";
		switch($price_explode[0])
		{
			case"under":
				$option_price = "< 1000";
			break;
			case"above":
				$option_price = "> 5000";
			break;
			default:
				$option_price = "BETWEEN ".$price_explode[0]." AND ".$price_explode[1]."";
			break;
		}
		$where_price = "and price ".$option_price." ";
	}
	
	$where = "where status > 0 ".$where_destination." ".$where_marina." ".$where_type." ".$where_type_of_charter." ".$where_cabin." ".$where_price." ";
	//$where = "where status > 0 ".$where_destination." ".$where_type." ".$where_price." ";
	//echo "select * from yacht ".$where." <br>";
	$sql1 = $dbc->Query("select * from yacht ".$where." order by destination,price asc limit ".$start.",5");//limit 0,5
	
	$zz = $_REQUEST['xyz'];
	while($row = $dbc->Fetch($sql1))
	{
		
		if($zz=='5' )
		{
			echo '<div class="villa_boxs_mini web" style="margin-top: -10px;"><button class="bad clicking tupper"><strong>receive $150 off any excursion booking during your villa stay with us*</strong></button></div>';	
			echo '<div class="villa_boxs_mini photo_banner mob" style="margin-top: -17px;"><img src="/upload/search/mm111.jpg" width="100%" alt="CONCIERGE OFFER"></div>';
		}
		if($zz=='8' )
		{
			/*echo '<div class="villa_boxs_mini photo_banner web "><img src="/upload/search/22222.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';
			echo '<div class="villa_boxs_mini photo_banner mob "><img src="/upload/search/mm22.jpg" width="100%" alt="EXCURISON PROMOTION"></div>';*/
			echo '<div class="villa_boxs_mini " style="margin-top: -10px;">';
						echo '<div class="villa_boxs_mini_2">';
							echo '<ul class="ads_ul">';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> Best Price Guaranteed </li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> $150 Excursion Credit Gift</li>';
								echo '<li><img data-src="'.$url_link.'upload/fa-check.png" class="lazy"> No Booking Fees</li>';
							echo '</ul>';
						echo '</div>';
					echo '</div>';
		}
		//echo $zz;
		include "../pages/yacht_list_view.php";
		$zz++;
		//echo $zz;  
	}
?>
