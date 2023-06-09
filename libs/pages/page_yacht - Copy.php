<br><br><br>
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
if($y_destinations!='all' || $y_type!='all' || $y_price!='all')
{
	//$where2 = "where status > 0 ".$where_destination." ".$where_type." ".$where_price." ";
	if($y_destinations!='all')
	{
		$where = "where status > 0 ".$where_destination." ".$where_type." ".$where_price." ";
		//echo "select * from yacht ".$where." <br>";
		$sql1 = $dbc->Query("select * from yacht ".$where." order by destination,price asc");
		$count_yacht = $dbc->Getnum($sql1);
		//echo $count_yacht.'<br>';
		?>
        <div class="col-md-12 nopad bottom50">
            <center>
                <h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > <?php echo $destination_name;?> <!--(<?php echo $count_yacht;?>)--> </h1>
                <!--<h2 class="f16" style="    font-family: pt !important;"><?php echo $destination_name;?> (<?php echo $count_yacht;?>)</h2>-->
            </center>
        </div>
	
        <div class="container nopad1 t_t11">
        <?php
            if($count_yacht>0)
			{
				while($row = $dbc->Fetch($sql1))
				{
					include "yacht_list_view.php";
				}
			}
			else
			{
				echo '<div class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size: 20px;color: #f05b46;"></i><br> No Result !!!</div>';
			}
        ?>
        </div>
    <?php
	}
	else
	{
		$total_data = 0;
		$sql_des = $dbc->Query("select * from yacth_destination where fleet_type IS NULL and status > 0 order by id asc");
		$count_yacht=0;
		while($line = $dbc->Fetch($sql_des))
		{
			$total_yacht = $dbc->GetCount("yacht","destination = '".$line['id']."'");
			//echo $total_yacht;
			if($total_yacht>0)
			{
				if($y_destinations=='all')
				{
					$where_destination = "and destination = '".$line['id']."'";
				}
				
				$where = "where status > 0 ".$where_destination." ".$where_type." ".$where_price." ";
				//echo "select * from yacht ".$where." <br>";
				$sql1 = $dbc->Query("select * from yacht ".$where." order by destination,price asc");
				$count_yacht = $dbc->Getnum($sql1);
				//echo $count_yacht.'<br>';
				if($count_yacht>0)
				{
					$total_data=1;
					?>
					<div class="col-md-12 nopad bottom50">
						<center>
							<h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > <?php echo $line['name'];?> <!--(<?php echo $count_yacht;?>)--></h1>
						</center>
					</div>
					
					<div class="container nopad1 t_t11">
						<?php
						while($row = $dbc->Fetch($sql1))
						{
							if($line['id']==$row['destination'])
							{
								include "yacht_list_view.php";
							}
						}
					?></div><?php
				}
			}
			$count_yacht=0;
		}
		
		if($total_data==0)
		{
			echo '<div class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size: 20px;color: #f05b46;"></i><br> No Result !!!</div>';
		}
	}
}
else
{
	
	?>
    <div class="col-md-12 nopad bottom50">
        <center>
            <h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > Luxury Private Yacht Thailand </h1>
            <h2 class="f16" style="    font-family: pt !important;"><?php echo $line['name'];?> <!--(<?php echo $total_yacht;?>)--></h2>
        </center>
    </div>
            
    <div class="container nopad1 t_t11">
    <?php 
        $sql = $dbc->Query("select * from yacht where status > 0 order by destination,price asc");
        while($row = $dbc->Fetch($sql))
        {
            include "yacht_list_view.php";
        }
    ?>
    </div>
    <br><br>
    <?php
			
	$sql1 = $dbc->Query("select * from yacth_destination where fleet_type IS NULL and status > 0 order by id asc");
	while($line = $dbc->Fetch($sql1))
	{
		$total_yacht = $dbc->GetCount("yacht","destination = '".$line['id']."'");
		//echo $total_yacht;
		if($total_yacht>0)
		{
			?>
			<div class="col-md-12 nopad bottom50">
				<center>
					<h1 class="mtop255" style="    text-transform: uppercase;margin-bottom: 20px;" > Luxury Private Yacht Thailand </h1>
					<h2 class="f16" style="    font-family: pt !important;"><?php echo $line['name'];?> <!--(<?php echo $total_yacht;?>)--></h2>
				</center>
			</div>
					
			<div class="container nopad1 t_t11">
			<?php 
                $sql = $dbc->Query("select * from yacht where status > 0 and destination = '".$line['id']."' order by destination,price asc");
                while($row = $dbc->Fetch($sql))
                {
                    include "yacht_list_view.php";
                }
            ?>
			</div>
			<br><br>
			<?php
		}
		else
		{
			?>
			<!--<div class="container nopad1 t_t11">
				<div class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size: 20px;color: #f05b46;"></i><br> No Result !!!</div>
			</div>-->
			<?php
		}
	}
}
 
include "yacht_detail_popup2.php";
//include "yacht_detail_popup.php";
include "yacht_contact_popup.php";

?>
<!--<link href="<?php echo $url_link;?>libs/css/bootstrap.min-4.css" rel="stylesheet">-->
<style>


/********************************************************************************************************************************/
@media screen and (max-width:768px)
{
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
	.popbox
    {
		width:750px;
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
	font-size:40px;
	margin-top:15px;
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
	padding:10px;
	top:50%;
	left:50%;
	transform:translateX(-50%) translateY(-50%);
	display:none;
}
.y_name
{
	font-size:25px;
	text-align:center;
	font-weight:bold;
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