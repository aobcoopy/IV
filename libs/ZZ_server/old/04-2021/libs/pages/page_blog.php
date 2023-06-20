<?php //require_once "libs/pages/base_mini_cover.php";?>
<?php 
//$cover = $dbc->GetRecord("cover","*","page='blog' AND status > 0");
$sqlcover = $dbc->Query("select * from cover where page='blog' AND status > 0");
$cover = $dbc->Fetch($sqlcover);
$photo_cover = json_decode($cover['photo'],true);
if( $photo_cover != "") $photo_cover = imagePath($photo_cover);


function string_len_2b($text,$amount)
{
	if(strlen($text)>$amount)
	{
		return substr($text,0,$amount).'...';
	}
	else
	{
		return $text;
	}
}
?>
<style>
@media screen and (max-width:663px)
{
	.mg-book-now 
	{
		margin-top:48px;
	}
}
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
    /* background-position: 0% !important; **-/
    color: #fff;
    text-align: center;
    height: 600px;
     background: red; */
}
.mg-blog-list {
    padding: 20px 0 100px;
}
.mg-widget {
	background-color: #f5f5f5;
	padding: 30px;
	margin-bottom: 30px;
	color: #9F9F9F;
}
.mg-widget .mg-widget-title {
	color: #112845
}
.mg-widget .mg-recnt-posts .mg-recnt-post .mg-rp-date {
	color: #d3a267;
	font-family:  pr;
}
.mg-widget ul li a {
	font-size: 16px;
	line-height: 26px;
	color: #112845;
}
.mg-widget ul li {
	font-family: "Playfair Display", serif;
	padding: 10px 0;
	border-bottom: 1px solid rgb(232, 232, 232);
}
.mg-post {
    padding-right: 0px;
    margin-bottom: 60px;
}
@media screen and (max-width: 663px)
{
.motop {
    margin-top: 70px;
}
}
</style>
<?php /*?><div class="mg-page-titles "><!--parallax-->
    <div class="container-fluid nopad">
            <img src="<?php echo imagePath($photo_cover);?>" alt="" width="100%" class="motop">
        
    </div>
</div><?php */?>
<!--<div class="mg-page-title mobi"></div>-->
<div class="motop"></div>
<?php include "libs/pages/search.php";?>

