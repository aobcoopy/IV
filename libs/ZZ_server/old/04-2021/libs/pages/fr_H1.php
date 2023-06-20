<?php /*?><div class="container-fluid bgwh"><?php */?>
<div class="container">
 <div class="col-md-12 col-sm-12 col-xs-12 fr_des">
 <?php
if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
{
	$cate = $dbc->GetRecord("categories","*","id=".$_REQUEST['cate']);
	$cname = $cate['name'];
	$desc = base64_decode($cate['detail'],true);
	
	$h2='';
	switch($_REQUEST['cate'])
	{
		case "2":
			//return "Party Villa";
			$h2	= "All Party Luxury Villas For Rent in Thailand";
		break;
		case "3":
			//return "Family Villas";
			$h2	= "All Garden Luxury Villas for Rent in Thailand";
		break;
		case "4":
			//return "Seaview Villas";
			$h2	= "All Seaview Luxury Villas For Rent in Thailand";
		break;
		case "5":
			//return "Larger Group Villas";
			$h2	= "All Larger Group Luxury Villas for Rent in Thailand";
		break;
		case "6":
			//return "Beachfront Villas";
			$h2	= "All Beachfront Luxury Villas For Rent in Thailand";
		break;
		case "8":
			//return "Wedding Villas";
			$h2	= "All Wedding Luxury Villas For Rent in Thailand";
		break;
		default:
	}
	$meta_h1 = $cname;
	?>
	<br class="web">
	<center><h1 class="mg-sec-titles myh1" ><span itemprop="name"><?php echo $cname;?></span></h1>
	<?php
}
elseif($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
{
	$cname = $h1;//$meta_h1;
 $desc = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.'
villas for rent. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';

	$h2 = "Discover Luxury Villas For Rent";
	?>
	<br class="web">
	<center><h1 class="mg-sec-titles myh1"><span itemprop="name"><?php echo $cname;?></span></h1>
    <?php
	if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && isset($_REQUEST['des']) && isset($_REQUEST['sub']) && isset($_REQUEST['room']))
	{
	}
	else
	{
		
	}
	?>
	<?php
}
else
{
	$beac = ($title_beach!='')?'Beach':'';
	if($_REQUEST['des']=='all') // ไม่ได้เลือกอะไร
	{
		$cname = $h1;//$meta_h1;
		if($_REQUEST['sub']=='all') // ไม่ได้เลือกอะไร
		{
			$desc = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.' villas for rent. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			/*$desc = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.'
villas for rent. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';*/
 
/* $desc = 'Thailand is one of the most popular private villa holiday destinations. With an amazing selection of '.$coll.'
 private pool villas for  rent to make the holiday of your dreams in Thailand. The choice of luxury villas makes it easy to find the private villa to match your family or group holiday in Thailand.  There is sure to be a villa location & private villa in Thailand to match your villa holiday dream.';*/
		}
		else // กล่องแรกไม่ได้เลือกอะไร  กลอ่ง 2 เลือก
		{
			$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.' villas for rent. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' will make it easy to find the private villa to satisfy your family or group holiday needs. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			
			//private pool villas for  rent to make the holiday of your dreams in Thailand. The choice of luxury villas makes it easy to find the private villa to match your family or group holiday in Thailand. There is sure to be a villa location & private villa in '.$beach_det.'Thailand to match your villa holiday dream.';
			
			/*$desc = $beach_det.' is one of the most popular private villa holiday destinations in Thailand. With an amazing selection of '.$coll.' private pool villas for  rent to make the holiday of your dreams in Thailand. The choice of luxury villas makes it easy to find the private villa to match your family or group holiday in Thailand. There is sure to be a villa location & private villa in '.$beach_det.'Thailand to match your villa holiday dream.';*/
		}
	}
	else // กล่องแรกมีการเลือก
	{
		$cname = $h1;//$title_name;
		if($_REQUEST['sub']=='all') // กล่องแรกมีการเลือก กล่อง 2 ไม่ได้เลือก
		{
			$desc = $desti_meta.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.'  villas for rent. The selection of '.$coll.' villas in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			
			/*$desc = $desti_meta.' is one of the most popular private villa holiday destinations in Thailand. With an amazing selection of '.$coll.' private pool villas for rent to make the holiday of your dreams in Thailand. The choice of luxury villas makes it easy to find the private villa to match your family or group holiday in Thailand. There is sure to be a villa location & private villa in '.$desti_meta.' to match your villa holiday dream.';*/
		}
		else // กล่องแรกมีการเลือก กล่อง 2 เลือก
		{
			$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of '.$coll.$h2_room.' villas for rent. The selection of '.$coll.' villas in '.$title_beach.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. Discover only the best luxury villa vacations in '.$title_beach.' '.$title_des.' with Inspiring Villas.';
			
			//$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of '.$coll.$h2_room.' villas for rent. The selection of '.$coll.' villas in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			
			
			//There is sure to be a villa location & private villa in '.$beach_det.''.$desti_meta.' to match your villa holiday dream.';
			
			/*$desc = $beach_det.' is one of the most popular private villa holiday destinations in '.$desti_meta.'. With an amazing selection of '.$coll.' private pool villas for rent to make the holiday of your dreams in Thailand. The choice of luxury villas makes it easy to find the private villa to match your family or group holiday in '.$desti_meta.'. There is sure to be a villa location & private villa in '.$beach_det.''.$desti_meta.' to match your villa holiday dream.';*/
		}
	}
	?>
	<br class="web">
    <?php /*?><br>	<?php echo $title_tag;?><br><?php */?>
	<center><h1 class="mg-sec-titles myh1"><span itemprop="name"><?php echo $cname;?></span></h1>
	<?php /*?><p class="web desct"><?php echo $desc;?></p></center><?php */?>
	<?php
}
?>
<?php
	if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && isset($_REQUEST['des']) && isset($_REQUEST['sub']) && isset($_REQUEST['room']))
	{
	}
	else
	{
	}
?>
</div>
</div>
<?php /*?></div><?php */?>