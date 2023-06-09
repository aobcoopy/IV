<br><br>
<?php 
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
<br><br><br><br>

<?php

$y_destinations = isset($_REQUEST['desti'])?$_REQUEST['desti']:'all';
$y_type = isset($_REQUEST['type'])?$_REQUEST['type']:'all';
$y_price = isset($_REQUEST['price'])?$_REQUEST['price']:'all';
$destination_name = 'All Destinations';

$where_destination = '';
if($y_destinations!='all')
{
	$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$_REQUEST['desti']."'");
	$where_destination = "and destination = '".$yacht_destination['id']."'";
	$destination_name = $yacht_destination['name'];
}

$where_type = '';
if($y_type!='all')
{
	$yacht_destination = $dbc->GetRecord("yacth_destination","*","slug = '".$_REQUEST['type']."'");
	$where_type = "and fleet = '".$yacht_destination['id']."'";
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

	//echo $_REQUEST['id'];
	$where = "where  id = '".$_REQUEST['id']."' ".$where_destination." ".$where_type." ".$where_price." ";
	//echo "select * from yacht ".$where." <br>";
	$sql_count = $dbc->Query("select * from yacht ".$where." order by destination,price asc ");
	$total_count_yacht = $dbc->Getnum($sql_count);
	$sql1 = $dbc->Query("select * from yacht ".$where." order by destination,price asc limit 0,5");//limit 0,5
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
			<?php
			while($row = $dbc->Fetch($sql1))
			{
				include "yacht_list_view.php";
			}?>
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
 
include "yacht_detail_popup2.php";
//include "yacht_detail_popup.php";
include "yacht_contact_popup.php";

?>
<input type="hidden" class="tx_start" value="5">
<input type="hidden" class="tx_next" value="<?php echo $total_count_yacht;?>">
<!--<link href="<?php echo $url_link;?>libs/css/bootstrap.min-4.css" rel="stylesheet">-->
<script>
$(document).ready(function(e) {
	var xx = document.createElement("META");
	xx.setAttribute("name", "robots");
	xx.setAttribute("content", "noindex");
	document.head.appendChild(xx);
	
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
function load_yacht_more()
{
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
				type:'<?php echo isset($_REQUEST['type'])?$_REQUEST['type']:'all';?>',
				price:'<?php echo isset($_REQUEST['price'])?$_REQUEST['price']:'all';?>',
			},
			success: function(res){
				var st = parseInt(tx_start)+parseInt(5);
				$(".tx_start").val(st);
				$(".show_more_yacht").append(res);
				$(".loading").hide();
			}
		});
	}
}
</script>

<style>
.rotate-hor-center {
	-webkit-animation: rotate-hor-center 0.5s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
	        animation: rotate-hor-center 0.5s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
}
@-webkit-keyframes rotate-hor-center {
  0% {
    -webkit-transform: rotateX(0);
            transform: rotateX(0);
  }
  100% {
    -webkit-transform: rotateX(-360deg);
            transform: rotateX(-360deg);
  }
}
@keyframes rotate-hor-center {
  0% {
    -webkit-transform: rotateX(0);
            transform: rotateX(0);
  }
  100% {
    -webkit-transform: rotateX(-360deg);
            transform: rotateX(-360deg);
  }
}

/********************************************************************************************************************************/
@media screen and (max-width:768px)
{
	.btn-main
	{
		width:80%;
	}
	.exch
	{
		margin-right:10px !important;
	}
}
@media screen and (min-width:768px ) and (max-width:992px )
{
	.btn-main
	{
		width:90%;
	}
	.exch
	{
		margin-right:20px !important;
	}
	.popbox
    {
		width:750px;
		height:auto;
		position:fixed;
		z-index:1101;
		top:50%;
		left:50%;
		background:#fff;
		transform:translate(-50%,-50%);
		padding: 30px;
		display:none;
		overflow-y:auto;
		overflow-x:hidden;
    }
}
@media screen and (min-width:992px)
{
	.popbox
    {
		width:990px;
		height:90%;
		position:fixed;
		z-index:1101;
		top:50%;
		left:50%;
		background:#fff;
		transform:translate(-50%,-50%);
		padding: 30px;
		display:none;
		overflow-y:auto;
		overflow-x:hidden;
    }
}
@media screen and (max-width:768px)
{
	.share_icon
	{
		/*display:inline-block;*/
	}
    .popbox
    {
		width:95%;
		/*height:90%;*/
		position:fixed;
		z-index:1101;
		top:50%;
		left:50%;
		background:#fff;
		transform:translate(-50%,-50%);
		padding: 15px;
		display:none;
		overflow-y:auto;
		overflow-x:hidden;
	}
	.cbl
	{
		border-left:12px solid #fff;
		border-bottom:12px solid #fff;
		bottom:0;
		left:0;
		margin-bottom:20px;
		margin-left:25px;
	}
	.cbr
	{
		border-right:12px solid #fff;
		border-bottom:12px solid #fff;
		right:0;
		bottom:0;
		margin-bottom:20px;
		margin-right:25px;
	}
	.cpbox
	{
		width:90%;
		max-height:80%;
		overflow-y:auto;
	}
}
@media screen and (min-width:768px)
{
	
    .cbl
	{
		border-left:12px solid #fff;
		border-bottom:12px solid #fff;
		bottom:0;
		left:0;
		margin-bottom:10px;
		margin-left:25px;
	}
	.cbr
	{
		border-right:12px solid #fff;
		border-bottom:12px solid #fff;
		right:0;
		bottom:0;
		margin-bottom:10px;
		margin-right:25px;
	}
	.cpbox
	{
		width:500px;
	}
		
}
/********************************************************************************************************************************/
.exch
{
   position:absolute;
   right:0;
   top:0;
   margin-top:8px;
   background:#ff000000;
   padding:5px;
   margin-right:-25px;
   cursor:pointer;
}

