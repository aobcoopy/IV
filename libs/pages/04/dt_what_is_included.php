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

if(count(json_decode($room['what_ic']))!='0')
{
?>
<div class="col-md-12 mg-room-fecilities " style="margin-top: -15px; margin-bottom: 15px;">
    <h3 class="mg-sec-left-title l15">What is included</h3>
    <div class="row bggray">
        <div class="col-md-12 nopad">
            <?php 
			if(count($cate1)!='0')
			{
				echo '<div class="col-xs-12 col-md-12">';
					echo '<ul class="bedr wicc">';
				foreach($cate1 as $wh_1)
				{
					echo '<li><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_1.'</li>';
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
					echo '<li><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_2.'</li>';
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
					echo '<li><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_3.'</li>';
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
					echo '<li><img data-src="../../files/check.png" width="20" class="chk lazy"> '.$wh_4.'</li>';
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
					echo '<li><img data-src="../../files/check.png" width="20" class="chk" lazy> '.$wh_5.'</li>';
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
?>