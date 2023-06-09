<?php //require_once "libs/pages/base_mini_cover.php";?>
<?php 
////$cover = $dbc->GetRecord("cover","*","page='blog' AND status > 0");
//$sqlcover = $dbc->Query("select * from cover where page='blog' AND status > 0");
//$cover = $dbc->Fetch($sqlcover);
//$photo_cover = json_decode($cover['photo'],true);
//if( $photo_cover != "") $photo_cover = imagePath($photo_cover);//imageP($photo_cover);//imagePath($photo_cover);


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
   /* background-image: url(<?php //echo $photo_cover;?>);*/
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
@media screen and (min-width: 992px){
.motop {
    margin-top: 75px !important;
}
}
</style>
<link href="libs/css/blog_style_v2.css" rel="stylesheet" type="text/css">
<div class="motop"></div>
<?php include "libs/pages/search.php";?>

<div class="mg-blog-list">
    <div class="container">
        <div class="row">
                
        	<div class="col-md-12 top30"><br>
            	<center><h1 class=" top30 contitle- blw-  ">Inspiring Experiences</h1></center>
                        <h2 class="f16 text-center btop1" style="    font-family: pt !important;">Blog & Life Style</h2><br>

            </div>
            
            <section class="top30">
            <?php
			$height = $dbc->Query("SELECT * FROM blogs WHERE status = 1 AND (heightlight IS NOT NULL AND heightlight > 0)  ORDER BY sort ASC ");
			$y=0;
			while($row_hl = $dbc->Fetch($height))
			{
				$photo = json_decode($row_hl['photo'],true);
				$tx_brief = $row_hl['name'];
				$urll = "/blog/" . strtolower(str_replace(" ", "-", $row_hl['name']) ) . ".html#testblog";
				
				$photo[0] = 'upload/p.jpg';
				
				if($y==0)
				{
					echo '<div class="col-md-7 t_t1222 top30" style="margin-bottom: 20px;">';
						echo '<div class="col-md-12 nopad">';
						echo '<a href="'.$urll.'">';
							echo '<div class="Cov_left cov_hl">';
								echo '<div class="overlay_hl">';
									echo '<div class="inside_overlay_hl">';
										echo '<div class="arti_text">ACTIVITIES</div>';
										echo $dbc->string_len($tx_brief,60);
										echo '<br><button class="hl_but">VIEW POST</button>';
									echo '</div>';
								echo '</div>';
								//echo '<img class="lazy img-responsives img_left" data-src="'.imagePath($photo[0]).'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
								echo '<img class="lazy img-responsives img_left" data-src="'.imageP($photo[0],'loacl').'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
							echo '</div>';
						echo '</a>';
						echo '</div>';
					echo '</div>';
				}
				else
				{
					echo '<div class="col-md-5 t_t222 top30">';
						echo '<div class="col-md-12 nopad">';
						echo '<a href="'.$urll.'">';
							echo '<div class="Cov_right cov_hl">';
								echo '<div class="overlay_hl">';
									echo '<div class="inside_overlay_hl inside_ovl_pad">';
										echo '<div class="arti_text">ACTIVITIES</div>';
										echo $dbc->string_len($tx_brief,60);
										echo '<br><button class="hl_but">VIEW POST</button>';
									echo '</div>';
								echo '</div>';
								//echo '<img class="lazy img-responsives img_right" data-src="'.imagePath($photo[0]).'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
								echo '<img class="lazy img-responsives img_right" data-src="'.imageP($photo[0],'loacl').'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
							echo '</div>';
						echo '</a>';
						echo '</div>';
					echo '</div>';
				}
				$y++;
				
                
				
			}
			?>
            
                
            </section>
            
            <section>
            	<div class="col-md-12">
               	  <div class="tb_head text-center">Villa Stories</div>
                </div>
                
                <div class="col-md-6 t_t11">
                <?php
					$sql_vs = $dbc->Query("select * from blogs WHERE `status` = 1 AND (heightlight IS NULL OR heightlight !=1) AND (lifestyle IS NULL OR lifestyle !=1) order by sort asc limit 0,1");
					
					while($row = $dbc->Fetch($sql_vs))
					{
						$photo = json_decode($row['photo'],true);
						//$user = $dbc->GetRecord("users","*","id=".$row['users']);
						$sqluser = $dbc->Query("select * from users where id=".$row['users']);
						$user = $dbc->Fetch($sqluser);
							//echo '<header>';
							$rid1 = $row['id'];
                            $tx_grief = base64_decode($row['brief'],true);
							$photo[0] = 'upload/p.jpg';
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html#testblog";
							
							echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
							//echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
							echo '<h2 class="nb-title top20 text-center"><a href="'.$urll.'" rel="bookmark">'.$row['name'].'</a></h2>';
							echo '<div class="un_line"></div>';
							echo '<p class="text-center"><a href="#" class="text-center tgl">'.dateType($row['day']).'</a> by <a class="tb" >'.$row['byname'].'</a></p>';
							echo '<p class="text-center">'.$dbc->string_len($tx_grief,100).'</p>';
					}
					?>
                </div>
                
                <div class="col-md-6 t_t22 nopad">
                	<div class="col-xs-12 nopad">
						<?php
                            $sql_vs_2 = $dbc->Query("select * from blogs WHERE `status` = 1 AND (heightlight IS NULL OR heightlight !=1) AND (lifestyle IS NULL OR lifestyle !=1) order by sort asc limit 1,4");
                            $z=1;
                            
                            while($row = $dbc->Fetch($sql_vs_2))
                            {
                                $photo = json_decode($row['photo'],true);
                                //$user = $dbc->GetRecord("users","*","id=".$row['users']);
                                $sqluser = $dbc->Query("select * from users where id=".$row['users']);
                                $user = $dbc->Fetch($sqluser);
                                    $rid1 = $row['id'];
									
                                    $photo[0] = 'upload/p.jpg';
									
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html#testblog";
									
                                    echo '<div class="col-sm-6 col-md-6 t_t22 fo_box">';
                                        echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
										//echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
                                        echo '<h2 class="nb-title fo_title top20 text-center"><a href="'.$urll.'" rel="bookmark">'.$dbc->string_len($row['name'],50).'</a></h2>';
                                    echo '</div>';
                               
								if($z%2==0)
								{
									echo '</div><div class="col-xs-12 nopad">';
								}
								 $z++;
                            }
                            ?>
                    	</div>
                	</div>
            </section>
            
            
            
            
            <section>
            	<div class="col-xs-12">
                	<div class="col-md-12 nopad">
                      <div class="tb_head ">Lifestyle</div>
                    </div>
                    <div class="col-md-12 nopad">
                    
                    <div id="carousel_blog" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!--<ol class="carousel-indicators">
                            <li data-target="#carousel_blog" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_blog" data-slide-to="1"></li>
                            <li data-target="#carousel_blog" data-slide-to="2"></li>
                        </ol>-->
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner web" role="listbox">
                        
                            <div class="item active">
                                
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
                                    
									$tx_brief = base64_decode($row['brief'],true);
									$photo[0] = 'upload/p.jpg';
									
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html#testblog";
									
                                    echo '<div class="col-sm-4 t_t22 fo_box_2">';
										echo '<div class="col-sm-12 nopad in_side_box">';
											echo '<a href="'.$urll.'">';
												echo '<img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
												echo '<div class="over_photo">'.$dbc->string_len($tx_brief,90).'</div>';
											echo '</a>';
											//echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imagePath($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
											echo '<div class="col-sm-12  in_side_pad">';
												echo '<h2 class="nb-title fo_title_2 top20 text-left"><a href="'.$urll.'" rel="bookmark">'.$dbc->string_len($row['name'],66).'</a></h2>';
												echo '<a href="'.$urll.'" ><div class="a_readmore">READ MORE</div></a>';
											echo '</div>';
                                   		echo '</div>';
									echo '</div>';
                               
								if($x%3==0)
								{
									if($x!=$total_lifestyle)
									{
										echo '</div><div class="item">';
										$arrow = 1;
									}
								}
								 $x++;
                            }
                            ?>
                                
                            </div>
                            
                        </div>
                        
                       
                        
                        <!-- Controls -->
                        <?php 
						if($arrow == 1)
						{
                        echo '<a class="left carousel-control" href="#carousel_blog" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#carousel_blog" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';
						}
						?>
    
                    </div>
                    
                    
                    
                    <div id="carousel_blog_mob" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!--<ol class="carousel-indicators">
                            <li data-target="#carousel_blog_mob" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_blog_mob" data-slide-to="1"></li>
                            <li data-target="#carousel_blog_mob" data-slide-to="2"></li>
                        </ol>-->
                        
                        <!-- Wrapper for slides -->
                         <div class="carousel-inner mob" role="listbox">
                        
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
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html#testblog";
									
									$tx_brief = base64_decode($row['brief'],true);
									$photo[0] = 'upload/p.jpg';
									
									echo '<div class="item '.$act.'">';
										echo '<div class="col-sm-12 t_t22 fo_box_2">';
											echo '<div class="col-sm-12 nopad in_side_box">';
												echo '<a href="'.$urll.'">';
													echo '<img class="lazy" data-src="'.imageP($photo[0],'local').'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive">';
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
            </section>
            
            
        </div>
    </div>
</div>

<div class="follw">FOLLOW US <a href="https://www.instagram.com/inspiringvillas/" target="_blank" style="color:unset;">@INSPIRINGVILLAS</a></div>
<div class="covfootb">
<?php include "embed_ig_photo.php";?>
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


<!--<script src="libs/js/jquery-3.1.1.min.js"></script>
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
-->





<!--google-->
<!--<script>
function gPlus(url){
    window.open(
        'https://plus.google.com/share?url='+url,
        'popupwindow',
        'scrollbars=yes,width=800,height=600'
    ).focus();
    return false;
}
</script>-->

<!--google-->
<script>
$(document).ready(function () {
	$(".lazy").lazyload();
});
</script>