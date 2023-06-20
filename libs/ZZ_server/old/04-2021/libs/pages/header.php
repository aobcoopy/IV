<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span>
<img itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="hidden" height="10" alt="InspiringVillas.com">
</span>
<?php 
//unset($_SESSION['recent'],$_SESSION['recent_all']);
if(isset($_SESSION['recent']) && isset($_SESSION['recent_all'])){}
else
{
    $_SESSION['recent'] = array();
    $_SESSION['recent_all'] = array();
}
if(isset($_SESSION['favorite'])){}
else
{
    $_SESSION['favorite'] = array();
}
?>
<?php $pa = $_REQUEST['page'];

?>

<style>
.tbrand
{
    position:absolute;
    z-index:1;
    top:0;
    color:#ffffff;
}
.dropdown-content{display:none;position:absolute;background-color:none;min-width:200px !important;box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2);z-index:1}.dropdown-content a{color:black;padding:12px 16px;text-decoration:none;display:block}.dropdown-content a:hover{background-color:#D3A267;color:#fff}.dropdown:hover .dropdown-content{display:block}.dropdown:hover .dropbtn{background-color:#3e8e41}
</style>
<div class="preloader"></div>
<?php 
if($pa=="propertydetail" || $pa=="forrent")
{
    ?>
    <header class="header transp stickys  sticky-on mob992"> <?php /*?> available class for header: .sticky .center-content .transp <?php */?>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <?php /*?> Brand and toggle get grouped for better mobile display <?php */?>
                <div class="navbar-header">
                    <?php 
                    if($pa=="propertydetail")
                    {
                        
                            ?>
                            <a class="aa_link"><button class="btnn_search text_up "><i class="fa fa-search "></i> Search Villas</button></a>
                            <?php
                        
                    }
                    ?>
<?php /*?>                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<?php */?>                    
                   
                   <a href="/recently"><button type="button"   class="btn btn-contact text_up fonn butrec2" style="margin-left: 80px !important;">
                                    <img src="data:image/png;base64,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" width="35px">
                                    <?php /*?><img src="/upload/recent2.png" width="35px" class="" /><?php */?>
                   </button></a>
                   <a href="/contact">
                        <button type="button"   class="btn btn-contact text_up fonn  icon_phone2" >
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjU2LDMyYzEyMy41LDAsMjI0LDEwMC41LDIyNCwyMjRTMzc5LjUsNDgwLDI1Niw0ODBTMzIsMzc5LjUsMzIsMjU2UzEzMi41LDMyLDI1NiwzMiBNMjU2LDBDMTE0LjYyNSwwLDAsMTE0LjYyNSwwLDI1NiAgIHMxMTQuNjI1LDI1NiwyNTYsMjU2czI1Ni0xMTQuNjI1LDI1Ni0yNTZTMzk3LjM3NSwwLDI1NiwwTDI1NiwweiBNMzk4LjcxOSwzNDEuNTk0bC0xLjQzOC00LjM3NSAgIGMtMy4zNzUtMTAuMDYyLTE0LjUtMjAuNTYyLTI0Ljc1LTIzLjM3NUwzMzQuNjg4LDMwMy41Yy0xMC4yNS0yLjc4MS0yNC44NzUsMC45NjktMzIuNDA1LDguNWwtMTMuNjg4LDEzLjY4OCAgIGMtNDkuNzUtMTMuNDY5LTg4Ljc4MS01Mi41LTEwMi4yMTktMTAyLjI1bDEzLjY4OC0xMy42ODhjNy41LTcuNSwxMS4yNS0yMi4xMjUsOC40NjktMzIuNDA2TDE5OC4yMTksMTM5LjUgICBjLTIuNzgxLTEwLjI1LTEzLjM0NC0yMS4zNzUtMjMuNDA2LTI0Ljc1bC00LjMxMy0xLjQzOGMtMTAuMDk0LTMuMzc1LTI0LjUsMC4wMzEtMzIsNy41NjNsLTIwLjUsMjAuNSAgIGMtMy42NTYsMy42MjUtNiwxNC4wMzEtNiwxNC4wNjNjLTAuNjg4LDY1LjA2MywyNC44MTMsMTI3LjcxOSw3MC44MTMsMTczLjc1YzQ1Ljg3NSw0NS44NzUsMTA4LjMxMyw3MS4zNDUsMTczLjE1Niw3MC43ODEgICBjMC4zNDQsMCwxMS4wNjMtMi4yODEsMTQuNzE5LTUuOTM4bDIwLjUtMjAuNUMzOTguNjg4LDM2Ni4wNjIsNDAyLjA2MiwzNTEuNjU2LDM5OC43MTksMzQxLjU5NHoiIGZpbGw9IiMxMTI4NDUiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" class="icPhone_mob"/>
                        </button>
                    </a>
                    <div class="mob">
                        <a class="navbar-brand" href="/">
                            <?php /*?><i class="fa fa-angle-left hico"></i><?php */?>
                            <img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo mologo" height="150" alt="InspiringVillas.com">
                        </a>
                    </div>
                    <div class="web">
                        <a class="navbar-brand" href="/">
                            <img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo weblogo" height="150" alt="InspiringVillas.com">
                        </a>
                    </div>
                </div>
                <?php /*?> Collect the nav links, forms, and other content for toggling <?php */?>
               <?php /*?> <button class="hamberger">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><?php */?>
                <div class="collapse navbar-collapse" id="collapse-2">
                    <ul class="navs  ">
                        <li class="<?php echo($pa=='service')?'active':'';?>"><a href="/our-service">Our Services</a></li> 
                        <?php /*?><li class="<?php echo($pa=='forrent')?'active':'';?>"><a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">For Rent</a></li>
                        <li class="<?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Blog & Lifestyle</a></li><?php */?>
                        <li class="<?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class="<?php echo($pa=='villa-promotions')?'active':'';?>"><a href="/villa-promotions">Promotion</a></li>
                        <li class="<?php echo($pa=='contact')?'active':'';?>"><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right mob">
                        <?php /*?><li class="<?php echo($pa=='home')?'active':'';?>"><a href="?page=home">Home</a></li>
                        <li class="<?php echo($pa=='villas')?'active':'';?> "><a href="/collections">Villa Collections</a><?php */?>
                        <li class="<?php echo($pa=='service')?'active':'';?>"><a href="/our-service">Our Services</a></li> 
                        <?php /*?><li class="<?php echo($pa=='forrent')?'active':'';?>"><a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">For Rent</a></li>
                        <li class="<?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Blog & Lifestyle</a></li><?php */?>
                        <li class="<?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class="<?php echo($pa=='villa-promotions')?'active':'';?>"><a href="/villa-promotions">Promotion</a></li>
                        <li class="<?php echo($pa=='contact')?'active':'';?>"><a href="/contact">Contact</a></li>
                    </ul>
                </div><?php /*?> /.navbar-collapse <?php */?>
            </div><?php /*?> /.container-fluid <?php */?>
        </nav>
    </header>
    <?php
}
elseif($pa =='villaform'  || $pa =='viewvillaform')
{
}
else
{
    ?>
    <header class="header transp stickys  sticky-on"> <?php /*?> available class for header: .sticky .center-content .transp <?php */?>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <?php /*?> Brand and toggle get grouped for better mobile display <?php */?>
                <div class="navbar-header">
                    <?php 
                    if($pa=="propertydetail")
                    {
                        ?>
                        <a  class="aa_link"><button class="btnn_search text_up"><i class="fa fa-search "></i> Search Villas </button></a>
                        <?php
                    }
                    ?>
                    <?php /*?><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><?php */?>
                     <a href="/contact">
                        <button type="button"   class="btn btn-contact text_up fonn icon_phone mob767" >
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjU2LDMyYzEyMy41LDAsMjI0LDEwMC41LDIyNCwyMjRTMzc5LjUsNDgwLDI1Niw0ODBTMzIsMzc5LjUsMzIsMjU2UzEzMi41LDMyLDI1NiwzMiBNMjU2LDBDMTE0LjYyNSwwLDAsMTE0LjYyNSwwLDI1NiAgIHMxMTQuNjI1LDI1NiwyNTYsMjU2czI1Ni0xMTQuNjI1LDI1Ni0yNTZTMzk3LjM3NSwwLDI1NiwwTDI1NiwweiBNMzk4LjcxOSwzNDEuNTk0bC0xLjQzOC00LjM3NSAgIGMtMy4zNzUtMTAuMDYyLTE0LjUtMjAuNTYyLTI0Ljc1LTIzLjM3NUwzMzQuNjg4LDMwMy41Yy0xMC4yNS0yLjc4MS0yNC44NzUsMC45NjktMzIuNDA1LDguNWwtMTMuNjg4LDEzLjY4OCAgIGMtNDkuNzUtMTMuNDY5LTg4Ljc4MS01Mi41LTEwMi4yMTktMTAyLjI1bDEzLjY4OC0xMy42ODhjNy41LTcuNSwxMS4yNS0yMi4xMjUsOC40NjktMzIuNDA2TDE5OC4yMTksMTM5LjUgICBjLTIuNzgxLTEwLjI1LTEzLjM0NC0yMS4zNzUtMjMuNDA2LTI0Ljc1bC00LjMxMy0xLjQzOGMtMTAuMDk0LTMuMzc1LTI0LjUsMC4wMzEtMzIsNy41NjNsLTIwLjUsMjAuNSAgIGMtMy42NTYsMy42MjUtNiwxNC4wMzEtNiwxNC4wNjNjLTAuNjg4LDY1LjA2MywyNC44MTMsMTI3LjcxOSw3MC44MTMsMTczLjc1YzQ1Ljg3NSw0NS44NzUsMTA4LjMxMyw3MS4zNDUsMTczLjE1Niw3MC43ODEgICBjMC4zNDQsMCwxMS4wNjMtMi4yODEsMTQuNzE5LTUuOTM4bDIwLjUtMjAuNUMzOTguNjg4LDM2Ni4wNjIsNDAyLjA2MiwzNTEuNjU2LDM5OC43MTksMzQxLjU5NHoiIGZpbGw9IiMxMTI4NDUiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" class="icPhone_mob"/>
                        </button>
                    </a>
                    <div class="mob">
                    <?php 
                    if($pa=="propertydetail")
                    {
                        ?><a class="navbar-brand" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">
                        <?php /*?><i class="fa fa-angle-left hico"></i><?php */?>
                        <img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo mologo" height="150" alt="InspiringVillas.com"></a><?php
                    }
                    else
                    {
                        ?><a class="navbar-brand" href="/"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="150" alt="InspiringVillas.com"></a><?php
                    }
                    ?>
                    </div>
                    <div class="web">
                    <?php 
                    if($pa=="propertydetail")
                    {
                        ?><a class="navbar-brand" href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="150" alt="InspiringVillas.com"></a><?php
                    }
                    else
                    {
                        ?><a class="navbar-brand" href="/"><img id="_logo6" itemprop="logo"  src="<?php echo $url_link;?>libs/images/logo.png" class="imglogo" height="150" alt="InspiringVillas.com"></a><?php
                    }
                    ?>
                    </div>
                    
                </div>
                <?php /*?> Collect the nav links, forms, and other content for toggling <?php */?>


<?php 

    if($pa=="home" || $pa=="")
    {
?>
<style type="text/css">

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #FFF;
  width: 100%;
}
input[type=submit] {
  background-color: #f0f0f0;
  color: #000;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  background-color: #e9e9e9;
  color: #000;
  max-height: 300px; 
  overflow-y:scroll; 
  overflow-x:hidden;
}
.autocomplete-items div {
    text-align: left;
    padding: 5px;
    cursor: pointer;
    background-color: #F0F0F0;
    /*border-bottom: 1px solid #d4d4d4;*/
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: #e9e9e9 !important; 
  color: #000;
}
#tags{
    transition:all 0.5s;
}
.navbar-nav > li > a {
    padding-left: 10px;
    padding-right: 10px;
}

@media screen and (max-width:424px)
{
    .villa-search{
        height: 30px;
        
    }    
}    

</style>

<div class="col-md-3 tag_search">
    <div class="col-xs-11 nopad autocomplete ">
        <input type="text" id="tags" name="tags" class="form-control villa-search web992" placeholder="Search by villa name">
        <button type="button" style="display: none;" onClick="go_to_link()"></button>
    </div>
</div>
<script src="<?php echo $url_link;?>libs/js/autocomplete.js"></script>               
<script>
<?php 

    $all_villas = allAvailableVillaNames($dbc); 
    
?>
    var allVillas = <?php echo $all_villas; ?>;

    //autocomplete(document.getElementById("tags"), allVillas);
 	
$(function() {
    $( "#tags" ).autocomplete({
      source: allVillas
    });
	$(".ui-menu").click(function(e) {
        $.ajax({
            url:"<?php echo $url_link;?>libs/actions/check-villas-link.php",
            type:"POST",
            dataType:"json"    ,
            data:{tags:$("#tags").val()},
            success: function(res){
                window.location = '/'+res+'.html';
            }
        });
    });
	$("#tags").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			go_to_link();
			}
    });
});
  
