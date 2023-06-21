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
	
	<p class="web"><?php echo $desc;?></p></center>
	<?php
}
elseif($ppa=='forrent' && !isset($_REQUEST['des']) && !isset($_REQUEST['sub']) && !isset($_REQUEST['room']))
{
	$cname = $h1;//$meta_h1;
 $desc = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.'
villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';

	$h2 = "Discover Luxury Villas For Rent";
	?>
	<br class="web">
    <?php
	if(isset($_REQUEST['cate']) && $_REQUEST['cate']!=0 && isset($_REQUEST['des']) && isset($_REQUEST['sub']) && isset($_REQUEST['room']))
	{
	}
	else
	{
	}
	?>
    
	<p class="web desct"><?php echo $desc;?></p></center>
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
			$desc = 'Thailand is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in Thailand will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
		}
		else // กล่องแรกไม่ได้เลือกอะไร  กลอ่ง 2 เลือก
		{
			$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of luxury '.$coll.' villa rentals in '.$title_beach.' '.$beac.' will make it easy to find the private villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
		}
	}
	else // กล่องแรกมีการเลือก
	{
		$cname = $h1;//$title_name;
		if($_REQUEST['sub']=='all') // กล่องแรกมีการเลือก กล่อง 2 ไม่ได้เลือก
		{
			if($_REQUEST['des']==110)//----Sri Lanka
			{
				$desc = $desti_meta.' is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.'  villas for rent to make the family holiday of your dreams come true. The selection of '.$coll.' villas in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			}
			elseif($_REQUEST['des']==100)
			{
				$desc = $desti_meta.' is one of the most popular luxury villa holiday destinations. With a great choice of '.$coll.$h2_room.'  villas for rent to make the family holiday of your dreams come true. The selection of '.$coll.' villas in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			}
			else
			{
				$desc = $desti_meta.' is one of the most popular luxury villa holiday destinations in Thailand. With a great choice of '.$coll.$h2_room.'  villas for rent to make the family holiday of your dreams come true. The selection of '.$coll.' villas in '.$title_beach.' '.$beac.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$beac.' '.$title_des.' with Inspiring Villas.';
			}
			
		}
		else // กล่องแรกมีการเลือก กล่อง 2 เลือก
		{
			if($_REQUEST['sub']=='111')
			{
				$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of '.$coll.' villas in '.$title_beach.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$title_des.' with Inspiring Villas.';
			}
			else
			{
				$desc = $beach_det.' is one of the most popular luxury villa holiday destinations in '.$desti_meta.'. With a great choice of '.$coll.$h2_room.' villas for rent to make the family holiday of your dreams come true. The selection of '.$coll.' villas in '.$title_beach.' '.$title_des.' will make it easy to find the villa to satisfy your family or group holiday needs. There is sure to be a villa location & private villa to match. Discover only the best luxury villa vacations in '.$title_beach.' '.$title_des.' with Inspiring Villas.';
			}
			
		}
	}
	?>
    
	<br class="web">
    <?php /*?><br>	<?php echo $title_tag;?><br><?php */?>
    
    
	<p class="web desct"><?php echo $desc;?></p></center>
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
?><br>
</div>
</div>
<?php /*?></div><?php */?>