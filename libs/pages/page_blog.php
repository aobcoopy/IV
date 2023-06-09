<?php //require_once "libs/pages/base_mini_cover.php";?>
<?php 
//$cover = $dbc->GetRecord("cover","*","page='blog' AND status > 0");
$sqlcover = $dbc->Query("select * from cover where page='blog' AND status > 0");
$cover = $dbc->Fetch($sqlcover);
$photo_cover = json_decode($cover['photo'],true);
if( $photo_cover != "") $photo_cover = imageP($photo_cover);//imagePath($photo_cover);


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


<link href="libs/css/blog/blog_style_1.css" rel="stylesheet">
<!-- Responsive styles for this template -->
<link href="libs/css/blog/responsive.css" rel="stylesheet">
<!-- Colors for this template -->
<link href="libs/css/blog/colors.css" rel="stylesheet">

<br><br>
<!-- NEW Blog -->

<div class="col-md-12"><br>
            	<center><h1 class=" contitle blw hidden-xs ">Inspiring Experiences</h1></center>
                        <h2 class="f16 text-center btop1" style="    font-family: pt !important;">Blog & Life Style</h2><br>

            </div>
 <br><br>   <br><br>        
<section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img src="../../upload/b1.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="blog-category-01.html" title="">Lifestyle</a></span>
                                        <h4><a href="block-single.html" title="">The golden rules you need to know for a positive life</a></h4>
                                        <small><a href="block-single.html" title="">24 July, 2017</a></small>
                                        <small><a href="blog-author.html" title="">by Amanda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->

                    <div class="center-side">
                        <div class="masonry-box post-media">
                             <img src="../../upload/b2.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green"><a href="blog-category-01.html" title="">Travel</a></span>
                                        <h4><a href="block-single.html" title="">5 places you should see</a></h4>
                                        <small><a href="block-single.html" title="">24 July, 2017</a></small>
                                        <small><a href="blog-author.html" title="">by Amanda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->

                        <div class="masonry-box small-box post-media">
                             <img src="../../upload/b3.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green"><a href="blog-category-01.html" title="">Travel</a></span>
                                        <h4><a href="block-single.html" title="">Separate your place with exotic hotels</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->

                        <div class="masonry-box small-box post-media">
                             <img src="../../upload/b3.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green"><a href="blog-category-01.html" title="">Travel</a></span>
                                        <h4><a href="block-single.html" title="">What you need to know for child health</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->

                    <div class="right-side hidden-md-down">
                        <div class="masonry-box post-media">
                             <img src="../../upload/b1.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="blog-category-01.html" title="">Lifestyle</a></span>
                                        <h4><a href="block-single.html" title="">The rules you need to know for a happy union</a></h4>
                                        <small><a href="block-single.html" title="">03 July, 2017</a></small>
                                        <small><a href="blog-author.html" title="">by Jessica</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end right-side -->
                </div><!-- end masonry -->
            </div>
        </section>

<section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h3 class="color-aqua"><a href="blog-category-01.html" title="">Lifestyle</a></h3>
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b4.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                        <h4><a href="block-single.html" title="">The golden rules you need to know for a positive life</a></h4>
                                        <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                        <small><a href="blog-category-01.html" title="">Lifestyle</a></small>
                                        <small><a href="block-single.html" title="">24 July, 2017</a></small>
                                        <small><a href="blog-author.html" title="">by Amanda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b4.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                        <h4><a href="block-single.html" title="">I have a desert visit this summer</a></h4>
                                        <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                        <small><a href="blog-category-01.html" title="">Lifestyle</a></small>
                                        <small><a href="block-single.html" title="">22 July, 2017</a></small>
                                        <small><a href="blog-author.html" title="">by Martines</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="section-title">
                            <h3 class="color-pink"><a href="blog-category-01.html" title="">Fashion</a></h3>
                        </div><!-- end title -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="block-single.html" title="">What is your favorite leather jacket color</a></h4>
                                        <small><a href="blog-category-01.html" title="">Fashion</a></small>
                                        <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="block-single.html" title="">Is summer, have you bought a cane</a></h4>
                                        <small><a href="blog-category-01.html" title="">Fashion</a></small>
                                        <small><a href="blog-category-01.html" title="">11 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="block-single.html" title="">This year's fashionable long beard</a></h4>
                                        <small><a href="blog-category-01.html" title="">Fashion</a>, <a href="blog-category-01.html" title="">Man</a></small>
                                        <small><a href="blog-category-01.html" title="">08 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b5.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="block-single.html" title="">How to be more cool with clothing</a></h4>
                                        <small><a href="blog-category-01.html" title="">Fashion</a>, <a href="blog-category-01.html" title="">Style</a></small>
                                        <small><a href="blog-category-01.html" title="">04 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="../../upload/b8.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-list clearfix">
                            <div class="section-title">
                                <h3 class="color-green"><a href="blog-category-01.html" title="">Travel</a></h3>
                            </div><!-- end title -->

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">5 Beautiful buildings you need to visit without dying</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Travel</a></small>
                                    <small><a href="block-single.html" title="">21 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Boby</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">Let's make an introduction to the glorious world of history</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Travel</a></small>
                                    <small><a href="block-single.html" title="">20 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Samanta</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">Did you see the most beautiful sea in the world?</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Travel</a></small>
                                    <small><a href="block-single.html" title="">19 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Jackie</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end blog-list -->

                        <hr class="invis">

                        <div class="blog-list clearfix">
                            <div class="section-title">
                                <h3 class="color-red"><a href="blog-category-01.html" title="">Food</a></h3>
                            </div><!-- end title -->

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">Banana-chip chocolate cake recipe</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Food</a></small>
                                    <small><a href="block-single.html" title="">11 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Matilda</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">10 practical ways to choose organic vegetables</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Food</a></small>
                                    <small><a href="block-single.html" title="">10 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Matilda</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="block-single.html" title="">
                                            <img src="../../upload/b6.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="block-single.html" title="">We are making homemade ravioli</a></h4>
                                    <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                    <small><a href="blog-category-01.html" title="">Food</a></small>
                                    <small><a href="block-single.html" title="">09 July, 2017</a></small>
                                    <small><a href="blog-author.html" title="">by Matilda</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end blog-list -->
                    </div><!-- end col -->

                    <div class="col-lg-3">
                        <div class="section-title">
                            <h3 class="color-yellow"><a href="blog-category-01.html" title="">Vlogs</a></h3>
                        </div><!-- end title -->

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">We are guests of ABC Design Studio - Vlog</a></h4>
                                <small><a href="blog-category-01.html" title="">Videos</a></small>
                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">Nostalgia at work</a></h4>
                                <small><a href="blog-category-01.html" title="">Videos</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">How to become a good vlogger</a></h4>
                                <small><a href="blog-category-01.html" title="">Beauty</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="section-title">
                            <h3 class="color-grey"><a href="blog-category-01.html" title="">Health</a></h3>
                        </div><!-- end title -->

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">Opened the doors of the Istanbul spa center</a></h4>
                                <small><a href="blog-category-01.html" title="">Spa</a></small>
                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">2017 trends in health tourism</a></h4>
                                <small><a href="blog-category-01.html" title="">Health</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="block-single.html" title="">
                                    <img src="../../upload/b7.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="block-single.html" title="">Experience the effects of miraculous stones</a></h4>
                                <small><a href="blog-category-01.html" title="">Beauty</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="../../upload/b8.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->


                <?php /*?><div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row --><?php */?>
                
                
            </div><!-- end container -->
        </section>        
        
