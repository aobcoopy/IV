<?php
$cate1 = array();
$cate2 = array();
$cate3 = array();
$cate4 = array();
$cate5 = array();
if(json_decode($room['what_ic'])!='')
{
	foreach(json_decode($room['what_ic']) as $what)
	{
		$what_sql = $dbc->GetRecord("what_include","*","id=".$what);
		if($what_sql['cate']=='1')
		{
			array_push($cate1,$what_sql['name']);
		}
		elseif($what_sql['cate']=='2')
		{
			array_push($cate2,$what_sql['name']);
		}
		elseif($what_sql['cate']=='3')
		{
			array_push($cate3,$what_sql['name']);
		}
		elseif($what_sql['cate']=='4')
		{
			array_push($cate4,$what_sql['name']);
		}
		elseif($what_sql['cate']=='5')
		{
			array_push($cate5,$what_sql['name']);
		}
	}
}

$what_ic1 = json_decode($room['what_ic1']);
$what_ic2 = json_decode($room['what_ic2']);
$what_ic3 = json_decode($room['what_ic3']);
$what_ic4 = json_decode($room['what_ic4']);
$what_ic5 = json_decode($room['what_ic5']);
$what_ic6 = json_decode($room['what_ic6']);
$what_ic7 = json_decode($room['what_ic7']);
$sshow = 0;
$wc=0;
$wc1 = (count($what_ic1)!='0')?$wc=1:'';
$wc2 = (count($what_ic2)!='0')?$wc=1:'';
$wc3 = (count($what_ic3)!='0')?$wc=1:'';
$wc4 = (count($what_ic4)!='0')?$wc=1:'';
$wc5 = (count($what_ic5)!='0')?$wc=1:'';
$wc6 = (count($what_ic6)!='0')?$wc=1:'';
$wc7 = (count($what_ic7)!='0')?$wc=1:'';
//if(count($what_ic1)!='0'){$wc=1;}else{$wc=0;}
//echo '---'.$wc.'/----/'.$room['wiic'];
if($room['wiic']==1 )
{//echo '<br>true';
	if($wc==1)
	{
?>
	<div class="col-md-12 mg-room-fecilities " style="margin-top: 1px; margin-bottom: 3px;">
		<h3 class="mg-sec-left-title l15 top20">What is included</h3>
		<div class="row bggray">
			<div class="col-md-12 nopad">
				<?php 
				if(count($what_ic1)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<ul class="bedr wicc">';
					foreach($what_ic1 as $wic1)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic1.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				
				if(count($what_ic6)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Available at extra charge</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic6 as $wic6)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic6.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				if(count($what_ic7)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">House rules</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic7 as $wic7)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic7.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}	
				
				if(count($what_ic2)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Complimentary airport transfer</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic2 as $wic2)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic2.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
					
				
				if(count($what_ic3)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Staff service inclusion</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic3 as $wic3)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic3.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				
				if(count($what_ic4)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Extra Charge</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic4 as $wic4)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic4.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				
				if(count($what_ic5)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Special Note</div>';
						echo '<ul class="bedr wicc">';
					foreach($what_ic5 as $wic5)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wic5.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
			   
				?>
			</div>
		</div>
	</div>
	<?php
	}
}
else
{
	//echo '<br>else------------';
	if(count(json_decode($room['what_ic']))!='0')
	{
	?>
	<div class="col-md-12 mg-room-fecilities " style="margin-top: 1px; margin-bottom: 3px;">
		<h3 class="mg-sec-left-title l15 top20">What is included</h3>
		<div class="row bggray">
			<div class="col-md-12 nopad">
				<?php 
				if(count($cate1)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<ul class="bedr wicc">';
					foreach($cate1 as $wh_1)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_1.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				if(count($cate2)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Complimentary airport transfer</div>';
						echo '<ul class="bedr wicc">';
					foreach($cate2 as $wh_2)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_2.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				if(count($cate3)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Staff service inclusion</div>';
						echo '<ul class="bedr wicc">';
					foreach($cate3 as $wh_3)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_3.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				if(count($cate4)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Extra Charge</div>';
						echo '<ul class="bedr wicc">';
					foreach($cate4 as $wh_4)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_4.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
				
				if(count($cate5)!='0')
				{
					echo '<div class="col-xs-12 col-md-12">';
						echo '<div class="w_title">Special Note</div>';
						echo '<ul class="bedr wicc">';
					foreach($cate5 as $wh_5)
					{
						echo '<li class="fo15"><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_5.'</li>';
					}
						echo '</ul>';
					echo '</div>';
				}
			   
				?>
			</div>
		</div>
	</div>
	<?php
	}
}
?>