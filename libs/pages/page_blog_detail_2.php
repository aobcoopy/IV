<script>
var hash_block = window.location.hash;
//alert(hash_block);
if(hash_block!='')
{
	var x_block = document.createElement("META");
	x_block.setAttribute("name", "robots");
	x_block.setAttribute("content", "noindex");
	document.head.appendChild(x_block);
}

/*if(hash_block=='block_preview')
{
	alert(hash_block);
	var x_block = document.createElement("META");
	x_block.setAttribute("name", "robots");
	x_block.setAttribute("content", "noindex");
	document.head.appendChild(x_block);
}
else
{
}*/
</script>
<?php 
//echo $_REQUEST['id'];
//$blogs = $dbc->GetRecord("blogs","*","id=".$_REQUEST['id']);
$sqlblogs = $dbc->Query("select * from blogs where id='".$_REQUEST['id']."'");
$blogs = $dbc->Fetch($sqlblogs);
$photo = json_decode($blogs['photo'],true);
//$user = $dbc->GetRecord("users","*","id=".$blogs['users']);
/*$sqluser = $dbc->Query("select * from users where id=".$blogs['users']);
$user = $dbc->Fetch($sqluser);*/
?>
<?php 
//$cover = $dbc->GetRecord("cover","*","page='blog' AND status > 0");
/*$sqlcover = $dbc->Query("select * from cover where page='blog' AND status > 0");
$cover = $dbc->Fetch($sqlcover);
$photo_cover = json_decode($cover['photo'],true);*/
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
    /*color: #fff;
    text-align: center;
    height: 600px;
     background: red; */
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

@media screen and (max-width: 663px)
{
.motop {
    margin-top: 70px !important;
}
}
@media screen and (max-width: 992px) and (min-width: 663px){
.motop {
    margin-top: 69px !important;
}
}
@media screen and (max-width: 992px){
	.lifeStyle_box
	{
		position: -webkit-relative; /* Safari */
		position: relative;
	}
}
@media screen and (min-width: 992px){
.motop {
    margin-top: 75px !important;
}
	.lifeStyle_box
	{
		position: -webkit-sticky; /* Safari */
		position: sticky;
	}
}
.lifeStyle_box
{
	top: 67px;
}

</style>

<link href="<?php echo $url_link;?>libs/css/blog_style_v2.css" rel="stylesheet" type="text/css">
<script src="<?php echo $url_link;?>libs/js/sticky.js"></script>
<script src="<?php echo $url_link;?>libs/js/lazyload.min.js"></script>

<script>
$(document).ready(function(e) {
	$(".lazy").lazyload();
	var hash = window.location.hash;
	//alert(hash);
	if(hash=='#block_preview')
	{
		
	}
	else
	{
		$(".carousel_blog_mob,.lifeStyle_box,.follw,.covfootb").addClass('hidden');
		
	}
	$(window).resize(function(){
        //$("span").text(x =  $(window).width());
		if($(window).width()<976)
		{
			setTimeout(function(){
				$(".eb_right").css({"height":"auto"});
			},1000);
		}
		else
		{
			setTimeout(function(){
				sticky();
			},1000);
		}
    });
	if($(window).width()<976)
	{
		setTimeout(function(){
			$(".eb_right").css({"height":"auto"});
		},1000);
	}
	else
	{
		setTimeout(function(){
			sticky();
		},1000);
	}
/*	setTimeout(function(){
		sticky();
	},1000);
*/});
function sticky()
{
	var sidebar = document.getElementById('lifeStyle_box');
	Stickyfill.add(sidebar);
	//setTimeout(function(){
		var eb_left = $(".eb_left").height();
		$(".eb_right").css({"height":eb_left-750+"px"});
		//alert(eb+'---'+$(".cenb").height());
	//},2000);
}
</script>

<div class="motop"></div>

<?php include "libs/pages/search.php";?>
<?php 
if($_REQUEST['id']=='7')
{
	$Urllink = "http://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html";
}
else
{
	$id = $_REQUEST['id'];
	$Urllink = "http://www.inspiringvillas.com/Lifestyle-".$id.".html";
}

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


  
  
