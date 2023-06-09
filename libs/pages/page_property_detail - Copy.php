<?php 

	$url_link_p = $_SERVER['REQUEST_URI']; 
	$ht_link_raw = str_replace(".html", "", ltrim($_SERVER['REQUEST_URI'],"/"));
	if(strrchr($url_link_p,'?'))
	{
		$link_o = $ht_link_raw;
		$ex = explode("?",$link_o);
		$ht_link_raw = $ex[0];
		$sql = $dbc->Query("select id, status from properties where ht_link = '" . $ht_link_raw . "'");
		$p_data = $dbc->Fetch($sql);
		$_REQUEST['id'] = $p_data['id'];
	}
	else
	{
		$id = $_REQUEST['id'];
	}
	
	if($_REQUEST['page']=='forrent')
	{
		if(isset($_REQUEST['id']))
		{
			if($dbc->HasRecord("metatag","property=".$_REQUEST['id']))
			{
				$meta = $dbc->GetRecord("metatag","*","property=".$_REQUEST['id']);
				
				$meta_h1 = $meta['title'];
				$meta_description = base64_decode($meta['description'],true);
			}
			else
			{
				$meta_h1 = "Luxury Rental Villas";
				$meta_description = "Find and Experience a sensational holiday with our finest Luxury Rental Villas ";
			}
		}
	}
	
	
             
    $id = $_REQUEST['id'];
    $sql_properties = "select * from properties where id=".$id;
    $sql_room = $dbc->Query($sql_properties); 
    $room = $dbc->Fetch($sql_room);
    //echo "<br><br><br><br><br><br><br><br><br><br>".$room['tag_exp'].'----'.$id."<-------------------<br>";
    // check destination status
    $sql_destination_status = $dbc->Query("select status from destinations where id=".$room['destination']);
    $destination_status = $dbc->Fetch($sql_destination_status);
    if( $destination_status['status'] == 0 && $room['include_in_search'] == "" ) threeOone('/404.php');   
     
    // check subdestination status 
    $sql_subdestination_status = $dbc->Query("select status from destinations where id=".$room['subdestination']);
    $subdestination_status = $dbc->Fetch($sql_subdestination_status);
    if( $subdestination_status['status'] == 0 && $room['include_in_search'] == "" ) threeOone('/404.php'); 
    //if( $subdestination_status['status'] == 0 && ( $room['include_in_search'] == "" || $room['include_in_search'] == NULL) ) threeOone('/404.php'); 
       // echo "<br><br><br><br><br><br><br><br><br><br>".$room['tag']."<-------------------<br>";
function tag($id)
{
	global $dbc;
	if($id !='')
	{
		$sqltags = $dbc->Query("select * from tags where id=".$id);
		$tags = $dbc->GetRecord("tags","*","id=".$id);
	}
	else
	{
		$tags['name'] = '';
	}
	return '<button class="btn_tag">'.$tags['name'].'</button>';
}

if($dbc->HasRecord("metatag","property=".$room['id']))
{
	$meta = $dbc->GetRecord("metatag","*","property=".$room['id']);
}
$room['popup'];

?>
<?php //$url_link = "https://www.inspiringvillas.com/";?>
<?php //echo "------------".$url_link;?>
<?php /*?><link rel="icon" href="<?php echo $url_link;?>icon.jpg"> <?php */?>
<link rel="icon" href="<?php echo $url_link;?>favicon.icon" type="image/jpg" sizes="16x16">
<?php /*?><script src="<?php echo $url_link;?>libs/js/jquery.min.js"></script><?php */?>
<div class="paddtopup"></div>
<span itemscope itemtype="https://schema.org/Accommodation http://schema.org/Product">

<!--Google data structure-->
<meta itemprop="url" content="<?php echo $url_link.$url;?>">
<meta itemprop="sku" content="villa<?php echo $_REQUEST['id'];?>">
<meta itemprop="mpn" content="villa<?php echo $_REQUEST['id'];?>">
<!--Google data structure-->


 <?php 
 include "libs/pages/search_detail.php";
 include "libs/pages/dt_head.php";
 if( checkDestinationStatus($room['destination']) == 1 && checkSubdestinationStatus($room['subdestination']) == 1 ) include "libs/pages/dt_popup.php";
 $m_link = "/search-rent/".head_destination($room['destination'])."/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
 function head_destination($option)
{
	switch($option)
	{
		case "38" :
			return "thailand-phuket";//"phuket";
		break;
		case "39" :
			return "thailand-koh-samui";//"koh-samui";
		break;
		case "100" :
			return "indonesia-bali";//return "thailand-koh-samui";//"koh-samui";
		break;
		case "110" :
			return "sri-lanka-sr";//return "thailand-koh-samui";//"koh-samui";
		break;
		default:
			return "thailand";
	}
}
//echo $m_link.'-----';
 ?>
<style>
.mg-single-room-price .mg-srp-inner>span{display:block;margin-top:3px;font-size:19px;font-weight:300;position:relative}
</style>
<script>
$(document).ready(function(e) {
	var m_link = '<?php echo $m_link;?>';
    $(".aa_link").attr("href",m_link);
});
</script>



