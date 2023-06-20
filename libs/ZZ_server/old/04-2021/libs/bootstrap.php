<?php ob_start('ob_gzhandler');
 //$offset = 1 ;//* 60 * 24 * 7; // 7 Day 
 $offset = 60 * 60 * 24 * 7; // 7 Day 
 $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
 
 header($ExpStr);
 header("Pragma: no-cache"); 
 //header("Cache-Control: must-revalidate");
?>
<!doctype html><html><head> <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

<?php 

    //$url_link = "http://127.0.0.1:8105/";
    //$url_link = "http://inspiringvillas.local/";
    $url_link = "https://" . $_SERVER['SERVER_NAME'] . "/";
    //$url_link = "https://www.inspiringvillas.com/";
    
    $AWS_S3_link = S3_BUCKET_URL."/";  
    
    
    include "metatag.php";
    $page=isset($_REQUEST['page'])?$_REQUEST['page']:'home';
    include "canonical.php";
    include "noindex.php";
	if($photo_id!='')
	{
		$photo_PageMap = S3_BUCKET_URL.$photo_id;
	}
	else
	{
		$photo_PageMap = $AWS_S3_link . "upload/default_page_map.jpg";
	}
	
    
?> 
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="Inspiringvillas">
<?php /*?><meta name="viewport" content="width=device-width, initial-scale=1"> <?php */?>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="msvalidate.01" content="E38E748C2673AE382D71A04F846950AF" />
    
    <meta property="og:title" content="<?php echo $title_tag." - InspiringVillas.com";?>"/>
    <meta property="og:image" content="<?php echo $photo_PageMap;?>">
    <meta property="og:description" content="<?php echo $meta_description;?>"/>
    
    <meta name="thumbnail" content="<?php echo $photo_PageMap;?>" />

    <!--  <PageMap>
        <DataObject type="thumbnail">
          <Attribute name="src" value="<?php echo $photo_PageMap;?>"/>
          <Attribute name="width" value="100"/>
          <Attribute name="height" value="auto"/>
        </DataObject>
      </PageMap>
    -->   
    
    <!--Google data structure-->
    <meta itemprop="url" content="<?php echo $url_link.$url;?>">
    <!--Google data structure--> 
    
    <title><?php echo $title_tag." - InspiringVillas.com";?></title>    

    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="apple-touch-icon" href="icon.jpg">
    <link href="<?php echo $AWS_S3_link ?>libs/css/bootstrap.min.css" rel="stylesheet"> 
<?php /*?><link href="<?php echo $url_link;?>libs/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $url_link;?>libs/css/cs-select.css" rel="stylesheet"><?php */?> 
<?php
    if($page=='propertydetail')
    {?>
    <link href="<?php echo $AWS_S3_link;?>libs/css/bootstrap-datepicker3.min.css" rel="stylesheet"> 
    <link rel="preload" href="<?php echo $AWS_S3_link;?>libs/css/datepicker.css" rel="stylesheet">
<?php
    }
    
    if( $page=='forrent')
    {?>
    <link href="<?php echo $AWS_S3_link;?>libs/css/bootstrap-datepicker3.min.css" rel="stylesheet"> 
<?php /*?><link rel="preload" href="<?php echo $AWS_S3_link;?>libs/css/datepicker.css" rel="stylesheet"><?php */?>
<?php
    }
    ?>
    <link href="<?php echo $AWS_S3_link;?>libs/css/style.css?v=00082" rel="stylesheet">
    <link href="<?php echo $AWS_S3_link;?>libs/css/a_style.css?v=00085" rel="stylesheet"> 
    <script src="<?php echo $AWS_S3_link;?>libs/js/jquery-3.1.1.min.js"></script>
    
    <!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P46GWJJ');</script>
    <!-- End Google Tag Manager -->
    
    
    <!-- Facebook Pixel Code -->
	<script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '3605778229438852');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=3605778229438852&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->


    <?php include_once("analyticstracking.php");?>
</head>
<body>

	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P46GWJJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

<?php //$page=isset($_REQUEST['page'])?$_REQUEST['page']:'home';

if($page=='step1' || $page=='step2'){}
elseif($page=='booking' )
{
}
else{include "pages/header.php";}

