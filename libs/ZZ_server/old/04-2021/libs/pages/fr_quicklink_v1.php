<?php $uurrll = $_SERVER['REQUEST_URI'];?>
 <?php 
/*if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
{
	$ql_hid = "";
}*/
if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" ) //1.Thailand all bedroom ranges 
{
	$ql_hid = "";
}
else if($uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
{
	$ql_hid = "";
}
else if($uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html") //2.Thailand Seaview SEARCH
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //3.Koh Samui ALL SEARCH
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //4.Thailand ALL SEARCH
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html") //5.Thailand Beachfront SEARCH
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html")
{
	$ql_hid = "";
}
elseif($uurrll == "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort")
{
	$ql_hid = "";
}
else
{
	$ql_hid = 'hidden mb30';
}



?>
<?php /*?><div class="container-fluid bgwh"> <?php */?>
<div class="container">         
<div class="col-md-12 col-sm-12 col-xs-12 nopad ql <?php echo $ql_hid;?> ">
	<?php /*?><div class="col-md-12 col-sm-12 col-xs-12 text-center aaaaaaaaaaa"><?php */?>
    <div class="col-md-4 col-sm-12 col-xs-12 text-center nopad mb-20 0000">
    <?php 
        if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" ) //1.Thailand all bedroom ranges 
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html") //2.Thailand Seaview SEARCH
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
        elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //3.Koh Samui ALL SEARCH
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //4.Thailand ALL SEARCH
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html") //5.Thailand Beachfront SEARCH
        {
            $ql_link = 'Quick Links <span class="tgold">>>></span>';
        }
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html") //large group
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort") //large group
        {
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
		elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html")
		{
            $ql_link = 'Quick links <span class="tgold">>>></span>';
        }
		/*elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html") //large group
        {
            $ql_link = 'Quick Beachfront Villa Links <span class="tgold">>>></span>';
        }*/
        else
        {
            $ql_link = '';
        }
        echo $ql_link;
        ?>
    </div>    
    <div class="col-md-4 col-sm-6 col-xs-6 text-center nopad mb-20 tgold">
        <?php 
        /*if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Villas Phuket</a></li>';
        }*/
		if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" ) //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Phuket</a></li>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Phuket</a></li>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
           $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Phuket</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html") //2.Thailand Seaview SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql($_REQUEST['cate']).'/all-sort.html" >'.collection_ql_name($_REQUEST['cate']).' Villas Phuket</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //3.Koh Samui ALL SEARCH
        {
            //$ql_link = '<a class="tgold" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort" >Koh Samui Villas in the Hills</a></li>';
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(6).'/all-sort.html" >Koh Samui Beachfront villas</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //4.Thailand ALL SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(0).'/all-sort.html" >All Phuket Villas</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html") //5.Thailand Beachfront SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(6).'/all-sort.html" >Phuket Beach Villas</a></li>';
        }
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html")///
		{
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(5).'/all-sort.html" >Phuket Large Group Villas</a></li>';
		}
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort")///
		{
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html" >Phuket Seaview</a></li>';
		}
		elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html")
		{
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(6).'/all-sort.html" >Phuket Beachfront</a></li>';
		}
        else
        {
            $ql_link = '';
        }
        
        
        echo $ql_link;
        ?>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6 text-center nopad mb-20 tgold">
        <?php 
        /*if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" || $uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Villas Koh Samui</a></li>';
        }*/
		if($uurrll == "/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" ) //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Koh Samui</a></li>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Koh Samui</a></li>';
        }
		else if($uurrll == "/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html") //1.Thailand all bedroom ranges 
        {
           $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql($_REQUEST['room']).'/'.collection_ql(0).'/all-sort.html" >'.bed_ql_name($_REQUEST['room']).' Bedroom Villas Koh Samui</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html") //2.Thailand Seaview SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql($_REQUEST['cate']).'/all-sort.html" >'.collection_ql_name($_REQUEST['cate']).' Villas Koh Samui</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //3.Koh Samui ALL SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort" >Koh Samui Villas in the Hills</a></li>';
			//$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html" >Koh Samui Villas in the Hills</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html") //4.Thailand ALL SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(0).'/all-sort.html" >All Koh Samui Villas</a></li>';
        }
        elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html") //5.Thailand Beachfront SEARCH
        {
            $ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(6).'/all-sort.html" >Koh Samui Beachfront Villas</a></li>';
        }
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html")///
		{
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(5).'/all-sort.html" >Koh Samui Large Group Villas</a></li>';
		}
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort")///
		{
			$ql_link = '<a class="tgold" href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort" >Koh Samui Seaview</a></li>';
			//$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(39).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html" >Koh Samui Seaview</a></li>';
		}
		elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html")
		{
			$ql_link = '<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html" >Phuket Seaview</a></li>';
		}
        else
        {
            $ql_link = '';
        }
        
        echo $ql_link;
        ?>
    </div>
    <?php /*?></div><?php */?>
    <div class="col-md-12 col-sm-12 col-xs-12 blo text-center f15t">
    	<?php
		if($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html") //6.Phuket Beachfront SEARCH
		{
			/*$ql_link = '<strong>Please note</strong> - <span class="inss">
			There are not many villas directly on the beach in Phuket. You will find them all below on this villa overview page. <br>
			Nearly all the villas for rent in Phuket are
			<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html">luxury seaview villas</a> 
			in the hills above the beaches.</span>';*/
			$ql_link = '<span class="pn"><strong>Please note</strong></span> - <span class="inss pn">
			All the villas directly on the beach in Phuket are below. <br>Nearly all the villas for rent in Phuket are
			<a class="tgold" href="/search-rent/'.destination_ql(38).'/all-beach/all-price/'.bed_ql(0).'/'.collection_ql(4).'/all-sort.html">seaview villas</a> 
			in the hills above the beaches.</span>';
			echo $ql_link;
		}
		elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
		{
			
			//$ql_link = '<span class="inss">Congratulations. Villa Wedding planning & packages available.<br>Enjoy browsing the villas & read below <a onclick="gotopositions();">how we work</a>.</span>';
			$ql_link = '<span class="inss">Congratulations. We offer Villa Wedding packages & planning.<br>Enjoy browsing our wedding villas & find out how we work below.</span>';
			echo $ql_link;
		}
		elseif($uurrll == "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
		{
			//$ql_link = '<span class="inss">Congratulations. Wedding Villa packages & planning available.<br>Enjoy browsing our wedding villas & find out <a onclick="gotopositions();">how we work</a>.</span>';
			$ql_link = '<span class="inss">Congratulations. We offer complete Wedding Villa packages & planning.<br>Enjoy browsing our wedding villas & find out how we work below.</span>';
			echo $ql_link;
		}
		elseif($uurrll == "/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html")
		{
			//$ql_link = '<span class="inss">Congratulations. Thailand Wedding Villas planning available.<br>Enjoy browsing the villas & read <a onclick="gotopositions();">how we work</a>.</span>';
			$ql_link = '<span class="inss">Congratulations. Thailand Wedding Villas planning available.<br>Enjoy browsing the villas & read how we work below.</span>';
			echo $ql_link;
		}
		elseif($uurrll == "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html")//-----all phuket
		{
			//$ql_link = '<span class="inss">Congratulations. Thailand Wedding Villas planning available.<br>Enjoy browsing the villas & read <a onclick="gotopositions();">how we work</a>.</span>';
			$ql_link = '<br><span class="inss">Nearly all the villas in Phuket are <a class="tgold" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html">seaview villas</a> in the hills above the beaches.<br>
There are just a few Phuket villas with direct access on the <a class="tgold" href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">beachfront</a>.</span>';
			//echo $ql_link;//------this 
		}
		?>
    </div>
</div>
</div>

<?php 
$data_ql = $dbc->GetRecord("quick_link_text","*","status > 0 and link = '".$uurrll."' ");

?>
<div class="container">
	<div class="col-md-12 col-sm-12 col-xs-12 nopad inside_ql_text">
    	<!--<strong>Please note</strong> - -->
        	<span class="inssx"><?php echo base64_decode($data_ql['text'],true);?>
			<!--All the villas directly on the beach in Phuket are below. Nearly all the villas for rent in All the villas directly directly
            All the villas directly on the beach in Phuket are below. Nearly all the villas for rent in All the villas directly directly
            All the villas directly on the beach in Phuket are below. Nearly all the villas for rent in All--> <!--the villas directly directly-->
            </span>
            
    </div>
    <div class="but_rm" onClick="show_more();">Read More</div>
</div>

<style>
@media screen and (max-width:768px)
{
	.pn
	{
		font-size:13px;
	}
}
</style>

<?php /*?></div><?php */?>
<script>
//------ NEW ------
$(document).ready(function(e) {
    var ql_text = $(".inssx").text();
	//alert(ql_text.length);
	var ql_amt = 0;
	if($(window).width()<976)
	{
		ql_amt = 110;
	}
	else
	{
		ql_amt = 380;
	}
	
	ql_amt = 1380;
	
	if(ql_text.length > ql_amt)
	{
		$(".but_rm").show();
	}
	else
	{
		$(".but_rm").hide();
	}
});
function show_more()
{
	$(".inside_ql_text").css({"height":"100%"});
	$(".but_rm").remove();
}
//------ NEW ------


function gotopositions()
{
	if($(window).width()<976)
	{
		$('html,body').animate({ 
			scrollTop: $(".fprb").offset().top + 900
		},0);
	}
	else
	{
		$('html,body').animate({ 
			scrollTop: $(".tvdo").offset().top + 200
		}, 50);
	}
	
	
}
</script>
<?php
function destination_ql($option)
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
function bed_ql_name($option)
{
    switch($option)
    {
        case "1" :
            return "2,3,4";//"1-4";
        break;
        case "2" :
            return "5,6,7";//"5-7";
        break;
        case "3" :
            return "8,9,10>";//"8-10";
        break;
        /*case "4" :
            return "> 10 bedroom";//"11";
        break;*/
        default:
            return "all-bedroom";//"all-bed";
    }
}
function bed_ql($option)
{
    switch($option)
    {
        case "1" :
            return "1-4-bedrooms";//"1-4";
        break;
        case "2" :
            return "5-7-bedrooms";//"5-7";
        break;
        case "3" :
            return "8-10-bedrooms";//"8-10";
        break;
        case "4" :
            return "over-10-bedrooms";//"11";
        break;
        default:
            return "all-bedrooms";//"all-bed";
    }
}


function collection_ql($option)
{
    switch($option)
    {
        case "2" :
            return "party-villas";
        break;
        case "3" :
            return "family-villas";
        break;
        case "4" :
            return "seaview-villas";
        break;
        case "5" :
            return "larger-group-villas";
        break;
        case "6" :
            return "beachfront-villas";
        break;
        case "8" :
            return "wedding-villas";
        break;
        default:
            return "all-collections";
    }
}
function collection_ql_name($option)
{
    switch($option)
    {
        case "2" :
            return "Party";
        break;
        case "3" :
            return "Family";
        break;
        case "4" :
            return "Seaview";
        break;
        case "5" :
            return "large Group";
        break;
        case "6" :
            return "Beachfront";
        break;
        case "8" :
            return "Wedding";
        break;
        default:
            return "all-collections";
    }
}

?>