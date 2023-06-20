<br><br><br<br><br>


<?php include "libs/pages/search.php";?>


<div class="container">

<div class="col-xs-12 col-sm-12 col-md-12 nopad  "><br><br>
    <center>
        <h1 class="mtop255"  >Luxury Villas Promotions</h1>
    </center>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 nopad  ">
    <ul class="pro">
        <li onClick="gotoposi('38');">Phuket Villas Promotions</li>
        <li onClick="gotoposi('39');">Koh Samui Villas Promotions</li>
    </ul>
    <hr class="myhr">
</div>

<script>
function gotoposi(po)
{
	//alert(po);
	$('html,body').animate({ 
		scrollTop: $(".posi_"+po).offset().top-100
	}, 1000);
}
</script>
<?php
$xx=0;
$sql_des = $dbc->Query("select * from destinations where status > 0 and parent IS NULL");
while($line = $dbc->Fetch($sql_des))
{
	
	

	$c=1;
	
	$sql = "SELECT 
				p.id,
				p.name,
				p.brief,
				p.photo,
				p.price,
				p.pro_status,
				p.cate_icon,
				p.destination,
				p.subdestination,
				p.ht_link,
				p.tag,
				p.discount,
				p.bedroom_range AS bedroom_range,
				p.tag_exp
			FROM
				properties AS p
			WHERE
				p.pro_status > 0 and p.destination = '".$line['id']."'
			ORDER BY
				p.destination ASC
			";
	$qry = $dbc->Query($sql);
	$count = $dbc->Getnum($qry);
	if($count>0)
	{
		if($xx>0)
		{
			$text_h_2 = "text_h_2";
		}
		?>
            <div class="col-xs-12 col-sm-12 col-md-12 nopad bottom25 posi_<?php echo $line['id'].'  '.$text_h_2;?> ">
            
                <?php
                if($xx>0)
				{
					?><hr class="mhr"><?php
				}
				?><center>
                    <h2 class="mtop255"  ><?php echo $line['name'];?>  Villa Promotions</h2>
                </center>
            </div>
        <?php
		$xx++;
		while($row = $dbc->Fetch($qry))
		{
			$name = explode("|",$row['name']);
			$photo = json_decode($row['photo'],true);
			 
			$destination = $dbc->GetRecord("destinations","*","id='".$row['subdestination']."'");
			$dname = $destination['name'];
			
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
			
			if(strstr($dname,'Beach'))
			{
				$split = explode(",",$dname);// แบ่งข้อความโดชใช้ ,
				$locations = str_ireplace('Beach','',$split[0]);// แทนที่ข้อความ
				
				$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
				//echo $dname."<br>";// แสดงข้อความเต็ม
				//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
				$full_location = substr_replace($locations,",",$nost).$split[1];
			}
			elseif(strstr($dname,'Bay'))
			{
				$split = explode(",",$dname);// แบ่งข้อความโดชใช้ ,
				$locations = str_ireplace('Bay','',$split[0]);// แทนที่ข้อความ
				
				$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
				//echo $dname."<br>";// แสดงข้อความเต็ม
				//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
				$full_location = substr_replace($locations,",",$nost).$split[1];
			}
			elseif(strstr($dname,'Bophut'))
			{
				//echo $dname."<br>";// แสดงข้อความเต็ม
				$full_location = $dname;
			}
			else
			{
				//echo $dname."<br>";// แสดงข้อความเต็ม
				$full_location = $dname;
			}
                                            
			$exp_date = $row['tag_exp'];
			$D_today = date("Y-m-d");
			//echo $D_today.'--'.$exp_date;
			if($exp_date>=$D_today || $exp_date=='0000-00-00' || $exp_date=='')
			{
				if($row['tag']!=0)
				{
					$tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
					$tag_name = $tag['name'];
					$button = '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
				}
				else
				{
					$button = '';
				}
			}
			else
			{
				$button = '';
			}
			/*if($row['tag']!=0)
			{
				$tag = $dbc->GetRecord("tags","*","id = '".$row['tag']."' ");
				$tag_name = $tag['name'];
			}*/
																							
													
			if($c==1)
			{
				$c=0;
				$pading_grid = 'padleft15';
				//echo 'yyyyyyyyyy';
			}
			else
			{
				$c=1;
				$pading_grid = 'padright15';
				//echo 'zzzzzzzzzz';
			}
			//echo imagePaths($photo[0]['img']);
			echo '<div class="col-xs-12 col-sm-6 col-md-4 '.$pading_grid.' ">';//<a href="?page=blogdetail&blog='.$r_blog['id'].'">
					echo '<div class="col-xs-12 col-sm-12 col-md-12  nopad shad">';
					
					echo '<div class="col-md-12 boxpho nopad">';
						if($row['tag']!=0)
						{
							echo $button;//'<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
						}
						echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img src="'.imagePaths($photo[0]['img']).'" width="100%"></a>';//$photo[0]['img']
					echo '</div>';
					
					echo '<div class="col-xs-12 col-sm-12 col-md-12 boxbot_b nopad">';
						echo '<div class="col-xs-12 col-sm-12 col-md-12  borbo nopad">';
							echo '<div class="col-xs-12 col-sm-12 col-md-9 t_t33 nopad">';
								if(strlen($name[0])>20)
								{
									echo '<div class="covbox_name">';
										echo '<h2 class="btitle" ><strong>'.$name[0].'</strong></h2>'; //string_len($name[0],17)
									echo '</div>';
								}
								else
								{
									echo '<div class="">';
										echo '<h2 class="btitle" ><strong>'.$name[0].'</strong></h2>'; //string_len($name[0],17)
									echo '</div>';
								}
								
							echo '</div>';
							echo '<div class="col-xs-12 col-sm-12 col-md-3 t_t44 web9922 nopad text-right revv" style="font-size:13px;margin-top: 22px;">';
							$rev = $dbc->GetCount("rating","property=".$row['id']);
								echo $rev.' Reviews'; 
							echo '</div>';
						echo '</div>';
						
						echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad">';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 nopad t_t22" style="font-size: 14px;">';
								
								
								echo '<ul class="pdmb_2">';
									echo '<li >';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										if(strlen($full_location)>15)
										{
											echo '<div class="ic_name icn f13 ic_name_g1"><div class=" ic_inside">&nbsp;'.$full_location.'</div></div>';
										}
										else
										{
											echo '<div class="ic_name icn f13 ">&nbsp;'.$full_location.'</div>';
										}
								echo '</ul>';
							echo '</div>';
							
							echo '<div class="col-xs-6 col-sm-6 col-md-6 nopad t_t11" style="font-size: 14px;">';
								echo '<ul class="pdmb_2 ul2">';
									echo '<li>';
										echo '<image data-src="/upload/bed.svg"  class="micon lazy" />';
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/bed.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['bedroom_range'].'</div>';
									echo '</li>';
									/*echo '<li class="pdmb">';
										echo '<image data-src="' . S3_BUCKET_URL . '/upload/team.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['adults'].' Guests</div>';
									echo '</li>';*/
								echo '</ul>';
								
								
								//if($row['cate_icon']!='')
//								{
//									if($icon_cate == "seas")
//									{
//										//echo '<div class="col-xs-1 nopad">';
//										echo '<img data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 30px !important;height: 26px;margin-left: -5px; float:left;">';
//										//echo '</div>';
//										$luxu = "Luxury ";
//									}
//									else
//									{
//										//echo '<div class="col-xs-1 nopad">';
//										echo '<image  data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="float:left;" />';
//										//echo '</div>';
//										$luxu = "";
//									}
//									
//									if(strlen($luxu.$icon_name)>20)
//									{
//										echo '<div id="style-3" class=" ic_name_g1"><div class=" ic_inside">&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div></div>';
//									}
//									else
//									{
//										echo '<div id="style-3" class=" ic_name_g1"><div class=" ">&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div></div>';
//									}
//									//str_ireplace('Villas','Villa',$catename[0]).'
//								}
//								else
//								{
//								}
								//echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad">';
//									echo string_len(base64_decode($row['brief'],true),40);
//								echo '</div>';
							echo '</div>';
							
							if($row['discount']!=''){$price = $row['discount'];}else{$price = $row['price'];}
							
							echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad web9922 t_t22 t_t23 text-right1">';
							
								echo '<div class="col-xs-7 col-sm-7 col-md-7 ">';
									echo '<span class="t_from">FROM </span>';
									//echo '<span class="mob992"  style="font-size: 12px;    float: right;    padding-left: 30px;">'.$rev.' Reviews</span>';//<br>
									echo '<span class="pric pp" ><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($price).'</span>';
									echo '<span style="font-size: 12px;">++ /NT</span>';
								echo '</div>';
								
								echo '<div class="col-xs-5 col-sm-5 col-md-5 nopad">';	
									echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="probut">View Details</button></a>';
								echo '</div>';
								
							echo '</div>';
							
							/*echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t11 nopad">';
								echo '<div class="col-xs-5 col-sm-5 col-md-4 nopad mob992 t_t22 t_rev_mob" style="">';
									echo '<span class="mob992"  style="font-size: 14px;">'.$rev.' Reviews</span><br>';
								echo '</div>';
								echo '<div class="col-xs-7 col-sm-7 col-md-4 nopad mob992 t_t33 text-right" >';
									echo '<span class="t_from_mob">FROM </span>';
									echo '<span  class="pric pri_mob" ><span class="doll"  style="font-size: 12px;"> $</span>'.number_format($price).'</span>';
									echo '<span style="font-size: 12px;">++ /NT</span>';
								echo '</div>';
							echo '</div>';*/
							
							
						echo '</div>';
					echo '</div>';
					
					echo '</div>';
					
			echo '</div>';
		}
		
	}
	else
	{
	}
}


















