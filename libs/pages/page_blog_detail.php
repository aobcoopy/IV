<?php 
//$blogs = $dbc->GetRecord("blogs","*","id=".$_REQUEST['id']);
$sqlblogs = $dbc->Query("select * from blogs where id='".$_REQUEST['id']."'");
$blogs = $dbc->Fetch($sqlblogs);
$cate = $dbc->GetRecord("blog_category","*","id='".$blogs['category']."'");
$photo_share = json_decode($blogs['photo_main'],true);
$photo = imagePath('/'.json_decode($blogs['photo_main'],true));
$urll = "/blog/" . strtolower(str_replace(" ", "-", $blogs['name']) ) . ".html";
//$user = $dbc->GetRecord("users","*","id=".$blogs['users']);
/*$sqluser = $dbc->Query("select * from users where id=".$blogs['users']);
$user = $dbc->Fetch($sqluser);*/
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
	return  $d.' '.$month .', '.$y;
}
?>
<link href="../libs/css/blog/blog_style_1.css" rel="stylesheet">
<!-- Responsive styles for this template -->
<link href="../libs/css/blog/responsive.css" rel="stylesheet">
<!-- Colors for this template -->
<link href="../libs/css/blog/colors.css" rel="stylesheet">
<!--<link href="libs/css/blog/bootstrap.css" rel="stylesheet">-->

<br><br><br>
<?php include "libs/pages/search.php";?>

