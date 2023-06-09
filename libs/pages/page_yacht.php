<link href="../libs/css/yacht.css" rel="stylesheet" type="text/css">
<script>
var hash = window.location.hash;
if(hash=='preview')
{
	//alert(hash);
	var x = document.createElement("META");
	x.setAttribute("name", "robots");
	x.setAttribute("content", "noindex");
	document.head.appendChild(x);
}
else
{
}
var x = document.createElement("META");
	x.setAttribute("name", "robots");
	x.setAttribute("content", "noindex");
	document.head.appendChild(x);
</script>
<br><br>
<?php 
if(isset($_SESSION['recent_yacht'])){}
else
{
    $_SESSION['recent_yacht'] = array();
}

$cover = $dbc->GetRecord("yacth_cover","*","id=1");
$bg = $dbc->GetRecord("yacth_cover","*","id=2");
if(json_decode($bg['photo'])!='')
{
	$bg_pop = "url('../../".json_decode($bg['photo'])."')";
}
else
{
	$bg_pop = "#fff";
}
?>
<img src="<?php echo json_decode($cover['photo']);?>" width="100%" alt="">
<?php include "yacht_search.php";?>
<br><br><br class="web"><br class="web">

<?php
//desti=$1&marina=$2&type=$3&charter=$4&cabin=$5&price=$6
$y_destinations = isset($_REQUEST['desti'])?$_REQUEST['desti']:'all';
$y_marina = isset($_REQUEST['marina'])?$_REQUEST['marina']:'all';
$y_type = isset($_REQUEST['type'])?$_REQUEST['type']:'all';
$y_charter = isset($_REQUEST['charter'])?$_REQUEST['charter']:'all';
$y_cabin = isset($_REQUEST['cabin'])?$_REQUEST['cabin']:'all';
$y_price = isset($_REQUEST['price'])?$_REQUEST['price']:'all';
$destination_name = 'All Destinations';

$where_destination = '';
if($y_destinations!='all')
{
	$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$_REQUEST['desti']."'");
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
if($y_type!='all')
{
	$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$_REQUEST['type']."'");
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
if($y_price!='all')
{
	$ste_replace = str_replace("USD","",$_REQUEST['price']);
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
	
//echo '---'.$_REQUEST['desti'].'---'.$_REQUEST['type'].'---'.$_REQUEST['price'].'<br>';	
	$wid = "";
	if(isset($_REQUEST['id']))
	{
		$wid = " and id = '".$_REQUEST['id']."'";
	}
	
	$where = "where status > 0 ".$where_destination." ".$where_marina." ".$where_type." ".$where_type_of_charter." ".$where_cabin." ".$where_price." ".$wid." ";
	//echo "select * from yacht ".$where." <br>";
	$sql_count = $dbc->Query("select * from yacht ".$where." order by destination,price asc ");
	$total_count_yacht = $dbc->Getnum($sql_count);
	$sql1 = $dbc->Query("select * from yacht ".$where." order by destination,price asc limit 0,5  ");//limit 0,5           //limit 0,5
	$count_yacht = $dbc->Getnum($sql1);
	//echo $count_yacht.'<br>';
	if($count_yacht>0)
	{
		$total_data=1;
		?>
		<div class="col-md-12 nopad bottom50">
			<center>
				<h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > Luxury Private Yacht Thailand</h1>
                <h2 class="f16" style="    font-family: pt !important;"><?php echo $destination_name;?> <!--(<?php echo $total_yacht;?>)--></h2>
			</center>
		</div>
		
		<div class="container nopad1 t_t11 yacht_content">
			<?php //echo '>>>'.$_REQUEST['id'];
			$xyz = 0;
			while($row = $dbc->Fetch($sql1))
			{
				//echo $row['bedroom_capacity'].'<br>';
				$xyz++;
				//echo $xyz;
				include "yacht_list_view.php";
				
			}
			?>
            <div class="show_more_yacht"></div>
            
            <div class="line_load"></div>
            <div class="loading text-center" style="display:none;">
            	<img src="../../upload/loading.gif" width="50" alt="">
                <br>Loading...
            </div>
            
        </div><?php
	}
	else
	{
		?>
		<div class="col-md-12 nopad bottom50">
			<center>
				<h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > Luxury Private Yacht Thailand</h1>
                <h2 class="f16" style="    font-family: pt !important;"><?php echo $destination_name;?> <!--(<?php echo $total_yacht;?>)--></h2>
			</center>
		</div>
		<?php
		echo '<div class="text-center"><img src="../../..//upload/notfound.png" width="20%"></div>';
	}
 

//include "yacht_detail_popup.php";

?>
<input type="hidden" class="tx_start" value="5">
<input type="hidden" class="tx_next" value="<?php echo $total_count_yacht;?>">
<!--<link href="<?php echo $url_link;?>libs/css/bootstrap.min-4.css" rel="stylesheet">-->
<script>
$(document).ready(function(e) {
	
	var hash = window.location.hash;
	//alert(hash);
	if(hash!='')
	{
		var str = hash;//"How are you doing today?";
		var res = str.split("-");
		//document.getElementById("demo").innerHTML = res;
		open_popup_2(res[1]);
	}
	else
	{
		
	}

    $(window).scroll(function () {
		if($(window).width()<976)
        {
            var my_footers = $(".my_footers").offset().top-550;
        }
        else
        {
            var my_footers = $(".my_footers").offset().top-850;
        }
		if ($(this).scrollTop() > my_footers) 
		{
			load_yacht_more();
		}
	});
	
	var yid = "<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:0;?>";
	setTimeout(function(){
		if(yid!=0)
		{
			$('html,body').animate({ 
				scrollTop: $('.yacht_content').offset().top-200
			}, 1000);
		}
		
	},1000);
});

var trig = 0;
function load_yacht_more()
{
	if(trig==0)
	{
		trig = 1;
		//alert(trig);
		var tx_start = parseInt($(".tx_start").val());
		var tx_next = parseInt($(".tx_next").val());
		if(tx_start>tx_next)
		{
		}
		else
		{
			$(".loading").show();
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/load-more-yacht.php",
				type:"POST",
				dataType:"html",
				data:{
					start:tx_start,
					next:tx_next,
					destination:'<?php echo isset($_REQUEST['desti'])?$_REQUEST['desti']:'all';?>',
					marina:'<?php echo isset($_REQUEST['marina'])?$_REQUEST['marina']:'all';?>',
					type:'<?php echo isset($_REQUEST['type'])?$_REQUEST['type']:'all';?>',
					charter:'<?php echo isset($_REQUEST['charter'])?$_REQUEST['charter']:'all';?>',
					cabin:'<?php echo isset($_REQUEST['cabin'])?$_REQUEST['cabin']:'all';?>',
					price:'<?php echo isset($_REQUEST['price'])?$_REQUEST['price']:'all';?>',
					exc:$(".txexch").val(),
					xyz:tx_start
				},
				success: function(res){
					$(".show_more_yacht").append(res);
					$(".loading").hide();
					var st = parseInt(tx_start)+parseInt(5);
					$(".tx_start").val(st);
					trig = 0;
				}
			});
		}
	}
}
</script>
<?php 
include "yacht_contact_popup.php";
include "yacht_detail_popup2.php";
?>
<style>

</style>


<?php /*?><?php session_start();?>
<br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="inside_data_recently"></div>
        
    </div>
</div>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/load-yacht.php",
		type:"POST",
		dataType:"html",
		data:{},
		success: function(res){
			$(".inside_data_recently").html(res);
		}
	});
    setTimeout(function(){
		//window.location.reload();
	},500);
});

</script><?php */?>