function imagePaths($url)
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
</div>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});





//---เรียกใช้งาน
var hash = window.location.hash;
//alert(hash);
	if(hash=='')
	{
		//alert(slug);
	}
	else
	{
		var newhash = hash.replace("#","");
		//alert(newhash);
		setTimeout(function(){
			 $('html,body').animate({ 
				scrollTop: $("."+newhash+"").offset().top-100
			}, 1000);
		},1000);
	}
	
</script>
<style>
.mhr
{
	border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #dddddd, rgba(0, 0, 0, 0));
}
hr.myhr
{
	border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #dddddd, rgba(0, 0, 0, 0));
    margin-bottom: -40px;
}
h2, .h2 {
    font-size: 20px;
}
.text_h_2
{
	/*border-top: 1px solid #ddd;*/
    margin-top: -20px !important;
    /*padding-top: 10px;*/
}
ul.pro
{
	background-color:#cc909000;
	padding:0;
	margin:auto;
	width:100%;
	text-align:center;
	margin-top:15px;
}
ul.pro > li
{
	list-style:none;
	display:inline-block;
	border-right:1px solid #ddd;
	padding:0px 20px 0px 10px;
	text-align:center;
	background-color:#ffe1e100;
	cursor:pointer;
	transition:0.3s all;
}
ul.pro > li:last-child
{
	border:none !important;
}
ul.pro > li:hover
{
	color:#f05b46;
}
@media screen and (max-width:443.98px)
{
	ul.pro > li
	{
		border:none !important;
		margin-bottom:10px;
	}
}
.icn
{
	margin-left:25px !important;
}
.bottom25
{
	margin-bottom:25px;
	margin-top:55px;
}
.t_from_mob
{
	font-size: 12px;
	padding-right: 10px;
	margin-top: 6px;
	background-color: #ff000000;
	position:absolute;
	margin-left: -50px;
}
.pri_mob
{
	font-size: 25px;
	margin-top:50px;    
	color: #f05b46;
}
.t_rev_mob
{
	height:35px;
	padding-top: 3px;
	background-color:#ff000000;
	padding-left:10px;
}
.t_t23
{
	margin-top:5px !important;
	background-color:#f9c3c300;
}
.pdmb_2
{
	list-style:none;
	padding:0px;
}
.pdmb_2 > li
{
	margin-left:0px;
}
.ul2
{
	margin-left:5px
}
.ul2 > li > img
{
	width: 24px !important;
}
.ic_name_g1::-webkit-scrollbar
{
	display:none;
}

