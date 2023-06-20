<?php
session_start();
$room_id = $_REQUEST['id'];
if(!in_array($room_id,$_SESSION['recent']))
{
	array_push($_SESSION['recent'],$room_id);
}

if(!in_array($room_id,$_SESSION['recent_all']))
{
	array_push($_SESSION['recent_all'],$room_id);
}

if(count($_SESSION['recent'])>6)
{
	array_shift($_SESSION['recent']);
}
?>
<style>
input[type=date].form-control,input[type=time].form-control,input[type=datetime-local].form-control,input[type=month].form-control{line-height:normal}.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:45px;height:2px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px;top:43px}.mg-room-fecilities{padding:5px 15px 5px 15px}.btn-main:hover{background-color:#ff8d4b;border-color:#ff8d4b;color:#fff}.btn-dark-main{color:#FFF;background-color:#f05b46;border-color:#16262e;width:100%}.btn-dark-main:hover{background-color:#f78474;border-color:#e7b315;color:#fff}ul li{font-family:pr;list-style:none}ul li img.chk{margin-left:-29px}				
/*
 *  STYLE 3
 */

#style-3::-webkit-scrollbar-track{-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3);background-color:#F5F5F5}#style-3::-webkit-scrollbar{width:6px;background-color:#F5F5F5}#style-3::-webkit-scrollbar-thumb{background-color:#112845}.scrollbar{margin-left:15px;float:left;height:300px;background:none;margin-bottom:25px}

.mg-page-title{padding-top:0px;padding-bottom:50px;padding-left:0px;background-image:url(<?php echo $photo_cover;?>);background-repeat:no-repeat;background-position:50% !important}
.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0;background:rgba(0,0,0,0.59)}.mg-single-room-txt{padding:0px 0px 0px 0px}button.btn2{font-family:fontProxima Nova88279 !important;border-radius:100%;height:45px;width:45px;margin-right:-2px;padding:0px}.mg-sec-left-title,.mg-widget-title{font-family:"Playfair Display",serif;color:#16262e;font-size:20px;font-weight:400;padding-bottom:15px;position:relative;font-weight:bold}/**
 * Override feedback icon position
 * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
 */
#eventForm .form-control-feedback{top:0;right:-15px}.rate>.mg-sec-left-title:after,.rate>.mg-widget-title:after{content:'';display:block;width:49px;height:1px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px;top:43px}.table-striped>tbody>tr:nth-of-type(odd){background-color:#fff}.table-striped>tbody>tr{background-color:#eee}.swiper-container{width:100%;height:100%;padding:15px 0px 15px 0px}.swiper-slide{font-size:18px;display:-webkit-box;display:-ms-flexbox;display:-webkit-flex;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center;font-size:14px}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:-5px;left:0;width:100%}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:1px;left:50% !important;width:400px !important;margin:auto;visibility:visible !important;position:absolute !important;z-index:1950 !important;margin-left:-200px !important}
@media screen and (max-width:992px)
{
	.mg-contact-form-input {
		margin-bottom: 2px;
		display: block;
	}	
	.form-control {
		border-radius: 1px;
		margin-bottom: 0px; 
		border-color: #fff;
		padding: 8px 12px;
		height: auto;
		box-shadow: none;
		color: #4b565b;
	}
}
@media screen and (min-width:992px)
{
	.mg-contact-form-input {
		margin-bottom: 2px;
		display: block;
	}	
	.form-control {
		border-radius: 1px;
		margin-bottom: 0px; 
		border-color: #fff;
		padding: 8px 12px;
		height: auto;
		box-shadow: none;
		color: #4b565b;
	}
}
.boxbot{border-bottom:2px solid #f05b46;height:50px;background:#f5f5f5;font-size:20px;padding:13px;font-family:pr;color:#112845;margin-bottom:50px}.iip{width:100% !important;background:#eee !important;padding::5px !important}.box{}#i_map{height:400px;width:100%;margin-bottom:-90px;margin-top:50px}.modal-h{padding:5px 0px;border-bottom:0px solid #e5e5e5;color:#fff !important}.modal-h h4,button.close{color:#fff !important;opacity:1 }.modal-body{position:relative;padding:5px;background:#fff}.input-min-width-95p{min-width:95%;border-radius:1px;margin-bottom:0px;border-color:#fff;padding:8px 12px;height:auto;box-shadow:none;color:#4b565b;background:#EEE;-webkit-appearance:none;-moz-appearance:none}.mg-footer-widget{background-color:#112845;padding:50px 0 0px;color:#c0c8cb}</style>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo $url_link;?>libs/css/swiper.css">

<script src="<?php echo $url_link;?>libs/js/star-rating.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<?php /*?><script src="<?php echo $url_link;?>libs/js/jquery-3.1.1.min.js"></script><?php */?>

<!-- Google Code for Inquirer Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 853694063;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "_Y36CM6sp3UQ76yJlwM";
var google_remarketing_only = false;
/* ]]> */
// อย่าเปลี่ยนโค้ดด้านล่าง
goog_report_conversion = function(url) {
  goog_snippet_vars();
  window.google_conversion_format = "3";
  var opt = new Object();
  opt.onload_callback = function() {
  if (typeof(url) != 'undefined') {
	window.location = url;
  }
}
var conv_handler = window['google_trackConversion'];
if (typeof(conv_handler) == 'function') {
  conv_handler(opt);
  }
	}
/* ]]> */


$(document).ready(function(e) {
    $(".lazy").lazyload();
});

</script>
<?php /*?><script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script><?php */?>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"></script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/853694063/?label=_Y36CM6sp3UQ76yJlwM&guid=ON&script=0"/>
</div>
</noscript>
<!-- Google Code for Inquirer Conversion Page -->

<?php
function expdate($startdate,$datenum)
{
	$startdatec = strtotime($startdate); // ทำให้ข้อความเป็นวินาที
	$tod = $datenum * 86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
	$ndate = $startdatec + $tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
	return $ndate; // ส่งค่ากลับ
}
?>


<?php 
$sql_cover = $dbc->Query("select * from properties where id='".$_REQUEST['id']."' ");//AND status > 0
$cover = $dbc->Fetch($sql_cover);
$photo_cov = json_decode($cover['cover'],true);
if(count($photo_cov) <='0')
{
	$photo_cover = "../../../../files/cover.jpg";
}
else
{
	$photo_cover = json_decode($cover['cover'],true);
}

$vi_name_cover = explode("|",$room['name']);

$mosaic = json_decode($room['photo'],true);
$vi_name_1 = explode("|",$room['name']);
?>
<?php
$brieff = base64_decode($room['brief'],true);
$bex = explode(",",$brieff);
?>

<style>
@media screen and (max-width:663px)
{
	.mosaic_cover
	{
		margin-top: 48px;
	}
}
@media screen and (min-width:663px) and (max-width:992px)
{
	.mosaic_cover
	{
		margin-top: 8px;
	}
}
@media screen and (min-width:992px)
{
	.mosaic_cover
	{
		margin-top: 99px;
	}
}
.cover_mosa
{
	border:1px solid #fff;
	cursor:pointer;
}
</style>
<?php 
if($room['tag']!=0)
{
	$tag = $dbc->GetRecord("tags","*","id = '".$room['tag']."' ");
	$tag_name = $tag['name'];
	$button = '<div class="buttag">'.$tag_name.'</div>';
}
?>

<div class="conrainer-fluid mosaic_cover" onClick="open_pop();">
	<div class="rows">
		<div class="col-md-6 col-sm-6 col-xs-12 nopad">
        	<img itemprop="image" class="cover_mosa lazy" src="<?php echo $mosaic[0]['img'];?>" width="100%" alt="<?php echo $vi_name_1[0].' '.$mosaic[0]['name'];?>">
            <?php echo $button;?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 nopad">
        	<div class="col-md-6  col-sm-6 col-xs-3 nopad"><img itemprop="image" class="cover_mosa lazy" src="<?php echo $mosaic[1]['img'];?>" width="100%" alt="<?php echo $vi_name_1[0].' '.$mosaic[1]['name'];?>"></div>
            <div class="col-md-6 col-sm-6 col-xs-3 nopad"><img itemprop="image" class="cover_mosa lazy" src="<?php echo $mosaic[2]['img'];?>" width="100%" alt="<?php echo $vi_name_1[0].' '.$mosaic[2]['name'];?>"></div>
            <div class="col-md-6 col-sm-6 col-xs-3 nopad"><img itemprop="image" class="cover_mosa lazy" src="<?php echo $mosaic[3]['img'];?>" width="100%" alt="<?php echo $vi_name_1[0].' '.$mosaic[3]['name'];?>"></div>
            <div class="col-md-6 col-sm-6 col-xs-3 nopad"><img itemprop="image" class="cover_mosa lazy" src="<?php echo $mosaic[4]['img'];?>" width="100%" alt="<?php echo $vi_name_1[0].' '.$mosaic[4]['name'];?>"></div>
        </div>    
    </div>
</div>
<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw">Inspiring Villas</span></span>

<?php /*?><div class="mg-page-titles phe web"><!--parallax-->
    <div class="container-fluid nopad" style="border-bottom: 2px solid #d3a267;">
            <img class="lazya" src="<?php echo $photo_cover;?>" alt="<?php echo $vi_name_cover[0];?>cover" width="100%" class="img_cover" >
        <div class="row">
        </div>
    </div>
</div><?php */?><?php //echo "------------".$url_link;?>



<!-- Large modal -->
<div id="myslides" class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document"  data-scroll-scope="force" >
    <div class="modal-content cont">
      <div class="showslide"></div>	<?php //include "libs/pages/slide_photo.php";?>
    </div>
  </div>
</div>
<!-- Large modal -->
<script>
function open_pop()
{
	//alert(1);
	var room = '<?php echo $room['id'];?>';
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/slide_photo.php",
		type:"POST",
		dataType:"html",
		data:{room:room},
		success: function(res)
		{
			$(".showslide").html(res);
		}
	});
	$("#myslides").modal('show');
}
</script>

