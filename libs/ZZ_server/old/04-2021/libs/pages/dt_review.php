<?php

//echo $nu_rate;
function dateType2($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	switch($m)
	{
		case'01':  $month = 'Jan';break;
		case'02':  $month = 'Feb';break;
		case'03':  $month = 'Mar';break;
		case'04':  $month = 'Apr';break;
		case'05':  $month = 'May';break;
		case'06':  $month = 'Jun';break;
		case'07':  $month = 'Jul';break;
		case'08':  $month = 'Aug';break;
		case'09':  $month = 'Sep';break;
		case'10':  $month = 'Oct';break;
		case'11':  $month = 'Nov';break;
		case'12':  $month = 'Dec';break;
	}
	return  $month .'  '.$y;
}

if($nu_rate<=0)
{
}
else
{
	?>
<style>
#revv
{
	padding-bottom: 20px;
}
</style>
<div id="pos_my_reviews" class="col-md-12 mg-room-fecilities pos_my_reviews Reviews my_review">
    <h6 class="mg-sec-left-title l15" style="margin-top:15px;"><?php echo $vi_name[0];?> <?php //echo $nu_rate;?> Reviews</h6>
    <div class="row bggray">
    	<div class="cover_all_rv_box">
		<?php
        $sql_rate = $dbc->Query("select * from rating where property = '".$room['id']."'");
        $xx=0;
		$yy=1;
        $cou_rate = 0;
        while($rate = $dbc->Fetch($sql_rate))
        {
           $actt = ($xx==0)?'tb_1':'';
		   if($yy<=3)
		   {
			   if($rate['cus_status']>=1)
				{
					if($rate['approve']!='')
					{
						echo '<div class="col-md-12 tr_coverbox ">';
							echo '<div class="tr_box '.$actt.'">';
								echo '<img src="'.json_decode($rate['photo']).'" class="img_comment">';
								echo '<div class="tr_name">Review by <strong>'.$rate['name'].'</strong></div>';
								echo '<div class="tr_date">'.$dbc->date_type($rate['days']).'</div>';
								if($rate['title']!='')
								{
								echo '<div class="tr_title">';
									//echo '<i class="fa fa-quote-left ffix" aria-hidden="true" style="color: #f05b46;"></i>';
									echo '"'.$rate['title'].'"';
									//echo '<i class="fa fa-quote-right ffix" aria-hidden="true" style="color: #f05b46;"></i>';
								echo '</div>';
								}
								else
								{
									echo '<div class="tr_title"></div>';
								}
								echo '<div class="tr_message">'.base64_decode($rate['text'],true).'</div>';
								
							   echo '<div class="tr_star">';
										for($a=0;$a<$rate['rate'];$a++)
										{
											echo '<i class="fa fa-star ffix" aria-hidden="true" style="color: #f05b46;"></i>';
										}
							   echo '</div>';
							   
						   echo '</div>';
					   echo '</div>';
					   $yy++;
					}
					
				}
				else
				{
					echo '<div class="col-md-12 tr_coverbox ">';
						echo '<div class="tr_box '.$actt.'">';
							echo '<div class="tr_name">Review by <strong>'.$rate['name'].'</strong></div>';
							echo '<div class="tr_date">'.$dbc->date_type($rate['days']).'</div>';
							if($rate['title']!='')
							{
							echo '<div class="tr_title">';
								//echo '<i class="fa fa-quote-left ffix" aria-hidden="true" style="color: #f05b46;"></i>';
								echo '"'.$rate['title'].'"';
								//echo '<i class="fa fa-quote-right ffix" aria-hidden="true" style="color: #f05b46;"></i>';
							echo '</div>';
							}
							else
							{
								echo '<div class="tr_title"></div>';
							}
							echo '<div class="tr_message">'.base64_decode($rate['text'],true).'</div>';
						   echo '<div class="tr_star">';
									for($a=0;$a<$rate['rate'];$a++)
									{
										echo '<i class="fa fa-star ffix" aria-hidden="true" style="color: #f05b46;"></i>';
									}
						   echo '</div>';
					   echo '</div>';
				   echo '</div>';
				  $yy++;
				}
		   }
		   
		   if($rate['rate']!=0)
			{?>
			<div class="hidden" itemprop="review" itemscope itemtype="http://schema.org/Review">
				<span itemprop="name">Value purchase</span> - by <span itemprop="author"><?php echo ($rate['name']!='')?$rate['name']:'Inspiring Villas';?></span>,
				<meta itemprop="datePublished" content="<?php echo $dbc->date_type($rate['days']);?>"><?php echo $dbc->date_type($rate['days']);?>
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					<meta itemprop="worstRating" content = "1"/>
					<span itemprop="ratingValue"><?php echo ($rate['rate']==0)?0:$rate['rate'];;?></span>/
					<span itemprop="bestRating">5</span>stars
				</div>
				<span itemprop="description"><?php echo base64_decode($rate['text'],true);?></span>
			</div> 
			<?php
			}
				
		
           if($rate['cus_status']>=1)
			{
				if($rate['approve']!='')
				{
					$xx++;
				}
			}
			else
			{
			  $xx++;
			}
		   //$xx++;
           $cou_rate+=$rate['rate'];
        }
        $total_rate = $cou_rate/$xx;
       // echo '<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" style="color:#eeeeee;">';
//            //echo '<span itemprop="ratingValue" style="color:#eeeeee;">'.$total_rate.'</span>';
//                echo '<meta itemprop="worstRating" content = "1">
//                <span itemprop="ratingValue">'.$total_rate.'</span>/
//                <span itemprop="bestRating">5</span>stars';
//        echo '</span>';
		if($total_rate==0)
		{
			$total_rate=5;
		}
		else
		{
		}
		
		echo '<span  class="hidden" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" style="color:#eeeeee;">';
			//echo '<span itemprop="ratingValue" style="color:#eeeeee;">'.$total_rate.'</span>';
				echo '<meta itemprop="worstRating" content = "1">
				<span itemprop="ratingValue">'.$total_rate.'</span>/
				<span itemprop="bestRating">5</span>stars
				<span itemprop="ratingCount">'.$xx.'</span>';
		echo '</span>';
		
        ?>
           
           
           
           
           
           
           <?php /*?><div class="col-md-12 ">
            <div id="revv" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators moodd">
                <?php
                $sql_rate1 = $dbc->Query("select * from rating where property = '".$room['id']."'");
                $xx1=0;
                while($rate1 = $dbc->Fetch($sql_rate1))
                {
                    $actt1 = ($xx1==0)?'active':'';
                    echo '<li data-target="#revv" data-slide-to="'.$xx1.'" class="'.$actt1.'"></li>';
                    $xx1++;
                }
                ?>
                </ol>
                
                <!-- Wrapper for slides -->
                <div itemprop="review" itemscope itemtype="http://schema.org/Review" class="carousel-inner" role="listbox">
                <?php
                $sql_rate = $dbc->Query("select * from rating where property = '".$room['id']."'");
                $xx=0;
                $cou_rate = 0;
                while($rate = $dbc->Fetch($sql_rate))
                {
                    $actt = ($xx==0)?'active':'';
                    echo '<div class="item '.$actt.'">';
                        echo '<div class="col-md-1" style="font-family:pr;"><i class="fa fa-quote-left ffix" aria-hidden="true" style="color: #f05b46;"></i></div>';
                            echo '&nbsp;&nbsp;&nbsp;';
                            echo '<div  class="col-md-12" style="font-family:pr;"><span itemprop="reviewBody">'.base64_decode($rate['text'],true).'</span>';
                            //echo '<br><br>';
                            echo '<div class="col-md-12 nopad" style="font-family:pr;"> <i class="fa fa-quote-right ffix" aria-hidden="true" style="color: #f05b46;"></i></div>';
                            echo '<div class="col-md-12 nopad" style="font-family:pr;">';
                            
                            for($a=0;$a<$rate['rate'];$a++)
                            {
                                echo '<i class="fa fa-star ffix" aria-hidden="true" style="color: #f05b46;"></i>';
                            }
                            
                            //$re_name = explode("-",$rate['name']);
    //						$re_month = explode(" ",$re_name[1]);
    //						$re_date = explode(" ",$re_name[1]);
    //						$re_year = explode(" ",$re_name[1]);
    //                        //echo '&nbsp;&nbsp;'.$rate['name'];//.'&nbsp;'.dateType2($rate['created']);
    //						$dash = ($re_year[1]!='')?'-':'';
                            //echo '&nbsp;&nbsp; <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'.$re_name[0].'</span></span> '.$dash.' '.$re_year[1].' '.$re_year[2].' '.$re_year[3];
                            echo '&nbsp;&nbsp; <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'.$rate['name'].'</span></span>';
                            // '.$dash.' '.$re_year[1].' '.$re_year[2].' '.$re_year[3];//.'&nbsp;'.dateType2($rate['created']);
                            echo '</div><br class="web"><br class="web">';
                        echo '</div><br class="web"><br class="web"><br class="web"><br class="web"><br><br>';
                    echo '</div>';
                    $xx++;
                    $cou_rate+=$rate['rate'];
                }
                $total_rate = $cou_rate/$xx;
                echo '<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" style="color:#eeeeee;">';
                    //echo '<span itemprop="ratingValue" style="color:#eeeeee;">'.$total_rate.'</span>';
                        echo '<meta itemprop="worstRating" content = "1">
                        <span itemprop="ratingValue">'.$total_rate.'</span>/
                        <span itemprop="bestRating">5</span>stars';
                        
                echo '</span>';
                ?>
                
                    
                </div>
                
                <!-- Controls -->
                <a class="left carousel-control" href="#revv" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>-->
                </a>
                <a class="right carousel-control" href="#revv" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>-->
                </a>
            </div>
           <button class="pull-right" style="outline:none;color: #f05b46;background: none; border: none;font-family: pt;" data-toggle="modal" data-target=".modalreview" onClick="shoe_rate('<?php echo $_REQUEST['id'];?>')">VIEW ALL (<?php echo $xx;?>)</button>
                
           <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" style="color:#eeeeee;">
                    <span itemprop="ratingValue"><?php echo $total_rate;?></span>
                    out of <span itemprop="bestRating">5</span>
                    based on <span itemprop="ratingCount"><?php echo $xx;?></span> user ratings
                </div>
            </div>
            <?php */?>
            
            
            
            
            
            
            <div class="load_more_reivew"></div>
            <button class="pull-right" style="outline:none;color: #f05b46;background: none; border: none;font-family: pt;margin-right: 15px;" data-toggle="modal" data-target=".modalreview" onClick="shoe_rate('<?php echo $_REQUEST['id'];?>')">VIEW ALL (<?php echo $xx;?>)</button>
            <?php /*?><?php
			if($xx>1)
			{
				?>
				<div class="col-xs-12 col-sm-12 col-md-12 top50 load_review_more box_loadmore">
                    <div class="col-md-12 gr_load_mob text-center">
                        <i class="fa fa-arrow-down f30"></i>
                        <br>
                        LOAD MORE...
                    </div>
                </div>
                                                
                <div class="loadd lod2" style="display:none;">
                    <img src="<?php echo $url_link;?>/upload/loading.gif" width="50"><br>Loading..
                </div>
				<?php
			}
			?><?php */?>
            
        </div>    
    </div>
</div>
<input type="hidden" id="txrev" name="txrev" value="1">
<?php //echo S3_BUCKET_URL ?>
<?php
}
?>