/*
 *  STYLE 3
 */

#style-3::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar
{
	width: 0px;
	background-color: #F5F5F5;
	display:none;
}

#style-3::-webkit-scrollbar-thumb
{
	background-color: #000000;
}
.shad
{
	box-shadow: 0px 0px 15px #a9a9a9;
}
@media screen and (min-width: 768px)
{
	.padleft15 {
		padding-right: unset;
    padding-left: unset !important;
    padding: 10px !important;
	}
	.padright15 {
		padding-right: unset;
    padding-left: unset;
    padding: 10px;
	}
}
@media screen and (max-width: 992px)
{
	.btitle {
		font-size: 17px;
		margin-top: -2px;
	}
}
@media screen and (max-width: 768px)
{
	.boxbot_b {
		border-bottom: 2px solid #f05b46;
		background: #f5f5f5;
		font-size: 20px;
		padding: 13px 13px 0px 13px;
		font-family: pr;
		color: #112845;
		margin-bottom: 0px;
		height: auto;
	}
	.shad
	{
		margin-bottom: 45px !important;
	}
	.pric
	{
		font-size:25px !important;
	}
	.probut 
	{
		background-color: #112945;
		color: white;
		text-transform: uppercase;
		padding: 8px 0px 6px 0px;
		font-size: 12px;
		width: 100%;
		border: none;
		left: unset;
		margin-top: -8px !important;
		/* position: absolute; */
		margin-left: 0px;
		margin-bottom: 10px;
	}
	.pp
	{
		font-size: 23px !important;
    margin-top: 50px;
    color: #f05b46;
    margin-left: 12px;
	}
	.t_from 
	{
		font-size: 10px;
    margin-top: 15px;
    background-color: #ff000000;
    position: absolute;
    margin-left: -9px;
	}
	.revv
	{
		margin-top: -30px !important;
		font-size:12.5px !important;
	}
}

	
@media screen and (min-width: 992px)
{
	.boxbot_b {
		border-bottom: 2px solid #f05b46;
		background: #f5f5f5;
		font-size: 20px;
		padding: 8px 13px 3px 13px;
		font-family: pr;
		color: #112845;
		margin-bottom: 0px;
		height: 136px;
	}
	.btitle {
		font-size: 20px;
		margin-top: 20px;
	}
	.shad
	{
		margin-bottom: 25px !important;
	}
	
}
@media screen and (max-width: 992px) and (min-width: 768px)
{
	.boxbot_b {
		border-bottom: 2px solid #f05b46;
		background: #f5f5f5;
		font-size: 20px;
		padding: 13px 13px 23px 13px;
		font-family: pr;
		color: #112845;
		margin-bottom: 0px;
		height: 136px;
	}
	.shad
	{
		margin-bottom: 25px !important;
	}
	.ic_inside
	{
		background-color:#ff000000;
		width:175px;
		animation: 5s slide-right 2s ;
		transform:translateX(0%);
		animation-iteration-count: infinite;
		animation-delay: 2s;
	}
	.ic_name_g1
	{
		background:#fcc3c300;
		height:18px;
		overflow-x:scroll;
	}
	.probut 
	{
		    background-color: #112945;
		color: white;
		text-transform: uppercase;
		padding: 8px 0px 6px 0px;
		font-size: 12px;
		width: 100%;
		border: none;
		left: unset;
		margin-top: -8px !important;
		position: absolute;
		margin-left: 0px;
	}
	.pp
	{
		font-size: 23px;margin-top:50px;color: #f05b46;margin-left: 29px;
	}
	.t_from 
	{
		font-size: 10px;
		margin-top: 4px;
		background-color: #ff000000;
		position: absolute;
		margin-left: -9px;
	}
	.revv
	{
		margin-top: -30px !important;
		font-size:12.5px !important;
	}
}