<div class="mg-blog-list">
    <div class="container">
        <div class="row">
        <?php /*?>	<center><h2 style="margin-top: -25px;">Inspiring Lifestyle</h2>
                    <!--<p>These best rooms chosen by our customers</p>-->
                
               <!-- <h4 style="font-family: pt !important;">The Lifestyle blog for the world's luxury travel community  </h4>--></center><br><?php */?>
                
        	<div class="col-md-12"><br>
            	<center><h1 class=" contitle blw hidden-xs ">Inspiring Experiences<?php /*?>Blog & Lifestyle - Unique Villa Holiday Experiences in Koh Samui & Phuket<?php */?></h1></center>
                        <h2 class="f16 text-center btop1" style="    font-family: pt !important;">Blog & Life Style</h2><br>
                <!--<h2 class="mg-widget-title f25">Blog & Life Style </h2>
                <h2 class="f16 text-left" style="    font-family: pt !important;">Blog & Life Style</h2><br>-->
                <!--<p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>-->
            </div>
            <div class="col-md-8">
                <main>
                    <!--<article class="mg-post">
                        <header>
                            <h2 class="mg-post-title"><a href="blog-single.html" rel="bookmark">A standard blog post without image</a></h2>
                            <div class="mg-post-meta">
                                <span><a href="#">27 Jan, 2015</a></span>
                                <span>by <a href="#">Admin</a></span>
                                <span><a href="#">Room</a>, <a href="#">Delux</a></span>
                                <span><a href="#">3 Comments</a></span>
                            </div>
                        </header>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspicor magnitudinem venisset attento delectus ennii cursu constituamus, amarissimam infantes susciperet metrodorus, legimus videbitur. Electram optinere. Opibus innumerabiles appellat dediti nutu fuisset semper corpora perveniri aptissimum. Quem nonne cuiquam commune metrodorus quaeque umquam meminerimus maiorum stulti. Orestem tempus, debet habent percurri ponti quaeri aptior tradere, ennii solvantur dixerit veniam iisque, concederetur optari improborum, vide honesto. Opibus disputari permagna amet inter vitae patriam expleantur caelo angere, doctus attento videamus fecerit democritus triario porro.</p>
                        </div>
                        <footer class="clearfix">
                            <a href="#" class="mg-read-more">Continue Reading <i class="fa fa-long-arrow-right"></i></a>
                        </footer>
                    </article>-->
                    <?php 
					$sql = $dbc->Query("select * from blogs where status > 0 order by sort asc");
					while($row = $dbc->Fetch($sql))
					{
						$photo = json_decode($row['photo'],true);
						//$user = $dbc->GetRecord("users","*","id=".$row['users']);
						$sqluser = $dbc->Query("select * from users where id=".$row['users']);
						$user = $dbc->Fetch($sqluser);
						echo '<article class="mg-post">';
							echo '<header>';
							$rid1 = $row['id'];
                            
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
                            
/*                            if($row['id']==7)
                            {
                                $urll = "/blog/the-10-best-phuket-luxury-villas.html";
                            }
							else
							{
								$urll = "/Lifestyle-".$rid1.".html";
							} */
								echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
								echo '<h2 class="mg-post-title"><a href="'.$urll.'" rel="bookmark">'.$row['name'].'</a></h2>';
								echo '<div class="mg-post-meta">';
									echo '<span><a href="#">'.dateType($row['day']).'</a></span>';
									echo '<span>by <a >'.$row['byname'].'</a></span>';
									
									?>
                                    
                                    <?php /*?><ul class="mg-footer-social btnn pull-right">
                                        <li data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo[0]);?>');" ><a ><i class="fa fa-facebook tw"></i></a></li><?php /*?>onClick="onShare('<?php echo $row['id'];?>','<?php echo $row['name'];?>','<?php echo base64_decode($row['brief'],true);?>','<?php echo imagePath($photo[0]);?>');"<?php *-/?>
                                        <li data-toggle="modal" data-target="#myModal"   data-placement="bottom" title="Send Email"><a ><i class="fa fa-pinterest tw"></i></a></li>
                                    </ul><?php */?>
                        <br>
                        
                                    <?php /*?><button class="btn btn-main pull-right email bttn" data-toggle="modal" data-target="#myModal" title="Send Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
                                <button class="btn btn-main pull-right bttn" data-toggle="tooltip" data-placement="bottom" title="Share" onclick="gPlus('<?php echo urlencode($link);?>');"><i class="fa fa-google-plus" aria-hidden="true"></i></button>
                                
                                <button class="btn btn-main pull-right fb bttn" data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo $row['id'];?>','<?php echo $row['name'];?>','<?php echo base64_decode($row['brief'],true);?>','<?php echo $photo[0];?>');"><i class="fa fa-facebook" aria-hidden="true"></i></button><?php */?><?php
									//echo '<!--<span><a href="#">Room</a>, <a href="#">Delux</a></span>';
									//echo '<span><a href="#">3 Comments</a></span>-->';
								echo '</div>';
							echo '</header>';
							echo '<div>';
								echo '<p>'.base64_decode($row['brief'],true).'</p>';
							echo '</div>';
							echo '<footer class="clearfix">';
								echo '<a href="'.$urll.'" class="btnnl" style="color:#000;">Continue Reading </a>';//<i class="fa fa-long-arrow-right"></i>
							echo '</footer>';
						echo '</article>';
					}
					?>
                </main>
            </div>
            <div class="col-md-4">
                <div class="mg-widget-area">
                    <!--<aside class="mg-widget">
                        <input type="text" placeholder="Search..." class="form-control">
                    </aside>-->
                    <aside class="mg-widget">
                        <h2 class="mg-widget-title">Recent Blog</h2>
                        <ul class="mg-recnt-posts">
                        <?php
						$sql_rec = $dbc->Query("select * from blogs where status > 0 order by sort asc limit 0,3");
						while($line = $dbc->Fetch($sql_rec))
						{
							$rid = $line['id'];
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
                            
/*							if($line['id']==7)
							{
								$urll = "/blog/the-10-best-phuket-luxury-villas.html";
							}                        
							else
							{
								$urll = "/Lifestyle-".$rid.".html";
							} */
							echo '<li>';
                                echo '<div class="mg-recnt-post">';
                                    echo '<div class="mg-rp-date">'.day($line['day']).'<div class="mg-rp-month">'.month($line['day']).'</div></div>';
                                    echo '<h3><a href="'.$urll.'">'.$line['name'].'</a></h3>';
                                    echo '<p>'.string_len(base64_decode($line['brief'],true),100).'</p>';
                                echo '</div>';
                            echo '</li>';
						}
						?>
                            
                            
                            
                        </ul>
                    </aside>
                   <?php /*?> <aside class="mg-widget">
                        <h2 class="mg-widget-title">Category</h2>
                        <ul>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Rooms</a></li>
                            <li><a href="#">Promotion</a></li>
                            <li><a href="#">Events</a></li>
                        </ul>
                    </aside>
                    <aside class="mg-widget">
                        <h2 class="mg-widget-title">Tags</h2>
                        <div class="tagcloud">
                            <a href="#">Rooms</a>
                            <a href="#">Events</a>
                            <a href="#">Promotion</a>
                            <a href="#">Audio</a>
                            <a href="#">Video</a>
                            <a href="#">Gallery</a>
                            <a href="#">New</a>
                            <a href="#">Travel</a>
                        </div>
                    </aside><?php */?>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_sendblog">
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php */?>
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="text" class="form-control" id="txemail" name="txemail" placeholder="E-mail">
        </div>
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="subject">Phone</label>-->
            <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
        </div>
        <div class="mg-contact-form-input">
            <!--<label for="subject">Message</label>-->
            <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
        </div><?php */?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail()">Sent</button>
      </div>
    </div>
  </div>
</div>




<script src="libs/js/jquery-3.1.1.min.js"></script>
<script>

function sendemail()
{
	if($("#txemail").val()=='')
	{
		alert("Please fill your data");
		$("#txemail").focus();
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("txemail").value.match(Email))
		{
		   alert('Email format is not valid');
		   document.getElementById("txemail").focus();
		   return false;
		}
		else
		{
			$.ajax({
				url:"libs/actions/action-send-email.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_sendblog").serialize(),
				success: function(res){
					if(res.status==true)
					{
						alert(res.msg);
						window.location.reload();
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		}
	}
}
</script>
 <script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});

$(document).ready(function(e) {
	 $('[data-toggle="tooltip"]').tooltip();
});
</script>           

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
			  link: idp,
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

var mlink  = "<?php echo $Urllink;?>";
</script>






<!--google-->
<script>
function gPlus(url){
    window.open(
        'https://plus.google.com/share?url='+url,
        'popupwindow',
        'scrollbars=yes,width=800,height=600'
    ).focus();
    return false;
}
</script>

<!--google-->