<?php
$detail = 'hidden';
$over = "hidden";
$under = "hidden";
$hid_main = "hidden";

if(isset($_REQUEST['id']))
{
    $prop = $dbc->GetRecord("properties","*","id='".$_REQUEST['id']."'");
    $price_p = $prop['price'];
    $beach = $dbc->GetRecord("destinations","*","id='".$prop['subdestination']."'");
    $beach_na = explode(",",$beach['name']);
    $beach_fulname = $beach_na[0];
    $des = $prop['destination'];
    
    if($price_p>1000)
    {
        $over = "";
        
    }
    else
    {
        $under = "";
    }
    
    
    if($prop['destination']==38)
    {
        $detail = '';
        //$phuket = '';
        $br = '';//"<br>";
    }
    elseif($prop['destination']==39)
    {
        $detail = '';
        $br = '';//"<br>";
    }
    else
    {
        $br = "";
        /*$thai = 'hidden';
        $all = 'hidden';
        $phuket = 'hidden';
        $samui = 'hidden';*/
    }
    
}
else
{
    /*$all = '';
    $thai = 'hidden';
    $phuket = 'hidden';
    $samui = 'hidden';*/
}
    

$cat = $dbc->Query("select pc.*,c.* from property_cate as pc LEFT JOIN  categories as c ON pc.caategory = c.id where property = '".$_REQUEST['id']."'");
while($collection = $dbc->Fetch($cat))
{
   $caname = explode("-",$collection['name']);
   $ca_name = explode(" ",$collection['name']);
   $colle[] = array(
           'id' => $collection['id'],
        'name' => $ca_name[0]
   );
   $arr_beach[] = array(
           'id' => $collection['id'],
        'name' => $ca_name[0]
   );
   //array_push($colle,$ca_name[0]);
}

/*echo '<pre>';
    echo '---------------------'.$des."<<<<<<br>";
    print_r($arr_beach);
echo '</pre>';*/

$sql_room = $dbc->Query("select pr.*,c.* from property_room as pr LEFT JOIN  bedroom as c ON pr.room = c.id where property = '".$_REQUEST['id']."'");
while($l_room = $dbc->Fetch($sql_room))
{
    
    $arr_room[] = array(
           'id' => $l_room['id'],
        'name' => $l_room['name']
   );
}
/*echo '<pre>';
    print_r($arr_room);
echo '</pre>';*/



$array_link = array();
$zz = 0;
$v_link = '<li class=""><a class="blu" href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/all-price/all-bedrooms/all-collections/all-sort.html" >'.str_replace('Beach','',$beach_fulname).' Villas</a></li>';
array_push($array_link,$v_link);
$zz++;
 
 foreach($arr_room as $arroom)
{
   switch($arroom['id'])
   {
       case'1':
            $broom = "2,3,4 Bedroom";
       break;
       case'2':
            $broom = "5,6,7 Bedroom";
       break;
       case'3':
            $broom = "8,9,10> Bedroom";
       break;
      /* case'4':
            $broom = "> 10";
       break;*/
   }
/******************************************************used*****************************************************************************************/

	//???????echo $beach['status'].'----';
	if(check_links_footer_inside($des,$beach['id'],$arroom['id'],0)==true)
	{
		if($des == 38)
		{
			if($arroom['id'] == 2)
			{
			   // $v_link = '';//'<li class="text-center diy" style="cursor:default !important"><a class="blu "  style="cursor:default !important">'.$broom.' Villas'.' '.destination_name_inside($des).' </a></li>';//-----??????? 567
			   if($beach['status']>0)
			   {
				$v_link = '<li class="text-center "><a class="blu "  href="/search-rent/'.destination($des).'/'.beach(0).'/all-price/'.bed($arroom['id']).'/all-collections/all-sort.html">'.$broom.' Villas'.' '.destination_name_inside($des).' </a></li>';
				array_push($array_link,$v_link);
				  $zz++;
			   }
				  
				
			}
			else
			{
				$v_link = '<li class="text-center "><a class="blu "  href="/search-rent/'.destination($des).'/'.beach(0).'/all-price/'.bed($arroom['id']).'/all-collections/all-sort.html">'.$broom.' Villas'.' '.destination_name_inside($des).' </a></li>';
				array_push($array_link,$v_link);
				  $zz++;
			}
		}
		else
		{
			if($arroom['id'] == 2)
			{
			   if($beach['status']>0)
			   {
				$v_link = '<li class="text-center "><a class="blu "  href="/search-rent/'.destination($des).'/'.beach(0).'/all-price/'.bed($arroom['id']).'/all-collections/all-sort.html">'.$broom.' Villas'.' '.destination_name_inside($des).' </a></li>';
			array_push($array_link,$v_link);
			   $zz++;
			   }
			}
			else
			{
			$v_link = '<li class="text-center "><a class="blu "  href="/search-rent/'.destination($des).'/'.beach(0).'/all-price/'.bed($arroom['id']).'/all-collections/all-sort.html">'.$broom.' Villas'.' '.destination_name_inside($des).' </a></li>';
			array_push($array_link,$v_link);
			   $zz++;
			}
		}
	   
	   /*array_push($array_link,$v_link);
	   $zz++;*/
	}
	/******************************************************used*****************************************************************************************/
}

