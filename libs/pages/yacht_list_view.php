<?php 
if($photo[0]['name']=='')
{
	$img_tag = $name[0];
}
else
{
	$img_tag = $name[0].'- '.$photo[0]['name'];
}

$name = $row['name'];
$photo = json_decode($row['photo']);
if($photo!='')
{
	$photo = json_decode($row['photo']);
}
else
{
	$photo ='../../../../upload/photo.jpg';
}

$photo = 'https://staging.inspiringvillas.com/upload/yacht/yacht-Lagoon_42_by_Boat_in_the_Bay-3aFIY5crPLdTh6MDNkqx.jpeg';

$location = $dbc->GetRecord("yacth_destination","*","id = '".$row['destination']."' and status > 0 and fleet_type IS NULL");
$full_location = $location['name'];
$fleet = $dbc->GetRecord("yacth_destination","*","id = '".$row['fleet']."' and status > 0 and fleet_type IS NOT NULL");
$fleet_type = $fleet['name'];

$sailing_route = $dbc->GetRecord("yacth_sailing_route","*","id = '".$row['sailing_route']."' ");

$exchange = $dbc->GetRecord("variable","*","name = 'us'");

$tag = ($row['tag']!='')?'<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$row['tag'].'</div>':'';
$hours = ($row['hours']!='')?'/'.$row['hours'].'Hrs.':'/Hrs.';
$ntoy = ($row['no_type_of_yacht']!='')?$row['no_type_of_yacht'].'ft ':'';

$money_sign = '&#3647;';

$thb_price = number_format($row['price']);//number_format($row['price'])
$usd_price = number_format($row['price']/$exchange['value'],2);

$show_price = isset($_REQUEST['exc'])?$_REQUEST['exc']:0;
//echo '----'.$show_price;

$sthb = ($show_price==0)?'':'hidden';
$susd = ($show_price==1)?'':'hidden';
//print_r($_SESSION['recent_yacht']);
echo '<div class="mg-avl-room '.$padd_1.'1 '.$paddbutt.'1 " style="margin-bottom:5px;">';
		echo '<div class="row">';//echo $row['id'];
		
		echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t33 villa_boxs">';
		echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad villa_boxs_inside scale-down-center">';
		
		
			//--------------------------web-----------------------------
			
			
			echo '<div class="col-xs-12 col-sm-5 col-md-4 nopad  t_t22">'; 
				echo $tag;
				echo '<div class="mob gl_view focus-in-contract " onClick="open_popup_2('.$row['id'].');"><img src="../../upload/search-file1.png"></div><div class="t_det mob focus-in-contract ">View Details</div>';
				echo '<img  src="'.$photo.'" alt="'.$img_tag.'" class="img-responsive middle_screen cpoint " width="100%" onClick="open_popup_2('.$row['id'].');">';
			echo '</div>';
			
			
			//echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
			echo '<div class="col-xs-12 col-sm-7 col-md-8 web t_t33 v_details" style="margin-top:19px;">'; 
			
				echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t33">';
					echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t11"><h3 class="mg-avl-room-title vtitle f23_2"><span >'.$name.'</span></h3></div>';//'.$row['id'].'  //-------------cheange
				echo '</div>';
				
				echo '<div  class="top20 tb t_t44 f18t- f17Desk- f15t " ><div class="indet"><span  style="font-family:pt !important">'.$row['detail'].'</span></div></div>';
				echo '<div class="gray_mob">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-7 col-md-5 top15 t_t11">'; 
							echo '<ul>';
								echo '<li style="margin-bottom: -2px;">';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 23px !important;"/>';
									echo '<div class="ic_name f15t f14ip" >&nbsp;&nbsp;'.$full_location.'</div>';
								echo '</li>';
								echo '<li>';
										echo '<image data-src="/upload/yacht.png"  class="micon lazy" />';
										echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$ntoy.$fleet_type.'</div>';
								echo '</li>';
						echo '</ul>';
						
					echo '</div>';
					echo '<div class="col-xs-6 col-sm-5 col-md-3 top15 nopad t_t22">'; 
						echo '<ul>';
								echo '<li>';
									echo '<image data-src="/upload/coconut-tree-on-island-1.png"  class="micon lazy" />';
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$sailing_route['name'].' </div>';
								echo '</li>';
								echo '<li>';
									echo '<image data-src="/upload/team.svg"  class="micon lazy"/>';
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$row['maximum_capacity'].' Pax Max</div>';
								echo '</li>';
							echo '</ul>';
						echo '</div>';
						
						//if($row['discount']!='')
