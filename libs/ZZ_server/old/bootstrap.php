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
	$staging = 'https://staging.inspiringvillas.com/';
    $photo_PageMap = $AWS_S3_link . "upload/default_page_map.jpg";
    
    include "metatag.php";
    $page=isset($_REQUEST['page'])?$_REQUEST['page']:'home';
    include "canonical.php";
    include "noindex.php";
    
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
    
    <title><?php echo $title_tag." - InspiringVillas.com";?></title>    
	<meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="apple-touch-icon" href="icon.jpg">
    <link href="<?php echo $staging ?>libs/css/bootstrap.min-100.css" rel="stylesheet"> 
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
    <link href="<?php echo $staging;?>libs/css/style-100.css?v=00101" rel="stylesheet">
    <link href="<?php echo $staging;?>libs/css/a_style-100.css?v=00101" rel="stylesheet"> 
    <script src="<?php echo $AWS_S3_link;?>libs/js/jquery-3.5.1.min.js"></script>
</head>
<body>
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
	case"yacht":include "pages/page_yacht.php";break;
	case"villa_private":include "pages/page_property_private.php";break;
	
	case"test_blog":include "pages/test_blog.php";break;
	case"email_detail":include "pages/page_show_email_detail.php";break;
	
	case"villaform-admin":include "pages/page_villaform_admin.php";break;
	case"villaform-customer":include "pages/page_villaform_customer.php";break;
	case"view-villaform-admin":include "pages/page_view_villaform_admin.php";break;
	case"product-lists":include "pages/page_product_lists.php";break;

    case"block_preview":include "pages/page_blog_detail_2.php";break;
    case"yacht_preview":include "pages/page_yacht_preview.php";break;
	case"yacht_thanks":include "pages/thank_you_yacht.php";break;
	case"yacht_recently":include "pages/page_yacht_recently.php";break;
}

    if($page!='thanks' && $page!='yacht_thanks')
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
		elseif($page =='villaform' || $page =='viewvillaform' || $page =='villaform-admin' || $page =='villaform-customer' || $page =='view-villaform-admin' || $page =='product-lists')
        {
        }
		elseif($page=='email_detail'){}
        else
        {
			include "pages/footer.php";
		}
    }
    
    
    //if($page!='propertydetail'){include "pages/popup.php";}
    
?> 
<script defer src="<?php echo $AWS_S3_link;?>libs/js/lazyload.min.js"></script>
<script defer src="<?php echo $staging;?>libs/js/bootstrap.min-100.js"></script>
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
include_once("analyticstracking.php"); ?>

 </body></html>