/******************************************************used*****************************************************************************************/
//////////foreach($arr_beach as $beach_namw)
//////////{
//////////   $v_link = '<li><a class="tb"  href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/all-price/all-bedrooms/'.collection($beach_namw['id']).'/all-sort.html">'.$beach_namw['name'].' Villas'.' '.$beach_fulname.' </a></li>';
//////////   array_push($array_link,$v_link);
//////////   $zz++;
//////////}
/******************************************************used*****************************************************************************************/

foreach($arr_room as $arroom)
{
   switch($arroom['id'])
   {
       case'1':
            $broom = "2,3,4 Bedroom";
       break;
       case'2':
            $broom = "5,6,7 Bedroom";
       break;
       case'3':
            $broom = "8,9,10> Bedroom";
       break;
      /* case'4':
            $broom = "> 10";
       break;*/
   }

  /* foreach($colle as $colla)
   {
       $v_link = '<li class=" diy"><a class="tb '.$under.'"  href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/under-usd-1000/'.bed($arroom['id']).'/'.collection($colla['id']).'/all-sort.html">'.$colla['name'].' '.$broom.' Villas'.' < 1000 '.$beach_fulname.' </a></li>';
       array_push($array_link,$v_link);
       $zz++;
       
       $v_link = '<li class=" diy"><a class="tb '.$over.'"  href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/over-usd-1000/'.bed($arroom['id']).'/'.collection($colla['id']).'/all-sort.html">'.$colla['name'].' '.$broom.' Villas'.' > 1000 '.$beach_fulname.' </a></li>';
       array_push($array_link,$v_link);
       $zz++;
   }*/
   
}


foreach($arr_room as $arroom)
{
   switch($arroom['id'])
   {
       case'1':
            $broom = "2,3,4 Bedroom";
       break;
       case'2':
            $broom = "5,6,7 Bedroom";
       break;
       case'3':
            $broom = "8,9,10> Bedroom";
       break;
      /* case'4':
            $broom = "> 10";
       break;*/
   }
/******************************************************used*****************************************************************************************/
 //  $v_link = '<li><a class="tb"  href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/all-price/'.bed($arroom['id']).'/all-collections/all-sort.html">'.$broom.' Villas'.' '.$beach_fulname.' </a></li>';
//   array_push($array_link,$v_link);
//   $zz++;
/******************************************************used*****************************************************************************************/
}


/*$v_link = '<li class=""><a class="tb '.$under.'" href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/under-usd-1000/all-bedrooms/all-collections/all-sort.html" >< 1000 '.$beach_fulname.' Villas</a></li>';
array_push($array_link,$v_link);
$zz++;

$v_link = '<li class=""><a class="tb '.$over.'" href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/over-usd-1000/all-bedrooms/all-collections/all-sort.html" >> 1000 '.$beach_fulname.' Villas</a></li>';
array_push($array_link,$v_link);
$zz++;*/

                  
foreach($arr_room as $arroom)
{
    switch($arroom['id'])
    {
       case'1':
            $broom = "2,3,4 Bedroom";
       break;
       case'2':
            $broom = "5,6,7 Bedroom";
       break;
       case'3':
            $broom = "8,9,10> Bedroom";
       break;
      /* case'4':
            $broom = "> 10";
       break;*/
    }
    
    /*foreach($colle as $colla)
    {
       $v_link = '<li class="diy"><a class="tb"  href="/search-rent/'.destination($des).'/'.beach($beach['id']).'/all-price/'.bed($arroom['id']).'/'.collection($colla['id']).'/all-sort.html">'.$broom.' '.$colla['name'].' Villas'.' '.$beach_fulname.' </a></li>';
       array_push($array_link,$v_link);
       $zz++;
    }*/
}