<!-- Large modal -->
<div class="modal fade modalreview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="    border-radius: 0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: black;">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Villa Reviews </h4>
            </div>
            <div class="modal-body" style="background:#eee;">
                <div class="show_rate row" style="padding: 10px 50px;"></div>
            </div>
            <?php /*?><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><?php */?>
        </div>
    </div>
</div>
<!-- Large modal -->
<style>
.carousel-control.right {
    right: 0;
    left: auto;
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
    background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(138, 138, 138, 0.5) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000',endColorstr='#80000000',GradientType=1);
    background-repeat: repeat-x;
}
.carousel-control.left {
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001)));
    background-image: linear-gradient(to right,rgb(134, 134, 134) 0,rgba(0,0,0,.0001) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000',endColorstr='#00000000',GradientType=1);
    background-repeat: repeat-x;
}
.carousel-control {
    width: 40px;
    height: 100%;
    top: 0;
    /* margin-top: -60px; */
    background-color: rgb(134, 134, 134);
    /* background-image: url(../images/cur-arrow-left.png) !important; */
    background-position: center center !important;
    background-repeat: no-repeat !important;
    /* background-size: 23px 40px; */
    -webkit-transition: left 0.3s, right 0.3s;
    transition: left 0.3s, right 0.3s;
}
.carousel-control.right {
    /* background-image: url(../images/cur-arrow-right.png) !important; */
    right: -100px;
}
.img_comment
{
	width: 60px;
	border:3px solid #fff;
	/*float:right;*/
	margin-bottom:20px;
}
</style>