<?php /*?><div class="mg-single-room-price">
    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"  class="mg-srp-inner">
        <font size="-1">From</font>
        <br>
        <span itemprop="price" content="<?php echo $room['price'];?>">
        	<span itemprop="priceCurrency" content="USD">$</span><?php echo $room['price'];?>
        </span>
        <span>
        	/Night
        </span>
    </div>
</div><?php */?>

<?php /*?><h5 style="font-size: 0px;"><?php echo $meta['title'];?></h5><?php */?>
<div class="description" style="font-size: 0px;">Sleep up to <?php //echo base64_decode($meta['description'],true);?></div>
<div class="mg-single-room martop" >
    <div class="container">
        <div class="row">
        	<div class="col-12 n_bread">
			<?php display_breadcrumbs($room['destination'], $room['subdestination'], 'all-bedrooms', 'all-collections', 'all-prices', 'price|asc', ''); ?>
            </div>
    		
            <!--col-md-7-->
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 c7 enboxx mobtop"  data-spy="scroll" data-target=".newbar">
                
                <?php 
				
				include "libs/pages/dt_overview_v1.php";
				include "libs/pages/dt_heightlight.php";
				include "libs/pages/dt_vdo.php";
				include "libs/pages/dt_bedroom_configuration.php";
				include "libs/pages/dt_bedroom_photo.php";
				include "libs/pages/dt_question.php";
				include "libs/pages/dt_travel_time.php";
				include "libs/pages/dt_what_is_included.php";
				include "libs/pages/dt_price_table.php";
				include "libs/pages/dt_availability.php";//----06-11-63
				include "libs/pages/dt_floor_plan.php";
				include "libs/pages/dt_bedroom.php";
				include "libs/pages/dt_facilities.php";
                include "libs/pages/dt_review.php";
				
				include "libs/pages/dt_user_review.php";
				//include "libs/pages/dt_why_book_with.php";
				include 'libs/pages/dt_recently.php';
				include 'libs/pages/dt_recently_mobile.php';
                ?>
            </div>
        	<!--col-md-7-->
            
            <!--col-md-5--><br>
            <div  class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 c5 nopad">
				<?php include "libs/pages/dt_enquire.php";?>                  
            </div>
            <!--col-md-5-->
            
        </div>
    </div>
</div>
</span>
<?php include "libs/pages/dt_enquire_mobile.php";?>  

<?php /*?><div class="container">
	<?php include 'libs/pages/dt_recently.php';?>
</div>	<?php */?>
<?php 
include "libs/pages/dt_footer.php";

?>

<!-- Modal -->
<?php /*?><div class="modal fade" id="myModal_floor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Floor Plan</h4>
      </div>
      <div class="modal-body">
        <img class="c_floorpaln" width="100%">
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div><?php */?>
<!-- Modal -->

<div class="bgbox"></div>
<div class="boxcon">
    <center>
        <i class="fa fa-check" aria-hidden="true"></i><br>
        <div class="titlebo">Success full</div>
    </center>
</div>
<?php //echo '------'.$va;?>
<script>
$(document).ready(function(e) {
    $('.carousel').carousel({
	  interval: 3000
	})
});

$(document).ready(function(e) {
    var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	 
	var checkin = $('#checkin').datepicker({
	  onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.setValue(newDate);
	  }
	  checkin.hide();
	  $('#checkout')[0].focus();
	}).data('datepicker');
	var checkout = $('#checkout').datepicker({
	  onRender: function(date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  checkout.hide();
	}).data('datepicker');
	
	$(".calenin").click(function(e) {
        $('#checkin').focus();
    });
	
	$(".calenout").click(function(e) {
        $('#checkout').focus();
    });
	
	$(".cin").click(function(e) {
        $('#checkin_mo').focus();
    });
	
	$(".cout").click(function(e) {
        $('#checkout_mo').focus();
    });
});

function popemail()
{
	$("#myModal_email").modal('show');
}

function lower_text(str)
{
	var text = $(str).val();
	var res = text.toLowerCase();
	$(str).val(res);
}
</script>
<?php /*?><script>
function visitto(posi)
{
	$('html,body').animate({ 
		scrollTop: $("#"+posi+"").offset().top-200
	}, 1000);
}

$(document).ready(function(e) {
	 $('.btt').tooltip();
});

</script><?php */?>

<?php /*?><script>
function visitto(posi)
{
        $('html,body').animate({ 
			scrollTop: $("."+posi+"").offset().top-103
		}, 1000);
}
</script><?php */?>

<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> 
<script>
function onShare(idp,title,desc,image)
{
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1684480814898909',
      xfbml      : true,
      version    : 'v3.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  		FB.ui({
 			  method: 'feed',
			  name: title,
			  link: 'https://www.inspiringvillas.com/<?php echo $room['ht_link'].'.html';?>',
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'https://www.inspiringvillas.com'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2&appId=1684480814898909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php /*?>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> 
<script>
function onShare(idp,title,desc,image)
{
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1684480814898909',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  		FB.ui({
 			  method: 'feed',
			  name: title,
			  link: '<?php echo $url_link;?>'+idp,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'<?php echo $url_link;?>'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=1684480814898909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>     <?php */?> 