//echo '-----------';
if($des==39)
{
	
	//$prop_cate = $dbc->HasRecord("property_cate","property='".$_REQUEST['id']."' and caategory = '6' ");
	if($dbc->HasRecord("property_cate","property='".$_REQUEST['id']."' and caategory = '6' "))
	{
		$v_link = '<li class="text-center "><a class="blu"  href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Koh Samui Beachfront Villas</a></li>';
		array_push($array_link,$v_link);
		$zz++;
	}
}
elseif($des==38)
{
	if($dbc->HasRecord("property_cate","property='".$_REQUEST['id']."' and caategory = '6' "))
	{
		$v_link = '<li class="text-center "><a class="blu"  href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html">Phuket Beachfront Villas</a></li>';
		array_push($array_link,$v_link);
		$zz++;
	}
	elseif($dbc->HasRecord("property_cate","property='".$_REQUEST['id']."' and caategory = '4' "))
	{
		$v_link = '<li class="text-center "><a class="blu"  href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html">Phuket sea view villas</a></li>';
		array_push($array_link,$v_link);
		$zz++;
	}
}



function check_links_footer_inside($c_des,$c_beach,$c_room,$c_collection)
{
    global $dbc;
    //echo '----------'.$c_des.'---'.$c_beach.'---'.$c_room.'---'.$c_collection."<br>";
    
    $s_des = '';
    $s_sub = '';
    $s_room = '';
    $s_cate = '';
    
    if($c_des==0)
    {
        $s_des = "WHERE properties.destination BETWEEN 38 AND 39 ";
    }
    else
    {
        $s_des = "WHERE properties.destination = ".$c_des;
    }
    
    if($c_beach==0)
    {
        $s_sub = "";
    }
    else
    {
        $s_sub = "AND properties.subdestination = ".$c_beach;
    }
    
    if($c_room==0)
    {
         $s_room = "";
    }
    else
    {
        $s_room = "AND property_room.room = ".$c_room;
    }
    
    if($c_collection==0)
    {
        $s_cate = "";
    }
    else
    {
        $s_cate = "AND property_cate.caategory = ".$c_collection;
    }
    
    /*echo "SELECT properties.id,properties.`name` AS pname,property_cate.caategory AS cate,property_room.room AS room,properties.destination AS des,properties.subdestination AS sub,properties.`status` AS `status`
        FROM properties
        LEFT JOIN property_cate ON properties.id = property_cate.property
        LEFT JOIN property_room ON properties.id = property_room.property
        ".$s_des." ".$s_sub." ".$s_room." ".$s_cate." AND properties.status > 0 <br>";*/
            
    $Qqry = $dbc->Query("SELECT
            properties.id,
            properties.`name` AS pname,
            property_cate.caategory AS cate,
            property_room.room AS room,
            properties.destination AS des,
            properties.subdestination AS sub,
            properties.`status` AS `status`
        FROM
            properties
        LEFT JOIN property_cate ON properties.id = property_cate.property
        LEFT JOIN property_room ON properties.id = property_room.property
        ".$s_des." ".$s_sub." ".$s_room." ".$s_cate." AND properties.status > 0");    
    
    $numss = $dbc->Getnum($Qqry);
    //echo  ">>--".$numss."--<<<br>";
    if($numss>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function destination($option)
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
    
function beach($option)
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

function collection($option)
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

function bed($option)
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

function destination_name_inside($option)
{
    switch($option)
    {
        case "38" :
            return "Phuket";//"phuket";
        break;
        case "39" :
            return "Koh Samui";//"koh-samui";
        break;
        default:
            return "Thailand";
    }
}
    
   ?>


<?php include "villa_details_footer/config.inc.php"; ?>   

<?php /*?><div class="container-fluid topfoot web mt50">
    <div class="container  <?php echo $detail;?>"><br>
        <div class="col-sm-12 col-md-12 nopad">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <ul class="menulinkfooter tb">
                <?php
                $loops = $zz/3; $yy=1;
                
                foreach($array_link as $Ylink)
                {
                    echo $Ylink;
                    
                    if(($yy%ceil($loops))==0)
                    {
                        echo '</ul>';
                        echo '</div>';
                        echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                        echo '<ul class="menulinkfooter tb">';
                    }
                    $yy++;
                }
                ?>
                        <!-- beach_namw-->
                </ul>
            </div>
         </div>   
    </div> 
</div>      
<?php */?>