<section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $blogs['name'];?></li>
                                </ol>

                                <span class="color-aqua"><a href="#" title=""><?php echo $cate['name'];?></a></span>

                                <h3><?php echo $blogs['name'];?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?php echo dateType2($blogs['day']);?></small>
                                    <small><a href="blog-author.html" title="">by <?php echo $blogs['byname'];?></a></small>
                                    <!--<small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>-->
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo_share);?>');"><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li onclick="popUp=window.open('https://twitter.com/share?text=<?php echo string_len_2b($blogs['name'],100).'-'.string_len_2b(base64_decode($blogs['brief'],true),200);?>&hashtags=inspiringvillas&original_referer=<?php echo $urll;?>&data-url=<?php echo $urll;?>&via=inspiringvillas', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <!--<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>-->
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                            	<?php echo base64_decode($blogs['detail'],true);?>
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <?php /*?><div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta --><?php */?>

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo_share);?>');"><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li onclick="popUp=window.open('https://twitter.com/share?text=<?php echo string_len_2b($blogs['name'],100).'-'.string_len_2b(base64_decode($blogs['brief'],true),200);?>&hashtags=inspiringvillas&original_referer=<?php echo $urll;?>&data-url=<?php echo $urll;?>&via=inspiringvillas', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <!--<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>-->
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <?php /*?><div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row --><?php */?>

                            <hr class="invis1">

                            <?php /*?><div class="custombox prevnextpost clearfix">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="block-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="../../upload/b9.jpg" alt="" class="img-fluid float-right" style="margin-right:0px;">
                                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="block-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="../../upload/b9.jpg" alt="" class="img-fluid float-left">
                                                        <h5 class="mb-1">Let's make an introduction to the glorious world of history</h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box --><?php */?>

                            <!--<hr class="invis1">-->

                            <?php /*?><div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="../../upload/400.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Cloapedia!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><?php */?><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                	<?php
									$sql_rec = $dbc->Query("select * from blogs where status > 0 order by sort asc limit 2");
									while($line = $dbc->Fetch($sql_rec))
									{
										$rid1 = $line['id'];
										$photo = imagePath('/'.json_decode($line['photo_main'],true));
										$urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
										$cate = $dbc->GetRecord("blog_category","*","id='".$line['category']."'");
										?>
										<div class="col-lg-6">
											<div class="blog-box">
												<div class="post-media">
													<a href="<?php echo $urll;?>" title="">
														<img src="<?php echo $photo;?>" alt="" class="img-fluid">
														<div class="hovereffect">
															<span class=""></span>
														</div><!-- end hover -->
													</a>
												</div><!-- end media -->
												<div class="blog-meta">
													<h4><a href="<?php echo $urll;?>" title=""><?php echo $line['name'];?></a></h4>
													<small><a href="<?php echo $urll;?>" title=""><?php echo $cate['name'];?></a></small>
													<small><a href="<?php echo $urll;?>" title=""><?php echo dateType2($line['day']);?></a></small>
												</div><!-- end meta -->
											</div><!-- end blog-box -->
										</div><!-- end col -->
										<?php
									
										/*echo '<li>';
											echo '<div class="mg-recnt-post">';
												echo '<div class="mg-rp-date">'.day($line['day']).'<div class="mg-rp-month">'.month($line['day']).'</div></div>';
												echo '<h3><a href="'.$urll.'">'.$line['name'].'</a></h3>';
												echo '<p>'.string_len(base64_decode($line['brief'],true),100).'</p>';
											echo '</div>';
										echo '</li>';*/
									}
									?>
                        
                                    

                                    
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <?php /*?><div class="custombox clearfix">
                                <h4 class="small-title">3 Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="../../upload/400.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="../../upload/400.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                                    <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media last-child">
                                                <a class="media-left" href="#">
                                                    <img src="../../upload/400.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">

                                                    <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                                    <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><?php */?><!-- end custom-box -->

                            <?php /*?><hr class="invis1"><?php */?>

                            <?php /*?><div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input type="text" class="form-control" placeholder="Your name">
                                            <input type="text" class="form-control" placeholder="Email address">
                                            <input type="text" class="form-control" placeholder="Website">
                                            <textarea class="form-control" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div><?php */?>
                            
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <!--<div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div>--><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    	<?php
									$sql_rec = $dbc->Query("select * from blogs where status > 0 order by sort asc limit 4");
									while($line = $dbc->Fetch($sql_rec))
									{
										$rid1 = $line['id'];
										$photo = imagePath('/'.json_decode($line['photo_main'],true));
										$urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
										$cate = $dbc->GetRecord("blog_category","*","id='".$line['category']."'");
										?>
                                        <a href="<?php echo $urll;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="<?php echo $photo;?>" alt="<?php echo $line['name'];?>" width="100%" style="max-width: 100% !important;width: 100% !important;" class="img-fluid float-left"<br>
<br>
                                                <h5 class="mb-1"><?php echo $line['name'];?></h5>
                                                <small><?php echo dateType2($line['day']);?></small>
                                            </div>
                                        </a>
										<?php
									}
									?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <?php /*?><div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="../../upload/1200.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget --><?php */?>

                            <?php /*?><div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                <?php include "embed_ig_photo.php";?>
                                    <a class="" href="#"><img src="upload/insta_01.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_02.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_03.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_04.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_05.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_06.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_07.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_08.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_09.jpeg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->
                            </div><?php */?><!-- end widget -->

                            <?php /*?><div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        <li><a href="#">Fahsion <span>(21)</span></a></li>
                                        <li><a href="#">Lifestyle <span>(15)</span></a></li>
                                        <li><a href="#">Art & Design <span>(31)</span></a></li>
                                        <li><a href="#">Health Beauty <span>(22)</span></a></li>
                                        <li><a href="#">Clothing <span>(66)</span></a></li>
                                        <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                        <li><a href="#">Food & Drink <span>(87)</span></a></li>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><?php */?><!-- end widget -->

                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        
<script defer src="libs/js/blog/js/jquery.min.js"></script>
<script defer src="libs/js/blog/js/tether.min.js"></script>
<script defer src="libs/js/blog/js/bootstrap.min.js"></script>
<script defer src="libs/js/blog/js/custom.js"></script>

<!--<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> -->
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
<style>
.btn-contact {
    background: #fff !important;
}
</style>