.tags_bar {
    background: rgba(240, 91, 70, 0.85);
    border: none;
    color: #fff;
    padding: 5px 15px;
    position: absolute;
    margin-top: 15px;
    z-index: 100;
    width: auto;
}
.popback
{
	background:#0000006b;
	position:fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	z-index:1000;
	display:none;
}

.close_icon
{
	position:fixed;
	z-index:1111;
	top:0;
	right:0;
	margin-right:5px;
	margin-top:5px;
	cursor:pointer;
}
.p_name
{
	font-size:30px;
	margin-top:10px;
	margin-bottom:30px;
}
.p_box
{
	padding:0;
	padding-left:5px;
	padding-right:5px;
	margin-bottom:10px;
}
.p_box_inside {
    background: #00000026;
    border: 0px solid;
    padding: 10px 10px;
    line-height: 1.2;
    height: 60px;
    vertical-align: middle;
}
.cov_box_pricelist
{
	height: 205px;
	overflow-y:auto;
	overflow-x: hidden;
}
/*
 *  STYLE 3
 */

.cov_box_pricelist::-webkit-scrollbar-track,.popbox::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.cov_box_pricelist::-webkit-scrollbar,.popbox::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

.cov_box_pricelist::-webkit-scrollbar-thumb,.popbox::-webkit-scrollbar-thumb
{
	background-color: #a1adbb;
}
.ol_bt {
    position: absolute;
    width: 93%;
    margin-top: 34px;
}
.p_img_4
{
	width:95%;
}
.p_img_5
{
	width:95%;
	position:absolute;
	right:15px;
}
.p_img_7
{
	float:right;
	width:95%;
}
.box_description
{
	background: #00000038;
	padding:35px;
	margin-top:10px;
	color:#fff;
}
.p_dot
{
	background:#ababab;
	width:6px;
	height:6px;
	border-radius:100%;
	position:absolute;
}
.tl
{
	margin-top:-5px;
	margin-left:-5px;
}
.tr 
{
	margin-top:-5px;
	margin-right:5px;
	right:0;
}
.bl
{
	margin-bottom:5px;
	margin-left:-5px;
	bottom:0;
}
.br
{
	margin-bottom:5px;
	margin-right:5px;
	bottom:0;
	right:0;
}
.d_corner
{
	width:50px;
	height:50px;
	background:#ff000000;
	position:absolute;
	z-index:50;
}
.ctl
{
	border-left:12px solid #fff;
	border-top:12px solid #fff;
	top:0;
	left:0;
	margin-top:20px;
	margin-left:25px;
}
.ctr
{
	border-right:12px solid #fff;
	border-top:12px solid #fff;
	right:0;
	top:0;
	margin-top:20px;
	margin-right:25px;
}

.pl15
{
	padding-left:3px;
}
.h_dot
{
	width:10px;
	height:10px;
	position:relative;
	background:#f2d965;
	z-index:500;
	border-radius:100%;
	float:left;
	margin-top:5px;
	margin-right:10px;
}
.box_hl
{
	font-weight:bold;
	color:#fff;
	display:inline-block;
	background:#ff000000;
	padding:5px 10px;
	margin-right:10px;
	text-align:center;
}
.cp_bg
{
	background:#0000006b;
	position:fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	z-index:1000;
	display:none;
}
.cpbox
{
	background:#fff;
	position:fixed;
	z-index:1100;
	padding:15px;
	top:50%;
	left:50%;
	transform:translateX(-50%) translateY(-50%);
	display:none;
	border: 3px solid #d3a25f;
}
.y_name_1
{
	font-size:25px;
	text-align:center;
	font-weight:bold;
    margin-top:5px;
    margin-bottom:-10px;
}
.y_name
{
	font-size:20px;
	text-align:center;
	font-weight:normal;
    margin-top:15px;
    margin-bottom:15px;
}
.butides_yc
{
	position:absolute;
	padding: 7px 10px 7px 10px;
	border:none;
	color:#f05b46;
	background:none;
	margin-top: -60px;
	margin-right: 10px;
	right:0;
	outline:none;
}
.correct
{
	color:#00a90c;
	font-size:16px;
	display:none;
}
.incorrect
{
	color:#e30000;
	font-size:16px;
	display:none;
}
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