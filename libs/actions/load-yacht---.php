<?php
	/**/session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
    include_once "../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
		?>
		<div class="col-md-12 nopad bottom50">
		<center>
		<h1 class="mtop255" style="    text-transform: uppercase;" > Interested in one of your recently viewed villas?</h1>
		<?php /*?><h2 class="f16" style="    font-family: pt !important;">Discover Private Pool Villas For Rent</h2><?php */?>
		</center>
		</div>
			<div class="container nopad t_t11">
			<?php
						//echo '<div class="col-md-12 nopad">';
						//echo '<pre>';
		//				print_r($_SESSION['recent_all']);
		//				echo '</pre>';
		//				$ks = $_SESSION['recent_all'];
		//				krsort($ks);
		//				echo '<pre>';
		//				print_r($ks);
		//				echo '</pre>';
						
						$zx=1;
						if(isset($_SESSION['recent_all']))
						{	krsort($_SESSION['recent_all']);
							foreach($_SESSION['recent_all'] as $idv)
							{
								//$row = $dbc->GetRecord("properties","*","id='".$idv."' ");
								$sql = $dbc->Query("SELECT properties.id AS id,properties.`name`,properties.brief,properties.short_det,properties.photo,properties.features,properties.price,properties.status,properties.destination AS destination,properties.bedroom,properties.tag,properties.price_range,properties.actualbed,properties.ht_link,properties.subdestination,properties.pmin,properties.pmax,property_cate.caategory,properties.adults AS adults,categories.name AS cname,properties.cate_icon AS cate_icon,destinations.name AS dname,properties.bedroom_range AS bedroom_range
			FROM properties 
			LEFT JOIN property_cate ON properties.id = property_cate.property
			LEFT JOIN categories ON properties.cate_icon = categories.id
			LEFT JOIN destinations ON properties.subdestination = destinations.id
			WHERE properties.id='".$idv."' ");
								$row = $dbc->Fetch($sql);
			
								$v_name = explode("|",$row['name']);
								$name = explode("|",$row['name']);
								$photo = json_decode($row['photo'],true);
								
								 if($row['tag']!=0)
								{
									$tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
									$tag_name = $tag['name'];
								}
													
								$catename = explode("-",$row['cname']);
								switch($row['cate_icon'])
								{
									case"4":
										$icon_cate = "beach";
										$icon_name = "Seaview Villa";
									break;
									case"5":
										$icon_cate = "largegroup";
										$icon_name = "Large Group Villa";
									break;
									case"6":
										$icon_cate = "seas";
										$icon_name = "Beachfront Villa";
									break;
									case"8":
										$icon_cate = "wedding";
										$icon_name = "Wedding Villa";
									break;
									case"9":
										$icon_cate = "house";
										$icon_name = "Garden Villa";
									break;
									case"10":
										$icon_cate = "house";
										$icon_name = "Tropical Villa";
									break;
									default:
										$icon_cate = "";
										$icon_name = "";
								}
								
								if(strstr($row['dname'],'Beach'))
								{
									$split = explode(",",$row['dname']);// แบ่งข้อความโดชใช้ ,
									$locations = str_ireplace('Beach','',$split[0]);// แทนที่ข้อความ
									
									$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
									//echo $row['dname']."<br>";// แสดงข้อความเต็ม
									//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
									$full_location = substr_replace($locations,",",$nost).$split[1];
								}
								elseif(strstr($row['dname'],'Bay'))
								{
									$split = explode(",",$row['dname']);// แบ่งข้อความโดชใช้ ,
									$locations = str_ireplace('Bay','',$split[0]);// แทนที่ข้อความ
									
									$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
									//echo $row['dname']."<br>";// แสดงข้อความเต็ม
									//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
									$full_location = substr_replace($locations,",",$nost).$split[1];
								}
								elseif(strstr($row['dname'],'Bophut'))
								{
									//echo $row['dname']."<br>";// แสดงข้อความเต็ม
									$full_location = $row['dname'];
								}
								else
								{
									//echo $row['dname']."<br>";// แสดงข้อความเต็ม
									$full_location = $row['dname'];
								}
													
													
							
							
							echo '<br>';
							
							include "../pages/property_list_view.php";
													
							echo '<br><br>';						
							
							$zz++;	
							
							
							}
						}
						//echo '</div>';
						?>
			 </div>
	<?php
			?>
			<div class="col-md-12 nopad bottom50">
				<center>
					<?php /*?><img src="../../upload/empty.png" ><?php */?>
					<h2 class="mtop255" style="    text-transform: uppercase;" >There are no recently viewed villas available at this time</h2><br>
					<a href="/"><button class="btn btn-main text-center" style="margin: auto;">Homepage</button></a>
					<?php /*?><h2 class="f16" style="    font-family: pt !important;">Discover Private Pool Villas For Rent</h2><?php */?>
				</center>
			</div>
		<?php
?>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>
<?php 
function imageP($url)
{
	//echo $url;
	if(strrchr($url,'https://127.0.0.1/'))
	{
		//echo 'yes';
		$lin = explode("upload",$url);
		return substr_replace('https://127.0.0.1/','https://media.inspiringvillas.com/prd/',$url).'upload'.$lin[1];
	}
	else
	{
		//echo 'noooooooooooooo';
		return  "https://media.inspiringvillas.com/prd".$url;
//		echo $url;
	}
	
}
?>