<!-- NEW Blog -->        
 
<script src="libs/js/blog/js/jquery.min.js"></script>
<script src="libs/js/blog/js/tether.min.js"></script>
<script src="libs/js/blog/js/bootstrap.min.js"></script>
<script src="libs/js/blog/js/custom.js"></script>
    
           
<?php /*?><div class="mg-blog-list">
    <div class="container">
        <div class="row">
                
        	<div class="col-md-12"><br>
            	<center><h1 class=" contitle blw hidden-xs ">Inspiring Experiences</h1></center>
                        <h2 class="f16 text-center btop1" style="    font-family: pt !important;">Blog & Life Style</h2><br>

            </div>
            
            <section>
            <?php
			$height = $dbc->Query("SELECT * FROM blogs WHERE `status` = 1 AND (heightlight IS NOT NULL AND heightlight > 0)  ORDER BY sort ASC ");
			$y=0;
			while($row_hl = $dbc->Fetch($height))
			{
				$photo = json_decode($row_hl['photo'],true);
				$tx_brief = base64_decode($row_hl['brief'],true);
				$urll = "/blog/" . strtolower(str_replace(" ", "-", $row_hl['name']) ) . ".html";
				
				if($y==0)
				{
					echo '<div class="col-md-7 t_t1222" style="margin-bottom: 20px;">';
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
								echo '<img class="lazy img-responsives img_left" data-src="'.imageP($photo[0]).'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
							echo '</div>';
						echo '</a>';
						echo '</div>';
					echo '</div>';
				}
				else
				{
					echo '<div class="col-md-5 t_t222">';
						echo '<div class="col-md-12 nopad">';
						echo '<a href="'.$urll.'">';
							echo '<div class="Cov_right cov_hl">';
								echo '<div class="overlay_hl">';
									echo '<div class="inside_overlay_hl">';
										echo '<div class="arti_text">ACTIVITIES</div>';
										echo $dbc->string_len($tx_brief,60);
										echo '<br><button class="hl_but">VIEW POST</button>';
									echo '</div>';
								echo '</div>';
								echo '<img class="lazy img-responsives img_right" data-src="'.imageP($photo[0]).'" alt="'.$row_hl['name'].'" style="width: 100%;" >';
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
               	  <div class="tb_head text-center">VILLA STORIES</div>
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
							
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
							echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
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
                                    
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
                                    echo '<div class="col-sm-6 col-md-6 t_t22 fo_box">';
                                        echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
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
            	<div class="col-md-12">
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
                                    
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
                                    echo '<div class="col-sm-4 t_t22 fo_box_2">';
										echo '<div class="col-sm-12 nopad in_side_box">';
											echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
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
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
									echo '<div class="item '.$act.'">';
										echo '<div class="col-sm-12 t_t22 fo_box_2">';
											echo '<div class="col-sm-12 nopad in_side_box">';
												echo '<a href="'.$urll.'"><img class="lazy" data-src="'.imageP($photo[0]).'" alt="'.$row['name'].'" style="width: 100%;" class="img-responsive"></a>';
												echo '<div class="col-sm-12  in_side_pad">';
													echo '<h2 class="nb-title fo_title_2 top20 text-left"><a href="'.$urll.'" rel="bookmark">'.$dbc->string_len($row['name'],66).'</a></h2>';
													echo '<a href="'.$urll.'" ><div class="a_readmore">READ MORE</div></a>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
                               
								/*if($x%3==0)
								{
									
								}*-/
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
</div><?php */?>

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