switch($page)
{   
    case"home":include "pages/page_home.php";include "pages/popup.php";break;
    case"service":include "pages/page_our_service.php";break;
    case"forrent":include "pages/page_property.php";include "pages/popup.php";break;
    case"blog":include "pages/page_blog.php";break;
    case"blogdetail":include "pages/page_blog_detail.php";break;
    case"faq":include "pages/page_faq.php";break;
    case"contact":include "pages/page_contact.php";break;
    case"propertydetail":include "pages/page_property_detail.php";break;
    //case"villas":include "pages/page_villas.php";break;
    case"about":include "pages/page_about.php";break;
    case"thanks":include "pages/thank_you.php";break;
    case"thank-you-question":include "pages/thank_you_question.php";break;
    case"thank-you-contact":include "pages/thank_you_contact.php";break;
    case"step1":include "pages/payment_form.php";break;
    case"step2":include "pages/payment_confirm.php";break;
    //case"410":include "pages/410.php";break;
    case"testpage":include "pages/testpage.php";break;
    case"testpage2":include "pages/testpageKohSamui.php";break;
    case"testpage3":include "pages/testpagePhuket.php";break;
    case"booking":include "pages/booking_page.php";break;
    case"terms":include "pages/page_terms.php";break;
    case"privacy":include "pages/page_privacy.php";break;
    case"recently":include "pages/page_recently.php";break;
	case"villaform":include "pages/page_villaform.php";break;
	case"viewvillaform":include "pages/page_viewvillaform.php";break;
	case"favorite":include "pages/page_favorite_view.php";break;
	
	case"villa-promotions":include "pages/page_villa_promotions.php";break;
	case"villa_review":include "pages/page_property_review.php";break;
}

    if($page!='thanks')
    {
        if($page=='step1' || $page=='step2')
        {}
        elseif($page=='testpage' || $page=='testpage2' || $page=='testpage3')
        {
        }
        elseif($page=='booking' )
        {
        }
        elseif($page =='thank-you-question')
        {
        }
        elseif($page =='thank-you-contact')
        {
        }
		elseif($page =='villaform' || $page =='viewvillaform')
        {
        }
        else
        {include "pages/footer.php";}
    }
    
    
    //if($page!='propertydetail'){include "pages/popup.php";}
    
?> 
<script defer src="<?php echo $AWS_S3_link;?>libs/js/lazyload.min.js"></script>
<script defer src="<?php echo $AWS_S3_link;?>libs/js/bootstrap.min.js"></script>
<script defer src="<?php echo $AWS_S3_link;?>libs/js/selectFx.js"></script>
<?php
if($page=='home'  || $page=='propertydetail')
{
    ?><script defer src="<?php echo $AWS_S3_link;?>libs/js/jquery.parallax-1.1.3.js"></script><?php
}
?>
<script defer src="<?php echo $AWS_S3_link;?>libs/js/script.js?v=05"></script> 
<?php
if($page=='propertydetail' )
{?>
    <script defer src="<?php echo $AWS_S3_link;?>libs/js/jssor.slider.mini.js"></script>
    <script defer src="<?php echo $AWS_S3_link;?>libs/js/star-rating.js"></script>
    <script defer src="<?php echo $AWS_S3_link;?>libs/js/bootstrap-datepicker.js"></script>
    <script defer src="<?php echo $AWS_S3_link;?>libs/js/input_nark.js"></script>
<?php /*?><script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script><?php */?>
<?php
}
else
{
}

?>
<?php
if( $page=='forrent')
{?>
    <script defer src="<?php echo $AWS_S3_link;?>libs/js/bootstrap-datepicker.js"></script>
<?php /*?><script defer src="<?php echo $url_link;?>libs/js/input_nark.js"></script><?php */?>
<?php /*?><script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script><?php */?>
<?php
}
?>

<script>

<?php /*?>$(document).ready(function(e) {
    if(urll=='/blog/top-10-phuket-luxury-villas.html')
    {
        window.location = 'https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';
    }
    else if(urll=='/forrentt')
    {
        window.location = 'https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=forrent&des=2&pri=2&room=1&guest=null')
    {
        window.location = 'https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=contact')
    {
        window.location = 'https://www.inspiringvillas.com/contact';
    }
    else if(urll=='/?page=forrent&des=2&pri=3&room=2&guest=3')
    {
        window.location = '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=forrent&des=1&pri=3&room=2&guest=1')
    {
        window.location = '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=forrent&des=2&pri=1&room=2&guest=3')
    {
        window.location = '/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=forrent&des=1&pri=3&room=4&guest=4')// 13-06-61
    {
        window.location = '/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/seaview-villas/all-sort.html')
    {
        window.location = '/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
    {
        window.location = '/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/?page=forrent&des=1&pri=2&room=4&guest=2')
    {
        window.location = '/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='/search-rent/thailand-phuket/natai-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
    {
        window.location = '/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';
    }
    else if(urll=='blog/top-10-phuket-luxury-villas.html' )
    {
        window.location = 'https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';
    }
});
<?php */?></script>
<?php 
include "pages/head_js.php";
 ?>

 </body></html>