</script> 
<?php } ?>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php /*?><li class="<?php echo($pa=='home')?'active':'';?>"><a href="?page=home">Home</a></li>
                        <li class="<?php echo($pa=='villas')?'active':'';?> "><a href="/collections">Villa Collections</a><?php */?>
                        <li class="<?php echo($pa=='service')?'active':'';?>"><a href="/our-service">Our Services</a></li> 
                        <?php /*?><li class="<?php echo($pa=='forrent')?'active':'';?>"><a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">For Rent</a></li>
                        <li class="<?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Blog & Lifestyle</a></li><?php */?>
                        <li class="<?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class="<?php echo($pa=='villa-promotions')?'active':'';?>"><a href="/villa-promotions">Promotions</a></li>
                        <li class="<?php echo($pa=='contact')?'active':'';?>"><a href="/contact">Contact</a></li>
                    </ul>
                </div><?php /*?> /.navbar-collapse <?php */?>
            </div><?php /*?> /.container-fluid <?php */?>
        </nav>
    </header>
    <div class="cover_scroll text-center">
        <img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDkwIDQ5MCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDkwIDQ5MDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48ZyB0cmFuc2Zvcm09Im1hdHJpeCg2LjEyMzIzZS0xNyAxIC0xIDYuMTIzMjNlLTE3IDQ5MCAtMi44NDIxN2UtMTQpIj48c2NyaXB0IHhtbG5zPSIiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZERkJGQiIgZGF0YS1vbGRfY29sb3I9IiNGQ0Y5RjkiPjwvc2NyaXB0PjxnPgoJPGc+CgkJPHBhdGggZD0iTTI0NSwwQzEwOS41LDAsMCwxMDkuNSwwLDI0NXMxMDkuNSwyNDUsMjQ1LDI0NXMyNDUtMTA5LjUsMjQ1LTI0NVMzODAuNSwwLDI0NSwweiBNMjQ1LDQ0OS4zICAgIGMtMTEyLjYsMC0yMDQuMy05MS43LTIwNC4zLTIwNC4zUzEzMi40LDQwLjcsMjQ1LDQwLjdTNDQ5LjMsMTMyLjQsNDQ5LjMsMjQ1UzM1Ny42LDQ0OS4zLDI0NSw0NDkuM3oiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZERkJGQiIgZGF0YS1vbGRfY29sb3I9IiNGQ0Y5RjkiPjwvcGF0aD4KCQk8cGF0aCBkPSJNMjA1LjQsMTU1LjNjLTguMy04LjMtMjAuOS04LjMtMjkuMiwwbC03NS4xLDc1LjFjLTguMyw4LjMtOC4zLDIwLjksMCwyOS4ybDc1LjEsNzUuMWMxMS41LDEwLjYsMjMuNyw1LjgsMjguMSwwICAgIGM4LjMtOC4zLDguMy0yMC45LDAtMjkuMkwxNDMuOSwyNDVsNjEuNS02MC41QzIxMy43LDE3Ni4yLDIxMy43LDE2My43LDIwNS40LDE1NS4zeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojRkRGQkZCIiBkYXRhLW9sZF9jb2xvcj0iI0ZDRjlGOSI+PC9wYXRoPgoJCTxwYXRoIGQ9Ik0zODguOSwyMzAuNGwtNzUuMS03NS4xYy04LjMtOC4zLTIwLjktOC4zLTI5LjIsMHMtOC4zLDIwLjksMCwyOS4ybDYxLjUsNjAuNWwtNjAuNSw2MC41Yy04LjMsOC4zLTguMywyMC45LDAsMjkuMiAgICBjNC40LDUuOCwxNi43LDEwLjYsMjguMSwwbDc1LjEtNzUuMUMzOTcuMiwyNTEuMywzOTcuMiwyMzguNywzODguOSwyMzAuNHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZERkJGQiIgZGF0YS1vbGRfY29sb3I9IiNGQ0Y5RjkiPjwvcGF0aD4KCTwvZz4KPC9nPjwvZz4gPC9zdmc+"   width="30" class="icon_scroll" /><br>
        Scroll down
    </div>
    <?php
}
?>
<script>