@media screen  and (min-width: 992px) and (max-width: 1200px)
{
	.boxbot_b {
		border-bottom: 2px solid #f05b46;
		background: #f5f5f5;
		font-size: 20px;
		padding: 8px 13px 3px 13px;
		font-family: pr;
		color: #112845;
		margin-bottom: 0px;
		height: 136px;
	}
	.btitle {
		font-size: 20px;
		margin-top: 20px;
	}
	.shad
	{
		margin-bottom: 25px !important;
	}
	.ic_inside
	{
		background-color:#ff000000;
		width:175px;
		animation: 5s slide-right 2s ;
		transform:translateX(0%);
		animation-iteration-count: infinite;
		animation-delay: 2s;
	}
	.ic_name_g1
	{
		background:#fcc3c300;
		height: 18px;
		overflow-x:scroll;
	}
	.covbox_name
	{
		background-color:#ff000000;
		width:230px;
		animation: 5s slide-right 2s ;
			transform:translateX(0%);
			animation-iteration-count: infinite;
			animation-delay: 2s;
	}
	.t_t33 
	{
		overflow:scroll;
		height:60px;
	}
	.t_t33::-webkit-scrollbar
	{
		display:none;
	}
	.probut 
	{
		    background-color: #112945;
		color: white;
		text-transform: uppercase;
		padding: 8px 0px 6px 0px;
		font-size: 12px;
		width: 100%;
		border: none;
		left: unset;
		margin-top: -8px !important;
		position: absolute;
		margin-left: 0px;
	}
	.pp
	{
		font-size: 23px;margin-top:50px;color: #f05b46;margin-left: 29px;
	}
	.t_from 
	{
		font-size: 12px;
		margin-top: -14px;
		background-color: #ff000000;
		position: absolute;
		margin-left: -9px;
	}
}
@media screen and (min-width:1200px)
{
	.ic_inside
	{
		background-color:#ff000000;
		width:175px;
		animation: 5s slide-right 2s ;
		transform:translateX(0%);
		animation-iteration-count: infinite;
		animation-delay: 2s;
	}
	.ic_name_g1
	{
		background:#fcc3c300;
		height: 18px;
		overflow-x:scroll;
	}
	.probut 
	{
		background-color: #112945;
		color: white;
		text-transform: uppercase;
		padding: 8px 0px 6px 0px;
		font-size: 12px;
		width: 100%;
		border: none;
		left: unset;
		margin-top: -8px !important;
		position: absolute;
		margin-left:0px;
	}
	.pp
	{
		font-size: 23px;margin-top:50px;color: #f05b46;margin-left: 49px;
	}
	.t_from
	{
		font-size: 12px;    
		/*float: left;   
		margin-left: -50px;*/
		margin-top:-5px;
		background-color:#ff000000;
		position:absolute;
	}

}

@keyframes slide-right {
  0% {
    transform:translateX(0%);
  }
  50% {
    transform:translateX(-20%);
  }
   100% {
    transform:translateX(0%);
  }
}

/*.boxpho
{
	box-shadow: 0px 0px 20px #6e6e6e;
}
.boxbot_b
{
	box-shadow: 0 10px 20px -5px #6e6e6e,
                -10px 0 20px -5px #6e6e6e,
		10px 0 20px -5px #6e6e6e;
}*/
</style>