//						{
//						$discount = '<div class="inside">From <del><span class="tx_discount_old">'.$money_sign.''.number_format($row['price']).'</span></del><span class="inprice tx_discount">$'.number_format($row['discount']).'</span>'.$hours.'</div>';
//						}
//						else
//						{
//						$discount = '<div class="inside">From <span class="inprice">'.$money_sign.''.number_format($row['price']).'</span> '.$hours.'</div>';
//						}
						
						echo '<div class="col-xs-6 col-sm-12 col-md-4 t_price text-right nopad t_t33">'; 
							echo '<div class="col-xs-12 col-sm-5 col-md-12 text-right nopad  tb t_t22">';
							
								echo '<div class="inside">From ';
									
									echo '<span class="mn_price thb '.$sthb.'" >';
										echo '<span class="msign">'.$money_sign.'</span><span class="inprice" >'.$thb_price.'</span>';
									echo '</span>';
									
									echo '<span class="mn_price usd '.$susd.'" >';
										echo '<span class="msign">$</span><span class="inprice" >'.$usd_price.'</span>';
									echo '</span>';
									
									echo $hours;
								echo '</div>';
									
								echo '</div>'; 
								echo '<div class="col-xs-12 col-sm-7 col-md-12  nopad top10 t_t31">'; //-------------cheange
									echo '<button class="btn_villa btn_detail" onClick="open_popup_2('.$row['id'].');">View Details</button>';
									echo '<button class="btn_villa btn_enquire" onClick="open_pop_yc('.$row['id'].');">Enquire Now</button>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
				echo '</div>';
			echo '</div>';
			//echo '</a>';
			//--------------------------web-----------------------------
			echo '</div>'; //---------villa_boxs_inside
			echo '</div>'; //---------villa_boxs
			
			
			
			
			
			
			
			//--------------------------mob-----------------------------
			echo '<div class="col-xs-12 col-sm-12 col-md-6 mob top10">';
				echo '<div class="gray_mob ">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 padleft25 padright25 t_t11">';
							echo '<h3 class=" font_mob top0 undl" onClick="open_popup_2('.$row['id'].');"><span ><strong>'.$name.' </strong></span></h3>';
							echo '<div  class="top10 tb f15t "><span  class="pt">'.$row['detail'].'</span></div>';//f13
							echo '</div>';
							echo '<div class="col-xs-7 col-sm-6 col-md-6 padleft25 top10 t_t11">';
								echo '<ul>';
									echo '<li class="pdmb">';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										echo '<div class="ic_name f13">&nbsp;'.$full_location.'</div>';
									echo '<li>';
										echo '<image data-src="/upload/yacht.png"  class="micon lazy" />';
										echo '<div class="ic_name f15t2" style="margin-left:22px;">&nbsp;&nbsp;'.$ntoy.$fleet_type.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
									echo '</li>';
								echo '</ul>';
							echo '</div>';
							echo '<div class="col-xs-5 col-sm-6 col-md-6 padleft251 top10 t_t22">';
								echo '<ul>';
									echo '<li class="pdmb">';
										echo '<image data-src="/upload/coconut-tree-on-an-island.png"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$sailing_route['name'].' </div>';
									echo '</li>';
									echo '<li class="pdmb">';
										echo '<image data-src="/upload/team.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['maximum_capacity'].' Pax Max</div>';
									echo '</li>';
								echo '</ul>';
							echo '</div>';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 t_price  t_t21">';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 text-center padleft top20 bottom51 t_t31">';
								
								
								echo '<div class="text-right text_price tp2">From ';
									echo '<span class="mn_price thb '.$sthb.'" >';
										echo '<span class="msign">'.$money_sign.'</span><span class="inprice" >'.$thb_price.'</span>';
									echo '</span>';
									
									echo '<span class="mn_price usd '.$susd.'" >';
										echo '<span class="msign">$</span><span class="inprice" >'.$usd_price.'</span>';
									echo '</span>';
									echo $hours;
									//<span class="inprice ">'.$money_sign.''.number_format($row['price']).'</span> '.$hours.'';
								echo '</div>';
							echo '</div>';
							echo '<div class="col-xs-6 col-sm-6 col-md-6 text-center padright top20 bottom51 t_t31">';
								
								echo '<button class="btn_villa_2 " target="_blank"  onClick="open_pop_yc('.$row['id'].');">Enquire Now</button>';
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			//--------------------------mob-----------------------------
		echo '</div>';
	echo '</span></div>';
//echo '<!--room-->';
?><br><br>
<script>
  $(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>
<style>
@media screen and (max-width:768px)
{
	.scale-down-center {
	-webkit-animation: scale-down-center 5s 4s 3 both;
	        animation: scale-down-center 5s 4s 3 both;
	}
}
@-webkit-keyframes scale-down-center {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
}
@keyframes scale-down-center {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50% {
    -webkit-transform: scale(0.9);
            transform: scale(0.9);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}



.focus-in-contract {
	-webkit-animation: focus-in-contract 5s 3s infinite both;
	        animation: focus-in-contract 5s 3s infinite both;
}
@-webkit-keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  70% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
  100% {
    
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
}
@keyframes focus-in-contract {
  0% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  70% {
	letter-spacing: 0em;
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
  100% {
    letter-spacing: 1em;
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
}




.f15t2
{
	font-size:13px;
}
.vtitle
{	
	border-bottom: 1px solid #dbdbda;
}
.undl
{
	border-bottom: 1px solid #dbdbda;
    padding-bottom: 7px;
    margin-top: 4px;
}

.gl_view
{
	background:rgb(17 40 69 / 50%);
	position:absolute;
	z-index:100;
	width:50px;
	height:50px;
	padding:10px;
	left:0%;
	bottom:0%;
	/*transform:translate(-50%,-50%);*/
	border-radius:100%;
	cursor:pointer;
	margin-left:5px;
	margin-bottom:5px;
}
.gl_view > img
{
	width:100%;
}
.heartbeat {
	-webkit-animation: heartbeat 5s ease-in-out 3s infinite both;
	        animation: heartbeat 5s ease-in-out 3s infinite both;
}
/* ----------------------------------------------
 * Generated by Animista on 2023-3-27 17:31:39
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation heartbeat
 * ----------------------------------------
 */
@-webkit-keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: center center;
            transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    -webkit-transform: scale(0.91);
            transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  17% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  33% {
    -webkit-transform: scale(0.87);
            transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  45% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: center center;
            transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    -webkit-transform: scale(0.91);
            transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  17% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  33% {
    -webkit-transform: scale(0.87);
            transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  45% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}


.t_det
{
	position:absolute;
	bottom:0;
	margin-bottom:5px;
	margin-left:60px;
	color: rgb(255 255 255 / 70%);
	text-shadow: 2px 2px 1px #000;
}





</style>