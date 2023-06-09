<?php
if(isset($_REQUEST['id']))
{
	$prop_pop = $dbc->GetRecord("properties","*","id='".$_REQUEST['id']."'");
	$beach_pop = $dbc->GetRecord("destinations","*","id='".$prop_pop['subdestination']."'");
	$beach_na_pop = explode(",",$beach_pop['name']);
	$beach_fulname_pop = $beach_na_pop[0];
	$des_pop = $prop_pop['destination'];
	
	if($prop_pop['destination']==38)
	{
		$des_name = 'Phuket';
	}
	elseif($prop_pop['destination']==39)
	{
		$des_name = 'Koh Samui';
	}
	else
	{
		$des_name = 'Thailand';
	}
	
}
else
{
}
	


function destination_pop($option)
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
	
function beach_pop($option)
{
	switch($option)
	{
		case "54" :
			return "angthong-beach";
		break;
		case "55" :
			return "ao-po-beach";//"aopo-beach";
		break;
		case "56" :
			return "bang-po-beach";
		break;
		case "58" :
			return "bangrak-beach";
		break;
		case "59" :
			return "bang-tao-beach";//"bangtao-beach";
		break;
		case "60" :
			return "bophut-beach";//"bo-phut-beach";
		break;
		case "61" :
			return "cape-yamu";
		break;
		case "62" :
			return "chaweng-noi-beach";
		break;
		case "63" :
			return "chaweng-beach";
		break;
		case "64" :
			return "choeng-mon-beach";
		break;
		case "65" :
			return "haad-thong-lang-beach";
		break;
		case "66" :
			return "kamala-beach";
		break;
		case "67" :
			return "kata-beach";
		break;
		case "68" :
			return "laem-noi-beach";
		break;
		case "69" :
			return "laem-set-beach";
		break;
		case "70" :
			return "laem-yai-beach";
		break;
		case "71" :
			return "lamai-beach";
		break;
		case "72" :
			return "layan-beach";
		break;
		case "73" :
			return "laem-sor-beach";
		break;
		case "74" :
			return "lipa-noi-beach";
		break;
		case "75" :
			return "maenam-beach";
		break;
		case "76" :
			return "naithon-beach";
		break;
		case "77" :
			return "natai-beach";
		break;
		case "78" :
			return "phuket-town";
		break;
		case "79" :
			return "plai-leam-beach";
		break;
		case "80" :
			return "surin-beach";
		break;
		case "81" :
			return "taling-ngam-beach";
		break;
		case "83" :
			return "cape-panwa-beach";
		break;
		case "84" :
			return "ao-yon-bay";
		break;
		case "85" :
			return "patong";
		break;
		case "86" :
			return "ao-makham-bay";
		break;
		case "87" :
			return "kalim-beach";
		break;
		case "88" :
			return "chalong-bay";
		break;
		case "89" :
			return "rawai-beach";
		break;
		case "96" :
			return "nai-harn";
		break;
		default:
			return "all-beach";
	}
}


?>
<script>
var popup_status = "<?php echo ($prop_pop['popup']!='')?$prop_pop['popup']:'0';?>";
$(document).ready(function(e) {
	
	setTimeout(function(){
		 if(popup_status==1)
		{
			$(".bgpop").fadeIn(300);
			$(".b_pop").fadeIn(300);
			
			/*$(".bgpop").fadeIn(300);
			$(".b_pop").fadeIn(300);*/
		}
		else
		{
		}
	},800);
   
});
</script>
<div class="bgpop "></div>
<div class="b_pop ">
	<img src="../../upload/poplog.png" class="center-block" width="130">
    <div class="t1mess">
        This villa is no longer available for rent here<br>
        Discover other luxury villas available in Phuket & Koh Samui
    </div>
   
    
    <div class="t2mess">
        Feel free to <a href="/contact">contact us</a> - our Thailand villa specialists will be happy to <br>
        help you find the villa holiday of your dreams.
    </div>
   
	<div class="t2mess">
        View our luxury villa collections in <a href="/search-rent/<?php echo destination_pop($des_pop);?>/<?php echo beach_pop($beach_pop['id']);?>/all-price/all-bedrooms/all-collections/all-sort.html"><?php echo $beach_fulname_pop;?></a> or <br>
        all villas available in <a href="/search-rent/<?php echo destination_pop($des_pop);?>/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><?php echo $des_name;?></a>
    </div>

	<div class="t3mess">
    	“The Inspiring Villas Team”
    </div>

</div>