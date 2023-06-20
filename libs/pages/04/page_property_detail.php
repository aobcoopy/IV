<?php
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
$sql_room = $dbc->Query("select * from properties where id=".$id);//.$_REQUEST['id']);
$room = $dbc->Fetch($sql_room);//.$_REQUEST['id']);
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
 <?php 
 include "libs/pages/search_detail.php";
 include "libs/pages/dt_head.php";
 include "libs/pages/dt_popup.php";
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
		default:
			return "thailand";
	}
}
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


<span itemscope itemtype="http://schema.org/Product">
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
	
    		<!--col-md-7-->
			<div class="col-md-8 c7 enboxx mobtop"  data-spy="scroll" data-target=".newbar">
                
                <?php 
				include "libs/pages/dt_overview.php";
                include "libs/pages/dt_detail.php";
				include "libs/pages/dt_bedroom_configuration.php";
				include "libs/pages/dt_bedroom_photo.php";
				include "libs/pages/dt_bedroom.php";
				include "libs/pages/dt_travel_time.php";
				include "libs/pages/dt_what_is_included.php";
				?>
                                           
				<div class=" mg-contact-form-input rates_box">
					<?php
                    function months($data)
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
                        return  $d.'-'.$month .'-'.$y;
                    }
                    if($dbc->HasRecord("pricing","property=".$_REQUEST['id']))
                    {
                        $pri = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
                    }
                        ?>
                </div>
                
				<?php 
				 
				 include "libs/pages/dt_question.php";
                 include "libs/pages/dt_price_table.php";
                 
                 include "libs/pages/dt_vdo.php";
                 include "libs/pages/dt_review.php";
                 include 'libs/pages/dt_recently_mobile.php';?>

            </div>
        	<!--col-md-7-->
            
            <!--col-md-5--><br>
            <div  class="col-md-4 c5 nopad">
				<?php include "libs/pages/dt_enquire.php";?>                  
            </div>
            <!--col-md-5-->
            
        </div>
    </div>
</div>
</span>
<?php include "libs/pages/dt_enquire_mobile.php";?>  

<div class="modal fade " id="myModal_floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md mfloor" role="document"  data-scroll-scope="force" >
    <div class="modal-content cont">
      <div class="modal-header modal-h">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Floor Plan</h4>
      </div>
      <div class="modal-body">
		  <img class="c_floorpaln" width="100%">
	  </div>
    </div>
  </div>
</div>
<?php include "libs/pages/dt_footer.php";?>
<?php include "libs/pages/dt_map.php";?> 
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
<?php /*?><div class="modal fade" id="myModal_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_sendblog">
      	<input type="hidden" class="form-control" id="tx_id" name="tx_id" value="<?php echo $room['id'];?>">
        <input type="hidden" class="form-control" id="tx_name" name="tx_name" value="<?php echo $room['name'];?>">
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-s->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php *s/s?s>
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="email" class="form-control" id="txemail_p" name="txemail_p" placeholder="E-mail">
        </div>
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="subject">Phone</label>-->
            <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
        </div>
        <div class="mg-contact-form-input">
            <!--<label for="subject">Message</label>-->
            <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
        </div><?php *s/?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail_p()">Send</button>
      </div>
    </div>
  </div>
</div>

<div class="bgbox"></div>
<div class="boxcon">
    <center>
        <i class="fa fa-check" aria-hidden="true"></i><br>
        <div class="titlebo">Success full</div>
    </center>
</div><?php */?>
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


<?php /*?><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
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
			  link: '<?php echo $url_link;?>?page=propertydetail&id='+idp,
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
</script>      
<?php */?>
     
