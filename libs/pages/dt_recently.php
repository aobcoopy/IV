<div class="col-md-12 top50" style="margin-top: 20px;"></div>

<style>
.my_recent_posi
{
	transition:all 1s;
}
.text_bottom{vertical-align:bottom;display:table-cell}.media .media-body .media-heading{font-size:17px;line-height:18px;color:#16262e}.media .media-object{border-radius:0}.media .media-body{position:relative;width:100%;font-size:12px;line-height:15px !important}
@media screen and (max-width:992px)
{
	.recently_web
	{
		margin-top: -20px;
	}
}
@media screen and (min-width:992px)
{
	.recently_web
	{
		margin-top: 100px;
	}
}
</style>

<?php 
$price_no_zero = explode(".",$room['price']);
$text_amt = strlen($price_no_zero[0]);
$sub_price = substr($room['price'],0,1);
//echo  $room['destination'].'---'.$room['subdestination'].'----'.$room['actualbed'].'----'.$room['price'].'----'.$sub_price.'----'.$text_amt."<br>";
$amt = "";
for($i=1;$i<$text_amt;$i++)
{
	$amt.= "_%";
}
//echo '--->'.$amt."<br>";
//$WPrice = "price LIKE '".$amt."'";//$sub_price.
//$WPrice = " and price LIKE '%".$price_no_zero[0]."%'";//$sub_price.
//$WPrice = " and price LIKE '".$sub_price.$amt."'";//$sub_price.
$WPrice.= "";//$sub_price.
$bed = " and actualbed LIKE '%".$room['actualbed']."%'";

$sql_qry = "select * from properties where status > 0 
and destination = '".$room['destination']."' 
and subdestination = '".$room['subdestination']."' 
".$WPrice." ".$bed." order by price asc";
//echo '<br>'.$sql_qry."<br>";


$Recomend_1 = $dbc->Query($sql_qry);
$total_villa = $dbc->Getnum($Recomend_1);

if($total_villa<2 && $total_villa>0)
{
	$amt = "";
	for($i=1;$i<$text_amt;$i++)
	{
		$amt.= "_%";
	}
	$bed = "";
	$WPrice = "";//" and price LIKE '%".$price_no_zero[0]."%'";
	$WPrice = "";//" and price LIKE '".$sub_price.$amt."'";
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."' and subdestination = '".$room['subdestination']."' ".$WPrice." ".$bed." order by price asc limit 0,3";
}
elseif($total_villa==2)
{
	$amt = "";
	for($i=1;$i<$text_amt-1;$i++)
	{
		$amt.= "_%";
	}
	$bed = "";
	$WPrice = "";//" and price LIKE '%".$price_no_zero[0]."%'";
	//$WPrice = " and price LIKE '".$sub_price.$amt."'";
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."' and subdestination = '".$room['subdestination']."' ".$WPrice." ".$bed." order by price asc limit 0,3";
}
elseif($total_villa==3)
{
	$amt = "";
	for($i=1;$i<$text_amt-1;$i++)
	{
		$amt.= "_%";
	}
	//$WPrice = "price LIKE '%".$price_no_zero[0]."%'";
	$bed = " and actualbed LIKE '%".$room['actualbed']."%'";
	$WPrice = "and price  >= '".$price_no_zero[0]."'";
	//$WPrice = " and price LIKE '".$sub_price.$amt."'";
	$aid = "";//" and id != '".$room['id']."'";
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."' and subdestination = '".$room['subdestination']."' ".$WPrice." ".$bed." ".$aid." order by price asc limit 0,3";
}
else
{
	$amt = "";
	for($i=1;$i<$text_amt-1;$i++)
	{
		$amt.= "_%";
	}
	//$WPrice = "price LIKE '%".$price_no_zero[0]."%'";
	$bed = " and actualbed LIKE '%".$room['actualbed']."%'";
	$WPrice = "and price  >= '".$price_no_zero[0]."'";
	//$WPrice = " and price LIKE '".$sub_price.$amt."'";
	$aid = " and id != '".$room['id']."'";
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."' and subdestination = '".$room['subdestination']."' ".$WPrice." ".$bed." ".$aid." order by price asc limit 0,3";
}

$Recomend_2 = $dbc->Query($sql_qry);
$total_villa = $dbc->Getnum($Recomend_2);
if($total_villa==0)
{
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."'  order by price asc limit 0,3";
}
elseif($total_villa==1)
{
	$sql_qry = "select * from properties where status > 0 
	and destination = '".$room['destination']."' and subdestination = '".$room['subdestination']."' order by price asc limit 0,3";
}
//echo '<br>'.$sql_qry."<br>";

//echo ''.$total_villa.'---<br>';

?>
<div class="recents web recently_webs col-md-12  nopad  my_recent_posi" >
	<h4><strong>Recommended Villas</strong></h4>
    <div class="row">
	<?php
    $Recomend = $dbc->Query($sql_qry);
    while($recdat = $dbc->Fetch($Recomend))
    {
		$v_name = explode("|",$recdat['name']);
		$v_photo = json_decode($recdat['photo'],true);
		echo '<div class="col-sm-4 col-md-4">';
        	echo '<a href="/'.$recdat['ht_link'].'.html">';
					echo '<img src="'.imageP($v_photo[0]['img']).'" width="100%">';
					echo '<div class="carousel-caption2 pad10 tb">';
						echo '<b>'.$v_name[0].'</b><br>';
						echo base64_decode($recdat['brief'],true);
					echo '</div>';
				echo '</a>';
        echo '</div>';
        //echo $recdat['name'].'---'.$recdat['price']."<br>";
    }
?>
	</div>
</div>