<script>
var totle_review = '<?php echo $xx;?>';
var started = 1;
var tigg = true;
$(document).ready(function(e) {
	//$(window).scroll(function () {
//		if ($(this).scrollTop() > $(".bg_map").offset().top-600) 
//        {
//			$(".load_review_more").hide();
//			if(tigg==true)
//			{
//				if(started < totle_review)
//				{
//					$(".lod2").show();
//				}
//				else
//				{
//					
//				}
//				
//				
//				tigg = false;
//				$.ajax({
//					url:"<?php echo $url_link;?>libs/actions/action-load-review.php",
//					type:"POST",
//					dataType:"html",
//					data:{pid:<?php echo $room['id'];?>,count:$("#txrev").val()},
//					success: function(res){
//						$(".lod2").hide();
//						
//						$(".load_more_reivew").append(res);
//						
//						if(started < totle_review)
//						{
//							started+=5;
//							$("#txrev").val(started);
//							tigg = true;
//						}
//						else
//						{
//							started=totle_review;
//							$("#txrev").val(started);
//							tigg = false;
//						}
//					}
//				});
//			}
//		}
//	});
});

function shoe_rate(id)
{
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/action-load-rate.php",
		type:"POST",
		dataType:"html",
		data:{id:id},
		success: function(res){
			$(".show_rate").html(res);
		}
	});
}
</script>