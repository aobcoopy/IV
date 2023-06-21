<link href="/libs/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/libs/css/404.css" rel="stylesheet" type="text/css">
<link href="/libs/css/base.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="robots" content="noindex">
<title>404 Page not found</title>
<script src="/libs/js/jquery-3.1.1.min.js"></script>
<script>
var urll = '<?php echo $_SERVER['REQUEST_URI'];?>';
$(document).ready(function(e) {
    if(urll=='/blog/top-10-phuket-luxury-villas.html')
	{
		window.location = 'https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';
	}
	else if(urll=='/forrentt')
	{
		window.location = 'https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';
	}
});
</script>

<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
<link rel="apple-touch-icon" href="icon.jpg">

<img src="/upload/oops.png" class="center-block img-responsive">
<div class="f_main text-center">404</div> 
<div class="f_sub text-center">Page not found</div><br>
<a href="/"><button class="btn btn-main text-center center-block">Homepage</button></a>