function go_to_link()
{
    if($("#tags").val()=='')
    {
        //setTimeout(function(){
            $("#tags").css({"background":"#ff6565"});    
            $("#tags").val('Please fill your data');
        //},500);
        
        setTimeout(function(){
            $("#tags").css({"background":""});    
            $("#tags").val('');
            $("#tags").focus();
        },1500);
    }
    else
    {
        $.ajax({
            url:"<?php echo $url_link;?>libs/actions/check-villas-link.php",
            type:"POST",
            dataType:"json"    ,
            data:{tags:$("#tags").val()},
            success: function(res){
                window.location = '/'+res+'.html';
            }
        });
    }
    
}

</script>


<?php 
function dateType($data)
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
    return  $d.'  '.$month .', '.$y;
}
function day($data)
{
    $d = substr($data,8,2);
    return  $d;
}
function month($data)
{
    $m = substr($data,5,2);
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
    return  $month;
}

function string_len($text,$amount)
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


function switchcase($val)
{
    switch($val)
    {
        case "2":
            return "Party Villa - Phuket, Koh Samui, Thailand";
        break;
        case "3":
            return "Family Villas - Phuket, Koh Samui, Thailand";
        break;
        case "4":
            return "Seaview Villas - Phuket, Koh Samui, Thailand";
        break;
        case "5":
            return "Large Group Villas - Phuket, Koh Samui, Thailand";
        break;
        case "6":
            return "Beachfront Villas - Phuket, Koh Samui, Thailand";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
        break;
        case "8":
            return "Wedding Villas - Phuket, Koh Samui, Thailand";
        break;
        default:
    }
}



function switchcase_sort($val)
{
    switch($val)
    {
        case "2":
            return "Party Villa";
        break;
        case "3":
            return "Family Villas";
        break;
        case "4":
            return "Thailand Seaview Villas";//"Seaview Villas";
        break;
        case "5":
            return "Large Group Villas";
        break;
        case "6":
            return "Beach Villas Thailand";//"Beachfront Villas";
        break;
        case "8":
            return "Thailand Wedding Villas";//"Wedding Villas";
        break;
        default:
    }
}

?>
<button id="top" class="up"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
<script>
var tagg = 0;
$(document).ready(function(e) {
    $(".hamberger").click(function(e) {
        if(tagg==0)
        {
            $(".navs").slideDown(300);
            tagg = 1;
        }
        else
        {
            $(".navs").slideUp(300);
            tagg = 0;
        }
    });
});
</script>
<style>
h2.mb > strong ,h4.mb > strong
{
	color: #4b565b !important;/*4b565b */
}
</style>