<?php
$sql_rate_mk = $dbc->Query("select * from rating where property = '".$room['id']."'");
$xx_mk=0;
$cou_rate_mk = 0;
while($rate_mk = $dbc->Fetch($sql_rate_mk))
{
	$xx_mk++;
	$cou_rate_mk+=$rate_mk['rate'];
}
$total_rate_mk = $cou_rate_mk/$xx_mk;
?>
<!-- มาร์กอัป JSON-LD ที่สร้างขึ้นโดยโปรแกรมช่วยมาร์กอัปข้อมูลที่มีโครงสร้างของ Google -->
<?php /*?><script type="application/ld+json">
{
	"@context": "http://schema.org/",
	"@type": "Recipe",
	"name": "<?php echo $room['name'];//$vi_name_1[0];?>",
      "image": [
        "<?php echo "https://www.inspiringvillas.com".$mosaic[0]['img'];?>",
        "<?php echo "https://www.inspiringvillas.com".$mosaic[1]['img'];?>",
        "<?php echo "https://www.inspiringvillas.com".$mosaic[2]['img'];?>"
        ],
      "author": {
        "@type": "Person",
        "name": "Inspiring Villas"
      },
	  
      "description": "<?php echo $brieff;?>",
	  "cookTime": "",
	  "keywords": "<?php echo $vi_name_1[0];?>",
	  "url" : "<?php echo $url_link.$room['ht_link'].'.html';?>",
	  
	  <?php
	  if($total_rate_mk!=0)
	  {?>
	  	"prepTime": "",
		  "review": {
			"@type": "Review",
			"reviewRating": {
			  "@type": "Rating",
			  "ratingValue": "<?php echo ($total_rate_mk==0)?1:$total_rate_mk;?>",
			  "bestRating": "5"
				},
				"author": {
				"@type": "Person",
				"name": "Inspiring Villas"
				}
			},
		  "aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "<?php echo ($total_rate_mk==0)?0:$total_rate_mk;?>",
			"ratingCount": "<?php echo ($total_rate_mk==0)?1:$xx_mk;?>"
			}
	<?php 
	}
	else
	{
		?>"prepTime": ""<?php
	}?>
		  
}
</script><?php */?>
<?php /*?>"description": "<?php echo $brieff;?>",<?php */?>


