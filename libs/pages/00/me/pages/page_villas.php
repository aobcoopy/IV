<?php 
$cover = $dbc->GetRecord("cover","*","page='villas' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
?>
<style>
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
    /* background-position: 0% !important; *8/
    color: #fff;
    text-align: center;
    height: 600px;
    /* background: red; */
}
.mg-available-rooms {
     padding: 0px 0; 
}
p {
     margin-bottom: 10px; 
}
@media screen and (max-width:992px)
{
	.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 100%;
		height: 1px;
		background-color: #dbb484;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
		    margin-top: 0px !important;
	}
}
@media screen and (min-width:992px)
{
	/*.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 70%;
		height: 1px;
		background-color: #d3a267;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
		    margin-top: 0px !important;
	}*/
	.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 10%;
		height: 2px;
		background-color: #dbb484;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
		margin-top: 0px !important;
	}
}
a
{
	color:#000;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Playfair Display", serif;
    color: #0b2646;
}
</style>
<div class="mg-page-titles  "><!--parallax-->
    <div class="container-fluid nopad">
            <img src="<?php echo $photo_cover;?>" alt="" width="100%" class="motop">
        <div class="row" >
            <!--<div class="col-md-12">
                <h2>For Rent</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>
<!--<div class="mg-page-title mobi"></div>-->
<?php include "libs/pages/search.php";?>

<br>
<div class="mg-best-rooms">
    <div class="container-fluid">
        <div class="row">
            <div class=""><!--col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1-->
                <div class="mg-sec-titles text-center">
                   <!-- <center><h2>VILLA COLLECTIONS</h2></center>-->
                    <center><h1 class="hidden-xs" style="margin-top: -25px;"> Phuket & Koh Samui Luxury Villas </h1></center><!--Phuket & Koh Samui Private Villa Collections-->
                    <h2 class="f16" style="    font-family: pt !important;">Browse Luxury Villas in Thailand for Rent</h2><!--Browse Private Pool Villas For Rent-->
                    <!--<p>These best rooms chosen by our customers</p>-->
                </div>
                <div class="container">
                <div class="row web">
                
                <?php 
				$a=0;
				$sql_cate = $dbc->Query("select * from categories where status > 0 order by sort asc");
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$pho = json_decode($r_cate['photo'],true);
					if($a==0)
					{
						$a=1;
						
						
						echo '<div class="col-sm-6 col-md-12 top15">';
							echo '<div class="col-md-7 lbox boxx ">';
								echo '<a href="/'.$r_cate['ht_link'].'.html"><img src="'.$pho.'" width="100%" class="bdl"></a>';
							echo '</div>';
							echo '<div class="col-md-5 rbox boxx xob" style="padding-bottom: 15px;">';
								echo '<div class="boxright"></div>';
								echo '<h2 style="font-family: pri !important;">'.switchcase_sort($r_cate['id']).'</h2>';
								echo '<h6 style="margin-top:-10px;font-family: pt !important;" class="mg-widget-title"></h6><div style="font-family: pt !important;padding-left: 15px;">'.base64_decode($r_cate['detail'],true).'</div>
								<br>';
							echo '<a href="/'.$r_cate['ht_link'].'.html" class="btnnl pull-right" >Explore More</a>';
							echo '</div>';
							//echo '<div class="col-md-12 "><hr class="style-two"></div>';
							echo '<div class="col-md-12 "><br><br></div>';
						echo '</div>';
						//
					}
					else
					{
						$a=0;
						
						echo '<div class="col-sm-6 col-md-12 top15">';
							echo '<div class="col-md-5 l_box boxx xob" style="padding-bottom: 15px;">';
								echo '<div class="boxleft"></div>';
								echo '<h2 style="font-family: pri !important;">'.switchcase_sort($r_cate['id']).'</h2>';
								echo '<h6 style="margin-top:-10px;font-family: pt !important" class="mg-widget-title"></h6><div style="font-family: pt !important;;padding-left: 15px;">'.base64_decode($r_cate['detail'],true).'</div>
								<br>
								<a href="/'.$r_cate['ht_link'].'.html" class="btnnl pull-right">Explore More</a>';
							echo '</div>';
							echo '<div class="col-md-7 r_box boxx">';
								echo '<a href="/'.$r_cate['ht_link'].'.html"><img src="'.$pho.'" width="100%" class="bdr"></a>';
							echo '</div>';
							//echo '<div class="col-md-12 "><hr class="style-two"></div>';
							echo '<div class="col-md-12 "><br><br></div>';
						echo '</div>';
						//
					}
					?>
                	
                    
                    
                <?php
				}
				?>
                
                </div>
                </div>
                <div class="rows mobi">
                <?php 
				$a=0;
				$sql_cate = $dbc->Query("select * from categories where status > 0 order by sort asc");
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$pho = json_decode($r_cate['photo'],true);
						echo '<div class="col-sm-6 col-md-12 ">';
							echo '<div class="col-md-7 lbox boxx">';
								echo '<a href="/'.$r_cate['ht_link'].'.html"><img src="'.$pho.'" width="100%" ></a>';
							echo '</div>';
							echo '<div class="col-md-5 rbox boxx"><br>';
								echo '<h2 style="margin-top: -4px;font-family: pri !important;">'.switchcase($r_cate['id']).'</h2>';
								echo '<h6 style="margin-top:-10px;font-family: pt !important;" class="mg-widget-title"></h6><div style="font-family: pt !important;">'.base64_decode($r_cate['detail'],true).'</div>
								<br>';
							echo '<a href="/'.$r_cate['ht_link'].'.html" class="btnnl " >Explore More</a>';
							echo '</div>';
							echo '<div class="col-md-12 "><hr class="style-two"></div>';
						echo '</div>';
				}
				?>
                </div>
                
				<!--<center><a href="" class="btn btn-main">See All Villas</a></center>-->
            </div>
        </div>
    </div>
</div>
