<?php 
/*$cover = $dbc->GetRecord("cover","*","page='about' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);*/
?>
<style>
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
     background-position: 50% !important; 
    /*color: #fff;
    text-align: center;
    height: 600px;
     background: red; */
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
		height: 0px;
		background-color: #d3a267;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
	}
}
@media screen and (min-width:992px)
{
	.mg-sec-left-title:after, .mg-widget-title:after {
		content: '';
		display: block;
		width: 70%;
		height: 0px;
		background-color: #d3a267;
		position: absolute;
		bottom: 0;
		left: 0 !important;
		top: 4px;
	}
}

</style>
<div class="mg-page-titles web"><!--parallax-->
    <div class="container-fluid nopad">
            <!--<img src="<?php echo $photo_cover;?>" alt="" width="100%">-->
        <div class="row" >
        </div>
    </div>
</div>
<div class="mg-page-title mobi"></div>
<?php //include "libs/pages/search.php";?>

<br>
<div class="mg-best-rooms">
    <div class="container-fluid backgi">
        <div class="row">
        
            <div class="contain ">
            	<p class="tt1">THANK YOU </p>
                <p class="tt2">FOR YOUR QUESTION</p> 
                <p class="tt3">one of our villa specialists is now working on your request</p>
                <p class="tt4">for any urgent requests, please call us at </p>
                <p class="tt4">TH +66 84 677 1551  HK +852 8198 6765 AUS +028 005 7651</p>
            </div>
            
        </div>
    </div>
</div>


<script src="<?php echo $url_link;?>libs/js/jquery-3.1.1.min.js"></script>
<script>
var destin = '<?php echo $_REQUEST['desti'];?>';
$(document).ready(function(e) {
    setTimeout(function(){
		if(destin==39)
		{
			links = '<?php echo $url_link;?>/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';
		}
		else
		{
			links = '<?php echo $url_link;?>/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';
		}
		window.location = links;
		//history.go(-1);
	},2000);
});
</script>

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
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/853694063/?label=_Y36CM6sp3UQ76yJlwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for Inquirer Conversion Page -->