<div class="mg-blog-list">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-12  l_boxb eb_left">
                <main>

                    <article class="mg-post">
                        <header>
                            <a href="#"><img src="<?php echo imagePath($photo[0]);?>" alt="<?php echo $blogs['name'];?>" class="img-responsive" width="100%"></a>
                            <!--<a href="#"><img src="<?php //echo imagePath($photo[0]);?>" alt="<?php echo $blogs['name'];?>" class="img-responsive" width="100%"></a>-->
                            <h1 class="mg-post-title top20"><?php echo $blogs['name'];?></h1>
                            <div class="mg-post-meta">
                                <span><a href="#"><?php echo dateType($blogs['day']);?></a></span>
                                <span>by <a href="#"><?php echo $blogs['byname'];?></a></span>
                                <!--<span><a href="#">Room</a>, <a href="#">Delux</a></span>
                                <span><a href="#">3 Comments</a></span>-->
                                <?php $brie = base64_decode($blogs['brief'],true);?>
                                <div class="webb">
                                	 <ul class="mg-footer-social btnn pull-right">
                                        <li data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo[0]);?>');"><a ><i class="fa fa-facebook tw"></i></a></li>
                                        <li data-toggle="modal" data-target="#myModal"   data-placement="bottom" title="Send Email"><a ><i class="fa fa-pinterest tw"></i></a></li>
                                    </ul>
                                    
                                    
                                    <?php /*?><button class="btn btn-main pull-right email" data-toggle="modal" data-target="#myModal" title="Send Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
                                    <button class="btn btn-main pull-right " data-toggle="tooltip" data-placement="bottom" title="Share" onclick="gPlus('<?php echo urlencode($link);?>');"><i class="fa fa-google-plus" aria-hidden="true"></i></button>
                                    <button class="btn btn-main pull-right fb" data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo $blogs['id'];?>','<?php echo $blogs['name'];?>','<?php echo base64_decode($blogs['brief'],true);?>','<?php echo $photo[0];?>');"><i class="fa fa-facebook" aria-hidden="true"></i></button><?php */?>
                                    
                                    
                                </div>
                                <div class="mob">
                                <ul class="mg-footer-social btnn pull-right">
                                        <li data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo $blogs['id'];?>','<?php echo $blogs['name'];?>','<?php echo base64_decode($blogs['brief'],true);?>','<?php echo $photo[0];?>');"><a ><i class="fa fa-facebook tw"></i></a></li>
                                        <li data-toggle="modal" data-target="#myModal"   data-placement="bottom" title="Send Email"><a ><i class="fa fa-pinterest tw"></i></a></li>
                                    </ul>
                                    <br>
                                	<?php /*?><button class="btn btn-main  fb" data-toggle="tooltip" data-placement="bottom" title="Share" onClick="onShare('<?php echo $blogs['id'];?>','<?php echo $blogs['name'];?>','<?php echo base64_decode($blogs['brief'],true);?>','<?php echo $photo[0];?>');"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                                    
                                    <button class="btn btn-main  " data-toggle="tooltip" data-placement="bottom" title="Share" onclick="gPlus('<?php echo urlencode($link);?>');"><i class="fa fa-google-plus" aria-hidden="true"></i></button>
                                    <button class="btn btn-main  email" data-toggle="modal" data-target="#myModal" title="Send Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></button><?php */?>
                                </div>                            
                            </div>
                        </header>
                        <div>
                            <?php echo base64_decode($blogs['detail'],true);?>
                        </div>
                        <!--<footer class="clearfix">
                            <div class="mg-single-post-tags tagcloud">
                                <a href="#" rel="tag">rooms</a>
                                <a href="#" rel="tag">video</a>
                                <a href="#" rel="tag">image</a>
                            </div>
                        </footer>-->
                    </article>
                </main>
                <!--<div class="clearfix mg-post-nav">
                    <div class="pull-left">
                        <a href="#"><i class="fa fa-angle-left"></i> Necesse directam consecutionem</a>
                    </div>
                    <div class="pull-right">
                        <a href="#">Disciplinae principes tertium parentes <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>-->
                
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 eb_right">
                <div class="mg-widget-area">
                    
                    <aside class="mg-widget">
                        <h2 class="mg-widget-title">Recent Posts</h2>
                        <ul class="mg-recnt-posts">
                            <?php
						$sql_rec = $dbc->Query("select * from blogs where status > 0 order by sort asc limit 0,3");
						while($line = $dbc->Fetch($sql_rec))
						{
							$rid1 = $line['id'];
                            
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
                            
/*							if($line['id']==7)
							{
								$urll = "/blog/the-10-best-phuket-luxury-villas.html";
							}
							else
							{
								$urll = "/Lifestyle-".$rid1.".html";
							}*/
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
                   
                </div>
                
                        <div id="lifeStyle_box" class="lifeStyle_box col-sm-12- web992 nopad ">
                        	<?php
                            $sql_vs_2 = $dbc->Query("select * from blogs WHERE `status` = 1 AND lifestyle  > 0 order by sort asc limit 0,2");
                            $x=1;
                            $total_lifestyle = $dbc->Getnum($sql_vs_2);
							$arrow = 0;
                            while($row = $dbc->Fetch($sql_vs_2))
                            {
                                $photo = json_decode($row['photo'],true);
                                //$user = $dbc->GetRecord("users","*","id=".$row['users']);
                                $sqluser = $dbc->Query("select * from users where id=".$row['users']);
                                $user = $dbc->Fetch($sqluser);
                                    $rid1 = $row['id'];
                                    
									$tx_brief = base64_decode($row['brief'],true);
									$photo[0] = '../upload/p.jpg';
									
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
                                    echo '<div class="col-sm-12 col-md-12 nopad top20 t_t22 fo_box_2">';
										echo '<div class="col-sm-12 nopad in_side_box">';
											echo '<a href="'.$urll.'">';
											
											echo '<img class="lazy" data-src="https://www.inspiringvillas.com/upload/p.jpg" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
												//echo '<img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
												//echo '<img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
												echo '<div class="over_photo">'.$dbc->string_len($tx_brief,90).'</div>';
											echo '</a>';
											//echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
											echo '<div class="col-sm-12  in_side_pad">';
												echo '<h2 class="nb-title fo_title_2 top20 text-left"><a href="'.$urll.'" rel="bookmark">'.$dbc->string_len($row['name'],66).'</a></h2>';
												echo '<a href="'.$urll.'" ><div class="a_readmore">READ MORE</div></a>';
											echo '</div>';
                                   		echo '</div>';
									echo '</div>';
                               
								//if($x%3==0)
//								{
//									if($x!=$total_lifestyle)
//									{
//										//echo '</div><div class="item">';
//										$arrow = 1;
//									}
//								}
								 $x++;
                            }
                            ?>
						</div>
                        
                        <div id="carousel_blog_mob" class="carousel slide carousel_blog_mob " data-ride="carousel">
                        <!-- Indicators -->
                        <!--<ol class="carousel-indicators">
                            <li data-target="#carousel_blog_mob" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_blog_mob" data-slide-to="1"></li>
                            <li data-target="#carousel_blog_mob" data-slide-to="2"></li>
                        </ol>-->
                        
                        <!-- Wrapper for slides -->
                         <div class="carousel-inner mob992" role="listbox">
                        
                                <?php
                            $sql_vs_2 = $dbc->Query("select * from blogs WHERE `status` = 1 AND lifestyle  > 0 order by sort asc ");
                            $x=1;
                            $total_lifestyle = $dbc->Getnum($sql_vs_2);
							$arrow = 0;
                            while($row = $dbc->Fetch($sql_vs_2))
                            {
                                $photo = json_decode($row['photo'],true);
                                //$user = $dbc->GetRecord("users","*","id=".$row['users']);
                                $sqluser = $dbc->Query("select * from users where id=".$row['users']);
                                $user = $dbc->Fetch($sqluser);
                                    $rid1 = $row['id'];
                                    $act = ($x==1)?'active':'';
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
									
									$tx_brief = base64_decode($row['brief'],true);
									$photo[0] = '../upload/p.jpg';
									
									echo '<div class="item '.$act.'">';
										echo '<div class="col-sm-12 nopad t_t22 fo_box_2">';
											echo '<div class="col-sm-12 nopad in_side_box">';
												echo '<a href="'.$urll.'">';
												
												echo '<img class="lazy" data-src="https://www.inspiringvillas.com/upload/p.jpg" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
												//echo '<img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
													//echo '<img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
													echo '<div class="over_photo">'.$dbc->string_len($tx_brief,80).'</div>';
												echo '</a>';
												//echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
												echo '<div class="col-sm-12  in_side_pad">';
													echo '<h2 class="nb-title fo_title_2 top20 text-left"><a href="'.$urll.'" rel="bookmark">'.$dbc->string_len($row['name'],66).'</a></h2>';
													echo '<a href="'.$urll.'" ><div class="a_readmore">READ MORE</div></a>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
                               
								/*if($x%3==0)
								{
									
								}*/
								if($total_lifestyle>1)
								{
									$arrow = 1;
								}
								 $x++;
                            }
                            ?>
                        </div>
                        
                       
                        
                        <!-- Controls -->
                        <?php 
						if($arrow == 1)
						{
                        echo '<a class="left carousel-control" href="#carousel_blog_mob" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#carousel_blog_mob" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';
						}
						?>
    
                    </div>
                    
            </div>
        </div>
    </div>
</div>

<div class="follw">FOLLOW US <a href="https://www.instagram.com/inspiringvillas/" target="_blank" style="color:unset;">@INSPIRINGVILLAS</a></div>
<div class="covfootb">
<?php include "embed_ig_photo.php";?>
</div>

<script>
$(document).ready(function(e) {
   /* setTimeout(function(){
		var l_boxb = $(".l_boxb").height();	
		l_boxb=900;
		//alert(l_boxb);
		$(".lifeStyle_box").css({"height": l_boxb+"px","background":"green"});
	},1000);*/
});
</script>

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
<!--<script src="libs/js/jquery-3.1.1.min.js"></script>-->
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
                

<!--<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> -->
<script>
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

<?php 
function imagePP($url,$pos='')
{
	//echo $url;
	if($pos!='')
	{
		return $url;
	}
	else
	{
		if(strrchr($url,'https://127.0.0.1/'))
		{
			//echo 'yes';
			$lin = explode("upload",$url);
			return substr_replace('https://127.0.0.1/','https://media.inspiringvillas.com/prd/',$url).'upload'.$lin[1];
		}
		else
		{
			//echo 'noooooooooooooo';
			return  "https://media.inspiringvillas.com/prd".$url;
	//		echo $url;
		}
	}
	
}



?>



<?php /*?><script>

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
			  link: mlink,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'http://www.inspiringvillas.com/'+image,
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
}(document, 'script', 'facebook-jssdk'));</script>      <?php */?>